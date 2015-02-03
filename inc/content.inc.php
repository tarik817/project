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
			<a href="#">Delete</a>
		</div>
	</div>
<?php	
} else {
	//Display all articles.
	include_once("articles/controler.php");
	$obj = new Control();
	$res = $obj->expres_all();
}	
	
?>