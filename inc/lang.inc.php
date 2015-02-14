<?php
include_once "translate/t.inc.php";
?>

<!--Translete site menu part.-->

<div>
    <form method="post" action="translate/func.php" class="f_bord">
        <label><h3><?php t("Add new words or phrase"); ?></h3>

            <p><label><?php t("English"); ?><br>
                    <input type="text" name="t_eng_menu">
                </label></p>

            <p><label><?php t("Ukrainian"); ?><br>
                    <input type="text" name="t_ua_menu">
                </label></p>

            <p><input type="submit" value="<?php t("Add translation"); ?>" name="t_send"></p>
        </label>
    </form>
</div>


