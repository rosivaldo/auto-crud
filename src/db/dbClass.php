<?php
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
