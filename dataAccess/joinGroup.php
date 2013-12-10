<?php
	include('config.php');
	$groupid = $_POST['groupid'];
	$email   = $_POST['email'];
	
	//CHECK IF GROUP ID EXISTS
	$sql = "SELECT * FROM groups WHERE id = $groupid";
	$result = mysqli_query($con,$sql);
	
	if(!$result){
		//REDIRECT
		header("Location: ../index.php?page=joinGroup&msg=1");
		die();
	}
	
	
	//VERIFY EMAIL IS ON MEMBERSLIST
	$sql = "SELECT * FROM groupmembers WHERE groupid = $groupid";
	$result = mysqli_query($con,$sql);
	$member = 0;
	while($row = mysqli_fetch_array($result)){
		if($row['email'] == $email)
			$member = 1;
	}
	
	//IF MEMBER: UPDATE RECORD TO CONFIRMED
	if($member){
		$sql = "UPDATE groupmembers SET confirm = '1' WHERE groupid = '$groupid' AND email = '$email'";
		mysqli_query($con,$sql);
		
		//REDIRECT
		header("Location: ../index.php?page=home&msg=11");
		die();
		
	//IF NOT MEMBER	
	}else{
		//REDIRECT
		header("Location: ../index.php?page=joinGroup&msg=2");
		die();
	}	
	
?>