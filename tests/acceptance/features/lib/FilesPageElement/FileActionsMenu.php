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

namespace Tests\Acceptance\Page\FilesPageElement;

use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Exception;
use Tests\Acceptance\Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Object for files action Menu on the FilesPage
 * containing actions like Rename, Delete, etc
 */
class FileActionsMenu extends OwncloudPage {
	/**
	 * @var NodeElement of this action menu
	 */
	protected $menuElement;
	protected $fileActionXpath = "//a[@data-action='%s']";
	protected $renameActionLabel = "Rename";
	protected $deleteActionLabel = "Delete";
	protected $detailsActionLabel = "Details";
	protected $lockFileActionLabel = "Lock file";
	protected $declineShareDataAction = "Reject";
	protected $fileRowDownloadBtnXpath = "//td[@class='filename']//a[@class='name']";

	/**
	 * sets the NodeElement for the current action menu
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by
	 * $this->getPage("FilesPageElement\\FileActionsMenu")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $menuElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $menuElement): void {
		$this->menuElement = $menuElement;
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
	 * clicks the rename button
	 *
	 * @param string|null $xpathToWaitFor wait for this element to appear before returning
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function rename(
		?string $xpathToWaitFor = null,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
		$renameBtn = $this->findButton($this->renameActionLabel);
		$this->assertElementNotNull(
			$renameBtn,
			__METHOD__ .
			" could not find action button with label $this->renameActionLabel"
		);
		$renameBtn->click();
		if ($xpathToWaitFor !== null) {
			$this->waitTillElementIsNotNull($xpathToWaitFor, $timeout_msec);
		}
	}

	/**
	 * clicks the delete button
	 *
	 * @return void
	 */
	public function delete(): void {
		$deleteBtn = $this->findButton($this->deleteActionLabel);
		$this->assertElementNotNull(
			$deleteBtn,
			__METHOD__ .
			" could not find action button with label $this->deleteActionLabel"
		);
		$deleteBtn->focus();
		$deleteBtn->click();
	}

	/**
	 * gets the url to download a file/folder
	 *
	 * @return null|string
	 */
	public function getDownloadUrlForFile(): ?string {
		$downloadBtn = $this->find("xpath", $this->fileRowDownloadBtnXpath);
		$this->assertElementNotNull(
			$downloadBtn,
			__METHOD__ . " xpath $this->fileRowDownloadBtnXpath " .
			" could not find download button"
		);
		if ($downloadBtn->hasAttribute("href")) {
			return $downloadBtn->getAttribute("href");
		}
		return null;
	}

	/**
	 * clicks the details button
	 *
	 * @return void
	 */
	public function openDetails(): void {
		$detailsBtn = $this->findButton($this->detailsActionLabel);
		$this->assertElementNotNull(
			$detailsBtn,
			__METHOD__ .
			" could not find action button with label $this->detailsActionLabel"
		);
		$detailsBtn->focus();
		$detailsBtn->click();
	}

	/**
	 * clicks the lock file button
	 *
	 * @return void
	 */
	public function lockFile(): void {
		$detailsBtn = $this->findButton($this->lockFileActionLabel);
		$this->assertElementNotNull(
			$detailsBtn,
			__METHOD__ .
			" could not find action button with label $this->lockFileActionLabel"
		);
		$detailsBtn->focus();
		$detailsBtn->click();
	}

	/**
	 * clicks the decline share button
	 *
	 * @return void
	 */
	public function declineShare(): void {
		$declineBtn = $this->findButton($this->declineShareDataAction);
		$this->assertElementNotNull(
			$declineBtn,
			__METHOD__ .
			" could not find action button with label $this->declineShareDataAction"
		);
		$declineBtn->focus();
		$declineBtn->click();
	}

	/**
	 * finds the actual action link in the action menu
	 *
	 * @param string $locator
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function findButton($locator): NodeElement {
		$xpathLocator = \sprintf($this->fileActionXpath, $locator);
		$this->waitTillElementIsNotNull($xpathLocator);
		$button = $this->menuElement->find(
			"xpath",
			$xpathLocator
		);
		$this->assertElementNotNull(
			$button,
			__METHOD__ .
			" xpath $xpathLocator could not find button '$locator' in action Menu"
		);
		$this->waitFor(
			STANDARD_UI_WAIT_TIMEOUT_MILLISEC / 1000,
			[$button, 'isVisible']
		);
		return $button;
	}

	/**
	 * just so the label can be reused in other places
	 * and does not need to be redefined
	 *
	 * @return string
	 */
	public function getDeleteActionLabel(): string {
		return $this->deleteActionLabel;
	}

	/**
	 * just so the label can be reused in other places
	 * and does not need to be redefined
	 *
	 * @return string
	 */
	public function getDetailsActionLabel(): string {
		return $this->detailsActionLabel;
	}

	/**
	 * just so the label can be reused in other places
	 * and does not need to be redefined
	 *
	 * @return string
	 */
	public function getLockFileActionLabel(): string {
		return $this->lockFileActionLabel;
	}

	/**
	 * just so the label can be reused in other places
	 * and does not need to be redefined
	 *
	 * @return string
	 */
	public function getRenameActionLabel(): string {
		return $this->renameActionLabel;
	}

	/**
	 * the action labels are localized to the user preferred language
	 *
	 * @param string $action
	 *
	 * @return string
	 */
	public function getActionLabelLocalized(string $action): string {
		return $this->findButton($action)->getText();
	}

	/**
	 * return if the Action label is visible
	 *
	 * @param string $action ("Delete"|"Rename"|"Details")
	 *
	 * @return boolean
	 */
	public function isActionLabelVisible(string $action): bool {
		$xpathLocator = \sprintf($this->fileActionXpath, $action);
		$this->waitTillElementIsNotNull($xpathLocator);
		$button = $this->menuElement->find(
			"xpath",
			$xpathLocator
		);
		if (!$button) {
			return false;
		}
		return $button->isVisible();
	}
}
