<?php

$theFile = $_FILES["pending_files"];
$fullPathToDest =  $_SERVER["DOCUMENT_ROOT"]. "/cook/test/img/";

echo uploadToDir($theFile, $fullPathToDest);
	

function uploadToDir($theFile, $fullPathToDest){


$randoName = md5($randoName);
$randoName = $randoName . uniqid($md5Name);
$ext = pathinfo($theFile["name"], PATHINFO_EXTENSION);
$randoName = $randoName.".".$ext;


	
	move_uploaded_file($theFile["tmp_name"], $fullPathToDest . $randoName );

//Handle file limitations and do some security checks you doofus!
return "Files Uploaded Successfully.";
}

?>