<?php

$currentDir = dirname(__FILE__);

require_once "php-opencloud.php";

$classLoader = new SplClassLoader('OpenCloud', $currentDir . '/../lib');
$classLoader->register();
    
?>
