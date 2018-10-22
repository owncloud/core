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
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Admin Sharing Settings page.
 */
class AdminSharingSettingsPage extends OwncloudPage {
	
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

	protected $groupSharingBlackListFieldXpath = '//div[@id="files_sharing"]//input[contains(@class,"select2-input")]';
	protected $groupListXpath = '//div[@id="select2-drop"]//li[contains(@class, "select2-result")]';
	protected $groupListDropDownXpath = "//div[@id='select2-drop']";

	/**
	 * toggle checkbox
	 *
	 * @param string $action "enables|disables"
	 * @param string $checkboxXpath
	 * @param string $checkboxId
	 *
	 * @return void
	 */
	public function toggleCheckbox($action, $checkboxXpath, $checkboxId) {
		$checkbox = $this->find("xpath", $checkboxXpath);
		$checkCheckbox = $this->findById($checkboxId);
		$this->assertElementNotNull(
			$checkbox,
			__METHOD__ .
			" xpath $checkboxXpath " .
			"could not find label for checkbox"
		);
		$this->assertElementNotNull(
			$checkCheckbox,
			__METHOD__ .
			" id $checkboxId " .
			"could not find checkbox"
		);
		if ($action === "disables") {
			if ($checkCheckbox->isChecked()) {
				$checkbox->click();
			}
		} elseif ($action === "enables") {
			if ((!($checkCheckbox->isChecked()))) {
				$checkbox->click();
			}
		} else {
			throw new \Exception(
				__METHOD__ . " invalid action: $action"
			);
		}
	}

	/**
	 * toggle the Share API
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleShareApi($action) {
		$this->toggleCheckbox(
			$action,
			$this->shareApiCheckboxXpath,
			$this->shareApiCheckboxId
		);
	}

	/**
	 * toggle share via link
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleShareViaLink($action) {
		$this->toggleCheckbox(
			$action,
			$this->publicShareCheckboxXpath,
			$this->publicShareCheckboxId
		);
	}

	/**
	 * toggle public uploads
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function togglePublicUpload($action) {
		$this->toggleCheckbox(
			$action,
			$this->publicUploadCheckboxXpath,
			$this->publicUploadCheckboxId
		);
	}

	/**
	 * toggle mail notification on public link share
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleMailNotification($action) {
		$this->toggleCheckbox(
			$action,
			$this->mailNotiticationOnPublicShareCheckboxXpath,
			$this->mailNotiticationOnPublicShareCheckboxId
		);
	}

	/**
	 * toggle social share on public link share
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleSocialShareOnPublicLinkShare($action) {
		$this->toggleCheckbox(
			$action,
			$this->shareFileViaSocialMediaOnPublicShareCheckboxXpath,
			$this->shareFileViaSocialMediaOnPublicShareCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for read-only links
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleEnforcePasswordProtectionForReadOnlyLinks($action) {
		$this->toggleCheckbox(
			$action,
			$this->enforceLinkPasswordReadOnlyCheckboxXpath,
			$this->enforceLinkPasswordReadOnlyCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for read and write links
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleEnforcePasswordProtectionForReadWriteLinks($action) {
		$this->toggleCheckbox(
			$action,
			$this->enforceLinkPasswordReadWriteCheckboxXpath,
			$this->enforceLinkPasswordReadWriteCheckboxId
		);
	}

	/**
	 * toggle enforce password protection for upload only links
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleEnforcePasswordProtectionForWriteOnlyLinks($action) {
		$this->toggleCheckbox(
			$action,
			$this->enforceLinkPasswordWriteOnlyCheckboxXpath,
			$this->enforceLinkPasswordWriteOnlyCheckboxId
		);
	}

	/**
	 * toggle resharing
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleResharing($action) {
		$this->toggleCheckbox(
			$action,
			$this->allowResharingCheckboxXpath,
			$this->allowResharingCheckboxId
		);
	}

	/**
	 * toggle group sharing
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleGroupSharing($action) {
		$this->toggleCheckbox(
			$action,
			$this->allowGroupSharingCheckboxXpath,
			$this->allowGroupSharingCheckboxId
		);
	}

	/**
	 * toggle restrict users to only share with their group members
	 *
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleRestrictUsersToOnlyShareWithTheirGroupMembers($action) {
		$this->toggleCheckbox(
			$action,
			$this->onlyShareWithGroupMembersCheckboxXpath,
			$this->onlyShareWithGroupMembersCheckboxId
		);
	}

	/**
	 * add group to group sharing blacklist
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function addGroupToGroupSharingBlacklist($groupName) {
		$groupSharingBlackListField = $this->find("xpath", $this->groupSharingBlackListFieldXpath);
		$this->assertElementNotNull(
			$groupSharingBlackListField,
			__METHOD__ .
			" xpath $this->groupSharingBlackListFieldXpath " .
			"could not find input field"
		);
		$groupSharingBlackListField->click();
		$this->waitTillElementIsNotNull($this->groupListDropDownXpath);
		$this->waitTillElementIsNotNull($this->groupListXpath);
		$groupList = $this->findAll("xpath", $this->groupListXpath);
		$this->assertElementNotNull(
			$groupSharingBlackListField,
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
	 * waits till at least one Ajax call is active and
	 * then waits till all outstanding ajax calls finish
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitForAjaxCallsToStartAndFinish(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$start = \microtime(true);
		$this->waitForAjaxCallsToStart($session);
		$end = \microtime(true);
		$timeout_msec = $timeout_msec - (($end - $start) * 1000);
		$timeout_msec = \max($timeout_msec, MINIMUM_UI_WAIT_TIMEOUT_MILLISEC);
		$this->waitForOutstandingAjaxCalls($session, $timeout_msec);
	}
}
