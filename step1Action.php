<?php
	
	include_once 'db.php'; 
	// check room availability sa database. fuck. hirap pare.
	// header("Location: ../step2.php"); 

	$checkInDate =   $_POST['checkInDate'];
	$checkOutDate =  $_POST['checkOutDate'];
	$numberOfAdults =  $_POST['numberOfAdults'];
	
	
	// code to get difference between inputted dates (galing sa jQuery datepicker). wow english. 
	$date1 = date_create($checkInDate);
	$date2 = date_create($checkOutDate);
	$diff = date_diff($date1,$date2);

	// output of calculation, passed to a variable. 
	$dateLength = $diff->format("%a");
	session_start();
	$_SESSION['dateLength'] = $dateLength; 
	$_SESSION['checkInDate'] = $checkInDate; 
	$_SESSION['checkOutDate'] = $checkOutDate; 
	$_SESSION['numberOfAdults'] = $numberOfAdults; 

	if(isset($_SESSION['login'])){
		header('Location: Step2.php'); 
	 } else {
	 	header('Location: Confirm-Account.php');
	 }
	 


	// for example,
	// check - in : 01 / 15 / 2017
	// check - out: 01 / 20 / 2017

	// output: 5 days.
?>