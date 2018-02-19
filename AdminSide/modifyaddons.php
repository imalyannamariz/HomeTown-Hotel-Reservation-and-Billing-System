<?php
	//include_once 'dbConnect.php';
include_once 'sideBarAndTopBar.php';
// session_start();
if(isset($_POST['updateinfo'])){
  $addonName = mysqli_real_escape_string($conn, $_POST['addonName']);
  $addonRate= mysqli_real_escape_string($conn, $_POST['addonRate']);
  $addonDescription = mysqli_real_escape_string($conn, $_POST['addonDesc']);
  $addonQuantity = mysqli_real_escape_string($conn, $_POST['addonquantity']);
  mysqli_query($conn, "UPDATE addons_masterfile SET Addon_name = '{$addonName}', Addon_rate ={$addonRate}, Addon_description ='{$addonDescription}', addon_qty = {$addonQuantity} WHERE Addon_ID = {$_POST['addon_id']}") or die(mysqli_error($conn));
  echo "<script>alert('Success')</script>";
}


if (isset($_POST['delete'])) {
  mysqli_query($conn, "DELETE FROM addons_masterfile WHERE Addon_ID = {$_POST['addon_id']}") or die(mysqli_error($conn));
  echo "<script>alert('Add-on has been deleted')location.href='modifyaddons.php'</script>";
}
$_POST = array();
?>
<div class="content-wrapper">
 <div class="container-fluid">
   <h3>User Accounts</h3>
   <div class="table-responsive">
     <table class="table table-bordered table-striped" id="dataTable" align="center">
       <tr>
         <th>Add-on ID</th>
         <th>Add-on Name</th>
         <th>Add-on Rate</th>
         <th>Add-on Description</th>
         <th>Add-on Status</th>
         <th>Add-on Quantity</th>
         <th>Action</th>
       </tr>
       <?php
       $result = mysqli_query($conn, "SELECT * FROM addons_masterfile");
       while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td class ='addon-id'>" . $row["Addon_ID"]. "</td>
        <td class ='addonName'>" . $row["Addon_name"]. "</td>
        <td class ='addonRate'>" . $row["Addon_rate"]. "</td>
        <td class ='addonDescription'>" . $row["Addon_description"] . "</td>
        <td class ='addonStatus'>" . $row["Addon_status"] . "</td>
        <td class ='addonQuantity'>{$row['Addon_qty']}
        </td><td>
        <a data-toggle ='modal' data-target = \"#editModal\" class='btn btn-primary edit' style ='color:white;margin-bottom:10px'>Edit</a>
        <form method = 'POST' action = 'adminusermodify.php'>
        <input type ='hidden' value = '{$row['Addon_ID']}' name = 'delete_id'> 
        <button name = 'delete' class = 'btn btn-info btn-xs edit_data' onclick = 'return confirm(\"Are you sure? \")' type = 'submit'>Delete</button>
        </form>
        </td>";
      }
      ?>
    </table>
  </div>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class='modal-dialog modal-lg'>
     <div class='modal-content'>
       <div class='modal-header'>
         <h4 class='modal-title'>Update account</h4>
         <button type='button' class='close' data-dismiss='modal'>&times;</button>
       </div>
       <div class='modal-body'>
         <!-- <div class='content-wrapper'> -->
           <form method ='post' >

            <input type ='hidden' name ='addon_id' />
            <div class="form-group">
             <div class="form-row">
               <div class="col-md-6">
                 <label for="exampleInputName">Addon name</label>
                 <input  required class="form-control" id="exampleInputName" name = "addonName" type="text" aria-describedby="nameHelp" pattern = "[a-z A-Z]+" onkeypress="return isLetter(event)">
               </div>
               <div class="col-md-6">
                 <label for="exampleInputLastName">Addon Rate</label>
                 <input required class="form-control" id="exampleInputLastName" name = "addonRate" type="number" aria-describedby="nameHelp" pattern = "[a-z A-Z ]+" onkeypress="return isLetter(event)">
               </div>
             </div>
           </div>
           <div class="form-group">
             <div class="form-row" style ='margin-bottom:10px'>
               <div class="col-md-6">
                 <label for="exampleInputEmail1">Addon Description</label>
                 <input required class="form-control" id="exampleInputEmail1" name = "addonDesc" type ='text' aria-describedby="emailHelp">
               </div>
               <div class ='col-md-6'>
                <label>Addon Quantity</label>
                <input class ='form-control' name ='addonquantity' type ='number'/>
               </div>
             </div>
             <button class="btn btn-primary btn-block" name = "updateinfo" type = "submit">Update Addon</button>
           </div>
         </form>
       <!-- </div> -->
     </div>
     <div class='modal-footer'>
       <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
     </div>
   </form>
 </div>
</div>
</div>
</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script type = 'text/javascript' src ='js/datatables.min.js'></script> 
<script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.datetimepicker.full.min.js"></script>
<script>
  $('.edit').click(function(){
    addon_id = $(this).closest('tr').find('.addon-id').html()
    account_id = $(this).closest('tr').find('.addonName').html()
    firstname = $(this).closest('tr').find('.addonRate').html()
    lastname = $(this).closest('tr').find('.addonDescription').html()
    email = $(this).closest('tr').find('.addonQuantity').html()
    $('input[name=addon_id]').val(addon_id)
    $('input[name=addonName]').val(account_id)
    $('input[name=addonRate]').val(firstname)
    $('input[name=addonDescription]').val(lastname)
    $('input[name=addonquantity]').val(parseInt(email))
  })
</script>