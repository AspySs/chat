<?php
session_set_cookie_params(0);
session_start();

$_SESSION["auth"] = true;
$id+=1;
echo $id;
$_SESSION["pop"] = $id;




?>

<form method="POST" action="">
	<input type="submit" name="done" value="done">
</form>