<?php
require_once('globals.php');

if (DEBUG_ON ==1)
  error_reporting(E_ALL & ~E_NOTICE);
  else error_reporting(0);

require_once('functions.php');

// require_once('database.php');
// $db = new Database($config['db_server'], $config['db_username'], $config['db_password'], $config['db_name']);
// $dbConn=$db->connect();



?>