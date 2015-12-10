  <!DOCTYPE html>
  <html>
  <head>
  </head>
  <body>
      <!--  A SPA with 2 views -->
      <?php
      require_once("./model.php");
      $theModel = new Model();
      session_start();
      $title = $_GET['movie'];
      if (!$theModel->movieDoesNotExist($title)) {
              $_SESSION['movie']=$title;
      header("Location: movie.php");
      }else{
              $_SESSION['noMovie']=true;
        header("Location: index.php");
      }

    ?>
  </body>
  </html>