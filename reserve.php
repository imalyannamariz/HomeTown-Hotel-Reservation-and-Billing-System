<?php 
include 'db.php';
session_start();
 if(!isset($_SESSION['login'])){
    echo "<script>alert('Please login to continue')
    window.location.href = 'login.php';
    </script>";
  }
 else if(!isset($_SESSION['reservation']) && count($_SESSION['reservation'])  != 8 ){
 	echo "<script>alert('Make sure your reservation is complete')
 	window.location.href ='step1.php'
 	</script>
 	";
 }
 $addon_id = 0;
 mysqli_query($conn, "INSERT INTO reservation_masterfile(guest_id, room_id,checkindate,checkoutdate,number_guest, room_number)
 	VALUES({$_SESSION['guest_ID']} ,{$_SESSION['reservation']['roomid']},'{$checkInDate}'
 	 ,'{$checkOutDate}',{$_SESSION['reservation']['numberOfAdults']}, {$_SESSION['reservation']['roomno']})") or die(mysqli_error($conn));

if(isset($_SESSION['reservation']['addon_id'])){
 	$addonId = $_SESSION['reservation']['addon_id'];
 	$fetch_reservationID = mysqli_query($conn, "SELECT max(reservation_id) FROM reservation_masterfile");
 	$row = mysqli_fetch_assoc($fetch_reservationID);
 	foreach($addon_id as $ids){
 		mysqli_query($conn, "INSERT INTO guestaddons_masterfile(addons_id,reservation_id) VALUES($ids, {$row['max(reservation_id)']})") or die(mysqli_error($conn));
 	}
}
// while($checkInDate <= $checkOutDate){
// 	mysqli_query($conn, "INSERT INTO assignedroom_masterfile(room_id, guest_id, date)VALUES(
// 				{$_SESSION['reservation']['roomid']}, {$_SESSION['guest_ID']}, '{$checkInDate}')") or die(mysqli_error($conn));
// 	$checkInDate = date("Y-m-d", strtotime($checkInDate) + (60*60*24)); // +1 day per loop
// }
unset($_SESSION['reservation']);
header("Location: GuestDashboard.php");
?>