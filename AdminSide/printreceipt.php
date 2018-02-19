  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <?php
  include_once '../db.php';
  $total = 0;
  $fetchreceipt = mysqli_query($conn, "SELECT * FROM receipts_masterfile JOIN guest_masterfile ON receipts_masterfile.guest_id = guest_masterfile.guest_id WHERE receipts_masterfile.receipts_id = {$_GET['receipt_id']} ")or die (mysqli_error($conn));
  $receipt = mysqli_fetch_assoc($fetchreceipt);
  $fetchallbilling = mysqli_query($conn, "SELECT *, reservation_masterfile.room_number as reserve_number FROM billing_masterfile INNER JOIN reservation_masterfile ON reservation_masterfile.reservation_id = billing_masterfile.reservation_id INNER JOIN room_masterfile ON reservation_masterfile.room_id = room_masterfile.room_id WHERE billing_masterfile.guest_id = {$receipt['guest_id']} AND (billing_masterfile.status = 'Partial' OR billing_masterfile.status = 'Fully Paid')");

  ?>
  <body data-gr-c-s-loaded="true" style="
    background-color: #fff;">
  <div align = 'center'>
  	<h1 class ='title'>Hometown Hotel</h1>
  	<div class ='col-md-6'>
  		<h5>Guest Name</h5>
  	</div>
  	<div class ='col-md-6'>
  		<h5><?= "{$receipt['guest_firstname']} {$receipt['guest_lastname']}" ?></h5>
  	</div>
  	<h3 class ='title'>Transaction</h3>
  	<table class ='table table-striped'>
  		<thead>
  			<th>Description</th>
  			<th>Quantity</th>
  			<th>Price</th>
  		</thead>
  		<tbody>
  			<?php while($row = mysqli_fetch_assoc($fetchallbilling)) {
  				$type = ($row['total'] - $row['balance'] == $row['total'])? "Fully Paid" : "Partial";
  				$fetchAddon = mysqli_query($conn, "SELECT * FROM guestaddons_masterfile JOIN addons_masterfile ON guestaddons_masterfile.addons_id = addons_masterfile.Addon_ID WHERE guestaddons_masterfile.reservation_id = {$row['reservation_id']}") or die(mysqli_error($conn));
  				$addonstr = '';
  				$totalQty = $row['reserve_number'];
  				if(mysqli_num_rows($fetchAddon) != 0){
  					while($addons = mysqli_fetch_assoc($fetchAddon)){
  						$addonstr .= "{$addons['quantity']} {$addons['Addon_name']} ";
  						$totalQty += $addons['quantity'];
  					}
  				}
  				?>
  				<tr>
  					<td><?="{$row['room_type']} ({$type}) [{$row['checkindate']} - {$row['checkoutdate']}]<br/>{$addonstr}"?></td>
  					<td><?= $totalQty ?></td>
  					<td><?= number_format($row['total'] - $row['balance'],2)?> PHP</td>
  				</tr>
  				<?php 
  				$total += ($row['total'] - $row['balance']);
  			} ?>
  		</tbody>
  	</table>
  	<hr>
  	<div class ='row'>
  		<div class =' col-md-6'>
  			<h5>Total</h5>
  		</div>
  		<div class ='col-md-6'>
  			<h5><?=number_format($total,2)?> PHP</h5>
  		</div>
  	</div>
  </div>
  <button class ='btn btn-success' onclick ='window.print()'>Print</button>