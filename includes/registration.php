<?php
require_once('config.php'); // Include your database configuration file


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
                    // Insert user into the database with photo source as 'upload'
                    $sql = "INSERT INTO users (FullName, EmailU, PhoneNumber, Password, photo, photo_source) VALUES (:fname, :email, :mobile, :password, :photo, 'upload')";
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
                      title: 'Image uploading failed.',
                      text: 'Please try again.',
                      icon: 'error',
                      button: false,
                  });
</script>";
                }
            } else {
                echo "<script> swal({
                  title: 'Invalid file format.',
                  text: 'Please upload a JPG, JPEG, or PNG file.',
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
                
                <div class="google-login-button">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" class="google-icon" viewBox="0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
	c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
	c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
	C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
          </svg>
          <a href="includes/google-login.php" class="nohover" >
          <span class="nohover" style="
    color: #747474;
">Sign up with Google</span>
          </a>

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
