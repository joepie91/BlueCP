<?php
include('./includes/loader.php');

	if($LoggedIn === true){
		header("Location: member_home.php");
	} else {
		if(!empty($_GET['id']))
		{
			if($_GET['id'] == 'login'){
				$error_message = User::login($_POST['username'], $_POST['password']); /* I wasn't using GET for this I just made a mistake. The HTML was POST... */
			}
		}
			
		echo Templater::AdvancedParse('/blue_default/index', $locale->strings, array(
			'LoggedIn' => $LoggedIn,
			'PageTitle'  => 'BlueCP Login'
		));
	}
?>
