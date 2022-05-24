<?php declare(strict_types=1);

/**
 * ownCloud
 *
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

use ast\Node;
use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * PageObject for new file menu on the FilesPage
 *
 */
class NewFileMenu extends OwncloudPage {
	/**
	 * @var NodeElement of this action menu
	 */
	protected $newButtonXpath = "//a[@class='button new']";
	protected $newFileMenuXpath = "//div[contains(@class, 'newFileMenu')]";
	protected $newFileMenuFolderMenuItemXpath = "//div[contains(@class, 'newFileMenu')]//a[@data-action='folder']";
	protected $newFileMenuFilenameFormXpath = "//form[@class='filenameform']";
	protected $newFileMenuFilenameFormButtonXpath = "//form[@class='filenameform']//button[@class='cancel']";

	/**
	 * Find new button and open new file menu
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function openNewFileMenu(): void {
		$newButtonElement = $this->find("xpath", $this->newButtonXpath);

		$this->assertElementNotNull(
			$newButtonElement,
			__METHOD__ .
			" xpath $this->newButtonXpath " .
			"could not find new button"
		);

		$newButtonElement->click();
	}

	/**
	 * Find and return new file menu
	 *
	 * @return NodeElement | null
	 */
	public function getNewFileMenu(): ?NodeElement {
		$newFileMenuElement = $this->find("xpath", $this->newFileMenuXpath);
		return $newFileMenuElement;
	}

	/**
	 * Find directory menu item and open filename form
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function clickFolder(): void {
		$newFileMenuFolderMenuItemElement = $this->find("xpath", $this->newFileMenuFolderMenuItemXpath);

		$this->assertElementNotNull(
			$newFileMenuFolderMenuItemElement,
			__METHOD__ .
			" xpath $this->newFileMenuFolderMenuItemXpath " .
			"could not find folder menu item"
		);

		$newFileMenuFolderMenuItemElement->click();
	}

	/**
	 * Find and return new filename form
	 *
	 * @return NodeElement | null
	 */
	public function getNewFileMenuFilenameForm(): ?NodeElement {
		$newFileMenuFolderFilenameFormElement = $this->find("xpath", $this->newFileMenuFilenameFormXpath);
		return $newFileMenuFolderFilenameFormElement;
	}

	/**
	 * Find cancel button and close the filename form
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function clickCancelFilenameForm(): void {
		$newFileMenuFilenameFormButtonElement = $this->find("xpath", $this->newFileMenuFilenameFormButtonXpath);

		$this->assertElementNotNull(
			$newFileMenuFilenameFormButtonElement,
			__METHOD__ .
			" xpath $this->newFileMenuFilenameFormButtonXpath " .
			"could not find cancel button"
		);

		$newFileMenuFilenameFormButtonElement->click();
	}
}
