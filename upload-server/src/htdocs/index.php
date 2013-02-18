<?php
// Initialize
function __autoload($className) {
	$className = trim($className, '\\');
	$className = str_replace('\\', '/', $className);
	
	include_once('../library/'.$className.'.php');
}
require_once('../config/configuration.php');

use \Aws\AwsS3Adapter;
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
	$api = new AwsS3Adapter();
	$api->getObjects();
	?>
</body>
</html>