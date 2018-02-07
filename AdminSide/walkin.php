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
    <form method ='post'>
      <table id ='thisTable'  class ='table table-striped display dataTable table-responsive'>
        <thead>
          <tr>
          </tr>
        </thead>

        <tbody>
          <?php $fetchrooms = mysqli_query($conn, "SELECT * FROM room_masterfile");
          while($row = mysqli_fetch_assoc($fetchrooms)){ 
            $fetchReservedrooms = mysqli_query($conn, "SELECT room_number FROM reservation_masterfile WHERE (((checkoutdate >= '{$_POST['checkInDate']}' AND checkindate <= '{$_POST['checkInDate']}') OR (checkoutdate >='{$_POST['checkOutDate']}' AND checkindate <= '{$_POST['checkOutDate']}')) AND room_id = {$row['room_id']}) AND (status = 'Approved' or status = 'Checkin')") or die(mysqli_error($conn));
            $fetchreservedwalkin = mysqli_query($conn, "SELECT * FROM assignedroom_masterfile INNER JOIN walkinrooms_masterfile ON assignedroom_masterfile.room_id = walkinrooms_masterfile.walkinrooms_id WHERE walkinrooms_masterfile.room_id = {$row['room_id']} AND ((date >= '{$_POST['checkInDate']}' AND date <= '{$_POST['checkOutDate']}') AND status = 'Walkin')") or die(mysqli_error($conn));
            $reservedwalkin = array();
            while($row1 = mysqli_fetch_assoc($fetchreservedwalkin)){
              $reservedwalkin[] = $row1['room_id'];
            }
            $reservedroomSum = 0;
            while($row1 = mysqli_fetch_assoc($fetchReservedrooms)){
              $reservedroomSum += $row1['room_number'];
            }
            $reservedroomSum += count(array_unique($reservedwalkin));?>
            <tr>
              <td style ='width:500px'><img src ='../<?=$row['room_imagepath']?>' width ='100%'/></td>
              <td><?= $row['room_type']?></td>
              <td><?=$row['room_description']?></td>
              <td><div class ='form-group'>
                <select class= 'form-control' name= 'roomqty[<?=$row['room_id']?>]'>
                  <?php 
                  for($i = 0; $i <= $row['room_number'] - $reservedroomSum; $i++){
                    echo "<option value ='{$i}'>{$i}</option>";
                  }
                  ?>
                </select>
              </div></td>
            </tr>
            <?php } ?>
          </tbody>
          <tfoot></tfoot>

        </table>
        <div align ='center'>
         <button href ='#' data-toggle ='modal' data-target = '#editreservation' class ='btn btn-info btn-pull'>Continue</button>
       </div>
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
              <div class ='form-group'>
                <label>email</label>
                <input type ='email' class ='form-control' name ='email' REQUIRED/>
              </div>
              <div class ='form-group'>
                <label>Password</label>
                <input type ='password' class ='form-control' name ='password' REQUIRED/>
              </div>
            </div>
            <div class="modal-footer">
              <input type ='hidden' name = 'roomId'>
              <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Reserve</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </form>
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

</div>
</div>
<?php 

if(isset($_POST['update'])){
  echo "<script>alert('Fuck you')</script>";
  $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  $code = '';
  do{
    $code ='';
    for($x = 0; $x <= 10; $x++){
      $code .= $alphanum[rand(0, strlen($alphanum)-1)];
    }#random 0-26;
  }while(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM walkinreservation_masterfile WHERE code ='{$code}'")) != 0);
  $total = 0;
  $daydiff = (strtotime($_POST['checkOutDate']) - strtotime($_POST['checkInDate']))/(60*60*24);
  $room_ids = '';
  foreach($_POST['roomqty'] as $room_id => $roomqty){
    $room_ids .= $room_id . " ";
    //COMPUTE
    $fetchrate = mysqli_query($conn, "SELECT * FROM room_masterfile WHERE room_id = {$room_id}");
    $room = mysqli_fetch_assoc($fetchrate);
    $total += $room['room_rate'] * $daydiff;
    // ASSIGN IN A ROOM
    $checkOutDate = date("Y-m-d", strtotime($_POST['checkOutDate']));
    $getallwalkrinrooms = mysqli_query($conn, "SELECT * FROM walkinrooms_masterfile WHERE room_id = {$room_id}") or die(mysqli_error($conn));
    $i=0;
    while($row = mysqli_fetch_assoc($getallwalkrinrooms)){
      if($i == $roomqty)
        break;
      $checkInDate = date("Y-m-d", strtotime($_POST['checkInDate']));
      $getreservedroom = mysqli_query($conn, "SELECT * FROM assignedroom_masterfile WHERE (date >= '{$checkInDate}' AND date <= '{$checkOutDate}') AND room_id = {$row['walkinrooms_id']} ") or die(mysqli_error($conn));
      if(mysqli_num_rows($getreservedroom) == 0){
        while($checkInDate <= $checkOutDate){
          mysqli_query($conn, "INSERT INTO assignedroom_masterfile(room_id,date, status, type, code)VALUES({$row['walkinrooms_id']}, '{$checkInDate}','Reserved','Walkin','{$code}')") or die(mysqli_error($conn));
      $checkInDate = date("Y-m-d", strtotime($checkInDate) + (60*60*24)); // +1 day per loop
    }
    $i++;
  }
  // BILLING?


}
}
$downpayment = $total * 0.15;
$hashedpwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
mysqli_query($conn, "INSERT INTO walkinreservation_masterfile(room_id, checkindate, checkoutdate, code, balance, total, email, password) vALUES
  ('{$room_ids}', '{$_POST['checkInDate']}', '{$_POST['checkOutDate']}', '{$code}', {$total},{$total}, '{$_POST['email']}', '{$hashedpwd}')") or die(mysqli_error($conn));
}
?>
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
