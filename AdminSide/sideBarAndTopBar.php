<?php
include_once 'dbConnect.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>HomeTown Hotel - Admin Module</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<link rel ='stylesheet' type ='text/css' href = 'css/jquery.datetimepicker.min.css'/>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">HomeTown Hotel Makati - Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
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