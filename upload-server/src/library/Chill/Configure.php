<?php
namespace Chill;

class Configure {	
	private static $instance = NULL;
	
	private $vals = array();
	
	public static function write($key, $value) {
		self::getInstance()->setValue($key, $value);
	}
	
	public static function read($key) {
		return self::getInstance()->getValue($key);
	}
	
	private function setValue($key, $value) {
		$this->vals[$key] = $value;
	}
	
	private function getValue($key) {
		if(array_key_exists($key, $this->vals)) {
			return $this->vals[$key];
		}
		
		return NULL;
	}
	
	private static function getInstance() {
		if(self::$instance == NULL) {
			self::$instance = new Configure();
		}
		
		return self::$instance;
	}
}