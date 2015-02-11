<?php
if(!isset($_SESSION)){
	session_start();
	include_once "translate/t.inc.php";
}
if(isset ($_SESSION['lang'])){
}
?>
<div class ="hed_nav">
	<div class ="lang">
		<a href="inc/heder.inc.php?ENG=set"><img src="img/gb.png" width ="45" height ="45"></a>
		<a href="inc/heder.inc.php?UA=set"><img src="img/ua.png" width ="45" height ="45"></a>
	</div>
</div>
<?php

if(isset($_GET['ENG'])){
	unset($_SESSION['lang']);
	$redicet = $_SERVER['HTTP_REFERER'];
	header ("Location: $redicet");
}
if (isset($_GET['UA'])) {

	$_SESSION['lang'] = 'ua';

	$redicet = $_SERVER['HTTP_REFERER'];
	header ("Location: $redicet");
}

?>