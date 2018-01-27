<?php 
include_once '../db.php';
$currentDay = date("Y-m-d H:i:s");
if($_POST['payment'] < $_POST['currentBalance']){
	mysqli_query($conn, "UPDATE billing_masterfile SET balance = balance - {$_POST['payment']}, status = 'Partial', updated_at = '{$currentDay}' WHERE billing_id = {$_POST['b_id']}") or die(mysqli_error($conn));
}
else{
	mysqli_query($conn, "UPDATE billing_masterfile SET balance = 0, status = 'Fully Paid', updated_at = '{$currentDay}' WHERE billing_id = {$_POST['b_id']}") or die(mysqli_error($conn));
}
?>