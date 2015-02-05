<?php
class Auth{
	function check_data($name, $email, $db){
		
		$sql="SELECT users_name FROM users WHERE users_name='$name'";
		$chek=$db->query($sql);
		$chek->execute();
		$r=$chek->fetch();
		$chek->closeCursor();
		if(!empty($r['users_name'])){

			$check = "u";
			return $check;
		
		}

		$sql = "SELECT users_email FROM users WHERE users_email='$email'";
		$chek = $db->query($sql);
		$chek->execute();
		$r = $chek->fetch();
		$chek->closeCursor();
		if(!empty($r['users_email'])){
			$check = "e";
			return $check;
		}
	}
	function push_reg($name, $email, $pass, $db){
		$data = time();
		$sql = "INSERT INTO users (users_name, users_email, users_pass, users_data) VALUES ('$name', '$email', '$pass', '$data') ";
		$push = $db->prepare($sql);
		$push->execute(array($name, $email, $pass, $data));
 		$push->closeCursor(); 
	}
	function log_in($name, $pass, $db){
		$sql = "SELECT * FROM users WHERE users_name= '".$name."'";
		$log = $db->query($sql);
		$log->execute();
		$r = $log->fetch();
		if($r['users_pass'] == md5($pass)){
			return true;
		}else{
			return false;
		}
		$chek->closeCursor();
	
	}

}
?>