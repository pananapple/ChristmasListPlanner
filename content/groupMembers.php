<?php
	include('./dataAccess/config.php');
	$uid = $_SESSION['id'];
	
	if(empty($_GET['groupid'])){
		$groupselected = 0;
	}else{
		$groupselected = 1;
		$selectedgroup = $_GET['groupid'];
	}
	
?>

<div style='margin:10px;'>
	Select A Group: 
	<?php
		//Get Group Details
		$sql = "SELECT * FROM groups WHERE oid = $uid";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			$groupname = $row['name'];
			$groupid = $row['id'];
			print "<a href='./index.php?page=groupMembers&groupid=$groupid'>$groupname</a> | ";
		}
	?>
</div>

<?php
	if($groupselected){

		$sql = "SELECT * FROM groups WHERE id = $selectedgroup";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			$groupname = $row['name'];
		}
?>
		<h1><?php echo $groupname; ?> List Members</h1>
		
		<div style='color:red; margin-bottom:10px;'>
			<?php
				if($_GET['msg']==1){
					echo "Invite Sent!";
				}elseif($_GET['msg']==2){
					echo "Email already exists on list!";
				}
			?>	
		</div>
		
		<div>
<?php	
			//GET ALL GROUP MEMBERS
			$sql = "SELECT * FROM groupmembers WHERE groupid = '$selectedgroup'";
			$result = mysqli_query($con,$sql);

			
			print "<table style='margin:auto; text-align:center;'>";
			print "<tr> <td>Name</td> <td>Email</td> <td>Delete</td> </tr>";
			
			//LOOP THROUGH MEMBERS AND DISPLAY THEM
			while($row = mysqli_fetch_array($result)){
				$useremail = $row['email'];
				
				//GET USER DETAILS
				$sql1 = "SELECT * FROM userdata WHERE email = '$useremail'";
				$result1 = mysqli_query($con,$sql1);
				$row1 = mysqli_fetch_array($result1);
				
				if(empty($row1['email'])){
					$printname = "User Not Registered";
					$printemail = $row['email'];
				}else{
					$printname = $row1['name'];
					$printemail = $row1['email'];
				}
				
				print "<tr>";
				print "<td>$printname</td>";
				print "<td>$printemail</td>";
				print "<td><a href=''>delete</a></td>";
				print "</tr>";
			}
			
			print "<tr><td colspan='3'><a href='index.php?page=addMember&id=$selectedgroup'>Add List Member</a></td></tr>";
			print "</table>";
	}
?>
</div>