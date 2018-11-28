<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Neucha" rel="stylesheet">
		<link rel="stylesheet" href="scripts/css/bodyWrapper.css">
		<link rel="stylesheet" href="scripts/css/header.css">
		<link rel="stylesheet" href="scripts/css/registration.css">
		<script src="scripts/js/registration_validator.js"></script>
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
			</div>
			
			<div id="inner-body-content">
			
				<h1 style="display:block; margin:0; padding:0;">Create your free account</h1>
				<br>
				<b class="registration" name="errors" id="errors" style="margin:0; padding:0; display:block;"></b>
				<br>
				<br>
				<form method="POST" action="scripts/php/registerUser.php" onsubmit="return isReadyToSubmit()">
					<label class="registration">Username</label>
					<input class="registration" type="text" name="username" id="username" onkeyup="validateUsername()">
					<br>
					<label class="registration">Email</label>
					<input class="registration" type="text" name="email" id="email" onfocusout="validateEmailAddress()">
					<br>
					<label class="registration">Password</label>
					<input class="registration" type="password" name="pw" id="pw" onfocusout="validatePassword()">
					<br>
					<label class="registration">First Name</label>
					<input class="registration" type="text" name="fname" id="fname" onfocusout="validateFirstName()">
					<br>
					<label class="registration">Last Name</label>
					<input class="registration" type="text" name="lname" id="lname" onfocusout="validateLastName()">
					<br>
					<label class="registration">Age</label>
					<input class="registration" type="text" name="age" id="age" style="width:100px;" onfocusout="validateAge()">
					<br>
					<button class="registration" name="button" id="button">Register</button>
				</form>
			</div>
			
		</div>
		
		
	
	</body>
</html>