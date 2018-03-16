<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use TestHelpers\DownloadHelper;
use TestHelpers\SetupHelper;
use TestHelpers\UserHelper;

require_once 'bootstrap.php';

/**
 * WebUIBasicStructure trait
 */
trait WebUIBasicStructure {

	private $regularUserPassword;

	/**
	 * list of users that were created during test runs
	 * key is the username value is an array of user attributes
	 *
	 * @var array
	 */
	private $createdUsers = array();
	private $createdGroupNames = array();

	/**
	 * @When user admin logs in using the webUI
	 * @Given user admin has logged in using the webUI
	 *
	 * @return void
	 */
	public function adminLogsInUsingTheWebUI() {
		$this->loginPage->open();
		$this->loginAs(
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @param string $username
	 * @param string $password
	 * @param string $target
	 *
	 * @return \Page\OwncloudPage
	 */
	public function loginAs($username, $password, $target = 'FilesPage') {
		$session = $this->getSession();
		$this->loginPage->waitTillPageIsLoaded($session);
		$nextPage = $this->loginPage->loginAs(
			$username,
			$password,
			$target
		);
		$nextPage->waitTillPageIsLoaded($session);
		$this->setCurrentUser($username);
		$this->setCurrentServer(null);
		return $nextPage;
	}

	/**
	 * @When the user/administrator logs out of the webUI
	 * @Given the user/administrator has logged out of the webUI
	 *
	 * @return void
	 */
	public function theUserLogsOutOfTheWebUI() {
		$settingsMenu = $this->owncloudPage->openSettingsMenu();
		$settingsMenu->logout();
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
		if ($this->webUIFilesContext !== null) {
			$this->webUIFilesContext->resetFilesContext();
		}
	}

	/**
	 * @Given /^these users have been created\s?(but not initialized|):$/
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * displayname & email are optional
	 *
	 * @param string $doNotInitialize just create the user, do not trigger creating skeleton files etc
	 * @param TableNode $table
	 *
	 * @return void
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
			$this->createUser(
				$row ['username'],
				$row ['password'],
				$displayName,
				$email,
				($doNotInitialize === "")
			);
		}
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
	 * creates a single user
	 *
	 * @param string $user
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 * @param bool $initialize initialize the user skeleton files etc
	 * @param string $method how to create the user api|occ
	 *
	 * @return void
	 * @throws Exception
	 */
	private function createUser(
		$user, $password, $displayName = null, $email = null, $initialize = true,
		$method = null
	) {
		if ($method === null && getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			//guess yourself
			$method = "ldap";
		} elseif ($method === null) {
			$method = "api";
		}
		$user = trim($user);
		$method = trim(strtolower($method));
		$baseUrl = $this->getMinkParameter("base_url");
		switch ($method) {
			case "api":
				$results = UserHelper::createUser(
					$baseUrl, $user, $password,
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
						"could not create user. "
						. $result["stdOut"] . " " . $result["stdErr"]
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
	 * Download a skeleton file. That will force the server to fully
	 * initialize the user, including their skeleton files.
	 * 
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	public function initializeUser($user, $password) {
		$baseUrl = $this->getMinkParameter("base_url");
		DownloadHelper::download(
			$baseUrl,
			$user,
			$password,
			"lorem.txt"
		);
	}
	/**
	 * @Given these groups have been created:
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theseGroupsHaveBeenCreated(TableNode $table) {
		foreach ($table as $row) {
			$this->createGroup($row['groupname']);
		}
	}

	/**
	 * creates a single group
	 *
	 * @param string $group
	 * @param string $method how to create the group api|occ
	 *
	 * @return void
	 * @throws Exception
	 */
	private function createGroup($group, $method = null) {
		if ($method === null && getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			//guess yourself
			$method = "ldap";
		} elseif ($method === null) {
			$method = "api";
		}
		$group = trim($group);
		$method = trim(strtolower($method));
		switch ($method) {
			case "api":
				$result = UserHelper::createGroup(
					$this->getMinkParameter("base_url"),
					$group,
					$this->getAdminUsername(),
					$this->getAdminPassword()
				);
				if ($result->getStatusCode() !== 200) {
					throw new Exception(
						"could not create group. "
						. $result->getStatusCode() . " " . $result->getBody()
					);
				}
				break;
			case "occ":
				$result = SetupHelper::createGroup($group);
				if ($result["code"] != 0) {
					throw new Exception(
						"could not create group. "
						. $result["stdOut"] . " " . $result["stdErr"]
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
		$this->addGroupToCreatedGroupsList($group);
	}

	/**
	 * @Given user :user has been added to group :group ready for use by the webUI
	 *
	 * @param string $user
	 * @param string $group
	 * @param string $method how to add the user to the group api|occ
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasBeenAddedToGroup($user, $group, $method = null) {
		if ($method === null && getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			//guess yourself
			$method = "ldap";
		} elseif ($method === null) {
			$method = "api";
		}
		$method = trim(strtolower($method));
		switch ($method) {
			case "api":
				$result = UserHelper::addUserToGroup(
					$this->getMinkParameter("base_url"), 
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
						"could not add user to group. "
						. $result["stdOut"] . " " . $result["stdErr"]
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
	 * @BeforeScenario @webUI
	 * @TestAlsoOnExternalUserBackend
	 *
	 * @return void
	 */
	public function setUpExternalUserBackends() {
		//TODO make it smarter to be able also to work with other backends 
		if (getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			$result = SetupHelper::runOcc(
				["user:sync", "OCA\User_LDAP\User_Proxy", "-m remove"]
			);
			if ((int)$result['code'] !== 0) {
				throw new Exception(
					"could not sync users with LDAP. stdOut:\n" .
					$result['stdOut'] . "\n" .
					"stdErr:\n" .
					$result['stdErr'] . "\n"
				);
			}
		}
	}

	/**
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenarioGetRegularUsersAndGroups(
		BeforeScenarioScope $scope
	) {
		$suiteParameters = SetupHelper::getSuiteParameters($scope);
		$this->regularUserPassword = (string)$suiteParameters['regularUserPassword'];
	}

	/**
	 * @AfterScenario @webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function tearDownScenarioDeleteCreatedUsersAndGroups() {
		$baseUrl = $this->getMinkParameter("base_url");
		foreach ($this->getCreatedUsers() as $username => $user) {
			$result = UserHelper::deleteUser(
				$baseUrl,
				$username,
				$this->getAdminUsername(),
				$this->getAdminPassword()
			);
			
			if ($user['shouldHaveBeenCreated'] && ($result->getStatusCode() !== 200)) {
				error_log(
					"INFORMATION: could not delete user '" . $username . "' "
					. $result->getStatusCode() . " " . $result->getBody()
				);
			}
		}

		foreach ($this->getCreatedGroupNames() as $group) {
			$result = UserHelper::deleteGroup(
				$baseUrl,
				$group,
				$this->getAdminUsername(),
				$this->getAdminPassword()
			);
			
			if ($result->getStatusCode() !== 200) {
				error_log(
					"INFORMATION: could not delete group. '" . $group . "'"
					. $result->getStatusCode() . " " . $result->getBody()
				);
			}
		}
	}

	/**
	 * @return string
	 */
	public function getRegularUserPassword() {
		return $this->regularUserPassword;
	}

	/**
	 * @return array
	 */
	public function getCreatedUserNames() {
		return array_keys($this->createdUsers);
	}

	/**
	 * @return array
	 */
	public function getCreatedUsers() {
		return $this->createdUsers;
	}

	/**
	 * returns an array of the real displayed names
	 * if no "Display Name" is set the user-name is returned instead
	 *
	 * @return array
	 */
	public function getCreatedUserDisplayNames() {
		$result = array();
		foreach ($this->getCreatedUsers() as $username => $user) {
			if (is_null($user['displayname'])) {
				$result[] = $username;
			} else {
				$result[] = $user['displayname'];
			}
		}
		return $result;
	}

	/**
	 * @return array
	 */
	public function getCreatedGroupNames() {
		return $this->createdGroupNames;
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
	 * @param bool $shouldHaveBeenCreated
	 *
	 * @return void
	 */
	public function addUserToCreatedUsersList(
		$user, $password, $displayName = null, $email = null, $shouldHaveBeenCreated = true
	) {
		$this->createdUsers [$user] = [
			"password" => $password,
			"displayname" => $displayName,
			"email" => $email,
			"shouldHaveBeenCreated" => $shouldHaveBeenCreated
		];
	}

	/**
	 * adds a group to the list of groups that were created during test runs
	 * makes it possible to use this list in other test steps
	 * or to delete them at the end of the test
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function addGroupToCreatedGroupsList($group) {
		if (!in_array($group, $this->createdGroupNames, true)) {
			array_push($this->createdGroupNames, $group);
		}
	}

	/**
	 * deletes a group from the lists of groups that were created during test runs
	 * useful if a group got created during the setup phase but got deleted in a
	 * test run. We don't want to try to delete this group again in the tear-down phase
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function deleteGroupFromCreatedGroupsList($group) {
		if (($key = array_search($group, $this->createdGroupNames, true)) !== false) {
			unset($this->createdGroupNames[$key]);
		}
	}

	/**
	 * @return string
	 */
	public function getAdminUsername() {
		return (string) $this->adminUsername;
	}

	/**
	 * @return string
	 */
	public function getAdminPassword() {
		return (string) $this->adminPassword;
	}

	/**
	 *
	 * @param string $username
	 *
	 * @return string password
	 * @throws Exception
	 */
	public function getUserPassword($username) {
		if ($username === $this->getAdminUsername()) {
			$password = $this->getAdminPassword();
		} else {
			if (!array_key_exists($username, $this->createdUsers)) {
				throw new Exception(
					"user '$username' was not created by this test run"
				);
			}
			$password = $this->createdUsers[$username]['password'];
		}
		//make sure the function always returns a string
		return (string) $password;
	}

	/**
	 * gets the base url but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getBaseUrlWithoutScheme() {
		return preg_replace(
			"(^https?://)", "", $this->getMinkParameter('base_url')
		);
	}

	/**
	 * substitutes codes like %base_url% with the value
	 * if the given value does not have anything to be substituted
	 * then it is returned unmodified
	 *
	 * @param string $value
	 *
	 * @return string
	 */
	public function substituteInLineCodes($value) {
		$substitutions = [
			[
				"code" => "%base_url%",
				"function" => [
					$this,
					"getMinkParameter"
				],
				"parameter" => [
					"base_url"
				]
			],
			[
				"code" => "%remote_server%",
				"function" => "getenv",
				"parameter" => [
					"REMOTE_FED_BASE_URL"
				]
			],
			[
				"code" => "%local_server%",
				"function" => [
					$this,
					"getBaseUrlWithoutScheme"
				],
				"parameter" => [ ]
			]
		];
		foreach ($substitutions as $substitution) {
			$value = str_replace(
				$substitution["code"],
				call_user_func_array(
					$substitution["function"],
					$substitution["parameter"]
				),
				$value
			);
		}
		return $value;
	}
}
