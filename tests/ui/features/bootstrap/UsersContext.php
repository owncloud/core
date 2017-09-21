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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Exception\ExpectationException;

use Page\UsersPage;

require_once 'bootstrap.php';

/**
 * Users context.
 */
class UsersContext extends RawMinkContext implements Context {


	private $usersPage;
	private $featureContext;

	/**
	 * UsersContext constructor.
	 *
	 * @param UsersPage $usersPage
	 */
	public function __construct(UsersPage $usersPage) {
		$this->usersPage = $usersPage;
	}

	/**
	 * @Given I am on the users page
	 * @return void
	 */
	public function iAmOnTheUsersPage() {
		$this->usersPage->open();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
	}
	
	/**
	 * substitute codes like "%regularuser%" with the actual name of the user
	 *
	 * @param string $username
	 * @return string
	 * @Transform :username
	 */
	public function checkUsername($username) {
		return $this->featureContext->substituteInLineCodes($username);
	}

	/**
	 * @Given quota of user :username is set/changed to :quota
	 * @param string $username
	 * @param string $quota
	 * @return void
	 */
	public function quotaOfUserIsSetTo($username, $quota) {
		$this->usersPage->setQuotaOfUserTo($username, $quota, $this->getSession());
	}

	/**
	 * @When /^I create a user with the name "([^"]*)" (?:and )?the password "([^"]*)"(?: and the email "([^"]*)")?(?: that is member of these groups)?$/
	 * @param string $username
	 * @param string $password
	 * @param string $email
	 * @param TableNode $groupsTable table of groups with a heading | group |
	 * @return void
	 */
	public function iCreateAUserInTheGUI(
		$username, $password, $email=null, TableNode $groupsTable=null
	) {
		if (!is_null($groupsTable)) {
			$groups = $groupsTable->getColumn(0);
			//get rid of the header
			unset($groups[0]);
		} else {
			$groups = null;
		}
		$this->usersPage->createUser(
			$this->getSession(), $username, $password, $email, $groups
		);
		$this->featureContext->addUserToCreatedUsersList(
			$username, $password, $email
		);
		if (is_array($groups)) {
			foreach ($groups as $group) {
				$this->featureContext->addGroupToCreatedGroupsList($group);
			}
		}
	}

	/**
	 * @When the users page is reloaded
	 * @return void
	 */
	public function theUsersPageIsReloaded() {
		$this->getSession()->reload();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Then quota of user :username should be set to :quota
	 * @param string $username
	 * @param string $quota
	 * @return void
	 * @throws ExpectationException
	 */
	public function quotaOfUserShouldBeSetTo($username, $quota) {
		$setQuota = trim($this->usersPage->getQuotaOfUser($username));
		if ($setQuota !== $quota) {
			throw new ExpectationException(
				'Users quota is set to "' . $setQuota . '" expected "' .
				$quota . '"', $this->getSession()
			);
		}
	}

	/**
	 * This will run before EVERY scenario.
	 *
	 * @param BeforeScenarioScope $scope
	 * @return void
	 * @BeforeScenario
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
