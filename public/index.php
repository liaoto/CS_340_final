<?php
session_start();

if(isset($_SESSION['uid'])){
	echo"User is logged in";
}
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Neucha" rel="stylesheet">
		<link rel="stylesheet" href="scripts/css/bodyWrapper.css">
		<link rel="stylesheet" href="scripts/css/header.css">
	</head>
	<style>
		body{
			margin:0;
			padding:0;
			background-color:white;
			
		}
		
		
	</style>
	<body>
	
		<div id="body-wrapper">
			<div id="header">
				<span>Cooking with Databases!</span>
				<a href="index.php">Home</a>
				<a href="register.php">Register</a>
				<a href="login.php">Login</a>
				<a href="recipes.php">Recipes</a>
				<a href="search.php">Home</a>
				<a href="profile.php">My Profile</a>
				<a href="search.php">Search Recipes</a>
				<a href="create.php">Create a Recipe</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
		
	
	</body>
</html>