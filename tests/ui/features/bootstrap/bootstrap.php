<?php
require __DIR__ . '/../../../../lib/composer/autoload.php';
require_once __DIR__ . '/../lib/setupHelper.php';

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Page\\", __DIR__. "/../lib", true);

$classLoader->register();

// Sleep for 1 second (1000 milliseconds)
const STANDARDSLEEPTIMEMILLISEC = 1000;
const STANDARDSLEEPTIMEMICROSEC = STANDARDSLEEPTIMEMILLISEC * 1000;
