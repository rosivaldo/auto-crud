<?php

/**
 *
 * Filte to display fields of a specific table
 *
 * File: fields.php
 *
 * Created: 10-04-23
 *
 * $LastModified: Sex 23 Abr 2010 21:24:47 BRT
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
	
	if (isset($_POST['table'])) {
		$pageTitle = sprintf($resource['fields-of-table'], $_POST['table']);
		if (isset($_SESSION['mydb'])) {
			$mydb = $_SESSION['mydb'];
			$fields = $mydb->getFields($_POST['table']);
			$myContent .= '<h1>' . $pageTitle . '</h1>';
			$myContent .= '<table>';
			$line = '<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>';
			foreach ($fields as $field) {
				$myContent .= sprintf($line, $field['Field'],
							     $field['Type'],
							     $field['Null'],
							     $field['Key'],
							     $field['Default'],
							     $field['Extra']);
			}
			$myContent .= '</table>';
		} else {
			$myContent .= $resource['error-in-session'];
			$myContent .= '<a href="logout.php" title="{clean-session}">{clean-session}</a>';
			$myContent = str_replace('{clean-session}', $resource['clean-session'], $myContent);
		}
		require_once 'template.php';
	} else {
		header('Location: index.php');
	}
?>
