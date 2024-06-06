
<body>

<div class="brand clearfix">
  <a href="dashboard.php" style="position: absolute;padding: 15px;color: white;font-size: 20px;">CarRental - Admin Panel</a>  
  <span class="menu-btn"><i class="fa fa-bars"></i></span>
  <ul class="ts-profile-nav">
    
  <li class="ts-account">
  <a href="#" class="dropdown-toggle" tabindex="0">
   <i class="fa-solid fa-user-tie" class="ts-avatar hidden-side" style="
    font-size: 17px;
    padding-right: 8px;
"></i> Account 
    <i class="fa fa-angle-down hidden-side"></i>
  </a>
  <ul class="dropdown-menu" style="height: 23px;left: 0px;border: none;top: 49px;position: absolute;background-color: transparent;">
    <li class="changep"><a href="change-password.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</li>

  </ul>
</div>

<script>
  var accountLink = document.querySelector('.brand .ts-profile-nav .ts-account a');
  accountLink.addEventListener('click', function(e) {
    e.preventDefault(); // Prevents the default link behavior
    var ul = this.nextElementSibling;
    if (ul.style.visibility === 'visible') {
      ul.style.visibility = 'hidden';
      ul.style.opacity = 0;
    } else {
      ul.style.visibility = 'visible';
      ul.style.opacity = 1;
    }
    accountLink.blur(); // Remove focus from the link after clicking
  });




  document.querySelectorAll('.ts-account .dropdown-toggle').forEach(function(toggle) {
  toggle.addEventListener('click', function(event) {
    event.preventDefault();
    this.parentElement.classList.toggle('open');
  });
});
</script>

</body>
</html>
