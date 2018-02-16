<?php
	//include_once 'dbConnect.php';
include_once 'sideBarAndTopBar.php';
	// session_start();
if (isset($_POST['delete'])) {
  mysqli_query($conn, "DELETE FROM adminuser_masterfile WHERE user_id = {$_POST['delete_id']}") or die(mysqli_error($conn));
  echo "<script>alert('Account has been deleted')location.href='adminusermodify.php'</script>";
}
?>
<div class="content-wrapper">
 <div class="container-fluid">
   <h3>User Accounts</h3>
   <div class="table-responsive">
     <table class="table table-bordered table-striped" id="dataTable" align="center">
       <tr>
         <th>User Id</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Email Address</th>
         <th>User type</th>
         <th>Actions</th>
       </tr>
       <?php
       $result = mysqli_query($conn, "SELECT * FROM adminuser_masterfile");
       while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . $row["user_id"]. "</td>
        <td>" . $row["User_firstname"]. "</td>
        <td>" . $row["User_lastname"]. "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["admin_type"] . "</td><td>
        <a data-toggle ='modal' data-target = \"#editModal\" class='btn btn-primary  ' style ='color:white;margin-bottom:10px'>Edit</a>
        <form method = 'POST' action = 'adminusermodify.php'>
        <input type ='hidden' value = '{$row['user_id']}' name = 'delete_id'> 
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
         <h4 class='modal-title'>Update Rooms</h4>
         <button type='button' class='close' data-dismiss='modal'>&times;</button>
       </div>
       <div class='modal-body'>
         <!-- <div class='content-wrapper'> -->
           <form>
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
                   <label for="exampleInputEmail1">Type</label><br>
                   <select required id="cmbMake" name="adminType">
                     <option value="Admin" selected="selected">Admin</option>
                     <option value="FrontDesk">Front Desk</option>
                   </select>
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
             <button class="btn btn-primary btn-block" name = "submit" type = "submit">Update User Account</button>
           </form>
           <!-- </div> -->
         </div>
         <div class='modal-footer'>
           <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
