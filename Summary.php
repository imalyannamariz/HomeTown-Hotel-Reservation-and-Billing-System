<?php
include_once 'db.php';
include_once 'header.php';
session_start();
$fetchCurrentReservation = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE reservation_id = {$_GET['code']} AND guest_id = {$_SESSION['guest_ID']}");
$reservation = mysqli_fetch_assoc($fetchCurrentReservation);
if(mysqli_num_rows($fetchCurrentReservation) == 0){
  echo "<script>alert(\"Reservation not found.\")
  window.href.location = 'GuestDashboard.php'
  </script>
  ";
}
$daydiff = (strtotime($reservation['checkoutdate']) - strtotime($reservation['checkindate']))/(60*60*24);
$fetchCurrentRoom = mysqli_query($conn, "SELECT * FROM room_masterfile WHERE room_id = {$reservation['room_id']}") or die(mysqli_error($conn));
$room = mysqli_fetch_assoc($fetchCurrentRoom);
$fetchbilling = mysqli_query($conn, "SELECT * FROM billing_masterfile WHERE reservation_id = {$_GET['code']} AND guest_id = {$_SESSION['guest_ID']}");
$billing = mysqli_fetch_assoc($fetchbilling);
$fetchAddons = mysqli_query($conn, "SELECT * FROM guestaddons_masterfile as gAddon INNER JOIN addons_masterfile as Addon on gAddon.addons_id = Addon.Addon_id WHERE gAddon.reservation_id = {$reservation['reservation_id']}") or die(mysqli_error($conn));
$addonTotal = 0;
while($addon = mysqli_fetch_assoc($fetchAddons)){
  $addonTotal += $addon['Addon_rate'];
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
</style>
<body>
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
        <button class="btn-hide btn btn-success pull-right hide-this-shit" onclick="window.print()" style="margin-right:1.4%;">Print</button>
        <div class = "col-md-12">
          <!-- policy -->
          <div class = "col-md-4">
            <div class = "panel panel-default">
              <div class = "panel-heading" style = "background-color: ;">
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
                      <tr style = 'width:277px'>
                        <td class = "text-left" bgcolor = "#EBEDF2">Pre-Payment</td>
                        <td class = "text-left" bgcolor = "#EBEDF2" style = 'text-align: justify'>
                          As per hotel policy, you are to pay your 15% downpayment to our bank account as deposit, 
                          take a screenshot of it and upload it to your customer dashboard. When you have successfully uploaded the Hotel will monitor your records and confirm your reservation. All pending reservations must be settled within 3 days, else it will expire. 
                        </td>
                      </tr>
                      <tr>
                        <td class = "text-left" bgcolor = "#EBEDF2">Cancelling</td>
                        <td class = "text-left" bgcolor = "#EBEDF2" style = 'text-align: justify'>
                          You can cancel your pending reservations using the customer dashboard.
                        </td>
                      </tr>
                      <tr>
                        <td class = "text-left" bgcolor = "#EBEDF2">Rebooking</td>
                        <td class = "text-left" bgcolor = "#EBEDF2" style = 'text-align: justify'>
                          You can modify your pending reservations using the customer dashboard.
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- guest info -->
          <div class = "col-md-8">
            <div class = "panel panel-default">
              <div class = "panel-heading" style = "background-color: ">
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
          <div class = "col-md-8">
            <div class = "panel panel-default">
              <div class = "panel-heading" style = "background-color: ">
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
                          <?= $reservation['room_number']?>
                        </td>
                        <td class="text-right" bgcolor="#EBEDF2">
                          <?=number_format($room['room_rate'] * $reservation['room_number'],2)?> php
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left" bgcolor="#EBEDF2">
                          <strong>Length of stay</strong>
                        </td>
                        <td class="text-left" bgcolor="#EBEDF2">
                          <?= $daydiff ?>
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
                          <strong>Subtotal (taxed to 12%)</strong>
                        </td>
                        <td class="highrow text-right">
                         <?= number_format(($billing['total'])*0.88,2). " php"?>
                       </td>
                     </tr>
                     <tr>
                      <td class="text-left" bgcolor="#EBEDF2">

                      </td>
                      <td class="text-left" bgcolor="#EBEDF2">

                      </td>
                      <td class="text-center" bgcolor="#EBEDF2">
                        <strong>Vat 12%</strong>
                      </td>
                      <td class="text-right" bgcolor="#EBEDF2">
                        <?= number_format($billing['total']* 0.12,2) ?> php
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
                        <?= number_format($billing['total'], 2) . " * 15% = ". number_format($billing['total'] * 0.15, 2)?> php
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
                        <?= number_format($billing['total'], 2)?> php
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <h3>Payment Proof:</h3>
          <form class="hide-this-shit hidden-xs" method="post" style="display:inline; float:right !important;" enctype="multipart/form-data">
            <input class="hide-this-shit hidden-xs" type="file" name="img" style="display:inline;">
            <input type ='hidden' name = 'code' value = '<?= $_GET['code']?>'/>
            <button class="hide-this-shit hidden-xs" name="upload" onclick="return confirm('Are you sure you want to save the changes?')" style="display:inline;" style="background: red";>
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
              e.preventDefault()
              var form_data = new FormData()
              form_data.append('img', $('input[type=file]').prop('files')[0])
              form_data.append('code', $('input[name=code]').val())
              $.ajax({
                url:'ajax/uploadproof.php',
                type:'post',
                data:form_data,
                contentType: false,
                processData: false,
                success:function(html){
                    alert(html)
                  alert("Success. Please wait for your reservation to accept")
                },
                error: function(html){
                    alert(html)
                }
              })
            })
          })
        </script>
      </body>
      </html>