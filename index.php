<?php 
	include_once("controller/controller.php");
	
	$controller = new Controller();
	
	$page="index";

	$expected_links=array('index','admin');
	
	if (!empty($_REQUEST["url"]) && in_array($_REQUEST["url"],$expected_links)) 
	
		$page=$_REQUEST["url"];
	
	$controller->$page();

?>
