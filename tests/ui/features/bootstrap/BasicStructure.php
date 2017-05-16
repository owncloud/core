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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Page\OwncloudPage;
use Page\LoginPage;

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
	private $ocPath;

	/**
	 * @Given I am logged in as admin
	 */
	public function iAmLoggedInAsAdmin()
	{
		$this->loginPage->open();
		$this->filesPage = $this->loginPage->loginAs("admin", "admin");
		$this->filesPage->waitTillPageIsloaded(10);
	}

	/**
	 * @Given I am logged in as a regular user
	 */
	public function iAmLoggedInAsARegularUser()
	{
		$this->loginPage->open();
		$this->filesPage = $this->loginPage->loginAs($this->regularUserName, $this->regularUserPassword);
		$this->filesPage->waitTillPageIsloaded(10);
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

	/** @BeforeScenario */
	public function setUpScenarioGetRegularUsersList(BeforeScenarioScope $scope)
	{
		$suiteParameters = $scope->getEnvironment()->getSuite()->getSettings() ['context'] ['parameters'];
		$this->regularUserNames = explode(",", $suiteParameters['regularUserNames']);
		$this->regularUserName = $suiteParameters['regularUserName'];
		$this->regularUserPassword = $suiteParameters['regularUserPassword'];
		$this->ocPath = rtrim($suiteParameters['ocPath'], '/') . '/';
	}

	/** @AfterScenario */
	public function tearDownScenarioDeleteCreatedUsers(AfterScenarioScope $scope)
	{
		foreach ($this->createdUserNames as $user) {
			$result=SetupHelper::deleteUser($this->ocPath, $user);
			if ($result["code"] != 0) {
				throw new Exception("could not delete user. " . $result["stdOut"] . " " . $result["stdErr"]);
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
	
	public function waitForOutstandingAjaxCalls ($time = 5000)
	{
		for($counter=0;$counter<=($time/1000);$counter++) {
			try {
				$this->getSession()->wait($time, "(typeof jQuery != 'undefined' && (0 === jQuery.active))");
				break;
			} catch (Exception $e) {
				sleep(1);
			}
		}
	}
}
