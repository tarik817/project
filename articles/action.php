<?php 
if(!isset($_SESSION)){
	session_start();
} 
class Article{

	function push_article($title, $content, $title_ua, $content_ua, $db){

		$author = $_SESSION['user'];
		$time = time();
		$sql = "INSERT INTO articles (articles_title, articles_content, articles_title_ua, articles_content_ua, articles_author, articles_data) VALUES ('$title', '$content', '$title_ua', '$content_ua', '$author', '$time')";
		$push = $db->prepare($sql);
		$push->execute(array($title, $content, $title_ua, $content_ua, $author, $time));
 		$push->closeCursor(); 
 		return true;
	
	}
	function update_article($id, $title, $content, $title_ua, $content_ua, $db){

		$time = time();

		$sql = "UPDATE articles 
		SET articles_title = '$title',
		articles_content = '$content',
		articles_title_ua = '$title_ua',
		articles_content_ua = '$content_ua',
		articles_data = '$time' 
		WHERE articles_id = '$id'";

		$push = $db->prepare($sql);
		$res = $push->execute(array($title, $content, $title_ua, $content_ua, $time));
 		$push->closeCursor();
 	
 		if($res == true){
 			return true;
 		}else{
 			return false;
 		}
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
 			$content_ua = $row['articles_content_ua'];
 			
 			//Cutting string order by 150 chars.
 			if(mb_strlen($content)>150){

 				$content= mb_substr($content, 0, 154);
				$position = mb_strrpos($content, ' ', 'UTF-8');
				$content= mb_substr($content, 0, $position);

			}
			if(mb_strlen($content_ua)>150){

 				$content_ua= mb_substr($content_ua, 0, 154);
				$position = mb_strrpos($content_ua, ' ', 'UTF-8');
				$content_ua= mb_substr($content_ua, 0, $position);

			}

 			//Pushing cutted data in array.
 			$articles[] = array(
 				'articles_id' => $row['articles_id'],
 				'articles_title' => $row['articles_title'],
 				'articles_content' => $content,
 				'articles_title_ua' => $row['articles_title_ua'],
 				'articles_content_ua' =>$content_ua,
 				'articles_author' => $row['articles_author'],
 				'articles_data' => $row['articles_data']
 			);

 		} 
 		return $articles;

	}
	
}
