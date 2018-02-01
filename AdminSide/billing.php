 <?= include_once 'sideBarAndTopBar.php'; ?>
 <div class="content-wrapper">
  <div class="container-fluid">

    <table class ='table table-striped'>
      <thead>
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
      </thead>
      <tbody>
        <?php $fetchallreservation = mysqli_query($conn, "SELECT * FROM billing_masterfile");
        $currentTime = date("Y-m-d");
        while($row = mysqli_fetch_assoc($fetchallreservation)){ ?>
        <tr>
          <td id ='billing-id' ><?= $row['billing_id'] ?></td>
          <td id = 'guest-id' ><?= $row['guest_id'] ?></td>
          <td id = 'reservation-id' ><?= $row['reservation_id'] ?></td>
          <td id = 'balance' ><?= number_format($row['balance'],2) ?></td>
          <td id = 'total' ><?= number_format($row['total'],2) ?></td>
          <td id = 'number-guest'><?= number_format($row['downpayment'], 2)?></td>
          <td ><?= $row['status'] ?></td>
          <td ><?= $row['created_at'] ?></td>
          <td ><?= $row['updated_at'] ?></td>
          <td><form id = 'deletebilling' action = '../ajax/deletebilling.php'>
            <a data-toggle ='modal' data-target = '#editreservation' class='btn btn-primary edit' style ='color:white'>Edit</a>
            <input type="hidden" name="t_id" value="<?= $row['billing_id'] ?>">
            <button type ='submit' class ='btn btn-danger'>Delete</button>
          </form></td>
        </tr>
        <?php } ?>
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
            <form id="formEditRoom" action ='../ajax/editbilling.php' enctype="multipart/form-data" method ='post'>
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
              <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Update</button>
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
<script type = 'text/javascript' src ='js/datatables.min.js'></script> 
<script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $('.table').DataTable()
    $('.edit').click(function(){
      var b_id = $(this).closest('tr').find('#billing-id').html()
      var total = $(this).closest('tr').find('#balance').html().replace(/\,/, '')
      $('input[name=b_id]').val(b_id)
      $('input[name=currentBalance]').val(total)
    })
    $('form').on('submit', function(e){
      e.preventDefault();
      var  message
      var prompt = true
      if($(this).attr('id') == 'formEditRoom'){
        message = "Billing has been updated"
      }
      else{
        var prompt = confirm("Are you sure?")
        message = "Billing has been deleted"
      }
      if(prompt){
        $.ajax({
          type:'POST',
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function(html){
            alert(message)
            location.reload()
          }
        })
      }
    })
    $('#payment').change(function(){
      var payment = parseFloat($(this).val())
      var balance = parseFloat($('input[name=currentBalance]').val())
      if(balance < payment){
        $('#changeVal').html(payment - balance)
      }
    })
  })
</script>
</body>

</html>
