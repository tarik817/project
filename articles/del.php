<?php
if(isset($_GET['id'])) && is_numeric($_GET['id']))){
	confirm_del();

}



function confirm_del(){

return <<<FORM
<form action="/simple_blog/admin.php" method="post">
	<fieldset>
		<legend>Are You Sure?</legend>
		<p>Are you sure you want to delete the entry
		"$e[title]"?
		</p>
		<input type="submit" name="submit" value="Yes" />
		<input type="submit" name="submit" value="No" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="url" value="$url" />
	</fieldset>
</form>
FORM;


}
	



?>