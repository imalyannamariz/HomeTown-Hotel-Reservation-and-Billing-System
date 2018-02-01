<?php 
include_once '../db.php';
$name = basename($_FILES['img']['name']);
$tmp = $_FILES['img']['tmp_name'];
move_uploaded_file($tmp, "../uploads/{$name}");
mysqli_query($conn, "INSERT INTO proofofpayment_masterfile (reservation_id,path) VALUES({$_POST['code']},'../uploads/{$name}')");
?>