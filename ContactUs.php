<?php
  include_once 'db.php';
  include_once 'header.php';
  session_start();
  // if (isset($_SESSION['login'])) {
    
  // }
?>
<style>
*{
  border: 0;
    margin: 0;
    padding: 0;
    outline: 0;
    font-size: 100%;
}
.wrapper {
  position: relative;
  background-color: white;
  -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.2);
  margin-top: 80px;
  margin-bottom: 140px;
}
.wrapper{
  width: 978px;
  margin: 0 auto;
  text-align:left;
}
.styled-form{
    position: relative;
    display: inline;
    float: left;
    width: 622px;
    padding: 25px 30px;
}
.styled-form .pagetitle {
    margin-bottom: 5px;
}
.pagetitle{
  color: #ed3434;
    font-size: 35px;
    line-height: 40px;
    margin-bottom: 30px;
    font-weight: 300;
}
.styled-form .note {
    margin-bottom: 40px;
}
.styled-form .row.half.first {
    margin-left: 0;
    clear: left;
}
.styled-form .row.half {
    width: 46%;
    margin-left: 8%;
}
.styled-form .row {
    display: inline;
    float: left;
    width: 100%;
}
p {
    margin-bottom: 20px;
}
.styled-form label {
    display: block;
    font-family: "brandon-grotesque", Helvetica, Arial, sans-serif;
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 11px;
    line-height: 20px;
    text-transform: uppercase;
    color: #4e4e4d;
}
.required {
    text-transform: uppercase;
    font-family: "brandon-grotesque", Helvetica, Arial, sans-serif;
    font-weight: 700;
    letter-spacing: 1px;
    position: relative;
    top: 7px;
    font-size: 20px;
    font-style: normal;
    line-height: 1px;
    color: #e8554e;
}
.styled-form .field {
    display: block;
}
.styled-form input[type=text], .styled-form input[type=password], .styled-form textarea {
    background-color: #e1e1db;
    width: 100%;
    padding: 12px 14px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    font-family: "museo-slab", Georgia, serif;
}
.styled-form .row {
    display: inline;
    float: left;
    width: 100%;
}
.submit-row {
    text-align: right;
}
.styled-form .submit-row {
    clear: both;
}
button[type=submit], .button {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    white-space: nowrap;
    position: relative;
    display: -moz-inline-stack;
    display: inline-block;
    vertical-align: middle;
    zoom: 1;
    font-family: "brandon-grotesque", Helvetica, Arial, sans-serif;
    font-weight: 700;
    letter-spacing: 2px;
    font-size: 14px;
    line-height: 14px;
    text-transform: uppercase;
    color: white;
    background-color: #e8554e;
    cursor: pointer;
    border-bottom: 5px solid #9a3834;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    -webkit-transition: none 125ms ease-out;
    -webkit-transition-delay: 0;
    -moz-transition: none 125ms ease-out 0;
    -o-transition: none 125ms ease-out 0;
    transition: none 125ms ease-out 0;
    -webkit-transition-property: background-color, color;
    -moz-transition-property: background-color, color;
    -o-transition-property: background-color, color;
    transition-property: background-color, color;
    padding: 10px 55px;
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
            <a class="navbar-brand" href="HomepageFinal.php"><img class="logo" src="HometownLogo.png" alt="Hometown"></a>
        </div>
        <!-- Navbar Toggle End -->

        <!-- navbar-collapse start-->
        <div id="nav-menu" class="navbar-collapse rq-menu-wrapper collapse navbar-right" role="navigation">
          <ul class="nav navbar-nav rq-menus">
              <li class="">
                <a href="HomepageFinal.php">Home</a>
                <!-- <ul class="rq-sub-menu">
                    <li>
                        <a href="HomepageFinal.php">Homepage 1</a>
                    </li>
                </ul> -->
              </li>
              <li>
                <a href="Rooms.php">Room</a>
                <!-- <ul class="rq-sub-menu">
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
                </ul> -->
              </li>
              <li>
                <a href="about-us.html">About</a>
              </li>
              <li class = "active">
                <a href="ContactUs.php">Contact</a>
              </li>
             <!--  <li>
                <a href="Confirm-Account.php">Reservations</a>
              </li> -->
             <li>
              <?php
                if (isset($_SESSION['Login'])) { ?>
                      <a href="Step1.php">Reservations</a>
               <?php } else { ?>
                      <a href="Confirm-Account.php">Reservation</a>
               <?php } ?>
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
  <div class = "container">
    <div id = "sidecontent">
      <div class = "wrapper">
        <form id = "contact-form" class = "styled-form" action method = "post" accept-chraset = "utf-8">
          <div style="display:none"><input type="hidden" name="csrfmiddlewaretoken" value="8ece95d139633656ad0371bf53c45b2d"></div>
          <h1 class = "pagetitle">Contact us</h1>
          <div class = "note">
            <p>
              We are here to answer any questions you may have about our
              experiences. Reach out to us and we'll respond as soon as we can.
            </p>
            <p>
              Even if there is something you have always wanted to experience and
              can't find it on Hometown, let us know and we promise we'll do our
              best to find it for you and send you there.
            </p>
          </div>
          <p class="row half first">
            <label for="id_name">Name:<span class="required">
            *</span>
          </label>
          <span class="field"><input type="text" name="name" id="id_name">
          </span>
        </p>
        <p class="row half">
            <label for="id_name">Email:<span class="required">
            *</span>
          </label>
          <span class="field"><input type="text" name="Email" id="id_email">
          </span>
        </p>
        <p class="row">
            <label for="id_name">Message:<span class="required">
            *</span>
          </label>
          <span class="field"><input type="text" name="Message" id="id_message">
            <textarea cols="40" rows="5" name="message" id="id_message"></textarea>
          </span>
        </p>
        <p class="submit-row">
      <button type="submit">SEND</button>
    </p>
  </form>
  
</body>
</html>