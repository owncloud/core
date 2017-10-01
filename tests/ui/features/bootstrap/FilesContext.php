<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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
use Behat\Gherkin\Node\TableNode;
use Page\FilesPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use Page\TrashbinPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\PageObject;

require_once 'bootstrap.php';

/**
 * Files context.
 */
class FilesContext extends RawMinkContext implements Context {

	private $filesPage;
	private $trashbinPage;
	
	/**
	 * Table of all files and folders that should have been deleted, stored so
	 * that other steps can use the list to check if the deletion happened correctly
	 * table headings: must be: |name|
	 * 
	 * @var TableNode
	 */
	private $deletedElementsTable = null;
	
	/**
	 * Table of all files and folders that should have been moved, stored so
	 * that other steps can use the list to check if the moving happened correctly
	 * table headings: must be: |name|
	 *
	 * @var TableNode
	 */
	private $movedElementsTable = null;

	/**
	 * FilesContext constructor.
	 *
	 * @param FilesPage $filesPage
	 */
	public function __construct(
		FilesPage $filesPage, TrashbinPage $trashbinPage
	) {
		$this->trashbinPage = $trashbinPage;
		$this->filesPage = $filesPage;
	}

	/**
	 * @Given I am on the files page
	 * @return void
	 */
	public function iAmOnTheFilesPage() {
		$this->filesPage->open();
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}


	/**
	 * @When the files page is reloaded
	 * @return void
	 */
	public function theFilesPageIsReloaded() {
		$this->getSession()->reload();
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When I create a folder with the name :name
	 * 
	 * @param string $name
	 * @return void
	 */
	public function createAFolder($name) {
		$this->filesPage->createFolder($name);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given the list of files\/folders does not fit in one browser page
	 * @return void
	 */
	public function theListOfFilesFoldersDoesNotFitInOneBrowserPage() {
		$windowHeight = $this->filesPage->getWindowHeight(
			$this->getSession()
		);
		$itemsCount = $this->filesPage->getSizeOfFileFolderList();
		$lastItemCoordinates['top'] = 0;
		if ($itemsCount > 0) {
			$lastItemCoordinates = $this->filesPage->getCoordinatesOfElement(
				$this->getSession(),
				$this->filesPage->findFileActionsMenuBtnByNo($itemsCount)
			);
		}
		
		while ($windowHeight > $lastItemCoordinates['top']) {
			$this->filesPage->createFolder();
			$itemsCount = $this->filesPage->getSizeOfFileFolderList();
			$lastItemCoordinates = $this->filesPage->getCoordinatesOfElement(
				$this->getSession(),
				$this->filesPage->findFileActionsMenuBtnByNo($itemsCount)
			);
		}
		$this->theFilesPageIsReloaded();
	}

	/**
	 * @Given I rename the file/folder :fromName to :toName
	 * @param string $fromName
	 * @param string $toName
	 * @return void
	 */
	public function iRenameTheFileFolderTo($fromName, $toName) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->renameFile($fromName, $toName, $this->getSession());
	}

	/**
	 * @Given I rename the following file/folder to
	 * @param TableNode $namePartsTable table of parts of the from and to file names
	 *                                  table headings: must be:
	 *                                  |from-name-parts |to-name-parts |
	 * @return void
	 */
	public function iRenameTheFollowingFileFolderTo(TableNode $namePartsTable) {
		$fromNameParts = [];
		$toNameParts = [];

		foreach ($namePartsTable as $namePartsRow) {
			$fromNameParts[] = $namePartsRow['from-name-parts'];
			$toNameParts[] = $namePartsRow['to-name-parts'];
		}
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->renameFile(
			$fromNameParts,
			$toNameParts,
			$this->getSession()
		);
	}

	/**
	 * @When I rename the file/folder :fromName to one of these names
	 * @param string $fromName
	 * @param TableNode $table
	 * @return void
	 */
	public function iRenameTheFileToOneOfThisNames($fromName, TableNode $table) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		foreach ($table->getRows() as $row) {
			$this->filesPage->renameFile($fromName, $row[0], $this->getSession());
		}
		
	}

	/**
	 * @When I delete the file/folder :name
	 * @param string $name
	 * @return void
	 */
	public function iDeleteTheFile($name) {
		$session = $this->getSession();
		$this->filesPage->waitTillPageIsLoaded($session);
		$this->filesPage->deleteFile($name, $session);
	}

	/**
	 * @When I delete the following file/folder
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 * @return void
	 */
	public function iDeleteTheFollowingFile(TableNode $namePartsTable) {
		$fileNameParts = [];
		
		foreach ($namePartsTable as $namePartsRow) {
			$fileNameParts[] = $namePartsRow['name-parts'];
		}
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->deleteFile($fileNameParts, $this->getSession());
	}

	/**
	 * @When I delete the elements
	 * @param TableNode $table table of file names
	 *                         table headings: must be: |name|
	 * @return void
	 */
	public function iDeleteTheElements(TableNode $table) {
		$this->deletedElementsTable = $table;
		foreach ($this->deletedElementsTable as $file) {
			$this->iDeleteTheFile($file['name']);
		}
	}

	/**
	 * @When I move the file/folder :name into the folder :destination
	 * @param string $name
	 * @param string $destination
	 * @return void
	 */
	public function iMoveTheFileFolderTo($name, $destination) {
		$this->filesPage->moveFileTo($name, $destination, $this->getSession());
	}

	/**
	 * @When I move the following file/folder to
	 * @param TableNode $namePartsTable table of parts of the from and to file names
	 *                                  table headings: must be:
	 *                                  |item-to-move-name-parts |destination-name-parts |
	 * @return void
	 */
	public function iMoveTheFollowingFileFolderTo(TableNode $namePartsTable) {
		$itemToMoveNameParts = [];
		$destinationNameParts = [];
		
		foreach ($namePartsTable as $namePartsRow) {
			$itemToMoveNameParts[] = $namePartsRow['item-to-move-name-parts'];
			$destinationNameParts[] = $namePartsRow['destination-name-parts'];
		}
		$this->iMoveTheFileFolderTo($itemToMoveNameParts, $destinationNameParts);
	}

	/**
	 * @When I batch move these files/folders into the folder :folderName
	 * @param string $folderName
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 * @return void
	 */
	public function iBatchMoveTheseFilesIntoTheFolder(
		$folderName, TableNode $files
	) {
		$this->iMarkTheseFilesForBatchAction($files);
		$firstFileName = $files->getRow(1)[0];
		$this->iMoveTheFileFolderTo($firstFileName, $folderName);
		$this->movedElementsTable = $files;
	}

	/**
	 * @Then /^the (?:deleted|moved) elements should (not|)\s?be listed$/
	 * @param string $shouldOrNot
	 * @return void
	 */
	public function theDeletedMovedElementsShouldBeListed($shouldOrNot) {
		$should = ($shouldOrNot !== "not");
		if (!is_null($this->deletedElementsTable)) {
			foreach ($this->deletedElementsTable as $file) {
				if ($should) {
					$this->theFileFolderShouldBeListed($file['name']);
				} else {
					$this->theFileFolderShouldNotBeListed($file['name']);
				}
			}
		}
		if (!is_null($this->movedElementsTable)) {
			foreach ($this->movedElementsTable as $file) {
				if ($should) {
					$this->theFileFolderShouldBeListed($file['name']);
				} else {
					$this->theFileFolderShouldNotBeListed($file['name']);
				}
			}
		}
	}

	/**
	 * @Then /^the (?:deleted|moved) elements should (not|)\s?be listed after a page reload$/
	 * @param string $shouldOrNot
	 * @return void
	 */
	public function theDeletedMovedElementsShouldBeListedAfterPageReload(
		$shouldOrNot
	) {
		$this->theFilesPageIsReloaded();
		$this->theDeletedMovedElementsShouldBeListed($shouldOrNot);
	}

	/**
	 * @Then the deleted elements should be listed in the trashbin
	 * @return void
	 */
	public function theDeletedElementsShouldBeListedInTheTrashbin() {
		$this->trashbinPage->open();
		$this->trashbinPage->waitTillPageIsLoaded($this->getSession());
		
		foreach ($this->deletedElementsTable as $file) {
			$this->theFileFolderShouldBeListed($file['name'], $this->trashbinPage);
		}
	}

	/**
	 * @When I batch delete these files
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 * @return void
	 */
	public function iBatchDeleteTheseFiles(TableNode $files) {
		$this->deletedElementsTable = $files;
		$this->iMarkTheseFilesForBatchAction($files);
		$this->iBatchDeleteTheMarkedFiles();
	}

	/**
	 * @When I batch delete the marked files
	 * @return void
	 */
	public function iBatchDeleteTheMarkedFiles() {
		$this->filesPage->deleteAllSelectedFiles($this->getSession());
	}

	/**
	 * @When I mark these files for batch action
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 * @return void
	 */
	public function iMarkTheseFilesForBatchAction(TableNode $files) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		foreach ($files as $file) {
			$this->filesPage->selectFileForBatchAction(
				$file['name'], $this->getSession()
			);
		}
	}

	/**
	 * @When I open the file/folder :name
	 * @param string $name
	 * @return void
	 */
	public function iOpenTheFolder($name) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->openFile($name, $this->getSession());
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Then the file/folder :name should be listed
	 * @param string $name
	 * @param PageObject|null $pageObject if null $this->filesPage will be used
	 * @return void
	 */
	public function theFileFolderShouldBeListed(
		$name, $pageObject = null
	) {
		if (is_null($pageObject)) {
			$pageObject = $this->filesPage;
		}
		$pageObject->waitTillPageIsLoaded($this->getSession());
		PHPUnit_Framework_Assert::assertNotNull(
			$pageObject->findFileRowByName($name, $this->getSession())
		);
	}

	/**
	 * @Then the file/folder :name should not be listed
	 * @param string $name
	 * @param PageObject|null $pageObject if null $this->filesPage will be used
	 * @return void
	 */
	public function theFileFolderShouldNotBeListed($name, $pageObject = null) {
		$message = null;
		if (is_null($pageObject)) {
			$pageObject = $this->filesPage;
		}
		try {
			$pageObject->findFileRowByName($name, $this->getSession());
		} catch (ElementNotFoundException $e) {
			$message = $e->getMessage();
		}
		if (is_array($name)) {
			$name = implode($name);
		}
		PHPUnit_Framework_Assert::assertEquals(
			"could not find file with the name '" . $name . "'",
			$message
		);
	}

	/**
	 * @Then the file/folder :itemToBeListed should be listed in the folder :folderName
	 * @param string $itemToBeListed item to look for
	 * @param string $folderName folder to look in
	 * @return void
	 */
	public function theFileFolderShouldBeListedInTheFolder(
		$itemToBeListed, $folderName
	) {
		$this->iOpenTheFolder($folderName);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->theFileFolderShouldBeListed($itemToBeListed);
	}

	/**
	 * @Then /^the moved elements should (not|)\s?be listed in the folder ['"](.*)['"]$/
	 * @param string $shouldOrNot
	 * @param string $folderName
	 * @return void
	 */
	public function theMovedElementsShouldBeListedInTheFolder(
		$shouldOrNot, $folderName
	) {
		$this->iOpenTheFolder($folderName);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->theDeletedMovedElementsShouldBeListed($shouldOrNot);
	}

	/**
	 * @Then /^the following (?:file|folder|item) should (not|)\s?be listed in the following folder$/
	 * @param string $shouldOrNot
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: | item-name-parts | folder-name-parts |
	 * @return void
	 */
	public function theFollowingFileFolderShouldBeListedInTheFollowingFolder(
		$shouldOrNot, TableNode $namePartsTable
	) {
		$toBeListedTableArray[] = ["name-parts"];
		foreach ($namePartsTable as $namePartsRow) {
			$folderNameParts[] = $namePartsRow['folder-name-parts'];
			$toBeListedTableArray[] = [$namePartsRow['item-name-parts']];
		}
		$this->iOpenTheFolder($folderNameParts);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		
		$toBeListedTable = new TableNode($toBeListedTableArray);
		$this->theFollowingFileFolderShouldBeListed(
			$shouldOrNot, "", $toBeListedTable
		);
	}

	/**
	 * @Then /^the following (?:file|folder) should (not|)\s?be listed\s?(in the trashbin|)$/
	 * @param string $shouldOrNot
	 * @param string $trashbin
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 * @return void
	 */
	public function theFollowingFileFolderShouldBeListed(
		$shouldOrNot, $trashbin, TableNode $namePartsTable
	) {
		$should = ($shouldOrNot !== "not");
		$fileNameParts = [];

		foreach ($namePartsTable as $namePartsRow) {
			$fileNameParts[] = $namePartsRow['name-parts'];
		}

		if ($trashbin !== "") {
			$this->trashbinPage->open();
			$this->trashbinPage->waitTillPageIsLoaded($this->getSession());
			$pageObject = $this->trashbinPage;
		} else {
			$pageObject = $this->filesPage;
		}
		if ($should) {
			$this->theFileFolderShouldBeListed($fileNameParts, $pageObject);
		} else {
			$this->theFileFolderShouldNotBeListed($fileNameParts, $pageObject);
		}
	}

	/**
	 * @Then near the file/folder :name a tooltip with the text :toolTipText should be displayed
	 * @param string $name
	 * @param string $toolTipText
	 * @return void
	 */
	public function nearTheFileATooltipWithTheTextShouldBeDisplayed(
		$name,
		$toolTipText
	) {
		PHPUnit_Framework_Assert::assertEquals(
			$toolTipText, 
			$this->filesPage->getTooltipOfFile($name, $this->getSession())
		);
	}

	/**
	 * @Then it should not be possible to delete the file/folder :name
	 * @param string $name
	 * @return void
	 */
	public function itShouldNotBePossibleToDelete($name) {
		try {
			$this->iDeleteTheFile($name);
		} catch (ElementNotFoundException $e) {
			PHPUnit_Framework_Assert::assertSame(
				"could not find button 'Delete' in action Menu",
				$e->getMessage()
			);
		}
	}

	/**
	 * @Then the filesactionmenu should be completely visible after clicking on it
	 * @return void
	 */
	public function theFilesactionmenuShouldBeCompletelyVisibleAfterClickingOnIt() {
		for ($i = 1; $i <= $this->filesPage->getSizeOfFileFolderList(); $i++) {
			$actionMenu = $this->filesPage->openFileActionsMenuByNo($i);

			$windowHeight = $this->filesPage->getWindowHeight(
				$this->getSession()
			);

			$deleteBtn = $actionMenu->findButton(
				$actionMenu->getDeleteActionLabel()
			);
			$deleteBtnCoordinates = $this->filesPage->getCoordinatesOfElement(
				$this->getSession(), $deleteBtn
			);
			PHPUnit_Framework_Assert::assertLessThan(
				$windowHeight, $deleteBtnCoordinates ["top"]
			);
			//this will close the menu again
			$this->filesPage->clickFileActionsMenuBtnByNo($i);
		}
	}
}
