<?php
  session_id('mySessionID');
  session_start();
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
  <?php
    // load navbar
    require $_SERVER['DOCUMENT_ROOT'].'/idea/includes/navbar.php';
  ?>

  <!-- MAIN -->
  <div class="hero-unit page">
    <center>
      <h1> Welcome to Idea! </h1>
    </center>
    <div class="container-fluid" style="margin-top:20px">
      <div class="row-fluid">
        <div class="span4">
          Lorem ipsum dolor sit amet, duo ut alii vocibus. Pro oratio explicari in, te vis partem nostrum. Cu qui sensibus argumentum, et quo utinam epicurei, no mea aeterno voluptatum intellegebat. Nam suas viris eu, fugit graeci eloquentiam vel an. Vix ut ubique
          eloquentiam, ne congue appareat duo, ad mea illum appareat contentiones. Nullam referrentur adversarium quo ne, hinc invidunt signiferumque sit eu, tantas partem equidem eu duo. Id facer nominavi vix, graeci sanctus ne sed.
        </div>
        <div class="span4">
          Lorem ipsum dolor sit amet, duo ut alii vocibus. Pro oratio explicari in, te vis partem nostrum. Cu qui sensibus argumentum, et quo utinam epicurei, no mea aeterno voluptatum intellegebat. Nam suas viris eu, fugit graeci eloquentiam vel an. Vix ut ubique
          eloquentiam, ne congue appareat duo, ad mea illum appareat contentiones. Nullam referrentur adversarium quo ne, hinc invidunt signiferumque sit eu, tantas partem equidem eu duo. Id facer nominavi vix, graeci sanctus ne sed.
        </div>
        <div class="span4">
          Lorem ipsum dolor sit amet, duo ut alii vocibus. Pro oratio explicari in, te vis partem nostrum. Cu qui sensibus argumentum, et quo utinam epicurei, no mea aeterno voluptatum intellegebat. Nam suas viris eu, fugit graeci eloquentiam vel an. Vix ut ubique
          eloquentiam, ne congue appareat duo, ad mea illum appareat contentiones. Nullam referrentur adversarium quo ne, hinc invidunt signiferumque sit eu, tantas partem equidem eu duo. Id facer nominavi vix, graeci sanctus ne sed.
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN END-->

  <?php
  // load navbar
  require $_SERVER['DOCUMENT_ROOT'].'/idea/includes/footer.php';
  ?>
</body>

</html>
