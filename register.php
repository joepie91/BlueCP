<?php
include('./includes/loader.php');

$sPanelTitle = Core::GetSetting('panel_title');
$sRegistrationEnabled = Core::GetSetting('registration_enabled');

if($sRegistrationEnabled->sValue == 'enabled')
{
	if($LoggedIn === true)
	{
		header("Location: main.php");
		die();
	} 
	else 
	{
		if(empty($_GET['id']) || $_GET['id'] == 'register')
		{
			if(isset($_POST['submit']))
			{
				/* The form was submitted. */
				$sErrorMessage = User::register($_POST['username'], $_POST['passwordone'], $_POST['passwordtwo'], $_POST['email']);
			}
			else
			{
				$sErrorMessage = "";
			}
			
			$sPageContents = Templater::AdvancedParse('blue_default/register', $locale->strings, array(
				'ErrorMessage'	=> $sErrorMessage
			));
			
			$sPageTitle = "Register";
		}
		elseif($_GET['id'] == 'activate')
		{
			$sPageContents = Templater::AdvancedParse('blue_default/activate', $locale->strings, array(
				'PanelTitle'	=> $sPanelTitle->sValue
			));
			
			$sPageTitle = "Activate";
		}
		else
		{
			/* TODO: create a proper template for this. */
			$sPageContents = "Page not found";
			$sPageTitle = "Not found";
		}
		
		echo(Templater::AdvancedParse('blue_default/master.login', $locale->strings, array(
			'PanelTitle'	=> $sPanelTitle->sValue,
			'PageTitle'	=> $sPageTitle,
			'contents'	=> $sPageContents
		)));
	}
}
?>
