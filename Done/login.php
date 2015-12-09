<!DOCTYPE html>
<html>

<?php

/*require_once ('SOMETHING.PHP');*/

/*set up variables we may need here*/
session_start();
 $loginProblem = False;
 $registerProblem = False;
$noMovie = false;
if (isset($_SESSION['loginProblem'])) {
    $loginProblem = True;
}
if (isset($_SESSION['registerProblem'])) {
    $registerProblem = True;
}
            if (isset($_SESSION['noMovie'])) {
                $noMovie = true;
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
        <a rel="url" href="mainPage.php"><img src="images/rancidbanner.png" alt="Rancid Tomatoes" /></a>
    </header>
    <div class="container">
    	<div class="main entryRow">
	    	<section class="entryContainer">
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
	    	<section class="entryOverview">
	    		<a rel="url" href="index.php">Home</a>
                <br />
	    		<?php if(!isset($_SESSION['user'])){ ?>
	    			<a rel="url" href="login.php" >Login</a>
	    			<br />
	    		<?php }else { ?>
	    			<a rel="url" href="addMovie.php" >Add a Movie</a>
	    			<br />
	    			<a rel="url" href="addReview.php" >Review a Movie</a>
	    			<br />
	    			<a rel="url" href="">Logout</a>
	    		<?php } ?>

	    		<br /><br />
	    		<div class="searchBoxDiv">
             <form action="redirect.php" method="get">
                        <!-- <input type="hidden" name="mode" value="search" /> -->
                        <input type="search" name ="movie" id="searchBox" />
                        <!-- onchange="autocomplete()" -->
                        <input type="submit" value="Search Movie" />
                                    <?php
                                if ($noMovie == TRUE) {
                                ?>
                                    <p>The movie doesn't exist</p>

                                <?php
                                $noMovie = False;
                                unset($_SESSION['noMovie']);
                                }
                                ?>
                </form>
                    <br />
                    <div id="autoResultsBox" class="autoResultsBox" >
                        <!--<textarea rows="4" cols="20">
                            <ul>
                                <?= $myStmt = ""; ?>
                                <?php foreach($search as $match) { ?>
                                    <?= $myStmt = $match['title'] . ', ' . $match['year'] ?>
                                        <li>
                                            <div id="filler" onclick="fill()">
                                                <?= $myStmt ?>
                                            </div>
                                        </li>
                                <?php } ?>
                            </ul>
                        </textarea> -->
                    </div>
                </div>
	    	</section>
	    </div>
    </div>
</body>

</html>