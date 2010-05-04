<?php

/**
 *
 * Template for the entire pages and systems. Always put this at the end
 * of the files. Alway set the $myContent and $pageTitle variables.
 *
 * File: template.php
 *
 * Created: 10-04-23
 *
 * $LastModified: Seg 03 Mai 2010 20:29:02 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo_[at]_gmail.com>
 * @package main
 * @version
 * 
 */

?>


<html>
	<head>
		<title>auto-crud | <?php echo $pageTitle; ?></title>
		<link type="text/css" rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="header">
			<a img src="images/auto-crud.png" alt="auto-crud" />
			<a href="logout.php">Restart</a>
		</div>
		<div id="content">
<?php echo $myContent; ?>
		</div>
		<br />
		<div id="footer">
<?php
	echo "\t\t\t" . APPNAME . ' - ' . VERSION;
?>
		</div>
	</body>
</html>
