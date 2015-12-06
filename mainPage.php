<!DOCTYPE html>
<html>
<header>
	<title>RT: Home</title>
	<meta charset="utf-8" />
	<link href="movie.css" type="text.css" rel="stylesheet" />
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
                	</div>
                	<div class="review-wrapper">
                	</div>
                </div>
                <div class="row">
                	<div class="review-wrapper">
                	</div>
                	<div class="review-wrapper">
                	</div>
                </div>
                <div class="row">
                	<div class="review-wrapper">
                	</div>
                	<div class="review-wrapper">
                	</div>
                </div>
    		</section>
    		<section class="overview">
                <a rel="url" href="randcidHome.php">Home</a>
                <br />
                <!-- put this as an if not signed in, make visible? -->
                <a rel="url"  href="loginPage.php">Sign In/Logout</a><!-- do this as a link or not? -->

            </section>
            <footer class="row">
                <!-- it'd be cool to have a "top" link here -->
            </footer>
    	</div>
	</div>
</body>

</html>