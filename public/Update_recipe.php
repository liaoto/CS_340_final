<?php
session_start();

$uid = $_SESSION['uid'];

require_once('scripts/php/connect.php');


if(isset($_POST["submit"])){
    
    $recipeId= $_POST["recipeId"];
    $namechange= $_POST["changeName"];
    $changeDescription= $_POST["changeName"];
    $changePrepTime = $_POST["changePrepTime"];
    $changeCookTime = $_POST["changeCookTime"];
    if(!empty($recipeId) && !empty($namechange) && !empty($changeDescription) && !empty($changePrepTime) && 
    
       !empty($changeCookTime)){
        
            $sql = "UPDATE recipe SET RecipeName = '$namechange', RecipeDescription = '$changeDescription', Prep_time = '$changePrepTime', Cook_time = '$changeCookTime' WHERE User_id = '$uid' AND RecipeID = '$recipeId' ";

            if(mysqli_query($conn, $sql)){
                echo "Recipe " . $recipeId ." has been updated<br>";
                echo "New Name: ". $namechange . "<br>New Description: " . $changeDescription . "<br>New Prep Time: " . $changePrepTime . "<br>New Cook Time " . $changeCookTime . "<br>";
            }
        
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
          <li class="navitem navlink"><a href="create.php">Add a Recipe</a></li>
		  <li class="navitem navlink"><a href="Search_recipe.php">Search a Recipe</a></li>
		  <li class="navitem navlink"><a href="Delete_recipe.php">Delete Recipe</a></li>
          <li class="navitem navlink"><a href="Update_recipe.php">Update Recipe</a></li>
		  <li class="navitem navlink"><a href="About.html">About</a></li>
        </ul>
    </nav>		
	
    </header>
<div class="container">
    
    <h1>Update recipe. (Must update all)</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Select a recipe ID to change name</label>
    <br>
    <input type="text" name="recipeId" id="recipeId">
    <br>
    <label>What would you like to rename the recipe to?</label>
    <br>
    <input type="text" name="changeName" id="changeName">
    <br>
    <label>Change Description</label>
    <br>
    <textarea type="text" name="changeDescription" id="changeDescription"></textarea>
    <br>
    <label>Change Cook Time</label>
    <br>
    <input type="text" name="changeCookTime" id="changeCookTime">
    <br>
    <label>Change Prep Time</label>
    <br>
    <input type="text" name="changePrepTime" id="changePrepTime">
    <br><br>
    <input type="submit" value="update name" id="submit" name="submit">
</form>
      </div>
      </body>

  

</html>
