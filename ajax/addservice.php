<?php
include_once '../db.php';
$checkifexist = mysqli_query($conn, "SELECT * FROM guestaddons_masterfile WHERE addons_id = {$_POST['addons']} AND reservation_id = {$_POST['r_id']}");
if(mysqli_num_rows($checkifexist) != 0){
    mysqli_query($conn, "UPDATE guestaddons_masterfile SET quantity = quantity + {$_POST['addonsqty']} WHERE reservation_id = {$_POST['r_id']} AND addons_id = {$_POST['addons']}");
}
else{
mysqli_query($conn, "INSERT INTO guestaddons_masterfile(addons_id, reservation_id, quantity) VALUES({$_POST['addons']},{$_POST['r_id']}, {$_POST['addonsqty']})");
}

?>