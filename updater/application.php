#!/usr/bin/env php
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

\define('IS_CLI', true);

$oldWorkingDir = \getcwd();
if ($oldWorkingDir === false) {
	echo "This script can be run from the ownCloud root directory only." . PHP_EOL;
	echo "Can't determine current working dir - the script will continue to work but be aware of the above fact." . PHP_EOL;
} elseif ($oldWorkingDir !== __DIR__ && !\chdir(__DIR__)) {
	echo "This script can be run from the ownCloud root directory only." . PHP_EOL;
	echo "Can't change to ownCloud root directory." . PHP_EOL;
	exit(1);
}

require __DIR__ . '/app/bootstrap.php';
/** @var \Owncloud\Updater\Console\Application $application */
$application = $container['application'];
$application->run();
