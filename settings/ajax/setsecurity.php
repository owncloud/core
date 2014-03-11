<?php
/**
 * Copyright (c) 2013, Lukas Reschke <lukas@statuscode.ch>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

OC_Util::checkAdminUser();
OCP\JSON::callCheck();

function validate_admin_groups($value) {
	$value = trim($value);
	if (0 === preg_match('/^([_a-z][-0-9_a-z]*(,[_a-z][-0-9_a-z]*)*)?$/', $value)) {
		return false;
	} else {
		return $value;
	}
}

OC_Config::setValue( 'forcessl', filter_var($_POST['enforceHTTPS'], FILTER_VALIDATE_BOOLEAN));
$adminGroups = filter_var($_POST['adminGroups'], FILTER_CALLBACK, array('options' => 'validate_admin_groups'));
if ($adminGroups) {
	OC_Config::setValue( 'admin_groups', $adminGroups);
} else {
	OC_Config::deleteKey( 'admin_groups');
}

echo 'true';
