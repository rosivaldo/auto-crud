<?php
/**
 *
 * Action file for the main index
 *
 * File: do_index.php
 * Created: 10-04-20
 * $LastModified: Qua 21 Abr 2010 18:39:44 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package actions
 * @version 0.0.0.1-alpha
 * 
 */
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		# TODO Check if variables are empty
		if (isset($_POST['database_type']) && 
	    	    isset($_POST['database_user']) &&
	    	    isset($_POST['database_pass']) &&
	   	    isset($_POST['database_host']) &&
		    isset($_POST['database_port']) &&
		    isset($_POST['database_db'])) {
			$_SESSION['dbType'] = $_POST['database_type'];
	    		$_SESSION['dbUser'] = $_POST['database_user'];
	    		$_SESSION['dbPass'] = $_POST['database_pass'];
	   		$_SESSION['dbHost'] = $_POST['database_host'];
	    		$_SESSION['dbDb'] = $_POST['database_db'];
	    		$_SESSION['dbPort'] = $_POST['database_port'];
			header('Location: ../index.php');
		}
	} else {
		echo 'invalid method';
	}
?>
