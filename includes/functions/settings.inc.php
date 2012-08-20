<?php

// Defines the class as Settings
class Settings extends CPHPDatabaseRecordClass {

	// Select and load the settings table
	public $table_name = "settings";
	public $id_field = "id";
	public $fill_query = "SELECT * FROM settings WHERE `id` = :Id";
	public $verify_query = "SELECT * FROM settings WHERE `id` = :Id";
	public $query_cache = 1;
	
	// Define all of the variable names and their coresponding MYSQL collumn
	public $prototype = array(
		'string' => array(
			'SettingName' 	    => "setting_name",
			'SettingValue'	    => "setting_value",
			'SettingGroup'			=> "setting_group"
		)
	);
}
