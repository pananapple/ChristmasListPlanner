	<?php
	
		session_start();
		
		//CONNECT to database
		$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
		if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
		
		$sql = "SELECT * FROM userdata";
		$result = mysqli_query($con,$sql);
		
		$viewID = $_GET['viewID'];
		
	?>
	
	<div style='color:red; margin-bottom:10px;'>
		<?php
			if($_GET['msg']==8)
				print "Update Complete!";
		?>
	</div>
	
	<form method='get' action='index.php' style='margin-bottom:20px;'> 
	<select name='viewID'>
		<option value=''>Select List</option>
		
	<?php	
		while($row = mysqli_fetch_array($result)){
			if($row['id']!=$_SESSION['id'])
				print "<option value='".$row['id']."'>".$row['name']."</option>";
		}
	?>

	</select>
	<input type='hidden' name='page' value='allLists'/>
	<input type='submit' value='Show List'/>
	</form>
	
	<?php
			
		if($viewID == $_SESSION['id']){
			print "Whoops! Can't view your own list here ;)";
		}elseif($viewID!=""){
			$userresult = mysqli_query($con,"SELECT * FROM userdata WHERE id = $viewID");
			$userrow = mysqli_fetch_array($userresult);
			
			$giftresult = mysqli_query($con,"SELECT * FROM gifts WHERE uid = $viewID");
		
			print "<h1>".$userrow['name']."'s Christmas List</h1>";
			print "<table style='margin:auto; margin-top:20px; width:50%;'>";
			print "<tr style='font-weight:bold;'><td style='width:150px;'>Item</td> <td>Description</td> <td>Purchased</td></tr>";
			
			while($giftrow = mysqli_fetch_array($giftresult)){
					
				print "<tr>";
					
				if($giftrow['link'] == "")
					print "<td>".$giftrow['item']."</td>";
				else
					print "<td> <a target='_blank' href='http://".$giftrow['link']."'>".$giftrow['item']."</a></td>";
				
					
				print "<td>".$giftrow['description']."</td>";
				
				
				$giftID = $giftrow['id'];
							
				//IF NOT PURCHASED
				if(!$giftrow['purchased']){
					//SHOW PURCHASE BUTTON
					print"<td><a href='dataAccess/purchase.php?action=pur&gift=$giftID&viewID=$viewID'>Did you buy this?</a></td></tr>";
					
				//IF PURCHASED BY OTHER USER
				}elseif($giftrow['purchased'] != $_SESSION['id']){
					//SHOW PURCHASED TEXT (not button) ...link to user?
					print"<td>Yes</td></tr>";
				
				//IF PURCHASED BY CURRENT USER
				}else{
					//SHOW UNPURCHASE BUTTON
					print"<td>You bought this! <a href='dataAccess/purchase.php?action=un&gift=$giftID&viewID=$viewID'>Unbuy</a></td></tr>";
				}
			}
			
			print "<tr style='height:50px;'></tr></table>";
		}					
	?>
