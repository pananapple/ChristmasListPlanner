<?php
	session_start();

	//Grab Data
	$uid = $_SESSION['id'];
	$eid = $_POST['eid'];
	$event = $_POST['event'];
	$details = $_POST['details'];
	
	//CONNECT to database
	$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
	if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
	
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