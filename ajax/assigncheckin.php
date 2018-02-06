<?php
session_start();
include '../db.php';
?>
<?php $fetchaddons = mysqli_query($conn, "SELECT * FROM addons_masterfile");
while($addon = mysqli_fetch_assoc($fetchaddons)){ 
	$fetchreservedaddons = mysqli_query($conn, "SELECT guestaddons_masterfile.quantity FROM reservation_masterfile JOIN guestaddons_masterfile ON guestaddons_masterfile.reservation_id = reservation_masterfile.reservation_id WHERE (((checkoutdate >= '{$_POST['checkin']}' AND checkindate <= '{$_POST['checkin']}') OR (checkoutdate >='{$_POST['checkout']}' AND checkindate <= '{$_POST['checkout']}')) AND guestaddons_masterfile.addons_id = {$addon['Addon_ID']}) AND (status = 'Approved' or status = 'Checkin')") or die(mysqli_error($conn));
	$reservedaddons = 0;
	while($guestaddons = mysqli_fetch_assoc($fetchreservedaddons)){
		$reservedaddons += $guestaddons['quantity'];
	}
	$remainingaddons = $addon['Addon_qty'] - $reservedaddons;
	?>
	<div class =' form-group col-md-8'>
		<input type ='text' name = addon[<?=$addon['Addon_ID']?>]' class ='form-control' style ='background-color: white'disabled value ='<?=$addon['Addon_name']?>'/>
	</div>
	<div class =' form-group col-md-4'>
		<select class ='form-control addonqty' name= 'addonqty[<?=$addon['Addon_ID']?>]'>
			<?php 
			for($i = 0; $i<=$remainingaddons; $i++){
				echo "<option value ='{$i}'>{$i}</option>";
			}
			?> 
		</select>
	</div>
	<?php } ?>