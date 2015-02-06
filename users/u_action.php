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
	function fetch_users($db){
		$users = NULL;

		$sql = "SELECT * FROM users";

		// Loop through returned results and store as an array.
 		foreach($db->query($sql) as $row) {

 			//Pushing cutted data in array.
 			$users[] = array(
 				'users_id' => $row['users_id'],
 				'users_name' => $row['users_name'],
 				'users_email' => $row['users_email'],
 				'users_pass' => $row['users_pass'],
 				'users_data' => $row['users_data'],
 				'u_fir_name' => $row['u_fir_name'],
 				'u_sec_name' => $row['u_sec_name'],
 				'u_img' => $row['u_img'],
 				'u_log' => $row['u_log']
 			);

 		} 
 		return $users;

	}

}