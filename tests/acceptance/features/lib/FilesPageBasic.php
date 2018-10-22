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

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Page\FilesPageElement\FileActionsMenu;
use Page\FilesPageElement\FileRow;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use WebDriver\Exception\NoSuchElement;
use WebDriver\Exception\StaleElementReference;

/**
 * Common elements/methods for all Files Pages
 */
abstract class FilesPageBasic extends OwncloudPage {
	protected $fileActionMenuBtnXpathByNo = ".//*[@id='fileList']/tr[%d]//a[@data-action='menu']";
	protected $fileActionMenuBtnXpath = "//a[@data-action='menu']";
	protected $fileActionMenuXpath = "//div[contains(@class,'fileActionsMenu')]";
	protected $fileRowsBusyXpath = "//tr[contains(@class,'busy')]";
	protected $fileRowFromNameXpath = "/../../..";
	protected $appContentId = "app-content";
	protected $appContentFilesContainerId = "app-content-files";
	protected $controlsId = "controls";
	protected $loadingIndicatorXpath = ".//*[@class='loading']";
	protected $deleteAllSelectedBtnXpath = ".//*[@id='app-content-files']//*[@class='delete-selected']";
	protected $fileRowXpathFromActionMenu = "/../..";
	protected $appSettingsXpath = "//div[@id='app-settings']";
	protected $showHiddenFilesCheckboxXpath = "//label[@for='showhiddenfilesToggle']";
	protected $selectAllFilesCheckboxXpath = "//label[@for='select_all_files']";
	protected $appSettingsContentId = "app-settings-content";
	protected $styleOfCheckboxWhenVisible = "display: block;";

	/**
	 * @return string
	 */
	abstract protected function getFileListXpath();

	/**
	 * @return string
	 */
	abstract protected function getFileNamesXpath();

	/**
	 * @return string
	 */
	abstract protected function getFileNameMatchXpath();

	/**
	 * @return string
	 */
	abstract protected function getEmptyContentXpath();

	/**
	 * @return string
	 */
	abstract protected function getFilePathInRowXpath();

	/**
	 * finds all row elements that have the given name
	 *
	 * @param string|array $name
	 * @param Session $session
	 *
	 * @return FileRowElements[]
	 * @throws ElementNotFoundException
	 */
	protected function getFileRowElementsByName($name, Session $session) {
		$previousFileCount = 0;
		$currentFileCount = null;
		$spaceLeftTillBottom = 0;
		$this->scrollToPosition("#$this->appContentId", 0, $session);

		if (\is_array($name)) {
			if (\count($name) === 1) {
				$xpathString = $this->quotedText($name[0]);
			} else {
				// Concatenating separate parts of the file name allows
				// some parts to contain single quotes and the others to contain
				// double quotes.
				$comma = '';
				$xpathString = "concat(";

				foreach ($name as $nameComponent) {
					$xpathString .= $comma . $this->quotedText($nameComponent);
					$comma = ',';
				}
				$xpathString .= ")";
			}

			$name = \implode($name);
		} else {
			$xpathString = $this->quotedText($name);
		}

		//loop to keep on scrolling down to load not viewed files
		//when the scroll does not retrieve any new files, the file is not there
		do {
			$fileListElement = $this->waitTillElementIsNotNull(
				$this->getFileListXpath()
			);

			$this->assertElementNotNull(
				$fileListElement,
				__METHOD__ .
				" xpath " . $this->getFileListXpath() .
				" could not find file list"
			);

			$fileNameMatch = $fileListElement->findAll(
				"xpath", \sprintf($this->getFileNameMatchXpath(), $xpathString)
			);
			if (\count($fileNameMatch) === 0) {
				$fileNameMatchIsVisible = false;
			} else {
				try {
					$fileNameMatchIsVisible = $fileNameMatch[0]->isVisible();
				} catch (NoSuchElement $e) {
					// Somehow on Edge this can throw NoSuchElement even though
					// we just found the file name.
					// TODO: Edge - if it keeps happening then find out why.
					\error_log(
						__METHOD__
						. " NoSuchElement while doing fileNameMatch[0]->isVisible()"
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
					$fileNameMatchIsVisible = false;
				}
			}

			if ($fileNameMatchIsVisible) {
				$fileNameMatch[0]->focus();
			} else {
				if ($currentFileCount === null) {
					$currentFileCount = $this->getSizeOfFileFolderList();
				}
				$previousFileCount = $currentFileCount;
				$this->scrollDownAppContent($session);
				$currentFileCount = $this->getSizeOfFileFolderList();
				$spaceLeftTillBottom = (int) $session->evaluateScript(
					'$("#' . $this->appContentFilesContainerId . '").height() ' .
					'- (' .
					'    $("#' . $this->appContentId . '").height() ' .
					'    +$("#' . $this->appContentId . '").scrollTop()' .
					'  )'
				);
			}
		} while (
			!$fileNameMatchIsVisible
			&& ($currentFileCount > $previousFileCount || $spaceLeftTillBottom > 0)
		);

		if (\count($fileNameMatch) === 0) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" could not find file with the name '$name'"
			);
		}

		$fileRowElements = [];
		foreach ($fileNameMatch as $match) {
			$fileRowElement = $match->find("xpath", $this->fileRowFromNameXpath);
			$this->assertElementNotNull(
				$fileRowElement,
				__METHOD__ .
				" xpath $this->fileRowFromNameXpath " .
				"could not find file row"
			);
			$fileRowElements[] = $fileRowElement;
		}
		return $fileRowElements;
	}

	/**
	 * @return int the number of files and folders listed on the page
	 */
	public function getSizeOfFileFolderList() {
		$fileListElement = $this->find("xpath", $this->getFileListXpath());

		if ($fileListElement === null) {
			return 0;
		}

		return \count(
			$fileListElement->findAll("xpath", $this->getFileNamesXpath())
		);
	}

	/**
	 * @param int $number
	 *
	 * @return NodeElement|null
	 */
	public function findActionMenuByNo($number) {
		$xpath = \sprintf($this->fileActionMenuBtnXpathByNo, $number);
		return $this->find("xpath", $xpath);
	}

	/**
	 * finds the complete row of the file
	 *
	 * @param string|array $name
	 * @param Session $session
	 *
	 * @return FileRow
	 * @throws ElementNotFoundException
	 */
	public function findFileRowByName($name, Session $session) {
		return $this->findAllFileRowsByName($name, $session)[0];
	}

	/**
	 * finds the complete row of a file with a given name and path
	 * useful for pages where multiple files with the same name can be displayed
	 *
	 * @param string|array $name
	 * @param string $path
	 * @param Session $session
	 *
	 * @return FileRow
	 * @throws ElementNotFoundException
	 */
	public function findFileRowByNameAndPath($name, $path, Session $session) {
		$fileRows = $this->findAllFileRowsByName($name, $session);
		foreach ($fileRows as $fileRow) {
			$filePath = $fileRow->getFilePath($this->getFilePathInRowXpath());
			if ($filePath === $path) {
				return $fileRow;
			}
		}
		throw new ElementNotFoundException(
			__METHOD__ .
			" could not find file with the name '$name' and path '$path'"
		);
	}

	/**
	 * finds all rows that have the given name
	 *
	 * @param string|array $name
	 * @param Session $session
	 *
	 * @return FileRow[]
	 * @throws ElementNotFoundException
	 */
	public function findAllFileRowsByName($name, Session $session) {
		$fileRowElements = $this->getFileRowElementsByName($name, $session);
		$fileRows = [];
		foreach ($fileRowElements as $fileRowElement) {
			$fileRow = $this->getPage('FilesPageElement\\FileRow');
			$fileRow->setElement($fileRowElement);
			$fileRow->setName($name);
			$fileRows[] = $fileRow;
		}
		return $fileRows;
	}

	/**
	 * scrolls down the file list, to load not yet displayed files
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function scrollDownAppContent(Session $session) {
		$this->scrollToPosition(
			"#$this->appContentId",
			'$("#' . $this->appContentId . '").scrollTop() + $("#' .
			$this->appContentId . '").height() - $("#' .
			$this->controlsId . '").height()',
			$session
		);
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 * Finds the open File Action Menu
	 * the File Action Button must be clicked first
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function findFileActionMenuElement() {
		$actionMenu = $this->waitTillElementIsNotNull($this->fileActionMenuXpath);
		$this->assertElementNotNull(
			$actionMenu,
			__METHOD__ .
			" xpath $this->fileActionMenuXpath " .
			"could not find open fileActionMenu"
		);
		return $actionMenu;
	}

	/**
	 * opens a file or navigates into a folder
	 *
	 * @param string|array $name
	 * @param Session $session
	 *
	 * @return void
	 */
	public function openFile($name, Session $session) {
		$fileRow = $this->findFileRowByName($name, $session);
		$fileRow->openFileFolder();
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
			} catch (\Exception $e) {
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
				$name = \implode($name);
			}
			$message = "INFORMATION: retried to delete file '$name' $counter times";
			echo $message;
			\error_log($message);
		}
	}

	/**
	 * closes the fileactionsmenu is any is open
	 *
	 * @return void
	 */
	public function closeFileActionsMenu() {
		try {
			$actionMenu = $this->findFileActionMenuElement();
			$fileRowElement = $actionMenu->find(
				"xpath", $this->fileRowXpathFromActionMenu
			);
			/**
			 *
			 * @var FileRow $fileRow
			 */
			$fileRow = $this->getPage('FilesPageElement\\FileRow');
			$fileRow->setElement($fileRowElement);
			$fileRow->clickFileActionButton();
		} catch (\Exception $e) {
		}
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findDeleteAllSelectedFilesBtn() {
		$deleteAllSelectedBtn = $this->find(
			"xpath", $this->deleteAllSelectedBtnXpath
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
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findSelectAllFilesBtn() {
		$selectedAllFilesBtn = $this->find(
			"xpath", $this->selectAllFilesCheckboxXpath
		);
		$this->assertElementNotNull(
			$selectedAllFilesBtn,
			__METHOD__ .
			"could not find button $this->selectAllFilesCheckboxXpath to select all files"
		);
		return $selectedAllFilesBtn;
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteAllSelectedFiles(Session $session) {
		$this->findDeleteAllSelectedFilesBtn()->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$this->waitTillFileRowsAreReady($session);
	}

	/**
	 * selects the given file, ready for it to be included in a batch action
	 * if the row is already selected, then it will be unselected.
	 *
	 * @param string $name
	 * @param Session $session
	 *
	 * @return void
	 */
	public function selectFileForBatchAction($name, Session $session) {
		$row = $this->findFileRowByName($name, $session);
		$row->selectForBatchAction();
	}

	/**
	 *
	 * @return void
	 */
	public function selectAllFilesForBatchAction() {
		$this->findSelectAllFilesBtn()->click();
	}

	/**
	 *
	 * @param int $number
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findFileActionsMenuBtnByNo($number) {
		$xpathLocator = \sprintf($this->fileActionMenuBtnXpathByNo, $number);
		$actionMenuBtn = $this->find("xpath", $xpathLocator);
		$this->assertElementNotNull(
			$actionMenuBtn,
			__METHOD__ .
			" xpath $xpathLocator " .
			"could not find action menu button of file #$number"
		);
		return $actionMenuBtn;
	}

	/**
	 *
	 * @param int $number
	 *
	 * @return void
	 */
	public function clickFileActionsMenuBtnByNo($number) {
		$this->findFileActionsMenuBtnByNo($number)->click();
	}

	/**
	 *
	 * @param int $number
	 *
	 * @return FileActionsMenu
	 */
	public function openFileActionsMenuByNo($number) {
		$this->clickFileActionsMenuBtnByNo($number);
		$actionMenuElement = $this->findFileActionMenuElement();
		$actionMenu = $this->getPage('FilesPageElement\\FileActionsMenu');
		$actionMenu->setElement($actionMenuElement);
		return $actionMenu;
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function isFolderEmpty(Session $session) {
		$this->waitTillPageIsLoaded($session);
		$emptyContentElement = $this->find(
			"xpath",
			$this->getEmptyContentXpath()
		);

		if ($emptyContentElement !== null) {
			return $emptyContentElement->isVisible();
		}

		return false;
	}

	/**
	 * there is no reliable loading indicator on the files page, so wait for
	 * the table or the Empty Folder message to be shown
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = LONG_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$this->initAjaxCounters($session);
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$fileList = $this->find('xpath', $this->getFileListXpath());

			if ($fileList !== null) {
				try {
					$fileListIsVisible = $fileList->isVisible();
				} catch (NoSuchElement $e) {
					// Somehow on Edge this can throw NoSuchElement even though
					// we just found the file list.
					// TODO: Edge - if it keeps happening then find out why.
					\error_log(
						__METHOD__
						. " NoSuchElement while doing fileList->isVisible()"
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
					$fileListIsVisible = false;
				} catch (StaleElementReference $e) {
					// Somehow on Edge this can throw StaleElementReference
					// even though we just found the file list.
					// TODO: Edge - if it keeps happening then find out why.
					\error_log(
						__METHOD__
						. " StaleElementReference while doing fileList->isVisible()"
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
					$fileListIsVisible = false;
				}
				
				if ($fileListIsVisible
					&& $fileList->has("xpath", "//a")
				) {
					break;
				}

				$emptyContentElement = $this->find(
					"xpath",
					$this->getEmptyContentXpath()
				);

				if ($emptyContentElement !== null) {
					if (!$emptyContentElement->hasClass("hidden")) {
						break;
					}
				}
			}

			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for page to load"
			);
		}

		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 * when files have changes in progress to the server (e.g. rename or delete)
	 * then the corresponding rows of the file list are marked as busy.
	 * this function waits until no rows are busy, or it times out
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillFileRowsAreReady(
		Session $session,
		$timeout_msec = LONG_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$fileList = $this->find('xpath', $this->getFileListXpath());

			if ($fileList !== null) {
				$busyFileRows = $fileList->findAll(
					'xpath', $this->fileRowsBusyXpath
				);

				if (\count($busyFileRows) === 0) {
					break;
				}
			}

			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for file rows to be ready"
			);
		}
	}

	/**
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function enableShowHiddenFilesSettings() {
		$appSettingsButton = $this->find('xpath', $this->appSettingsXpath);
		$this->assertElementNotNull(
			$appSettingsButton,
			__METHOD__ .
			" xpath $this->appSettingsXpath " .
			"could not find the appSettings button"
		);
		$appSettingsButton->click();
		$appSettingsDiv = $this->findById($this->appSettingsContentId);
		$this->assertElementNotNull(
			$appSettingsDiv,
			__METHOD__ .
			" xpath $this->appSettingsContentId " .
			"could not find the appSettings section"
		);
		$timeout_msec = LONG_UI_WAIT_TIMEOUT_MILLISEC;
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($appSettingsDiv->getAttribute('style') !== $this->styleOfCheckboxWhenVisible) {
			if ($currentTime >= $end) {
				throw new \Exception(
					__METHOD__ .
					" timed out waiting for show hidden files checkbox to appear"
				);
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}
		
		$showHiddenFilesCheckBox = $this->find(
			'xpath', $this->showHiddenFilesCheckboxXpath
		);
		$this->assertElementNotNull(
			$showHiddenFilesCheckBox,
			__METHOD__ .
			" xpath $this->showHiddenFilesCheckboxXpath " .
			"could not find the field for show hidden files checkbox"
		);
		$showHiddenFilesCheckBox->click();
	}
}
