<?php
	
function queryRecipeRowData(){
	
	require "connect.php";	
	$query = "SELECT * FROM recipes";
	$result = mysqli_query($conn, $query);
	
	while($row = mysqli_fetch_assoc($result)){
		
		$row_id = $row["recipe_id"];
		$recipe_name = $row["recipe_name"];
		$recipe_dir = $row["recipe_directory"];
		echo "<script type= 'text/javascript'> appendRowData('$row_id', '$recipe_name' , '$recipe_dir'); </script>";
	
	}
	
	mysqli_close($conn);

}

?>

<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script>
			$(document).ready(function(){
				
				//alert("document loaded");
				
			});
			
			
			
			function removeDiv(rowId, dir){
				var rowId = rowId;
				console.log(dir);
				if(confirm("Are you sure that you really want to delete " + rowId + "?")){
					
					var div = document.getElementById(rowId);
					div.parentNode.removeChild(div);
					
					$.ajax({
						type: "POST",
						url: "php/queryHelper.php",
						data: {rowId : rowId, dir : dir},
						success: function(data){
							console.log(data);
							alert("Row removed");
							console.log("Row removed from db");
						}
					});
					
					
				}
				
			}
			
			function appendRowData(recipeId, recipeName, recipeDirectory ){
				
				//console.log("ID: " + recipeId + " Name: " + recipeName + " Directory " + recipeDirectory);
				
				var div = document.getElementById("container");
				var rowData = document.createElement("div");
				var spanRowId = document.createElement("span");
				var spanRowName = document.createElement("span");
				var spanRowDir = document.createElement("span");
				var delButton = document.createElement("button");
				
				rowData.className = "rowData";
				
				spanRowId.innerHTML = recipeId;
				spanRowName.innerHTML = recipeName;
				spanRowDir.innerHTML = recipeDirectory;
				delButton.innerHTML = "X";
				
				spanRowId.id = recipeId; 
				rowData.id = recipeId;
				delButton.id = recipeId;
				
				delButton.addEventListener("click", function(){
					removeDiv(recipeId, recipeDirectory);
				});
				
				
				rowData.appendChild(spanRowId);
				rowData.appendChild(spanRowName);
				rowData.appendChild(spanRowDir);
				rowData.appendChild(delButton);
				div.appendChild(rowData);
				

				
			}
			
			
		
				
		</script>
		
		<style>
			body{
				margin:0;
				padding:0;
				background-color:white;
				font-family: 'Questrial', sans-serif;
				
			}
			
			#container{
				width:1366px;
				min-height:768px;
				height:auto;
				border:1px solid black;
				margin-left:auto;
				margin-right:auto;
			}
			
			#container-header{
				width:inherit;
				height:75px;
				background-color:white;
				line-height:75px;
			}
			
			#container-header label{
				margin-left:5px;
				font-size:36px;
			}
			
			.rowData{
				width:1361px;
				padding-left:5px;
				height:50px;
				background-color:#f4f4f4;
				line-height:50px;
				margin-bottom:1px;
			}
			
			.rowData span{
				min-width:190px;
				margin:0;
				//background-color:red;
				display:inline-block;
				text-align: center;
				//background-color:green;
			}
			
			.rowdata button{
				width:30px;
				height:30px;
				
				border:1px solid black;
				border-radius:50px;
				color:black;
				//float:right;
				margin-left:30px;
				
			}
			
			
			
		</style>
	
	</head>
	
	
	
	<body>
		
		<div id="container">
			<div id="container-header">
				<label>Recipe Database List</label>
			</div>
			
			<div class="rowData">
				<span>Recipe ID</span>
				<span>Recipe Name</span>
				<span>Directory Location</span>
				
				
				
			</div>
			<?php  queryRecipeRowData(); ?>
			
			
			
		</div>	
	
	</body>
</html>