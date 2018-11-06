<?php
	/**
	* filename: image_model.php
	* This script is responsible for persisting and retrieving images from the
	*	database.
	*/

	include_once $_SERVER['DOCUMENT_ROOT'].'/idea/models/members_model.php';
	include_once $_SERVER['DOCUMENT_ROOT']. '/idea/lib/db_helper.php';

	/**
	* Function responsible for storing an image in the database
	* @author Delvison Castillo delvisoncastillo@gmail.com
	*/
	function store_image($image, $user_id)
	{
		// global variables from config/db_config.php
		global $idea_db;
		global $images_db_table;
		global $db_hostname;
		global $db_user;
		global $db_password;

		// get image size
		$size = filesize($image);
		// get current date
		date_default_timezone_set('Asia/Seoul');
		$date = date("Y-m-d H:i:s");

		if ( $user_id != -1)
		{
			$query = "INSERT INTO $images_db_table (id, user_id, filename,".
			"date_created, size) VALUES".
			"('NULL','$user_id','$image','$date','$size');";
			return send_query($query,$db_hostname,$db_user,$db_password,$idea_db);
		} else {
			return FALSE;
		}
	}

	/**
	* Function responsible for replacing an image in the database
	* @author
	*/
	function update_image($image_id, $new_image)
	{
		// TODO: Write me.
	}

	/**
	* Function responsible for getting an image from the database
	* @author Delvison Castillo delvisoncastillo@gmail.com
	*/
	function get_image($image_id)
	{
		// global variables from config/db_config.php
		global $idea_db;
		global $images_db_table;
		global $db_hostname;
		global $db_user;
		global $db_password;

		$query = "SELECT * FROM $images_db_table WHERE id='$image_id';";

		if ($result = receive_query($query, $db_hostname, $db_user,
		$db_password,$idea_db))
		{
			// extract record from query
			$row = $result->fetch_array();
			return $row['filename'];
		} else {
			return NULL;
		}
	}

	/**
	* Function responsible for removing an image from the database
	* @author Delvison Castillo delvisoncastillo@gmail.com
	*/
	function remove_image($image_id)
	{
		// global variables from config/db_config.php
		global $idea_db;
		global $images_db_table;
		global $db_hostname;
		global $db_user;
		global $db_password;

		// get the image's name to remove from file system
		$image = get_image($image_id);

		// construct query
		$query = "DELETE FROM images WHERE images . id='$image_id'";

		//send query
		if (send_query($query,$db_hostname,$db_user,$db_password,$idea_db))
		{
			// remove from file system
			unlink($image);
		} else {
			// TODO: Error occured with removing image. Redirect Appropriately.
			// debug
			echo "<h1> Image Not Deleted </h1>";
		}
	}
?>
