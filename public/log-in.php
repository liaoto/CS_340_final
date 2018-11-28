<?php

//session_start();

if(isset($_SESSION['uid'])){
	echo"User is logged in";
	header("Location: index.php");
}

?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Neucha" rel="stylesheet">
		<link rel="stylesheet" href="scripts/css/bodyWrapper.css">
		<link rel="stylesheet" href="scripts/css/header.css">
		<link rel="stylesheet" href="scripts/css/registration.css">
        	
        <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
		
        <link rel="stylesheet" href="./style.css" media="screen">
	</head>
	<style>
		body{
			margin:0;
			padding:0;
			background-color:white;
			
		}
		
		
	</style>
    
    <a href="#"><h1 class="site-title"> The Recipe Database</h1></a>
	 
	<nav class="navbar">
        <ul class="navlist">
          <li class="navitem navlink active"><a href="index.html">Home</a></li>
          <li class="navitem navlink"><a href="recipe.php">Recipe</a></li>
          <li class="navitem navlink"><a href="log-in.php">Login</a></li>
          <li class="navitem navlink"><a href="Sign-up.php">Register now</a></li>
          <li class="navitem navlink"><a href="create.php">Add a Recipe</a></li>
		  <li class="navitem navlink"><a href="Search_recipe.php">Search a Recipe</a></li>
		  <li class="navitem navlink"><a href="Delete_recipe.php">Delete Recipe</a></li>
          <li class="navitem navlink"><a href="Update_recipe.php">Update Recipe</a></li>
		  <li class="navitem navlink"><a href="About.html">About</a></li>
        </ul>
    </nav>		
    
    
	<body>
	
            
                   
            <div class="container">
                <br>
                <h1 style="display:block; margin:0; padding:0;">Login</h1>
                <br><br>
				<form method="POST" action="scripts/php/login.php">
					<label class="registration">username</label>
					<input class="registration" type="text" name="username" id="username" onfocusout="validateEmailAddress()">
					<br>
					<label class="registration">Password</label>
					<input class="registration" type="password" name="pw" id="pw" onfocusout="validatePassword()">
					<br>
					<button class="registration" name="login" id="login">Log in</button>
				</form>
			
		</div>
        </div>		
	
	</body>
</html>