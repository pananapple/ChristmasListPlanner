
<h1>My Christmas List</h1>

<div style='margin:20px; color:red;'>
	<?php
		if($_GET['msg']==4){
			echo "Item Updated!";
		}elseif($_GET['msg']==5){
			echo "Item Added!";
		}
	?>
</div>

<table style='margin:auto; width:50%;'>
	<tr style='font-weight:bold;'>
		<td style='width:150px;'>Item</td><td>Description</td><td style='width:50px;'>Edit</td>
	</tr>
	
	<!--CONNECT AND LOOP THROUGH DB HERE-->
	<?php
		
		//CONNECT to database
		$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
		if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
		
		$sql = "SELECT * FROM gifts WHERE uid = '".$_SESSION['id']."'";
		$result = mysqli_query($con,$sql);
		$count  = mysqli_num_rows($result);
		
		while($row = mysqli_fetch_array($result)){
			print "<tr>";
			
			if($row['link'] == "")
					print "<td>".$row['item']."</td>";
				else
					print "<td> <a target='_blank' href='http://".$row['link']."'>".$row['item']."</a></td>";
				
			print "<td>".$row['description']."</td>
			<td> <a href='index.php?page=mod&mod=".$row['id']."'>edit</a> </td>
			</tr>";
		}	
	?>
	
	<tr><td style='height:40px;' colspan="5"><a href='index.php?page=mod'>Add Item</a></td></tr>
	
</table>
