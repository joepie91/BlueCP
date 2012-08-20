<?php
include('./includes/loader.php');

	if($LoggedIn === true){
		header("Location: member_home.php");
	} else {

		if($id == 'login'){
		$error_message = User::login($uUsername, $uPassword);
		}
		echo Templater::AdvancedParse('/blue_default/index', $locale->strings, array(
		'LoggedIn' => $LoggedIn,
		'PageTitle'  => 'BlueCP Login',
		'TemplatePath'	=>	'./templates/blue_default'
		));
	}
?>