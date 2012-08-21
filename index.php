<?php
include('./includes/loader.php');

	if($LoggedIn === true){
		header("Location: member_home.php");
	} else {

		if($_GET['id'] == 'login'){
		$error_message = User::login($_GET['username'], $_GET['password']); /* You really shouldn't be using GET for this.. */
		}
		echo Templater::AdvancedParse('/blue_default/index', $locale->strings, array(
		'LoggedIn' => $LoggedIn,
		'PageTitle'  => 'BlueCP Login',
		'TemplatePath'	=>	'./templates/blue_default'
		));
	}
?>
