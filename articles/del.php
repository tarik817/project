<?php
if (!isset($_SESSION)) {
    session_start();
}
echo $_SESSION['e_user'];
if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_SESSION['e_user'])) {


    $id = $_GET['id'];
    $d = del($id);
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

    $sql = "DELETE FROM articles WHERE articles_id = :id LIMIT 1";

    $del = $db->prepare($sql);
    $del->bindParam(':id', $id);
    $del->execute();

}

?>
