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
use Chill\Aws\S3;

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
	$s3 = new S3();
	
	$objects = $s3->listObjects('rawchill', 'images');
	
	foreach($objects as $object) {
		?>
		<li><?php echo $object->getKey().($object->getSize() == 0 ? '' : ', '.$object->getSize().' bytes'); ?></li>
		<?php
	}
	?>
	</ul>
</body>
</html>