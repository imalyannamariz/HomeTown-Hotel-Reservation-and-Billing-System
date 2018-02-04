 <?= include_once 'sideBarAndTopBar.php';
 ?>

 <div class="content-wrapper">
  <div class="container-fluid">
    <form method ='post'>
      <div class ='row'>
        <div class ='col-md-4'>
          <div class ='form-group'>
            <label>Check In</label>
            <input type ='text' class ='form-control' name ='checkInDate' value = '<?php echo (isset($_POST['check']))? $_POST['checkInDate'] : '' ;?>' id ='checkInDate'/>

          </div>
        </div>
        <div class ='col-md-4'>
          <div class ='form-group'>
            <label>Check out</label>
            <input type ='text' class ='form-control' name ='checkOutDate' value ='<?php echo (isset($_POST['check']))? $_POST['checkOutDate'] : '' ; ?>'id = 'checkOutDate'/>
          </div>
        </div>
        <div class ='col-md-4'>
          <div class ='form-group'>
            <label>&nbsp;</label>
            <input type ='submit' class ='btn btn-primary btn-block' name ='check' value ='Check'/>
          </div>
        </div>
      </form>
    </div>

    <?php if(isset($_POST['check'])){ ?>
    <table id ='thisTable'  class ='table table-striped display dataTable table-responsive'>
      <thead>
        <tr>
          <th>Walkinroom ID</th>
          <th>Walkin room name</th>
          <th>Room type</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $fetchallreservation = mysqli_query($conn, "SELECT * from walkinrooms_masterfile JOIN room_masterfile ON walkinrooms_masterfile.room_id = room_masterfile.room_id") or die(mysqli_error($conn));
        while($row = mysqli_fetch_assoc($fetchallreservation)){ ?>
        <tr>
          <td id = 'room-id'><?=$row['walkinrooms_id']?></td>
          <td id = 'guest-id' ><?= $row['walkinrooms_name'] ?></td>
          <td><?= $row['room_type'] ?></td>
          <td id ='reservation-id' >
            <?php
            $disabled = '';
            $fetchwalkin = mysqli_query($conn, "SELECT * FROM assignedroom_masterfile WHERE room_id = {$row['walkinrooms_id']} AND ((date >= '{$_POST['checkInDate']}' AND date <= '{$_POST['checkOutDate']}') AND status ='Reserved')")or die(mysqli_error($conn));
            if(mysqli_num_rows($fetchwalkin) != 0){ 
              echo "Not Available";
              $disabled = 'disabled';
            }
            else {
              echo "Available";
              $disabled ='';
            }
            ?>
          </td>
          <td>
            <input type ='hidden' name = 'approve_id' value = '<?= $row['reservation_id'] ?>'/> 
            <button  <?= $disabled ?> class ='btn btn-primary reserve' data-toggle ='modal' data-target = '#editreservation'>Reserve</button></td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot></tfoot>
      </table>
      <?php 
    }
    else{
      echo "<p style='text-align:center'>Input a date to see available rooms</p>";
    }
    ?>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © HomeTown Hotel Makati</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id ='editreservation' tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enter personal information to continue</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formEditproof" enctype="multipart/form-data" method ='post'>
              <div class ='form-group'>
                <input name ='room_id' type ='hidden' value =''/>
                <input name ='checkInDate' type ='hidden' value ='<?= $_POST['checkInDate'] ?>'/>
                <input name ='checkOutDate' type ='hidden' value ='<?= $_POST['checkOutDate'] ?>'/>
                <label>First name</label>
                <input type ='text' class = 'form-control' name ='fname' REQUIRED/>
              </div>
              <div class ='form-group'>
                <label>Last name</label>
                <input type ='text' class ='form-control' name ='lname' REQUIRED/>
              </div>
            </div>
            <div class="modal-footer">
              <input type ='hidden' name = 'roomId'>
              <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Reserve</button>
            </div>
          </form>
          <?php 
          if(isset($_POST['update'])){
            $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $code = '';
            do{
              $code ='';
              for($x = 0; $x <= 10; $x++){
                $code .= $alphanum[rand(0, strlen($alphanum)-1)];
              }#random 0-26;
            }while(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM walkinreservation_masterfile WHERE code ='{$code}'")) != 0);
            echo "<script>alert('Success')</script>";
            mysqli_query($conn, "INSERT INTO walkinreservation_masterfile (room_id, checkindate, checkoutdate, firstname, lastname,code) 
            VALUES({$_POST['room_id']}, '{$_POST['checkInDate']}', '{$_POST['checkOutDate']}','{$_POST['fname']}', '{$_POST['lname']}','{$code}')") or die(mysqli_error($conn));
            $checkInDate = $_POST['checkInDate'];
            while($checkInDate <= $_POST['checkOutDate']){
              mysqli_query($conn, "INSERT INTO assignedroom_masterfile (room_id, date, status, type, code) VALUES({$_POST['room_id']}, '{$checkInDate}' ,'Reserved', 'Walkin', '{$code}')") or die(mysqli_error($conn));
              $checkInDate = date("Y-m-d", strtotime($checkInDate) + (60*60*24));
            }
            $fetchroomtype = mysqli_query($conn, "SELECT * FROM walkinrooms_masterfile WHERE walkinrooms_id = {$_POST['room_id']}") or die(mysqli_error($conn));
            $row = mysqli_fetch_assoc($fetchroomtype);
            $fetchrate = mysqli_query($conn, "SELECT * FROM room_masterfile WHERE room_id = {$row['room_id']}");
            $row = mysqli_fetch_assoc($fetchrate);
            $daydiff = (strtotime($_POST['checkOutDate']) - strtotime($_POST['checkInDate']))/(60*60*24);
            $total = $row['room_rate'] * $daydiff;
            $downpayment = $total * 0.15;
            $fetchreservation =mysqli_query($conn, "SELECT max(reservation_id) FROM walkinreservation_masterfile") or die(mysqli_error($conn));
            $row1 = mysqli_fetch_assoc($fetchreservation);
            mysqli_query($conn, "INSERT INTO billing_masterfile(reservation_id,balance,total,downpayment, created_at, updated_at) VALUES({$row1['max(reservation_id)']}, {$total}, {$total}, {$downpayment},'{$currentDay}','{$currentDay}') ") or die(mysqli_error($conn));
  }
  ?>
</div>
</div>
</div>
</div>
</div>
<!-- Bootstrap core JavaScript-->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<!-- DataTable-->
<script type = 'text/javascript' src ='js/datatables.min.js'></script> 
<script type ='text/javascript' src = 'js/dataTables.bootstrap4.min.js'></script>

<!-- Datepicker-->
<script src="js/jquery.datetimepicker.full.min.js"></script>
<script src = 'js/edit_reservation.js'></script>
<script>
  $(document).ready(function(){
    $('button.reserve').click(function(){
      $('input[name=room_id').val($(this).closest('tr').find('#room-id').html())
    })
  })
</script>
</body>

</html>
