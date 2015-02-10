<?php
if(isset($_SESSION['user'])){
include_once "users/u_controler.php";
	$obj = new GetUser();
	$position = $obj->check_acses($_SESSION['user']);
}

//Display user.
 if(isset($_GET['me']) and isset($_SESSION['user'])){
 	include_once "users/u_controler.php";

	$user = $_SESSION['user'];
	$obj = new GetUser();
	$res = $obj->expres_u($user);
	$position = $obj->check_acses($user);

	if(!empty($res['u_img'])){
		$img = $res['u_img'];
	}else{
		$src = "img/def.png";
		$img ="No avatar yet.";
	}

	?>
<div>
	<p>Nik-name<br><?php echo $res['users_name']; ?></p><br>
	<p>Position<br><?php echo $position; ?></p><br>
	<p>First name<br><?php echo $res['u_fir_name']; ?></p><br>
	<p>Second name<br><?php echo $res['u_sec_name']; ?></p><br>
	<p>E-mail<br><?php echo $res['users_email']; ?></p><br>
	<p>Avatar<br><img src="<?php echo "$src"?>" /><br><?php echo $img; ?><br></p>
	<a href="user.php?ed=<?php echo $res['users_name']?>">Edite proffile</a>

</div>

<?php
 exit();
 }
 //Display list of users.
 if(isset($_GET['display'])){
 	include_once("users/u_controler.php");
	$obj = new GetUser();
	$res = $obj->expres_users();
	if (!empty($res)){
	//Loop through each entry.
 	foreach($res as $entry) {
 		$position = $obj->check_acses($entry['users_name']);

	?>

 	<div class = "articles">
 	<p>
 			<div><p>Nickname:<br><?php echo $entry['users_name'] ?></p></div>
 			<div><p>Position<br><?php echo "$position"; ?></p><br></div>
 			<div><p>Дата реєстрації:<br> <?php echo date('F j, Y, g:i a',$entry['users_data']) ?></p></div>
			<div><p>Last Log in:<br> <?php echo date('F j, Y, g:i a',$entry['u_log']) ?></p></div>
			<p><a class="bott" href="?id=<?php echo $entry['users_name'] ?>">View user information</a></p>
			<?php
			if(isset($_SESSION['admin'])){
			?>
			<div class ="u_del">
				<p class = "bott" ><a  href="user.php?ed=<?php echo $entry['users_name'] ?>">Etite</a></p>
				<p class = "bott"><a href="users/u_del.php?del=<?php echo $entry['users_id'] ?>">Delete</a></p>
			</div>
			<?php
			}
			?>
			
	</p><br>
 	</div>
 	<?php

 	}
 }else{
 	exit("something go wrong..");
 }
 exit();
}


 //Display chosen user.
 if(isset($_GET['id'])){

	include_once "users/u_controler.php";

	$id = $_GET['id'];
	$obj = new GetUser();
	$res = $obj->expres_u($id);
	$position = $obj->check_acses($res['users_name']);

	if(!empty($res['u_img'])){
		$img = $res['u_img'];
	}else{
		$src = "img\def.png";
		$img ="No avatar yet.";
	}

	?>
<div>
	<p>Nik-name<br><?php echo $res['users_name']; ?></p><br>
	<p>Position<br><?php echo "$position"; ?></p><br>
	<p>First name<br><?php echo $res['u_fir_name']; ?></p><br>
	<p>Second name<br><?php echo $res['u_sec_name']; ?></p><br>
	<?php 
	if(isset($_SESSION['user'])){
	?>
	<p>E-mail<br><?php echo $res['users_email']; ?></p><br>
	<?php 
	}
	?>

	<p>Avatar<br><img src="<?php echo "$src"?>" /><br><?php echo $img; ?><br></p>

</div>

<?php

}
//Edite current user.
elseif(isset($_SESSION['user']) and isset($_GET['ed']) and $_SESSION['user'] == $_GET['ed'] || isset($_SESSION['admin'])  && !isset($_SESSION['anonim'])){
	include_once "users/u_controler.php";

	$user = $_GET['ed'];
	$obj = new GetUser();
	$res = $obj->expres_u($user);
	$position = $obj->check_acses($user);

	if(!empty($res['u_img'])){
		$img = $res['u_img'];
	}else{
		$img ="No avatar yet.";
	}

///додати перевірку для пароля//////
?>
<form method ="post" action ="users/u_controler.php"> 
	<p>Nik-name<br><?php echo $res['users_name']; ?></p><br>
	<input type="hidden" value="<?php echo $res['users_name']; ?>" name="users_name">
	<?php
	if(isset($_SESSION['admin'])){
	?>
		<div><p>Current position:<br>
			<select name ="u_position">
				<option disabled><?php echo $position; ?></option>
				<option value ="1">User</option>
				<option value ="2">Editor</option>
				<option value ="3">Administrator</option>
				<option value ="5">Blocked</option>
				<option value ="4">Anonim user</option>
			</select></p><br>
		</div>
<?php 
	}
	?>
	<p>First name<br><input type="text" value="<?php echo $res['u_fir_name']; ?>" name="u_fir_name" size="50"></p><br>
	<p>Second name<br><input type="text" value="<?php echo $res['u_sec_name']; ?>" name="u_sec_name" size="50"></p><br>
	<p>E-mail<br><input type="text" value="<?php echo $res['users_email']; ?>" name="u_email" size="50"></p><br>
	<?php 
	if($_SESSION['user'] == $res['users_name']){
	?>
	<p>New password<br><input type="password" value="<?php echo $res['users_pass']; ?>" name="u_pass" size="40"></p><br>
	<p>Repeat passwod<br><input type="password" value="<?php echo $res['users_pass']; ?>" name="u_r_pas" size="40"></p><br>
	<?php
	}
	?>
	<p>Avatar<br><?php echo $img; ?><br><input type="file" name="u_img" accept="image/jpeg,image/png,image/gif" ></p><br>
	<p><input type="submit" value="Update" name="u_user"></p><br>
</form>

<?php 

}


else{

	header( "Location: index.php");
}



?>