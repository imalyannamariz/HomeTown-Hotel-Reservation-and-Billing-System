<?php 
include 'db.php';
for($i = 0; $i<=3; $i++){
	mysqli_query($conn, "INSERT INTO walkinrooms_masterfile(walkinrooms_name, walkinrooms_status) VALUES ('Quadroom{$i}', 'Available')");
}
?>