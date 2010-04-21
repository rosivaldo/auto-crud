<?php
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
