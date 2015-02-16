<?php
include_once "translate/t.inc.php";
?>
    <a class="sidebar_bott" href="index.php"><img src="img/024.png" alt="GO" width ="15" higth ="15"> <?php t("Home"); ?></a><br>
    <a class="sidebar_bott" href="user.php?display"><img src="img/148.png" alt="GO" width ="15" higth ="15"> <?php t("Users"); ?></a><br>
<?php
if (isset($_SESSION['e_user'])) {
    ?>
    <a href="add.php" class="sidebar_bott"><img src="img/014.png" alt="GO" width ="15" higth ="15"> <?php t("Add news"); ?></a><br>
<?php
}
if (isset($_SESSION['admin'])) {
    ?>
    <a href="lang.php" class="sidebar_bott"><img src="img/190.png" alt="GO" width ="15" higth ="15"> <?php t("Add translation"); ?></a><br>
<?php
}
?>
