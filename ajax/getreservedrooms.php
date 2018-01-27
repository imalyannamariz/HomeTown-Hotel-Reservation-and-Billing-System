<?php 
include '../db.php';
$fetchroom = mysqli_query($conn, "SELECT * FROM room_masterfile WHERE room_id = {$_POST['room_id']}");
$getroomcount = mysqli_fetch_assoc($fetchroom);
$fetchReservedrooms = mysqli_query($conn, "SELECT room_number FROM reservation_masterfile WHERE ((checkoutdate >= '{$_POST['checkInDate']}' AND checkindate <= '{$_POST['checkInDate']}') OR (checkoutdate >='{$_POST['checkOutDate']}' AND checkindate <= '{$_POST['checkOutDate']}')) AND room_id = {$_POST['room_id']}") or die(mysqli_error($conn));
$reservedroomSum = 0;
while($row1 = mysqli_fetch_assoc($fetchReservedrooms)){
	$reservedroomSum += $row1['room_number'];
}
echo $getroomcount['room_number'] - $reservedroomSum;
?>