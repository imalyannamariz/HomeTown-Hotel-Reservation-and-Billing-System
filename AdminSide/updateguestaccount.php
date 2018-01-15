<?php
  require_once "dbConnect.php";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $guestId = mysqli_escape_string($conn, $_POST['guestID']);
    $firstName = mysqli_escape_string($conn, $_POST['firstname']);
    $lastName = mysqli_escape_string($conn, $_POST['lastName']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $contactNumber = mysqli_escape_string($conn, $_POST['contactNumber']);
    $oldPassword 
    $newPassword =
    $address = mysqli_escape_string($conn, $_POST['address']);
    $country = mysqli_escape_string($conn, $_POST['country']);
    
    $query = "UPDATE guest_masterfile SET guest_ID=$guestId,guest_firstname=$firstName,`guest_lastname`=$lastName,`guest_email`=$email,`guest_password`=$newPassword,`guest_contactNumber`=$contactNumber,`guest_country`=$country,`guest_address`=$address WHERE guest_ID=$guestId";
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