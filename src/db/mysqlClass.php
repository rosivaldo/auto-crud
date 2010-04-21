<?php
/**
 *
 * MySQL Class
 *
 * File: mysqlClass.php
 * Created: 10-04-20
 * $LastModified: Qua 21 Abr 2010 18:37:46 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package db
 * @version 0.0.0.1-alpha
 * 
 */

	require_once 'dbClass.php';

	class mysqlClass extends dbClass {

		protected function doConnect() {
			$this->conn = mysql_pconnect($this->host . ':' . $this->port, 
						     $this->user, 
						     $this->pass);
			if ( ! $this->conn) 
				throw new Exception('Connection not initialized');
			else
				mysql_select_db($this->db, $this->conn);
		}

		# TODO add a refresh flag, so if the array is completed there won't be necessary to retrieve data again
		public function loadTables() {
			if ( ! isset($this->conn))
				$this->doConnect();

			$qryHandler = mysql_query("show tables", $this->conn);
			if (mysql_num_rows($qryHandler) > 0) {
				if (!empty($this->tables))
					unset($this->tables);
				$this->tables = array();
				while ($row = mysql_fetch_row($qryHandler))
					array_push($this->tables, $row[0]);
			}
			mysql_free_result($qryHandler);
		}

		public function getTables() {
			$this->loadTables();
			return $this->tables;
		}

		public function getFields($table) {
			$this->loadFields($table);
			return $this->tables[$table];
		}

		# TODO add a refresh flag, so if the array is completed there won't be necessary to retrieve data again
		public function loadFields($table) {
			if ( ! isset($this->conn))
				$this->doConnect();
			$qryHandler = mysql_query("show columns from " . $table, $this->conn);
			if (mysql_num_rows($qryHandler) > 0) {
				if (!empty($this->tables[$table]))
					unset($this->tables[$table]);
				$this->tables[$table] = array();
				while ($row = mysql_fetch_assoc($qryHandler))
					array_push($this->tables[$table], $row);
			}
			mysql_free_result($qryHandler);
		}

	}
?>
