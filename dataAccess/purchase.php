<?php
	session_start();
	
	//CONNECT to database
	$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
	if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
	
	//GET SETTING TO UPDATED
	$gid = $_GET['gift'];
	$viewID = $_GET['viewID'];
	
	if($_GET[action]=="pur")
		$purchase = $_SESSION['id'];
	elseif($_GET[action]=="un")
		$purchase = 0; 
	
	
	$sql = "UPDATE gifts SET purchased=$purchase WHERE id='$gid'";
	mysqli_query($con,$sql);
		
	//REDIRECT
	header("Location: ../index.php?page=allLists&viewID=$viewID&msg=8");
	die();
		
?>