<?php

function custom_date($date){
    if (!is_null($date) && $date !='0000-00-00')
        return date("d/m/Y H:i",strtotime($date));
}

function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }
     //print_r($sort_col);
    array_multisort($sort_col, $dir, $arr);
}

function file_upload($fileToUpload,$newNameFile=null){
    $uploadDirectory = BASE_PATH."uploads/";

    $errors = []; 

    $fileExtensions = ['gif','png','jpg','jpeg','bmp']; // Get all the file extensions

    if ($fileToUpload['error']==0){

        $fileName = $fileToUpload['name'];
        $fileSize = $fileToUpload['size'];
        $fileTmpName  = $fileToUpload['tmp_name'];
        $fileType = $fileToUpload['type'];
        $fileExtension = strtolower(end(explode('.',$fileName)));

        if (!is_null($newNameFile))
            $uploadFile = $newNameFile.'.'.$fileExtension;
            else $uploadFile = basename($fileName);

        $uploadPath = $uploadDirectory.$uploadFile; 

    
        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload image file";
        }

        if ($fileSize > 5000000) {
            $errors[] = "This file is more than 5MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $successUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($successUpload) {
                return $uploadFile;
            } else {
                return $errors[]="An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            return $errors;
        }
    
    }


}

function frmGet($id, $default = null)
{
    global $db;

	$ret = (isset($_REQUEST[$id]) && ("" != $_REQUEST[$id])) ? $_REQUEST[$id] : $default;
	if (is_string($ret)) $ret = trim($ret);
	if(!is_array($ret) && USE_MYSQL_ESCAPE)
		$ret = $db->real_escape_string(trim($ret));
	return $ret;
}

function clean_content($text){
    return mysql_escape_string(trim($text));
}

function set_phone_no($text){
    return filter_var($text, FILTER_SANITIZE_NUMBER_INT);


}

function truncate_long_text($input,$long=50){
        $input = strip_tags(preg_replace('~[\r\n]+~', '',$input));
        $str = $input;
        if( strlen( $input) > $long) {
            $str = explode( "\n", wordwrap( $input, $long));
            $str = $str[0] . '...';
        }
        return $str;
}

?>