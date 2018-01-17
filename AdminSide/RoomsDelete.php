<?php
include_once 'headerAdmin.php';

$sql    = "SELECT * FROM room_masterfile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="container-fluid">
          <h3>Room List</h3>
          <div class="table-responsive">
          <div id="alert_message"></div>
            <table class="table table-bordered table-striped" align="center">
              <thead> 
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Room Description</th>
                  <th>Room Capacity</th>
                  <th>Room Rate per night</th>
                  <th>Room Number</th>
                  <th>Room Status</th>
                  <th>Image</th>
                  <th colspan="2">Actions</th>
                </tr>
              </thead>';
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo
                  "<tr>
                      <td id='room_id'>" . $row["room_id"] . "</td>
                      <td id='room_type'>" . $row["room_type"] . "</td>
                      <td id='room_description'>" . $row["room_description"] . "</td>
                      <td id='room_capacity'>" . $row["room_capacity"] . "</td>
                      <td id='room_rate'>" . $row["room_rate"] . "</td>
                      <td id='room_number'>" . $row["room_number"] . "</td>
                      <td id='room_status'>" . $row["room_status"] . "</td>
                      <td><img src ='../{$row['room_imagepath']}' style = 'width:100%'/></td>
                      <td>
                        <form method = 'POST' action = 'roomsDelete.php'>
                          <input type ='hidden' value = '{$row['room_id']}' name = 'id'>
                            <button class = 'btn btn-info btn-xs edit_data' name = 'edit' type = 'button' data-toggle='modal' data-target='#editRoom'>Edit</button>
                            <br><br>
                            <button name = 'delete' class = 'btn btn-info btn-xs delete_data' type = 'submit'>Delete</button>
                        </form>
                      </td>";
              }
              echo "
            </table>
          </div>
        </div>";

  // if (isset($_POST['edit'])) {
  //   $update_room_query = "";
  // }

  if (isset($_POST['delete'])) {
    $delete_room_query = "DELETE FROM room_masterfile WHERE room_id = {$_POST['id']}";

    try
    {
      $delete_result = mysqli_query($conn, $delete_room_query) or die(mysqli_error($conn) . "saan?");
      if ($delete_result) {
        if (mysqli_affected_rows($conn) > 0) {
          header("Location: roomsDelete.php");
          exit();
        } else {
          echo "<script>alert('Data not Deleted.{$row['id']}');location.href='roomsDelete.php';</script>";
        }
      }
    } catch (Exception $ex) {
      echo "Error Delete Data" . $ex->getMessage();
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

  <div class='modal fade' id='editRoom' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Update Rooms</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
          <!-- <div class='content-wrapper'> -->
            <form id="formEditRoom" enctype="multipart/form-data" method ='post'>
              <div class='container-fluid'>
                <div class='form-group'>
                  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                    <label for='RoomType'>Room Type</label><br>
                    <input required class='form-control' name = 'roomType' type='text' aria-describedby='emailHelp'>
                    <div class='form-group'>
                      <label for='roomDescription'>Room Description</label><br>
                      <textarea rows='4' cols='102' name='roomDescription' form='formEditRoom'></textarea>
                    </div>
                    <div class='form-group'>
                      <label for='roomRate'>Room Capacity</label><br>
                      <input required class='form-control' name = 'roomCapacity' type='number'>
                    </div>
                    <div class='form-group'>
                      <label for='roomRate'>Room Rate per night</label><br>
                      <input required class='form-control' name = 'roomRate' type='number' step = '0.01'>
                    </div>
                    <div class='form-group'>
                      <label for='roomNumber'>Room Number</label><br>
                      <input required class='form-control' name = 'roomNumber' type='number'>
                    </div>
                     <div class='form-group'>
                      <label for ='image_upload'>Image</label><br>
                      <input type ='file' accept = 'image/*' name = 'image_upload'>
                    </div>
                    <div class='form-group'>
                      <label for='roomStatus'>Room Status &nbsp&nbsp</label>
                      <select required name = 'roomStatus'>
                        <option value = 'Available' selected = 'selected'>Available</option>
                        <option value = 'UnderMaintenance'>Reserved</option>
                        <option value = 'Occupied'>Occupied</option>
                      </select>
                        <br><br>
                        <input type ='hidden' name = 'roomId'>
                       <button name = 'update' type = 'submit' class='btn btn-primary btn-block'>Update Room</button>
                    </div>
                  </table>
                </div>
              </div>
            </form>
              
          <!-- </div> -->
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
        var room_id = $(this).closest("tr").find("#room_id").html();
        var room_type = $(this).closest("tr").find("#room_type").html();
        var room_description = $(this).closest("tr").find("#room_description").html();
        var room_capacity = $(this).closest("tr").find("#room_capacity").html();
        var room_rate = $(this).closest("tr").find("#room_rate").html();
        var room_number = $(this).closest("tr").find("#room_number").html();
        var room_status = $(this).closest("tr").find("#room_status").html();
        console.log(room_description);
        $('#editRoom').find('.modal-title').html(room_type);
        $('#editRoom').find('input[name=roomId]').val(room_id);
        $('#editRoom').find('input[name=roomType]').val(room_type);
        $('#editRoom').find('textarea[name=roomDescription]').val(room_description);
        $('#editRoom').find('input[name=roomCapacity]').val(room_capacity);
        $('#editRoom').find('input[name=roomRate]').val(room_rate);
        $('#editRoom').find('input[name=roomNumber]').val(room_number);
        $('#editRoom').find('input[name=roomStatus]').val(room_status); 
      });
      $("#formEditRoom").submit(function(e){
        var image_path = $('input[type=file]').val().replace(/.*(\/|\\)/, '')
        e.preventDefault(); // remove default function of form submit
        $.ajax({
          type: 'POST', // type of submission
          url: 'updateroom.php', // where the form send the data HAHAHAH
          data: $(this).serialize()+`&image_upload=${image_path}`, // roomType=blabla&roomDescription=blabla&....
          success: function(response){ // eto ung response ng php na nilagay mo sa url
            alert(response)
            location.href="RoomsDelete.php";
          }

        });
      });
    });
  </script>
</body>
</html>