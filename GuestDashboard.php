  <?php 
  include_once 'db.php';
  include_once 'header.php';
  session_start();
  if(!isset($_SESSION['login'])){
    echo "<script>alert('Please login to continue')
    window.location.href = 'login.php';
    </script>";
  }
  ?>

  <style>
  .navbar-brand{
    margin-top: -22px;
    margin-right: 5px;
  }
  .btn-primary {
    color: #fff;
    background-color: #96281B;
    border-color: #96281B;
  }
  .table-bordered {
    border: 1px solid #ddd;
  }
  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
  }
  table {
    background-color: transparent;
  }
  table {
    border-spacing: 0;
    border-collapse: collapse;
  }
  .table-bordered>thead>tr>th{
    border-bottom-width: 2px;
  }
  .table-bordered>thead>tr>th{
    border: 1px solid #ddd;
  }
  .btn {
    border-radius: 0px;
    margin-bottom: 5px;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
  }
  .btn-sm{
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
  }
  .btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
  }
  .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
  }
  .table-bordered>tbody>tr>td{
    border: 1px solid #ddd;
  }
  .table>tbody>tr>td{
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
  }
</style>
<body>
 <header>
  <!-- Navigation Menu start-->
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
            <a href="HomepageFinal.php">Home</a>
            <ul class="rq-sub-menu">
              <li>
                <a href="HomepageFinal.php">Homepage 1</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="Rooms.php">Room</a>
            <ul class="rq-sub-menu">
              <li>
                <a href="Rooms.php">Twin Queen Room</a>
              </li>
              <li>
                <a href ="Rooms.php">Queen Room </a>
                <li>
                  <a href="Rooms.php">Family Room</a>
                </li>
                <li>
                  <a href="Rooms.php">Quad Room</a>
                </li>
                <li>
                  <a href="Rooms.php">Female/Male Room</a>
                </li>
                <li>
                  <a href="Rooms.php">Dormitory</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="about-us.html">About</a>
            </li>
            <li>
              <a href="contact.html">Contact</a>
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
                <li><a href="Logout.php">LOGOUT</a></li>
              </ul>
            </li>
            <?php } else { ?> 
            <li><a href="login.php">LOGIN</a></li>
            <?php } ?>   

          </ul>
        </div>
        <!-- navbar-collapse end-->

        <!--<div class="rq-extra-btns-wrapper">
            <button id="rq-side-menu-btn" class="cd-btn btn rq-sidemenu-btn"></button>
        </div>

      </div>
    </nav>
    <!-- Navigation Menu end-->
  </header> <!-- / rq-header-section end here-->

  <div class="rq-checkout-banner">
    <div class="rq-checkout-banner-mask">
      <div class="container">
        <div class="rq-checkout-banner-text">
          <div class="rq-checkout-banner-text-middle">
            <h1>Account</h1>
          </div>
        </div>
      </div>
    </div>
  </div><!-- / rq-banner-area-->

  <div class = "container" style = "margin-top: 5%">
    <div class = "row">
      <div class = "col-lg-12 col-md-12 col-sm-12">
        <div class = "blogArchive_area">
          <div class = "single_archiveblog wow fadeInDown animated" style = "visibility: visible; animation-name: fadeInDown;">
            <div>
              Welcome
              <b>
                <?php echo "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?>
                <b>
                  <p stlye = "text-align:right;">
                    <a href="account.php">Account Settings</a>
                  </p>
                  <h2> Reservation </h2>
                  <table class = "table table-bordered">
                    <thead>
                      <tr>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Number of Guests</th> 
                        <th>Number of rooms</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <?php $fetch_reservations = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE guest_id = {$_SESSION['guest_ID']}");
                    while($row = mysqli_fetch_assoc($fetch_reservations)){ ?>
                    <tbody>
                      <tr>
                        <td align = "center"><?= $row['checkindate'] ?></td>
                        <td align = "center"><?= $row['checkoutdate'] ?></td>
                        <td align = "center"><?= $row['number_guest'] ?></td>
                        <td align ='center'><?= $row['room_number'] ?></td>
                        <td align = "center">pending</td>
                        <td>
                          <a href="summary.php?code=<?= $row['reservation_id']?>" class="btn btn-sm btn-success" style="display:inline-block !imporatant; width:50%; float:left;">View</a>
                          <form method="post" style="display:inline-block !imporatant; width:50%; float:left;">
                            <input type="hidden" name="t_id" value="<?= $row['reservation_id'] ?>">
                            <button name="cancel" type = 'submit' class="btn btn-sm btn-danger">Cancel</button>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                    <?php } ?>
                  </b>
                </b>
              </div>

              <!-- Latest jQuery plugin-->
              <script src="js/main.js"></script>
              <!-- Latest compiled and minified JavaScript for bootstrap-->
              <script src="js/bootstrap.min.js"></script>
              <script src="js/owl.carousel.min.js"></script>
              <script src="js/parallax.min.js"></script>
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpKAwq-qKxzm-9D1405KCFp7ZTtu_Vimg"></script>
              <script src="js/googleMap.js"></script>
              <script src="js/customGoogleMap.js"></script>
              <script src="js/jquery-ui.min.js"></script>
              <script src="js/jquery.timepicker.min.js"></script>
              <script src="js/jquery.countdown.min.js"></script>
              <script src="js/jquery.flexslider-min.js"></script>
              <script src="js/select2.min.js"></script>
              <script src="js/icheck.min.js"></script>
              <script src="js/jquery.raty.js"></script>
              <script src="js/jquery.datetimepicker.full.min.js"></script>
              <script src="js/scripts.js"></script>
              <script>
                $(document).ready(function(){
                  $('form').on('submit', function(e){
                    e.preventDefault();
                    var prompt = confirm("Are you sure?")
                    if(prompt){
                      $.ajax({
                        type:'POST',
                        url:'ajax/cancelreservation.php',
                        data: $(this).serialize(),
                        success: function(html){
                          alert('Reservation has been canceled')
                          location.reload()
                        }
                      })
                    }
                  })
                })

              </script>
            </body>
            </html>