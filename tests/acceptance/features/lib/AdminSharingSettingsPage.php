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

namespace Page;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Exception;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Admin Sharing Settings page.
 */
class AdminSharingSettingsPage extends SharingSettingsPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/admin?sectionid=sharing';

	protected $shareApiCheckboxXpath = '//label[@for="shareAPIEnabled"]';
	protected $shareApiCheckboxId = 'shareAPIEnabled';
	protected $publicShareCheckboxXpath = '//label[@for="allowLinks"]';
	protected $publicShareCheckboxId = 'allowLinks';
	protected $publicUploadCheckboxXpath = '//label[@for="allowPublicUpload"]';
	protected $publicUploadCheckboxId = 'allowPublicUpload';
	protected $mailNotificationOnPublicShareCheckboxXpath = '//label[@for="allowPublicMailNotification"]';
	protected $mailNotificationOnPublicShareCheckboxId = 'allowPublicMailNotification';
	protected $shareFileViaSocialMediaOnPublicShareCheckboxXpath = '//label[@for="allowSocialShare"]';
	protected $shareFileViaSocialMediaOnPublicShareCheckboxId = 'allowSocialShare';
	protected $enforceLinkPasswordReadOnlyCheckboxXpath = '//label[@for="enforceLinkPasswordReadOnly"]';
	protected $enforceLinkPasswordReadOnlyCheckboxId = 'enforceLinkPasswordReadOnly';
	protected $enforceLinkPasswordReadWriteCheckboxXpath = '//label[@for="enforceLinkPasswordReadWrite"]';
	protected $enforceLinkPasswordReadWriteCheckboxId = 'enforceLinkPasswordReadWrite';
	protected $enforceLinkPasswordReadWriteDeleteCheckboxXpath = '//label[@for="enforceLinkPasswordReadWriteDelete"]';
	protected $enforceLinkPasswordReadWriteDeleteCheckboxId = 'enforceLinkPasswordReadWriteDelete';
	protected $enforceLinkPasswordWriteOnlyCheckboxXpath = '//label[@for="enforceLinkPasswordWriteOnly"]';
	protected $enforceLinkPasswordWriteOnlyCheckboxId = 'enforceLinkPasswordWriteOnly';
	protected $allowResharingCheckboxXpath = '//label[@for="allowResharing"]';
	protected $allowResharingCheckboxId = 'allowResharing';
	protected $allowGroupSharingCheckboxXpath = '//label[@for="allowGroupSharing"]';
	protected $allowGroupSharingCheckboxId = 'allowGroupSharing';
	protected $onlyShareWithGroupMembersCheckboxXpath = '//label[@for="onlyShareWithGroupMembers"]';
	protected $onlyShareWithGroupMembersCheckboxId = 'onlyShareWithGroupMembers';
	protected $excludeGroupFromSharingCheckboxXpath = '//label[@for="shareapiExcludeGroups"]';
	protected $excludeGroupFromSharingCheckboxId = 'shareapiExcludeGroups';
	protected $excludeGroupsFromSharingListFieldXpath = '//p[@id="selectExcludedGroups"]//input[contains(@class,"select2-input")]';

	protected $onlyShareWithMembershipGroupsCheckboxXpath = '//label[@for="onlyShareWithMembershipGroups"]';
	protected $onlyShareWithMembershipGroupsCheckboxId = 'onlyShareWithMembershipGroups';
	protected $excludeGroupFromSharesFieldXpath = '//div[@id="files_sharing"]//input[contains(@class,"select2-input")]';
	protected $groupListXpath = '//div[@id="select2-drop"]//li[contains(@class, "select2-result")]';
	protected $groupListDropDownXpath = "//div[@id='select2-drop']";
	protected $autoAddServerCheckboxXpath = "//label[@for='autoAddServers']";
	protected $autoAddServerCheckboxId = "autoAddServers";

	protected $addTrustedServerBtnXpath = "//button[@id='ocFederationAddServerButton']";
	protected $addTrustedServerConfirmBtnXpath = "//button[@id='ocFederationSubmit']";
	protected $addTrustedServerInputXpath = "//input[@id='serverUrl']";
	protected $deleteTrustedServerBtnXpath = "//ul[@id='listOfTrustedServers']//li[contains(., '%s')]//span[contains(@class, 'icon-delete')]";
	protected $trustedServerErrorMsgXpath = "//p[@id='ocFederationAddServer']//span[@class='msg error']";

	protected $createSharePermissionXpath = "//p[@id='shareApiDefaultPermissionsSection']//label[contains(text(),'Create')]";
	protected $changeSharePermissionXpath = "//p[@id='shareApiDefaultPermissionsSection']//label[contains(text(),'Change')]";
	protected $deleteSharePermissionXpath = "//p[@id='shareApiDefaultPermissionsSection']//label[contains(text(),'Delete')]";
	protected $shareSharePermissionXpath = "//p[@id='shareApiDefaultPermissionsSection']//label[contains(text(),'Share')]";

	protected $defaultExpirationDateForUserCheckboxXpath = '//label[@for="shareapiDefaultExpireDateUserShare"]';
	protected $defaultExpirationDateForUserCheckboxId = 'shareapiDefaultExpireDateUserShare';
	protected $defaultExpirationDateForGroupCheckboxXpath = '//label[@for="shareapiDefaultExpireDateGroupShare"]';
	protected $defaultExpirationDateForGroupCheckboxId = 'shareapiDefaultExpireDateGroupShare';
	protected $defaultExpirationDateForFederatedCheckboxXpath = '//label[@for="shareapiDefaultExpireDateFederatedShare"]';
	protected $defaultExpirationDateForFederatedCheckboxId = 'shareapiDefaultExpireDateFederatedShare';
	protected $userShareExpirationDateFieldXpath = '//input[@id="shareapiExpireAfterNDaysUserShare"]';
	protected $groupShareExpirationDateFieldXpath = '//input[@id="shareapiExpireAfterNDaysGroupShare"]';
	protected $federatedShareExpirationDateFieldXpath = '//input[@id="shareapiExpireAfterNDaysFederatedShare"]';
	protected $enforceExpirationDateUserShareCheckboxXpath = '//span[@id="setDefaultExpireDateUserShare"]//label[contains(text(),"expiration date")]';
	protected $enforceExpirationDateUserShareCheckboxId = 'shareapiEnforceExpireDateUserShare';
	protected $enforceExpirationDateGroupShareCheckboxXpath = '//span[@id="setDefaultExpireDateGroupShare"]//label[contains(text(),"expiration date")]';
	protected $enforceExpirationDateGroupShareCheckboxId = 'shareapiEnforceExpireDateGroupShare';
	protected $enforceExpirationDateFederatedShareCheckboxXpath = '//span[@id="setDefaultExpireDateFederatedShare"]//label[contains(text(),"expiration date")]';
	protected $enforceExpirationDateFederatedShareCheckboxId = 'shareapiEnforceExpireDateFederatedShare';

	/**
	 * toggle the Share API
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleShareApi(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->shareApiCheckboxXpath,
			$this->shareApiCheckboxId
		);
	}

	/**
	 * toggle the Share API
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 * @param string $value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleDefaultSharePermissions(Session $session, string $action, string $value): void {
		$checkboxXpath = null;
		if ($value == "create") {
			$checkboxXpath = $this->createSharePermissionXpath;
		} elseif ($value == "change") {
			$checkboxXpath = $this->changeSharePermissionXpath;
		} elseif ($value == "delete") {
			$checkboxXpath = $this->deleteSharePermissionXpath;
		} elseif ($value == "share") {
			$checkboxXpath = $this->shareSharePermissionXpath;
		}
		$this->toggleCheckbox(
			$session,
			$action,
			$checkboxXpath,
			$this->shareApiCheckboxId
		);
	}

	/**
	 * toggle share via link
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleShareViaLink(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->publicShareCheckboxXpath,
			$this->publicShareCheckboxId
		);
	}

	/**
	 * toggle public uploads
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function togglePublicUpload(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->publicUploadCheckboxXpath,
			$this->publicUploadCheckboxId
		);
	}

	/**
	 * toggle mail notification on public link share
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleMailNotification(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->mailNotificationOnPublicShareCheckboxXpath,
			$this->mailNotificationOnPublicShareCheckboxId
		);
	}

	/**
	 * toggle social share on public link share
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleSocialShareOnPublicLinkShare(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->shareFileViaSocialMediaOnPublicShareCheckboxXpath,
			$this->shareFileViaSocialMediaOnPublicShareCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for read-only links
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleEnforcePasswordProtectionForReadOnlyLinks(
		Session $session,
		string $action
	): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->enforceLinkPasswordReadOnlyCheckboxXpath,
			$this->enforceLinkPasswordReadOnlyCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for read and write links
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleEnforcePasswordProtectionForReadWriteLinks(
		Session $session,
		string $action
	): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->enforceLinkPasswordReadWriteCheckboxXpath,
			$this->enforceLinkPasswordReadWriteCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for read, write and delete links
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleEnforcePasswordProtectionForReadWriteDeleteLinks(
		Session $session,
		string $action
	): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->enforceLinkPasswordReadWriteDeleteCheckboxXpath,
			$this->enforceLinkPasswordReadWriteDeleteCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for upload only links
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleEnforcePasswordProtectionForWriteOnlyLinks(
		Session $session,
		string $action
	): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->enforceLinkPasswordWriteOnlyCheckboxXpath,
			$this->enforceLinkPasswordWriteOnlyCheckboxId
		);
	}

	/**
	 * toggle resharing
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleResharing(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->allowResharingCheckboxXpath,
			$this->allowResharingCheckboxId
		);
	}

	/**
	 * toggle group sharing
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleGroupSharing(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->allowGroupSharingCheckboxXpath,
			$this->allowGroupSharingCheckboxId
		);
	}

	/**
	 * toggle restrict users to only share with their group members
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleRestrictUsersToOnlyShareWithTheirGroupMembers(
		Session $session,
		string $action
	): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->onlyShareWithGroupMembersCheckboxXpath,
			$this->onlyShareWithGroupMembersCheckboxId
		);
	}

	/**
	 * enable exclude group from sharing
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enableExcludeGroupFromSharing(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->excludeGroupFromSharingCheckboxXpath,
			$this->excludeGroupFromSharingCheckboxId
		);
	}

	/**
	 * @return NodeElement|null
	 */
	public function getDefaultExpirationForUserShareElement(): ?NodeElement {
		return $this->findById($this->defaultExpirationDateForUserCheckboxId);
	}

	/**
	 * @return NodeElement|null
	 */
	public function getDefaultExpirationForGroupShareElement(): ?NodeElement {
		return $this->findById($this->defaultExpirationDateForGroupCheckboxId);
	}

	/**
	 * @return NodeElement|null
	 */
	public function getDefaultExpirationForFederatedShareElement(): ?NodeElement {
		return $this->findById($this->defaultExpirationDateForFederatedCheckboxId);
	}

	/**
	 * @return NodeElement|null
	 */
	public function getEnforceExpireDateUserShareElement(): ?NodeElement {
		return $this->findById($this->enforceExpirationDateUserShareCheckboxId);
	}

	/**
	 * @return NodeElement|null
	 */
	public function getEnforceExpireDateGroupShareElement(): ?NodeElement {
		return $this->findById($this->enforceExpirationDateGroupShareCheckboxId);
	}

	/**
	 * @return NodeElement|null
	 */
	public function getEnforceExpireDateFederatedShareElement(): ?NodeElement {
		return $this->findById($this->enforceExpirationDateFederatedShareCheckboxId);
	}

	/**
	 * @return string
	 */
	public function getUserShareExpirationDays(): string {
		$expirationDay = $this->find("xpath", $this->userShareExpirationDateFieldXpath);
		$this->assertElementNotNull(
			$expirationDay,
			__METHOD__ .
			" could not find user share expiration day field"
		);
		return $expirationDay->getValue();
	}

	/**
	 * @return string
	 */
	public function getGroupShareExpirationDays(): string {
		$expirationDay = $this->find("xpath", $this->groupShareExpirationDateFieldXpath);
		$this->assertElementNotNull(
			$expirationDay,
			__METHOD__ .
			" could not find group share expiration day field"
		);
		return $expirationDay->getValue();
	}

	/**
	 * @return string
	 */
	public function getFederatedShareExpirationDays(): string {
		$expirationDay = $this->find("xpath", $this->federatedShareExpirationDateFieldXpath);
		$this->assertElementNotNull(
			$expirationDay,
			__METHOD__ .
			" could not find federated share expiration day field"
		);
		return $expirationDay->getValue();
	}

	/**
	 * enable default expiration date for user share
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enableDefaultExpirationDateForUserShares(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->defaultExpirationDateForUserCheckboxXpath,
			$this->defaultExpirationDateForUserCheckboxId
		);
	}

	/**
	 * enforce maximum expiration date for user share
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enforceMaximumExpirationDateForUserShares(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->enforceExpirationDateUserShareCheckboxXpath,
			$this->enforceExpirationDateUserShareCheckboxId
		);
	}

	/**
	 * enforce maximum expiration date for group share
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enforceMaximumExpirationDateForGroupShares(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->enforceExpirationDateGroupShareCheckboxXpath,
			$this->enforceExpirationDateGroupShareCheckboxId
		);
	}

	/**
	 * enforce maximum expiration date for federated share
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enforceMaximumExpirationDateForFederatedShares(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->enforceExpirationDateFederatedShareCheckboxXpath,
			$this->enforceExpirationDateFederatedShareCheckboxId
		);
	}

	/**
	 *
	 * @return NodeElement|NULL
	 * @throws ElementNotFoundException
	 */
	private function findUserShareExpirationField(): ?NodeElement {
		$expirationDateField = $this->find("xpath", $this->userShareExpirationDateFieldXpath);
		$this->assertElementNotNull(
			$expirationDateField,
			__METHOD__ .
			" xpath $this->userShareExpirationDateFieldXpath could not find set-user-share-expiration-field"
		);
		return $expirationDateField;
	}

	/**
	 *
	 * @return NodeElement|NULL
	 * @throws ElementNotFoundException
	 */
	private function findGroupShareExpirationField(): ?NodeElement {
		$expirationDateField = $this->find("xpath", $this->groupShareExpirationDateFieldXpath);
		$this->assertElementNotNull(
			$expirationDateField,
			__METHOD__ .
			" xpath $this->groupShareExpirationDateFieldXpath could not find set-group-share-expiration-field"
		);
		return $expirationDateField;
	}

	/**
	 *
	 * @return NodeElement|NULL
	 * @throws ElementNotFoundException
	 */
	private function findFederatedShareExpirationField(): ?NodeElement {
		$expirationDateField = $this->find("xpath", $this->federatedShareExpirationDateFieldXpath);
		$this->assertElementNotNull(
			$expirationDateField,
			__METHOD__ .
			" xpath $this->federatedShareExpirationDateFieldXpath could not find set-federated-share-expiration-field"
		);
		return $expirationDateField;
	}

	/**
	 * set expiration date for user share
	 *
	 * @param int $date
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExpirationDaysForUserShare(
		int     $date,
		Session $session
	): void {
		$expirationDateField = $this->findUserShareExpirationField();
		$this->fillFieldAndKeepFocus($expirationDateField, $date . "\n", $session);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * set expiration date for group share
	 *
	 * @param int $date
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExpirationDaysForGroupShare(
		int     $date,
		Session $session
	): void {
		$expirationDateField = $this->findGroupShareExpirationField();
		$this->fillFieldAndKeepFocus($expirationDateField, $date . "\n", $session);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * set expiration date for federated share
	 *
	 * @param int $date
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setExpirationDaysForFederatedShare(
		int     $date,
		Session $session
	): void {
		$expirationDateField = $this->findFederatedShareExpirationField();
		$this->fillFieldAndKeepFocus($expirationDateField, $date . "\n", $session);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * enable default expiration date for group share
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enableDefaultExpirationDateForGroupShares(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->defaultExpirationDateForGroupCheckboxXpath,
			$this->defaultExpirationDateForGroupCheckboxId
		);
	}

	/**
	 * enable default expiration date for federated share
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enableDefaultExpirationDateForFederatedShares(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->defaultExpirationDateForFederatedCheckboxXpath,
			$this->defaultExpirationDateForFederatedCheckboxId
		);
	}

	/**
	 * enable restrict users to only share with groups they are member of
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function restrictUserToOnlyShareWithMembershipGroup(Session $session): void {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->onlyShareWithMembershipGroupsCheckboxXpath,
			$this->onlyShareWithMembershipGroupsCheckboxId
		);
	}

	/**
	 * add group to group sharing blacklist
	 *
	 * @param Session $session
	 * @param string $groupName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addGroupToExcludeGroupsFromSharingList(
		Session $session,
		string $groupName
	): void {
		$this->addGroupToInputField($groupName, $this->excludeGroupsFromSharingListFieldXpath);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * add group to excluded from receiving shares
	 *
	 * @param Session $session
	 * @param string $groupName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addGroupToExcludedFromReceivingShares(Session $session, string $groupName): void {
		$this->addGroupToInputField($groupName, $this->excludeGroupFromSharesFieldXpath);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * add group to the list
	 *
	 * @param string $groupName
	 * @param string $fieldXpath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addGroupToInputField(string $groupName, string $fieldXpath): void {
		$inputField = $this->find("xpath", $fieldXpath);
		$this->assertElementNotNull(
			$inputField,
			__METHOD__ .
			" xpath $fieldXpath " .
			"could not find input field"
		);
		$inputField->click();
		$this->waitTillElementIsNotNull($this->groupListDropDownXpath);
		$this->waitTillElementIsNotNull($this->groupListXpath);
		$groupList = $this->findAll("xpath", $this->groupListXpath);
		$this->assertElementNotNull(
			$groupList,
			__METHOD__ .
			" xpath $this->groupListXpath " .
			"could not find group list"
		);
		foreach ($groupList as $group) {
			if ($this->getTrimmedText($group) === $groupName) {
				$group->click();
				break;
			}
		}
	}

	/**
	 * Toggle checkbox to automatically add trusted servers after federation sharing
	 *
	 * @param Session $session
	 * @param string $action
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleAutoAddServer(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->autoAddServerCheckboxXpath,
			$this->autoAddServerCheckboxId
		);
	}

	/**
	 * Add trusted server
	 *
	 * @param Session $session
	 * @param string $url
	 *
	 * @return AdminSharingSettingsPage
	 */
	public function addTrustedServer(Session $session, string $url): AdminSharingSettingsPage {
		$btn = $this->find("xpath", $this->addTrustedServerBtnXpath);
		$this->assertElementNotNull(
			$btn,
			__METHOD__ . " Could not find the button to add trusted server."
		);
		$btn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$input = $this->find("xpath", $this->addTrustedServerInputXpath);
		$this->assertElementNotNull(
			$input,
			__METHOD__ . " Could not find the input to add trusted server."
		);
		$input->setValue($url);
		$this->waitForAjaxCallsToStartAndFinish($session);
		$submit = $this->find("xpath", $this->addTrustedServerConfirmBtnXpath);
		$this->assertElementNotNull(
			$submit,
			__METHOD__ . " Could not find the confirm button to add trusted server."
		);
		$submit->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		return $this;
	}

	/**
	 * Delete trusted server
	 *
	 * @param Session $session
	 * @param string $url
	 *
	 * @return AdminSharingSettingsPage
	 */
	public function deleteTrustedServer(Session $session, string $url): AdminSharingSettingsPage {
		$btn = $this->find(
			"xpath",
			\sprintf($this->deleteTrustedServerBtnXpath, $url)
		);
		$this->assertElementNotNull(
			$btn,
			__METHOD__ . " Could not find the button to delete trusted server."
		);
		$btn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		return $this;
	}

	/**
	 * get Trusted Server error message
	 *
	 * @return string
	 */
	public function getTrustedServerErrorMsg(): string {
		$err = $this->find(
			"xpath",
			$this->trustedServerErrorMsgXpath
		);
		$this->assertElementNotNull(
			$err,
			__METHOD__ . " Could not find the error message for trusted servers."
		);
		return $err->getText();
	}

	/**
	 * waits for the page to appear completely
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
		$this->waitTillXpathIsVisible(
			$this->shareApiCheckboxXpath,
			$timeout_msec
		);
	}
}
