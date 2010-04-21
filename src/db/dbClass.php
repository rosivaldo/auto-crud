<?php
/**
 *
 * Generic database class
 *
 * File: dbClass.php
 * Created: 10-04-20
 * $LastModified: Qua 21 Abr 2010 18:37:35 BRT
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

		protected $tables;

		abstract public function getTables();
		abstract public function loadTables();
		abstract public function getFields($table);
		abstract public function loadFields($table);
		abstract protected function doConnect();

		function __construct($host, $port, $db, $user, $pass) {
			$this->host = $host;
			$this->port = $port;
			$this->db = $db;
			$this->user = $user;
			$this->pass = $pass;
		}
	}
?>
