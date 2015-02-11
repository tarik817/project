<?php
include_once "translate/t.inc.php";
?>
<a class="bott" href="index.php"><?php t("Home"); ?></a><br>
<a class="bott" href="user.php?display"><?php t("Users"); ?></a><br>
<?php
if(isset($_SESSION['e_user'])){
?>
<a href="add.php" class="bott"><?php t("Add news"); ?></a><br>	
<?php
}
if(isset($_SESSION['admin'])){
	?>
	<a href="lang.php" class="bott"><?php t("Add translation"); ?></a><br>	
<?php
}
?>