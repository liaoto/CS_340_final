var callbackStatus = false;

function validateUsername(){
	
	var err = document.getElementById("errors");
	var txtbox = document.getElementById("username");
	var username = document.getElementById("username").value;
	
	if(username.length < 3){
		//alert("Username must be longer than three characters");
		txtbox.style.border = "1px solid red";
		err.innerHTML ="Username must be at least three characters long ";
	
	}
	else if(isStringEmpty(username) == false){
		//alert("Username must not be empty");
		txtbox.style.border = "1px solid red";
		err.innerHTML ="Username cannot be empty ";
	}
	else if(checkUsernameAvailability(username)){
		
	}
	else{
		txtbox.style.border = "1px solid green";
		err.innerHTML +="";
		return true;
	}
	

}

function checkUsernameAvailability(username){
	
	jQuery.ajax({
		type:"POST",
		url: "scripts/php/checkUsernameAvailibility.php",
		data:{username: username},
				
		//Here we can retrieve info from the php page
		//For example, php can send back a 0 if the username/email address is not taken, or a 1 if the username/email address
		//is taken
		//In the php page, echoing data will be sent back here
		success:  function(callbackMessage){
			
			if(callbackMessage == 0){
				document.getElementById("username").style.border = "1px solid green";
				callbackStatus = true;
				document.getElementById("errors").innerHTML = "";	
				console.log(callbackMessage);
				
						
			}
			if(callbackMessage == 1){
				document.getElementById("username").style.border = "1px solid red";
				document.getElementById("errors").innerHTML = "Username is taken";	
				console.log(callbackMessage);
				
			}
		}
				
	});
		
	
}

function validateEmailAddress(){
	
	var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
		document.getElementById("errors").innerHTML += " Invalid email address ";
		email.style.border="1px solid red";
		return false;
	}
	else{
		email.style.border="1px solid green";
		document.getElementById("errors").innerHTML = "";
		return true;
	}
}

function isStringEmpty(str){
	
	str.trim();
			
	if(str === null || str.match(/^ *$/) !== null){
		//alert("Empty String");
		return false;
	}
	else{
		return true;
	}
}

function validatePassword(){
	var pwBox = document.getElementById("pw");
	var pw = pwBox.value;
	
	if(pw.length < 3){
		pwBox.style.border = "1px solid red";
		document.getElementById("errors").innerHTML = "Password must be longer than three characters long";
	}
	else{
		pwBox.style.border = "1px solid green";
		document.getElementById("errors").innerHTML = "";
		return true;
	}
}

function validateFirstName(){
	var fnameBox = document.getElementById("fname");
	var fname = fnameBox.value;
	
	if(fname.length <= 0){
		fnameBox.style.border = "1px solid red";
		document.getElementById("errors").innerHTML = "First name cannot be empty";
	}
	else{
		fnameBox.style.border = "1px solid green";
		document.getElementById("errors").innerHTML = "";
		return true;
	}
}

function validateLastName(){
	var lnameBox = document.getElementById("lname");
	var lname = lnameBox.value;
	
	if(lname.length <= 0){
		lnameBox.style.border = "1px solid red";
		document.getElementById("errors").innerHTML = "Last name cannot be empty";
	}
	else{
		lnameBox.style.border = "1px solid green";
		document.getElementById("errors").innerHTML = "";
		return true;
	}
}

//Need to fix to validate if string is a number or not
function validateAge(){
	var ageBox = document.getElementById("age");
	var age = ageBox.value;
	isNum = Number(age);
	if(age < 1 || age > 150){
		ageBox.style.border = "1px solid red";
		document.getElementById("errors").innerHTML = "Invalid age";
	}
	else{
		document.getElementById("errors").innerHTML = "";
		ageBox.style.border = "1px solid green";
		return true;
	}
	
}

function isReadyToSubmit(){
	if(validateUsername() && validateEmailAddress() && validatePassword() && validateFirstName() && validateLastName()
	
		&& validateAge()){
			alert("ready to submit!");
			return true;
		}
		else{
			alert("Please fix the highlighted errors");
			return false;
		}
}
