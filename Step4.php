<?php
include_once 'db.php';
include_once 'header.php';
session_start();
if(!isset($_SESSION['login'])){
  echo "<script>
  window.location.href = 'Confirm-Account.php';
  </script>";
}
echo print_r($_SESSION['reservation']);
if(!isset($_SESSION['reservation']) || count($_SESSION['reservation']) < 4){
  header("Location: Step1.php");
}
$_SESSION['reservation']['roomid'] = $_POST['roomid'];
$_SESSION['reservation']['roomno'] = $_POST['roomno'];
$_SESSION['reservation']['roomname'] = $_POST['roomname'];
$_SESSION['reservation']['services'] = $_POST['services'];

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
          <a href ='reserve.php'>
            <button type="button" class="confirm btn btn-primary" onclick="">Confirm</button>
          </a>
        </div>
      </div>          
    </div>
  </div>
  <?php
  include_once 'navigationBar.php';
  ?>
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
              <div class = "panel-heading" style = "background-color: red;">
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
                        <td class = "text-left" bgcolor = "#EBEDF2">Pre-Payment</td>
                        <td class = "text-left" bgcolor = "#EBEDF2">
                          As per hotel policy, you are to <br> 
                          pay your 15% downpayment to <br>
                          our bank account as deposit, <br>
                          take a screenshot of it and <br>
                          upload it to your customer <br>
                          dashboard. When you have <br>
                          successfully uploaded the <br> 
                          Hotel will monitor your <br>
                          records and confirm your <br>
                          reservation. All pending <br>
                          reservations must be settled <br>
                          within 3 days, else it will <br>
                          expire. <br>
                        </td>
                      </tr>
                      <tr>
                        <td class = "text-left" bgcolor = "#EBEDF2">Cancelling</td>
                        <td class = "text-left" bgcolor = "#EBEDF2">
                          You can cancel your pending <br>
                          reservations using the <br>
                          customer dashboard.
                        </td>
                      </tr>
                      <tr>
                        <td class = "text-left" bgcolor = "#EBEDF2">Rebooking</td>
                        <td class = "text-left" bgcolor = "#EBEDF2">
                          You can modify your pending <br>
                          reservations using the <br>
                          customer dashboard.
                        </td>
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
          <?php $fetchselectedroom = mysqli_query($conn, "SELECT * FROM room_masterfile WHERE room_id = {$_SESSION['reservation'][
            'roomid']}");
          $getselectedroom = mysqli_fetch_assoc($fetchselectedroom);
          $daydiff = (strtotime($_SESSION['reservation']['checkOutDate']) - strtotime($_SESSION['reservation']['checkInDate']))/(60*60*24);
          $roomrate = $getselectedroom['room_rate'] * $_SESSION['reservation']['roomno'];
          $lengthofstay = $getselectedroom['room_rate'] * $_SESSION['reservation']['roomno'] * $daydiff;
          $vattotal = $lengthofstay;
          $addon_total = 0;
        
          if(count($_SESSION['reservation']['services']) != 0){
            foreach($_SESSION['reservation']['services'] as $service => $service_name){
              $fetchaddon = mysqli_query($conn, "SELECT * FROM addons_masterfile WHERE Addon_id = {$service}");

              $getaddon = mysqli_fetch_assoc($fetchaddon);

              $addon_total+= $getaddon['Addon_rate'];

            }
          }
          $vattotal += $addon_total;
          $total = $vattotal;
          $_SESSION['reservation']['balance'] = $total;
          $vatable = $vattotal * 0.12;
          $vattotal *= 0.88;
          $downpayment = $total * 0.15; 
        ?>
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
                        <?= number_format($roomrate,2) ?> php
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left" bgcolor="#EBEDF2">
                        <strong>Length of stay</strong>
                      </td>
                      <td class="text-left" bgcolor="#EBEDF2">
                        <?php
                        echo $daydiff;
                        ?>
                      </td>
                      <td class="text-left" bgcolor="#EBEDF2">

                      </td>
                      <td class="text-right" bgcolor="#EBEDF2">
                        <?= number_format($lengthofstay,2) ?> php 
                      </td>
                    </tr>
                    <tr>
                      <td class="highrow text-left">

                      </td>
                      <td class="highrow text-left">

                      </td>
                      <td class="highrow text-center">
                        <strong>Subtotal (taxed to 12%)</strong>
                      </td>
                      <td class="highrow text-right">
                       <?= number_format($vattotal,2) ?> php
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
                      <?= number_format($vatable,2) ?>php
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
                      <?= number_format($total,2) . " * 15% = " . number_format($downpayment,2) ?>php
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
                      <?= number_format($total,2) ?>php
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