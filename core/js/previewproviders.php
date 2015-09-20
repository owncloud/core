<?php

$providers = \OC::$server->getPreviewManager()->getProviders();

$types = array_keys($providers);

$types = array_map(function($type) {
	return substr($type, 1, -1);
}, $types);

echo 'OC.Preview._Providers = ' . json_encode($types, JSON_PRETTY_PRINT) . ';';
