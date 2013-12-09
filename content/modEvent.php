<?php
	include('./dataAccess/config.php');
?>
<h1>Events - Add/Modify</h1>
	
	<!--CONNECT AND LOOP THROUGH DB HERE-->
	<?php
	
		//GET PASSED GIFT ID
		$eid = $_GET['eid'];
		
		//CHECK IF EID EXISTS
		if($eid != ""){
			
			//GRAB EID
			$sql = "SELECT * FROM events WHERE id=$eid";
			$result = mysqli_query($con,$sql);		
			$row = mysqli_fetch_array($result);
		}
			
		//INSERT EDIT FORM
		
	?>
		<form method="POST" action=<?php echo '../dataAccess/addModifyEvent.php'; ?>>
	<?php
		print "<table id='addmodify' style='margin:auto; text-align:left;'>
		<tr> <td>Event:</td> <td><input type='text' name='event' value='".$row['event']."'/></td></tr>
		<tr> <td>Details:</td> <td><textarea name='details' rows='6' cols='20'>".$row['details']."</textarea></td></tr>
		<tr> <td height='60px' colspan='2'><input type='submit' value='Submit' style='width:250px; height:30px;'/></td></tr>";	
	?>
		<input type='hidden' name='eid' value='<?php echo $eid; ?>'>
		</form>