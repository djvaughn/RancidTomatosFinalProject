<!DOCTYPE html>
<html>

<?php

/*require_once ('SOMETHING.PHP');*/

/*set up variables we may need here*/
session_start();
 $loginProblem = False;
 $registerProblem = False;

if (isset($_SESSION['loginProblem'])) {
    $loginProblem = True;
}
if (isset($_SESSION['registerProblem'])) {
    $registerProblem = True;
}

//use this for the redirect and print error login messages


?>

<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<link href="movie.css" type="text.css" rel="stylesheet" />
</head>

<body>
	<header>
        <img src="images/rancidbanner.png" alt="Rancid Tomatoes" />
        <!-- may want to make this a link to the home page -->
        <!--    this needs to extend across the window, not sure why it's not -->
    </header>
    <div class="container">
    	<div class="main row">
	    	<section class="reviews-container">
	    		<aside class="ratings-container">
	                    <img src="images/rottenlarge.png" alt="Rotten" />
	                    <span class="addMovieInstr">Login and Membership</span>
	                    <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
	            </aside>
	            <div class="loginBoxBig">
	            	<h2 class="loginHeader">I am already a member!</h2>
	            	<div class="loginBox">
		            	My login info:
		            	<form action="controller.php" method="post" id = "login"><br>
		            		User name: <br> <input type="text" name="loginID" id = "loginID" required><br><br>
		            		Password: <br> <input type="password" name="loginPassword" id = "loginPassword" required><br><br>
		            		<?php
		            		if ($loginProblem == TRUE) {
		            		?>
		            			<p>Invalid Username and/or Password</p>

		            		<?php
		            		$loginProblem = False;
		            		unset($_SESSION['loginProblem']);
		            		}
		            		?>
		            		<input type="submit" value="LOGIN" name="Button">
		            	</form>
		            </div>
	            </div>
	            <br /><br />
		        <div class="loginBoxBig">
		            <h2 class="loginHeader">I want to become a member!</h2>
		            <div class="loginBox">
		            	Enter your info:
		            	<form action="controller.php" method="post" id = "register"><br>
		            		Your first name: <br> <input type="text" name="registerFName" required><br><br>
		            		Your last name: <br> <input type="text" name="registerLName" required><br><br>
		            		Your publication: <br> <input type="text" name="publication" required><br><br>
		            		Choose an unique user name: <br> <input type="text" name="registerID" required><br><br>
		            		Choose a password: <br> <input type="password" name="registerPassword" required><br><br>
		            		<?php
		            		if ($registerProblem == TRUE) {
		            		?>
		            			<p>Not an unique username</p>

		            		<?php
		            		$registerProblem = False;
		            		unset($_SESSION['registerProblem']);
		            		}
		            		?>
		            		<input type="submit" value="register" name="Button">
		            	</form>
		            </div>
	            </div>
	    	</section>
	    	<section class="overview">
	    		Home <br />
	    		Add Movie
	    		Login/Logout
	    	</section>
	    </div>
    </div>
</body>

</html>