<?php
include_once("model/model.php");

class Controller 
{
	protected $model;
	
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	
	public function index()
	{
		include_once "view/index.php";
	}
	
	
	public function admin()
	{
		$recordsList=$this->model->records_list();
		//print_r($recordsList);
		include_once "view/admin.php";
	}

	

}

?>
