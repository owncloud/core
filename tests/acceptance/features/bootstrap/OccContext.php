<?php declare(strict_types=1);
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
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Assert;
use TestHelpers\OcisHelper;
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
	 * The code to manage dav.enable.tech_preview was used in 10.4/10.3
	 * The use of the steps to enable/disable it has been removed from the
	 * feature files. But the infrastructure has been left here, as a similar
	 * thing might likely happen in the future.
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
	public function isTechPreviewEnabled():bool {
		return $this->techPreviewEnabled;
	}

	/**
	 * @return boolean
	 * @throws Exception
	 */
	public function enableDAVTechPreview():bool {
		if ($this->doTechPreview) {
			if (!$this->isTechPreviewEnabled()) {
				$this->addSystemConfigKeyUsingTheOccCommand(
					"dav.enable.tech_preview",
					"true",
					"boolean"
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
	public function disableDAVTechPreview():bool {
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
	public function invokingTheCommand(string $cmd):void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc([$cmd])
		);
	}

	/**
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function importSecurityCertificateFromFileInTemporaryStorage(string $path):void {
		$this->invokingTheCommand("security:certificates:import " . TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$path");
		if ($this->featureContext->getExitStatusCodeOfOccCommand() === 0) {
			$pathComponents = \explode("/", $path);
			$certificate = \end($pathComponents);
			\array_push($this->importedCertificates, $certificate);
		}
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
		string $cmd,
		string $envVariableName,
		string $envVariableValue
	):int {
		$args = [$cmd];
		return(
			$this->featureContext->runOccWithEnvVariables(
				$args,
				[$envVariableName => $envVariableValue]
			)
		);
	}

	/**
	 * @param string $mode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function changeBackgroundJobsModeUsingTheOccCommand(string $mode):void {
		$this->invokingTheCommand("background:$mode");
	}

	/**
	 * @param string $mountPoint
	 * @param boolean $setting
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExtStorageReadOnlyUsingTheOccCommand(string $mountPoint, bool $setting = true):void {
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
	 * @param boolean $enable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExtStorageSharingUsingTheOccCommand(string $mountPoint, bool $enable = true):void {
		$command = "files_external:option";

		$mountId = $this->featureContext->getStorageId($mountPoint);

		$key = "enable_sharing";

		$value = $enable ? "true" : "false";

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
	public function setExtStorageCheckChangesUsingTheOccCommand(string $mountPoint, string $setting):void {
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
	public function scanFileSystemForAllUsersUsingTheOccCommand():void {
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
	public function scanFileSystemForAUserUsingTheOccCommand(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->invokingTheCommand(
			"files:scan $user"
		);
	}

	/**
	 * @param string $path
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function scanFileSystemPathUsingTheOccCommand(string $path, ?string $user = null):void {
		$path = $this->featureContext->substituteInLineCodes(
			$path,
			$user
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
	public function scanFileSystemForAGroupUsingTheOccCommand(string $group):void {
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
	public function scanFileSystemForGroupsUsingTheOccCommand(string $groups):void {
		$this->invokingTheCommand(
			"files:scan --groups=$groups"
		);
	}

	/**
	 * @param string $mount
	 *
	 * @return void
	 */
	public function createLocalStorageMountUsingTheOccCommand(string $mount):void {
		$result = SetupHelper::createLocalStorageMount(
			$mount,
			$this->featureContext->getStepLineRef()
		);
		$storageId = $result['storageId'];
		if (!is_numeric($storageId)) {
			throw new Exception(
				__METHOD__ . " storageId '$storageId' is not numeric"
			);
		}
		$this->featureContext->setResultOfOccCommand($result);
		$this->featureContext->addStorageId($mount, (int) $storageId);
	}

	/**
	 * @param string $key
	 * @param string $value
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addConfigKeyWithValueInAppUsingTheOccCommand(string $key, string $value, string $app):void {
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
	public function deleteConfigKeyOfAppUsingTheOccCommand(string $key, string $app):void {
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
		string $key,
		string $value,
		string $type = "string"
	):void {
		$this->invokingTheCommand(
			"config:system:set --value '${value}' --type ${type} ${key}"
		);
	}

	/**
	 * @param string $key
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteSystemConfigKeyUsingTheOccCommand(string $key):void {
		$this->invokingTheCommand(
			"config:system:delete ${key}"
		);
	}

	/**
	 *
	 * @return void
	 * @throws Exception
	 */
	public function cleanOrphanedRemoteStoragesUsingOccCommand():void {
		$this->invokingTheCommand(
			"sharing:cleanup-remote-storages"
		);
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function emptyTrashBinOfUserUsingOccCommand(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->invokingTheCommand(
			"trashbin:cleanup $user"
		);
	}

	/**
	 * Create a calendar for given user with given calendar name
	 *
	 * @param string $user
	 * @param string $calendarName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createCalendarForUserUsingOccCommand(string $user, string $calendarName):void {
		$this->invokingTheCommand("dav:create-calendar $user $calendarName");
	}

	/**
	 * Create an address book for given user with given address book name
	 *
	 * @param string $user
	 * @param string $addressBookName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createAnAddressBookForUserUsingOccCommand(string $user, string $addressBookName):void {
		$this->invokingTheCommand("dav:create-addressbook $user $addressBookName");
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public function getAllJobsInBackgroundQueueUsingOccCommand():void {
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
	public function deleteAllVersionsForUserUsingOccCommand(string $user = ""): void {
		$this->invokingTheCommand(
			"versions:cleanup $user"
		);
	}

	/**
	 * @param string $users space-separated usernames. E.g. "Alice Brian" (without <quote>)
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteAllVersionsForMultipleUsersUsingOccCommand(string $users): void {
		$this->deleteAllVersionsForUserUsingOccCommand($users);
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public function deleteAllVersionsForAllUsersUsingOccCommand(): void {
		$this->deleteAllVersionsForUserUsingOccCommand();
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteExpiredVersionsForUserUsingOccCommand(string $user = ""): void {
		$this->invokingTheCommand(
			"versions:expire $user"
		);
	}

	/**
	 * @param string $users space-separated usernames. E.g. "Alice Brian" (without <quote>)
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteExpiredVersionsForMultipleUsersUsingOccCommand(string $users): void {
		$this->deleteExpiredVersionsForUserUsingOccCommand($users);
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public function deleteExpiredVersionsForAllUsersUsingOccCommand(): void {
		$this->deleteExpiredVersionsForUserUsingOccCommand();
	}

	/**
	 * @param string $job
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteLastBackgroundJobUsingTheOccCommand(string $job):void {
		$match = $this->getLastJobIdForJob($job);
		if ($match === false) {
			throw new Exception("Couldn't find jobId for given job: $job");
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
	public function listLocalStorageMount():void {
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
	public function listLocalStorageMountShort():void {
		$this->invokingTheCommand('files_external:list --short --output=json');
	}

	/**
	 * List created local storage mount with --mount-options
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listLocalStorageMountOptions():void {
		$this->invokingTheCommand('files_external:list --mount-options --output=json');
	}

	/**
	 * List available backends
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listAvailableBackends():void {
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
	public function listAvailableBackendsOfType(string $type):void {
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
	public function listBackendOfType(string $type, string $backend):void {
		$this->invokingTheCommand('files_external:backends ' . $type . ' ' . $backend . ' --output=json');
	}

	/**
	 * List created local storage mount with --show-password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function listLocalStorageShowPassword():void {
		$this->invokingTheCommand('files_external:list --show-password --output=json');
	}

	/**
	 * @When the administrator enables DAV tech_preview
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEnablesDAVTechPreview():void {
		$this->enableDAVTechPreview();
	}

	/**
	 * @Given the administrator has enabled DAV tech_preview
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasEnabledDAVTechPreview():void {
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
	public function theAdministratorInvokesOccCommand(string $cmd):void {
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
	public function theAdministratorInvokesOccCommandForUser(string $cmd, string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$cmd = $this->featureContext->substituteInLineCodes(
			$cmd,
			$user
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
	public function theAdministratorHasInvokedOccCommand(string $cmd):void {
		$this->invokingTheCommand($cmd);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @Given the administrator has selected master key encryption type using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSelectedMasterKeyEncryptionTypeUsingTheOccCommand():void {
		$this->featureContext->runOcc(['encryption:select-encryption-type', "masterkey --yes"]);
	}

	/**
	 * @When the administrator imports security certificate from file :filename in temporary storage on the system under test
	 *
	 * @param string $filename
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorImportsSecurityCertificateFromFile(string $filename):void {
		$this->importSecurityCertificateFromFileInTemporaryStorage($filename);
	}

	/**
	 * @Given the administrator has imported security certificate from file :filename in temporary storage on the system under test
	 *
	 * @param string $filename
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasImportedSecurityCertificateFromFile(string $filename):void {
		$this->importSecurityCertificateFromFileInTemporaryStorage($filename);
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
	public function theAdministratorRemovesTheSecurityCertificate(string $certificate):void {
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
		string $cmd,
		string $envVariableName,
		string $envVariableValue
	):void {
		$this->featureContext->setOccLastCode(
			$this->invokingTheCommandWithEnvVariable(
				$cmd,
				$envVariableName,
				$envVariableValue
			)
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
		string $cmd,
		string $envVariableName,
		string $envVariableValue
	):void {
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
	public function theAdministratorRunsUpgradeRoutinesOnLocalServerUsingTheOccCommand():void {
		\system("./occ upgrade", $status);
		if ($status !== 0) {
			// if the above command fails make sure to turn off maintenance mode
			\system("./occ maintenance:mode --off");
		}
	}

	/**
	 * @Given the administrator has decrypted everything
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasDecryptedEverything():void {
		$this->theAdministratorRunsEncryptionDecryptAllUsingTheOccCommand();
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator disables encryption using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDisablesEncryptionUsingTheOccCommand():void {
		$this->invokingTheCommand("encryption:disable");
	}

	/**
	 * @When the administrator runs encryption decrypt all using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorRunsEncryptionDecryptAllUsingTheOccCommand():void {
		\system("./occ maintenance:singleuser --on");
		\system("./occ encryption:decrypt-all -c yes", $status);

		$this->featureContext->setResultOfOccCommand(["code" => $status, "stdOut" => "", "stdErr" => ""]);
		\system("./occ maintenance:singleuser --off");
	}

	/**
	 * @return bool
	 */
	public function theOccCommandExitStatusWasSuccess():bool {
		return ($this->featureContext->getExitStatusCodeOfOccCommand() === 0);
	}

	/**
	 * @Then /^the command should have been successful$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCommandShouldHaveBeenSuccessful():void {
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
			if ($exitStatusCode === null) {
				$msg = "The occ command did not run ";
			}
			throw new Exception($msg);
		} elseif (!empty($exceptions)) {
			$msg = 'The command was successful but triggered exceptions: '
				. \implode(', ', $exceptions);
			throw new Exception($msg);
		}
	}

	/**
	 * @Then /^the command should have failed with exit code ([0-9]+)$/
	 *
	 * @param int $exitCode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCommandFailedWithExitCode(int $exitCode):void {
		$exitStatusCode = $this->featureContext->getExitStatusCodeOfOccCommand();
		Assert::assertEquals(
			(int) $exitCode,
			$exitStatusCode,
			"The command was expected to fail with exit code $exitCode but got {$exitStatusCode}"
		);
	}

	/**
	 * @Then /^the command output should be the text ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $text
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCommandOutputShouldBeTheText(string $text):void {
		$text = \trim($text, $text[0]);
		$commandOutput = \trim($this->featureContext->getStdOutOfOccCommand());
		Assert::assertEquals(
			$text,
			$commandOutput,
			"The command output did not match the expected text on stdout '$text'\n" .
			"The command output on stdout was:\n" .
			$commandOutput
		);
	}

	/**
	 * @Then /^the command should have failed with exception text "([^"]*)"$/
	 *
	 * @param string $exceptionText
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCommandFailedWithExceptionText(string $exceptionText):void {
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
	 * @throws Exception
	 */
	public function theCommandOutputContainsTheText(string $text):void {
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
	 * @throws Exception
	 */
	public function theCommandOutputContainsTheTextAboutUser(string $text, string $user):void {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$text = \trim($text, $text[0]);
		$text = $this->featureContext->substituteInLineCodes(
			$text,
			$user
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
	 * @throws Exception
	 */
	public function theCommandErrorOutputContainsTheText(string $text):void {
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
	public function theOccCommandJsonOutputShouldNotReturnAnyData():void {
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
	 * @Then :noOfOrphanedShare orphaned remote storage should have been cleared
	 *
	 * @param int $noOfOrphanedShare
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theOrphanedRemoteStorageShouldBeCleared(int $noOfOrphanedShare):void {
		$this->theCommandShouldHaveBeenSuccessful();
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		// removing blank lines
		$commandOutput = implode("\n", array_filter(explode("\n", $commandOutput)));
		// splitting strings based on newline into an array
		$outputLines = preg_split("/\r\n|\n|\r/", $commandOutput);
		// first line of command output contains total remote storage scanned
		$totalRemoteStorage = (int) filter_var($outputLines[0], FILTER_SANITIZE_NUMBER_INT);
		echo "totalremotestorage: $totalRemoteStorage";
		// calculating total no of shares deleted from remote storage: first getting total length of the array
		// then minus 2 for first two lines of scan info message
		// then divide by 2 because each share delete has message of two line
		$totalSharesDeleted = ((\count($outputLines) - 2) / 2) / $totalRemoteStorage;
		Assert::assertEquals(
			$noOfOrphanedShare,
			$totalSharesDeleted,
			"The command was expected to delete '$noOfOrphanedShare' orphaned shares but only deleted '$totalSharesDeleted' orphaned shares."
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
	public function theAdministratorHasSetTheDefaultFolderForReceivedSharesTo(string $folder):void {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// The default folder for received shares is already "Shares" on OCIS and REVA.
			// If the step is asking for a different folder, then fail.
			// Otherwise just return - the setting is already done by default.
			Assert::assertEquals(
				"Shares",
				\trim($folder, "/"),
				__METHOD__ . " tried to set the default folder for received shares to $folder but that is not possible on OCIS"
			);
			return;
		}
		$this->addSystemConfigKeyUsingTheOccCommand(
			"share_folder",
			$folder
		);
	}

	/**
	 * @When the administrator has set depth_infinity_allowed to :depth_infinity_allowed
	 *
	 * @param int $depthInfinityAllowed
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetDepthInfinityAllowedTo($depthInfinityAllowed) {
		$depthInfinityAllowedString = (string) $depthInfinityAllowed;
		$this->addSystemConfigKeyUsingTheOccCommand(
			"dav.propfind.depth_infinity",
			$depthInfinityAllowedString
		);
		if ($depthInfinityAllowedString === "0") {
			$this->featureContext->davPropfindDepthInfinityDisabled();
		} else {
			$this->featureContext->davPropfindDepthInfinityEnabled();
		}
	}

	/**
	 * @Given the administrator has set the mail smtpmode to :smtpmode
	 *
	 * @param string $smtpmode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetTheMailSmtpmodeTo(string $smtpmode):void {
		$this->addSystemConfigKeyUsingTheOccCommand(
			"mail_smtpmode",
			$smtpmode
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
	public function theAdministratorSetsLogLevelUsingTheOccCommand(string $level):void {
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
	public function theAdministratorSetsTimeZoneUsingTheOccCommand(string $timezone):void {
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
	public function theAdministratorSetsBackendUsingTheOccCommand(string $backend):void {
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
	public function theAdministratorEnablesOwnCloudBackendUsingTheOccCommand():void {
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
	public function theAdministratorSetsLogFilePathUsingTheOccCommand(string $path):void {
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
	public function theAdministratorSetsLogRotateFileSizeUsingTheOccCommand(string $size):void {
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
	public function theCommandOutputShouldBe(PyStringNode $content):void {
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
	public function theAdministratorChangesTheBackgroundJobsModeTo(string $mode):void {
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
	public function theAdministratorHasChangedTheBackgroundJobsModeTo(string $mode):void {
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
	public function theAdminSetsTheExtStorageToReadOnly(string $mountPoint):void {
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
	public function theAdminHasSetTheExtStorageToReadOnly(string $mountPoint):void {
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
	public function theAdminHasSetTheExtStorageToSharing(string $mountPoint):void {
		$this->setExtStorageSharingUsingTheOccCommand($mountPoint);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When /^the administrator (enables|disables) sharing for the external storage "([^"]*)" using the occ command$/
	 *
	 * @param string $action
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminDisablesSharingForTheExtStorage(string $action, string $mountPoint):void {
		$this->setExtStorageSharingUsingTheOccCommand($mountPoint, $action === "enables");
	}

	/**
	 * @When the administrator sets the external storage :mountPoint to be never scanned automatically using the occ command
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminSetsTheExtStorageToBeNeverScannedAutomatically(string $mountPoint):void {
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
	public function theAdminHasSetTheExtStorageToBeNeverScannedAutomatically(string $mountPoint):void {
		$this->setExtStorageCheckChangesUsingTheOccCommand($mountPoint, "never");
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator scans the filesystem for all users using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorScansTheFilesystemForAllUsersUsingTheOccCommand():void {
		$this->scanFileSystemForAllUsersUsingTheOccCommand();
	}

	/**
	 * @Given the administrator has scanned the filesystem for all users
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasScannedTheFilesystemForAllUsersUsingTheOccCommand():void {
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
	public function theAdministratorScansTheFilesystemForUserUsingTheOccCommand(string $user):void {
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
	public function theAdministratorHasScannedTheFilesystemForUserUsingTheOccCommand(string $user):void {
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
	public function theAdministratorScansTheFilesystemInPathUsingTheOccCommand(string $path, string $user):void {
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
	public function theAdministratorHasScannedTheFilesystemInPathUsingTheOccCommand(string $path):void {
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
	public function theAdministratorScansTheFilesystemForGroupUsingTheOccCommand(string $group):void {
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
	public function theAdministratorHasScannedTheFilesystemForGroupUsingTheOccCommand(string $group):void {
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
	public function theAdministratorScansTheFilesystemForGroupsUsingTheOccCommand(string $groups):void {
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
	public function theAdministratorHasScannedTheFilesystemForGroupsUsingTheOccCommand(string $groups):void {
		$this->scanFileSystemForGroupsUsingTheOccCommand($groups);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator cleanups the filesystem for all users using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCleanupsTheFilesystemForAllUsersUsingTheOccCommand():void {
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
	public function theAdministratorCreatesTheLocalStorageMountUsingTheOccCommand(string $mount):void {
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
	public function theAdministratorHasCreatedTheLocalStorageMountUsingTheOccCommand(string $mount):void {
		$this->createLocalStorageMountUsingTheOccCommand($mount);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @param string $action
	 * @param string $userOrGroup
	 * @param string $userOrGroupName
	 * @param string $mountName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addRemoveUserOrGroupToOrFromMount(
		string $action,
		string $userOrGroup,
		string $userOrGroupName,
		string $mountName
	):void {
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
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(
				[
					'files_external:applicable',
					$mountId,
					"$action ",
					"$userOrGroupName"
				]
			)
		);
	}

	/**
	 * @param string $mount
	 * @param string $userOrGroup
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getListOfApplicableUserOrGroupForMount(string $mount, string $userOrGroup):array {
		$validArgs = ["users", "groups"];
		if (!\in_array($userOrGroup, $validArgs)) {
			throw new Exception(
				"Invalid key provided. Expected:" .
				\implode(", ", $validArgs) .
				"Found: " . $userOrGroup
			);
		}
		$mountId = $this->getMountIdForLocalStorage($mount);
		$this->featureContext->runOcc(
			[
				'files_external:applicable',
				$mountId,
				'--output=json'
			]
		);
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		return ($userOrGroup === "users") ? $commandOutput->users : $commandOutput->groups;
	}

	/**
	 * @param string $action
	 * @param string $userOrGroup
	 * @param string $userOrGroupName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addRemoveUserOrGroupToOrFromLastLocalMount(
		string $action,
		string $userOrGroup,
		string $userOrGroupName
	):void {
		$storageIds = $this->featureContext->getStorageIds();
		Assert::assertGreaterThan(
			0,
			\count($storageIds),
			"addRemoveAsApplicableUserLastLocalMount no local mounts exist"
		);
		$lastMountName = \end($storageIds);
		$this->addRemoveUserOrGroupToOrFromMount(
			$action,
			$userOrGroup,
			$userOrGroupName,
			$lastMountName
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
	 * @throws Exception
	 */
	public function theAdminAddsRemovesAsTheApplicableUserLastLocalMountUsingTheOccCommand(
		string $action,
		string $userOrGroup,
		string $user
	):void {
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
	 * @throws Exception
	 */
	public function theAdminHasAddedRemovedAsTheApplicableUserLastLocalMountUsingTheOccCommand(
		string $action,
		string $userOrGroup,
		string $user
	):void {
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
	 * @throws Exception
	 */
	public function theAdminAddsRemovesAsTheApplicableUserForMountUsingTheOccCommand(
		string $action,
		string $userOrGroup,
		string $user,
		string $mount
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->addRemoveUserOrGroupToOrFromMount(
			$action,
			$userOrGroup,
			$user,
			$mount
		);
	}

	/**
	 * @Then /^the following (users|groups) should be listed as applicable for local storage mount "([^"]*)"$/
	 *
	 * @param string $usersOrGroups comma separated lists eg: Alice, Brian
	 * @param string $localStorage
	 * @param TableNode $applicable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingUsersOrGroupsShouldBeListedAsApplicable(string $usersOrGroups, string $localStorage, TableNode $applicable): void {
		$this->featureContext->verifyTableNodeRows(
			$applicable,
			[],
			["users", "groups"]
		);
		$expectedApplicableList = $applicable->getRowsHash();
		$actualApplicableList = $this->getListOfApplicableUserOrGroupForMount($localStorage, $usersOrGroups);
		foreach ($expectedApplicableList as $expectedApplicable) {
			Assert::assertContains(
				$expectedApplicable,
				$actualApplicableList,
				__METHOD__
				. $usersOrGroups
				. " not found!\nexpected: "
				. $expectedApplicable
				. " to be in the list ["
				. \implode(", ", $actualApplicableList)
				. "]."
			);
		}
	}

	/**
	 * @Then /^the applicable (users|groups) list should be empty for local storage mount "([^"]*)"$/
	 *
	 * @param string $usersOrGroups
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theApplicableUsersOrGroupsListShouldBeEmptyForLocalStorageMount(string $usersOrGroups, string $localStorage): void {
		$actualApplicableList = $this->getListOfApplicableUserOrGroupForMount($localStorage, $usersOrGroups);
		Assert::assertEquals(
			0,
			\count($actualApplicableList),
			__METHOD__
			. "Expected empty list for applicable "
			. $usersOrGroups
			. " but found: ["
			. \implode(", ", $actualApplicableList)
			. "]."
		);
	}

	/**
	 * @When the administrator removes all from the applicable users and groups for local storage mount :localStorage using the occ command
	 *
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminRemovesAllForTheMountUsingOccCommand(string $localStorage):void {
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
	 * @throws Exception
	 */
	public function theAdminHasAddedRemovedTheApplicableUserForMountUsingTheOccCommand(
		string $action,
		string $userOrGroup,
		string $user,
		string $mount
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->addRemoveUserOrGroupToOrFromMount(
			$action,
			$userOrGroup,
			$user,
			$mount
		);
		$this->theCommandShouldHaveBeenSuccessful();
		// making plural "users" or "groups"
		$userOrGroup = $userOrGroup . "s";
		$actualApplicableList = $this->getListOfApplicableUserOrGroupForMount($mount, $userOrGroup);

		if ($action === "added") {
			Assert::assertContains(
				$user,
				$actualApplicableList,
				__METHOD__
				. " The expected applicable "
				. $userOrGroup
				. " is not present in the actual list of applicable "
				. $userOrGroup
				. " for mount point: "
				. $mount . ".\n"
			);
		} else {
			Assert::assertNotContains(
				$user,
				$actualApplicableList,
				__METHOD__
				. " The applicable "
				. $userOrGroup
				. " is present in the actual list of applicable "
				. $userOrGroup
				. " for mount point: "
				. $mount . ".\n"
			);
		}
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
	public function adminConfiguresLocalStorageMountUsingTheOccCommand(string $key, string $value, string $localStorage):void {
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
	public function adminListsAvailableBackendsUsingTheOccCommand():void {
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
	public function adminListsAvailableBackendsOfTypeUsingTheOccCommand(string $type):void {
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
	public function adminListsBackendOfTypeUsingTheOccCommand(string $backend, string $backendType):void {
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
	public function adminListsConfigurationsWithExistingKeyForLocalStorageMountUsingTheOccCommand(string $key, string $localStorage):void {
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
	public function adminConfiguredLocalStorageMountUsingTheOccCommand(string $key, string $value, string $localStorage):void {
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
	public function adminListsLocalStorageMountUsingTheOccCommand():void {
		$this->listLocalStorageMount();
	}

	/**
	 * @When the administrator lists the local storage with --short using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsLocalStorageMountShortUsingTheOccCommand():void {
		$this->listLocalStorageMountShort();
	}

	/**
	 * @When the administrator lists the local storage with --mount-options using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsLocalStorageMountOptionsUsingTheOccCommand():void {
		$this->listLocalStorageMountOptions();
	}

	/**
	 * @When the administrator lists the local storage with --show-password using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminListsLocalStorageShowPasswordUsingTheOccCommand():void {
		$this->listLocalStorageShowPassword();
	}

	/**
	 * @Then the following local storage should exist
	 *
	 * @param TableNode $mountPoints
	 *
	 * @return void
	 */
	public function theFollowingLocalStoragesShouldExist(TableNode $mountPoints):void {
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
	public function theFollowingLocalStoragesShouldNotExist(TableNode $mountPoints):void {
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
	public function theFollowingBackendTypesShouldBeListed(TableNode $table):void {
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
	public function theFollowingBackendsShouldBeListed(TableNode $table):void {
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
	public function theFollowingBackendKeysOfTypeShouldBeListed(TableNode $table):void {
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
	public function theFollowingLocalStorageShouldBeListed(TableNode $table):void {
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
	public function theConfigurationOutputShouldBe(string $expectedOutput):void {
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
	public function theFollowingShouldBeIncludedInTheConfigurationOfLocalStorage(string $localStorage, TableNode $table):void {
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
	public function adminAddsOptionForLocalStorageMountUsingTheOccCommand(string $key, string $value, string $localStorage):void {
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
	public function theFollowingShouldBeIncludedInTheOptionsOfLocalStorage(string $localStorage, TableNode $table):void {
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
	public function theFollowingShouldNotBeIncludedInTheOptionsOfLocalStorage(string $localStorage, TableNode $table):void {
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
	public function administratorDeletesFolder(string $folder) {
		return $this->deleteLocalStorageFolderUsingTheOccCommand($folder);
	}

	/**
	 * @Given the administrator has deleted local storage :folder using the occ command
	 *
	 * @param string $folder
	 *
	 * @return integer
	 * @throws Exception
	 */
	public function administratorHasDeletedLocalStorageFolderUsingTheOccCommand(string $folder):int {
		$mount_id = $this->deleteLocalStorageFolderUsingTheOccCommand($folder);
		$this->theCommandShouldHaveBeenSuccessful();
		return $mount_id;
	}

	/**
	 * @param string $folder
	 *
	 * @return integer|null
	 * @throws Exception
	 */
	public function getMountIdForLocalStorage(string $folder): ?int {
		$createdLocalStorage = [];
		$mount_id = null;
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

		return (int) $mount_id;
	}

	/**
	 * @param string $folder
	 * @param bool $mustExist
	 *
	 * @return integer|bool
	 * @throws Exception
	 */
	public function deleteLocalStorageFolderUsingTheOccCommand(string $folder, bool $mustExist = true) {
		$mount_id = $this->getMountIdForLocalStorage($folder);

		if (!isset($mount_id)) {
			if ($mustExist) {
				throw  new Exception("Id not found for folder to be deleted");
			}
			return false;
		}
		$this->invokingTheCommand('files_external:delete --yes ' . $mount_id);
		return $mount_id;
	}

	/**
	 * @When the administrator exports the local storage mounts using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorExportsTheMountsUsingTheOccCommand():void {
		$this->invokingTheCommand('files_external:export');
	}

	/**
	 * @When the administrator imports the local storage mount from file :file using the occ command
	 *
	 * @param string $file
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorImportsTheMountFromFileUsingTheOccCommand(string $file):void {
		$this->invokingTheCommand(
			'files_external:import ' . TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$file"
		);
	}

	/**
	 * @Given /^the administrator has exported the (local|external) storage mounts using the occ command$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasExportedTheMountsUsingTheOccCommand():void {
		$this->invokingTheCommand('files_external:export');
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @Then the command should output configuration for local storage mount :mount
	 *
	 * @param string $mount
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theOutputShouldContainConfigurationForMount(string $mount):void {
		$actualConfig = null;

		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($commandOutput as $i) {
			if ($mount === \ltrim($i->mount_point, '/')) {
				$actualConfig = $i;
				break;
			}
		}

		Assert::assertNotNull($actualConfig, 'Configuration for local storage mount ' . $mount . ' not found.');
	}

	/**
	 * @When the administrator verifies the mount configuration for local storage :localStorage using the occ command
	 *
	 * @param string $localStorage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorVerifiesTheMountConfigurationForLocalStorageUsingTheOccCommand(string $localStorage):void {
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
	 * @param TableNode $info
	 *
	 * @return void
	 */
	public function theFollowingInformationShouldBeListed(TableNode $info):void {
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
	public function theAdministratorListTheRepairStepsUsingTheOccCommand():void {
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
	public function theBackgroundJobsModeShouldBe(string $mode):void {
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
	public function theUpdateChannelShouldBe(string $value):void {
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
	public function theLogLevelShouldBe(string $logLevel):void {
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
	public function theAdministratorAddsConfigKeyWithValueInAppUsingTheOccCommand(string $key, string $value, string $app):void {
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
	public function theAdministratorHasAddedConfigKeyWithValueInAppUsingTheOccCommand(string $key, string $value, string $app):void {
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
	public function theAdministratorDeletesConfigKeyOfAppUsingTheOccCommand(string $key, string $app):void {
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
		string $key,
		string $value,
		string $type = "string"
	):void {
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
		string $key,
		string $value,
		string $type = "string"
	):void {
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
	public function theAdministratorDeletesSystemConfigKeyUsingTheOccCommand(string $key):void {
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
	public function theAdministratorEmptiesTheTrashbinOfUserUsingTheOccCommand(string $user):void {
		$this->emptyTrashBinOfUserUsingOccCommand($user);
	}

	/**
	 * @When the administrator deletes all the versions for user :user
	 * @When the administrator tries to delete all the versions for user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesAllTheVersionsForUser(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->deleteAllVersionsForUserUsingOccCommand($user);
	}

	/**
	 * @When the administrator cleanups all the orphaned remote storages of shares using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminCleanupsOrphanedRemoteStoragesOfSharesUsingOccCommand():void {
		$this->cleanOrphanedRemoteStoragesUsingOccCommand();
	}

	/**
	 * @When the administrator deletes all the versions for the following users:
	 *
	 * @param TableNode $usersTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesAllTheVersionsForSpecificUsers(TableNode $usersTable):void {
		$this->featureContext->verifyTableNodeColumns($usersTable, ["username"]);
		$usernames = $usersTable->getHash();
		$usernamesArray = [];
		foreach ($usernames as $username) {
			array_push($usernamesArray, $username["username"]);
		}
		$users = implode(" ", $usernamesArray);
		$this->deleteAllVersionsForMultipleUsersUsingOccCommand($users);
	}

	/**
	 * @When the administrator deletes the file versions for all users
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesVersionsForAllUsers(): void {
		$this->deleteAllVersionsForAllUsersUsingOccCommand();
	}

	/**
	 * @When the administrator deletes the expired versions for user :user
	 * @When the administrator tries to delete the expired versions for user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesExpiredVersionsForUser(string $user): void {
		$user = $this->featureContext->getActualUsername($user);
		$this->deleteExpiredVersionsForUserUsingOccCommand($user);
	}

	/**
	 * @When the administrator deletes the expired versions for the following users:
	 *
	 * @param TableNode $usersTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesExpiredVersionsForSpecificUsers(TableNode $usersTable): void {
		$this->featureContext->verifyTableNodeColumns($usersTable, ["username"]);
		$usernames = $usersTable->getHash();
		$usernamesArray = [];
		foreach ($usernames as $username) {
			array_push($usernamesArray, $username["username"]);
		}
		$users = implode(" ", $usernamesArray);
		$this->deleteExpiredVersionsForMultipleUsersUsingOccCommand($users);
	}

	/**
	 * @When the administrator deletes the expired versions for all users
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesExpiredVersionsForAllUsers(): void {
		$this->deleteExpiredVersionsForAllUsersUsingOccCommand();
	}

	/**
	 * @When the administrator empties the trashbin of all users using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEmptiesTheTrashbinOfAllUsersUsingTheOccCommand():void {
		$this->emptyTrashBinOfUserUsingOccCommand('');
	}

	/**
	 * @When the administrator creates a calendar for user :user with name :calendarName using the occ command
	 *
	 * @param string $user
	 * @param string $calendarName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminCreatesACalendarForUserUsingTheOccCommand(string $user, string $calendarName):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->createCalendarForUserUsingOccCommand($user, $calendarName);
	}

	/**
	 * @When the administrator creates an address book for user :user with name :addressBookName using the occ command
	 *
	 * @param string $user
	 * @param string $addressBookName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminCreatesAnAddressBookForUserUsingTheOccCommand(string $user, string $addressBookName):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->createAnAddressBookForUserUsingOccCommand($user, $addressBookName);
	}

	/**
	 * @When the administrator gets all the jobs in the background queue using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsAllTheJobsInTheBackgroundQueueUsingTheOccCommand():void {
		$this->getAllJobsInBackgroundQueueUsingOccCommand();
	}

	/**
	 * @When the administrator deletes the last background job :job using the occ command
	 *
	 * @param string $job
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesLastBackgroundJobUsingTheOccCommand(string $job):void {
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
	public function theLastDeletedJobShouldNotBeListedInTheJobsQueue(string $job):void {
		$jobId = $this->lastDeletedJobId;
		$match = $this->getLastJobIdForJob($job);
		if ($match) {
			Assert::assertNotEquals(
				$jobId,
				$match,
				"job $job with jobId $jobId" .
				" was not expected to be listed in background queue, but was"
			);
		}
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
	public function systemConfigKeyShouldHaveValue(string $key, string $value):void {
		$config = \trim(
			SetupHelper::getSystemConfigValue(
				$key,
				$this->featureContext->getStepLineRef()
			)
		);
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
	 * @throws Exception
	 */
	public function theCommandOutputTableShouldContainTheFollowingText(TableNode $table):void {
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
	public function systemConfigKeyShouldNotExist(string $key):void {
		Assert::assertEmpty(
			SetupHelper::getSystemConfig(
				$key,
				$this->featureContext->getStepLineRef()
			)['stdOut'],
			"The system config key '$key' was not expected to exist"
		);
	}

	/**
	 * @When the administrator lists the config keys
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorListsTheConfigKeys():void {
		$this->invokingTheCommand(
			"config:list"
		);
	}

	/**
	 * @Then the command output should contain the apps configs
	 *
	 * @return void
	 */
	public function theCommandOutputShouldContainTheAppsConfigs():void {
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
	public function theCommandOutputShouldContainTheSystemConfigs():void {
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
	public function theAdministratorHasClearedTheVersionsForUser(string $user):void {
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
	public function theAdministratorHasClearedTheVersionsForAllUsers():void {
		$this->deleteAllVersionsForAllUsersUsingOccCommand();
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
	 * @return string|bool
	 * @throws Exception
	 */
	public function getLastJobIdForJob(string $job) {
		$this->getAllJobsInBackgroundQueueUsingOccCommand();
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$lines = SetupHelper::findLines(
			$commandOutput,
			$job
		);
		if (!$lines) {
			return false;
		}
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
		string $key,
		string $value,
		string $type
	):void {
		$configList = \json_decode(
			$this->featureContext->getStdOutOfOccCommand(),
			true
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
				$systemConfig[$key],
				JSON_UNESCAPED_SLASHES
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
	public function enableExternalStorageUsingOccAsAdmin():void {
		SetupHelper::runOcc(
			[
				'config:app:set',
				'core',
				'enable_external_storage',
				'--value=yes'
			],
			$this->featureContext->getStepLineRef(),
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
			$this->featureContext->getStepLineRef(),
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
	 * @throws GuzzleException
	 */
	public function theAdministratorHasAddedGroupToTheExcludeGroupFromSharingList(string $groups):void {
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
			$this->featureContext->getStepLineRef(),
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
			$this->featureContext->getStepLineRef(),
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
	public function theAdministratorHasEnabledExcludeGroupsFromSharingUsingTheWebui():void {
		SetupHelper::runOcc(
			[
				"config:app:set",
				"core",
				"shareapi_exclude_groups",
				"--value=yes"
			],
			$this->featureContext->getStepLineRef(),
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
			$this->featureContext->getStepLineRef(),
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
	public function theAdministratorHasEnabledTheWebUILockFileAction(string $enabledOrDisabled):void {
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
			$this->featureContext->getStepLineRef(),
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
			$this->featureContext->getStepLineRef(),
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
	public function createExternalMountPointUsingTheOccCommand(string $user, TableNode $settings):void {
		$userRenamed = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeRows(
			$settings,
			["host", "root", "storage_backend",
			"authentication_backend", "mount_point",
			"user", "password", "secure"]
		);
		$extMntSettings = $settings->getRowsHash();
		$extMntSettings['user'] = $this->featureContext->substituteInLineCodes(
			$extMntSettings['user'],
			$userRenamed
		);
		$password = $this->featureContext->substituteInLineCodes(
			$extMntSettings['password'],
			$user
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
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc($args)
		);
		// add to array of created storageIds
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$mountId = \preg_replace('/\D/', '', $commandOutput);
		$this->featureContext->addStorageId($extMntSettings["mount_point"], (int) $mountId);
	}

	/**
	 * @Given the administrator has created an external mount point with the following configuration about user :user using the occ command
	 *
	 * @param string $user
	 * @param TableNode $settings
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasCreatedAnExternalMountPointWithFollowingConfigUsingTheOccCommand(string $user, TableNode $settings):void {
		$this->createExternalMountPointUsingTheOccCommand($user, $settings);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	private function deleteExternalMountPointUsingTheAdmin(string $mountPoint):void {
		$mount_id = $this->administratorDeletesFolder($mountPoint);
		$this->featureContext->popStorageId($mount_id);
	}

	/**
	 * @Given the administrator has deleted external storage with mount point :mountPoint
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminHasDeletedExternalMountPoint(string $mountPoint):void {
		$this->deleteExternalMountPointUsingTheAdmin($mountPoint);
		$this->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @When the administrator deletes external storage with mount point :mountPoint
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminDeletesExternalMountPoint(string $mountPoint):void {
		$this->deleteExternalMountPointUsingTheAdmin($mountPoint);
	}

	/**
	 * @Then mount point :mountPoint should not be listed as an external storage
	 *
	 * @param string $mountPoint
	 *
	 * @return void
	 */
	public function mountPointShouldNotBeListedAsAnExternalStorage(string $mountPoint):void {
		$commandOutput = \json_decode($this->featureContext->getStdOutOfOccCommand());
		foreach ($commandOutput as $entry) {
			Assert::assertNotEquals($mountPoint, $entry->mount_point);
		}
	}

	/**
	 * @Given the administrator has changed the database type to :dbType
	 *
	 * @param string $dbType
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasChangedTheDatabaseType(string $dbType): void {
		$this->theAdministratorChangesTheDatabaseType($dbType);
		$exitStatusCode = $this->featureContext->getExitStatusCodeOfOccCommand();

		if ($exitStatusCode !== 0) {
			$exceptions = $this->featureContext->findExceptions();
			$commandErr = $this->featureContext->getStdErrOfOccCommand();
			$sameTypeError = "Can not convert from $dbType to $dbType.";
			$lines = SetupHelper::findLines(
				$commandErr,
				$sameTypeError
			);
			// pass if the same type error is found
			if (\count($lines) === 0) {
				$msg = "The command was not successful, exit code was " .
					$exitStatusCode . ".\n" .
					"stdOut was: '" .
					$this->featureContext->getStdOutOfOccCommand() . "'\n" .
					"stdErr was: '$commandErr'\n";
				if (!empty($exceptions)) {
					$msg .= ' Exceptions: ' . \implode(', ', $exceptions);
				}
				throw new Exception($msg);
			}
		}
	}

	/**
	 * @When the administrator changes the database type to :dbType
	 * @When the administrator tries to change the database type to :dbType
	 *
	 * @param string $dbType
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorChangesTheDatabaseType(string $dbType): void {
		$dbUser = "owncloud";
		$dbHost = $dbType;
		$dbName = "owncloud";
		$dbPass = "owncloud";

		if ($dbType === "postgres") {
			$dbType = "pgsql";
		}
		if ($dbType === "oracle") {
			$dbUser = "autotest";
			$dbType = "oci";
		}

		$this->invokingTheCommand("db:convert-type --password=$dbPass $dbType $dbUser $dbHost $dbName");
		$this->featureContext->setDbConversionState(true);
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
	public function removeImportedCertificates():void {
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
	public function resetDAVTechPreview():void {
		if ($this->doTechPreview) {
			if ($this->initialTechPreviewStatus === "") {
				SetupHelper::deleteSystemConfig(
					'dav.enable.tech_preview',
					$this->featureContext->getStepLineRef()
				);
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
	public function removeLocalStorageIfExists():void {
		$this->deleteLocalStorageFolderUsingTheOccCommand('local_storage', false);
		$this->deleteLocalStorageFolderUsingTheOccCommand('local_storage2', false);
		$this->deleteLocalStorageFolderUsingTheOccCommand('local_storage3', false);
		$this->deleteLocalStorageFolderUsingTheOccCommand('TestMountPoint', false);
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
	public function before(BeforeScenarioScope $scope):void {
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
		$ocVersion = SetupHelper::getSystemConfigValue(
			'version',
			$this->featureContext->getStepLineRef()
		);
		// dav.enable.tech_preview was used in some ownCloud versions before 10.4.0
		// only set it on those versions of ownCloud
		if (\version_compare($ocVersion, '10.4.0') === -1) {
			$this->doTechPreview = true;
			$techPreviewEnabled = \trim(
				SetupHelper::getSystemConfigValue(
					'dav.enable.tech_preview',
					$this->featureContext->getStepLineRef()
				)
			);
			$this->initialTechPreviewStatus = $techPreviewEnabled;
			$this->techPreviewEnabled = $techPreviewEnabled === 'true';
		}
	}

	/**
	 * @Then /^the system config should have dbtype set as "([^"]*)"$/
	 *
	 * @param string $value
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function theSystemConfigKeyShouldBeSetAs(string $value):void {
		$actual_value = SetupHelper::getSystemConfigValue(
			"dbtype",
			$this->featureContext->getStepLineRef()
		);
		$actual_value = \str_replace("\n", "", $actual_value);
		Assert::assertEquals(
			$value,
			$actual_value,
			"System config mismatched.\n
			Expected dbType to be: " . $actual_value . "\n
			Found: " . $value
		);
	}

	/**
	 * @When the administrator lists migration status of app :app
	 *
	 * @param string $app
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorListsMigrationStatusOfApp(string $app):void {
		$this->featureContext->setStdOutOfOccCommand("");
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(['migrations:status', $app])
		);
	}

	/**
	 * @Then the following migration status should have been listed
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingMigrationStatusShouldHaveBeenListed(TableNode $table): void {
		$actualOuput = $this->getMigrationStatusInfo();
		$expectedOutput = $table->getRowsHash();
		foreach ($expectedOutput as $key => $value) {
			try {
				$actualValue = $actualOuput[$key];
			} catch (Exception $e) {
				Assert:: fail("Expected '$key' but not found!\nActual Migration status: " . \print_r($actualOuput, true));
			}
			if ($this->isRegex($value)) {
				$match = preg_match($value, $actualValue);
				Assert:: assertEquals(1, $match, "Pattern '$value' is not matchable with value '$actualValue'");
			} else {
				Assert:: assertEquals($value, $actualValue, "Expected '$key' to have value '$value' but got '$actualValue'");
			}
		}
	}

	/**
	 * @Then the Executed Migrations should equal the Available Migrations
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theExecutedMigrationsShouldEqualTheAvailableMigrations(): void {
		$migrationStatus = $this->getMigrationStatusInfo();
		Assert:: assertEquals($migrationStatus["Executed Migrations"], $migrationStatus["Available Migrations"], "The 'Executed Migration' is not same as 'Available Migration'");
	}

	/**
	 * @param string $value
	 *
	 * @return int
	 */
	public function isRegex($value) {
		$regex = "/^\/[\s\S]+\/$/";
		return preg_match($regex, $value);
	}

	/**
	 * @return void
	 */
	public function getMigrationStatusInfo() {
		$commandOutput = $this->featureContext->getStdOutOfOccCommand();
		$migrationStatus = [];
		if (!empty($commandOutput)) {
			$infoArr = explode("\n", $commandOutput);
			foreach ($infoArr as $info) {
				if (!empty($info)) {
					$row = \trim(\str_replace('>>', '', $info));
					$rowCol = explode(":", $row);
					$migrationStatus[\trim($rowCol[0])] = \trim($rowCol[1]);
				}
			}
			return $migrationStatus;
		} else {
			throwException("Migration status information is empty!");
		}
	}
}
