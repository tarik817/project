<a class="bott" href="index.php">Home</a><br>
<a class="bott" href="user.php?display">Users</a><br>
<?php
if(isset($_SESSION['e_user'])){
echo '<a href="add.php" class="bott">Add news</a>';	
} 

