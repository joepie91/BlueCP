<?php

class Domain extends CPHPDatabaseRecordClass {

	// Select and load the accounts table
	public $table_name = "domains";
	public $id_field = "id";
	public $fill_query = "SELECT * FROM domains WHERE `id` = :Id";
	public $verify_query = "SELECT * FROM domains WHERE `id` = :Id";
	public $query_cache = 1;
	
	// Define all of the variable names and their coresponding MYSQL collumn
	public $prototype = array(
		'string' => array(
			'Name'			=> "domain_name"
		),
		'boolean' => array(
			'Active'		=> "active"
		),
		'numeric' => array(
			'OwnerId'		=> "user_id"
		),
		'user' => array(
			'Owner'			=> "user_id"
		)
	);
}
