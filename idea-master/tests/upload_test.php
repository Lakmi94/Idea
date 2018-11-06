<<html>
  <head>
    <title>upload test</title>
  </head>
  <body>
    <?php
      echo "basename: ". basename(__DIR__)  . "<br/>";
      echo str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    ?>
    <form id="upload" action="../controllers/image_controller.php" enctype="multipart/form-data" method="POST">
      <p>
        <label for="file">File to upload:</label>
        <input id="file" type="file" name="file">
      </p>
      <p>
        <label for="submit">Press to...</label>
        <input id="submit" type="submit" name="submit" value="Upload me!">
      </p>
    </form>

  </body>
</html>
