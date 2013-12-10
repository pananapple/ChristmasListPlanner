<?php 
	include('config.php');
	
	$inviter = $uname;
	
	//GRAB DATA
	$email = $_POST['email'];
	$groupid = $_POST['groupid'];
	
	
	//GRAB GROUP DETAILS
	$sql1 = "SELECT * FROM groups WHERE id = $groupid";
	$result1 = mysqli_query($con,$sql1);
	while($row1 = mysqli_fetch_array($result1)){
		$groupname = $row1['name'];
		$password = $row1['password'];
	}
	
	
	
	//SCRUB DATA
	
	//TEST IF USER IS ALREADY ON MEMBER LIST
	$sql1 = "SELECT * FROM groupmembers WHERE groupid = $groupid";
	$result1 = mysqli_query($con,$sql1);
	$exists = 0;
	
	while($row1 = mysqli_fetch_array($result1)){
		if($row1['email']==$email){
			$exists = 1;
		}
	}
	
	
	if(!$exists){
		//ADD EMAIL TO MEMBER LIST
		$sql = "INSERT INTO groupmembers (email, groupid) VALUES ('$email', '$groupid')";
		mysqli_query($con,$sql);
		
		//SEND INVITE EMAIL
			//CREATE LINK
			$link = "christmaslistplanner.com/index.php?page=joinGroup";
			
			// The message
			$message = "
			$inviter has invited you to join their group on ChristmasListPlanner.com!\r\r
			Group ID: $groupid\r
			Click Here To Login: $link\r\r
			-ChristmasListPlanner.com";
			
			//WORD WRAP! 
			$message = wordwrap($message, 100, "\r\n");
			
			// Send
			mail($email, 'ChristmasList.com', $message, "From: ChristmasListPlanner.com");
		
		//REDIRECT
		header("Location: ../index.php?page=groupMembers&msg=1&groupid=$groupid");
		die();
	}
	
	//REDIRECT
	header("Location: ../index.php?page=groupMembers&msg=2&groupid=$groupid");
	die();

?>