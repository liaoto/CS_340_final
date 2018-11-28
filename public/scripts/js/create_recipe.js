
		 
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
			
