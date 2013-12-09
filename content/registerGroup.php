<?php
	include('./dataAccess/config.php');
?>

<h1 style='margin:auto; text-align:center;'>Register New Group</h1>

<form style='margin:auto; margin:10px; text-align:center;' method='POST' action='/dataAccess/registerGroup.php'>
	Group Name: <input style='margin-left:25px;' type='text' name='groupname'/><br/>
	Group Password: <input type='password' name='password'/><br/>
	<input type='hidden' name='action' value='register' /><br/>
	<input type='submit' value='Join Group'/>
</form>