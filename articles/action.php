<?php 
if(!isset($_SESSION)){
	session_start();
} 
class Article{

	function push_article($title, $content, $db){

		$author = $_SESSION['user'];
		$time = time();
		$sql = "INSERT INTO articles (articles_title, articles_content, articles_author, articles_data) VALUES ('$title', '$content', '$author', '$time')";
		$push = $db->prepare($sql);
		$push->execute(array($title, $content, $author, $time));
 		$push->closeCursor(); 
 		return true;
	
	}

	function update_article($id, $title, $content, $db){

		$time = time();
		$sql = "UPDATE articles 
		SET articles_title = '$title',
		articles_content = '$content',
		articles_data = '$time' WHERE id='$id' LIMIT 1";
		$push->execute(array($title, $content, $time, $id));
 		$push->closeCursor(); 
 		return true;

	}

	function current_article ($id, $db){

		$sql = "SELECT * FROM articles WHERE articles_id = '".$id."'";
		$cur=$db->query($sql);
		$cur->execute();
		$r=$cur->fetch();
		$cur->closeCursor();
		return $r;

	}

	function fetch_articles($db){

		$articles = NULL;

		$sql = "SELECT * FROM articles";

		// Loop through returned results and store as an array.
 		foreach($db->query($sql) as $row) {
 			$content = $row['articles_content'];
 			
 			//Cutting string order by 150 chars.
 			$content= mb_substr($content, 0, 154);
			$position = mb_strrpos($content, ' ', 'UTF-8');
			$content= mb_substr($content, 0, $position);

 			//Pushing cutted data in array.
 			$articles[] = array(
 				'id' => $row['articles_id'],
 				'title' => $row['articles_title'],
 				'content' => $content,
 				'author' => $row['articles_author'],
 				'data' => $row['articles_data']
 			);

 		} 
 		return $articles;

	}
	
}
