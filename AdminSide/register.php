<?php
include_once 'dbConnect.php';
session_start();

if (isset($_POST['submit'])) {
  $selectedValue = $_POST['adminType'];
  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $adminType = mysqli_real_escape_string($conn, $selectedValue);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmPassword = $_POST['confirmPassword'];
  $dbCheck = "SELECT * FROM `adminuser_masterfile` WHERE `email` = '$email'";
  $result = mysqli_query($conn, $dbCheck) or die (mysqli_error($conn));
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    echo "<script>alert('Email already taken.');location.href='register.php';</script>";
  } 
  else 
  {
    if ($password != $confirmPassword) {
      echo "<script>alert('Password mismatch.');location.href='register.php';</script>";
    } 
    else 
    {
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        //$hashedPwd2 = password_hash($confirmPassword, PASSWORD_DEFAULT);
      $insert_query =  "INSERT INTO `adminuser_masterfile`(`User_firstname`, `User_lastname`, `email`, `admin_type`, `password`) VALUES ('$firstName', '$lastName', '$email', '$adminType', '$hashedPwd')";
      try 
      {
        $insert_result = mysqli_query($conn, $insert_query) or die (mysqli_error($conn));
        if ($insert_result) 
        {
          if (mysqli_affected_rows($conn) > 0) 
          {
            header("Location: index.php");
            exit();
          }
          else 
          {
            echo "<script>alert('Data not Inserted.');location.href='register.php';</script>";
          }
        } 
      } 
      catch (Exception $ex) 
      {
        echo "Error Inserting Data".$ex->getMessage();
      }
    } 
  }        
}    
?>


<!DOCTYPE html>
<html lang="en">

<head>
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

<!-- VALIDATION - Letters and white spaces only (First Name, Last Name) -->
<!-- Nasa onkeypress event ng respective input type. -->
<script type="text/javascript">
  function isLetter(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (!(charCode >= 65 && charCode <= 122) && (charCode != 32 && charCode != 0)) {
      return false;
    }
    return true;
  }
</script>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method = "POST" action = "register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input  required class="form-control" id="exampleInputName" name = "firstName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" pattern = "[a-z A-Z]+" onkeypress="return isLetter(event)">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input required class="form-control" id="exampleInputLastName" name = "lastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" pattern = "[a-z A-Z ]+" onkeypress="return isLetter(event)">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Email address</label>
                <input required class="form-control" id="exampleInputEmail1" name = "email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Type</label>
                <select required id="cmbMake" name="adminType">
                 <option value="Admin" selected="selected">Admin</option>
                 <option value="FrontDesk">Front Desk</option>
               </select>
             </div>
           </div>
         </div>
         <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="exampleInputPassword1">Password</label>
              <input required class="form-control" id="exampleInputPassword1" name = "password" type="password" placeholder="Password">
            </div>
            <div class="col-md-6">
              <label for="exampleConfirmPassword">Confirm password</label>
              <input required class="form-control" id="exampleConfirmPassword" name = "confirmPassword" type="password" placeholder="Confirm password">
            </div>
          </div>
        </div>
        <button class="btn btn-primary btn-block" name = "submit" type = "submit">Register</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="login.php">Login Page</a>
        <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
      </div>
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
