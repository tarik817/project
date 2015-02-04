<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	
	//Display curren article.
	include_once("articles/controler.php");
	$obj = new Control();
	$res = $obj->expres($_GET['id']);

?>	

	<div>
		<div><p><?php echo $res["articles_title"]; ?></p></div>
		<div><p><?php echo $res["articles_content"]; ?></p></div>
		<div><p>Author: <?php echo $res["articles_author"]; ?></p></div>
		<div><p>Date of adding: <?php echo date("F j, Y, g:i a",$res["articles_data"]); ?></p></div>
		<div>
			<a href="#">Edit</a>
			<a href="articles/del.php?=<?php echo $res['articles_id']; ?> ">Delete</a>
		</div>
	</div>

<?php	

} else {

	//Display all articles.
	include_once("articles/controler.php");
	$obj = new Control();
	$art = $obj->expres_all();

// Loop through each entry
 foreach($art as $entry) {

?>
 
 <p>
 		<div><p><?php echo $entry['title'] ?></p></div>
		<div><p><?php echo $entry['content'].'...'; ?></p></div>
		<div><p>Author: <?php echo $entry['author'] ?></p></div>
		<div><p>Date of adding: <?php echo date('F j, Y, g:i a',$entry['data']) ?></p></div>
		<p><a href="?id=<?php echo $entry['id'] ?>">Read More</a></p>
		<div>
 </p><br>
 
 <?php

 } // End the foreach loop 

}	
	
?>