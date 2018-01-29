<?php
// 
  session_start();
  include_once 'db.php';
  include_once 'header.php';
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
  <?php
    include_once 'navigationBar.php';
  ?>
  <div class = "container" style = "margin-top:150px">
    <div class = "container" style = "width:30%; margin-left:35%; margin-top:5;">
      <form action = "authenticate_login.php" method = "post">
        <p style ="color:red; text-align:center;"></p>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
      <button name="submit" class="btn btn-primary">Log in</button>
      <a href= 'Step3.php' class = 'btn btn-success'>Register</a>
    </form>
  </div>
</div>

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

</body>
</html>
