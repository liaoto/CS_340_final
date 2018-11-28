<?php
require_once('connect.php');


if(isset($_SESSION['uid'])){
	header('Refresh: 10; url= ../../index.html');
}



else if(isset($_POST["login"])){
	
	$username = $_POST['username'];
	$password= $_POST['pw'];
	
	$query = "SELECT Username, Password_hash, User_id FROM users WHERE Username = '$username'";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	
	if($count > 0){
		
		while($row = mysqli_fetch_array($result)){
			
			//Decrypting pw
			if(password_verify($password, $row['Password_hash'])){
				
				session_start();
				$_SESSION['uid'] = $row['User_id'];
                echo '<h1 class="site-title">Login Success</h1>';    echo '<br>';                
                echo '<h1 class="site-title">Redirecting</h1>';

				header('Refresh: 2; url=../../index.html');
				
			}
			//wrong password
			else{
				echo '<a href="#"><h1 class="site-title">Login error</h1></a>';
			}
		
		}
		
	}
	else{
		echo '<a href="#"><h1 class="site-title">User not found</h1></a>';
	}
}


?>