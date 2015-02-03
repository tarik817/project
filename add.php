<?php
session_start();
if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet" type = "text/css">
</head>
<body>
    <div class="page_align">
        <div class ="heder">
            <?php
            include_once "inc/heder.inc.php";
            include_once "log_and_reg/reg_and_log.php";
            ?>

        </div>
        <div class="sidebar">
            <?php
            include_once "inc/sidebar.inc.php";
            ?>
        </div>
        <div class="content">
            <?php
            include_once "inc/add_cont.inc.php";
            ?>
        </div>
        <div class ="footer">
            <?php
            include_once "inc/footer.inc.php";
            ?>
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