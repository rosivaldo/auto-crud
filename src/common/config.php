<?php
	define('VERSION', '0.0.1');
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
