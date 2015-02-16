<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
$(document).ready(function(){
  alert("Helloo");
});

function formValidation(){
    var uid = document.registration.userid;
    var passid = document.registration.passid;
    var uemail = document.registration.email;

if(userid_validation(uid,5,12)){
 	if(passid_validation(passid,7,12)){
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
    if(uemail.value.match(mailformat))
    {
    	alert('Form Succesfully Submitted');
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
