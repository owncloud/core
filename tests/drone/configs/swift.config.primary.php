<?php
$CONFIG = array (
	'objectstore' => array(
		'class' => 'OC\\Files\\ObjectStore\\Swift',
		'arguments' => array(
			'username' => 'test',
			'password' => 'testing',
			'container' => 'owncloud-autotest',
			'objectPrefix' => 'autotest:oid:urn:',
			'autocreate' => true,
			'region' => 'testregion',
			'url' => 'http://swift_primary:5034/v2.0',
			'tenantName' => 'testtenant',
			'serviceName' => 'testceph',
		),
	),
);