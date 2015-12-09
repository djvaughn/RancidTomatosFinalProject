  <!DOCTYPE html>
  <html>
  <head>
  </head>
  <body>
      <!--  A SPA with 2 views -->
      <?php
      session_start();
      $title = $_GET['movie'];
      $_SESSION['movie']=$title;
      header("Location: movie.php");
    ?>
  </body>
  </html>