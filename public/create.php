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
		<link rel="stylesheet" href="scripts/css/createRecipe.css">
		<script src="scripts/js/create_recipe.js"></script>
        
           <meta charset="utf-8">
    <title>Recipe Database</title>

    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

    <!-- This is a 3rd-party stylesheet for Font Awesome: http://fontawesome.io/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

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
		<form name="recipe-upload-form" method="post" action="scripts/php/recipeValidator.php" onsubmit= "return validateForm()">
		
			<label class="createRecipe">Recipe Name</label>
			<input type="text" name="recipe-name" id="recipe-upload" class="createRecipe"></br>
			
			<label class="createRecipe">Meal Type (select all that apply)</label></br>
			<input type="checkbox" name="meal-time[]" value="breakfast" >Breakfast
			<input type="checkbox" name="meal-time[]" value="lunch">Lunch
			<input type="checkbox" name="meal-time[]" value="dinner">Dinner
			
			</br>
			</br>
			<label class="createRecipe">Prep Time(minutes)</label>
			<input type="text" id="recipe-upload" name="prep-time" class="createRecipe"></br>
			
			<label class="createRecipe">Cook Time(minutes)</label>
			<input type="text" id="recipe-upload" name="cook-time" class="createRecipe"></br>
			
			<label class="createRecipe">Description </label>
			<textarea name = "cooking-directions"></textarea>
			</br>
			</br>
			<label>Ingredients (qty/units/name)</label>
			
			
			<div id = "ingredients-list"></div></br>
			
			<button name="add-ingredient" id="add-ingredient" onclick="addIngredient()" type="button">Add ingredient</button>
			
			<input type="submit" value="submit" name="submit" style="margin-top:50px;">
			
		</form>
			
		</div>
			
		</div>
		
	
	</body>
</html>