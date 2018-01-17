<?php
  require_once "dbConnect.php";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $roomId = mysqli_escape_string($conn, $_POST['roomId']);
    $roomType = mysqli_escape_string($conn, $_POST['roomType']);
    $roomDescription = mysqli_escape_string($conn, $_POST['roomDescription']);
    $roomCapacity = mysqli_escape_string($conn, $_POST['roomCapacity']);
    $roomRate = mysqli_escape_string($conn, $_POST['roomRate']);
    $roomNumber = mysqli_escape_string($conn, $_POST['roomNumber']);
    $roomStatus = mysqli_escape_string($conn, $_POST['roomStatus']);
    $image_upload = '';
    if($_POST['image_upload'] != '')
      $image_upload = ",room_imagepath = 'img/{$_POST['image_upload']}'";
    $query = "UPDATE room_masterfile SET room_id=$roomId,room_type='$roomType',room_description='$roomDescription',room_capacity='$roomCapacity',room_rate=$roomRate,room_number=$roomNumber,room_status='$roomStatus' {$image_upload} WHERE room_id = $roomId";
    try {
      $update_result = mysqli_query($conn,$query) or die (mysqli_error($conn));
      if ($update_result) {
        if(mysqli_affected_rows($conn) > 0){
          echo "Successfully Updated!";
        } else {
          echo "There was an error editing the room.";
        }
      }
    } catch (Exception $ex) {
      echo "Error Inserting Data".$ex->getMessage();
    }
  }
?>