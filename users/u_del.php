<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['del']) && isset($_SESSION['admin'])) {

    $name = $_GET['del'];
    $d = del($name);
    $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");

} else {
    $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");
}

function del($name)
{
    include_once "../inc/db.inc.php";

    //Connect to DB.
    try {

        $db = new PDO ("$db_info", "$db_user", "$db_pass");

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $sql = "DELETE FROM users WHERE users_id = '$name' LIMIT 1";

    $del = $db->prepare($sql);
    $del->execute();

}

?>