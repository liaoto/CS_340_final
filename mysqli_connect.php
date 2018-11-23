<?php # Connect 9.2 - mysqli_connect.php

// This file cntains the database access information.
// This file also establishes a connection to MySQL,
// selects the database and sets the encoding

// Please change the credential according to yours

define('DB_USER', 'username');
define('DB_PASSWORD', 'password');
define('DB_HOST','host');
define('DB_NAME','db_name');

// Make the connection:

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' .mysqli_connect_error());

// Set the encoding...
mysqli_set_charset($dbc,'utf8');

?>