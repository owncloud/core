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

use Behat\Mink\Session;

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
	protected $mailNotiticationOnPublicShareCheckboxXpath = '//label[@for="allowPublicMailNotification"]';
	protected $mailNotiticationOnPublicShareCheckboxId = 'allowPublicMailNotification';
	protected $shareFileViaSocialMediaOnPublicShareCheckboxXpath = '//label[@for="allowSocialShare"]';
	protected $shareFileViaSocialMediaOnPublicShareCheckboxId = 'allowSocialShare';
	protected $enforceLinkPasswordReadOnlyCheckboxXpath = '//label[@for="enforceLinkPasswordReadOnly"]';
	protected $enforceLinkPasswordReadOnlyCheckboxId = 'enforceLinkPasswordReadOnly';
	protected $enforceLinkPasswordReadWriteCheckboxXpath = '//label[@for="enforceLinkPasswordReadWrite"]';
	protected $enforceLinkPasswordReadWriteCheckboxId = 'enforceLinkPasswordReadWrite';
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

	protected $groupSharingBlackListFieldXpath = '//p[@id="selectExcludedGroups"]//input[contains(@class,"select2-input")]';
	protected $excludeGroupFromSharesFieldXpath = '//div[@id="files_sharing"]//input[contains(@class,"select2-input")]';
	protected $groupListXpath = '//div[@id="select2-drop"]//li[contains(@class, "select2-result")]';
	protected $groupListDropDownXpath = "//div[@id='select2-drop']";

	/**
	 * toggle the Share API
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleShareApi(Session $session, $action) {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->shareApiCheckboxXpath,
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
	 */
	public function toggleShareViaLink(Session $session, $action) {
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
	 */
	public function togglePublicUpload(Session $session, $action) {
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
	 */
	public function toggleMailNotification(Session $session, $action) {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->mailNotiticationOnPublicShareCheckboxXpath,
			$this->mailNotiticationOnPublicShareCheckboxId
		);
	}

	/**
	 * toggle social share on public link share
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleSocialShareOnPublicLinkShare(Session $session, $action) {
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
	 */
	public function toggleEnforcePasswordProtectionForReadOnlyLinks(
		Session $session, $action
	) {
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
	 */
	public function toggleEnforcePasswordProtectionForReadWriteLinks(
		Session $session, $action
	) {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->enforceLinkPasswordReadWriteCheckboxXpath,
			$this->enforceLinkPasswordReadWriteCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for upload only links
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleEnforcePasswordProtectionForWriteOnlyLinks(
		Session $session, $action
	) {
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
	 */
	public function toggleResharing(Session $session, $action) {
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
	 */
	public function toggleGroupSharing(Session $session, $action) {
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
	 */
	public function toggleRestrictUsersToOnlyShareWithTheirGroupMembers(
		Session $session, $action
	) {
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
	 */
	public function enableExcludeGroupFromSharing(Session $session) {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->excludeGroupFromSharingCheckboxXpath,
			$this->excludeGroupFromSharingCheckboxId
		);
	}

	/**
	 * add group to group sharing blacklist
	 *
	 * @param Session $session
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function addGroupToGroupSharingBlacklist(Session $session, $groupName) {
		$this->addGroupToInputField($groupName, $this->groupSharingBlackListFieldXpath);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * add group to excluded from receiving shares
	 *
	 * @param Session $session
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function addGroupToExcludedFromReceivingShares(Session $session, $groupName) {
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
	 */
	public function addGroupToInputField($groupName, $fieldXpath) {
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
			}
		}
	}

	/**
	 * waits for the page to appear completely
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$this->waitTillXpathIsVisible(
			$this->shareApiCheckboxXpath, $timeout_msec
		);
	}
}
