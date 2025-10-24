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

namespace Tests\Acceptance\Page\FilesPageElement\SharingDialogElement;

use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Exception;
use Tests\Acceptance\Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * The Popup Dialog to set the public link preferences
 *
 */
class EditPublicLinkPopup extends OwncloudPage {
	/**
	 * @var NodeElement of this popup
	 */
	private $popupElement;
	private $nameInputXpath = ".//input[@name='linkName']";
	private $passwordInputXpath = ".//input[@type='password']";
	private $expirationDateLabelXpath = ".//label[contains(text(), 'Expiration')]";
	private $expirationDateInputXpath = ".//input[contains(@class,'expirationDate')]";
	private $emailInputXpath = "//form[@id='emailPrivateLink']//input[@class='select2-input']";
	private $emailToSelfCheckboxXpath = "//form[@id='emailPrivateLink']" . "//input[@class='emailPrivateLinkForm--emailToSelf']";
	private $emailInputCloseXpath = "//a[@class='select2-search-choice-close']";
	private $personalMessageInputXpath = "//*[@class='public-link-modal--input emailPrivateLinkForm--emailBodyField']";
	private $shareButtonXpath = ".//button[contains(text(), 'Share') or contains(text(), 'Save')]";
	private $cancelButtonXpath = ".//button[contains(text(), 'Cancel')]";
	private $permissionLabelXpath = [
		'read' => ".//label[contains(@for, 'sharingDialogAllowPublicRead')]",
		'read-write-folder' => ".//label[contains(@for, 'sharingDialogAllowPublicFolderReadWrite')]",
		'read-write-file' => ".//label[contains(@for, 'sharingDialogAllowPublicFileReadWrite')]",
		'upload-write-without-modify' => ".//label[contains(@for, 'sharingDialogAllowpublicUploadWrite')]",
		'upload' => ".//label[contains(@for, 'sharingDialogAllowPublicUpload')]"
	];
	private $popupCloseButton = "//a[@class='oc-dialog-close']";
	private $expirationDateRequiredErrorMessageXpath = './/*[@id="shareDialogLinkExpirationView"]//span[@class="error-message"]';

	/**
	 * sets the NodeElement for the current popup
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by
	 * $this->getPage("FilesPageElement\\SharingDialogElement\\EditPublicLinkPopup")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $popupElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $popupElement): void {
		$this->popupElement = $popupElement;
	}

	/**
	 * finds and returns the NodeElement of the name input field
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	private function findNameInput(): NodeElement {
		$nameInput = $this->popupElement->find("xpath", $this->nameInputXpath);
		$this->assertElementNotNull(
			$nameInput,
			__METHOD__ .
			" xpath $this->nameInputXpath" .
			" could not find input field for the name of the public link"
		);
		return $nameInput;
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function setLinkName(string $name): void {
		$nameInput = $this->findNameInput();
		$nameInput->setValue($name);
	}

	/**
	 *
	 * @return string
	 */
	public function getLinkName(): string {
		$nameInput = $this->findNameInput();
		return $nameInput->getValue();
	}

	/**
	 *
	 * @param string $permissions
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setLinkPermissions(string $permissions): void {
		$permissions = \strtolower($permissions);
		if (\array_key_exists($permissions, $this->permissionLabelXpath)) {
			$permissionsCheckbox = $this->popupElement->find(
				"xpath",
				$this->permissionLabelXpath[$permissions]
			);
			$this->assertElementNotNull(
				$permissionsCheckbox,
				__METHOD__ .
				" findField($permissions) could not find the permission checkbox"
			);
			$permissionsCheckbox->click();
		} else {
			throw new \InvalidArgumentException(
				__METHOD__ . " $permissions is not a valid public link permission"
			);
		}
	}

	/**
	 *
	 * @param string $password
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setLinkPassword(string $password): void {
		$passwordInput = $this->popupElement->find(
			"xpath",
			$this->passwordInputXpath
		);
		$this->assertElementNotNull(
			$passwordInput,
			__METHOD__ .
			" xpath $this->passwordInputXpath" .
			" could not find input field for the password of the public link"
		);
		$passwordInput->setValue($password);
	}

	/**
	 *
	 * @param string $date
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setLinkExpirationDate(string $date): void {
		$expirationDateInput = $this->popupElement->find(
			"xpath",
			$this->expirationDateInputXpath
		);
		$this->assertElementNotNull(
			$expirationDateInput,
			__METHOD__ .
			" xpath $this->expirationDateInputXpath" .
			" could not find input field for the expiration date of the public link"
		);
		$expirationDateInput->setValue($date);

		//try to close the date picker by clicking the label
		//because that date picker might overlap the email field
		//but do not panic if the label is not found, maybe we still can
		//use the email field, and if not we will panic then
		$expirationDateLabel = $this->popupElement->find(
			"xpath",
			$this->expirationDateLabelXpath
		);
		if ($expirationDateLabel !== null) {
			$expirationDateLabel->click();
		}
	}

	/**
	 *
	 * @param string $email
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setLinkEmail(string $email): void {
		$emailInput = $this->popupElement->find("xpath", $this->emailInputXpath);
		$this->assertElementNotNull(
			$emailInput,
			__METHOD__ .
			" xpath $this->emailInputXpath" .
			" could not find input field for the email of the public link"
		);
		$emailInput->setValue($email . "\n");
	}

	/**
	 * Remove email from Email Input box
	 *
	 * @param string $email
	 *
	 * @return void
	 */
	public function unsetLinkEmail(string $email): void {
		$emailRemoveBtns = $this->popupElement->findAll("xpath", $this->emailInputCloseXpath);
		foreach ($emailRemoveBtns as $emailRemoveBtn) {
			$precedingSiblingNodeWithEmail = $emailRemoveBtn->getParent()->find('xpath', '/div');
			$text = $precedingSiblingNodeWithEmail->getText();
			if ($text === $email) {
				$emailRemoveBtn->click();
				return;
			}
		}
	}

	/**
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setEmailToSelf(): void {
		$checkbox = $this->popupElement->find("xpath", $this->emailToSelfCheckboxXpath);
		$this->waitTillElementIsNotNull($this->emailToSelfCheckboxXpath);

		$this->assertElementNotNull(
			$checkbox,
			__METHOD__ .
			" xpath $this->emailToSelfCheckboxXpath" .
			" could not find the checkbox for sending the self copy of email of the public link. " .
			" Maybe the email isn't filled."
		);
		if (!$checkbox->isChecked()) {
			$checkbox->check();
		}
	}

	/**
	 * @param string $personalMessage
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setPersonalMessage(string $personalMessage): void {
		$personalMessageInput = $this->popupElement->find("xpath", $this->personalMessageInputXpath);
		$this->assertElementNotNull(
			$personalMessageInput,
			__METHOD__ .
			" xpath $this->personalMessageInputXpath" .
			" could not find the input field for sending a personal message in the email."
		);

		$this->waitTillElementIsNotNull($this->personalMessageInputXpath);
		$personalMessageInput->focus();
		$personalMessageInput->setValue($personalMessage);
	}

	/**
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function save(): void {
		$saveButton = $this->popupElement->find("xpath", $this->shareButtonXpath);
		$this->assertElementNotNull(
			$saveButton,
			__METHOD__ .
			" xpath $this->shareButtonXpath" .
			" could not find save button of the public link popup"
		);

		$saveButton->click();
	}

	/**
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function cancel(): void {
		$cancelButton = $this->popupElement->find("xpath", $this->cancelButtonXpath);
		$this->assertElementNotNull(
			$cancelButton,
			__METHOD__ .
			" xpath $this->cancelButtonXpath" .
			" could not find cancel button on the public link popup"
		);

		$cancelButton->click();
	}

	/**
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function close(): void {
		$closeButton = $this->popupElement->find("xpath", $this->popupCloseButton);
		$this->assertElementNotNull(
			$closeButton,
			__METHOD__ .
			" xpath $this->popupCloseButton" .
			" could not find save button of the public link popup"
		);
		$closeButton->click();
	}

	/**
	 * waits for the popup to appear and sets the element
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
		$popupElement = $this->waitTillXpathIsVisible($xpath, $timeout_msec);
		$this->setElement($popupElement);
	}

	/**
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getErrorMessage(): string {
		$errorMessageElement = $this->popupElement->find(
			"xpath",
			$this->expirationDateRequiredErrorMessageXpath
		);
		$this->assertElementNotNull(
			$errorMessageElement,
			__METHOD__ .
			" xpath $this->expirationDateRequiredErrorMessageXpath" .
			" could not find expiration date required error message"
		);
		return $errorMessageElement->getText();
	}
}
