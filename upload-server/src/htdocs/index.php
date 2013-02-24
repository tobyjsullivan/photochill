<?php
// Initialize
function __autoload($className) {
	$className = trim($className, '\\');
	$className = str_replace('\\', '/', $className);
	
	include_once('../library/'.$className.'.php');
}

require('../library/vendor/autoload.php');

require_once('../config/configuration.php');

use Chill\Configure;
use Aws\S3\S3Client;

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
	<ul>
	<?php
	echo Configure::read('AWS_ACCESS_KEY_ID');
	$client = S3Client::factory(array(
		'key'    => Configure::read(Configure::AWS_ACCESS_KEY_ID),
		'secret' => Configure::read(Configure::AWS_SECRET_ACCESS_KEY),
		'region' => Configure::read(Configure::AWS_S3_REGION)
	));

	$result = $client->listObjects(array(
		'Bucket' => Configure::read(Configure::AWS_S3_BUCKET)
	));
	
	foreach($result['Contents'] as $object) {
		?>
		<li><?php echo $object['Key']; ?></li>
		<?php
	}
	?>
	</ul>
</body>
</html>