<?php

if (isset($_POST['t_send'])) {
	include "../inc/db.inc.php";
	try {
			$db = new PDO("$db_info", "$db_user", "$db_pass"); 
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	$res = add_trans($_POST['t_ua_menu'], $_POST['t_eng_menu'], $db);
	if ($res) {
		header("Location: ../lang.php");
	}
}



function add_trans($t_ua, $t_eng, $db){
	$sql = 
	"UPDATE lang 
		SET t_ua ='$t_ua'
		WHERE t_eng = '$t_eng'";
	$l = $db->prepare($sql);
	$res = $l->execute(array($t_ua, $t_eng));
	$l->closeCursor();
	if($res){
		return true;
	}else{
		return false;
	}

}

?>