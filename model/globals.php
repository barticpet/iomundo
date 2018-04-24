<?php

	define('DEBUG_ON','1');
	define('USE_MYSQL_ESCAPE',true);

	define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/iomundo/');
	define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].'/iomundo/'); // URL
	define('BASE_URL_UPLOAD','http://'.$_SERVER['HTTP_HOST'].'/iomundo/uploads/'); // URL

	$config['db_server']="localhost";
	$config['db_username']="root";
	$config['db_password']="";
	$config['db_name']="r53254next_iomundo";

	$config['noPerPage'] =5;
?>
