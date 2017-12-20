<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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
 * BasicStructure trait
 */
trait BasicStructure {

	private $regularUserPassword;
	private $regularUserName;
	private $regularUserNames = array();
	
	/**
	 * list of users that were created during test runs
	 * key is the username value is an array of user attributes
	 *
	 * @var array
	 */
	private $createdUsers = array();
	private $regularGroupName;
	private $regularGroupNames = array();
	private $createdGroupNames = array();

	/**
	 * @Given I am logged in as admin
	 * @return void
	 */
	public function iAmLoggedInAsAdmin() {
		$this->loginPage->open();
		$this->loginAs("admin", $this->getUserPassword("admin"));
	}

	/**
	 * @Given I am logged in as a regular user
	 * @return void
	 */
	public function iAmLoggedInAsARegularUser() {
		$this->loginPage->open();
		$this->loginAsARegularUser();
	}

	/**
	 * @return Page\OwncloudPage
	 */
	public function loginAsARegularUser() {
		return $this->loginAs(
			$this->getRegularUserName(),
			$this->getRegularUserPassword()
		);
	}

	/**
	 * @param string $username
	 * @param string $password
	 * @param string $target
	 * @return \Page\OwncloudPage
	 */
	public function loginAs($username, $password, $target = 'FilesPage') {
		$nextPage = $this->loginPage->loginAs(
			$username,
			$password,
			$target
		);
		$nextPage->waitTillPageIsLoaded($this->getSession());
		$this->setCurrentUser($username);
		$this->setCurrentServer(null);
		return $nextPage;
	}

	/**
	 * @When I logout
	 * @return void
	 */
	public function iLogout() {
		$settingsMenu = $this->owncloudPage->openSettingsMenu();
		$settingsMenu->logout();
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
		if ($this->filesContext !== null) {
			$this->filesContext->resetFilesContext();
		}
	}

	/**
	 * @Given /^a regular user exists\s?(but is not initialized|)$/
	 * @param string $doNotInitialize just create the user, do not trigger creating skeleton files etc
	 * @return void
	 */
	public function aRegularUserExists($doNotInitialize = "") {
		$this->createUser(
			$this->getRegularUserName(),
			$this->getRegularUserPassword(),
			null,
			null,
			($doNotInitialize === "")
		);
	}

	/**
	 * @Given /^regular users exist\s?(but are not initialized|)$/
	 * @param string $doNotInitialize just create the user, do not trigger creating skeleton files etc
	 * @return void
	 */
	public function regularUsersExist($doNotInitialize) {
		foreach ($this->getRegularUserNames() as $user) {
			$this->createUser(
				$user,
				$this->getRegularUserPassword(),
				null,
				null,
				($doNotInitialize === "")
			);
		}
	}

	/**
	 * @Given /^these users exist\s?(but are not initialized|):$/
	 * expects a table of users with the heading
	 * "|username|password|displayname|email|"
	 * displayname & email are optional
	 *
	 * @param string $doNotInitialize just create the user, do not trigger creating skeleton files etc
	 * @param TableNode $table
	 * @return void
	 */
	public function theseUsersExist($doNotInitialize, TableNode $table) {
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
	 * creates a single user
	 *
	 * @param string $user
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 * @param bool $initialize initialize the user skeleton files etc
	 * @param string $method how to create the user api|occ
	 * @return void
	 * @throws Exception
	 */
	private function createUser(
		$user, $password, $displayName = null, $email = null, $initialize = true,
		$method = "api"
	) {
		$user = trim($user);
		$method = trim(strtolower($method));
		$baseUrl = $this->getMinkParameter("base_url");
		switch ($method) {
			case "api":
				$results = UserHelper::createUser(
					$baseUrl, $user, $password, "admin",
					$this->getUserPassword("admin"),
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
			default:
				throw new InvalidArgumentException(
					"Invalid method to create a user"
				);
		}

		$this->addUserToCreatedUsersList($user, $password, $displayName, $email);
		if ($initialize) {
			// Download a skeleton file. That will force the server to fully
			// initialize the user, including their skeleton files.
			DownloadHelper::download(
				$baseUrl,
				$user,
				$password,
				"lorem.txt"
			);
		}
	}

	/**
	 * @Given these groups exist:
	 * expects a table of groups with the heading "groupname"
	 * @param TableNode $table
	 * @return void
	 */
	public function theseGroupsExist(TableNode $table) {
		foreach ($table as $row) {
			$this->createGroup($row['groupname']);
		}
	}

	/**
	 * @Given a regular group exists
	 * @return void
	 */
	public function aRegularGroupExists() {
		$this->createGroup($this->regularGroupName);
	}

	/**
	 * @Given regular groups exist
	 * @return void
	 */
	public function regularGroupsExist() {
		foreach ($this->regularGroupNames as $group) {
			$this->createGroup($group);
		}
	}

	/**
	 * creates a single group
	 *
	 * @param string $group
	 * @param string $method how to create the group api|occ
	 * @return void
	 * @throws Exception
	 */
	private function createGroup($group, $method = "api") {
		$group = trim($group);
		$method = trim(strtolower($method));
		switch ($method) {
			case "api":
				$result = UserHelper::createGroup(
					$this->getMinkParameter("base_url"),
					$group, "admin", $this->getUserPassword("admin")
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
			default:
				throw new InvalidArgumentException(
					"Invalid method to create a group"
				);
		}
		$this->addGroupToCreatedGroupsList($group);
	}
	/**
	 * @Given a regular user is in a regular group
	 * @return void
	 */
	public function aRegularUserIsInARegularGroup() {
		$group = $this->getRegularGroupName();
		$user = $this->getRegularUserName();
		if (!in_array($user, $this->getCreatedUserNames())) {
			$this->aRegularUserExists();
		}
		$this->theUserIsInTheGroup($user, $group);
	}

	/**
	 * @Given the user :user is in the group :group
	 * @param string $user
	 * @param string $group
	 * @param string $method how to add the user to the group api|occ
	 * @return void
	 * @throws Exception
	 */
	public function theUserIsInTheGroup($user, $group, $method = "api") {
		$method = trim(strtolower($method));
		switch ($method) {
			case "api":
				$result = UserHelper::addUserToGroup(
					$this->getMinkParameter("base_url"), 
					$user, $group, "admin", $this->getUserPassword("admin")
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
			default:
				throw new InvalidArgumentException(
					"Invalid method to add a user to a group"
				);
		}
	}

	/**
	 * @param BeforeScenarioScope $scope
	 * @return void
	 * @BeforeScenario
	 */
	public function setUpScenarioGetRegularUsersAndGroups(
		BeforeScenarioScope $scope
	) {
		$suiteParameters = SetupHelper::getSuiteParameters($scope);
		$this->regularUserNames = explode(
			",",
			$suiteParameters['regularUserNames']
		);
		$this->regularUserName = (string)$suiteParameters['regularUserName'];
		$this->regularUserPassword = (string)$suiteParameters['regularUserPassword'];
		$this->regularGroupNames = explode(
			",",
			$suiteParameters['regularGroupNames']
		);
		$this->regularGroupName = (string)$suiteParameters['regularGroupName'];
	}

	/**
	 * @return void
	 * @throws Exception
	 * @AfterScenario
	 */
	public function tearDownScenarioDeleteCreatedUsersAndGroups() {
		$baseUrl = $this->getMinkParameter("base_url");
		foreach ($this->getCreatedUserNames() as $user) {
			$result = UserHelper::deleteUser(
				$baseUrl,
				$user,
				"admin",
				$this->getUserPassword("admin")
			);
			
			if ($result->getStatusCode() !== 200) {
				error_log(
					"INFORMATION: could not delete user. '" . $user . "'"
					. $result->getStatusCode() . " " . $result->getBody()
				);
			}
		}

		foreach ($this->getCreatedGroupNames() as $group) {
			$result = UserHelper::deleteGroup(
				$baseUrl,
				$group,
				"admin",
				$this->getUserPassword("admin")
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
	 * @return string
	 */
	public function getRegularUserName() {
		return $this->regularUserName;
	}

	/**
	 * @return array
	 */
	public function getRegularUserNames() {
		return $this->regularUserNames;
	}

	/**
	 * @return array
	 */
	public function getCreatedUserNames() {
		return array_keys($this->createdUsers);
	}

	/**
	 * @return string
	 */
	public function getRegularGroupName() {
		return $this->regularGroupName;
	}

	/**
	 * @return array
	 */
	public function getRegularGroupNames() {
		return $this->regularGroupNames;
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
	 * @return void
	 */
	public function addUserToCreatedUsersList(
		$user, $password, $displayName = null, $email = null
	) {
		$this->createdUsers [$user] = [
			"password" => $password,
			"displayname" => $displayName,
			"email" => $email
		];
	}

	/**
	 * adds a group to the list of groups that were created during test runs
	 * makes it possible to use this list in other test steps
	 * or to delete them at the end of the test
	 *
	 * @param string $group
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
	 * @return void
	 */
	public function deleteGroupFromCreatedGroupsList($group) {
		if (($key = array_search($group, $this->createdGroupNames, true)) !== false) {
			unset($this->createdGroupNames[$key]);
		}
	}

	/**
	 *
	 * @param string $username
	 * @return string password
	 * @throws Exception
	 */
	public function getUserPassword($username) {
		if ($username === 'admin') {
			$password = $this->adminPassword;
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
			],
			[
				"code" => "%regularuser%",
				"function" => [
					$this,
					"getRegularUserName"
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
