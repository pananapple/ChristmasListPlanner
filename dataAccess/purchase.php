<?php

	include('config.php');
	
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