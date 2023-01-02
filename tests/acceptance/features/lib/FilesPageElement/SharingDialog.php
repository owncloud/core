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

namespace Page\FilesPageElement;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Exception;
use Page\FilesPageElement\SharingDialogElement\PublicLinkTab;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use Page\OwncloudPageElement\OCDialog;
use WebDriver\Exception\StaleElementReference;
use PHPUnit\Framework\Assert;

/**
 * The Sharing Dialog
 *
 */
class SharingDialog extends OwncloudPage {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/';
	private $shareWithFieldXpath = ".//*[contains(@class,'shareWithField')]";
	private $shareWithTooltipXpath = "/..//*[@class='tooltip-inner']";
	private $shareWithAutocompleteListXpath = ".//ul[contains(@class,'ui-autocomplete')]";
	private $autocompleteItemsTextXpath = "//*[@class='autocomplete-item-text']";
	private $suffixToIdentifyGroups = " Group";
	private $suffixToIdentifyUsers = " User";
	private $suffixToIdentifyMultipleUsers = " Add multiple users";
	private $suffixToIdentifyRemoteUsers = " Federated";
	private $sharerInformationXpath = ".//*[@class='reshare']";
	private $sharedWithAndByRegEx = "Shared with you(?: and the group (.*))? by (.*)$";
	private $permissionsFieldByUserNameWithExtraInfo = "//*[@id='shareWithList']//span[contains(text(), '%s')]/parent::li[@data-share-with='%s']";
	private $permissionsFieldByUserName = "//*[@id='shareWithList']//span[contains(text(), '%s')]/parent::li";
	private $permissionsFieldByGroupName = "//*[@id='shareWithList']//span[contains(text(), '%s (group)')]/parent::li";
	private $permissionLabelXpath = ".//label[@for='%s']";
	private $showCrudsXpath = ".//span[@class='icon icon-settings-dark']";
	private $shareOptionsXpath = "//div[@class='shareOption']";
	private $publicLinksShareTabXpath = ".//li[contains(@class,'subtab-publicshare')]";
	private $publicLinksTabContentXpath = "//div[@id='shareDialogLinkList']";
	private $noSharingMessageXpath = "//div[@class='noSharingPlaceholder']";
	private $publicLinkRemoveBtnXpath = "//div[contains(@class, 'removeLink')]";
	private $publicLinkTitleXpath = "//span[@class='link-entry--title']";
	private $notifyByEmailBtnXpath = "//input[@name='mailNotification']";
	private $shareWithExpirationFieldXpath = "//*[@id='shareWithList']//span[@class='has-tooltip username' and .='%s']/..//input[contains(@class, 'expiration')]";
	private $shareWithClearExpirationFieldXpath = "/following-sibling::button[@class='removeExpiration']"; // in relation to $shareWithExpirationFieldXpath
	private $shareWithListXpath = "//ul[@id='shareWithList']/li";
	private $shareWithListDetailsXpath = "//div[@class='shareWithList__details']";
	private $userOrGroupNameSpanXpath = "//span[contains(@class,'username')]";
	private $unShareTabXpath = "//a[contains(@class,'unshare')]";
	private $sharedWithGroupAndSharerName = null;
	private $publicLinkRemoveDeclineMsg = "No";
	private $shareTreeItemByNameAndPathXpath = "//li[@class='shareTree-item' and strong/text()='%s' and span/text()='via %s']";
	private $userAndGroupsShareTabXpath = "//div[@class='dialogContainer']//li[contains(text(), 'User and Groups')]";

	/**
	 * @var string
	 */
	private $groupFramework = "%s (group)";

	/**
	 *
	 * @return NodeElement|NULL
	 * @throws ElementNotFoundException
	 */
	private function findShareWithField(): ?NodeElement {
		$shareWithField = $this->find("xpath", $this->shareWithFieldXpath);
		$this->assertElementNotNull(
			$shareWithField,
			__METHOD__ .
			" xpath $this->shareWithFieldXpath could not find share-with-field"
		);
		return $shareWithField;
	}

	/**
	 * @param string $user
	 * @param string $type
	 *
	 * @return null|NodeElement
	 */
	private function getExpirationFieldFor(string $user, string $type = 'user'): ?NodeElement {
		if ($type === "group") {
			$user = \sprintf($this->groupFramework, $user);
		}
		return $this->find("xpath", \sprintf($this->shareWithExpirationFieldXpath, $user));
	}

	/**
	 * open the dropdown for share actions in the sidebar
	 *
	 * @param string $type
	 * @param string $receiver
	 *
	 * @return void
	 */
	public function openShareActionsDropDown(string $type, string $receiver): void {
		$this->openShareActionsIfNotOpen($type, $receiver);
		$this->waitTillElementIsNotNull($this->shareWithListDetailsXpath);
	}

	/**
	 * @param string $user
	 * @param string $type
	 *
	 * @return bool
	 */
	public function isExpirationFieldVisible(string $user, string $type = 'user'): bool {
		$field = $this->getExpirationFieldFor($user, $type);
		$visible = ($field and $field->isVisible());
		return $visible;
	}

	/**
	 * @param string $user
	 * @param string $type
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getExpirationDateFor(string $user, string $type = 'user'): string {
		$field = $this->getExpirationFieldFor($user, $type);
		$this->assertElementNotNull(
			$field,
			"Could not find expiration field for " . $type . " '$user'"
		);
		return $field->getValue();
	}

	/**
	 * @param Session $session
	 * @param string $user
	 * @param string $type
	 * @param string $value
	 *
	 * @return void
	 */
	public function setExpirationDateFor(Session $session, string $user, string $type = 'user', string $value = ''): void {
		$field = $this->getExpirationFieldFor($user, $type);
		$this->assertElementNotNull(
			$field,
			"Could not find expiration field for " . $type . " '$user'"
		);
		$field->setValue($value . "\n");
		// you need to click somewhere to make the calendar widget go away
		// here we click at the sharing dialog's "User and Groups" tab
		$this->find("xpath", $this->userAndGroupsShareTabXpath)->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @param Session $session
	 * @param string $user
	 * @param string $type
	 *
	 * @return void
	 */
	public function clearExpirationDateFor(Session $session, string $user, string $type = 'user'): void {
		$field = $this->getExpirationFieldFor($user, $type);
		$this->assertElementNotNull(
			$field,
			"Could not find expiration field for " . $type . " '$user'"
		);
		$removeBtn = $field->find("xpath", $this->shareWithClearExpirationFieldXpath);
		$this->assertElementNotNull(
			$removeBtn,
			"Could not find expiration field remove button for " . $type . " '$user'"
		);
		$removeBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * checks if the share-with field is visible
	 *
	 * @return bool
	 */
	public function isShareWithFieldVisible(): bool {
		try {
			$visible = $this->findShareWithField()->isVisible();
		} catch (ElementNotFoundException $e) {
			$visible = false;
		}
		return $visible;
	}

	/**
	 * fills the "share-with" input field
	 *
	 * @param string|null $input
	 * @param Session $session
	 * @param int $timeout_msec how long to wait till the autocomplete comes back
	 *
	 * @return NodeElement AutocompleteElement
	 * @throws Exception
	 */
	public function fillShareWithField(
		?string  $input,
		Session $session,
		int     $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): NodeElement {
		$shareWithField = $this->findShareWithField();
		$this->fillFieldAndKeepFocus($shareWithField, $input, $session);
		$this->waitForAjaxCallsToStartAndFinish($session, $timeout_msec);
		return $this->getAutocompleteNodeElement();
	}

	/**
	 * get no sharing message
	 *
	 * @param Session $session
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getNoSharingMessage(Session $session): string {
		$noSharingMessage = $this->find("xpath", $this->noSharingMessageXpath);
		$this->assertElementNotNull(
			$noSharingMessage,
			__METHOD__ .
			" xpath $this->noSharingMessageXpath " .
			"could not find no sharing message"
		);
		return $this->getTrimmedText($noSharingMessage);
	}

	/**
	 * gets the NodeElement of the autocomplete list
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function getAutocompleteNodeElement(): NodeElement {
		$autocompleteNodeElement = $this->find(
			"xpath",
			$this->shareWithAutocompleteListXpath
		);
		$this->assertElementNotNull(
			$autocompleteNodeElement,
			__METHOD__ .
			" xpath $this->shareWithAutocompleteListXpath " .
			"could not find autocompleteNodeElement"
		);
		return $autocompleteNodeElement;
	}

	/**
	 * returns the user names as they could appear in an autocomplete list
	 *
	 * @param string|array $userNames
	 *
	 * @return string|array
	 */
	public function userStringsToMatchAutoComplete($userNames) {
		if (\is_array($userNames)) {
			$autocompleteStrings = [];
			foreach ($userNames as $userName => $userDisplayName) {
				$autocompleteStrings[$userName] = $userDisplayName . $this->suffixToIdentifyUsers;
			}
		} else {
			$autocompleteStrings = $userNames . $this->suffixToIdentifyUsers;
		}
		return $autocompleteStrings;
	}

	/**
	 * returns the group names as they could appear in an autocomplete list
	 *
	 * @param string|array $groupNames
	 *
	 * @return string|array
	 */
	public function groupStringsToMatchAutoComplete($groupNames) {
		if (\is_array($groupNames)) {
			$autocompleteStrings = [];
			foreach ($groupNames as $groupName => $groupData) {
				$autocompleteStrings[$groupName] = $groupName . $this->suffixToIdentifyGroups;
			}
		} else {
			$autocompleteStrings = $groupNames . $this->suffixToIdentifyGroups;
		}
		return $autocompleteStrings;
	}

	/**
	 * gets the items (users, groups) listed in the autocomplete list as an array
	 *
	 * @return array
	 * @throws ElementNotFoundException|Exception
	 */
	public function getAutocompleteItemsList(): array {
		$itemsArray = [];
		$itemElements = $this->getAutocompleteNodeElement()->findAll(
			"xpath",
			$this->autocompleteItemsTextXpath
		);
		foreach ($itemElements as $item) {
			\array_push($itemsArray, $this->getTrimmedText($item));
		}
		return $itemsArray;
	}

	/**
	 *
	 * @param string|null $nameToType what to type in the share with field
	 * @param string $nameToMatch what exact item to select
	 * @param Session $session
	 * @param boolean $quiet
	 * @param int $maxRetries
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function shareWithUserOrGroup(
		?string  $nameToType,
		string  $nameToMatch,
		Session $session,
		bool $quiet,
		int     $maxRetries = 5
	): void {
		$userFound = false;
		for ($retryCounter = 0; $retryCounter < $maxRetries; $retryCounter++) {
			$autocompleteNodeElement = $this->fillShareWithField(
				$nameToType,
				$session
			);
			$userElements = $autocompleteNodeElement->findAll(
				"xpath",
				$this->autocompleteItemsTextXpath
			);
			$userFound = false;
			foreach ($userElements as $user) {
				$trimmedText = $this->getTrimmedText($user);
				// The logic is changed due to "Add multiple users" because the order of users in autocomplete items is not fixed
				$trimmedUsers = preg_split("/[\s,]+/", $trimmedText);
				$usersToMatch = preg_split("/[\s,]+/", $nameToMatch);
				if (empty(array_diff($trimmedUsers, $usersToMatch))) {
					$user->click();
					$this->waitForAjaxCallsToStartAndFinish($session);
					$userFound = true;
					break;
				}
			}
			if ($userFound === true) {
				break;
			} elseif ($quiet === false) {
				\error_log("Error while sharing file");
			}
		}
		if ($retryCounter > 0 && $quiet === false) {
			$message = "INFORMATION: retried to share file $retryCounter times";
			echo $message;
			\error_log($message);
		}
		if ($userFound !== true) {
			throw new ElementNotFoundException(
				__METHOD__ . " could not share with '$nameToMatch'"
			);
		}
	}

	/**
	 *
	 * @param string|null $name
	 * @param Session $session
	 * @param boolean $quiet
	 * @param int $maxRetries
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function shareWithUser(
		?string  $name,
		Session $session,
		bool $quiet,
		int     $maxRetries = 5
	): void {
		$this->shareWithUserOrGroup(
			$name,
			$name . $this->suffixToIdentifyUsers,
			$session,
			$quiet,
			$maxRetries
		);
	}

	/**
	 *
	 * @param string|null $name
	 * @param string|null $nameToMatch
	 * @param Session $session
	 * @param boolean $quiet
	 * @param int $maxRetries
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function shareWithUsers(
		string $name,
		string $nameToMatch,
		Session $session,
		bool $quiet,
		int $maxRetries = 5
	): void {
		$this->shareWithUserOrGroup(
			$name,
			$nameToMatch . $this->suffixToIdentifyMultipleUsers,
			$session,
			$quiet,
			$maxRetries
		);
	}

	/**
	 *
	 * @param string|null $name
	 * @param Session $session
	 * @param boolean $quiet
	 * @param int $maxRetries
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function shareWithRemoteUser(
		?string  $name,
		Session $session,
		bool $quiet,
		int     $maxRetries = 5
	): void {
		$this->shareWithUserOrGroup(
			$name,
			$name . $this->suffixToIdentifyRemoteUsers,
			$session,
			$quiet,
			$maxRetries
		);
	}

	/**
	 *
	 * @param string|null $name
	 * @param Session $session
	 * @param boolean $quiet
	 * @param int $maxRetries
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function shareWithGroup(
		?string  $name,
		Session $session,
		bool $quiet,
		int     $maxRetries = 5
	): void {
		$this->shareWithUserOrGroup(
			$name,
			$name . $this->suffixToIdentifyGroups,
			$session,
			$quiet,
			$maxRetries
		);
	}

	/**
	 *
	 * @param string $userOrGroup
	 * @param string|null $shareReceiverName
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function openShareActionsIfNotOpen(string $userOrGroup, ?string $shareReceiverName): NodeElement {
		if ($userOrGroup == "group") {
			$xpathLocator = \sprintf(
				$this->permissionsFieldByGroupName,
				$shareReceiverName
			);
		} else {
			// For users having same display name we pass $shareReceiverName in the format "displayName (userName)"
			// Let's hope display name of user in other cases is not in the above mentioned format, otherwise this will fail
			if (\preg_match('/\(*\)/', (string)$shareReceiverName)
				&& !\strpos($shareReceiverName, '(federated)')
			) {
				$nameDisplayNameArray = \explode('(', $shareReceiverName);
				$shareReceiverName = \trim($nameDisplayNameArray[0]);
				$additionalInfo = \trim($nameDisplayNameArray[1], '()');
				$xpathLocator = \sprintf(
					$this->permissionsFieldByUserNameWithExtraInfo,
					$shareReceiverName,
					$additionalInfo
				);
			} else {
				$xpathLocator = \sprintf(
					$this->permissionsFieldByUserName,
					$shareReceiverName
				);
			}
		}
		$permissionsField = $this->waitTillElementIsNotNull($xpathLocator);
		$this->assertElementNotNull(
			$permissionsField,
			__METHOD__
			. " xpath $xpathLocator could not find share permissions field for $userOrGroup "
			. $shareReceiverName
		);
		$shareOptionsLocator = $permissionsField->find("xpath", $this->shareOptionsXpath);
		$this->assertElementNotNull(
			$shareOptionsLocator,
			__METHOD__
			. " xpath $this->shareOptionsXpath could not find share options for $userOrGroup "
			. $shareReceiverName
		);
		$shareOptionsStyle = $shareOptionsLocator->getAttribute("style");
		// check if showCrudsBtn is already clicked i.e. the permissions and expiration field are displayed
		// if showCrudsBtn is already clicked no need to click again
		if ($shareOptionsStyle === "display: inline-block;") {
			return $permissionsField;
		}

		$showCrudsBtn = $permissionsField->find("xpath", $this->showCrudsXpath);
		$this->assertElementNotNull(
			$showCrudsBtn,
			__METHOD__
			. " xpath $this->showCrudsXpath could not find show-cruds button for $userOrGroup "
			. $shareReceiverName
		);
		$showCrudsBtn->click();
		return $permissionsField;
	}

	/**
	 *
	 * @param string $userOrGroup
	 * @param string|null $shareReceiverName
	 * @param array $permissions [['permission' => 'yes|no']]
	 * @param Session $session
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function setSharingPermissions(
		string  $userOrGroup,
		?string  $shareReceiverName,
		array   $permissions,
		Session $session
	): void {
		$permissionsField = $this->openShareActionsIfNotOpen($userOrGroup, $shareReceiverName);
		foreach ($permissions as $permission => $value) {
			$value = \strtolower($value);

			//to find where to click is a little bit complicated
			//just setting the checkbox does not work
			//because the actual checkbox is not visible (left: -10000px;)
			//so we first find the checkbox, then get its id and find the label
			//that is associated with that id, that label is finally what we click
			$permissionCheckBox = $permissionsField->findField($permission);
			$this->assertElementNotNull(
				$permissionCheckBox,
				__METHOD__ .
				"could not find the permission check box for permission " .
				"'$permission' and user '$shareReceiverName'"
			);
			$checkBoxId = $permissionCheckBox->getAttribute("id");
			$this->assertElementNotNull(
				$checkBoxId,
				__METHOD__ .
				"could not find the id of the permission check box of " .
				"permission '$permission' and user '$shareReceiverName'"
			);

			$xpathLocator = \sprintf($this->permissionLabelXpath, $checkBoxId);
			$permissionLabel = $permissionsField->find("xpath", $xpathLocator);

			$this->assertElementNotNull(
				$permissionLabel,
				__METHOD__ .
				" xpath $xpathLocator " .
				"could not find the label of the permission check box of " .
				"permission '$permission' and user '$shareReceiverName'"
			);

			if (($value === "yes" && !$permissionCheckBox->isChecked())
				|| ($value === "no" && $permissionCheckBox->isChecked())
			) {
				// Some times when we try to click the label it gives StaleElementReference.
				try {
					$permissionLabel->click();
				} catch (StaleElementReference $e) {
				}
				$this->waitForAjaxCallsToStartAndFinish($session);
				// We recheck the value to make sure that the permission has changed since clicking it.
				if (($value === "yes" && !$permissionCheckBox->isChecked())
					|| ($value === "no" && $permissionCheckBox->isChecked())
				) {
					throw new Exception("The checkbox for permission {$permissionLabel->getText()} could not be clicked.");
				}
			}
		}
	}

	/**
	 *
	 * @param string $userOrGroup
	 * @param string|null $shareReceiverName
	 * @param array $permissions [['permission' => 'yes|no']]
	 * @param Session $session
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function checkSharingPermissions(
		string  $userOrGroup,
		?string  $shareReceiverName,
		array   $permissions,
		Session $session
	): void {
		$permissionsField = $this->openShareActionsIfNotOpen($userOrGroup, $shareReceiverName);
		foreach ($permissions as $permission => $value) {
			$permissionCheckBox = $permissionsField->findField($permission);

			$this->waitForAjaxCallsToStartAndFinish($session);

			if ($value === "yes" && !$permissionCheckBox->isChecked()) {
				throw new Exception("The checkbox for permission {$permission} is not enabled.");
			} elseif ($value === "no" && $permissionCheckBox->isChecked()) {
				throw new Exception("The checkbox for permission {$permission} is enabled.");
			}
		}
	}

	/**
	 * gets the text of the tooltip associated with the "share-with" input
	 *
	 * @return string
	 * @throws ElementNotFoundException|Exception
	 */
	public function getShareWithTooltip(): string {
		$shareWithField = $this->findShareWithField();
		$shareWithTooltip = $shareWithField->find(
			"xpath",
			$this->shareWithTooltipXpath
		);
		$this->assertElementNotNull(
			$shareWithTooltip,
			__METHOD__ .
			" xpath $this->shareWithTooltipXpath " .
			"could not find share-with-tooltip"
		);
		return $this->getTrimmedText($shareWithTooltip);
	}

	/**
	 * gets the Element with the information about who has shared the current
	 * file/folder. This Element will contain the Avatar and some text.
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function findSharerInformationItem(): NodeElement {
		$sharerInformation = $this->find("xpath", $this->sharerInformationXpath);
		$this->assertElementNotNull(
			$sharerInformation,
			__METHOD__ .
			" xpath $this->sharerInformationXpath " .
			"could not find sharer information"
		);
		return $sharerInformation;
	}

	/**
	 * gets the group that the file/folder was shared with
	 * and the user that shared it
	 *
	 * @return array ["sharedWithGroup" => string, "sharer" => string]
	 * @throws Exception
	 */
	public function getSharedWithGroupAndSharerName(): array {
		if ($this->sharedWithGroupAndSharerName === null) {
			$text = $this->getTrimmedText($this->findSharerInformationItem());
			if (\preg_match("/$this->sharedWithAndByRegEx/", $text, $matches)) {
				$this->sharedWithGroupAndSharerName = [
					"sharedWithGroup" => $matches [1],
					"sharer" => $matches [2]
				];
			} else {
				throw new Exception(
					__METHOD__ .
					"could not find shared with group or sharer name"
				);
			}
		}
		return $this->sharedWithGroupAndSharerName;
	}

	/**
	 * gets the group that the file/folder was shared with
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function getSharedWithGroupName() {
		return $this->getSharedWithGroupAndSharerName()["sharedWithGroup"];
	}

	/**
	 * gets the display name of the user that has shared the current file/folder
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getSharerName(): string {
		return $this->getSharedWithGroupAndSharerName()["sharer"];
	}

	/**
	 * @param Session $session
	 *
	 * @return PublicLinkTab
	 * @throws ElementNotFoundException|Exception
	 */
	public function openPublicShareTab(Session $session): PublicLinkTab {
		$publicLinksShareTab = $this->find("xpath", $this->publicLinksShareTabXpath);
		$this->assertElementNotNull(
			$publicLinksShareTab,
			__METHOD__ .
			" xpath $this->publicLinksShareTabXpath " .
			"could not find public links share tab"
		);
		$publicLinksShareTab->click();
		/**
		 *
		 * @var PublicLinkTab $publicLinkTab
		 */
		$publicLinkTab = $this->getPage(
			"FilesPageElement\\SharingDialogElement\\PublicLinkTab"
		);
		$publicLinkTab->waitTillPageIsLoaded(
			$session,
			STANDARD_UI_WAIT_TIMEOUT_MILLISEC,
			$this->publicLinksTabContentXpath
		);
		return $publicLinkTab;
	}

	/**
	 * returns visibility of public link share tab
	 *
	 * @return bool
	 */
	public function isPublicLinkTabVisible(): bool {
		$publicLinksShareTab = $this->find("xpath", $this->publicLinksShareTabXpath);
		if ($publicLinksShareTab) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param Session $session
	 * @param integer $number
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removePublicLink(Session $session, int $number = 1): void {
		$this->clickRemoveBtn($session, $number);
		// In some cases, it takes some time for the oc dialog to appear.
		// Here, if oc dialog is not present we are waiting for 0.1 second
		// and then checking it's visibility on the webUI
		for ($i = 0; $i < 20; $i++) {
			$ocDialog = $this->getLastOcDialog($session);
			if ($ocDialog) {
				break;
			}
			\usleep(100000);
		}
		Assert::assertNotFalse(
			$ocDialog,
			'oc dialog was expected to be present but not found'
		);
		$ocDialog->accept($session);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function cancelRemovePublicLinkOperation(Session $session): void {
		$this->clickRemoveBtn($session);
		$ocDialog = $this->getLastOcDialog($session);
		$ocDialog->clickButton($session, $this->publicLinkRemoveDeclineMsg);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @param Session $session
	 * @param integer $number
	 *
	 * @return void
	 * @throws Exception
	 */
	private function clickRemoveBtn(Session $session, int $number = 1): void {
		$publicLinkRemoveBtns = $this->findAll("xpath", $this->publicLinkRemoveBtnXpath);
		$this->assertElementNotNull(
			$publicLinkRemoveBtns,
			__METHOD__ .
			" xpath $this->publicLinkRemoveBtnXpath " .
			"could not find public link remove buttons"
		);
		if ($number < 1) {
			throw new Exception(__METHOD__ . " Position cannot be less than 1");
		}
		$publicLinkRemoveBtn = $publicLinkRemoveBtns[$number - 1];
		$this->assertElementNotNull(
			$publicLinkRemoveBtn,
			__METHOD__ .
			" xpath $this->publicLinkRemoveBtnXpath " .
			"could not find public link remove button"
		);
		$publicLinkRemoveBtn->click();
	}

	/**
	 * @param Session $session
	 *
	 * @return OCDialog
	 */
	private function getLastOcDialog(Session $session): OCDialog {
		$ocDialogs = $this->getOcDialogs();
		return \end($ocDialogs);
	}

	/**
	 *
	 * @param Session $session
	 * @param string $entryName
	 *
	 * @return void
	 * @throws Exception
	 *
	 */
	public function checkThatNameIsNotInPublicLinkList(Session $session, string $entryName): void {
		$publicLinkTitles = $this->findAll("xpath", $this->publicLinkTitleXpath);
		foreach ($publicLinkTitles as $publicLinkTitle) {
			if ($entryName === $publicLinkTitle->getText()) {
				throw new Exception("Public link with title" . $entryName . "is present");
			}
		}
	}

	/**
	 * @param Session $session
	 * @param string $entryName
	 *
	 * @return bool
	 */
	public function checkThatNameIsInPublicLinkList(Session $session, string $entryName): bool {
		$publicLinkTitles = $this->findAll("xpath", $this->publicLinkTitleXpath);
		$found = false;
		foreach ($publicLinkTitles as $publicLinkTitle) {
			if ($entryName === $publicLinkTitle->getText()) {
				$found = true;
			}
		}
		return $found;
	}

	/**
	 * get the list of shared with users
	 *
	 * @return NodeElement[]
	 */
	public function getShareWithList(): array {
		return $this->findAll('xpath', $this->shareWithListXpath);
	}

	/**
	 * delete user/group from shared with list
	 *
	 * @param Session $session
	 * @param string $userOrGroup
	 * @param string $username
	 *
	 * @return void
	 */
	public function deleteShareWith(Session $session, string $userOrGroup, string $username): void {
		$shareWithList = $this->getShareWithList();
		foreach ($shareWithList as $item) {
			if ($userOrGroup == "group") {
				$username = \sprintf($this->groupFramework, $username);
			}
			if ($item->find('xpath', $this->userOrGroupNameSpanXpath)->getHtml() === $username) {
				$item->find('xpath', $this->unShareTabXpath)->click();
				$this->waitForAjaxCallsToStartAndFinish($session);
			}
		}
	}

	/**
	 *
	 * @param Session $session
	 * @param integer $count
	 *
	 * @return void
	 * @throws Exception
	 *
	 */
	public function checkPublicLinkCount(Session $session, int $count): void {
		$publicLinkTitles = $this->findAll("xpath", $this->publicLinkTitleXpath);
		$publicLinkTitlesCount = \count($publicLinkTitles);
		if ($publicLinkTitlesCount != $count) {
			throw new Exception("Found $publicLinkTitlesCount public link entries but expected $count");
		}
	}

	/**
	 * check if user with the given username is present in the shared with list
	 *
	 * @param string $username
	 *
	 * @return bool
	 */
	public function isUserPresentInShareWithList(string $username): bool {
		$shareWithList = $this->getShareWithList();
		foreach ($shareWithList as $user) {
			$actualUsername = $user->find('xpath', $this->userOrGroupNameSpanXpath);
			if ($actualUsername->getHtml() === $username) {
				return true;
			}
		}
		return false;
	}

	/**
	 * check if group with the given groupName is present in the shared with list
	 *
	 * @param string $groupName
	 *
	 * @return bool
	 */
	public function isGroupPresentInShareWithList(string $groupName): bool {
		$shareWithList = $this->getShareWithList();
		foreach ($shareWithList as $group) {
			$actualGroupName = $group->find('xpath', $this->userOrGroupNameSpanXpath);
			return $actualGroupName->getHtml() === \sprintf($this->groupFramework, $groupName);
		}
		return false;
	}

	/**
	 * send share notification by email to the sharee
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function sendShareNotificationByEmail(Session $session): void {
		$notifyByEmailBtn = $this->find("xpath", $this->notifyByEmailBtnXpath);
		$this->assertElementNotNull(
			$notifyByEmailBtn,
			__METHOD__ .
			" xpath $this->notifyByEmailBtnXpath " .
			"could not find notify by email button"
		);
		$notifyByEmailBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @param string $type user|group|public link with name
	 * @param string $name user or group name
	 * @param string $path
	 *
	 * @return NodeElement
	 */
	public function getShareTreeItem(string $type, string $name, string $path): NodeElement {
		if ($type === "group") {
			$name = \sprintf($this->groupFramework, $name);
		}
		$fullXpath = \sprintf($this->shareTreeItemByNameAndPathXpath, $name, $path);
		$item = $this->find("xpath", $fullXpath);
		$this->assertElementNotNull(
			$item,
			__METHOD__ .
			"\ncannot find item with name '$name' and path '$path'"
		);
		return $item;
	}

	/**
	 * waits for the dialog to appear
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 * @param string|null $xpath the xpath of the element to wait for
	 *                           required to be set
	 *
	 * @return void
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC,
		?string $xpath = null
	):void {
		if ($xpath === null) {
			throw new \InvalidArgumentException('$xpath needs to be set');
		}
		$this->waitForOutstandingAjaxCalls($session);
		$this->waitTillXpathIsVisible($xpath, $timeout_msec);
	}
}
