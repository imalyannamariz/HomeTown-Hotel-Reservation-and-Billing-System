<?php
	date_default_timezone_set("Asia/Manila");
	/*connection string*/

	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "hometown_hotel";

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$currentDay = date("Y-m-d");
	$fetchreservation = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE checkindate <= '{$currentDay}' AND status ='Pending'");
	while($row = mysqli_fetch_assoc($fetchreservation)){
		mysqli_query($conn, "DELETE FROM guestaddons_masterfile WHERE reservation_id = {$row['reservation_id']}") or die(mysqli_error($conn));
		mysqli_query($conn, "DELETE FROM billing_masterfile WHERE reservation_id = {$row['reservation_id']}") or die(mysqli_error($conn));
		mysqli_query($conn, "UPDATE reservation_masterfile SET status ='Void' WHERE reservation_id = {$row['reservation_id']}") or die(mysqli_error($conn));
	}
?>