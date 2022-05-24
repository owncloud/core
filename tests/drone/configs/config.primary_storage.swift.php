<?php
$CONFIG = [
	'objectstore' => [
		'class' => 'OC\\Files\\ObjectStore\\Swift',
		'arguments' => [
			'username' => 'test',
			'password' => 'testing',
			'container' => 'owncloud-autotest',
			'objectPrefix' => 'autotest:oid:urn:',
			'autocreate' => true,
			'region' => 'testregion',
			'url' => 'http://ceph:5034/v2.0',
			'tenantName' => 'testtenant',
			'serviceName' => 'testceph',
		],
	],
];
