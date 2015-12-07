<!DOCTYPE html>
<html>

<?php
/*require_once ('SOMETHING.PHP');*/
	/*set up variables we may need here*/
    /*
    $problem = $_GET["problem"];
    $message = "ERROR:  ";
    */
?>

<head>
	<title>RT: Add a Movie</title>
           <?php
            $loggedIn="no";

            session_start();
            if (!$_SESSION['login']) {
                header("location: loginPage.php?problem=notLogin");
                exit;
            }else{
                $loggedIn="yes";
            }
            */
            ?> 
	<meta charset="utf-8" />
	<link href="movie.css" type="text.css" rel="stylesheet" />
</head>

<body>
	<header>
        <img src="images/rancidbanner.png" alt="Rancid Tomatoes">
        <!-- may want to make this a link to the home page -->
        <!--    this needs to extend across the window -->
    </header>
    <div class="container">
    	<div class="row main-header">
    		<h1>Add a New Movie</h1>
    	</div>
    	<div class="main row">
            <section class="reviews-container">
                <aside class="ratings-container">
                    <img src="images/rottenlarge.png" alt="Rotten" />
                    <span class="addMovieInstr">Enter Movie Info Below:</span>
                    <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
                </aside>
        		<form action="controller.php" method="post" class="addForm"><br />
                    <!-- want to check title against database as typed? -->
        			Title: <br /> <input type="text" name="title" /><br />
        			Year: <br /> <input type="date" name="year" /><br />
        			My Rating: <br /> <input type="text" name="rating" /><br />
        			Cast: <br /> <input type="text" name="cast" /><br />
        			Director: <br /> <input type="text" name="director" /><br />
        			Producer: <br /> <input type="text" name="producer" /><br />
        			MPAA Rating: <br /> <input type="radio" name="mpaaRating" value="G"/>G
                                        <input type="radio" name="mpaaRating" value="PG" />PG
                                        <input type="radio" name="mpaaRating" value="PG-13"/>PG-13
                                        <input type="radio" name="mpaaRating" value="R" />R
                                        <!-- do we want this one?
                                        <input type="radio" name="mpaaRating" value="NC-17" /> -->
                    <br />
        			Release Date: <br /> <input type="date" name="releaseDate" /><br />
        			Synopsis: <br /> <textarea name="synopsis" rows="10" cols="50"></textarea><br />
        			Production Company: <br /> <input type="text" name="productionCompany" /><br />
        			Run Time (in minutes): <br /> <input type="number" name="runTime" /><br />
        			Genre: <br /> <input type="text" name="genre" /><br />
        			Box Office: <br /> <input type="number" name="boxOffice" /><br />
                    <!--want to actually make these working links? if yes, check security? -->
        			Links: <br /> <input type="text" name="links" /><br />
                    <br />
                    <button type="button" value="clear" onclick="SOMETHING">Clear</button>
                    <br /><br />
                    <input type="hidden" value="" name="ID" />
                    <input type="hidden" value="addMovie" name="Button" />
                    <input type="submit" value="Submit" />
        		</form>
            </section>
            <section class="overview">
                <form action="index.html" method="get" >
                    <input type="hidden" name="mode" value="main" />
                    <input type="submit" value="Main" />
                </form>
                <br />
                <form action="index.html" method="get">
                <?=
                    if($loggedIn == yes){ ?>
                        <input type="hidden" name="mode" value="logout" />
                        <input type="submit" value="Logout" />
                    
                <?= }else{ ?>
                        <input type="hidden" name"mode" value="login" />
                        <input type="submit" value="Login" />
                <?= } ?>
                <br />
                <form action="index.html" method="get">
                    <input type="hidden" name="mode" value="addReview" />
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