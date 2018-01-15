  <?php
    include_once 'db.php';
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
          echo "<script>alert('Successful!');location.href='step4.php';</script>";  
          }         
        }         
      }
    ?>