<?php
include_once "translate/t.inc.php";
?>
<form method="post" action="lang.php">
	<input class="bott" type="submit" value="Site menu translation" name="t_site_menu">
</form>
<form method="post" action="lang.php" >
	<input class="bott" type="submit" value="Articles translation" name="t_site_articles">
</form>
<form>
</form>
<?php
//Translete site menu part.	
if (isset($_POST['t_site_menu'])){
?>
	<div>
	<div class="f_bord">
	<!--check if ther is translate into Ukrainian-->
	<form>
		<label><h3><?php t("Check translation"); ?></h3>
		<p><label><?php t("English"); ?>
			<p><input type="text" name ="t_eng"><input type="submit" value="Check translation" name ="t_check"></p>
		</label>
	</form>
	<!--check if ther is translate into English-->
	<form >
		<label><?php t("Ukrainian"); ?>
			<p><input type="text" name ="t_ua"><input type="submit" value="Check translation" name ="t_check"></p>
			
		</label>
		</p>
		</label>
	</form>
	</div>
	<form method="post" action="translate/func.php" class="f_bord">
		<label><h3><?php t("And new words"); ?></h3>
		<p><label><?php t("English"); ?><br>
			<input type="text" name="t_eng_menu">
		</label></p>
		<p><label><?php t("Ukrainian"); ?><br>
			<input type="text" name="t_ua_menu">
		</label></p>
		<p><input type = "submit" value ="<?php t("Add translation"); ?>" name="t_send"></p>
	</label>
	</form>



</div>
<?php
//Translete articles part.
}elseif (isset($_POST['t_site_articles']) or isset($_GET['translate'])) {
	if (isset($_GET['translate'])) {
		///ДОРОБИТИ
?>
		<div >
			<form method ="post" action="articles/controler.php">
				<p><?php t("Article id"); ?><br><?php echo "id"; ?></p>
				<p><?php t("Title"); ?><br><input type="text" name="title" size="70"></p>
				<p><?php t("Conten"); ?>t<br><textarea name="content" cols="70" rows="10"></textarea></p>
				<input class="bott" type="submit" value="ok" name="trans_article">

			</form>
		</div>
<?php	
	}
?>
<div >
	<form method ="post" action="articles/controler.php">
		<p><?php t("Article id"); ?><br><input type="text"></p>
		<p><?php t("Title"); ?><br><input type="text" name="title" size="70"></p>
		<p><?php t("Content"); ?><br><textarea name="content" cols="70" rows="10"></textarea></p>
		<input class="bott" type="submit" value="ok" name="trans_article">

	</form>
</div>
	
<?php	
}
?>

