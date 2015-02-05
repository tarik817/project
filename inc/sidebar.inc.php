<a class="bott" href="index.php">Home</a><br>
<?php
if(isset($_SESSION['user'])){
echo '<a href="add.php" class="bott">Add news</a>';	
} 

