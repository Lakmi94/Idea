<?php
/**
* Controller script responsible for handling CRUD operations for
* comments.
* @author Delvison Castillo delvisoncastillo@gmail.com
*/

  include $_SERVER['DOCUMENT_ROOT'].'/idea/models/comments_model.php';

  $action = $_POST['action'];

  if ($action == 'delete_comment')
  {
    $comment_id = $_POST['comment_id'];
    if (remove_comment($comment_id))
    {
      // successful comment deletion
      // TODO: redirect appropriately
    } else {
      // unsuccessful comment deletion
      // TODO: redirect appropriately
    }

  } else {

    $comment = $_POST['comment'];

    if ($action == 'create_comment')
    {
      $idea_id = $_POST['idea_id'];
      $user_commented = $_POST['user'];

      if (create_comment($idea_id,$user_commented,$comment) )
      {
        // successful comment creation
        // TODO: redirect appropriately
      } else {
        // unsuccessful comment creation
        // TODO: redirect appropriately
      }
    }

    if ($action == 'update_comment')
    {
      $comment_id = $_POST['comment_id'];
      if (update_comment($comment_id, $comment))
      {
        // successful update
        // TODO: redirect appropriately
      } else {
        // unsuccessful update
        // TODO: redirect appropriately
      }

  }

?>
