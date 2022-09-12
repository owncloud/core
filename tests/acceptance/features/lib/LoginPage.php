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

namespace Page;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Exception;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * Login page.
 */
class LoginPage extends OwncloudPage {
	/**
	 * @var string $path
	 */
	protected $path = '/index.php/login';
	protected $userInputId = "user";
	protected $passwordInputId = "password";
	protected $confirmPasswordInputId = "retypepassword";
	protected $passwordResetConfirmMessage = "message";
	protected $submitLoginId = "submit";
	protected $lostPasswordId = "lost-password";
	protected $setPasswordErrorMessageId = "error-message";

	protected $setPasswordFormXpath = "//form[@id='reset-password' or @id='set-password']";
	protected $lostPasswordResetErrorXpath = "//li[contains(@class,'error')]";
	protected $imprintUrlXpath = "//a[contains(text(),'Imprint')]";
	protected $privacyPolicyXpath = "//a[contains(text(),'Privacy Policy')]";
	protected $labelForUserInputXpath = "//label[@for='user']";
	protected $labelForPasswordInputXpath = "//label[@for='password']";

	/**
	 * @param string $username
	 * @param string $password
	 * @param string $target
	 *
	 * @return Page
	 * @throws \Behat\Mink\Exception\ElementNotFoundException
	 */
	public function loginAs(string $username, ?string $password, string $target = 'FilesPage'):Page {
		$this->fillField($this->userInputId, $username);
		$this->fillField($this->passwordInputId, $password);
		$submitElement = $this->findById($this->submitLoginId);

		$this->assertElementNotNull(
			$submitElement,
			__METHOD__ .
			" id $this->submitLoginId could not find login submit button"
		);

		$submitElement->click();

		return $this->getPage($target);
	}

	/**
	 * there is no reliable loading indicator on the login page, so just wait for
	 * the user and password to be there.
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if (($this->findById($this->userInputId) !== null)
				&& ($this->findById($this->passwordInputId) !== null)
			) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new Exception(
				__METHOD__ . " timeout waiting for page to load"
			);
		}

		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 *
	 */
	private function lostPasswordField():NodeElement {
		$lostPasswordField = $this->findById($this->lostPasswordId);
		$this->assertElementNotNull(
			$lostPasswordField,
			__METHOD__ .
			" id $this->lostPasswordId could not find reset password field "
		);
		return $lostPasswordField;
	}

	/**
	 *
	 * @return string
	 */
	public function getUserLabelText():string {
		$userInputField = $this->findById($this->userInputId);

		$this->assertElementNotNull(
			$userInputField,
			__METHOD__ .
			" id $this->userInputId could not find user input field"
		);

		$userInputFieldLabel = $this->find("xpath", $this->labelForUserInputXpath);

		$this->assertElementNotNull(
			$userInputFieldLabel,
			__METHOD__ .
			" xpath $this->labelForUserInputXpath could not find user input field label"
		);

		$labelText = $userInputFieldLabel->getText();

		return $labelText;
	}

	/**
	 *
	 * @return string
	 */
	public function getPasswordLabelText():string {
		$passwordInputField = $this->findById($this->passwordInputId);
		$this->assertElementNotNull(
			$passwordInputField,
			__METHOD__ .
			" id $this->passwordInputId could not find password input field"
		);

		$passwordInputLabel = $this->find("xpath", $this->labelForPasswordInputXpath);

		$this->assertElementNotNull(
			$passwordInputLabel,
			__METHOD__ .
			" xpath $this->labelForPasswordInputXpath could not find password input field label"
		);

		$placeholderText = $passwordInputLabel->getText();
		return $placeholderText;
	}

	/**
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 *
	 */
	private function getSetPasswordErrorMessageField():NodeElement {
		$setPasswordErrorMessageField = $this->findById($this->setPasswordErrorMessageId);
		$this->assertElementNotNull(
			$setPasswordErrorMessageField,
			__METHOD__ .
			" id $this->setPasswordErrorMessageId could not find set password error message field"
		);
		return $setPasswordErrorMessageField;
	}

	/**
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 *
	 */
	private function getLostPasswordResetErrorMessageField():NodeElement {
		$lostPasswordResetErrorMessageField = $this->find(
			"xpath",
			$this->lostPasswordResetErrorXpath
		);
		$this->assertElementNotNull(
			$lostPasswordResetErrorMessageField,
			__METHOD__ .
			" id $this->lostPasswordResetErrorXpath" .
			" could not find lost password reset error message field"
		);
		return $lostPasswordResetErrorMessageField;
	}

	/**
	 * @param Session $session
	 *
	 * @return void
	 */
	public function requestPasswordReset(Session $session):void {
		$this->lostPasswordField()->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @return string
	 */
	public function getLostPasswordMessage():string {
		$passwordRecoveryMessage = $this->lostPasswordField()->getText();
		return $passwordRecoveryMessage;
	}

	/**
	 *
	 * @return string
	 */
	public function getSetPasswordErrorMessage():string {
		$setPasswordErrorMessage = $this->getSetPasswordErrorMessageField()->getText();
		return $setPasswordErrorMessage;
	}

	/**
	 *
	 * @return string
	 */
	public function getLostPasswordResetErrorMessage():string {
		$generalErrorMessage = $this->getLostPasswordResetErrorMessageField()->getText();
		return $generalErrorMessage;
	}

	/**
	 *
	 * @param string $newPassword
	 * @param string $confirmNewPassword
	 * @param Session $session
	 *
	 * @return void
	 * @throws \Behat\Mink\Exception\ElementNotFoundException
	 */
	public function resetThePassword(string $newPassword, string $confirmNewPassword, Session $session):void {
		$form = $this->waitTillElementIsNotNull($this->setPasswordFormXpath);
		$this->assertElementNotNull(
			$form,
			__METHOD__ .
			" xpath $this->setPasswordFormXpath " .
			'could not find set password form.'
		);

		$this->fillField($this->passwordInputId, $newPassword);
		$this->fillField($this->confirmPasswordInputId, $confirmNewPassword);
		$this->findById($this->submitLoginId)->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @return string
	 */
	public function getRestPasswordConfirmError():string {
		$messageVal = $this->findById($this->passwordResetConfirmMessage)->getText();
		return $messageVal;
	}

	/**
	 *
	 * @param string $legalUrlType
	 *
	 * @return string imprint url link
	 * @throws Exception
	 */
	public function getLegalUrl(string $legalUrlType):string {
		if ($legalUrlType === "Imprint") {
			$legalUrlLink = $this->find("xpath", $this->imprintUrlXpath);
		} elseif ($legalUrlType === "Privacy Policy") {
			$legalUrlLink = $this->find("xpath", $this->privacyPolicyXpath);
		} else {
			throw new Exception(
				__METHOD__ . " invalid legal url type: $legalUrlType"
			);
		}

		$this->assertElementNotNull(
			$legalUrlLink,
			__METHOD__ .
			" id $this->imprintUrlXpath " .
			"could not find link"
		);

		return ($legalUrlLink->getAttribute("href"));
	}
}
