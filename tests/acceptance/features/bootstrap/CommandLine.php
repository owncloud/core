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

use TestHelpers\SetupHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Command line functions
 */
trait CommandLine {
	/**
	 * @var int return code of last command
	 */
	private $lastCode;
	/**
	 * @var string stdout of last command
	 */
	private $lastStdOut;
	/**
	 * @var string stderr of last command
	 */
	private $lastStdErr;

	/**
	 * Invokes an OCC command
	 *
	 * @param array $args of the occ command
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return int exit code
	 * @throws Exception if ocPath has not been set yet or the testing app is not enabled
	 */
	public function runOcc(
		$args = [],
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		$args[] = '--no-ansi';
		$return = SetupHelper::runOcc($args, $adminUsername, $adminPassword, $baseUrl, $ocPath);
		$this->lastStdOut = $return['stdOut'];
		$this->lastStdErr = $return['stdErr'];
		$this->lastCode = (int) $return['code'];
		return $this->lastCode;
	}

	/**
	 * @When /^the administrator invokes occ command "([^"]*)"$/
	 * @Given /^the administrator has invoked occ command "([^"]*)"$/
	 *
	 * @param string $cmd
	 *
	 * @return void
	 */
	public function invokingTheCommand($cmd) {
		$args = \explode(' ', $cmd);
		$this->runOcc($args);
	}

	/**
	 * Find exception texts in stderr
	 *
	 * @return array of exception texts
	 */
	public function findExceptions() {
		$exceptions = [];
		$captureNext = false;
		// the exception text usually appears after an "[Exception]" row
		foreach (\explode("\n", $this->lastStdErr) as $line) {
			if (\preg_match('/\[Exception\]/', $line)) {
				$captureNext = true;
				continue;
			}
			if ($captureNext) {
				$exceptions[] = \trim($line);
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
	 *
	 * @return array array of lines that matched
	 */
	public function findLines($input, $text) {
		$results = [];
		foreach (\explode("\n", $input) as $line) {
			if (\strpos($line, $text) !== false) {
				$results[] = $line;
			}
		}

		return $results;
	}

	/**
	 * @Then /^the command should have been successful$/
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandShouldHaveBeenSuccessful() {
		$exceptions = $this->findExceptions();
		if ($this->lastCode !== 0) {
			$msg = 'The command was not successful, exit code was '
				. $this->lastCode . '.';
			if (!empty($exceptions)) {
				$msg .= ' Exceptions: ' . \implode(', ', $exceptions);
			}
			throw new \Exception($msg);
		} elseif (!empty($exceptions)) {
			$msg = 'The command was successful but triggered exceptions: '
				. \implode(', ', $exceptions);
			throw new \Exception($msg);
		}
	}

	/**
	 * @Then /^the command should have failed with exit code ([0-9]+)$/
	 *
	 * @param int $exitCode
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandFailedWithExitCode($exitCode) {
		if ($this->lastCode !== (int)$exitCode) {
			throw new \Exception(
				"The command was expected to fail with exit code $exitCode but got "
				. $this->lastCode
			);
		}
	}

	/**
	 * @Then /^the command should have failed with exception text "([^"]*)"$/
	 *
	 * @param string $exceptionText
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandFailedWithExceptionText($exceptionText) {
		$exceptions = $this->findExceptions();
		if (empty($exceptions)) {
			throw new \Exception('The command did not throw any exceptions');
		}

		if (!\in_array($exceptionText, $exceptions)) {
			throw new \Exception(
				'The command did not throw any exception with the text "'
				. $exceptionText . '"'
			);
		}
	}

	/**
	 * @Then /^the command output should contain the text "([^"]*)"$/
	 *
	 * @param string $text
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandOutputContainsTheText($text) {
		$lines = $this->findLines($this->lastStdOut, $text);
		if (empty($lines)) {
			throw new \Exception(
				'The command did not output the expected text on stdout "'
				. $text . '"'
			);
		}
	}

	/**
	 * @Then /^the command error output should contain the text "([^"]*)"$/
	 *
	 * @param string $text
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandErrorOutputContainsTheText($text) {
		$lines = $this->findLines($this->lastStdErr, $text);
		if (empty($lines)) {
			throw new \Exception(
				'The command did not output the expected text on stderr "'
				. $text . '"'
			);
		}
	}

	private $lastTransferPath;

	/**
	 * @param string $sourceUser
	 * @param string $targetUser
	 *
	 * @return string|null
	 */
	private function findLastTransferFolderForUser($sourceUser, $targetUser) {
		$foundPaths = [];
		$results = $this->listFolder($targetUser, '', 1);
		foreach ($results as $path => $data) {
			$path = \rawurldecode($path);
			$parts = \explode(' ', $path);
			if (\basename($parts[0]) !== 'transferred') {
				continue;
			}
			if (isset($parts[2]) && $parts[2] === $sourceUser) {
				// store timestamp as key
				$foundPaths[] = [
					'date' => \strtotime(\trim($parts[4], '/')),
					'path' => $path,
				];
			}
		}

		if (empty($foundPaths)) {
			return null;
		}

		\usort(
			$foundPaths, function ($a, $b) {
				return $a['date'] - $b['date'];
			}
		);

		$davPath = \rtrim($this->getFullDavFilesPath($targetUser), '/');

		$foundPath = \end($foundPaths)['path'];
		// strip dav path
		return \substr($foundPath, \strlen($davPath) + 1);
	}

	/**
	 * @When /^the administrator transfers ownership from "([^"]+)" to "([^"]+)" using the occ command$/
	 * @Given /^the administrator has transferred ownership from "([^"]+)" to "([^"]+)"$/
	 *
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 */
	public function transferringOwnership($user1, $user2) {
		if ($this->runOcc(['files:transfer-ownership', $user1, $user2]) === 0) {
			$this->lastTransferPath
				= $this->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @When /^the administrator successfully recreates the encryption masterkey using the occ command$/
	 * @Given /^the administrator has successfully recreated the encryption masterkey$/
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function recreateMasterKeyUsingOccCommand() {
		$this->runOcc(['encryption:recreate-master-key', '-y']);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When /^the administrator transfers ownership of path "([^"]+)" from "([^"]+)" to "([^"]+)" using the occ command$/
	 * @Given /^the administrator has transferred ownership of path "([^"]+)" from "([^"]+)" to "([^"]+)"$/
	 *
	 * @param string $path
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 */
	public function transferringOwnershipPath($path, $user1, $user2) {
		$path = "--path=$path";
		if ($this->runOcc(['files:transfer-ownership', $path, $user1, $user2]) === 0) {
			$this->lastTransferPath
				= $this->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @Given /^using received transfer folder of "([^"]+)" as dav path$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function usingTransferFolderAsDavPath($user) {
		$davPath = $this->getDavFilesPath($user);
		$davPath = \rtrim($davPath, '/') . $this->lastTransferPath;
		$this->usingDavPath($davPath);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will setup anything needed by methods in this trait.
	 *
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function beforeCommandLineScenario() {
		SetupHelper::init(
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getBaseUrl(),
			$this->getOcPath()
		);
	}
}
