<?php
	class DbNotFoundException extends Exception {
		public function __construct($message, $code = 10000, Exception $previous = null) {
			parent::__construct($message, $code, $previous);
		}

		public function __toString() {
			return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
		}

	}
?>
