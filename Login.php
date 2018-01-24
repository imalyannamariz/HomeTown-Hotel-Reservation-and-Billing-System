<?php
// 
  session_start();
  include_once 'db.php';
  include_once 'header.php';
  if(isset($_GET['login'])){
    ?>
    <script>
      alert("Incorrect username and password");
    </script>
    <?php
  }
?>


<style>
.navbar-brand{
  margin-top: -22px;
  margin-right: 5px;
}
.btn-primary {
    color: #fff;
    background-color: #96281B;
    border-color: #96281B;
}
</style>
<body>
  <header>
    <!-- Navigation Menu start-->
    <nav class="navbar rq-header-main-menu navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Navbar Toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" style = "margin-right: 20px;">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Logo -->
            <a class="navbar-brand" href="HomepageFinal.php"><img class="logo" src="HometownLogo.png" alt="Hometown"></a>
        </div>
        <!-- Navbar Toggle End -->

        <!-- navbar-collapse start-->
        <div id="nav-menu" class="navbar-collapse rq-menu-wrapper collapse navbar-right" role="navigation">
          <ul class="nav navbar-nav rq-menus">
              <li class="">
                <a href="HomepageFinal.php">Home</a>
                <!-- <ul class="rq-sub-menu">
                    <li>
                        <a href="HomepageFinal.php">Homepage 1</a>
                    </li>
                </ul> -->
              </li>
              <li>
                <a href="Rooms.php">Room</a>
                <!-- <ul class="rq-sub-menu">
                    <li>
                        <a href="Rooms.php">Twin Queen Room</a>
                    </li>
                    <li>
                        <a href ="Rooms.php">Queen Room </a>
                    <li>
                        <a href="Rooms.php">Family Room</a>
                    </li>
                    <li>
                        <a href="Rooms.php">Quad Room</a>
                    </li>
                    <li>
                        <a href="Rooms.php">Female/Male Room</a>
                    </li>
                     <li>
                        <a href="Rooms.php">Dormitory</a>
                    </li>
                </ul> -->
              </li>
              <li>
                <a href="about-us.html">About</a>
              </li>
              <li>
                <a href="contact.html">Contact</a>
              </li>
              <li>
                <a href="Step1.php">Reservations</a>
              </li>
              <li class="active">
                <a href="Login.php">Login</a>
              </li>
              
          </ul>
        </div>
        <!-- navbar-collapse end-->

        <!--<div class="rq-extra-btns-wrapper">
            <button id="rq-side-menu-btn" class="cd-btn btn rq-sidemenu-btn"></button>
        </div>

      </div>
    </nav>
    <!-- Navigation Menu end-->
  </header> <!-- / rq-header-section end here-->

  <div class = "container" style = "margin-top:150px">
    <div class = "container" style = "width:30%; margin-left:35%; margin-top:5;">
      <form action = "authenticate_login.php" method = "post">
        <p style ="color:red; text-align:center;"></p>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
      <button name="submit" class="btn btn-primary">Log in</button>
    </form>
  </div>
</div>

 <script src="js/main.js"></script>

  <!-- Latest compiled and minified JavaScript for bootstrap-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
   <script src="js/parallax.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/jquery.raty.js"></script>
  <script src="js/icheck.min.js"></script>
  <script src="js/moment-min.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>
