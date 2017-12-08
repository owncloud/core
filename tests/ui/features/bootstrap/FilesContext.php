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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use GuzzleHttp\Exception\ClientException;
use Page\FilesPage;
use Page\FilesPageElement\ConflictDialog;
use Page\OwncloudPage;
use Page\TrashbinPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\DeleteHelper;
use TestHelpers\DownloadHelper;

require_once 'bootstrap.php';

/**
 * Files context.
 */
class FilesContext extends RawMinkContext implements Context {

	private $filesPage;
	private $trashbinPage;
	/**
	 * 
	 * @var ConflictDialog
	 */
	private $conflictDialog;
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
	 * variable to remember in which folder we are currently working
	 * 
	 * @var string
	 */
	private $currentFolder = "";

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;
	private $uploadConflictDialogTitle = "file conflict";

	/**
	 * FilesContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param TrashbinPage $trashbinPage
	 * @param ConflictDialog $conflictDialog
	 * @return void
	 */
	public function __construct(
		FilesPage $filesPage,
		TrashbinPage $trashbinPage,
		ConflictDialog $conflictDialog
	) {
		$this->trashbinPage = $trashbinPage;
		$this->filesPage = $filesPage;
		$this->conflictDialog = $conflictDialog;
	}

	/**
	 * returns the set page object from FeatureContext::getCurrentPageObject()
	 * or if that is null the files page object
	 * 
	 * @return OwncloudPage
	 */
	private function getCurrentPageObject() {
		$pageObject = $this->featureContext->getCurrentPageObject();
		if (is_null($pageObject)) {
			$pageObject = $this->filesPage;
		}
		return $pageObject;
	}

	/**
	 * reset any context remembered about where we are or what we have done on
	 * the files-like pages
	 *
	 * @return void
	 */
	public function resetFilesContext() {
		$this->currentFolder = "";
		$this->deletedElementsTable = null;
		$this->movedElementsTable = null;
	}

	/**
	 * @Given I am on the files page
	 * @return void
	 */
	public function iAmOnTheFilesPage() {
		if (!$this->filesPage->isOpen()) {
			$this->filesPage->open();
			$this->filesPage->waitTillPageIsLoaded($this->getSession());
			$this->featureContext->setCurrentPageObject($this->filesPage);
		}
	}

	/**
	 * @Given I am on the trashbin page
	 * @return void
	 */
	public function iAmOnTheTrashbinPage() {
		if (!$this->trashbinPage->isOpen()) {
			$this->trashbinPage->open();
			$this->trashbinPage->waitTillPageIsLoaded($this->getSession());
			$this->featureContext->setCurrentPageObject($this->trashbinPage);
		}
	}

	/**
	 * @When the files page is reloaded
	 * @return void
	 */
	public function theFilesPageIsReloaded() {
		$this->getSession()->reload();
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When /^I create a folder with the name ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $name enclosed in single or double quotes
	 * @return void
	 */
	public function iCreateAFolder($name) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$this->createAFolder(trim($name, $name[0]));
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function createAFolder($name) {
		$this->filesPage->createFolder($name);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When I create a folder with the following name
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 * @return void
	 */
	public function createTheFollowingFolder(TableNode $namePartsTable) {
		$fileName = '';

		foreach ($namePartsTable as $namePartsRow) {
			$fileName .= $namePartsRow['name-parts'];
		}

		$this->createAFolder($fileName);
	}

	/**
	 * @Then there are no files\/folders listed
	 * @return void
	 */
	public function thereAreNoFilesFoldersListed() {
		PHPUnit_Framework_Assert::assertEquals(
			0,
			$this->filesPage->getSizeOfFileFolderList()
		);
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
	 * for a folder or individual file that is shared, the receiver of the share
	 * has an "Unshare" entry in the file actions menu. Clicking it works just
	 * like delete.
	 *
	 * @When I delete/unshare the file/folder :name
	 * @param string $name
	 * @return void
	 */
	public function iDeleteTheFile($name) {
		$pageObject = $this->getCurrentPageObject();
		$session = $this->getSession();
		$pageObject->waitTillPageIsLoaded($session);
		$pageObject->deleteFile($name, $session);
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
	 * @Given the following files/folders are deleted
	 * @param TableNode $namePartsTable table headings: must be: |name|
	 * @return void
	 */
	public function theFollowingFilesFoldersAreDeleted(TableNode $table) {
		foreach ($table as $file) {
			$username = $this->featureContext->getCurrentUser();
			$currentTime = microtime(true);
			$end = $currentTime + (LONGUIWAITTIMEOUTMILLISEC / 1000);
			//retry deleting in case the file is locked (code 403)
			while ($currentTime <= $end) {
				try {
					DeleteHelper::delete(
						$this->featureContext->getCurrentServer(),
						$username,
						$this->featureContext->getUserPassword($username),
						$file['name']
					);
					break;
				} catch (ClientException $e) {
					if ($e->getResponse()->getStatusCode() === 423) {
						$message = "INFORMATION: file '" . $file['name'] .
								   "' is locked";
						error_log($message);
					} else {
						throw $e;
					}
				}
				
				usleep(STANDARDSLEEPTIMEMICROSEC);
				$currentTime = microtime(true);
			}
			
			if ($currentTime > $end) {
				throw new \Exception(
					__METHOD__ . " timeout deleting files by WebDAV"
				);
			}

			
		}
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
	 * @param string|array $name
	 * @param string|array $destination
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
	 * @When I upload overwriting the file :name
	 * @param string $name
	 * @return void
	 */
	public function iUploadOverwritingTheFile($name) {
		$this->iUploadTheFile($name);
		$this->choiceInUploadConflict("new");
		$this->iClickTheButton("Continue");
	}

	/**
	 * @When I upload the file :name keeping both new and existing files
	 * @param string $name
	 * @return void
	 */
	public function iUploadTheFileKeepingNewExisting($name) {
		$this->iUploadTheFile($name);
		$this->choiceInUploadConflict("new");
		$this->choiceInUploadConflict("existing");
		$this->iClickTheButton("Continue");
	}

	/**
	 * @When I upload the file :name
	 * @param string $name
	 * @return void
	 */
	public function iUploadTheFile($name) {
		$this->filesPage->uploadFile($this->getSession(), $name);
	}

	/**
	 * @When /^I choose to keep the (new|existing) files$/
	 * @param string $choice
	 * @return void
	 */
	public function choiceInUploadConflict($choice) {
		$dialogs = $this->filesPage->getOcDialogs();
		$isConflictDialog = false;
		foreach ($dialogs as $dialog) {
			$isConflictDialog = strstr(
				$dialog->getTitle(), $this->uploadConflictDialogTitle
			);
			if ($isConflictDialog !== false) {
				$this->conflictDialog->setElement($dialog->getOwnElement());
				break;
			}
		}
		if ($isConflictDialog === false) {
			throw new Exception(
				__METHOD__ .
				" file upload conflict dialog expected but not found"
			);
		}
		if ($choice === "new") {
			$this->conflictDialog->keepNewFiles();
		} elseif ($choice === "existing") {
			$this->conflictDialog->keepExistingFiles();
		} else {
			throw new Exception(
				__METHOD__ .
				" the choice can only be 'new' or 'existing'"
			);
		}
	}

	/**
	 * @When I click the :label button
	 * @param string $label
	 * @return void
	 */
	public function iClickTheButton($label) {
		$dialogs = $this->filesPage->getOcDialogs();
		$dialog = end($dialogs);
		$this->conflictDialog->setElement($dialog->getOwnElement());
		$this->conflictDialog->clickButton($this->getSession(), $label);
		$this->filesPage->waitForUploadProgressbarToFinish();
	}

	/**
	 * @Then /^the (?:deleted|moved) elements should (not|)\s?be listed$/
	 * @param string $shouldOrNot
	 * @return void
	 */
	public function theDeletedMovedElementsShouldBeListed($shouldOrNot) {
		if (!is_null($this->deletedElementsTable)) {
			foreach ($this->deletedElementsTable as $file) {
				$this->checkIfFileFolderIsListed($file['name'], $shouldOrNot);
			}
		}
		if (!is_null($this->movedElementsTable)) {
			foreach ($this->movedElementsTable as $file) {
				$this->checkIfFileFolderIsListed($file['name'], $shouldOrNot);
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
		$this->iAmOnTheTrashbinPage();

		foreach ($this->deletedElementsTable as $file) {
			$this->checkIfFileFolderIsListed($file['name'], "", "trashbin");
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
	 * @When /^I open the (trashbin|)\s?(file|folder) ((?:'[^']*')|(?:"[^"]*"))$/
	 * @param string $typeOfFilesPage
	 * @param string $fileOrFolder 
	 * @param string $name enclosed in single or double quotes
	 * @return void
	 */
	public function iOpenTheFolderNamed($typeOfFilesPage, $fileOrFolder, $name) {
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		$this->iOpenTheFolder($typeOfFilesPage, $fileOrFolder, trim($name, $name[0]));
	}

	/**
	 * @param string $typeOfFilesPage
	 * @param string $fileOrFolder 
	 * @param string|array $name
	 * @return void
	 */
	public function iOpenTheFolder($typeOfFilesPage, $fileOrFolder, $name) {
		if ($typeOfFilesPage === "trashbin") {
			$this->iAmOnTheTrashbinPage();
		}
		if ($fileOrFolder === "folder") {
			if (is_array($name)) {
				$this->currentFolder .= "/" . implode($name);
			} else {
				$this->currentFolder .= "/" . $name;
			}
		}
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		$pageObject->openFile($name, $this->getSession());
		$pageObject->waitTillPageIsLoaded($this->getSession());
	}
	
	
	/**
	 * @Then /^the (?:file|folder) ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed\s?(?:in the |)(trashbin|)\s?(?:folder ((?:'[^']*')|(?:"[^"]*")))?$/
	 * @param string $name enclosed in single or double quotes
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 * @return void
	 */
	public function theFileFolderShouldBeListed(
		$name, $shouldOrNot, $typeOfFilesPage = "", $folder = ""
	) {
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($folder !== "") {
			$folder = trim($folder, $folder[0]);
		}

		$this->checkIfFileFolderIsListed(
			trim($name, $name[0]),
			$shouldOrNot,
			$typeOfFilesPage,
			$folder
		);
	}

	/**
	 * @param string|array $name
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 * @return void
	 */
	public function checkIfFileFolderIsListed(
		$name, $shouldOrNot, $typeOfFilesPage = "", $folder = ""
	) {
		$should = ($shouldOrNot !== "not");
		$message = null;
		if ($typeOfFilesPage === "trashbin") {
			$this->iAmOnTheTrashbinPage();
		}
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		if ($folder !== "") {
			$this->iOpenTheFolder($typeOfFilesPage, "folder", $folder);
		}

		try {
			$fileRowElement = $pageObject->findFileRowByName($name, $this->getSession());
			$message = '';
		} catch (ElementNotFoundException $e) {
			$message = $e->getMessage();
			$fileRowElement = null;
		}
		if ($should) {
			PHPUnit_Framework_Assert::assertNotNull($fileRowElement);
		} else {
			if (is_array($name)) {
				$name = implode($name);
			}
			PHPUnit_Framework_Assert::assertContains(
				"could not find file with the name '" . $name . "'",
				$message
			);
		}
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
		$this->iOpenTheFolder("", "folder", $folderName);
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
		$folderNameParts = [];
		foreach ($namePartsTable as $namePartsRow) {
			$folderNameParts[] = $namePartsRow['folder-name-parts'];
			$toBeListedTableArray[] = [$namePartsRow['item-name-parts']];
		}
		$this->iOpenTheFolder("", "folder", $folderNameParts);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());

		$toBeListedTable = new TableNode($toBeListedTableArray);
		$this->theFollowingFileFolderShouldBeListed(
			$shouldOrNot, "", "", $toBeListedTable
		);
	}

	/**
	 * @Then /^the following (?:file|folder) should (not|)\s?be listed\s?(?:in the |)(trashbin|)\s?(?:folder ((?:'[^']*')|(?:"[^"]*")))?$/
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 * @return void
	 */
	public function theFollowingFileFolderShouldBeListed(
		$shouldOrNot, $typeOfFilesPage, $folder = "", TableNode $namePartsTable
	) {
		$fileNameParts = [];

		foreach ($namePartsTable as $namePartsRow) {
			$fileNameParts[] = $namePartsRow['name-parts'];
		}

		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($folder !== "") {
			$folder = trim($folder, $folder[0]);
		}

		$this->checkIfFileFolderIsListed(
			$fileNameParts,
			$shouldOrNot,
			$typeOfFilesPage,
			$folder
		);
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
			PHPUnit_Framework_Assert::assertContains(
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

	/**
	 * @Then /^the content of ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be the same as the original ((?:'[^']*')|(?:"[^"]*"))$/
	 * @param string $remoteFile enclosed in single or double quotes
	 * @param string $shouldOrNot
	 * @param string $originalFile enclosed in single or double quotes
	 * @return void
	 */
	public function theContentOfShouldBeTheSameAsTheOriginal(
		$remoteFile, $shouldOrNot, $originalFile
	) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$remoteFile = $this->currentFolder . "/" . trim($remoteFile, $remoteFile[0]);
		$originalFile = getenv("SRC_SKELETON_DIR") . "/" . trim($originalFile, $originalFile[0]);
		$shouldBeSame = ($shouldOrNot !== "not");
		$this->assertContentOfRemoteAndLocalFileIsSame($remoteFile, $originalFile, $shouldBeSame);
	}

	/**
	 * @Then /^the content of ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be the same as the local ((?:'[^']*')|(?:"[^"]*"))$/
	 * @param string $remoteFile enclosed in single or double quotes
	 * @param string $shouldOrNot
	 * @param string $localFile enclosed in single or double quotes
	 * @return void
	 */
	public function theContentOfShouldBeTheSameAsTheLocal(
		$remoteFile, $shouldOrNot, $localFile
	) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$remoteFile = $this->currentFolder . "/" . trim($remoteFile, $remoteFile[0]);
		$localFile = getenv("FILES_FOR_UPLOAD") . "/" . trim($localFile, $localFile[0]);
		$shouldBeSame = ($shouldOrNot !== "not");
		$this->assertContentOfRemoteAndLocalFileIsSame($remoteFile, $localFile, $shouldBeSame);
	}

	/**
	 * @Then /^the content of ((?:'[^']*')|(?:"[^"]*")) should not have changed$/
	 * @param string $fileName
	 * @return void
	 */
	public function theContentOfShouldNotHaveChanged($fileName) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$fileName = trim($fileName, $fileName[0]);
		$remoteFile = $this->currentFolder . "/" . $fileName;
		if ($this->currentFolder !== "") {
			$subFolderPath = $this->currentFolder . "/";
		} else {
			$subFolderPath = "";
		}
		$localFile = getenv("SRC_SKELETON_DIR") . "/" . $subFolderPath . $fileName;
		$this->assertContentOfRemoteAndLocalFileIsSame($remoteFile, $localFile);
	}

	/**
	 * Asserts that the content of a remote and a local file is the same
	 * or is different
	 * uses the current user to download the remote file
	 *
	 * @param string $remoteFile
	 * @param string $localFile
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 * @return void
	 */
	private function assertContentOfRemoteAndLocalFileIsSame(
		$remoteFile, $localFile, $shouldBeSame = true
	) {
		$username = $this->featureContext->getCurrentUser();
		$result = DownloadHelper::download(
			$this->featureContext->getCurrentServer(),
			$username,
			$this->featureContext->getUserPassword($username),
			$remoteFile
		);

		$localContent = file_get_contents($localFile);
		$downloadedContent = $result->getBody()->getContents();

		if ($shouldBeSame) {
			PHPUnit_Framework_Assert::assertSame($localContent, $downloadedContent);
		} else {
			PHPUnit_Framework_Assert::assertNotSame($localContent, $downloadedContent);
		}
	}

	/**
	 * @BeforeScenario
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 * @param BeforeScenarioScope $scope
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
