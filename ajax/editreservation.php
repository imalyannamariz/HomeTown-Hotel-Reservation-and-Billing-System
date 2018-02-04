<?php 
// Tanong niyo kay ma'am kung dapat ma disable yung edit kapag nag due na yung check in niya
include '../db.php';
mysqli_query($conn, "UPDATE reservation_masterfile SET checkindate = '{$_POST['checkin']}', checkoutdate ='{$_POST['checkout']}', room_number = {$_POST['roomquantity']}, room_id = {$_POST['roomtype']} WHERE reservation_id = {$_POST['reservationno']}") or die(mysqli_error($conn));
$fetchnewroom = mysqli_query($conn, "SELECT * FROM room_masterfile WHERE room_id = {$_POST['roomtype']}");
$getnewroom = mysqli_fetch_assoc($fetchnewroom);
// UPDATE billing record
$daydiff = (strtotime($_POST['checkout']) - strtotime($_POST['checkin']))/(60*60*24);
$roomrate = $getnewroom['room_rate'] * $_POST['roomquantity'];
$lengthofstay = $getnewroom['room_rate'] * $_POST['roomquantity'] * $daydiff;
$vatable = $lengthofstay * 0.12;
$vattotal = $lengthofstay;
$fetchaddons = mysqli_query($conn , "SELECT * FROM guestaddons_masterfile JOIN addons_masterfile ON guestaddons_masterfile.addons_id = addons_masterfile.Addon_ID WHERE guestaddons_masterfile.reservation_id = {$_POST['reservationno']}");
while($row = mysqli_fetch_assoc($fetchaddons)){
	$vattotal += $row['Addon_rate'];
}
$downpayment = $vattotal * 0.15;
$currentTime = date("Y-m-d H:i:s");

mysqli_query($conn, "UPDATE billing_masterfile SET balance = {$vattotal}, total = {$vattotal}, downpayment = {$downpayment}, updated_at = '{$currentTime}' WHERE reservation_id = {$_POST['reservationno']}") or die (mysqli_error($conn));
?>