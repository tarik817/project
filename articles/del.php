<?php
if(isset($_GET['id'])&& is_numeric($_GET['id'])){

	$id = $_GET['id'];
	$d = del($id);
	header( "Location: .." );

}

function del($id){
	include_once "../inc/db.inc.php";

	//Connect to DB.
	try {

			$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
		
		} catch (PDOException $e) {
		
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}

	$sql = "DELETE FROM articles WHERE articles_id = $id LIMIT 1";
	
	$del = $db->prepare($sql);
	$del->execute();

}
?>