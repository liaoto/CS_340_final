<?php # Script 9.5 - recipe.php #2
// This script performs an Select query to display recipe to our users.
$page_title = 'Search';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 require('mysqli_connect.php'); // Connect DB
    
   
    if (empty($_POST['search'])) {
		 echo '<a href="#"><h1 class="site-title">The search input is empty.</h1></a>';// print/update value
        
    } else {
		$searchinput = mysqli_real_escape_string($dbc, trim($_POST['search']));
        $sql = "SELECT * FROM recipe WHERE RecipeName = '$searchinput'";
        $result = $dbc->query($sql);
        echo '<a href="#"><h1 class="site-title">Search Result</h1></a><div class="container">';
        // Output of table header
        if ($result->num_rows > 0) { 
            echo "<table style = 'border: 1px solid black; width: 80%;'><tr><th style = 'border: 1px solid black;'>Recipe ID</th><th style = 'border: 1px solid black;'>Recipe Name</th><th style = 'border: 1px solid black;'>Recipe Description</th><th style = 'border: 1px solid black;'>Preperation Time</th><th style = 'border: 1px solid black;'>Cook Time</th></tr>"; 
            // output data of each row
            while($row = $result->fetch_assoc()) {    
                echo "<tr><td style = 'border: 1px solid black;'>".$row["RecipeID"]."</td><td style = 'border: 1px solid black;'>".$row["RecipeName"]."</td><td style = 'border: 1px solid black;'>".$row["RecipeDescription"]."</td><td style = 'border: 1px solid black; width: 7%'>".$row["Prep_time"]."</td><td style = 'border: 1px solid black;'>".$row["Cook_time"]."</td></tr>";
            }
            
            echo '</table><br><br><br>';
            
        } else {
            echo "<table style = 'border: 1px solid black; width: 80%;'><tr><th style = 'border: 1px solid black;'>0 results</th></tr></table></div>";
        }    
        echo "<br>";
        // Output the instruction using JOIN statement 
       
        $sql2 = "SELECT recipe.RecipeName, recipe.Prep_time, recipe_instruction.Instruction_Description FROM recipe JOIN recipe_instruction ON recipe.RecipeID = recipe_instruction.RecipeID WHERE recipe.RecipeName = '$searchinput';";
        
        
        $result2 = $dbc->query($sql2);
   
        // Output of table header
        if ($result2->num_rows > 0) { 
            echo "<table style = 'border: 1px solid black; width: 80%;'><tr><th style = 'border: 1px solid black;'>Recipe Name</th><th style = 'border: 1px solid black;'>Preperation Time</th><th style = 'border: 1px solid black;'>Instruction_Description</th></tr>"; 
            // output data of each row
            while($row = $result2->fetch_assoc()) {    
                echo "<tr><td style = 'border: 1px solid black;'>".$row["RecipeName"]."</td><td style = 'border: 1px solid black;'>".$row["Prep_time"]."</td><td style = 'border: 1px solid black;'>".$row["Instruction_Description"]."</td></tr>";
            }
            echo "</table></div>";           
            
        } else {
            echo "<table style = 'border: 1px solid black; width: 80%;'><tr><th style = 'border: 1px solid black;'>0 results</th></tr></table></div>";
        }    
        
        
    }
}
else{
    
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
       <h1 class="title"> Search a Recipe</h1>
	   <div class="search-container">
			<form action="Search_recipe.php" method="post"> 
                <p>Enter a Recipe_name*<br> <input type="text" name="search"</p> <br> 
                <p><input type="submit" name="submit" value="Submit"></p>
               </form>
           </form>

	   </div>
    </div>

	
  </body>

  

</html>