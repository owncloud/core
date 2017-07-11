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
use TestHelpers\SetupHelper;

require_once 'bootstrap.php';

/**
 * Features context.
 */
trait BasicStructure
{
	private $regularUserPassword;
	private $regularUserName;
	private $regularUserNames = array();
	private $createdUserNames = array();
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
		$user = $this->regularUserName;
		$result=SetupHelper::createUser($this->ocPath, $user, $this->regularUserPassword);
		if ($result["code"] != 0) {
			throw new Exception("could not create user. " . $result["stdOut"] . " " . $result["stdErr"]);
		}
		array_push($this->createdUserNames, $user);
	}

	/**
	 * @Given regular users exist
	 */
	public function regularUsersExist()
	{
		foreach ($this->regularUserNames as $user) {
			$user = trim($user);
			$result=SetupHelper::createUser($this->ocPath, $user, $this->regularUserPassword);
			if ($result["code"] != 0) {
				throw new Exception("could not create user. " . $result["stdOut"] . " " . $result["stdErr"]);
			}
			array_push($this->createdUserNames, $user);
		}
	}

	/**
	 * @Given a regular group exists
	 */
	public function aRegularGroupExists()
	{
		$group = $this->regularGroupName;
		$result=SetupHelper::createGroup($this->ocPath, $group);
		if ($result["code"] != 0) {
			throw new Exception("could not create group. " . $result["stdOut"] . " " . $result["stdErr"]);
		}
		array_push($this->createdGroupNames, $group);
	}

	/**
	 * @Given regular groups exist
	 */
	public function regularGroupsExist()
	{
		foreach ($this->regularGroupNames as $group) {
			$group = trim($group);
			$result=SetupHelper::createGroup($this->ocPath, $group);
			if ($result["code"] != 0) {
				throw new Exception("could not create group. " . $result["stdOut"] . " " . $result["stdErr"]);
			}
			array_push($this->createdGroupNames, $group);
		}
	}

	/**
	 * @Given a regular user is in a regular group
	 */
	public function aRegularUserIsInARegularGroup()
	{
		$group = $this->regularGroupName;
		$user = $this->regularUserName;
		if (!in_array($user, $this->createdUserNames)) {
			$this->aRegularUserExists();
		}

		$result=SetupHelper::addUserToGroup($this->ocPath, $group, $user);
		if ($result["code"] != 0) {
			throw new Exception("could not add user to group. " . $result["stdOut"] . " " . $result["stdErr"]);
		}
		array_push($this->createdGroupNames, $group);
	}

	/** @BeforeScenario */
	public function setUpScenarioGetRegularUsersAndGroups(BeforeScenarioScope $scope)
	{
		$suiteParameters = $scope->getEnvironment()->getSuite()->getSettings() ['context'] ['parameters'];
		$this->regularUserNames = explode(",", $suiteParameters['regularUserNames']);
		$this->regularUserName = $suiteParameters['regularUserName'];
		$this->regularUserPassword = $suiteParameters['regularUserPassword'];
		$this->regularGroupNames = explode(",", $suiteParameters['regularGroupNames']);
		$this->regularGroupName = $suiteParameters['regularGroupName'];
		$this->ocPath = rtrim($suiteParameters['ocPath'], '/') . '/';
	}

	/** @AfterScenario */
	public function tearDownScenarioDeleteCreatedUsersAndGroups(AfterScenarioScope $scope)
	{
		foreach ($this->createdUserNames as $user) {
			$result=SetupHelper::deleteUser($this->ocPath, $user);
			if ($result["code"] != 0) {
				throw new Exception("could not delete user. " . $result["stdOut"] . " " . $result["stdErr"]);
			}
		}

		foreach ($this->createdGroupNames as $group) {
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
		return $this->createdUserNames;
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
}
