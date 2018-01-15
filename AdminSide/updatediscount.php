<?php
  require_once "dbConnect.php";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $discountId = mysqli_escape_string($conn, $_POST['discountId']);
    $discountPercent = mysqli_escape_string($conn, $_POST['discountPercent']);
    $discountName = mysqli_escape_string($conn, $_POST['discountName']);
    $discountDescription = mysqli_escape_string($conn, $_POST['discountDescription']);

    
    $query = "UPDATE discount_masterfile SET discount_ID=$discountId, discount_percent='$discountPercent', discount_name='$discountName', discount_description='$discountDescription' WHERE discount_ID = $discountId ";
    try {
      $update_result = mysqli_query($conn,$query) or die (mysqli_error($conn));
      if ($update_result) {
        if(mysqli_affected_rows($conn) > 0){
          echo "Successfully Updated!";
        } else {
          echo "There was an error editing discounts.";
        }
      }
    } catch (Exception $ex) {
      echo "Error Inserting Data".$ex->getMessage();
    }
  }
?>