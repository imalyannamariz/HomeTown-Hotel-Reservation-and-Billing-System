  <?php
    include_once 'db.php';
    session_start();
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
            echo "<script>alert('Email already taken, please try another email adress.');location.href='Step3.php';</script>";
        }
        else {//hashing the password
          if ($password != $confirmPassword) {
          echo "<script>alert('Password mismatch.');location.href='register.php';</script>";
      } 
      else 
      {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
          $code = '';
          do{
            $code = '';
          for($x = 0; $x <= 10; $x++)
            $code .= $alphanum[rand(0, strlen($alphanum))];
          }while(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM guest_masterfile WHERE guest_code ='$code'")) != 0);
          $sql = "INSERT INTO guest_masterfile (guest_firstname, guest_lastname, guest_email, guest_password, guest_ContactNumber, guest_country, guest_address, guest_code) VALUES ('$firstName', '$lastName', '$email', '$hashedPwd', '$contactNumber', '$country', '$address','$code')";
          mysqli_query($conn, $sql) or die(mysqli_error($conn));
          $fetchnewaccount = mysqli_query($conn, "SELECT max(guest_ID) FROM guest_masterfile");
          $getnewaccount = mysqli_fetch_assoc($fetchnewaccount);
              $_SESSION['login'] = true;
              $_SESSION['guest_ID'] = $getnewaccount['max(guest_ID)'];
              $_SESSION['firstname'] = $_POST['firstName'];
              $_SESSION['lastname'] = $_POST['lastName'];
              $_SESSION['email'] = $_POST['email'];
              $_SESSION['contactNumber'] = $_POST['contactNumber'];
              $_SESSION['country'] = $selectedValue;
              $_SESSION['address'] = $_POST['address'];
              header("Location: GuestDashboard.php");
          echo "<script>alert('Successful!');location.href='step4.php';</script>";  
          }         
        }         
      }
    ?>