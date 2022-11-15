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

namespace Page\UserPageElement;

use Behat\Mink\Element\NodeElement;
use Exception;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * The list of groups
 *
 */
class GroupList extends OwncloudPage {
	/**
	 * @var NodeElement of this element
	 */
	protected $groupListElement;
	protected $allGroupsXpath = "//li[@class='isgroup']//span[@class='groupname']";
	protected $groupLiXpath = "//li[@data-gid=%s]";
	protected $deleteBtnXpath = "//a[@class='action delete']";
	protected $addGroupXpath = '//span[text()[normalize-space()="Add Group"]]';
	protected $addNewGroupInputBoxId = 'newgroupname';
	protected $addNewGroupButtonXpath = '//input[@class="button icon-add"]';
	protected $deleteConfirmButtonXpath
		= ".//div[contains(@class, 'oc-dialog-buttonrow twobuttons') and not(ancestor::div[contains(@style, 'display: none')])]//button[text()='Yes']";
	protected $deleteNotConfirmButtonXpath
		= ".//div[contains(@class, 'oc-dialog-buttonrow twobuttons') and not(ancestor::div[contains(@style, 'display: none')])]//button[text()='No']";

	/**
	 * sets the NodeElement for the current group list
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by $this->getPage("OwncloudPageElement\\GroupList")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $groupListElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $groupListElement): void {
		$this->groupListElement = $groupListElement;
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function selectGroup(string $name): NodeElement {
		$name = $this->quotedText($name);
		$xpathLocator = \sprintf($this->groupLiXpath, $name);
		$groupLi = $this->groupListElement->find(
			"xpath",
			$xpathLocator
		);
		if ($groupLi === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $xpathLocator " .
				"could not find group list element"
			);
		}
		$groupLi->click();
		return $groupLi;
	}

	/**
	 * deletes a group in the UI
	 *
	 * @param string $name
	 * @param bool $confirm
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function deleteGroup(string $name, bool $confirm): void {
		$groupLi = $this->selectGroup($name);
		$deleteButton = $groupLi->find("xpath", $this->deleteBtnXpath);
		if ($deleteButton === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->deleteBtnXpath " .
				"could not find delete button for group $name"
			);
		}
		$deleteButton->click();

		if ($confirm) {
			$confirmButton = $this->waitTillXpathIsVisible($this->deleteConfirmButtonXpath);
		} else {
			$confirmButton = $this->waitTillXpathIsVisible($this->deleteNotConfirmButtonXpath);
		}

		if ($confirmButton === null) {
			$xpathSelector = ($confirm) ? $this->deleteConfirmButtonXpath : $this->deleteNotConfirmButtonXpath;
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $xpathSelector " .
				"could not find delete confirm button for group $name"
			);
		}
		$confirmButton->click();
	}

	/**
	 *
	 * @param string $groupName
	 *
	 * @return void
	 * @throws \Behat\Mink\Exception\ElementNotFoundException
	 */
	public function addGroup(string $groupName): void {
		$addLink = $this->find("xpath", $this->addGroupXpath);
		if ($addLink === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->addGroupXpath " .
				"could not find add group link"
			);
		}
		$addLink->click();
		$this->fillField($this->addNewGroupInputBoxId, $groupName);
		$addButton = $this->find("xpath", $this->addNewGroupButtonXpath);
		if ($addButton === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->addNewGroupButtonXpath " .
				"could not find add group button"
			);
		}
		$addButton->click();
	}

	/**
	 * returns all group names in an array
	 *
	 * @return string[]
	 * @throws Exception
	 */
	public function namesToArray(): array {
		$allGroupElements = $this->groupListElement->findAll(
			"xpath",
			$this->allGroupsXpath
		);
		$allGroups = [];
		foreach ($allGroupElements as $element) {
			$allGroups[] = $this->getTrimmedText($element);
		}
		return $allGroups;
	}
}
