<?php
/**
* This script defines all functions responsible for dealing with the user model.
*/

  include_once $_SERVER['DOCUMENT_ROOT'].'/idea/lib/passwd.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/idea/lib/error_reporing.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/idea/lib/db_helper.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/idea/config/db_config.php';

  /**
  * Creates a user in the database.
  * @param string $username Desired username
  * @param string $username Desired username
  * @param string $password Desired password
  * @param string $email User's email
  * @param string $date Date of creation
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function create_user($username, $password, $email, $date)
  {
    // global variables from config/db_config.php
    global $members_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $members_db;

    // generate salt and hashed password
    $salt = randomSalt();
    $hash = create_hash($password, 'sha1', $salt);

    $query = "INSERT INTO $members_db_table (id, username, email, password,".
    " salt, created_dt) VALUES".
    " ('NULL','$username','$email','$hash','$salt','$date');";

    // called from lib/db_helper.php
    return send_query($query, $db_hostname, $db_user, $db_password,
    $members_db);
  }

  /**
  * Takes in a username and password and verifies that both match the record on
  * the database. Returns a boolean value indicating whether or not the login
  * was successful.
  * @param string $username Username that was given to the login page
  * @param string $password Password that was given to the login page
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function login_user($username, $password)
  {
    // global variables from config/db_config
    global $members_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $members_db;

    // query the database for the user's record
    $query = "SELECT * FROM $members_db_table WHERE username='$username';";
    $result = receive_query($query, $db_hostname, $db_user, $db_password,
    $members_db);

    // extract record from query
    $row = $result->fetch_array();

    // password and salt from the database
    $db_password = $row['password'];
    $db_salt = $row['salt'];

    // validate the password typed
    $logged_in = validateLogin($password, $db_password, $db_salt, 'sha1');

    return $logged_in;
  }

  /**
  * Checks if a username exists on the session. If not, then it
  * redirects to login page.
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function check_login()
  {
    session_id('mySessionID');
    session_start();
    if (!isset($_SESSION['username']))
    {
      // redirect to the login page
      header("Location: /idea/login.php?error=login_first");
      die();
    }
  }

  /**
 	 * Takes in a username and gets their corresponsing ID from the database.
   * Returns the users ID if successful and -1 if not.
 	 * @param String $username The username whose ID we want
 	 * @author Delvison Castillo delvisoncastillo@gmail.com
	 */
  function get_user_id($username)
  {
    // global variables from config/db_config.php
    global $members_db_table;
    global $db_hostname;
    global $db_user;
    global $db_password;
    global $members_db;

    $query = "SELECT * FROM $members_db_table WHERE username='$username';";

    if ($result = receive_query($query, $db_hostname, $db_user,
        $db_password,$members_db))
    {
      // extract record from query
      $row = $result->fetch_array();
      return $row['id'];
    } else {
      return -1;
    }
  }

  /**
  * Terminates a session and all of its variables.
  * @author Delvison Castillo delvisoncastillo@gmail.com
  */
  function logout()
  {
    session_id('mySessionID');
    session_start();
    session_destroy();
    header("Location: ../index.php");
    die();
  }


?>
