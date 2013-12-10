<?php
	session_start();
	
	//CONNECT to database
	$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
	if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
	
	//CREATE VARIABLS
	$ROOT  = "http://www.christmaslistplanner.com/";
	$uid   = $_SESSION['id'];
	$uname = $_SESSION['name'];
	$email = $_SESSION['email'];
	
	//CHECK IF USER IS A GROUP OWNER
	$sql = "SELECT * FROM groups";
	$result = mysqli_query($con,$sql);
	$groupowner = 0;
	while($row = mysqli_fetch_array($result)){
		if($row['oid']==$uid){
			$groupowner = 1;
		}
	}
	
	
?>