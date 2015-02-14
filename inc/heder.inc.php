<div class="logo">SculptoR</div>
<div class="logo2">blog</div>
<?php
if (!isset($_SESSION)) {
    session_start();
    include_once "translate/t.inc.php";
}
if (isset ($_SESSION['lang'])) {
}
?>

<?php

if (isset($_GET['ENG'])) {
    unset($_SESSION['lang']);
    $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");
}
if (isset($_GET['UA'])) {

    $_SESSION['lang'] = 'ua';

    $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");
}

?>
