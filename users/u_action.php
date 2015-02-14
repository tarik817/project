<?php

class User
{
    function get_user($name, $db)
    {

        $sql = "SELECT * FROM users WHERE users_name = '" . $name . "'";
        $res = $db->query($sql);
        $res->execute();
        $r = $res->fetch();
        $res->closeCursor();
        return $r;
    }
    
    function update($name, $fir_name, $sec_name, $email, $pass, $u_img, $u_position, $db)
    {
        $time = time();
        $pass = md5($pass);

        $sql = "UPDATE users
		SET 
		users_email = '$email',
		users_pass = '$pass',
		users_data = $time,
		u_fir_name = '$fir_name',
		u_sec_name = '$sec_name',
		u_position = $u_position,
		u_img = '$u_img',
		u_log = '$time'

		WHERE users_name = '$name'";

        $push = $db->prepare($sql);
        $res = $push->execute(array($name, $fir_name, $sec_name, $email, $pass, $u_img, $u_position));
        $push->closeCursor();

        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }
    function push()
    {
        $time = time();

        $sql = "UPDATE users
		SET users_name = '$title',
		articles_content = '$content',
		articles_data = '$time' 
		WHERE articles_id = '$id'";

        $push = $db->prepare($sql);
        $res = $push->execute(array($title, $content, $time));
        $push->closeCursor();

        if ($res == true) {
            return true;
        } else {
            return false;
        }

    }

    function fetch_users($db)
    {
        $users = NULL;

        $sql = "SELECT * FROM users";

        // Loop through returned results and store as an array.
        foreach ($db->query($sql) as $row) {

            //Pushing cutted data in array.
            $users[] = array(
                'users_id' => $row['users_id'],
                'users_name' => $row['users_name'],
                'users_email' => $row['users_email'],
                'users_pass' => $row['users_pass'],
                'users_data' => $row['users_data'],
                'u_fir_name' => $row['u_fir_name'],
                'u_sec_name' => $row['u_sec_name'],
                'u_img' => $row['u_img'],
                'u_log' => $row['u_log']
            );

        }
        return $users;

    }

    function acses($name, $db)
    {
        $sql = "SELECT u_position FROM users WHERE users_name = '" . $name . "'";
        $res = $db->query($sql);
        $res->execute();
        $r = $res->fetch();
        $r = $r['u_position'];

        switch ("$r") {
            case '0':
            case '1':
                return 'User';
                break;
            case '2':
                return 'Editor';
                break;
            case '3':
                return 'Administrator';
                break;
            case '4':
                return 'Anonim';
                break;
            case '5':
                return 'Blocked';
                break;
            default:
                exit("a");
        }

    }

}
