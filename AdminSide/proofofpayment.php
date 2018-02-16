 <?= include_once 'sideBarAndTopBar.php';
 ?>

 <div class="content-wrapper">
  <div class="container-fluid">
    <?php 
    if(isset($_POST['submit'])){
      echo "<script>alert('Success')</script>";
      mysqli_query($conn, "DELETE FROM proofofpayment_masterfile WHERE proofofpayment_id = {$_POST['proof_id']}") or die(mysqli_error($conn));
      $fetchcode = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE reservation_id = {$_POST['approve_id']}");
      $row = mysqli_fetch_assoc($fetchcode);
      mysqli_query($conn, "UPDATE reservation_masterfile SET status = 'Approved' WHERE reservation_id = {$_POST['approve_id']}");
      mysqli_query($conn, "UPDATE assignedroom_masterfile SET status = 'Reserved' WHERE type ='Reservation' AND code ='{$row['reservation_code']}'") or die(mysqli_error($conn));
      $currentDay = date("Y-m-d H:i:s");
      mysqli_query($conn, "INSERT INTO reservationreports_masterfile(reservation_id, created_at, updated_at) VALUES({$_POST['approve_id']}, '{$currentDay}', '{$currentDay}')") or die(mysqli_error($conn));
    }
    if(isset($_POST['delete'])){
      echo "<script>alert('Proof of payment has been deleted')</script>";
      mysqli_query($conn, "DELETE FROM proofofpayment_masterfile WHERE proofofpayment_id = {$_POST['proof_id']}") or die(mysqli_error($conn));

    }
    $_POST = array();
    ?>
    <table id ='thisTable' class ='table table-striped display dataTable table-responsive'>
      <thead>
        <tr>
          <th>Proof of payment ID</th>
          <th>Reservation ID</th>
          <th>Guest Name</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $fetchallreservation = mysqli_query($conn, "SELECT * from proofofpayment_masterfile join reservation_masterfile on proofofpayment_masterfile.reservation_id = reservation_masterfile.reservation_id inner join guest_masterfile on guest_masterfile.guest_ID = reservation_masterfile.guest_id");
        $currentTime = date("Y-m-d");
        while($row = mysqli_fetch_assoc($fetchallreservation)){ ?>
        <tr>
          <td id ='reservation-id' ><?= $row['proofofpayment_id'] ?></td>
          <td id = 'guest-id' ><?= $row['reservation_id'] ?></td>
          <td><?= "{$row['guest_firstname']} {$row['guest_lastname']}"?></td>
          <td ><img src = '<?= $row['path'] ?>' style ='width:50%'/></td>
          <td><form method ='post'>
            <input type ='hidden' name ='proof_id' value ='<?= $row['proofofpayment_id']?> '/>
            <input type ='hidden' name = 'approve_id' value = '<?= $row['reservation_id'] ?>'/> 
            <button type ='submit' class ='btn btn-primary' onclick = "return confirm('Are you sure?')" name ='submit'>Accept</button>
            <button type ='submit' class ='btn btn-danger' onclick ="return confirm('Are you sure?')" name ='delete'>Delete</button>
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
    $('form#deleteproof').on("submit",function(){
      var prompt = confirm("Are you sure?")
      if(prompt){
        $.ajax({
          url:'../ajax/deleteproof.php',
          type:'POST',
          data:$(this).serialize(),
          success:function(html){
            alert("Proof of payment has been deleted")
            location.reload()
          }
        })
      }
    })
    $('a.edit').on('click',function(){
      var imagepath = $(this).closest('tr').find('img').attr('src')
      var proof_id = $(this).closest('tr').find('#reservation-id').html()
      $('input[name=old_img').val(imagepath)
      $('input[name=img').val(imagepath)
      $('input[name=t_id]').val(proof_id)
    })
    $('form#editproof').on("submit",function(){
      var form_data = new FormData()
      form_data.append('img', $('input[name=img]').prop('files')[0])
      form_data.append('t_id', $('input[name=t_id]').val())
      form_data.append('old_img', $('input[name=old_img]').val())
      $.ajax({
        url:'../ajax/editproof.php',
        type:'POST',
        data:form_data,
        contentType: false,
        processData: false,
        success: function(html){
          alert(html)
          alert("Success")
          location.reload()
        }
      })
    })
  })
</script>
</body>

</html>
