<?php declare(strict_types=1);

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
use Behat\Mink\Element\NodeElement;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\AdminSharingSettingsPage;
use PHPUnit\Framework\Assert;
use TestHelpers\SetupHelper;

require_once 'bootstrap.php';

/**
 * WebUI AdminSharingSettings context.
 */
class WebUIAdminSharingSettingsContext extends RawMinkContext implements Context {
	private $adminSharingSettingsPage;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * WebUIAdminSharingSettingsContext constructor.
	 *
	 * @param AdminSharingSettingsPage $adminSharingSettingsPage
	 */
	public function __construct(
		AdminSharingSettingsPage $adminSharingSettingsPage
	) {
		$this->adminSharingSettingsPage = $adminSharingSettingsPage;
	}

	/**
	 * @When the administrator browses to the admin sharing settings page
	 * @Given the administrator has browsed to the admin sharing settings page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdminBrowsesToTheAdminSharingSettingsPage():void {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->adminSharingSettingsPage->open();
		$this->adminSharingSettingsPage->waitTillPageIsLoaded($this->getSession());
		$this->webUIGeneralContext->setCurrentPageObject($this->adminSharingSettingsPage);
	}

	/**
	 * @When /^the administrator (enables|disables) the share API using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesShareApiUsingTheWebui(string $action):void {
		$this->adminSharingSettingsPage->toggleShareApi(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) share via link using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesShareViaLink(string $action):void {
		$this->adminSharingSettingsPage->toggleShareViaLink(
			$this->getSession(),
			$action
		);
	}

	/**
	 *
	 * @param NodeElement|null $checkbox
	 *
	 * @return void
	 */
	private function assertCheckBoxIsChecked(?NodeElement $checkbox):void {
		Assert::assertNotNull($checkbox, "checkbox does not exist");
		Assert::assertTrue($checkbox->isChecked(), "checkbox is not checked");
	}

	/**
	 * @Then the default expiration date checkbox for user shares should be enabled on the webUI
	 *
	 * @return void
	 */
	public function setDefaultExpirationDateForUserSharesCheckboxShouldBeEnabled():void {
		$checkboxElement = $this->adminSharingSettingsPage->getDefaultExpirationForUserShareElement();
		$this->assertCheckBoxIsChecked($checkboxElement);
	}

	/**
	 * @Then the default expiration date checkbox for group shares should be enabled on the webUI
	 *
	 * @return void
	 */
	public function setDefaultExpirationDateForGroupCheckboxSharesShouldBeEnabled():void {
		$checkboxElement = $this->adminSharingSettingsPage->getDefaultExpirationForGroupShareElement();
		$this->assertCheckBoxIsChecked($checkboxElement);
	}

	/**
	 * @Then the default expiration date checkbox for federated shares should be enabled on the webUI
	 *
	 * @return void
	 */
	public function setDefaultExpirationDateForFederatedCheckboxSharesShouldBeEnabled():void {
		$checkboxElement = $this->adminSharingSettingsPage->getDefaultExpirationForFederatedShareElement();
		$this->assertCheckBoxIsChecked($checkboxElement);
	}

	/**
	 * @Then the enforce maximum expiration date checkbox for user shares should be enabled on the webUI
	 *
	 * @return void
	 */
	public function enforceMaximumExpirationDateForUserSharesCheckboxShouldBeEnabled():void {
		$checkboxElement = $this->adminSharingSettingsPage->getEnforceExpireDateUserShareElement();
		$this->assertCheckBoxIsChecked($checkboxElement);
	}

	/**
	 * @Then the enforce maximum expiration date checkbox for group shares should be enabled on the webUI
	 *
	 * @return void
	 */
	public function enforceMaximumExpirationDateForGroupSharesCheckboxShouldBeEnabled():void {
		$checkboxElement = $this->adminSharingSettingsPage->getEnforceExpireDateGroupShareElement();
		$this->assertCheckBoxIsChecked($checkboxElement);
	}

	/**
	 * @Then the enforce maximum expiration date checkbox for federated shares should be enabled on the webUI
	 *
	 * @return void
	 */
	public function enforceMaximumExpirationDateForFederatedSharesCheckboxShouldBeEnabled():void {
		$checkboxElement = $this->adminSharingSettingsPage->getEnforceExpireDateFederatedShareElement();
		$this->assertCheckBoxIsChecked($checkboxElement);
	}

	/**
	 * @Then the expiration date for user shares should set to :days days on the webUI
	 *
	 * @param int $days
	 *
	 * @return void
	 */
	public function expirationDateForUserSharesShouldBeSetToXDays(int $days):void {
		$expirationDays = $this->adminSharingSettingsPage->getUserShareExpirationDays();
		Assert::assertEquals(
			$days,
			$expirationDays,
			__METHOD__
			. " The expiration date for user shares was expected to be set to '$days' days, "
			. "but was actually set to '$expirationDays' days"
		);
	}

	/**
	 * @Then the expiration date for group shares should set to :days days on the webUI
	 *
	 * @param int $days
	 *
	 * @return void
	 */
	public function expirationDateForGroupSharesShouldBeSetToXDays(int $days):void {
		$expirationDays = $this->adminSharingSettingsPage->getGroupShareExpirationDays();
		Assert::assertEquals(
			$days,
			$expirationDays,
			__METHOD__
			. " The expiration date for group shares was expected to be set to '$days' days, "
			. "but was actually set to '$expirationDays' days"
		);
	}

	/**
	 * @Then the expiration date for federated shares should set to :days days on the webUI
	 *
	 * @param int $days
	 *
	 * @return void
	 */
	public function expirationDateForFederatedSharesShouldBeSetToXDays(int $days):void {
		$expirationDays = $this->adminSharingSettingsPage->getFederatedShareExpirationDays();
		Assert::assertEquals(
			$days,
			$expirationDays,
			__METHOD__
			. " The expiration date for federated shares was expected to be set to '$days' days, "
			. "but was actually set to '$expirationDays' days"
		);
	}

	/**
	 * @Then the blocked domains from sharing with guests should set to :blockedDomains on the webUI
	 *
	 * @param string $blockedDomains
	 *
	 * @return void
	 */
	public function blockedDomainsFromSharingWithGuestsShouldBeSetTo(string $blockedDomains):void {
		$blockedDomainsFromSharingWithGuests = $this->adminSharingSettingsPage->getBlockedDomainsFromSharingWithGuests();
		Assert::assertEquals(
			$blockedDomains,
			$blockedDomainsFromSharingWithGuests,
			__METHOD__
			. " The blocked domains from sharing with guests was expected to be set to '$blockedDomains', "
			. "but was actually set to '$blockedDomainsFromSharingWithGuests'"
		);
	}

	/**
	 * @When /^the administrator (enables|disables) public uploads using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesPublicUpload(string $action):void {
		$this->adminSharingSettingsPage->togglePublicUpload(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) mail notification on public link share using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesMailNotificationOnPublicLinkShare(string $action):void {
		$this->adminSharingSettingsPage->toggleMailNotification(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) social media share on public link share using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesSocialShareOnPublicLinkShare(string $action):void {
		$this->adminSharingSettingsPage->toggleSocialShareOnPublicLinkShare(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) enforce password protection for read-only links using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesEnforcePasswordProtectionForReadOnlyLinks(string $action):void {
		$this->adminSharingSettingsPage->toggleEnforcePasswordProtectionForReadOnlyLinks(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) enforce password protection for read and write links using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesEnforcePasswordProtectionForReadWriteLinks(string $action):void {
		$this->adminSharingSettingsPage->toggleEnforcePasswordProtectionForReadWriteLinks(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) enforce password protection for read and write and delete links using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesEnforcePasswordProtectionForReadWriteDeleteLinks(string $action):void {
		$this->adminSharingSettingsPage->toggleEnforcePasswordProtectionForReadWriteDeleteLinks(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) enforce password protection for upload only links using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesEnforcePasswordProtectionForWriteOnlyLinks(string $action):void {
		$this->adminSharingSettingsPage->toggleEnforcePasswordProtectionForWriteOnlyLinks(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) resharing using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesDisableResharing(string $action):void {
		$this->adminSharingSettingsPage->toggleResharing(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) sharing with groups using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function adminTogglesSharingWithGroupUsingTheWebui(string $action):void {
		$this->adminSharingSettingsPage->toggleGroupSharing(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) restrict users to only share with their group members using the webUI$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function theAdminRestrictsUsersToOnlyShareWithTheirGroupMemberUsingTheWebui(string $action):void {
		$this->adminSharingSettingsPage->toggleRestrictUsersToOnlyShareWithTheirGroupMembers(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When the administrator enables exclude groups from sharing using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorEnablesExcludeGroupsFromSharingUsingTheWebui():void {
		$this->adminSharingSettingsPage->enableExcludeGroupFromSharing(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator enables default expiration date for user shares using the webUI
	 *
	 * @return void
	 */
	public function administratorEnablesDefaultExpirationDateForUserShares():void {
		$this->adminSharingSettingsPage->enableDefaultExpirationDateForUserShares(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator enforces maximum expiration date for user shares using the webUI
	 *
	 * @return void
	 */
	public function administratorEnforcesMaximumExpirationDateForUserShares():void {
		$this->adminSharingSettingsPage->enforceMaximumExpirationDateForUserShares(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator enforces maximum expiration date for group shares using the webUI
	 *
	 * @return void
	 */
	public function administratorEnforcesMaximumExpirationDateForGroupShares():void {
		$this->adminSharingSettingsPage->enforceMaximumExpirationDateForGroupShares(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator enforces maximum expiration date for federated shares using the webUI
	 *
	 * @return void
	 */
	public function administratorEnforcesMaximumExpirationDateForFederatedShares():void {
		$this->adminSharingSettingsPage->enforceMaximumExpirationDateForFederatedShares(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator updates the user share expiration date to :days days using the webUI
	 *
	 * @param int $days
	 *
	 * @return void
	 */
	public function administratorUpdatesUserShareExpirationTo(int $days):void {
		$this->adminSharingSettingsPage->setExpirationDaysForUserShare($days, $this->getSession());
	}

	/**
	 * @When the administrator updates the group share expiration date to :days days using the webUI
	 *
	 * @param int $days
	 *
	 * @return void
	 */
	public function administratorUpdatesGroupShareExpirationTo(int $days):void {
		$this->adminSharingSettingsPage->setExpirationDaysForGroupShare($days, $this->getSession());
	}

	/**
	 * @When the administrator updates the federated share expiration date to :days days using the webUI
	 *
	 * @param int $days
	 *
	 * @return void
	 */
	public function administratorUpdatesFederatedShareExpirationTo(int $days):void {
		$this->adminSharingSettingsPage->setExpirationDaysForFederatedShare($days, $this->getSession());
	}

	/**
	 * @When the administrator enables default expiration date for group shares using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorEnablesDefaultExpirationDateForGroupShares():void {
		$this->adminSharingSettingsPage->enableDefaultExpirationDateForGroupShares(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator enables default expiration date for federated shares using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorEnablesDefaultExpirationDateForFederatedShares():void {
		$this->adminSharingSettingsPage->enableDefaultExpirationDateForFederatedShares(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator enables restrict users to only share with groups they are member of using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorEnablesRestrictUsersToOnlyShareWithGroupsTheyAreMemberOfUsingTheWebui():void {
		$this->adminSharingSettingsPage->restrictUserToOnlyShareWithMembershipGroup(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator adds group :group to the exclude group from sharing list using the webUI
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorAddsGroupToTheExcludeGroupFromSharingList(string $group):void {
		$this->adminSharingSettingsPage->addGroupToExcludeGroupsFromSharingList(
			$this->getSession(),
			$group
		);
	}

	/**
	 * @When the administrator excludes group :group from receiving shares using the webUI
	 *
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorExcludesGroupFromReceivingSharesUsingTheWebui(string $group):void {
		$this->adminSharingSettingsPage->addGroupToExcludedFromReceivingShares(
			$this->getSession(),
			$group
		);
	}

	/**
	 * @When /^the administrator (enables|disables) add server automatically once a federation share was created successfully using the webUI$/
	 *
	 * @param string (enable | disable) $action
	 *
	 * @return void
	 */
	public function theAdministratorEnablesAddServerAutomatically(string $action):void {
		$this->adminSharingSettingsPage->toggleAutoAddServer(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the administrator (enables|disables) permission (create|change|delete|share) for default user and group share using the webUI$/
	 *
	 * @param string (enable | disable) $action
	 * @param string $permissionValue
	 *
	 * @return void
	 */
	public function theAdministratorEnablesDefaultSharePermission(string $action, string $permissionValue):void {
		$this->adminSharingSettingsPage->toggleDefaultSharePermissions(
			$this->getSession(),
			$action,
			$permissionValue
		);
	}

	/**
	 * @When the administrator adds :url as a trusted server using the webUI
	 *
	 * @param string $url
	 *
	 * @return void
	 */
	public function theAdministratorAddsAsATrustedServerUsingTheWebui(string $url) {
		$this->adminSharingSettingsPage->addTrustedServer(
			$this->getSession(),
			$this->featureContext->substituteInLineCodes($url)
		);
	}

	/**
	 * @When the administrator deletes url :url from the trusted server list using the webUI
	 *
	 * @param string $url
	 *
	 * @return void
	 */
	public function theAdministratorDeletesAsATrustedServerUsingTheWebui(string $url):void {
		$this->adminSharingSettingsPage->deleteTrustedServer(
			$this->getSession(),
			$this->featureContext->substituteInLineCodes($url)
		);
	}

	/**
	 * @Then a trusted server error message should be displayed on the webUI with the text :text
	 *
	 * @param string $text
	 *
	 * @return void
	 */
	public function aErrorMessageForTrustedServerShouldContain(string $text):void {
		$msg = $this->adminSharingSettingsPage->getTrustedServerErrorMsg();
		Assert::assertStringContainsString(
			$text,
			$msg,
			__METHOD__
			. " The text in the trusted server error message was expected to be '$text', but got '$msg' instead "
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
	 * @throws Exception
	 */
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
		$this->featureContext = $environment->getContext('FeatureContext');
		SetupHelper::runOcc(
			['config:app:set files_sharing blacklisted_receiver_groups --value='],
			$this->featureContext->getStepLineRef()
		);
	}
}
