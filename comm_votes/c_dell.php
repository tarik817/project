<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['c_dell']) && is_numeric($_GET['c_dell']) && isset($_SESSION['user'])) {

    $id = $_GET['c_dell'];
    $d = del($id);
    $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");

} else {
    exit($_SESSION['user']);
    $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");
}

function del($id)
{
    include_once "../inc/db.inc.php";

    //Connect to DB.
    try {

        $db = new PDO ("$db_info", "$db_user", "$db_pass");

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $sql = "DELETE FROM comments WHERE c_id = $id LIMIT 1";

    $del = $db->prepare($sql);
    $del->execute();

}

?>