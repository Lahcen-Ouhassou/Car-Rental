<?php
require_once('config.php'); // Include your database configuration file
require_once('send.php');



if (isset($_POST['signup'])) {
    $fname = $_POST['fullname'];
    $email = $_POST['EmailU'];
    $mobile = $_POST['mobileno'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    $profilePicture = $_FILES['profile_picture'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>
        swal({
          title: 'Password and Confirm Password do not match!',
          text: '              ',
          icon: 'error',
          button: false,
      });   
        </script>";
    } else {
        $hashedPassword = md5($password);

        // Check if email already exists in the database
        $sql = "SELECT * FROM users WHERE EmailU = :email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "<script> swal({
              title: 'Email already registered!',
              text: '              ',
              icon: 'error',
              button: false,
          });    
            </script>";
        } else {
            // Handle file upload
            $targetDir = "uploads/"; 
            $img_name = $profilePicture['name'];
            $img_type = $profilePicture['type'];
            $tmp_name = $profilePicture['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $allowedFormats = ["jpeg", "png", "jpg"];

            if (in_array($img_ext, $allowedFormats) === true) {
                $new_img_name = time() . '_' . $img_name;
                $targetFilePath = $targetDir . $new_img_name;

                if (move_uploaded_file($tmp_name, $targetFilePath)) {
                    // Insert user into the database
                    $sql = "INSERT INTO users (FullName, EmailU, PhoneNumber, Password, photo) VALUES (:fname, :email, :mobile, :password, :photo)";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
                    $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
                    $query->bindParam(':photo', $new_img_name, PDO::PARAM_STR);
                    $query->execute();
                    $lastInsertId = $dbh->lastInsertId();

                    if ($lastInsertId) {
                      
                        echo "<script> swal({
                          title: 'Registration successful.',
                          text: 'Now you can login.',
                          icon: 'success',
                          button: false,
                      });
</script>";
                    } else {
                        echo "  swal({
                          title: 'Something went wrong.',
                          text: 'Please try again.',
                          icon: 'error',
                          button: false,
                      });
</script>";
                    }
                } else {
                    echo "<script> swal({
                      title: 'Image resizing failed.',
                      text: 'Please try again.',
                      icon: 'error',
                      button: false,
                  });
</script>";
                }
            } else {
                echo "<script> swal({
                  title: 'Invalid file format.',
                  text: 'Please upload a JPG, JPEG, PNG, or GIF file.',
                  icon: 'error',
                  button: false,
              });
</script>";
            }
        }
    }
}
?>

<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" name="signup" id="signupform" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="EmailU" id="EmailU" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                  <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>


                <div class="form-group">
<label for="file" class="custum-file-upload">
<div class="text">
   <span>Upload Your Image</span>
   </div>
   <input id="file" type="file" class="form-control" name="profile_picture" required="required" style="padding-top: 7px;">
</label>


  </div>

                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required="required">
                  <span id="password-match-status" style="font-size:12px;"></span>
                </div>
                
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="page.php?type=terms"><span class="termsc">Terms and Conditions</span></a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block" style="border-radius: 108px;">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>

<script>
  

  
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'EmailU=' + $("#EmailU").val(),
        type: "POST",
        success: function(data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function (){}
    });
}

function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirmpassword").val();
    if (password != confirmPassword) {
        $("#password-match-status").html("Password and Confirm Password do not match!");
        $("#password-match-status").css("color", "red");
        return false;
    } else {
        $("#password-match-status").html("");
        return true;
    }
}
</script>
