<?php
	include_once 'headerAdmin.php';

	$sql = "SELECT * FROM discount_masterfile";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    echo '<div class="container-fluid">
              <h3>Discount List</h3>
				        <div class="table-responsive">
                  <table class="table table-bordered table-striped" id="dataTable" align="center">
                    <tr>
                      <th>Discount ID</th>
                      <th>Discount Percent</th>
                      <th>Discount Name</th>
                      <th>Discount Description</th>
                      <th colspan="2">Actions</th>
                    </tr>';
              	    // output data of each row
              	    while($row = $result->fetch_assoc()) {
              	        echo "<tr>
                                <td id = 'discount_ID'>" . $row["discount_ID"]. "</td>
                                <td id = 'discount_percent'>" . $row["discount_percent"]. "</td>
                                <td id = 'discount_name'>" . $row["discount_name"]. "</td>
                                <td id = 'discount_description'>" . $row["discount_description"] . "<td>
                                  <form method = 'POST' action = 'discountModify.php'>
                                    <input type ='hidden' value = '{$row['discount_ID']}' name = 'delete_id'>
                                    <button class = 'btn btn-info btn-xs edit_data' name = 'edit' type = 'button' data-toggle='modal' data-target='#editDiscount'>Edit</button>
                                    <br><br>
                                    <button name = 'delete' class = 'btn btn-info btn-xs delete_data' type = 'submit'>Delete</button>
                                  </form>
                                </td>";
              	    }
                  echo "</table>
                </div>
            </div>
          </div>";
	    // Hello po pwede po patulong pls hehe 
	    if (isset($_POST['delete'])) {
			$delete_discount_query =  "DELETE FROM discount_masterfile WHERE discount_ID = {$_POST['delete_id']}";

	        try 
	        {
	          $delete_result = mysqli_query($conn, $delete_discount_query) or die (mysqli_error($conn) . "saan?");
	          if ($delete_result) 
	          {
	            if (mysqli_affected_rows($conn) > 0) 
	            {
                echo "<script>alert('Successfully Deleted!')</script>";
	              header("Location: DiscountModify.php");
	              exit();
	            }
	            else 
	            {
	              echo "<script>alert('Data not Deleted.{$row['room_id']}');location.href='DiscountModify.php';</script>";
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
	<title>Modify Discounts</title>

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
    <div class='modal fade' id='editDiscount' role='dialog'>
    <div class='modal-dialog modal-sm'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Update Discount Information</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
          <form id = "formEditDiscount">
            <div class="form-group">
              <label for="discountPercent">Discount Percent %</label><br>
              <input required class="form-control" name = "discountPercent" type="number" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="discountName">Discount Name</label><br>
              <input required class="form-control" name = "discountName" type="text">
            </div>
            <div class="form-group">
              <label for="discountDescription">Discount Description</label><br>
              <textarea rows="4" cols="35" name="discountDescription" form="formEditDiscount"></textarea>
            </div>        
            <input type="hidden" name="discountId">
            <button name = "submit" class="btn btn-primary btn-block">Update Discount</button>
        </form>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" language="javascript" >
    $(document).ready(function(){
      $("button.edit_data").click(function(){
        var discount_ID = $(this).closest("tr").find("#discount_ID").html();
        var discount_percent = $(this).closest("tr").find("#discount_percent").html();
        var discount_name = $(this).closest("tr").find("#discount_name").html();
        var discount_description = $(this).closest("tr").find("#discount_description").html();
        console.log(discount_description);
        $('#editDiscount').find('.modal-title').html(discount_name);
        $('#editDiscount').find('input[name=discountId]').val(discount_ID);
        $('#editDiscount').find('input[name=discountPercent]').val(discount_percent);
        $('#editDiscount').find('input[name=discountName]').val(discount_name);
        $('#editDiscount').find('textarea[name=discountDescription]').val(discount_description);
        
      });
      $("#formEditDiscount").submit(function(e){
        e.preventDefault(); // remove default function of form submit
        $.ajax({
          type: 'POST', // type of submission
          url: 'updatediscount.php', // where the form send the data HAHAHAH
          data: $(this).serialize(), // roomType=blabla&roomDescription=blabla&....
          success: function(response){ // eto ung response ng php na nilagay mo sa url
            alert(response)
            location.href="DiscountModify.php";
          }

        });
      });
    });
  </script>

</body>
</html>editDiscount