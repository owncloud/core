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
	/**
	 *
	 * @var FilesPageCRUD $filesPageCRUDFunctions
	 */
	protected $filesPageCRUDFunctions;
	private $strForNormalFileName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

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
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 *
	 * @return void
	 */
	protected function getFilePathInRowXpath() {
		throw new \Exception("not implemented in FilesPage");
	}

	/**
	 * @param Session $session
	 * @param Factory $factory
	 * @param array   $parameters
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
	 * @throws ElementNotFoundException|\Exception
	 * @return string name of the created file
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
	 *
	 * @throws ElementNotFoundException
	 * @return string
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
	 * @throws ElementNotFoundException
	 * @return SharingDialog
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
		$fileRow = $this->findFileRowByName($fileName, $session);
		return $fileRow->openSharingDialog();
	}

	/**
	 * closes an open details dialog
	 * the details dialog contains the comments, sharing, versions etc tabs
	 *
	 * @throws ElementNotFoundException
	 * if no sharing dialog is open
	 * @return void
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
	 * returns the tooltip that is displayed next to the filename
	 * if something is wrong
	 *
	 * @param string $fileName
	 * @param Session $session
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getTooltipOfFile($fileName, Session $session) {
		$fileRow = $this->findFileRowByName($fileName, $session);
		return $fileRow->getTooltip();
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
	 * waits till the upload progressbar is not visible anymore
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function waitForUploadProgressbarToFinish() {
		$this->filesPageCRUDFunctions->waitForUploadProgressbarToFinish();
	}
}
