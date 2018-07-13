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
use Behat\MinkExtension\Context\RawMinkContext;
use Page\AdminSharingSettingsPage;
use Page\LoginPage;

/**
 * WebUI AdminSharingSettings context.
 */
class WebUIAdminSharingSettingsContext extends RawMinkContext implements Context {
	private $adminSharingSettingsPage;
	private $loginPage;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 * WebUIAdminSharingSettingsContext constructor.
	 *
	 * @param AdminSharingSettingsPage $adminSharingSettingsPage
	 * @param LoginPage $loginPage
	 */
	public function __construct(
		AdminSharingSettingsPage $adminSharingSettingsPage
	) {
		$this->adminSharingSettingsPage = $adminSharingSettingsPage;
	}

	/**
	 * @When the admin browses to the admin sharing settings page
	 * @Given the admin has browsed to the admin sharing settings page
	 *
	 * @return void
	 */
	public function theAdminBrowsesToTheAdminSharingSettingsPage() {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->adminSharingSettingsPage->open();
	}

	/**
	 * @When /^the admin (enables|disables) the share API using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesShareApiUsingTheWebui($action) {
		$this->adminSharingSettingsPage->toggleShareApi($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) share via link using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesShareViaLink($action) {
		$this->adminSharingSettingsPage->toggleShareViaLink($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) public uploads using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesPublicUpload($action) {
		$this->adminSharingSettingsPage->togglePublicUpload($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) mail notification on public share using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesMailNotificationOnPublicShare($action) {
		$this->adminSharingSettingsPage->toggleMailNotification($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) social media share on public share using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesSocialShareOnPublicShare($action) {
		$this->adminSharingSettingsPage->toggleSocialShareOnPublicShare($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) enforce password protection for read-only links using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesEnforcePasswordProtectionForReadOnlyLinks($action) {
		$this->adminSharingSettingsPage->toggleEnforcePasswordProtectionForReadOnlyLinks($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) enforce password protection for read and write links using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesEnforcePasswordProtectionForReadWriteLinks($action) {
		$this->adminSharingSettingsPage->toggleEnforcePasswordProtectionForReadWriteLinks($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) enforce password protection for upload only links using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesEnforcePasswordProtectionForWriteOnlyLinks($action) {
		$this->adminSharingSettingsPage->toggleEnforcePasswordProtectionForWriteOnlyLinks($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) resharing using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesDisableResharing($action) {
		$this->adminSharingSettingsPage->toggleResharing($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) sharing with groups using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesSharingWithGroupUsingTheWebui($action) {
		$this->adminSharingSettingsPage->toggleGroupSharing($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
	}

	/**
	 * @When /^the admin (enables|disables) restrict users to only share with their group members using the webUI$/
	 * @param string $action
	 *
	 * @return void
	 */
	public function theAdminRestrictsUsersToOnlyShareWithTheirGroupMemberUsingTheWebui($action) {
		$this->adminSharingSettingsPage->toggleRestrictUsersToOnlyShareWithTheirGroupMembers($action);
		$this->adminSharingSettingsPage->waitForAjaxCallsToStartAndFinish(
			$this->getSession()
		);
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
