<!DOCTYPE html>
<html>
<header>
	<title>RT: Home</title>
	<meta charset="utf-8" />
	<link href="movie.css" type="text.css" rel="stylesheet" />
    <?php
        require.once("./model.php");
        $movies = getNewestMovies();
    ?>
</header>

<body>
	<header>
        <img src="MoviesToUse/images/rancidbanner.png" alt="Rancid Tomatoes">
        <!-- may want to make this a link to the home page -->
        <!--    this needs to extend across the window -->
    </header>
	<div class="container">
		<div class="row main-header">
    		<h1>Rotten Tomatoes</h1>
    	</div>
    	<div class="main row">
    		<section class="reviews-container">
    			<aside class="ratings-container">
                    <img src="MoviesToUse/images/rottenlarge.png" alt="Rotten" />
                    <img class="addMovieFresh" src="MoviesToUse/images/freshlarge.png" alt="Fresh" />
                </aside>
                <div class="row">
                	<div class="review-wrapper">
                        <div class="review">
                            <img />
                            <q><?= $movies[0]['synopsis']; ?></q>
                        </div>
                        <div class="author">
                            <img />
                            <p> <?= $movies[0]['title']; ?> </p>
                        </div>
                	</div>
                	<div class="review-wrapper">
                        <div class="review">
                            <img />
                            <q><?= $movies[1]['synopsis']; ?></q>
                        </div>
                        <div class="author">
                            <img />
                            <p> <?= $movies[1]['title']; ?> </p>
                        </div>
                	</div>
                </div>
                <div class="row">
                	<div class="review-wrapper">
                        <div class="review">
                            <img />
                            <q><?= $movies[2]['synopsis']; ?></q>
                        </div>
                        <div class="author">
                            <img />
                            <p> <?= $movies[2]['title']; ?> </p>
                        </div>
                	</div>
                	<div class="review-wrapper">
                        <div class="review">
                            <img />
                            <q><?= $movies[3]['synopsis']; ?></q>
                        </div>
                        <div class="author">
                            <img />
                            <p> <?= $movies[3]['title']; ?> </p>
                        </div>
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
                <?=
                    if($loggedIn == "yes"){ ?>
                        <input type="hidden" name="mode" value="logout" />
                        <input type="submit" value="Logout" />
                    
                <?= }else{ ?>
                        <input type="hidden" name"mode" value="login" />
                        <input type="submit" value="Login" />
                <?= } ?>
                <br />
                <form action="index.html" method="get">
                    <input type="hidden" name="mode" value="addReview" />
                    <input type="submit" value="Review a Movie" />
                </form>
                <form action="index.html" method="get">
                    <input type="hidden" name="mode" value="addMovie" />
                    <input type="submit" value="Add a New Movie" />
                </form>
            </section>
            <footer class="row">
                <!-- it'd be cool to have a "top" link here -->
            </footer>
    	</div>
	</div>
</body>

</html>