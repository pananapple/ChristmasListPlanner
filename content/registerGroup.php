<?php
	include('./dataAccess/config.php');
?>

<h1 style='margin:auto; text-align:center;'>Register New Group</h1>

<div style='color:red; text-align:center;'>
	<?php
		if($_GET['msg']==1){
			echo "No Spaces Allowed in Group Name.";
		}elseif($_GET['msg']==2){
			echo "Group name already exists!";
		}
	?>
</div>

<form style='margin:auto; margin:10px; text-align:center;' method='POST' action='/dataAccess/registerGroup.php'>
	Group Name: <input style='margin-left:25px;' type='text' name='groupname'/><br/>
	<input type='submit' value='Join Group'/>
</form>