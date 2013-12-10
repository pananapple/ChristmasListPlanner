<?php
	include('./dataAccess/config.php');
	$groupid = $_GET['id'];
?>

<h1 style='text-align:center;'>Confirm Details to Join Group!</h1>

<div style='color:red; margin-bottom:10px; text-align:center;'>
	<?php
		if($_GET['msg']==2){
			print "The Email You Entered Is Not On The Members List!";
		}elseif($_GET['msg']==1){
			print "That Group ID Does Not Exist!";
		}
	?>
</div>

<div style='text-align:center;'>
	<form method='POST' action='../dataAccess/joinGroup.php'>
		Group ID: <input type='text' name='groupid'/><br/>
		Your Email: <input type='text' name='email'/><br/>
		<input type='submit' value='Join Group'/>
	</form>
</div>