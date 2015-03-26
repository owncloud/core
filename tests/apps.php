<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

// to exclude an individual unit test, use the suffix .noauto.php
// to exclude an entire directory, use the suffix .noauto

function loadDirectory($path) {
	if ($dh = opendir($path)) {
		while ($name = readdir($dh)) {
			if ($name[0] !== '.') {
				$file = $path . '/' . $name;
				if (is_dir($file) && substr($name, -7) !== '.noauto') {
					loadDirectory($file);
				} elseif (substr($name, -4) === '.php' && substr($name, -11) !== '.noauto.php') {
					require_once $file;
				}
			}
		}
	}
}

function getSubclasses($parentClassName) {
	$classes = array();
	foreach (get_declared_classes() as $className) {
		if (is_subclass_of($className, $parentClassName))
			$classes[] = $className;
	}

	return $classes;
}

$apps = OC_App::getEnabledApps();

foreach ($apps as $app) {
	$dir = OC_App::getAppPath($app);
	if (is_dir($dir . '/tests')) {
		loadDirectory($dir . '/tests');
	}
}
