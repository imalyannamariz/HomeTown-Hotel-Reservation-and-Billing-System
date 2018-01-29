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
@media only screen and (min-width: 1024px)
{
  .menu-wrap {
    padding-top: 70px;
  }  
}
@media only screen and (min-width: 1024px)
{
  .feed-header {
    max-width: 960px;
  }  
}
.feed-header {
    width: 100%;
    margin: 0 auto;
    padding: 0 32px;
}
.feed-header .title {
    margin-bottom: 8px;
    font-family: "Trebuchet MS",sans-serif;
    font-size: 2em;
    line-height: 1.2em;
}
@media only screen and (min-width: 1024px)
{
  .the-feed{
    max-width: 960px;
  }  
}
.feed-wrap {
    font-size: 0;
    text-align: left;
}
@media only screen and (min-width: 1024px)
{
  .article-box {
    max-width: 480px;
  }  
}
.article-box {
    width: 100%;
    display: inline-block;
    vertical-align: top;
    padding: 0 32px 16px;
    font-size: 16px;
}

.article-wrap {
    padding-top: 16px;
    border-top: 1px solid #bfb8ab;
}
.article-wrap>.title {
    font-size: 18px;
    font-family: "Trebuchet MS",sans-serif;
    line-height: 1.1em;
    margin-bottom: 8px;
}
.article-wrap>.title a {
    color: #003926;
}
.the-feed{
  margin: 0 auto;
}
.article-wrap>.image-link>.image {
    width: 160px;
    height: auto;
    float: right;
    margin: 0 0 16px 16px;
}
img {
    border: 0;
    display: block;
}

</style>
<body>
  <?php
    include_once 'navigationBar.php';
  ?>
  <div class = "menu-wrap">
    <main class = "content-box">
      <header class = "feed-header">
        <h1 class="title">
          <span class="focus">Rooms</span>
        </h1>
      </header>

      <section class = "the-feed">
        <div class = "feed-wrap">
          <article class = "article-box">
            <div class = "article-wrap">
              <h2 class = "title">
                <a href="#" title="Twin Queen Room" class="link">Twin Queen Room</a>
              </h2>
              <a href="https://manila-hotel.com.ph/macarthur-executive-floor/" class="image-link">
                <img width="160" height="100" src="img/Twin.jpg" class="image wp-post-image" alt="">
              </a>
              <div class="blurb">
                <p>Fully renovated room with two (2) single beds and a bathroom, Equipped with Wifi, Aircon and Televsion. Perfect for sharing  </p>
              </div>
            </div>
          </article>

          <article class = "article-box">
            <div class = "article-wrap">
              <h2 class = "title">
                <a href="#" title="Queen Room" class="link">Queen Room</a>
              </h2>
              <a href="#" class="image-link">
                <img width="160" height="100" src="img/Queen.jpg" class="image wp-post-image" alt="">
              </a>
              <div class="blurb">
                <p>Fully renovated room with one (1) Queen beds and a bathroom, Equipped with Wifi, Aircon and Televsion.</p>
              </div>
            </div>
          </article>

          <article class = "article-box">
            <div class = "article-wrap">
              <h2 class = "title">
                <a href="#" title="Family Room" class="link">Family Room</a>
              </h2>
              <a href="#" class="image-link">
                <img width="160" height="100" src="Family.jpg" class="image wp-post-image" alt="">
              </a>
              <div class="blurb">
                <p>Fully renovated room with two (2) Queen beds and a bathroom, Equipped with Wifi, Aircon and Televsion. Perfect for family vacations</p>
              </div>
            </div>
          </article>

          <article class = "article-box">
            <div class = "article-wrap">
              <h2 class = "title">
                <a href="#" title="Quadruple Room" class="link">Quadruple Room</a>
              </h2>
              <a href="#" class="image-link">
                <img width="160" height="100" src="img/Quad.jpg" class="image wp-post-image" alt="">
              </a>
              <div class="blurb">
                <p>Fully renovated room with two (2) double deck beds and a bathroom, Equipped with Wifi, Aircon, Large Cabinet and Televsion. </p>
              </div>
            </div>
          </article>

          <!-- <article class = "article-box">
            <div class = "article-wrap">
              <h2 class = "title">
                <a href="#" title="Female/Male Room" class="link">Female/Male Room</a>
              </h2>
              <a href="#" class="image-link">
                <img width="160" height="100" src="img/FM1.jpg" class="image wp-post-image" alt="">
              </a>
              <div class="blurb">
                <p>asdasdasdasdsd</p>
              </div>
            </div>
          </article>

          <article class = "article-box">
            <div class = "article-wrap">
              <h2 class = "title">
                <a href="#" title="Dormitory Room" class="link">Dormitory Room</a>
              </h2>
              <a href="#" class="image-link">
                <img width="160" height="100" src="img/Dorm.jpg" class="image wp-post-image" alt="">
              </a>
              <div class="blurb">
                <p>asdasdasdasdsd</p>
              </div>
            </div>
          </article>
 -->


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

</body>
</html>