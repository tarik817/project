<?php
if(!isset($_SESSION)){
	session_start();
}
?> 
<div>
<?php
if(isset($_SESSION['user'])){
	?>
	<a href="user.php?me=1"><p><?php echo $_SESSION["user"]; ?></p></a>
		<a class="bott" href="log_and_reg/exit.php">Exit</a><br>
<?php
}else{
?>
<form method="post" action="log_and_reg/controller.php">
	<p>Enter your name<br><input type="text" name="log_name"></p>
	<p>Enter your password<br><input type="password" name="log_pass"></p>
	<p><input type="submit" value="Login" name="go_log"> </p>
</form><?php
}
?>
<a class="bott" href="log_and_reg/reg.php">Registration</a>
</div> 