<?php
  include_once 'dbConnect.php';
  //session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <title>HomeTown Hotel - Admin Module</title> -->
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel ='stylesheet' type ='text/css' href = 'css/jquery.datetimepicker.min.css'/>
</head>
<style>


</style>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="adminPanel.php">HomeTown Hotel Makati - Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="adminPanel.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Home</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="reservationpage.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Reservations</span>
          </a>
        </li>
        

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti22" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Manage Account</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti22">
            <li style = "color: #007bff">
              Admin Account
            </li> 
            <li>
              <a href="register.php">Add Account</a>
            </li>
            <li>
              <a href="adminusermodify.php">Modify Account</a>
            </li>
       <!--      <li>
              <a href="#">Delete Account</a>
            </li> -->
            <li>
            </li>
            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti001">Customer Account</a>
            <ul class="sidenav-third-level collapse" id="collapseMulti001">
              <li>
                <a href="registerCustomer.php">Add Account</a>
              </li>
              <li>
                <a href="guestmodify.php">Modify Account</a>
              </li>
                <!-- <li>
                  <a href="#">Delete Account</a>
                </li> -->
              </ul>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti100" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Manage Rooms</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti100">
            <li>
              <a href="RoomsAdd.php">Add Rooms</a>
            </li>
            <li>
              <a href="Roomsdelete.php">Modify Room</a>
            </li>
  <!--           <li>
              <a href="RoomsDelete.php">Delete Rooms</a>
            </li>
          -->         <li>
          </li>
        </li>
        


        <!--  <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a> -->
        <ul class="sidenav-third-level collapse" id="collapseMulti2">

        </ul>
      </li>
    </ul>
  </li>
  <!-- Manage reservation -->
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti101" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-sitemap"></i>
      <span class="nav-link-text">Manage Reservation</span>
    </a>
    <ul class="sidenav-second-level collapse" id="collapseMulti101">
      <li>
        <a href="reservation.php">Modify Reservation</a>
      </li>
    </li>
    <ul class="sidenav-third-level collapse" id="collapseMulti2">
    </ul>
  </li>
</ul>
</li>
<!-- End Manage Reservation -->
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti102" data-parent="#exampleAccordion">
    <i class="fa fa-fw fa-sitemap"></i>
    <span class="nav-link-text">Billing</span>
  </a>
  <ul class="sidenav-second-level collapse" id="collapseMulti102">
    <li>
      <a href="billing.php">Check billing</a>
    </li>
  </li>
  <ul class="sidenav-third-level collapse" id="collapseMulti2">
  </ul>
</li>
</ul>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti10000" data-parent="#exampleAccordion">
    <i class="fa fa-fw fa-sitemap"></i>
    <span class="nav-link-text">Manage Discounts</span>
  </a>
  <ul class="sidenav-second-level collapse" id="collapseMulti10000">
    <li>
      <a href="DiscountAdd.php">Add Discounts</a>
    </li>
    <li>
      <a href="discountModify.php">Modify Discounts</a>
    </li>
            <!-- <li>
              <a href="#">Delete Discounts</a>
            </li> -->
            <li>
            </li>
          </li>



          <!--  <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a> -->
          <ul class="sidenav-third-level collapse" id="collapseMulti2">

          </ul>
        </li>
      </ul>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti100000" data-parent="#exampleAccordion">
        <i class="fa fa-fw fa-sitemap"></i>
        <span class="nav-link-text">Reports</span>
      </a>
      <ul class="sidenav-second-level collapse" id="collapseMulti100000">
        <li>
          <a href="ReportOccupancy.php">Occupancy Report</a>
        </li>
        <li>
          <a href="ReportReservationSummary.php">Reservation Summary</a>
        </li>
        <li>
          <a href="ReportDiscount.php">Discount Report</a>
        </li>
        <li>
          <a href="ReportEarningsSummary">Summary of Earnings</a>
        </li>
        <li>
          <a href="ReportAveRoomIncome.php">Average Room Income</a>
        </li>
        <li>
        </li>
      </li>



      <!--  <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a> -->
      <ul class="sidenav-third-level collapse" id="collapseMulti2">

      </ul>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
  </li>
</ul>
</div>
</nav>
  <div class="content-wrapper">
    <div class="container-fluid">

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © HomeTown Hotel Makati</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <!-- <script>
      $("input[name=editRoom]").click(function(){
        console.log($(this).closest("tr#"))
      });
    </script> -->
    <script type="text/javascript" language="javascript" >
    
    </script>
  </div>

</body>
</html>