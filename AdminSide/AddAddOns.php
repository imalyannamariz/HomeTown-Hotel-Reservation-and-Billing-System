<?php
	include_once '../db.php';
	session_start();

	if (isset($_POST['submit'])) {
		$addonName = mysqli_escape_string($conn, $_POST['name']);
		$addonRate = mysqli_escape_string($conn, $_POST['rate']);
		$addonDescription = mysqli_escape_string($conn, $_POST['Description']);
		$addonStatus = mysqli_escape_string($conn, $_POST['status']);
		$discountID = mysqli_escape_string($conn, $_POST['discount']);
    $addonQuantity = mysqli_escape_string($conn, $_POST['quantity']);
		
    // $name = basename($_FILES['image_upload']['name']);
    // $tmp = $_FILES['image_upload']['tmp_name'];
    // move_uploaded_file($tmp,"../img/{$name}");
    $query = mysqli_query($conn, "INSERT INTO addons_masterfile (Addon_name, Addon_rate, Addon_description, Addon_status, Discount_Id, Addon_qty) VALUES('{$addonName}','{$addonRate}',
       {$addonDescription}, {$addonStatus}, {$discountID},{$addonQuantity})") or die(mysqli_error($conn));
    $fetchnewid = mysqli_query($conn, "SELECT max(room_id) FROM room_masterfile");
    $room = mysqli_fetch_assoc($fetchnewid);
    for($i = 1; $i <= $roomNumber; $i++){
      mysqli_query($conn, "INSERT walkinrooms_masterfile(walkinrooms_name, room_id) VALUES('{$roomType}{$i}', {$room['max(room_id)']})") or die(mysqli_error($conn));
    }
    // echo "<script>window.alert('Success! Room added.');window.location.href='Roomsdelete.php';</script>";
// $insert_result = mysqli_query($conn, "INSERT INTO room_masterfile(room_type, room_description, room_capacity, room_rate, room_number, room_status, room_imagepath) 
    // VALUES ('{$roomType}', '{$roomDescription}', {$roomCapacity}, {$roomRate}, {$roomNumber}, '{$roomStatus}', '../img/{$roomImage}')") or die (mysqli_error($conn));
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Add-ons</title>

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
      <div class="card-header">Add Add-ons</div>
      <div class="card-body">
        <form method = "POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="RoomType">Add-on Name</label><br>
            <input required required class="form-control" name = "name" type="text" aria-describedby="emailHelp" placeholder="Room Type">
          </div>
          <div class="form-group">
            <label for="RoomType">Add-on Rate</label><br>
            <input required required class="form-control" name = "rate" type="text" aria-describedby="emailHelp" placeholder="Room Type">
          </div>
          <div class="form-group">
            <label for="Description">Add-on Description</label><br>
            <textarea required rows="4" cols="47" name="Description" form="addRoomsForm" placeholder="Enter room description here..."></textarea>
          </div>
          <div class="form-group">
            <label for="roomRate">Add-on Status</label><br>
            <input required required class="form-control" name = "status" type="number" placeholder="Room Rate">
          </div>
          <div class="form-group">
            <label for="roomNumber">Discount ID</label><br>
            <input required required class="form-control" name = "discount" type="number" placeholder="Room Number">
          </div>
           <label for="roomNumber">Add-on Quantity</label><br>
            <input required required class="form-control" name = "quantity" type="number" placeholder="Room Number">
          </div>
          <input type = 'submit' name = "submit" class="btn btn-primary btn-block" />
          <div class="text-center">
        <a class="d-block small mt-3" href="AdminPanel.php">Go Back</a>
      </div>
        </form> 
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