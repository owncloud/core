<?php
/**
 * ownCloud
 *
 * @author Phil Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2019, ownCloud GmbH
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use TestHelpers\SetupHelper;

require_once 'bootstrap.php';

/**
 * Occ context for test steps that test occ commands
 */
class OccContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @var string lastDeletedJobId
	 */
	private $lastDeletedJobId;

	/**
	 * @When /^the administrator invokes occ command "([^"]*)"$/
	 * @Given /^the administrator has invoked occ command "([^"]*)"$/
	 *
	 * @param string $cmd
	 *
	 * @return void
	 */
	public function invokingTheCommand($cmd) {
		$this->featureContext->runOcc([$cmd]);
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
		$this->featureContext->runOccWithEnvVariables(
			$args, [$envVariableName => $envVariableValue]
		);
	}

	/**
	 * @Then /^the command should have been successful$/
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandShouldHaveBeenSuccessful() {
		$exceptions = $this->featureContext->findExceptions();
		$exitStatusCode = $this->featureContext->getExitStatusCodeOfOccCommand();
		if ($exitStatusCode !== 0) {
			$msg = "The command was not successful, exit code was " .
				   $exitStatusCode . ".\n" .
				   "stdOut was: '" .
				   $this->featureContext->getStdOutOfOccCommand() . "'\n" .
				   "stdErr was: '" .
				   $this->featureContext->getStdErrOfOccCommand() . "'\n";
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
		$exitStatusCode = $this->featureContext->getExitStatusCodeOfOccCommand();
		if ($exitStatusCode !== (int)$exitCode) {
			throw new \Exception(
				"The command was expected to fail with exit code $exitCode but got "
				. $exitStatusCode
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
		$exceptions = $this->featureContext->findExceptions();
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
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$lines = $this->featureContext->findLines(
			$commandOutput,
			$text
		);
		PHPUnit\Framework\Assert::assertGreaterThanOrEqual(
			1,
			\count($lines),
			"The command output did not contain the expected text on stdout '$text'\n" .
			"The command output on stdout was:\n" .
			$commandOutput
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
		$commandOutput = $this->featureContext->getStdErrOfOccCommand();
		$lines = $this->featureContext->findLines(
			$commandOutput,
			$text
		);
		PHPUnit\Framework\Assert::assertGreaterThanOrEqual(
			1,
			\count($lines),
			"The command output did not contain the expected text on stderr '$text'\n" .
			"The command output on stderr was:\n" .
			$commandOutput
		);
	}

	/**
	 * @Then the occ command JSON output should be empty
	 *
	 * @return void
	 */
	public function theOccCommandJsonOutputShouldNotReturnAnyData() {
		PHPUnit\Framework\Assert::assertEquals(
			\trim($this->featureContext->getStdOutOfOccCommand()),
			"[]"
		);
		PHPUnit\Framework\Assert::assertEmpty(
			$this->featureContext->getStdErrOfOccCommand()
		);
	}

	/**
	 * @Given the administrator has set the mail smtpmode to :smtpmode
	 *
	 * @param string $smtpmode
	 *
	 * @return void
	 */
	public function theAdministratorHasSetTheMailSmtpmodeTo($smtpmode) {
		$this->invokingTheCommand(
			"config:system:set  --value $smtpmode mail_smtpmode"
		);
	}

	/**
	 * @When the administrator sets the log level to :level using the occ command
	 *
	 * @param string $level
	 *
	 * @return void
	 */
	public function theAdministratorSetsLogLevelUsingTheOccCommand($level) {
		$this->invokingTheCommand(
			"log:manage --level $level"
		);
	}

	/**
	 * @When the administrator sets the timezone to :timezone using the occ command
	 *
	 * @param string $timezone
	 *
	 * @return void
	 */
	public function theAdministratorSetsTimeZoneUsingTheOccCommand($timezone) {
		$this->invokingTheCommand(
			"log:manage --timezone $timezone"
		);
	}

	/**
	 * @When the administrator sets the backend to :backend using the occ command
	 *
	 * @param string $backend
	 *
	 * @return void
	 */
	public function theAdministratorSetsBackendUsingTheOccCommand($backend) {
		$this->invokingTheCommand(
			"log:manage --backend $backend"
		);
	}

	/**
	 * @When the administrator enables the ownCloud backend using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorEnablesOwnCloudBackendUsingTheOccCommand() {
		$this->invokingTheCommand(
			"log:owncloud --enable"
		);
	}

	/**
	 * @When the administrator sets the log file path to :path using the occ command
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function theAdministratorSetsLogFilePathUsingTheOccCommand($path) {
		$this->invokingTheCommand(
			"log:owncloud --file $path"
		);
	}

	/**
	 * @When the administrator sets the log rotate file size to :size using the occ command
	 *
	 * @param string $size
	 *
	 * @return void
	 */
	public function theAdministratorSetsLogRotateFileSizeUsingTheOccCommand($size) {
		$this->invokingTheCommand(
			"log:owncloud --rotate-size $size"
		);
	}

	/**
	 * @When the administrator changes the background jobs mode to :mode using the occ command
	 * @Given the administrator has changed the background jobs mode to :mode
	 *
	 * @param string $mode
	 *
	 * @return void
	 */
	public function theAdministratorHasChangedTheBackgroundJobsModeTo($mode) {
		$this->invokingTheCommand("background:$mode");
	}

	/**
	 * @Given the administrator has set the external storage :mountPoint to be never scanned automatically
	 * @When the administrator sets the external storage :mountPoint to be never scanned automatically using the occ command
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 */
	public function theAdministratorHasSetTheExtStorageWithMountPoint($mountPoint) {
		$command = "files:external:option";

		// get the first mount id created in before scenario
		$mountId = $this->featureContext->getStorageId($mountPoint);

		// $mountId should have been set. If not, @local_storage BeforeScenario never ran
		\assert($mountId !== null);

		$key = "filesystem_check_changes";

		// "0" is "Never", "1" is "Once every direct access"
		$value = 0;

		$this->invokingTheCommand(
			"$command $mountId $key $value"
		);
	}

	/**
	 * @When the administrator scans the filesystem for all users using the occ command
	 * @Given the administrator has scanned the filesystem for all users
	 *
	 * @return void
	 */
	public function theAdministratorScansTheFilesystemForAllUsersUsingTheOccCommand() {
		$this->invokingTheCommand(
			"files:scan --all"
		);
	}

	/**
	 * @When the administrator scans the filesystem for user :user using the occ command
	 * @Given the administrator has scanned the filesystem for user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorScansTheFilesystemForUserUsingTheOccCommand($user) {
		$this->invokingTheCommand(
			"files:scan $user"
		);
	}

	/**
	 * @When the administrator scans the filesystem in path :path using the occ command
	 * @Given the administrator scans the filesystem in path :path
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function theAdministratorScansTheFilesystemInPathUsingTheOccCommand($path) {
		$this->invokingTheCommand(
			"files:scan --path='$path'"
		);
	}

	/**
	 * @When the administrator scans the filesystem for group :group using the occ command
	 * @Given the administrator has scanned the filesystem for group :group
	 *
	 * Used to test the --group option of the files:scan command
	 *
	 * @param string $group a single group name
	 *
	 * @return void
	 */
	public function theAdministratorScansTheFilesystemForGroupUsingTheOccCommand($group) {
		$this->invokingTheCommand(
			"files:scan --group=$group"
		);
	}

	/**
	 * @When the administrator scans the filesystem for groups list :groups using the occ command
	 * @Given the administrator has scanned the filesystem for groups list :groups
	 *
	 * Used to test the --groups option of the files:scan command
	 *
	 * @param string $groups a comma-separated list of group names
	 *
	 * @return void
	 */
	public function theAdministratorScansTheFilesystemForGroupsUsingTheOccCommand($groups) {
		$this->invokingTheCommand(
			"files:scan --groups=$groups"
		);
	}

	/**
	 * @When the administrator cleanups the filesystem for all users using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorCleanupsTheFilesystemForAllUsersUsingTheOccCommand() {
		$this->invokingTheCommand(
			"files:cleanup"
		);
	}

	/**
	 * @When the administrator creates the local storage mount :mount using the occ command
	 * @Given the administrator has created the local storage mount :mount
	 *
	 * @param string $mount
	 *
	 * @return void
	 */
	public function theAdministratorCreatesTheLocalStorageMountForAUserUsingTheOccCommand($mount) {
		$storageId = SetupHelper::createLocalStorageMount($mount);
		$this->featureContext->addStorageId($mount, $storageId);
	}

	/**
	 * @When /^the administrator (adds|removes) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for the last local storage mount using the occ command$/
	 * @Given /^the administrator has (added|removed) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for the last local storage mount$/
	 *
	 * @param string $action
	 * @param string $userOrGroup
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdminAddsRemovesAsTheApplicableUserLastLocalMountUsingTheOccCommand(
		$action, $userOrGroup, $user
	) {
		if ($action === "adds" || $action === "added") {
			$action = "--add";
		} else {
			$action = "--remove";
		}
		if ($userOrGroup === "user") {
			$action = "$action-user";
		} else {
			$action = "$action-group";
		}
		$storageIds = $this->featureContext->getStorageIds();
		$lastMount = \end($storageIds);
		$this->featureContext->runOcc(
			[
				'files_external:applicable',
				$lastMount,
				"$action ",
				"$user"
			]
		);
	}

	/**
	 * @When the administrator list the repair steps using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorListTheRepairStepsUsingTheOccCommand() {
		$this->invokingTheCommand('maintenance:repair --list');
	}

	/**
	 * @Then the background jobs mode should be :mode
	 *
	 * @param string $mode
	 *
	 * @return void
	 */
	public function theBackgroundJobsModeShouldBe($mode) {
		$this->invokingTheCommand(
			"config:app:get core backgroundjobs_mode"
		);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		PHPUnit\Framework\Assert::assertEquals($mode, \trim($lastOutput));
	}

	/**
	 * @Then the update channel should be :value
	 *
	 * @param string $value
	 *
	 * @return void
	 */
	public function theUpdateChannelShouldBe($value) {
		$this->invokingTheCommand(
			"config:app:get core OC_Channel"
		);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		PHPUnit\Framework\Assert::assertEquals($value, \trim($lastOutput));
	}

	/**
	 * @Then the log level should be :logLevel
	 *
	 * @param string $logLevel
	 *
	 * @return void
	 */
	public function theLogLevelShouldBe($logLevel) {
		$this->invokingTheCommand(
			"config:system:get loglevel"
		);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		PHPUnit\Framework\Assert::assertEquals($logLevel, \trim($lastOutput));
	}

	/**
	 * @Given the administrator has added config key :key with value :value in app :app
	 * @When the administrator adds/updates config key :key with value :value in app :app using the occ command
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $app
	 *
	 * @return void
	 */
	public function theAdministratorAddsConfigKeyWithValueInAppUsingTheOccCommand($key, $value, $app) {
		$this->invokingTheCommand(
			"config:app:set --value ${value} ${app} ${key}"
		);
	}

	/**
	 * @When the administrator deletes config key :key of app :app using the occ command
	 *
	 * @param string $key
	 * @param string $app
	 *
	 * @return void
	 */
	public function theAdministratorDeletesConfigKeyOfAppUsingTheOccCommand($key, $app) {
		$this->invokingTheCommand(
			"config:app:delete ${app} ${key}"
		);
	}

	/**
	 * @Given the administrator has added system config key :key with value :value
	 * @When the administrator adds/updates system config key :key with value :value using the occ command
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return void
	 */
	public function theAdministratorAddsSystemConfigKeyWithValueUsingTheOccCommand($key, $value) {
		$this->invokingTheCommand(
			"config:system:set --value ${value} ${key}"
		);
	}

	/**
	 * @When the administrator deletes system config key :key using the occ command
	 *
	 * @param string $key
	 *
	 * @return void
	 */
	public function theAdministratorDeletesSystemConfigKeyUsingTheOccCommand($key) {
		$this->invokingTheCommand(
			"config:system:delete ${key}"
		);
	}

	/**
	 * @When the administrator empties the trashbin of user :user using the occ command
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorEmptiesTheTrashbinOfUserUsingTheOccCommand($user) {
		$this->invokingTheCommand(
			"trashbin:cleanup $user"
		);
	}

	/**
	 * @When the administrator empties the trashbin of all users using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorEmptiesTheTrashbinOfAllUsersUsingTheOccCommand() {
		$this->theAdministratorEmptiesTheTrashbinOfUserUsingTheOccCommand('');
	}

	/**
	 * @When the administrator gets all the jobs in the background queue using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheJobsInTheBackgroundQueueUsingTheOccCommand() {
		$this->invokingTheCommand(
			"background:queue:status"
		);
	}

	/**
	 * @When the administrator deletes last background job :job using the occ command
	 *
	 * @param string $job
	 *
	 * @return void
	 */
	public function theAdministratorDeletesLastBackgroundJobUsingTheOccCommand($job) {
		$match = $this->getLastJobIdForJob($job);
		if ($match === false) {
			throw new \Exception("Couldn't find jobId for given job: $job");
		}
		$this->invokingTheCommand(
			"background:queue:delete $match"
		);
		$this->lastDeletedJobId = $match;
	}

	/**
	 * @Then the last deleted background job :job should not be listed in the background jobs queue
	 *
	 * @param string $job
	 *
	 * @return void
	 */
	public function theLastDeletedJobShouldNotBeListedInTheJobsQueue($job) {
		$jobId = $this->lastDeletedJobId;
		$match = $this->getLastJobIdForJob($job);
		PHPUnit\Framework\Assert::assertNotEquals(
			$jobId, $match,
			"job $job with jobId $jobId" .
			" was not expected to be listed in background queue, but was"
		);
	}

	/**
	 * @Then system config key :key should have value :value
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return void
	 */
	public function systemConfigKeyShouldHaveValue($key, $value) {
		$config = \trim($this->featureContext->getSystemConfigValue($key));
		PHPUnit\Framework\Assert::assertSame($value, $config);
	}

	/**
	 * @Then the command output table should contain the following text:
	 *
	 * @param TableNode $table table of patterns to find with table title as 'table_column'
	 *
	 * @return void
	 */
	public function theCommandOutputTableShouldContainTheFollowingText(TableNode $table) {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		foreach ($table as $row) {
			$lines = $this->featureContext->findLines(
				$commandOutput,
				$row['table_column']
			);
			PHPUnit\Framework\Assert::assertNotEmpty(
				$lines,
				"Value: " . $row['table_column'] . " not found"
			);
		}
	}

	/**
	 * @Then system config key :key should not exist
	 *
	 * @param string $key
	 *
	 * @return void
	 */
	public function systemConfigKeyShouldNotExist($key) {
		PHPUnit\Framework\Assert::assertEmpty($this->featureContext->getSystemConfig($key)['stdOut']);
	}

	/**
	 * @When the administrator lists the config keys
	 *
	 * @return void
	 */
	public function theAdministratorListsTheConfigKeys() {
		$this->invokingTheCommand(
			"config:list"
		);
	}

	/**
	 * @Then the command output should contain the apps configs
	 *
	 * @return void
	 */
	public function theCommandOutputShouldContainTheAppsConfigs() {
		$config_list = \json_decode($this->featureContext->getStdOutOfOccCommand(), true);
		PHPUnit\Framework\Assert::assertArrayHasKey(
			'apps',
			$config_list,
			"The occ output does not contain apps configs"
		);
		PHPUnit\Framework\Assert::assertNotEmpty(
			$config_list['apps'],
			"The occ output does not contain apps configs"
		);
	}

	/**
	 * @Then the command output should contain the system configs
	 *
	 * @return void
	 */
	public function theCommandOutputShouldContainTheSystemConfigs() {
		$config_list = \json_decode($this->featureContext->getStdOutOfOccCommand(), true);
		PHPUnit\Framework\Assert::assertArrayHasKey(
			'system',
			$config_list,
			"The occ output does not contain system configs"
		);
		PHPUnit\Framework\Assert::assertNotEmpty(
			$config_list['system'],
			"The occ output does not contain system configs"
		);
	}

	/**
	 * @Given the administrator has cleared the versions for user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorHasClearedTheVersionsForUser($user) {
		$this->invokingTheCommand(
			"versions:cleanup $user"
		);
		PHPUnit\Framework\Assert::assertSame(
			"Delete versions of   $user",
			\trim($this->featureContext->getStdOutOfOccCommand())
		);
	}

	/**
	 * @Given the administrator has cleared the versions for all users
	 *
	 * @return void
	 */
	public function theAdministratorHasClearedTheVersionsForAllUsers() {
		$this->invokingTheCommand(
			"versions:cleanup"
		);
		PHPUnit\Framework\Assert::assertContains(
			"Delete all versions",
			\trim($this->featureContext->getStdOutOfOccCommand())
		);
	}

	/**
	 * get jobId of the latest job found of given job class
	 *
	 * @param string $job
	 *
	 * @return string|boolean
	 */
	public function getLastJobIdForJob($job) {
		$this->theAdministratorGetsAllTheJobsInTheBackgroundQueueUsingTheOccCommand();
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$lines = $this->featureContext->findLines(
			$commandOutput,
			$job
		);
		// find the jobId of the newest job among the jobs with given class
		$success = \preg_match("/\d+/", \end($lines), $match);
		if ($success) {
			return $match[0];
		}
		return false;
	}

	/**
	 * @Then the system config key :key from the last command output should match value :value of type :type
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $type
	 *
	 * @return void
	 */
	public function theSystemConfigKeyFromLastCommandOutputShouldContainValue(
		$key, $value, $type
	) {
		$configList = \json_decode(
			$this->featureContext->getStdOutOfOccCommand(), true
		);
		$systemConfig = $configList['system'];

		// convert the value to it's respective type based on type given in the type column
		if ($type === 'boolean') {
			$value = $value === 'true' ? true : false;
		} elseif ($type === 'integer') {
			$value = (int) $value;
		} elseif ($type === 'json') {
			// if the expected value of the key is a json
			// match the value with the regular expression
			$actualKeyValuePair = \json_encode(
				$systemConfig[$key], JSON_UNESCAPED_SLASHES
			);

			PHPUnit\Framework\Assert::assertThat(
				$actualKeyValuePair,
				PHPUnit\Framework\Assert::matchesRegularExpression($value)
			);
			return;
		}

		if (!\array_key_exists($key, $systemConfig)) {
			PHPUnit\Framework\Assert::fail(
				"system config doesn't contain key: " . $key
			);
		}

		PHPUnit\Framework\Assert::assertEquals(
			$value,
			$systemConfig[$key],
			"config: $key doesn't contain value: $value"
		);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
