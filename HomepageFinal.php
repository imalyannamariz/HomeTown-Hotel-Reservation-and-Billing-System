<?php
  include_once 'db.php';
  include_once 'header.php';
  session_start();
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
              <li class="active">
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
             <!--  <li>
                <a href="Confirm-Account.php">Reservations</a>
              </li> -->
             <li>
              <?php
                if (isset($_SESSION['Login'])) { ?>
                      <a href="Step1.php">Reservations</a>
               <?php } else { ?>
                      <a href="Confirm-Account.php">Reservation</a>
               <?php } ?>
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
  
  <div id="home2-banner" class="rq-banner-area">
    <div class="rq-banner-area-mask">
      <div class="container">
        <div class="bq-banner-text">
          <div class="bq-banner-text-middle">
            <h3>Hometown Hotel </h3>
            <div class="rq-checkout-area">
              <div class="container">
                <div class="rq-cheakout-content">
              </div><!-- / container-->
            </div><!-- / checkout-area-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- / rq-banner-area-->
  <!-- Room Package -->
  <section class="rq-room-package-section">
    <div class="container">
      <div class="row">
        <h2 class="text-center">ROOMS &amp; PACKAGES</h2>

        <div class="rq-room-package-wrapper">
          <!-- PACKAGE ITEM -->
          <div class="rq-room-package rq-dbl-width">
            <picture>
                <source media="(min-width: 768px)" srcset=img/placeholder-770.jpg>
                <img alt="Image" src="img/placeholder-770.jpg" srcset=img/placeholder-770.jpg>
            </picture>

            <a href="#" class="rq-img-overlay-effect">
              <p class="rq-room-name-price">
                <span class="rq-room-title">COMBO BUFFET</span>
                <span class="rq-package-price">$250</span>
              </p>
            </a>
          </div>
          <!-- END -->
          <!-- PACKAGE ITEM -->
          <div class="rq-room-package rq-dbl-height">
            <picture>
                <source media="(min-width: 768px)" srcset=img/placeholder-high.jpg>
                <img alt="Image" src="img/placeholder-high.jpg" srcset=img/placeholder-high.jpg>
            </picture>

            <a href="#" class="rq-img-overlay-effect">
              <p class="rq-room-name-price">
                <span class="rq-room-title">DINNER PACKEGE</span>
                <span class="rq-package-price">$250</span>
              </p>
            </a>
          </div>
          <!-- END -->

          <!-- PACKAGE ITEM -->
          <div class="rq-room-package">
            <picture>
                <source media="(min-width: 768px)" srcset=img/placeholder-square.jpg>
                <img alt="Image" src="img/placeholder-square.jpg" srcset=img/placeholder-square.jpg>
            </picture>

            <a href="#" class="rq-img-overlay-effect">
              <p class="rq-room-name-price">
                <span class="rq-room-title">MASTER ROOM</span>
                <span class="rq-package-price">$250</span>
              </p>
            </a>
          </div>
          <!-- END -->

          <!-- PACKAGE ITEM -->
          <div class="rq-room-package">
            <picture>
                <source media="(min-width: 768px)" srcset=img/placeholder-square.jpg>
                <img alt="Image" src="img/placeholder-square.jpg" srcset=img/placeholder-square.jpg>
            </picture>

            <a href="#" class="rq-img-overlay-effect">
              <p class="rq-room-name-price">
                <span class="rq-room-title">SUNSET DELUXE</span>
                <span class="rq-package-price">$250 <span>night</span></span>
              </p>
            </a>
          </div>
          <!-- END -->
        </div>
      </div>
    </div>      
  </section>
<!-- Room Package End -->
<div class="rq-slider-area rq-what-we-offer">
    <div class="rq-main-slider-mask"></div>
    <div class="our-offer">
      <h2 class="text-center">what we offer</h2>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12 rq-our-offer">
              <div class="thumbnail">
                <div class="rq-img-wrapper">
                  <picture>
                      <source media="(min-width: 768px)" srcset=img/placeholder-square.jpg>
                      <img alt="Image" src="img/placeholder-square.jpg" srcset=img/placeholder-square.jpg>
                  </picture>
                </div>

                <div class="caption">
                  <h3><a href="#">large cafe</a></h3>
                  <p>point of using that has more less normal distribution is among</p>
                  <h4 class="special-span"><span>$250</span>Night</h4>
                </div>
              </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 rq-our-offer">
              <div class="thumbnail">
                <div class="rq-img-wrapper">
                  <picture>
                      <source media="(min-width: 768px)" srcset=img/placeholder-square.jpg>
                      <img alt="Image" src="img/placeholder-square.jpg" srcset=img/placeholder-square.jpg>
                  </picture>
                </div>
                <div class="caption">
                  <h3><a href="#">rooftop cusine</a></h3>
                  <p>point of using that has more less normal distribution is among</p>
                  <h4 class="special-span"><span>$250</span>Night</h4>
                </div>
              </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 rq-our-offer">
              <div class="thumbnail">
                <div class="rq-img-wrapper">
                  <picture>
                      <source media="(min-width: 768px)" srcset=img/placeholder-square.jpg>
                      <img alt="Image" src="img/placeholder-square.jpg" srcset=img/placeholder-square.jpg>
                  </picture>
                </div>
                <div class="caption">
                  <h3><a href="#">premium living</a></h3>
                  <p>point of using that has more less normal distribution is among</p>
                  <h4 class="special-span"><span>$250</span>Night</h4>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div><!----------------/rq-slider-area-------------------------->
  <div id="testimonial" class="rq-content-making-area">
    <div class="container ">
      <div class="rq-owl-carousel-content">
         <div class="owl-carousel">
             <div class="rq-content-making-item">
             <div class="rq-content-logo text-center center-block">
                <i class="fa fa-quote-right" aria-hidden="true"></i>
             </div>
              <p class="text-center">Content making readable English desktop publishing packages editors point using is that making readable English desktop publishing packages editors point using it has a normal distribution as oppo</p>
              <p class="rq-special text-center">ADRAIN SMITH</p>
           </div>
           <div class="rq-content-making-item">
             <div class="rq-content-logo text-center center-block">
                <i class="fa fa-quote-right" aria-hidden="true"></i>
             </div>
              <p class="text-center">Content making readable English desktop publishing packages editors point using is making readable English desktop publishing packages editors point using it has a normal distribution as oppo</p>
              <p class="rq-special text-center">ADRAIN SMITH</p>
           </div>
           </div>
      </div>
    </div><!------/container -------->
  </div><!-- / rq-content-making-area-->

  <div id="map"></div>

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
                      <li class="rq-hotel-address"><i class="fa fa-map-marker"></i> 57 Epifanio de los Santos Ave, Makati,<br>new york, USA</li>
                      <li class="rq-phone"><i class="fa fa-phone"></i>(02) 805 3386</li>
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
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
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
                    <p>&copy;Copyright  2016. All right researved</p>
                </div>
            </div>
        </div>
    </footer>



  <!-- Latest jQuery plugin-->
  <script src="js/main.js"></script>
  <!-- Latest compiled and minified JavaScript for bootstrap-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpKAwq-qKxzm-9D1405KCFp7ZTtu_Vimg"></script>
  <script src="js/googleMap.js"></script>
  <script src="js/customGoogleMap.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/icheck.min.js"></script>
  <script src="js/jquery.raty.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>