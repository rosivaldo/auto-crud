<?php
/**
 *
 * Main configuration file
 *
 * File: config.php
 * Created: 10-04-20
 * $LastModified: Qua 21 Abr 2010 18:34:05 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package common
 * @version 0.0.0.1-alpha
 * 
 */

	define('VERSION', '0.0.0.1-alpha');

	define('APPNAME', 'auto-crud');

	# languages available
	$langs = array('en', 'pt-br');

	define('DEFAULT_LANG', 'en');

	# HTML stuff
	$myHeader = <<<MYHEADER
<html>
	<head>
		<title>auto-crud | {pagetitle}</title>
		<link type="text/css" rel="stylesheet" href="css/style.css" />
	</head>
MYHEADER;

	$myFooter = <<<MYFOOTER
		<div id="footer">
			{appname} - {version}
		</div>
	</body>
</html>
MYFOOTER;
?>
