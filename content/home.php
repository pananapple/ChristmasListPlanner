<?php
	include('./dataAccess/config.php');
	echo "<h1>Welcome ".$_SESSION['name']."!!</h1>";
?>


<div style='margin:auto; text-align:center; width:50%'>
<p style='text-align:left;'>
	<b>My List</b></br>
	Have you completed your Christmas List yet? Click on the "My List" link above to get started! Once you have added 
	items to your list, others will be able to view them! You can always go back and edit an item if you need to. Add
	as much detail as you would like. If you have a link to the item you want, be sure to include it!
</p>

<p style='text-align:left;'>
	<b>All Lists</b></br>
	On this page you are able to select a user and view their Christmas List. At their Christmas List, you can
	view if someone has already purchased an item, or you can mark it to show that you have purchased it. The 
	owner of the list can not see if anyone has purchased anything.
</p>

<p style='text-align:left;'>
	<b>My Purchases</b></br>
	This page allows you to view a list of what you've already purchased out of the lists.
</p>

<p style='text-align:left;'>
	<b>Events</b></br>
	Have an idea for a fun activity for us to do? Add it to this list! Make sure to vote if you want to attend
	any of the events already listed (and your own as well!). Voting on events can help choose what we do.
</p>

<p style='text-align:left;'>
	<b>Ideas?</b></br>
	Let me know if there's anything else you would like to see on here! Food, movies...etc
</p>
</div>

	