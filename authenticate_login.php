<?php
include_once 'db.php';
session_start();
// nakahiwalay dapat to sa isang php file
  if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM guest_masterfile WHERE guest_email='$email'";
        $result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
          // kapag walang email
          echo "<script>alert('Incorrect Username or Password');location.href='login.php';</script>";
          exit();
        } else {
          if ($row = mysqli_fetch_assoc($result)) {
            if (!password_verify($password, $row['guest_password'])) {
              echo "<script>alert('Incorrect Username or Password');location.href='login.php';</script>";
              exit();
            }
            else {
              $_SESSION['login'] = true;
              $_SESSION['guest_ID'] = $row['guest_ID'];
              $_SESSION['firstname'] = $row['guest_firstname'];
              $_SESSION['lastname'] = $row['guest_lastname'];
              $_SESSION['email'] = $row['guest_email'];
              $_SESSION['password'] = $row['guest_password'];
              $_SESSION['contactNumber'] = $row['guest_contactNumber'];
              $_SESSION['country'] = $row['guest_country'];
              $_SESSION['address'] = $row['guest_address'];
              $_SESSION['count'] = $row['count'];
              header("Location: GuestDashboard.php");
            }
          }
        } 
  }
?>
