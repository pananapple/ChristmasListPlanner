<?php
	include('config.php');
	
	$user = stripslashes($_POST['username']);
	$pass = stripslashes($_POST['password']);
	$pass = sha1($pass);
	
	$sql = "SELECT * FROM userdata WHERE name = '$user' AND password = '$pass'";
	
	
	//GATER data
	$result = mysqli_query($con,$sql);
	$count  = mysqli_num_rows($result);
	
	
	//TEST data
	if($count==1){
		//LOGIN SUCESSFULL!
		
		//Get Gift ID
		$row = mysqli_fetch_array($result);
		
		if($row['approved'] == 0){
			header("location: ../index.php?msg=7");
			die();
		}
		
		$uid = $row['id'];
		$result2 = mysqli_query($con,"SELECT id FROM gifts WHERE uid = $uid");
		$row2 = mysqli_fetch_array($result2);
		
				
		//Set Session Variables
		session_start();
		$_SESSION['name']     = $row['name'];
		$_SESSION['id']       = $row['id'];
		$_SESSION['gid']      = $row2['id'];
		$_SESSION['loggedin'] = 1;
		$_SESSION['email']    = $row['email'];
		
		
		header("location: ../index.php");
		die();
		
	}
	else {
		//INCORRECT USER NAME OR PASSWORD
		header("Location: ../index.php?msg=1");
		die();
	}



?>