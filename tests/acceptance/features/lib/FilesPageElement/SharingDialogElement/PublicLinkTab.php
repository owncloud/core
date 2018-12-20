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
	private $createLinkBtnXpath = ".//button[@class='addLink']";
	private $popupXpath = ".//div[@class='oc-dialog' and not(contains(@style,'display: none'))]";
	private $linkEntryByNameXpath = ".//*[@class='link-entry--title' and .=%s]/..";
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
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function setElement(NodeElement $publicLinkTab) {
		$this->publicLinkTabElement = $publicLinkTab;
	}

	/**
	 * waits for the tab to appear and sets the element
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 * @param string $xpath the xpath of the element to wait for
	 *                      required to be set
	 *
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC,
		$xpath = null
	) {
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
	 * @param bool|null $emailToSelf
	 * @param string|null $personalMessage
	 *
	 * @return string the name of the created public link
	 */
	public function createLink(
		Session $session,
		$name = null,
		$permissions = null,
		$password = null,
		$expirationDate = null,
		$email = null,
		$emailToSelf = null,
		$personalMessage = null
	) {
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
	 * @return NodeElement
	 *
	 * @throws ElementNotFoundException
	 */
	public function openSharingPopup(Session $session) {
		$createLinkBtn = $this->publicLinkTabElement->find(
			"xpath", $this->createLinkBtnXpath
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
			$session, STANDARD_UI_WAIT_TIMEOUT_MILLISEC, $this->popupXpath
		);

		return $this->editPublicLinkPopupPageObject;
	}

	/**
	 * Updates sharing popup as popup may change
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function updateSharingPopup(Session $session) {
		$this->editPublicLinkPopupPageObject = $this->getPage(
			"FilesPageElement\\SharingDialogElement\\EditPublicLinkPopup"
		);
		$this->editPublicLinkPopupPageObject->waitTillPageIsLoaded(
			$session, STANDARD_UI_WAIT_TIMEOUT_MILLISEC, $this->popupXpath
		);
	}

	/**
	 *
	 * @param Session $session
	 * @param string $name
	 * @param string $newName
	 * @param string $permissions
	 * @param string $password
	 * @param string $expirationDate
	 * @param string $email
	 * @param string $save
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function editLink(
		Session $session,
		$name,
		$newName = null,
		$permissions = null,
		$password = null,
		$expirationDate = null,
		$email = null,
		$save = true
	) {
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

		if ($save === true) {
			$this->editPublicLinkPopupPageObject->save();
		} else {
			$this->editPublicLinkPopupPageObject->cancel();
		}
	}

	/**
	 * Open Sharing Popup from given link name
	 *
	 * @param string $name
	 * @param Session $session
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function openSharingPopupByLinkName($name, $session) {
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
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getLinkUrl($name) {
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
	 * @return void
	 */
	public function getWarningMessage() {
		$warningMessageField = $this->find("xpath", $this->publicLinkWarningMessageXpath);
		$warningMessage = $warningMessageField->getText();
		return $warningMessage;
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
		$this->assertElementNotNull(
			$linkEntry,
			__METHOD__ .
			" xpath $this->linkEntryByNameXpath" .
			" could not find link entry with the given name"
		);
		return $linkEntry;
	}
}
