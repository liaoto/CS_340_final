<?php
require_once('connect.php');

//String to check gets the myString var from ajax
//tableCol gets the myCol var from ajax

//This page should also validate form data
//TODO: check for special characters like /\
//Validate email address (check for min length and an @ symbol)

$username = $_POST["username"];

$query = mysqli_query($conn, "SELECT Username FROM users WHERE Username = '$username' ");

if(mysqli_num_rows($query) !=0){
		
		echo 1;
	}
	else{
		echo 0;
	}
	


?>