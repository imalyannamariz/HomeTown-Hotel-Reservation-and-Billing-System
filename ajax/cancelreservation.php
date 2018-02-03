<?php 
include '../db.php';
$fetchreservation = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE reservation_id = {$_POST['t_id']}") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($fetchreservation);
mysqli_query($conn, "DELETE FROM reservation_masterfile WHERE reservation_id = {$_POST['t_id']}") or die (mysqli_error($conn));
mysqli_query($conn, "DELETE FROM guestaddons_masterfile WHERE reservation_id = {$_POST['t_id']}") or die(mysqli_error($conn));
mysqli_query($conn, "DELETE FROM billing_masterfile WHERE reservation_id = {$_POST['t_id']}") or die(mysqli_error($conn));
mysqli_query($conn, "DELETE FROM assignedroom_masterfile WHERE code = '{$row['reservation_code']}'") or die(mysqli_error($conn));
?>