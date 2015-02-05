<?php

class User{	
	function get_user ($name, $db){

		$sql = "SELECT * FROM users WHERE users_name = '".$name."'";
		$res=$db->query($sql);
		$res->execute();
		$r=$res->fetch();
		$res->closeCursor();
		return $r;

	}
	
	function push(){

	}
}