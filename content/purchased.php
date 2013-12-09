<?php
	include('./dataAccess/config.php');
	$uid = $_SESSION['id'];
?>

<h1 style='text-align:center;'>My Purchases</h1>

<div style='margin:auto; text-align:center;'>
<?php 
		
		//CONNECT to database
		$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
		if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
		
		$sql = "SELECT * FROM userdata";
		$result = mysqli_query($con,$sql);
		
		
		//LOOP THROUGH EACH USER (excluding logged in user)
		while($row = mysqli_fetch_array($result)){
						
			//MAKE SURE NOT TO LIST LOGGED IN USER'S NAME
			if($row['id']!=$uid){
				$count = 0;
				$user = $row['id'];
				
				//LIST SELECTED USER'S NAME
				print "<b>".$row['name']."</b></br>";
				
				//LOOP THROUGH GIFTS	
				$giftsql = "SELECT * FROM gifts WHERE purchased = $uid AND uid = $user";
				$giftresult = mysqli_query($con,$giftsql);
				
				//LIST GIFTS PURCHASED BY LOGGED IN USER FOR CURRENT USER
				while($giftrow = mysqli_fetch_array($giftresult)){					
					print $giftrow['item']."</br>";
					++$count;
				}
				
				//IF NO GIFTS PURCHASED FOR SELECTED USER, DISPLAY MSG
				if($count == 0){
					print "No Gifts :( <br/>";
				}
				
				print "</br>";
			}
		}	
	
?>	
</div>