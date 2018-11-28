<?php

//DB for my sandbox server

$host = "classmysql.engr.oregonstate.edu:3306";
$username = "cs340_limche";
$password = "qinger123";
$db = "cs340_limche";

//Actual variable that is used to connect to the db.
//When you utilize: require_once('connect.php'), you can use the $conn variable to initiate a connection
//For example, let's say that we want to make a connection on the homepage.  The developer would require_once('connect.php')
//and then use the $conn variable on this page prior to making any queries :)

$conn = mysqli_connect($host, $username, $password, $db);


//Should also include some try catch or if statements to ensure that we are connected, but for time constraints, assume that
//the above works just fine ;)


?>