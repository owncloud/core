<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

\set_time_limit(0);

\define('MINIMUM_PHP_VERSION', '7.0.8');

// Check PHP version
if (\version_compare(PHP_VERSION, MINIMUM_PHP_VERSION) === -1) {
	echo 'This application requires at least PHP ' . MINIMUM_PHP_VERSION . PHP_EOL;
	echo 'You are currently running ' . PHP_VERSION . '. Please update your PHP version.' . PHP_EOL;
	exit(50);
}

// symlinks are not resolved by PHP properly
// getcwd always reports source and not target
if (\getcwd()) {
	\define('CURRENT_DIR', \trim(\getcwd()));
} elseif (isset($_SERVER['PWD'])) {
	\define('CURRENT_DIR', $_SERVER['PWD']);
} elseif (isset($_SERVER['SCRIPT_FILENAME'])) {
	\define('CURRENT_DIR', \dirname($_SERVER['SCRIPT_FILENAME']));
} else {
	echo 'Failed to detect current directory';
	exit(1);
}

\session_start();

require \dirname(__DIR__) . '/vendor/autoload.php';
$container = require(__DIR__ . '/config/container.php');
