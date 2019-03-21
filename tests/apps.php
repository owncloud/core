<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

function loadDirectory($path) {
	if (\stripos(\basename($path), 'acceptance') !== false) {
		return;
	}
	if (\strcasecmp(\basename($path), 'ui') === 0) {
		return;
	}
	if ($dh = \opendir($path)) {
		while ($name = \readdir($dh)) {
			if ($name[0] !== '.') {
				$file = $path . '/' . $name;
				if (\is_dir($file)) {
					loadDirectory($file);
				} elseif (\substr($name, -4, 4) === '.php') {
					require_once $file;
				}
			}
		}
	}
}

function getSubclasses($parentClassName) {
	$classes = [];
	foreach (\get_declared_classes() as $className) {
		if (\is_subclass_of($className, $parentClassName)) {
			$classes[] = $className;
		}
	}

	return $classes;
}

$apps = OC_App::getEnabledApps();

foreach ($apps as $app) {
	// skip files_external, it has its own test suite
	if ($app === 'files_external') {
		continue;
	}

	if ($app === 'updatenotification') {
		continue;
	}

	$dir = OC_App::getAppPath($app);
	if (\is_dir($dir . '/tests')) {
		loadDirectory($dir . '/tests');
	}
}
