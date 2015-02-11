<?php
if(isset($_POST['t_check'])){
	include "../inc/db.inc.php";
	try {
			$db = new PDO("$db_info", "$db_user", "$db_pass"); 
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	if (isset($_POST['t_eng'])) {
		$sql = "SELECT * FROM lang WHERE t_eng = '$text'";
		$text = $_POST['t_eng'];
		$res = check_trans($text, $sql, $db);
	}elseif (isset($_POST['t_ua'])) {
		$sql = "SELECT * FROM lang WHERE t_ua = '$text'";
		$text = $_POST['t_ua'];
		$res = check_trans($text, $sql, $db);
	}




}
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
	$sql = "INSERT INTO lang (t_ua, t_eng) VALUES ('$t_ua', '$t_eng')";
	$l = $db->prepare($sql);
	$res = $l->execute(array($t_ua, $t_eng));
	$l->closeCursor();
	if($res){
		return true;
	}else{
		return false;
	}

}
function check_trans($text, $sql, $db){
	
	$sql = "SELECT * FROM lang WHERE t_eng = '$text'";
	$t = $db->query($sql);
	$t->execute();
	$res = $t->fetch();
	$res = $res['t_ua'];
	
	//Checking presents of translation.
	if(empty($res)){
		return $text;
	}else{
		return $res;
	}

}


?>