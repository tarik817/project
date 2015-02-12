<?php
include_once "translate/t.inc.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	
	//Display curren article.
	include_once("articles/controler.php");
	$obj = new Control();
	$res = $obj->expres($_GET['id']);

?>	

	<div>
		<?php 
 		if(!isset($_SESSION['lang'])){
 		?>
 		<div><p><?php echo $res['articles_title'] ?></p></div>
		<div><p><?php echo $res['articles_content'].'...'; ?></p></div>
		<?php
		}elseif (isset($_SESSION['lang']) and $_SESSION['lang'] == 'ua') {
		?>
		<div><p><?php echo (empty($res['articles_title_ua'])) ? $res['articles_title'] : $res['articles_title_ua']; ?></p></div>
		<div><p><?php echo (empty($res['articles_content_ua'])) ? $res['articles_content'].'...' : $res['articles_content_ua'].'...'; ?></p></div>
		<?php 
		}
		?>
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
<!--Votes part-->
<div class = "vote">
<?php
include "comm_votes/v_controller.php";


$rating = vote_preview($_GET['id']);
if($rating['rating'] == 0){
	echo t('No one voted for this article');
}else{
	echo t('Average rating');
	echo ' '.$rating['rating'];
}
if($rating['try'] == false){ ?>
				<meta charset="utf-8">
						<!-- Vote form -->
					<form  method="post" action="comm_votes/v_controller.php">
  						<p><?php t("Rate this article"); ?> :
   						<input type="radio" name="vote" value="1"> 1 
   						<input type="radio" name="vote" value="2"> 2 
   						<input type="radio" name="vote" value="3"> 3
   						<input type="radio" name="vote" value="4"> 4
   						<input type="radio" name="vote" value="5"> 5
 						<input type ="hidden" value="<?php echo $_GET['id'];?>" name="articles_id">
 						<input type="submit" name="vote_b" value="<?php t("Go vote") ?>"></p>
 					</form>
 				</div>
 					<?php
			}else{
	 			echo ''.t("Thank you for vote!").'<br>';
	 			echo "".t('Your vote is')." :";
	 			echo $rating["try"];
	 			?>
	 			 	 	<form method="post" action="comm_votes/v_controller.php">
	 						<input type ="hidden" value="<?php echo $_GET['id']; ?>" name="articles_id">
 							<input type="submit" name="vote_d" value="<?php t("Delete rate"); ?>">
 						</form>
 						<?php
 						if(isset($_SESSION['admin'])){
 						?>
 						<form method="post" action="comm_votes/v_controller.php">
	 						<input type ="hidden" value="<?php echo $_GET['id']; ?>" name="articles_id">
 							<input type="submit" name="vote_a_d" value="<?php t("Delete all rates"); ?>">
 						</form>
</div>
				<?php
						} 
			}
?>
	<!--Comments add part-->

	<div class="comment">
		<form class ="comment" method="post" action="comm_votes/v_controller.php">
  		<p><?php t("User"); ?>: <?php echo $_SESSION['user']; ?></p>
  		
  		<input type ="hidden" value="<?php echo $res['articles_id'];?>" name="articles_id">
  		<input type ="hidden" value="<?php echo $_SESSION['user'];?>" name="c_author">
  		<p><?php t("Theame"); ?>: <br><input type ="text" size ="75" name ="topic"></p>
   		<p><?php t("Your comment"); ?>: <Br><textarea name="comment" cols="75" rows="3"></textarea></p>
  		<p><input type="submit" name = "c_send"value="<?php t("Send"); ?>">
   		<input type="reset" value="<?php t("Clear"); ?>"></p>
 		</form>
	</div>
	<!--Outlet cooments-->
	<?php 
	$resulte = comm_get($res['articles_id']);
	if(!empty($resulte)){
	// Loop through each resulte which displaying comments.
 		foreach($resulte as $res) {
 		?>
		<div class="comment">
			<div><?php t("Theame"); ?>: <?php echo $res['topic']; ?><br> </div>
			<div><?php t("Comment"); ?>: <?php echo $res['comment']; ?><br> </div>
			<div><?php t("Author"); ?>: <?php echo $res['author']; ?><br> </div>
			<div><?php t("Date of adding"); ?>: <?php echo date("F j, Y, g:i a",$res["time"]); ?><br> </div>
			<?php
			if (isset($_SESSION['admin']) || $_SESSION['user'] == $res['author']){
			?>
			<a href="comm_votes/c_dell.php?c_dell=<?php echo $res['c_id']; ?>" class ="bott"><?php t("Delete"); ?></a>		
			<?php	
			}

			?>
		</div>

	<?php
		}//End of comments foreach loop.
	}else{
		echo t("No commets yet.");
	}

} else {

	//Display all articles.
	include_once("articles/controler.php");
	$obj = new Control();
	//Pager.
	$count = $obj->count_a();
	$on_page = '10';
	$sections = ceil($count/$on_page);
	$start = $sections * $on_page;
	$art = $obj->expres_all($start, $on_page);
	if (!empty($art)){


// Loop through each resulte.
 foreach($art as $res) {

?>
 <div class = "articles">
 <p>
 	<?php 
 	if(!isset($_SESSION['lang'])){
 	?>
 		<div><p><?php echo $res['articles_title'] ?></p></div>
		<div><p><?php echo $res['articles_content'].'...'; ?></p></div>
	<?php
	}elseif (isset($_SESSION['lang']) and $_SESSION['lang'] == 'ua') {
	?>
		<div><p><?php echo (empty($res['articles_title_ua'])) ? $res['articles_title'] : $res['articles_title_ua']; ?></p></div>
		<div><p><?php echo (empty($res['articles_content_ua'])) ? $res['articles_content'].'...' : $res['articles_content_ua'].'...'; ?></p></div>
	<?php 
	}
	?>

		<div><p><?php t("Author:"); ?><a href="user.php?id=<?php echo $res['articles_author'] ?>"> <?php echo $res['articles_author'] ?></a></p></div>
		<div><p><?php t("Date of adding:"); ?> <?php echo date('F j, Y, g:i a',$res['articles_data']) ?></p></div>
		<p><a class="bott" href="?id=<?php echo $res['articles_id'] ?>"><?php t("Read More"); ?></a>
	
		
		</p>
		 </p><br>
 </div>
 <?php

 } // End the foreach loop. 
 ?>
 <div class="pager">
 </div>

 <?php 

}else{
	echo "Here is empty, yet:)";
}

}	
function comm_get($articles_id){
	include_once "comm_votes/v_controller.php";
	$res = fetch_comments($articles_id);
	return $res;
}	
?>