<?php
/**
 *
 * Database factory
 *
 * File: dbFactory.php
 * Created: 10-04-20
 * $LastModified: Sex 23 Abr 2010 20:47:26 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package db
 * @version 0.0.0.1-alpha
 * 
 */

	require_once dirname(__FILE__) . '/../common/exceptions/exceptions.php';

	class dbFactory {
		public static function getDb($type, $host, $port, $db, $user, $pass) {
			if (file_exists(dirname(__FILE__) . '/' . $type . 'Class.php')) {
				require_once dirname(__FILE__) . '/' . $type . 'Class.php';
				$classname = $type . 'Class';
				return new $classname($host, $port, $db, $user, $pass);
			} else {
				throw new DbNotFoundException('Unable to find database type: ');
			}
		}
	}
?>
