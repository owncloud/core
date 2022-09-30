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
	 * @param bool $checkOccCommandStatus
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createUsersUsingOccCommand(
		TableNode $table,
		bool $checkOccCommandStatus = false
	):void {
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

			$this->featureContext->setOccLastCode(
				$this->occContext->invokingTheCommandWithEnvVariable(
					$cmd,
					'OC_PASS',
					$password
				)
			);

			if ($checkOccCommandStatus) {
				$this->occContext->theCommandShouldHaveBeenSuccessful();
			}

			$username = $this->featureContext->getActualUsername($username);
			$this->featureContext->addUserToCreatedUsersList(
				$username,
				$password,
				$displayName,
				$email,
				null,
				$this->occContext->theOccCommandExitStatusWasSuccess()
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
	 * @throws Exception
	 */
	public function theAdministratorCreatesTheseUsersUsingTheOccCommand(TableNode $table):void {
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
	 * @throws Exception
	 */
	public function theseUsersHaveBeenCreatedUsingTheOccCommand(TableNode $table):void {
		$this->createUsersUsingOccCommand($table, true);

		foreach ($table as $row) {
			$this->featureContext->userShouldExist($row['username']);
		}
	}

	/**
	 * @When the administrator tries to create a user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorTriesToCreateAUserUsingTheOccCommand(string $username):void {
		$user = $this->featureContext->getActualUsername($username);
		$this->featureContext->setOccLastCode(
			$this->occContext->invokingTheCommandWithEnvVariable(
				"user:add $user  --password-from-env",
				'OC_PASS',
				$this->featureContext->getPasswordForUser($username)
			)
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
	public function theAdministratorCreatesUserPasswordGroupUsingTheOccCommand(string $username, string $password, string $group):void {
		$user = $this->featureContext->getActualUsername($username);
		$cmd = "user:add $user  --password-from-env --group=$group";
		$actualPassword = $this->featureContext->getActualPassword($password);
		$this->featureContext->setOccLastCode(
			$this->occContext->invokingTheCommandWithEnvVariable(
				$cmd,
				'OC_PASS',
				$actualPassword
			)
		);
		$this->featureContext->addUserToCreatedUsersList(
			$user,
			$actualPassword,
			null,
			null,
			null,
			$this->occContext->theOccCommandExitStatusWasSuccess()
		);
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
	public function resetUserPasswordUsingTheOccCommand(string $username, string $password):void {
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
	public function resetUserPasswordAndSendEmailUsingTheOccCommand(string $username, string $password):void {
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
	public function theAdministratorResetsTheirOwnPasswordToUsingTheOccCommand(string $newPassword):void {
		$password = $this->featureContext->getActualPassword($newPassword);
		$admin = $this->featureContext->getAdminUsername();
		$this->featureContext->setOccLastCode(
			$this->occContext->invokingTheCommandWithEnvVariable(
				"user:resetpassword $admin --password-from-env",
				'OC_PASS',
				$password
			)
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
	public function theAdministratorInvokesPasswordResetForUserUsingTheOccCommand(string $username):void {
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
	public function theAdministratorChangesTheEmailOfUserToUsingTheOccCommand(string $username, string $newEmail):void {
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
	public function theAdministratorChangesTheDisplayNameOfUserToUsingTheOccCommand(string $username, string $newDisplayname):void {
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
	public function theAdministratorChangesTheQuotaOfUserToUsingTheOccCommand(string $username, string $newQuota):void {
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
	public function theAdministratorDeletesUserUsingTheOccCommand(string $username):void {
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
	public function theAdministratorRetrievesAllTheUsersInJsonUsingTheOccCommand():void {
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
	public function theAdministratorGetsTheListOfAllUsersInactiveForTheLastDays(int $numberOfDays):void {
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
	public function theAdministratorRetrievesTheInformationOfUserInJsonUsingTheOccCommand(string $username):void {
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
	public function theAdministratorGetsTheGroupsOfUserInJsonUsingTheOccCommand(string $username):void {
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
	public function theAdministratorRetrievesTheTimeWhenUserWasLastSeenUsingTheOccCommand(string $username):void {
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
		string $username,
		string $language
	):void {
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
	public function theAdministratorRetrievesTheUserReportUsingTheOccCommand():void {
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
	public function theAdministratorCreatesGroupUsingTheOccCommand(string $group):void {
		if (($group === '') || (\trim($group) !== $group)) {
			// The group name is empty or has white space at the start or end.
			// Quote the group name so that the white space is really sent to the
			// occ command as part of the requested group name.
			$group = "'$group'";
		}
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
	public function theAdministratorAddsUserToGroupUsingTheOccCommand(string $username, string $group):void {
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
	public function theAdministratorDeletesGroupUsingTheOccCommand(string $group):void {
		$this->occContext->invokingTheCommand(
			"group:delete $group"
		);
		$this->featureContext->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * @Then the administrator deletes the following groups using the occ command
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorDeletesTheFollowingGroupsUsingTheOccCommand(TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ["groupname"]);
		$groups = $table->getHash();
		foreach ($groups as $group) {
			$this->theAdministratorDeletesGroupUsingTheOccCommand($group["groupname"]);
		}
	}

	/**
	 * @When the administrator gets the users in group :groupName in JSON format using the occ command
	 *
	 * @param string $groupName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsTheUsersInGroupInJsonUsingTheOccCommand(string $groupName):void {
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
	public function theAdministratorGetsTheGroupsInJsonUsingTheOccCommand():void {
		$this->occContext->invokingTheCommand(
			"group:list --output=json"
		);
	}

	/**
	 * @When the administrator gets the groups containing :substring in the group name in JSON format using the occ command
	 *
	 * @param string $subString
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsTheGroupsContainingInJsonUsingTheOccCommand(string $subString):void {
		$this->occContext->invokingTheCommand(
			"group:list $subString --output=json"
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
	public function theAdministratorRemovesUserFromGroupUsingTheOccCommand(string $username, string $group):void {
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
	public function theAdministratorDisablesUserUsingTheOccCommand(string $username):void {
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
	public function administratorEnablesUserUsingTheOccCommand(string $username):void {
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
	public function theLanguageOfUserReturnedByTheOccCommandShouldBe(string $username, string $language):void {
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
	public function theUsersReturnedByTheOccCommandShouldBe(TableNode $useridTable):void {
		$this->featureContext->verifyTableNodeColumns($useridTable, ['uid']);
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
			$row['uid'] = $this->featureContext->getActualUsername($row['uid']);
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
	public function theInactiveUsersReturnedByTheOccCommandShouldBe(TableNode $userTable):void {
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
	 * @throws Exception
	 */
	public function theGroupsReturnedByTheOccCommandShouldBe(TableNode $groupTableNode):void {
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
	 * @Then /^the (first|second|third) display name returned by the occ command should be "([^"]*)"$/
	 *
	 * @param string $place
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function theDisplayNameReturnedByTheOccCommandShouldBe(string $place, string $displayName):void {
		switch ($place) {
			case "first":
				$index = 0;
				break;
			case "second":
				$index = 1;
				break;
			case "third":
				$index = 2;
				break;
		}
		$lastOutput = $this->featureContext->getStdOutOfOccCommand();
		$lastOutputUser = \json_decode($lastOutput, true);
		$lastOutputDisplayName = \array_column($lastOutputUser, 'displayName')[$index];
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
	 * @throws Exception
	 */
	public function theCommandOutputOfUserLastSeenShouldBeRecently():void {
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
	public function theCommandOutputOfUserLastSeenShouldBeNever():void {
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
	public function theTotalUsersReturnedByTheCommandShouldBe(int $noOfUsers):void {
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
	 * @param string|null $password
	 * @param bool $sendEmail
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetUserPassword(
		string $username,
		?string $password = null,
		bool $sendEmail = false
	):void {
		$actualUsername = $this->featureContext->getActualUsername($username);
		if ($password === null) {
			$this->featureContext->setOccLastCode(
				$this->featureContext->runOcc(
					["user:resetpassword $actualUsername --send-email"]
				)
			);
		} else {
			$password = $this->featureContext->getActualPassword($password);
			if ($sendEmail) {
				$sendEmailParam = "--send-email";
			} else {
				$sendEmailParam = "";
			}
			$this->featureContext->setOccLastCode(
				$this->featureContext->runOccWithEnvVariables(
					["user:resetpassword $actualUsername $sendEmailParam --password-from-env"],
					['OC_PASS' => $password]
				)
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
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->occContext = $environment->getContext('OccContext');
	}
}
