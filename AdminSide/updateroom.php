<?php
  require_once "dbConnect.php";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $query = "";
    mysqli_query($db,$query);
    if(mysqli_affected_rows($db) > 0){
      echo true;
    } else {
      echo "There was an error editing the room.";
    }
  }
?>