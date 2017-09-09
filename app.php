<?php

use OC\Kernel;
use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/lib/composer/autoload.php';

$request = Request::createFromGlobals();
$kernel = new Kernel(true);
$kernel->handle($request);