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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\FilesPage;
use Page\FilesPageElement\NewFileMenu;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * Context for new file menu
 */
class WebUINewFileMenuContext extends RawMinkContext implements Context {
	/**
	 *
	 * @var FilesPage
	 */
	private $filesPage;

	/**
	 *
	 * @var NewFileMenu
	 */
	private $newFileMenu;

	/**
	 * WebUINewFileMenuContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param NewFileMenu $newFileMenu
	 *
	 * @return void
	 */
	public function __construct(
		FilesPage $filesPage,
		NewFileMenu $newFileMenu
	) {
		$this->filesPage = $filesPage;
		$this->newFileMenu = $newFileMenu;
	}

	/**
	 * @When the user opens the newFileMenu using the webUI
	 *
	 * @return void
	 */
	public function theUserOpensTheNewfilemenuUsingTheWebUI():void {
		$this->newFileMenu->openNewFileMenu();
	}

	/**
	 * @Then the newFileMenu should be displayed on the webUI
	 *
	 * @return void
	 */
	public function theNewFilemenuShouldBeDisplayedOnTheWebUI():void {
		Assert::assertNotNull(
			$this->newFileMenu->getNewFileMenu(),
			'New file menu is expected to be visible but is not'
		);
	}

	/**
	 * @Given the user clicks folder in the newFileMenu using the webUI
	 *
	 * @return void
	 */
	public function theUserClicksFolderInTheNewFileMenuUsingTheWebUI():void {
		$this->newFileMenu->clickFolder();
	}

	/**
	 * @Then the newFileMenu filename form should be displayed on the webUI
	 *
	 * @return void
	 */
	public function theNewFileMenuFilenameFormShouldBeDisplayedOnTheWebUI():void {
		Assert::assertNotNull(
			$this->newFileMenu->getNewFileMenuFilenameForm(),
			'New file menu filename form is expected to be visible but is not'
		);
	}

	/**
	 * @Then the newFileMenu filename form should not be displayed on the webUI
	 *
	 * @return void
	 */
	public function theNewFileMenuFilenameFormShouldNotBeDisplayedOnTheWebUI():void {
		Assert::assertNull(
			$this->newFileMenu->getNewFileMenuFilenameForm(),
			'New file menu filename form is expected to be not visible but is'
		);
	}

	/**
	 * @Given the user clicks cancel in newFileMenu filename form using the webUI
	 *
	 * @return void
	 */
	public function theUserClicksCancelInTheNewFileMenuFilenameFormUsingTheWebUI():void {
		$this->newFileMenu->clickCancelFilenameForm();
	}
}
