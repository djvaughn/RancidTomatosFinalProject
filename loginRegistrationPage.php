<!DOCTYPE html>
<html>

<?php
/*require_once ('SOMETHING.PHP');*/
	/*set up variables we may need here*/
	$problem = $_GET["problem"];

	//use this for the redirect and print error login messages
?>

<head>
	<title>RT: Add a Movie</title>
	<meta charset="utf-8" />
	<link href="movie.css" type="text.css" rel="stylesheet" />
</head>

<body>
	<header>
        <img src="MoviesToUse/images/rancidbanner.png" alt="Rancid Tomatoes" />
        <!-- may want to make this a link to the home page -->
        <!--    this needs to extend across the window, not sure why it's not -->
    </header>
    <div class="container">
    	<div class="main row">
	    	<section class="reviews-container">
	    		<aside class="ratings-container">
	                    <img src="MoviesToUse/images/rottenlarge.png" alt="Rotten" />
	                    <span class="addMovieInstr">Login and Membership</span>
	                    <img class="addMovieFresh" src="MoviesToUse/images/freshlarge.png" alt="Fresh" />
	            </aside>
	            <div class="loginBoxBig">
	            	<h2 class="loginHeader">I am already a member!</h2>
	            	<div class="loginBox">
		            	My login info:
		            	<form action="controller.php" method="post"><br />
		            		User name: <br /> <input type="text" name="USERID" /><br />
		            		Password: <br /> <input type="password" name="PASSWORD" /><br />
		            		<input type="submit" value="LOGIN" name="Button" />
		            		<input type="hidden" value="" name="ID" />
		            	</form>
		            </div>
	            </div>
	            <br /><br /><br />
		        <div class="loginBoxBig">
		            <h2 class="loginHeader">I want to become a member!</h2>
		            <div class="loginBox">
		            	Enter your info:
		            	<form action="controller.php" method="post"><br />
		            		<input type="hidden" name="loginType" value="newMember"/>
		            		Your name: <br /> <input type="text" name="NAME" />
		            		Your publication: <br /> <input type="text" name="PUBLICATION" />
		            		Choose a user name: <br /> <input type="text" name="USERID" /><br />
		            		Choose a password: <br /> <input type="password" name="PASSWORD" /><br />
		            		<input type="submit" value="register" name="Button" />
		            		<input type="hidden" value="" name="ID" />
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