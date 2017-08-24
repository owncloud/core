<?php

/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Page\FilesPageElement;

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
	protected $shareWithCloseXpath = "/..//*[@class='close icon-close']";
	protected $suffixToIdentifyGroups = " (group)";
	protected $sharerInformationXpath = ".//*[@class='reshare']";
	protected $sharedWithAndByRegEx = "^(?:[A-Z]\s)?Shared with you(?: and the group (.*))? by (.*)$";
	protected $thumbnailContainerXpath = ".//*[contains(@class,'thumbnailContainer')]";
	protected $thumbnailFromContainerXpath = "/a";
	
	protected $sharedWithGroupAndSharerName = null;

	/**
	 * 
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 * @return \Behat\Mink\Element\NodeElement|NULL
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
	 * @param number $timeout_msec how long to wait till the autocomplete comes back
	 * @return \Behat\Mink\Element\NodeElement AutocompleteElement
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
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
	 * @return \Behat\Mink\Element\NodeElement
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function getAutocompleteNodeElement() {
		$autocompleteNodeElement = $this->find("xpath", $this->shareWithAutocompleteListXpath);
		if ($autocompleteNodeElement === null) {
			throw new ElementNotFoundException("could not find autocompleteNodeElement");
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
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
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
	 * @param bool $canShare not implemented yet
	 * @param bool $canEdit not implemented yet
	 * @param bool $createPermission not implemented yet
	 * @param bool $changePermission not implemented yet
	 * @param bool $deletePermission not implemented yet
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 * @return void
	 */
	private function shareWithUserOrGroup(
		$nameToType,
		$nameToMatch,
		Session $session,
		$canShare = true,
		$canEdit = true,
		$createPermission = true,
		$changePermission = true,
		$deletePermission = true
	) {
		if ($canShare !== true
			|| $canEdit !== true
			|| $createPermission !== true
			|| $changePermission !== true
			|| $deletePermission !== true
		) {
				throw new \Exception("this function is not implemented");
		}
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
			throw new ElementNotFoundException("could not share with '$nameToMatch'");
		}
	}

	/**
	 * 
	 * @param string $name
	 * @param Session $session
	 * @param bool $canShare not implemented yet
	 * @param bool $canEdit not implemented yet
	 * @param bool $createPermission not implemented yet
	 * @param bool $changePermission not implemented yet
	 * @param bool $deletePermission not implemented yet
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 * @return void
	 */
	public function shareWithUser(
		$name,
		Session $session,
		$canShare = true,
		$canEdit = true,
		$createPermission = true,
		$changePermission = true,
		$deletePermission = true
	) {
		return $this->shareWithUserOrGroup(
			$name, $name, $session, $canShare, $canEdit, $createPermission,
			$changePermission, $deletePermission
		);
	}

	/**
	 *
	 * @param string $name
	 * @param Session $session
	 * @param bool $canShare not implemented yet
	 * @param bool $canEdit not implemented yet
	 * @param bool $createPermission not implemented yet
	 * @param bool $changePermission not implemented yet
	 * @param bool $deletePermission not implemented yet
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 * @return void
	 */
	public function shareWithGroup(
		$name,
		Session $session,
		$canShare = true,
		$canEdit = true,
		$createPermission = true,
		$changePermission = true,
		$deletePermission = true
	) {
		return $this->shareWithUserOrGroup(
			$name, $name . $this->suffixToIdentifyGroups, $session,
			$canShare, $canEdit, $createPermission, $changePermission,
			$deletePermission
		);
	}

	/**
	 * gets the text of the tooltip associated with the "share-with" input
	 * 
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 * @return string
	 */
	public function getShareWithTooltip() {
		$shareWithField = $this->_findShareWithField();
		$shareWithTooltip = $shareWithField->find("xpath", $this->shareWithTooltipXpath);
		if ($shareWithTooltip === null) {
			throw new ElementNotFoundException("could not find share-with-tooltip");
		}
		return $shareWithTooltip->getText();
	}

	/**
	 * gets the Element with the information about who has shared the current file/folder
	 * this Element will contain the Avatar and some text
	 * 
	 * @throws ElementNotFoundException
	 * @return \Behat\Mink\Element\NodeElement
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
	 * @return \Behat\Mink\Element\NodeElement of the whole container holding the
	 * thumbnail
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
	 * @return \Behat\Mink\Element\NodeElement
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
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 * @return void
	 */
	public function closeSharingDialog() {
		$shareDialogCloseButton = $this->find("xpath", $this->shareWithCloseXpath);
		if ($shareDialogCloseButton === null) {
			throw new ElementNotFoundException("could not find share-dialog-close-button");
		}
		$shareDialogCloseButton->click();
	}
}
