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

namespace Page;

use Behat\Mink\Exception\DriverException;
use Behat\Mink\Exception\UnsupportedDriverActionException;
use Behat\Mink\Session;
use Exception;
use Page\FilesPageElement\DetailsDialog;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * Files page.
 */
class FilesPage extends FilesPageBasic {
	protected $path = '/index.php/apps/files/';
	protected $fileNamesXpath = "//span[@class='nametext']";
	protected $fileNameMatchXpath = "//span[@class='nametext' and .=%s]";
	//we need @id='app-content-files' because id='fileList' is used multiple times
	//see https://github.com/owncloud/core/issues/27870
	protected $fileListXpath = ".//div[@id='app-content-files']//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='app-content-files']//div[@id='emptycontent']";
	protected $newFolderTooltipXpath = './/div[contains(@class, "newFileMenu")]//div[@class="tooltip-inner"]';
	protected $deleteAllSelectedBtnXpath = ".//*[@id='app-content-files']//*[@class='delete-selected']";
	protected $deleteAllSelectedMobileBtnXpath = ".//*[@id='app-content-files']//*[@class='delete-selected mobile button']";
	protected $homePageIconXpath = "//div[@class='breadcrumb']//img[@alt='Home']";
	protected $folderBreadCrumbXpath = "//div[@class='breadcrumb']//a[contains(@href,'%s')]";
	protected $uploadCreatePermissionDeniedMessageSelector = ".notCreatable.notPublic";
	protected $sharingDialogXpath = "//h3[@data-original-title='%s']/ancestor::div[@id='app-sidebar']//div[@id='shareTabView']";
	protected $closeOCDialogXpath = "//div/a[@class='oc-dialog-close']";
	protected $publicLinkQuickActionXpath = "//td[contains(@class, 'filename')]//span[@class ='nametext' and .='%s']/following-sibling::span//a[contains(@class, 'action-create-public-link')]";
	protected $selectResourceXpath = "//span[@class='nametext' and .='%s']/parent::a/preceding-sibling::label";
	protected $downloadButtonXpath = "//span[@id='selectedActionsList']//a[@class='download']";

	/**
	 *
	 * @var FilesPageCRUD $filesPageCRUDFunctions
	 */
	protected $filesPageCRUDFunctions;

	/**
	 * @return string
	 */
	protected function getFileListXpath(): string {
		return $this->fileListXpath;
	}

	/**
	 * @return string
	 */
	protected function getFileNamesXpath(): string {
		return $this->fileNamesXpath;
	}

	/**
	 * @return string
	 */
	protected function getFileNameMatchXpath(): string {
		return $this->fileNameMatchXpath;
	}

	/**
	 * @return string
	 */
	protected function getEmptyContentXpath(): string {
		return $this->emptyContentXpath;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @return string
	 * @throws Exception
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 *
	 */
	protected function getFilePathInRowXpath(): string {
		throw new Exception(__METHOD__ . " not implemented in FilesPage");
	}

	/**
	 * @param Session $session
	 * @param Factory $factory
	 * @param array $parameters
	 */
	public function __construct(
		Session $session,
		Factory $factory,
		array $parameters = []
	) {
		parent::__construct($session, $factory, $parameters);
		$this->filesPageCRUDFunctions = $this->getPage("FilesPageCRUD");
		$mobileResolution = getenv("MOBILE_RESOLUTION");
		// checking if MOBILE_RESOLUTION is set
		if (!empty($mobileResolution)) {
			// setting appropriate xpath for elements in mobile resolution
			$this->filesPageCRUDFunctions->setXpath(
				$this->emptyContentXpath,
				$this->fileListXpath,
				$this->fileNameMatchXpath,
				$this->fileNamesXpath,
				$this->deleteAllSelectedMobileBtnXpath
			);
			return;
		}
		$this->filesPageCRUDFunctions->setXpath(
			$this->emptyContentXpath,
			$this->fileListXpath,
			$this->fileNameMatchXpath,
			$this->fileNamesXpath,
			$this->deleteAllSelectedBtnXpath
		);
	}

	/**
	 * create a folder with the given name.
	 * If name is not given a random one is chosen
	 *
	 * @param Session $session
	 * @param string|null $name
	 * @param int $timeoutMsec
	 * @param boolean $useCreateButton
	 *
	 * @return string name of the created file
	 * @throws ElementNotFoundException|Exception
	 */
	public function createFolder(
		Session $session,
		string  $name = null,
		int $timeoutMsec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC,
		bool $useCreateButton = false
	): string {
		return $this->filesPageCRUDFunctions->createFolder(
			$session,
			$name,
			$timeoutMsec,
			$useCreateButton,
		);
	}

	/**
	 * returns the tooltip that is displayed next to the filename
	 * if something is wrong
	 *
	 * @param string $fileName
	 * @param Session $session
	 *
	 * @return string
	 */
	public function getTooltipOfFile(
		string  $fileName,
		Session $session
	): string {
		return $this->filesPageCRUDFunctions->getTooltipOfFile(
			$fileName,
			$session
		);
	}

	/**
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getCreateFolderTooltip(): string {
		$newFolderTooltip = $this->find("xpath", $this->newFolderTooltipXpath);
		$this->assertElementNotNull(
			$newFolderTooltip,
			__METHOD__ .
			" xpath $this->newFolderTooltipXpath " .
			"could not find tooltip"
		);
		return $newFolderTooltip->getText();
	}

	/**
	 *
	 * @param Session $session
	 * @param string $name
	 *
	 * @return void
	 */
	public function uploadFile(Session $session, string $name): void {
		$this->filesPageCRUDFunctions->uploadFile($session, $name);
	}

	/**
	 * gets a sharing dialog object
	 *
	 * @return Page
	 * @throws ElementNotFoundException
	 */
	public function getSharingDialog(): Page {
		return $this->getPage("FilesPageElement\\SharingDialog");
	}

	/**
	 * opens the sharing dialog for a given file/folder name
	 * returns the SharingDialog Object
	 *
	 * @param string $fileName
	 * @param Session $session
	 *
	 * @return Page
	 */
	public function openSharingDialog(string $fileName, Session $session): Page {
		$shareDialog = \sprintf($this->sharingDialogXpath, $fileName);
		$element = $this->find("xpath", $shareDialog);
		// open sharing dialog only if it is not already open
		if ($element === null || !$element->isVisible()) {
			$fileRow = $this->findFileRowByName($fileName, $session);
			return $fileRow->openSharingDialog($session);
		}
		return $this->getSharingDialog();
	}

	/**
	 * closes an open details dialog
	 * the details dialog contains the comments, sharing, versions etc tabs
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 * if no sharing dialog is open
	 */
	public function closeDetailsDialog(): void {
		$this->getDetailsDialog()->closeDetailsDialog();
	}

	/**
	 * renames a file
	 *
	 * @param string|array $fromFileName
	 * @param string|array $toFileName
	 * @param Session $session
	 * @param int $maxRetries
	 *
	 * @return void
	 */
	public function renameFile(
		$fromFileName,
		$toFileName,
		Session $session,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		$this->filesPageCRUDFunctions->renameFile(
			$fromFileName,
			$toFileName,
			$session,
			$maxRetries
		);
	}

	/**
	 *
	 * @param string|array $name
	 * @param Session $session
	 * @param bool $expectToDeleteFile
	 * @param int $maxRetries
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteFile(
		$name,
		Session $session,
		bool $expectToDeleteFile = true,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		$this->filesPageCRUDFunctions->deleteFile(
			$name,
			$session,
			$expectToDeleteFile,
			$maxRetries
		);
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteAllSelectedFiles(Session $session): void {
		$this->filesPageCRUDFunctions->deleteAllSelectedFiles($session);
	}

	/**
	 * moves a file or folder into an other folder by drag and drop
	 *
	 * @param string|array $name
	 * @param string|array $destination
	 * @param Session $session
	 * @param int $maxRetries
	 *
	 * @return void
	 */
	public function moveFileTo(
		$name,
		$destination,
		Session $session,
		int $maxRetries = STANDARD_RETRY_COUNT
	):void {
		$this->filesPageCRUDFunctions->moveFileTo(
			$name,
			$destination,
			$session,
			$maxRetries
		);
	}

	/**
	 * same as the original open() function but with a more slack
	 * URL verification as oC adds some extra parameters to the URL e.g.
	 * "files/?dir=/&fileid=2"
	 *
	 * @param array $urlParameters
	 *
	 * @return FilesPage
	 * @see \SensioLabs\Behat\PageObjectExtension\PageObject\Page::open()
	 */
	public function open(array $urlParameters = []): FilesPage {
		$url = $this->getUrl($urlParameters);

		try {
			$this->getDriver()->visit($url);
		} catch (UnsupportedDriverActionException | DriverException $e) {
		}

		$this->verifyResponse();
		try {
			if (\strpos(
				$this->getDriver()->getCurrentUrl(),
				$this->getUrl($urlParameters)
			) === false
			) {
				throw new UnexpectedPageException(
					\sprintf(
						'Expected to be on "%s" but found "%s" instead',
						$this->getUrl($urlParameters),
						$this->getDriver()->getCurrentUrl()
					)
				);
			}
		} catch (UnsupportedDriverActionException | DriverException $e) {
		}
		$this->verifyPage();
		return $this;
	}

	/**
	 * Browse directly to a particular file within a folder.
	 *
	 * The folder should open and scroll to the requested file.
	 * If a details tab is specified, then the details panel for that file
	 * should open with the requested tab selected.
	 *
	 * @param string $fileId
	 * @param string $folderName
	 * @param string|null $detailsTab e.g. comments, sharing, versions
	 *
	 * @return FilesPage
	 */
	public function browseToFileId(
		string $fileId,
		string $folderName = '/',
		?string $detailsTab = null
	): FilesPage {
		$url = \rtrim($this->getUrl(), '/');
		$fullUrl = "$url/?dir=$folderName&fileid=$fileId";

		if ($detailsTab === null) {
			$detailsTab = "";
		}

		/**
		 *
		 * @var DetailsDialog $dialog
		 */
		$detailsDialog = $this->getPage("FilesPageElement\\DetailsDialog");
		$fullUrl = "$fullUrl&details=" . $detailsDialog->getDetailsTabId($detailsTab);

		try {
			$this->getDriver()->visit($fullUrl);
		} catch (UnsupportedDriverActionException | DriverException $e) {
		}

		return $this;
	}

	/**
	 * Browse to Home Page by clicking on home icon.
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function browseToHomePage(Session $session): void {
		$homePageIcon = $this->find("xpath", $this->homePageIconXpath);
		$this->assertElementNotNull(
			$homePageIcon,
			__METHOD__ .
			" xpath $this->homePageIconXpath " .
			"could not find home page icon."
		);
		$homePageIcon->click();
		// The home page icon takes us to the top-level files page.
		// Wait for it to be properly loaded, so that the next step(s) can run
		// without timing problems.
		$this->waitTillPageIsLoaded($session);
	}

	/**
	 * Browse directly to a particular parent folder.
	 *
	 * @param string $folderName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function browseToFolder(string $folderName): void {

		// foldername is encoded into query-string
		$folderName = \urlencode($folderName);

		// urlencode encodes '/' into '%2F' and ' ' into '+'.
		// Hence, undoing the conversion of '/' and ' '
		$folderName = \preg_replace('/\%2F/', '/', $folderName);
		$folderName = \preg_replace('/\+/', '%20', $folderName);

		$folderUrlXpathLocator = \sprintf($this->folderBreadCrumbXpath, $folderName);
		$folder = $this->find("xpath", $folderUrlXpathLocator);
		$this->assertElementNotNull(
			$folder,
			__METHOD__
			. " xpath $folderUrlXpathLocator could not be found for folder "
			. $folderName
		);
		$folder->click();
	}

	/**
	 * waits till the upload progressbar is not visible anymore
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function waitForUploadProgressbarToFinish(): void {
		$this->filesPageCRUDFunctions->waitForUploadProgressbarToFinish();
	}

	/**
	 * checks whether given resource is marked as shared or not
	 *
	 * @param string $fileName
	 * @param Session $session
	 *
	 * @return bool
	 */
	public function isSharedIndicatorPresent(string $fileName, Session $session): bool {
		$fileRow = $this->findFileRowByName($fileName, $session);
		return $fileRow->isSharedIndicatorPresent();
	}

	/**
	 * gets create-upload permission denied message
	 *
	 * @return string
	 */
	public function getUploadCreatePermissionDeniedMessage(): string {
		$msg = $this->find("css", $this->uploadCreatePermissionDeniedMessageSelector);
		if ($msg === null || !$msg->isVisible()) {
			return "";
		}
		return \trim($msg->getHtml());
	}

	/**
	 * checks whether the upload or create icon is visible
	 *
	 * @return bool
	 */
	public function isNewFileIconVisible(): bool {
		$newFileIcon = $this->find("xpath", $this->newFileFolderButtonXpath);
		return $newFileIcon->isVisible();
	}

	/**
	 * Closes the federated Share dialog
	 *
	 * @return void
	 */
	public function closeFederationDialog(): void {
		$closeIcon = $this->find("xpath", $this->closeOCDialogXpath);
		$this->assertElementNotNull(
			$closeIcon,
			__METHOD__ .
			" xpath $this->closeOCDialogXpath " .
			"could not find OC-dialog close icon."
		);
		$closeIcon->click();
	}

	/**
	 * check if public link quick action is visible
	 *
	 * @param string $name
	 *
	 * @return boolean
	 */
	public function isPublicLinkQuickActionVisible(string $name): bool {
		$quickActionXpathLocator = \sprintf($this->publicLinkQuickActionXpath, $name);
		$quickActionButton = $this->find("xpath", $quickActionXpathLocator);
		return !($quickActionButton === null);
	}

	/**
	 * create read only public share link using quick action
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function clickOnPublicShareQuickAction(string $name): void {
		$quickActionXpathLocator = \sprintf($this->publicLinkQuickActionXpath, $name);
		$folder = $this->find("xpath", $quickActionXpathLocator);
		$this->assertElementNotNull(
			$folder,
			__METHOD__
			. " xpath $quickActionXpathLocator could not be found for folder "
			. $name
		);
		$folder->click();
	}

	/**
	 * Select folder
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function selectFolder(string $name):void {
		$selectFolderXpathLocator = \sprintf($this->selectResourceXpath, $name);
		$folder = $this->find("xpath", $selectFolderXpathLocator);
		$folder->click();
	}

	/**
	 * download resource
	 *
	 * @return void
	 */
	public function userDownloadsResource() {
		$download = $this->find("xpath", $this->downloadButtonXpath);
		$download->click();
	}
}
