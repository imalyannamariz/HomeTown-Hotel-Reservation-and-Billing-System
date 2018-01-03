<?php
  include_once 'dbConnect.php';
  session_start();

  if (isset($_POST['submit'])) {
    $discountPercent = mysqli_escape_string($conn, $_POST['discountPercent']);
    $discountName = mysqli_escape_string($conn, $_POST['discountName']);
    $discountDescription = mysqli_escape_string($conn, $_POST['discountDescription']);

    $insert_discount_query =  "INSERT INTO `discount_masterfile`(`discount_percent`, `discount_name`, `discount_description`) VALUES ('$discountPercent', '$discountName', '$discountDescription')";
        try 
        {
          $insert_result = mysqli_query($conn, $insert_discount_query) or die (mysqli_error($conn));
          if ($insert_result) 
          {
            if (mysqli_affected_rows($conn) > 0) 
            {
              header("Location: discounts.php");
              exit();
            }
            else 
            {
              echo "<script>alert('Data not Inserted.');location.href='discountsAdd.php';</script>";
            }
          } 
        } 
        catch (Exception $ex) 
        {
          echo "Error Inserting Data".$ex->getMessage();
        }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Discount</title>

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
      <div class="card-header">Add Discount</div>
      <div class="card-body">
        <form method = "POST" action = "DiscountAdd.php" id = "addDiscountForm">
          <div class="form-group">
            <label for="discountPercent">Discount Percent %</label><br>
            <input required class="form-control" name = "discountPercent" type="number" aria-describedby="emailHelp" placeholder="Discount Percent">
          </div>
          <div class="form-group">
            <label for="discountName">Discount Name</label><br>
            <input required class="form-control" name = "discountName" type="text" placeholder="Discount Name">
          </div>
          <div class="form-group">
            <label for="discountDescription">Discount Description</label><br>
            <textarea rows="4" cols="44" name="discountDescription" form="addDiscountForm" placeholder="Enter discount description here..."></textarea>
          </div>        
          <button name = "submit" class="btn btn-primary btn-block">Add Discount</button>
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