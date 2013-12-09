<?php
	include('config.php');
?>

</div>
<h1 style='text-align:center;'>Register</h1>

<div id='login_form' style='text-align:center;'>
	<div id="register_error" style='color:red; margin-bottom:10px;'>
		<?php 
			if($_GET['msg']=='15'){
				print "Username Already exists!";
			}elseif($_GET['msg']==14){
				print "Email Already exists!";
			}elseif($_GET['msg']==16){
				print "All Fields Are Required!";
			}
		?>
	</div>
	
	<form method="POST" action=<?php echo $ROOT .'dataAccess/register.php'; ?>>
		Name: <input type="text" name="username" size="15" style='margin-left:24px;'/><br />
		Password: <input type="password" name="password" size="15" /><br />
		Email: <input type="text" name="email" size="15" style='margin-left:27px;'/><br />
		<p><input type="submit" value="Register" style='width:200px; height:30px;'/></p>
	</form>
	<a href='index.php'>sign in</a> | <b>register</b><!-- | <a href="index.php?page=forgot">forgot password</a>-->
	
</div>