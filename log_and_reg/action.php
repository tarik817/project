<?php
class Auth{
	function check_data($name, $email, $connect){
		$sql="SELECT users_name FROM users WHERE users_name='$name'";
		$chek=$connect->prepare($sql);
		$chek->execute();
		$r=$chek->fetch();
		echo $r['users_names'];
	}
	function push_reg($name, $email, $pass, $connect){
		$data = time();
		$sql = "INSERT INTO users_name(users_name, users_email, users_pass, users_data) VALUES ('$name', '$email', '$pass', '$data') ";
		$push=$connect->prepare($sql);
		$push->execute($push);


	}

}
?>