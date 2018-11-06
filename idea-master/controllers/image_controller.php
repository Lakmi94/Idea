<?php
  /**
  * filename: image_controller.php
  * Controller responsible for handling image uploads
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */

  include_once $_SERVER['DOCUMENT_ROOT']. '/idea/lib/db_helper.php';
  include_once $_SERVER['DOCUMENT_ROOT']. '/idea/models/image_model.php';
  include_once $_SERVER['DOCUMENT_ROOT']. '/idea/lib/functions.php';

  // to receive a file upload use $_FILES
  // FILES explained: http://php.net/manual/en/reserved.variables.files.php

  // define maxfilesize
  // TODO: correct max filesize
  define("MAX_FILESIZE", 100000000);

  // error reporting
  ini_set('display_startup_errors',1);
  ini_set('display_errors',1);
  error_reporting(-1);

  // check login
  check_login();

  // get user's ID who posted
  $user_id = get_user_id($_SESSION['username']);

  // receive upload
  $fieldname = 'file';
  // echo "file: " . $_FILES[$fieldname]['name'];
  // echo "<br/>type: " . $_FILES[$fieldname]['type'];
  // echo "<br/>temp_name: " . $_FILES[$fieldname]['tmp_name'];

  // make a note of the current working directory
  $dir_proj = str_replace(basename(__DIR__).'/',
  '',str_replace(basename($_SERVER['PHP_SELF']), '',
  $_SERVER['PHP_SELF']));
  // echo "<br/> dir self: ". $dir_proj;

  // make a note of the directory that will recieve the uploaded file
  $uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] .
  $dir_proj . 'uploads/';
  // echo "<br/> uploads directory: ".$uploadsDirectory;

  // make a note of the location of the upload form in case we need it
  // TODO: correct location of upload form
  $uploadForm = $dir_proj . 'tests/upload_test.php';
  // echo "<br/>upload form: " . $uploadForm;

  // possible errors
  $errors = array(1 => 'max file size exceeeded',
                  2 => 'html form max file size exceeded',
                  3 => 'file upload was only partial',
                  4 => 'no file was attached');

  // check that the upload form was submitted
  isset($_POST['submit'])
        or error('the upload form not submitted', $uploadForm, TRUE, 5);

  // check for PHP's built-in uploading errors
  ($_FILES[$fieldname]['error'] == 0)
    or error($errors[$_FILES[$fieldname]['error']], $uploadForm, TRUE, 5);

  // check that the file we are working on really was the subject of
  // an HTTP upload
  @is_uploaded_file($_FILES[$fieldname]['tmp_name'])
    or error('not an HTTP upload', $uploadForm, TRUE, 5);

  // validation... check file uploaded is actually an image
  @getimagesize($_FILES[$fieldname]['tmp_name'])
    or error('only image uploads are allowed', $uploadForm, TRUE, 5);

  // check that user has a folder to house uploads. Create if not.
  create_user_dir($uploadsDirectory = $uploadsDirectory . $user_id ."/")
    or error('insuffiecient permission to create dir', $uploadForm, TRUE, 5);

  // make a unique filename for the uploaded file and check it is not already
  // taken... if it is already taken keep trying until we find a vacant one
  // sample filename: 1140732936-filename.jpg
  $uploadFilename = create_unique_filename($uploadsDirectory,
  $_FILES[$fieldname]['name']);

  //echo "<br/>upload_filename: ". $uploadFilename;

  // move the file to its final location with unique filename
  // ensure that proper permissions are set:
  // sudo chown -R www-data:www-data /var/www
  @move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename)
    or error('receiving directory insuffiecient permission', $uploadForm,
    TRUE, 5);

  // image successfully received
  // TODO: redirect appropriately
  echo "<h1>Image successfully uploaded</h1>";
  // send image to database
  if (store_image($uploadFilename, $user_id))
  {
    //debug
    echo "<h1>Image Successfully stored</h1>";
    $path = explode('/html',$uploadFilename);
    echo '<img src="'. $path[1] .'"/>';
  } else {
    //debug
    echo "<h1>Image Storing Failed</h1>";
  }

  /**
  * Creates a user directory for images if it doesnt already exist
  * @param String $path Absolute path to the users image directory
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function create_user_dir($path)
  {
    if (!file_exists($path)){
      mkdir($path,0777,true);
    }
    return true;
  }

?>
