<?php
if (!isset($_SESSION)) {
    session_start();
    include_once "../translate/t.inc.php";
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="auth">
    <?php
    if (isset($_SESSION['user'])){
        ?>
        <div class="log2"><a href="user.php?me=<?php echo $_SESSION['user']; ?>"><p
                    class="log_in"><?php echo $_SESSION['user']; ?></p></a>
            <a class="log_in" href="log_and_reg/exit.php">Exit</a><br>
        </div>
    <?php
    }else{
    ?>
    <div class="log_hover">
        <form id="LogForm"  method="post" action="log_and_reg/controller.php">
            <p class="log_in cent"><?php t('Enter your name') ?><br><input class="log_input" type="text" name="log_name"></p>
            <p class="log_in cent"><?php t('Enter your password') ?><br><input class="log_input" type="password" name="log_pass"></p>
            <p><input type="submit" value="<?php t('Login') ?>" name="go_log" id="go_log"></p>
        </form>
        <?php
        }
        if (!isset($_SESSION['user'])){
        ?>
        <p><button class="log_in cent" id="hide" ><?php t('Log in') ?></button></p>
        <p class="log_in cent"><a href="reg.php"><?php t('Registration') ?></a></p>
    </div>
<?php
}
?>
</div> 
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#LogForm").toggle();
        return false;
    });
});

</script>

