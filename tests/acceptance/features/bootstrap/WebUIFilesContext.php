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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use GuzzleHttp\Exception\GuzzleException;
use Page\ExternalStoragePage;
use Page\FavoritesPage;
use Page\FilesPage;
use Page\FilesPageBasic;
use Page\FilesPageElement\DetailsDialog;
use Page\FilesPageElement\FileRow;
use Page\OwncloudPage;
use Page\SharedByLinkPage;
use Page\SharedWithOthersPage;
use Page\SharedWithYouPage;
use Page\TagsPage;
use Page\TrashbinPage;
use Page\FilesPageElement\ConflictDialog;
use Page\FilesPageElement\FileActionsMenu;
use Page\GeneralExceptionPage;
use PHPUnit\Framework\Assert;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\Asserts\WebDav as WebDavAssert;
use TestHelpers\HttpRequestHelper;
use TestHelpers\UploadHelper;

require_once 'bootstrap.php';

/**
 * WebUI Files context.
 */
class WebUIFilesContext extends RawMinkContext implements Context {

	/**
	 *
	 * @var FilesPage
	 */
	private $filesPage;

	/**
	 *
	 * @var TrashbinPage
	 */
	private $trashbinPage;

	/**
	 *
	 * @var FavoritesPage
	 */
	private $favoritesPage;

	/**
	 *
	 * @var SharedWithYouPage
	 */
	private $sharedWithYouPage;

	/**
	 *
	 * @var SharedByLinkPage
	 */
	private $sharedByLinkPage;

	/**
	 * @var SharedWithOthersPage
	 */
	private $sharedWithOthersPage;

	/**
	 *
	 * @var TagsPage
	 */
	private $tagsPage;

	/**
	 *
	 * @var ConflictDialog
	 */
	private $conflictDialog;

	/**
	 *
	 * @var FileActionsMenu
	 */
	private $openedFileActionMenu;

	/**
	 *
	 * @var ExternalStoragePage
	 */
	private $externalStoragePage;

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
	 * variable to remember with which file we are currently working
	 *
	 * @var string
	 */
	private $currentFile = "";

	/**
	 * variable to remember the path of a received share that has been moved
	 *
	 * @var string
	 */
	private $pathOfMovedReceivedShare = "";

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
	 *
	 * @var GeneralExceptionPage
	 */
	private $generalExceptionPage;

	/**
	 * WebUIFilesContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param TrashbinPage $trashbinPage
	 * @param ConflictDialog $conflictDialog
	 * @param FavoritesPage $favoritesPage
	 * @param SharedWithYouPage $sharedWithYouPage
	 * @param TagsPage $tagsPage
	 * @param SharedByLinkPage $sharedByLinkPage
	 * @param SharedWithOthersPage $sharedWithOthersPage
	 * @param GeneralExceptionPage $generalExceptionPage
	 * @param ExternalStoragePage $externalStoragePage
	 *
	 * @return void
	 */
	public function __construct(
		FilesPage $filesPage,
		TrashbinPage $trashbinPage,
		ConflictDialog $conflictDialog,
		FavoritesPage $favoritesPage,
		SharedWithYouPage $sharedWithYouPage,
		TagsPage $tagsPage,
		SharedByLinkPage $sharedByLinkPage,
		SharedWithOthersPage $sharedWithOthersPage,
		GeneralExceptionPage $generalExceptionPage,
		ExternalStoragePage $externalStoragePage
	) {
		$this->trashbinPage = $trashbinPage;
		$this->filesPage = $filesPage;
		$this->conflictDialog = $conflictDialog;
		$this->favoritesPage = $favoritesPage;
		$this->sharedWithYouPage = $sharedWithYouPage;
		$this->tagsPage = $tagsPage;
		$this->sharedByLinkPage = $sharedByLinkPage;
		$this->sharedWithOthersPage = $sharedWithOthersPage;
		$this->generalExceptionPage = $generalExceptionPage;
		$this->externalStoragePage = $externalStoragePage;
	}

	/**
	 * returns the set page object from WebUIGeneralContext::getCurrentPageObject()
	 * or if that is null the files page object
	 *
	 * @return OwncloudPage
	 */
	private function getCurrentPageObject():?OwncloudPage {
		$pageObject = $this->webUIGeneralContext->getCurrentPageObject();
		if ($pageObject === null) {
			$pageObject = $this->filesPage;
		}
		return $pageObject;
	}

	/**
	 * get the current folder and file path that is being worked on
	 *
	 * @return string
	 */
	private function getCurrentFolderFilePath():string {
		return \rtrim($this->currentFolder, '/') . '/' . $this->currentFile;
	}

	/**
	 * get the new path of a moved received share (if any, it might be an empty string)
	 *
	 * @return string
	 */
	public function getPathOfMovedReceivedShare():string {
		return $this->pathOfMovedReceivedShare;
	}

	/**
	 * reset any context remembered about where we are or what we have done on
	 * the files-like pages
	 *
	 * @return void
	 */
	public function resetFilesContext():void {
		$this->currentFolder = "";
		$this->currentFile = "";
		$this->deletedElementsTable = null;
		$this->movedElementsTable = null;
	}

	/**
	 * @When the user browses to the files page
	 * @Given the user has browsed to the files page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheFilesPage():void {
		$this->theUserBrowsesToThePage($this->filesPage);
	}

	/**
	 * @When the user browses to the home page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheHomePage():void {
		$this->filesPage->browseToHomePage($this->getSession());
	}

	/**
	 * @When the user selects the breadcrumb for folder :folder
	 *
	 * @param string $folderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToFolder(string $folderName):void {
		$this->filesPage->browseToFolder($folderName);
	}

	/**
	 * browses to the specific files page
	 *
	 * @param FilesPageBasic $pageObject
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToThePage(FilesPageBasic $pageObject):void {
		$pageObject->setPagePath(
			$this->webUIGeneralContext->getCurrentServer() .
			$pageObject->getOriginalPath()
		);
		if (!$pageObject->isOpen()) {
			$pageObject->open();
			$pageObject->waitTillPageIsLoaded($this->getSession());
			$this->webUIGeneralContext->setCurrentPageObject($pageObject);
		}
	}

	/**
	 * @When the user browses to the external storage page
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function userBrowsesToTheExternalStoragePage():void {
		$this->theUserBrowsesToThePage($this->externalStoragePage);
	}

	/**
	 * @When the user browses directly to display the :tabName details of file :fileName in folder :folderName
	 * @Given the user has browsed directly to display the :tabName details of file :fileName in folder :folderName
	 *
	 * @param string|null $tabName
	 * @param string $fileName
	 * @param string $folderName
	 * @param boolean $allowToFail
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesDirectlyToDetailsTabOfFileInFolder(
		?string $tabName,
		string $fileName,
		string $folderName,
		bool $allowToFail = false
	):void {
		$this->currentFolder = '/' . \trim($folderName, '/');
		$this->currentFile = $fileName;
		$fileId = $this->featureContext->getFileIdForPath(
			$this->featureContext->getCurrentUser(),
			$this->getCurrentFolderFilePath()
		);
		$this->filesPage->browseToFileId(
			$fileId,
			$this->currentFolder,
			$tabName
		);
		$session = $this->getSession();
		$this->filesPage->waitTillPageIsLoaded($session);
		if ($allowToFail === true) {
			try {
				$this->filesPage->getDetailsDialog()->waitTillPageIsLoaded($session);
			} catch (Exception $e) {
				//ignore it
			}
		} else {
			$this->filesPage->getDetailsDialog()->waitTillPageIsLoaded($session);
		}
	}

	/**
	 * @When the user tries to browse directly to display the :tabName details of file :fileName in folder :folderName
	 *
	 * @param string $tabName
	 * @param string $fileName
	 * @param string $folderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserTriesToBrowseDirectlyToDetailsTabOfFileInFolder(
		string $tabName,
		string $fileName,
		string $folderName
	):void {
		$this->theUserBrowsesDirectlyToDetailsTabOfFileInFolder(
			$tabName,
			$fileName,
			$folderName,
			true
		);
	}

	/**
	 * @Given the user has browsed directly to display the details of file/folder :fileName in folder :folderName
	 * @When the user browses directly to display the details of file/folder :fileName in folder :folderName
	 *
	 * @param string $fileName
	 * @param string $folderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesDirectlyToDetailsDefaultTabOfFileInFolder(string $fileName, string $folderName):void {
		$this->theUserBrowsesDirectlyToDetailsTabOfFileInFolder(null, $fileName, $folderName);
	}

	/**
	 * @Then the thumbnail should be visible in the details panel
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theThumbnailShouldBeVisibleInTheDetailsPanel():void {
		$detailsDialog = $this->filesPage->getDetailsDialog();
		$thumbnail = $detailsDialog->findThumbnail();
		Assert::assertTrue(
			$thumbnail->isVisible(),
			"thumbnail is not visible"
		);
		$style = $thumbnail->getAttribute("style");
		Assert::assertNotNull(
			$style,
			'style attribute of details thumbnail is null'
		);
		Assert::assertStringContainsString(
			$this->getCurrentFolderFilePath(),
			$style,
			__METHOD__
			. " Style attribute of details thumbnail does not contain '"
			. $this->getCurrentFolderFilePath()
			. "'"
		);
	}

	/**
	 * @Then the :tabName details panel should be visible
	 *
	 * @param string $tabName
	 *
	 * @return void
	 */
	public function theTabNameDetailsPanelShouldBeVisible(string $tabName):void {
		$detailsDialog = $this->filesPage->getDetailsDialog();
		Assert::assertTrue(
			$detailsDialog->isDetailsPanelVisible($tabName),
			"the $tabName panel is not visible in the details panel"
		);
	}

	/**
	 * @Then the :tabName details panel should not be visible
	 *
	 * @param string $tabName
	 *
	 * @return void
	 */
	public function theTabNameDetailsPanelShouldNotBeVisible(string $tabName):void {
		$detailsDialog = $this->filesPage->getDetailsDialog();
		Assert::assertFalse(
			$detailsDialog->isDetailsPanelVisible($tabName),
			"the $tabName panel is visible in the details panel but should not be"
		);
	}

	/**
	 * @Then the share-with field should be visible in the details panel
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theShareWithFieldShouldBeVisibleInTheDetailsPanel():void {
		$sharingDialog = $this->filesPage->getSharingDialog();
		Assert::assertTrue(
			$sharingDialog->isShareWithFieldVisible(),
			'the share-with field is not visible in the details panel'
		);
	}

	/**
	 * @Then the share-with field should not be visible in the details panel
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theShareWithFieldShouldNotBeVisibleInTheDetailsPanel():void {
		$sharingDialog = $this->filesPage->getSharingDialog();
		Assert::assertFalse(
			$sharingDialog->isShareWithFieldVisible(),
			'the share-with field is visible in the details panel'
		);
	}

	/**
	 * @When the user browses to the trashbin page
	 * @Given the user has browsed to the trashbin page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheTrashbinPage():void {
		$this->theUserBrowsesToThePage($this->trashbinPage);
	}

	/**
	 * @When the user browses to the favorites page
	 * @Given the user has browsed to the favorites page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheFavoritesPage():void {
		$this->theUserBrowsesToThePage($this->favoritesPage);
	}

	/**
	 * @When the user browses to the shared-with-you page
	 * @Given the user has browsed to the shared-with-you page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheSharedWithYouPage():void {
		$this->theUserBrowsesToThePage($this->sharedWithYouPage);
	}

	/**
	 * @When the user browses to the shared-by-link page
	 * @Given the user has browsed to the shared-by-link page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheSharedByLinkPage():void {
		$this->theUserBrowsesToThePage($this->sharedByLinkPage);
	}

	/**
	 * @When the user browses to the shared-with-others page
	 * @Given the user has browsed to the shared-with-others page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheSharedWithOthersPage():void {
		$this->theUserBrowsesToThePage($this->sharedWithOthersPage);
	}

	/**
	 * @When the user browses to the tags page
	 * @Given the user has browsed to the tags page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBrowsesToTheTagsPage():void {
		$this->theUserBrowsesToThePage($this->tagsPage);
	}

	/**
	 * @When /^the user creates a folder with the (invalid|)\s?name ((?:'[^']*')|(?:"[^"]*")) using the webUI$/
	 * @Given /^the user has created a folder with the (invalid|)\s?name ((?:'[^']*')|(?:"[^"]*")) using the webUI$/
	 *
	 * @param string $invalid contains "invalid"
	 *                        if the folder creation is expected to fail
	 * @param string $name enclosed in single or double quotes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesAFolderUsingTheWebUI(string $invalid, string $name):void {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$name = \trim($name, $name[0]);
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
				|| $e->getMessage() !== "could not create folder '$name'"
			) {
				throw $e;
			}
		}
	}

	/**
	 * @When /^the user creates a folder with the (invalid|)\s?name ((?:'[^']*')|(?:"[^"]*")) using the webUI via create button$/
	 * @Given /^the user has created a folder with the (invalid|)\s?name ((?:'[^']*')|(?:"[^"]*")) using the webUI via create button$/
	 *
	 * @param string $invalid contains "invalid"
	 *                        if the folder creation is expected to fail
	 * @param string $name enclosed in single or double quotes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesAFolderUsingTheWebUIViaCreateButton(string $invalid, string $name):void {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$name = \trim($name, $name[0]);
		try {
			$this->createAFolder($name, true);
			if ($invalid === "invalid") {
				throw new Exception(
					"folder '$name' should not have been created but was"
				);
			}
		} catch (Exception $e) {
			//do not throw the exception if we expect the folder creation to fail
			if ($invalid !== "invalid"
				|| $e->getMessage() !== "could not create folder '$name'"
			) {
				throw $e;
			}
		}
	}

	/**
	 * @param string $name
	 * @param boolean $useCreateButton
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createAFolder(string $name, bool $useCreateButton = false):void {
		$session = $this->getSession();
		$pageObject = $this->getCurrentPageObject();
		$pageObject->createFolder($session, $name, STANDARD_UI_WAIT_TIMEOUT_MILLISEC, $useCreateButton);
		$pageObject->waitTillPageIsLoaded($session);
	}

	/**
	 * @When the user creates a folder with the following name using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesTheFollowingFolderUsingTheWebUI(
		TableNode $namePartsTable
	):void {
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
	public function thereShouldBeNoFilesFoldersListedOnTheWebUI():void {
		$pageObject = $this->getCurrentPageObject();
		Assert::assertEquals(
			0,
			$pageObject->getSizeOfFileFolderList(),
			__METHOD__
			. " Expected no files/folders to be listed on the webUI, but got '"
			. $pageObject->getSizeOfFileFolderList()
			. "' files/folders listed"
		);
	}

	/**
	 * @Then there should be exactly :count files\/folders listed on the webUI
	 * @Then there should be exactly :count file/files listed on the webUI
	 * @Then there should be exactly :count folder/folders listed on the webUI
	 *
	 * @param string $count that is numeric
	 *
	 * @return void
	 */
	public function thereShouldBeCountFilesFoldersListedOnTheWebUI(string $count):void {
		$pageObject = $this->getCurrentPageObject();
		Assert::assertEquals(
			$count,
			$pageObject->getSizeOfFileFolderList(),
			__METHOD__
			. " Exactly '$count' files/folders were expected to be listed on the webUI, but '"
			. $pageObject->getSizeOfFileFolderList()
			. "' files/folders are listed"
		);
	}

	/**
	 * @When the user creates so many files\/folders that they do not fit in one browser page
	 * @Given so many files\/folders have been created that they do not fit in one browser page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theListOfFilesFoldersDoesNotFitInOneBrowserPage():void {
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
		$this->webUIGeneralContext->theUserReloadsTheCurrentPageOfTheWebUI();
	}

	/**
	 * @When the user renames file/folder :fromName to :toName using the webUI
	 *
	 * @param string $fromName
	 * @param string $toName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserRenamesFileFolderToUsingTheWebUI(
		string $fromName,
		string $toName
	):void {
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		$pageObject->renameFile($fromName, $toName, $this->getSession());
	}

	/**
	 * @When the user renames the following file/folder using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the from and to file names
	 *                                  table headings: must be:
	 *                                  |from-name-parts |to-name-parts |
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserRenamesTheFollowingFileFolderToUsingTheWebUI(
		TableNode $namePartsTable
	):void {
		$fromNameParts = [];
		$toNameParts = [];
		$this->featureContext->verifyTableNodeColumns($namePartsTable, ['from-name-parts', 'to-name-parts']);

		foreach ($namePartsTable as $namePartsRow) {
			$fromNameParts[] = $namePartsRow['from-name-parts'];
			$toNameParts[] = $namePartsRow['to-name-parts'];
		}
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		$pageObject->renameFile(
			$fromNameParts,
			$toNameParts,
			$this->getSession()
		);
	}

	/**
	 * @When the user renames file/folder :fromName to one of these names using the webUI
	 *
	 * @param string $fromName
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserRenamesFileToOneOfTheseNamesUsingTheWebUI(
		string $fromName,
		TableNode $table
	):void {
		$this->featureContext->verifyTableNodeColumnsCount($table, 1);
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		foreach ($table->getRows() as $row) {
			$pageObject->renameFile($fromName, $row[0], $this->getSession());
		}
	}

	/**
	 * Delete a file on the current page. The current page should be one that
	 * has rows of files.
	 *
	 * @param string $name
	 * @param bool $expectToDeleteFile if true, then the caller expects that the file can be deleted
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteTheFileUsingTheWebUI(string $name, bool $expectToDeleteFile = true):void {
		$pageObject = $this->getCurrentPageObject();
		$session = $this->getSession();
		$pageObject->waitTillPageIsLoaded($session);
		if ($expectToDeleteFile) {
			$pageObject->deleteFile($name, $session, $expectToDeleteFile);
		} else {
			// We do not expect to be able to delete the file,
			// so do not waste time doing too many retries.
			$pageObject->deleteFile(
				$name,
				$session,
				$expectToDeleteFile,
				MINIMUM_RETRY_COUNT
			);
		}
	}

	/**
	 * for a folder or individual file that is shared, the receiver of the share
	 * has an "Unshare" entry in the file actions menu. Clicking it works just
	 * like delete.
	 *
	 * @When the user deletes/unshares file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserDeletesFileUsingTheWebUI(string $name):void {
		$this->deleteTheFileUsingTheWebUI($name);
	}

	/**
	 * for a folder or individual file that is shared as federated share, the receiver of the share
	 * has an "Unshare" entry in the file actions menu of the share in the
	 * sharedwithme page. Clicking it works just like delete.
	 *
	 * @When the user deletes/unshares file/folder :name received as federated share using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userDeletesFileReceivedAsFederatedShareUsingTheWebUI(string $name):void {
		$pageObject = $this->getCurrentPageObject();
		$session = $this->getSession();
		$pageObject->waitTillPageIsLoaded($session);
		$this->sharedWithYouPage->deleteFileFromSharedWithYou($name, $session);
	}

	/**
	 * @When the user deletes the following file/folder using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserDeletesTheFollowingFileUsingTheWebUI(
		TableNode $namePartsTable
	):void {
		$fileNameParts = [];

		$this->featureContext->verifyTableNodeColumns($namePartsTable, ['name-parts']);
		foreach ($namePartsTable as $namePartsRow) {
			$fileNameParts[] = $namePartsRow['name-parts'];
		}
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		$pageObject->deleteFile($fileNameParts, $this->getSession());
	}

	/**
	 * @When the user deletes the following elements using the webUI
	 *
	 * @param TableNode $table table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserDeletesTheFollowingElementsUsingTheWebUI(
		TableNode $table
	):void {
		$this->featureContext->verifyTableNodeColumns($table, ['name']);
		$this->deletedElementsTable = $table;
		foreach ($this->deletedElementsTable as $file) {
			$this->deleteTheFileUsingTheWebUI($file['name']);
		}
	}

	/**
	 * @When the user moves file/folder :name into folder :destination using the webUI
	 *
	 * @param string|array $name
	 * @param string|array $destination
	 *
	 * @return void
	 */
	public function theUserMovesFileFolderIntoFolderUsingTheWebUI($name, $destination):void {
		$pageObject = $this->getCurrentPageObject();
		$pageObject->moveFileTo($name, $destination, $this->getSession());
	}

	/**
	 * @When the user moves received file/folder :name into folder :destination using the webUI
	 *
	 * @param string|array $name
	 * @param string|array $destination
	 *
	 * @return void
	 */
	public function theUserMovesReceivedFileFolderIntoFolderUsingTheWebUI($name, $destination):void {
		$pageObject = $this->getCurrentPageObject();
		$pageObject->moveFileTo($name, $destination, $this->getSession());
		// A received share has been moved. Remember that this exists as a new share path,
		// so that other steps can be aware of it.
		$this->pathOfMovedReceivedShare = "$destination/$name";
	}

	/**
	 * @When the user moves the following file/folder using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the from and to file names
	 *                                  table headings: must be:
	 *                                  |item-to-move-name-parts |destination-name-parts |
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserMovesTheFollowingFileFolderUsingTheWebUI(
		TableNode $namePartsTable
	):void {
		$itemToMoveNameParts = [];
		$destinationNameParts = [];

		$this->featureContext->verifyTableNodeColumns(
			$namePartsTable,
			['item-to-move-name-parts', 'destination-name-parts']
		);
		foreach ($namePartsTable as $namePartsRow) {
			$itemToMoveNameParts[] = $namePartsRow['item-to-move-name-parts'];
			$destinationNameParts[] = $namePartsRow['destination-name-parts'];
		}
		$this->theUserMovesFileFolderIntoFolderUsingTheWebUI(
			$itemToMoveNameParts,
			$destinationNameParts
		);
	}

	/**
	 * @When the user batch moves these files/folders into folder :folderName using the webUI
	 *
	 * @param string $folderName
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBatchMovesTheseFilesIntoFolderUsingTheWebUI(
		string $folderName,
		TableNode $files
	):void {
		$this->featureContext->verifyTableNodeColumns($files, ['name']);
		$this->theUserMarksTheseFilesForBatchActionUsingTheWebUI($files);
		$firstFileName = $files->getRow(1)[0];
		$this->theUserMovesFileFolderIntoFolderUsingTheWebUI(
			$firstFileName,
			$folderName
		);
		$this->movedElementsTable = $files;
	}

	/**
	 * @When the user uploads overwriting file :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserUploadsOverwritingFileUsingTheWebUI(string $name):void {
		$this->theUserUploadsFileUsingTheWebUI($name);
		$this->choiceInUploadConflictDialogWebUI("new");
		$this->theUserChoosesToInTheUploadDialog("Continue");
	}

	/**
	 * @When the user uploads overwriting file :name using the webUI and retries if the file is locked
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserUploadsOverwritingFileUsingTheWebUIRetry(string $name):void {
		$previousNotificationsCount = 0;

		for ($retryCounter = 0;
			 $retryCounter < STANDARD_RETRY_COUNT;
			 $retryCounter++) {
			$this->theUserUploadsOverwritingFileUsingTheWebUI($name);

			try {
				$notifications = $this->getCurrentPageObject()->getNotifications();
			} catch (ElementNotFoundException $e) {
				$notifications = [];
			}

			$currentNotificationsCount = \count($notifications);

			if ($currentNotificationsCount > $previousNotificationsCount) {
				$message
					= "Upload overwriting $name" .
					" and got $currentNotificationsCount" .
					" notifications including " .
					\end($notifications) . "\n";
				echo $message;
				\error_log($message);
				$previousNotificationsCount = $currentNotificationsCount;
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			} else {
				break;
			}
		}

		if ($retryCounter > 0) {
			$message
				= "INFORMATION: retried to upload overwriting file $name $retryCounter times";
			echo $message;
			\error_log($message);
		}
	}

	/**
	 * @When the user uploads file :name keeping both new and existing files using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserUploadsFileKeepingNewExistingUsingTheWebUI(string $name):void {
		$this->theUserUploadsFileUsingTheWebUI($name);
		$this->choiceInUploadConflictDialogWebUI("new");
		$this->choiceInUploadConflictDialogWebUI("existing");
		$this->theUserChoosesToInTheUploadDialog("Continue");
	}

	/**
	 * @When the user uploads file :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserUploadsFileUsingTheWebUI(string $name):void {
		$this->getCurrentPageObject()->uploadFile($this->getSession(), $name);
	}

	/**
	 * @Then the following elements should be listed as uploaded items on the webUI:
	 *
	 * @param TableNode $table list of expected uploaded elements to be visible on the webUI
	 * 						   the heading of the table is required to be "uploaded-elements"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingElementsShouldBeListedAsUploadedFilesOnTheWebUI(TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ["uploaded-elements"]);
		$expectedElements = [];
		foreach ($table as $row) {
			\array_push($expectedElements, $row["uploaded-elements"]);
		}
		$pageObject = $this->getCurrentPageObject();
		$currentUploadedElements = $pageObject->getCompletelyUploadedElements();
		Assert::assertEqualsCanonicalizing(
			$expectedElements,
			$currentUploadedElements,
			__METHOD__
			. " The elements expected to be listed as uploaded items on the webUI do not equal the uploaded elements visible on the webUI"
			. "See the differences below:"
		);
	}

	/**
	 * @When /^the user chooses to keep the (new|existing) files in the upload dialog$/
	 *
	 * @param string $choice
	 *
	 * @return void
	 * @throws Exception
	 */
	public function choiceInUploadConflictDialogWebUI(string $choice):void {
		$dialogs = $this->getCurrentPageObject()->getOcDialogs();
		$isConflictDialog = false;
		foreach ($dialogs as $dialog) {
			$isConflictDialog = \strstr(
				$dialog->getTitle(),
				$this->uploadConflictDialogTitle
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
	public function theUserChoosesToInTheUploadDialog(string $label):void {
		$pageObject = $this->getCurrentPageObject();
		$dialogs = $pageObject->getOcDialogs();
		$dialog = \end($dialogs);
		$this->conflictDialog->setElement($dialog->getOwnElement());
		$this->conflictDialog->clickButton($this->getSession(), $label);
		$pageObject->waitForUploadProgressbarToFinish();
	}

	/**
	 * @When the user uploads file :name :number_of times using webUI
	 *
	 * @param string $name
	 * @param int $number_of
	 *
	 * @return void
	 */
	public function theUserClicksUploadAndCancelMultipleTimes(string $name, int $number_of):void {
		for ($i = 0; $i < $number_of; $i++) {
			$this->theUserUploadsFileUsingTheWebUI($name);
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
		}
	}

	/**
	 * @Then /^the (?:deleted|moved) elements should (not|)\s?be listed on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDeletedMovedElementsShouldBeListedOnTheWebUI(string $shouldOrNot):void {
		if ($this->deletedElementsTable !== null) {
			foreach ($this->deletedElementsTable as $file) {
				$this->checkIfFileFolderIsListedOnTheWebUI(
					$file['name'],
					$shouldOrNot
				);
			}
		}
		if ($this->movedElementsTable !== null) {
			foreach ($this->movedElementsTable as $file) {
				$this->checkIfFileFolderIsListedOnTheWebUI(
					$file['name'],
					$shouldOrNot
				);
			}
		}
	}

	/**
	 * @Then /^the (?:deleted|moved) elements should (not|)\s?be listed on the webUI after a page reload$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDeletedMovedElementsShouldBeListedOnTheWebUIAfterPageReload(
		string $shouldOrNot
	):void {
		$this->webUIGeneralContext->theUserReloadsTheCurrentPageOfTheWebUI();
		$this->theDeletedMovedElementsShouldBeListedOnTheWebUI($shouldOrNot);
	}

	/**
	 * @When the user opens the sharing tab from the file action menu of file/folder :entryName using the webUI
	 *
	 * @param string $entryName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserOpensTheSharingTabFromTheActionMenuOfFileUsingTheWebui(string $entryName):void {
		$this->theUserOpensTheFileActionMenuOfFileFolderOnTheWebui($entryName);
		$this->theUserClicksTheFileActionOnTheWebui("details");
		$this->theUserSwitchesToTabInDetailsPanelUsingTheWebui("sharing");
		$this->filesPage->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * @Then the deleted elements should be listed in the trashbin on the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDeletedElementsShouldBeListedInTheTrashbinOnTheWebUI():void {
		$this->theUserBrowsesToTheTrashbinPage();

		foreach ($this->deletedElementsTable as $file) {
			$this->checkIfFileFolderIsListedOnTheWebUI(
				$file['name'],
				"",
				"trashbin"
			);
		}
	}

	/**
	 * @Then /^(?:file|folder) ((?:'[^']*')|(?:"[^"]*")) with path ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed\s?(?:in the |)(files page|trashbin|favorites page|shared-with-you page|shared with others page|tags page|)\s?(?:folder ((?:'[^']*')|(?:"[^"]*")))? on the webUI$/
	 *
	 * @param string $name enclosed in single or double quotes
	 * @param string $path
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileFolderWithPathShouldBeListedOnTheWebUI(
		string $name,
		string $path,
		string $shouldOrNot,
		string $typeOfFilesPage = "",
		string $folder = ""
	):void {
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($folder !== "") {
			$folder = \trim($folder, $folder[0]);
		}
		$path = \trim($path, $path[0]);
		$this->checkIfFileFolderIsListedOnTheWebUI(
			\trim($name, $name[0]),
			$shouldOrNot,
			$typeOfFilesPage,
			$folder,
			$path
		);
	}

	/**
	 * @When the user batch deletes these files using the webUI
	 *
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserBatchDeletesTheseFilesUsingTheWebUI(TableNode $files):void {
		$this->deletedElementsTable = $files;
		$this->theUserMarksTheseFilesForBatchActionUsingTheWebUI($files);
		$this->theUserBatchDeletesTheMarkedFilesUsingTheWebUI();
	}

	/**
	 * @When the user batch deletes the marked files using the webUI
	 *
	 * @return void
	 */
	public function theUserBatchDeletesTheMarkedFilesUsingTheWebUI():void {
		$pageObject = $this->getCurrentPageObject();
		$pageObject->deleteAllSelectedFiles($this->getSession());
	}

	/**
	 * @When the user batch restores the marked files using the webUI
	 *
	 * @return void
	 */
	public function theUserBatchRestoresTheMarkedFilesUsingTheWebUI():void {
		$this->trashbinPage->restoreAllSelectedFiles($this->getSession());
	}

	/**
	 * mark a set of files ready for them to be included in a batch action
	 * if any of the files are already marked, then they will be unmarked
	 *
	 * @When the user marks/unmarks these files for batch action using the webUI
	 * @Given the user has marked/unmarked these files for batch action using the webUI
	 *
	 * @param TableNode $files table of file names
	 *                         table headings: must be: |name|
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserMarksTheseFilesForBatchActionUsingTheWebUI(
		TableNode $files
	):void {
		$this->featureContext->verifyTableNodeColumns($files, ['name']);
		$pageObject = $this->getCurrentPageObject();
		$session = $this->getSession();
		$pageObject->waitTillPageIsLoaded($session);
		foreach ($files as $file) {
			$pageObject->selectFileForBatchAction(
				$file['name'],
				$session
			);
		}
	}

	/**
	 * @When the user marks all files for batch action using the webUI
	 * @Given the user has selected all files for batch action using the webUI
	 *
	 * @return void
	 */
	public function theUserMarksAllFilesForBatchActionUsingTheWebUI():void {
		$pageObject = $this->getCurrentPageObject();
		$pageObject->selectAllFilesForBatchAction();
	}

	/**
	 * @When the user opens folder with the following name using the webUI
	 *
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserOpensFolderWithFollowingNamePartsUsingTheWebUI(TableNode $namePartsTable):void {
		$fileName = '';
		foreach ($namePartsTable as $namePartsRow) {
			$fileName .= $namePartsRow['name-parts'];
		}
		$this->theUserOpensTheFileOrFolderUsingTheWebUI(
			null,
			'folder',
			$fileName
		);
	}

	/**
	 * @When /^the user opens (trashbin|external-storage|)\s?(file|folder) ((?:'[^']*')|(?:"[^"]*")) (expecting to fail|)\s?using the webUI$/
	 * @Given /^the user has opened (trashbin|external-storage|)\s?(file|folder) ((?:'[^']*')|(?:"[^"]*")) (expecting to fail|)\s?using the webUI$/
	 *
	 * @param string $typeOfFilesPage
	 * @param string $fileOrFolder
	 * @param string $name enclosed in single or double quotes
	 * @param string $expectToFail
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserOpensFolderNamedUsingTheWebUI(
		string $typeOfFilesPage,
		string $fileOrFolder,
		string $name,
		string $expectToFail
	):void {
		$expectToFail = $expectToFail !== "";
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		$this->theUserOpensTheFileOrFolderUsingTheWebUI(
			$typeOfFilesPage,
			$fileOrFolder,
			\trim($name, $name[0]),
			$expectToFail
		);
	}

	/**
	 * Open a file or folder in the current folder, or in a path down from the
	 * current folder.
	 *
	 * @param string|null $typeOfFilesPage
	 * @param string $fileOrFolder "file" or "folder" - the type of the final item
	 *                             to open
	 * @param string|array $relativePath the path from the currently open folder
	 *                                   down to and including the file or folder
	 *                                   to open
	 * @param boolean $expectToFail
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserOpensTheFileOrFolderUsingTheWebUI(
		?string $typeOfFilesPage,
		string $fileOrFolder,
		$relativePath,
		bool $expectToFail = false
	):void {
		if ($typeOfFilesPage === "trashbin") {
			$this->theUserBrowsesToTheTrashbinPage();
		}

		$pageObject = $this->getCurrentPageObject();

		if (\is_array($relativePath)) {
			// Store the single full concatenated file or folder name.
			$breadCrumbs[] = \implode('', $relativePath);
			// The passed-in path is itself an array of pieces of a single file
			// or folder name. That is done when the file or folder name contains
			// both single and double quotes. The pieces of the file or folder
			// name need to be passed through to openFile still in array form.
			$breadCrumbsForOpenFile[] = $relativePath;
		} else {
			// The passed-in path is a single string representing the path to
			// the item to be opened. Each folder along the way is delimited
			// by "/". Explode it into an array of items to be opened.
			$breadCrumbs = \explode('/', \ltrim($relativePath, '/'));
			$breadCrumbsForOpenFile = $breadCrumbs;
		}
		$failed = false;
		foreach ($breadCrumbsForOpenFile as $breadCrumb) {
			$pageObject->openFile($breadCrumb, $this->getSession());
			if ($typeOfFilesPage === "external-storage") {
				$this->webUIGeneralContext->setCurrentPageObject($this->filesPage);
				$pageObject = $this->getCurrentPageObject();
			}
			try {
				$pageObject->waitTillPageIsLoaded($this->getSession());
			} catch (Exception $e) {
				// The file was not opened correctly as the page didn't load correctly
				$failed = true;
				break;
			}
		}
		// Check the status of file opened according to the expected result.
		if ($failed) {
			// The task was not expected to fail but failed.
			if (!$expectToFail) {
				throw new Exception('The file was expected to open successfully but failed!');
			}
		} else {
			// The task was expected to fail but didn't fail.
			if ($expectToFail) {
				throw new Exception('The file was not expected to open successfully but was opened!');
			}

			// The task was not expected to fail and was successful.
			if ($fileOrFolder !== "folder") {
				// Pop the file name off the end of the array of breadcrumbs
				\array_pop($breadCrumbs);
			}
			if (\count($breadCrumbs)) {
				$this->currentFolder .= "/" . \implode('/', $breadCrumbs);
			};
		}
	}

	/**
	 * @Then /^the folder should (not|)\s?be empty on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function theFolderShouldBeEmptyOnTheWebUI(string $shouldOrNot):void {
		$should = ($shouldOrNot !== "not");
		$pageObject = $this->getCurrentPageObject();
		$folderIsEmpty = $pageObject->isFolderEmpty($this->getSession());

		if ($should) {
			Assert::assertTrue(
				$folderIsEmpty,
				"folder contains items but should be empty"
			);
		} else {
			Assert::assertFalse(
				$folderIsEmpty,
				"folder is empty but should contain items"
			);
		}
	}

	/**
	 * @Then /^the folder should (not|)\s?be empty on the webUI after a page reload$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFolderShouldBeEmptyOnTheWebUIAfterAPageReload(string $shouldOrNot):void {
		$this->webUIGeneralContext->theUserReloadsTheCurrentPageOfTheWebUI();
		$this->theFolderShouldBeEmptyOnTheWebUI($shouldOrNot);
	}

	/**
	 * @Then /^(?:file|folder) ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed\s?(?:in the |in |)(files page|trashbin|favorites page|shared-with-you page|shared-with-others page|)\s?(?:folder ((?:'[^']*')|(?:"[^"]*")))? on the webUI$/
	 *
	 * @param string $name enclosed in single or double quotes
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileFolderShouldBeListedOnTheWebUI(
		string $name,
		string $shouldOrNot,
		string $typeOfFilesPage = "",
		string $folder = ""
	):void {
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($folder !== "") {
			$folder = \trim($folder, $folder[0]);
		}

		$this->checkIfFileFolderIsListedOnTheWebUI(
			\trim($name, $name[0]),
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
	 * @param string $path if set, name and path (shown on the webUI) of the file to match
	 * @param FilesPageBasic $pageObject if not null use this pageObject and ignore $typeOfFilesPage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkIfFileFolderIsListedOnTheWebUI(
		$name,
		string $shouldOrNot,
		string $typeOfFilesPage = "",
		string $folder = "",
		string $path = "",
		FilesPageBasic $pageObject = null
	) {
		$should = ($shouldOrNot !== "not");
		$exceptionMessage = null;
		switch ($typeOfFilesPage) {
			case "files page":
				$this->theUserBrowsesToThePage($this->filesPage);
				break;
			case "trashbin":
				$this->theUserBrowsesToThePage($this->trashbinPage);
				break;
			case "favorites page":
				$this->theUserBrowsesToThePage($this->favoritesPage);
				break;
			case "shared-with-you page":
				$this->theUserBrowsesToThePage($this->sharedWithYouPage);
				break;
			case "shared-by-link page":
				$this->theUserBrowsesToThePage($this->sharedByLinkPage);
				break;
			case "shared with others page":
			case "shared-with-others page":
				$this->theUserBrowsesToThePage($this->sharedWithOthersPage);
				break;
			case "tags page":
				break;
			case "search results page":
				//nothing to do here, we cannot navigate to that page, except by performing a search
				break;
		}
		/**
		 *
		 * @var FilesPageBasic $pageObject
		 */
		if ($pageObject === null) {
			$pageObject = $this->getCurrentPageObject();
		} else {
			$this->theUserBrowsesToThePage($pageObject);
		}
		$pageObject->waitTillPageIsLoaded($this->getSession());
		if ($folder !== "") {
			$this->theUserOpensTheFileOrFolderUsingTheWebUI(
				$typeOfFilesPage,
				"folder",
				$folder
			);
		}

		try {
			if ($path === "") {
				/**
				 *
				 * @var FileRow $fileRow
				 */
				$fileRow = $pageObject->findFileRowByName(
					$name,
					$this->getSession()
				);
			} else {
				/**
				 *
				 * @var FileRow $fileRow
				 */
				$fileRow = $pageObject->findFileRowByNameAndPath(
					$name,
					$path,
					$this->getSession()
				);
			}
			$exceptionMessage = '';
		} catch (ElementNotFoundException $e) {
			$exceptionMessage = $e->getMessage();
			$fileRow = null;
		}

		if (\is_array($name)) {
			$nameText = \implode('', $name);
		} else {
			$nameText = $name;
		}

		$fileLocationText = " file '$nameText'";

		if ($path !== "") {
			$fileLocationText .= " with path '$path'";
		}

		if ($folder !== "") {
			$fileLocationText .= " in folder '$folder'";
		} else {
			$fileLocationText .= " in current folder";
		}

		if ($typeOfFilesPage !== "") {
			$fileLocationText .= " in $typeOfFilesPage";
		}

		if ($should) {
			Assert::assertNotNull(
				$fileRow,
				"could not find $fileLocationText when it should be listed"
			);
			Assert::assertTrue(
				$fileRow->isVisible(),
				"file row of $fileLocationText is not visible but should"
			);
		} else {
			if (\is_array($name)) {
				$name = \implode('', $name);
			}
			if ($fileRow === null) {
				Assert::assertStringContainsString(
					"could not find file with the name '$name'",
					$exceptionMessage,
					"found $fileLocationText when it should not be listed"
				);
			} else {
				Assert::assertFalse(
					$fileRow->isVisible(),
					"file row of $fileLocationText is visible but should not"
				);
			}
		}
	}

	/**
	 * @Then /^the moved elements should (not|)\s?be listed in folder ['"](.*)['"] on the webUI$/
	 *
	 * @param string $shouldOrNot
	 * @param string $folderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theMovedElementsShouldBeListedInFolderOnTheWebUI(
		string $shouldOrNot,
		string $folderName
	):void {
		$this->theUserOpensTheFileOrFolderUsingTheWebUI("", "folder", $folderName);
		$this->getCurrentPageObject()->waitTillPageIsLoaded($this->getSession());
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
	 * @throws Exception
	 */
	public function theFollowingFileFolderShouldBeListedInTheFollowingFolderOnTheWebUI(
		string $shouldOrNot,
		TableNode $namePartsTable
	):void {
		$toBeListedTableArray[] = ["name-parts"];
		$folderNameParts = [];
		$this->featureContext->verifyTableNodeColumns(
			$namePartsTable,
			['folder-name-parts', 'item-name-parts']
		);
		foreach ($namePartsTable as $namePartsRow) {
			$folderNameParts[] = $namePartsRow['folder-name-parts'];
			$toBeListedTableArray[] = [$namePartsRow['item-name-parts']];
		}
		$this->theUserOpensTheFileOrFolderUsingTheWebUI("", "folder", $folderNameParts);
		$this->getCurrentPageObject()->waitTillPageIsLoaded($this->getSession());

		$toBeListedTable = new TableNode($toBeListedTableArray);
		$this->theFollowingFileFolderShouldBeListedOnTheWebUI(
			$shouldOrNot,
			"",
			"",
			$toBeListedTable
		);
	}

	/**
	 * @Then /^the following (?:file|folder) should (not|)\s?be listed\s?(?:in the |)(files page|trashbin|favorites page|shared-with-you page|external-storage page|)\s?(?:folder ((?:'[^']*')|(?:"[^"]*")))? on the webUI$/
	 *
	 * @param string $shouldOrNot
	 * @param string $typeOfFilesPage
	 * @param string $folder
	 * @param TableNode $namePartsTable table of parts of the file name
	 *                                  table headings: must be: |name-parts |
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingFileFolderShouldBeListedOnTheWebUI(
		string $shouldOrNot,
		string $typeOfFilesPage,
		string $folder = "",
		TableNode $namePartsTable = null
	):void {
		$fileNameParts = [];

		$this->featureContext->verifyTableNodeColumns($namePartsTable, ['name-parts']);
		if ($namePartsTable !== null) {
			foreach ($namePartsTable as $namePartsRow) {
				$fileNameParts[] = $namePartsRow['name-parts'];
			}
		} else {
			Assert::fail(
				'no table of file name parts passed to theFollowingFileFolderShouldBeListed'
			);
		}
		// The capturing groups of the regex include the quotes at each
		// end of the captured string, so trim them.
		if ($folder !== "") {
			$folder = \trim($folder, $folder[0]);
		}

		$this->checkIfFileFolderIsListedOnTheWebUI(
			$fileNameParts,
			$shouldOrNot,
			$typeOfFilesPage,
			$folder
		);
	}

	/**
	 * @Then near file/folder :name a tooltip with the text :toolTipText should be displayed on the webUI
	 *
	 * @param string $name
	 * @param string $toolTipText
	 *
	 * @return void
	 */
	public function nearFileATooltipWithTheTextShouldBeDisplayedOnTheWebUI(
		string $name,
		string $toolTipText
	):void {
		Assert::assertEquals(
			$toolTipText,
			$this->getCurrentPageObject()->getTooltipOfFile($name, $this->getSession()),
			__METHOD__
			. " The tooltip text expected to be displayed near '$name' was '$toolTipText', but actually got '"
			. $this->getCurrentPageObject()->getTooltipOfFile($name, $this->getSession())
			. "' instead."
		);
	}

	/**
	 * @When the user restores file/folder :fname from the trashbin using the webUI
	 * @Given the user has restored file/folder :fname from the trashbin using the webUI
	 *
	 * @param string $fname
	 *
	 * @return void
	 */
	public function theUserRestoresFileFolderFromTheTrashbinUsingTheWebUI(string $fname):void {
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
	public function folderInputFieldTooltipTextShouldBeDisplayedOnTheWebUI(
		string $tooltiptext
	):void {
		$createFolderTooltip = $this->getCurrentPageObject()->getCreateFolderTooltip();
		Assert::assertSame(
			$tooltiptext,
			$createFolderTooltip,
			" The tooltip text expected to be displayed near the folder input field was '$tooltiptext', "
			. "but actually got '$createFolderTooltip' instead"
		);
	}

	/**
	 * @Then it should not be possible to delete file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function itShouldNotBePossibleToDeleteFileFolderUsingTheWebUI(string $name):void {
		try {
			$this->deleteTheFileUsingTheWebUI($name, false);
		} catch (ElementNotFoundException $e) {
			Assert::assertStringContainsString(
				"could not find button 'Delete' in action Menu",
				$e->getMessage(),
				__METHOD__
				. " Expected 'could not find button 'Delete' in action Menu' to be contained in '"
				. $e->getMessage()
				. "'"
			);
		}
	}

	/**
	 * @Then it should be possible to delete file/folder :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function itShouldBePossibleToDeleteFileFolderUsingTheWebUI(string $name):void {
		$this->deleteTheFileUsingTheWebUI($name, true);
	}

	/**
	 * @Then /^the option to (delete|rename|download|lock)\s?(?:file|folder) "([^"]*)" should (not|)\s?be available on the webUI$/
	 *
	 * @param string $action
	 * @param string $name
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function optionShouldNotBeAvailable(string $action, string $name, string $shouldOrNot):void {
		$visible = $shouldOrNot !== "not";
		$pageObject = $this->getCurrentPageObject();
		$session = $this->getSession();
		$pageObject->waitTillPageIsLoaded($session);
		$fileRow = $pageObject->findFileRowByName($name, $session);
		if ($action !== 'lock') {
			$action = \ucfirst($action);
		}
		if ($visible) {
			Assert::assertTrue(
				$fileRow->isActionLabelAvailable($action, $session),
				__METHOD__
				. " The option to '$action' label is not available on the webUI, but was expected to be present."
			);
		} else {
			Assert::assertFalse(
				$fileRow->isActionLabelAvailable($action, $session),
				__METHOD__
				. " The option to '$action' label is available on the webUI, but was not expected to be present."
			);
		}
		$fileRow->clickFileActionButton();
	}

	/**
	 * @Then /^the option to upload file should (not|)\s?be available on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function uploadButtonShouldNotBeVisible(string $shouldOrNot):void {
		$visible = $shouldOrNot !== "not";
		if ($visible) {
			Assert::assertTrue(
				$this->getCurrentPageObject()->isUploadButtonAvailable(),
				__METHOD__
				. " The option to upload file is not available on the webUI, but was expected to be present."
			);
		} else {
			Assert::assertFalse(
				$this->getCurrentPageObject()->isUploadButtonAvailable(),
				__METHOD__
				. " The option to upload file is available on the webUI, but was not expected to be present."
			);
		}
	}

	/**
	 * @Then the files action menu should be completely visible after opening it using the webUI
	 *
	 * @return void
	 */
	public function theFilesActionMenuShouldBeCompletelyVisibleAfterOpeningItUsingTheWebUI():void {
		for ($i = 1; $i <= $this->filesPage->getSizeOfFileFolderList(); $i++) {
			// wait for the actions menu to be closed if is open already
			$this->waitTillFileActionsMenuIsClosed();

			$actionMenu = $this->filesPage->openFileActionsMenuByNo(
				$i,
				$this->getSession()
			);

			$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC;
			$currentTime = \microtime(true);
			$end = $currentTime + ($timeout_msec / 1000);
			$windowHeight = 0;
			$deleteBtnCoordinates = 0;
			while ($currentTime <= $end) {
				$windowHeight = $this->filesPage->getWindowHeight(
					$this->getSession()
				);

				$deleteBtn = $actionMenu->findButton(
					$actionMenu->getDeleteActionLabel()
				);
				$deleteBtnCoordinates = $this->filesPage->getCoordinatesOfElement(
					$this->getSession(),
					$deleteBtn
				);
				if ($windowHeight >= $deleteBtnCoordinates ["top"]) {
					break;
				}
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
				$currentTime = \microtime(true);
			}

			Assert::assertLessThanOrEqual(
				$windowHeight,
				$deleteBtnCoordinates ["top"],
				__METHOD__
				. " The delete button coordinates on the top is '{$deleteBtnCoordinates['top']}' "
				. "which is greater than the window height '$windowHeight'"
			);
			//this will close the menu again
			$this->filesPage->clickFileActionsMenuBtnByNo($i);
		}
	}

	/**
	 * waits upto standard ui wait timeout for the file actions menu to be closed
	 *
	 * @return void
	 */
	public function waitTillFileActionsMenuIsClosed(): void {
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC;
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if (!$this->filesPage->isFileActionsMenuOpen()) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}
	}

	/**
	 * @Then /^the content of ((?:'[^']*')|(?:"[^"]*")) (on the remote server|on the local server|)\s?should (not|)\s?be the same as the original ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $remoteFile enclosed in single or double quotes
	 * @param string $remoteServer
	 * @param string $shouldOrNot
	 * @param string $originalFile enclosed in single or double quotes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theContentOfShouldBeTheSameAsTheOriginal(
		string $remoteFile,
		string $remoteServer,
		string $shouldOrNot,
		string $originalFile
	):void {
		$checkOnRemoteServer = ($remoteServer === 'on the remote server');
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$remoteFile = $this->currentFolder . "/" . \trim($remoteFile, $remoteFile[0]);
		$originalFile = \trim($originalFile, $originalFile[0]);

		$shouldBeSame = ($shouldOrNot !== "not");
		$this->assertContentOfDAVFileAndSkeletonFileOnSUT(
			$remoteFile,
			$originalFile,
			$shouldBeSame,
			$checkOnRemoteServer
		);
	}

	/**
	 * @Then /^the content of ((?:'[^']*')|(?:"[^"]*")) (on the remote server|on the local server|)\s?should (not|)\s?be the same as the local ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $remoteFile enclosed in single or double quotes
	 * @param string $remoteServer
	 * @param string $shouldOrNot
	 * @param string $localFile enclosed in single or double quotes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theContentOfShouldBeTheSameAsTheLocal(
		string $remoteFile,
		string $remoteServer,
		string $shouldOrNot,
		string $localFile
	):void {
		$checkOnRemoteServer = ($remoteServer === 'on the remote server');
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$remoteFile = $this->currentFolder . "/" . \trim($remoteFile, $remoteFile[0]);
		$localFile = UploadHelper::getUploadFilesDir(\trim($localFile, $localFile[0]));
		$shouldBeSame = ($shouldOrNot !== "not");
		$this->assertContentOfRemoteAndLocalFileIsSame(
			$remoteFile,
			$localFile,
			$shouldBeSame,
			$checkOnRemoteServer
		);
	}

	/**
	 * @Then /^the content of "([^"]*)" (on the remote server|on the local server|)\s?for user "([^"]*)" should (not|)\s?be the same as the local "([^"]*)"$/
	 *
	 * @param string $remoteFile enclosed in single or double quotes
	 * @param string $remoteServer
	 * @param string $user
	 * @param string $shouldOrNot
	 * @param string $localFile enclosed in single or double quotes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theContentOfFileForUserShouldBeTheSameAsTheLocal(
		string $remoteFile,
		string $remoteServer,
		string $user,
		string $shouldOrNot,
		string $localFile
	):void {
		$checkOnRemoteServer = ($remoteServer === 'on the remote server');
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$localFile = UploadHelper::getUploadFilesDir(\trim($localFile));
		$shouldBeSame = ($shouldOrNot !== "not");
		$this->assertContentOfRemoteAndLocalFileIsSameForUser(
			$remoteFile,
			$localFile,
			$user,
			$shouldBeSame,
			$checkOnRemoteServer
		);
	}

	/**
	 * @Then /^the content of ((?:'[^']*')|(?:"[^"]*")) (on the remote server|on the local server|)\s?should not have changed$/
	 *
	 * @param string $fileName
	 * @param string $remoteServer
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theContentOfShouldNotHaveChanged(string $fileName, string $remoteServer):void {
		$checkOnRemoteServer = ($remoteServer === 'on the remote server');
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$fileName = \trim($fileName, $fileName[0]);
		$remoteFile = "$this->currentFolder/$fileName";
		if ($this->currentFolder !== "") {
			$subFolderPath = "$this->currentFolder/";
		} else {
			$subFolderPath = "";
		}
		$localFile = "$subFolderPath$fileName";
		$this->assertContentOfDAVFileAndSkeletonFileOnSUT(
			$remoteFile,
			$localFile,
			true,
			$checkOnRemoteServer
		);
	}

	/**
	 * @When the user marks file/folder :fileOrFolderName as favorite using the webUI
	 * @Given the user has marked file/folder :fileOrFolderName as favorite using the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserMarksFileAsFavoriteUsingTheWebUI(string $fileOrFolderName):void {
		$fileRow = $this->filesPage->findFileRowByName(
			$fileOrFolderName,
			$this->getSession()
		);
		$fileRow->markAsFavorite();
		$this->filesPage->waitTillFileRowsAreReady($this->getSession());
	}

	/**
	 * @Then file/folder :fileOrFolderName should be marked as favorite on the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileFolderShouldBeMarkedAsFavoriteOnTheWebUI(string $fileOrFolderName):void {
		$fileRow = $this->filesPage->findFileRowByName(
			$fileOrFolderName,
			$this->getSession()
		);
		Assert::assertTrue(
			$fileRow->isMarkedAsFavorite(),
			__METHOD__
			. " The file $fileOrFolderName is not marked as favorite but was expected to be"
		);
	}

	/**
	 * @When the user unmarks the favorited file/folder :fileOrFolderName using the webUI
	 * @Given the user has unmarked the favorited file/folder :fileOrFolderName using the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 */
	public function theUserUnmarksTheFavoritedFileUsingTheWebUI(string $fileOrFolderName):void {
		$fileRow = $this->getCurrentPageObject()->findFileRowByName(
			$fileOrFolderName,
			$this->getSession()
		);
		$fileRow->unmarkFavorite();
		$this->getCurrentPageObject()->waitTillFileRowsAreReady($this->getSession());
	}

	/**
	 * @Then file/folder :fileOrFolderName should not be marked as favorite on the webUI
	 *
	 * @param string $fileOrFolderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileFolderShouldNotBeMarkedAsFavoriteOnTheWebUI(
		string $fileOrFolderName
	):void {
		$fileRow = $this->filesPage->findFileRowByName(
			$fileOrFolderName,
			$this->getSession()
		);
		Assert::assertFalse(
			$fileRow->isMarkedAsFavorite(),
			__METHOD__
			. " The file $fileOrFolderName is marked as favorite but was not expected to be"
		);
	}

	/**
	 * @param string $remoteFile
	 * @param string $localFile
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 * @param bool $checkOnRemoteServer if true, then use the remote server to download the file
	 *
	 * @return void
	 * @throws Exception
	 * @see WebDavAssert::assertContentOfRemoteAndLocalFileIsSame
	 * uses the current user to download the remote file
	 *
	 */
	private function assertContentOfRemoteAndLocalFileIsSame(
		string $remoteFile,
		string $localFile,
		bool $shouldBeSame = true,
		bool $checkOnRemoteServer = false
	):void {
		$this->assertContentOfRemoteAndLocalFileIsSameForUser(
			$remoteFile,
			$localFile,
			$this->featureContext->getCurrentUser(),
			$shouldBeSame,
			$checkOnRemoteServer
		);
	}

	/**
	 * @param string $remoteFile
	 * @param string $localFile
	 * @param string $user
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 * @param bool $checkOnRemoteServer if true, then use the remote server to download the file
	 *
	 * @return void
	 * @throws Exception
	 * @see WebDavAssert::assertContentOfRemoteAndLocalFileIsSame
	 * uses the current user to download the remote file
	 *
	 */
	private function assertContentOfRemoteAndLocalFileIsSameForUser(
		string $remoteFile,
		string $localFile,
		string $user,
		bool $shouldBeSame = true,
		bool $checkOnRemoteServer = false
	):void {
		$user = $this->featureContext->getActualUsername($user);
		if ($checkOnRemoteServer) {
			$baseUrl = $this->featureContext->getRemoteBaseUrl();
		} else {
			$baseUrl = $this->featureContext->getLocalBaseUrl();
		}

		WebDavAssert::assertContentOfRemoteAndLocalFileIsSame(
			$baseUrl,
			$user,
			$this->featureContext->getUserPassword($user),
			$remoteFile,
			$localFile,
			$this->featureContext->getStepLineRef(),
			$shouldBeSame
		);
	}

	/**
	 * @param string $remoteFile
	 * @param string $fileInSkeletonFolder
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 * @param bool $checkOnRemoteServer if true, then use the remote server to download the file
	 *
	 * @return void
	 * @throws Exception
	 * @see WebDavAssert::assertContentOfDAVFileAndSkeletonFileOnSUT
	 * uses the current user to download the remote file
	 *
	 */
	private function assertContentOfDAVFileAndSkeletonFileOnSUT(
		string $remoteFile,
		string $fileInSkeletonFolder,
		bool $shouldBeSame = true,
		bool $checkOnRemoteServer = false
	):void {
		if ($checkOnRemoteServer) {
			$baseUrl = $this->featureContext->getRemoteBaseUrl();
		} else {
			$baseUrl = $this->featureContext->getLocalBaseUrl();
		}

		$username = $this->featureContext->getCurrentUser();
		WebDavAssert::assertContentOfDAVFileAndSkeletonFileOnSUT(
			$baseUrl,
			$username,
			$this->featureContext->getUserPassword($username),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$remoteFile,
			$fileInSkeletonFolder,
			$this->featureContext->getStepLineRef(),
			$shouldBeSame
		);
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
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}

	/**
	 * @When the user enables the setting to view hidden files/folders on the webUI
	 * @Given the user has enabled the setting to view hidden files/folders on the webUI
	 * @return void
	 * @throws Exception
	 */
	public function theUserEnablesTheSettingToViewHiddenFoldersOnTheWebUI() {
		$this->filesPage->enableShowHiddenFilesSettings();
	}

	/**
	 * @When the user opens the file action menu of file/folder :name on the webUI
	 *
	 * @param string $name Name of the file/Folder
	 *
	 * @return void
	 */
	public function theUserOpensTheFileActionMenuOfFileFolderOnTheWebui(string $name):void {
		$session = $this->getSession();
		$this->selectedFileRow = $this->getCurrentPageObject()->findFileRowByName($name, $session);
		$this->openedFileActionMenu = $this->selectedFileRow->openFileActionsMenu($session);
	}

	/**
	 * @When the public/user downloads file/folder :fileName using the webUI
	 *
	 * @param string $fileName Name of the file/Folder
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function userDownloadsFile(string $fileName):void {
		$session = $this->getSession();
		$this->selectedFileRow = $this->getCurrentPageObject()->findFileRowByName($fileName, $session);
		$this->openedFileActionMenu = $this->selectedFileRow->openFileActionsMenu($session);
		$url = $this->openedFileActionMenu->getDownloadUrlForFile();
		$baseUrl = $this->featureContext->getBaseUrlWithoutPath();
		$this->response = HttpRequestHelper::get(
			$baseUrl . $url,
			$this->featureContext->getStepLineRef()
		);
		Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
		$this->featureContext->setResponse($this->response);
	}

	/**
	 * @Then the user should see :action_label file action translated to :translated_label on the webUI
	 *
	 * @param string $action_label
	 * @param string $translated_label
	 *
	 * @return void
	 */
	public function theUserShouldSeeFileActionTranslatedToOnTheWebui(string $action_label, string $translated_label):void {
		Assert::assertSame(
			$translated_label,
			$this->openedFileActionMenu->getActionLabelLocalized($action_label),
			__METHOD__
			. " The file action label and the translated label do not match. See the differences below."
		);
	}

	/**
	 * @When the user clicks the :action_label file action on the webUI
	 *
	 * @param string $action_label
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserClicksTheFileActionOnTheWebui(string $action_label):void {
		switch ($action_label) {
			case "details":
				$this->openedFileActionMenu->openDetails();
				$this->getCurrentPageObject()
					->getDetailsDialog()
					->waitTillPageIsLoaded($this->getSession());
				break;
			case "rename":
				$this->openedFileActionMenu->rename();
				break;
			case "delete":
				$this->openedFileActionMenu->delete();
				break;
			case "search results page":
				throw new Exception("Action not available");
		}
	}

	/**
	 * @When the user selects folder/file :folder using the webUI
	 *
	 * @param string $folder
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserSelectsFolderUsingTheWebui(string $folder):void {
		$pageObject = $this->getCurrentPageObject();
		$pageObject->waitTillPageIsLoaded($this->getSession());
		$pageObject->selectFolder($folder);
	}

	/**
	 * @When the user clicks the download button on the webUI
	 *
	 * @return void
	 */
	public function theUserDownloadsFolderUsingTheDownloadButtonOnTheWebui():void {
		$this->filesPage->userDownloadsResource();
	}

	/**
	 * @Then folder/file :expectedFolder should be downloaded
	 *
	 * @param string $expectedFolder
	 *
	 * @return void
	 * @throws Exception
	 */
	public function folderShouldBeDownloaded(string $expectedFolder):void {
		$directory = getenv("DOWNLOADS_DIRECTORY");
		if (!$directory) {
			$directory = getcwd() . "/tests/downloads/";
		}
		$files = array_diff(scandir($directory), ['.', '..']); // get all file names and remove '.', '..'
		if (!\in_array($expectedFolder, $files)) {
			Assert::fail("Could not find folder '$expectedFolder' in downloads.");
		}
	}

	/**
	 * @When the user unzips the file :file
	 *
	 * @param string $file
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserUnzipsTheFolder(string $file):void {
		$zip = new ZipArchive;
		$directory = getenv("DOWNLOADS_DIRECTORY");
		if (!$directory) {
			$directory = getcwd() . "/tests/downloads/";
		}
		$zipFile = "$directory/$file";
		$res = $zip->open($zipFile);
		if ($res === true) {
			$zip->extractTo($directory);
			$zip->close();
			$files = array_diff(scandir($directory), ['.', '..']); // get all file names and remove '.', '..'
		} else {
			throw new Exception("Couldn't open the file $zipFile");
		}
	}

	/**
	 * @Then the following files/folders should exist in the downloads folder
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function followingFilesShouldExistInTheDownloadsFolder(TableNode $table):void {
		$directory = getenv("DOWNLOADS_DIRECTORY");
		if (!$directory) {
			$directory = getcwd() . "/tests/downloads/";
		}
		$files = array_diff(scandir($directory), ['.', '..']); // get all file names and remove '.', '..'
		foreach ($table as $row) {
			if (!\in_array($row["folders"], $files)) {
				Assert::assertFalse(
					"{$row['folders']} not found in downloaded folder"
				);
			}
		}
	}

	/**
	 * @Then the following sub-folders should exist inside the downloaded folder :parentFolder
	 *
	 * @param string $parentFolder
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function followingSubFoldersShouldExistInsideDownloadedFolder(string $parentFolder, TableNode $table):void {
		$directory = getenv("DOWNLOADS_DIRECTORY");
		if (!$directory) {
			$directory = getcwd() . "/tests/downloads/";
		}
		$files = array_diff(scandir("$directory/$parentFolder"), ['.', '..']); // get all file names and remove '.', '..'
		foreach ($table as $row) {
			if (!\in_array($row["folders"], $files)) {
				Assert::assertFalse(
					"{$row['folders']} not found in downloaded folder '$parentFolder'"
				);
			}
		}
	}

	/**
	 * @Then the details dialog should be visible on the webUI
	 *
	 * @return void
	 */
	public function theDetailsDialogShouldBeVisibleOnTheWebui():void {
		Assert::assertTrue(
			$this->filesPage->getDetailsDialog()->isDialogVisible(),
			__METHOD__
			. " The details dialog is unexpectedly not visible on the webUI"
		);
	}

	/**
	 * @Given the user has switched to the :tabName tab in the details panel using the webUI
	 * @When the user switches to the :tabName tab in the details panel using the webUI
	 *
	 * @param string $tabName
	 *
	 * @return void
	 */
	public function theUserSwitchesToTabInDetailsPanelUsingTheWebui(string $tabName):void {
		$this->filesPage->getDetailsDialog()->changeDetailsTab($tabName);
	}

	/**
	 * @When the user comments with content :content using the WebUI
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function theUserCommentsWithContentUsingTheWebui(string $content):void {
		$detailsDialog = $this->filesPage->getDetailsDialog();
		$detailsDialog->addComment($this->getSession(), $content);
		$this->filesPage->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * @When the user deletes the comment :content using the webUI
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function theUserDeletesTheCommentUsingTheWebui(string $content):void {
		$detailsDialog = $this->filesPage->getDetailsDialog();
		$detailsDialog->deleteComment($content);
		$this->filesPage->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * @Then /^the comment ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed in the comments tab in details dialog$/
	 *
	 * @param string $text enclosed in single or double quotes
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCommentShouldBeListedInTheCommentsTabInDetailsDialog(string $text, string $shouldOrNot):void {
		$should = ($shouldOrNot !== "not");
		$text = \trim($text, $text[0]);
		/**
		 *
		 * @var DetailsDialog $detailsDialog
		 */
		$detailsDialog = $this->getCurrentPageObject()->getDetailsDialog();
		$detailsDialog->waitTillPageIsLoaded($this->getSession());
		if ($should) {
			Assert::assertTrue(
				$detailsDialog->isCommentOnUI($text),
				"Failed to find comment with text $text on the webUI"
			);
		} else {
			Assert::assertFalse(
				$detailsDialog->isCommentOnUI($text),
				"The comment with text $text exists on the webUI"
			);
		}
	}

	/**
	 * @When the user searches for tag :tag using the webUI
	 *
	 * @param string $tag
	 *
	 * @return void
	 */
	public function theUserSearchesForTagUsingTheWebui(string $tag):void {
		$this->tagsPage->searchByTag($tag);
	}

	/**
	 * @When the user closes the details dialog
	 *
	 * @return void
	 */
	public function theUserClosesTheDetailsDialog():void {
		$this->filesPage->closeDetailsDialog();
	}

	/**
	 * @Then the versions list should contain :num entries
	 *
	 * @param int $num
	 *
	 * @return void
	 */
	public function theVersionsListShouldContainEntries(int $num):void {
		$versionsList = $this->filesPage->getDetailsDialog()->getVersionsList();
		$versionsCount = \count($versionsList->findAll("xpath", "//li"));
		Assert::assertEquals(
			$num,
			$versionsCount,
			__METHOD__
			. " Expected '$num' entries in the versions list but got '$versionsCount' entries listed."
		);
	}

	/**
	 * @Then the author(s) of the version(s) of file/folder :resource should be:
	 *
	 * @param string $resource
	 * @param TableNode $versionTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAuthorsOfVersionsOfFileShouldBe(string $resource, TableNode $versionTable):void {
		$this->featureContext->verifyTableNodeColumns(
			$versionTable,
			['index', 'author']
		);
		$versionsMetadata = $versionTable->getHash();

		$actualVersions = $this->filesPage->getDetailsDialog()->getVersionsAndDetailsList();
		foreach ($versionsMetadata as $version) {
			$index = (int) $version["index"] - 1;
			if ($index < 0) {
				throw new Exception(
					"Version index must start from 1"
				);
			}
			$expectedAuthor = $this->featureContext->getDisplayNameForUser($version["author"]);
			$actualAuthor = $actualVersions[$index]["author"];

			Assert::assertEquals(
				$expectedAuthor,
				$actualAuthor,
				__METHOD__
				. " Expected author '" . $expectedAuthor . "' at index '" . $version["index"] . "' but got '" . $actualAuthor . "'"
			);
		}
	}

	/**
	 * @When the user restores the file to last version using the webUI
	 *
	 * @return void
	 */
	public function theUserRestoresTheFileToLastVersionUsingTheWebui():void {
		$this->filesPage->getDetailsDialog()->restoreCurrentFileToLastVersion(
			$this->getSession()
		);
	}

	/**
	 * @Then /^(user|group|public link|federated user) ((?:'[^']*')|(?:"[^"]*")) ?(?:with displayname "([^"]*)")? should be listed as share receiver via ((?:'[^']*')|(?:"[^"]*")) on the webUI$/
	 *
	 * @param string $type user|group|public link|federated user
	 * @param string $name
	 * @param string|null $displayname
	 * @param string $item
	 *
	 * @return void
	 */
	public function userGroupShouldBeListedAsShareReceiver(string $type, string $name, ?string $displayname = null, string $item = "simple-folder"):void {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$name = $this->featureContext->substituteInLineCodes($name);
		$name = \trim($name, $name[0]);
		$item = \trim($item, $item[0]);
		if ($type === "user") {
			$name = $this->featureContext->getActualUsername($name);
			$name = $this->featureContext->getDisplayNameForUser($name);
		} elseif ($type === "federated user") {
			$name = $this->featureContext->getActualUsername($name);
			$name = $this->featureContext->substituteInLineCodes($displayname, $name);
		}
		$sharingDialog = $this->filesPage->getSharingDialog();
		$shareTreeItem = $sharingDialog->getShareTreeItem($type, $name, $item);
		Assert::assertTrue(
			$shareTreeItem->isVisible(),
			__METHOD__
			. " The '$type' '$name' is not listed as share receiver via '$item' on the webUI."
		);
	}

	/**
	 * @Then public link with last share token should be listed as share receiver via :item on the webUI
	 *
	 * @param string $item
	 *
	 * @return void
	 */
	public function publicLinkWithLastShareTokenShouldBeListedAsShareReceiverViaOnTheWebUI(string $item):void {
		$token = $this->featureContext->getLastPublicShareToken();
		$sharingDialog = $this->filesPage->getSharingDialog();
		$shareTreeItem = $sharingDialog->getShareTreeItem("public link", $token, $item);
		Assert::assertTrue(
			$shareTreeItem->isVisible(),
			__METHOD__
			. " The public link with last share token '$token' is not listed as share receiver via '$item' on the webUI."
		);
	}

	/**
	 * @Then the user should not have permission to upload or create files
	 *
	 * @return void
	 */
	public function assertUploadCreatePermissionIsDenied():void {
		$msg = $this->filesPage->getUploadCreatePermissionDeniedMessage();
		$expectedMsg = "You don’t have permission to upload or create files here";
		Assert::assertEquals($expectedMsg, $msg, "Expected $expectedMsg but got $msg");
		$isIconVisible = $this->filesPage->isNewFileIconVisible();
		Assert::assertFalse(
			$isIconVisible,
			__METHOD__
			. " The icon to upload or create files was expected not to be visible for the user, but is visible."
		);
	}

	/**
	 * @AfterScenario @webUIDownload
	 *
	 * Delete unzipped and downloaded files
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteUnzippedAndDownloadedResources():void {
		$directory = getenv("DOWNLOADS_DIRECTORY");
		if (!$directory) {
			$directory = getcwd() . "/tests/downloads/";
		}
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
			RecursiveIteratorIterator::CHILD_FIRST
		);

		foreach ($files as $fileinfo) {
			$todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
			$todo($fileinfo->getRealPath());
		}
	}
}
