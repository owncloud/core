<?php
/**
 * ownCloud
*
* @author Artur Neumann
* @copyright 2017 Artur Neumann info@individual-it.net
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Gherkin\Node\TableNode;
use TestHelpers\SetupHelper;

require_once 'bootstrap.php';

/**
 * Features context.
 */
trait BasicStructure
{
	private $adminPassword;
	private $regularUserPassword;
	private $regularUserName;
	private $regularUserNames = array();
	/**
	 * list of users that were created during test runs
	 * key is the username value is an array of user attributes
	 * @var array
	 */
	private $createdUsers = array();
	private $regularGroupName;
	private $regularGroupNames = array();
	private $createdGroupNames = array();
	private $ocPath;

	/**
	 * @Given I am logged in as admin
	 */
	public function iAmLoggedInAsAdmin()
	{
		$this->loginPage->open();
		$this->filesPage = $this->loginPage->loginAs("admin", "admin");
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given I am logged in as a regular user
	 */
	public function iAmLoggedInAsARegularUser()
	{
		$this->loginPage->open();
		$this->filesPage = $this->loginPage->loginAs($this->regularUserName, $this->regularUserPassword);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given a regular user exists
	 */
	public function aRegularUserExists()
	{
		$this->createUser($this->regularUserName, $this->regularUserPassword);
	}

	/**
	 * @Given regular users exist
	 */
	public function regularUsersExist()
	{
		foreach ($this->regularUserNames as $user) {
			$this->createUser($user, $this->regularUserPassword);
		}
	}

	/**
	 * @Given these users exist:
	 * expects a table of users with the heading "|username|password|displayname|email|"
	 * displayname & email are optional
	 */
	public function theseUsersExist(TableNode $table)
	{
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
				$row ['username'], $row ['password'], $displayName, $email
			);
		}
	}
	
	/**
	 * creates a single user
	 * @param string $user
	 * @param string $password
	 * @param string $displayName
	 * @param string $email
	 * @throws Exception
	 */
	private function createUser($user, $password,
		$displayName = null, $email = null)
	{
		$user = trim($user);
		$result = SetupHelper::createUser(
			$this->ocPath, $user, $password, $displayName, $email
		);
		if ($result["code"] != 0) {
			throw new Exception("could not create user. " . $result["stdOut"] . " " . $result["stdErr"]);
		}
		$this->createdUsers [$user] = [ 
				"password" => $password,
				"displayname" => $displayName,
				"email" => $email
		];
	}
	/**
	 * @Given these groups exist:
	 * expects a table of groups with the heading "groupname"
	 */
	public function theseGroupsExist(TableNode $table)
	{
		foreach ($table as $row) {
			$this->createGroup($row['groupname']);
		}
	}
	
	/**
	 * @Given a regular group exists
	 */
	public function aRegularGroupExists()
	{
		$this->createGroup($this->regularGroupName);
	}

	/**
	 * @Given regular groups exist
	 */
	public function regularGroupsExist()
	{
		foreach ($this->regularGroupNames as $group) {
			$this->createGroup($group);
		}
	}

	/**
	 * creates a single group
	 * @param string $group
	 * @throws Exception
	 */
	private function createGroup($group)
	{
		$group = trim($group);
		$result=SetupHelper::createGroup($this->ocPath, $group);
		if ($result["code"] != 0) {
			throw new Exception("could not create group. " . $result["stdOut"] . " " . $result["stdErr"]);
		}
		array_push($this->createdGroupNames, $group);
	}
	/**
	 * @Given a regular user is in a regular group
	 */
	public function aRegularUserIsInARegularGroup()
	{
		$group = $this->regularGroupName;
		$user = $this->regularUserName;
		if (!in_array($user, $this->getCreatedUserNames())) {
			$this->aRegularUserExists();
		}
		$this->theUserIsInTheGroup($user, $group);
	}
	
	/**
	 * @Given the user :user is in the group :group
	 */
	public function theUserIsInTheGroup($user, $group)
	{
		$result=SetupHelper::addUserToGroup($this->ocPath, $group, $user);
		if ($result["code"] != 0) {
			throw new Exception("could not add user to group. " . $result["stdOut"] . " " . $result["stdErr"]);
		}
	}

	/** @BeforeScenario */
	public function setUpScenarioGetRegularUsersAndGroups(BeforeScenarioScope $scope)
	{
		$suiteParameters = $scope->getEnvironment()->getSuite()->getSettings() ['context'] ['parameters'];
		$this->adminPassword = (string)$suiteParameters['adminPassword'];
		$this->regularUserNames = explode(",", $suiteParameters['regularUserNames']);
		$this->regularUserName = (string)$suiteParameters['regularUserName'];
		$this->regularUserPassword = (string)$suiteParameters['regularUserPassword'];
		$this->regularGroupNames = explode(",", $suiteParameters['regularGroupNames']);
		$this->regularGroupName = (string)$suiteParameters['regularGroupName'];
		$this->ocPath = rtrim($suiteParameters['ocPath'], '/') . '/';
	}

	/** @AfterScenario */
	public function tearDownScenarioDeleteCreatedUsersAndGroups(AfterScenarioScope $scope)
	{
		foreach ($this->getCreatedUserNames() as $user) {
			$result=SetupHelper::deleteUser($this->ocPath, $user);
			if ($result["code"] != 0) {
				throw new Exception("could not delete user. " . $result["stdOut"] . " " . $result["stdErr"]);
			}
		}

		foreach ($this->getCreatedGroupNames() as $group) {
			$result=SetupHelper::deleteGroup($this->ocPath, $group);
			if ($result["code"] != 0) {
				throw new Exception("could not delete group. " . $result["stdOut"] . " " . $result["stdErr"]);
			}
		}
	}

	public function getRegularUserPassword ()
	{
		return $this->regularUserPassword;
	}

	public function getRegularUserName ()
	{
		return $this->regularUserName;
	}

	public function getRegularUserNames ()
	{
		return $this->regularUserNames;
	}

	public function getCreatedUserNames ()
	{
		return array_keys($this->createdUsers);
	}

	public function getRegularGroupName ()
	{
		return $this->regularGroupName;
	}

	public function getRegularGroupNames ()
	{
		return $this->regularGroupNames;
	}

	public function getCreatedGroupNames ()
	{
		return $this->createdGroupNames;
	}

	/**
	 *
	 * @param string $username
	 * @return string password
	 */
	public function getUserPassword ($username)
	{
		if ($username === 'admin') {
			$password = $this->adminPassword;
		} else {
			if (!array_key_exists($username, $this->createdUsers)) {
				throw new Exception("user '$username' was not created by this test run");
			}
			$password = $this->createdUsers[$username]['password'];
		}
		//make sure the function always returns a string
		return (string) $password;
	}

	/**
	 * substitutes codes like %base_url% with the value
	 * @param string $value
	 * @return string
	 */
	public function substituteInLineCodes ($value) {
		//the only code so far, maybe we will need more one day
		return str_replace("%base_url%",  $this->getMinkParameter("base_url"), $value);
	}
}
