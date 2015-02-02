<?php
if(!isset($_SESSION)){session_start();}
?> 
<div>
<?php
if(isset($_SESSION["user"])){
	?>
	<p>Hello <?php echo $_SESSION["user"]; ?></p>
	<a href="exit.php">Exit</a><br>
<?php
}else{
?>
<form method="post" action="log_and_reg/controller.php">
	<p>Enter your name<br><input type="text" id="log_name"></p>
	<p>Enter your password<br><input type="password" id="log_pass"></p>
	<p><input type="submit" value="Login" id="go_log"> </p>
</form><?php
}
?>
<a href="log_and_reg/reg.php">Registration</a>
</div> 