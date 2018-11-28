<?php


session_start();

if(isset($_SESSION['uid'])){

}
else{
	header("Location: login.php");
}


function getRecipeRow(){
	require_once('scripts/php/connect.php');

$sessionID = $_SESSION['uid'];
	$sql = "SELECT * FROM recipe WHERE User_id = '$sessionID'";
	
if($result = mysqli_query($conn, $sql)){
	
	while($row = mysqli_fetch_array($result)){
		$recipeID = $row["RecipeID"];
		echo "<div class='recipeRow'>" . $row['RecipeName'] . "<a href='editrecipe.php?recipeid=$recipeID' style='margin-left:20px;'>Edit Recipe</a></div>";
		
	}

}else{
	echo mysqli_error($conn);
}

}


?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Neucha" rel="stylesheet">
		<link rel="stylesheet" href="scripts/css/bodyWrapper.css">
		<link rel="stylesheet" href="scripts/css/header.css">
		<link rel="stylesheet" href="scripts/css/profile.css">
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
				<a href="createrecipe.php">Create a Recipe</a>
				<a href="logout.php">Logout</a>
			</div>
			<b>My Recipes</b>
			<?php getRecipeRow(); ?>
		</div>
		
	
	</body>
</html>