<?php

/**
 *
 * Just got the requires and language definitions
 *
 * File: controller.php
 *
 * Created: 10-04-23
 *
 * $LastModified: Sex 23 Abr 2010 20:53:47 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo_[at]_gmail.com>
 * @package main
 * @version
 * 
 */

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

	require_once 'db/mysqlClass.php';
	require_once 'db/dbFactory.php';

	session_start();

	$myContent = '';
?>
