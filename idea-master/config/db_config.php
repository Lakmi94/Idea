<?php
/**
* this file holds the configuration parameters for the mysql database
* @author Delvison Castillo delvisoncastillo@gmail.com
*/
  // define('DB_HOSTNAME', '54.149.232.134');
  // define('DB_USER', 'suny');
  // define('DB_PASSWORD', 'suny');

  /* PARAMETERS */
  $db_hostname = "54.149.232.134";
	$db_user= "suny";
	$db_password = "suny";

  /* DATABASES */
  $members_db = "secure_login";
  $idea_db = "idea_db";

  /* TABLES */
  $members_db_table = "members"; // db = secure_login
  $ideas_db_table = "ideas"; // db = idea_db
  $comments_db_table = "comments"; // db = idea_db
  $likes_db_table = "likes"; // db = idea_db
  $images_db_table = "images";

?>
