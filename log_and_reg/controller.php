<?php
if(isset($_POST['go_log'])){

}
if(isset($_POST['go_reg'])){
	include "action.php";

	$r = new Auth();
	$reg=$r->check_data($name, $email);//перевірка чи не введенні дані якогось користувача
	if($reg){//якщо таких даних немає в БД записати їх туди і авторизувати користувача

	}else{//якщо є вивести повідомлення про помилку

	}

}