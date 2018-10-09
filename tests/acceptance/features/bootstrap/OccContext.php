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
	 * @When the administrator sends a user creation request for user :username password :password group :group using the occ command
	 *
	 * @param string $username
	 * @param string $password
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorSendsAUserCreationRequestForUserPasswordGroupUsingTheOccCommand($username, $password, $group) {
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
	 * @throws Exception
	 */
	public function resetUserPasswordUsingTheOccCommand($username, $password) {
		$this->featureContext->invokingTheCommandWithEnvVariable(
			"user:resetpassword $username  --password-from-env",
			'OC_PASS',
			$password
		);
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
	 * @When the administrator sends a user deletion request for user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorSendsAUserDeletionRequestForUserUsingTheOccCommand($username) {
		$this->featureContext->invokingTheCommand(
			"user:delete $username"
		);
	}

	/**
	 * @When the administrator sends a group creation request for group :group using the occ command
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorSendsAGroupCreationRequestForGroupUsingTheOccCommand($group) {
		$this->featureContext->invokingTheCommand(
			"group:add $group"
		);
		$this->featureContext->addGroupToCreatedGroupsList($group);
	}

	/**
	 * @When the administrator adds the user :username to the group :group using the occ command
	 *
	 * @param string $username
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorAddsTheUserToTheGroupUsingTheOccCommand($username, $group) {
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
	 * @When the administrator disables the app :appName using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function theAdministratorDisablesTheAppUsingTheOccCommand($appName) {
		$this->featureContext->invokingTheCommand(
			"app:disable $appName"
		);
	}

	/**
	 * @When the administrator enables the app :appName using the occ command
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function theAdministratorEnablesTheAppUsingTheOccCommand($appName) {
		$this->featureContext->invokingTheCommand(
			"app:enable $appName"
		);
	}

	/**
	 * @When the administrator disables the user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorDisablesTheUserUsingTheOccCommand($username) {
		$this->featureContext->invokingTheCommand(
			"user:disable $username"
		);
	}

	/**
	 * @When administrator enables the user :username using the occ command
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function administratorEnablesTheUserUsingTheOccCommand($username) {
		$this->featureContext->invokingTheCommand(
			"user:enable $username"
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
