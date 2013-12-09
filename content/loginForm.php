<?php
	include('./dataAccess/config.php');
?>

</div>
<h1 style='text-align:center;'>Sign In</h1>

<div id='login_form' style='text-align:center;'>
	<div id="login_error" style='color:red; margin-bottom:10px;'>
		<?php 
			if($_GET['msg']=='1')
				echo "Wrong Username or Password.";
			elseif($_GET['msg']=='2')
				echo "Logged out.";
			elseif($_GET['msg']=='6')
				echo "Registered! Please Wait For Account Approval";
			elseif($_GET['msg']=='7')
				echo "Your account has not yet been approved.";
		?>
	</div>
	
	<form method="POST" action=<?php echo './dataAccess/login.php'; ?>>
		Name: <input type="text" name="username" size="15" style='margin-left:24px;'/><br />
		Password: <input type="password" name="password" size="15" /><br />
		<p><input type="submit" value="Login" style='width:200px; height:30px;'/></p>
	</form>
	<b>sign in</b> | <a href="index.php?page=register">register</a><!-- | <a href="index.php?page=forgot">forgot password</a>-->
	
</div>