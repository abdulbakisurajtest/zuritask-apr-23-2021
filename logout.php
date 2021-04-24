<?php
session_start();
if(!empty($_SESSION['user']))
{
	unset($_SESSION);
}
session_destroy();
header("Location: login.php");
exit(0);
?>