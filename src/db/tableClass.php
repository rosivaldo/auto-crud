<?php

/**
 *
 * Table class.
 *
 * File: tableClass.php
 *
 * Created: 10-04-24
 *
 * $LastModified: Dom 25 Abr 2010 16:17:35 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo_[at]_gmail.com>
 * @package db
 * @version
 * 
 */

	/**
	 * table 
	 * 
	 * @package db
	 * @version
	 * @copyright 2010
	 * @author Rosivaldo Ramalho <rosivaldo_[at]_gmail.com> 
	 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
	 */
	class table {
		protected $name;
		protected $fields = array();

		public function setName($name) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function setFields($fields) {
			$this->fields = $fields;
		}

		public function getFields() {
			return $this->fields;
		}

		public function addField($field) {
			array_push($this->fields, $field);
		}
	}
?>
