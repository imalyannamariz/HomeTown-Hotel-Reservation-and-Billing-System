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
    <link rel ='stylesheet' href = 'Adminside/css/dataTables.bootstrap4.min.css'/>
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
    .table-bordered {
      border: 1px solid #ddd;
    }
    .table {
      width: 100%;
      max-width: 100%;
      margin-bottom: 20px;
    }
    table {
      background-color: transparent;
    }
    table {
      border-spacing: 0;
      border-collapse: collapse;
    }
    .table-bordered>thead>tr>th{
      border-bottom-width: 2px;
    }
    .table-bordered>thead>tr>th{
      border: 1px solid #ddd;
    }
    .btn {
      border-radius: 0px;
      margin-bottom: 5px;
      -webkit-transition: all 0.5s;
      -o-transition: all 0.5s;
      transition: all 0.5s;
    }
    .btn-sm{
      padding: 5px 10px;
      font-size: 12px;
      line-height: 1.5;
      border-radius: 3px;
    }
    .btn-success {
      color: #fff;
      background-color: #5cb85c;
      border-color: #4cae4c;
    }
    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .table-bordered>tbody>tr>td{
      border: 1px solid #ddd;
    }
    .table>tbody>tr>td{
      padding: 8px;
      line-height: 1.42857143;
      vertical-align: top;
      border-top: 1px solid #ddd;
    }
  </style>
  <body>
   <header>
    <?php
      include_once 'navigationBar.php';
    ?>
    <!-- Navigation Menu start-->

      <!-- Navigation Menu end
    </header> <!-- / rq-header-section end here-->

    <div class="rq-checkout-banner">
      <div class="rq-checkout-banner-mask">
        <div class="container">
          <div class="rq-checkout-banner-text">
            <div class="rq-checkout-banner-text-middle">
              <h1>Account</h1>
            </div>
          </div>
        </div>
      </div>
    </div><!-- / rq-banner-area-->
    <div class = "container" style = "margin-top: 5%">
      <div class = "row">
        <div class = "col-lg-12 col-md-12 col-sm-12">
          <div class = "blogArchive_area">
            <div class = "single_archiveblog wow fadeInDown animated" style = "visibility: visible; animation-name: fadeInDown;">
              <div>
                Welcome
                <b>
                  <?php echo "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?>
                  <b>
                    <!-- <p stlye = "text-align:right;">
                      <a href="account.php">Account Settings</a>
                    </p> -->
                    <h2> Reservation </h2>
                    <table class = "table table-bordered display" id = 'reservations'>
                      <thead>
                        <tr>
                          <th>Check In</th>
                          <th>Check Out</th>
                          <th style ='display:none'></th>
                          <th>Number of Guests</th> 
                          <th>Number of rooms</th>
                          <th>Room Name</th>
                          <th>Status</th>
                          <th>Balance</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                    </tbody>
                    <?php $fetch_reservations = mysqli_query($conn, "SELECT *, reservation_masterfile.room_number as roomno FROM reservation_masterfile JOIN room_masterfile ON reservation_masterfile.room_id = room_masterfile.room_id JOIN billing_masterfile ON reservation_masterfile.reservation_id = billing_masterfile.reservation_id WHERE reservation_masterfile.guest_id = {$_SESSION['guest_ID']}") or die(mysqli_error($conn));
                    while($row = mysqli_fetch_assoc($fetch_reservations)){ ?>

                    <tr>
                      <td style ='display:none' id = 'reservation-id'> <?= $row['reservation_id']?></td>
                      <td align = "center" id = 'checkin'><?= $row['checkindate'] ?></td>
                      <td align = "center" id = 'checkout'><?= $row['checkoutdate'] ?></td>
                      <td align = "center"><?= $row['number_guest'] ?></td>
                      <td align ='center'><?= $row['roomno'] ?></td>
                      <td align = 'center'><?= $row['room_type'] ?></td>
                      <td align = "center"><?= $row['status'] ?></td>
                      <td align = 'center'> <?= number_format($row['balance'],2) . " php"?></td>
                      <td align ='center'> 
                        <form method="post" id ='deletereservation'>
                         <a href="summary.php?code=<?= $row['reservation_id']?>" class="btn btn-sm btn-success">View</a>
                         <a href = '#' data-target = '#exampleModal' data-toggle ='modal' class ='btn btn-info edit' >Edit</a>
                         <input type="hidden" name="t_id" value="<?= $row['reservation_id'] ?>" />
                         <input type ='hidden' id ='decrease' name ='decrease' value ='<?=floor(($row['number_guest']-1)/$row['room_capacity'])?>' />
                         <button name="cancel" type = 'submit' class="btn btn-sm btn-danger">Cancel</button>
                       </form>
                     </td>
                   </tr>
                   <?php } ?>
                 </tbody>

               </b>
             </b>
           </div>

           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style ='padding:25px'>
                <div class="modal-header">
                  <h4 class ='title'>Edit reservation</h4>
                </div>
                <div class="modal-body">
                  <form action = 'ajax/editreservation.php' aria-delete = 'ajax/cancelreservation.php' aria-location = 'ajax/getreservedrooms.php' id = 'formEditRoom'>
                   <div class='form-group'>
                    <label for='RoomType'>Check in</label><br>
                    <input required class='form-control' name = 'checkin' id = 'checkInDate' type ='text'>
                    <div class='form-group'>
                      <label for='roomRate'>Check out</label><br>
                      <input required class='form-control' name = 'checkout'  id = 'checkOutDate' type='text'>
                    </div>

                    <div class='form-group'>

                      <label for='roomNumber'>Room Type</label><br>
                      <select class ='form-control' name ='roomtype' id ='roomtype'>
                        <?php $fetchrooms = mysqli_query($conn, "SELECT * FROM room_masterfile");
                        while($row = mysqli_fetch_assoc($fetchrooms)){
                          echo "<option class ='get' value = '{$row['room_id']}'>{$row['room_type']}</option>";
                        } ?>
                      </select>
                    </div>
                    <div class='form-group'>
                      <label for='roomRate'>Room Quantity</label><br>
                      <select id ='roomquantity' name = 'roomquantity' class ='form-control'>

                      </select>
                    </div>
                    <input type ='hidden' name = 'reservationno'/>

                  </div>
                </div>
                <div class="modal-footer">
                  <input type ='hidden' name = 'roomId'>
                  <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Update Room</button>
                </form>
              </div>
            </div>
          </div>
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
        <script src ='Adminside/js/dataTables.min.js'></script>
        <script src = 'Adminside/js/dataTables.bootstrap4.min.js'></script>
        <script>
          $(document).ready(function(){
            $('#reservations').DataTable()
          })
        </script>
      <script src ='Adminside/js/edit_reservation.js'></script>
      </body>
      </html>
