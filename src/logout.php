<?php
/**
 *
 * Destroy session and it's information
 *
 * File: logout.php
 * Created: 10-04-20
 * $LastModified: Qua 21 Abr 2010 18:39:32 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package main
 * @version 0.0.0.1-alpha
 * 
 */
	session_start();
	session_destroy();
	header('Location: index.php');
?>
