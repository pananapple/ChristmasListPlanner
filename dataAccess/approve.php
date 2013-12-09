<?php
	include('./dataAccess/config.php');

	//GET PASSED GIFT ID
	$uid = $_GET['uid'];
	
	$sql = "UPDATE userdata SET approved='1' WHERE id='$uid'";
	mysqli_query($con,$sql);
	
	$usersql = "SELECT * FROM userdata WHERE id='$uid'";
	$userresult = mysqli_query($con,$usersql);
	$userrow = mysqli_fetch_array($userresult);
	$email = $userrow['email'];
	
	//SEND USER APPROVED EMAIL
		//CREATE LINK
		$link = "christmaslistplanner.com";
		
		// The message
		$message = "Your account has been approved! \r\r Click Here To Login: $link";
		
		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70, "\r\n");
		
		// Send
		mail($email, 'APPROVED! ChristmasList.com', $message);
	
	//REDIRECT
	header("Location: ../index.php?msg=10");
	die();
?>