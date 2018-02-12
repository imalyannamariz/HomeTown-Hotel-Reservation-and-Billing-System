<?php
include_once '../db.php';
$checkifexist = mysqli_query($conn, "SELECT * FROM guestaddons_masterfile WHERE addons_id = {$_POST['addons']} AND reservation_id = {$_POST['r_id']}");
if(mysqli_num_rows($checkifexist) != 0){
    mysqli_query($conn, "UPDATE guestaddons_masterfile SET quantity = quantity + {$_POST['addonsqty']} WHERE reservation_id = {$_POST['r_id']} AND addons_id = {$_POST['addons']}") or die(mysqli_error($conn));
}
else{
mysqli_query($conn, "INSERT INTO guestaddons_masterfile(addons_id, reservation_id, quantity) VALUES({$_POST['addons']},{$_POST['r_id']}, {$_POST['addonsqty']})") or die(mysqli_error($conn));
}
$fetchrate = mysqli_query($conn, "SELECT * FROM addons_masterfile WHERE Addon_ID = {$_POST['addons']}") or die(mysqli_error($conn));
$addon = mysqli_fetch_assoc($fetchrate);
$total = $addon['Addon_rate'] * $_POST['addonsqty'];
echo $total;
echo $_POST['r_id'];
$currentTime = date("Y-m-d H:i:s");
mysqli_query($conn, "UPDATE billing_masterfile SET balance = balance + {$total}, total = total + {$total},  updated_at = '{$currentTime}' WHERE reservation_id = {$_POST['r_id']}") or die(mysqli_error($conn));
?>