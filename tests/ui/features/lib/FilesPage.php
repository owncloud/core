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

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
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

	private $strForNormalFileName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

	/**
	 * created a folder with the given name.
	 * If name is not given a random one is choosen
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
		$this->fillField($this->newFolderNameInputLabel, $name . "\n");

		return $name;
	}
	public function getSizeOfFileFolderList()
	{
		return count(
			$this->find("xpath", $this->fileListXpath)->findAll("xpath", "tr")
		);
	}
	public function findActionMenuByNo($number) {
		$xpath = sprintf($this->fileActionMenuBtnXpathByNo,$number);
		return $this->find("xpath", $xpath);
	}

	/**
	 * finds the complete row of the file
	 * 
	 * @param string $name
	 * @param Session $session
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 */
	public function findFileRowByName($name, Session $session)
	{
		$lastFileNameCoordinates ["top"] = 0;
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
					return $fileNameSpans[$fileCounter]->find(
						"xpath", $this->fileRowFromNameXpath
					);
				}
				$previousFileCounter = $fileCounter;
			}

			// scroll to the bottom of the page
			// we need to scroll because the files app does only load a part of
			// the files in one screen
			$this->scrollDownAppContent(count($fileNameSpans), $session);
			
			$fileNameSpans = $this->find("xpath", $this->fileListXpath)->findAll(
				"xpath", $this->fileNamesXpath
			);
		}
	}

	/**
	 * scrolls down the file list, to load not yet displayed files
	 * @param int $numberOfFilesOld how many files were listed before the scroll.
	 * So we can guess how long to wait for the loading of new files to finish
	 * @param Session $session
	 * @param int $timeout
	 */
	public function scrollDownAppContent ($numberOfFilesOld, Session $session, $timeout=5)
	{
		$session->evaluateScript(
			'$("#' . $this->appContentId . '").scrollTop($("#' . $this->appContentId . '")[0].scrollHeight);'
		);
		
		// there is no loading indicator here, so we are going to wait until we have
		// more files than before
		for ($counter = 0; $counter <= $timeout; $counter ++) {
			$fileNameSpans = $this->find("xpath", $this->fileListXpath)->findAll(
				"xpath", $this->fileNamesXpath
			);
			if (count($fileNameSpans) > $numberOfFilesOld) {
				break;
			}
			sleep(1);
		}
	}

	/**
	 * Takes a row of a file and finds the Action Button in it
	 * @param \Behat\Mink\Element\NodeElement $fileRow
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 */
	public function findFileActionButtonInFileRow (\Behat\Mink\Element\NodeElement $fileRow)
	{
		return $fileRow->find("xpath", $this->fileActionMenuBtnXpath);
	}

	/**
	 * Takes a row of a file and finds the File Action in it
	 * the File Action Button must be clicked first
	 * @param \Behat\Mink\Element\NodeElement $fileRow
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 */
	public function findFileActionMenuInFileRow (\Behat\Mink\Element\NodeElement $fileRow)
	{
		return $fileRow->find("xpath", $this->fileActionMenuXpath);
	}

	/**
	 * finds the actual action link in the action menu
	 * @param string $action
	 * @param \Behat\Mink\Element\NodeElement $actionMenu
	 * @return \Behat\Mink\Element\NodeElement|NULL
	 */
	public function findButtonInActionMenu ($action, \Behat\Mink\Element\NodeElement $actionMenu)
	{
		return $actionMenu->find("xpath", 
			sprintf($this->fileActionXpath, $action)
		);
	}

	/**
	 * renames a file
	 * @param string $fromFileName
	 * @param string $toFileName
	 * @param Session $session
	 */
	public function renameFile($fromFileName, $toFileName, Session $session)
	{
		$fileRow=$this->findFileRowByName($fromFileName, $session);
		$actionMenuBtn=$this->findFileActionButtonInFileRow($fileRow);
		$actionMenuBtn->click();
		$actionMenu=$this->findFileActionMenuInFileRow($fileRow);
		$this->findButtonInActionMenu($this->renameActionLabel, $actionMenu)->click();
		$fileRow->find("xpath", $this->fileRenameInputXpath)->setValue($toFileName);
		$fileRow->find("xpath", $this->fileRenameInputXpath)->blur();
		$this->waitTillElementIsNull($this->fileBusyIndicatorXpath);
	}

	public function findDeleteByNo($number) {
		$xpath = sprintf($this->fileDeleteXpathByNo,$number);
		return $this->find("xpath", $xpath);
	}

	//there is no reliable loading indicator on the files page, so waiting for
	//the table or the Emplty Folder message to be shown
	public function waitTillPageIsloaded($timeout)
	{
		for ($counter = 0; $counter <= $timeout; $counter ++) {

			$fileList = $this->findById("fileList");
			if ($fileList !== null && ($fileList->has("xpath", "//a") || ! $this->find("xpath",
				$this->emptyContentXpath)->hasClass("hidden"))) {
				break;
			}
			sleep(1);
		}
	}

	/**
	 * returns the tooltip that is displayed next to the filename if something is wrong
	 * @param string $fileName
	 * @param Session $session
	 * @return string
	 */
	public function getTooltipOfFile ($fileName, Session $session)
	{
		$fileRow=$this->findFileRowByName($fileName, $session);
		return $fileRow->find("xpath", $this->fileTooltipXpath)->getText();
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