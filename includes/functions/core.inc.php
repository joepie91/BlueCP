<?php
class Core {
	static function GetSetting($setting){
		global $database;
		$result = $database->CachedQuery("SELECT * FROM settings WHERE `setting_name` = :Setting", array(':Setting'	=> $setting));
		return new Setting($result);
	}
}