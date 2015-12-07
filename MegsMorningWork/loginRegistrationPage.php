<!DOCTYPE html>
<html>

<?php
/*require_once ('SOMETHING.PHP');*/
	/*set up variables we may need here*/
	$problem = "none"
	if(isset($_GET['problem'])){
		$problem = $_GET["problem"];
	}
	//use this for the redirect and print error login messages
?>

<head>
	<title>RT: Login and Membership</title>
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
	                   	<span class="addMovieInstr"> <?=
	                    	if($problem == "notLogin"){  ?>
	                    		Please login or become a member <?=
	                    	}else{ ?>
	                    		Login and Membership <?=
	                    	} ?>
	                    </span>
	                    <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
	            </aside>
	            <div class="loginBoxBig">
	            	<h2 class="loginHeader">I am already a member!</h2>
	            	<div class="loginBox">
		            	My login info:
		            	<form action="controller.php" method="post"><br />
		            		User name: <br /> <input type="text" name="USERID" /><br />
		            		Password: <br /> <input type="password" name="PASSWORD" /><br />

		            		<?= if($problem === "notVerified") { ?>
		            		
		            			<p class="problemMessage">*Incorrect password, try again*</p><br />
		            		
		            		<?= } ?>

		            		<input type="hidden" value="" name="ID" />
		            		<input type="hidden" value="LOGIN" name="Button" />
		            		<input type="submit" value="Login" />
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
		            		Your name: <br /> <input type="text" name="NAME" /><br />
		            		Your publication: <br /> <input type="text" name="PUBLICATION" /><br />
		            		Choose a user name: <br /> <input type="text" name="USERID" /><br />
		            		
		            		<?= if($problem === "useridTaken") { ?>
		            		
		            			<p class="problemMessage">*User name taken, choose another*</p><br />
		            		
		            		<?= } ?>

		            		Choose a password: <br /> <input type="password" name="PASSWORD" /><br />
		            		<input type="hidden" value="" name="ID" />
		            		<input type="hidden" value="register" name="Button" />
		            		<input type="submit" value="Register" />
		            	</form>
		            </div>
	            </div>
	    	</section>
	    	<section class="overview">
	    		<form action="index.html" method="get" >
                    <input type="hidden" name="mode" value="main" />
                    <input type="submit" value="Main" />
                </form>
                <br />
                <form action="index.html" method="get">
                    <input type="hidden" name="mode" value="addReview" />
                    <input type="submit" value="Add a Review" />
                </form>
                <br />
                <form action="index.html" method="get">
                    <input type="hidden" name="mode" value="addMovie" />
                    <input type="submit" value="Add a New Movie" />
                </form>
	    	</section>
	    	<footer class="row">
                <p></p>
            </footer>
	    </div>
    </div>
</body>

</html>