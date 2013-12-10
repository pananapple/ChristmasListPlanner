<?php
	include('./dataAccess/config.php');
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Christmas Planner</title>
		<style type="text/css">
			body{}
		
			a:link {text-decoration:none; color:green;}
			a:visited {text-decoration:none; color:green;}
			a:hover {text-decoration:underline; color:red;}
			a:active {text-decoration:none; color:green;}
			
			#title {font-size:80px; text-align:center; margin-bottom:20px;}
			#header {background-color:white;}
			
			
			tr:nth-child(even)	{background-color: #F0F0F0}
			tr:nth-child(odd)	{background-color: #FFFFFF}
			tr:first-child		{background-color: black; color:white;}
			tr:last-child		{background-color: #FFFFFF}
			
			#addmodify tr:nth-child(even)	{background-color: #FFFFFF}
			#addmodify tr:nth-child(odd)	{background-color: #FFFFFF}
			#addmodify tr:first-child		{background-color: #FFFFFF; color:black}
			#addmodify tr:last-child		{background-color: #FFFFFF}
			
			table {border-collapse: collapse;}
			th, td {padding: 4px;}
			
		</style>
	</head>

	<body style='margin:0; text-align;center;'>
		<div id='header'>
			<div id='title'>
				<span style="color:red">Christmas</span><span style="color:green">Planner</span>
			</div>
			
			<div id='msgs' style='text-align:center; color:red; margin-bottom:10px;'>
				<?php
					if($_GET['msg']==10){
						print "User has been approved!";
					}elseif($_GET['msg']==11){
						print "You have been confirmed! Login or Register to continue.";
					}
					
				?>
			</div>

		<?php
						
			if($_SESSION['loggedin']!=1){
		print "</div>";
				//Display Login Form
				if($_GET['page']=='register'){
					include('content/register.php');
				}elseif($_GET['page']=='joinGroup'){
					include('content/joinGroup.php');
				}else{
					include('content/loginForm.php');
				}
				
				//OR DISPLAY SELECTED PAGE CONTENT
			}else{
				print "
				<div id='navbar' style='text-align:center; color:black;'>
					<a href='index.php'>Home</a> | 
					<a href='index.php?page=myList'>My List</a> | 
					<a href='index.php?page=allLists'>All Lists</a> | 
					<a href='index.php?page=purchased'>My Purchases</a> | 
					<a href='index.php?page=events'>Events</a> | ";
					if($groupowner){echo "<a href='index.php?page=groupMembers'>Members List</a> | ";}
					print "<a href='dataAccess/logout.php'>Logout</a> | ";
				print "</div><br/>";
			print "</div>";
				print "<div id='page_content' style='text-align:center;'>";
					
					if($_GET['page']=='myList'){
						include('content/myList.php');
					}elseif($_GET['page']=='allLists'){
						include('content/allLists.php');
					}elseif($_GET['page']=='mod'){
						include('content/add_modify.php');
					}elseif($_GET['page']=='events'){
						include('content/eventsList.php');
					}elseif($_GET['page']=='modEvent'){
						include('content/modEvent.php');
					}elseif($_GET['page']=='purchased'){
						include('content/purchased.php');
					}elseif($_GET['page']=='registerGroup'){
						include('content/registerGroup.php');
					}elseif($_GET['page']=='groupMembers'){
						include('content/groupMembers.php');
					}elseif($_GET['page']=='addMember'){
						include('content/addMember.php');
					}else{
						include('content/home.php');
					}
					
				print "</div>";
			}
		?>
		
	</body>
</html>