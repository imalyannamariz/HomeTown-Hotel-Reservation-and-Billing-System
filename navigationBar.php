<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<header>
		<nav class="navbar rq-header-main-menu navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Navbar Toggle -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" style = "margin-right: 20px;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Logo -->
          <a class="navbar-brand" href="index.php"><img class="logo" src="HometownLogo.png" alt="Hometown"></a>
        </div>
        <!-- Navbar Toggle End -->

        <!-- navbar-collapse start-->
        <div id="nav-menu" class="navbar-collapse rq-menu-wrapper collapse navbar-right" role="navigation">
          <ul class="nav navbar-nav rq-menus">
            <li class="active">
              <a href="index.php">Home</a>
            </li>

              <a href="Rooms.php">Room</a>
              </li>
              <li>
                <a href="aboutUs.php">About</a>
              </li>
              <li>
                <a href="ContactUs.php">Contact</a>
              </li>
              <li>
                <a href="Step1.php">Reservations</a>
              </li>
              <?php if(isset($_SESSION['login'])){  ?>
              <li class="active dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded = "false">
                  MY ACCOUNT<span class="caret"></span>
                </a>
                <ul class="rq-sub-menu">
                  <li><a href="GuestDashboard.php">MY RESERVATIONS</a></li>
                  <li><a href="AccountSettings.php">ACCOUNT SETTINGS</a></li>  
                  <li><a href="Logout.php">LOGOUT</a></li>
                </ul>
              </li>
              <?php } else { ?> 
              <li><a href="login.php">LOGIN</a></li>
              <?php } ?>   

            </ul>
          </div>
      </nav>	
	</header>
	  
</body>
</html>