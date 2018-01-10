<!-- Guest modify -->

<?php
	include_once 'headerAdmin.php';

	$sql = "SELECT * FROM guest_masterfile";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    echo '<div class="container-fluid">
              <h3>Guest Accounts</h3>
				        <div class="table-responsive">
                  <table class="table table-bordered table-striped" id="dataTable" align="center">
                    <tr>
                      <th>Guest ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email Address</th>
                      <th>Contact Number</th>
                      <th>Country</th>
                      <th>Address</th>
                      <th>Actions</th>
                    </tr>';
              	    // output data of each row
              	    while($row = $result->fetch_assoc()) {
              	        echo "<tr>
                                <td>" . $row["guest_ID"]. "</td>
                                <td>" . $row["guest_firstname"]. "</td>
                                <td>" . $row["guest_lastname"]. "</td>
                                <td>" . $row["guest_email"] . "</td>
                                <td>" . $row["guest_contactNumber"] . "</td>
                                <td>" . $row["guest_country"]."</td>
                                <td>".$row["guest_address"] . "<td>
                                  <form method = 'POST' action = 'guestmodify.php'>
                                    <input type ='hidden' value = '{$row['guest_ID']}' name = 'delete_id'>
                                    <button class = 'btn btn-info btn-xs edit_data' name = 'edit' type = 'button' data-toggle='modal' data-target='#editGuestAccount'>Edit</button>
                                    <br><br>
                                    <button name = 'delete' class = 'btn btn-info btn-xs edit_data' type = 'submit'>Delete</button>
                                  </form>
                                </td>";
              	    }
                  echo "</table>
                </div>
            </div>";
	    if (isset($_POST['delete'])) {
      $delete_guest_query =  "DELETE FROM guest_masterfile WHERE guest_ID = {$_POST['delete_id']}";
          try 
          {
            $delete_result = mysqli_query($conn, $delete_guest_query) or die (mysqli_error($conn) . "saan?");
            if ($delete_result) 
            {
              if (mysqli_affected_rows($conn) > 0) 
              {
                header("Location: guestmodify.php");
                exit();
              }
              else 
              {
                echo "<script>alert('Data not Deleted.{$row['user_id']}');location.href='guestmodify.php';</script>";
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
	<title>Modify Guest</title>

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
<body>
	  <div class='modal fade' id='editGuestAccount' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Update Rooms</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
          <form method = "POST" action = "registerCustomer.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input  required class="form-control" id="exampleInputName" name = "firstName" type="text" aria-describedby="nameHelp" pattern = "[a-z A-Z]+" onkeypress="return isLetter(event)">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input required class="form-control" id="exampleInputLastName" name = "lastName" type="text" aria-describedby="nameHelp" pattern = "[a-z A-Z ]+" onkeypress="return isLetter(event)">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Email address</label>
                <input required class="form-control" id="exampleInputEmail1" name = "email" type="email" aria-describedby="emailHelp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputContactNum1">Contact Number</label>
                <input required class="form-control" id="exampleInputEmail1" name = "contactNumber" type="text" aria-describedby="emailHelp">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input required class="form-control" id="exampleInputPassword1" name = "password" type="password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input required class="form-control" id="exampleConfirmPassword" name = "confirmPassword" type="password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="Address">Address</label>
                <input required class="form-control" id="exampleAddress" name = "address" type="text">
              </div>
              <div class="col-md-6">
                <label for="country">Country</label><br>
                <select required name="country">
                  <option value="Australia">Australia</option>
                  <option value="China">China</option>
                  <option value="HongKong">Hong Kong</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Japan">Japan</option>
                  <option value="Korea">Korea</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Philippines" selected="selected">Philippines</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Thailand">Thailand</option>
                  <option value="UAE">United Arab Emirates</option>
                  <option value="UK">United Kingdom</option>
                  <option value="USA">United States</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
          </div>

          <button class="btn btn-primary btn-block" name = "submit" type = "submit">Update Customer Account</button>
        </form>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>