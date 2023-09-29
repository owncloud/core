<?php

# check PHP version
$eol = '<br>';
if (\defined('OC_CONSOLE')) {
	$eol = PHP_EOL;
}
if (PHP_VERSION_ID < 80200) {
	echo 'This version of ownCloud requires at least PHP 8.2.0'.$eol;
	echo 'You are currently running PHP ' . PHP_VERSION . '. Please update your PHP version.'.$eol;
	exit(1);
}

if (PHP_VERSION_ID >= 80300) {
	echo 'This version of ownCloud is not compatible with PHP 8.3' . $eol;
	echo 'You are currently running PHP ' . PHP_VERSION . '.' . $eol;
	exit(1);
}

// running oC on Windows is unsupported since 8.1, this has to happen here because
// it seems that the autoloader on Windows fails later and just throws an exception.
if (PHP_OS_FAMILY === 'Windows') {
	echo 'ownCloud Server does not support Microsoft Windows.';
	exit(1);
}

require_once __DIR__ . '/kernel.php';
