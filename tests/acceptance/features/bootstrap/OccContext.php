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
use PHPUnit\Framework\Assert;

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

			$this->featureContext->invokingTheCommandWithEnvVariable(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommandWithEnvVariable(
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
		$this->featureContext->invokingTheCommandWithEnvVariable(
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
		$this->featureContext->invokingTheCommandWithEnvVariable(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
			"user:delete $username"
		);
	}

	/**
	 * @When the administrator retrieves all the users in JSON format using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorRetrievesAllTheUsersInJsonUsingTheOccCommand() {
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
			"user:setting $username core lang --value='$language'"
		);
	}

	/**
	 * @When the administrator retrieves the user report using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorRetrievesTheUserReportUsingTheOccCommand() {
		$this->featureContext->invokingTheCommand("user:report");
	}

	/**
	 * @When the administrator creates group :group using the occ command
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorCreatesGroupUsingTheOccCommand($group) {
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
			"group:list-members $groupName --output=json"
		);
	}

	/**
	 * @When the administrator gets the groups in JSON format using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheGroupsInJsonUsingTheOccCommand() {
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
			"config:list $appName"
		);
	}

	/**
	 * @When the administrator gets the list of apps using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheListOfAppsUsingTheOccCommand() {
		$this->featureContext->invokingTheCommand(
			"config:list"
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
			"user:setting $username core lang"
		);
		$responseLanguage = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertEquals($language, \trim($responseLanguage));
	}

	/**
	 * @When the administrator sets the log level to :level using the occ command
	 *
	 * @param string $level
	 *
	 * @return void
	 */
	public function theAdministratorSetsLogLevelUsingTheOccCommand($level) {
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
			"log:manage --backend $backend"
		);
	}

	/**
	 * @When the administrator enables the ownCloud backend using the occ command
	 *
	 * @return void
	 */
	public function theAdministratorEnablesOwnCloudBackendUsingTheOccCommand() {
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand("background:$mode");
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
		Assert::assertEquals($appName, \key($lastOutputArray['apps']));
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
		Assert::assertEquals($appStatus, $actualAppEnabledStatus);
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
			Assert::assertContains($app, $lastOutputApps);
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
			Assert::assertArrayHasKey($row['uid'], $result);
			Assert::assertContains($row['display name'], $result);
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
			Assert::assertContains($row['group'], $lastOutputGroups);
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
		Assert::assertEquals($displayName, $lastOutputDisplayName);
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
		Assert::assertContains(
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
		Assert::assertEquals($noOfUsers, $actualUsers[1]);
	}

	/**
	 * @Then the background jobs mode should be :mode
	 *
	 * @param string $mode
	 *
	 * @return void
	 */
	public function theBackgroundJobsModeShouldBe($mode) {
		$this->featureContext->invokingTheCommand(
			"config:app:get core backgroundjobs_mode"
		);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertEquals($mode, \trim($lastOutput));
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
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
		$this->featureContext->invokingTheCommand(
			"config:system:delete ${key}"
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
		Assert::assertSame($value, $config);
	}

	/**
	 * @Then system config key :key should not exist
	 *
	 * @param string $key
	 *
	 * @return void
	 */
	public function systemConfigKeyShouldNotExist($key) {
		Assert::assertEmpty($this->featureContext->getSystemConfig($key)['stdOut']);
	}

	/**
	 * @When the administrator lists the config keys
	 *
	 * @return void
	 */
	public function theAdministratorListsTheConfigKeys() {
		$this->featureContext->invokingTheCommand(
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
