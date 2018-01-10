<?php
	include_once 'dbConnect.php';
	session_start();

	$sql = "SELECT * FROM room_masterfile";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    echo '<div class="content-wrapper">
    			   <div class="container-fluid">
              <h3>Room List</h3>
				      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" align="center">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Room Description</th>
                    <th>Room Capacity</th>
                    <th>Room Rate per night</th>
                    <th>Room Number</th>
                    <th>Room Status</th>
                    <th colspan="2">Actions</th>
                  </tr>';
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo 
            "<tr>
              <td id='room_id'>" . $row["room_id"]. "</td>
              <td>" . $row["room_type"]. "</td>
              <td>" . $row["room_description"]. "</td>
              <td>" . $row["room_capacity"] . "</td>
              <td>" . $row["room_rate"] . "</td>
              <td>" . $row["room_number"] . "</td>
              <td>" . $row["room_status"] . "<td>
                <form method = 'POST' action = 'roomsDelete.php'>
                  <input type ='hidden' value = '{$row['room_id']}' name = 'id'>
                    <button class = 'btn btn-info btn-lg' name = 'edit' type = 'button' data-toggle='modal' data-target='#editRoom'>Edit Room</button>
                    <br><br>
                    <button name = 'delete' class = 'btn btn-info btn-lg' type = 'submit'>Delete Room </button>
                </form>
              </td>
            
            <div class='modal fade' id='editRoom' role='dialog'>
            <div class='modal-dialog modal-lg'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h4 class='modal-title'>Update Rooms</h4>
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                </div>
                <div class='modal-body'>
                  <div class='content-wrapper'>
                    <div class='container-fluid'>  
                      <div class='form-group'>
                        <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                          <label for='RoomType'>Room Type</label><br>
                          <input required class='form-control' name = 'roomType' type='text' aria-describedby='emailHelp' placeholder='Room Type'>
                          <!-- </div> -->
                          <div class='form-group'>
                            <label for='roomDescription'>Room Description</label><br>
                            <textarea rows='4' cols='47' name='roomDescription' form='addRoomsForm' placeholder='Enter room description here...''></textarea>
                          </div>
                          <div class='form-group'>
                            <label for='roomRate'>Room Capacity</label><br>
                            <input required class='form-control' name = 'roomCapacity' type='number' placeholder='Room Capacity'>
                          </div>
                          <div class='form-group'>
                            <label for='roomRate'>Room Rate per night</label><br>
                            <input required class='form-control' name = 'roomRate' type='number' placeholder='Room Rate'>
                          </div>
                          <div class='form-group'>
                            <label for='roomNumber'>Room Number</label><br>
                            <input required class='form-control' name = 'roomNumber' type='number' placeholder='Room Number'>
                          </div>
                          <div class='form-group'>
                            <label for='roomStatus'>Room Status &nbsp&nbsp</label>
                            <select required name = 'roomStatus'>
                              <option value = 'Available' selected = 'selected'>Available</option>
                              <option value = 'UnderMaintenance'>Under Maintenance</option>
                              <option value = 'Occupied'>Occupied</option>  
                            </select>  
                             <button name = 'submit' class='btn btn-primary btn-block'>Update Room</button>           
                          </div>
                        </table>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                </div>
              </div>
            </div>
          </div>";
	    }
	    echo "</table></div></div></div>";

	    if (isset($_POST['delete'])) {
			$delete_room_query =  "DELETE FROM room_masterfile WHERE room_id = {$_POST['id']}";

	        try 
	        {
	          $delete_result = mysqli_query($conn, $delete_room_query) or die (mysqli_error($conn) . "saan?");
	          if ($delete_result) 
	          {
	            if (mysqli_affected_rows($conn) > 0) 
	            {
	              header("Location: roomsDelete.php");
	              exit();
	            }
	            else 
	            {
	              echo "<script>alert('Data not Deleted.{$row['id']}');location.href='roomsDelete.php';</script>";
	            }
	          } 
	        } 
	        catch (Exception $ex) 
	        {
	          echo "Error Delete Data".$ex->getMessage();
	        }
	 }
   elseif (isset($_POST['edit'])) {
     $edit_room_query =  "UPDATE room_masterfile SET  ";

          try 
          {
            $edit_result = mysqli_query($conn, $edit_room_query) or die (mysqli_error($conn) . "saan?");
            if ($edit_result) 
            {
              if (mysqli_affected_rows($conn) > 0) 
              {
                header("Location: roomsDelete.php");
                exit();
              }
              else 
              {
                echo "<script>alert('Data not Updated.{$row['id']}');location.href='roomsDelete.php';</script>";
              }
            } 
          } 
          catch (Exception $ex) 
          {
            echo "Error Delete Data".$ex->getMessage();
          }
   }

	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modify Room</title>

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
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<style>
table{
	
	margin-top:10px;
}
table {
    border-collapse: collapse;

}

table, th, td {
    border: 2px solid black;
    text-align: center;
}
table{
	color: black;
}

</style>
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
            
            <li>
          </li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti001">Customer Account</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti001">
                <li>
                  <a href="registerCustomer.php">Add Account</a>
                </li>
                <li>
                  <a href="">Modify Account</a>
                </li>
                
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
              <a href="RoomsDelete.php">Modify Rooms</a>
            </li>
            <li>
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
              <a href="DiscountModify.php">Modify Discounts</a>
            </li>
            
            <li>
          </li>
        </li>
        
  

             <!--  <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a> -->
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <!-- <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li> -->
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
                <!-- <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li> -->
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
    <!-- Edit Room Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalWrapper">
      <div class="modal-dialog modal-lg" role="document" id="modalWrapper">
        <div class="modal-content">
          <div class="modal-body">          
            
          </div>
        </div>          
      </div>
    </div>
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
    <script>
      $("input[name=editRoom]").click(function(){
        console.log($(this).closest("tr#"))
      });
    </script>
  </div>

</body>
</html>