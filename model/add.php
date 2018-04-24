<?php
require_once('init.php');

require_once('database.php');
$db = new Database($config['db_server'], $config['db_username'], $config['db_password'], $config['db_name']);
$dbConn=$db->connect();

// form field names and their translations.

$expectedFields = array('name' => 'Name', 'email' => 'Email'); 

// message that will be displayed when everything is OK :)
$okMessage = 'Add form successfully submitted. Thank you!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

$responseArray=array();

$act=frmGet('act'); // check if our form was submitted
if ($act=='1'){
	$isAdmin=frmGet('isadmin');
	if ($isAdmin != '1'){
		$responseArray = array('type' => 'danger', 'message' => 'Is admin not checked');
	} else if (!isset($_FILES['image']['name']) || $_FILES['image']['name'] ==''){
		$responseArray = array('type' => 'danger', 'message' => 'No image upload');
	}
	 else {
		$sql = "INSERT INTO records SET ";
		foreach($expectedFields as $field=>$value){
			$fieldVal=frmGet($field);
			$sql.= ' records_'.$field."= '".$fieldVal."',";
		}

		$db->execute($sql.=' records_date=NOW()');
		$fileUploaded=file_upload($_FILES['image'],$db->lastInsertId);
		if (is_array($fileUploaded)){
			$responseArray = array('type' => 'danger', 'message' => implode(' ',$fileUploaded));
			$db->execute("DELETE FROM records WHERE records_id='{$db->lastInsertId}'");
		} else {
			$responseArray = array('type' => 'success', 'message' => $okMessage);
			$db->execute("UPDATE records SET records_file='{$fileUploaded}' WHERE records_id='{$db->lastInsertId}'");
		}

	}
} else $responseArray = array('type' => 'danger', 'message' => $errorMessage);


echo json_encode($responseArray);



?>
