<?php
namespace Chill\Aws;

class S3Object {
	private $key = NULL; 
	private $size = NULL;
	
	public function __construct($objData) {
		$this->key = $objData['Key'];
		$this->size = $objData['Size'];
	}
	
	public function getFilename() {
		return basename($this->key);
	}
	
	public function getFolder() {
		return dirname($this->key);
	}
	
	public function getKey() {
		return $this->key;
	}
	
	public function getSize() {
		return $this->size;
	}
}