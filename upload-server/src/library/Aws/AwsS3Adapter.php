<?php
namespace Aws;

use \Configure;

class AwsS3Adapter {	
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';
	const METHOD_PUT = 'PUT';
	const METHOD_DELETE = 'DELETE';
	
	const AWS_DATE_FORMAT = 'D, j M Y H:i:s O';
	
	private $bucketHostname;
	private $accessKey;
	private $secretKey;
	
	public function __construct() {
		$this->bucketHostname = Configure::read('AWS_S3_BUCKET_HOSTNAME');
		$this->accessKey = Configure::read('AWS_ACCESS_KEY_ID');
		$this->secretKey = Configure::read('AWS_SECRET_ACCESS_KEY');
	}
	
	public function getObjects() {
		$this->sendRequest('/');
	}
	
	private function sendRequest($path, $method = self::METHOD_GET, $args = array(), $data = NULL) {
		$ch = curl_init('http://'.$this->bucketHostname.$path);
		$dateString = date(self::AWS_DATE_FORMAT);
		
		$headers = array();
		$headers[] = 'Date: '.$dateString;
		$headers[] = 'x-amz-date: '.$dateString;
		$headers[] = 'Authorization: AWS '.$this->accessKey.':'.$this->secretKey;
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		
		if($data != NULL) {
			// TODO
		}
		
		$result = curl_exec($ch);
		
		var_dump($result);
		
		// TODO return
	}
}