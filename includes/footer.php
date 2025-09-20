<script src="assets/js/sweetalert.js"></script>

<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM subscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{

?>
<script> 
swal({
title: "Already Subscribed.",
text: "                     ",
icon: "error",
button: false,
});
</script>
<?php

}
else{
$sql="INSERT INTO  subscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
?>
<script>

  
swal({
title: "Subscribed Successfully.",
text: "                     ",
icon: "success",
button: false,
})
</script>

<?php

}
else
{


?>
&nbsp;<script>

  
swal({
title: "Something went Wrong.",
text: "Please try again",
icon: "error",
button: false,
});
</script>

<?php


}
}
}
?>

<footer>







<div class="footer-top">
  <div class="container confooter">
    <div class="row">
      <div class="col-md-3 col-sm-6 mb-4"> <!-- Added mb-4 class for bottom margin -->
        <h5 style="
    padding-top: 3px; margin-bottom: 7px;
"><span style="color: #9c805c;font-weight: bold;">Car</span> Rental</h5>
        <p class="pfooter">We're proud to be a trusted name in car rental Services, offering a diverse range of cars to suit every need. As a 100% Moroccan company, we're committed to excellence and customer satisfaction. Experience the comfort and reliability of our service firsthand. Welcome to Car Rental, where convenience meets quality.</p>
        <div class="listsocial">
          <a href="" class="iconn" target="_blank"><i class="fa-brands fa-facebook"></i></a>
          <a href="" class="iconn" target="_blank"><i class="fa-brands fa-instagram"></i></a>
          <a href="" class="iconn" target="_blank"><i class="fa-brands fa-youtube"></i></a>
          <a href="" class="iconn" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4"> <!-- Added mb-4 class for bottom margin -->
        <div class="localisation-wrapper">
          <h5 style="
    margin-bottom: 7px;
">Localisation</h5>
                <iframe class="localisation" style="margin-top: 7px;border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6883.946164739419!2d-9.478358052744873!3d30.380122237952072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3c8bd3f08b8f3%3A0x46e3ca6394ef27c5!2sDrarga!5e0!3m2!1sen!2sma!4v1719614455368!5m2!1sen!2sma"  style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4"> <!-- Added mb-4 class for bottom margin -->
        <div class="schedules-wrapper">
          <h5 style="
    margin-bottom: 7px;
">Schedules</h5>
          <div>
            <span  class="bold">Monday - Friday:</span> <span class="time">10:00am - 6:00pm</span><br>
            <span class="bold">Saturday:</span> <span class="time">10:00am - 1:00pm</span><br>
            <span class="bold">Sunday:</span> <span class="time">Closed</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4"> 
        <div class="newsletter-form">
          <h5 style="
    display: flex;
    margin-bottom: -36px;
">Subscriber</h5>
          <form method="post" class="postco" style="margin-top: 41px;">
            <div class="form-group" style="
    display: flex;
">
              <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address">
              <button type="submit" name="emailsubscibe" class="btn btn-block btnhov " style="display: flex;width: 148px;align-items: center;justify-content: center;">Subscribe</button>

            </div>
          </form>
          <p class="subscribed-text">*We send great deals and latest auto news to our subscribed users every week*</p>
        </div>
      </div>
    </div>
  </div>
</div>


  


  
<div class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-push-6 text-right">
        <div class="ml- col-md-5" class="privacf" style="
    font-size: 13px;
    width: 507px;
    line-height: 50px;
">
          <a href="page.php?type=privacy" style="color: #88765d;" class="sec">Privacy Policy</a> |
          <a href="page.php?type=terms" style="color: #88765d;"class="sec">Terms & Condition</a> |
          <a href="page.php?type=FAQ" style="color: #88765d;"class="sec">FAQ</a>
          
          <style>
            @media (max-width:767px) {
              .copy-right{
                margin-top: 18px;
              }
            }
            .footer-bottom {
  background: #222222 none repeat scroll 0 0;
  padding: 0px 0;
  position: relative; /* Add this for absolute positioning of the line */
  text-align: center; /* Center align the content within the footer */
}
    /* Hide the translation toolbar at the top */
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    /* Position the language selection dropdown at the bottom */
    .goog-te-combo {
    outline: none;
    color: white;
    z-index: 1000;
    background-color: #88765d;
    padding: 3px;
    border-radius: 4px;
    }
    .goog-te-gadget {
    top: -14px;
    position: relative;
    font-family: arial;
    font-size: 11px;
    color: #222222;
    white-space: nowrap;
   
}
@media (max-width:767px) {
  .goog-te-gadget{
    position: relative;
    left: -30px;
  }
}
    .VIpgJd-ZVi9od-l4eHX-hSRGPd{
      display:none !important;
    }
    .VIpgJd-ZVi9od-ORHb{
      display:none !important;
    }
    .skiptranslate goog-te-gadget{
      display: none !important;
    }
</style>

<div id="google_translate_element"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en', // Set the default language of your website
            autoDisplay: false, // Disable automatic display of the translate toolbar
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL // Set the layout style
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
    // Function to set the selected language in local storage
    function setSelectedLanguage(targetLanguage) {
        localStorage.setItem('selectedLanguage', targetLanguage);
    }

    // Function to get the selected language from local storage
    function getSelectedLanguage() {
        return localStorage.getItem('selectedLanguage');
    }

    // Get the selected language from local storage
    var selectedLanguage = getSelectedLanguage();

    // If a language is found in local storage, use it; otherwise, default to English
    if (selectedLanguage) {
        var languageSelect = document.querySelector('.goog-te-combo');
        languageSelect.value = selectedLanguage;
        setSelectedLanguage(selectedLanguage);
    }

    // Listen for changes in language selection and store the selected language
    document.addEventListener('change', function(e) {
        var languageSelect = document.querySelector('.goog-te-combo');
        if (e.target === languageSelect) {
            setSelectedLanguage(languageSelect.value);
        }
    });
</script>

    
        </div>
      </div>
      <div class="col-md-6 col-md-pull-6">
        <div class="copy-right-line"></div> <!-- New line for the red line -->
        <p class="copy-right">Copyright &copy; 2024. CarRental </p>
      </div>
    </div>
  </div>
</div>


</footer>
