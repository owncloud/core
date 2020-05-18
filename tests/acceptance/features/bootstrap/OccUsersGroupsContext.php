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

require_once 'bootstrap.php';

/**
 * Context for test steps that test occ commands that manage users and groups
 */
class OccUsersGroupsContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var OccContext
	 */
	private $occContext;

	/**
	 * @param TableNode $table
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * displayname & email are optional
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createUsersUsingOccCommand(TableNode $table) {
		foreach ($table as $row) {
			$username = $row['username'];
			$user = $this->featureContext->getActualUsername($username);
			$cmd = "user:add $user  --password-from-env";
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

			$this->occContext->invokingTheCommandWithEnvVariable(
				$cmd,
				'OC_PASS',
				$password
			);

			$username = $this->featureContext->getActualUsername($username);
			$this->featureContext->addUserToCreatedUsersList(
				$username,
				$password,
				$displayName,
				$email
			);
		}
	}

	/**
	 * @When /^the administrator creates (?:these users|this user) using the occ command:$/
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * displayname & email are optional
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorCreatesTheseUsersUsingTheOccCommand(TableNode $table) {
		$this->createUsersUsingOccCommand($table);
	}

	/**
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
		$this->createUsersUsingOccCommand($table);
		$this->occContext->theCommandShouldHaveBeenSuccessful();
		$createdUsersList = $this->featureContext->getCreatedUsers();
		$tableUsername = [];
		$displayName = [];
		$usernameArray = \array_keys($createdUsersList);
		foreach ($table as $row) {
			\array_push($tableUsername, $row['username']);
		}
		\in_array($tableUsername, $usernameArray, true);
	}

	/**
	 * @When the administrator tries to create a user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorTriesToCreateAUserUsingTheOccCommand($username) {
		$user = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommandWithEnvVariable(
			"user:add $user  --password-from-env",
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
	 * @throws Exception
	 */
	public function theAdministratorCreatesUserPasswordGroupUsingTheOccCommand($username, $password, $group) {
		$user = $this->featureContext->getActualUsername($username);
		$cmd = "user:add $user  --password-from-env --group=$group";
		$this->occContext->invokingTheCommandWithEnvVariable(
			$cmd,
			'OC_PASS',
			$this->featureContext->getActualPassword($password)
		);
		$this->featureContext->addUserToCreatedUsersList($user, $password);
		$this->featureContext->addGroupToCreatedGroupsList($group);
	}

	/**
	 * @When the administrator resets the password of user :username to :password using the occ command
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetUserPasswordUsingTheOccCommand($username, $password) {
		$username = $this->featureContext->getActualUsername($username);
		$this->resetUserPassword($username, $password);
	}

	/**
	 * @When the administrator resets the password of user :username to :password sending email using the occ command
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetUserPasswordAndSendEmailUsingTheOccCommand($username, $password) {
		$this->resetUserPassword($username, $password, true);
	}

	/**
	 * @When the administrator resets their own password to :newPassword using the occ command
	 *
	 * @param string $newPassword
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorResetsTheirOwnPasswordToUsingTheOccCommand($newPassword) {
		$password = $this->featureContext->getActualPassword($newPassword);
		$admin = $this->featureContext->getAdminUsername();
		$this->occContext->invokingTheCommandWithEnvVariable(
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
	 * @throws Exception
	 */
	public function theAdministratorInvokesPasswordResetForUserUsingTheOccCommand($username) {
		$this->resetUserPassword($username);
	}

	/**
	 * @When the administrator changes the email of user :username to :newEmail using the occ command
	 *
	 * @param string $username
	 * @param string $newEmail
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorChangesTheEmailOfUserToUsingTheOccCommand($username, $newEmail) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:modify $username email $newEmail"
		);
		$this->featureContext->rememberUserEmailAddress($username, $newEmail);
	}

	/**
	 * @When the administrator changes the display name of user :username to :newDisplayname using the occ command
	 *
	 * @param string $username
	 * @param string $newDisplayname
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorChangesTheDisplayNameOfUserToUsingTheOccCommand($username, $newDisplayname) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:modify $username displayname '$newDisplayname'"
		);
		$this->featureContext->rememberUserDisplayName($username, $newDisplayname);
	}

	/**
	 * @When the administrator changes the quota of user :username to :newQuota using the occ command
	 *
	 * @param string $username
	 * @param string $newQuota
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorChangesTheQuotaOfUserToUsingTheOccCommand($username, $newQuota) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:modify $username quota $newQuota"
		);
	}

	/**
	 * @When the administrator deletes user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesUserUsingTheOccCommand($username) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:delete $username"
		);
		$this->featureContext->rememberThatUserIsNotExpectedToExist($username);
	}

	/**
	 * @When the administrator retrieves all the users in JSON format using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorRetrievesAllTheUsersInJsonUsingTheOccCommand() {
		$this->occContext->invokingTheCommand(
			"user:list --output=json"
		);
	}

	/**
	 * @When the administrator gets the list of all users inactive for the last :numberOfDays days using the occ command
	 *
	 * @param integer $numberOfDays
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsTheListOfAllUsersInactiveForTheLastDays($numberOfDays) {
		$this->occContext->invokingTheCommand(
			"user:inactive $numberOfDays --output=json"
		);
	}

	/**
	 * @When the administrator retrieves the information of user :username in JSON format using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorRetrievesTheInformationOfUserInJsonUsingTheOccCommand($username) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:list $username --output=json"
		);
	}

	/**
	 * @When the administrator gets the groups of user :username in JSON format using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsTheGroupsOfUserInJsonUsingTheOccCommand($username) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:list-group $username --output=json"
		);
	}

	/**
	 * @When the administrator retrieves the time when user :username was last seen using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorRetrievesTheTimeWhenUserWasLastSeenUsingTheOccCommand($username) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
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
	 * @throws Exception
	 */
	public function theAdministratorChangesTheLanguageOfUserToUsingTheOccCommand(
		$username, $language
	) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:setting $username core lang --value='$language'"
		);
	}

	/**
	 * @When the administrator retrieves the user report using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorRetrievesTheUserReportUsingTheOccCommand() {
		$this->occContext->invokingTheCommand("user:report");
	}

	/**
	 * @When the administrator creates group :group using the occ command
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCreatesGroupUsingTheOccCommand($group) {
		$this->occContext->invokingTheCommand(
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
	 * @throws Exception
	 */
	public function theAdministratorAddsUserToGroupUsingTheOccCommand($username, $group) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"group:add-member -m $username $group"
		);
	}

	/**
	 * @When the administrator deletes group :group using the occ command
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesGroupUsingTheOccCommand($group) {
		$this->occContext->invokingTheCommand(
			"group:delete $group"
		);
		$this->featureContext->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * @When the administrator gets the users in group :groupName in JSON format using the occ command
	 *
	 * @param string $groupName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsTheUsersInGroupInJsonUsingTheOccCommand($groupName) {
		$this->occContext->invokingTheCommand(
			"group:list-members $groupName --output=json"
		);
	}

	/**
	 * @When the administrator gets the groups in JSON format using the occ command
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsTheGroupsInJsonUsingTheOccCommand() {
		$this->occContext->invokingTheCommand(
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
	 * @throws Exception
	 */
	public function theAdministratorRemovesUserFromGroupUsingTheOccCommand($username, $group) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"group:remove-member -m $username $group"
		);
	}

	/**
	 * @When the administrator disables user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDisablesUserUsingTheOccCommand($username) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:disable $username"
		);
	}

	/**
	 * @When administrator enables user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function administratorEnablesUserUsingTheOccCommand($username) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
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
	 * @throws Exception
	 */
	public function theLanguageOfUserReturnedByTheOccCommandShouldBe($username, $language) {
		$username = $this->featureContext->getActualUsername($username);
		$this->occContext->invokingTheCommand(
			"user:setting $username core lang"
		);
		$responseLanguage = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertEquals(
			$language,
			\trim($responseLanguage),
			__METHOD__
			. " Expected: the language of user '$username' to be '$language', but got '$responseLanguage'"
		);
	}

	/**
	 * @Then the users returned by the occ command should be
	 *
	 * @param TableNode $useridTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUsersReturnedByTheOccCommandShouldBe(TableNode $useridTable) {
		$this->featureContext->verifyTableNodeColumns($useridTable, ['uid', 'display name']);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputUsers = \json_decode($lastOutput, true);
		$result = [];
		// check if an array is a multi-dimensional array with inner array key 'displayName'
		if (\array_column($lastOutputUsers, 'displayName')) {
			foreach ($lastOutputUsers as $key => $value) {
				$result[$key] = $value['displayName'];
			}
		} else {
			$result = $lastOutputUsers;
		}
		foreach ($useridTable as $row) {
			$row['display name'] = $this->featureContext->getDisplayNameForUser($row['uid']);
			var_dump($row['display name']);
			$row['uid'] = $this->featureContext->getActualUsername($row['uid']);
			var_dump($row['uid']);
			Assert::assertArrayHasKey(
				$row['uid'],
				$result,
				__METHOD__
				. " Failed asserting that key '${row['uid']}' exists"
			);
			Assert::assertContains(
				$row['display name'],
				$result,
				__METHOD__
				. " Failed asserting that ${row['display name']} exists"
			);
		}
	}

	/**
	 * @Then the inactive users returned by the occ command should be
	 *
	 * @param TableNode $userTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theInactiveUsersReturnedByTheOccCommandShouldBe(TableNode $userTable) {
		$this->featureContext->verifyTableNodeColumns($userTable, ['uid', 'display name', 'inactive days']);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputUsers = \json_decode($lastOutput, true);

		Assert::assertEquals(
			\count($userTable->getColumnsHash()),
			\count($lastOutputUsers),
			"The expected number of users is '"
			. \count($userTable->getColumnsHash())
			. "' but got '"
			. \count($lastOutputUsers)
			. "'"
		);

		$found = false;
		foreach ($userTable as $row) {
			$row['display name'] = $this->featureContext->getDisplayNameForUser($row['uid']);
			$row['uid'] = $this->featureContext->getActualUsername($row['uid']);
			foreach ($lastOutputUsers as $user) {
				if ($user['uid'] === $row['uid']) {
					$found = true;
					Assert::assertEquals(
						$user['displayName'],
						$row['display name'],
						"expected {$row['display name']} but got {$user['displayName']}"
					);
					Assert::assertEquals(
						$user['inactiveSinceDays'],
						$row['inactive days'],
						"expected {$row['inactive days']} days but got {$user['inactiveSinceDays']} days"
					);
				}
			}
			Assert::assertTrue(
				$found,
				__METHOD__
			);
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
		$this->featureContext->verifyTableNodeColumns($groupTableNode, ['group']);
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputGroups = \json_decode($lastOutput, true);

		foreach ($groupTableNode as $row) {
			Assert::assertContains(
				$row['group'],
				$lastOutputGroups,
				__METHOD__
				. " Failed asserting that '${row['group']}' exists in '"
				. \implode(', ', $lastOutputGroups)
				. "'"
			);
			$lastOutputGroups = \array_diff($lastOutputGroups, [$row['group']]);
		}
		Assert::assertEmpty(
			$lastOutputGroups,
			"more than the expected groups are returned\n" .
			\print_r($lastOutputGroups, true)
		);
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
		Assert::assertEquals(
			$displayName,
			$lastOutputDisplayName,
			__METHOD__
			. " Expected displayname to be '$displayName' but got '$lastOutputDisplayName'"
		);
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
		Assert::assertLessThanOrEqual(
			60,
			$delta,
			__METHOD__
			. " User was expected to be seen recently but wasn't"
		);
	}

	/**
	 * @Then the command output of user last seen should be never
	 *
	 * @return void
	 */
	public function theCommandOutputOfUserLastSeenShouldBeNever() {
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		Assert::assertStringContainsString(
			"has never logged in.",
			$lastOutput,
			__METHOD__
			. " '$lastOutput' does not contain 'has never logged in.'"
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
		Assert::assertEquals(
			$noOfUsers,
			$actualUsers[1],
			__METHOD__
			. " Expected number of users to be '$noOfUsers' but got '${actualUsers[1]}'"
		);
	}

	/**
	 * Reset user password
	 *
	 * If password is not supplied, then always send email.
	 * If password is supplied, then only send email if sendEmail param is true
	 *
	 * @param string $username
	 * @param string $password
	 * @param bool $sendEmail
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetUserPassword(
		$username, $password = null, $sendEmail = false
	) {
		$actualUsername = $this->featureContext->getActualUsername($username);
		if ($password === null) {
			$this->featureContext->runOcc(
				["user:resetpassword $actualUsername --send-email"]
			);
		} else {
			$password = $this->featureContext->getActualPassword($password);
			if ($sendEmail) {
				$sendEmailParam = "--send-email";
			} else {
				$sendEmailParam = "";
			}
			$this->featureContext->runOccWithEnvVariables(
				["user:resetpassword $actualUsername $sendEmailParam --password-from-env"],
				['OC_PASS' => $password]
			);
			if ($username === "%admin%") {
				$this->featureContext->rememberNewAdminPassword($password);
			}
		}
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
		$this->occContext = $environment->getContext('OccContext');
	}
}
