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
use Page\OwncloudPage;
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
	private $emailInputXpath = ".//input[@type='email']";
	private $shareButtonXpath = ".//button[contains(text(), 'Share')]";
	private $permissionLabelXpath = [
		'read' => ".//label[contains(@for, 'sharingDialogAllowPublicRead')]",
		'read-write' => ".//label[contains(@for, 'sharingDialogAllowPublicReadWrite')]",
		'upload' => ".//label[contains(@for, 'sharingDialogAllowPublicUpload')]"
	];
	
	/**
	 * sets the NodeElement for the current popup
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by
	 * $this->getPage("FilesPageElement\\SharingDialogElement\\EditPublicLinkPopup")
	 * there is no real __construct() that can take arguments
	 *
	 * @param \Behat\Mink\Element\NodeElement $popupElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $popupElement) {
		$this->popupElement = $popupElement;
	}

	/**
	 * finds and returns the NodeElement of the name input field
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	private function findNameInput() {
		$nameInput = $this->popupElement->find("xpath", $this->nameInputXpath);
		if ($nameInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->nameInputXpath" .
				" could not find input field for the name of the public link"
			);
		}
		return $nameInput;
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function setLinkName($name) {
		$nameInput = $this->findNameInput();
		$nameInput->setValue($name);
	}

	/**
	 *
	 * @return string
	 */
	public function getLinkName() {
		$nameInput = $this->findNameInput();
		return $nameInput->getValue();
	}

	/**
	 *
	 * @param string $permissions
	 *
	 * @return void
	 */
	public function setLinkPermissions($permissions) {
		$permissions = \strtolower($permissions);
		if (\array_key_exists($permissions, $this->permissionLabelXpath)) {
			$permissionsCheckbox = $this->popupElement->find(
				"xpath", $this->permissionLabelXpath[$permissions]
			);
			if ($permissionsCheckbox === null) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" findField($permissions)" .
					" could not find the permission checkbox"
				);
			}
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
	 */
	public function setLinkPassword($password) {
		$passwordInput = $this->popupElement->find(
			"xpath", $this->passwordInputXpath
		);
		if ($passwordInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->passwordInputXpath" .
				" could not find input field for the password of the public link"
			);
		}
		$passwordInput->setValue($password);
	}

	/**
	 *
	 * @param string $date
	 *
	 * @return void
	 */
	public function setLinkExpirationDate($date) {
		$expirationDateInput = $this->popupElement->find(
			"xpath", $this->expirationDateInputXpath
		);
		if ($expirationDateInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->expirationDateInputXpath" .
				" could not find input field for the expiration date" .
				" of the public link"
			);
		}
		$expirationDateInput->setValue($date);
		
		//try to close the date picker by clicking the label
		//because that date picker might overlap the email field
		//but do not panic if the label is not found, maybe we still can
		//use the email field, and if not we will panic then
		$expirationDateLabel = $this->popupElement->find(
			"xpath", $this->expirationDateLabelXpath
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
	 */
	public function setLinkEmail($email) {
		$emailInput = $this->popupElement->find("xpath", $this->emailInputXpath);
		if ($emailInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->emailInputXpath" .
				" could not find input field for the email of the public link"
			);
		}
		$emailInput->setValue($email);
	}

	/**
	 *
	 * @return void
	 */
	public function save() {
		$saveButton = $this->popupElement->find("xpath", $this->shareButtonXpath);
		if ($saveButton === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->shareButtonXpath" .
				" could not find save button of the public link popup"
			);
		}
		$saveButton->click();
	}
}
