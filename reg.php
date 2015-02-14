<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<link href="css/main.css" rel="stylesheet" type="text/css">
<meta charset="utf8">
<?php
include_once "translate/t.inc.php";
?>
<div class="reg_div">
    <form method="post" action="log_and_reg/controller.php">
        <label><input type="text" id="name" name="name" placeholder="<?php t("Name"); ?>"> </label><br>
        <label><input type="text" id="email" name="email" placeholder="<?php t("e-mail"); ?>"> </label><br>
        <label><input type="password" id="pass" name="pass" placeholder="<?php t("Password"); ?>"> </label><br>
        <label><input type="password" id="r_pass" name="r_pass" placeholder="<?php t("Repeat password"); ?>">
        </label><br>
        <input type="submit" id="go_reg" name="go_reg" value="<?php t("Registration"); ?>">
    </form>
</div>