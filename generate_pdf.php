 <?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
} else {
    require_once('TCPDF-main/tcpdf.php');
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    // التحقق مما إذا كانت الحالة تساوي 1
    $status = 1; // يمكنك تعديل هذه القيمة حسب احتياجاتك

    if ($status == 1 && isset($_GET['reservation_id'])) {
        $useremail = $_SESSION['login'];
        $reservation_id = $_GET['reservation_id'];
        $filename = "reservation_details_" . $reservation_id . ".pdf";
        
        // إنشاء الوثيقة PDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Reservation Details');

        // add a page
        $pdf->AddPage();

        // Add company logo and CARrental heading
        $pdf->Image('path/to/logo.png', 10, 10, 50); // Adjust path and size accordingly
        $pdf->SetFont('helvetica', 'B', 20);
        $pdf->SetTextColor(108, 92, 69); // Color #6c5c45
        $pdf->Cell(0, 20, 'CARrental', 0, 1, 'L'); // Combine "CAR" and "rental"
        $pdf->SetTextColor(0, 0, 0); // Reset text color to black

        // Add company address and website URL
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetXY(120, 15); // Set position to the right
        $pdf->MultiCell(0, 20, "ADDRESS: Morocco Agadir drarga\nPHONE: +212 691115737\nEMAIL: agency.carrental999@gmail.com\n", 0, 'R');  // Website: https://www.carrental.com/  
        

        // Add current date
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 10, 'DATE: ' . date('Y-m-d H:i:s'), 0, 1, 'R');

        // Add reservation title
        $pdf->SetFont('helvetica', 'B', 25);
        $pdf->Cell(0, 20, 'RESERVATION', 0, 1, 'C');

        // Add visitor name and full name
        $visitor_fullname = '';

        // Retrieve visitor's full name from reservation table
        $sql = "SELECT visitor_fullname FROM reservation WHERE id = :reservation_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result) {
            $visitor_fullname = $result['visitor_fullname'];
        }

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 15, 'Welcome ' . $visitor_fullname, 0, 1);

        // Add reservation details from the database
        $sql = "SELECT r.*, u.FullName AS VisitorFullName, c.*, b.BrandName FROM reservation r
                INNER JOIN users u ON r.userEmail = u.EmailU
                INNER JOIN cars c ON r.carsId = c.id
                INNER JOIN brands b ON c.carsBrand = b.id
                WHERE r.userEmail=:useremail AND r.id=:reservation_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);

        if($result !== false) {
            // Add reservation details to PDF in table format
            $pdf->SetFont('helvetica', '', 12);
            $html = '
            <table border="1" cellpadding="5">
                <tr>
                    <th>Car</th>
                    <td><span>' . $result->BrandName . '</span> ' . $result->carsTitle . '</td>
                </tr>
                <tr>
                    <th>From Date</th>
                    <td>' . $result->FromDate . '</td>
                </tr>
                <tr>
                    <th>To Date</th>
                    <td>' . $result->ToDate . '</td>
                </tr>
                <tr>
                    <th>Reservation Days</th>
                    <td>' . $result->daysB . ' Days</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>' . $result->T_price . ' DH</td>
                </tr>
            </table>';
            $pdf->writeHTML($html, true, false, true, false, '');
        } else {
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 10, 'Reservation not found.', 0, 1);
        }

        // Add instructions title
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Dear ' . $visitor_fullname . ' ,', 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->MultiCell(0, 10, 'Thank you for choosing agency CARrental for your car rental needs. Please find below the details of your reservation. To ensure a smooth pickup process, please bring the following documents with you to our office:

National ID or Passport: This is required for identity verification.
Driver’s License: A valid driver’s license is required to rent a car.
Credit or Debit Card: The card used for the reservation payment. Ensure it matches the cardholder name provided.
Reservation Confirmation Printout: This PDF document, which serves as your reservation confirmation.', 0, 'L', false
);

        $pdf->MultiCell(0, 10, 'Please make sure to arrive at least 15 minutes before your scheduled pickup time to complete the necessary paperwork. If you have any questions or need further assistance, feel free to contact our customer service team at +212 691115737 or via email at agency.carrental999@gmail.com.

We look forward to serving you and hope you have a great experience with Agency CARrental.', 0, 'L', false);

        // Add final greeting
        $pdf->SetFont('helvetica', 'B', 13);
        $pdf->Cell(0, 10, 'Best regards,', 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Agency CARrental Team', 0, 1);

        // Add footer information
        $pdf->SetTextColor(108, 92, 69); // Color #6c5c45
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->SetY(266); // Set position at 15mm from bottom
        $pdf->Cell(0, 10, 'For more information, please contact us at: agency.carrental999@gmail.com or +212 691115737', 0, true, 'C');

        // Get the PDF content as a string
        $pdf_content = $pdf->Output('', 'S');

        // Output PDF document for download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo $pdf_content;

        // Send the PDF via email
        try {
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'agency.carrental999@gmail.com'; // Replace with your Gmail email address
            $mail->Password = 'afik qxge fssk qzuf'; // Replace with your Gmail app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('agency.carrental999@gmail.com', 'Agency CARrental');
            $mail->addAddress($useremail);

            $mail->isHTML(true);
            $mail->Subject = 'Confirmation Reservation';
            $mail->Body = 'Dear ' . $visitor_fullname . ',<br><br>Thank you for choosing Agency CARrental for your car rental needs. We are pleased to confirm that your reservation has been accepted successfully. <br><br>Best regards,<br> Agency CARrental Team';

            // Attach PDF
            $mail->addStringAttachment($pdf_content, 'Reservation_Details.pdf');

            // $mail->send();
        } catch (PHPMailer\PHPMailer\Exception $e) {
            // If needed, handle the error here
        }

        exit();
    }
}
?>
