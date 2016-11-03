<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

require __DIR__ . '/../../vendor/autoload.php';

trait CommandLine {
	/** @var int return code of last command */
	private $lastCode;
	/** @var string stdout of last command */
	private $lastStdOut;
	/** @var string stderr of last command */
	private $lastStdErr;

	/** @var string */
	protected $ocPath = '../..';

	/**
	 * Invokes an OCC command
	 *
	 * @param string OCC command, the part behind "occ". For example: "files:transfer-ownership"
	 */
	public function runOcc($args = []) {
		$args = array_map(function($arg) {
			return escapeshellarg($arg);
		}, $args);
		$args = implode(' ', $args);

		$descriptor = [
			0 => ['pipe', 'r'],
			1 => ['pipe', 'w'],
			2 => ['pipe', 'w'],
		];
		$process = proc_open('php console.php ' . $args, $descriptor, $pipes, $this->ocPath);
		$this->lastStdOut = stream_get_contents($pipes[1]);
		$this->lastStdErr = stream_get_contents($pipes[2]);
		$this->lastCode = proc_close($process);
	}

	/**
	 * @Given /^invoking occ with "([^"]*)"$/
	 */
	public function invokingTheCommand($cmd) {
		$args = explode(' ', $cmd);
		$this->runOcc($args);
	}

	/**
	 * @Given /^the command was successful$/
	 */
	public function theCommandWasSuccessful() {
		if ($this->lastCode !== 0) {
			throw new \Exception('The command was not successful, exit code was ' . $this->lastCode);
		}
	}
}
