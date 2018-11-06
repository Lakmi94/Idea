<?php
include $_SERVER['DOCUMENT_ROOT'].'/idea/models/members_model.php';
check_login();
?>

<html>
<head>
  <?php
  // load scripts
  require $_SERVER['DOCUMENT_ROOT'].'/idea/includes/scripts.php';
  ?>
</head>

<body>
  <?php
    // load navbar
    require $_SERVER['DOCUMENT_ROOT'].'/idea/includes/navbar.php';
    require $_SERVER['DOCUMENT_ROOT'].'/idea/models/ideas_model.php';
  ?>

  <!-- BODY START -->
  <div class="page container-fluid ">
    <div class="row-fluid">
      <div id="sidebar" class="span3">
        <aside class="sidebar">
          <h2>Sidebar?</h2>
          <ul>
            <li>Whatever?</li>
            <li>Man?</li>
          </ul>
        </aside>
      </div>
      <div id="center-stage" class="span7 center-stage">

        <div id="form" class="block">
          <form id="post_idea" action="../controllers/idea_controller.php" method="POST">
            <input type="text" name="idea" />
            <input style="display:none" name="action" value="create_idea"/>
            <button name="submit" type="submit">Post</button>
          </form>
        </div>

        <?php
          // print all ideas with div class block
          $result = get_all_ideas();
          if ($result = get_all_ideas())
          {
            while ($row = $result->fetch_array())
            {
              echo '<div class="block">';
              echo $row['post'] . "<br/>";
              echo $row['username'] . "<br/>";
              echo '</div>';
            }

          } else {
            // no ideas exist
            echo "<h1> No Ideas Exists </h1>";
          }
        ?>


      </div>
    </div>
  </div>
  <!-- BODY END -->

  <?php
  // load navbar
  require $_SERVER['DOCUMENT_ROOT'].'/idea/includes/footer.php';
  ?>
</body>
</html>
