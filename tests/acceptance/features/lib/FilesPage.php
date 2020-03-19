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

use Behat\Mink\Session;
use Page\FilesPageElement\SharingDialog;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;

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
	protected $homePageIconXpath = "//div[@class='breadcrumb']//img[@alt='Home']";
	protected $folderBreadCrumbXpath = "//div[@class='breadcrumb']//a[contains(@href,'%s')]";
	protected $uploadCreatePermissionDeniedMessageSelector = ".notCreatable.notPublic";
	protected $sharingDialogXpath = "//h3[@data-original-title='%s']/ancestor::div[@id='app-sidebar']//div[@id='shareTabView']";
	protected $closeOCDialogXpath = "//div/a[@class='oc-dialog-close']";

	/**
	 *
	 * @var FilesPageCRUD $filesPageCRUDFunctions
	 */
	protected $filesPageCRUDFunctions;

	/**
	 * @return string
	 */
	protected function getFileListXpath() {
		return $this->fileListXpath;
	}

	/**
	 * @return string
	 */
	protected function getFileNamesXpath() {
		return $this->fileNamesXpath;
	}

	/**
	 * @return string
	 */
	protected function getFileNameMatchXpath() {
		return $this->fileNameMatchXpath;
	}

	/**
	 * @return string
	 */
	protected function getEmptyContentXpath() {
		return $this->emptyContentXpath;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @return void
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 *
	 */
	protected function getFilePathInRowXpath() {
		throw new \Exception("not implemented in FilesPage");
	}

	/**
	 * @param Session $session
	 * @param Factory $factory
	 * @param array $parameters
	 */
	public function __construct(
		Session $session, Factory $factory, array $parameters = []
	) {
		parent::__construct($session, $factory, $parameters);
		$this->filesPageCRUDFunctions = $this->getPage("FilesPageCRUD");
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
	 * @param string $name
	 * @param int $timeoutMsec
	 *
	 * @return string name of the created file
	 * @throws ElementNotFoundException|\Exception
	 */
	public function createFolder(
		Session $session, $name = null,
		$timeoutMsec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		return $this->filesPageCRUDFunctions->createFolder(
			$session, $name, $timeoutMsec
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
		$fileName, Session $session
	) {
		return $this->filesPageCRUDFunctions->getTooltipOfFile(
			$fileName, $session
		);
	}

	/**
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getCreateFolderTooltip() {
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
	public function uploadFile(Session $session, $name) {
		$this->filesPageCRUDFunctions->uploadFile($session, $name);
	}

	/**
	 * gets a sharing dialog object
	 *
	 * @return SharingDialog
	 * @throws ElementNotFoundException
	 */
	public function getSharingDialog() {
		return $this->getPage("FilesPageElement\\SharingDialog");
	}

	/**
	 * opens the sharing dialog for a given file/folder name
	 * returns the SharingDialog Object
	 *
	 * @param string $fileName
	 * @param Session $session
	 *
	 * @return SharingDialog
	 */
	public function openSharingDialog($fileName, Session $session) {
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
	public function closeDetailsDialog() {
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
		$maxRetries = STANDARD_RETRY_COUNT
	) {
		$this->filesPageCRUDFunctions->renameFile(
			$fromFileName, $toFileName, $session, $maxRetries
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
	 */
	public function deleteFile(
		$name,
		Session $session,
		$expectToDeleteFile = true,
		$maxRetries = STANDARD_RETRY_COUNT
	) {
		$this->filesPageCRUDFunctions->deleteFile(
			$name, $session, $expectToDeleteFile, $maxRetries
		);
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteAllSelectedFiles(Session $session) {
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
		$name, $destination, Session $session, $maxRetries = STANDARD_RETRY_COUNT
	) {
		$this->filesPageCRUDFunctions->moveFileTo(
			$name, $destination, $session, $maxRetries
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
	public function open(array $urlParameters = []) {
		$url = $this->getUrl($urlParameters);

		$this->getDriver()->visit($url);

		$this->verifyResponse();
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
		$fileId, $folderName = '/', $detailsTab = null
	) {
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

		$this->getDriver()->visit($fullUrl);

		return $this;
	}

	/**
	 * Browse to Home Page by clicking on home icon.
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function browseToHomePage() {
		$homePageIcon = $this->find("xpath", $this->homePageIconXpath);
		$this->assertElementNotNull(
			$homePageIcon,
			__METHOD__ .
			" xpath $this->homePageIconXpath " .
			"could not find home page icon."
		);
		$homePageIcon->click();
	}

	/**
	 * Browse directly to a particular parent folder.
	 *
	 * @param string $folderName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function browseToFolder($folderName) {

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
	public function waitForUploadProgressbarToFinish() {
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
	public function isSharedIndicatorPresent($fileName, $session) {
		$fileRow = $this->findFileRowByName($fileName, $session);
		return $fileRow->isSharedIndicatorPresent();
	}

	/**
	 * gets create-upload permission denied message
	 *
	 * @return string
	 */
	public function getUploadCreatePermissionDeniedMessage() {
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
	public function isNewFileIconVisible() {
		$newFileIcon = $this->find("xpath", $this->newFileFolderButtonXpath);
		return $newFileIcon->isVisible();
	}

	/**
	 * Closes the federated Share dialog
	 *
	 * @return bool
	 */
	public function closeFederationDialog() {
		$closeIcon = $this->find("xpath", $this->closeOCDialogXpath);
		$this->assertElementNotNull(
			$closeIcon,
			__METHOD__ .
			" xpath $this->closeOCDialogXpath " .
			"could not find OC-dialog close icon."
		);
		$closeIcon->click();
	}
}
