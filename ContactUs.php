<?php
  include_once 'db.php';
  include_once 'header.php';
  session_start();
  // if (isset($_SESSION['login'])) {
    
  // }
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
.container{
  margin-top: 40px;
}
.row{
  padding-right: 15px;
  padding-left: 15px;
}
h1{
  font-size: 30;
}
.container, h1{
  text-transform: uppercase;
}

</style>
<body>
  <?php
    include_once 'navigationBar.php';
  ?>


  <div class = "container">
    <div class = "row">
      <div class = "col-lg-12">
        <h1 class="pagetitle">Contact us</h1>
        <p>
           We are here to answer any questions you may have about our experiences. Reach out to us and we'll respond as soon as we can.
        </p>
        <p>
           Even if there is something you have always wanted to experience and can't find it on Hometown, let us know and we promise we'll do our best to find it for you and send you there.
         </p>
      </div>
    </div>
  </div>
  
  <div class="rq-contact-message">
      <div class="container">
       <div class="rq-submit-review">
           <div class="row">
             <div class="col-md-8 col-sm-8">
              <h2>send a message</h2>
              <form action="#">
                <input type="text" name="rq-contact-name" id="rq-contact-name" placeholder="Name">
                <input type="email" name="rq-contact-email" id="rq-contact-email" placeholder="Email">
                <textarea name="rq-contact-message" id="rq-contact-message" cols="30" rows="5" placeholder="Message"></textarea>
                <button type="submit">Submit</button>
              </form>
             </div><!----- /col-md-8  ------>
             <div class="col-md-3 col-md-offset-1 col-sm-4">
               <div class="rq-address-wrapper rq-message-address-2">
                <h5>address </h5>
                <ul>
                  <li>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <a href="#">57 Epifanio de los Santos Ave, <br> <span>Makati, 1233 Metro Manila</span> </a>
                  </li>
                  <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <a href="#">(02) 805 3386</a>
                  </li>
                  <li>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <a href="#">hometownmakati@gmail.com</a>
                  </li>
                </ul>
               </div>
             </div>
           </div><!---- /row ---->
         </div>
        </div>
      </div>
  
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
 <!--  // <script src="js/bootstrap-datepicker.js"></script> -->
  <script src="js/select2.min.js"></script>
  <script src="js/icheck.min.js"></script>
  <script src="js/jquery.raty.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>