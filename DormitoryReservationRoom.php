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
                <ul class="rq-sub-menu">
                    <li>
                        <a href="HomepageFinal.php">Homepage 1</a>
                    </li>
                </ul>
              </li>
              <li>
                <a href="select-room-grid.html">Room</a>
                <ul class="rq-sub-menu">
                    <li>
                        <a href="select-room-grid.html">Twin Queen Room</a>
                    </li>
                    <li>
                        <a href ="select-room-grid.html">Queen Room </a>
                    <li>
                        <a href="single-room.html">Family Room</a>
                    </li>
                    <li>
                        <a href="single-room.html">Quad Room</a>
                    </li>
                    <li>
                        <a href="single-room.html">Female/Male Room</a>
                    </li>
                     <li>
                        <a href="single-room.html">Dormitory</a>
                    </li>
                </ul>
              </li>
              <li>
                <a href="about-us.html">About</a>
              </li>
              <li>
                <a href="contact.html">Contact</a>
              </li>
              <li class="active">
                <a href="contact.html">Reservations</a>
              </li>
              <li class="">
                <a href="contact.html">Login</a>
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
 
  <form action = "cart.html" method = "get" id = "form1">
    <div class="rq-single-room-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-5 col-lg-4">
            <div class="rq-single-room-checkin">
                <div class="rq-check-in-out-wrapper">
                    <div class="rq-check-in-out">
                        <h2>CHECK IN</h2>
                        <div class="rq-check-in-out-display" id="rq-check-in">
                            <input type="text" id="rq-checkin-date" hidden>
                            <div class="rq-dmy-wrapper">
                                <p class="rq-single-date"></p>
                                <p class="rq-month-year">
                                    <span class="rq-single-month"></span>
                                    <span class="rq-single-year"></span>
                                </p>
                            </div>
                        </div>
                        <div class="rq-check-in-out-time" id="rq-check-in-time">
                            <div class="rq-time-wrapper">
                                <input type="text" name="rq-checkin-time" id="rq-checkin-time" hidden>
                                <span class="rq-checkin-time">TIME</span>
                            </div>
                        </div>
                    </div>

                    <div class="rq-check-in-out">
                        <h2>CHECK OUT</h2>
                        <div class="rq-check-in-out-display" id="rq-check-out">
                            <input type="text" id="rq-checkout-date" hidden>
                           <div class="rq-dmy-wrapper">
                                <p class="rq-single-date"></p>
                                <p class="rq-month-year">
                                    <span class="rq-single-month"></span>
                                    <span class="rq-single-year"></span>
                                </p>
                            </div>
                        </div>
                        <div class="rq-check-in-out-time" id="rq-check-out-time">
                            <div class="rq-time-wrapper">
                                <input type="text" name="rq-checkout-time" id="rq-checkout-time" hidden>
                                <span class="rq-checkout-time">TIME</span>
                            </div>
                        </div>
                    </div>
                </div><!--  / date & time picker -->
              <h2>total Room</h2>
              <div class="rq-total">
                <select class="js-example-placeholder-single form-control">
                  <option>&nbsp;</option>
                  <option value="1">Single Bed</option>
                  <option value="2">Double Bed</option>
                 
                </select>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <h2>ADULT</h2>
                  <div class="rq-adult">
                    <select class="js-example-placeholder-single form-control">
                      <option>&nbsp;</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h2>children</h2>
                  <div class="rq-children">
                     <select class="js-example-placeholder-single form-control">
                      <option>&nbsp;</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </div>
                </div>
              </div><!-------  /row  ------------>
              <h2>extra service</h2>
              <div class="rq-extra">
                <div class="rq-extra-content">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Extra Bed
                    </label>
                  </div>
                  <p><span>P 400 </span>/ Group / Trip</p>
                </div>
                <div class="rq-extra-content rq-extra-content-2">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Airport Transfer
                    </label>
                  </div>
                  <p><span>P 250 </span>/ Group / Trip</p>
                </div>
              </div>
              <button class="rq-btn-primary form-control" type="submit">check availability</button>
              <!-- <a class="btn btn-default" href="#" role="button">check availability</a> -->
            </div>
          </div>
          <div class="col-md-8 col-sm-7 col-lg-8">
            <div class="rq-flex-slider">
              <!-- Place somewhere in the <body> of your page -->
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="./img/Dorm1.jpg" alt="Slider Image" />
                  </li>
                  <li>
                    <img src="./img/Dorm3.jpg" alt="Slider Image" />
                  </li>
                  <li>
                    <img src="./img/Dorm2.jpg" alt="Slider Image" />
                  </li>
                </ul>
              </div>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="./img/Dorm1.jpg" alt="Slider Image" />
                  </li>
                  <li>
                    <img src="./img/Dorm3.jpg" alt="Slider Image" />
                  </li>
                  <li>
                    <img src="./img/Dorm2.jpg" alt="Slider Image" />
                  </li>
                </ul>
              </div>
            </div><!------------/rq-flex-slider---------------------->
            <div class="single-room-text">
              <div class="rq-singleRoom-text-head">
                <div class="rq-singleRoom-text-head-left">
                  <h2>Dormitory ROOM</h2>
                  <h4><span>P 400 / </span> Night</h4>
                </div>
                <div class="rq-singleRoom-text-head-right pull-right">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div><!------------/rq-singleRoom-text-head ---------------------->
              <div class="rq-single-room-para">
              <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralizd of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bounds toOn the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralize</p>
              <p>of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bounds toblame belongs to those who fail in their duty through weakness of will, which is the same</p>

              </div><!------------/rq-single-room-para---------------------->
              <div class="single-room-text-custom">
               <ul class="nav">
                 <li role="presentation"><span class="badge"><i class="fa fa-check" aria-hidden="true"></i></span>Decorated room, proper air condioned</li>
                 <li role="presentation"> <span class="badge"><i class="fa fa-check" aria-hidden="true"></i></span>Saloon, gym, spa facilities</li>
                 <li role="presentation"><span class="badge"><i class="fa fa-check" aria-hidden="true"></i></span>24 hours room service</li>
               </ul>
             </div>
             
    
            </div>
          </div>
        </div>
      </div>
    </div><!-- / rq-single-room-area-->




 <script src="js/main.js"></script>
  <!-- Latest compiled and minified JavaScript for bootstrap-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/moment-min.js"></script>
  <script src="js/icheck.min.js"></script>
  <script src="js/jquery.raty.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>


 <script src="js/main.js"></script>
  <!-- Latest compiled and minified JavaScript for bootstrap-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/moment-min.js"></script>
  <script src="js/icheck.min.js"></script>
  <script src="js/jquery.raty.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>
