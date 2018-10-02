<?php

/**
 * ownCloud
 *
 * @author Paurakh Sharma Humagain <paurakh@jankaritech.com>
 * @copyright Copyright (c) 2018 Paurakh Sharma Humagain paurakh@jankaritech.com
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
use Page\AdminGeneralSettingsPage;

require_once 'bootstrap.php';

/**
 * WebUI AdminGeneralSettings context.
 */
class WebUIAdminGeneralSettingsContext extends RawMinkContext implements Context {
	private $adminGeneralSettingsPage;
	
	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;
	
	/**
	 * WebUIAdminAdminSettingsContext constructor.
	 *
	 * @param AdminGeneralSettingsPage $adminGeneralSettingsPage
	 */
	public function __construct(
		AdminGeneralSettingsPage $adminGeneralSettingsPage
	) {
		$this->adminGeneralSettingsPage = $adminGeneralSettingsPage;
	}

	/**
	 * @Given the administrator has browsed to the admin general settings page
	 * @When the administrator browses to the admin general settings page
	 *
	 * @return void
	 */
	public function theAdministratorHasBrowsedToTheAdminGeneralSettingsPage() {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->adminGeneralSettingsPage->open();
		$this->adminGeneralSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator sets the following email server settings using the webUI
	 *
	 * @param TableNode $emailSettingsTable table of email server settings headings: must be: | setting | and | value |
	 *
	 * @return void
	 */
	public function administratorSetsTheFollowingSettingsInEmailServerSettingUsingTheWebui(TableNode $emailSettingsTable) {
		$this->adminGeneralSettingsPage->setEmailServerSettings($emailSettingsTable);
	}

	/**
	 * @When the administrator clicks on send test email in the admin general settings page using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorClicksOnSendTestEmailInTheAdminGeneralSettingsPageUsingTheWebui() {
		$this->adminGeneralSettingsPage->sendTestEmail($this->getSession());
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
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}
}
