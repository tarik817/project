<?php
include_once "db.inc.php";


try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 


		$sql = "UPDATE articles 
		SET articles_title = '221',
		articles_content = '1',
		articles_data = '1' 
		WHERE articles_id = '1'";
		/*
		$push = $db->	prepare($sql);
		$push->bindValue(":title", $title);
		$push->bindValue(":content", $content);
		$push->bindValue(":time", $title);
		$push->bindValue(":id", $id);
		*/
		$push = $db->	prepare($sql);
		$push->execute();

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}