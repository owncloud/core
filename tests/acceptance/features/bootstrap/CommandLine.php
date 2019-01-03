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
use TestHelpers\WebDavHelper;

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

	private $lastTransferPath;

	/**
	 * @return string
	 */
	public function getLastTransferPath() {
		return $this->lastTransferPath;
	}

	/**
	 * @param string $lastTransferPath
	 *
	 * @return void
	 */
	public function setLastTransferPath($lastTransferPath) {
		$this->lastTransferPath = $lastTransferPath;
	}

	/**
	 * get the exit status of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return int exit status code of the last occ command
	 */
	public function getExitStatusCodeOfOccCommand() {
		return $this->lastCode;
	}

	/**
	 * get the normal output of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return string normal output of the last occ command
	 */
	public function getStdOutOfOccCommand() {
		return $this->lastStdOut;
	}

	/**
	 * get the error output of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return string error output of the last occ command
	 */
	public function getStdErrOfOccCommand() {
		return $this->lastStdErr;
	}

	/**
	 * Set a system config setting
	 *
	 * @param string $key
	 * @param string $value
	 * @param string|null $type e.g. boolean or json
	 * @param string|null $output e.g. json
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 * @throws Exception if parameters have not been provided yet or the testing app is not enabled
	 */
	public function setSystemConfig(
		$key,
		$value,
		$type = null,
		$output = null,
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		$args = [];
		$args[] = 'config:system:set';
		$args[] = $key;
		$args[] = '--value';
		$args[] = $value;

		if ($type !== null) {
			$args[] = '--type';
			$args[] = $type;
		}

		if ($output !== null) {
			$args[] = '--output';
			$args[] = $output;
		}

		$args[] = '--no-ansi';

		return SetupHelper::runOcc(
			$args,
			$adminUsername,
			$adminPassword,
			$baseUrl,
			$ocPath
		);
	}

	/**
	 * Get a system config setting, including status code, output and standard
	 * error output.
	 *
	 * @param string $key
	 * @param string|null $output e.g. json
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 * @throws Exception if parameters have not been provided yet or the testing app is not enabled
	 */
	public function getSystemConfig(
		$key,
		$output = null,
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		$args = [];
		$args[] = 'config:system:get';
		$args[] = $key;

		if ($output !== null) {
			$args[] = '--output';
			$args[] = $output;
		}

		$args[] = '--no-ansi';

		return SetupHelper::runOcc(
			$args,
			$adminUsername,
			$adminPassword,
			$baseUrl,
			$ocPath
		);
	}

	/**
	 * Get the value of a system config setting
	 *
	 * @param string $key
	 * @param string|null $output e.g. json
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return string
	 * @throws Exception if parameters have not been provided yet or the testing app is not enabled
	 */
	public function getSystemConfigValue(
		$key,
		$output = null,
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		return $this->getSystemConfig(
			$key,
			$output,
			$adminUsername,
			$adminPassword,
			$baseUrl,
			$ocPath
		)['stdOut'];
	}

	/**
	 * Delete a system config setting
	 *
	 * @param string $key
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return string[] associated array with "code", "stdOut", "stdErr"
	 * @throws Exception if parameters have not been provided yet or the testing app is not enabled
	 */
	public function deleteSystemConfig(
		$key,
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		$args = [];
		$args[] = 'config:system:delete';
		$args[] = $key;

		$args[] = '--no-ansi';

		return SetupHelper::runOcc(
			$args,
			$adminUsername,
			$adminPassword,
			$baseUrl,
			$ocPath
		);
	}

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
		return $this->runOccWithEnvVariables(
			$args,
			null,
			$adminUsername,
			$adminPassword,
			$baseUrl,
			$ocPath
		);
	}

	/**
	 * Invokes an OCC command with an optional array of environment variables
	 *
	 * @param array $args of the occ command
	 * @param array|null $envVariables to be defined before the command is run
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return int exit code
	 * @throws Exception if ocPath has not been set yet or the testing app is not enabled
	 */
	public function runOccWithEnvVariables(
		$args = [],
		$envVariables = null,
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		$args[] = '--no-ansi';
		$return = SetupHelper::runOcc(
			$args, $adminUsername, $adminPassword, $baseUrl, $ocPath, $envVariables
		);
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
		$this->runOcc([$cmd]);
	}

	/**
	 * @When /^the administrator invokes occ command "([^"]*)" with environment variable "([^"]*)" set to "([^"]*)"$/
	 * @Given /^the administrator has invoked occ command "([^"]*)" with environment variable "([^"]*)" set to "([^"]*)"$/
	 *
	 * @param string $cmd
	 * @param string $envVariableName
	 * @param string $envVariableValue
	 *
	 * @return void
	 * @throws Exception
	 */
	public function invokingTheCommandWithEnvVariable(
		$cmd, $envVariableName, $envVariableValue
	) {
		$args = [$cmd];
		$this->runOccWithEnvVariables(
			$args, [$envVariableName => $envVariableValue]
		);
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
			$msg = "The command was not successful, exit code was $this->lastCode.";
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
				"The command did not throw any exception with the text '$exceptionText'"
			);
		}
	}

	/**
	 * @Then /^the command output should contain the text ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $text
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandOutputContainsTheText($text) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$text = \trim($text, $text[0]);
		$lines = $this->findLines($this->lastStdOut, $text);
		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
			1,
			\count($lines),
			"The command output did not contain the expected text on stdout '$text'\n" .
			"The command output on stdout was:\n" .
			$this->lastStdOut
		);
	}

	/**
	 * @Then /^the command error output should contain the text ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $text
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandErrorOutputContainsTheText($text) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$text = \trim($text, $text[0]);
		$lines = $this->findLines($this->lastStdErr, $text);
		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
			1,
			\count($lines),
			"The command output did not contain the expected text on stderr '$text'\n" .
			"The command output on stderr was:\n" .
			$this->lastStdErr
		);
	}

	/**
	 * @Then the occ command JSON output should be empty
	 *
	 * @return void
	 */
	public function theOccCommandJsonOutputShouldNotReturnAnyData() {
		PHPUnit_Framework_Assert::assertEquals(\trim($this->lastStdOut), "[]");
		PHPUnit_Framework_Assert::assertEmpty($this->lastStdErr);
	}

	/**
	 * @param string $sourceUser
	 * @param string $targetUser
	 *
	 * @return string|null
	 */
	public function findLastTransferFolderForUser($sourceUser, $targetUser) {
		$foundPaths = [];
		$responseXmlObject = $this->listFolder($targetUser, '', 1);
		$transferredElements = $responseXmlObject->xpath(
			"//d:response/d:href[contains(., '/transferred%20from%20$sourceUser%20on%')]"
		);
		foreach ($transferredElements as $transferredElement) {
			$path = \rawurldecode($transferredElement);
			$parts = \explode(' ', $path);
			// store timestamp as key
			$foundPaths[] = [
				'date' => \strtotime(\trim($parts[4], '/')),
				'path' => $path,
			];
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
	 * Reset user password
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 */
	public function resetUserPassword($username, $password = null) {
		$actualUsername = $this->getActualUsername($username);
		if ($password === null) {
			$this->invokingTheCommand(
				"user:resetpassword $actualUsername --send-email"
			);
		} else {
			$password = $this->getActualPassword($password);
			$this->invokingTheCommandWithEnvVariable(
				"user:resetpassword $actualUsername --password-from-env",
				'OC_PASS',
				$password
			);
			if ($username === "%admin%") {
				$this->rememberNewAdminPassword($password);
			}
		}
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
