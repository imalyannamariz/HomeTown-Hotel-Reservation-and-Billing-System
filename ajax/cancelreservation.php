<?php 
include '../db.php';
mysqli_query($conn, "DELETE FROM reservation_masterfile WHERE reservation_id = {$_POST['t_id']}") or die (mysqli_error($conn));
mysqli_query($conn, "DELETE FROM guestaddons_masterfile WHERE reservation_id = {$_POST['t_id']}") or die(mysqli_error($conn));
?>