 <?= include_once 'sideBarAndTopBar.php';
 ?>

 <div class="content-wrapper">
  <div class="container-fluid">

    <table id ='thisTable' class ='table table-striped display dataTable table-responsive'>
      <thead>
        <tr>
          <th>Reservation ID</th>
          <th>Guest ID</th>
          <th>Guest name</th>
          <th>Room Name</th>
          <th>Check in date</th>
          <th>Check out date</th>
          <th>Number of Guest</th>
          <th>Room number</th>
          <th>Room assigned</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $fetchallreservation = mysqli_query($conn, "SELECT *, reserve.room_number as reserve_room FROM reservation_masterfile as reserve JOIN room_masterfile as room on reserve.room_id = room.room_id JOIN guest_masterfile on guest_masterfile.guest_ID = reserve.guest_id WHERE reserve.status != 'Void' AND reserve.status != 'Checkout'") or die(mysqli_error($conn));
        $currentTime = date("Y-m-d");
        while($row = mysqli_fetch_assoc($fetchallreservation)){ 
          $fetchassignedrooms = mysqli_query($conn, "SELECT * FROM assignedroom_masterfile JOIN walkinrooms_masterfile ON assignedroom_masterfile.room_id = walkinrooms_masterfile.walkinrooms_id WHERE assignedroom_masterfile.code = '{$row['reservation_code']}'");
          $assignedroom = array();
          while($assignedrooms = mysqli_fetch_assoc($fetchassignedrooms)){
            $assignedroom[] = $assignedrooms['walkinrooms_name'];
          }

          ?>
          <tr>
            <td id = 'reservation-id'><?=$row['reservation_id']?></td>
            <td id = 'guest-id' ><?= $row['guest_id'] ?></td>
            <td><?= "{$row['guest_firstname']} {$row['guest_lastname']}"?></td>
            <td id = 'room-id' ><?= $row['room_type'] ?></td>
            <td id = 'checkin' ><?= $row['checkindate'] ?></td>
            <td id = 'checkout' ><?= $row['checkoutdate'] ?></td>
            <td id = 'number-guest'><?= $row['number_guest']?></td>
            <td id = 'room-number'><?= $row['reserve_room'] ?></td>
            <td><?= implode(", ", array_unique($assignedroom))?></td>
            <td><?=$row['status']?></td>
            <td><form id = 'deletereservation'>
              <?php $checkIndisabled = 'disabled';
              $checkOutdisabled = 'disabled';
              if($row['status'] == 'Checkin')
                $checkOutdisabled = '';
              if($row['checkindate'] <= $currentDay & ($row['status'] != 'Checkin' && $row['status'] != 'Checkout' ))
                $checkIndisabled = '';
              ?>
              <input type ='hidden' <?=$checkIndisabled?> name ='checkin'/>
              <input type ='submit'<?=$checkIndisabled?> name ='checkIn' class ='btn btn-success btn-block' style ='margin-bottom:10px' value ='Check in'/>
              <input type ='hidden' <?=$checkOutdisabled?> name = 'checkout' value ='Checkout'/>
              <input type ='submit' <?=$checkOutdisabled?> name ='checkout' class ='btn btn-warning btn-block' value ='Check out' style ='margin-bottom:10px; color:white'/>
              <input type="hidden" name="t_id" value="<?= $row['reservation_id'] ?>">
              <input type ='hidden' name ='decrease' value ='<?=floor(($row['number_guest']-1)/$row['room_capacity']) ?>'/>
              <button type ='submit' class ='btn btn-danger btn-block'>Delete</button>
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
              <h5 class="modal-title">Edit Guest Reservation</h5>
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
                      <input type ='hidden' name ='decrease'/>
                    </table>
                    <h5>Addons</h5>
                    <hr/>
                    <div class ='row' id ='addons'>

                      </div>
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
        <div class="modal fade" id ='addservice' tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add services</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form  method ='post'>
                  <div class='container-fluid'>
                    <div class='form-group'>
                      <div class ='row'>
                        <div class ='form-group col-md-9'>
                          <label>Addons</label>
                          <select name ='addons' id ='addonsQuantity' class ='form-control'>
                            <?php $fetchaddons = mysqli_query($conn, "SELECT * FROM addons_masterfile");
                            while($addons = mysqli_fetch_assoc($fetchaddons)){?>
                            <option value ='<?=$addons['Addon_ID']?>'><?=$addons['Addon_name']?></option>
                            <?php } ?>
                            <option value ='x' selected>None</option>
                          </select>
                        </div>
                        <div class ='form-group col-md-3'>
                          <label>Quantity</label>
                          <select name = 'addonsqty' id = 'addonsqty' class ='form-control'>

                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <input type ='hidden' name ='checkInDate' value =''/>
                  <input type ='hidden' name ='checkOutDate' value =''/>
                  <input type ='hidden' name ='r_id' value =''/>
                  <input type ='hidden' name ='guest_ud' value =''/>
                  <input type ='submit' name ='submitservice' class ='btn btn-info btn-block'/>
                </div>
              </form>
              <?php
              if(isset($_POST['submitservice'])){
                if($_POST['addons'] != 'x'){
                  $selectaddon = mysqli_query($conn, "SELECT * FROM guestaddons_masterfile WHERE reservation_id = {$_POST['r_id']} AND addons_id = {$_POST['addons']}") or die(mysqli_error($conn));
                  if(mysqli_num_rows($selectaddon) == 0){
                    mysqli_query($conn, "INSERT INTO guestaddons_masterfile(addons_id,reservation_id,quantity) VALUES({$_POST['addons']},{$_POST['r_id']},{$_POST['addonsqty']})") or die(mysqli_error($conn));
                  }
                  else{
                    mysqli_query($conn, "UPDATE guestaddons_masterfile SET quantity = quantity + {$_POST['addonsqty']} WHERE reservation_id = {$_POST['r_id']} AND addons_id = {$_POST['addons']}") or die(mysqli_error($conn));
                  }
                  $fetchrate = mysqli_query($conn, "SELECT * FROM addons_masterfile WHERE Addon_ID = {$_POST['addons']}");
                  $rate = mysqli_fetch_assoc($fetchrate);
                  $total = $rate['Addon_rate'] * $_POST['addonsqty'];
                // add to billing
                  mysqli_query($conn, "UPDATE billing_masterfile SET balance = balance + {$total}, total = total + {$total} WHERE reservation_id = {$_POST['r_id']}");
                  echo "<script>alert('Success')</script>";
                }
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
        $('#thisTable').DataTable()
        $('#addonsQuantity').change(function(){
          $.ajax({
            type:'POST',
            url:'../ajax/getalladdons.php',
            data:{
              checkInDate: $('input[name=checkInDate]').val(),
              checkOutDate: $('input[name=checkOutDate').val(),
              a_id: $(this).val()
            },
            success:function(html){
              var addons = parseInt(html)
              $('#addonsqty').empty()
              for(var x = 1; x<=addons; x++){
                $('#addonsqty').append(`<option value = '${x}'>${x}</option>`)
              }
            }
          })
        })
        $('.addservice').click(function(){
          $('#addonsQuantity option').last().remove()
          $('#addonsQuantity').append(`<option value ='x' selected >None</option>`)
          var checkInDate = $(this).closest('tr').find('#checkin').html()
          var checkOutDate = $(this).closest('tr').find('#checkout').html()
          var r_id = $(this).closest('tr').find('input[name=t_id]').val()
          $('input[name=r_id]').val(r_id)
          $('input[name=checkInDate').val(checkInDate)
          $('input[name=checkOutDate').val(checkOutDate)
        })
      })
    </script>
  </body>

  </html>
