<?php
/**
 *
 * Main index file
 *
 * File: index.php
 *
 * Created: 10-04-20
 *
 * $LastModified: Sex 23 Abr 2010 20:22:33 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package main
 * @version 0.0.0.1-alpha
 * 
 */

	require_once 'controller.php';

	if (isset($_SESSION['dbType']) && 
	    isset($_SESSION['dbUser']) &&
	    isset($_SESSION['dbPass']) &&
	    isset($_SESSION['dbHost']) &&
	    isset($_SESSION['dbDb']) &&
	    isset($_SESSION['dbPort'])) {

		$dbType = $_SESSION['dbType'];
		$dbUser = $_SESSION['dbUser'];
		$dbPass = $_SESSION['dbPass'];
		$dbHost = $_SESSION['dbHost'];
		$dbDb = $_SESSION['dbDb'];
		$dbPort = $_SESSION['dbPort'];

		try {
			$mydb = dbFactory::getDb($dbType, $dbHost, $dbPort, $dbDb, $dbUser, $dbPass);
			$_SESSION['mydb'] = $mydb;
		} catch (Exception $e) {
			$pageTitle = $resource['title-index-nosession'];
			$myContent .= '<div class="msg_error">' . $e->getMessage() . '</div>';
			require_once 'template.php';
		}
		header('Location: tables.php');
	} else {
		$pageTitle = $resource['title-index-nosession'];

		$myContent .= '<h1>' . $resource['title-index-nosession'] . '</h1>';
		$myContent .= '<form action="actions/do_index.php" method="post">';
		$myContent .= '<label for="database_type">' . $resource['database-type'] . '</label>';
		$myContent .= '<input type="text" name="database_type" maxlength="8" id="database_type" value="mysql"/><br />';
		$myContent .= '<label for="database_user">' . $resource['username'] . '</label>';
		$myContent .= '<input type="text" name="database_user" id="database_user"/><br />';
		$myContent .= '<label for="database_pass">' . $resource['password'] . '</label>';
		$myContent .= '<input type="text" name="database_pass" id="database_pass"/><br />';
		$myContent .= '<label for="database_host">' . $resource['hostname'] . '</label>';
		$myContent .= '<input type="text" name="database_host" id="database_host"/><br />';
		$myContent .= '<label for="database_port">' . $resource['port'] . '</label>';
		$myContent .= '<input type="text" name="database_port" id="database_port" value="3306"/><br />';
		$myContent .= '<label for="database_db">' . $resource['database'] . '</label>';
		$myContent .= '<input type="text" name="database_db" id="database_db"/><br />';
		$myContent .= '<input type="submit" />';
		$myContent .= '<input type="reset" />';
		$myContent .= '</form>';
		$myContent .= '</div>';
	
		require_once 'template.php';
	}
?>
