<?php
  include_once 'db.php';
  include_once 'header.php';
  session_start();

  if(!isset($_SESSION['login'])){
    echo "<script>window.location.href = 'Confirm-Account.php'</script>";
  }
  $fetch_rooms = mysqli_query($conn, "SELECT * FROM reservation_masterfile WHERE guest_ID = {$_SESSION['guest_ID']} AND status = 'Approved'");
  $yourReservedRooms = 0;
  while($row = mysqli_fetch_assoc($fetch_rooms)){
    $yourReservedRooms += $row['room_number'];
  }
  if($yourReservedRooms >= 5){
    echo "<script>alert('You are only allowed to reserve 5 rooms')
    window.location.href = 'GuestDashboard.php' </script>";
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
.contact_left {
    display: inline;
    float: left;
    margin-top: 200px;
    width: 100%;
}
.contact_right {
    display: inline;
    float: left;
    margin-top: 200px;
    width: 100%;
    padding-left: 70px;
}
.wpcf7-submit {
    border: medium none;
    color: #ffffff;
    display: block;
    float: right;
    font-size: 20px;
    height: 42px;
    line-height: 42px;
    width: 125px;
    margin-top: 10px;
    -webkit-transition: all 0.5s;
    -mz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
}
.wpcf7-submit {
    background-color: #96281B;
}

</style>
<body>
  <?php
    include_once 'navigationBar.php';
  ?>
    <div class = "container">
      <div class = "row" style = "margin-left: 10%; margin-top: -5%; margin-bottom: 5%;">
        <div class = "row">
          <form action = "Step1Action.php" method = "post">
            <div class = "col-lg-5 col-md-5 col-sm-5">
              <div class = "contact_left wow fadeInLeft">

              <h1 style="font-size: 2em;">Check in:</h1>
            <input type = "text" id = "checkInDate" class="form-control" size =
                  "30" name = "checkInDate" style = "width: 262px">

              <h1 style="font-size: 1.5em; width: 200%; margin-left: 6%;"> Check-in time:</h1>
              <p style=" margin-left: 45%; font-size: 16px;">2:00 PM</p>
              <h1 style="font-size: 1.5em; width: 200%; margin-left: 3%;"> Check-out time:</h1>
              <p style=" margin-left: 45%; font-size: 16px;">12:00 NN<br></p>
            </div>
          </div>

        <div class ="col-lg-5 col-md-5 col-sm-5">
          <div class = "contact_right wow fadeInLeft">
            
            <h1 style="font-size: 2em;">Check out:</h1>
            <input type = "text" id = "checkOutDate" class="form-control" size =
                  "30" name = "checkOutDate" style = "width: 262px">

            <h1 style="width: 120%; font-size: 2em;">Number of Guests:</h1>
            <input type="number" class="form-control" name="numberOfAdults" value="1" min="1" max="100" placeholder="1" style="width: 262px"  required="">
            
            <br>
            <br>
          </div>
          <div class="contacy_right">
                   <input type="submit" value="Confirm " class="wpcf7-submit photo-submit" style="margin-top:10%">   
      </div>
    </div>
  </form>



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
  <!-- <script src="js/jquery.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src = "js/jquerydatepicker.js"></script>
    <script type="text/javascript" src = "js/jquery-ui.js"></script>
    <script type="text/javascript" src = "js/jquery-ui.min.js"></script>
    <!-- JQuery + 7 days (as per policy rules) -->
      <script type="text/javascript">
         $(function() {
            $("#checkInDate").datepicker({
                dateFormat: "yy-mm-dd",
                minDate: "+3",
                onSelect: function(dateText, inst) {
                    var d = $.datepicker.parseDate(inst.settings.dateFormat, dateText);
                    d.setDate(d.getDate() + 1);

                    $("#checkOutDate").datepicker("option","minDate",
                    $("#checkInDate").datepicker("getDate"));
                    $("#checkOutDate").val($.datepicker.formatDate(inst.settings.dateFormat, d));
                    
                }, 
            }).datepicker("setDate", "+0");

            $("#checkOutDate").datepicker({
                dateFormat: "yy-mm-dd",
                minDate: "+4",
            }).datepicker("setDate", "+1");
        });
      </script>
</body>
</html>