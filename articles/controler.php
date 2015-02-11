<?php
if (!isset($_SESSION)) {

	session_start();

}

if(isset($_POST['add_article']) && isset($_POST['update']) && is_numeric($_POST['update'])){

	include_once "action.php";
	include_once "../inc/db.inc.php";

	$id = $_POST['update'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$title_ua = $_POST['title_ua'];
	$content_ua = $_POST['content_ua'];
	
	//Sanitizing data.
	$title = htmlspecialchars ($title);
	$content = htmlspecialchars ($content);
	
	//Connect to DB.
	try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}

	$obj = new Article();
	$res = $obj->update_article($id, $title, $content, $title_ua, $content_ua, $db);

	if ($res == true) {
  
		header("Location: ../");
		

	} else {
		exit("aa");
	}

} 

elseif (isset($_POST['add_article'])) {

	include_once "action.php";
	include_once "../inc/db.inc.php";

	$title = $_POST['title'];
	$content = $_POST['content'];
	$title_ua = $_POST['title_ua'];
	$content_ua = $_POST['content_ua'];
	
	//Sanitizing data.
	$title = htmlspecialchars ($title);
	$content = htmlspecialchars ($content);
	
	//Connect to DB.
	try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}

	$obj = new Article();
	$res = $obj->push_article($title, $content, $title_ua, $content_ua, $db);
	
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
		include "inc/db.inc.php";
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

		include_once "action.php";
		include "inc/db.inc.php";
		
		//Connect to DB.
		try {

			$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
		
		} catch (PDOException $e) {

			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		
		}
		
		$obj = new Article();
		$articles = $obj->fetch_articles($db);
		return $articles;

	}

}