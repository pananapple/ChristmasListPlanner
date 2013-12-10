<?php
	include('./dataAccess/config.php');
	$groupid = $_GET['id'];
?>

<h1>Invite Group Member</h1>

<div style='margin-bottom:10px;'>
	Enter the email address of the person you would like to invite to join your group list!
</div>

<form method='post' action="../dataAccess/addMember.php">
	Email Address: <input type='text' name='email'>
	<input type='hidden' name='groupid' value='<?php echo $groupid; ?>'>
	<input type='submit' value='Invite!'>
</form>