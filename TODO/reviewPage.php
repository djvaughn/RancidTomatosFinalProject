<!DOCTYPE html>
<html>
 <?php
 require_once ('./function.php');
    /*
    The php code for sets $film to the film name given.  Then it sets $info and $overiew to
    their respective files in the movies folder.  Then $review globs all the review files in the
    folder.  $N is set to the number of reviews there are.  Then the Images object is constructed
    and then is passed down the rating of the movie to set the correct rotten/fresh images
    */
    $film = $_GET["film"];
    $movie = getMoviesAsArray($film);
    $reviews=getReviewAsArray($film);
    $N = count($reviews);
    $images = new WebImages();
    $images->setImages($movie['rating']);
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
            <h1><?=$movie['title']?> (<?=$movie['year']?>)</h1>
        </div>
        <div class="main row">
            <section class="reviews-container">
                <aside class="ratings-container">
                    <!-- The php code grabs the BigImage from the images class which was set when the
           rating was passed down at the top -->
                    <img src="images/<?=$images->getBigImage()?>" alt="Rotten" /> <span class="rotten rating"><?=$info[2]?>%</span>
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

                        <?php

                        $review = $reviews[$i];

                        ?>

                        <div class="review-wrapper">
                        <div class="review">
                         <?php

                         $reviewImage = "";

                         if ($review[1]=="FRESH") {

                            $reviewImage="fresh.gif";

                        }else{

                            $reviewImage="rotten.gif";
                        }

                        ?>
                            <img src="images/<?=$reviewImage?>" alt="Rotten" />
                            <q>
                                <?= $review['comment'] ?>
                            </q>

                        </div>

                        <div class="author">
                            <div class="floating-left">
                                <img src="images/critic.gif" alt="Critic" />
                            </div>

                            <p><?= $review['name']?>
                                <br /> <?= $review['publication']?> </p>

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






<!-- fIGURE THIS OUT! -->

                <img src="<?=  $film ?>/overview.png" alt="general overview" />
                <br>
                <dl>
                    <?php

                    $overviewTitles=array("STARRING:","DIRECTOR:","PRODUCER:","RATING:","THEATRICAL RELEASE:",
                    "MOVIE SYNOPSIS:", "RELEASE COMPANY:", "RUNTIME:", "GENRE:", "BOX OFFICE:", "LINKS:");
                    $counter = 0; //accounting for first 4 table columns
                    foreach ($movie as $col) { 
                        if($counter<5){
                            $counter++;
                        }else{
                    ?>
                           <dt>
                                <?=$overviewTitles[counter-5];
                                counter++;?>
                           </dt>
                            <dd>
                                <?=$col ?>
                           </dd>
                           <?php
                       }
                    }
                    ?>
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
