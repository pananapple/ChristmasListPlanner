
<h1>Event Ideas</h1>

<div style='margin:20px; color:red;'>
	<?php
		if($_GET['msg']==4){
			echo "Item Updated!";
		}elseif($_GET['msg']==5){
			echo "Item Added!";
		}elseif($_GET['msg']==11){
			echo "Vote Updated!";
		}elseif($_GET['msg']==12){
			echo "Event Updated!";
		}elseif($_GET['msg']==13){
			echo "Event Added!";
		}
		
	?>
</div>

<table style='margin:auto; width:50%;'>
	<tr style='font-weight:bold;'>
		<td style='width:150px;'>Event</td><td>Details</td><td>Yes Votes</td><td>No Votes</td><td>Not Voted</td><td>Vote</td><td>Edit Event</td>
	</tr>
	
	<!--CONNECT AND LOOP THROUGH DB HERE-->
	<?php
		
		//CONNECT to database
		$con = mysqli_connect("db504957107.db.1and1.com","dbo504957107","dbo504957107","db504957107");
		if (mysqli_connect_errno()){echo "Unable to connect to database!!";}
		
		//GRAB EVENTS
		$sql = "SELECT * FROM events";
		$result = mysqli_query($con,$sql);
		
		while($row = mysqli_fetch_array($result)){
			$eid = $row['id'];
			
			//GRAB USER COUNT
			$countsql = "SELECT * FROM userdata";
			$countresult = mysqli_query($con,$countsql);
			$usercount = 0;
			while($countrow = mysqli_fetch_array($countresult)){
				++$usercount;
			}
			
			//GRAB VOTES FOR SELECTED EVENT (AND CHECK IF USER HAS VOTED YET)
			$votessql = "SELECT * FROM votes WHERE eid=$eid";
			$votesresult = mysqli_query($con,$votessql);
			$yes = 0;
			$no = 0;
			$uservote = 3;
			
			while($votesrow = mysqli_fetch_array($votesresult)){
					
				if($votesrow['uid']==$_SESSION['id'])
					$uservote = $votesrow['vote'];			
					
				if($votesrow['vote']==1)
					++$yes;
				else
					++$no;
			}
			
			//CALC NUMBER OF USERS WHO HAVE NOT YET VOTED
			$novote = $usercount - ($yes+$no);
			
			print "<tr>
			<td>".$row['event']."</td>
			<td>".$row['details']."</td>
			<td>$yes</td>
			<td>$no</td>
			<td>$novote</td>";
			
			//TOGGLE IF USER ALREADY VOTED OR HAS NOT YET VOTED
			if($uservote == 1){
				print "<td><b>For</b> | <a href='dataAccess/vote.php?eid=$eid&vote=0'>Against</a></td>";
				$uservote = 0;
			}elseif($uservote == 3){
				print "<td><a href='dataAccess/vote.php?eid=$eid&vote=1'>For</a> | <a href='dataAccess/vote.php?eid=$eid&vote=0'>Against</a></td>";
			}elseif($uservote == 0){
				print "<td><a href='dataAccess/vote.php?eid=$eid&vote=1'>For</a> | <b>Against</b></td>";
			}else{
				print "<td>USERVOTE: $uservote</td>";	
			}	

			print"<td><a href='index.php?page=modEvent&eid=$eid'>edit</a></td></tr>";
		}	
	?>
	
	<tr><td style='height:40px;' colspan="7"><a href='index.php?page=modEvent'>Add Item</a></td></tr>
	
</table>
