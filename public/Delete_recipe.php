<?php # Script 9.5 - sign-up.php #2
// This script performs an INSERT query to add a record to the users table.
session_start();
require_once("scripts/php/connect.php");
if(!isset($_SESSION['uid'])){
    header("Location: index.html");
}
$page_title = 'Register';


/*
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "test";
    require('mysqli_connect.php'); // Connect DB
	$errors = []; // Initialize an error array.
    
    
}else{
    
}
*/

if(isset($_POST["submit"])){
    $uid = $_SESSION['uid'];
    $recipeId= $_POST["recipeId"];
    $SQL = "DELETE FROM recipe WHERE RecipeID = '$recipeId'";
    if(mysqli_query($conn, $SQL)){
        echo "Deleted Recipe";
    }
    else{
        echo "PROBLEM";
    }
}


?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Recipe Database</title>

	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

    <!-- This is a 3rd-party stylesheet for Font Awesome: http://fontawesome.io/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

    <link rel="stylesheet" href="./style.css" media="screen">

  </head>

  <body>

    <header>
      <!-- The <i> tag below includes the bullhorn icon from Font Awesome -->
     
 	<a href="#"><h1 class="site-title"> The Recipe Database</h1></a>
	 
	<nav class="navbar">
        <ul class="navlist">
          <li class="navitem navlink active"><a href="index.html">Home</a></li>
          <li class="navitem navlink"><a href="recipe.php">Recipe</a></li>
          <li class="navitem navlink"><a href="log-in.php">Login</a></li>
          <li class="navitem navlink"><a href="Sign-up.php">Register now</a></li>
          <li class="navitem navlink"><a href="createrecipe.php">Add a Recipe</a></li>
		  <li class="navitem navlink"><a href="Search_recipe.php">Search a Recipe</a></li>
		  <li class="navitem navlink"><a href="Delete_recipe.php">Delete Recipe</a></li>
          <li class="navitem navlink"><a href="Update_recipe.php">Update Recipe</a></li>
		  <li class="navitem navlink"><a href="About.html">About</a></li>
        </ul>
    </nav>		
	
	
    </header>
	
	<div class="container">
       <h1 class="title"> Delete Recipe</h1>
	   <div class="delete-container">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post"> Recipe ID*<br> 
                <input type="text" name="recipeId" id="recipeId" class="input"> <br>
			<button class="Submit" name="submit" id="Submit">Submit</button>
           </form>
	   </div>
    </div>

	
  </body>

  

</html>
