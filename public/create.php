<html>
	<head>
		
		<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type='text/javascript'>
		 
			window.onload = function(){
				
				console.log("Document Loaded");
				
				
				
					
			
			};
		 
			var ingredientCounter = 0;
			//Adds new input fields for ingredients
			//Should separate into different functions but since it's being called from a button press
			//Keep it organized silly!
			//TODO: Most of the styling should be done outside of javascript
			function addIngredient(){
				ingredientCounter++;
				var myDiv = document.getElementById("ingredients-list"); //Div to append to 
				
				//Ingredient quantity input and styling
				var ingredientQty = document.createElement("input");
				ingredientQty.type = "text";
				ingredientQty.name="ingredient-qty[]"; ////////////////////////////
				ingredientQty.style.width = "50px";
				ingredientQty.style.height = "30px";
				ingredientQty.style.marginBottom = "5px";
				ingredientQty.style.marginRight = "5px";
				ingredientQty.id = ingredientCounter; //Assigning counter to element id
				
				//Dropdown for ingredient units
				var select = document.createElement("select");
				select.name = "ingredient-unit[]"; ///////////////////////
				select.id = ingredientCounter; //Assigning counter to element id
				select.style.width = "100px";
				select.style.height = "30px";
				select.style.marginRight = "5px";
				
				select.options.add(new Option("", ""));
				select.options.add(new Option("tsp", "tsp"));
				select.options.add(new Option("tbsp", "tbsp"));
				select.options.add(new Option("cup", "cup"));
				select.options.add(new Option("pint", "quart"));
				select.options.add(new Option("gallon", "gallon"));
				select.options.add(new Option("ml", "ml"));
				select.options.add(new Option("l", "l"));
				select.options.add(new Option("lb", "lb"));
				select.options.add(new Option("oz", "oz"));
				select.options.add(new Option("mg", "mg"));
				select.options.add(new Option("g", "g"));
				select.options.add(new Option("kg", "kg"));
				select.options.add(new Option("mm", "mm"));
				select.options.add(new Option("cm", "cm"));
				select.options.add(new Option("m", "m"));
				select.options.add(new Option("in", "in"));
				select.options.add(new Option("ft", "ft"));
				select.options.add(new Option("pinch", "pinch"));
				select.options.add(new Option("bunch", "bunch"));
				
				
				//Ingredient name input and styling 
				var ingredientName = document.createElement("input");   //Ingredient input
				// ingredient styling
				ingredientName.type = "text";
				ingredientName.name="ingredient-name[]"; //////////////////
				ingredientName.id = ingredientCounter; //Assigning counter to element id
				ingredientName.style.width = "500px";
				ingredientName.style.height = "30px";
				ingredientName.style.marginBottom = "5px";
				
				//Remove button
				var removeButton = document.createElement("button");
				removeButton.name = "remove";
				removeButton.type = "button";
				removeButton.innerHTML = "X";
				removeButton.style.width = "30px";
				removeButton.style.height = "30px";
				removeButton.style.marginLeft = "5px";
				removeButton.style.border = "thin solid red";
				removeButton.style.backgroundColor = "white";
				removeButton.style.color = "red";
				removeButton.style.display = "inline-block";
				removeButton.id = ingredientCounter; //Assignming counter to element id
				
				//Add listener to button to remove stuff
				removeButton.addEventListener("click", function(){
					//Should really put all of the ingredient stuff in a div...
					
					myDiv.removeChild(ingredientQty);
					myDiv.removeChild(select);
					myDiv.removeChild(ingredientName);
					myDiv.removeChild(removeButton);
					
					
				});
				
				//Adding to div
				var br = document.createElement("br"); //Line breaks
				
				myDiv.appendChild(ingredientQty); //Add ingredient input
				myDiv.appendChild(select); //Dropdown units
				myDiv.appendChild(ingredientName); //Add ingredient input
				myDiv.appendChild(removeButton);
				
				myDiv.appendChild(br); //Line break
				
				
				
			}
			
			
			
			
			function validateForm(){
				
				//Handle the name of recipe
				var name = document.forms["recipe-upload-form"]["recipe-name"].value;
				
				//if empty
				if(name == ""){
				
					alert("Name cannot be empty");
					
					return false;
				}
				
				//Name length constraints
				if(name.length <= 3){
				
					alert("Recipe name must be longer than three characters");
					
					return false;
				}
				
				
				//regex, validate name of recipe
				//var letterNumber = /^[0-9a-zA-Z]+$/;
				var letterNumber = /([A-Za-z0-9\-\_]+)/;
				if(name.match(letterNumber)){
					//Good match
				}
				else{
					alert("Only letters and numbers please");
					return false;
				}
				
				
				//Checks for at least one meal time (checkboxes) 
				var mealTimes = document.getElementsByName("meal-time[]");
				var meals = 0;
				//Loop over array to check whether a box has been selected
				for(var i = 0; i < mealTimes.length; i++){
					
					if(mealTimes[i].checked){
						meals++;
					}
					
				}
				if(meals == 0){
				
					alert("Please select at least one meal type");
					return false;
				
				}
				
				//Validate prep time, numbers only
				var prepTime = document.forms["recipe-upload-form"]["prep-time"].value;
				
				if(prepTime == ""){
					
					alert("Please enter prep time");
					return false;
				
				}
				
				if(isNaN(prepTime)){
					
					alert("Please enter a number for prep time");
					return false;
				
				}
				
				
				//Validate cook time, numbers only
				var cookTime = document.forms["recipe-upload-form"]["cook-time"].value;
				
				if(cookTime == ""){
					
					alert("Please enter cook time");
					return false;
				
				}
				
				if(isNaN(cookTime)){
					
					alert("Please enter a number for cook time");
					return false;
				
				}
				
				//Validate textarea
				var directions =  document.forms["recipe-upload-form"]["cooking-directions"].value;
				
				if(directions == ""){
					
					alert("Directions are needed!");
					return false;
				
				}
				
				//validate ingredients
				
				
				//Check to see if an ingredient field is empty
				var ingredients = document.getElementsByName("ingredient-name[]");
				//var ing = 0;
				//Loop over array to check if ingredient names are empty
				for(var i = 0; i < ingredients.length; i++){
				
					if(ingredients[i].value == ""){
						
						alert("Ingredient must have a name!");
						return false;
					
					}
					
					
				}
				
				//Check to see if quantity fields have been filled out
				var ingredientsQty = document.getElementsByName("ingredient-qty[]");
				
				for(var i = 0; i < ingredientsQty.length; i++){
						
					if(ingredientsQty[i].value == ""){
						
						alert("Ingredient must have a quantity");
						
						return false;
					}
						
				}	
				
				//Check to see if units has been filled out
				var ingredientsUnits = document.getElementsByName("ingredient-unit[]");
				
				for(var i = 0; i < ingredientsUnits.length; i++){
				
					if(ingredientsUnits[i].value == ""){
					
						alert("Ingredient must have a unit of measure!");
						
						return false;
						
					}
				
				}
				
				
				
					return true;
			
			}
			
			function test(){
				if(validateForm() == true){
					console.log("Form has been validated!");
					
					$.ajax({
						type: "POST",
						url: "php/recipe_upload_validator.php",
						data: {
							recipeName : 'recipe-upload', 
							mealTime : 'meal-times', 
							prepTime : 'prep-time', 
							cookTime : 'cook-time', 
							cookingDirections : 'cooking-directions',
							ingredients : 'ingredient-name',
							ingredientUnit : 'ingredient-unit',
							ingredientQty : 'ingredient-qty'
						},
						success: function(data){
							console.log(data);
							console.log("Recipe Uploaded!");
							//callback
						}
					});
					
				}
				else{
					console.log("Validate the form you duver!");
				}
				
				
			}
			
			
		 </script>
		
		<style>
			body{
				margin:0;
				padding:0;
				background-color:white;
			}
			
			#container{
				width:1366px;
				min-height:768px;
				height:auto;
				font-family: 'Questrial', sans-serif;
				color:#464646;
				padding-top:10px;
			}
			
			h1{
				font-weight:100;
				display:block;
				
			}
			
			input[id=recipe-upload]{
				width:500px;
				height:30px;
				margin-bottom:15px;
				
				
			}
			
			label{
				display:block;
				
			}
			
			button{
				width:auto;
				height:30px;
				background-color:black;
				color:white;
				border:none;
				display:block;
			}
			
			textarea{
				width:500px;
				min-height:200px;
			
			}
			
			input[name=submit]{
				width:auto;
				height:30px;
				background-color:black;
				color:white;
				border:none;
				display:block;
			}
			
			
			
			
		</style>
	
	</head>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700" rel="stylesheet">

    <!-- This is a 3rd-party stylesheet for Font Awesome: http://fontawesome.io/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

    <link rel="stylesheet" href="./style.css" media="screen">
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
	
	
	
	<div class="size-container">
	
	<h1 class="title"> Create a Recipe</h1>
		
		<div class = "add-container">
		
		<form name="recipe-upload-form" method="post" action="php/recipe_upload_validator.php" onsubmit= "return validateForm()">
		
			<label>Recipe Name*</label>
			<input type="text" name="recipe-name" id="recipe-upload"></br>
			
			<label> Description </label>
			<textarea name = "Description"></textarea>
			
			<br>
			</br>
			<label>Meal Type (select all that apply)</label></br>
			<input type="checkbox" name="meal-time[]" value="breakfast">Breakfast
			<input type="checkbox" name="meal-time[]" value="lunch">Lunch
			<input type="checkbox" name="meal-time[]" value="dinner">Dinner
			</br>
			</br>
			
			<label>Prep Time(minutes)*</label>
			<input type="number" min="0" id="recipe-upload" name="prep-time"></br>
			
			<label>Cook Time(minutes)*</label>
			<input type="number" min="0" id="recipe-upload" name="cook-time"></br>
			
			<label> Directions* </label>
			<textarea name = "cooking-directions"></textarea>
			</br>
			</br>
			<label>Ingredients* (qty/units/name)</label>
			
			
			<div id = "ingredients-list"></div></br>
			
			<button name="add-ingredient" id="add-ingredient" onclick="addIngredient()" type="button">Add ingredient</button>
			
			<input type="submit" value="submit" name="submit" style="margin-top:50px;">
			
		</form>
		<!--	<button id="upload-button" name ="upload-button" onclick="test()">???TEST</button> -->
	</div>
	</div>
</html>
