<?php
require_once('./includes/functions/database.inc.php');
require_once('./includes/functions/users.inc.php');
require_once('./includes/functions/settings.inc.php');

function LoadTemplate($tpl_file, $vars = array()){
	extract($vars);
	ob_start();
	require($tpl_file);
	$LoadTemplate = ob_get_contents();
	ob_end_clean();
	return $LoadTemplate;
}
?>