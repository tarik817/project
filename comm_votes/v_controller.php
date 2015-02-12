<?php
if(isset($_POST['c_send'])){
	$topic = $_POST['topic'];
	$comment = $_POST['comment'];
	$articles_id = $_POST['articles_id'];
	$author = $_POST['c_author'];

	$res = push_comment($topic, $comment, $articles_id, $author);
	if($res){
		$redicet = $_SERVER['HTTP_REFERER'];
		header ("Location: $redicet");
	}
}




function push_comment($topic, $comment, $articles_id, $author){
	include "../inc/db.inc.php";
	//Connect to DB.
	try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}
	$time = time();
	$sql = "INSERT INTO comments (articles_id, topic, comment, author, time) VALUES ('$articles_id', '$topic', '$comment', '$author', '$time')";
	$push = $db->prepare($sql);
	$push->execute(array($articles_id, $topic, $comment, $author, $time));
 	$push->closeCursor();
 	if($push){
 		return true;
 	}else{
 		return false;
 	}
}
function fetch_comments($articles_id){
	include "inc/db.inc.php";
	//Connect to DB.
	try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}
	$sql = "SELECT * FROM comments WHERE articles_id = '$articles_id'";

		// Loop through returned results and store as an array.
	$comments = NULL;
 	foreach($db->query($sql) as $row) {
 		$topic = $row['topic'];
 		if(empty($topic)){
 			if(mb_strlen($row['comment'])>15){
 				$topic= mb_substr($row['comment'], 0, 15).'...';
			}
 		} 			
 		//Pushing cutted data in array.
 		$comments[] = array(
 			'c_id' => $row['c_id'],
 			'articles_id' => $row['articles_id'],
 			'topic' => $topic,
 			'comment' => $row['comment'],
 			'author' =>$row['author'],
 			'time' => $row['time']
 		);
		}
 		return $comments;
	}
//Vote controler part.
if(isset($_POST['vote_b'])){
	include "v_action.php";
	$v= new Vote();
	$vote=$v-> push_vote($_POST['vote'], $_SESSION['user'], $_POST['articles_id']);
			if($vote ==false){
			}
			if($vote!=0){
				$redicet = $_SERVER['HTTP_REFERER'];
				header ("Location: $redicet");
			}
}
if(isset($_POST['vote_d'])){
	include "v_action.php";
	$v= new Vote();
	$try = $v->delete_vote($_SESSION['user'], $_POST['articles_id']);
		echo $try;
		if($try == true){
			$redicet = $_SERVER['HTTP_REFERER'];
			header ("Location: $redicet");
		}
}

if(isset($_POST['vote_a_d'])){
	$del = del_all_votes($_POST['articles_id']);
	if($del == true){
			$redicet = $_SERVER['HTTP_REFERER'];
			header ("Location: $redicet");
	}
}
			
function vote_preview($articles_id){
	include "v_action.php";
	$v = new Vote();
	$try = $v->is_vote($articles_id);
	$prev['try']=$try;
	$rating = $v->vote_rating($articles_id);
	$prev['rating'] = $rating;
	return $prev;
	}
function del_all_votes($articles_id){
	include_once "../inc/db.inc.php";
	//Connect to DB.
	try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
   		die();
	}

	$sql = "DELETE FROM votes WHERE articles_id = '$articles_id'";
	
	$del = $db->prepare($sql);
	$res = $del->execute(array($articles_id,));
	if ($res) {
		return true;
	}else{
		return false;
	}
	}
	
?>