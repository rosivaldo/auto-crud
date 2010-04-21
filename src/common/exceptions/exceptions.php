<?php
/**
 *
 * Main exceptions file
 *
 * File: exceptions.php
 * Created: 10-04-20
 * $LastModified: Qua 21 Abr 2010 18:37:10 BRT
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.gnu.org/licenses/gpl.txt.
 *
 * @author  Rosivaldo Ramalho <rosivaldo {at} gmail.com>
 * @package exceptions
 * @version 0.0.0.1-alpha
 * 
 */

	class DbNotFoundException extends Exception {
		public function __construct($message, $code = 10000, Exception $previous = null) {
			parent::__construct($message, $code, $previous);
		}

		public function __toString() {
			return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
		}

	}
?>
