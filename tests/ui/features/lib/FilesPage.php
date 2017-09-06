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

use Page\FilesPageElement\FileRow;
use Page\FilesPageElement\SharingDialog;
use Page\FilesPageElement\FileActionsMenu;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use Behat\Mink\Session;

/**
 * Files page.
 */
class FilesPage extends OwnCloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/';
	protected $emptyContentXpath = ".//*[@id='emptycontent']";

	protected $newFileFolderButtonXpath = './/*[@id="controls"]//a[@class="button new"]';
	protected $newFolderButtonXpath = './/div[contains(@class, "newFileMenu")]//a[@data-templatename="New folder"]';
	protected $newFolderNameInputLabel = 'New folder';
	protected $fileActionMenuBtnXpathByNo = ".//*[@id='fileList']/tr[%d]//a[@data-action='menu']";
	protected $fileActionMenuBtnXpath = "//a[@data-action='menu']";
	protected $fileActionMenuXpath = "//div[contains(@class,'fileActionsMenu')]";
	protected $fileNamesXpath = "//span[@class='nametext']";
	protected $fileNameMatchXpath = "//span[@class='nametext' and .=%s]";
	protected $fileRowFromNameXpath = "/../../..";
	protected $appContentId = "app-content";
	//TODO make simpler, only ID .//*[@id='fileList']
	protected $fileListXpath = ".//div[@id='app-content-files']//tbody[@id='fileList']";
	protected $loadingIndicatorXpath = ".//*[@class='loading']";
	protected $deleteAllSelectedBtnXpath = ".//*[@id='app-content-files']//*[@class='delete-selected']";

	private $strForNormalFileName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

	/**
	 * create a folder with the given name.
	 * If name is not given a random one is chosen
	 *
	 * @param string $name
	 * @return string name of the created file
	 */
	public function createFolder($name = null) {
		if ($name === null) {
			$name = substr(str_shuffle($this->strForNormalFileName), 0, 8);
		}
		$this->find("xpath", $this->newFileFolderButtonXpath)->click();
		$this->find("xpath", $this->newFolderButtonXpath)->click();
		try {
			$this->fillField($this->newFolderNameInputLabel, $name . "\n");
		} catch (\WebDriver\Exception\NoSuchElement $e) {
			// this seems to be a bug in MinkSelenium2Driver.
			// Used to work fine in 1.3.1 but now throws this exception
			// Actually all that we need does happen, so we just don't do anything
		}
		return $name;
	}

	/**
	 * @return int the number of files and folders listed on the page
	 */
	public function getSizeOfFileFolderList() {
		return count(
			$this->find("xpath", $this->fileListXpath)->findAll(
				"xpath", $this->fileNamesXpath
			)
		);
	}

	/**
	 * Surround the text with single or double quotes, whichever does not
	 * already appear in the text. If the text contains both single and
	 * double quotes, then throw an InvalidArgumentException.
	 *
	 * The returned string is intended for use as part of an xpath (v1).
	 * xpath (v1) has no way to escape the quote character within a string
	 * literal. So there is no way to directly use a string containing
	 * both single and double quotes.
	 *
	 * @param string $text
	 * @return string the text surrounded by single or double quotes
	 * @throws \InvalidArgumentException
	 */
	public function quotedText($text) {
		if (strstr($text, "'") === false) {
			return "'" . $text . "'";
		} else if (strstr($text, '"') === false) {
			return '"' . $text . '"';
		} else {
			// The text contains both single and double quotes.
			// With current xpath v1 there is no way to encode that.
			throw new \InvalidArgumentException(
				"mixing both single and double quotes is unsupported - '"
				. $text . "'"
			);
		}
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
	 * finds the complete row of the file and scrolls the row into view
	 *
	 * @param string|array $name
	 * @param Session $session
	 * @return FileRow
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findFileRowByName($name, Session $session) {
		$previousFileCount = 0;
		$currentFileCount = null;
		$this->scrollToPosition('#' . $this->appContentId, 0, $session);

		if (is_array($name)) {
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
			$name = implode($name);
		} else {
			$xpathString = $this->quotedText($name);
		}

		//loop to keep on scrolling down to load not viewed files
		//when the scroll does not retrieve any new files, the file is not there
		do {
			$fileNameMatch = $this->find("xpath", $this->fileListXpath)->find(
				"xpath", sprintf($this->fileNameMatchXpath, $xpathString)
			);

			if (is_null($fileNameMatch)) {
				if (is_null($currentFileCount)) {
					$currentFileCount = $this->getSizeOfFileFolderList();
				}
				$previousFileCount = $currentFileCount;
				$this->scrollDownAppContent($session);
				$currentFileCount = $this->getSizeOfFileFolderList();
			}
		} while (
			is_null($fileNameMatch)
			&& ($currentFileCount > $previousFileCount)
		);

		if (is_null($fileNameMatch)) {
			throw new ElementNotFoundException(
				"could not find file with the name '" . $name . "'"
			);
		}

		$fileRowElement = $fileNameMatch->find("xpath", $this->fileRowFromNameXpath);

		if (is_null($fileRowElement)) {
			throw new ElementNotFoundException(
				"could not find fileRow with xpath '"
				. $this->fileRowFromNameXpath . "'"
			);
		}

		// We might have scrolled past the element, so bring it into view
		$this->scrollIntoView(
			'#' . $this->appContentId,
			$session
		);

		$fileRow = $this->getPage('FilesPageElement\\FileRow');
		$fileRow->setElement($fileRowElement);
		$fileRow->setName($name);
		return $fileRow;
	}

	/**
	 * opens the sharing dialog for a given file/folder name
	 * returns the SharingDialog Object
	 * 
	 * @param string $fileName
	 * @param Session $session
	 * @return SharingDialog
	 */
	public function openSharingDialog($fileName, Session $session) {
		$fileRow = $this->findFileRowByName($fileName, $session);
		return $fileRow->openSharingDialog();
	}

	/**
	 * closes an open sharing dialog
	 * 
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 * if no sharing dialog is open
	 * @return void
	 */
	public function closeSharingDialog() {
		$this->getPage('FilesPageElement\\SharingDialog')->closeSharingDialog();
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
			'$("#' . $this->appContentId . '")[0].scrollHeight',
			$session
		);
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 * Finds the open File Action Menu
	 * the File Action Button must be clicked first
	 * 
	 * @return \Behat\Mink\Element\NodeElement
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findFileActionMenuElement() {
		$this->waitTillElementIsNotNull($this->fileActionMenuXpath);
		$actionMenu = $this->find("xpath", $this->fileActionMenuXpath);
		if ($actionMenu === null) {
			throw new ElementNotFoundException("could not find open fileActionMenu");
		} else {
			return $actionMenu;
		}
	}

	/**
	 * opens a file or navigates into a folder
	 * 
	 * @param string $name
	 * @param Session $session
	 * @return void
	 */
	public function openFile($name, Session $session) {
		$fileRow = $this->findFileRowByName($name, $session);
		$fileRow->openFileFolder();
	}
	/**
	 * renames a file
	 *
	 * @param string|array $fromFileName
	 * @param string|array $toFileName
	 * @param Session $session
	 * @param int $maxRetries
	 * @return void
	 */
	public function renameFile(
		$fromFileName,
		$toFileName,
		Session $session,
		$maxRetries = 5
	) {
		if (is_array($toFileName)) {
			$toFileName = implode($toFileName);
		}

		for ($counter = 0; $counter < $maxRetries; $counter++) {
			try {
				$fileRow = $this->findFileRowByName($fromFileName, $session);
				$fileRow->rename($toFileName);
				break;
			} catch (\Exception $e) {
				error_log(
					"Error while renaming file"
					. "\n-------------------------\n"
					. $e->getMessage()
					. "\n-------------------------\n"
				);
			}
		}
		if ($counter > 0) {
			$message = "INFORMATION: retried to rename file " . $counter . " times";
			echo $message;
			error_log($message);
		}
	}

	/**
	 * 
	 * @param string $name
	 * @param Session $session
	 * @return void
	 */
	public function deleteFile($name, Session $session) {
		$row = $this->findFileRowByName($name, $session);
		$row->delete();
		$this->waitForAjaxCallsToStartAndFinish($session);
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
		$xpath = sprintf($this->fileActionMenuBtnXpathByNo, $number);
		$actionMenuBtn = $this->find("xpath", $xpath);
		if ($actionMenuBtn === null) {
			throw new ElementNotFoundException(
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
		$timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC
	) {
		$currentTime = microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$fileList = $this->findById("fileList");
			if ($fileList !== null
				&& ($fileList->has("xpath", "//a")
				|| ! $this->find(
					"xpath",
					$this->emptyContentXpath
				)->hasClass("hidden"))
			) {
				break;
			}
			usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = microtime(true);
		}
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 * returns the tooltip that is displayed next to the filename
	 * if something is wrong
	 *
	 * @param string $fileName
	 * @param Session $session
	 * @return string
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
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
	 * @return FilesPage
	 * @see \SensioLabs\Behat\PageObjectExtension\PageObject\Page::open()
	 */
	public function open(array $urlParameters = array()) {
		$url = $this->getUrl($urlParameters);

		$this->getDriver()->visit($url);

		$this->verifyResponse();
		if (strpos(
			$this->getDriver()->getCurrentUrl(),
			$this->getUrl($urlParameters)
		) === false
		) {
			throw new UnexpectedPageException(
				sprintf(
					'Expected to be on "%s" but found "%s" instead',
					$this->getUrl($urlParameters),
					$this->getDriver()->getCurrentUrl()
				)
			);
		}
		$this->verifyPage();

		return $this;
	}
}