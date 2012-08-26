<?php
include('./includes/loader.php');

$sPanelTitle = Core::GetSetting('panel_title');
$sRegistrationEnabled = Core::GetSetting('registration_enabled');
$sForgotPasswordEnabled = Core::GetSetting('forgotpassword_enabled');

if($LoggedIn === true)
{
	header("Location: main.php");
	die();
} 
else 
{
	if(empty($_GET['id']) || $_GET['id'] == 'login')
	{
		if(isset($_POST['submit']))
		{
			/* Form was submitted. */
			if((!empty($_POST['username'])) && (!empty($_POST['password'])))
			{
				$sErrorMessage = User::login($_POST['username'], $_POST['password']);
			} 
			else 
			{
				$sErrorMessage = "Username or password not specified.";
			}
		}
		else
		{
			$sErrorMessage = "";
		}
		
		$sPageContents = Templater::AdvancedParse('/blue_default/login', $locale->strings, array(
			'ErrorMessage'		=> $sErrorMessage,
			'RegistrationEnabled'	=> $sRegistrationEnabled->sValue,
			'ForgotPasswordEnabled'	=> $sForgotPasswordEnabled->sValue
		));
	}
	else
	{
		/* TODO: create a proper template for this. */
		$sPageContents = "Page not found";
		$sPageTitle = "Not found";
	}
	
	echo(Templater::AdvancedParse('blue_default/master.login', $locale->strings, array(
		'PanelTitle'	=> $sPanelTitle->sValue,
		'PageTitle'	=> "Login",
		'contents'	=> $sPageContents
	)));
}
?>
