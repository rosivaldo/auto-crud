<?php

/**
 *
 * File to process tables and dump xml file
 *
 * File: process-tables.php
 *
 * Created: 10-05-03
 *
 * $LastModified: Seg 03 Mai 2010 21:59:29 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo_[at]_gmail.com>
 * @package main
 * @version 0.0.0.1-alpha
 * 
 */


	require_once 'controller.php';

	$pageTitle = $resource['process-tables'];
	$myContent .= '<h1>' . $pageTitle . '</h1>';

	if (!isset($_SESSION['mydb'])) {
		$myContent .= $resource['error-in-session'];
		$myContent .= '<a href="logout.php" title="{clean-session}">{clean-session}</a>';
		$myContent = str_replace('{clean-session}', $resource['clean-session'], $myContent);
	} else {
		try {
			$xmlStruct = '<fieldset table="%s">{fields}</fieldset>';
			$xmlField = '<field>';
			$xmlField .= '<label>%s</label>';
			$xmlField .= '<column>%s</column>';
			$xmlField .= '<type>%s</type>';
			$xmlField .= '<required>%s</required>';
			$xmlField .= '</field>';


			$mydb = $_SESSION['mydb'];
			$tables = $mydb->getTables();

			$xmlContents = '<?xml version="1.0" encoding="UTF-8" ?><database>{fieldset}</database>';
			$tableContent = '';
			foreach ($tables as $table) {
				$fields = $mydb->getFields($table);
				$fieldContent = '';
				foreach ($fields as $field) {
					$fieldContent .= sprintf($xmlField, $field['Field'],
									    $field['Field'],
									    $field['Type'],
							   		    $field['Null']);
				}
				$tableContent .= sprintf($xmlStruct, $table);
				$tableContent = str_replace('{fields}', $fieldContent, $tableContent);
			}
			$xmlContents = str_replace('{fieldset}', $tableContent, $xmlContents);

			$fileHandler = fopen(XMLDIR . '/monetize.xml', 'w');
			fwrite($fileHandler, $xmlContents);
			fclose($fileHandler);

			$myContent .= '<a href="' . XMLDIR . '/monetize.xml">File</a>';
		} catch (Exception $e) {
			$myContent .= '<div class="msg_error">' . $e->getMessage() . '</div>';
		}
	}
	require_once 'template.php';
?>
