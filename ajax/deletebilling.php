<?php 
include '../db.php';
mysqli_query($conn,"DELETE FROM billing_masterfile WHERE billing_id = {$_POST['t_id']}") or die(mysqli_error($conn));
?>