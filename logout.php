
<?php
session_start();
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['mail']);
header('location:index.php');
die();

	/*session_start();
	session_destroy();
	header("location:index.php"); */

?>

