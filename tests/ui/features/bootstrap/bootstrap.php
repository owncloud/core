<?php
require __DIR__ . '/../../../../lib/composer/autoload.php';

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Page\\", __DIR__. "/../lib", true);
$classLoader->addPsr4("TestHelpers\\", __DIR__. "/../../../TestHelpers/", true);

$classLoader->register();

// Sleep for 10 milliseconds
const STANDARDSLEEPTIMEMILLISEC = 10;
const STANDARDSLEEPTIMEMICROSEC = STANDARDSLEEPTIMEMILLISEC * 1000;

// Default timeout for use in code that needs to wait for the UI
const STANDARDUIWAITTIMEOUTMILLISEC = 10000;
