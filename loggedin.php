<?php 
	session_start();
	$_SESSION["logged"] = true;
	header("Location: ./index.php");
?>