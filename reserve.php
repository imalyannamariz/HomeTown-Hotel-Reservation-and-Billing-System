<?php 
include 'db.php';
session_start();
 if(!isset($_SESSION['login'])){
    echo "<script>alert('Please login to continue')
    window.location.href = 'login.php';
    </script>";
  }
 else if(!isset($_SESSION['reservation']) ){
 	echo "<script>Make sure your reservation is complete
 	window.location.href ='step1.php'
 	</script>
 	";
 }
 $addon_id = 0;
 if(isset($_SESSION['reservation']['addon_id'])){
 	$addon_id = $_SESSION['reservation']['addon_id'];
 }
$checkInDate = date("Y-m-d", strtotime($_SESSION['reservation']['checkInDate']));
$checkOutDate = date("Y-m-d", strtotime($_SESSION['reservation']['checkOutDate']));
 mysqli_query($conn, "INSERT INTO reservation_masterfile(guest_id, room_id,checkindate,checkoutdate,number_guest)
 	VALUES({$_SESSION['guest_ID']} ,{$_SESSION['reservation']['roomid']},'{$checkInDate}'
 	 ,'{$checkOutDate}',{$_SESSION['reservation']['numberOfAdults']})") or die(mysqli_error($conn));

while($checkInDate <= $checkOutDate){
	mysqli_query($conn, "INSERT INTO assignedroom_masterfile(room_id, guest_id, date)VALUES(
				{$_SESSION['reservation']['roomid']}, {$_SESSION['guest_ID']}, '{$checkInDate}')") or die(mysqli_error($conn));
	$checkInDate = date("Y-m-d", strtotime($checkInDate) + (60*60*24)); // +1 day per loop
}
header("Location: GuestDashboard.php");


?>