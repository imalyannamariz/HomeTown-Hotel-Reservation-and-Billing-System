<?php
	include_once '../db.php';
	session_start();

 
	if (isset($_POST['submit'])) {
		$roomType = mysqli_escape_string($conn, $_POST['roomType']);
		$roomDescription = mysqli_escape_string($conn, $_POST['roomDescription']);
		$roomCapacity = mysqli_escape_string($conn, $_POST['roomCapacity']);
		$roomRate = mysqli_escape_string($conn, $_POST['roomRate']);
		$roomNumber = mysqli_escape_string($conn, $_POST['roomNumber']);
		$roomStatus = mysqli_escape_string($conn, $_POST['roomStatus']);
    $roomImage = mysqli_escape_string($conn, $_POST['image_upload']);
        
    $query = mysqli_query($conn, "INSERT INTO room_masterfile (room_type, room_description, room_capacity, room_rate, room_number, room_status, room_imagepath) VALUES('{$roomType}','{$roomDescription}',
       {$roomCapacity}, {$roomRate}, {$roomNumber},'{$roomStatus}','img/{$roomImage}')") or die(mysqli_error($conn));
    $fetchnewid = mysqli_query($conn, "SELECT max(room_id) FROM room_masterfile");
    $room = mysqli_fetch_assoc($fetchnewid);
    for($i = 1; $i <= $roomNumber; $i++){
      mysqli_query($conn, "INSERT walkinrooms_masterfile(walkinrooms_name, room_id) VALUES('{$roomType}{$i}', {$room['max(room_id)']})") or die(mysqli_error($conn));
    }
    echo "<script>window.alert('Success! Room added.');window.location.href='Roomsdelete.php';</script>";
// $insert_result = mysqli_query($conn, "INSERT INTO room_masterfile(room_type, room_description, room_capacity, room_rate, room_number, room_status, room_imagepath) 
    // VALUES ('{$roomType}', '{$roomDescription}', {$roomCapacity}, {$roomRate}, {$roomNumber}, '{$roomStatus}', '../img/{$roomImage}')") or die (mysqli_error($conn));
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Room</title>

	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>HomeTown Hotel - Admin Module</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body>
	<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Add Rooms</div>
      <div class="card-body">
        <form method = "POST" action = "RoomsAdd.php" id = "addRoomsForm" enctype = 'multiform/form-data'>
          <div class="form-group">
            <label for="RoomType">Room Type</label><br>
            <input required class="form-control" name = "roomType" type="text" aria-describedby="emailHelp" placeholder="Room Type">
          </div>
          <div class="form-group">
            <label for="roomDescription">Room Description</label><br>
            <textarea rows="4" cols="47" name="roomDescription" form="addRoomsForm" placeholder="Enter room description here..."></textarea>
          </div>
          <div class="form-group">
            <label for="roomRate">Room Capacity</label><br>
            <input required class="form-control" name = "roomCapacity" type="number" placeholder="Room Capacity">
          </div>
          <div class="form-group">
            <label for="roomRate">Room Rate per night</label><br>
            <input required class="form-control" name = "roomRate" type="number" placeholder="Room Rate">
          </div>
          <div class="form-group">
            <label for="roomNumber">Room Number</label><br>
            <input required class="form-control" name = "roomNumber" type="number" placeholder="Room Number">
          </div>
           <div class="form-group">
            <label for="roomStatus">Room Status &nbsp&nbsp</label>
            <select required name = "roomStatus">
            	<option value = "Available" selected = "selected">Available</option>
            	<option value = "UnderMaintenance">Reserved</option>
            	<option value = "Occupied">Occupied</option> 	
            </select>            	
          </div>
          <div class='form-group'>
            <label for ='image_upload'>Image</label><br>
            <input type ='file' accept = 'image/*' name = 'image_upload'>
          </div>
           </div>
          <input type = 'submit' name = "submit" class="btn btn-primary btn-block" />
        </form>  
         <button class="btn btn-primary btn-block" href="adminPanel.php" style="background: red";>Cancel</button>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>