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

namespace Page;

use Behat\Mink\Session;
use Page\FilesPageElement\FileActionsMenu;
use Page\FilesPageElement\FileRow;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use WebDriver\Exception\NoSuchElement;
use WebDriver\Exception\StaleElementReference;

/**
 * Common elements/methods for all Files Pages
 */
abstract class FilesPageBasic extends OwnCloudPage {

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
	 * @return int the number of files and folders listed on the page
	 */
	public function getSizeOfFileFolderList() {
		$fileListElement = $this->find("xpath", $this->getFileListXpath());

		if (is_null($fileListElement)) {
			return 0;
		}

		return count(
			$fileListElement->findAll("xpath", $this->getFileNamesXpath())
		);
	}

	/**
	 * @param int $number
	 * @return \Behat\Mink\Element\NodeElement|null
	 */
	public function findActionMenuByNo($number) {
		$xpath = sprintf($this->fileActionMenuBtnXpathByNo, $number);
		return $this->find("xpath", $xpath);
	}

	/**
	 * finds the complete row of the file
	 *
	 * @param string|array $name
	 * @param Session $session
	 * @return FileRow
	 * @throws ElementNotFoundException
	 */
	public function findFileRowByName($name, Session $session) {
		$previousFileCount = 0;
		$currentFileCount = null;
		$spaceLeftTillBottom = 0;
		$this->scrollToPosition('#' . $this->appContentId, 0, $session);

		if (is_array($name)) {
			if (count($name) === 1) {
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

			$name = implode($name);
		} else {
			$xpathString = $this->quotedText($name);
		}

		//loop to keep on scrolling down to load not viewed files
		//when the scroll does not retrieve any new files, the file is not there
		do {
			$fileListElement = $this->waitTillElementIsNotNull($this->getFileListXpath());

			if (is_null($fileListElement)) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath " . $this->getFileListXpath() .
					" could not find file list"
				);
			}

			$fileNameMatch = $fileListElement->find(
				"xpath", sprintf($this->getFileNameMatchXpath(), $xpathString)
			);

			if (is_null($fileNameMatch)) {
				$fileNameMatchIsVisible = false;
			} else {
				try {
					$fileNameMatchIsVisible = $fileNameMatch->isVisible();
				} catch (NoSuchElement $e) {
					// Somehow on Edge this can throw NoSuchElement even though
					// we just found the file name.
					// TODO: Edge - if it keeps happening then find out why.
					error_log(
						__METHOD__
						. " NoSuchElement while doing fileNameMatch->isVisible()"
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
					$fileNameMatchIsVisible = false;
				}
			}

			if ($fileNameMatchIsVisible) {
				$fileNameMatch->focus();
			} else {
				if (is_null($currentFileCount)) {
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

		if (is_null($fileNameMatch)) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" could not find file with the name '" . $name . "'"
			);
		}

		$fileRowElement = $fileNameMatch->find("xpath", $this->fileRowFromNameXpath);

		if (is_null($fileRowElement)) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->fileRowFromNameXpath " .
				"could not find file row"
			);
		}
		$fileRow = $this->getPage('FilesPageElement\\FileRow');
		$fileRow->setElement($fileRowElement);
		$fileRow->setName($name);
		return $fileRow;
	}

	/**
	 * scrolls down the file list, to load not yet displayed files
	 *
	 * @param Session $session
	 * @return void
	 */
	public function scrollDownAppContent(Session $session) {
		$this->scrollToPosition(
			'#' . $this->appContentId,
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
	 * @return \Behat\Mink\Element\NodeElement
	 * @throws ElementNotFoundException
	 */
	public function findFileActionMenuElement() {
		$actionMenu = $this->waitTillElementIsNotNull($this->fileActionMenuXpath);
		if (is_null($actionMenu)) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->fileActionMenuXpath " .
				"could not find open fileActionMenu"
			);
		} else {
			return $actionMenu;
		}
	}

	/**
	 * opens a file or navigates into a folder
	 *
	 * @param string|array $name
	 * @param Session $session
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
	 * @return void
	 */
	public function deleteFile($name, Session $session) {
		$row = $this->findFileRowByName($name, $session);
		$row->delete($session);
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return \Behat\Mink\Element\NodeElement
	 */
	public function findDeleteAllSelectedFilesBtn() {
		$deleteAllSelectedBtn = $this->find(
			"xpath", $this->deleteAllSelectedBtnXpath
		);
		if (is_null($deleteAllSelectedBtn)) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->deleteAllSelectedBtnXpath " .
				"could not find button to delete all selected files"
			);
		}
		return $deleteAllSelectedBtn;
	}

	/**
	 *
	 * @param Session $session
	 * @return void
	 */
	public function deleteAllSelectedFiles(Session $session) {
		$this->findDeleteAllSelectedFilesBtn()->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @param string $name
	 * @param Session $session
	 * @return void
	 */
	public function selectFileForBatchAction($name, Session $session) {
		$row = $this->findFileRowByName($name, $session);
		$row->selectForBatchAction();
	}

	/**
	 *
	 * @param int $number
	 * @throws ElementNotFoundException
	 * @return \Behat\Mink\Element\NodeElement
	 */
	public function findFileActionsMenuBtnByNo($number) {
		$xpathLocator = sprintf($this->fileActionMenuBtnXpathByNo, $number);
		$actionMenuBtn = $this->find("xpath", $xpathLocator);
		if (is_null($actionMenuBtn)) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $xpathLocator " .
				"could not find action menu button of file #$number"
			);
		}
		return $actionMenuBtn;
	}

	/**
	 *
	 * @param int $number
	 * @return void
	 */
	public function clickFileActionsMenuBtnByNo($number) {
		$this->findFileActionsMenuBtnByNo($number)->click();
	}

	/**
	 *
	 * @param int $number
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
	 * there is no reliable loading indicator on the files page, so wait for
	 * the table or the Empty Folder message to be shown
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = LONGUIWAITTIMEOUTMILLISEC
	) {
		$currentTime = microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$fileList = $this->find('xpath', $this->getFileListXpath());

			if (!is_null($fileList)) {
				try {
					$fileListIsVisible = $fileList->isVisible();
				} catch (NoSuchElement $e) {
					// Somehow on Edge this can throw NoSuchElement even though
					// we just found the file list.
					// TODO: Edge - if it keeps happening then find out why.
					error_log(
						__METHOD__
						. " NoSuchElement while doing fileList->isVisible()"
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
					$fileListIsVisible = false;
				} catch (StaleElementReference $e) {
					// Somehow on Edge this can throw StaleElementReference even though
					// we just found the file list.
					// TODO: Edge - if it keeps happening then find out why.
					error_log(
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

				if (!is_null($emptyContentElement)) {
					if (!$emptyContentElement->hasClass("hidden")) {
						break;
					}
				}
			}

			usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = microtime(true);
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
	 * @return void
	 */
	public function waitTillFileRowsAreReady(
		Session $session,
		$timeout_msec = LONGUIWAITTIMEOUTMILLISEC
	) {
		$currentTime = microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$fileList = $this->find('xpath', $this->getFileListXpath());

			if (!is_null($fileList)) {
				$busyFileRows = $fileList->findAll('xpath', $this->fileRowsBusyXpath);

				if (count($busyFileRows) === 0) {
					break;
				}
			}

			usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for file rows to be ready"
			);
		}
	}
}