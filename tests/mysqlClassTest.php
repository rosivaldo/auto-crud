<?php
	require_once 'PHPUnit/Framework.php';
	require_once '../src/db/dbFactory.php';
	require_once '../src/common/exceptions/exceptions.php';

	class mysqlClassTest extends PHPUnit_Framework_TestCase {
		public function testLoad() {
			$type = 'mysql';
			$obj = dbFactory::getDb($type, '127.0.0.1', '3306', 'sometest', 'root', '123');
			$myTables = $obj->getTables();
			$this->assertFalse(empty($myTables));
			$myFields = $obj->getFields($myTables[1]);
			$this->assertFalse(empty($myFields));

			$myTables = $obj->getTables();
			$this->assertFalse(empty($myTables));
			$myFields = $obj->getFields($myTables[1]);
			$this->assertFalse(empty($myFields));
		}

		/**
		 * @expectedException DbNotFoundException
		 */
		public function testInvalidType() {
			$type = 'unknow';
			$obj = dbFactory::getDb($type, '0.0.0.0', '0', 'asdfg', 'root', 'rrr');
		}
	}
?>
