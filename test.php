	<div>
	<form method ="post" action="test.php">
		<p>Number of article<br><input type="text" value="" name ="update"></p>
		<p>Title<br><input type="text" name="title" size="70" value=""></p>
		<p>Content<br><textarea name="content" cols="70" rows="10" ></textarea> </p>
		<input  class="bott" type="submit" value="ok" name="add_article">
	</form>
	</div>

<?php
phpinfo();

if(isset($_POST['add_article']) && isset($_POST['update']) && is_numeric($_POST['update'])){


	include_once "inc/db.inc.php";

	$id = $_POST['update'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	
	//Sanitizing data.
	$title = htmlspecialchars ($title);
	$content = htmlspecialchars ($content);
/*
	//Connect to DB.
	try {
		$db = new PDO ("$db_info", "$db_user", "$db_pass"); 
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
    	die();
	}
*/
	
	$res = update_db($id, $title, $content);

	if ($res == true) {

		header("Location: .");
		exit(); 

	} else {
		exit("err");
	}

} 	


	function update_article($id, $title, $content, $db){

		$time = time();

		$sql = "UPDATE articles 
		SET articles_title = :title,
		articles_content = :content,
		articles_data = :time 
		WHERE id = :id";
		
		$push = $db->	prepare($sql);
		$push->bindValue(":title", $title);
		$push->bindValue(":content", $content);
		$push->bindValue(":time", $title);
		$push->bindValue(":id", $id);
		$res = $push->execute();
 	
 	
	}

	function update_db($id, $title, $content){

     include('inc/con.inc.php');
     
     $time = time();
     $sql = "UPDATE data SET articles_title = '12312', articles_content = '12312', articles_data = '123' WHERE id = '1'";
      
        $res = $connect->query($sql);
        if($res){
           return true;
        }else{
            mysqli_error();
            }
    }

	?>