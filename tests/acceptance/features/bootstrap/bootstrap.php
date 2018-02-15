<?php
$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("TestHelpers\\", __DIR__. "/../../../../tests/TestHelpers/", true);
$classLoader->register();
