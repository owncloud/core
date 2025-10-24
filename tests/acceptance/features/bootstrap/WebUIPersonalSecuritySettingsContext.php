<?php declare(strict_types=1);
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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use PHPUnit\Framework\Assert;
use Tests\Acceptance\Page\LoginPage;
use Tests\Acceptance\Page\PersonalSecuritySettingsPage;

require_once 'bootstrap.php';

/**
 * WebUI PersonalSecuritySettings context.
 */
class WebUIPersonalSecuritySettingsContext extends RawMinkContext implements Context {
	private PersonalSecuritySettingsPage $personalSecuritySettingsPage;
	private $appName;
	private string $strForAppName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	private WebUILoginContext $webUILoginContext;
	private WebUIGeneralContext $webUIGeneralContext;
	private ?string $newAppPassword = null;
	private LoginPage $loginPage;

	/**
	 * WebUIPersonalSecuritySettingsContext constructor.
	 *
	 * @param PersonalSecuritySettingsPage $personalSecuritySettingsPage
	 * @param LoginPage $loginPage
	 */
	public function __construct(
		PersonalSecuritySettingsPage $personalSecuritySettingsPage,
		LoginPage $loginPage
	) {
		$this->personalSecuritySettingsPage = $personalSecuritySettingsPage;
		$this->appName = \substr(\str_shuffle($this->strForAppName), 0, 8);
		$this->loginPage = $loginPage;
	}

	/**
	 * @When the user browses to the personal security settings page
	 * @Given the user has browsed to the personal security settings page
	 *
	 * @return void
	 */
	public function theUserBrowsesToThePersonalSecuritySettingsPage():void {
		$this->personalSecuritySettingsPage->open();
		$this->personalSecuritySettingsPage->waitTillPageIsLoaded(
			$this->getSession()
		);
	}

	/**
	 * @When the user creates a new App password using the webUI
	 * @Given the user has created a new App password using the webUI
	 *
	 * @return void
	 */
	public function theUserCreatesANewAppPasswordUsingTheWebUI():void {
		$this->personalSecuritySettingsPage->createNewAppPassword($this->appName);
		$this->newAppPassword = $this->personalSecuritySettingsPage
			->getAppPasswordResult()[1]->getValue();
	}

	/**
	 * @Then the new app should be listed in the App passwords list on the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAppShouldBeListedInTheAppPasswordsListOnTheWebUI():void {
		$appTr = $this->personalSecuritySettingsPage->getLinkedAppByName(
			$this->appName
		);
		Assert::assertNotEmpty(
			$appTr,
			__METHOD__
			. " No apps are listed in the app passwords list on the webUI."
		);
		$disconnectButton
			= $this->personalSecuritySettingsPage->getDisconnectButton($appTr);
		Assert::assertNotEmpty(
			$disconnectButton,
			" Disconnect button is not present for the new app."
		);
	}

	/**
	 * @When the user re-logs in with username :username and generated app password using the webUI
	 * @Given the user has re-logged in with username :username and generated app password using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theUserLogsInWithNewAppPassword(string $username):void {
		$this->webUILoginContext->userReLogsInWithUsernameAndPassword(
			$username,
			$this->newAppPassword
		);
	}

	/**
	 * @When the user deletes the app password
	 * @Given the user has deleted the app password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserDeletesTheAppPassword():void {
		$appTr = $this->personalSecuritySettingsPage->getLinkedAppByName(
			$this->appName
		);
		$deleteButton
			= $this->personalSecuritySettingsPage->getDisconnectButton(
				$appTr
			);
		$deleteButton->click();
	}

	/**
	 * @When the user re-logs in with username :username and deleted app password using the webUI
	 * @Given the user has re-logged in with username :username and deleted app password using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function reLogInWithDeletedAppPassword(string $username):void {
		$this->webUIGeneralContext->theUserLogsOutOfTheWebUI();
		$this->loginPage->loginAs($username, $this->newAppPassword);
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->webUILoginContext = $environment->getContext('WebUILoginContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}
}
