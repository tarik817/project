<?php
include_once "translate/t.inc.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	
	//Display curren article.
	include_once("articles/controler.php");
	$obj = new Control();
	$res = $obj->expres($_GET['id']);

?>	

	<div>
		<div><p><?php echo $res["articles_title"]; ?></p></div>
		<div><p><?php echo $res["articles_content"]; ?></p></div>
		<div><p><?php t("Author:"); ?><a href="user.php?id=<?php echo $res['articles_author'] ?>"> <?php echo $res['articles_author'] ?></a></p></div>
		<div><p><?php t("Date of adding:"); ?> <?php echo date("F j, Y, g:i a",$res["articles_data"]); ?></p></div>
		<div>

			<?php 

			if(isset($_SESSION['user'])){
				if ($_SESSION['user'] == $res['articles_author']){ ?>
					<a class="bott" href="add.php?show=<?php echo $res['articles_id']; ?>"><?php t("Edit"); ?></a>
					<a class="bott" href="articles/del.php?id=<?php echo $res['articles_id']; ?> "><?php t("Delete"); ?></a>
			<?php
			if(isset($_SESSION['admin'])){

			} 
				}
			} 
			?>
		</div>
	</div>

<?php	

} else {

	//Display all articles.
	include_once("articles/controler.php");
	$obj = new Control();
	$art = $obj->expres_all();
	if (!empty($art)){

// Loop through each entry
 foreach($art as $entry) {

?>
 <div class = "articles">
 <p>
 		<div><p><?php echo $entry['title'] ?></p></div>
		<div><p><?php echo $entry['content'].'...'; ?></p></div>
		<div><p><?php t("Author:"); ?><a href="user.php?id=<?php echo $entry['author'] ?>"> <?php echo $entry['author'] ?></a></p></div>
		<div><p><?php t("Date of adding:"); ?> <?php echo date('F j, Y, g:i a',$entry['data']) ?></p></div>
		<p><a class="bott" href="?id=<?php echo $entry['id'] ?>"><?php t("Read More"); ?></a>
		<?php
			if(isset($_SESSION['e_user']) and $_SESSION['e_user'] == $entry['author'] || isset($_SESSION['admin'])){
		?>
				<a class="bott" href="lang.php?translate" ><?php t("Edit translation"); ?></a>
		<?php		
			}
		?>
		
		</p>
		 </p><br>
 </div>
 <?php

 } // End the foreach loop 

}else{
	echo "Here is empty, yet:)";
}

}	
	
?>