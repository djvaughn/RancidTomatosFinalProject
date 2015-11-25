  <!DOCTYPE html>
  <html>
  <head>
  <title>Quotation Data Base</title>
  <link rel="stylesheet" href="styles.css">
  </head>
  <body>
      <!--  A SPA with 2 views -->
      <?php
      if(isset($_GET['mode']) && $_GET['mode'] === 'new') {
         require_once("./newQuote.php");
      }
         else {
         require_once("./showQuotes.php");
      }
    ?>
  </body>
  </html>
