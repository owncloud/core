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
use Behat\Mink\Element\NodeElement;

/**
 * Object for files action Menu on the FilesPage
 * containing actions like Rename, Delete, etc
 */
class FileActionsMenu extends OwnCloudPage {
	/**
	 * @var NodeElement of this action menu
	 */
	protected $menuElement;
	protected $fileActionXpath = "//a[@data-action='%s']";
	protected $renameActionLabel = "Rename";
	protected $deleteActionLabel = "Delete";
	
	/**
	 * sets the NodeElement for the current action menu
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by $this->getPage("FilesPageElement\\FileActionsMenu")
	 * there is no real __construct() that can take arguments
	 *
	 * @param \Behat\Mink\Element\NodeElement $menuElement
	 * @return void
	 */
	public function setElement(NodeElement $menuElement) {
		$this->menuElement = $menuElement;
	}
	
	/**
	 * clicks the rename button
	 * 
	 * @param string $xpathToWaitFor wait for this element to appear before returning
	 * @param int $timeout_msec
	 * @return void
	 */
	public function rename(
		$xpathToWaitFor = null, $timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC
	) {
		$renameBtn = $this->findButton($this->renameActionLabel);
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
		$deleteBtn->click();
	}
	
	/**
	 * finds the actual action link in the action menu
	 * 
	 * @param string $action
	 * @return \Behat\Mink\Element\NodeElement
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findButton($action) {
		$this->waitTillElementIsNotNull(sprintf($this->fileActionXpath, $action));
		$button = $this->menuElement->find(
			"xpath",
			sprintf($this->fileActionXpath, $action)
		);
		if ($button === null) {
			throw new ElementNotFoundException(
				"could not find button '$action' in action Menu"
			);
		} else {
			return $button;
		}
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
	public function getRenameActionLabel() {
		return $this->renameActionLabel;
	}
}