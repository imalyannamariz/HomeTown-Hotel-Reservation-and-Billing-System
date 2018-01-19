<?php
// 
  session_start();
  include_once 'db.php';
  include_once 'header.php';
  if(isset($_GET['Step3.php'])){
    ?>
    <script>
      alert("Email already taken.");
    </script>
    <?php
  }
  if(isset($_SESSION['login'])){
    $_SESSION['roomno'] = $_POST['roomno'];
    $_SESSION['roomname'] = $_POST['roomname'];
    $_SESSION['services'] = $_POST['services'];
    header('Location: Step4.php'); 
  }
?>

<style>
.navbar-brand{
  margin-top: -22px;
  margin-right: 5px;
}
</style>
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
                <ul class="rq-sub-menu">
                    <li>
                        <a href="HomepageFinal.php">Homepage 1</a>
                    </li>
                </ul>
              </li>
              <li>
                <a href="Rooms.php">Room</a>
                <ul class="rq-sub-menu">
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
                </ul>
              </li>
              <li>
                <a href="about-us.html">About</a>
              </li>
              <li>
                <a href="contact.html">Contact</a>
              </li>
              <li class = "active">
                <a href="Step1.php">Reservations</a>
              </li>
              <?php if(isset($_SESSION['login'])){  ?>
                            <li class="active dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded = "false">
                                    MY ACCOUNT<span class="caret"></span>
                                </a>
                                <ul class="rq-sub-menu">
                                  <li><a href="GuestDashboard.php">MY RESERVATIONS</a></li> 
                                  <li><a href="Logout.php">LOGOUT</a></li>
                                </ul>
                            </li>
                            <?php } else { ?> 
                            <li><a href="login.php">LOGIN</a></li>
                            <?php } ?> 
              
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
   <div class="rq-checkout-banner">
      <div class="rq-checkout-banner-mask">
        <div class="container">
          <div class="rq-checkout-banner-text">
            <div class="rq-checkout-banner-text-middle">
              <h1>booking</h1>
            </div>
          </div>
       </div>
      </div>
    </div><!-- / rq-banner-area-->
    <div class="rq-checkout-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-6">
            <form method = "POST" action = "validate.php">
               <h1 class="rq-checkout-form-title">personal information</h1>
              <div class="row">
                 <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="firstName">FIRST NAME <span>*</span></label>
                      <input type="text" name = "firstName" class="form-control" id="firstName" pattern = "[a-zA-Z]+" required onkeypress="return isLetter(event)">
                    </div>
                 </div>
                 <div class="col-md-6 col-sm-6">
                   <div class="form-group">
                      <label for="lastName">LAST NAME<span>*</span></label>
                      <input type="text" name = "lastName" class="form-control" id="lastName" pattern = "[a-zA-Z]+" required onkeypress="return isLetter(event)">
                    </div>
                 </div>
               </div><!------/row-------->

               <div class="row">
                 <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="email">EMAIL<span>*</span></label>
                      <input type="email" name = "email" class="form-control" id="email"  required>
                    </div>
                 </div>
                 <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="ContactNumber">CONTACT NUMBER<SPAN>*</SPAN></label>
                      <input type="text" name = "contactNumber" pattern = "[0-9]+" class="form-control" id="contactNumber" required onkeypress="return isNumber(event)" id="contactNumber">
                    </div>
                 </div>
               </div><!------/row-------->

               <!--country and address-->
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="Password">PASSWORD</label>
                      <input type="password" name = "password" class="form-control" id="password" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">          
                      <label for="Password">CONFIRM PASSWORD</label>
                      <input type="password" name = "confirmPassword" class="form-control" id="password" required>
                    </div>               
               </div><!------/row-------->

               <div class="row">
                 <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for = "address">ADDRESS</label>
                      <input type="text" class="form-control" name="address" required>
                    </div>
                 </div>
                 <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="country">COUNTRY</label>
                        <div class="rq-checkout-form1 rq-checkout-country">
                          <select required name="country" class="js-example-placeholder-single form-control rq-checkout-form-select">
                            <option>&nbsp;</option>
                            <option value="Australia">Australia</option>
                            <option value="China">China</option>
                            <option value="HongKong">Hong Kong</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Philippines" selected="selected">Philippines</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Thailand">Thailand</option>
                            <option value="UAE">United Arab Emirates</option>
                            <option value="UK">United Kingdom</option>
                            <option value="USA">United States</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                    </div>
                 </div>
               </div>         
             </div>
            <h1 class="rq-checkout-form-title">additional information</h1>
            <div class="form-group">
              <label for="orderNotes">order notes</label>
              <textarea class="form-control" rows="5" id="orderNotes"></textarea>
            </div>
            <!-- <a class="rq-btn-primary" href="#" role="button"></a> -->
            <button class="btn btn-lg btn-primary" name="submit" type="submit">book now</button>
            </form>
          </div>
        </div>
      </div>
    </div><!-- / rq-checkout-form-->

       <!-- VALIDATION - Numbers only (cellphone number) -->
    <!-- Nasa onkeypress event ng respective input type. -->
    <script type="text/javascript">
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>

    <!-- VALIDATION - Letters and white spaces only (First Name, Last Name) -->
    <!-- Nasa onkeypress event ng respective input type. -->
    <script type="text/javascript">
        function isLetter(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (!(charCode >= 65 && charCode <= 122) && (charCode != 32 && charCode != 0)) {
                return false;
            }
            return true;
        }
    </script>

      <!-- Footer -->
    <footer class="footer">
        <div class="rq-footer-top">
          <div class="container">
            <div class="row">
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="footer-logo">
                  <img src="img/footer-logo.png" class="img-responsive" alt="Responsive image" />
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <h5>address</h5>
                <address>
                    <ul>
                      <li class="rq-hotel-address"><i class="fa fa-map-marker"></i>Green lake, Hotel plaza <br>new york, USA</li>
                      <li class="rq-phone"><i class="fa fa-phone"></i>807 302 2186</li>
                      <li class="rq-email"><i class="fa fa-envelope-o"></i>mail@domain.com</li>
                  </ul>
                </address>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <h5>useful link</h5>
                <ul class="rq-footer-links">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Booking System</a></li>
                  <li><a href="#">Hotel Services</a></li>
                  <li><a href="#">Booking Agent</a></li>
                  <li><a href="#">Conntact</a></li>
                </ul>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
              <h5>newsletter</h5>
                <input type="email" class="form-control" id="rq-news-letter" placeholder="Email">
                <div class="rq-common-btn">
                   <button class="btn rq-btn-primary" type="submit">submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="rq-footer-bottom">
            <div class="container">
                <div class="row">
                    <p>&copy;Copyright  2017. All right researved</p>
                </div>
            </div>
        </div>
    </footer>
  </div><!-- main-wrapper -->
  <!-- Latest jQuery plugin-->
  <script src="js/main.js"></script>
  <!-- Latest compiled and minified JavaScript for bootstrap-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
   <!-- <script src="js/bootstrap-datepicker.js"></script> -->
  <script src="js/icheck.min.js"></script>
  <script src="js/jquery.raty.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <script src="js/scripts.js"></script>


</body>
</html>