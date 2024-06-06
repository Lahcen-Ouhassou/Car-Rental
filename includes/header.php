<style>
  .logrental{
    margin-top: -80px;
    margin-bottom: -88px;
    margin-left: -41px;
    width: 220px;
}
@media only screen and (max-width: 768px) {
  .user_login ul.dropdown-menu {
         margin-top: 2px;
        margin-left: -128px !important;
  }
  .logget{
    margin-top: -74px !important;
 }
}
.icon-bar{
  color:white;
}
</style>

<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/LOGOcr.png" alt="image" class="logrental"></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets"style="padding-left: 38px;border-right: 0.5px solid #606060;">
             
              <p class="uppercase_text">For Support Mail Us : </p>
              <a href="mailto: agency.carrental999@gmail.ma">agency.carrental999@gmail.com </a> </div>
            <div class="header_widgets">
              
              <p class="uppercase_text">Service Helpline Call Us: </p>
              <a href="tel:+212 691115737">+212 691115737</a> </div>
           
   <?php   if(strlen($_SESSION['login'])==0)
	{
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs logget " data-toggle="modal" data-dismiss="modal"style="padding: 3px 22px; font-weight: 400;border-radius: 21px;font-size: medium;text-transform: capitalize;">Log in | Get Started</a> </div>
<?php }
else{

echo "";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->

  <nav id="navigation_bar" class="navbar navbar-default navbar-inverse" data-spy="affix" data-offset-top="197">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button" style="background-color: transparent;border: 1px solid rgba(255, 255, 255, 0.2);border-radius: 33px;line-height: 17px;list-style: outside none none;margin: 0;padding: 8px 15px 7px;"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
<?php
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM users WHERE EmailU=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu"style="margin-top: 2px;margin-left: -133px;border: 1px solid rgba(255, 255, 255, 0.2);border-radius: 35px 0px 35px 0px;">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-reservation.php">My Reservation</a></li>
            <li><a href="post-testimonial.php">Post a Testimonial</a></li>
          <li><a href="my-testimonials.php">My Testimonial</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Reservation</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
           
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        <div class="header_search">
          
          
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav" style="margin-left: 108px;">
          <li><a href="index.php">Home</a></li>
          <li><a href="car-listing.php">SHOWROOM</a>
          <li><a href="page.php?type=Services">Services</a></li>
          <li><a href="page.php?type=aboutus">ABOUT US</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>
