<?php
session_start();
if (isset($_SESSION['e_user'])) {
    # code...
include_once "translate/t.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php t("Test"); ?></title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="flag">
    <?php
    include_once "inc/flags.inc.php";
    ?>
</div>
<div class="page_align ">

    <div class="heder">
        <?php
        include_once "inc/heder.inc.php";
        ?>
    </div>
    <div class="content">
        <?php
        include_once "inc/add_cont.inc.php";
        ?>
        <div class="clr"></div>
    </div>
    <div class="footer">
        <?php
        include_once "inc/footer.inc.php";
        ?>
    </div>


    <div class="clr"></div>
</div>
<div class="sidebar">
    <?php
    include_once "inc/sidebar.inc.php";
    ?>
</div>
<div class="reg">
    <?php
    include_once "inc/reg.inc.php";
    ?>
</div>


</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
