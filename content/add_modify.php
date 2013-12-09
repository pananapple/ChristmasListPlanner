<?php
	include('./dataAccess/config.php');
?>

<h1>My Christmas List - Edit Item</h1>

	<div style='text-align:center; margin-bottom:10px;'>
		NOTE: If you choose to include a link, make sure to leave <br/>out the "http" or "https" part of the link.
	</div>
	
	<!--CONNECT AND LOOP THROUGH DB HERE-->
	<?php
	
		//GET PASSED GIFT ID
		$MODGID = $_GET['mod'];
		
		$sql = "SELECT * FROM gifts WHERE id = '".$MODGID."'";
		$result = mysqli_query($con,$sql);
		$count  = mysqli_num_rows($result);
		
		$row = mysqli_fetch_array($result);
			
		//INSERT EDIT FORM
		
		//include gid in form
	?>
		<form method="POST" action=<?php echo $ROOT .'dataAccess/addModifyItem.php'; ?>>
	<?php
		print "<table id='addmodify' style='margin:auto; text-align:left;'>
		<tr> <td style='text-align:right;'>Item:</td> <td><input type='text' name='item' value='".$row['item']."'/></td></tr>
		<tr> <td style='text-align:right;'>Description:</td> <td><textarea name='description' rows='6' cols='20'>".$row['description']."</textarea></td></tr>
		<tr> <td style='text-align:right;'>Link: </td> <td>http://<input type='text' name='link' value='".$row['link']."'/></td></tr>
		<tr> <td height='60px' colspan='2'><input type='submit' value='Submit' style='width:250px; height:30px;'/></td></tr>";	
	?>
		<input type='hidden' name='gid' value='<?php echo $MODGID; ?>'>
		</form>