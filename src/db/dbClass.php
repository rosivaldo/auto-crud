<?php
/**
 *
 * Generic database class
 *
 * File: dbClass.php
 * Created: 10-04-20
 * $LastModified: Qui 22 Abr 2010 14:20:14 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package db
 * @version 0.0.0.1-alpha
 * 
 */

	abstract class dbClass {
		protected $host;
		protected $port;
		protected $db;
		protected $user;
		protected $pass;

		protected $conn;
		protected $error;

		protected $tables;

		abstract public function getTables();
		abstract public function loadTables();
		abstract public function getFields($table);
		abstract public function loadFields($table);

		abstract protected function doConnect();
		abstract protected function doQuery($sql);
		abstract public function hasError();
		abstract public function getError();
		abstract protected function setError($text);

		function __construct($host, $port, $db, $user, $pass) {
			$this->host = $host;
			$this->port = $port;
			$this->db = $db;
			$this->user = $user;
			$this->pass = $pass;
		}
	}
?>
