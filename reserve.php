<?php 
include 'db.php';
session_start();
 if(!isset($_SESSION['login'])){
    echo "<script>alert('Please login to continue')
    window.location.href = 'login.php';
    </script>";
  }
 if(!isset($_SESSION['reservation']) || count($_SESSION['reservation'])  < 9 ){
 	echo "<script>alert('Make sure your reservation is complete')
 	window.location.href ='step1.php'
 	</script>";
 }
// Declarations 
$currentTime = date("Y-m-d H:i:s");

mysqli_query($conn, "INSERT INTO reservation_masterfile(guest_id, room_id,checkindate,checkoutdate,number_guest, room_number)
 	VALUES({$_SESSION['guest_ID']} ,{$_SESSION['reservation']['roomid']},'{$_SESSION['reservation']['checkInDate']}'
 	 ,'{$_SESSION['reservation']['checkOutDate']}',{$_SESSION['reservation']['numberOfAdults']}, {$_SESSION['reservation']['roomno']})") or die(mysqli_error($conn));

$fetch_reservationID = mysqli_query($conn, "SELECT max(reservation_id) FROM reservation_masterfile");
$row = mysqli_fetch_assoc($fetch_reservationID);
$balance = $_SESSION['reservation']['balance'];
$downpayment = $balance *0.15;
mysqli_query($conn, "INSERT INTO billing_masterfile(reservation_id, guest_id, balance,total,downpayment,status, created_at, updated_at) VALUES({$row['max(reservation_id)']}, {$_SESSION['guest_ID']}, {$balance},{$balance},{$downpayment},'Not paid', '{$currentTime}','{$currentTime}')") or die(mysqli_error($conn));
if(isset($_SESSION['reservation']['services'])){
 	$addons = $_SESSION['reservation']['services'];

 	foreach($addons as $addon_id=>$addon_name){
 		mysqli_query($conn, "INSERT INTO guestaddons_masterfile(addons_id,reservation_id) VALUES($addon_id, {$row['max(reservation_id)']})") or die(mysqli_error($conn));
 	}
}
// if shit happens
// while($checkInDate <= $checkOutDate){
// 	mysqli_query($conn, "INSERT INTO assignedroom_masterfile(room_id, guest_id, date)VALUES(
// 				{$_SESSION['reservation']['roomid']}, {$_SESSION['guest_ID']}, '{$checkInDate}')") or die(mysqli_error($conn));
// 	$checkInDate = date("Y-m-d", strtotime($checkInDate) + (60*60*24)); // +1 day per loop
// }
unset($_SESSION['reservation']);
header("Location: GuestDashboard.php");
?>