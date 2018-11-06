<?php
  /**
  * This script defines all functions responsible for dealing with comments.
  */

  /**
  * Creates a comment on the database.
  * @param $idea_id ID of the idea post that the comment belongs to
  * @param $user_commented The user who is posting the comment
  * @param $comment The comment to be posted
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function create_comment($idea_id,$user_commented,$comment)
  {
    // global variables from config/db_config.php
    global $comments_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    // get current datetime
    date_default_timezone_set('Asia/Seoul');
    $date = date("Y-m-d H:i:s");

    // construct query
    $query = "INSERT INTO $members_db_table (id, idea_id, user_commented,"
    ." comment, date_created) VALUES".
    " ('NULL','$idea_id','$user_commented','$comment','$date');";

    // called from lib/db_helper.php
    return send_query($query, $db_hostname, $db_user, $db_password,
    $members_db);
  }

  /**
   * Updates a comment in the database
   * @param $comment_id ID of the comment to be updated
   * @param $new_comment New comment to replace the old
   * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function update_comment($comment_id, $new_comment)
  {
    // global variables from config/db_config.php
    global $comments_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    // get current datetime
    date_default_timezone_set('Asia/Seoul');
    $date = date("Y-m-d H:i:s");

    // construct query
    $query = "UPDATE comments SET comment='$new_comment' WHERE ".
    "comments . id='$comment_id'";

    // called from lib/db_helper.php
    return send_query($query, $db_hostname, $db_user, $db_password,
    $members_db);
  }

  /**
  * Removes a comment of a given ID from the database
  * @param $comment_id The ID of the comment to be removed.
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function remove_comment($comment_id)
  {
    // global variables from config/db_config.php
    global $comments_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    // construct query
    $query = "DELETE FROM comments WHERE comments . id='$comment_id'";

    // called from lib/db_helper.php
    return send_query($query, $db_hostname, $db_user, $db_password,
    $members_db);

  }

  /**
  * Gets a comment of a given ID from the database
  * @param $comment_id The ID of the comment to be fetched.
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function get_comment($comment_id)
  {
    // global variables from config/db_config.php
    global $comments_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    $query = "SELECT * FROM comments WHERE id='$comment_id'";

    return receive_query($query, $db_hostname,$db_user,$db_password,$idea_db);
  }

  /**
  * Gets all comments belong to an idea.
  * @param $comment_id The ID of the comment to be fetched.
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function get_ideas_comment($idea_id)
  {
    // global variables from config/db_config.php
    global $comments_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    $query = "SELECT * FROM comments WHERE idea_id='$idea_id'";

    return receive_query($query, $db_hostname,$db_user,$db_password,$idea_db);
  }

  /**
  * Gets all comments for a given Idea pose
  * @param $idea_id The ID of the Idea post.
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function get_all_comments($idea_id)
  {
    // global variables from config/db_config.php
    global $comments_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $idea_db;

    $query = "SELECT * FROM comments;";

    return receive_query($query, $db_hostname,$db_user,$db_password,$idea_db);
  }

?>
