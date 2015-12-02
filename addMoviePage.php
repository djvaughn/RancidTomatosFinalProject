<!DOCTYPE html>
<html>

<?php
/*require_once ('SOMETHING.PHP');*/
	/*set up variables we may need here*/
?>

<head>
	<title>RT: Add a Movie</title>
	<meta charset="utf-8" />
	<link href="movie.css" type="text.css" rel="stylesheet" />
</head>

<body>
	<header>
        <img src="MoviesToUse/images/rancidbanner.png" alt="Rancid Tomatoes">
        <!-- may want to make this a link to the home page -->
    </header>
    <div class="container">
    	<div class="row main-header">
    		<h1>Add a New Movie</h1>
    	</div>
    	<div class="main row">
    		<form action="addMovie.php" method="post"><br />
    			Title: <br /> <input type="text" name="title" /><br />
    			Year: <br /> <input type="date" name="year" /><br />
    			My Rating: <br /> <input type="text" name="rating" /><br />
    			Cast: <br /> <input type="text" name="cast" /><br />
    			Director: <br /> <input type="text" name="director" /><br />
    			Producer: <br /> <input type="text" name="producer" /><br />
    			MPAA Rating: <br /> <input type="text" name="mpaaRating" /><br />
    			Release Date: <br /> <input type="date" name="releaseDate" /><br />
    			Synopsis: <br /> <textarea name="synopsis" rows="10" cols="50"></textarea><br />
    			Production Company: <br /> <input type="text" name="productionCompany" /><br />
    			Run Time (in minutes): <br /> <input type="number" name="runTime" /><br />
    			Genre: <br /> <input type="text" name="genre" /><br />
    			Box Office: <br /> <input type="number" name="title" /><br />
    			links: <br /> <input type="text" name="links" /><br />
    		</form>
    	</div>
    </div>
</body>

</html>