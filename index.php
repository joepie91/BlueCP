<?php
include('./includes/loader.php');

$sPanelTitle = Core::GetSetting('panel_title');
$sRegistrationEnabled = Core::GetSetting('registration_enabled');
$sForgotPasswordEnabled = Core::GetSetting('forgotpassword_enabled');
	if($LoggedIn === true){
		header("Location: member_home.php");
		die();
	} else {
		if(!empty($_GET['id'])){
			if($_GET['id'] == 'login'){
				if((!empty($_POST['username'])) && (!empty($_POST['password']))){
					$sErrorMessage = User::login($_POST['username'], $_POST['password']); /* I wasn't using GET for this I just made a mistake. The HTML was POST... */
					if($sErrorMessage == NULL){ $sErrorMessage = "Username or Password Incorrect!"; }
				} else {
					$sErrorMessage = "Invalid Username or Password!";
				}
			} else { die("Error: Invalid variable value in variable id"); }
		
				echo Templater::AdvancedParse('/blue_default/login', $locale->strings, array(
				'LoggedIn' => $LoggedIn,
				'PageTitle'  => $sPanelTitle->sValue,
				'ErrorMessage'	=>	$sErrorMessage,
				'RegistrationEnabled'	=> $sRegistrationEnabled->sValue,
				'ForgotPasswordEnabled'	=> $sForgotPasswordEnabled->sValue
				));
		} else {
				echo Templater::AdvancedParse('/blue_default/login', $locale->strings, array(
				'LoggedIn' => $LoggedIn,
				'PageTitle'  => $sPanelTitle->sValue,
				'ErrorMessage'	=>	"",
				'RegistrationEnabled'	=> $sRegistrationEnabled->sValue,
				'ForgotPasswordEnabled'	=> $sForgotPasswordEnabled->sValue
				));
		}
	}
?>
