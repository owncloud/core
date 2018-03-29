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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use GuzzleHttp\Exception\ClientException;
use Page\FilesPage;
use Page\FilesPageElement\ConflictDialog;
use Page\FavoritesPage;
use Page\OwncloudPage;
use Page\TrashbinPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\DeleteHelper;
use TestHelpers\DownloadHelper;
use Page\FilesPageElement\FileRow;

require_once 'bootstrap.php';

/**
 * WebUI Files context.
 */
class WebUIFilesContext extends RawMinkContext implements Context {

	private $filesPage;
	private $trashbinPage;
	private $favoritesPage;
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

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	private $uploadConflictDialogTitle = "file conflict";

	/**
	 * WebUIFilesContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param TrashbinPage $trashbinPage
	 * @param ConflictDialog $conflictDialog
	 * @param FavoritesPage $favoritesPage
	 *
	 * @return void
	 */
	public function __construct(
		FilesPage $filesPage,
		TrashbinPage $trashbinPage,
		ConflictDialog $conflictDialog,
		FavoritesPage $favoritesPage
	) {
		$this->trashbinPage = $trashbinPage;
		$this->filesPage = $filesPage;
		$this->conflictDialog = $conflictDialog;
		$this->favoritesPage = $favoritesPage;
		
	}

	/**
	 * returns the set page object from WebUIGeneralContext::getCurrentPageObject()
	 * or if that is null the files page object
	 * 
	 * @return OwncloudPage
	 */
	private function getCurrentPageObject() {
		$pageObject = $this->webUIGeneralContext->getCurrentPageObject();
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
	 * @When the user browses to the files page
	 * @Given the user has browsed to the files page
	 *
	 * @return void
	 */
	public function theUserBrowsesToTheFilesPage() {
		if (!$this->filesPage->isOpen()) {
			$this->filesPage->open();
			$this->filesPage->waitTillPageIsLoaded($this->getSession());
			$this->webUIGeneralContext->setCurrentPageObject($this->filesPage);
		}
	}

	/**
	 * @When the user browses to the trashbin page
	 * @Given the user has browsed to the trashbin page
	 *
	 * @return void
	 */
	public function theUserBrowsesToTheTrashbinPage() {
		if (!$this->trashbinPage->isOpen()) {
			$this->trashbinPage->open();
			$this->trashbinPage->waitTillPageIsLoaded($this->getSession());
			$this->webUIGeneralContext->setCurrentPageObject($this->trashbinPage);
		}
	}
	
	/**
	 * @When the user browses to the favorites page
	 * @Given the user has browsed to the favorites page
	 *
	 * @return void
	 */
	public function theUserBrowsesToTheFavoritesPage() {
		if (!$this->favoritesPage->isOpen()) {
			$this->favoritesPage->open();
			$this->favoritesPage->waitTillPageIsLoaded($this->getSession());
			$this->webUIGeneralContext->setCurrentPageObject($this->favoritesPage);
		}
	}

	/**
	 * @When the user reloads the current page of the webUI
	 * @Given the user has reloaded the current page of the webUI
	 *
	 * @return void
	 */
	public function theUserReloadsTheCurrentPageOfTheWebUI() {
		$this->getSession()->reload();
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When /^the user creates a folder with the (invalid|)\s?name ((?:'[^']*')|(?:"[^"]*")) using the webUI$/
	 *
	 * @param string $invalid contains "invalid"
	 * 						  if the folder creation is expected to fail
	 * @param string $name enclosed in single or double quotes
	 *
	 * @return void
	 */
	public function theUserCreatesAFolderUsingTheWebUI($invalid, $name) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$name = trim($name, $name[0]);
		try {
			$this->createAFolder($name);
			if ($invalid === "invalid") {
				throw new Exception(
					"folder '$name' should not have been created but was"
				);
			}
		} catch (Exception $e) {
			//do not throw the exception if we expect the folder creation to fail
			if ($invalid !== "invalid"
				|| $e->getMessage() !== "could not create folder"
			) {
				throw $e;
			}
		}
	}

	/**
	 * @param string $name
	 *
	 * @return void
	 */
	public function createAFolder($name) {
		$session = $this->getSession();
		$this->filesPage->createFolder($session, $name);
		$this->filesPage->waitTillPageIsLoaded($session);
	}

	/**
	 * @When the user creates a folder with the following name using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 *
	 * @return void
	 */
	public function theUserCreatesTheFollowingFolderUsingTheWebUI(
		TableNode $namePartsTable
	) {
		$fileName = '';

		foreach ($namePartsTable as $namePartsRow) {
			$fileName .= $namePartsRow['name-parts'];
		}

		$this->createAFolder($fileName);
	}

	/**
	 * @Then there should be no files\/folders listed on the webUI
	 *
	 * @return void
	 */
	public function thereShouldBeNoFilesFoldersListedOnTheWebUI() {
		PHPUnit_Framework_Assert::assertEquals(
			0,
			$this->filesPage->getSizeOfFileFolderList()
		);
	}

	/**
	 * @When the user creates so many files\/folders that they do not fit in one browser page
	 * @Given so many files\/folders have been created that they do not fit in one browser page
	 *
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
			$this->filesPage->createFolder($this->getSession());
			$itemsCount = $this->filesPage->getSizeOfFileFolderList();
			$lastItemCoordinates = $this->filesPage->getCoordinatesOfElement(
				$this->getSession(),
				$this->filesPage->findFileActionsMenuBtnByNo($itemsCount)
			);
		}
		$this->theUserReloadsTheCurrentPageOfTheWebUI();
	}

	/**
	 * @When the user renames the file/folder :fromName to :toName using the webUI
	 * @Given the user has renamed the file/folder :fromName to :toName using the webUI
	 *
	 * @param string $fromName
	 * @param string $toName
	 *
	 * @return void
	 */
	public function theUserRenamesTheFileFolderToUsingTheWebUI(
		$fromName, $toName
	) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->renameFile($fromName, $toName, $this->getSession());
	}

	/**
	 * @When the user renames the following file/folder using the webUI
	 * @Given the user has renamed the following file/folder using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the from and to file names
	 *                                  table headings: must be:
	 *                                  |from-name-parts |to-name-parts |
	 *
	 * @return void
	 */
	public function theUserRenamesTheFollowingFileFolderToUsingTheWebUI(
		TableNode $namePartsTable
	) {
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
	 * @When the user renames the file/folder :fromName to one of these names using the webUI
	 * @Given the user has renamed the file/folder :fromName to one of these names using the webUI
	 *
	 * @param string $fromName
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theUserRenamesTheFileToOneOfTheseNamesUsingTheWebUI(
		$fromName, TableNode $table
	) {
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
	 * @When the user deletes/unshares the file/folder :name using the webUI
	 * @Given the user has deleted/unshared the file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserDeletesTheFileUsingTheWebUI($name) {
		$pageObject = $this->getCurrentPageObject();
		$session = $this->getSession();
		$pageObject->waitTillPageIsLoaded($session);
		$pageObject->deleteFile($name, $session);
	}

	/**
	 * @When the user deletes the following file/folder using the webUI
	 * @Given the user has deleted the following file/folder using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 *
	 * @return void
	 */
	public function theUserDeletesTheFollowingFileUsingTheWebUI(
		TableNode $namePartsTable
	) {
		$fileNameParts = [];

		foreach ($namePartsTable as $namePartsRow) {
			$fileNameParts[] = $namePartsRow['name-parts'];
		}
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->deleteFile($fileNameParts, $this->getSession());
	}

	/**
	 * @Given the following files/folders have been deleted
	 *
	 * @param TableNode $filesTable table headings: must be: |name|
	 *
	 * @return void
	 */
	public function theFollowingFilesFoldersHaveBeenDeleted(TableNode $filesTable) {
		foreach ($filesTable as $file) {
			$username = $this->featureContext->getCurrentUser();
			$currentTime = microtime(true);
			$end = $currentTime + (LONGUIWAITTIMEOUTMILLISEC / 1000);
			//retry deleting in case the file is locked (code 403)
			while ($currentTime <= $end) {
				try {
					DeleteHelper::delete(
						$this->featureContext->baseUrlWithSlash(),
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
	 * @When the user deletes the following elements using the webUI
	 * @Given the user has deleted the following elements using the webUI
	 *
	 * @param TableNode $table table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 */
	public function theUserDeletesTheFollowingElementsUsingTheWebUI(
		TableNode $table
	) {
		$this->deletedElementsTable = $table;
		foreach ($this->deletedElementsTable as $file) {
			$this->theUserDeletesTheFileUsingTheWebUI($file['name']);
		}
	}

	/**
	 * @When the user moves the file/folder :name into the folder :destination using the webUI
	 * @Given the user has moved the file/folder :name into the folder :destination using the webUI
	 *
	 * @param string|array $name
	 * @param string|array $destination
	 *
	 * @return void
	 */
	public function theUserMovesTheFileFolderToUsingTheWebUI($name, $destination) {
		$this->filesPage->moveFileTo($name, $destination, $this->getSession());
	}

	/**
	 * @When the user moves the following file/folder using the webUI
	 * @Given the user has moved the following file/folder using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the from and to file names
	 *                                  table headings: must be:
	 *                                  |item-to-move-name-parts |destination-name-parts |
	 *
	 * @return void
	 */
	public function theUserMovesTheFollowingFileFolderUsingTheWebUI(
		TableNode $namePartsTable
	) {
		$itemToMoveNameParts = [];
		$destinationNameParts = [];

		foreach ($namePartsTable as $namePartsRow) {
			$itemToMoveNameParts[] = $namePartsRow['item-to-move-name-parts'];
			$destinationNameParts[] = $namePartsRow['destination-name-parts'];
		}
		$this->theUserMovesTheFileFolderToUsingTheWebUI($itemToMoveNameParts, $destinationNameParts);
	}

	/**
	 * @When the user batch moves these files/folders into the folder :folderName using the webUI
	 * @Given the user has batch moved these files/folders into the folder :folderName using the webUI
	 *
	 * @param string $folderName
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 */
	public function theUserBatchMovesTheseFilesIntoTheFolderUsingTheWebUI(
		$folderName, TableNode $files
	) {
		$this->theUserMarksTheseFilesForBatchActionUsingTheWebUI($files);
		$firstFileName = $files->getRow(1)[0];
		$this->theUserMovesTheFileFolderToUsingTheWebUI($firstFileName, $folderName);
		$this->movedElementsTable = $files;
	}

	/**
	 * @When the user uploads overwriting the file :name using the webUI
	 * @Given the user has uploaded overwriting the file :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserUploadsOverwritingTheFileUsingTheWebUI($name) {
		$this->theUserUploadsTheFileUsingTheWebUI($name);
		$this->choiceInUploadConflictDialogWebUI("new");
		$this->theUserChoosesToInTheUploadDialog("Continue");
	}

	/**
	 * @When the user uploads overwriting the file :name using the webUI and retries if the file is locked
	 * @Given the user has uploaded overwriting the file :name using the webUI and retries if the file is locked
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserUploadsOverwritingTheFileUsingTheWebUIRetry($name) {
		$previousNotificationsCount = 0;

		for ($retryCounter = 0;
			 $retryCounter < STANDARDRETRYCOUNT;
			 $retryCounter++) {
			$this->theUserUploadsOverwritingTheFileUsingTheWebUI($name);

			try {
				$notifications = $this->filesPage->getNotifications();
			} catch (ElementNotFoundException $e) {
				$notifications = [];
			}

			$currentNotificationsCount = count($notifications);

			if ($currentNotificationsCount > $previousNotificationsCount) {
				$message
					= "Upload overwriting " . $name .
					  " and got " . $currentNotificationsCount .
					  " notifications including " .
					  end($notifications) . "\n";
				echo $message;
				error_log($message);
				$previousNotificationsCount = $currentNotificationsCount;
				usleep(STANDARDSLEEPTIMEMICROSEC);
			} else {
				break;
			}
		}

		if ($retryCounter > 0) {
			$message
				= "INFORMATION: retried to upload overwriting file " .
				  $name . " " . $retryCounter . " times";
			echo $message;
			error_log($message);
		}
	}

	/**
	 * @When the user uploads the file :name keeping both new and existing files using the webUI
	 * @Given the user has uploaded the file :name keeping both new and existing files using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserUploadsTheFileKeepingNewExistingUsingTheWebUI($name) {
		$this->theUserUploadsTheFileUsingTheWebUI($name);
		$this->choiceInUploadConflictDialogWebUI("new");
		$this->choiceInUploadConflictDialogWebUI("existing");
		$this->theUserChoosesToInTheUploadDialog("Continue");
	}

	/**
	 * @When the user uploads the file :name using the webUI
	 * @Given the user has uploaded the file :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserUploadsTheFileUsingTheWebUI($name) {
		$this->filesPage->uploadFile($this->getSession(), $name);
	}

	/**
	 * @When /^the user chooses to keep the (new|existing) files in the upload dialog$/
	 * @Given /^the user has chosen to keep the (new|existing) files in the upload dialog$/
	 *
	 * @param string $choice
	 *
	 * @return void
	 */
	public function choiceInUploadConflictDialogWebUI($choice) {
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
	 * @When the user chooses :label in the upload dialog
	 * @When I click the :label button
	 *
	 * @param string $label
	 *
	 * @return void
	 */
	public function theUserChoosesToInTheUploadDialog($label) {
		$dialogs = $this->filesPage->getOcDialogs();
		$dialog = end($dialogs);
		$this->conflictDialog->setElement($dialog->getOwnElement());
		$this->conflictDialog->clickButton($this->getSession(), $label);
		$this->filesPage->waitForUploadProgressbarToFinish();
	}

	/**
	 * @Then /^the (?:deleted|moved) elements should (not|)\s?be listed on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function theDeletedMovedElementsShouldBeListedOnTheWebUI($shouldOrNot) {
		if (!is_null($this->deletedElementsTable)) {
			foreach ($this->deletedElementsTable as $file) {
				$this->checkIfFileFolderIsListedOnTheWebUI($file['name'], $shouldOrNot);
			}
		}
		if (!is_null($this->movedElementsTable)) {
			foreach ($this->movedElementsTable as $file) {
				$this->checkIfFileFolderIsListedOnTheWebUI($file['name'], $shouldOrNot);
			}
		}
	}

	/**
	 * @Then /^the (?:deleted|moved) elements should (not|)\s?be listed on the webUI after a page reload$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function theDeletedMovedElementsShouldBeListedOnTheWebUIAfterPageReload(
		$shouldOrNot
	) {
		$this->theUserReloadsTheCurrentPageOfTheWebUI();
		$this->theDeletedMovedElementsShouldBeListedOnTheWebUI($shouldOrNot);
	}

	/**
	 * @Then the deleted elements should be listed in the trashbin on the webUI
	 *
	 * @return void
	 */
	public function theDeletedElementsShouldBeListedInTheTrashbinOnTheWebUI() {
		$this->theUserBrowsesToTheTrashbinPage();

		foreach ($this->deletedElementsTable as $file) {
			$this->checkIfFileFolderIsListedOnTheWebUI($file['name'], "", "trashbin");
		}
	}

	/**
	 * @When the user batch deletes these files using the webUI
	 * @Given the user has batch deleted these files using the webUI
	 *
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 */
	public function theUserBatchDeletesTheseFilesUsingTheWebUI(TableNode $files) {
		$this->deletedElementsTable = $files;
		$this->theUserMarksTheseFilesForBatchActionUsingTheWebUI($files);
		$this->theUserBatchDeletesTheMarkedFilesUsingTheWebUI();
	}

	/**
	 * @When the user batch deletes the marked files using the webUI
	 * @Given the user has batch deleted the marked files using the webUI
	 *
	 * @return void
	 */
	public function theUserBatchDeletesTheMarkedFilesUsingTheWebUI() {
		$this->filesPage->deleteAllSelectedFiles($this->getSession());
	}

	/**
	 * @When the user marks these files for batch action using the webUI
	 * @Given the user has marked these files for batch action using the webUI
	 *
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 */
	public function theUserMarksTheseFilesForBatchActionUsingTheWebUI(
		TableNode $files
	) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		foreach ($files as $file) {
			$this->filesPage->selectFileForBatchAction(
				$file['name'], $this->getSession()
			);
		}
	}

	/**
	 * @When /^the user opens the (trashbin|)\s?(file|folder) ((?:'[^']*')|(?:"[^"]*")) using the webUI$/
	 * @Given /^the user has opened the (trashbin|)\s?(file|folder) ((?:'[^']*')|(?:"[^"]*")) using the webUI$/
	 *
	 * @param string $typeOfFilesPage
	 * @param string $fileOrFolder 
	 * @param string $name enclosed in single or double quotes
	 *
	 * @return void
	 */
	public function theUserOpensTheFolderNamedUsingTheWebUI(
		$typeOfFilesPage, $fileOrFolder, $name
	) {
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		$this->theUserOpensTheFolderUsingTheWebUI($typeOfFilesPage, $fileOrFolder, trim($name, $name[0]));
	}

	/**
	 * @param string $typeOfFilesPage
	 * @param string $fileOrFolder 
	 * @param string|array $name
	 *
	 * @return void
	 */
	public function theUserOpensTheFolderUsingTheWebUI(
		$typeOfFilesPage, $fileOrFolder, $name
	) {
		if ($typeOfFilesPage === "trashbin") {
			$this->theUserBrowsesToTheTrashbinPage();
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
	 * @Then /^the (?:file|folder) ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed\s?(?:in the |)(trashbin|favorites page|)\s?(?:folder ((?:'[^']*')|(?:"[^"]*")))? on the webUI$/
	 *
	 * @param string $name enclosed in single or double quotes
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 *
	 * @return void
	 */
	public function theFileFolderShouldBeListedOnTheWebUI(
		$name, $shouldOrNot, $typeOfFilesPage = "", $folder = ""
	) {
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($folder !== "") {
			$folder = trim($folder, $folder[0]);
		}

		$this->checkIfFileFolderIsListedOnTheWebUI(
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
	 *
	 * @return void
	 */
	public function checkIfFileFolderIsListedOnTheWebUI(
		$name, $shouldOrNot, $typeOfFilesPage = "", $folder = ""
	) {
		$should = ($shouldOrNot !== "not");
		$exceptionMessage = null;
		if ($typeOfFilesPage === "trashbin") {
			$this->theUserBrowsesToTheTrashbinPage();
		}
		if ($typeOfFilesPage === "favorites page") {
			$this->theUserBrowsesToTheFavoritesPage();
		}
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		if ($folder !== "") {
			$this->theUserOpensTheFolderUsingTheWebUI($typeOfFilesPage, "folder", $folder);
		}

		try {
			/**
			 * 
			 * @var FileRow $fileRow
			 */
			$fileRow = $pageObject->findFileRowByName($name, $this->getSession());
			$exceptionMessage = '';
		} catch (ElementNotFoundException $e) {
			$exceptionMessage = $e->getMessage();
			$fileRow = null;
		}

		if (is_array($name)) {
			$nameText = implode($name);
		} else {
			$nameText = $name;
		}

		$fileLocationText = " file '" . $nameText . "'";

		if ($folder !== "") {
			$fileLocationText .= " in folder '" . $folder . "'";
		} else {
			$fileLocationText .= " in current folder";
		}

		if ($typeOfFilesPage !== "") {
			$fileLocationText .= " in " . $typeOfFilesPage;
		}

		if ($should) {
			PHPUnit_Framework_Assert::assertNotNull(
				$fileRow,
				"could not find " . $fileLocationText . " when it should be listed"
			);
			PHPUnit_Framework_Assert::assertTrue(
				$fileRow->isVisible(),
				"file row of " . $fileLocationText . " is not visible but should"
			);
		} else {
			if (is_array($name)) {
				$name = implode($name);
			}
			if ($fileRow === null) {
				PHPUnit_Framework_Assert::assertContains(
					"could not find file with the name '" . $name . "'",
					$exceptionMessage,
					"found " . $fileLocationText . " when it should not be listed"
				);
			} else {
				PHPUnit_Framework_Assert::assertFalse(
					$fileRow->isVisible(),
					"file row of " . $fileLocationText . " is visible but should not"
				);
			}
		}
	}

	/**
	 * @Then /^the moved elements should (not|)\s?be listed in the folder ['"](.*)['"] on the webUI$/
	 *
	 * @param string $shouldOrNot
	 * @param string $folderName
	 *
	 * @return void
	 */
	public function theMovedElementsShouldBeListedInTheFolderOnTheWebUI(
		$shouldOrNot, $folderName
	) {
		$this->theUserOpensTheFolderUsingTheWebUI("", "folder", $folderName);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->theDeletedMovedElementsShouldBeListedOnTheWebUI($shouldOrNot);
	}

	/**
	 * @Then /^the following (?:file|folder|item) should (not|)\s?be listed in the following folder on the webUI$/
	 *
	 * @param string $shouldOrNot
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: | item-name-parts | folder-name-parts |
	 *
	 * @return void
	 */
	public function theFollowingFileFolderShouldBeListedInTheFollowingFolderOnTheWebUI(
		$shouldOrNot, TableNode $namePartsTable
	) {
		$toBeListedTableArray[] = ["name-parts"];
		$folderNameParts = [];
		foreach ($namePartsTable as $namePartsRow) {
			$folderNameParts[] = $namePartsRow['folder-name-parts'];
			$toBeListedTableArray[] = [$namePartsRow['item-name-parts']];
		}
		$this->theUserOpensTheFolderUsingTheWebUI("", "folder", $folderNameParts);
		$this->filesPage->waitTillPageIsLoaded($this->getSession());

		$toBeListedTable = new TableNode($toBeListedTableArray);
		$this->theFollowingFileFolderShouldBeListedOnTheWebUI(
			$shouldOrNot, "", "", $toBeListedTable
		);
	}

	/**
	 * @Then /^the following (?:file|folder) should (not|)\s?be listed\s?(?:in the |)(trashbin|favorites page|)\s?(?:folder ((?:'[^']*')|(?:"[^"]*")))? on the webUI$/
	 *
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 *
	 * @return void
	 */
	public function theFollowingFileFolderShouldBeListedOnTheWebUI(
		$shouldOrNot, $typeOfFilesPage, $folder = "", TableNode $namePartsTable = null
	) {
		$fileNameParts = [];

		if ($namePartsTable !== null) {
			foreach ($namePartsTable as $namePartsRow) {
				$fileNameParts[] = $namePartsRow['name-parts'];
			}
		} else {
			PHPUnit_Framework_Assert::fail('no table of file name parts passed to theFollowingFileFolderShouldBeListed');
		}

		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($folder !== "") {
			$folder = trim($folder, $folder[0]);
		}

		$this->checkIfFileFolderIsListedOnTheWebUI(
			$fileNameParts,
			$shouldOrNot,
			$typeOfFilesPage,
			$folder
		);
	}

	/**
	 * @Then near the file/folder :name a tooltip with the text :toolTipText should be displayed on the webUI
	 *
	 * @param string $name
	 * @param string $toolTipText
	 *
	 * @return void
	 */
	public function nearTheFileATooltipWithTheTextShouldBeDisplayedOnTheWebUI(
		$name,
		$toolTipText
	) {
		PHPUnit_Framework_Assert::assertEquals(
			$toolTipText,
			$this->filesPage->getTooltipOfFile($name, $this->getSession())
		);
	}
	
	/**
	 * @When the user restores the file/folder :fname from the trashbin using the webUI
	 * @Given the user has restored the file/folder :fname from the trashbin using the webUI
	 *
	 * @param string $fname
	 *
	 * @return void
	 */
	public function restoreFileFolderFromTrashbinUsingTheWebUI($fname) {
		$session = $this->getSession();
		$this->trashbinPage->restore($fname, $session);
	}

	/**
	 * @Then near the folder input field a tooltip with the text :tooltiptext should be displayed on the webUI
	 *
	 * @param string $tooltiptext
	 *
	 * @return void
	 */
	public function folderInputFieldTooltipTextShouldBeDisplayedOnTheWebUI($tooltiptext) {
		$createFolderTooltip = $this->filesPage->getCreateFolderTooltip();
		PHPUnit_Framework_Assert::assertSame($tooltiptext, $createFolderTooltip);
	}

	/**
	 * @Then it should not be possible to delete the file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function itShouldNotBePossibleToDeleteUsingTheWebUI($name) {
		try {
			$this->theUserDeletesTheFileUsingTheWebUI($name);
		} catch (ElementNotFoundException $e) {
			PHPUnit_Framework_Assert::assertContains(
				"could not find button 'Delete' in action Menu",
				$e->getMessage()
			);
		}
	}

	/**
	 * @Then the files action menu should be completely visible after opening it using the webUI
	 *
	 * @return void
	 */
	public function theFilesActionMenuShouldBeCompletelyVisibleAfterOpeningItUsingTheWebUI() {
		for ($i = 1; $i <= $this->filesPage->getSizeOfFileFolderList(); $i++) {
			$actionMenu = $this->filesPage->openFileActionsMenuByNo($i);
			
			$timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC;
			$currentTime = microtime(true);
			$end = $currentTime + ($timeout_msec / 1000);
			while ($currentTime <= $end) {
				$windowHeight = $this->filesPage->getWindowHeight(
					$this->getSession()
				);
				
				$deleteBtn = $actionMenu->findButton(
					$actionMenu->getDeleteActionLabel()
				);
				$deleteBtnCoordinates = $this->filesPage->getCoordinatesOfElement(
					$this->getSession(), $deleteBtn
				);
				if ($windowHeight >= $deleteBtnCoordinates ["top"]) {
					break;
				}
				usleep(STANDARDSLEEPTIMEMICROSEC);
				$currentTime = microtime(true);
			}
			
			PHPUnit_Framework_Assert::assertLessThan(
				$windowHeight, $deleteBtnCoordinates ["top"]
			);
			//this will close the menu again
			$this->filesPage->clickFileActionsMenuBtnByNo($i);
		}
	}

	/**
	 * @Then /^the content of ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be the same as the original ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $remoteFile enclosed in single or double quotes
	 * @param string $shouldOrNot
	 * @param string $originalFile enclosed in single or double quotes
	 *
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
	 *
	 * @param string $remoteFile enclosed in single or double quotes
	 * @param string $shouldOrNot
	 * @param string $localFile enclosed in single or double quotes
	 *
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
	 *
	 * @param string $fileName
	 *
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
	 * @When the user marks the file/folder :fileOrFolderName as favorite using the webUI
	 * @Given the user has marked the file/folder :fileOrFolderName as favorite using the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 */
	public function theUserMarksTheFileAsFavoriteUsingTheWebUI($fileOrFolderName) {
		$fileRow = $this->filesPage->findFileRowByName($fileOrFolderName, $this->getSession());
		$fileRow->markAsFavorite();
		$this->filesPage->waitTillFileRowsAreReady($this->getSession());
	}
	
	/**
	 * @Then the file/folder :fileOrFolderName should be marked as favorite on the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 */
	public function theFileShouldBeMarkedAsFavoriteOnTheWebUI($fileOrFolderName) {
		$fileRow = $this->filesPage->findFileRowByName($fileOrFolderName, $this->getSession());
		if ($fileRow->isMarkedAsFavorite() === false) {
			throw new Exception(
				__METHOD__ .
				" The file $fileOrFolderName is not marked as favorite but should be"
			);
		}
	}
	
	/**
	 * @When the user unmarks the favorited file/folder :fileOrFolderName using the webUI
	 * @Given the user has unmarked the favorited file/folder :fileOrFolderName using the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 */
	public function theUserUnmarksTheFavoritedFileUsingTheWebUI($fileOrFolderName) {
		$fileRow = $this->getCurrentPageObject()->findFileRowByName($fileOrFolderName, $this->getSession());
		$fileRow->unmarkFavorite();
		$this->getCurrentPageObject()->waitTillFileRowsAreReady($this->getSession());
	}
	
	/**
	 * @Then the file/folder :fileOrFolderName should not be marked as favorite on the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 */
	public function theFolderShouldNotBeMarkedAsFavoriteOnTheWebUI($fileOrFolderName) {
		$fileRow = $this->filesPage->findFileRowByName($fileOrFolderName, $this->getSession());
		if ($fileRow->isMarkedAsFavorite() === true) {
			throw new Exception(
				__METHOD__ .
				" The file $fileOrFolderName is marked as favorite but should not be"
			);
		}
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
	 *
	 * @return void
	 */
	private function assertContentOfRemoteAndLocalFileIsSame(
		$remoteFile, $localFile, $shouldBeSame = true
	) {
		$username = $this->featureContext->getCurrentUser();
		$result = DownloadHelper::download(
			$this->featureContext->baseUrlWithSlash(),
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
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}

	/**
	 * @When the user enables the setting to view hidden files/folders on the webUI
	 * @return void
	 */
	public function theUserEnablesTheSettingToViewHiddenFoldersOnTheWebUI() {
		$this->filesPage->enableShowHiddenFilesSettings();
	}
}
