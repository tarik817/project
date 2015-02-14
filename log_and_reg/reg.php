<link href="css/main.css" rel="stylesheet" type = "text/css">
<meta charset="utf8">
<?php
include_once "translate/t.inc.php";
?>
<div class ="reg_div">
<form method="post" action="controller.php">
	<label><?php t("Name"); ?><br><input type="text" id="name" name="name"> </label><br>
	<label><?php t("e-mail"); ?><br><input type="text" id="email" name="email"> </label><br>
	<label><?php t("Password"); ?><br><input type="password" id="pass" name="pass"> </label><br>
	<label><?php t("Repeat password"); ?><br><input type="password" id="r_pass" name="r_pass"> </label><br>
	<input type="submit" id="go_reg" name="go_reg" value="<?php t("Registration"); ?>">
</form>
</div>