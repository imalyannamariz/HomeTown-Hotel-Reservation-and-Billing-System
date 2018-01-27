<?php 
include_once '../db.php';
unlink($_POST['imgpath']);
mysqli_query($conn, "UPDATE reservation_masterfile SET status = 'Pending' WHERE reservation_id = {$_POST['r_id']}");
mysqli_query($conn, "DELETE FROM proofofpayment_masterfile WHERE proofofpayment_id = {$_POST['t_id']}");
?>