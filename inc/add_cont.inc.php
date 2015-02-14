<?php 
if(isset($_GET['show']) && is_numeric($_GET['show'])){
	include_once "articles/controler.php";

	$id = $_GET['show'];

	$obj = new Control();
	$res = $obj->expres($id);

?>
	<div class = "autopos">
	<form method ="post" action="articles/controler.php">
		<input type="hidden" value="<?php echo $res['articles_id'] ?>" name ="update">
		<p><?php t("Title in English"); ?><br><input type="text" name="title" size="70" value="<?php echo $res['articles_title'] ?>"></p>
		<p><?php t("Content in English"); ?><br><textarea name="content" cols="70" rows="10" ><?php echo $res['articles_content'] ?></textarea> </p>
		<p><?php t("Title in ukrainian"); ?><br><input type="text" name="title_ua" size="70" value="<?php echo $res['articles_title_ua'] ?>"></p>
		<p><?php t("Content in ukrainian"); ?><br><textarea name="content_ua" cols="70" rows="10" ><?php echo $res['articles_content_ua'] ?></textarea> </p>
		<input  class="bott" type="submit" value="<?php t("Update article"); ?>" name="add_article">
	</form>
	</div>

<?php 

} else {

?>

<div class = "autopos">
	<form method ="post" action="articles/controler.php">
		<p><?php t("Title in English"); ?><br><input type="text" name="title" size="70"></p>
		<p><?php t("Content in English"); ?><br><textarea name="content" cols="70" rows="10"></textarea></p>
		<p><?php t("Title in Ukrainian"); ?><br><input type="text" name="title_ua" size="70"></p>
		<p><?php t("Content in Ukrainian"); ?><br><textarea name="content_ua" cols="70" rows="10"></textarea></p>
		<input class="bott" type="submit" value="<?php t("Add article"); ?>" name="add_article">
	</form>
</div>

<?php 

}

?>