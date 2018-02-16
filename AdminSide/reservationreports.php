 <?= include_once 'sideBarAndTopBar.php';
 ?>

 <div class="content-wrapper">
   
  <div class="container-fluid">
    <div class ='card' style ='margin-bottom:50px'>
      <div class ='card-header'>
        <h5>Filter options</h5>
      </div>
      <div class ='card-body'>
        <div class ='row'>
          <div class ='form-group col-md-6'>
            <label>Month</label>
            <select class ='form-control' name ='month'>
              <?php 
              $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
              foreach($months as $i => $month){
                echo "<option value ='".($i + 1)."'>{$month}</option>";
              }
              ?>
            </select>
          </div>
          <div class ='form-group col-md-6'>
            <label>Year</label>
            <select class ='form-control' name ='year'>
              <?php 
              $currentYear = intval(date("Y"));
              for($i = $currentYear; $i>= 1980; $i--){
                echo "<option value ='{$i}'>{$i}</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>
    </div>
    <table id ='thisTable' class ='table table-striped display dataTable table-responsive'>
      <thead>
        <tr>
          <th>Report ID</th>
          <th>Guest Name</th>
          <th>Reservation status</th>
          <th>Created at</th>
          <th>Updated at</th>
          <!-- <th>Actions</th> -->
        </tr>
      </thead>
      <tbody id ='financialreports'>
        <?php $fetchallreservation = mysqli_query($conn, "SELECT * FROM reservationreports_masterfile JOIN reservation_masterfile ON reservation_masterfile.reservation_id = reservationreports_masterfile.reservation_id INNER JOIN guest_masterfile ON guest_masterfile.guest_ID = reservation_masterfile.guest_id");
        $currentTime = date("Y-m-d");
        while($row = mysqli_fetch_assoc($fetchallreservation)){ ?>
        <tr>
          <td id ='reservation-id' ><?= $row['reservereports_id'] ?></td>
          <td><?= "{$row['guest_firstname']} {$row['guest_lastname']}"?></td>
          <td><?=$row['status']?></td>
          <td> <?= $row['created_at']?></td>
          <td><?=$row['updated_at']?></td>
          <td><form method ='post'>
            <input type ='hidden' name ='proof_id' value ='<?= $row['proofofpayment_id']?> '/>
            <!-- <button type ='submit' class ='btn btn-danger' onclick ="return confirm('Are you sure?')" name ='delete'>Delete</button> -->
          </form>
        </td>
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
          <h5 class="modal-title">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEditproof" enctype="multipart/form-data" method ='post'>
            <div class='container-fluid'>
              <input type ='hidden' name ='t_id' />
              <input type ='hidden' name ='old_img'/>
              <div class='form-group'>
                <input type ='file' class ='form-control' name = 'img' value = ''/>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type ='hidden' name = 'roomId'>
            <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Update Proof of payment</button>
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
    $('select[name=month], select[name=year').change(function(){
      $.ajax({
        type:'POST',
        url:'../ajax/filterfinancial.php',
        data:{
          month: $('select[name=month]').val(),
          year: $('select[name=year]').val(),
          dbtype:"reservationreports_masterfile"
        },
        success:function(html){
          $('#financialreports').html(html)
        }
      })
    })
  })
</script>
</body>

</html>
