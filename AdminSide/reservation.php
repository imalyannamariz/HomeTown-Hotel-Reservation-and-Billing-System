 <?= include_once 'sideBarAndTopBar.php';
 ?>

 <div class="content-wrapper">
  <div class="container-fluid">

    <table id ='thisTable' class ='table table-striped display dataTable table-responsive'>
      <thead>
        <tr>
          <th>Reservation ID</th>
          <th>Guest ID</th>
          <th>Room Name</th>
          <th>Check in</th>
          <th>Check out</th>
          <th>Number of Guest</th>
          <th>Room number</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $fetchallreservation = mysqli_query($conn, "SELECT *, reserve.room_number as reserve_room FROM reservation_masterfile as reserve JOIN room_masterfile as room on reserve.room_id = room.room_id");
        $currentTime = date("Y-m-d");
        while($row = mysqli_fetch_assoc($fetchallreservation)){ ?>
        <tr>
          <td id ='reservation-id' ><?= $row['reservation_id'] ?></td>
          <td id = 'guest-id' ><?= $row['guest_id'] ?></td>
          <td id = 'room-id' ><?= $row['room_type'] ?></td>
          <td id = 'checkin' ><?= $row['checkindate'] ?></td>
          <td id = 'checkout' ><?= $row['checkoutdate'] ?></td>
          <td id = 'number-guest'><?= $row['number_guest']?></td>
          <td id = 'room-number'><?= $row['reserve_room'] ?></td>
          <td><form id = 'deletereservation'>
            <a data-toggle ='modal' data-target = '#editreservation' class='btn btn-primary edit' style ='color:white'>Edit</a>
            <input type="hidden" name="t_id" value="<?= $row['reservation_id'] ?>">
            <button type ='submit' class ='btn btn-danger'>Delete</button>
          </form></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot></tfoot>
    </table>

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
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formEditRoom" enctype="multipart/form-data" method ='post' aria-location = '../ajax/getreservedrooms.php' action = '../ajax/editreservation.php' aria-delete = '../ajax/cancelreservation.php'>
              <div class='container-fluid'>
                <div class='form-group'>
                  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
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
                  </table>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <input type ='hidden' name = 'roomId'>
              <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Update Room</button>
            </div>
          </form>
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
    $('#thisTable').DataTable()

  })
</script>
</body>

</html>
