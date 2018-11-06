<?php
  /**
  * This function is responsible for handling errors. Redirects to next
  * location after a defined wait time
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function error($error, $location, $redirect, $seconds)
  {
    echo "<br/>";
    echo "<h1>".$error."</h1>";
    if ($redirect)  {
      header("Refresh: $seconds; URL='$location'");
    }
    die();
  }

  /**
  * Takes in a target directory and a filename and ensures that the file to be
  * inserted in the directory has a unique filename.
  * @param String $target_dir Target directory for file
  * @param String $filename Name of file to be inserted to target directory.
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function create_unique_filename($target_dir,$filename)
  {
    $now = time();
    while ( file_exists($result = $target_dir . $now.'-'.$filename))
    {
      $now++;
    }
    return $result;
  }
?>
