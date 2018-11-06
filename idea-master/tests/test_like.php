<?php
  // checks if a user is logged in
  include $_SERVER['DOCUMENT_ROOT'].'/idea/models/members_model.php';
  check_login();
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="js/jquery-2.1.3.min.js"></script>
</head>


  <body>
    <div class="page">
    <?php
    // load navbar
    require $_SERVER['DOCUMENT_ROOT'].'/idea/includes/navbar.php';
    ?>
    <form action="controllers/like_controller.php" method="POST">
      <input style="display:none" name="action" value="create_like" />
      <input style="display:none" name="idea_id" value="1" />
      <input style="display:none" name="user_liked" value="<?php echo $_SESSION['username']; ?>" />
      <button type="submit"> Like </button>
    </form>
  </div>
  </body>

</html>
