<?php

/**
 *
 * File to dislpay the list of tables in a specific database
 *
 * File: tables.php
 *
 * Created: 10-04-23
 *
 * $LastModified: Sex 23 Abr 2010 21:34:11 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo_[at]_gmail.com>
 * @package main
 * @version
 * 
 */


	require_once 'controller.php';

	$pageTitle = $resource['title-index-session'];

	if (!isset($_SESSION['mydb'])) {
		$myContent .= $resource['error-in-session'];
		$myContent .= '<a href="logout.php" title="{clean-session}">{clean-session}</a>';
		$myContent = str_replace('{clean-session}', $resource['clean-session'], $myContent);
	} else {
		try {
			$mydb = $_SESSION['mydb'];
			$tables = $mydb->getTables();
			
			$myContent .= '<h1>' . $pageTitle . '</h1>';
			$myContent .= '<form id="field" action="fields.php" method="post"><input type="hidden" name="table" id="table" value="" /></form><br />';
			$myContent .= '<ul id="list_of_tables">';
			$line = '<li><a href="javascript:void(0)" onclick="document.getElementById(\'table\').value = \'%s\'; document.forms[0].submit();">%s</a></li>';
			foreach ($tables as $table) {
				$myContent .= sprintf($line, $table, $table);
			}
			$myContent .= '</ul>';
			$myContent .= '</div>';
		} catch (Exception $e) {
			$myContent .= '<div class="msg_error">' . $e->getMessage() . '</div>';
		}
	}
	require_once 'template.php';
?>
