  <?php
    include_once 'dbConnect.php';
    session_start();
    // Hindi pa pala nag-eexist yung page na pupuntahan nito :(
    // Sabihin mo na lang kung ano yung gagawin dito hindi ko muna gagalawin hahaha :)
      if (isset($_POST['submit'])){
        $selectedValue = $_POST['country'];
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
        $contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);
        $country = mysqli_real_escape_string($conn, $selectedValue);
        $address = mysqli_real_escape_string($conn, $_POST['address']);        
        $sql = "SELECT * FROM guest_masterfile WHERE guest_email='$email'";
        $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            echo "<script>alert('Email already taken.');location.href='registerCustomer.php';</script>";
        }
        else {//hashing the password
          if ($password != $confirmPassword) {
          echo "<script>alert('Password mismatch.');location.href='register.php';</script>";
      } 
      else 
      {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO guest_masterfile (guest_firstname, guest_lastname, guest_email, guest_password, guest_ContactNumber, guest_country, guest_address) VALUES ('$firstName', '$lastName', '$email', '$hashedPwd', '$contactNumber', '$country', '$address')";
          mysqli_query($conn, $sql) or die(mysqli_error($conn));
          echo "<script>alert('Successful!');location.href='index.php';</script>";  
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
        <form method = "POST" action = "registerCustomer.php">
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
                <label for="exampleInputContactNum1">Contact Number</label>
                <input required class="form-control" id="exampleInputEmail1" name = "contactNumber" type="text" aria-describedby="emailHelp" placeholder="Enter Contact Number">
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
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="Address">Address</label>
                <input required class="form-control" id="exampleAddress" name = "address" type="text" placeholder="Address">
              </div>
              <div class="col-md-6">
                <label for="country">Country</label><br>
                <select required name="country">
                  <option value="Australia">Australia</option>
                  <option value="China">China</option>
                  <option value="HongKong">Hong Kong</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Japan">Japan</option>
                  <option value="Korea">Korea</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Philippines" selected="selected">Philippines</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Thailand">Thailand</option>
                  <option value="UAE">United Arab Emirates</option>
                  <option value="UK">United Kingdom</option>
                  <option value="USA">United States</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
          </div>


          <button class="btn btn-primary btn-block" name = "submit" type = "submit">Register Customer</button>
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
