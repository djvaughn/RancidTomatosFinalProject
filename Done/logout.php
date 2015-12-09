<!DOCTYPE html>
  <html>
  <head>
  </head>
  <body>
      <!--  A SPA with 2 views -->
      <?php
      session_start();
      session_destroy ();
      header("Location: index.php");
    ?>
  </body>
  </html>