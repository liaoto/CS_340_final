<?php
	
	
	function queryRecipeRowData(){
	
	require "mysqli_connect.php";	
	$query = "SELECT * FROM recipes ORDER BY recipe_name";
	$result = mysqli_query($conn, $query);
	
	
	while($row = mysqli_fetch_assoc($result)){
		
		$row_id = $row["RecipeID"];
		$recipe_name = $row["RecipeName"];
		$recipe_dir = $row["recipe_directory"];
		
		echo "<div class = 'rowData' id=".$row_id.">". 
			
			"<span>". $row_id ."</span>" .
			"<span>". $recipe_name ."</span>" .
			"<span>". $recipe_dir."</span>" .
			
		
		"</div>";
		
	}
	
	mysqli_close($conn);

}
	
	

?>

<html>
	<head>
		
		<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
		
		
		<style>
			body{
				
				background-color:white;
				font-size:12px;
				margin:0;
				font-family: 'Questrial', sans-serif;
			
			}
			
			#container{
				width:1366px;
				
				min-height:768px;
				height:auto;
				margin-left:auto;
				margin-right:auto;
				background-color:#E8E8E8;
				
				
			
			}
			
			#header{
				width:inherit;
				height:auto;
				
				background-color:white;
				
				font-size:75px;
				//text-align:center;
				color:#464646;
				
			}
			
			#header span{
				font-weight:100;
				font-size:24px;
			}
			
			#nav{
				width:inherit;
				height:50px;
				line-height:50px;
				background-color:white;
				margin-top:1px;
				font-size:18px;
				font-family: 'Questrial', sans-serif;
				//text-align:center;
				margin-bottom:1px;
				
			}
			
			#nav a{
				color:black;
				text-decoration:none;
				
				display:inline-block;
				min-width:75px;
			}
			
			#nav a:hover{
				background-color:#FED701;
				border-radius:3px;
				
			}
			
			.recipeContainer{
				width:inherit;
				height:200px;
				background-color:white;
				margin-bottom:1px;
				line-height:200px;
				color:black;
				font-size:14px;
			}
			
			.recipeContainer label{
				font-size:14px;
			}
			
			
		</style>
	</head>
	
	<body>
		<div id="container">
		
			<div id="header">
		
				<span>Good =^..^=Nomming</span>
			
			</div>
		
			<div id="nav">
		
				<a href="index.html">Home</a>
				<a href="recipes.php">Recipes</a>
				<a href="#">What's New</a>
				<a href="#">Popular</a>
				<a href="#">Share</a>
				<a href="create.html">Create a Recipe</a>
			
			</div>
			<div class="recipeContainer"><label>Test</label></div>
			
		</div>
	
	</body>
</html>
	