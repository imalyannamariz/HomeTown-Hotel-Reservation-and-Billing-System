<?php 
include '../db.php';
$currentDay = date("Y-m-d H:i:s");
if(isset($_POST['checkin'])){
	echo "Reservation has checked in";
	mysqli_query($conn, "UPDATE reservation_masterfile SET status = 'Checkin' WHERE reservation_id = {$_POST['t_id']}");

	mysqli_query($conn, "INSERT INTO reservationreports_masterfile(reservation_id, created_at, updated_at) VALUES({$_POST['t_id']}, '{$currentDay}', '{$currentDay}')");
}
if(isset($_POST['checkout'])){
	echo "Reservation has been successfully checked out.";
	mysqli_query($conn, "UPDATE reservation_masterfile SET status = 'Checkout' WHERE reservation_id = {$_POST['t_id']}");
	mysqli_query($conn, "SELECT * FROM reservation_masterfile(reservation_id, created_at, updated_at) VALUES({$_POST['t_id']},'{$currentDay}','{$currentDay}')");
}
else{
	echo "Reservation has been deleted";
	$fetchreservation = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE reservation_id = {$_POST['t_id']}") or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($fetchreservation);
	mysqli_query($conn, "DELETE FROM reservation_masterfile WHERE reservation_id = {$_POST['t_id']}") or die (mysqli_error($conn));
	mysqli_query($conn, "DELETE FROM guestaddons_masterfile WHERE reservation_id = {$_POST['t_id']}") or die(mysqli_error($conn));
	mysqli_query($conn, "DELETE FROM billing_masterfile WHERE reservation_id = {$_POST['t_id']}") or die(mysqli_error($conn));
	mysqli_query($conn, "DELETE FROM assignedroom_masterfile WHERE code = '{$row['reservation_code']}'") or die(mysqli_error($conn));
}

?>