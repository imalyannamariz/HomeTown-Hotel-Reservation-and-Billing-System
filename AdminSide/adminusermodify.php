<?php
	//include_once 'dbConnect.php';
include_once 'sideBarAndTopBar.php';
	// session_start();
if(isset($_POST['updateinfo'])){
  $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastname= mysqli_real_escape_string($conn, $_POST['lastName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $admintype = mysqli_real_escape_string($conn, $_POST['adminType']);
  mysqli_query($conn, "UPDATE adminuser_masterfile SET User_firstname = '{$firstname}', User_lastname ='{$lastname}', email ='{$email}', admin_type = '{$admintype}' WHERE user_id = {$_POST['account_id']}") or die(mysqli_error($conn));
  echo "<script>alert('Success')</script>";
}
else if(isset($_POST['changepass'])){
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmpass = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
  if($password == $confirmpass){
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE adminuser_masterfile SET password ='{$hashedpassword}' WHERE user_id = {$_POST['account_id']}") or die(mysqli_error($conn));
    echo "<script>alert('Password has been updated')</script>";
  }
  else{
    echo "<script>alert('Password don't match')</script>";
  }

}

if (isset($_POST['delete'])) {
  mysqli_query($conn, "DELETE FROM adminuser_masterfile WHERE user_id = {$_POST['delete_id']}") or die(mysqli_error($conn));
  echo "<script>alert('Account has been deleted')location.href='adminusermodify.php'</script>";
}
$_POST = array();
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
        <td class ='account-id'>" . $row["user_id"]. "</td>
        <td class ='firstname'>" . $row["User_firstname"]. "</td>
        <td class ='lastname'>" . $row["User_lastname"]. "</td>
        <td class ='email'>" . $row["email"] . "</td>
        <td>" . $row["admin_type"] . "</td><td>
        <a data-toggle ='modal' data-target = \"#editModal\" class='btn btn-primary edit' style ='color:white;margin-bottom:10px'>Edit</a>
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
         <h4 class='modal-title'>Update account</h4>
         <button type='button' class='close' data-dismiss='modal'>&times;</button>
       </div>
       <div class='modal-body'>
         <!-- <div class='content-wrapper'> -->
           <form method ='post' >
            <input type ='hidden' name ='account_id' />
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
             <div class="form-row" style ='margin-bottom:10px'>
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
             <button class="btn btn-primary btn-block" name = "updateinfo" type = "submit">Update info</button>
           </div>
         </form>

         <h5>Change password</h5>
         <hr/>
         <form method ='post'>
           <div class="form-group">
            <input type ='hidden' name ='account_id' />
            <div class="form-row" style ='margin-bottom:10px'>
             <div class="col-md-6">
               <label for="exampleInputPassword1">Password</label>
               <input required class="form-control" id="exampleInputPassword1" name = "password" type="password">
             </div>
             <div class="col-md-6">
               <label for="exampleConfirmPassword">Confirm password</label>
               <input required class="form-control" id="exampleConfirmPassword" name = "confirmPassword" type="password">
             </div>
           </div>
           <button class="btn btn-primary btn-block" name = "changepass" type = "submit">Change Password</button>
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
    account_id = $(this).closest('tr').find('.account-id').html()
    firstname = $(this).closest('tr').find('.firstname').html()
    lastname = $(this).closest('tr').find('.lastname').html()
    email = $(this).closest('tr').find('.email').html()
    $('input[name=account_id').val(account_id)
    $('input[name=firstName]').val(firstname)
    $('input[name=lastName]').val(lastname)
    $('input[name=email]').val(email)
  })
</script>