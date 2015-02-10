<?php
if (isset($_POST['u_user'])){
 
 $name = $_POST['users_name'];
 $fir_name = $_POST['u_fir_name'];
 $sec_name = $_POST['u_sec_name'];
 $email = $_POST['u_email'];
 $pass = $_POST['u_pass'];
 $r_pass = $_POST['u_r_pas'];
 if(isset($_POST['u_img'])){
 $u_img = $_POST['u_img'];
 }
 $u_position = $_POST['u_position'];


	if ($pass != $r_pass) {
	
		exit("Your passwords don't match.");
	
	}
	
	if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i",$email))
	
	{
	
		exit ("Wrong format of e-mail.");
		
	}else{
		

		$obj = new GetUser();
		$res = $obj->update_user($name, $fir_name, $sec_name, $email, $pass, $u_img = 0 , $u_position);

	}

}

class GetUser{
	

	function update_user($name, $fir_name, $sec_name, $email, $pass, $u_img, $u_position){
		include_once "../inc/db.inc.php";

		try {

		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
		
		} catch (PDOException $e) {
		
		print "Error!: " . $e->getMessage() . "<br/>";
    die();
		
		}

		include_once "../users/u_action.php";
		$obj = new User();
		$res = $obj->update($name, $fir_name, $sec_name, $email, $pass, $u_img, $u_position, $db);
		if($res){
			header("Location: ../user.php?id=$name");
		}

		
	}
	function expres_u($name){
		include "inc/db.inc.php";
		include_once "users/u_action.php";
		
		try {

			$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
		
		} catch (PDOException $e) {
		
			print "Error!: " . $e->getMessage() . "<br/>";
    	die();
		
		}
		
		$obj = new User();
		$res = $obj->get_user($name, $db);

		return $res;

	}
	function expres_users(){

		include_once "u_action.php";
		include "inc/db.inc.php";
		
		//Connect to DB.
		try {

			$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
		
		} catch (PDOException $e) {

			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		
		}
		$obj = NULL;
		$obj = new User();
		$users = $obj->fetch_users($db);
		return $users;
	}
	
	function check_acses($name){
		include "inc/db.inc.php";
		include_once "users/u_action.php";

		try {
		
			$db = new PDO ("$db_info", "$db_user", "$db_pass"); 

			$obj = new User();
			$res = $obj->acses($name, $db);

			return $res;
					
		} catch (PDOException $e) {
		
			print "Error!: " . $e->getMessage() . "<br/>";
    	die();
		
		}


	}
}

?>

