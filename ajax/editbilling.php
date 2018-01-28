<?php 
include_once '../db.php';
$currentDay = date("Y-m-d H:i:s");
$status = '';
if($_POST['payment'] < $_POST['currentBalance']){
	$status = 'Partial';
	mysqli_query($conn, "UPDATE billing_masterfile SET balance = balance - {$_POST['payment']}, status = '$status', updated_at = '{$currentDay}' WHERE billing_id = {$_POST['b_id']}") or die(mysqli_error($conn));
}
else{
	$status = 'Fully Paid';
	mysqli_query($conn, "UPDATE billing_masterfile SET balance = 0, status = '$status', updated_at = '{$currentDay}' WHERE billing_id = {$_POST['b_id']}") or die(mysqli_error($conn));
}
mysqli_query($conn, "INSERT INTO financialreports_masterfile (payment, payment_type,created_at) VALUES({$_POST['payment']}, '{$status}','{$currentDay}')");
?>