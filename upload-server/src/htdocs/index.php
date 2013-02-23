<?php
// Initialize
function __autoload($className) {
	$className = trim($className, '\\');
	$className = str_replace('\\', '/', $className);
	
	include_once('../library/'.$className.'.php');
}

require('../library/vendor/autoload.php');

require_once('../config/configuration.php');

// use \Aws\AwsS3Adapter;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Server</title>
</head>
<body>
	<h1>Under Construction</h1>
	<p>We are still developing the upload server.</p>
	<?php
	echo Chill\Configure::read('AWS_ACCESS_KEY_ID');
// 	$api = new AwsS3Adapter();
// 	$api->getObjects();

// 	$api = new S3();
// 	$api->setAuth(Chill\Configure::read('AWS_ACCESS_KEY_ID'), Chill\Configure::read('AWS_SECRET_ACCESS_KEY'));
// 	$api->setEndpoint(Chill\Configure::read('AWS_S3_BUCKET_HOSTNAME'));
	
// 	$buckets = $api->listBuckets(true);
	
// 	var_dump($buckets);
	?>
	<br />
	<?php 
// 	$bucket_api = new S3('http://s3-ap-southeast-1.amazonaws.com');
// 	$bucket_api->setAuth(Chill\Configure::read('AWS_ACCESS_KEY_ID'), Chill\Configure::read('AWS_SECRET_ACCESS_KEY'));
// 	$bucket_api->setEndpoint(Chill\Configure::read('AWS_S3_BUCKET_HOSTNAME'));
// 	$objects = $bucket_api->getBucket('rawchill');
	
// 	var_dump($objects);
	?>
</body>
</html>