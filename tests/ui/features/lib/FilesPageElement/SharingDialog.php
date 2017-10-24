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

namespace Page\FilesPageElement;

use Behat\Mink\Element\NodeElement;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use Behat\Mink\Session;

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

	protected $shareWithFieldXpath = ".//*[contains(@class,'shareWithField')]";
	protected $shareWithTooltipXpath = "/..//*[@class='tooltip-inner']";
	protected $shareWithAutocompleteListXpath = ".//ul[contains(@class,'ui-autocomplete')]";
	protected $autocompleteItemsTextXpath = "//*[@class='autocomplete-item-text']";
	protected $shareWithCloseXpath = "//div[@id='app-sidebar']//*[@class='close icon-close']";
	protected $suffixToIdentifyGroups = " (group)";
	protected $suffixToIdentifyRemoteUsers = " (remote)";
	protected $sharerInformationXpath = ".//*[@class='reshare']";
	protected $sharedWithAndByRegEx = "^(?:[A-Z]\s)?Shared with you(?: and the group (.*))? by (.*)$";
	protected $thumbnailContainerXpath = ".//*[contains(@class,'thumbnailContainer')]";
	protected $thumbnailFromContainerXpath = "/a";
	protected $permissionsFieldByUserName = ".//*[@id='shareWithList']//*[@class='has-tooltip username' and .='%s']/..";
	protected $permissionLabelXpath = ".//label[@for='%s']";
	protected $showCrudsXpath = ".//*[@class='showCruds']";

	protected $sharedWithGroupAndSharerName = null;

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement|NULL
	 */
	private function _findShareWithField() {
		$shareWithField = $this->find("xpath", $this->shareWithFieldXpath);
		if ($shareWithField === null) {
			throw new ElementNotFoundException("could not find share-with-field");
		}
		return $shareWithField;
	}

	/**
	 * fills the "share-with" input field
	 *
	 * @param string $input
	 * @param Session $session
	 * @param int $timeout_msec how long to wait till the autocomplete comes back
	 * @return NodeElement AutocompleteElement
	 */
	public function fillShareWithField(
		$input, Session $session, $timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC
	) {
		$shareWithField = $this->_findShareWithField();
		$shareWithField->setValue($input);
		$this->waitForAjaxCallsToStartAndFinish($session, $timeout_msec);
		return $this->getAutocompleteNodeElement();
	}

	/**
	 * gets the NodeElement of the autocomplete list
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function getAutocompleteNodeElement() {
		$autocompleteNodeElement = $this->find(
			"xpath",
			$this->shareWithAutocompleteListXpath
		);
		if ($autocompleteNodeElement === null) {
			throw new ElementNotFoundException(
				"could not find autocompleteNodeElement"
			);
		}
		return $autocompleteNodeElement;
	}

	/**
	 * returns the group names as they could appear in an autocomplete list
	 *
	 * @param string|array $groupNames
	 * @return array
	 */
	public function groupStringsToMatchAutoComplete($groupNames) {
		if (is_array($groupNames)) {
			$autocompleteStrings = array();
			foreach ($groupNames as $groupName) {
				$autocompleteStrings[] = $groupName . $this->suffixToIdentifyGroups;
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
	 * @throws ElementNotFoundException
	 */
	public function getAutocompleteItemsList() {
		$itemsArray = array();
		$itemElements = $this->getAutocompleteNodeElement()->findAll(
			"xpath",
			$this->autocompleteItemsTextXpath
		);
		foreach ($itemElements as $item) {
			array_push($itemsArray, $item->getText());
		}
		return $itemsArray;
	}

	/**
	 *
	 * @param string $nameToType what to type in the share with field
	 * @param string $nameToMatch what exact item to select
	 * @param Session $session
	 * @throws ElementNotFoundException
	 * @return void
	 */
	private function shareWithUserOrGroup(
		$nameToType, $nameToMatch, Session $session
	) {
		$autocompleteNodeElement = $this->fillShareWithField($nameToType, $session);
		$userElements = $autocompleteNodeElement->findAll(
			"xpath", $this->autocompleteItemsTextXpath
		);

		$userFound = false;
		foreach ($userElements as $user) {
			if ($user->getText() === $nameToMatch) {
				$user->click();
				$this->waitForAjaxCallsToStartAndFinish($session);
				$userFound = true;
				break;
			}
		}

		if ($userFound !== true) {
			throw new ElementNotFoundException(
				"could not share with '$nameToMatch'"
			);
		}
	}

	/**
	 *
	 * @param string $name
	 * @param Session $session
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function shareWithUser($name, Session $session) {
		$this->shareWithUserOrGroup($name, $name, $session);
	}

	/**
	 *
	 * @param string $name
	 * @param Session $session
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function shareWithRemoteUser($name, Session $session) {
		$this->shareWithUserOrGroup(
			$name, $name . $this->suffixToIdentifyRemoteUsers, $session
		);
	}

	/**
	 *
	 * @param string $name
	 * @param Session $session
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function shareWithGroup($name, Session $session) {
		$this->shareWithUserOrGroup(
			$name, $name . $this->suffixToIdentifyGroups, $session
		);
	}

	/**
	 *
	 * @param string $shareReceiverName
	 * @param array $permissions [['permission' => 'yes|no']]
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function setSharingPermissions(
		$shareReceiverName,
		$permissions
	) {
		$permissionsField = $this->find(
			"xpath",
			sprintf($this->permissionsFieldByUserName, $shareReceiverName)
		);
		if (is_null($permissionsField)) {
			throw new ElementNotFoundException(
				"could not find share permissions field for user "
				. $shareReceiverName
			);
		}
		$showCrudsBtn = $permissionsField->find("xpath", $this->showCrudsXpath);
		if (is_null($showCrudsBtn)) {
			throw new ElementNotFoundException(
				"could not find show-cruds button for user "
				. $shareReceiverName
			);
		}
		foreach ($permissions as $permission => $value) {
			//the additional permission disappear again after they are changed
			//so we need to open them again and again
			$showCrudsBtn->click();
			$value = strtolower($value);

			//to find where to click is a little bit complicated
			//just setting the checkbox does not work
			//because the actual checkbox is not visible (left: -10000px;)
			//so we first find the checkbox, then get its id and find the label
			//that is associated with that id, that label is finally what we click
			$permissionCheckBox = $permissionsField->findField($permission);
			if (is_null($permissionCheckBox)) {
				throw new ElementNotFoundException(
					"could not find the permission check box for permission " .
					"'$permission' and user '$shareReceiverName'"
				);
			}
			$checkBoxId = $permissionCheckBox->getAttribute("id");
			if (is_null($checkBoxId)) {
				throw new ElementNotFoundException(
					"could not find the id of the permission check box of " .
					"permission '$permission' and user '$shareReceiverName'"
				);
			}
			$permissionLabel = $permissionsField->find(
				"xpath", sprintf($this->permissionLabelXpath, $checkBoxId)
			);

			if (is_null($permissionLabel)) {
				throw new ElementNotFoundException(
					"could not find the label of the permission check box of " .
					"permission '$permission' and user '$shareReceiverName'"
				);
			}

			if (($value === "yes" && !$permissionCheckBox->isChecked())
				|| ($value === "no" && $permissionCheckBox->isChecked())
			) {
				$permissionLabel->click();
			}
		}
	}

	/**
	 * gets the text of the tooltip associated with the "share-with" input
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getShareWithTooltip() {
		$shareWithField = $this->_findShareWithField();
		$shareWithTooltip = $shareWithField->find(
			"xpath", $this->shareWithTooltipXpath
		);
		if ($shareWithTooltip === null) {
			throw new ElementNotFoundException("could not find share-with-tooltip");
		}
		return $shareWithTooltip->getText();
	}

	/**
	 * gets the Element with the information about who has shared the current
	 * file/folder. This Element will contain the Avatar and some text.
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findSharerInformationItem() {
		$sharerInformation = $this->find("xpath", $this->sharerInformationXpath);
		if (is_null($sharerInformation)) {
			throw new ElementNotFoundException("could not find sharer information");
		}
		return $sharerInformation;
	}

	/**
	 * gets the group that the file/folder was shared with
	 * and the user that shared it
	 *
	 * @throws \Exception
	 * @return array ["sharedWithGroup" => string, "sharer" => string]
	 */
	public function getSharedWithGroupAndSharerName() {
		if (is_null($this->sharedWithGroupAndSharerName)) {
			$text = $this->findSharerInformationItem()->getText();
			if (preg_match("/" . $this->sharedWithAndByRegEx . "/", $text, $matches)) {
				$this->sharedWithGroupAndSharerName = [
					"sharedWithGroup" => $matches [1],
					"sharer" => $matches [2]
				];
			} else {
				throw new \Exception(
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
	 */
	public function getSharedWithGroupName() {
		return $this->getSharedWithGroupAndSharerName()["sharedWithGroup"];
	}

	/**
	 * gets the display name of the user that has shared the current file/folder
	 *
	 * @throws \Exception
	 * @return string
	 */
	public function getSharerName() {
		return $this->getSharedWithGroupAndSharerName()["sharer"];
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement of the whole container holding the thumbnail
	 */
	public function findThumbnailContainer() {
		$thumbnailContainer = $this->find("xpath", $this->thumbnailContainerXpath);
		if (is_null($thumbnailContainer)) {
			throw new ElementNotFoundException("could not find thumbnailContainer");
		}
		return $thumbnailContainer;
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findThumbnail() {
		$thumbnailContainer = $this->findThumbnailContainer();
		$thumbnail = $thumbnailContainer->find(
			"xpath", $this->thumbnailFromContainerXpath
		);
		if (is_null($thumbnail)) {
			throw new ElementNotFoundException("could not find thumbnail");
		}
		return $thumbnail;
	}

	/**
	 * closes the sharing dialog panel
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function closeSharingDialog() {
		$shareDialogCloseButton = $this->find("xpath", $this->shareWithCloseXpath);
		if ($shareDialogCloseButton === null) {
			throw new ElementNotFoundException(
				"could not find share-dialog-close-button"
			);
		}
		$shareDialogCloseButton->click();
	}
}
