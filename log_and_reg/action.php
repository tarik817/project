<?php

class Auth
{
    function check_data($name, $email, $db)
    {

        $sql = "SELECT users_name FROM users WHERE users_name = :name";
        $check = $db->prepare($sql);
        $check->bindParam(':name', $name);
        $check->execute();
        $r = $check->fetch();
        $check->closeCursor();
        if (!empty($r['users_name'])) {

            $check = "u";
            return $check;

        }

        $sql = "SELECT users_email FROM users WHERE users_email='$email'";
        $chek = $db->query($sql);
        $chek->execute();
        $r = $chek->fetch();
        $chek->closeCursor();
        if (!empty($r['users_email'])) {
            $check = "e";
            return $check;
        }
    }

    function push_reg($name, $email, $pass, $db)
    {
        $data = time();
        $position = '1';
        $sql = "INSERT INTO users (users_name, users_email, users_pass, users_data, u_position, u_log) VALUES (:name, :email, :pass, :data, :position, :data) ";
        $r = $db->prepare($sql);
        $r->bindParam(':name', $name);
        $r->bindParam(':email', $email);
        $r->bindParam(':pass', $pass);
        $r->bindParam(':data', $data);
        $r->bindParam(':position', $position);
        $r->bindParam(':data', $data);
        $r->execute();
        $r->closeCursor();
    }

    function log_in($name, $pass, $db)
    {
        $sql = "SELECT * FROM users WHERE users_name = :name";
        $log = $db->prepare($sql);
        $log->bindParam(':name', $name);
        $log->execute();
        $res = $log->fetch();
        if ($res['users_pass'] == md5($pass)) {
            return $res;
        } else {
            return false;
        }
        $chek->closeCursor();

    }

    function last_log($name, $db)
    {
        $u_log = time();

        $sql = "UPDATE users SET u_log = :u_log WHERE users_name = :name ";

        $push = $db->prepare($sql);
        $push->bindParam(':name', $name);
        $push->bindParam(':u_log', $u_log);
        $res = $push->execute(array($u_log, $name));
        $push->closeCursor();


    }

}

?>
