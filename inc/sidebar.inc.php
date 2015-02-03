sidebar
<a href="index.php">Home</a><br>
<?php
if(isset($_SESSION['user'])){
echo '<a href="add.php">Add news</a>';	
} 

