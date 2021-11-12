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

namespace Page\FilesPageElement\SharingDialogElement;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Exception;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * The Public link tab of the Sharing Dialog
 *
 */
class PublicLinkTab extends OwncloudPage {
	/**
	 * @var NodeElement of this tab
	 */
	private $publicLinkTabElement;
	private $createLinkBtnXpath = ".//button[@class='addLink']";
	private $popupXpath = ".//div[@class='oc-dialog' and not(contains(@style,'display: none'))]";
	private $linkEntryByNameXpath = ".//*[@class='link-entry--title' and .=%s]/..";
	private $linkEntriesNamesXpath = "//div[@id='shareDialogLinkList']//span[@class='link-entry--title']";
	private $linkUrlInputXpath = ".//input";
	private $publicLinkWarningMessageXpath = ".//*[@class='error-message-global'][last()]";
	private $linkEditBtnXpath = "//div[@class='link-entry--icon-button editLink']";

	/**
	 *
	 * @var EditPublicLinkPopup
	 */
	private $editPublicLinkPopupPageObject;

	/**
	 * sets the NodeElement for the current popup
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by
	 * $this->getPage("....")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $publicLinkTab
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setElement(NodeElement $publicLinkTab): void {
		$this->publicLinkTabElement = $publicLinkTab;
	}

	/**
	 * waits for the tab to appear and sets the element
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
		$element = $this->waitTillXpathIsVisible($xpath, $timeout_msec);
		$this->setElement($element);
	}

	/**
	 *
	 * @param Session $session
	 * @param string|null $name
	 * @param string|null $permissions
	 * @param string|null $password
	 * @param string|null $expirationDate
	 * @param string|null $email
	 * @param string|null $emailToSelf
	 * @param string|null $personalMessage
	 *
	 * @return string the name of the created public link
	 * @throws Exception
	 */
	public function createLink(
		Session $session,
		?string $name = null,
		?string $permissions = null,
		?string $password = null,
		?string $expirationDate = null,
		?string $email = null,
		?string $emailToSelf = null,
		?string $personalMessage = null
	): string {
		$editPublicLinkPopupPageObject = $this->openSharingPopup($session);
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
			$emails = \explode(",", $email);
			foreach ($emails as $email) {
				$editPublicLinkPopupPageObject->setLinkEmail(\trim($email));
			}
		}
		if ($emailToSelf === "true" && $email !== null) {
			$editPublicLinkPopupPageObject->setEmailToSelf();
		}
		if ($personalMessage !== null && $email !== null) {
			$editPublicLinkPopupPageObject->setPersonalMessage($personalMessage);
		}
		$linkName = $editPublicLinkPopupPageObject->getLinkName();
		$editPublicLinkPopupPageObject->save();
		$this->waitForAjaxCallsToStartAndFinish($session);
		return $linkName;
	}

	/**
	 * @param Session $session
	 *
	 * @return EditPublicLinkPopup|Page
	 *
	 * @throws ElementNotFoundException|Exception
	 */
	public function openSharingPopup(Session $session) {
		$createLinkBtn = $this->publicLinkTabElement->find(
			"xpath",
			$this->createLinkBtnXpath
		);
		$this->assertElementNotNull(
			$createLinkBtn,
			__METHOD__ .
			" xpath $this->createLinkBtnXpath" .
			" could not find create public link button"
		);
		$createLinkBtn->click();

		$this->editPublicLinkPopupPageObject = $this->getPage(
			"FilesPageElement\\SharingDialogElement\\EditPublicLinkPopup"
		);
		$this->editPublicLinkPopupPageObject->waitTillPageIsLoaded(
			$session,
			STANDARD_UI_WAIT_TIMEOUT_MILLISEC,
			$this->popupXpath
		);

		return $this->editPublicLinkPopupPageObject;
	}

	/**
	 * return if create link share button is present or not
	 *
	 * @return bool
	 */
	public function isCreateLinkShareButtonPresent(): bool {
		$createLinkBtn = $this->publicLinkTabElement->find(
			"xpath",
			$this->createLinkBtnXpath
		);
		if ($createLinkBtn) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Updates sharing popup as popup may change
	 *
	 * @param Session $session
	 *
	 * @return EditPublicLinkPopup
	 * @throws Exception
	 */
	public function updateSharingPopup(Session $session): EditPublicLinkPopup {
		$this->editPublicLinkPopupPageObject = $this->getPage(
			"FilesPageElement\\SharingDialogElement\\EditPublicLinkPopup"
		);
		$this->editPublicLinkPopupPageObject->waitTillPageIsLoaded(
			$session,
			STANDARD_UI_WAIT_TIMEOUT_MILLISEC,
			$this->popupXpath
		);
		return $this->editPublicLinkPopupPageObject;
	}

	/**
	 *
	 * @param Session $session
	 * @param string $name
	 * @param string|null $newName
	 * @param string|null $permissions
	 * @param string|null $password
	 * @param string|null $expirationDate
	 * @param string|null $email
	 * @param bool $save
	 *
	 * @return EditPublicLinkPopup
	 * @throws ElementNotFoundException|Exception
	 */
	public function editLink(
		Session $session,
		string  $name,
		?string $newName = null,
		?string $permissions = null,
		?string $password = null,
		?string $expirationDate = null,
		?string $email = null,
		bool    $save = true
	): EditPublicLinkPopup {
		$this->openSharingPopupByLinkName($name, $session);

		if ($newName !== null) {
			$this->editPublicLinkPopupPageObject->setLinkName($newName);
		}
		if ($password !== null) {
			$this->editPublicLinkPopupPageObject->setLinkPassword($password);
		}
		if ($permissions !== null) {
			$this->editPublicLinkPopupPageObject->setLinkPermissions($permissions);
		}
		if ($expirationDate !== null) {
			$this->editPublicLinkPopupPageObject->setLinkExpirationDate($expirationDate);
		}

		if ($save === true) {
			$this->editPublicLinkPopupPageObject->save();
		} else {
			$this->editPublicLinkPopupPageObject->cancel();
		}
		return $this->editPublicLinkPopupPageObject;
	}

	/**
	 * Open Sharing Popup from given link name
	 *
	 * @param string $name
	 * @param Session $session
	 *
	 * @return EditPublicLinkPopup
	 * @throws ElementNotFoundException|Exception
	 */
	public function openSharingPopupByLinkName(string $name, Session $session): EditPublicLinkPopup {
		$linkEntry = $this->findLinkEntryByName($name);
		$editLinkBtn = $linkEntry->find("xpath", $this->linkEditBtnXpath);

		$editLinkBtn->click();

		$this->updateSharingPopup($session);

		return $this->editPublicLinkPopupPageObject;
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getLinkUrl(string $name): string {
		$linkEntry = $this->findLinkEntryByName($name);
		$linkUrlInput = $linkEntry->find("xpath", $this->linkUrlInputXpath);
		$this->assertElementNotNull(
			$linkUrlInput,
			__METHOD__ .
			" xpath $this->linkUrlInputXpath" .
			" could not find input field that contains the link URL"
		);
		return $linkUrlInput->getValue();
	}

	/**
	 *
	 * @return void
	 */
	public function closeSharingPopup() {
		$this->editPublicLinkPopupPageObject->close();
		$this->waitTillElementIsNull($this->popupXpath);
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteLink(string $name): void {
		throw new Exception(__METHOD__ . " not implemented in PublicLinkTab");
	}

	/**
	 *
	 * @param string $name
	 * @param string $service
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shareLink(string $name, string $service): void {
		throw new Exception(__METHOD__ . " not implemented in PublicLinkTab");
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function copyLinkToClipboard(string $name): void {
		throw new Exception(__METHOD__ . " not implemented in PublicLinkTab");
	}

	/**
	 * @return string
	 */
	public function getWarningMessage(): string {
		$warningMessageField = $this->find("xpath", $this->publicLinkWarningMessageXpath);
		$warningMessage = $warningMessageField->getText();
		return $warningMessage;
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	private function findLinkEntryByName(string $name): NodeElement {
		$xpathString = $this->quotedText($name);
		$linkEntry = $this->publicLinkTabElement->find(
			"xpath",
			\sprintf($this->linkEntryByNameXpath, $xpathString)
		);
		$this->assertElementNotNull(
			$linkEntry,
			__METHOD__ .
			" xpath $this->linkEntryByNameXpath" .
			" could not find link entry with the given name"
		);
		return $linkEntry;
	}

	/**
	 * gets listed public links names created/re-shares
	 *
	 * @return array
	 */
	public function getListedPublicLinksNames(): array {
		$namesArray = [];
		$visibleNamesArray = $this->findAll("xpath", $this->linkEntriesNamesXpath);
		foreach ($visibleNamesArray as $entry) {
			\array_push($namesArray, $entry->getText());
		}
		return $namesArray;
	}

	/**
	 * @param Session $session
	 *
	 * @return string
	 */
	public function getNameOfFirstPublicLink(Session $session):string {
		$publicLinkTitles = $this->getListedPublicLinksNames();
		$entryName = null;
		foreach ($publicLinkTitles as $publicLinkTitle) {
			$entryName = $publicLinkTitle;
			break;
		}
		return $entryName;
	}
}
