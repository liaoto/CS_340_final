
<?php
	
	require_once "../connect.php";
	$rowId = $_POST["rowId"];
	$dirName = $_POST["dir"];
	$delRecipeQuery = "DELETE FROM recipes WHERE recipe_id = " . $rowId ;
	
	mysqli_query($conn, $delRecipeQuery);
	
	//Add AND recipe_dir = $dirName
	$delRecipeIngredients = "DELETE FROM recipe_ingredients WHERE recipe_id = " . $rowId;
	
	
	mysqli_query($conn, $delRecipeIngredients );
	
	
	
	
	$pathToRecipeDir = $_SERVER["DOCUMENT_ROOT"]. "/cook/img/recipes/" . $dirName; 
	
	removeDirectory($pathToRecipeDir);
	
	//Recursive call to remove everything in the recipe directory
	function removeDirectory($dir){
    
		foreach (glob($dir) as $file){
			if(is_dir($file)){ 
				
				removeDirectory("$file/*");
				rmdir($file);
				echo "Directory and data removed from db";
			} 
			else{
            
				unlink($file);
			}
		
		}
	}
	
?>

