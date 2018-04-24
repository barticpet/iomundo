<?php
include_once "model/init.php";
include_once("model/database.php");
include_once("model/records.php");

class Model 
{
	protected $db;
	protected $records;
	
	
	public function __construct() 
    {  
		global $config;

		$this->db = new Database($config['db_server'], $config['db_username'], $config['db_password'], $config['db_name']);
		$this->db->connect();
		
		$this->records = new records($this->db,$config);

	} 

	public function records_list()
	{
		return $this->records->list();
	}
	
	
	

}

?>
