<?php
	include('./dataAccess/config.php');
	
	//CONFIRM GROUP NAME | PASSWORD | EMAIL
?>

<form method='POST' action=''>
	Group Name: <input type='text' name='groupname'/>
	Group Password: <input type='password' name='password'/>
	Your Email: <input type='text' name='email'/>
	<input type='submit' value='Join Group'/>
</form>