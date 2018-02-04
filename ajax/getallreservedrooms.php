<?php 
include '../db.php';
$fetchallrooms = mysqli_query($conn, "SELECT * FROM room_masterfile");
while($row = mysqli_fetch_assoc($fetchallrooms)){
	$reservedrooms = 0;
	$fetchreservedrooms = mysqli_query($conn, "SELECT room_number FROM reservation_masterfile WHERE ((checkInDate <= '{$_POST['checkInDate']}' AND checkOutDate >= '{$_POST['checkInDate']}') AND (status = 'Approved' OR status ='Checkin')) AND room_id = {$row['room_id']}") or die(mysqli_error($conn));
		$fetchreservedwalkin = mysqli_query($conn, "SELECT * FROM assignedroom_masterfile INNER JOIN walkinrooms_masterfile ON assignedroom_masterfile.room_id = walkinrooms_masterfile.walkinrooms_id WHERE walkinrooms_masterfile.room_id = {$row['room_id']} AND ((date >= '{$_POST['checkInDate']}' AND date <= '{$_POST['checkInDate']}') AND status = 'Walkin')") or die(mysqli_error($conn));
		$reservedwalkin = array();
		while($row1 = mysqli_fetch_assoc($fetchreservedwalkin)){
			$reservedwalkin[] = $row1['room_id'];
		}
	while($row1 = mysqli_fetch_assoc($fetchreservedrooms)){

		$reservedrooms += $row1['room_number'];
	}
	$rooms_total = $row['room_number'] - ($reservedrooms + count(array_unique($reservedwalkin)));
	echo "<tr>
			<td id='room_id'> {$row['room_id']} </td>
			<td id='room_type'>{$row['room_type']}</td>
			<td id='room_description'>{$row['room_description']}</td>
			<td id='room_capacity'>{$row['room_capacity'] }</td>
			<td id='room_rate'>{$row['room_rate']}</td>
			<td id='room_number'>{$rooms_total}</td>
			<td id='room_status'>". (($rooms_total != 0)? 'Avalable' :'Not available'). "</td>
			<td><img src ='../{$row['room_imagepath']}' style = 'width:100%'/></td>
			<td>
				<form method = 'POST' action = 'roomsDelete.php'>
					<input type ='hidden' value = '{$row['room_id']}' name = 'id'>
					<button class = 'btn btn-info btn-xs edit_data' name = 'edit' type = 'button' data-toggle='modal' data-target='#editRoom'>Edit</button>
					<br><br>
					<button name = 'delete' class = 'btn btn-info btn-xs delete_data' type = 'submit'>Delete</button>
				</form>
			</td>
		</tr>";
}
?>
