<?php 
// Tanong niyo kay ma'am kung dapat ma disable yung edit kapag nag due na yung check in niya
include '../db.php';
mysqli_query($conn, "UPDATE reservation_masterfile SET checkindate = '{$_POST['checkin']}', checkoutdate ='{$_POST['checkout']}', room_number = {$_POST['roomquantity']}, room_id = {$_POST['roomtype']} WHERE reservation_id = '{$_POST['reservationno']}'") or die(mysqli_error($conn)."Asds");
$fetchreservation = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE reservation_id = '{$_POST['reservationno']}'") or die(mysqli_error($conn). "asd");
$reservation = mysqli_fetch_assoc($fetchreservation);
$checkOutDate = date("Y-m-d", strtotime($_POST['checkout']));
mysqli_query($conn, "DELETE FROM assignedroom_masterfile WHERE code ='{$reservation['reservation_code']}'") or die(mysqli_error($conn). "asdsad");
$getallwalkrinrooms = mysqli_query($conn, "SELECT * FROM walkinrooms_masterfile WHERE room_id = {$_POST['roomtype']}") or die(mysqli_error($conn)."dsdsds");
$i=0;
while($row = mysqli_fetch_assoc($getallwalkrinrooms)){
	if($i == $_POST['roomquantity'])
		break;
	$checkInDate = date("Y-m-d", strtotime($_POST['checkin']));
	$getreservedroom = mysqli_query($conn, "SELECT * FROM assignedroom_masterfile WHERE (date >= '{$checkInDate}' AND date <= '{$checkOutDate}') AND room_id = {$row['walkinrooms_id']} ") or die(mysqli_error($conn). "sdsd");
	if(mysqli_num_rows($getreservedroom) == 0){
		while($checkInDate <= $checkOutDate){
			mysqli_query($conn, "INSERT INTO assignedroom_masterfile(room_id,date, status, type, code)VALUES({$row['walkinrooms_id']}, '{$checkInDate}','Temporary','Reservation','{$reservation['reservation_code']}')") or die(mysqli_error($conn). "dsa");
			$checkInDate = date("Y-m-d", strtotime($checkInDate) + (60*60*24)); // +1 day per loop
		}
		$i++;
	}
}

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
$fetchguest = mysqli_query($conn, "SELECT * FROM reservation_masterfile  JOIN guest_masterfile ON reservation_masterfile.guest_id = guest_masterfile.guest_ID WHERE reservation_masterfile.reservation_id = {$_POST['reservationno']}") or die(mysqli_error($conn));
$guest = mysqli_fetch_assoc($fetchguest);
if($guest['count'] >= 3){
	$vattotal *= 0.90;
}
$downpayment = $vattotal * 0.15;
$currentTime = date("Y-m-d H:i:s");

mysqli_query($conn, "UPDATE billing_masterfile SET balance = {$vattotal}, total = {$vattotal}, downpayment = {$downpayment}, updated_at = '{$currentTime}' WHERE reservation_id = {$_POST['reservationno']}") or die (mysqli_error($conn). "sdsds");

?>