<?php
/**
 * @author Sergio Bertolin <sbertolin@owncloud.com>
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

use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Message\ResponseInterface;
use TestHelpers\OcsApiHelper;
use TestHelpers\SetupHelper;
use TestHelpers\UserHelper;
use TestHelpers\HttpRequestHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Functions for provisioning of users and groups
 */
trait Provisioning {

	/**
	 * list of users that were created during test runs
	 * key is the username value is an array of user attributes
	 *
	 * @var array
	 */
	private $createdUsers = [];

	/**
	 * @var array
	 */
	private $createdRemoteUsers = [];

	/**
	 * @var array
	 */
	private $enabledApps = [];

	/**
	 * @var array
	 */
	private $disabledApps = [];

	/**
	 * @var array
	 */
	private $createdRemoteGroups = [];

	/**
	 * @var array
	 */
	private $createdGroups = [];

	/**
	 * @return array
	 */
	public function getCreatedUsers() {
		return $this->createdUsers;
	}

	/**
	 * @return array
	 */
	public function getCreatedGroups() {
		return $this->createdGroups;
	}

	/**
	 * returns the display name of the current user
	 * if no "Display Name" is set the user-name is returned instead
	 *
	 * @return string
	 */
	public function getCurrentUserDisplayName() {
		return $this->getUserDisplayName($this->getCurrentUser());
	}

	/**
	 * returns the display name of a user
	 * if no "Display Name" is set the username is returned instead
	 *
	 * @param string $username
	 *
	 * @return string
	 */
	public function getUserDisplayName($username) {
		if (isset($this->createdUsers[$username]['displayname'])) {
			$displayName = (string) $this->createdUsers[$username]['displayname'];
			if ($displayName !== '') {
				return $displayName;
			}
		}
		return $username;
	}

	/**
	 * returns an array of the display names, keyed by username
	 * if no "Display Name" is set the user-name is returned instead
	 *
	 * @return array
	 */
	public function getCreatedUserDisplayNames() {
		$result = [];
		foreach ($this->getCreatedUsers() as $username => $user) {
			$result[$username] = $this->getUserDisplayName($username);
		}
		return $result;
	}

	/**
	 *
	 * @param string $username
	 *
	 * @return string password
	 * @throws \Exception
	 */
	public function getUserPassword($username) {
		if ($username === $this->getAdminUsername()) {
			$password = $this->getAdminPassword();
		} elseif (\array_key_exists($username, $this->createdUsers)) {
			$password = $this->createdUsers[$username]['password'];
		} elseif (\array_key_exists($username, $this->createdRemoteUsers)) {
			$password = $this->createdRemoteUsers[$username]['password'];
		} else {
			throw new Exception(
				"user '$username' was not created by this test run"
			);
		}

		//make sure the function always returns a string
		return (string) $password;
	}

	/**
	 *
	 * @param string $username
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function theUserShouldExist($username) {
		if (\array_key_exists($username, $this->createdUsers)) {
			return $this->createdUsers[$username]['shouldExist'];
		}

		if (\array_key_exists($username, $this->createdRemoteUsers)) {
			return $this->createdRemoteUsers[$username]['shouldExist'];
		}

		throw new Exception(
			"user '$username' was not created by this test run"
		);
	}

	/**
	 *
	 * @param string $groupname
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function theGroupShouldExist($groupname) {
		if (\array_key_exists($groupname, $this->createdGroups)) {
			return $this->createdGroups[$groupname]['shouldExist'];
		}

		if (\array_key_exists($groupname, $this->createdRemoteGroups)) {
			return $this->createdRemoteGroups[$groupname]['shouldExist'];
		}

		throw new Exception(
			"group '$groupname' was not created by this test run"
		);
	}

	/**
	 *
	 * @param string $groupname
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function theGroupShouldBeAbleToBeDeleted($groupname) {
		if (\array_key_exists($groupname, $this->createdGroups)) {
			return $this->createdGroups[$groupname]['possibleToDelete'];
		}

		if (\array_key_exists($groupname, $this->createdRemoteGroups)) {
			return $this->createdRemoteGroups[$groupname]['possibleToDelete'];
		}

		throw new Exception(
			"group '$groupname' was not created by this test run"
		);
	}

	/**
	 * @When /^the administrator creates user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function adminCreatesUserUsingTheProvisioningApi($user) {
		if (!$this->userExists($user)) {
			$this->createUser(
				$user, null, null, null, true, 'api'
			);
		}
		$this->userShouldExist($user);
	}

	/**
	 * @Given /^user "([^"]*)" has been created$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasBeenCreated($user) {
		$this->createUser(
			$user, null, null, null, true
		);

		if (\getenv("TEST_EXTERNAL_USER_BACKENDS") !== "true") {
			$this->userShouldExist($user);
		}
	}

	/**
	 * @Given /^these users have been created\s?(but not initialized|):$/
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * password, displayname & email are optional
	 *
	 * @param string $doNotInitialize just create the user, do not trigger creating skeleton files etc
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theseUsersHaveBeenCreated($doNotInitialize, TableNode $table) {
		foreach ($table as $row) {
			if (isset($row['displayname'])) {
				$displayName = $row['displayname'];
			} else {
				$displayName = null;
			}

			if (isset($row['email'])) {
				$email = $row['email'];
			} else {
				$email = null;
			}

			if (isset($row['password'])) {
				$password = $this->getActualPassword($row['password']);
			} else {
				// Let createUser() select the password
				$password = null;
			}

			$this->createUser(
				$row ['username'],
				$password,
				$displayName,
				$email,
				($doNotInitialize === "")
			);
		}
	}

	/**
	 * @When the administrator changes the password of user :user to :password using the provisioning API
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function adminResetsUserPasswordUsingTheProvisioningApi(
		$user, $password
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$user,
			'password',
			$password,
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not change password of user. "
				. $result->getStatusCode() . " " . $result->getBody()
			);
		}
	}
	/**
	 * @When /^user "([^"]*)" (enables|disables) app "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $action enables or disables
	 * @param string $app
	 *
	 * @return void
	 */
	public function userEnablesOrDisablesApp($user, $action, $app) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/apps/$app";
		if ($action === 'enables') {
			$this->response = HttpRequestHelper::post(
				$fullUrl, $user, $this->getPasswordForUser($user)
			);
		} else {
			$this->response = HttpRequestHelper::delete(
				$fullUrl, $user, $this->getPasswordForUser($user)
			);
		}
	}

	/**
	 * @When /^the administrator (enables|disables) app "([^"]*)"$/
	 *
	 * @param string $action enables or disables
	 * @param string $app
	 *
	 * @return void
	 */
	public function adminEnablesOrDisablesApp($action, $app) {
		$this->userEnablesOrDisablesApp(
			$this->getAdminUsername(), $action, $app
		);
	}

	/**
	 * @Given /^app "([^"]*)" has been (enabled|disabled)$/
	 *
	 * @param string $app
	 * @param string $action enabled or disabled
	 *
	 * @return void
	 */
	public function appHasBeenDisabled($app, $action) {
		if ($action === 'enabled') {
			$action = 'enables';
		} else {
			$action = 'disables';
		}
		$this->userEnablesOrDisablesApp(
			$this->getAdminUsername(), $action, $app
		);
	}

	/**
	 * @When /^the administrator sends a user creation request for user "([^"]*)" password "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	public function adminSendsUserCreationRequestUsingTheProvisioningApi($user, $password) {
		$password = $this->getActualPassword($password);
		$bodyTable = new TableNode([['userid', $user], ['password', $password]]);
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(),
			"POST",
			"/cloud/users",
			$bodyTable
		);
		$this->addUserToCreatedUsersList($user, $password);
	}

	/**
	 * @When /^the administrator sends a user creation request for user "([^"]*)" password "([^"]*)" group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $password
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorCreatesUserPasswordGroupUsingTheProvisioningApi(
		$user, $password, $group
	) {
		$bodyTable = new TableNode(
			[['userid', $user], ['password', $password], ['groups[]', $group]]
		);
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(),
			"POST",
			"/cloud/users",
			$bodyTable
		);
		$this->addUserToCreatedUsersList($user, $password);
	}

	/**
	 * @When the administrator resets the password of user :username to :password using the provisioning API
	 * @Given the administrator has reset the password of user :username to :password
	 *
	 * @param string $username of the user whose password is reset
	 * @param string $password
	 *
	 * @return void
	 */
	public function adminResetsPasswordOfUserUsingTheProvisioningApi($username, $password) {
		$this->userResetsPasswordOfUserUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$username,
			$password
		);
	}

	/**
	 * @When user :user resets the password of user :username to :password using the provisioning API
	 * @Given user :user has reset the password of user :username to :password
	 *
	 * @param string $user that does the password reset
	 * @param string $username of the user whose password is reset
	 * @param string $password
	 *
	 * @return void
	 */
	public function userResetsPasswordOfUserUsingTheProvisioningApi($user, $username, $password) {
		$password = $this->getActualPassword($password);
		$this->userTriesToResetPasswordOfUserUsingTheProvisioningApi(
			$user, $username, $password
		);
		$this->rememberUserPassword($username, $password);
	}

	/**
	 * @When user :user tries to reset the password of user :username to :password using the provisioning API
	 * @Given user :user has tried to reset the password of user :username to :password
	 *
	 * @param string $user that does the password reset
	 * @param string $username of the user whose password is reset
	 * @param string $password
	 *
	 * @return void
	 */
	public function userTriesToResetPasswordOfUserUsingTheProvisioningApi($user, $username, $password) {
		$password = $this->getActualPassword($password);
		$bodyTable = new TableNode([['key', 'password'], ['value', $password]]);
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"PUT",
			"/cloud/users/$username",
			$bodyTable
		);
	}

	/**
	 * @When /^the administrator sends a user deletion request for user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdminDeletesTheUserUsingTheProvisioningApi($user) {
		$this->deleteTheUserUsingTheProvisioningApi($user);
		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @When /^the subadmin "([^"]*)" sends a user deletion request for user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $subadmin
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theSubAdminDeletesTheUserUsingTheProvisioningApi($subadmin, $user) {
		$this->response = UserHelper::deleteUser(
			$this->getBaseUrl(),
			$user,
			$subadmin,
			$this->getUserPassword($subadmin),
			$this->ocsApiVersion
		);
		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @When /^the administrator changes the email of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^the administrator has changed the email of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $email
	 *
	 * @return void
	 */
	public function adminChangesTheEmailOfTheUserUsingTheProvisioningApi(
		$user, $email
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			'email',
			$email,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);
		$this->response = $result;
		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not change email of user. "
				. $result->getStatusCode() . " " . $result->getBody()
			);
		}
	}

	/**
	 * @Given the administrator has changed their own email address to :email
	 *
	 * @param string $email
	 *
	 * @return void
	 */
	public function theAdministratorHasChangedTheirOwnEmailAddressTo($email) {
		$admin = $this->getAdminUsername();
		$this->adminChangesTheEmailOfTheUserUsingTheProvisioningApi($admin, $email);
	}

	/**
	 * @When /^user "([^"]*)" changes the email of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has changed the email of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $email
	 *
	 * @return void
	 */
	public function userChangesTheEmailOfUserUsingTheProvisioningApi(
		$requestingUser, $targetUser, $email
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			'email',
			$email,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^the administrator changes the display name of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^the administrator has changed the display name of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $displayname
	 *
	 * @return void
	 */
	public function adminChangesTheDisplayNameOfTheUserUsingTheProvisioningApi(
		$user, $displayname
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			'displayname',
			$displayname,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);
		$this->response = $result;
		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not change display name of user. "
				. $result->getStatusCode() . " " . $result->getBody()
			);
		}
	}

	/**
	 * @When /^user "([^"]*)" changes the display name of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has changed the display name of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function userChangesTheDisplayNameOfUserUsingTheProvisioningApi(
		$requestingUser, $targetUser, $displayName
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			'displayname',
			$displayName,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^the administrator changes the quota of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^the administrator has changed the quota of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function adminChangesTheQuotaOfTheUserUsingTheProvisioningApi(
		$user, $quota
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			'quota',
			$quota,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);
		$this->response = $result;
		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not change quota of user. "
				. $result->getStatusCode() . " " . $result->getBody()
			);
		}
	}

	/**
	 * @When /^user "([^"]*)" changes the quota of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has changed the quota of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $quota
	 *
	 * @return void
	 */
	public function userChangesTheQuotaOfUserUsingTheProvisioningApi(
		$requestingUser, $targetUser, $quota
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			'quota',
			$quota,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^the administrator retrieves the information of user "([^"]*)" using the provisioning API$/
	 * @Given /^the administrator has retrieved the information of user "([^"]*)"$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function adminRetrievesTheInformationOfUserUsingTheProvisioningApi(
		$user
	) {
		$result = UserHelper::getUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^user "([^"]*)" retrieves the information of user "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has retrieved the information of user "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 *
	 * @return void
	 */
	public function userRetrievesTheInformationOfUserUsingTheProvisioningApi(
		$requestingUser, $targetUser
	) {
		$result = UserHelper::getUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @Then /^user "([^"]*)" should exist$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldExist($user) {
		PHPUnit_Framework_Assert::assertTrue(
			$this->userExists($user),
			"User '$user' should exist but does not exist"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should not exist$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldNotExist($user) {
		PHPUnit_Framework_Assert::assertFalse(
			$this->userExists($user),
			"User '$user' should not exist but does exist"
		);
		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @Then /^group "([^"]*)" should exist$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function groupShouldExist($group) {
		PHPUnit_Framework_Assert::assertTrue(
			$this->groupExists($group),
			"Group '$group' should exist but does not exist"
		);
	}

	/**
	 * @Then /^group "([^"]*)" should not exist$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function groupShouldNotExist($group) {
		PHPUnit_Framework_Assert::assertFalse(
			$this->groupExists($group),
			"Group '$group' should not exist but does exist"
		);
	}

	/**
	 * @Then /^these groups should (not|)\s?exist:$/
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theseGroupsShouldNotExist($shouldOrNot, TableNode $table) {
		$should = ($shouldOrNot !== "not");
		$groups = SetupHelper::getGroups();
		foreach ($table as $row) {
			if (\in_array($row['groupname'], $groups, true) !== $should) {
				throw new Exception(
					"group '" . $row['groupname'] .
					"' does" . ($should ? " not" : "") .
					" exist but should" . ($should ? "" : " not")
				);
			}
		}
	}

	/**
	 * @When /^the administrator deletes user "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has been deleted$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function adminDeletesUserUsingTheProvisioningApi($user) {
		if ($this->userExists($user)) {
			$this->deleteTheUserUsingTheProvisioningApi($user);
		}
		$this->userShouldNotExist($user);
	}

	/**
	 * @Given these users have been initialized:
	 * expects a table of users with the heading
	 * "|username|password|"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theseUsersHaveBeenInitialized(TableNode $table) {
		foreach ($table as $row) {
			$this->initializeUser(
				$row ['username'],
				$row ['password']
			);
		}
	}

	/**
	 * Make a request about the user. That will force the server to fully
	 * initialize the user, including their skeleton files.
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	public function initializeUser($user, $password) {
		$url = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		HttpRequestHelper::get($url, $user, $password);
	}

	/**
	 * adds a user to the list of users that were created during test runs
	 * makes it possible to use this list in other test steps
	 * or to delete them at the end of the test
	 *
	 * @param string $user
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 * @param bool $shouldExist
	 *
	 * @return void
	 */
	public function addUserToCreatedUsersList(
		$user, $password, $displayName = null, $email = null, $shouldExist = true
	) {
		$userData = [
			"password" => $password,
			"displayname" => $displayName,
			"email" => $email,
			"shouldExist" => $shouldExist
		];

		if ($this->currentServer === 'LOCAL') {
			$this->createdUsers[$user] = $userData;
		} elseif ($this->currentServer === 'REMOTE') {
			$this->createdRemoteUsers[$user] = $userData;
		}
	}

	/**
	 * remember the password of a user that already exists so that you can use
	 * ordinary test steps after changing their password.
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	public function rememberUserPassword(
		$user, $password
	) {
		if ($this->currentServer === 'LOCAL') {
			if (\array_key_exists($user, $this->createdUsers)) {
				$this->createdUsers[$user]['password'] = $password;
			}
		} elseif ($this->currentServer === 'REMOTE') {
			if (\array_key_exists($user, $this->createdRemoteUsers)) {
				$this->createdRemoteUsers[$user]['password'] = $password;
			}
		}
	}

	/**
	 * Remembers that a user from the list of users that were created during
	 * test runs is no longer expected to exist. Useful if a user was created
	 * during the setup phase but was deleted in a test run. We don't expect
	 * this user to exist in the tear-down phase, so remember that fact.
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function rememberThatUserIsNotExpectedToExist($user) {
		if (\array_key_exists($user, $this->createdUsers)) {
			$this->createdUsers[$user]['shouldExist'] = false;
		}
	}

	/**
	 * creates a single user
	 *
	 * @param string $user
	 * @param string|null $password if null, then select a password
	 * @param string|null $displayName
	 * @param string|null $email
	 * @param bool $initialize initialize the user skeleton files etc
	 * @param string|null $method how to create the user api|occ, default api
	 *
	 * @return void
	 * @throws \Exception
	 */
	private function createUser(
		$user,
		$password = null,
		$displayName = null,
		$email = null,
		$initialize = true,
		$method = null
	) {
		if ($password === null) {
			$password = $this->getPasswordForUser($user);
		}

		if ($displayName === null) {
			$displayName = $this->getDisplayNameForUser($user);
		}

		if ($email === null) {
			$email = $this->getEmailAddressForUser($user);
		}

		if ($method === null && \getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			//guess yourself
			$method = "ldap";
		} elseif ($method === null) {
			$method = "api";
		}
		$user = \trim($user);
		$method = \trim(\strtolower($method));
		switch ($method) {
			case "api":
				$results = UserHelper::createUser(
					$this->getBaseUrl(),
					$user,
					$password,
					$this->getAdminUsername(),
					$this->getAdminPassword(),
					$displayName, $email
				);
				foreach ($results as $result) {
					if ($result->getStatusCode() !== 200) {
						throw new Exception(
							"could not create user. "
							. $result->getStatusCode() . " " . $result->getBody()
						);
					}
				}
				break;
			case "occ":
				$result = SetupHelper::createUser(
					$user, $password, $displayName, $email
				);
				if ($result["code"] != 0) {
					throw new Exception(
						"could not create user. {$result['stdOut']} {$result['stdErr']}"
					);
				}
				break;
			case "ldap":
				echo "creating LDAP users is not implemented, so assume they exist\n";
				break;
			default:
				throw new InvalidArgumentException(
					"Invalid method to create a user"
				);
		}

		$this->addUserToCreatedUsersList($user, $password, $displayName, $email);
		if ($initialize) {
			$this->initializeUser($user, $password);
		}
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function deleteUser($user) {
		$this->deleteTheUserUsingTheProvisioningApi($user);
		$this->userShouldNotExist($user);
	}

	/**
	 * Try to delete the group, catching anything bad that might happen.
	 * Use this method only in places where you want to try as best you
	 * can to delete the group, but do not want to error if there is a problem.
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function cleanupGroup($group) {
		try {
			$this->deleteTheGroupUsingTheProvisioningApi($group);
		} catch (\Exception $e) {
			\error_log(
				"INFORMATION: There was an unexpected problem trying to delete group " .
				"'$group' message '" . $e->getMessage() . "'"
			);
		}

		if ($this->theGroupShouldBeAbleToBeDeleted($group)
			&& $this->groupExists($group)
		) {
			\error_log(
				"INFORMATION: tried to delete group '$group'" .
				" at the end of the scenario but it seems to still exist. " .
				"There might be problems with later scenarios."
			);
		}
	}

	/**
	 * @param string $user
	 *
	 * @return bool
	 */
	public function userExists($user) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/users/$user";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		if ($this->response->getStatusCode() >= 400) {
			return false;
		}
		return true;
	}

	/**
	 * @Then /^user "([^"]*)" should belong to group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userShouldBelongToGroup($user, $group) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/users/$user/groups";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		\sort($respondedArray);
		PHPUnit_Framework_Assert::assertContains($group, $respondedArray);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @Then /^user "([^"]*)" should not belong to group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userShouldNotBelongToGroup($user, $group) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/users/$user/groups";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		\sort($respondedArray);
		PHPUnit_Framework_Assert::assertNotContains($group, $respondedArray);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @Then group :group should not contain user :username
	 *
	 * @param string $group
	 * @param string $username
	 *
	 * @return void
	 */
	public function groupShouldNotContainUser($group, $username) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/groups/$group";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$this->theUsersReturnedByTheApiShouldNotInclude($username);
	}

	/**
	 * @param string $user
	 * @param string $group
	 *
	 * @return bool
	 */
	public function userBelongsToGroup($user, $group) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/users/$user/groups";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);

		if (\in_array($group, $respondedArray)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @When /^the administrator adds user "([^"]*)" to group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function adminAddsUserToGroupUsingTheProvisioningApi($user, $group) {
		if (!$this->userBelongsToGroup($user, $group)) {
			$this->userHasBeenAddedToGroup($user, $group);
		}

		$this->userShouldBelongToGroup($user, $group);
	}

	/**
	 * @Given /^user "([^"]*)" has been added to group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 * @param string $method how to add the user to the group api|occ
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasBeenAddedToGroup($user, $group, $method = null) {
		$user = $this->getActualUsername($user);
		if ($method === null && \getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			//guess yourself
			$method = "ldap";
		} elseif ($method === null) {
			$method = "api";
		}
		$method = \trim(\strtolower($method));
		switch ($method) {
			case "api":
				$result = UserHelper::addUserToGroup(
					$this->getBaseUrl(),
					$user, $group,
					$this->getAdminUsername(),
					$this->getAdminPassword()
				);
				if ($result->getStatusCode() !== 200) {
					throw new Exception(
						"could not add user to group. "
						. $result->getStatusCode() . " " . $result->getBody()
					);
				}
				break;
			case "occ":
				$result = SetupHelper::addUserToGroup($group, $user);
				if ($result["code"] != 0) {
					throw new Exception(
						"could not add user to group. {$result['stdOut']} {$result['stdErr']}"
					);
				}
				break;
			case "ldap":
				echo "adding users to groups in LDAP is not implemented, " .
					"so assume user is in group\n";
				break;
			default:
				throw new InvalidArgumentException(
					"Invalid method to add a user to a group"
				);
		}
	}

	/**
	 * @Given the administrator has been added to group :group
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorHasBeenAddedToGroup($group) {
		$admin = $this->getAdminUsername();
		$this->userHasBeenAddedToGroup($admin, $group);
	}

	/**
	 * @param string $group
	 * @param bool $shouldExist - true if the group should exist
	 * @param bool $possibleToDelete - true if it is possible to delete the group
	 *
	 * @return void
	 */
	public function addGroupToCreatedGroupsList(
		$group, $shouldExist = true, $possibleToDelete = true
	) {
		$groupData = [
			"shouldExist" => $shouldExist,
			"possibleToDelete" => $possibleToDelete
		];

		if ($this->currentServer === 'LOCAL') {
			$this->createdGroups[$group] = $groupData;
		} elseif ($this->currentServer === 'REMOTE') {
			$this->createdRemoteGroups[$group] = $groupData;
		}
	}

	/**
	 * Remembers that a group from the list of groups that were created during
	 * test runs is no longer expected to exist. Useful if a group was created
	 * during the setup phase but was deleted in a test run. We don't expect
	 * this group to exist in the tear-down phase, so remember that fact.
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function rememberThatGroupIsNotExpectedToExist($group) {
		if (\array_key_exists($group, $this->createdGroups)) {
			$this->createdGroups[$group]['shouldExist'] = false;
		}
	}

	/**
	 * @When /^the administrator creates group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function adminCreatesGroupUsingTheProvisioningApi($group) {
		if (!$this->groupExists($group)) {
			$this->createTheGroup($group, 'api');
		}
		$this->groupShouldExist($group);
	}

	/**
	 * @Given /^group "([^"]*)" has been created$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function groupHasBeenCreated($group) {
		$this->createTheGroup($group);
		if (\getenv("TEST_EXTERNAL_USER_BACKENDS") !== "true") {
			$this->groupShouldExist($group);
		}
	}

	/**
	 * @Given these groups have been created:
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theseGroupsHaveBeenCreated(TableNode $table) {
		foreach ($table as $row) {
			$this->createTheGroup($row['groupname']);
		}
	}

	/**
	 * @When /^the administrator sends a group creation request for group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminSendsGroupCreationRequestUsingTheProvisioningApi($group) {
		$bodyTable = new TableNode([['groupid', $group]]);
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(),
			"POST",
			"/cloud/groups",
			$bodyTable
		);
		$this->addGroupToCreatedGroupsList($group);
	}

	/**
	 * @When /^the administrator tries to send a group creation request for group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminTriesToSendGroupCreationRequestUsingTheAPI($group) {
		$this->adminSendsGroupCreationRequestUsingTheAPI($group);
		$this->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * creates a single group
	 *
	 * @param string $group
	 * @param string $method how to create the group api|occ
	 *
	 * @return void
	 * @throws \Exception
	 */
	private function createTheGroup($group, $method = null) {
		if ($method === null && \getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			//guess yourself
			$method = "ldap";
		} elseif ($method === null) {
			$method = "api";
		}
		$group = \trim($group);
		$method = \trim(\strtolower($method));
		$groupCanBeDeleted = false;
		switch ($method) {
			case "api":
				$result = UserHelper::createGroup(
					$this->getBaseUrl(),
					$group,
					$this->getAdminUsername(),
					$this->getAdminPassword()
				);
				if ($result->getStatusCode() === 200) {
					$groupCanBeDeleted = true;
				} else {
					throw new Exception(
						"could not create group. "
						. $result->getStatusCode() . " " . $result->getBody()
					);
				}
				break;
			case "occ":
				$result = SetupHelper::createGroup($group);
				if ($result["code"] == 0) {
					$groupCanBeDeleted = true;
				} else {
					throw new Exception(
						"could not create group. {$result['stdOut']} {$result['stdErr']}"
					);
				}
				break;
			case "ldap":
				echo "creating LDAP groups is not implemented, so assume they exist\n";
				break;
			default:
				throw new InvalidArgumentException(
					"Invalid method to create a group"
				);
		}

		$this->addGroupToCreatedGroupsList($group, true, $groupCanBeDeleted);
	}

	/**
	 * @When /^the administrator disables user "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has been disabled$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function adminDisablesUserUsingTheProvisioningApi($user) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user/disable";
		$this->response = HttpRequestHelper::put(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function deleteTheUserUsingTheProvisioningApi($user) {
		// Always try to delete the user
		$this->response = UserHelper::deleteUser(
			$this->getBaseUrl(),
			$user,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);

		// Only log a message if the test really expected the user to have been
		// successfully created (i.e. the delete is expected to work) and
		// there was a problem deleting the user. Because in this case there
		// might be an effect on later tests.
		if ($this->theUserShouldExist($user)
			&& ($this->response->getStatusCode() !== 200)
		) {
			\error_log(
				"INFORMATION: could not delete user '$user' "
				. $this->response->getStatusCode() . " " . $this->response->getBody()
			);
		}

		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @Given /^group "([^"]*)" has been deleted$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function groupHasBeenDeletedUsingTheProvisioningApi($group) {
		if ($this->groupExists($group)) {
			$this->deleteTheGroupUsingTheProvisioningApi($group);
		}
		$this->groupShouldNotExist($group);
	}

	/**
	 * @When /^the administrator deletes group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function deleteTheGroupUsingTheProvisioningApi($group) {
		$this->response = UserHelper::deleteGroup(
			$this->getBaseUrl(),
			$group,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);

		if ($this->theGroupShouldExist($group)
			&& $this->theGroupShouldBeAbleToBeDeleted($group)
			&& ($this->response->getStatusCode() !== 200)
		) {
			\error_log(
				"INFORMATION: could not delete group '$group'"
				. $this->response->getStatusCode() . " " . $this->response->getBody()
			);
		}

		$this->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * @param string $group
	 *
	 * @return bool
	 */
	public function groupExists($group) {
		$group = \rawurlencode($group);
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/groups/$group";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		if ($this->response->getStatusCode() >= 400) {
			return false;
		}
		return true;
	}

	/**
	 * @When the administrator removes user :user from group :group using the provisioning API
	 * @Given user :user has been removed from group :group
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminRemovesUserFromGroupUsingTheProvisioningApi($user, $group) {
		$this->response = UserHelper::removeUserFromGroup(
			$this->getBaseUrl(),
			$user,
			$group,
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
		
		if ($this->response->getStatusCode() !== 200) {
			\error_log(
				"INFORMATION: could not remove user '$user' from group '$group'"
				. $this->response->getStatusCode() . " " . $this->response->getBody()
			);
		}
	}

	/**
	 * @Then /^user "([^"]*)" should be a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userShouldBeSubadminOfGroup($user, $group) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/groups/$group/subadmins";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfSubadminsResponded($this->response);
		\sort($respondedArray);
		PHPUnit_Framework_Assert::assertContains($user, $respondedArray);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @When /^the administrator makes user "([^"]*)" a subadmin of group "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has been made a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminMakesUserSubadminOfGroupUsingTheProvisioningApi(
		$user, $group
	) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user/subadmins";
		$body = ['groupid' => $group];
		$this->response = HttpRequestHelper::post(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword(), null,
			$body
		);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @When /^the administrator makes user "([^"]*)" not a subadmin of group "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has been made not a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminMakesUserNotSubadminOfGroupUsingTheProvisioningApi(
		$user, $group
	) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/groups/$group/subadmins";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfSubadminsResponded($this->response);
		\sort($respondedArray);
		PHPUnit_Framework_Assert::assertNotContains($user, $respondedArray);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @Then /^the users returned by the API should be$/
	 *
	 * @param TableNode $usersList
	 *
	 * @return void
	 */
	public function theUsersShouldBe($usersList) {
		if ($usersList instanceof TableNode) {
			$users = $usersList->getRows();
			$usersSimplified = $this->simplifyArray($users);
			$respondedArray = $this->getArrayOfUsersResponded($this->response);
			PHPUnit_Framework_Assert::assertEquals(
				$usersSimplified, $respondedArray, "", 0.0, 10, true
			);
		}
	}

	/**
	 * @Then /^the groups returned by the API should be$/
	 *
	 * @param TableNode $groupsList
	 *
	 * @return void
	 */
	public function theGroupsShouldBe($groupsList) {
		if ($groupsList instanceof TableNode) {
			$groups = $groupsList->getRows();
			$groupsSimplified = $this->simplifyArray($groups);
			$respondedArray = $this->getArrayOfGroupsResponded($this->response);
			PHPUnit_Framework_Assert::assertEquals(
				$groupsSimplified, $respondedArray, "", 0.0, 10, true
			);
		}
	}

	/**
	 * @Then /^the groups returned by the API should include "([^"]*)"$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theGroupsReturnedByTheApiShouldInclude($group) {
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		PHPUnit_Framework_Assert::assertContains($group, $respondedArray);
	}

	/**
	 * @Then /^the groups returned by the API should not include "([^"]*)"$/
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theGroupsReturnedByTheApiShouldNotInclude($group) {
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		PHPUnit_Framework_Assert::assertNotContains($group, $respondedArray);
	}

	/**
	 * @Then /^the users returned by the API should not include "([^"]*)"$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theUsersReturnedByTheApiShouldNotInclude($user) {
		$respondedArray = $this->getArrayOfUsersResponded($this->response);
		PHPUnit_Framework_Assert::assertNotContains($user, $respondedArray);
	}

	/**
	 * @param TableNode|null $groupsOrUsersList
	 *
	 * @return void
	 */
	public function checkSubadminGroupsOrUsersTable($groupsOrUsersList) {
		$tableRows = $groupsOrUsersList->getRows();
		$simplifiedTableRows = $this->simplifyArray($tableRows);
		$respondedArray = $this->getArrayOfSubadminsResponded($this->response);
		PHPUnit_Framework_Assert::assertEquals(
			$simplifiedTableRows, $respondedArray, "", 0.0, 10, true
		);
	}

	/**
	 * @Then /^the subadmin groups returned by the API should be$/
	 *
	 * @param TableNode|null $groupsList
	 *
	 * @return void
	 */
	public function theSubadminGroupsShouldBe($groupsList) {
		$this->checkSubadminGroupsOrUsersTable($groupsList);
	}

	/**
	 * @Then /^the subadmin users returned by the API should be$/
	 *
	 * @param TableNode|null $usersList
	 *
	 * @return void
	 */
	public function theSubadminUsersShouldBe($usersList) {
		$this->checkSubadminGroupsOrUsersTable($usersList);
	}

	/**
	 * @Then /^the apps returned by the API should include$/
	 *
	 * @param TableNode|null $appList
	 *
	 * @return void
	 */
	public function theAppsShouldInclude($appList) {
		$apps = $appList->getRows();
		$appsSimplified = $this->simplifyArray($apps);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		foreach ($appsSimplified as $app) {
			PHPUnit_Framework_Assert::assertContains($app, $respondedArray);
		}
	}

	/**
	 * @Then /^app "([^"]*)" should not be in the apps list$/
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function appShouldNotBeInTheAppsList($appName) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		PHPUnit_Framework_Assert::assertNotContains($appName, $respondedArray);
	}

	/**
	 * @Then /^user "([^"]*)" should be a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userShouldBeASubadminOfGroup($user, $group) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/groups/$group/subadmins";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$listOfSubadmins = $this->getArrayOfSubadminsResponded($this->response);
		PHPUnit_Framework_Assert::assertContains(
			$user,
			$listOfSubadmins
		);
	}

	/**
	 * @Then /^user "([^"]*)" should not be a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userShouldNotBeASubadminOfGroup($user, $group) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/groups/$group/subadmins";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$listOfSubadmins = $this->getArrayOfSubadminsResponded($this->response);
		PHPUnit_Framework_Assert::assertNotContains(
			$user,
			$listOfSubadmins
		);
	}

	/**
	 * @Then /^the display name returned by the API should be "([^"]*)"$/
	 *
	 * @param string $displayname
	 *
	 * @return void
	 */
	public function theDisplayNameReturnedByTheApiShouldBe($displayname) {
		$responseName = $this->getResponseXml()->data[0]->displayname;
		PHPUnit_Framework_Assert::assertEquals($displayname, $responseName);
	}

	/**
	 * Parses the xml answer to get the array of users returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 */
	public function getArrayOfUsersResponded($resp) {
		$listCheckedElements
			= $this->getResponseXml($resp)->data[0]->users[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), 1);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of groups returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 */
	public function getArrayOfGroupsResponded($resp) {
		$listCheckedElements
			= $this->getResponseXml($resp)->data[0]->groups[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), 1);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of apps returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 */
	public function getArrayOfAppsResponded($resp) {
		$listCheckedElements
			= $this->getResponseXml($resp)->data[0]->apps[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), 1);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of subadmins returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 */
	public function getArrayOfSubadminsResponded($resp) {
		$listCheckedElements
			= $this->getResponseXml($resp)->data[0]->element;
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), 1);
		return $extractedElementsArray;
	}

	/**
	 * Parses the xml answer to get the array of app info returned for an app.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 */
	public function getArrayOfAppInfoResponded($resp) {
		$listCheckedElements
			= $this->getResponseXml($resp)->data[0];
		$extractedElementsArray
			= \json_decode(\json_encode($listCheckedElements), 1);
		return $extractedElementsArray;
	}

	/**
	 * @Then /^app "([^"]*)" should be disabled$/
	 *
	 * @param string $app
	 *
	 * @return void
	 */
	public function appShouldBeDisabled($app) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps?filter=disabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		PHPUnit_Framework_Assert::assertContains($app, $respondedArray);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @Then /^app "([^"]*)" should be enabled$/
	 *
	 * @param string $app
	 *
	 * @return void
	 */
	public function appShouldBeEnabled($app) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps?filter=enabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		PHPUnit_Framework_Assert::assertContains($app, $respondedArray);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @Then /^the information for app "([^"]*)" should have a valid version$/
	 *
	 * @param string $app
	 *
	 * @return void
	 */
	public function theInformationForAppShouldHaveAValidVersion($app) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps/$app";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
		$respondedArray = $this->getArrayOfAppInfoResponded($this->response);
		PHPUnit_Framework_Assert::assertArrayHasKey(
			'version',
			$respondedArray,
			"app info returned for $app app does not have a version"
		);
		$appVersion = $respondedArray['version'];
		PHPUnit_Framework_Assert::assertTrue(
			\substr_count($appVersion, '.') > 1,
			"app version '$appVersion' returned in app info is not a valid version string"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be disabled$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldBeDisabled($user) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		PHPUnit_Framework_Assert::assertEquals(
			"false", $this->getResponseXml()->data[0]->enabled
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be enabled$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function useShouldBeEnabled($user) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		PHPUnit_Framework_Assert::assertEquals(
			"true", $this->getResponseXml()->data[0]->enabled
		);
	}

	/**
	 * @When the administrator sets the quota of user :user to :quota using the provisioning API
	 * @Given the quota of user :user has been set to :quota
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function adminSetsUserQuotaToUsingTheProvisioningApi($user, $quota) {
		$body
			= [
				'key' => 'quota',
				'value' => $quota,
			];

		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			"PUT",
			"/cloud/users/$user",
			$body,
			2
		);

		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @When the administrator gives unlimited quota to user :user using the provisioning API
	 * @Given user :user has been given unlimited quota
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function adminGivesUnlimitedQuotaToUserUsingTheProvisioningApi($user) {
		$this->adminSetsUserQuotaToUsingTheProvisioningApi($user, 'none');
	}

	/**
	 * Returns home path of the given user
	 *
	 * @param string $user
	 *
	 * @return string
	 */
	public function getUserHome($user) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		return $this->getResponseXml()->data[0]->home;
	}

	/**
	 * @Then /^the user attributes returned by the API should include$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function checkUserAttributes($body) {
		$fd = $body->getRowsHash();
		foreach ($fd as $field => $value) {
			$data = $this->getResponseXml()->data[0];
			$field_array = \explode(' ', $field);
			foreach ($field_array as $field_name) {
				$data = $data->$field_name;
			}
			if ($data != $value) {
				PHPUnit_Framework_Assert::fail(
					"$field has value $data"
				);
			}
		}
	}

	/**
	 * @Then the attributes of user :user returned by the API should include
	 *
	 * @param string $user
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function checkAttributesForUser($user, $body) {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->getAdminUsername(), "GET", "/cloud/users/$user",
			null
		);
		$this->checkUserAttributes($body);
	}

	/**
	 * @Then /^the API should not return any data$/
	 *
	 * @return void
	 */
	public function theApiShouldNotReturnAnyData() {
		$responseData = $this->getResponseXml()->data[0];
		PHPUnit_Framework_Assert::assertEmpty(
			$responseData,
			"Response data is not empty but it should be empty"
		);
	}

	/**
	 * @Then /^the list of users returned by the API should be empty$/
	 *
	 * @return void
	 */
	public function theListOfUsersReturnedByTheApiShouldBeEmpty() {
		$usersList = $this->getResponseXml()->data[0]->users[0];
		PHPUnit_Framework_Assert::assertEmpty(
			$usersList,
			"Users list is not empty but it should be empty"
		);
	}

	/**
	 * @Then /^the list of groups returned by the API should be empty$/
	 *
	 * @return void
	 */
	public function theListOfGroupsReturnedByTheApiShouldBeEmpty() {
		$groupsList = $this->getResponseXml()->data[0]->groups[0];
		PHPUnit_Framework_Assert::assertEmpty(
			$groupsList,
			"Groups list is not empty but it should be empty"
		);
	}

	/**
	 * @BeforeScenario
	 * @AfterScenario
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function cleanupUsers() {
		$this->deleteTokenAuthEnforcedAfterScenario();
		$previousServer = $this->currentServer;
		$this->usingServer('LOCAL');
		foreach ($this->createdUsers as $user => $userData) {
			$this->deleteUser($user);
		}
		$this->usingServer('REMOTE');
		foreach ($this->createdRemoteUsers as $remoteUser => $userData) {
			$this->deleteUser($remoteUser);
		}
		$this->usingServer($previousServer);
	}

	/**
	 * @BeforeScenario
	 * @AfterScenario
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function cleanupGroups() {
		$this->deleteTokenAuthEnforcedAfterScenario();
		$previousServer = $this->currentServer;
		$this->usingServer('LOCAL');
		foreach ($this->createdGroups as $group => $groupData) {
			$this->cleanupGroup($group);
		}
		$this->usingServer('REMOTE');
		foreach ($this->createdRemoteGroups as $remoteGroup => $groupData) {
			$this->cleanupGroup($remoteGroup);
		}
		$this->usingServer($previousServer);
	}
	
	/**
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function rememberAppEnabledDisabledState() {
		$this->enabledApps = $this->getEnabledApps();
		$this->disabledApps = $this->getDisabledApps();
	}
	
	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function restoreAppEnabledDisabledState() {
		$currentlyDisabledApps = $this->getDisabledApps();
		$currentlyEnabledApps = $this->getEnabledApps();

		foreach ($currentlyDisabledApps as $disabledApp) {
			if (\in_array($disabledApp, $this->enabledApps)) {
				$this->adminEnablesOrDisablesApp('enables', $disabledApp);
			}
		}

		foreach ($currentlyEnabledApps as $enabledApp) {
			if (\in_array($enabledApp, $this->disabledApps)) {
				$this->adminEnablesOrDisablesApp('disables', $enabledApp);
			}
		}
	}

	/**
	 * Returns array of enabled apps
	 *
	 * @return array
	 */
	public function getEnabledApps() {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps?filter=enabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		return ($this->getArrayOfAppsResponded($this->response));
	}

	/**
	 * Returns array of disabled apps
	 *
	 * @return array
	 */
	public function getDisabledApps() {
		$fullUrl = $this->getBaseUrl() . "/ocs/v2.php/cloud/apps?filter=disabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		return ($this->getArrayOfAppsResponded($this->response));
	}
}
