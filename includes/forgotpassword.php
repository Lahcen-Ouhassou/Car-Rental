<script src="assets/js/sweetalert.js"></script>

<?php
include_once('config.php');
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';
require 'includes/PHPMailer/src/Exception.php';

if (isset($_POST['reset'])) {
    $email = $_POST['email'];

    // Check if email exists in the database
    $sql = "SELECT EmailU FROM users WHERE EmailU=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {

        // Generate reset token and expiry time
        $reset_token = bin2hex(random_bytes(16));
        $expiry_time = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Update the database with reset token and expiry time
        $sql = "UPDATE users SET reset_token=:reset_token, reset_token_expiry=:expiry_time WHERE EmailU=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':reset_token', $reset_token, PDO::PARAM_STR);
        $query->bindParam(':expiry_time', $expiry_time, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        // Send reset email
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'agency.carrental999@gmail.com';  // Replace with actual email
        $mail->Password = 'afik qxge fssk qzuf';  // Replace with actual password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('agency.carrental999@gmail.com', 'Agency CARrental');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body    = 'Click the following link to reset your password: <a href="http://localhost/carrental/includes/passwordreset.php?token=' . $reset_token . '">Reset Password</a>';

        if ($mail->send()) {
            echo "<script>swal({ title: 'Check Your Email', text: 'Password Reset link has been sent to your Email.', icon: 'success', button: false, });</script>";
            
        } else {
            echo "<script>swal({ title: 'Error!', text: 'Failed to send reset email. Please try again.', icon: 'error', button: false, });</script>";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo "<script>swal({ title: 'Error!', text: 'Email address does not exist.', icon: 'error', button: false, });</script>";
    }
}
?>

<script type="text/javascript">
function valid() {
    if (document.chngpwd.newpassword.value !== document.chngpwd.confirmpassword.value) {
        swal({
            title: "New Password and Confirm Password Field do not Match!",
            text: "                   ",
            icon: "warning",
            button: false,
        });
        document.chngpwd.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>
<style>
  .backto:hover{
  right:9px !important;
  text-shadow:none !important;
}

</style>
<div class="modal fade" id="forgotpassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title">Forgot Password</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="forgotpassword_wrap">
            <div class="col-md-12">
              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Your Email address" required>
                </div>
                <div class="form-group">
                  <input type="submit" value="Send Password Reset Link" name="reset" class="btn btn-block" style="
    border-radius: 108px;
">
                </div>
              </form>
              <div class="text-center">
                <p class="gray_text" style="
    display: contents;
">For security reasons, we don't send your password via email. Instead, you will receive an email with a link to reset your password. This ensures your account remains secure and allows for verification.</p><br><br>
                <p ><a href="#loginform" data-toggle="modal" data-dismiss="modal" class="backto" style="
    transition: 0.5s;
    right: 0;
    position: relative;
"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
