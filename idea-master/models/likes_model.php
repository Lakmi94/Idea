<?php

  include $_SERVER['DOCUMENT_ROOT'].'/idea/lib/db_helper.php';
  include $_SERVER['DOCUMENT_ROOT'].'/idea/config/db_config.php';

  /**
  * This function is respnosible for creating likes
  * @author Regis
  */
  function create_like($idea_id, $user_liked)
  {
    // global variables from config/db_config.php
    global $ideas_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    //date format
    date_default_timezone_set('Asia/Seoul');
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO likes(id,idea_id,user_liked,date_created)"
    . " values('NULL','$idea_id','$user_liked','$date')";

     return send_query($query, $db_hostname, $db_user, $db_password, $idea_db);
  }

  function remove_like($like_id){  /**
  * This function is respnosible for removing likes
  * @author Regis
  */

    // global variables from config/db_config.php
    global $ideas_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    $query="DELETE FROM likes" . "WHERE idea_id='$idea_id'";

    return send_query($query, $db_hostname, $db_user, $db_password, $db_user);
  }


?>
