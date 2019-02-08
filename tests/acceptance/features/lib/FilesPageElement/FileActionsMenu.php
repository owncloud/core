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

namespace Page\FilesPageElement;

use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Page\OwncloudPage;
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
	protected $declineShareDataAction = "Reject";

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
	public function setElement(NodeElement $menuElement) {
		$this->menuElement = $menuElement;
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
	 * clicks the rename button
	 *
	 * @param string $xpathToWaitFor wait for this element to appear before returning
	 * @param int $timeout_msec
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function rename(
		$xpathToWaitFor = null, $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
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
	public function delete() {
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
	 * clicks the details button
	 *
	 * @return void
	 */
	public function openDetails() {
		$detailsBtn = $this->findButton($this->detailsActionLabel);
		$this->assertElementNotNull(
			$detailsBtn,
			__METHOD__ .
			" could not find action button with label $this->deleteActionLabel"
		);
		$detailsBtn->focus();
		$detailsBtn->click();
	}
	/**
	 * clicks the decline share button
	 *
	 * @return void
	 */
	public function declineShare() {
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
	 * @param string $action
	 *
	 * @return NodeElement
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findButton($action) {
		$xpathLocator = \sprintf($this->fileActionXpath, $action);
		$this->waitTillElementIsNotNull($xpathLocator);
		$button = $this->menuElement->find(
			"xpath",
			$xpathLocator
		);
		$this->assertElementNotNull(
			$button,
			__METHOD__ .
			" xpath $xpathLocator could not find button '$action' in action Menu"
		);
		$this->waitFor(
			STANDARD_UI_WAIT_TIMEOUT_MILLISEC / 1000, [$button, 'isVisible']
		);
		return $button;
	}

	/**
	 * just so the label can be reused in other places
	 * and does not need to be redefined
	 *
	 * @return string
	 */
	public function getDeleteActionLabel() {
		return $this->deleteActionLabel;
	}

	/**
	 * just so the label can be reused in other places
	 * and does not need to be redefined
	 *
	 * @return string
	 */
	public function getDetailsActionLabel() {
		return $this->detailsActionLabel;
	}

	/**
	 * just so the label can be reused in other places
	 * and does not need to be redefined
	 *
	 * @return string
	 */
	public function getRenameActionLabel() {
		return $this->renameActionLabel;
	}

	/**
	 * the action labels are localized to the user preferred language
	 *
	 * @param string $action
	 *
	 * @return string
	 */
	public function getActionLabelLocalized($action) {
		return $this->findButton($action)->getText();
	}
}
