<?php
require_once('./includes/db.php');
require_once('./includes/functions.php');

if(isset($_SESSION['user_id'])){
	$sUser = new User($_SESSION['user_id']);
	$LoggedIn = true;
	header("Location: main.php");
	die();
} else {
	$LoggedIn = false;
}

$ErrorMessage = NULL;
?>
