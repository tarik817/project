<?php 
if(!isset($_SESSION)){session_start();} 
class Article{
	function push_article($title, $content, $db){
		$author=$_SESSION['user'];
		$time= time();
		$sql= "INSERT INTO articles (articles_title, articles_content, articles_author, articles_data) VALUES ('$title', '$content', '$author', '$time')";
		$push=$db->prepare($sql);
		$push->execute(array($title, $content, $author, $time));
 		$push->closeCursor(); 
 		return true;
	}
}