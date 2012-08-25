<?php
class Settings {

	public function LoadSetting($SettingName){
		global $database;
		$SettingArray = $database->select('settings', '*', "setting_name = '$SettingName'");
		return $SettingArray['0']['setting_value'];
	}
}
		