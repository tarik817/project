<?php
/*
Function for get translete text of the DB.
*/
function t($text){
	//Languege marker.
	if(isset($_SESSION['lang'])){
		//Conect to DB.
		include "inc/db.inc.php";
		try {
			$db = new PDO("$db_info", "$db_user", "$db_pass"); 
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
		if($_SESSION['lang'] == 'ua'){
			//Get UA translation.
			$sql = "SELECT t_ua FROM lang WHERE t_eng = '$text'";
			$t = $db->query($sql);
			$t->execute();
			$res = $t->fetch();
			$res = $res['t_ua'];
			//Checking presenting of translation.
			if(empty($res)){
				echo $text;
			}else{
				echo $res;
			}
		}else{
			echo $text;
		}
	}else{
		echo $text;
	}

}