<?php
include_once 'db.php';
include_once 'header.php';
session_start();
$fetchCurrentReservation = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE reservation_id = {$_GET['code']} AND guest_id = {$_SESSION['guest_ID']}");
$reservation = mysqli_fetch_assoc($fetchCurrentReservation);
if(mysqli_num_rows($reservation)){
  echo "<script>alert(\"Reservation not found.\")
  window.href.location = 'GuestDashboard.php'
  </script>
  ";
}
$fetchCurrentRoom = mysqli_query($conn, "SELECT * FROM room_masterfile WHERE room_id = {$reservation['room_id']}") or die(mysqli_error($conn));
$room = mysqli_fetch_assoc($fetchCurrentRoom);
$fetchAddons = mysqli_query($conn, "SELECT * FROM guestaddons_masterfile as gAddon INNER JOIN addons_masterfile as Addon on gAddon.addons_id = Addon.addons_id WHERE gAddon.reservation_id = {$reservation['reservation_id']} AND gAddon.guest_id = {$_SESSION['guest_ID']}");
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

.table-condensed>tbody>tr>td{
  padding: 5px;
}
.table>tbody>tr>td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.text-left {
  text-align: left;
}
table {
  background-color: transparent;
}
table {
  border-spacing: 0;
  border-collapse: collapse;
}
.table-responsive {
  min-height: .01%;
  overflow-x: auto;
}
.table-responsive {
  min-height: .01%;
  overflow-x: auto;
}
.panel {
  margin-bottom: 20px;
  background-color: #fff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.panel-body {
  padding: 15px;
}
.table>thead:first-child>tr:first-child>td {
  border-top: 0;
}
.table-condensed>tfoot>tr>th{
  padding: 5px;
}
.panel-default {
  border-color: #ddd;
}
.panel-body {
  padding: 15px;
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
          <li class="active">
            <a href="HomepageFinal.php">Home</a>
            <ul class="rq-sub-menu">
              <li>
                <a href="HomepageFinal.php">Homepage 1</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="Rooms.php.php">Room</a>
            <ul class="rq-sub-menu">
              <li>
                <a href="Rooms.php.php">Twin Queen Room</a>
              </li>
              <li>
                <a href ="Rooms.php.php">Queen Room </a>
                <li>
                  <a href="Rooms.php.php">Family Room</a>
                </li>
                <li>
                  <a href="Rooms.php.php">Quad Room</a>
                </li>
                <li>
                  <a href="Rooms.php.php">Female/Male Room</a>
                </li>
                <li>
                  <a href="Rooms.php.php">Dormitory</a>
                </li>
              </ul>
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
            <li class = "active dropdown">
              <a href="Login.php" class = "dropdown-toggle" data-toggle = "dropdown" aria-expanded = "false">
                My Account
                <span class = "caret"></span>
              </a>
              <ul class = "rq-sub-menu">
                <li>
                  <a href="GuestDashboard.php">MY RESERVATION</a>
                </li>
                <li>
                  <a href="logout.php">LOGOUT</a>
                </li>
              </ul>
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
  <br>
  <br>
  <br>
  <br>
  <div class = "container">
    <div class = "row" style = "margin-bottom: 10%">
      <div class = "col-xs-12">
        <button class="btn-hide btn btn-success pull-right hide-this-shit" onclick="window.print()" style="margin-right:1.4%;">Print</button>
        <div class = "col-md-12">
          <!-- policy -->
          <div class = "col-md-3">
            <div class = "panel panel-default">
              <div class = "panel-heading" style = "background-color: #96281B;">
                <h3 class = "text-center">
                  <strong>Policy</strong>
                </h3>
              </div>
              <div class = "panel-body __web-inspector-hidebefore-shortcut__">
                <div class ="table-responsive">
                  <table class = "table table-condensed">
                    <thead>
                      <tr>
                        <td class = "text-left">
                          <strong></strong>
                        </td>
                        <td class = "text-left"></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class = "text-left" bgcolor = "#EBEDF2">Pre Payment</td>
                        <td class = "text-left" bgcolor = "#EBEDF2">
                          asdasdasdasdasdasasasdasdasdasdasasdasdasdasdasdasdasdasdasdasdasd
                          asdasdasdasdasdadasdasdasdasd
                          asdasdasdasd
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                        </td>
                      </tr>
                      <tr>
                        <td class = "text-left" bgcolor = "#EBEDF2">Cancelling</td>
                        <td class = "text-left" bgcolor = "#EBEDF2">Cancelling
                          qweqweqweqweqweqweqwewqwieojqwioeqwioejiqwoejioqwjeqw
                          asdasdqiwoeqjwieoqwjieoqjwieoqwe'asdiqiwjqwioejqwioejqwie'a
                          asdijasiodjqweqwe
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                        </td>
                      </tr>
                      <tr>
                        <td class = "text-left" bgcolor = "#EBEDF2">Rebooking</td>
                        <td class = "text-left" bgcolor = "#EBEDF2">
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                          qwoejqowiejqowiejioqwjeoiqwjeoiqwjeoiqjweioqwjioejqwoeiqjwieoqwejqiowjeioq
                          qwiejqiwoejoqwijeiqwjeioqwjeqwioqjweoiqwjeioqjeqqiwejqiwejqowie
                          qweqweqweqweqweqweqwew
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- guest info -->
            <div class = "col-md-9">
              <div class = "panel panel-default">
                <div class = "panel-heading" style = "background-color: red">
                  <h3 class = "text-center">
                    <strong>Guest Information</strong>
                  </h3>
                </div>
                <div class = "panel-body">
                  <div class = "table-responsive">
                    <table class = "table table-condensed">
                      <thead>
                        <tr>
                          <td class = "text-left">
                            <strong>Name:</strong>
                          </td>
                          <td class = "text-left">
                            <?= "{$_SESSION['firstname']} {$_SESSION['lastname']}" ?>
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td bgcolor = "#EBEDF2" class = "text-left">
                            <strong>Email</strong>
                          </td>
                          <td class = "text-left" bgcolor= "#EBEDF2">
                            <?= $_SESSION['email'] ?>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor = "#EBEDF2" class = "text-left">
                            <strong>Cellphone:</strong>
                          </td>
                          <td class = "text-left" bgcolor= "#EBEDF2">
                            <?= $_SESSION['contactNumber'] ?>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor = "#EBEDF2" class = "text-left">
                            <strong>Address:</strong>
                          </td>
                          <td class = "text-left" bgcolor= "#EBEDF2">
                            <?= $_SESSION['address'] ?>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor = "#EBEDF2" class = "text-left">
                            <strong>Check-in</strong>
                          </td>
                          <td class = "text-left" bgcolor= "#EBEDF2">
                            <?= $reservation['checkindate'] ?>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor = "#EBEDF2" class = "text-left">
                            <strong>Check out</strong>
                          </td>
                          <td class = "text-left" bgcolor= "#EBEDF2">
                            <?= $reservation['checkoutdate'] ?>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor = "#EBEDF2" class = "text-left">
                            <strong>Number of Guest</strong>
                          </td>
                          <td class = "text-left" bgcolor= "#EBEDF2">
                            <?= $reservation['number_guest'] ?>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor = "#EBEDF2" class = "text-left">
                            <strong>Extra Services:</strong>
                          </td>
                          <td class = "text-left" bgcolor= "#EBEDF2">

                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- billing -->
            <div class = "col-md-9">
              <div class = "panel panel-default">
                <div class = "panel-heading" style = "background-color: red">
                  <h3 class = "text-center">
                    <strong>Total Billing</strong>
                  </h3>
                </div>
                <div class = "panel-body" stlye = "margin-bottom: -25px">
                  <div class = "table-responsive">
                    <table class = "table table-condensed">
                      <thead>
                        <tr>
                          <td><strong></strong></td>
                          <td><strong></strong></td>
                          <td class = "text-center">
                            <strong>Number of Room/s</strong>
                          </td>
                          <td class = "text-right">
                            <strong>Cost</strong>
                          </td>
                        </tr>
                      </thead>
                      <tbody> 
                        <tr>
                          <td class="text-left" bgcolor="#EBEDF2">
                            <strong>Type of Room</strong>
                          </td>
                          <td class="text-left" bgcolor="#EBEDF2">
                            <?= $room['room_type'] ?>
                          </td> 
                          <td class="text-center" bgcolor="#EBEDF2">
                            1
                          </td>
                          <td class="text-right" bgcolor="#EBEDF2">
                            php
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left" bgcolor="#EBEDF2">
                            <strong>Length of stay</strong>
                          </td>
                          <td class="text-left" bgcolor="#EBEDF2">
                            1
                          </td>
                          <td class="text-left" bgcolor="#EBEDF2">

                          </td>
                          <td class="text-right" bgcolor="#EBEDF2">

                          </td>
                        </tr>
                        <tr>
                          <td class="highrow text-left">

                          </td>
                          <td class="highrow text-left">

                          </td>
                          <td class="highrow text-center">
                            <strong>Subtotal (per rooms picked)</strong>
                          </td>
                          <td class="highrow text-right">
                           php
                         </td>
                       </tr>
                       <tr>
                        <td class="text-left" bgcolor="#EBEDF2">

                        </td>
                        <td class="text-left" bgcolor="#EBEDF2">

                        </td>
                        <td class="text-center" bgcolor="#EBEDF2">
                          <strong>Vatable</strong>
                        </td>
                        <td class="text-right" bgcolor="#EBEDF2">
                          php
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left">

                        </td>
                        <td class="text-left">
                          <strong></strong>
                        </td>
                        <td class="text-center">
                          <strong>VAT 12%</strong>
                        </td>
                        <td class="text-right">
                          php
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left" bgcolor="#EBEDF2">

                        </td>
                        <td class=" text-left" bgcolor="#EBEDF2">

                        </td>
                        <td class=" text-center" bgcolor="#EBEDF2">
                          <strong>Down payment</strong>
                        </td>
                        <td class=" text-right" bgcolor="#EBEDF2">
                          php
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left">

                        </td>
                        <td class="text-left">

                        </td>
                        <td class=" highrow text-center">
                          <strong>Total</strong>
                        </td>
                        <td class=" highrow text-right">
                          php
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <h3>Payment Proof:</h3>
            <form class="hide-this-shit hidden-xs" method="post" action = 'ajax/uploadproof.php' style="display:inline; float:right !important;" enctype="multipart/form-data">
              <input class="hide-this-shit hidden-xs" type="file" name="img" style="display:inline;">
              <button class="hide-this-shit hidden-xs" name="upload" onclick="return confirm('Are you sure you want to save the changes?')" style="display:inline;">
                Upload
              </button> 
            </form>
          </div>
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
          <script>
            $(document).ready(function(){
              $('form').on('submit',function(e){
                e.preventDefault();  
                var form_data = new FormData()
                form_data.append('img', $('input[type=file]').prop('files')[0])       
                $.ajax({
                  url:'ajax/uploadproof.php',
                  type:'post',
                  data:form_data,
                  contentType: false,
                  processData: false,
                  success:function(html){
                    alert("Success")
                  }
                })
              })
            })
          </script>
        </body>
        </html>