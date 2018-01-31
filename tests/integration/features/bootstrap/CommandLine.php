<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

require __DIR__ . '/../../../../lib/composer/autoload.php';

trait CommandLine {
	/** @var int return code of last command */
	private $lastCode;
	/** @var string stdout of last command */
	private $lastStdOut;
	/** @var string stderr of last command */
	private $lastStdErr;

	/**
	 * Invokes an OCC command
	 *
	 * @param array $args of the occ command
	 * @param bool $escaping
	 * @return int exit code
	 */
	public function runOcc($args = [], $escaping = true) {
		if ($escaping === true) {
			$args = array_map(function($arg) {
				return escapeshellarg($arg);
			}, $args);
		}
		$args[] = '--no-ansi';
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
		return $this->lastCode;
	}

	/**
	 * @Given /^invoking occ with "([^"]*)"$/
	 * @param string $cmd
	 */
	public function invokingTheCommand($cmd) {
		$args = explode(' ', $cmd);
		$this->runOcc($args);
	}

	/**
	 * Find exception texts in stderr
	 */
	public function findExceptions() {
		$exceptions = [];
		$captureNext = false;
		// the exception text usually appears after an "[Exception]" row
		foreach (explode("\n", $this->lastStdErr) as $line) {
			if (preg_match('/\[Exception\]/', $line)) {
				$captureNext = true;
				continue;
			}
			if ($captureNext) {
				$exceptions[] = trim($line);
				$captureNext = false;
			}
		}

		return $exceptions;
	}

	/**
	 * Finds all lines containing the given text
	 *
	 * @param string $input stdout or stderr output
	 * @param string $text text to search for
	 * @return array array of lines that matched
	 */
	public function findLines($input, $text) {
		$results = [];
		foreach (explode("\n", $input) as $line) {
			if (strpos($line, $text) !== false) {
				$results[] = $line;
			}
		}

		return $results;
	}

	/**
	 * @Then /^the command was successful$/
	 */
	public function theCommandWasSuccessful() {
		$exceptions = $this->findExceptions();
		if ($this->lastCode !== 0) {
			$msg = 'The command was not successful, exit code was ' . $this->lastCode . '.';
			if (!empty($exceptions)) {
				$msg .= ' Exceptions: ' . implode(', ', $exceptions);
			}
			throw new \Exception($msg);
		} else if (!empty($exceptions)) {
			$msg = 'The command was successful but triggered exceptions: ' . implode(', ', $exceptions);
			throw new \Exception($msg);
		}
	}

	/**
	 * @Then /^the command failed with exit code ([0-9]+)$/
	 * @param int $exitCode
	 * @throws Exception
	 */
	public function theCommandFailedWithExitCode($exitCode) {
		if ($this->lastCode !== (int)$exitCode) {
			throw new \Exception('The command was expected to fail with exit code ' . $exitCode . ' but got ' . $this->lastCode);
		}
	}

	/**
	 * @Then /^the command failed with exception text "([^"]*)"$/
	 * @param string $exceptionText
	 * @throws Exception
	 */
	public function theCommandFailedWithException($exceptionText) {
		$exceptions = $this->findExceptions();
		if (empty($exceptions)) {
			throw new \Exception('The command did not throw any exceptions');
		}

		if (!in_array($exceptionText, $exceptions)) {
			throw new \Exception('The command did not throw any exception with the text "' . $exceptionText . '"');
		}
	}

	/**
	 * @Then /^the command output contains the text "([^"]*)"$/
	 * @param string $text
	 * @throws Exception
	 */
	public function theCommandOutputContainsTheText($text) {
		$lines = $this->findLines($this->lastStdOut, $text);
		if (empty($lines)) {
			throw new \Exception('The command did not output the expected text on stdout "' . $text . '"');
		}
	}

	/**
	 * @Then /^the command error output contains the text "([^"]*)"$/
	 * @param string $text
	 * @throws Exception
	 */
	public function theCommandErrorOutputContainsTheText($text) {
		$lines = $this->findLines($this->lastStdErr, $text);
		if (empty($lines)) {
			throw new \Exception('The command did not output the expected text on stderr "' . $text . '"');
		}
	}

	private $lastTransferPath;

	/**
	 * @param string $sourceUser
	 * @param string $targetUser
	 * @return string|null
	 */
	private function findLastTransferFolderForUser($sourceUser, $targetUser) {
		$foundPaths = [];
		$results = $this->listFolder($targetUser, '', 1);
		foreach ($results as $path => $data) {
			$path = rawurldecode($path);
			$parts = explode(' ', $path);
			if (basename($parts[0]) !== 'transferred') {
				continue;
			}
			if (isset($parts[2]) && $parts[2] === $sourceUser) {
				// store timestamp as key
				$foundPaths[] = [
					'date' => strtotime(trim($parts[4], '/')),
					'path' => $path,
				];
			}
		}

		if (empty($foundPaths)) {
			return null;
		}

		usort($foundPaths, function($a, $b) {
			return $a['date'] - $b['date'];
		});

		$davPath = rtrim($this->getDavFilesPath($targetUser), '/');

		$foundPath = end($foundPaths)['path'];
		// strip dav path
		return substr($foundPath, strlen($davPath) + 1);
	}

	/**
	 * @When /^transferring ownership from "([^"]+)" to "([^"]+)"/
	 * @param string $user1
	 * @param string $user2
	 */
	public function transferringOwnership($user1, $user2) {
		if ($this->runOcc(['files:transfer-ownership', $user1, $user2]) === 0) {
			$this->lastTransferPath = $this->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @When /^recreating masterkey by deleting old one and encrypting the filesystem/
	 */
	public function recreateMasterKey() {
		if ($this->runOcc(['encryption:recreate-master-key', '-y']) === 0) {
			return $this->lastCode;
		}
	}

	/**
	 * @When /^transferring ownership of path "([^"]+)" from "([^"]+)" to "([^"]+)"/
	 * @param string $path
	 * @param string $user1
	 * @param string $user2
	 */
	public function transferringOwnershipPath($path, $user1, $user2) {
		$path = '--path=' . $path;
		if ($this->runOcc(['files:transfer-ownership', $path, $user1, $user2]) === 0) {
			$this->lastTransferPath = $this->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @When /^using received transfer folder of "([^"]+)" as dav path$/
	 * @param string $user
	 */
	public function usingTransferFolderAsDavPath($user) {
		$davPath = $this->getDavFilesPath($user);
		$davPath = rtrim($davPath, '/') . $this->lastTransferPath;
		$this->usingDavPath($davPath);
	}
}
