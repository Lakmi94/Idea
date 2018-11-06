
<html>
<body>
<?php

include $_SERVER['DOCUMENT_ROOT'].'/idea/lib/check_pwd.php';




  $str = $_POST['password'];
  $chk = check_pwd($str);

  echo "<p>checking password....</p><br>";



  if ( $chk )
  {
    echo "good password";
  }
  else {
    echo "bad password";
  }
?>
</body>
</html>
