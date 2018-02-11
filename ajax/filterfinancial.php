<?php 
include '../db.php';
$fetchallfinancial = mysqli_query($conn, "SELECT * FROM {$_POST['dbtype']} WHERE MONTH(created_at) = {$_POST['month']} AND YEAR(created_at) = {$_POST['year']}") or die(mysqli_error($conn));
if($_POST['dbtype'] == 'financialreports_masterfile'){
while($row = mysqli_fetch_assoc($fetchallfinancial)){
    echo"<tr>
    <td>{$row['financialreport_id']}</td>
    <td id ='guest-id'>".number_format($row['payment'],2)." PHP</td>
    <td>{$row['payment_type']}</td>
    <td>{$row['created_at']}</td>
    </tr>";
}
}
else if($_POST['dbtype']=='reservationreports_masterfile'){
    $fetchallfinancial = mysqli_query($conn, "SELECT * FROM {$_POST['dbtype']} JOIN reservation_masterfile ON reservation_masterfile.reservation_id = {$_POST['dbtype']}.reservation_id WHERE MONTH(created_at) = {$_POST['month']} AND YEAR(created_at) = {$_POST['year']}") or die(mysqli_error($conn));

    while($row = mysqli_fetch_assoc($fetchallfinancial)){
        echo "
        <tr>
        <td id = 'reservation-id'>{$row['reservereports_id']}</td>
        <td id = 'guest-id'>{$row['reservation_code']}</td>
        <td>{$row['status']}</td>
        <td>{$row['created_at']}</td>
        <td>{$row['created_at']}</td>
        <td><form method ='post'>
        <input type ='hidden' name ='proof_id' value = '{$row['proofofpayment_id']}'/>
        <button type ='submit' class ='btn btn-danger' onclick = \" return confirm('Are you sure?')\" name ='delete'>Delete</button>
        </form></td>
        </tr>
        ";
    }
}
?>