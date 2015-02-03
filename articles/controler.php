<?php
if (!isset($_SESSION)) {
	session_start();
} 
if (isset($_POST['add_article'])) {
	include_once "action.php";
	include_once "../inc/db.inc.php";
	$title = $_POST['title'];
	$content = $_POST['content'];
	//Sanitizing data.
	$title = htmlspecialchars ($title);
	$content = htmlspecialchars ($content);
	try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}
	$obj = new Article();
	$res = $obj->push_article($title, $content, $db);
	if ($res == true) {
		$id_obj = $db->query("SELECT LAST_INSERT_ID()");
 		$id = $id_obj->fetch();
 		$id_obj->closeCursor(); 
		header("Location: ../?id=".$id[0]);
		exit(); 
	}
}
class Control{
	function expres($id){
		include_once "action.php";
		include_once "inc/db.inc.php";
		try {
			$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
		$obj = new Article();
		$res = $obj->current_article($id, $db);
		return $res;
	}
	function expres_all(){
		include_once "inc/db.inc.php";
		include_once "action.php";
		try {
			$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
		$obj = new Article();
		$res = $obj->fetch_articles($db);
		return $res;
	}

}