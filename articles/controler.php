<?php
if(!isset($_SESSION)){session_start();} 
if(isset($_POST['add_article'])){
	include_once "action.php";
	include_once "../inc/db.inc.php";
	$title=$_POST['title'];
	$content=$_POST['content'];
	//sanitizing data
	$title=htmlspecialchars($title);
	$content=htmlspecialchars($content);
	try{
		$db = new PDO("$db_info", "$db_user", "$db_pass"); 
	}catch(PDOException $e){
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}
	$obj= new Article();
	$res=$obj->push_article($title, $content, $db);
	if($res ==true){
		//ЗРОБИТИ РЕДІРЕКТ НА СТОРІНКУ ПЕРЕГЛЯДУ МАТЕРІАЛУ ЗАМІСТЬ ГОЛОВНОЇ СТОРІНКИ
		header("Location: ../index.php");
	}



}