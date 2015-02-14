<?php
if (isset($_SESSION['user'])) {
    include_once "users/u_controler.php";
    $obj = new GetUser();
    $position = $obj->check_acses($_SESSION['user']);
}
//Display user.
if (isset($_GET['me']) and isset($_SESSION['user'])) {
    include_once "users/u_controler.php";
    $user = $_SESSION['user'];
    $obj = new GetUser();
    $res = $obj->expres_u($user);
    $position = $obj->check_acses($user);
    if (!empty($res['u_img'])) {
        $img = $res['u_img'];
    } else {
        $src = "img/def.png";
        $img = "No avatar yet.";
    }
    ?>
    <div class="curr_user">
        <div class="user_text">
            <p><?php t("Nik-name"); ?><br><?php echo $res['users_name']; ?></p><br>
            <p><?php t("Position"); ?><br><?php echo $position; ?></p><br>
            <p><?php t("First name"); ?><br><?php echo $res['u_fir_name']; ?></p><br>
            <p><?php t("Second name"); ?><br><?php echo $res['u_sec_name']; ?></p><br>
            <p><?php t("E-mail"); ?><br><?php echo $res['users_email']; ?></p><br>
        </div>
        <div class="user_img">
            <p><?php t("Avatar"); ?><br><img src="<?php echo "$src" ?>"/><br><?php echo $img; ?><br></p>
            <a href="user.php?ed=<?php echo $res['users_name'] ?>"><?php t("Edite proffile"); ?></a>
        </div>
    </div>
    <?php
    exit();
}
//Display list of users.
if (isset($_GET['display'])) {
    include_once("users/u_controler.php");
    $obj = new GetUser();
    $res = $obj->expres_users();
    if (!empty($res)) {
        //Loop through each entry.
        foreach ($res as $entry) {
            $position = $obj->check_acses($entry['users_name']);
            ?>
            <div class="articles">
                <p>

                <div><p><?php t("Nickname"); ?>:<br><?php echo $entry['users_name'] ?></p></div>
                <div><p><?php t("Position"); ?><br><?php echo "$position"; ?></p><br></div>
                <div><p><?php t("Дата реєстрації"); ?>:<br> <?php echo date('F j, Y, g:i a', $entry['users_data']) ?>
                    </p></div>
                <div><p><?php t("Last Log in"); ?>:<br> <?php echo date('F j, Y, g:i a', $entry['u_log']) ?></p></div>
                <p><a class="bott"
                      href="?id=<?php echo $entry['users_name'] ?>"><?php t("View user information"); ?></a></p>
                <?php
                if (isset($_SESSION['admin'])) {
                    ?>
                    <div class="ed">
                        <p class="ed"><a href="user.php?ed=<?php echo $entry['users_name'] ?>"><?php t("Edite"); ?></a>
                        </p>

                        <p class="ed"><a
                                href="users/u_del.php?del=<?php echo $entry['users_id'] ?>"><?php t("Delete"); ?></a>
                        </p>
                    </div>
                <?php
                }
                ?>
                </p><br>
            </div>
        <?php
        }
    } else {
        exit("something go wrong..");
    }
    exit();
}
//Display chosen user.
if (isset($_GET['id'])) {
    include_once "users/u_controler.php";
    $id = $_GET['id'];
    $obj = new GetUser();
    $res = $obj->expres_u($id);
    $position = $obj->check_acses($res['users_name']);
    if (!empty($res['u_img'])) {
        $img = $res['u_img'];
    } else {
        $src = "img\def.png";
        $img = "No avatar yet.";
    }
    ?>
    <div class="curr_user">
        <div class="user_text">
            <p><?php t("Nik-name"); ?><br><?php echo $res['users_name']; ?></p><br>
            <p><?php t("Position"); ?><br><?php echo "$position"; ?></p><br>
            <p><?php t("First name"); ?><br><?php echo $res['u_fir_name']; ?></p><br>
            <p><?php t("Second name"); ?><br><?php echo $res['u_sec_name']; ?></p><br>
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <p><?php t("E-mail"); ?><br><?php echo $res['users_email']; ?></p><br>
            <?php
            }
            ?>
        </div>
        <div class="user_img">
            <p><?php t("Avatar"); ?><br><img src="<?php echo "$src" ?>"/><br><?php echo $img; ?><br></p>
        </div>
    </div>
    <?php
    
} //Edite current user.
elseif (isset($_SESSION['user']) and isset($_GET['ed']) and $_SESSION['user'] == $_GET['ed'] and !isset($_SESSION['anonim']) or isset($_SESSION['admin'])) {
    include_once "users/u_controler.php";
    $user = $_GET['ed'];
    $obj = new GetUser();
    $res = $obj->expres_u($user);
    $position = $obj->check_acses($user);
    if (!empty($res['u_img'])) {
        $img = $res['u_img'];
    } else {
        $img = "No avatar yet.";
    }
    ?>
    <form method="post" action="users/u_controler.php">
        <p><?php t(""); ?>Nik-name<br><?php echo $res['users_name']; ?></p><br>
        <input type="hidden" value="<?php echo $res['users_name']; ?>" name="users_name">
        <?php
        if (isset($_SESSION['admin'])) {
            ?>
            <div>
                <p><?php t("Current position"); ?>:<br>
                    <select name="u_position">
                        <option disabled><?php echo $position; ?></option>
                        <option value="1"><?php t("User"); ?></option>
                        <option value="2"><?php t("Editor"); ?></option>
                        <option value="3"><?php t("Administrator"); ?></option>
                        <option value="5"><?php t("Blocked"); ?></option>
                        <option value="4"><?php t("Anonim user"); ?></option>
                    </select></p>
                <br>
            </div>
        <?php
        }
        ?>
        <p><?php t("First name"); ?><br><input type="text" value="<?php echo $res['u_fir_name']; ?>" name="u_fir_name"
                                               size="50"></p><br>
        <p><?php t("Second name"); ?><br><input type="text" value="<?php echo $res['u_sec_name']; ?>" name="u_sec_name"
                                                size="50"></p><br>
        <p><?php t("E-mail"); ?><br><input type="text" value="<?php echo $res['users_email']; ?>" name="u_email"
                                           size="50"></p><br>
        <?php
        if ($_SESSION['user'] == $res['users_name']) {
            ?>
            <p><?php t("New password"); ?><br><input type="password" value="<?php echo $res['users_pass']; ?>"
                                                     name="u_pass" size="40"></p><br>
            <p><?php t("Repeat passwod"); ?><br><input type="password" value="<?php echo $res['users_pass']; ?>"
                                                       name="u_r_pas" size="40"></p><br>
        <?php
        }
        ?>
        <p><?php t("Avatar"); ?><br><?php echo $img; ?><br><input type="file" name="u_img"
                                                                  accept="image/jpeg,image/png,image/gif"></p><br>

        <p><input type="submit" value='<?php t("Update"); ?>' name="u_user"></p><br>
    </form>
<?php
} else {
    header("Location: index.php");
}
?>
