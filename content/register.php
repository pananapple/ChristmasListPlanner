<?php
	include('./dataAccess/config.php');
?>

</div>
<h1 style='text-align:center;'>Register</h1>

<div id='login_form' style='text-align:center;'>
	<div id="register_error" style='color:red; margin-bottom:10px;'>
		<?php 
			if($_GET['msg']==15){
				print "Username Already exists!";
			}elseif($_GET['msg']==14){
				print "Email Already exists!";
			}elseif($_GET['msg']==16){
				print "All Fields Are Required!";
			}elseif($_GET['msg']==17){
				print "not a real email!";
			}elseif($_GET['msg']==18){
				print "Only letters and numbers are allowed in username!";
			}elseif($_GET['msg']==19){
				print "Password must be 8 chars long, include a number and have 1 upper and lower case letter";
			}
		?>
	</div>
	
	<form method="POST" action=<?php echo $ROOT .'dataAccess/register.php'; ?>>
		User Name: <input type="text" name="username" size="15"/><br />
		Password: <input type="password" name="password" size="15" /><br />
		Email: <input type="text" name="email" size="15" style='margin-left:27px;'/><br />
		<p><input type="submit" value="Register" style='width:200px; height:30px;'/></p>
	</form>
	<a href='index.php'>sign in</a> | <b>register</b><!-- | <a href="index.php?page=forgot">forgot password</a>-->
	
</div>