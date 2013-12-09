<?php
	session_start();
	
	$ROOT = "http://www.christmaslistplanner.com/";
	
	//CONNECT to database
	$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
	if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
	
?>