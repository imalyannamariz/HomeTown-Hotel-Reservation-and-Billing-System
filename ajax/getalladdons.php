<?php 
include '../db.php';
$fetchreservedaddons = mysqli_query($conn, "SELECT guestaddons_masterfile.quantity FROM reservation_masterfile JOIN guestaddons_masterfile ON guestaddons_masterfile.reservation_id = reservation_masterfile.reservation_id WHERE (((checkoutdate >= '{$_POST['checkInDate']}' AND checkindate <= '{$_POST['checkInDate']}') OR (checkoutdate >='{$_POST['checkOutDate']}' AND checkindate <= '{$_POST['checkOutDate']}')) AND guestaddons_masterfile.addons_id = {$_POST['a_id']}) AND (status = 'Approved' or status = 'Checkin')") or die(mysqli_error($conn));
$fetchaddons = mysqli_query($conn, "SELECT * FROM addons_masterfile WHERE Addon_id = {$_POST['a_id']}");
$addons = mysqli_fetch_assoc($fetchaddons);
$addonqty=  0;
while($raddons = mysqli_fetch_assoc($fetchreservedaddons)){
	$addonqty+= $raddons['quantity'];
}
echo $addons['Addon_qty'] - $addonqty;
// echo print_r($_POST)
?>