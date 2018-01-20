<?php
  include_once 'db.php';
  include_once 'header.php';
  session_start();
 if(!isset($_SESSION['login'])){
    echo "<script>alert('Please login to continue')
    window.location.href = 'login.php';
    </script>";
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
.modal-body {
    min-height: 16.43px;
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
}
.modal-body1 {
    min-height: 16.43px;
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
}
</style>
<body>
  <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalWrapper">
      <div class="modal-dialog modal-lg" role="document" id="modalWrapper">
        <div class="modal-content">
          <div class="modal-body">
          <h4 class = "modal-title" id = "myModalLabel1">Confirm Reservation</h4>
        </div>
          <div class = "modal-body1">
            <b>
              Verify your Email address
            </b>
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <b>
              Kindly upload the screenshot of your deposit slip at your account immediately. Reservations will not be entertained without payment proof.<br>
              <br>
              <br>
              You can view and print your payment, and upload your payment proof so that the Hotel can confirm your reservation. You may also cancel your reservation using your account.
            </b>
          </div>
          <div class = "modal-footer">
            <button type="button" class="cancel btn" onclick="" data-dismiss="modal">Close</button>
            <a href="reserve.php">
              <button type="button" class="confirm btn btn-primary" onclick="">Confirm</button>
            </a>
          </div>
        </div>          
      </div>
    </div>
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
              <li>
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
  <br>
  <br>
  <br>
  <br>
  <div class = "container">
    <div class = "row" style = "margin-bottom: 10%">
      <div class = "col-xs-12">
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
                        <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td bgcolor = "#EBEDF2" class = "text-left">
                        <strong>Email</strong>
                      </td>
                      <td class = "text-left" bgcolor= "#EBEDF2">
                        <?php echo $_SESSION['email'];?>
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor = "#EBEDF2" class = "text-left">
                        <strong>Cellphone:</strong>
                      </td>
                      <td class = "text-left" bgcolor= "#EBEDF2">
                        <?php echo $_SESSION['contactNumber'];?>
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor = "#EBEDF2" class = "text-left">
                        <strong>Address:</strong>
                      </td>
                      <td class = "text-left" bgcolor= "#EBEDF2">
                        <?php echo $_SESSION['address']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor = "#EBEDF2" class = "text-left">
                        <strong>Check-in</strong>
                      </td>
                      <td class = "text-left" bgcolor= "#EBEDF2">
                        (<?php echo $_SESSION['reservation']['checkInDate'];?>)
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor = "#EBEDF2" class = "text-left">
                        <strong>Check out</strong>
                      </td>
                      <td class = "text-left" bgcolor= "#EBEDF2">
                        (<?php echo $_SESSION['reservation']['checkOutDate'];?>)
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor = "#EBEDF2" class = "text-left">
                        <strong>Number of Guest</strong>
                      </td>
                      <td class = "text-left" bgcolor= "#EBEDF2">
                        (<?php echo $_SESSION['reservation']['numberOfAdults']; ?>)
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor = "#EBEDF2" class = "text-left">
                        <strong>Extra Services:</strong>
                      </td>
                      <td class = "text-left" bgcolor= "#EBEDF2">
                        <?php
                          if(count($_SESSION['reservation']['services']) != 0){
                              foreach($_SESSION['reservation']['services'] as $service => $service_name)
                                echo $service_name;
                                   
                                   }else{
                                    echo "None";
                                   }?>
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
                            <?= $_SESSION['reservation']['roomname']?>
                          </td> 
                          <td class="text-center" bgcolor="#EBEDF2">
                          <?= $_SESSION['reservation']['roomno'] ?>
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
                      <?php $daydiff = (strtotime($_SESSION['reservation']['checkOutDate']) - strtotime($_SESSION['reservation']['checkInDate']))/(60*60*24);
                        echo $daydiff;
                      ?>
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
      <button class="btn btn-primary nextBtn btn-lg pull-right confirm" data-toggle="modal" data-target="#myModal" type="button" style="margin-right: 1px; margin-top: 10px; background-color: #01b1d7; border: 1; border-radius: 3px">
      Confirm
    </button>
      <a href="step2.php">
        <button class="btn btn-primary prevBtn btn-lg pull-right"  type="button" style="margin-right: 10px; margin-top: 10px; background-color: #01b1d7; border: 1; border-radius: 3px">
        Previous
      </button>
    </a>
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

</script>
</body>
</html>