  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<?php
include_once '../db.php';
$fetchreceipt = mysqli_query($conn, "SELECT * FROM receipts_masterfile JOIN billing_masterfile ON billing_masterfile.billing_id = receipts_masterfile.billing_id JOIN reservation_masterfile ON reservation_masterfile.reservation_id = receipts_masterfile.reservation_id WHERE receipts_masterfile.receipts_id = {$_GET['receipt_id']} ")or die (mysqli_error($conn));
$row = mysqli_fetch_assoc($fetchreceipt);


?>
<div align = 'center'>
<h1 class ='title'>Hometown Hotel</h1>
<h3 class ='title'>Transaction</h3>
<div class ='row'>
	<div class ='col-md-6'>
		<h5>asdsad</h5>
	</div>
	<div class ='col-md-6'>
		<h5>asds</h5>
	</div>
</div>
</div>