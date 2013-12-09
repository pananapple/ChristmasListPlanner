<?php	
	include('config.php');
	
	//GET PASSED GIFT ID
	$uid = $_SESSION['id'];
	$eid = $_GET['eid'];
	$vote = $_GET['vote'];
		
	//TEST IF VOTE ALREADY EXISTS
	$sql = "SELECT id FROM votes WHERE eid = $eid AND uid = $uid";
	$result = mysqli_query($con,$sql);
	$count = 0;
	
	while($row = mysqli_fetch_array($result))
		++$count;

	//IF NO VOTE CREATE NEW
	if($count ==0){
		$sql = "INSERT INTO votes (eid, uid, vote) VALUES ($eid, $uid, $vote)";
		mysqli_query($con,$sql);
		
	}else{
	
	//IF VOTE EXISTS UPDATE VOTE
		$sql = "UPDATE votes SET vote = $vote WHERE eid = $eid AND uid = $uid";
		mysqli_query($con,$sql);
	}
	
	
	//REDIRECT
	header("Location: ../index.php?page=events&msg=11");
	die();
	
?>