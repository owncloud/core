<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2019 Artur Neumann artur@jankaritech.com
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

require_once 'bootstrap.php';

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\FilesPage;

/**
 * Context for file actions menu
 */
class WebUIFileActionsMenuContext extends RawMinkContext implements Context {
	/**
	 *
	 * @var FilesPage
	 */
	private $filesPage;

	/**
	 * WebUIFileActionsMenuContext constructor.
	 *
	 * @param FilesPage $filesPage
	 *
	 * @return void
	 */
	public function __construct(FilesPage $filesPage) {
		$this->filesPage = $filesPage;
	}

	/**
	 * @When the user clicks on the file :filename
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function theUserClicksOnTheFile(string $filename):void {
		$this->filesPage->openFile($filename, $this->getSession());
	}

	/**
	 * @Then the file actions application select menu should be displayed with these items on the webUI
	 *
	 * @param TableNode $menuItems
	 *
	 * @return void
	 */
	public function theFileActionsApplicationSelectMenuShouldBeDisplayed(
		TableNode $menuItems
	):void {
		$menuContent = $this->filesPage->getFileActionsApplicationSelectMenu();
		foreach ($menuItems->getRows()[0] as $item) {
			PHPUnit\Framework\Assert::assertStringContainsString(
				$item,
				$menuContent,
				__METHOD__ . " Item '$item' was not found."
			);
		}
	}

	/**
	 * @Then the file actions menu should be displayed with these items on the webUI
	 *
	 * @param TableNode $menuItems
	 *
	 * @return void
	 */
	public function theFileActionsMenuShouldBeDisplayed(TableNode $menuItems):void {
		$menuContent = $this->filesPage->getFileActionsMenu();
		foreach ($menuItems->getRows()[0] as $item) {
			PHPUnit\Framework\Assert::assertStringContainsString(
				$item,
				$menuContent,
				__METHOD__ . " Item '$item' was not found."
			);
		}
	}
}
