<?php
	include('config.php');
	
	$uid = $_SESSION['id'];
	$name = $_POST['groupname'];
	
	//SCRUB DATA
	
	if (preg_match("/\\s/", $name)) {
		//REDIRECT
		header("Location: ../index.php?page=registerGroup&msg=3");
		die();
	}
	
	
	//CHECK IF GROUP NAME EXISTS
	$sql = "SELECT * FROM groups";
	$result = mysqli_query($con,$sql);
	$exists = 0;
	while($row = mysqli_fetch_array($result)){
		if($row['name'] == $name)
			$exists=1;
	}
	
	if($exists){
		//REDIRECT
		header("Location: ../index.php?page=registerGroup&msg=2");
		die();
	}

	
	//REGISTER GROUP	
	$sql = "INSERT INTO groups (oid, name) VALUES ($uid, '$name')";
	mysqli_query($con,$sql);
	
	//GET NEW GROUP ID
	$sql = "SELECT * FROM groups WHERE oid=$uid AND name='$name'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$groupid = $row['id'];
	
	//ADD OWNER TO GROUPMEMBERS LIST
	$sql = "INSERT INTO groupmembers (email, groupid, confirm) VALUES ('$email', $groupid, '1')";
	mysqli_query($con,$sql);
	
	//REDIRECT
	header("Location: ../index.php?page=groupMembers");
	die();
	
?>