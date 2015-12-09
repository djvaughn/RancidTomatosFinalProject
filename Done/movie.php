<!DOCTYPE html>
<html>
 <?php
require_once("./model.php");
 require_once ('./function.php');
    /*
    The php code for sets $film to the film name given.  Then it sets $info and $overiew to
    their respective files in the movies folder.  Then $review globs all the review files in the
    folder.  $N is set to the number of reviews there are.  Then the Images object is constructed
    and then is passed down the rating of the movie to set the correct rotten/fresh images
    */
  session_start();
    $film = $_SESSION["movie"];
    $theModel = new Model();
    $images = new WebImages();
    //TODO CHECK if file exists
    $overview = $theModel->getMovieInfo($film);
    $year = $overview['year'];
    $director = $overview['director'];
    $rating = $overview['rating'];
    $review = $theModel->getReviewAsArray($film);
    $mpaaRating = $overview['mpaaRating'];
    $runtime = $overview['runTime'];
    $boxOffice = $overview['boxOffice'];
    $imagePath = $overview['posterImage'];
    $N = $theModel->getReviewRowCount($film);
    $images->setImages($rating);
?>

<head>
    <title>Rancid Tomatoes</title>
    <meta charset="utf-8" />
    <link href="movie.css" type="text/css" rel="stylesheet" />
    <!-- The php code grabs the BrowserImage from the images class which was set when the
           rating was passed down at the top -->
    <link href="images/<?=$images->getBrowserImage()?>" type="image/gif" rel="shortcut icon" />
</head>

<body>

    <header>
        <img src="images/rancidbanner.png" alt="Rancid Tomatoes">
    </header>
    <div class="container">
        <div class="row main-header">
            <!-- The php code prints the movie title and year it was made -->
            <h1><?=$film?> (<?=$year?>)</h1>
        </div>
        <div class="linkBox">
            <?php if(!isset($_SESSION['user'])) { ?>
                <a rel="url" href="login.php">Login/Register</a>
            <?php }else { ?>
                <a rel="url" href="addReview.php">Add a Review</a>
                <a rel="url" href="addMovie.php">Add a Movie</a>
                
                <a rel="url" href="logout.php">Logout</a>
            <?php } ?>
        </div>
        <form id="searchForm" action="movie.php" method="post">
                    <input type="search" id="searchText" name="searchText" oninput="findMovies()">
                    <input type="submit" id="movieSearch" name="movieSearch" value="Search">
                </form>
        <div class="main row">
            <section class="reviews-container">
                <aside class="ratings-container">
                    <!-- The php code grabs the BigImage from the images class which was set when the
           rating was passed down at the top -->
                    <img src="images/<?=$images->getBigImage()?>" alt="Rotten" /> <span class="rotten rating"><?=$rating?>%</span>
                </aside>
                <?php
                /*
                This set of php code prints the reviews.  The for loop ends at the review count. If $i is even then
                it will show <div class="row"> as this signifies the start of a new row.  Then the loop grabs the review
                from the file and set it to $review.  Then it checks if the review was fresh or rotten and sets the image
                based on that and displays it.  Then it dislpays the review and then it displays the author and their
                publication.  Then if the review is an odd number or the last one it will show the </div> for the row class, signifying the
                end of the row

                */
                for($i=0; $i<$N; $i++){

                    if($i%2==0){ ?>

                    <div class="row">

                        <?php } ?>

                        <div class="review-wrapper">
                        <div class="review">
                         <?php

                         $reviewImage = "";

                         if ($review[$i]['rating']==="F") {

                            $reviewImage="fresh.gif";

                        }else{

                            $reviewImage="rotten.gif";
                        }
                        ?>

                            <img src="images/<?=$reviewImage?>" alt="Rotten" />

                            <q>

                                <?= $review[$i]['comment'] ?>
                            </q>

                        </div>

                        <div class="author">
                            <div class="floating-left">
                                <img src="images/critic.gif" alt="Critic" />
                            </div>

                            <p><?= $review[$i]['firstName']?> <?= $review[$i]['lastName']?>
                                <br /> <?= $review[$i]['publication']?> </p>

                        </div>
                    </div>

                <?php
                if($i%2!=0 || $i == $N-1){ ?>

                    </div>

                <?php } ?>

        <?php } ?>

            </section>
            <section class="overview">
                 <!-- The php helps get the films poster from the file-->
                <img src="<?= $imagePath ?>" alt="general overview" />
                <br>
                <dl>
                    <dt>DIRECTOR</dt>
                    <dd><?= $director ?></dd>
                    <dt>MPAA RATING</dt>
                    <dd><?= $mpaaRating ?></dd>
                    <dt>THEATRICAL RELEASE YEAR</dt>
                    <dd><?= $year ?></dd>
                    <dt>RUNTIME</dt>
                    <dd><?= $runtime ?> minutes</dd>
                    <dt>BOX OFFICE</dt>
                    <dd>$<?= $boxOffice ?> millions</dd>
                </dl>
            </section>
            <footer class="row">
                <!-- The php prints the number of reviews-->
                <p>(1-<?=$N ?>) of <?=$N ?></p>
            </footer>
        </div>
    </div>
</body>

</html>
