<?php
include_once 'db.php';
include_once 'header.php';
session_start();

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
</style>
<body>
  <!-- Modal -->
  <?php $fetch_rooms = mysqli_query($conn, "SELECT * FROM room_masterfile"); ?>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalWrapper">
    <div class="modal-dialog modal-lg" role="document" id="modalWrapper">
      <div class="modal-content">
        <div class="modal-body">          
          <p class="success-message">You have selected <span id ='room-name'>King's Room</span> successfully</p>
          <form action="Step3.php" method = 'post'>
            <input type ='hidden' id = 'roominput' value = '' name = 'roomname'/>
            <input type ='hidden' id = 'roomid' value = '' name = 'roomid'/>
            <h2>ADD ONS</h2>
            <fieldset>
              <div class="table-css">
                <?php $fetch_addons = mysqli_query($conn, "SELECT * FROM addons_masterfile");
                while($row = mysqli_fetch_assoc($fetch_addons)){ ?>
                <div class="table-css-row">              
                  <div class="table-css-col">
                    <label>
                      <input type="checkbox" name="services[<?= $row['Addon_name'] ?>]">
                      <?= $row['Addon_name'] ?>
                    </label>
                  </div>
                  <div class="table-css-col">
                    <span>P <?= $row['Addon_rate']?>/</span> Group / Trip
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>                  
          </fieldset>
          <h2>ADDITIONAL INFORMATION</h2>
          <fieldset>            
            <div class="rq-single-room-area select-for-modal-width">      
              <div class="rq-single-room-checkin">
                <div class="row">                    
                  <div class="col-md-6">
                    <h2>Total Room</h2>
                    <div class="rq-total">
                      <!-- Room quantity -->
                      <select class="js-example-placeholder-single form-control" id = 'roomno' name ='roomno' REQUIRED>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
          <button type="submit" class="btn btn-flat rq-modal-submit-btn">CHECKOUT</button>
        </form>
      </div>
    </div>          
  </div>
</div>
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
        <a class="navbar-brand" href="HomepageFinal.php"><img class="logo" src="HometownLogo.png" alt="Hometown"></a>
      </div>
      <!-- Navbar Toggle End -->

      <!-- navbar-collapse start-->
      <div id="nav-menu" class="navbar-collapse rq-menu-wrapper collapse navbar-right" role="navigation">
        <ul class="nav navbar-nav rq-menus">
          <li class="">
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
            <li class="active">
              <a href="step1.php">Reservations</a>
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
            <h1>booking</h1>
          </div>
        </div>
      </div>
    </div>
  </div><!-- / rq-banner-area-->
  <div class = "container">
    <div class="col-lg-12 col-md-7 col-sm-7">
      <!----------------------------------list view copy ---------------------------->
      <div class="singleRoom-grid-upper">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="singleRoom-grid-upper-left pull-leftking ">
              <h5><?= mysqli_num_rows($fetch_rooms) ?> results found</h5>
            </div>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="singleRoom-grid-upper-right pull-right">
              <h5>Sort by</h5>
              <div class="singleRoom-grid-upper-right-date">
                <select class="js-example-placeholder-single custom-width-for-grid-date">
                  <option value="0">Date</option>
                  <option value="1">Title</option>
                  <option value="2">Comment</option>
                </select>
              </div>
              <div class="singleRoom-grid-upper-right-logo rq-grid-list-view-option">
                <a href="#" data-class=" singleRoom-grid-main"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                <a href="#"  data-class=" singleRoom-list-main"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Room list -->
        <div class="row">

          <?php while($row = mysqli_fetch_assoc($fetch_rooms)){ 
                $fetchReservedrooms = mysqli_query($conn, "SELECT room_number FROM reservation_masterfile WHERE ((checkoutdate >= '{$_SESSION['reservation']['checkInDate']}' AND checkindate <= '{$_SESSION['reservation']['checkInDate']}') OR (checkoutdate >='{$_SESSION['reservation']['checkOutDate']}' AND checkindate <= '{$_SESSION['reservation']['checkOutDate']}')) AND room_id = {$row['room_id']}") or die(mysqli_error($conn));
                $reservedroomSum = 0;
                while($row1 = mysqli_fetch_assoc($fetchReservedrooms)){
                  $reservedroomSum += $row1['room_number'];
                }
            ?>
          <div class="rq-listing-choose singleRoom-grid-main">

            <div class="col-md-6 col-sm-12 singleRoom-grid-item">
              <div class="thumbnail">
                <picture>
                  <source media="(min-width: 768px)" srcset= <?= $row['room_imagepath'];?> >
                    <img alt="Image" src="<?= $row['room_imagepath']; ?>" srcset=img/Twin.jpg>
                  </picture>
                  <div class="caption">
                    <h3><a href="TwinQueenRoomReservation.php" id = 'room-title'><?= $row['room_type']; ?></a></h3>
                    <p id ='room-desc'><?= $row['room_description']; ?></p>
                    <div class="singleRoom-grid-main-custom">
                      <div class="row">
                        <h4><span id = 'room-price'>P <?= $row['room_rate'];?> </span> / Night</h4>
                        <h5> <a class="btn rq-btn-secondary showInfo" href="#" data-toggle="modal" data-target="#myModal" data-title = '<?= $row['room_type'] ?>' data-qty = "<?= $row['room_number'] - $reservedroomSum?>" data-id = "<?= $row['room_id']?>" >Book Now</a></h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?><!----row---->
            </div>
            <!-- <button><i class="fa fa-spinner" aria-hidden="true"></i>LOAD MORE</button> -->
          </div><!------ singleRoom-grid-main -------->
        </div><!---- singleRoom-grid-upper ---->
        <!---------------------------------- /list view copy end---------------------------->
      </div><!------- /col-md-8 main---------->
    </div><!------- /row main---------->
  </div><!------- /container ---------->
</div><!-- / rq-single-room-area-->
<!-- Latest jQuery plugin-->
<script src="js/main.js"></script>
<!-- Latest compiled and minified JavaScript for bootstrap-->
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/jquery.raty.js"></script>
<script src="js/icheck.min.js"></script>
<script src="js/moment-min.js"></script>
<script src="js/jquery.datetimepicker.full.min.js"></script>
<script src="js/scripts.js"></script>
<script>
  $(document).ready(function(){
    $('.showInfo').on('click',function(){
      $('#room-name').html($(this).attr('data-title'))
      $('#roomno').empty()
      $('#roominput').attr('value', $(this).attr('data-title'))
      $('#roomid').attr('value', $(this).attr('data-id'))
      for(var x = 1; x <= $(this).attr('data-qty'); x++){
        $('#roomno').append(`<option value = '${x}'>${x}</option>`)

      }
    })

  })

</script>

</body>
</html>
`