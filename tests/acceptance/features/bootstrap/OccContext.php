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
use PHPUnit\Framework\Assert;
use TestHelpers\SetupHelper;
use Behat\Gherkin\Node\PyStringNode;

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
	 *
	 * @var ImportedCertificates
	 */
	private $importedCertificates = [];

	/**
	 *
	 * @var RemovedCertificates
	 */
	private $removedCertificates = [];

	/**
	 * @var string lastDeletedJobId
	 */
	private $lastDeletedJobId;

	/**
	 * ToDo: remove all the tech_preview test code after official release of
	 *       10.4 and we no longer need to test against 10.3.* as "latest"
	 *
	 * @var boolean
	 */
	private $doTechPreview = false;

	/**
	 * @var boolean techPreviewEnabled
	 */
	private $techPreviewEnabled = false;

	/**
	 * @var string initialTechPreviewStatus
	 */
	private $initialTechPreviewStatus;

	/**
	 * @return boolean
	 */
	public function isTechPreviewEnabled() {
		return $this->techPreviewEnabled;
	}

	/**
	 * @return boolean
	 * @throws Exception
	 */
	public function enableDAVTechPreview() {
		if ($this->doTechPreview) {
			if (!$this->isTechPreviewEnabled()) {
				$this->addSystemConfigKeyUsingTheOccCommand(
					"dav.enable.tech_preview", "true", "boolean"
				);
				$this->techPreviewEnabled = true;
				return true;
			}
		}
		return false;
	}

	/**
	 * @return boolean true if delete-system-config-key was done
	 * @throws Exception
	 */
	public function disableDAVTechPreview() {
		if ($this->doTechPreview) {
			$this->deleteSystemConfigKeyUsingTheOccCommand(
				"dav.enable.tech_preview"
			);
			$this->techPreviewEnabled = false;
			return true;
		}
		return false;
	}

	/**
	 * @param string $cmd
	 *
	 * @return void
	 * @throws Exception
	 */
	public function invokingTheCommand($cmd) {
		$this->featureContext->runOcc([$cmd]);
	}

	/**
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function importSecurityCertificateFromPath($path) {
		$this->invokingTheCommand("security:certificates:import " . $path);
		$pathComponents = \explode("/", $path);
		$certificate = \end($pathComponents);
		\array_push($this->importedCertificates, $certificate);
	}

	/**
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
	 * @param string $mode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function changeBackgroundJobsModeUsingTheOccCommand($mode) {
		$this->invokingTheCommand("background:$mode");
	}

	/**
	 * @param string $mountPoint
	 * @param boolean $setting
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExtStorageReadOnlyUsingTheOccCommand($mountPoint, $setting = true) {
		$command = "files_external:option";

		$mountId = $this->featureContext->getStorageId($mountPoint);

		$key = "read_only";

		if ($setting) {
			$value = "1";
		} else {
			$value = "0";
		}

		$this->invokingTheCommand(
			"$command $mountId $key $value"
		);
	}

	/**
	 * @param string $mountPoint
	 * @param boolean $setting
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExtStorageSharingUsingTheOccCommand($mountPoint, $setting = true) {
		$command = "files_external:option";

		$mountId = $this->featureContext->getStorageId($mountPoint);

		$key = "enable_sharing";

		if ($setting) {
			$value = "true";
		} else {
			$value = "false";
		}

		$this->invokingTheCommand(
			"$command $mountId $key $value"
		);
	}

	/**
	 * @param string $mountPoint
	 * @param string $setting "never" (switch it off) otherwise "Once every direct access"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExtStorageCheckChangesUsingTheOccCommand($mountPoint, $setting) {
		$command = "files_external:option";

		$mountId = $this->featureContext->getStorageId($mountPoint);

		$key = "filesystem_check_changes";

		if ($setting === "never") {
			$value = "0";
		} else {
			$value = "1";
		}

		$this->invokingTheCommand(
			"$command $mountId $key $value"
		);
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public function scanFileSystemForAllUsersUsingTheOccCommand() {
		$this->invokingTheCommand(
			"files:scan --all"
		);
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function scanFileSystemForAUserUsingTheOccCommand($user) {
		$user = $this->featureContext->getActualUsername($user);
		$this->invokingTheCommand(
			"files:scan $user"
		);
	}

	/**
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function scanFileSystemPathUsingTheOccCommand($path, $user = null) {
		$path = $this->featureContext->substituteInLineCodes(
			$path, $user
		);
		$this->invokingTheCommand(
			"files:scan --path='$path'"
		);
	}

	/**
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function scanFileSystemForAGroupUsingTheOccCommand($group) {
		$this->invokingTheCommand(
			"files:scan --group=$group"
		);
	}

	/**
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function scanFileSystemForGroupsUsingTheOccCommand($groups) {
		$this->invokingTheCommand(
			"files:scan --groups=$groups"
		);
	}

	/**
	 * @param string $mount
	 *
	 * @return void
	 */
	public function createLocalStorageMountUsingTheOccCommand($mount) {
		$result = SetupHelper::createLocalStorageMount($mount);
		$storageId = $result['storageId'];
		$this->featureContext->setResultOfOccCommand($result);
		$this->featureContext->addStorageId($mount, $storageId);
	}

	/**
	 * @param string $key
	 * @param string $value
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addConfigKeyWithValueInAppUsingTheOccCommand($key, $value, $app) {
		$this->invokingTheCommand(
			"config:app:set --value ${value} ${app} ${key}"
		);
	}

	/**
	 * @param string $key
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteConfigKeyOfAppUsingTheOccCommand($key, $app) {
		$this->invokingTheCommand(
			"config:app:delete ${app} ${key}"
		);
	}

	/**
	 * @param string $key
	 * @param string $value
	 * @param string $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addSystemConfigKeyUsingTheOccCommand(
		$key, $value, $type = "string"
	) {
		$this->invokingTheCommand(
			"config:system:set --value ${value} --type ${type} ${key}"
		);
	}

	/**
	 * @param string $key
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteSystemConfigKeyUsingTheOccCommand($key) {
		$this->invokingTheCommand(
			"config:system:delete ${key}"
		);
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function emptyTrashBinOfUserUsingOccCommand($user) {
		$user = $this->featureContext->getActualUsername($user);
		$this->invokingTheCommand(
			"trashbin:cleanup $user"
		);
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public function getAllJobsInBackgroundQueueUsingOccCommand() {
		$this->invokingTheCommand(
			"background:queue:status"
		);
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteAllVersionsForUserUsingOccCommand($user) {
		$this->invokingTheCommand(
			"versions:cleanup $user"
		);
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public function deleteAllVersionsForAllUsersUsingTheOccCommand() {
		$this->invokingTheCommand(
			"versions:cleanup"
		);
	}

	/**
	 * @param string $job
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteLastBackgroundJobUsingTheOccCommand($job) {
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
	 * List created local storage mount
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listLocalStorageMount() {
		$this->invokingTheCommand('files_external:list --output=json');
	}

	/**
	 * @When the administrator lists all local storage mount points using the occ command
	 *
	 * List created local storage mount with --short
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listLocalStorageMountShort() {
		$this->invokingTheCommand('files_external:list --short --output=json');
	}

	/**
	 * List created local storage mount with --mount-options
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listLocalStorageMountOptions() {
		$this->invokingTheCommand('files_external:list --mount-options --output=json');
	}

	/**
	 * List available backends
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listAvailableBackends() {
		$this->invokingTheCommand('files_external:backends --output=json');
	}

	/**
	 * List available backends of type
	 *
	 * @param String $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listAvailableBackendsOfType($type) {
		$this->invokingTheCommand('files_external:backends ' . $type . ' --output=json');
	}

	/**
	 * List backend of type
	 *
	 * @param String $type
	 * @param String $backend
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listBackendOfType($type, $backend) {
		$this->invokingTheCommand('files_external:backends ' . $type . ' ' . $backend . ' --output=json');
	}

	/**
	 * List created local storage mount with --show-password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listLocalStorageShowPassword() {
		$this->invokingTheCommand('files_external:list --show-password --output=json');
	}

	/**
	 * @When the administrator enables DAV tech_preview
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEnablesDAVTechPreview() {
		$this->enableDAVTechPreview();
	}

	/**
	 * @Given the administrator has enabled DAV tech_preview
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasEnabledDAVTechPreview() {
		if ($this->enableDAVTechPreview()) {
			$this->theCommandShouldHaveBeenSuccessful();
		}
	}

	/**
	 * @When /^the administrator invokes occ command "([^"]*)"$/
	 *
	 * @param string $cmd
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorInvokesOccCommand($cmd) {
		$this->invokingTheCommand($cmd);
	}

	/**
	 * @When /^the administrator invokes occ command "([^"]*)" for user "([^"]*)"$/
	 *
	 * @param string $cmd
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorInvokesOccCommandForUser($cmd, $user) {
		$user = $this->featureContext->getActualUsername($user);
		$cmd = $this->featureContext->substituteInLineCodes(
			$cmd, $user
		);
		$this->invokingTheCommand($cmd);
	}

	/**
	 * @Given /^the administrator has invoked occ command "([^"]*)"$/
	 *
	 * @param string $cmd
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasInvokedOccCommand($cmd) {
		$this->invokingTheCommand($cmd);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator imports security certificate from the path :path
	 *
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorImportsSecurityCertificateFromThePath($path) {
		$this->importSecurityCertificateFromPath($path);
	}

	/**
	 * @Given the administrator has imported security certificate from the path :path
	 *
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasImportedSecurityCertificateFromThePath($path) {
		$this->importSecurityCertificateFromPath($path);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator removes the security certificate :certificate
	 *
	 * @param string $certificate
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorRemovesTheSecurityCertificate($certificate) {
		$this->invokingTheCommand("security:certificates:remove " . $certificate);
		\array_push($this->removedCertificates, $certificate);
	}

	/**
	 * @When /^the administrator invokes occ command "([^"]*)" with environment variable "([^"]*)" set to "([^"]*)"$/
	 *
	 * @param string $cmd
	 * @param string $envVariableName
	 * @param string $envVariableValue
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorInvokesOccCommandWithEnvironmentVariable(
		$cmd, $envVariableName, $envVariableValue
	) {
		$this->invokingTheCommandWithEnvVariable(
			$cmd,
			$envVariableName,
			$envVariableValue
		);
	}

	/**
	 * @Given /^the administrator has invoked occ command "([^"]*)" with environment variable "([^"]*)" set to "([^"]*)"$/
	 *
	 * @param string $cmd
	 * @param string $envVariableName
	 * @param string $envVariableValue
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasInvokedOccCommandWithEnvironmentVariable(
		$cmd, $envVariableName, $envVariableValue
	) {
		$this->invokingTheCommandWithEnvVariable(
			$cmd,
			$envVariableName,
			$envVariableValue
		);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator runs upgrade routines on local server using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorRunsUpgradeRoutinesOnLocalServerUsingTheOccCommand() {
		\system("./occ upgrade", $status);
		if ($status !== 0) {
			// if the above command fails make sure to turn off maintenance mode
			\system("./occ maintenance:mode --off");
		}
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
		Assert::assertEquals(
			(int) $exitCode,
			$exitStatusCode,
			"The command was expected to fail with exit code $exitCode but got {$exitStatusCode}"
		);
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
		Assert::assertNotEmpty(
			$exceptions,
			'The command did not throw any exceptions'
		);

		Assert::assertContains(
			$exceptionText,
			$exceptions,
			"The command did not throw any exception with the text '$exceptionText'"
		);
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
		$lines = SetupHelper::findLines(
			$commandOutput,
			$text
		);
		Assert::assertGreaterThanOrEqual(
			1,
			\count($lines),
			"The command output did not contain the expected text on stdout '$text'\n" .
			"The command output on stdout was:\n" .
			$commandOutput
		);
	}

	/**
	 * @Then /^the command output should contain the text ((?:'[^']*')|(?:"[^"]*")) about user "([^"]*)"$/
	 *
	 * @param string $text
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandOutputContainsTheTextAboutUser($text, $user) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$text = \trim($text, $text[0]);
		$text = $this->featureContext->substituteInLineCodes(
			$text, $user
		);
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$lines = SetupHelper::findLines(
			$commandOutput,
			$text
		);
		Assert::assertGreaterThanOrEqual(
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
		$lines = SetupHelper::findLines(
			$commandOutput,
			$text
		);
		Assert::assertGreaterThanOrEqual(
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
		Assert::assertEquals(
			\trim($this->featureContext->getStdOutOfOccCommand()),
			"[]",
			"Expected command output to be '[]' but got '"
			. \trim($this->featureContext->getStdOutOfOccCommand())
			. "'"
		);
		Assert::assertEmpty(
			$this->featureContext->getStdErrOfOccCommand(),
			"Expected occ command error to be empty but got '"
			. $this->featureContext->getStdErrOfOccCommand()
			. "'"
		);
	}

	/**
	 * @Given the administrator has set the default folder for received shares to :folder
	 *
	 * @param string $folder
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetTheDefaultFolderForReceivedSharesTo($folder) {
		$this->addSystemConfigKeyUsingTheOccCommand(
			"share_folder", $folder
		);
	}

	/**
	 * @Given the administrator has set the mail smtpmode to :smtpmode
	 *
	 * @param string $smtpmode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetTheMailSmtpmodeTo($smtpmode) {
		$this->addSystemConfigKeyUsingTheOccCommand(
			"mail_smtpmode", $smtpmode
		);
	}

	/**
	 * @When the administrator sets the log level to :level using the occ command
	 *
	 * @param string $level
	 *
	 * @return void
	 * @throws Exception
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
	 * @throws Exception
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
	 * @throws Exception
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
	 * @throws Exception
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
	 * @throws Exception
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
	 * @throws Exception
	 */
	public function theAdministratorSetsLogRotateFileSizeUsingTheOccCommand($size) {
		$this->invokingTheCommand(
			"log:owncloud --rotate-size $size"
		);
	}

	/**
	 * @Then the command output should be:
	 *
	 * @param PyStringNode $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCommandOutputShouldBe(PyStringNode $content) {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		// removing blank lines
		$commandOutput = \implode("\n", \array_filter(\explode("\n", $commandOutput)));
		$content = \implode("\n", \array_filter(\explode("\n", $content->getRaw())));
		Assert::assertEquals(
			$content,
			$commandOutput,
			"The command output was expected to be '$content' but got '$commandOutput'"
		);
	}

	/**
	 * @When the administrator changes the background jobs mode to :mode using the occ command
	 *
	 * @param string $mode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorChangesTheBackgroundJobsModeTo($mode) {
		$this->changeBackgroundJobsModeUsingTheOccCommand($mode);
	}

	/**
	 * @Given the administrator has changed the background jobs mode to :mode
	 *
	 * @param string $mode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasChangedTheBackgroundJobsModeTo($mode) {
		$this->changeBackgroundJobsModeUsingTheOccCommand($mode);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator sets the external storage :mountPoint to read-only using the occ command
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminSetsTheExtStorageToReadOnly($mountPoint) {
		$this->setExtStorageReadOnlyUsingTheOccCommand($mountPoint);
	}

	/**
	 * @Given the administrator has set the external storage :mountPoint to read-only
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminHasSetTheExtStorageToReadOnly($mountPoint) {
		$this->setExtStorageReadOnlyUsingTheOccCommand($mountPoint);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @Given the administrator has set the external storage :mountPoint to sharing
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminHasSetTheExtStorageToSharing($mountPoint) {
		$this->setExtStorageSharingUsingTheOccCommand($mountPoint);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator sets the external storage :mountPoint to be never scanned automatically using the occ command
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminSetsTheExtStorageToBeNeverScannedAutomatically($mountPoint) {
		$this->setExtStorageCheckChangesUsingTheOccCommand($mountPoint, "never");
	}

	/**
	 * @Given the administrator has set the external storage :mountPoint to be never scanned automatically
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminHasSetTheExtStorageToBeNeverScannedAutomatically($mountPoint) {
		$this->setExtStorageCheckChangesUsingTheOccCommand($mountPoint, "never");
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator scans the filesystem for all users using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorScansTheFilesystemForAllUsersUsingTheOccCommand() {
		$this->scanFileSystemForAllUsersUsingTheOccCommand();
	}

	/**
	 * @Given the administrator has scanned the filesystem for all users
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasScannedTheFilesystemForAllUsersUsingTheOccCommand() {
		$this->scanFileSystemForAllUsersUsingTheOccCommand();
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator scans the filesystem for user :user using the occ command
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorScansTheFilesystemForUserUsingTheOccCommand($user) {
		$this->scanFileSystemForAUserUsingTheOccCommand($user);
	}

	/**
	 * @Given the administrator has scanned the filesystem for user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasScannedTheFilesystemForUserUsingTheOccCommand($user) {
		$this->scanFileSystemForAUserUsingTheOccCommand($user);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator scans the filesystem in path :path of user :user using the occ command
	 *
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorScansTheFilesystemInPathUsingTheOccCommand($path, $user) {
		$user = $this->featureContext->getActualUsername($user);
		$this->scanFileSystemPathUsingTheOccCommand($path, $user);
	}

	/**
	 * @Given the administrator scans the filesystem in path :path
	 *
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasScannedTheFilesystemInPathUsingTheOccCommand($path) {
		$this->scanFileSystemPathUsingTheOccCommand($path);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator scans the filesystem for group :group using the occ command
	 *
	 * Used to test the --group option of the files:scan command
	 *
	 * @param string $group a single group name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorScansTheFilesystemForGroupUsingTheOccCommand($group) {
		$this->scanFileSystemForAGroupUsingTheOccCommand($group);
	}

	/**
	 * @Given the administrator has scanned the filesystem for group :group
	 *
	 * Used to test the --group option of the files:scan command
	 *
	 * @param string $group a single group name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasScannedTheFilesystemForGroupUsingTheOccCommand($group) {
		$this->scanFileSystemForAGroupUsingTheOccCommand($group);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator scans the filesystem for groups list :groups using the occ command
	 *
	 * Used to test the --groups option of the files:scan command
	 *
	 * @param string $groups a comma-separated list of group names
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorScansTheFilesystemForGroupsUsingTheOccCommand($groups) {
		$this->scanFileSystemForGroupsUsingTheOccCommand($groups);
	}

	/**
	 * @Given the administrator has scanned the filesystem for groups list :groups
	 *
	 * Used to test the --groups option of the files:scan command
	 *
	 * @param string $groups a comma-separated list of group names
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasScannedTheFilesystemForGroupsUsingTheOccCommand($groups) {
		$this->scanFileSystemForGroupsUsingTheOccCommand($groups);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator cleanups the filesystem for all users using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCleanupsTheFilesystemForAllUsersUsingTheOccCommand() {
		$this->invokingTheCommand(
			"files:cleanup"
		);
	}

	/**
	 * @When the administrator creates the local storage mount :mount using the occ command
	 *
	 * @param string $mount
	 *
	 * @return void
	 */
	public function theAdministratorCreatesTheLocalStorageMountUsingTheOccCommand($mount) {
		$this->createLocalStorageMountUsingTheOccCommand($mount);
	}

	/**
	 * @Given the administrator has created the local storage mount :mount
	 *
	 * @param string $mount
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasCreatedTheLocalStorageMountUsingTheOccCommand($mount) {
		$this->createLocalStorageMountUsingTheOccCommand($mount);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @param $action
	 * @param $userOrGroup
	 * @param $userOrGroupName
	 * @param $mountName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addRemoveUserOrGroupToOrFromMount(
		$action, $userOrGroup, $userOrGroupName, $mountName
	) {
		if ($action === "adds" || $action === "added") {
			$action = "--add";
		} else {
			$action = "--remove";
		}
		if ($userOrGroup === "user") {
			$action = "$action-user";
			$userOrGroupName = $this->featureContext->getActualUsername($userOrGroupName);
		} else {
			$action = "$action-group";
		}
		$mountId = $this->featureContext->getStorageId($mountName);
		$this->featureContext->runOcc(
			[
				'files_external:applicable',
				$mountId,
				"$action ",
				"$userOrGroupName"
			]
		);
	}

	/**
	 * @param $action
	 * @param $userOrGroup
	 * @param $userOrGroupName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addRemoveUserOrGroupToOrFromLastLocalMount(
		$action, $userOrGroup, $userOrGroupName
	) {
		$storageIds = $this->featureContext->getStorageIds();
		Assert::assertGreaterThan(
			0,
			\count($storageIds),
			"addRemoveAsApplicableUserLastLocalMount no local mounts exist"
		);
		$lastMountName = \end($storageIds);
		$this->addRemoveUserOrGroupToOrFromMount(
			$action, $userOrGroup, $userOrGroupName, $lastMountName
		);
	}

	/**
	 * @When /^the administrator (adds|removes) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for the last local storage mount using the occ command$/
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
		$this->addRemoveUserOrGroupToOrFromLastLocalMount(
			$action,
			$userOrGroup,
			$user
		);
	}

	/**
	 * @Given /^the administrator has (added|removed) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for the last local storage mount$/
	 *
	 * @param string $action
	 * @param string $userOrGroup
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdminHasAddedRemovedAsTheApplicableUserLastLocalMountUsingTheOccCommand(
		$action, $userOrGroup, $user
	) {
		$this->addRemoveUserOrGroupToOrFromLastLocalMount(
			$action,
			$userOrGroup,
			$user
		);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When /^the administrator (adds|removes) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for local storage mount "([^"]*)" using the occ command$/
	 *
	 * @param string $action
	 * @param string $userOrGroup
	 * @param string $user
	 * @param string $mount
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdminAddsRemovesAsTheApplicableUserForMountUsingTheOccCommand(
		$action, $userOrGroup, $user, $mount
	) {
		$user = $this->featureContext->getActualUsername($user);
		$this->addRemoveUserOrGroupToOrFromMount(
			$action,
			$userOrGroup,
			$user,
			$mount
		);
	}

	/**
	 * @When the administrator removes all from the applicable users and groups for local storage mount :localStorage using the occ command
	 *
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdminRemovesAllForTheMountUsingOccCommand($localStorage) {
		$mountId = $this->featureContext->getStorageId($localStorage);
		$this->featureContext->runOcc(
			[
				'files_external:applicable',
				$mountId,
				"--remove-all"
			]
		);
	}

	/**
	 * @Given /^the administrator has (added|removed) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for local storage mount "([^"]*)"$/
	 *
	 * @param string $action
	 * @param string $userOrGroup
	 * @param string $user
	 * @param string $mount
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdminHasAddedRemovedTheApplicableUserForMountUsingTheOccCommand(
		$action, $userOrGroup, $user, $mount
	) {
		$user = $this->featureContext->getActualUsername($user);
		$this->addRemoveUserOrGroupToOrFromMount(
			$action,
			$userOrGroup,
			$user,
			$mount
		);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator configures the key :key with value :value for the local storage mount :localStorage
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminConfiguresLocalStorageMountUsingTheOccCommand($key, $value, $localStorage) {
		$mountId = $this->featureContext->getStorageId($localStorage);
		$this->featureContext->runOcc(
			[
				"files_external:config",
				$mountId,
				$key,
				$value
			]
		);
	}

	/**
	 * @When the administrator lists the available backends using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsAvailableBackendsUsingTheOccCommand() {
		$this->listAvailableBackends();
	}

	/**
	 * @When the administrator lists the available backends of type :type using the occ command
	 *
	 * @param String $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsAvailableBackendsOfTypeUsingTheOccCommand($type) {
		$this->listAvailableBackendsOfType($type);
	}

	/**
	 * @When the administrator lists the :backend backend of type :backendType using the occ command
	 *
	 * @param String $backend
	 * @param String $backendType
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsBackendOfTypeUsingTheOccCommand($backend, $backendType) {
		$this->listBackendOfType($backendType, $backend);
	}

	/**
	 * @When the administrator lists configurations with the existing key :key for the local storage mount :localStorage
	 *
	 * @param string $key
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsConfigurationsWithExistingKeyForLocalStorageMountUsingTheOccCommand($key, $localStorage) {
		$mountId = $this->featureContext->getStorageId($localStorage);
		$this->featureContext->runOcc(
			[
				"files_external:config",
				$mountId,
				$key,
			]
		);
	}

	/**
	 * @Given the administrator has configured the key :key with value :value for the local storage mount :localStorage
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminConfiguredLocalStorageMountUsingTheOccCommand($key, $value, $localStorage) {
		$mountId = $this->featureContext->getStorageId($localStorage);
		$this->featureContext->runOcc(
			[
				"files_external:config",
				$mountId,
				$key,
				$value
			]
		);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator lists the local storage using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsLocalStorageMountUsingTheOccCommand() {
		$this->listLocalStorageMount();
	}

	/**
	 * @When the administrator lists the local storage with --short using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsLocalStorageMountShortUsingTheOccCommand() {
		$this->listLocalStorageMountShort();
	}

	/**
	 * @When the administrator lists the local storage with --mount-options using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsLocalStorageMountOptionsUsingTheOccCommand() {
		$this->listLocalStorageMountOptions();
	}

	/**
	 * @When the administrator lists the local storage with --show-password using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsLocalStorageShowPasswordUsingTheOccCommand() {
		$this->listLocalStorageShowPassword();
	}

	/**
	 * @Then the following local storage should exist
	 *
	 * @param TableNode $mountPoints
	 *
	 * @return void
	 */
	public function theFollowingLocalStoragesShouldExist(TableNode $mountPoints) {
		$createdLocalStorage = [];
		$expectedLocalStorages = $mountPoints->getColumnsHash();
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($commandOutput as $storageEntry) {
			$createdLocalStorage[$storageEntry->mount_id] = \ltrim($storageEntry->mount_point, '/');
		}
		foreach ($expectedLocalStorages as $expectedStorageEntry) {
			Assert::assertContains(
				$expectedStorageEntry['localStorage'],
				$createdLocalStorage,
				"'"
				. \implode(', ', $createdLocalStorage)
				. "' does not contain '${expectedStorageEntry['localStorage']}' "
				. __METHOD__
			);
		}
	}

	/**
	 * @Then the following local storage should not exist
	 *
	 * @param TableNode $mountPoints
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingLocalStoragesShouldNotExist(TableNode $mountPoints) {
		$createdLocalStorage = [];
		$this->listLocalStorageMount();
		$expectedLocalStorages = $mountPoints->getColumnsHash();
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($commandOutput as $i) {
			$createdLocalStorage[$i->mount_id] = \ltrim($i->mount_point, '/');
		}
		foreach ($expectedLocalStorages as $i) {
			Assert::assertNotContains(
				$i['localStorage'],
				$createdLocalStorage,
				"{$i['localStorage']} exists but was not expected to exist"
			);
		}
	}

	/**
	 * @Then the following backend types should be listed:
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingBackendTypesShouldBeListed($table) {
		$expectedBackendTypes = $table->getColumnsHash();
		foreach ($expectedBackendTypes as $expectedBackendTypeEntry) {
			Assert::assertArrayHasKey(
				'backend-type',
				$expectedBackendTypeEntry,
				__METHOD__
				. " The provided expected backend type entry '"
				. \implode(', ', $expectedBackendTypeEntry)
				. "' do not have key 'backend-type'"
			);
		}
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		$keys = \array_keys((array) $commandOutput);
		foreach ($expectedBackendTypes as $backendTypesEntry) {
			Assert::assertContains(
				$backendTypesEntry['backend-type'],
				$keys,
				__METHOD__
				. " ${backendTypesEntry['backend-type']} is not contained in '"
				. \implode(', ', $keys)
				. "' but was expected to be."
			);
		}
	}

	/**
	 * @Then the following authentication/storage backends should be listed:
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingBackendsShouldBeListed($table) {
		$expectedBackends = $table->getColumnsHash();
		foreach ($expectedBackends as $expectedBackendEntry) {
			Assert::assertArrayHasKey(
				'backends',
				$expectedBackendEntry,
				__METHOD__
				. " The provided expected backend entry '"
				. \implode(', ', $expectedBackendEntry)
				. "' do not have key 'backends'"
			);
		}
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		$keys = \array_keys((array) $commandOutput);
		foreach ($expectedBackends as $backendsEntry) {
			Assert::assertContains(
				$backendsEntry['backends'],
				$keys,
				__METHOD__
				. " ${backendsEntry['backends']} is not contained in '"
				. \implode(', ', $keys)
				. "' but was expected to be."
			);
		}
	}

	/**
	 * @Then the following authentication/storage backend keys should be listed:
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingBackendKeysOfTypeShouldBeListed($table) {
		$expectedBackendKeys = $table->getColumnsHash();
		foreach ($expectedBackendKeys as $expectedBackendKeyEntry) {
			Assert::assertArrayHasKey(
				'backend-keys',
				$expectedBackendKeyEntry,
				__METHOD__
				. " The provided expected backend key entry '"
				. \implode(', ', $expectedBackendKeyEntry)
				. "' do not have key 'backend-keys'"
			);
		}
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		$keys = \array_keys((array) $commandOutput);
		foreach ($expectedBackendKeys as $backendKeysEntry) {
			Assert::assertContains(
				$backendKeysEntry['backend-keys'],
				$keys,
				__METHOD__
				. " ${backendKeysEntry['backend-keys']} is not contained in '"
				. \implode(', ', $keys)
				. "' but was expected to be."
			);
		}
	}

	/**
	 * @Then the following local storage should be listed:
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingLocalStorageShouldBeListed(TableNode $table) {
		$this->featureContext->verifyTableNodeColumns(
			$table,
			['MountPoint', 'ApplicableUsers', 'ApplicableGroups'],
			['Storage', 'AuthenticationType', 'Configuration', 'Options', 'Auth', 'Type']
		);
		$expectedLocalStorages = $table->getColumnsHash();
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($expectedLocalStorages as $expectedStorageEntry) {
			$isStorageEntryListed = false;
			foreach ($commandOutput as $listedStorageEntry) {
				if ($expectedStorageEntry["MountPoint"] === $listedStorageEntry->mount_point) {
					if (isset($expectedStorageEntry['Storage'])) {
						Assert::assertEquals(
							$expectedStorageEntry['Storage'],
							$listedStorageEntry->storage,
							"Storage column does not have the expected value for storage "
							. $expectedStorageEntry['MountPoint']
						);
					}
					if (isset($expectedStorageEntry['AuthenticationType'])) {
						Assert::assertEquals(
							$expectedStorageEntry['AuthenticationType'],
							$listedStorageEntry->authentication_type,
							"AuthenticationType column does not have the expected value for storage "
							. $expectedStorageEntry['MountPoint']
						);
					}
					if (isset($expectedStorageEntry['Auth'])) {
						Assert::assertEquals(
							$expectedStorageEntry['Auth'],
							$listedStorageEntry->auth,
							"Auth column does not have the expected value for storage "
							. $expectedStorageEntry['MountPoint']
						);
					}
					if (isset($expectedStorageEntry['Configuration'])) {
						if ($expectedStorageEntry['Configuration'] === '') {
							Assert::assertEquals(
								'',
								$listedStorageEntry->configuration,
								'Configuration column should be empty but is '
								. $listedStorageEntry->configuration
							);
						} else {
							if (\is_string($listedStorageEntry->configuration)) {
								Assert::assertStringStartsWith(
									$expectedStorageEntry['Configuration'],
									$listedStorageEntry->configuration,
									"Configuration column does not start with the expected value for storage "
									. $expectedStorageEntry['Configuration']
								);
							} else {
								$item = \strtok($expectedStorageEntry['Configuration'], ':');
								Assert::assertTrue(
									\property_exists($listedStorageEntry->configuration, $item),
									"$item was not found in the Configuration column"
								);
							}
						}
					}
					if (isset($expectedStorageEntry['Options'])) {
						Assert::assertEquals(
							$expectedStorageEntry['Options'],
							$listedStorageEntry->options,
							"Options column does not have the expected value for storage "
							. $expectedStorageEntry['MountPoint']
						);
					}
					if (isset($expectedStorageEntry['ApplicableUsers'])) {
						if (\is_string($listedStorageEntry->applicable_users)) {
							if ($listedStorageEntry->applicable_users === '') {
								$listedApplicableUsers = [];
							} else {
								$listedApplicableUsers = \explode(', ', $listedStorageEntry->applicable_users);
							}
						} else {
							$listedApplicableUsers = $listedStorageEntry->applicable_users;
						}
						if ($expectedStorageEntry['ApplicableUsers'] === '') {
							Assert::assertEquals(
								[],
								$listedApplicableUsers,
								"ApplicableUsers was expected to be an empty array but was not empty"
							);
						} else {
							$expectedApplicableUsers = \explode(', ', $expectedStorageEntry['ApplicableUsers']);
							foreach ($expectedApplicableUsers as $expectedApplicableUserEntry) {
								$expectedApplicableUserEntry = $this->featureContext->getActualUsername($expectedApplicableUserEntry);
								Assert::assertContains(
									$expectedApplicableUserEntry,
									$listedApplicableUsers,
									__METHOD__
									. " '$expectedApplicableUserEntry' is not listed in '"
									. \implode(', ', $listedApplicableUsers)
									. "'"
								);
							}
						}
					}
					if (isset($expectedStorageEntry['ApplicableGroups'])) {
						if (\is_string($listedStorageEntry->applicable_groups)) {
							if ($listedStorageEntry->applicable_groups === '') {
								$listedApplicableGroups = [];
							} else {
								$listedApplicableGroups = \explode(', ', $listedStorageEntry->applicable_groups);
							}
						} else {
							$listedApplicableGroups = $listedStorageEntry->applicable_groups;
						}
						if ($expectedStorageEntry['ApplicableGroups'] === '') {
							Assert::assertEquals(
								[],
								$listedApplicableGroups,
								"ApplicableGroups was expected to be an empty array but was not empty"
							);
							Assert::assertEquals([], $listedApplicableGroups);
						} else {
							$expectedApplicableGroups = \explode(', ', $expectedStorageEntry['ApplicableGroups']);
							foreach ($expectedApplicableGroups as $expectedApplicableGroupEntry) {
								Assert::assertContains(
									$expectedApplicableGroupEntry,
									$listedApplicableGroups,
									__METHOD__
									. " '$expectedApplicableGroupEntry' is not listed in '"
									. \implode(', ', $listedApplicableGroups)
									. "'"
								);
							}
						}
					}
					if (isset($expectedStorageEntry['Type'])) {
						Assert::assertEquals(
							$expectedStorageEntry['Type'],
							$listedStorageEntry->type,
							"Type column does not have the expected value for storage "
							. $expectedStorageEntry['MountPoint']
						);
					}
					$isStorageEntryListed = true;
					break;
				}
			}
			Assert::assertTrue($isStorageEntryListed, __METHOD__ . " Expected local storage {$expectedStorageEntry['MountPoint']} not found");
		}
	}

	/**
	 * @Then the configuration output should be :expectedOutput
	 *
	 * @param string $expectedOutput
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theConfigurationOutputShouldBe($expectedOutput) {
		$actualOutput = $this->featureContext->getStdOutOfOccCommand();
		$trimmedOutput = \trim($actualOutput);
		Assert::assertEquals(
			$expectedOutput,
			$trimmedOutput,
			__METHOD__
			. " The expected configuration output was '$expectedOutput', but got '$actualOutput' instead."
		);
	}

	/**
	 * @Then the following should be included in the configuration of local storage :localStorage:
	 *
	 * @param string $localStorage
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingShouldBeIncludedInTheConfigurationOfLocalStorage($localStorage, TableNode $table) {
		$expectedConfigurations = $table->getColumnsHash();
		foreach ($expectedConfigurations as $expectedConfigurationEntry) {
			Assert::assertArrayHasKey(
				'configuration',
				$expectedConfigurationEntry,
				__METHOD__
				. " The provided expected configuration entry '"
				. \implode(', ', $expectedConfigurationEntry)
				. "' do not have key 'configuration'"
			);
		}
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		$isStorageEntryListed = false;
		foreach ($commandOutput as $listedStorageEntry) {
			if ($listedStorageEntry->mount_point === $localStorage) {
				$isStorageEntryListed = true;
				$configurations = $listedStorageEntry->configuration;
				$configurationsSplitted = \explode(', ', $configurations);
				foreach ($expectedConfigurations as $expectedConfigArray) {
					foreach ($expectedConfigArray as $expectedConfigEntry) {
						Assert::assertContains(
							$expectedConfigEntry,
							$configurationsSplitted,
							__METHOD__
							. " $expectedConfigEntry is not contained in '"
							. \implode(', ', $configurationsSplitted)
							. "' but was expected to be."
						);
					}
				}
				break;
			}
		}
		Assert::assertTrue($isStorageEntryListed, "Expected local storage '$localStorage' not found ");
	}

	/**
	 * @When the administrator adds an option with key :key and value :value for the local storage mount :localStorage
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminAddsOptionForLocalStorageMountUsingTheOccCommand($key, $value, $localStorage) {
		$mountId = $this->featureContext->getStorageId($localStorage);
		$this->featureContext->runOcc(
			[
				"files_external:option",
				$mountId,
				$key,
				$value
			]
		);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @Then the following should be included in the options of local storage :localStorage:
	 *
	 * @param string $localStorage
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingShouldBeIncludedInTheOptionsOfLocalStorage($localStorage, TableNode $table) {
		$expectedOptions = $table->getColumnsHash();
		foreach ($expectedOptions as $expectedOptionEntry) {
			Assert::assertArrayHasKey(
				'options',
				$expectedOptionEntry,
				__METHOD__
				. " The provided expected option '"
				. \implode(', ', $expectedOptionEntry)
				. "' do not have key 'option'"
			);
		}
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		$isStorageEntryListed = false;
		foreach ($commandOutput as $listedStorageEntry) {
			if ($listedStorageEntry->mount_point === $localStorage) {
				$isStorageEntryListed = true;
				$options = $listedStorageEntry->options;
				$optionsSplitted = \explode(', ', $options);
				foreach ($expectedOptions as $expectedOptionArray) {
					foreach ($expectedOptionArray as $expectedOptionEntry) {
						Assert::assertContains(
							$expectedOptionEntry,
							$optionsSplitted,
							__METHOD__
							. " $expectedOptionEntry is not contained in '"
							. \implode(', ', $optionsSplitted)
							. "' , but was expected to be."
						);
					}
				}
				break;
			}
		}
		Assert::assertTrue($isStorageEntryListed, "Expected local storage '$localStorage' not found ");
	}

	/**
	 * @Then the following should not be included in the options of local storage :localStorage:
	 *
	 * @param string $localStorage
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingShouldNotBeIncludedInTheOptionsOfLocalStorage($localStorage, TableNode $table) {
		$expectedOptions = $table->getColumnsHash();
		foreach ($expectedOptions as $expectedOptionEntry) {
			Assert::assertArrayHasKey(
				'options',
				$expectedOptionEntry,
				__METHOD__
				. " The provided expected option '"
				. \implode(', ', $expectedOptionEntry)
				. "' do not have key 'options'"
			);
		}
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		$isStorageEntryListed = false;
		foreach ($commandOutput as $listedStorageEntry) {
			if ($listedStorageEntry->mount_point === $localStorage) {
				$isStorageEntryListed = true;
				$options = $listedStorageEntry->options;
				$optionsSplitted = \explode(', ', $options);
				foreach ($expectedOptions as $expectedOptionArray) {
					foreach ($expectedOptionArray as $expectedOptionEntry) {
						Assert::assertNotContains(
							$expectedOptionEntry,
							$optionsSplitted,
							__METHOD__
							. " $expectedOptionEntry is contained in '"
							. \implode(', ', $optionsSplitted)
							. "' , but was not expected to be."
						);
					}
				}
				break;
			}
		}
		Assert::assertTrue($isStorageEntryListed, "Expected local storage '$localStorage' not found ");
	}

	/**
	 * @When the administrator deletes local storage :folder using the occ command
	 *
	 * @param string $folder
	 *
	 * @return integer|boolean
	 * @throws Exception
	 */
	public function administratorDeletesFolder($folder) {
		return $this->deleteLocalStorageFolderUsingTheOccCommand($folder);
	}

	/**
	 * @Given the administrator has deleted local storage :folder using the occ command
	 *
	 * @param string $folder
	 *
	 * @return integer|boolean
	 * @throws Exception
	 */
	public function administratorHasDeletedLocalStorageFolderUsingTheOccCommand($folder) {
		$mount_id = $this->deleteLocalStorageFolderUsingTheOccCommand($folder);
		$this->theCommandShouldHaveBeenSuccessful();
		return $mount_id;
	}

	/**
	 * @param string $folder
	 * @param bool $mustExist
	 *
	 * @return integer|boolean
	 * @throws Exception
	 */
	public function deleteLocalStorageFolderUsingTheOccCommand($folder, $mustExist = true) {
		$createdLocalStorage = [];
		$this->listLocalStorageMount();
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($commandOutput as $i) {
			$createdLocalStorage[$i->mount_id] = \ltrim($i->mount_point, '/');
		}
		foreach ($createdLocalStorage as $key => $value) {
			if ($value === $folder) {
				$mount_id = $key;
			}
		}
		if (!isset($mount_id)) {
			if ($mustExist) {
				throw  new Exception("Id not found for folder to be deleted");
			}
			return false;
		}
		$this->invokingTheCommand('files_external:delete --yes ' . $mount_id);
		return (int) $mount_id;
	}

	/**
	 * @When the administrator exports the local storage mounts using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorExportsTheMountsUsingTheOccCommand() {
		$this->invokingTheCommand('files_external:export');
	}

	/**
	 * @When the administrator imports the local storage mount from file :file using the occ command
	 *
	 * @param $file
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorImportsTheMountFromFileUsingTheOccCommand($file) {
		$this->invokingTheCommand('files_external:import ' . $file);
	}

	/**
	 * @When the administrator has exported the local storage mounts using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasExportedTheMountsUsingTheOccCommand() {
		$this->invokingTheCommand('files_external:export');
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator verifies the mount configuration for local storage :localStorage using the occ command
	 *
	 * @param $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorVerifiesTheMountConfigurationForLocalStorageUsingTheOccCommand($localStorage) {
		$this->listLocalStorageMount();
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($commandOutput as $entry) {
			if (\ltrim($entry->mount_point, '/') == $localStorage) {
				$mountId = $entry->mount_id;
			}
		}
		if (!isset($mountId)) {
			throw new Exception("Id not found for local storage $localStorage to be verified");
		}
		$this->invokingTheCommand('files_external:verify ' . $mountId);
	}

	/**
	 * @Then the following mount configuration information should be listed:
	 *
	 * @param $info
	 *
	 * @return void
	 */
	public function theFollowingInformationShouldBeListed(TableNode $info) {
		$ResultArray = [];
		$expectedInfo = $info->getColumnsHash();
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$commandOutputSplitted = \preg_split("/[-]/", $commandOutput);
		$filteredArray = \array_filter(\array_map("trim", $commandOutputSplitted));
		foreach ($filteredArray as $entry) {
			$keyValue = \preg_split("/[:]/", $entry);
			if (isset($keyValue[1])) {
				$ResultArray[$keyValue[0]] = $keyValue[1];
			} else {
				$ResultArray[$keyValue[0]] = "";
			}
		}
		foreach ($expectedInfo as $element) {
			Assert::assertEquals(
				$element,
				\array_map('trim', $ResultArray),
				__METHOD__
				. " '" . \implode(', ', $element)
				. "' was expected to be listed, but is not listed in the mount configuration information"
			);
		}
	}

	/**
	 * @When the administrator list the repair steps using the occ command
	 *
	 * @return void
	 * @throws Exception
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
	 * @throws Exception
	 */
	public function theBackgroundJobsModeShouldBe($mode) {
		$this->invokingTheCommand(
			"config:app:get core backgroundjobs_mode"
		);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertEquals(
			$mode,
			\trim($lastOutput),
			"The background jobs mode was expected to be {$mode} but got '"
			. \trim($lastOutput)
			. "'"
		);
	}

	/**
	 * @Then the update channel should be :value
	 *
	 * @param string $value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUpdateChannelShouldBe($value) {
		$this->invokingTheCommand(
			"config:app:get core OC_Channel"
		);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertEquals(
			$value,
			\trim($lastOutput),
			"The update channel was expected to be '$value' but got '"
			. \trim($lastOutput)
			. "'"
		);
	}

	/**
	 * @Then the log level should be :logLevel
	 *
	 * @param string $logLevel
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLogLevelShouldBe($logLevel) {
		$this->invokingTheCommand(
			"config:system:get loglevel"
		);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertEquals(
			$logLevel,
			\trim($lastOutput),
			"The log level was expected to be '$logLevel' but got '"
			. \trim($lastOutput)
			. "'"
		);
	}

	/**
	 * @When the administrator adds/updates config key :key with value :value in app :app using the occ command
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorAddsConfigKeyWithValueInAppUsingTheOccCommand($key, $value, $app) {
		$this->addConfigKeyWithValueInAppUsingTheOccCommand(
			$key,
			$value,
			$app
		);
	}

	/**
	 * @Given the administrator has added config key :key with value :value in app :app
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasAddedConfigKeyWithValueInAppUsingTheOccCommand($key, $value, $app) {
		$this->addConfigKeyWithValueInAppUsingTheOccCommand(
			$key,
			$value,
			$app
		);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator deletes config key :key of app :app using the occ command
	 *
	 * @param string $key
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesConfigKeyOfAppUsingTheOccCommand($key, $app) {
		$this->deleteConfigKeyOfAppUsingTheOccCommand($key, $app);
	}

	/**
	 * @When the administrator adds/updates system config key :key with value :value using the occ command
	 * @When the administrator adds/updates system config key :key with value :value and type :type using the occ command
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorAddsSystemConfigKeyWithValueUsingTheOccCommand(
		$key, $value, $type = "string"
	) {
		$this->addSystemConfigKeyUsingTheOccCommand(
			$key,
			$value,
			$type
		);
	}

	/**
	 * @Given the administrator has added/updated system config key :key with value :value
	 * @Given the administrator has added/updated system config key :key with value :value and type :type
	 *
	 * @param string $key
	 * @param string $value
	 * @param string $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasAddedSystemConfigKeyWithValueUsingTheOccCommand(
		$key, $value, $type = "string"
	) {
		$this->addSystemConfigKeyUsingTheOccCommand(
			$key,
			$value,
			$type
		);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator deletes system config key :key using the occ command
	 *
	 * @param string $key
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesSystemConfigKeyUsingTheOccCommand($key) {
		$this->deleteSystemConfigKeyUsingTheOccCommand($key);
	}

	/**
	 * @When the administrator empties the trashbin of user :user using the occ command
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEmptiesTheTrashbinOfUserUsingTheOccCommand($user) {
		$this->emptyTrashBinOfUserUsingOccCommand($user);
	}

	/**
	 * @When the administrator deletes all the versions for user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesAllTheVersionsForUser($user) {
		$user = $this->featureContext->getActualUsername($user);
		$this->deleteAllVersionsForUserUsingOccCommand($user);
	}

	/**
	 * @When the administrator empties the trashbin of all users using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEmptiesTheTrashbinOfAllUsersUsingTheOccCommand() {
		$this->emptyTrashBinOfUserUsingOccCommand('');
	}

	/**
	 * @When the administrator gets all the jobs in the background queue using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsAllTheJobsInTheBackgroundQueueUsingTheOccCommand() {
		$this->getAllJobsInBackgroundQueueUsingOccCommand();
	}

	/**
	 * @When the administrator deletes last background job :job using the occ command
	 *
	 * @param string $job
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesLastBackgroundJobUsingTheOccCommand($job) {
		$this->deleteLastBackgroundJobUsingTheOccCommand($job);
	}

	/**
	 * @Then the last deleted background job :job should not be listed in the background jobs queue
	 *
	 * @param string $job
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLastDeletedJobShouldNotBeListedInTheJobsQueue($job) {
		$jobId = $this->lastDeletedJobId;
		$match = $this->getLastJobIdForJob($job);
		Assert::assertNotEquals(
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
	 * @throws Exception
	 */
	public function systemConfigKeyShouldHaveValue($key, $value) {
		$config = \trim(SetupHelper::getSystemConfigValue($key));
		Assert::assertSame(
			$value,
			$config,
			"The system config key '$key' was expected to have value '$value', but got '$config'"
		);
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
		$this->featureContext->verifyTableNodeColumns($table, ['table_column']);
		foreach ($table as $row) {
			$lines = SetupHelper::findLines(
				$commandOutput,
				$row['table_column']
			);
			Assert::assertNotEmpty(
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
	 * @throws Exception
	 */
	public function systemConfigKeyShouldNotExist($key) {
		Assert::assertEmpty(
			SetupHelper::getSystemConfig($key)['stdOut'],
			"The system config key '$key' was not expected to exist"
		);
	}

	/**
	 * @When the administrator lists the config keys
	 *
	 * @return void
	 * @throws Exception
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
		Assert::assertArrayHasKey(
			'apps',
			$config_list,
			"The occ output does not contain apps configs"
		);
		Assert::assertNotEmpty(
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
		Assert::assertArrayHasKey(
			'system',
			$config_list,
			"The occ output does not contain system configs"
		);
		Assert::assertNotEmpty(
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
	 * @throws Exception
	 */
	public function theAdministratorHasClearedTheVersionsForUser($user) {
		$user = $this->featureContext->getActualUsername($user);
		$this->deleteAllVersionsForUserUsingOccCommand($user);
		Assert::assertSame(
			"Delete versions of   $user",
			\trim($this->featureContext->getStdOutOfOccCommand())
		);
	}

	/**
	 * @Given the administrator has cleared the versions for all users
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasClearedTheVersionsForAllUsers() {
		$this->deleteAllVersionsForAllUsersUsingTheOccCommand();
		Assert::assertStringContainsString(
			"Delete all versions",
			\trim($this->featureContext->getStdOutOfOccCommand()),
			"Expected 'Delete all versions' to be contained in the output of occ command: "
			. \trim($this->featureContext->getStdOutOfOccCommand())
		);
	}

	/**
	 * get jobId of the latest job found of given job class
	 *
	 * @param string $job
	 *
	 * @return string|boolean
	 * @throws Exception
	 */
	public function getLastJobIdForJob($job) {
		$this->getAllJobsInBackgroundQueueUsingOccCommand();
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$lines = SetupHelper::findLines(
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

			Assert::assertThat(
				$actualKeyValuePair,
				Assert::matchesRegularExpression($value)
			);
			return;
		}

		if (!\array_key_exists($key, $systemConfig)) {
			Assert::fail(
				"system config doesn't contain key: " . $key
			);
		}

		Assert::assertEquals(
			$value,
			$systemConfig[$key],
			"config: $key doesn't contain value: $value"
		);
	}

	/**
	 * @Given the administrator has enabled the external storage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enableExternalStorageUsingOccAsAdmin() {
		SetupHelper::runOcc(
			[
				'config:app:set',
				'core',
				'enable_external_storage',
				'--value=yes'
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$response = SetupHelper::runOcc(
			[
				'config:app:get',
				'core',
				'enable_external_storage',
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$status = \trim($response['stdOut']);
		Assert::assertEquals(
			'yes',
			$status,
			"The external storage was expected to be enabled but got '$status'"
		);
	}

	/**
	 * @Given the administrator has added group :group to the exclude group from sharing list
	 *
	 * @param string $groups
	 * multiple groups can be passed as comma separated string
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasAddedGroupToTheExcludeGroupFromSharingList($groups) {
		$groups = \explode(',', \trim($groups));
		$groups = \array_map('trim', $groups); //removing whitespaces around group names
		$groups = '"' . \implode('","', $groups) . '"';
		SetupHelper::runOcc(
			[
				'config:app:set',
				'core',
				'shareapi_exclude_groups_list',
				"--value='[$groups]'"
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$response = SetupHelper::runOcc(
			[
				'config:app:get',
				'core',
				'shareapi_exclude_groups_list'
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$excludedGroupsFromResponse = (\trim($response['stdOut']));
		$excludedGroupsFromResponse = \trim($excludedGroupsFromResponse, '[]');
		Assert::assertEquals(
			$groups,
			$excludedGroupsFromResponse,
			"'$groups' is not added to exclude groups from sharing list: '"
			. $excludedGroupsFromResponse
			. "' but was expected to be"
		);
	}

	/**
	 * @Given the administrator has enabled exclude groups from sharing
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasEnabledExcludeGroupsFromSharingUsingTheWebui() {
		SetupHelper::runOcc(
			[
				"config:app:set",
				"core",
				"shareapi_exclude_groups",
				"--value=yes"
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$response = SetupHelper::runOcc(
			[
				"config:app:get",
				"core",
				"shareapi_exclude_groups"
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$status = \trim($response['stdOut']);
		Assert::assertEquals(
			"yes",
			$status,
			"Exclude groups from sharing was expected to be 'yes'(enabled) but got '$status'"
		);
	}

	/**
	 * @Given /^the administrator has (enabled|disabled) the webUI lock file action$/
	 *
	 * @param string $enabledOrDisabled
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasEnabledTheWebUILockFileAction($enabledOrDisabled) {
		$switch = ($enabledOrDisabled !== "disabled");
		if ($switch) {
			$value = 'yes';
		} else {
			$value = 'no';
		}
		SetupHelper::runOcc(
			[
				"config:app:set",
				"files",
				"enable_lock_file_action",
				"--value=$value"
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$response = SetupHelper::runOcc(
			[
				"config:app:get",
				"files",
				"enable_lock_file_action"
			],
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$status = \trim($response['stdOut']);
		Assert::assertEquals(
			$value,
			$status,
			"enable_lock_file_action was expected to be '$value'($enabledOrDisabled) but got '$status'"
		);
	}

	/**
	 * @When the administrator creates an external mount point with the following configuration about user :user using the occ command
	 *
	 * @param string $user
	 * @param TableNode $settings
	 *
	 * necessary attributes inside $settings table:
	 * 1. host        	     - remote server url
	 * 2. root        	     - remote folder name -> mount path
	 * 3. secure      	     - true/false (http or https)
	 * 4. user        	     - remote server user username
	 * 5. password    	     - remote server user password
	 * 6. mount_point 	     - external storage name
	 * 7. storage_backend        - options: [local, owncloud, smb, googledrive, sftp, dav]
	 * 8. authentication_backend - options: [null::null, password::password, password::sessioncredentials]
	 *
	 * @see [`php occ files_external:backends`] to view
	 * detailed information of parameters used above
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createExternalMountPointUsingTheOccCommand($user, $settings) {
		$userRenamed = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeRows(
			$settings,
			["host", "root", "storage_backend",
			"authentication_backend", "mount_point",
			"user", "password", "secure"]
		);
		$extMntSettings = $settings->getRowsHash();
		$extMntSettings['user'] = $this->featureContext->substituteInLineCodes(
			$extMntSettings['user'], $userRenamed
		);
		$password = $this->featureContext->substituteInLineCodes(
			$extMntSettings['password'], $user
		);
		$args = [
			"files_external:create",
			"-c host=" .
			$this->featureContext->substituteInLineCodes($extMntSettings['host']),
			"-c root=" . $extMntSettings['root'],
			"-c secure=" . $extMntSettings['secure'],
			"-c user=" . $extMntSettings['user'],
			"-c password=" . $password,
			$extMntSettings['mount_point'],
			$extMntSettings['storage_backend'],
			$extMntSettings['authentication_backend']
		];
		$this->featureContext->runOcc($args);
		// add to array of created storageIds
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$mountId = \preg_replace('/\D/', '', $commandOutput);
		$this->featureContext->addStorageId($extMntSettings["mount_point"], $mountId);
	}

	/**
	 * @Given the administrator has created an external mount point with the following configuration about user :user using the occ command
	 *
	 * @param string $user
	 * @param TableNode $settings
	 *
	 * @return void
	 */
	public function adminHasCreatedAnExternalMountPointWithFollowingConfigUsingTheOccCommand($user, TableNode $settings) {
		$this->createExternalMountPointUsingTheOccCommand($user, $settings);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator deletes external storage with mount point :mountPoint
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 */
	public function adminDeletesExternalMountPoint($mountPoint) {
		$mount_id = $this->administratorDeletesFolder($mountPoint);
		$this->featureContext->popStorageId($mount_id);
	}

	/**
	 * @Then mount point :mountPoint should not be listed as an external storage
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 */
	public function mountPointShouldNotBeListedAsAnExternalStorage($mountPoint) {
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($commandOutput as $entry) {
			Assert::assertNotEquals($mountPoint, $entry->mount_point);
		}
	}

	/**
	 * This will run after EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removeImportedCertificates() {
		$remainingCertificates = \array_diff($this->importedCertificates, $this->removedCertificates);
		foreach ($remainingCertificates as $certificate) {
			$this->invokingTheCommand("security:certificates:remove " . $certificate);
			$this->theCommandShouldHaveBeenSuccessful();
		}
	}

	/**
	 * This will run after EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetDAVTechPreview() {
		if ($this->doTechPreview) {
			if ($this->initialTechPreviewStatus === "") {
				SetupHelper::deleteSystemConfig('dav.enable.tech_preview');
			} elseif ($this->initialTechPreviewStatus === 'true' && !$this->techPreviewEnabled) {
				$this->enableDAVTechPreview();
			} elseif ($this->initialTechPreviewStatus === 'false' && $this->techPreviewEnabled) {
				$this->disableDAVTechPreview();
			}
		}
	}

	/**
	 * This will run after EVERY scenario.
	 * Some local_storage tests import storage from an export file. In that case
	 * we have not explicitly created the storage, and so we do not explicitly
	 * know to delete it. So delete the local storage that is known to be used
	 * in tests.
	 *
	 * @AfterScenario @local_storage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removeLocalStorageIfExists() {
		$this->deleteLocalStorageFolderUsingTheOccCommand('local_storage', false);
		$this->deleteLocalStorageFolderUsingTheOccCommand('local_storage2', false);
		$this->deleteLocalStorageFolderUsingTheOccCommand('local_storage3', false);
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
	 * @throws Exception
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		SetupHelper::init(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
		$ocVersion = SetupHelper::getSystemConfigValue('version');
		// dav.enable.tech_preview was used in some ownCloud versions before 10.4.0
		// only set it on those versions of ownCloud
		if (\version_compare($ocVersion, '10.4.0') === -1) {
			$this->doTechPreview = true;
			$techPreviewEnabled = \trim(
				SetupHelper::getSystemConfigValue('dav.enable.tech_preview')
			);
			$this->initialTechPreviewStatus = $techPreviewEnabled;
			$this->techPreviewEnabled = $techPreviewEnabled === 'true';
		}
	}
}
