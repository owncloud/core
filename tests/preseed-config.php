<?php
$CONFIG = [
	'apps_paths' => [
		[
			'path'		=> OC::$SERVERROOT . '/apps',
			'url'		=> '/apps',
			'writable'	=> true,
		],
	],
	'default_language' => 'en',
];

if (\is_dir(OC::$SERVERROOT.'/apps2')) {
	$CONFIG['apps_paths'][] = [
		'path' => OC::$SERVERROOT . '/apps2',
		'url' => '/apps2',
		'writable' => false,
	];
}
