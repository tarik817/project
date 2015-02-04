<?php 
if(isset($_GET['show']) && is_numeric($_GET['show'])){
	include_once "articles/controler.php";

	$id = $_GET['show'];

	$obj = new Control();
	$res = $obj->expres($id);

?>
	<div>
	<form method ="post" action="articles/controler.php">
		<input type="hidden" value="<?php echo $res['articles_id'] ?>" name ="update">
		<p>Title<br><input type="text" name="title" size="70" value="<?php echo $res['articles_title'] ?>"></p>
		<p>Content<br><textarea name="content" cols="70" rows="10" ><?php echo $res['articles_content'] ?></textarea> </p>
		<input type="submit" value="ok" name="add_article">
	</form>
	</div>

<?php 

} else {

?>

<div>
	<form method ="post" action="articles/controler.php">
		<p>Title<br><input type="text" name="title" size="70"></p>
		<p>Content<br><textarea name="content" cols="70" rows="10"></textarea></p>
		<input type="submit" value="ok" name="add_article">
	</form>
</div>

<?php 

}

?>