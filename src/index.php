<?php
	session_start();
	require_once 'common/config.php';

	# sets default language
	$lang = DEFAULT_LANG;

	# checks if browser sets language
	# if it does, check if it exists
	# otherwise, set to default
	if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$lang = strtolower($lang);
		$lang = substr($lang, 0, strpos($lang, ','));
		$lang = ( (in_array($lang, $langs)) ? $lang : DEFAULT_LANG );
	}

	# loads lang file
	# a file for a language, for better performance
	require_once 'common/langs/lang.' . $lang . '.php';

	if (isset($_SESSION['dbType']) && 
	    isset($_SESSION['dbUser']) &&
	    isset($_SESSION['dbPass']) &&
	    isset($_SESSION['dbHost']) &&
	    isset($_SESSION['dbDb']) &&
	    isset($_SESSION['dbPort'])) {
		echo 'session started';
		$dbType = $_SESSION['dbType'];
		$dbUser = $_SESSION['dbUser'];
		$dbPass = $_SESSION['dbPass'];
		$dbHost = $_SESSION['dbHost'];
		$dbDb = $_SESSION['dbDb'];
		$dbPort = $_SESSION['dbPort'];

	    	require_once 'db/mysql.php';
		getDbTables();

	} else {
		$myHeader = str_replace('{pagetitle}', $resource['title-index-nosession'], $myHeader);
		echo $myHeader;
		echo '<div id="content">';
		echo '<h1>' . $resource['title-index-nosession'] . '</h1>';
		echo '<form action="actions/do_index.php" method="post">';
		echo '<label for="database_type">' . $resource['database-type'] . '</label>';
		echo '<input type="text" name="database_type" maxlength="8" id="database_type" value="mysql"/><br />';
		echo '<label for="database_user">' . $resource['username'] . '</label>';
		echo '<input type="text" name="database_user" id="database_user"/><br />';
		echo '<label for="database_pass">' . $resource['password'] . '</label>';
		echo '<input type="text" name="database_pass" id="database_pass"/><br />';
		echo '<label for="database_host">' . $resource['hostname'] . '</label>';
		echo '<input type="text" name="database_host" id="database_host"/><br />';
		echo '<label for="database_port">' . $resource['port'] . '</label>';
		echo '<input type="text" name="database_port" id="database_port" value="3306"/><br />';
		echo '<label for="database_db">' . $resource['database'] . '</label>';
		echo '<input type="text" name="database_db" maxlength="8" id="database_db"/><br />';
		echo '<input type="submit" />';
		echo '<input type="reset" />';
		echo '</form>';
		echo '</div>';
	}
	$myFooter = str_replace('{appname}', APPNAME, $myFooter);
	$myFooter = str_replace('{version}', VERSION, $myFooter);
	echo $myFooter;
?>
