<?php

$url= "localhost";
$usr= "root";
$pw= "";
$db = "cook";


//$conn = mysqli_connect($url, $usr, $pw, $db);
$conn = new mysqli($url, $usr, $pw, $db);

if(!$conn){
	//echo "Cannot connect to database";
	exit;
}
else{
	//echo "connected!";
}


?>