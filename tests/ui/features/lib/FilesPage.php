<?php

/**
* ownCloud
*
* @author Artur Neumann
* @copyright 2017 Artur Neumann info@individual-it.net
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use Behat\Mink\Session;

class FilesPage extends OwnCloudPage
{
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
	protected $fileRowFromNameXpath = "/../../..";
	protected $fileActionXpath = "//a[@data-action='%s']";
	protected $fileRenameInputXpath = "//input[contains(@class,'filename')]";
	protected $fileBusyIndicatorXpath = ".//*[@class='thumbnail' and contains(@style,'loading')]";
	protected $appContentId ="app-content";
	protected $renameActionLabel = "Rename";
	protected $fileTooltipXpath = ".//*[@class='tooltip-inner']";
	//TODO make simpler, only ID .//*[@id='fileList']
	protected $fileListXpath = ".//div[@id='app-content-files']//tbody[@id='fileList']";
	protected $fileDeleteXpathByNo = ".//*[@id='fileList']/tr[%d]//a[@data-action='Delete']";
	protected $shareBtnXpath = "//a[@data-action='Share']";
	protected $loadingIndicatorXpath = ".//*[@class='loading']";

	private $strForNormalFileName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

	/**
	 * create a folder with the given name.
	 * If name is not given a random one is chosen
	 *
	 * @param string $name
	 */
	public function createFolder($name = null)
	{
		if ($name === null) {
			$name = substr(str_shuffle($this->strForNormalFileName), 0, 8);
		}
		$this->find("xpath", $this->newFileFolderButtonXpath)->click();
		$this->find("xpath", $this->newFolderButtonXpath)->click();
		try {
			$this->fillField($this->newFolderNameInputLabel, $name . "\n");
		} catch (\WebDriver\Exception\NoSuchElement $e) {
			//this seems to be a bug in MinkSelenium2Driver. Used to work fine in 1.3.1 but now throws this exception
			//actually all that we need does happen, so we just don't do anything
		}
		return $name;
	}

	public function getSizeOfFileFolderList()
	{
		return count(
			$this->find("xpath", $this->fileListXpath)->findAll("xpath", "tr")
		);
	}
	public function findActionMenuByNo($number)
	{
		$xpath = sprintf($this->fileActionMenuBtnXpathByNo,$number);
		return $this->find("xpath", $xpath);
	}

	/**
	 * finds the complete row of the file
	 *
	 * @param string $name
	 * @param Session $session
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findFileRowByName($name, Session $session)
	{
		$appContentHeight = 0;
		$previousFileCounter = 0;
		$fileNameSpans = array();

		$fileNameSpans = $this->find("xpath", $this->fileListXpath)->findAll(
			"xpath", $this->fileNamesXpath
		);
		//loop to keep on scrolling down to load not viewed files
		//when the file count is not increasing, the file is not there
		while ($previousFileCounter < count($fileNameSpans)) {
			//check every file if the name is the one we are searching for
			//but no need to check names that we checked already ($previousFileCounter)
			for ($fileCounter = $previousFileCounter;
				$fileCounter < count($fileNameSpans);
				$fileCounter ++) {
				//found the file
				if ($fileNameSpans[$fileCounter]->getText() === $name ||
					strip_tags($fileNameSpans[$fileCounter]->getHtml()) === $name) {
					$fileRow = $fileNameSpans[$fileCounter]->find(
						"xpath", $this->fileRowFromNameXpath
					);
					if ($fileRow === null) {
						throw new ElementNotFoundException("could not find fileRow with xpath '" . $this->fileRowFromNameXpath . "'");
					} else {
						return $fileRow;
					}
				}
			}
			$previousFileCounter = count($fileNameSpans);
			// scroll to the bottom of the page
			// we need to scroll because the files app only loads a part of
			// the files in one screen
			$this->scrollDownAppContent(count($fileNameSpans), $session);

			$fileNameSpans = $this->find("xpath", $this->fileListXpath)->findAll(
				"xpath", $this->fileNamesXpath
			);
		}
		throw new ElementNotFoundException("could not find file with the name '" . $name ."'");
	}

	/**
	 * opens the sharing dialog for a given file/folder name
	 * returns the SharingDialog Object
	 * @param string $name
	 * @param Session $session
	 * @return SharingDialog
	 */
	public function openSharingDialog ($name, Session $session)
	{
		$fileRow = $this->findFileRowByName($name, $session);
		$fileRow->find("xpath", $this->shareBtnXpath)->click();
		$this->waitTillElementIsNull($this->loadingIndicatorXpath);
		return $this->getPage("SharingDialog");
	}

	/**
	 * scrolls down the file list, to load not yet displayed files
	 * @param int $numberOfFilesOld how many files were listed before the scroll.
	 * So we can guess how long to wait for the loading of new files to finish
	 * @param Session $session
	 * @param int $timeout_msec
	 */
	public function scrollDownAppContent ($numberOfFilesOld, Session $session, $timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC)
	{
		$session->evaluateScript(
			'$("#' . $this->appContentId . '").scrollTop($("#' . $this->appContentId . '")[0].scrollHeight);'
		);

		// there is no loading indicator here, so we are going to wait until we have
		// more files than before
		$currentTime = microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$this->waitForOutstandingAjaxCalls($session);
			$fileNameSpans = $this->find("xpath", $this->fileListXpath)->findAll(
				"xpath", $this->fileNamesXpath
			);
			if (count($fileNameSpans) >= $numberOfFilesOld) {
				break;
			}
			usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = microtime(true);
		}
	}

	/**
	 * Takes a row of a file and finds the Action Button in it
	 * @param \Behat\Mink\Element\NodeElement $fileRow
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findFileActionButtonInFileRow (\Behat\Mink\Element\NodeElement $fileRow)
	{
		$actionButton = $fileRow->find("xpath", $this->fileActionMenuBtnXpath);
		if ($actionButton === null) {
			throw new ElementNotFoundException("could not find actionButton in fileRow");
		} else {
			return $actionButton;
		}
	}

	/**
	 * Takes a row of a file and finds the File Action Menu in it
	 * the File Action Button must be clicked first
	 * @param \Behat\Mink\Element\NodeElement $fileRow
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findFileActionMenuInFileRow (\Behat\Mink\Element\NodeElement $fileRow)
	{
		$this->waitTillElementIsNotNull($this->fileActionMenuXpath);
		$actionMenu = $fileRow->find("xpath", $this->fileActionMenuXpath);
		if ($actionMenu === null) {
			throw new ElementNotFoundException("could not find actionMenu in fileRow");
		} else {
			return $actionMenu;
		}
	}

	/**
	 * finds the actual action link in the action menu
	 * @param string $action
	 * @param \Behat\Mink\Element\NodeElement $actionMenu
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function findButtonInActionMenu ($action, \Behat\Mink\Element\NodeElement $actionMenu)
	{
		$this->waitTillElementIsNotNull(sprintf($this->fileActionXpath, $action));
		$button = $actionMenu->find("xpath",
			sprintf($this->fileActionXpath, $action)
		);
		if ($button === null) {
			throw new ElementNotFoundException("could not find button '$action' in action Menu");
		} else {
			return $button;
		}
	}

	/**
	 * renames a file
	 * @param string $fromFileName
	 * @param string $toFileName
	 * @param Session $session
	 * @param int $maxRetries
	 */
	public function renameFile($fromFileName, $toFileName, Session $session, $maxRetries = 5)
	{
		for ($counter = 0; $counter < $maxRetries; $counter++) {
			try {
				$this->_renameFile($fromFileName, $toFileName, $session);
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

	private function _renameFile($fromFileName, $toFileName, Session $session)
	{
		$fileRow = $this->findFileRowByName($fromFileName, $session);
		$actionMenuBtn = $this->findFileActionButtonInFileRow($fileRow);
		$actionMenuBtn->click();
		$actionMenu = $this->findFileActionMenuInFileRow($fileRow);
		$renameBtn = $this->findButtonInActionMenu($this->renameActionLabel, $actionMenu);
		$renameBtn->click();
		$this->waitTillElementIsNotNull($this->fileRenameInputXpath);
		$inputField = $fileRow->find("xpath", $this->fileRenameInputXpath);
		if ($inputField === null) {
			throw new ElementNotFoundException("could not find input field");
		}
		$this->cleanInputAndSetValue($inputField, $toFileName);
		$inputField->blur();
		$this->waitTillElementIsNull($this->fileBusyIndicatorXpath);
	}

	public function findDeleteByNo($number)
	{
		$xpath = sprintf($this->fileDeleteXpathByNo,$number);
		return $this->find("xpath", $xpath);
	}

	//there is no reliable loading indicator on the files page, so wait for
	//the table or the Empty Folder message to be shown
	public function waitTillPageIsLoaded(Session $session, $timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC)
	{
		$currentTime = microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$fileList = $this->findById("fileList");
			if ($fileList !== null && ($fileList->has("xpath", "//a") || ! $this->find("xpath",
				$this->emptyContentXpath)->hasClass("hidden"))) {
				break;
			}
			usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = microtime(true);
		}
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 * returns the tooltip that is displayed next to the filename if something is wrong
	 * @param string $fileName
	 * @param Session $session
	 * @return string
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function getTooltipOfFile ($fileName, Session $session)
	{
		$fileRow = $this->findFileRowByName($fileName, $session);
		$tooltip = $fileRow->find("xpath", $this->fileTooltipXpath)->getText();
		if ($tooltip === null) {
			throw new ElementNotFoundException("could not find tooltip of file '$fileName'");
		} else {
			return $tooltip;
		}
	}

	/**
	 * same as the original open() function but with a more slack
	 * URL verification as oC adds some extra parameters to the URL e.g.
	 * "files/?dir=/&fileid=2"
	 * {@inheritDoc}
	 * @see \SensioLabs\Behat\PageObjectExtension\PageObject\Page::open()
	 */
	public function open(array $urlParameters = array())
	{
		$url = $this->getUrl($urlParameters);

		$this->getDriver()->visit($url);

		$this->verifyResponse();
		if (strpos($this->getDriver()->getCurrentUrl(),
			$this->getUrl($urlParameters)) === false) {
			throw new UnexpectedPageException(
				sprintf('Expected to be on "%s" but found "%s" instead',
					$this->getUrl($urlParameters),
					$this->getDriver()->getCurrentUrl()));
		}
		$this->verifyPage();

		return $this;
	}
}