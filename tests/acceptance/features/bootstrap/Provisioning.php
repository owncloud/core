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
	 * list of users that were created on the local server during test runs
	 * key is the lowercase username, value is an array of user attributes
	 *
	 * @var array
	 */
	private $createdUsers = [];

	/**
	 * list of users that were created on the remote server during test runs
	 * key is the lowercase username, value is an array of user attributes
	 *
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
	 * Usernames are not case-sensitive, and can generally be specified with any
	 * mix of upper and lower case. For remembering usernames use the normalized
	 * form so that "User0" and "user0" are remembered as the same user.
	 *
	 * @param string $username
	 *
	 * @return string
	 */
	public function normalizeUsername($username) {
		return \strtolower($username);
	}

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
		$user = $this->normalizeUsername($username);
		if (isset($this->createdUsers[$user]['displayname'])) {
			$displayName = (string) $this->createdUsers[$user]['displayname'];
			if ($displayName !== '') {
				return $displayName;
			}
		}
		return $username;
	}

	/**
	 * returns an array of the user display names, keyed by username
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
	 * returns an array of the group display names, keyed by group name
	 * currently group name and display name are always the same, so this
	 * function is a convenience for getting the group names in a similar
	 * format to what getCreatedUserDisplayNames() returns
	 *
	 * @return array
	 */
	public function getCreatedGroupDisplayNames() {
		$result = [];
		foreach ($this->getCreatedGroups() as $groupName => $groupData) {
			$result[$groupName] = $groupName;
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
		$username = $this->normalizeUsername($username);
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
		$username = $this->normalizeUsername($username);
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
		$this->createUser(
			$user, null, null, null, true, 'api'
		);
	}

	/**
	 * @Given /^user "([^"]*)" has been created with default attributes in the database user backend$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasBeenCreatedOnDatabaseBackend($user) {
		$this->adminCreatesUserUsingTheProvisioningApi($user);
		$this->userShouldExist($user);
	}

	/**
	 * @Given /^user "([^"]*)" has been created with default attributes and skeleton files$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasBeenCreatedWithDefaultAttributes($user) {
		$this->createUser($user);

		if (\getenv("TEST_EXTERNAL_USER_BACKENDS") !== "true") {
			$this->userShouldExist($user);
		}
	}

	/**
	 * @Given /^user "([^"]*)" has been created with default attributes and without skeleton files$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userHasBeenCreatedWithDefaultAttributesAndWithoutSkeletonFiles($user) {
		$path = $this->popSkeletonDirectoryConfig();
		try {
			$this->userHasBeenCreatedWithDefaultAttributes($user);
		} finally {
			// restore skeletondirectory even if user creation failed
			$this->runOcc(["config:system:set skeletondirectory --value $path"]);
		}
	}

	/**
	 * @Given these users have been created with default attributes and without skeleton files:
	 * expects a table of users with the heading
	 * "|username|"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theseUsersHaveBeenCreatedWithDefaultAttributesAndWithoutSkeletonFiles(TableNode $table) {
		$path = $this->popSkeletonDirectoryConfig();
		try {
			foreach ($table as $row) {
				$this->userHasBeenCreatedWithDefaultAttributes($row['username']);
			}
		} finally {
			// restore skeletondirectory even if user creation failed
			$this->runOcc(["config:system:set skeletondirectory --value $path"]);
		}
	}

	/**
	 * @Given these users have been created without skeleton files:
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * password, displayname & email are optional
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theseUsersHaveBeenCreatedWithoutSkeletonFiles(TableNode $table) {
		$path = $this->popSkeletonDirectoryConfig();
		try {
			$this->theseUsersHaveBeenCreated("", "", $table);
		} finally {
			// restore skeletondirectory even if user creation failed
			$this->runOcc(["config:system:set skeletondirectory --value $path"]);
		}
	}

	/**
	 * @Given /^these users have been created with ?(default attributes and|) skeleton files ?(but not initialized|):$/
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * password, displayname & email are optional
	 *
	 * @param string $setDefaultAttributes just set the defaults if it doesn't exist
	 * @param string $doNotInitialize just create the user, do not trigger creating skeleton files etc
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theseUsersHaveBeenCreated($setDefaultAttributes, $doNotInitialize, TableNode $table) {
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
				($doNotInitialize === ""),
				null,
				!($setDefaultAttributes === "")
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
	public function adminChangesPasswordOfUserToUsingTheProvisioningApi(
		$user, $password
	) {
		$this->response = UserHelper::editUser(
			$this->getBaseUrl(),
			$user,
			'password',
			$password,
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @Given the administrator has changed the password of user :user to :password
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function adminHasChangedPasswordOfUserTo(
		$user, $password
	) {
		$this->adminChangesPasswordOfUserToUsingTheProvisioningApi(
			$user, $password
		);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"could not change password of user $user"
		);
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
	 * @When the administrator gets the info of app :app
	 *
	 * @param string $app
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheInfoOfApp($app) {
		$this->ocsContext->userSendsToOcsApiEndpoint(
			$this->getAdminUsername(),
			"GET",
			"/cloud/apps/$app"
		);
	}

	/**
	 * @When the administrator gets all enabled apps using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllEnabledAppsUsingTheProvisioningApi() {
		$this->getEnabledApps();
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
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
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
		$password = $this->getActualPassword($password);
		$bodyTable = new TableNode(
			[['userid', $user], ['password', $password], ['groups[]', $group]]
		);
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
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
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"PUT",
			"/cloud/users/$username",
			$bodyTable
		);
	}

	/**
	 * @When /^the administrator deletes user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdminDeletesUserUsingTheProvisioningApi($user) {
		$this->deleteTheUserUsingTheProvisioningApi($user);
		$this->rememberThatUserIsNotExpectedToExist($user);
	}

	/**
	 * @When user :user deletes user :anotheruser using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 *
	 * @return void
	 */
	public function userDeletesUserUsingTheProvisioningApi(
		$user, $anotheruser
	) {
		$this->response = UserHelper::deleteUser(
			$this->getBaseUrl(),
			$anotheruser,
			$user,
			$this->getUserPassword($user),
			$this->ocsApiVersion
		);
	}

	/**
	 * @When /^the administrator changes the email of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $email
	 *
	 * @return void
	 */
	public function adminChangesTheEmailOfUserToUsingTheProvisioningApi(
		$user, $email
	) {
		$this->response = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			'email',
			$email,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);
	}

	/**
	 * @Given /^the administrator has changed the email of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $email
	 *
	 * @return void
	 */
	public function adminHasChangedTheEmailOfUserTo($user, $email) {
		$this->adminChangesTheEmailOfUserToUsingTheProvisioningApi(
			$user, $email
		);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"could not change email of user $user"
		);
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
		$this->adminHasChangedTheEmailOfUserTo($admin, $email);
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
		$this->response = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			'email',
			$email,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->ocsApiVersion
		);
	}

	/**
	 * Edit the "display name" of a user by sending the key "displayname" to the API end point.
	 *
	 * This is the newer and consistent key name.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^the administrator changes the display name of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^the administrator has changed the display name of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $displayname
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesTheDisplayNameOfUserUsingTheProvisioningApi(
		$user, $displayname
	) {
		$this->adminChangesTheDisplayNameOfUserUsingKey(
			$user, 'displayname', $displayname
		);
	}

	/**
	 * As the administrator, edit the "display name" of a user by sending the key "display" to the API end point.
	 *
	 * This is the older and inconsistent key name, which remains for backward-compatibility.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^the administrator changes the display of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^the administrator has changed the display of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $displayname
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesTheDisplayOfUserUsingTheProvisioningApi(
		$user, $displayname
	) {
		$this->adminChangesTheDisplayNameOfUserUsingKey(
			$user, 'display', $displayname
		);
	}

	/**
	 *
	 * @param string $user
	 * @param string $key
	 * @param string $displayname
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminChangesTheDisplayNameOfUserUsingKey(
		$user, $key, $displayname
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$key,
			$displayname,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->ocsApiVersion
		);
		$this->response = $result;
		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not change display name of user using key $key "
				. $result->getStatusCode() . " " . $result->getBody()
			);
		}
	}

	/**
	 * As a user, edit the "display name" of a user by sending the key "displayname" to the API end point.
	 *
	 * This is the newer and consistent key name.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
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
		$this->userChangesTheDisplayNameOfUserUsingKey(
			$requestingUser, $targetUser, 'displayname', $displayName
		);
	}

	/**
	 * As a user, edit the "display name" of a user by sending the key "display" to the API end point.
	 *
	 * This is the older and inconsistent key name.
	 *
	 * @see https://github.com/owncloud/core/pull/33040
	 *
	 * @When /^user "([^"]*)" changes the display of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 * @Given /^user "([^"]*)" has changed the display of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function userChangesTheDisplayOfUserUsingTheProvisioningApi(
		$requestingUser, $targetUser, $displayName
	) {
		$this->userChangesTheDisplayNameOfUserUsingKey(
			$requestingUser, $targetUser, 'display', $displayName
		);
	}

	/**
	 *
	 * @param string $requestingUser
	 * @param string $targetUser
	 * @param string $key
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function userChangesTheDisplayNameOfUserUsingKey(
		$requestingUser, $targetUser, $key, $displayName
	) {
		$result = UserHelper::editUser(
			$this->getBaseUrl(),
			$this->getActualUsername($targetUser),
			$key,
			$displayName,
			$this->getActualUsername($requestingUser),
			$this->getPasswordForUser($requestingUser),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When /^the administrator changes the quota of user "([^"]*)" to "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function adminChangesTheQuotaOfUserUsingTheProvisioningApi(
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
	}

	/**
	 * @Given /^the administrator has changed the quota of user "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function adminHasChangedTheQuotaOfUserTo(
		$user, $quota
	) {
		$this->adminChangesTheQuotaOfUserUsingTheProvisioningApi(
			$user, $quota
		);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"could not change quota of user $user"
		);
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
		PHPUnit\Framework\Assert::assertTrue(
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
		PHPUnit\Framework\Assert::assertFalse(
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
		PHPUnit\Framework\Assert::assertTrue(
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
		PHPUnit\Framework\Assert::assertFalse(
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
	 * @Given /^user "([^"]*)" has been deleted$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasBeenDeleted($user) {
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
			if (!isset($row ['password'])) {
				$password = $this->getPasswordForUser($row ['username']);
			} else {
				$password = $row ['password'];
			}
			$this->initializeUser(
				$row ['username'],
				$password
			);
		}
	}

	/**
	 * @When the administrator gets all the members of group :group using the provisioning API
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheMembersOfGroupUsingTheProvisioningApi($group) {
		$this->userGetsAllTheMembersOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(), $group
		);
	}

	/**
	 * @When /^user "([^"]*)" gets all the members of group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userGetsAllTheMembersOfGroupUsingTheProvisioningApi($user, $group) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/groups/$group";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getActualUsername($user), $this->getPasswordForUser($user)
		);
	}

	/**
	 * @When the administrator gets all the groups using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheGroupsUsingTheProvisioningApi() {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/groups";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
	}

	/**
	 * @When the administrator gets all the groups of user :user using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheGroupsOfUser($user) {
		$this->userGetsAllTheGroupsOfUser($this->getAdminUsername(), $user);
	}

	/**
	 * @When user :user gets all the groups of user :anotheruser using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 *
	 * @return void
	 */
	public function userGetsAllTheGroupsOfUser($user, $anotheruser) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$anotheruser/groups";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getActualUsername($user), $this->getUserPassword($user)
		);
	}

	/**
	 * @When the administrator gets the list of all users using the provisioning API
	 *
	 * @return void
	 */
	public function theAdministratorGetsTheListOfAllUsersUsingTheProvisioningApi() {
		$this->userGetsTheListOfAllUsersUsingTheProvisioningApi($this->getAdminUsername());
	}

	/**
	 * @When user :user gets the list of all users using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userGetsTheListOfAllUsersUsingTheProvisioningApi($user) {
		$fullUrl = $this->getBaseUrl() . "/ocs/v{$this->ocsApiVersion}.php/cloud/users";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getActualUsername($user), $this->getUserPassword($user)
		);
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
		$this->lastUploadTime = \time();
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
		$user = $this->normalizeUsername($user);
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
		$user = $this->normalizeUsername($user);
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
		$user = $this->normalizeUsername($user);
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
	 * @param bool $setDefault sets the missing values to some default
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function createUser(
		$user,
		$password = null,
		$displayName = null,
		$email = null,
		$initialize = true,
		$method = null,
		$setDefault = true
	) {
		$user = $this->getActualUsername($user);

		if ($password === null) {
			$password = $this->getPasswordForUser($user);
		}

		if ($displayName === null && $setDefault === true) {
			$displayName = $this->getDisplayNameForUser($user);
			if ($displayName === null) {
				$displayName = $this->getDisplayNameForUser('regularuser');
			}
		}

		if ($email === null && $setDefault === true) {
			$email = $this->getEmailAddressForUser($user);

			if ($email === null) {
				$email = $user . '@owncloud.org';
			}
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
						$message = $this->getResponseXml($result)->xpath("/ocs/meta/message");
						if ($message && (string) $message[0] === "User already exists") {
							PHPUnit\Framework\Assert::fail(
								'Could not create user as it already exists. ' .
								'Please delete the user to run tests again.'
							);
						}
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
		$this->theAdministratorGetsAllTheGroupsOfUser($user);
		$respondedArray = $this->getArrayOfGroupsResponded($this->response);
		\sort($respondedArray);
		PHPUnit\Framework\Assert::assertContains($group, $respondedArray);
		PHPUnit\Framework\Assert::assertEquals(
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
		PHPUnit\Framework\Assert::assertNotContains($group, $respondedArray);
		PHPUnit\Framework\Assert::assertEquals(
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
		$this->addUserToGroup($user, $group, "api");
	}

	/**
	 * @When user :user tries to add user :anotheruser to group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 * @param string $group
	 *
	 * @return void
	 */
	public function userTriesToAddUserToGroupUsingTheProvisioningApi($user, $anotheruser, $group) {
		$result = UserHelper::addUserToGroup(
			$this->getBaseUrl(),
			$anotheruser, $group,
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			$this->ocsApiVersion
		);
		$this->response = $result;
	}

	/**
	 * @When user :user tries to add himself to group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userTriesToAddHimselfToGroupUsingTheProvisioningApi($user, $group) {
		$this->userTriesToAddUserToGroupUsingTheProvisioningApi($user, $user, $group);
	}

	/**
	 * @When the administrator tries to add user :user to group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorTriesToAddUserToGroupUsingTheProvisioningApi(
		$user, $group
	) {
		$this->userTriesToAddUserToGroupUsingTheProvisioningApi(
			$this->getAdminUsername(),
			$user,
			$group
		);
	}

	/**
	 * @Given /^user "([^"]*)" has been added to group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasBeenAddedToGroup($user, $group) {
		$this->addUserToGroup($user, $group, null, true);
	}

	/**
	 * @Given /^user "([^"]*)" has been added to database backend group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasBeenAddedToDatabaseBackendGroup($user, $group) {
		$this->addUserToGroup($user, $group, 'api', true);
	}

	/**
	 * @param string $user
	 * @param string $group
	 * @param string $method how to add the user to the group api|occ
	 * @param bool $checkResult if true, then check the status of the operation. default false.
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function addUserToGroup($user, $group, $method = null, $checkResult = false) {
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
					$this->getAdminPassword(),
					$this->ocsApiVersion
				);
				if ($checkResult && ($result->getStatusCode() !== 200)) {
					throw new Exception(
						"could not add user to group. "
						. $result->getStatusCode() . " " . $result->getBody()
					);
				}
				$this->response = $result;
				break;
			case "occ":
				$result = SetupHelper::addUserToGroup($group, $user);
				if ($checkResult && ($result["code"] != 0)) {
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
	 * @throws \Exception
	 */
	public function theAdministratorHasBeenAddedToGroup($group) {
		$admin = $this->getAdminUsername();
		$this->addUserToGroup($admin, $group, null, true);
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
	 * @Given /^group "([^"]*)" has been created in the database user backend$/
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function groupHasBeenCreatedOnDatabaseBackend($group) {
		$this->adminCreatesGroupUsingTheProvisioningApi($group);
		$this->groupShouldExist($group);
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
	 * @param string $user
	 *
	 * @return void
	 */
	public function adminSendsGroupCreationRequestUsingTheProvisioningApi(
		$group, $user = null
	) {
		$bodyTable = new TableNode([['groupid', $group]]);
		$user = $user === null ? $this->getAdminUsername() : $user;
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
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
		$this->adminSendsGroupCreationRequestUsingTheProvisioningApi($group);
		$this->rememberThatGroupIsNotExpectedToExist($group);
	}

	/**
	 * @When /^user "([^"]*)" tries to send a group creation request for group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userTriesToSendGroupCreationRequestUsingTheAPI($user, $group) {
		$this->adminSendsGroupCreationRequestUsingTheProvisioningApi($group, $user);
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
		//guess yourself
		if ($method === null && \getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
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
		$this->disableOrEnableUser($this->getAdminUsername(), $user, 'disable');
	}

	/**
	 * @When user :user disables user :anotheruser using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 *
	 * @return void
	 */
	public function userDisablesUserUsingTheProvisioningApi($user, $anotheruser) {
		$this->disableOrEnableUser($user, $anotheruser, 'disable');
	}

	/**
	 * @When the administrator enables user :user using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorEnablesUserUsingTheProvisioningApi($user) {
		$this->disableOrEnableUser($this->getAdminUsername(), $user, 'enable');
	}

	/**
	 * @When /^user "([^"]*)" (enables|tries to enable) user "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $anotheruser
	 *
	 * @return void
	 */
	public function userTriesToEnableUserUsingTheProvisioningApi(
		$user, $anotheruser
	) {
		$this->disableOrEnableUser($user, $anotheruser, 'enable');
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
	 * @When user :user tries to delete group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userTriesToDeleteGroupUsingTheProvisioningApi($user, $group) {
		$this->response = UserHelper::deleteGroup(
			$this->getBaseUrl(),
			$group,
			$this->getActualUsername($user),
			$this->getActualPassword($user),
			$this->ocsApiVersion
		);
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
		$this->userRemovesUserFromGroupUsingTheProvisioningApi(
			$this->getAdminUsername(), $user, $group
		);
	}

	/**
	 * @When user :user removes user :anotheruser from group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 * @param string $group
	 *
	 * @return void
	 */
	public function userRemovesUserFromGroupUsingTheProvisioningApi(
		$user, $anotheruser, $group
	) {
		$this->userTriesToRemoveUserFromGroupUsingTheProvisioningApi(
			$user, $anotheruser, $group
		);

		if ($this->response->getStatusCode() !== 200) {
			\error_log(
				"INFORMATION: could not remove user '$user' from group '$group'"
				. $this->response->getStatusCode() . " " . $this->response->getBody()
			);
		}
	}

	/**
	 * @When user :user tries to remove user :anotheruser from group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 * @param string $group
	 *
	 * @return void
	 */
	public function userTriesToRemoveUserFromGroupUsingTheProvisioningApi(
		$user, $anotheruser, $group
	) {
		$this->response = UserHelper::removeUserFromGroup(
			$this->getBaseUrl(),
			$anotheruser,
			$group,
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			$this->ocsApiVersion
		);
	}

	/**
	 * @When /^the administrator makes user "([^"]*)" a subadmin of group "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function adminMakesUserSubadminOfGroupUsingTheProvisioningApi(
		$user, $group
	) {
		$this->userMakesUserASubadminOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(), $user, $group
		);
	}

	/**
	 * @When user :user makes user :anotheruser a subadmin of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 * @param string $group
	 *
	 * @return void
	 */
	public function userMakesUserASubadminOfGroupUsingTheProvisioningApi(
		$user, $anotheruser, $group
	) {
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$anotheruser/subadmins";
		$body = ['groupid' => $group];
		$this->response = HttpRequestHelper::post(
			$fullUrl,
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			null,
			$body
		);
	}

	/**
	 * @When the administrator gets all the groups where user :user is subadmin using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheGroupsWhereUserIsSubadminUsingTheProvisioningApi($user) {
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$user/subadmins";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
	}

	/**
	 * @Given /^user "([^"]*)" has been made a subadmin of group "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userHasBeenMadeSubadminOfGroup(
		$user, $group
	) {
		$this->adminMakesUserSubadminOfGroupUsingTheProvisioningApi(
			$user, $group
		);
		PHPUnit\Framework\Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @When the administrator gets all the subadmins of group :group using the provisioning API
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllTheSubadminsOfGroupUsingTheProvisioningApi($group) {
		$this->userGetsAllTheSubadminsOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(), $group
		);
	}

	/**
	 * @When user :user gets all the subadmins of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function userGetsAllTheSubadminsOfGroupUsingTheProvisioningApi($user, $group) {
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v{$this->ocsApiVersion}.php/cloud/groups/$group/subadmins";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getActualUsername($user), $this->getUserPassword($user)
		);
	}

	/**
	 * @When the administrator removes user :user from being a subadmin of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorRemovesUserFromBeingASubadminOfGroupUsingTheProvisioningApi(
		$user, $group
	) {
		$this->userRemovesUserFromBeingASubadminOfGroupUsingTheProvisioningApi(
			$this->getAdminUsername(), $user, $group
		);
	}

	/**
	 * @When user :user removes user :anotheruser from being a subadmin of group :group using the provisioning API
	 *
	 * @param string $user
	 * @param string $anotheruser
	 * @param string $group
	 *
	 * @return void
	 */
	public function userRemovesUserFromBeingASubadminOfGroupUsingTheProvisioningApi(
		$user, $anotheruser, $group
	) {
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$anotheruser/subadmins";
		$this->response = HttpRequestHelper::delete(
			$fullUrl,
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			null,
			['groupid' => $group]
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
			PHPUnit\Framework\Assert::assertEquals(
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
			PHPUnit\Framework\Assert::assertEquals(
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
		PHPUnit\Framework\Assert::assertContains($group, $respondedArray);
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
		PHPUnit\Framework\Assert::assertNotContains($group, $respondedArray);
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
		PHPUnit\Framework\Assert::assertNotContains($user, $respondedArray);
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
		PHPUnit\Framework\Assert::assertEquals(
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
			PHPUnit\Framework\Assert::assertContains($app, $respondedArray);
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
		PHPUnit\Framework\Assert::assertNotContains($appName, $respondedArray);
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
		$this->theAdministratorGetsAllTheSubadminsOfGroupUsingTheProvisioningApi($group);
		PHPUnit\Framework\Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
		$listOfSubadmins = $this->getArrayOfSubadminsResponded($this->response);
		PHPUnit\Framework\Assert::assertContains(
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
		$this->theAdministratorGetsAllTheSubadminsOfGroupUsingTheProvisioningApi($group);
		$listOfSubadmins = $this->getArrayOfSubadminsResponded($this->response);
		PHPUnit\Framework\Assert::assertNotContains(
			$user,
			$listOfSubadmins
		);
	}

	/**
	 * @Then /^the display name returned by the API should be "([^"]*)"$/
	 *
	 * @param string $expectedDisplayName
	 *
	 * @return void
	 */
	public function theDisplayNameReturnedByTheApiShouldBe($expectedDisplayName) {
		$responseDisplayName = (string) $this->getResponseXml()->data[0]->displayname;
		PHPUnit\Framework\Assert::assertEquals(
			$expectedDisplayName,
			$responseDisplayName
		);
	}

	/**
	 * @Then /^the display name of user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $displayname
	 *
	 * @return void
	 */
	public function theDisplayNameOfUserShouldBe($user, $displayname) {
		$this->adminRetrievesTheInformationOfUserUsingTheProvisioningApi($user);
		$this->theDisplayNameReturnedByTheApiShouldBe($displayname);
	}

	/**
	 * @Then /^the email address returned by the API should be "([^"]*)"$/
	 *
	 * @param string $expectedEmailAddress
	 *
	 * @return void
	 */
	public function theEmailAddressReturnedByTheApiShouldBe($expectedEmailAddress) {
		$responseEmailAddress = (string) $this->getResponseXml()->data[0]->email;
		PHPUnit\Framework\Assert::assertEquals(
			$expectedEmailAddress,
			$responseEmailAddress
		);
	}

	/**
	 * @Then /^the email address of user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $expectedEmailAddress
	 *
	 * @return void
	 */
	public function theEmailAddressOfUserShouldBe($user, $expectedEmailAddress) {
		$this->adminRetrievesTheInformationOfUserUsingTheProvisioningApi($user);
		$this->theEmailAddressReturnedByTheApiShouldBe($expectedEmailAddress);
	}

	/**
	 * @Then /^the quota definition returned by the API should be "([^"]*)"$/
	 *
	 * @param string $expectedQuotaDefinition a string that describes the quota
	 *
	 * @return void
	 */
	public function theQuotaDefinitionReturnedByTheApiShouldBe($expectedQuotaDefinition) {
		$responseQuotaDefinition = (string) $this->getResponseXml()->data[0]->quota->definition;
		PHPUnit\Framework\Assert::assertEquals(
			$expectedQuotaDefinition,
			$responseQuotaDefinition
		);
	}

	/**
	 * @Then /^the quota definition of user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $expectedQuotaDefinition
	 *
	 * @return void
	 */
	public function theQuotaDefinitionOfUserShouldBe($user, $expectedQuotaDefinition) {
		$this->adminRetrievesTheInformationOfUserUsingTheProvisioningApi($user);
		$this->theQuotaDefinitionReturnedByTheApiShouldBe($expectedQuotaDefinition);
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
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v2.php/cloud/apps?filter=disabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		$respondedArray = $this->getArrayOfAppsResponded($this->response);
		PHPUnit\Framework\Assert::assertContains($app, $respondedArray);
		PHPUnit\Framework\Assert::assertEquals(
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
		PHPUnit\Framework\Assert::assertContains($app, $respondedArray);
		PHPUnit\Framework\Assert::assertEquals(
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
		PHPUnit\Framework\Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
		$respondedArray = $this->getArrayOfAppInfoResponded($this->response);
		PHPUnit\Framework\Assert::assertArrayHasKey(
			'version',
			$respondedArray,
			"app info returned for $app app does not have a version"
		);
		$appVersion = $respondedArray['version'];
		PHPUnit\Framework\Assert::assertTrue(
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
		PHPUnit\Framework\Assert::assertEquals(
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
		PHPUnit\Framework\Assert::assertEquals(
			"true", $this->getResponseXml()->data[0]->enabled
		);
	}

	/**
	 * @When the administrator sets the quota of user :user to :quota using the provisioning API
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
	}

	/**
	 * @Given the quota of user :user has been set to :quota
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function theQuotaOfUserHasBeenSetTo($user, $quota) {
		$this->adminSetsUserQuotaToUsingTheProvisioningApi($user, $quota);
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @When the administrator gives unlimited quota to user :user using the provisioning API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function adminGivesUnlimitedQuotaToUserUsingTheProvisioningApi($user) {
		$this->adminSetsUserQuotaToUsingTheProvisioningApi($user, 'none');
	}

	/**
	 * @Given user :user has been given unlimited quota
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userHasBeenGivenUnlimitedQuota($user) {
		$this->theQuotaOfUserHasBeenSetTo($user, 'none');
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
				PHPUnit\Framework\Assert::fail(
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
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
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
		PHPUnit\Framework\Assert::assertEmpty(
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
		PHPUnit\Framework\Assert::assertEmpty(
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
		PHPUnit\Framework\Assert::assertEmpty(
			$groupsList,
			"Groups list is not empty but it should be empty"
		);
	}

	/**
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
		SetupHelper::init(
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getBaseUrl(),
			$this->getOcPath()
		);
		$this->runOcc(['app:list', '--output json']);
		$apps = \json_decode($this->getStdOutOfOccCommand(), true);
		$this->enabledApps = \array_keys($apps["enabled"]);
		$this->disabledApps = \array_keys($apps["disabled"]);
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function restoreAppEnabledDisabledState() {
		$this->runOcc(['app:list', '--output json']);
		$apps = \json_decode($this->getStdOutOfOccCommand(), true);
		$currentlyEnabledApps = \array_keys($apps["enabled"]);
		$currentlyDisabledApps = \array_keys($apps["disabled"]);

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
	 * disable or enable user
	 *
	 * @param string $user
	 * @param string $anotheruser
	 * @param string $action
	 *
	 * @return void
	 */
	public function disableOrEnableUser($user, $anotheruser, $action) {
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v{$this->ocsApiVersion}.php/cloud/users/$anotheruser/$action";
		$this->response = HttpRequestHelper::put(
			$fullUrl,
			$this->getActualUsername($user),
			$this->getPasswordForUser($user)
		);
	}

	/**
	 * Returns array of enabled apps
	 *
	 * @return array
	 */
	public function getEnabledApps() {
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v{$this->ocsApiVersion}.php/cloud/apps?filter=enabled";
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
		$fullUrl = $this->getBaseUrl()
		. "/ocs/v{$this->ocsApiVersion}.php/cloud/apps?filter=disabled";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(), $this->getAdminPassword()
		);
		return ($this->getArrayOfAppsResponded($this->response));
	}

	/**
	 * Removes skeleton directory config from config.php and returns the config value
	 *
	 * @return string
	 */
	public function popSkeletonDirectoryConfig() {
		$this->runOcc(["config:system:get skeletondirectory"]);
		$path = \trim($this->getStdOutOfOccCommand());
		$this->runOcc(["config:system:delete skeletondirectory"]);
		return $path;
	}
}
