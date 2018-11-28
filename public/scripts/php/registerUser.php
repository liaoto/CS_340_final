<?php
require_once('connect.php');

$username = $_POST["username"];
$email = $_POST["email"];
$pw = $_POST["pw"];
$fname = $_POST["fname"];
$lname= $_POST["lname"];
$age = $_POST["age"];

$pwHash = password_hash($pw, PASSWORD_DEFAULT);

echo $username;
echo "<br>";

echo $email;
echo "<br>";

echo $fname;
echo "<br>";

echo $lname;
echo "<br>";

echo $age;
echo "<br>";

echo $pw;
echo "<br>";

echo $pwHash;
echo "<br>";

$sql = "INSERT INTO users (Username, Password_hash, firstName, lastName, email, age) VALUES ('$username', '$pwHash', '$fname', '$lname', '$email', '$age')";

if(mysqli_query($conn, $sql)){
	echo "Thank you " . $fname . " for registering.  You will be redirected shortly";
	header('Refresh: 3; url=../../login.php');
}
else{
	echo "There was an error creating your account. Redirecting you back to the homepage shortly.";
	echo "<br>";
	echo mysqli_error($conn);
}


?>
