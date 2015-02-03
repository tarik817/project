<?php
if (!isset($_SESSION)){
	session_start();
} 
if (isset($_POST["go_reg"])){
	include_once "action.php";
	include_once "../inc/db.inc.php";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$r_pass=$_POST['r_pass'];
	//check the validity of data
	if ($pass != $r_pass) {
		exit("Your passwords don't match.");
	}
	if (strlen($name)<3 or strlen($name) > 15)
	{
		exit ("Name must be more than 3 characters and less than 15.");
	}
	if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i",$email))
	{
		exit ("Wrong format of e-mail.");
	}
	//sanitize data
	$name = trim($name);
	$email = trim($email);
	$pass = trim($pass);

	$name = htmlspecialchars($name);
	$email = htmlspecialchars($email);
	$pass = md5($pass);
	//connect to BD
	try {
	$db = new PDO("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
	}	
	$r = new Auth();
	$res = $r->check_data($name, $email, $db);
	if ($res == "u") {
		$r = null;
		exit ("Sorry this name is already reserved.");
	} elseif ($res == "e") {
		$r=null;
		exit ("Sorry this e-mail is already reserved.");
	} else {
		//set session
		$_SESSION['user'] = $name;
		//push data into DB
		$r->push_reg($name, $email, $pass, $db);
		$r = null;
		//Redirect on main page
		header("Location: ../index.php");
	}
}
if (isset($_POST['go_log'])){
	include_once "action.php";
	include_once "../inc/db.inc.php";
	echo "asfdas";
	if (!empty($_POST['log_name']) && !empty($_POST['log_pass'])) {
		$name= $_POST['log_name'];
		$pass=$_POST['log_pass'];
		try {
		$db = new PDO("$db_info", "$db_user", "$db_pass"); 
		} catch(PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}	
		$r = new Auth();
		$log = $r->log_in($name, $pass, $db);
		if ($log == true){
			$_SESSION['user'] = $name;
			header("Location: ../index.php");
		} else {
			exit("You entered an incorrect username or password.");
		}

	}
}

?>