<?php
require __DIR__ . '/../../../../lib/composer/autoload.php';
require_once __DIR__ . '/../lib/setupHelper.php';

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Page\\", __DIR__. "/../lib", true);

$classLoader->register();
