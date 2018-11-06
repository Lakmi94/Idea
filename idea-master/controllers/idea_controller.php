<?php
	/**
	* Controller script responsible for handling CRUD operations for
	* ideas posted.
	* @author nuwan
	*/
	include_once $_SERVER['DOCUMENT_ROOT'].'/idea/models/ideas_model.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/idea/models/members_model.php';

	// error reporting
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);

	$action = $_POST['action'];
	$idea = $_POST['idea'];

	// debug
	echo "action: ".$action."<br/>";

	if ( $action == ' delete_idea')
	{
		$idea_id = $_POST['idea_id'];
		if ( remove_idea($idea_id))
		{
			// TODO: finish
			// successful idea deletion
			// redirect
		}
		else
		{
			// TODO: finish
			// unsuccessful idea deletion
			// redirect
		}
	}

	if ($action == 'create_idea')
	{
		// check that a user is logged in (from members_model.php)
		check_login();
		// get user from session
		$user_posted = $_SESSION['username'];

		// debug
		echo "user: ".$user_posted."<br/>";
		echo "idea: ".$idea."<br/>";

		if(create_idea($user_posted, $idea))
		{
			// TODO: finish
			// successful idea creation
			// debug
			echo "<h1> Idea Successfully Posted.</h1>";
			// redirect
		}
		else
		{
			// TODO: finish
			// unsuccessful idea creation
			// debug
			echo "<h1> Failed to post idea. </h1>";
			// redirect
		}
	}

	if ($action == 'update_idea')
	{
	  $idea = $_POST['idea'];

		$idea_id = $_POST['idea_id'];
		if (update_idea($idea_id, $idea))
		{
			// TODO: finish
			// successfully updated
			// redirect
		}
		else
		{
			// TODO: finish
			// update failed
			// redirect
		}
	}

?>
