<?php 
include_once 'sideBarAndTopBar.php';

if(isset($_POST['update'])){
	echo "<script>alert('Success')</script>";
	$payment = mysqli_real_escape_string($conn, $_POST['payment']);
	mysqli_query($conn, "UPDATE walkinreservation_masterfile SET balance = balance - {$payment} WHERE reservation_id = {$_POST['r_id']}") or die(mysqli_error($conn));
	$_POST = array();
}
?>
<div class="content-wrapper">
	<div class="container-fluid">
		<table id ='thisTable' class ='table table-striped display dataTable table-responsive'>
			<thead>
				<tr>
					<th>Reservation ID</th>
					<th>Check in date</th>
					<th>Check out date</th>
					<th>Name</th>
					<th>Code</th>
					<th>Balance</th>
					<th>Total</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $query = mysqli_query($conn, "SELECT * FROM walkinreservation_masterfile ");
				while($row = mysqli_fetch_assoc($query)){
					?>
					<tr>
						<td id = 'reservation-id'><?=$row['reservation_id']?></td>
						<td><?=$row['checkindate']?></td>
						<td><?=$row['checkoutdate']?></td>
						<td><?="{$row['firstname']} {$row['lastname']}"?></td>
						<td><?=$row['code']?></td>
						<td id ='balance'><?=number_format($row['balance'],2). " PHP"?></td>
						<td><?=number_format($row['total'],2) ." PHP"?></td>
						<td><?=$row['email']?></td>
						<td><a href ='#'class ='btn btn-info btn-block paymentmodal' data-toggle= 'modal' data-target='#pay'>Pay</a></td>
					</tr>
					<?php
				}?>
			</tbody>
			<tfoot></tfoot>
		</table>
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
						<form method ='post'>
							<div class='container-fluid'>
								<div class='form-group'>
									<input type ='number' id ='payment' class ='form-control' placeholder = 'Input guest payment here' name = 'payment'/>
								</div>
								<hr/>
								<div class ='row'>
									<div class ='col-md-6' style ='text-align:left'>
										<h6>Change</h6>
									</div>
									<hr/>
                <!-- <div class ='row'>
                  <div class ='col-md-6' style ='text-align:left'>
                    <h6>Change: Php</h6>
                  </div> -->
                  <div class ='col-md-6' style ='text-align:right'>
                  	<h6 id = 'changeVal'>None</h6>
                  </div>
                <!-- <div class ='col-md-6' style ='text-align:right'>
                  <h6 id = 'changeVal'>None</h6>
                </div> -->
              </div>

            </div>

          </div>
          <div class="modal-footer">
          	<input type ='hidden' name ='r_id'/>
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
<script src="js/jquery.datetimepicker.full.min.js"></script>
<script>
	$(document).ready(function(){
		$('.paymentmodal').click(function() {
			var total = $(this).closest('tr').find('#balance').html().replace(/\,/, '')
			var r_id = $(this).closest('tr').find('#reservation-id').html()
			$('input[name=currentBalance]').val(total)
			$('input[name=r_id]').val(r_id)
		})

		$('#payment').keyup(function() {
			String.prototype.number_format = function(d) {
				var n = this;
				var c = isNaN(d = Math.abs(d)) ? 2 : d;
				var s = n < 0 ? "-" : "";
				var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
				return s + (j ? i.substr(0, j) + ',' : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ',') + (c ? '.' + Math.abs(n - i).toFixed(c).slice(2) : "");
			}
			var payment = parseFloat($(this).val())
			var balance = parseFloat($('input[name=currentBalance]').val())
			$('#changeVal').html("None")
			if (balance < payment) {
				$('#changeVal').html((payment - balance).toString().number_format() + " PHP")
			}
		})
	})
</script>