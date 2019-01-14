<?php
/**
 * ownCloud
 *
 * @author Phil Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
			$msg = "The command was not successful, exit code was $exitStatusCode.";
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
	 * @When /^the administrator creates (?:these users|this user) using the occ command:$/
	 * @Given /^(?:these users have|this user has) been created using the occ command:$/
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * displayname & email are optional
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theseUsersHaveBeenCreatedUsingTheOccCommand(TableNode $table) {
		foreach ($table as $row) {
			$username = $row['username'];
			$cmd = "user:add $username  --password-from-env";

			if (isset($row['displayname'])) {
				$displayName = $row['displayname'];
			} else {
				$displayName = $this->featureContext->getDisplayNameForUser($username);
			}

			if ($displayName !== null) {
				$cmd = "$cmd --display-name='$displayName'";
			}

			if (isset($row['email'])) {
				$email = $row['email'];
			} else {
				$email = $this->featureContext->getEmailAddressForUser($username);
			}

			if ($email !== null) {
				$cmd = "$cmd --email='$email'";
			}

			if (isset($row['password'])) {
				$password = $row['password'];
			} else {
				$password = $this->featureContext->getPasswordForUser($row ['username']);
			}

			$this->invokingTheCommandWithEnvVariable(
				$cmd,
				'OC_PASS',
				$password
			);

			$this->featureContext->addUserToCreatedUsersList(
				$username,
				$password,
				$displayName,
				$email
			);
		}
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
	 * @When the administrator tries to create a user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorTriesToCreateAUserUsingTheOccCommand($username) {
		$this->invokingTheCommandWithEnvVariable(
			"user:add $username  --password-from-env",
			'OC_PASS',
			$this->featureContext->getPasswordForUser($username)
		);
	}

	/**
	 * @When the administrator creates user :username password :password group :group using the occ command
	 *
	 * @param string $username
	 * @param string $password
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorCreatesUserPasswordGroupUsingTheOccCommand($username, $password, $group) {
		$cmd = "user:add $username  --password-from-env --group=$group";
		$this->invokingTheCommandWithEnvVariable(
			$cmd,
			'OC_PASS',
			$this->featureContext->getActualPassword($password)
		);
		$this->featureContext->addUserToCreatedUsersList($username, $password);
	}

	/**
	 * @When the administrator resets the password of user :username to :password using the occ command
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 */
	public function resetUserPasswordUsingTheOccCommand($username, $password) {
		$this->featureContext->resetUserPassword($username, $password);
	}

	/**
	 * @When the administrator resets their own password to :newPassword using the occ command
	 *
	 * @param string $newPassword
	 *
	 * @return void
	 */
	public function theAdministratorResetsTheirOwnPasswordToUsingTheOccCommand($newPassword) {
		$password = $this->featureContext->getActualPassword($newPassword);
		$admin = $this->featureContext->getAdminUsername();
		$this->invokingTheCommandWithEnvVariable(
			"user:resetpassword $admin --password-from-env",
			'OC_PASS',
			$password
		);
		$this->featureContext->rememberNewAdminPassword($password);
	}

	/**
	 * @When the administrator invokes password reset for user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorInvokesPasswordResetForUserUsingTheOccCommand($username) {
		$this->featureContext->resetUserPassword($username);
	}

	/**
	 * @When the administrator changes the email of user :username to :newEmail using the occ command
	 *
	 * @param string $username
	 * @param string $newEmail
	 *
	 * @return void
	 */
	public function theAdministratorChangesTheEmailOfUserToUsingTheOccCommand($username, $newEmail) {
		$this->invokingTheCommand(
			"user:modify $username email $newEmail"
		);
	}

	/**
	 * @When the administrator changes the display name of user :username to :newDisplayname using the occ command
	 *
	 * @param string $username
	 * @param string $newDisplayname
	 *
	 * @return void
	 */
	public function theAdministratorChangesTheDisplayNameOfUserToUsingTheOccCommand($username, $newDisplayname) {
		$this->invokingTheCommand(
			"user:modify $username displayname '$newDisplayname'"
		);
	}

	/**
	 * @When the administrator changes the quota of user :username to :newQuota using the occ command
	 *
	 * @param string $username
	 * @param string $newQuota
	 *
	 * @return void
	 */
	public function theAdministratorChangesTheQuotaOfUserToUsingTheOccCommand($username, $newQuota) {
		$this->invokingTheCommand(
			"user:modify $username quota $newQuota"
		);
	}

	/**
	 * @When the administrator deletes user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorDeletesUserUsingTheOccCommand($username) {
		$this->invokingTheCommand(
			"user:delete $username"
		);
	}

	/**
	 * @When the administrator retrieves all the users in JSON format using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorRetrievesAllTheUsersInJsonUsingTheOccCommand() {
		$this->invokingTheCommand(
			"user:list --output=json"
		);
	}

	/**
	 * @When the administrator retrieves the information of user :username in JSON format using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorRetrievesTheInformationOfUserInJsonUsingTheOccCommand($username) {
		$this->invokingTheCommand(
			"user:list $username --output=json"
		);
	}

	/**
	 * @When the administrator gets the groups of user :username in JSON format using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheGroupsOfUserInJsonUsingTheOccCommand($username) {
		$this->invokingTheCommand(
			"user:list-group $username --output=json"
		);
	}

	/**
	 * @When the administrator retrieves the time when user :username was last seen using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorRetrievesTheTimeWhenUserWasLastSeenUsingTheOccCommand($username) {
		$this->invokingTheCommand(
			"user:lastseen $username"
		);
	}

	/**
	 * @When the administrator changes the language of user :username to :language using the occ command
	 *
	 * @param string $username
	 * @param string $language
	 *
	 * @return void
	 */
	public function theAdministratorChangesTheLanguageOfUserToUsingTheOccCommand(
		$username, $language
	) {
		$this->invokingTheCommand(
			"user:setting $username core lang --value='$language'"
		);
	}

	/**
	 * @When the administrator retrieves the user report using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorRetrievesTheUserReportUsingTheOccCommand() {
		$this->invokingTheCommand("user:report");
	}

	/**
	 * @When the administrator creates group :group using the occ command
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorCreatesGroupUsingTheOccCommand($group) {
		$this->invokingTheCommand(
			"group:add $group"
		);
		$this->featureContext->addGroupToCreatedGroupsList($group);
	}

	/**
	 * @When the administrator adds user :username to group :group using the occ command
	 *
	 * @param string $username
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorAddsUserToGroupUsingTheOccCommand($username, $group) {
		$this->invokingTheCommand(
			"group:add-member -m $username $group"
		);
	}

	/**
	 * @When the administrator deletes group :group using the occ command
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorDeletesGroupUsingTheOccCommand($group) {
		$this->invokingTheCommand(
			"group:delete $group"
		);
	}

	/**
	 * @When the administrator gets the users in group :groupName in JSON format using the occ command
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheUsersInGroupInJsonUsingTheOccCommand($groupName) {
		$this->invokingTheCommand(
			"group:list-members $groupName --output=json"
		);
	}

	/**
	 * @When the administrator gets the groups in JSON format using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheGroupsInJsonUsingTheOccCommand() {
		$this->invokingTheCommand(
			"group:list --output=json"
		);
	}

	/**
	 * @When the administrator removes user :username from group :group using the occ command
	 *
	 * @param string $username
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorRemovesUserFromGroupUsingTheOccCommand($username, $group) {
		$this->invokingTheCommand(
			"group:remove-member -m $username $group"
		);
	}

	/**
	 * @When the administrator disables app :appName using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function theAdministratorDisablesAppUsingTheOccCommand($appName) {
		$this->invokingTheCommand(
			"app:disable $appName"
		);
	}

	/**
	 * @When the administrator enables app :appName using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function theAdministratorEnablesAppUsingTheOccCommand($appName) {
		$this->invokingTheCommand(
			"app:enable $appName"
		);
	}

	/**
	 * @When the administrator gets the app info of app :appName
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function administratorGetsTheAppInfoOfApp($appName) {
		$this->invokingTheCommand(
			"config:list $appName"
		);
	}

	/**
	 * @When the administrator gets the list of apps using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheListOfAppsUsingTheOccCommand() {
		$this->invokingTheCommand(
			"config:list"
		);
	}

	/**
	 * @When the administrator checks the location of the :appName app using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function theAdministratorChecksTheLocationOfTheAppUsingTheOccCommand($appName) {
		$this->invokingTheCommand(
			"app:getpath $appName"
		);
	}

	/**
	 * @When the administrator disables user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorDisablesUserUsingTheOccCommand($username) {
		$this->invokingTheCommand(
			"user:disable $username"
		);
	}

	/**
	 * @When administrator enables user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function administratorEnablesUserUsingTheOccCommand($username) {
		$this->invokingTheCommand(
			"user:enable $username"
		);
	}

	/**
	 * @Then the language of user :username returned by the occ command should be :language
	 *
	 * @param string $username
	 * @param string $language
	 *
	 * @return void
	 */
	public function theLanguageOfUserReturnedByTheOccCommandShouldBe($username, $language) {
		$this->invokingTheCommand(
			"user:setting $username core lang"
		);
		$responseLanguage = $this->featureContext->getStdOutOfOccCommand();
		PHPUnit_Framework_Assert::assertEquals($language, \trim($responseLanguage));
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
			"files:scan --group=$group"
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
	 * @Then the app name returned by the occ command should be :appName
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function theAppNameReturnedByTheOccCommandShouldBe($appName) {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputArray = \json_decode($lastOutput, true);
		PHPUnit_Framework_Assert::assertEquals($appName, \key($lastOutputArray['apps']));
	}

	/**
	 * @Then the path returned by the occ command should be inside one of the apps paths in the config for the :appName app
	 *
	 * @param string $appName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function thePathReturnedByTheOccCommandShouldBeInsideOneOfTheAppsPathInTheConfig($appName) {
		$appPath = $this->featureContext->getStdOutOfOccCommand();

		$this->invokingTheCommand("config:list");
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$configOutputArray = \json_decode($lastOutput, true);

		// Default apps location is '${INSTALLED_LOCATION}/apps/${appName}
		if (\substr_compare($appPath, '/apps/${appName}', 0)) {
			return;
		}

		// We can also set it in the `apps_paths` in the `config`
		if (isset($configOutputArray['system']['apps_paths'])) {
			$appPaths = $configOutputArray['system']['apps_paths'];

			foreach ($appPaths as $path) {
				if (\substr_compare($appPath, $path['path'], 0)) {
					return;
				}
			}
		}

		// if it's neither in the default location, nor in `apps_paths`, where it could be?
		throw new Exception(__METHOD__ . "App path $appPath was not found in the config.");
	}

	/**
	 * @Then the app enabled status of app :appName should be :appStatus
	 *
	 * @param string $appName
	 * @param string $appStatus
	 *
	 * @return void
	 */
	public function theAppEnabledStatusShouldBe($appName, $appStatus) {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputArray = \json_decode($lastOutput, true);
		$actualAppEnabledStatus = $lastOutputArray['apps'][$appName]['enabled'];
		PHPUnit_Framework_Assert::assertEquals($appStatus, $actualAppEnabledStatus);
	}

	/**
	 * @Then the apps returned by the occ command should include
	 *
	 * @param TableNode $appListTable table with apps name with no header
	 *
	 * @return void
	 */
	public function theAppsReturnedByTheOccCommandShouldInclude(TableNode $appListTable) {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputApps = \array_keys(\json_decode($lastOutput, true)['apps']);

		$apps = $appListTable->getRows();
		$appsSimplified = $this->featureContext->simplifyArray($apps);

		foreach ($appsSimplified as $app) {
			PHPUnit_Framework_Assert::assertContains($app, $lastOutputApps);
		}
	}

	/**
	 * @Then the users returned by the occ command should be
	 *
	 * @param TableNode $useridTable
	 *
	 * @return void
	 */
	public function theUsersReturnedByTheOccCommandShouldBe(TableNode $useridTable) {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputUsers = \json_decode($lastOutput, true);
		$result = [];
		// check if an array is a multi-dimensional array with inner array key 'displayName'
		if (\array_column($lastOutputUsers, 'displayName')) {
			foreach ($lastOutputUsers as $key => $value) {
				$result[$key] =  $value['displayName'];
			}
		} else {
			$result = $lastOutputUsers;
		}
		foreach ($useridTable as $row) {
			PHPUnit_Framework_Assert::assertArrayHasKey($row['uid'], $result);
			PHPUnit_Framework_Assert::assertContains($row['display name'], $result);
		}
	}

	/**
	 * @Then the groups returned by the occ command should be
	 *
	 * @param TableNode $groupTableNode with group name with header group
	 *
	 * @return void
	 */
	public function theGroupsReturnedByTheOccCommandShouldBe(TableNode $groupTableNode) {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputGroups = \json_decode($lastOutput, true);

		foreach ($groupTableNode as $row) {
			PHPUnit_Framework_Assert::assertContains($row['group'], $lastOutputGroups);
		}
	}

	/**
	 * @Then the display name returned by the occ command should be :displayName
	 *
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function theDisplayNameReturnedByTheOccCommandShouldBe($displayName) {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputUser = \json_decode($lastOutput, true);
		$lastOutputDisplayName = \array_column($lastOutputUser, 'displayName')[0];
		PHPUnit_Framework_Assert::assertEquals($displayName, $lastOutputDisplayName);
	}

	/**
	 * @Then the command output of user last seen should be recently
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCommandOutputOfUserLastSeenShouldBeRecently() {
		$currentTime = \gmdate('d.m.Y H:i');
		$currentTimeStamp = \strtotime($currentTime);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		\preg_match("/([\d.]+ [\d:]+)/", $lastOutput, $userCreatedTime);
		$useCreatedTimeStamp = \strtotime(($userCreatedTime[0]));
		$delta = $currentTimeStamp - $useCreatedTimeStamp;
		if ($delta > 60) {
			throw new Exception(__METHOD__ . "User was expected to be seen recently but wasn't");
		}
	}

	/**
	 * @Then the command output of user last seen should be never
	 *
	 * @return void
	 */
	public function theCommandOutputOfUserLastSeenShouldBeNever() {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		PHPUnit_Framework_Assert::assertContains(
			"has never logged in.",
			$lastOutput
		);
	}

	/**
	 * @Then the total users returned by the command should be :noOfUsers
	 *
	 * @param integer $noOfUsers
	 *
	 * @return void
	 */
	public function theTotalUsersReturnedByTheCommandShouldBe($noOfUsers) {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		\preg_match("/\|\s+total users\s+\|\s+(\d+)\s+\|/", $lastOutput, $actualUsers);
		PHPUnit_Framework_Assert::assertEquals($noOfUsers, $actualUsers[1]);
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
