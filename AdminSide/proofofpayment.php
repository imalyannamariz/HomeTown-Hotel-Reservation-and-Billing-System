 <?= include_once 'sideBarAndTopBar.php';
 ?>

 <div class="content-wrapper">
  <div class="container-fluid">

    <table id ='thisTable' class ='table table-striped display dataTable table-responsive'>
      <thead>
        <tr>
          <th>Reservation ID</th>
          <th>Proof of payment ID</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $fetchallreservation = mysqli_query($conn, "SELECT * from proofofpayment_masterfile");
        $currentTime = date("Y-m-d");
        while($row = mysqli_fetch_assoc($fetchallreservation)){ ?>
        <tr>
          <td id ='reservation-id' ><?= $row['proofofpayment_id'] ?></td>
          <td id = 'guest-id' ><?= $row['reservation_id'] ?></td>
          <td ><img src = '<?= $row['path'] ?>' style ='width:50%'/></td>
          <td><form id = 'deleteproof'>
            <a data-toggle ='modal' data-target = '#editreservation' class='btn btn-primary edit' style ='color:white'>Edit</a>
            <input type="hidden" name="t_id" value="<?= $row['proofofpayment_id'] ?>">
            <input type ='hidden' name ='imgpath' value = '<?= $row['path'] ?>' />
            <input type ='hidden' name ='r_id' value = '<?= $row['reservation_id']?>'/>
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
    $('$form#editproof').on("submit",function(){
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
          alert("Success")
          location.reload()
        }
      })
    })
  })
</script>
</body>

</html>
