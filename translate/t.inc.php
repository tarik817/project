<?php
/*
Function for get translete text of the DB.
*/
function t($text)
{
    //Conect to DB.
    include "inc/db.inc.php";
    try {
        $db = new PDO("$db_info", "$db_user", "$db_pass");
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    //Check variable.
    $sql = "SELECT t_eng FROM lang WHERE t_eng = '$text'";
    $t = $db->query($sql);
    $t->execute();
    $res = $t->fetch();
    $res = $res['t_eng'];
    if (empty($res)) {
        //Insert in BD cheked values if its empty.
        $sql = "INSERT INTO lang (t_eng) VALUES ('$text')";
        $put = $db->prepare($sql);
        $res = $put->execute(array($text));
        $put->closeCursor();
    }
    //Languege marker.
    if (isset($_SESSION['lang'])) {
        if ($_SESSION['lang'] == 'ua') {
            //Get UA translation.
            $sql = "SELECT t_ua FROM lang WHERE t_eng = '$text'";
            $t = $db->query($sql);
            $t->execute();
            $res = $t->fetch();
            $res = $res['t_ua'];
            //Checking presenting of translation.
            if (!empty($res)) {
                $text = $res;
            }
        }
    }
    echo $text;

}
