<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<link href="css/main.css" rel="stylesheet" type="text/css">
<meta charset="utf8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php
include_once "translate/t.inc.php";
?>
<a class ="go_main" href="index.php"><img src="img/009.png" alt="GO" width ="15" higth ="15"> <?php t('On main page') ?></a>
<div class="reg_div">
    <form name='registration' method="post" action="log_and_reg/controller.php" onSubmit="return formValidation();">
        <label><input type="text" id="name" name="name" placeholder="<?php t("Name"); ?>"> </label><br>
        <label><input type="text" id="email" name="email" placeholder="<?php t("e-mail"); ?>"> </label><br>
        <label><input type="password" id="pass" name="pass" placeholder="<?php t("Password"); ?>"> </label><br>
        <label><input type="password" id="r_pass" name="r_pass" placeholder="<?php t("Repeat password"); ?>">
        </label><br>
        <input type="submit" id="go_reg" name="go_reg" value="<?php t("Registration"); ?>">

    </form>
</div>

<script type="text/javascript">

function formValidation(){
    var uid = document.registration.name;
    var passid = document.registration.pass;
    var uemail = document.registration.email;

if(userid_validation(uid,5,12)){
 	if(passid_validation(passid,3,12)){
    if(ValidateEmail(uemail)){
    }
  }
}
return false;
} 
function userid_validation(uid,mx,my){
    var uid_len = uid.value.length;
    if (uid_len == 0 || uid_len >= my || uid_len < mx)
    {
        alert("User Id should not be empty / length be between "+mx+" to "+my);
        uid.focus();
        return false;
    }
    return true;
}
function passid_validation(passid,mx,my){
    var passid_len = passid.value.length;
    if (passid_len == 0 ||passid_len >= my || passid_len < mx)
    {
        alert("Password should not be empty / length be between "+mx+" to "+my);
        passid.focus();
        return false;
    }
    return true;
}
function ValidateEmail(uemail){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    uemail.classList.add("error");
    if(uemail.value.match(mailformat))
    {
    	// alert('Form Succesfully Submitted');
    	document.getElementById('go_reg').submit();
      window.location.reload()
      return true;
    }
    else
    {
        alert("You have entered an invalid email address!");
        uemail.focus();
        return false;
    }
}
</script>

