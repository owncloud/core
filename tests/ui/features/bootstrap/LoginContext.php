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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\LoginPage;

require_once 'bootstrap.php';

/**
 * Login context.
 */
class LoginContext extends RawMinkContext implements Context {

	private $loginPage;
	private $filesPage;
	private $expectedPage;
	/**
	 * 
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * LoginContext constructor.
	 *
	 * @param LoginPage $loginPage
	 */
	public function __construct(LoginPage $loginPage) {
		$this->loginPage = $loginPage;
	}

	/**
	 * @Given I am on the login page
	 * @return void
	 */
	public function iAmOnTheLoginPage() {
		$this->loginPage->open();
	}

	/**
	 * @When I relogin with username :username and password :password
	 * @param string $username
	 * @param string $password
	 * @return void
	 */
	public function iReloginWithUsernameAndPassword($username, $password) {
		$this->featureContext->iLogout();
		$this->iLoginWithUsernameAndPassword($username, $password);
	}

	/**
	 * @When I login with username :username and password :password
	 * @param string $username
	 * @param string $password
	 * @return void
	 */
	public function iLoginWithUsernameAndPassword($username, $password) {
		$this->filesPage = $this->featureContext->loginAs($username, $password);
	}

	/**
	 * @When I relogin with username :username and password :password to :server
	 * @param string $username
	 * @param string $password
	 * @param string $server
	 * @return void
	 */
	public function iReloginWithUsernameAndPasswordToSrv(
		$username, $password, $server
	) {
		$this->featureContext->iLogout();
		$this->iLoginWithUsernameAndPasswordToSrv($username, $password, $server);
	}

	/**
	 * @When I login with username :username and password :password to :server
	 * @param string $username
	 * @param string $password
	 * @param string $server
	 * @return void
	 */
	public function iLoginWithUsernameAndPasswordToSrv(
		$username, $password, $server
	) {
		$server = $this->featureContext->substituteInLineCodes($server);
		$this->loginPage->setPagePath(
			$server . $this->loginPage->getOriginalPath()
		);
		$this->loginPage->open();
		$this->iLoginWithUsernameAndPassword($username, $password);
		$this->featureContext->setCurrentServer($server);
	}

	/**
	 * @When I login with username :username and invalid password :password
	 * @param string $username
	 * @param string $password
	 * @return void
	 */
	public function iLoginWithUsernameAndInvalidPassword($username, $password) {
		$this->loginPage->loginAs($username, $password, 'LoginPage');
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When I login with username :username and password :password after a redirect from the :page page
	 * @param string $username
	 * @param string $password
	 * @param string $page text name of a page that I expect to be taken to
	 * @return void
	 */
	public function iLoginWithUsernameAndPasswordAfterRedirectFromThePage(
		$username,
		$password,
		$page
	) {
		$this->expectedPage = $this->featureContext->loginAs(
			$username,
			$password,
			str_replace(' ', '', ucwords($page)) . 'Page'
		);
	}

	/**
	 * @When I login as a regular user with a correct password
	 * @return void
	 */
	public function iLoginAsARegularUserWithACorrectPassword() {
		$this->filesPage = $this->featureContext->loginAsARegularUser();
	}

	/**
	 * @BeforeScenario
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @param BeforeScenarioScope $scope
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
