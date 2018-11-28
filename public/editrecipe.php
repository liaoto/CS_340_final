<?php
session_start();
require_once('scripts/php/connect.php');

$recipeID = $_GET["recipeid"];

echo "THE RECIPE ID FOR EDITITING IS " . $recipeID; 

$sql = "SELECT r.RecipeID, r.RecipeName, r.RecipeDescription, r.Prep_time, r.Cook_time"


?>