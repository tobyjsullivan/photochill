<?php
namespace Chill;

class Configure {
	const AWS_S3_BUCKET = 'AWS_S3_BUCKET';
	const AWS_ACCESS_KEY_ID = 'AWS_ACCESS_KEY_ID';
	const AWS_SECRET_ACCESS_KEY = 'AWS_SECRET_ACCESS_KEY';
	const AWS_S3_REGION = 'AWS_S3_REGION';
	
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