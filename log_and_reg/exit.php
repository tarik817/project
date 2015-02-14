<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['admin']);
unset($_SESSION['e_user']);
unset($_SESSION['anonim']);
unset($_SESSION['blocked']);
session_destroy();
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
?>
