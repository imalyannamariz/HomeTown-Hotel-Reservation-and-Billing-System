<?= include_once 'sideBarAndTopBar.php'; ?>
 <div class="content-wrapper">
  <div class="container-fluid">

    <table class ='table table-striped table-responsive'>
      <thead>
        <th style ='display:none'></th>
        <th style ='display:none'></th>
        <th>Billing ID</th>
        <th>Guest ID</th>
        <th>Guest name</th>
        <th>Reservation ID</th>
        <th>Balance</th>
        <th>Total</th>
        <th>Downpayment</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Actions</th>
      </thead>
      <tbody>
        <?php
$fetchallreservation = mysqli_query($conn, "select * from billing_masterfile join guest_masterfile on billing_masterfile.guest_id = guest_masterfile.guest_ID join reservation_masterfile on reservation_masterfile.reservation_id = billing_masterfile.reservation_id JOIN room_masterfile on room_masterfile.room_id = reservation_masterfile.room_id") or die(mysqli_error($conn));
$currentTime         = date("Y-m-d");
while ($row = mysqli_fetch_assoc($fetchallreservation)) {
?>
       <tr>
            <td id = 'checkin' style ='display:none'><?= $row['checkindate'] ?></td>
            <td id = 'checkout' style = 'display:none'><?= $row['checkoutdate'] ?></td>
          <td id ='billing-id' ><?= $row['billing_id'] ?></td>
          <td id = 'guest-id' ><?= $row['guest_id'] ?></td>
          <td><?= "{$row['guest_firstname']} {$row['guest_lastname']}" ?></td>
          <td id = 'reservation-id' ><?= $row['reservation_id'] ?></td>
          <td id = 'balance' ><?= number_format($row['balance'], 2) ?></td>
          <td id = 'total' ><?= number_format($row['total'], 2) ?></td>
          <td id = 'number-guest'><?= number_format($row['downpayment'], 2) ?></td>
          <td ><?= $row['status'] ?></td>
          <td ><?= $row['created_at'] ?></td>
          <td ><?= $row['updated_at'] ?></td>
          <td><form class ='deletebilling' action = '../ajax/deletebilling.php'>
             <a data-toggle ='modal' data-target = '#editreservation1' class='btn btn-primary btn-block editreservation' style ='color:white;margin-bottom:10px'>Edit</a>
             <a data-toggle ='modal' data-target = '#addservice' class ='btn btn-primary addservice btn-block' style ='color:white;margin-bottom:10px'>Add service</a>
            <a data-toggle ='modal' data-target = '#pay' class='btn btn-primary btn-block paymentmodal' style ='color:white;margin-bottom:10px'>Pay</a>
            <input type="hidden" name="t_id" value="<?= $row['billing_id'] ?>">
            <input type ='hidden' name ='decrease' value ='<?=floor(($row['number_guest']-1)/$row['room_capacity']) ?>'/>
            <button type ='submit' class ='btn btn-danger btn-block'>Delete</button>
          </form></td>
        </tr>
        <?php
}
?>
     </tbody>
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
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Add service modal -->
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
                <form  method ='post' id = 'addservice' action = '../ajax/addservice.php'>
                  <div class='container-fluid'>
                    <div class='form-group'>
                      <div class ='row'>
                        <div class ='form-group col-md-9'>
                          <label>Addons</label>
                          <select name ='addons' id ='addonsQuantity' class ='form-control'>
                            <?php
$fetchaddons = mysqli_query($conn, "SELECT * FROM addons_masterfile");
while ($addons = mysqli_fetch_assoc($fetchaddons)) {
?>
                           <option value ='<?= $addons['Addon_ID'] ?>'><?= $addons['Addon_name'] ?></option>
                            <?php
}
?>
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
                  <input type ='hidden' name ='guest_id' value =''/>
                  <input type ='submit' name ='submitservice' class ='btn btn-info btn-block'/>
                </div>
              </form>
              <?php
if (isset($_POST['submitservice'])) {
    if ($_POST['addons'] != 'x') {
        $selectaddon = mysqli_query($conn, "SELECT * FROM guestaddons_masterfile WHERE reservation_id = {$_POST['r_id']} AND addons_id = {$_POST['addons']}") or die(mysqli_error($conn));
        if (mysqli_num_rows($selectaddon) == 0) {
            mysqli_query($conn, "INSERT INTO guestaddons_masterfile(addons_id,reservation_id,quantity) VALUES({$_POST['addons']},{$_POST['r_id']},{$_POST['addonsqty']})") or die(mysqli_error($conn));
        } else {
            mysqli_query($conn, "UPDATE guestaddons_masterfile SET quantity = quantity + {$_POST['addonsqty']} WHERE reservation_id = {$_POST['r_id']} AND addons_id = {$_POST['addons']}") or die(mysqli_error($conn));
        }
        $fetchrate = mysqli_query($conn, "SELECT * FROM addons_masterfile WHERE Addon_ID = {$_POST['addons']}");
        $rate      = mysqli_fetch_assoc($fetchrate);
        $total     = $rate['Addon_rate'] * $_POST['addonsqty'];
        // add to billing
        mysqli_query($conn, "UPDATE billing_masterfile SET balance = balance + {$total}, total = total + {$total} WHERE reservation_id = {$_POST['r_id']}");
        echo "<script>alert('Success')</script>";
    }
}
?>
           </div>
          </div>
        </div>
    <!-- Edit Modal -->
    <div class="modal fade" id ='pay' tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formEditBilling" action ='../ajax/editbilling.php' enctype="multipart/form-data" method ='post'>
              <div class='container-fluid'>
                <div class='form-group'>
                  <input type ='number' id ='payment' class ='form-control' placeholder = 'Input guest payment here' name = 'payment'/>
                </div>
                <hr/>
                <div class ='row'>
                  <div class ='col-md-6'style ='text-align:left'>
                    <h6>Change</h6>
                  </div>
                  <div class ='col-md-6' style ='text-align:right'>
                    <h6 id = 'changeVal'>None</h6>
                  </div>
                </div>

              </div>
              
            </div>
            <div class="modal-footer">
              <input type ='hidden' name ='b_id'/>
              <input type ='hidden' name ='currentBalance'/>
              <input type ='hidden' name ='r_id'/>
              <input type ='hidden' name ='g_id'/>
              <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Edit reservation modal -->
       <div class="modal fade" id ='editreservation1' tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Guest Reservation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="formEditRoom" enctype="multipart/form-data" action = '../ajax/editreservation.php' method ='post'>
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
                          <?php
$fetchrooms = mysqli_query($conn, "SELECT * FROM room_masterfile");
while ($row = mysqli_fetch_assoc($fetchrooms)) {
    echo "<option class ='get' value = '{$row['room_id']}'>{$row['room_type']}</option>";
}
?>
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
    <!-- End edit reservation modal -->
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script type = 'text/javascript' src ='js/datatables.min.js'></script> 
<script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/jquery.datetimepicker.full.min.js"></script>
<script>
  $(document).ready(function() {
      //$('.table').DataTable()
      // Add service
  $('#checkInDate, #checkOutDate, #roomtype').on('change',function(){
    $.ajax({
      type:'POST',
      url:'../ajax/getreservedrooms.php',
      data:{
        checkInDate: $('#checkInDate').val(),
        checkOutDate: $('#checkOutDate').val(),
        room_id: $('option.get:selected').val(),
        reservation_id: $('input[name=reservationno]').val(),
      },
      success:function(html){
        var availablerooms = parseInt(html)
        var decrease = Math.floor(parseInt($('input[name=decrease]').val()))
        $('#roomquantity').empty()
        for(var x = 1 + decrease ; x<=availablerooms; x++){
          $('#roomquantity').append(`<option value = ${x}>${x}</option>`)
        }
      },
      error:function(html){
        alert(html)
      }
    })
  })
      $('.paymentmodal').click(function() {
          var b_id = $(this).closest('tr').find('#billing-id').html()
          var total = $(this).closest('tr').find('#balance').html().replace(/\,/, '')
          var r_id = $(this).closest('tr').find('#reservation-id').html()
          var g_id = $(this).closest('tr').find('#guest-id').html()
          $('input[name=g_id]').val(g_id)
          $('input[name=b_id]').val(b_id)
          $('input[name=currentBalance]').val(total)
          $('input[name=r_id]').val(r_id)
      })
      $('#addonsQuantity').change(function() {
          $.ajax({
              type: 'POST',
              url: '../ajax/getalladdons.php',
              data: {
                  checkInDate: $('input[name=checkInDate]').val(),
                  checkOutDate: $('input[name=checkOutDate').val(),
                  a_id: $(this).val()
              },
              success: function(html) {
                  var addons = parseInt(html)
                  $('#addonsqty').empty()

                  for (var x = 1; x <= addons; x++) {
                      $('#addonsqty').append(`<option value = '${x}'>${x}</option>`)
                  }
              },
              error: function(html){
                  alert(`${html} rooms not found`)
              }
          })
      })
      $('.addservice').click(function() {
          $('#addonsQuantity option').last().remove()
          $('#addonsQuantity').append(`<option value ='x' selected >None</option>`)
          var checkInDate = $(this).closest('tr').find('#checkin').html()
          var checkOutDate = $(this).closest('tr').find('#checkout').html()
          var r_id =  $(this).closest('tr').find('#reservation-id').html()
          var g_id = $(this).closest('tr').find('#guest-id').html()
          $('input[name=r_id]').val(r_id)
          $('input[name=checkInDate').val(checkInDate)
          $('input[name=checkOutDate').val(checkOutDate)
          $('input[name=guest_id]').val(g_id)
      })
      //End service
      // Edit reservation
      $('.editreservation').on('click', function() {
          var checkin = $(this).parent().closest('tr').find('#checkin').html()
          var checkout = $(this).closest('tr').find('#checkout').html()
          var reservationno = $(this).closest('tr').find('#reservation-id').html()
          var roomno = $(this).closest('tr').find('#room-number').html()
          var decrease = $(this).closest('form').find('input[name=decrease]').val()
          $.ajax({
              type: 'POST',
              url: '../ajax/assigncheckin.php',
              data: {
                  checkin: checkin,
                  checkout: checkout
              },
              success: function(html) {
                  $('#addons').html(html)
              },
              error:function(){
                  alert('error')
              }
          })
          $('input[name=checkin]').val(checkin)
          $('input[name=checkout').val(checkout)
          $('input[name=roomquantity').val(roomno)
          $('input[name=reservationno]').val(reservationno)
          $('input[name=decrease]').val(decrease)
      })
      // End edit reservation
      $('form').on('submit', function(e) {
          e.preventDefault()
          var message = ''
          var prompt = true
          if ($(this).attr('id') == 'formEditBilling') {
              message = "Billing has been updated"
          } else if($(this).attr('id') == 'formDeleteBilling') {
              var prompt = confirm("Are you sure?")
              message = "Billing has been deleted"
          }
          else if ($(this).attr('id')=='addservice'){
              message ="Services has been updated"
          }
          else if($(this).attr('id') =='formEditRoom'){
            message = 'Room has been edited'
          }
          if (prompt) {
              $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: $(this).serialize(),
                  success: function(html) {
                      location.reload()
                  }
              })
          }
          alert(message)
      })
      $('#payment').change(function() {
          var payment = parseFloat($(this).val())
          var balance = parseFloat($('input[name=currentBalance]').val())
          $('#changeVal').html("None")
          if (balance < payment) {
              $('#changeVal').html(payment - balance)
          }
      })
      $("#checkInDate").datetimepicker({
          timepicker: false,
          format: "Y-m-d",
          onShow: function(ct) {
              this.setOptions({
                  minDate: $('#checkInDate').val()
              })
          }
      })

      $("#checkOutDate").datetimepicker({
          timepicker: false,
          format: "Y-m-d",
          onShow: function(ct) {
              this.setOptions({
                  minDate: `+$('#checkInDate').val()` ? $('#checkInDate').val() : false
              })
          }
      })
  })
</script>
</body>

</html>