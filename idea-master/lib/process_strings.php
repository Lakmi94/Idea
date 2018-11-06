<?php
	/**
	* This function accepts a String value
	* and scans it for "http://" tags
	* @author Nuwan
	*/
	function stringScanner($str) {

		$temp = explode(" ",$str);

		for ($i = 0;$i <= sizeof($temp); $i++) {

			// convert the string to lowercase first then,
			// if "http://" tag is detected then link it
			if(false !== strpos(strtolower($temp[$i]),'http://')) {

					$temp[$i] = "<a href =" .$temp[$i] .">" .$temp[$i] ."</a>";

			} // end if

			// if not just, whatever man

		} // end for

		return implode(" ",$temp);

	}	// end function
?>
