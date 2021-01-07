<?php
/**
 * @author Phil Davis <phil@jankaritech.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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
$descriptor = [
	0 => ['pipe', 'r'],
	1 => ['pipe', 'w'],
	2 => ['pipe', 'w'],
];

$process = \proc_open(
	'php console.php upgrade',
	$descriptor,
	$pipes
);
$lastStdOut = \stream_get_contents($pipes[1]);
$lastStdErr = \stream_get_contents($pipes[2]);
$lastCode = \proc_close($process);
echo "StdOut: $lastStdOut\n";
echo "StdErr: $lastStdErr\n";
echo "  Code: $lastCode\n";
