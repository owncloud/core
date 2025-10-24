<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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

namespace Tests\Acceptance\Page;

use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Exception;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\UploadHelper;
use WebDriver\Key;
use WebDriver\Exception\NoSuchElement;
use WebDriver\Exception\StaleElementReference;

/**
 * PageObject with CRUD actions that are shared among some file pages, but not all
 *
 */
class FilesPageCRUD extends FilesPageBasic {
	protected $fileNamesXpath = null;
	protected $fileNameMatchXpath = null;
	protected $fileListXpath = null;
	protected $emptyContentXpath = null;
	protected $newFileFolderButtonXpath = './/*[@id="controls"]//a[@class="button new"]';
	protected $newFolderButtonXpath = './/div[contains(@class, "newFileMenu")]//a[@data-templatename="New folder"]';
	protected $newFolderNameInputLabel = 'New folder';
	protected $deleteAllSelectedBtnXpath = ".//*[@id='app-content-files']//*[@class='delete-selected']";
	protected $fileUploadInputId = "file_upload_start";
	protected $uploadProgressbarLabelXpath = "//div[@id='uploadprogressbar']/em";
	protected $newFolderCreateButtonXpath = './/div[contains(@class, "newFileMenu")]//button[@class="create primary"]';
	protected $strForNormalFileName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

	/**
	 * @param string $fileNamesXpath
	 *
	 * @return void
	 */
	public function setFileNamesXpath(string $fileNamesXpath): void {
		$this->fileNamesXpath = $fileNamesXpath;
	}

	/**
	 * @param string $fileNameMatchXpath
	 *
	 * @return void
	 */
	public function setFileNameMatchXpath(string $fileNameMatchXpath): void {
		$this->fileNameMatchXpath = $fileNameMatchXpath;
	}

	/**
	 * @param string $fileListXpath
	 *
	 * @return void
	 */
	public function setFileListXpath(string $fileListXpath): void {
		$this->fileListXpath = $fileListXpath;
	}

	/**
	 * @param string $emptyContentXpath
	 *
	 * @return void
	 */
	public function setEmptyContentXpath(string $emptyContentXpath): void {
		$this->emptyContentXpath = $emptyContentXpath;
	}

	/**
	 * @param string $deleteAllSelectedBtnXpath
	 *
	 * @return void
	 */
	public function setDeleteAllSelectedBtnXpath(string $deleteAllSelectedBtnXpath): void {
		$this->deleteAllSelectedBtnXpath = $deleteAllSelectedBtnXpath;
	}

	/**
	 * set all needed xpath
	 *
	 * @param string $emptyContentXpath
	 * @param string $fileListXpath
	 * @param string $fileNameMatchXpath
	 * @param string $fileNamesXpath
	 * @param string $deleteAllSelectedBtnXpath
	 *
	 * @return void
	 */
	public function setXpath(
		string $emptyContentXpath,
		string $fileListXpath,
		string $fileNameMatchXpath,
		string $fileNamesXpath,
		string $deleteAllSelectedBtnXpath
	): void {
		$this->setEmptyContentXpath($emptyContentXpath);
		$this->setFileListXpath($fileListXpath);
		$this->setFileNameMatchXpath($fileNameMatchXpath);
		$this->setFileNamesXpath($fileNamesXpath);
		$this->setDeleteAllSelectedBtnXpath($deleteAllSelectedBtnXpath);
	}

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
	 * @return string
	 */
	protected function getDeleteAllSelectedBtnXpath(): string {
		return $this->deleteAllSelectedBtnXpath;
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
	public function getTooltipOfFile(string $fileName, Session $session): string {
		$fileRow = $this->findFileRowByName($fileName, $session);
		return $fileRow->getTooltip();
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
		throw new Exception(__METHOD__ . " not implemented in FilesPageCRUD");
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
	 * @throws Exception
	 */
	public function renameFile(
		$fromFileName,
		$toFileName,
		Session $session,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		if (\is_array($toFileName)) {
			$toFileName = \implode('', $toFileName);
		}

		for ($counter = 0; $counter < $maxRetries; $counter++) {
			try {
				$fileRow = $this->findFileRowByName($fromFileName, $session);
				$fileRow->rename($toFileName, $session);
				break;
			} catch (Exception $e) {
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
		$name,
		$destination,
		Session $session,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
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
	 * finds the element of the button to create a new file/folder
	 *
	 * @return NodeElement
	 */
	public function findNewFileFolderButton(): NodeElement {
		$newButtonElement = $this->find("xpath", $this->newFileFolderButtonXpath);

		$this->assertElementNotNull(
			$newButtonElement,
			__METHOD__ .
			" xpath $this->newFileFolderButtonXpath " .
			"could not find new file-folder button"
		);
		return $newButtonElement;
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
		?string $name = null,
		int     $timeoutMsec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC,
		bool	$useCreateButton = false
	): string {
		if ($name === null) {
			$name = \substr(\str_shuffle($this->strForNormalFileName), 0, 8);
		}
		$newButtonElement = $this->findNewFileFolderButton();
		$newButtonElement->click();

		$newFolderCreateButtonElement = $this->find("xpath", $this->newFolderButtonXpath);

		$this->assertElementNotNull(
			$newFolderCreateButtonElement,
			__METHOD__ .
			" xpath $this->newFolderButtonXpath " .
			"could not find new folder button"
		);

		try {
			$newFolderCreateButtonElement->click();
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
			if ($useCreateButton) {
				$this->fillField($this->newFolderNameInputLabel, $name);

				$newFolderCreateButtonElement = $this->find("xpath", $this->newFolderCreateButtonXpath);

				$this->assertElementNotNull(
					$newFolderCreateButtonElement,
					__METHOD__ .
					" xpath $this->newFolderCreateButtonXpath " .
					"could not find create button"
				);

				$newFolderCreateButtonElement->click();
			} else {
				$this->fillField($this->newFolderNameInputLabel, $name . Key::ENTER);
			}
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
			throw new Exception("could not create folder '$name'");
		}
		return $name;
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
		$this->initAjaxCounters($session);
		$this->resetSumStartedAjaxRequests($session);

		for ($counter = 0; $counter < $maxRetries; $counter++) {
			$row = $this->findFileRowByName($name, $session);
			try {
				$row->delete($session);
				$this->waitForAjaxCallsToStartAndFinish($session);
				$countXHRRequests = $this->getSumStartedAjaxRequests($session);
				//if no XHR Request were fired we assume the delete action
				//did not work and we retry
				if ($countXHRRequests === 0) {
					if ($expectToDeleteFile) {
						\error_log("Error while deleting file");
					}
				} else {
					break;
				}
			} catch (Exception $e) {
				$this->closeFileActionsMenu();
				if ($expectToDeleteFile) {
					\error_log(
						"Error while deleting file"
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
				}
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			}
		}
		if ($expectToDeleteFile && ($counter > 0)) {
			if (\is_array($name)) {
				$name = \implode('', $name);
			}
			$message = "INFORMATION: retried to delete file '$name' $counter times";
			echo $message;
			\error_log($message);
			if ($counter === $maxRetries) {
				throw new Exception($message);
			}
		}
	}

	/**
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function findDeleteAllSelectedFilesBtn(): NodeElement {
		$deleteAllSelectedBtn = $this->find(
			"xpath",
			$this->deleteAllSelectedBtnXpath
		);
		$this->assertElementNotNull(
			$deleteAllSelectedBtn,
			__METHOD__ .
			" xpath $this->deleteAllSelectedBtnXpath " .
			"could not find button to delete all selected files"
		);
		return $deleteAllSelectedBtn;
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteAllSelectedFiles(Session $session): void {
		$this->findDeleteAllSelectedFilesBtn()->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$this->waitTillFileRowsAreReady($session);
	}

	/**
	 *
	 * @param Session $session
	 * @param string $name
	 *
	 * @return void
	 */
	public function uploadFile(Session $session, string $name): void {
		$uploadField = $this->findById($this->fileUploadInputId);
		$this->assertElementNotNull(
			$uploadField,
			__METHOD__ .
			" id $this->fileUploadInputId " .
			"could not find file upload input field"
		);
		$uploadField->attachFile(UploadHelper::getUploadFilesDir($name));
		$this->waitForAjaxCallsToStartAndFinish($session, 20000);
		$this->waitForUploadProgressbarToFinish();
	}

	/**
	 * waits till the upload progressbar is not visible anymore
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function waitForUploadProgressbarToFinish(): void {
		$uploadProgressbar = $this->find(
			"xpath",
			$this->uploadProgressbarLabelXpath
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
