<?php
if(!isset($_SESSION)){
	session_start();
}
?> 
<div class = "auth">
<?php
if(isset($_SESSION['user'])){
	?>
	<div class="log2"><a  href="user.php?me=<?php echo $_SESSION['user']; ?>"><p class ="log_in"><?php echo $_SESSION['user']; ?></p></a>
		<a  href="log_and_reg/exit.php">Exit</a><br>
	</div>
<?php
}else{
?>
<form method="post" action="log_and_reg/controller.php">
	<p class ="log_in cent">Enter your name<br><input class="b5radius" type="text" name="log_name"></p>
	<p class ="log_in cent">Enter your password<br><input class="b5radius" type="password" name="log_pass"></p>
	<p><input  type="submit" value="Login" name="go_log" id ="go_log"> </p>
</form><?php
}
if(!isset($_SESSION['user'])){
?>
<p class="log_in cent"><a  href="log_and_reg/reg.php">Registration</a></p>
<?php
}
?>
</div> 