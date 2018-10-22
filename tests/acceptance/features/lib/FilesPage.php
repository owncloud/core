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
use Page\FilesPageElement\DetailsDialog;
use Page\FilesPageElement\SharingDialog;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
use WebDriver\Exception\NoSuchElement;
use WebDriver\Exception\StaleElementReference;
use WebDriver\Key;

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
	protected $newFileFolderButtonXpath = './/*[@id="controls"]//a[@class="button new"]';
	protected $newFolderButtonXpath = './/div[contains(@class, "newFileMenu")]//a[@data-templatename="New folder"]';
	protected $newFolderNameInputLabel = 'New folder';
	protected $newFolderTooltipXpath = './/div[contains(@class, "newFileMenu")]//div[@class="tooltip-inner"]';
	protected $fileUploadInputId = "file_upload_start";
	protected $uploadProgressbarLabelXpath = "//div[@id='uploadprogressbar']/em";
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
		if ($name === null) {
			$name = \substr(\str_shuffle($this->strForNormalFileName), 0, 8);
		}

		$newButtonElement = $this->find("xpath", $this->newFileFolderButtonXpath);

		$this->assertElementNotNull(
			$newButtonElement,
			__METHOD__ .
			" xpath $this->newFileFolderButtonXpath " .
			"could not find new file-folder button"
		);

		$newButtonElement->click();

		$newFolderButtonElement = $this->find("xpath", $this->newFolderButtonXpath);

		$this->assertElementNotNull(
			$newFolderButtonElement,
			__METHOD__ .
			" xpath $this->newFolderButtonXpath " .
			"could not find new folder button"
		);

		try {
			$newFolderButtonElement->click();
		} catch (NoSuchElement $e) {
			// Edge sometimes reports NoSuchElement even though we just found it.
			// Log the event and continue, because maybe the button was clicked.
			// TODO: Edge - if it keeps happening then find out why.
			\error_log(
				__METHOD__
				. " NoSuchElement while doing newFolderButtonElement->click()"
				. "\n-------------------------\n"
				. $e->getMessage()
				. "\n-------------------------\n"
			);
		}

		try {
			$this->fillField($this->newFolderNameInputLabel, $name . Key::ENTER);
		} catch (NoSuchElement $e) {
			// this seems to be a bug in MinkSelenium2Driver.
			// Used to work fine in 1.3.1 but now throws this exception
			// Actually all that we need does happen, so we just don't do anything
		} catch (StaleElementReference $e) {
			// At the end of processing setValue, MinkSelenium2Driver tries to blur
			// away from the element. But we pressed enter which has already
			// made the element go away. So we do not care about this exception.
			// This issue started happening due to:
			// https://github.com/minkphp/MinkSelenium2Driver/pull/286
		}
		$timeoutMsec = (int) $timeoutMsec;
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeoutMsec / 1000);

		while ($currentTime <= $end) {
			$newFolderButton = $this->find("xpath", $this->newFolderButtonXpath);
			if ($newFolderButton === null || !$newFolderButton->isVisible()) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}
		while ($currentTime <= $end) {
			try {
				$this->findFileRowByName($name, $session);
				break;
			} catch (ElementNotFoundException $e) {
				//loop around
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception("could not create folder");
		}
		return $name;
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
		$uploadField = $this->findById($this->fileUploadInputId);
		$this->assertElementNotNull(
			$uploadField,
			__METHOD__ .
			" id $this->fileUploadInputId " .
			"could not find file upload input field"
		);
		$uploadField->attachFile(\getenv("FILES_FOR_UPLOAD") . $name);
		$this->waitForAjaxCallsToStartAndFinish($session, 20000);
		$this->waitForUploadProgressbarToFinish();
	}

	/**
	 * gets a details dialog object
	 *
	 * @throws ElementNotFoundException
	 * @return DetailsDialog
	 */
	public function getDetailsDialog() {
		return $this->getPage("FilesPageElement\\DetailsDialog");
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
		if (\is_array($toFileName)) {
			$toFileName = \implode($toFileName);
		}

		for ($counter = 0; $counter < $maxRetries; $counter++) {
			try {
				$fileRow = $this->findFileRowByName($fromFileName, $session);
				$fileRow->rename($toFileName, $session);
				break;
			} catch (\Exception $e) {
				$this->closeFileActionsMenu();
				\error_log(
					"Error while renaming file"
					. "\n-------------------------\n"
					. $e->getMessage()
					. "\n-------------------------\n"
				);
			}
		}
		if ($counter > 0) {
			$message = "INFORMATION: retried to rename file $counter times";
			echo $message;
			\error_log($message);
		}

		$this->waitTillFileRowsAreReady($session);
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
		$toMoveFileRow = $this->findFileRowByName($name, $session);
		$destinationFileRow = $this->findFileRowByName($destination, $session);

		$this->initAjaxCounters($session);
		$this->resetSumStartedAjaxRequests($session);
		
		for ($retryCounter = 0; $retryCounter < $maxRetries; $retryCounter++) {
			$toMoveFileRow->findFileLink()->dragTo(
				$destinationFileRow->findFileLink()
			);
			$this->waitForAjaxCallsToStartAndFinish($session);
			$countXHRRequests = $this->getSumStartedAjaxRequests($session);
			if ($countXHRRequests === 0) {
				\error_log("Error while moving file");
			} else {
				break;
			}
		}
		if ($retryCounter > 0) {
			$message
				= "INFORMATION: retried to move file $retryCounter times";
			echo $message;
			\error_log($message);
		}
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

		$detailsDialog = $this->getDetailsDialog();
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
		$uploadProgressbar = $this->find(
			"xpath", $this->uploadProgressbarLabelXpath
		);
		$this->assertElementNotNull(
			$uploadProgressbar,
			__METHOD__ .
			" xpath $this->uploadProgressbarLabelXpath " .
			"could not find upload progressbar"
		);
		$currentTime = \microtime(true);
		$end = $currentTime + (STANDARD_UI_WAIT_TIMEOUT_MILLISEC / 1000);
		while ($uploadProgressbar->isVisible()) {
			if ($currentTime > $end) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}
	}
}
