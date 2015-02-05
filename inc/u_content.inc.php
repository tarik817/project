<?php

 if(isset($_SESSION['user']) && isset($_POST['elected_user'])){////ДОДАТИ ЕЛЕКТЕД ЮСЕРА

	include_once "users/u_controler.php";

	$user = $_SESSION['user'];
	$obj = new GetUser();
	$res = $obj->expres_u($user);

	///додати виведення аватарки за замовчуванням!/////////
	?>
<div>
	<p>Nik-name<br><?php echo $res['users_name']; ?></p><br>
	<p>First name<br><?php echo $res['u_fir_name']; ?></p><br>
	<p>Second name<br><?php echo $res['u_sec_name']; ?></p><br>
	<p>E-mail<br><?php echo $res['users_email']; ?></p><br>
	<p>Password<br><?php echo $res['users_pass'];?></p><br>
	<p>Repeat passwod<br><?php echo $res['users_pass'];?></p><br>
	<p>Avatar<br><?php echo $res['u_img']; ?><br></p>

</div>

<?php

}
elseif(isset($_SESSION['user'])){
	include_once "users/u_controler.php";

	$user = $_SESSION['user'];
	$obj = new GetUser();
	$res = $obj->expres_u($user);

///додати виведення аватарки за замовчуванням!/////////
///додати перевірку для пароля//////
?>
<form method ="post" action ="users/u_controler.php"> 
	<p>Nik-name<br><?php echo $res['users_name']; ?></p><br>
	<input type="hidden" value="<?php echo $res['users_name']; ?>" name="users_name">
	<p>First name<br><input type="text" value="<?php echo $res['u_fir_name']; ?>" name="u_fir_name" size="50"></p><br>
	<p>Second name<br><input type="text" value="<?php echo $res['u_sec_name']; ?>" name="u_sec_name" size="50"></p><br>
	<p>E-mail<br><input type="text" value="<?php echo $res['users_email']; ?>" name="u_email" size="50"></p><br>
	<p>New password<br><input type="password" value="<?php echo $res['users_pass'];?>" name="u_pass" size="40"></p><br>
	<p>Repeat passwod<br><input type="password" value="<?php echo $res['users_pass'];?>" name="u_r_pas" size="40"></p><br>
	<p>Avatar<br><?php echo $res['u_img']; ?><br><input type="file" name="u_img" accept="image/jpeg,image/png,image/gif" ></p><br>
	<p><input type="submit" value="Update" name="u_user"></p><br>
</form>

<?php 

}


else{

	header( "Location: index.php");
}

?>