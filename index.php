<?php
session_start();
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
            include "inc/heder.inc.php";
            include "log_and_reg/reg_and_log.php";
            ?>

        </div>
        <div class="sidebar">
            <?php
            include "inc/sidebar.inc.php";
            ?>
        </div>
        <div class="content">
            <?php
            include "inc/content.inc.php";
            ?>
        </div>
        <div class ="footer">
            <?php
            include "inc/footer.inc.php";
            ?>
        </div>
    

        <div class="clr"></div>
    </div>

</body>
</html>