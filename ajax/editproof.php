<?php 
include 'db.php';
$name = basename($_FILES['img']['name']);
$tmp = $_FILES['img']['tmp_name'];
unlink($_POST['old_img'])
move_uploaded_file($tmp, "../uploads/{$name}");
mysqli_query($conn, "UPDATE proofofpayment_masterfile SET path = '../uploads/{$name}' WHERE proofofpayment_id = {$_POST['t_id']}");
?>