 <?= include_once 'sideBarAndTopBar.php'; ?>
 <div class="content-wrapper">
  <div class="container-fluid">

    <table class ='table table-striped'>
      <th>Billing ID</th>
      <th>Guest ID</th>
      <th>Reservation ID</th>
      <th>Balance</th>
      <th>Total</th>
      <th>Downpayment</th>
      <th>Status</th>
      <th>Created_at</th>
      <th>Updated_at</th>
      <th>Actions</th>
      <?php $fetchallreservation = mysqli_query($conn, "SELECT * FROM billing_masterfile");
      $currentTime = date("Y-m-d");
      while($row = mysqli_fetch_assoc($fetchallreservation)){ ?>
      <tr>
        <td id ='reservation-id' ><?= $row['billing_id'] ?></td>
        <td id = 'guest-id' ><?= $row['guest_id'] ?></td>
        <td id = 'room-id' ><?= $row['reservation_id'] ?></td>
        <td id = 'checkin' ><?= number_format($row['balance'],2) ?></td>
        <td id = 'checkout' ><?= number_format($row['total'],2) ?></td>
        <td id = 'number-guest'><?= number_format($row['downpayment'], 2)?></td>
        <td ><?= $row['status'] ?></td>
        <td ><?= $row['created_at'] ?></td>
        <td ><?= $row['updated_at'] ?></td>
        <td><form>
          <a data-toggle ='modal' data-target = '#editreservation' class='btn btn-primary' style ='color:white'>Edit</a>
          <input type="hidden" name="t_id" value="<?= $row['billing_id'] ?>">
          <button type ='submit' class ='btn btn-danger'>Delete</button>
        </form></td>
      </tr>
      <?php } ?>
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
            <form id="formEditRoom" enctype="multipart/form-data" method ='post'>
              <div class='container-fluid'>
                <div class='form-group'>
                  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                    <label for='RoomType'>Check in</label><br>
                    <input required class='form-control' name = 'roomType' type ='date'>
                    <div class='form-group'>
                      <label for='roomRate'>Check out</label><br>
                      <input required class='form-control' name = 'roomCapacity' type='date'>
                    </div>
                    <div class='form-group'>
                      <label for='roomRate'>Room type</label><br>
                      <input required class='form-control' name = 'roomRate'>
                    </div>
                    <div class='form-group'>
                      <label for='roomNumber'>Room Quantity</label><br>
                      <input required class='form-control' name = 'roomNumber'>
                    </div>
                    
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
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="js/sb-admin-datatables.min.js"></script>
<script src="js/sb-admin-charts.min.js"></script>
<script>
  $(document).ready(function(){
    $('button#show').click(function(){
      $('.editmodal').show()
    })
    $('form').on('submit', function(e){
      e.preventDefault();
      var prompt = confirm("Are you sure?")
      if(prompt){
        $.ajax({
          type:'POST',
          url:'../ajax/deletebilling.php',
          data: $(this).serialize(),
          success: function(html){
            alert('Reservation has been deleted')
            location.reload()
          }
        })
      }
    })
  })
</script>
</body>

</html>
