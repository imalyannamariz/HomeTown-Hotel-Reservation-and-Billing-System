<?php 
include_once '../db.php';
$name = basename($_FILES['img']['name']);
$tmp = $_FILES['img']['tmp_name'];
move_uploaded_file($tmp, "../uploads/{$name}");
echo print_r($_FILES);
?>