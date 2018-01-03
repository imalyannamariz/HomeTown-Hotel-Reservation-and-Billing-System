<?php 
session_start();

if(isset($_SESSION['admin_id'])){
  header("location: AdminSide/index.php");
}  

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>D. Midland Pacific Hotel | Admin Login</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="AdminSide/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="AdminSide/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="AdminSide/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="AdminSide/css/style2.css" rel="stylesheet">
</head>

<!--wizard-->
<?php 

    include 'dbconn.php';  

    if (isset($_POST['saved'])) {
        $username = $_POST['username'];
        $password = $_POST['password']; 

        $sql = $conn->query("SELECT * FROM account where username='$username' and password='$password'");
        if(mysqli_num_rows($sql) != 0){
            $r = $sql->fetch_array();
            $_SESSION['position'] = $r['position'];
            $_SESSION['admin_id'] = $r['id'];
            echo "<script>document.location.href = 'AdminSide/index.php'; </script>";
        } else {
            $error = "Wrong login credentials!";
        }
    }

?>
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>D.</b> Midland Pacific Hotel</a>
            <small style="font-size: 18px;">Admin Login</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Welcome to the D. Midland Admin Module.</div>
                    <div class="msg" style="color: red; margin-top: 15px;"><?php echo @$error; ?></div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="saved" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            <div class="logo">
                <a href="index.php">
                    <small style="font-size: 18px;">
                        <i class="material-icons">home</i>&nbsp;
                        <u>Return to Home</u>
                    </small>
                </a>
            </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="AdminSide/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="AdminSide/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="AdminSide/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="AdminSide/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="AdminSide/js/admin.js"></script>
    <script src="AdminSide/js/pages/examples/sign-in.js"></script>
</body>

</html>