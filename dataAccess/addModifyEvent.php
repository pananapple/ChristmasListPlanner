<?php
	include('config.php');

	//Grab Data
	$uid = $_SESSION['id'];
	$eid = $_POST['eid'];
	$event = $_POST['event'];
	$details = $_POST['details'];
	
	
	//IF GID EXISTS FIND AND UPDATE
	if($eid != ""){
		$sql = "UPDATE events SET event='$event', details='$details' WHERE id =$eid";
		mysqli_query($con,$sql);
		
		//REDIRECT
		header("Location: ../index.php?page=events&msg=13");
		die();
		
	}else{
		//ELSE JUST ADD TO DB
		$sql = "INSERT INTO events (uid, event, details) VALUES ('$uid', '$event', '$details')";
		mysqli_query($con,$sql);
		
		//REDIRECT
		header("Location: ../index.php?page=events&msg=12");
		die();
	}
	
	
	?>