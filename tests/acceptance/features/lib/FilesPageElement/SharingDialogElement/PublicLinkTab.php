<?php

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

namespace Page\FilesPageElement\SharingDialogElement;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Exception;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * The Public link tab of the Sharing Dialog
 *
 */
class PublicLinkTab extends OwncloudPage {
	/**
	 * @var NodeElement of this tab
	 */
	private $publicLinkTabElement;
	private $publicLinkTabId = "shareDialogLinkList";
	private $createLinkBtnXpath = ".//button[@class='addLink']";
	private $popupXpath = ".//div[@class='oc-dialog' and not(contains(@style,'display: none'))]";
	private $linkEntryByNameXpath = ".//*[@class='link-entry--title' and .=%s]/..";
	private $linkUrlInputXpath = ".//input";
	
	/**
	 * as it's not possible to run __construct() we need to run this function
	 * every time we get the tab with
	 * $this->getPage("FilesPageElement\\SharingDialogElement\\PublicLinkTab");
	 * this function finds the tab in the DOM and sets $this->publicLinkTabElement
	 * in the rest of the class we can use $this->publicLinkTabElement to find
	 * other elements to make sure that we are searching in the right place
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function initElement() {
		$publicLinkTab = $this->findById($this->publicLinkTabId);
		if ($publicLinkTab === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->publicLinkTabId could not find public link tab"
			);
		}
		$this->publicLinkTabElement = $publicLinkTab;
	}

	/**
	 *
	 * @param Session $session
	 * @param string $name
	 * @param string $permissions
	 * @param string $password
	 * @param string $expirationDate
	 * @param string $email
	 *
	 * @return string the name of the created public link
	 */
	public function createLink(
		Session $session,
		$name = null,
		$permissions = null,
		$password = null,
		$expirationDate = null,
		$email = null
	) {
		$createLinkBtn = $this->publicLinkTabElement->find(
			"xpath", $this->createLinkBtnXpath
		);
		if ($createLinkBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->createLinkBtnXpath" .
				" could not find create public link button"
			);
		}
		$createLinkBtn->click();

		$popupElement = $this->waitTillElementIsNotNull($this->popupXpath);
		/**
		 *
		 * @var EditPublicLinkPopup $editPublicLinkPopupPageObject
		 */
		$editPublicLinkPopupPageObject = $this->getPage(
			"FilesPageElement\\SharingDialogElement\\EditPublicLinkPopup"
		);
		$editPublicLinkPopupPageObject->setElement($popupElement);
		if ($name !== null) {
			$editPublicLinkPopupPageObject->setLinkName($name);
		}
		if ($permissions !== null) {
			$editPublicLinkPopupPageObject->setLinkPermissions($permissions);
		}
		if ($password !== null) {
			$editPublicLinkPopupPageObject->setLinkPassword($password);
		}
		if ($expirationDate !== null) {
			$editPublicLinkPopupPageObject->setLinkExpirationDate($expirationDate);
		}
		if ($email !== null) {
			$editPublicLinkPopupPageObject->setLinkEmail($email);
		}
		$linkName = $editPublicLinkPopupPageObject->getLinkName();
		$editPublicLinkPopupPageObject->save();
		$this->waitForAjaxCallsToStartAndFinish($session);
		return $linkName;
	}

	/**
	 *
	 * @param string $name
	 * @param string $newName
	 * @param array $permissions
	 * @param string $password
	 * @param string $expirationDate
	 * @param string $email
	 *
	 * @return void
	 */
	public function editLink(
		$name,
		$newName = null,
		$permissions = null,
		$password = null,
		$expirationDate = null,
		$email = null
	) {
		throw new Exception("not implemented");
	}

	/**
	 *
	 * @param string $name
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getLinkUrl($name) {
		$linkEntry = $this->findLinkEntryByName($name);
		$linkUrlInput = $linkEntry->find("xpath", $this->linkUrlInputXpath);
		if ($linkUrlInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->linkUrlInputXpath" .
				" could not find input field that contains the link URL"
			);
		}
		return $linkUrlInput->getValue();
	}

	/**
	 *
	 * @return void
	 */
	public function closeSharingPopup() {
		throw new Exception("not implemented");
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function deleteLink($name) {
		throw new Exception("not implemented");
	}

	/**
	 *
	 * @param string $name
	 * @param string $service
	 *
	 * @return void
	 */
	public function shareLink($name, $service) {
		throw new Exception("not implemented");
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function copyLinkToClipboard($name) {
		throw new Exception("not implemented");
	}

	/**
	 *
	 * @param string $name
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	private function findLinkEntryByName($name) {
		$xpathString = $this->quotedText($name);
		$linkEntry = $this->publicLinkTabElement->find(
			"xpath", \sprintf($this->linkEntryByNameXpath, $xpathString)
		);
		if ($linkEntry === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->linkEntryByNameXpath" .
				" could not find link entry with the given name"
			);
		}
		return $linkEntry;
	}
}
