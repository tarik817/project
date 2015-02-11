<?php
session_start();
if (isset($_SESSION['e_user'])) {
include_once "translate/t.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php t("Test"); ?></title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet" type = "text/css">
</head>
<body>
    <div class="page_align b5radius">
        <div class ="heder b5radius">
            <?php
            include_once "inc/heder.inc.php";
            include_once "log_and_reg/reg_and_log.php";
            ?>

        </div>
        <div class="sidebar b5radius">
            <?php
            include_once "inc/sidebar.inc.php";
            ?>
        </div>
        <div class="content b5radius">
            <?php
            include_once "inc/lang.inc.php";
            ?>
            <div class="clr"></div>
        </div>
        <div class ="footer b5radius">
            <?php
            include_once "inc/footer.inc.php";
            ?>
            <div class="clr"></div>
        </div>
    

        <div class="clr"></div>
    </div>

</body>
</html>
<?php
}else{
header("Location: index.php");
}
?>