<?php
	require_once dirname(__FILE__) . '/../common/exceptions/exceptions.php';

	class dbFactory {
		public static function getDb($type, $host, $port, $db, $user, $pass) {
			if (file_exists(dirname(__FILE__) . '/' . $type . 'Class.php')) {
				include_once dirname(__FILE__) . '/' . $type . 'Class.php';
				$classname = $type . 'Class';
				return new $classname($host, $port, $db, $user, $pass);
			} else {
				throw new DbNotFoundException('Unable to find database type: ');
			}
		}
	}
?>
