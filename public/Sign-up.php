<?php # Script 9.5 - sign-up.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('mysqli_connect.php'); // Connect DB
	$errors = []; // Initialize an error array.
       
    // Check for a username
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
    } else {
		$usernameinput = mysqli_real_escape_string($dbc, trim($_POST['username']));
	}
    
    $sql = "Select username FROM Users where username = '$usernameinput'";// get username in database
        
    $result = $dbc->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dbusername = $row["username"];
    }
        $errors[] = 'Username ' .$dbusername. ' has already exist.';

    } else {
    }
    
    
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$firstnameinput = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}

	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$lastnameinput = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$emailinput = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

    // Check for a password and match against the confirmed password:
	if (empty($_POST['pass1'])) {
			$errors[] = 'Your forgot to enter your password.';
		} 
	 else {
		$passwordinput = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
	}
    
	// Check for age
	if (empty($_POST['age'])) {
		$ageinput = 0;
	} else if (! is_numeric($_POST['age'])) {
        $errors[] = 'Your age is not an integer.';
    }  else {
        $ageinput = mysqli_real_escape_string($dbc, trim($_POST['age']));
	}

	if (empty($errors)) { // If everything's OK.

        // Hasing the inputed password
        
		$finalpass2 = password_hash($passwordinput, PASSWORD_DEFAULT);
        
        // Register the user in the database...

		// Make the query:
                
		$q = "INSERT INTO users (Username, firstName, lastName, email, Password_hash, age) VALUES ('$usernameinput', '$firstnameinput', '$lastnameinput', '$emailinput', '$finalpass2', '$ageinput' )"; 
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
            
            $File = "db-password.txt";
            $Handle = fopen($File, 'a');
            $finalpass2 .= "\r\n";
            $Data = $finalpass2;
            fwrite($Handle, $Data);
            fclose($Handle);
                        
			// Print a message:
           echo '<div class="container"><div class="register-container"><p style="color:Black;>Login success</p><p2 style="color:black; class="error">You are registered. congratulations.</p2></div></div>';
            
            echo '<button><a href="index.html">Go to Home</a></button>';

		} else { // If it did not run OK.

			// Public message:
			echo '<div class="container"><div class="register-container"><p style="color:red;>System Error</p>
			<p2 style="color:red; class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p2></div></div>';

		} // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.
        exit();

	} else { // Report the errors.

		echo '<a href="#"><h1 class="site-title" >Error!
		<p style="color:red; class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p></h1></a>';

	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>


<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Recipe Database</title>

	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

    <!-- This is a 3rd-party stylesheet for Font Awesome: http://fontawesome.io/ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

    <link rel="stylesheet" href="./style.css" media="screen">

  </head>

  <body>

    <header>
      <!-- The <i> tag below includes the bullhorn icon from Font Awesome -->
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
	
		
	
    </header>
	<div class="container">
      	   <div class="register-container">
               <h1>Register</h1>

               <form action="Sign-up.php" method="post">
                   <p>Username: <input type="text" name="username" size="15" maxlength="20" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p>
                   <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"></p>
                   <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"></p>
                   <p>Email Address: <input type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>

                   <p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" ></p>
                   <p>Age in years: (optional): <input type="age" name="age" size="1" maxlength="10" value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>" ></p>
                   <p><input type="submit" name="submit" value="Register"></p>
               </form>
                 </div>
	   </div>
               </body>
      </html>
