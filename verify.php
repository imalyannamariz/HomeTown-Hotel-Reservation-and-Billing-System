<?php
    include_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <!-- start header div --> 
    <div id="header">
        <h3>Hometown Hotel Verification</h3>
        <a href="login.php"></a>
    </div>
    <!-- end header div -->   
    <?php
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['verifier']) && !empty($_GET['verifier'])){
        // Verify data
        $email = mysql_escape_string($_GET['email']); // Set email variable
        $verifier = mysql_escape_string($_GET['verifier']); // Set verifier variable
                     
        $search = mysql_query("SELECT guest_email, verifier, active FROM guest_masterfile WHERE guest_email='".$email."' AND verifier='".$verifier."' AND active=0") or die(mysql_error()); 
        $match  = mysql_num_rows($search);
                     
        if($match > 0){
            // We have a match, activate the account
            mysql_query("UPDATE guest_masterfile SET active=1 WHERE guest_email='".$email."' AND verifier='".$verifier."' AND active=0") or die(mysql_error());
            echo '<script>alert("Your account has been activated, you can now login");Location.href="login.php"</script>';
        }else{
            // No match -> invalid url or account has already been activated.
            echo '<script>alert("The url is either invalid or you already have activated your account.");Location.href="index.php"</script>';
        }
                     
    }else{
        // Invalid approach
        echo '<script>alert("Invalid approach, please use the link that has been send to your email.");Location.href="index.php"</div>';
    }
    ?>
</body>
</html>