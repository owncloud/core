<?php
/**
 * Copyright (c) 2013, Tom Needham <tom@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/** @var $this \OCP\Route\IRouter */
$this->create('core_ajax_versions_preview', '/preview')->action(
function() {
	require_once __DIR__ . '/../ajax/preview.php';
});

// Register with the capabilities API
OCP\API::register(
	'get',
	'/cloud/capabilities',
	array('OCA\Files_Versions\Capabilities', 'getCapabilities'),
	'files_versions',
	OC_API::USER_AUTH
);

OCP\API::register(
	'get',
	'/apps/files_versions/api/v1/versions',
	array('\OCA\Files_Versions\Api', 'getVersions'),
	'files_versions',
	OC_API::USER_AUTH
);

OCP\API::register(
	'post',
	'/apps/files_versions/api/v1/versions',
	array('\OCA\Files_Versions\Api', 'processVersion'),
	'files_versions',
	OC_API::USER_AUTH
);

