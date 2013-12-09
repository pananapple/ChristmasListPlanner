<?php
	session_start();

	//Grab Data
	$gid = $_POST['gid'];
	$item = $_POST['item'];
	$description = $_POST['description'];
	$link = $_POST['link'];
	
	//CONNECT to database
	$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
	if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
	
	//IF GID EXISTS FIND AND UPDATE
	if($gid != ""){
		$sql = "UPDATE gifts SET item='$item', description='$description', link='$link' WHERE id='$gid'";
		mysqli_query($con,$sql);
		
		//REDIRECT
		header("Location: ../index.php?page=myList&msg=4");
		die();
		
	}else{
		//ELSE JUST ADD TO DB
		$sql = "INSERT INTO gifts (uid, item, description, link) VALUES ('".$_SESSION['id']."', '$item', '$description', '$link')";
		mysqli_query($con,$sql);
		
		//REDIRECT
		header("Location: ../index.php?page=myList&msg=5");
		die();
	}
	
	
	?>