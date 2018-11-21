<?php


//Generates a unique id for a given string
function createUniqueId($myString){
	
	$md5 = md5($myString);
	$uniqueId = uniqid();
	
	$output = $md5 . $uniqueId;
	
	return $output;


}


//Fix me
//Creates a folder based on a folder name
//Make sure to check if its a directory first!
function createFolder($folderName, $permissionVal){
		
		$curDir = realpath(dirname(__FILE__));
		$destination = $curDir . '/../img/recipes/';
		
		$fullPath = $destination . $folderName;
		
		//0777
		mkdir($fullPath, $permissionVal, false);
	
	

}



//check if string is in an array
//case sensitive
//php has this built in but functions are cool
function isInArray($theString, $theArray){
	
	if(in_array($theString, $theArray)){
		
		return true;
		
	}
	else{
		
		return false;
	
	}
	

}


//
function insertIngredientsIntoDatabase($tableName, $tableColName, $arrOfThingsToAdd){
	
	for($i = 0; i < count($arrOfThingsToAdd); $i++){
		
		$nameAtIndex = $arrOfThingsToAdd[i];
		$query = "INSERT INTO " . $tableName . "(" . $tableColName . ") VALUES (". $nameAtIndex .")";
		
		mysqli_query($conn, $query);
		
	
	}

}




//blehh
function connectToServer($serverName, $usr, $pw, $db){
	
	$conn = mysqli_connect($serverName, $usr, $pw, $db);
	
	if(!$conn){
		echo mysqli_connect_error;
	}
	else{
		
		echo "connected";
	}
	
	
}












?>