<?php
	session_start();
	session_destroy();
	setcookie("ID", $_COOKIE["ID"], time() - 3600);
	
	header('location: mainp.php');
?>