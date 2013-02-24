<?php
namespace Chill\Aws;

use Chill\Configure;
use Aws\S3\S3Client;

class S3 {
	private $client = NULL;
	private $region = NULL;
	
	public function __construct($region = NULL) {
		if($region == NULL) {
			$region = Configure::read(Configure::AWS_S3_REGION);
		}
		
		$this->region = $region;
	}
	
	public function listObjects($bucket = NULL, $prefix = NULL) {
		if($bucket == NULL) {
			$bucket = Configure::read(Configure::AWS_S3_BUCKET);
		}
		
		$client = $this->getClient();
		
		$params = array('Bucket' => $bucket);
		
		if($prefix != NULL) {
			$params['Prefix'] = $prefix;
		}
		
		$result = $client->listObjects($params);
		
		$allObjects = array();
		foreach($result['Contents'] as $objData) {
			$allObjects[] = new S3Object($objData);
		}
		
		return $allObjects;
	}
	
	private function getClient() {
		if($this->client == NULL) {
			$this->client = S3Client::factory(array(
					'key'    => Configure::read(Configure::AWS_ACCESS_KEY_ID),
					'secret' => Configure::read(Configure::AWS_SECRET_ACCESS_KEY),
					'region' => $this->region
				));
		}
		
		return $this->client;
	}
}