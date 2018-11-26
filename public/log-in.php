<?php # Script 9.5 - log-in.php #2
// This script performs select query to authenticate user login credential

$page_title = 'login';

$content = ""; // Variable to store & print the status of login

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('mysqli_connect.php');
    

if(isset($_POST['sub']))
{
$uname = $_POST['uname']; // retrieving username
$upassword = $_POST['upassword'];   // retrieving password

// Make the query to get the password of the user
$sql = "Select Password_hash FROM users where Username = '$uname'";
    
$result = @mysqli_query($dbc, $sql);
$dbpass = "";
    // This section get password to variable
    
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dbpass = $row["Password_hash"];
    }
    $res = mysqli_query($dbc,"select * from users where Username='$uname'");
    $result=mysqli_fetch_array($res);
    if(password_verify($upassword, $dbpass)){
        if($result) {
            $content = "Authenticated";
            echo '<a href="#"><h1 class="site-title">Login Sucess</h1></a>';
            }
        } else {
    $content = "failed to authenticate";
            echo '<a href="#"><h1 class="site-title">Login Failed</h1></a>';// print/update value
    mysqli_close($dbc); // Close the database 
    }
}
    else {
    $content = "failed to authenticate";
   echo '<a href="#"><h1 class="site-title">Failed Sucess</h1></a>';// print/update 

    }

    

// Executing according to the login status
    
        
}
}// End of the main Submit conditional.

?>

<html>
    <head>
	
		<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
		
        <link rel="stylesheet" href="./style.css" media="screen">
		
		<style>
			
			<!--
			#container{
				width:1366px;
				
				min-height:768px;
				height:auto;
				margin-left:auto;
				margin-right:auto;
				background-color:#F0F0F0;
				
				
			
			} 
			
			#header{
				width:inherit;
				height:auto;
				
				background-color:white;
				font-family: 'Questrial', sans-serif;
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
				text-align:center;
				display:inline-block;
				min-width:75px;
			}
			
			#nav a:hover{
				background-color:#FED701;
				border-radius:3px;
				
			}
			
			-->
			
			#left-side{
				width:800px;
				background-color:white;
				position: relative;
				padding: 20px 0px 0px 0px;
				left: 420px;
			}
			
			<!--
			#right-side{
				display: inline-block;
				width:430px;
				background-color:white;
				font-family: 'Questrial', sans-serif;
				font-size:16px;
				padding: 20px 0px 0px 0px;
				
			}
			-->
	
			input[name=search-recipes]{
				border:1px solid #0FA4FF;
				border-radius:3px;
				width:300px;
				height:30px;
			}
			
			button[name=search-recipes-button]{
				background-color:#0FA4FF;
				color:white;
				border:1px solid #0FA4FF;
				width:auto;
				height:30px;
				border-radius:4px;
				font-family: 'Questrial', sans-serif;
				text-align:center;
				//font-weight:bold;
				//letter-spacing:1px;
			}
			
			button[name=reset-button]{
				background-color:black;
				color:white;
				border:1px solid black;
				width:auto;
				height:30px;
				
				
				font-family: 'Questrial', sans-serif;
				text-align:center;
				font-weight:thin;
				letter-spacing:1px;
			}
			
			
			
			hr {
				border: 0;
				margin:0;
				border-top: 1px solid #F0F0F0;
				border-bottom: 1px solid #F0F0F0;
				width:370px;
				margin-bottom:10px;
			}
			
			.beautiful-box-wrapper{
				width:250px;
				height:350px;

				display:inline-block;
				margin-left:10px;
				margin-top:5px;
				margin-bottom:5px;
				text-align:center;
				
			}
			.beautiful-box-wrapper img{
				border-radius:5px;
			}
			.beautiful-box-wrapper label{
				color:#464646;
				display:block;
				
				margin-top:5px;
				font-family: 'Questrial', sans-serif;
				font-size:18px;
				font-weight:400;
				
			}
		</style>
	</head>
    
    <a href="#"><h1 class="site-title"> The Recipe Database</h1></a>
	 
	<nav class="navbar">
        <ul class="navlist">
          <li class="navitem navlink active"><a href="index.html">Home</a></li>
          <li class="navitem navlink"><a href="recipe.html">Recipe</a></li>
          <li class="navitem navlink"><a href="log-in.php">Login</a></li>
          <li class="navitem navlink"><a href="Sign-up.php">Register now</a></li>
          <li class="navitem navlink"><a href="create.php">Add a Recipe</a></li>
		  <li class="navitem navlink"><a href="Search_recipe.html">Search a Recipe</a></li>
		  <li class="navitem navlink"><a href="Delete_recipe.html">Delete Recipe</a></li>
          <li class="navitem navlink"><a href="Delete_recipe.html">Update Recipe</a></li>
		  <li class="navitem navlink"><a href="About.html">About</a></li>
        </ul>
    </nav>	
    
    
    <body>	
        <div class="container">
            <h1 class="title"> Login</h1>
            <div class="login-container">
                <form action="log-in.php" method="POST">
                    <p>Username: <input type="text" name="uname" size="15" maxlength="20" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p>
                    <p>Password: <input type="password" name="upassword" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" ></p>
                    <input type="submit" name="sub" value="Login">
                    <form>
                        </div>
                  
                    <div class="register-container">
                        <h4>Don't have an account? Register now!</h4>
                        <button><a href="sign-up.php">Register</a></button>
                    </div>
                    </div>
                </body>
            </html>
