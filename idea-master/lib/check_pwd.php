<?php

	/**
	* This function checks whether the password contains any alphabetic
	*	characters and numeric values
	* @author Nuwan
	*/
	function check_pwd($str)
	{
		if ( strlen($str) >= 8 &&
				strlen($str) <= 30 &&
				preg_match('/[A-Z]/',$str ) &&
				preg_match('#[0-9]#',$str) &&
				preg_match('/[a-z]/',$str ))
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	/**
	* This function checks whether a given username is greater than 8
	* characters and less than 30.
	* @author Delvison Castillo delvisoncastillo@gmail.com
	*/
	function check_username($str)
	{
		if ( strlen($str) >= 4 &&
				strlen($str) <= 30)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	* This function checks whether a given email is valid.
	* @author Delvison Castillo delvisoncastillo@gmail.com
	*/
	function check_email($str)
	{
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


?>
