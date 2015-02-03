<?php
if(isset($_POST['go_log'])){

}
if(isset($_POST['go_reg'])){
	include_once "action.php";
	include_once "../config.php";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$r = new Auth();
	$r->push_reg($name, $email, $pass, $connect);
	}
/*
if(isset($_POST['go_reg'])){
	include_once "action.php";
	include_once "../config.php";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$r = new Auth();
	//ДОДАТИ ФУНЦІЮ ДЛЯ ФІЛЬТРУВАННЯ ДАНИХ
	$reg=$r->check_data($name, $email, $connect);//перевірка чи не введенні дані якогось користувача
	if($reg){//якщо таких даних немає в БД записати їх туди і авторизувати користувача
		$r->push_reg($name, $email, $pass, $connect);

	}else{//якщо є вивести повідомлення про помилку

	}

}
*/
?>