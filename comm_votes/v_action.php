<?php
if (!isset($_SESSION)) {
    session_start();
}

class Vote
{

    function push_vote($vote, $user, $articles_id)
    {
        //Connect to DB.
        include("../inc/db.inc.php");
        try {
            $db = new PDO ("$db_info", "$db_user", "$db_pass");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $sql = "SELECT * FROM votes WHERE user = :user AND articles_id = :articles_id";
        $r = $db->prepare($sql);
        $r->bindParam(':user', $user);
        $r->bindParam(':articles_id', $articles_id);
        $r->execute();
        $resulte = $r->fetch();
        if ($resulte['id'] == 0 or $q == false) {
            $sql = "INSERT INTO votes(user, articles_id, vote_rating) VALUES (:user, :articles_id, :vote)";
            $r = $db->prepare($sql);
            $r->bindParam(':user', $user);
            $r->bindParam(':articles_id', $articles_id);
            $r->bindParam(':vote', $vote);
            $res = $r->execute();
            $r->closeCursor();
            return $vote;
        } else {
            return false;
        }
    }

    function is_vote($articles_id)
    {
        include "inc/db.inc.php";
        try {
            $db = new PDO ("$db_info", "$db_user", "$db_pass");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM votes WHERE user =:user and articles_id = :articles_id";
        $r = $db->prepare($sql);
        $r->bindParam(':user', $user);
        $r->bindParam(':articles_id', $articles_id);
        $r->execute();
        $resulte2 = $r->fetch();
        $vote_rating = $resulte2['vote_rating'];
        if ($resulte2['vote_rating'] != 0) {
            return $vote_rating;
        } else {
            return false;
        }
    }

    function vote_rating($articles_id)
    {
        $sum = 0.0;
        $counter = 0;
        //Connect to DB.
        include("inc/db.inc.php");
        try {
            $db = new PDO ("$db_info", "$db_user", "$db_pass");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $sql = "SELECT * FROM votes WHERE articles_id = :articles_id";
        $r = $db->prepare($sql);
        $r->bindParam(':articles_id', $articles_id);
        $r->execute();
        while ($resulte3 = $r->fetch()) {
            $resulte3 = $resulte3['vote_rating'];

            $sum += $resulte3;
            $counter++;
        }
        if ($counter == 0) {
            $counter = 1;
        }
        $sum = $sum / $counter;
        $sum = mb_substr($sum, 0, 15);
        $position = mb_strrpos($sum, '.', 'UTF-8');
        $sum = mb_substr($sum, 0, $position + 2);
        return $sum;
    }

    function delete_vote($user, $articles_id)
    {
        include_once "../inc/db.inc.php";

        //Connect to DB.
        try {
            $db = new PDO ("$db_info", "$db_user", "$db_pass");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        $sql = "DELETE FROM votes WHERE user = :user AND articles_id = :articles_id LIMIT 1";

        $del = $db->prepare($sql);
        $del->bindParam(':articles_id', $articles_id);
        $res = $del->execute();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}

?>
