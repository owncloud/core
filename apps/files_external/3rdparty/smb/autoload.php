<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);

require_once 'errors.php';

spl_autoload_register(function ($class) {
	if (substr($class, 0, 4) == 'SMB\\') {
		$class = strtolower($class);
		$file = str_replace('\\', '/', substr($class, 4));
		include __DIR__ . '/' . $file . '.php';
	}
});
