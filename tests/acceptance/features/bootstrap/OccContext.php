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
use TestHelpers\HttpRequestHelper;
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
			$msg = "The command was not successful, exit code was $this->lastCode.\n";
			$msg .= "stdOut was: '$this->lastStdOut'\n";
			$msg .= "stdErr was: '$this->lastStdErr'\n";
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
		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
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
		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
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
		PHPUnit_Framework_Assert::assertEquals(
			\trim($this->featureContext->getStdOutOfOccCommand()),
			"[]"
		);
		PHPUnit_Framework_Assert::assertEmpty(
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
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorScansTheFilesystemForGroupUsingTheOccCommand($group) {
		$this->invokingTheCommand(
			"files:scan --groups=$group"
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
	public function theadminAddsRemovesAsTheApplicableUserLastLocalMountUsingTheOccCommand($action, $userOrGroup, $user) {
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
		PHPUnit_Framework_Assert::assertEquals($mode, \trim($lastOutput));
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
		PHPUnit_Framework_Assert::assertEquals($value, \trim($lastOutput));
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
		PHPUnit_Framework_Assert::assertEquals($logLevel, \trim($lastOutput));
	}

	/**
	 * @When the administrator adds config key :key with value :value in app :app using the occ command
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
	 * @When the administrator adds system config key :key with value :value using the occ command
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
	 * @Then system config key :key should have value :value
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return void
	 */
	public function systemConfigKeyShouldHaveValue($key, $value) {
		$config = \trim($this->featureContext->getSystemConfigValue($key));
		PHPUnit_Framework_Assert::assertSame($value, $config);
	}

	/**
	 * @Then system config key :key should not exist
	 *
	 * @param string $key
	 *
	 * @return void
	 */
	public function systemConfigKeyShouldNotExist($key) {
		PHPUnit_Framework_Assert::assertEmpty($this->featureContext->getSystemConfig($key)['stdOut']);
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
		PHPUnit_Framework_Assert::assertArrayHasKey(
			'apps',
			$config_list,
			"The occ output does not contain apps configs"
		);
		PHPUnit_Framework_Assert::assertNotEmpty(
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
		PHPUnit_Framework_Assert::assertArrayHasKey(
			'system',
			$config_list,
			"The occ output does not contain system configs"
		);
		PHPUnit_Framework_Assert::assertNotEmpty(
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
		PHPUnit_Framework_Assert::assertSame(
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
		PHPUnit_Framework_Assert::assertContains(
			"Delete all versions",
			\trim($this->featureContext->getStdOutOfOccCommand())
		);
	}

	/**
	 * @Given encryption has been enabled
	 *
	 * @return void
	 */
	public function encryptionHasBeenEnabled() {
		$this->featureContext->runOcc(['encryption:enable']);
	}

	/**
	 * @When the administrator sets the encryption type to :encryptionType using the occ command
	 * @Given the administrator has set the encryption type to :encryptionType
	 *
	 * @param string $encryptionType
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorSetsEncryptionTypeToUsingTheOccCommand($encryptionType) {
		$this->featureContext->runOcc(
			["encryption:select-encryption-type", $encryptionType, "-y"]
		);
	}

	/**
	 * @When the administrator encrypts all data using the occ command
	 * @Given the administrator has encrypted all the data
	 *
	 * @return void
	 */
	public function theAdministratorEncryptsAllDataUsingTheOccCommand() {
		$this->featureContext->runOcc(["encryption:encrypt-all", "-n"]);
	}

	/**
	 * @When the administrator decrypts user keys based encryption with recovery key :recoveryKey using the occ command
	 *
	 * @param string $recoveryKey
	 *
	 * @return void
	 */
	public function theAdministratorDecryptsUserKeysBasedEncryptionWithKey($recoveryKey) {
		$this->invokingTheCommandWithEnvVariable(
			"encryption:decrypt-all -m recovery -c yes",
			'OC_RECOVERY_PASSWORD',
			$recoveryKey
		);
	}

	/**
	 * @When /^the administrator successfully recreates the encryption masterkey using the occ command$/
	 * @Given /^the administrator has successfully recreated the encryption masterkey$/
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function recreateMasterKeyUsingOccCommand() {
		$this->featureContext->runOcc(['encryption:recreate-master-key', '-y']);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @Then file :fileName of user :username should not be encrypted
	 *
	 * @param string $fileName
	 * @param string $username
	 *
	 * @return void
	 */
	public function fileOfUserShouldNotBeEncrypted($fileName, $username) {
		$fileName = \ltrim($fileName, "/");
		$filePath = "data/$username/files/$fileName";
		$this->featureContext->readFileInServerRoot($filePath);
		$response = $this->featureContext->getResponse();
		$parsedResponse = HttpRequestHelper::getResponseXml($response);
		$encodedFileContent = (string)$parsedResponse->data->element->contentUrlEncoded;
		$fileContent = \urldecode($encodedFileContent);
		$this->featureContext->userDownloadsFileUsingTheAPI($username, "/$fileName");
		$fileContentServer = (string)$this->featureContext->getResponse()->getBody();
		PHPUnit_Framework_Assert::assertEquals(
			\trim($fileContentServer),
			$fileContent
		);
	}

	/**
	 * @Then file :fileName of user :username should be encrypted
	 *
	 * @param string $fileName
	 * @param string $username
	 *
	 * @return void
	 */
	public function fileOfUserShouldBeEncrypted($fileName, $username) {
		$fileName = \ltrim($fileName, "/");
		$filePath = "data/$username/files/$fileName";
		$this->featureContext->readFileInServerRoot($filePath);
		$response = $this->featureContext->getResponse();
		$parsedResponse = HttpRequestHelper::getResponseXml($response);
		$encodedFileContent = (string)$parsedResponse->data->element->contentUrlEncoded;
		$fileContent = \urldecode($encodedFileContent);
		PHPUnit_Framework_Assert::assertStringStartsWith(
			"HBEGIN:oc_encryption_module:OC_DEFAULT_MODULE:cipher:AES-256-CTR:signed:true",
			$fileContent
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
