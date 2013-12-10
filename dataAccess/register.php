<?php
	include('config.php');
	
	//Grab Data
	$name 	  = $_POST['username'];
	$password = $_POST['password'];
	$email    = $_POST['email'];
	
	//TEST IF ALL FIELDS HAVE BEEN FILLED OUT
	if(empty($_POST['username'])==1 || empty($_POST['password']) || empty($_POST['email'])==1){
		//REDIRECT
		header("Location: ../index.php?page=register&msg=16");
		die();
	}
	
	//TEST DATA
	
		//CHECK EMAIL
		if(!filter_var($email, FILTER_VALIDATE_EMAIL )){
			//REDIRECT
			header("Location: ../index.php?page=register&msg=17");
			die();
		}
		
		
		//CHECK USERNAME
		if (!ctype_alnum($name)) {
			//REDIRECT
			header("Location: ../index.php?page=register&msg=18");
			die();
		}
		
		
		//CHECK PASSWORD
		if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password)){
		    //REDIRECT
		    header("Location: ../index.php?page=register&msg=19");
			die();
		}
	
		
	//IF USER NAME EXISTS SEND ERROR
	$emailsql = "SELECT * FROM userdata WHERE email = '$email'";
	$emailresult = mysqli_query($con,$emailsql);
	$emailrow = mysqli_fetch_array($emailresult);
	
	$namesql = "SELECT * FROM userdata WHERE name = '$name'";
	$nameresult = mysqli_query($con,$namesql);
	$namerow = mysqli_fetch_array($nameresult);
	
	//IF EMAIL EXISTS ERROR
	if($emailrow['id']!=""){
		//REDIRECT
		header("Location: ../index.php?page=register&msg=14");
		die();
	}
	
	//IF USERNAME EXISTS ERROR
	if($namerow['name']!=""){
		//REDIRECT
		header("Location: ../index.php?page=register&msg=15");
		die();
	}
	
	$password = sha1($password);
	
	//ADD TO DB
	$sql = "INSERT INTO userdata (name, email, password, approved) VALUES ('$name', '$email', '$password', '0')";
	mysqli_query($con,$sql);
	
	
	//GET NEW USER ID
	//CONNECT to database
	$newsql = "SELECT * FROM userdata WHERE name='$name' AND password='$password'";
	$newresult = mysqli_query($con,$newsql);
	$newrow = mysqli_fetch_array($newresult);
	$newid = $newrow['id'];
	
	//CREATE LINK
	$link = "christmaslistplanner.com/dataAccess/approve.php?uid=$newid";
	
	// The message
	$message = "$name at $email has requested approval\r\r\n Click Here To Approve: $link";
	
	// In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message, 70, "\r\n");
	
	// Send
	mail('hannahcraswell@gmail.com', 'NEW USER!', $message);
	
	//REDIRECT
	header("Location: ../index.php?msg=6");
	die();

?>