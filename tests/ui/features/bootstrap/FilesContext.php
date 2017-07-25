<?php
/**
* ownCloud
*
* @author Artur Neumann
* @copyright 2017 Artur Neumann info@individual-it.net
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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Gherkin\Node\TableNode;
use Page\FilesPage;

require_once 'bootstrap.php';

/**
 * Files context.
 */
class FilesContext extends RawMinkContext implements Context
{
	private $filesPage;

	public function __construct(FilesPage $filesPage)
	{
		$this->filesPage = $filesPage;
	}

	/**
	 * @Given I am on the files page
	 */
	public function iAmOnTheFilesPage()
	{
		$this->filesPage->open();
	}

	/**
	 * @Given the list of files\/folders does not fit in one browser page
	 */
	public function theListOfFilesFoldersDoesNotFitInOneBrowserPage()
	{
		$windowHeight = $this->filesPage->getWindowHeight(
			$this->getSession()
		);
		$itemsCount = $this->filesPage->getSizeOfFileFolderList();
		$lastItemCoordinates['top'] = 0;
		if ($itemsCount > 0) {
			$lastItemCoordinates = $this->filesPage->getCoordinatesOfElement(
				$this->getSession(),
				$this->filesPage->findActionMenuByNo($itemsCount)
			);
		}

		while ($windowHeight > $lastItemCoordinates['top']) {
			$this->filesPage->createFolder();
			$itemsCount = $this->filesPage->getSizeOfFileFolderList();
			$lastItemCoordinates = $this->filesPage->getCoordinatesOfElement(
				$this->getSession(),
				$this->filesPage->findActionMenuByNo($itemsCount)
			);
		}
		$this->getSession()->reload();
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given I rename the file/folder :fromName to :toName
	 */
	public function iRenameTheFileFolderTo($fromName, $toName)
	{
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->renameFile($fromName, $toName, $this->getSession());
	}

	/**
	 * @When I rename the file/folder :fromName to one of these names
	 */
	public function iRenameTheFileToOneOfThisNames($fromName, TableNode $table)
	{
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		foreach ($table->getRows() as $row) {
			$this->filesPage->renameFile($fromName, $row[0], $this->getSession());
		}
		
	}

	/**
	 * @Then the file/folder :name should be listed
	 */
	public function theFileFolderShouldBeListed($name)
	{
		PHPUnit_Framework_Assert::assertNotNull(
			$this->filesPage->findFileRowByName($name, $this->getSession())
		);
	}

	/**
	 * @Then near the file/folder :name a tooltip with the text :toolTipText should be displayed
	 */
	public function nearTheFileATooltipWithTheTextShouldBeDisplayed($name, $toolTipText)
	{
		PHPUnit_Framework_Assert::assertEquals($toolTipText, 
			$this->filesPage->getTooltipOfFile($name, $this->getSession())
		);
	}

	/**
	 * @Then the filesactionmenu should be completely visible after clicking on it
	 */
	public function theFilesactionmenuShouldBeCompletelyVisibleAfterClickingOnIt()
	{
		for ($i = 1; $i < $this->filesPage->getSizeOfFileFolderList(); $i++) {
			$actionMenu = $this->filesPage->findActionMenuByNo($i);
			$actionMenu->click();

			$windowHeight = $this->filesPage->getWindowHeight(
				$this->getSession()
			);

			$deleteBtnCoordinates = $this->filesPage->getCoordinatesOfElement(
				$this->getSession(), $this->filesPage->findDeleteByNo($i)
			);
			PHPUnit_Framework_Assert::assertLessThan(
				$windowHeight, $deleteBtnCoordinates ["top"]
			);
			$actionMenu->click();
		}
	}
}
