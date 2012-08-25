<?php
include('./includes/loader.php');

$settings = new Settings;
$template = "./templates/".$settings->LoadSetting('template')."/".$_SERVER['PHP_SELF'];

if(isset($_GET['id'])){
	if($_GET['id'] == 'login'){
	
	}
}
echo LoadTemplate($template, $vars = array());
?>
