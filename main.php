<?php
include('./includes/loader.php');

$sPanelTitle = Core::GetSetting('panel_title');

	if($LoggedIn === false){
		header("Location: index.php");
		die();
	} else {
		$content = Templater::AdvancedParse('/blue_default/main', $locale->strings, array(
		'PageTitle'  => $sPanelTitle->sValue,
		'ErrorMessage'	=>	"",
		'Username'	=>	$sUser->sUsername
		));
	echo $content;
	}
?>
