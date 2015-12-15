<?php
define('PHPUNIT_RUN', 1);

$configDir = getenv('CONFIG_DIR');
if ($configDir) {
	define('PHPUNIT_CONFIG_DIR', $configDir);
}

require_once __DIR__ . '/../lib/base.php';

\OC::$loader->addValidRoot(OC::$SERVERROOT . '/tests');

$appDirs = array_map(function($appRoot) {
	return $appRoot['path'];
}, OC::$APPSROOTS);
foreach($appDirs as $appDir) {
	\OC::$loader->addValidRoot($appDir);
}

// load all enabled apps
\OC_App::loadApps();

if (!class_exists('PHPUnit_Framework_TestCase')) {
	require_once('PHPUnit/Autoload.php');
}

OC_Hook::clear();
