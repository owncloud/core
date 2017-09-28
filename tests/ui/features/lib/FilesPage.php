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

use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
use Page\FilesPageElement\SharingDialog;
use Behat\Mink\Session;

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
	protected $newFileFolderButtonXpath = './/*[@id="controls"]//a[@class="button new"]';
	protected $newFolderButtonXpath = './/div[contains(@class, "newFileMenu")]//a[@data-templatename="New folder"]';
	protected $newFolderNameInputLabel = 'New folder';
	
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
	 * Returns the same <0, 0, >0 as strcmp()
	 * But the names can be in pieces in an array or as plain strings
	 *
	 * @param string|array $name1
	 * @param string|array $name2
	 * @return int
	 */
	public function strcmpNames($name1, $name2) {
		if (is_array($name1)) {
			$name1 = implode($name1);
		}
		if (is_array($name2)) {
			$name2 = implode($name2);
		}

		return strcmp($name1, $name2);
	}

	/**
	 * moves a file or folder into an other folder by drag and drop
	 * 
	 * @param string|array $name
	 * @param string|array $destination
	 * @param Session $session
	 * @return void
	 */
	public function moveFileTo($name, $destination, Session $session) {
		// The "top" item needs to be found last, so that it is at the top
		// of the displayed scroll window and the other file will be somewhere
		// below it. dragTo does not work when trying to drag somewhere that
		// is up the list out of view.
		if ($this->strcmpNames($destination, $name) < 0) {
			$toMoveFileRow = $this->findFileRowByName($name, $session);
			$destinationFileRow = $this->findFileRowByName($destination, $session);
		} else {
			$destinationFileRow = $this->findFileRowByName($destination, $session);
			$toMoveFileRow = $this->findFileRowByName($name, $session);
		}
		$toMoveFileRow->findFileLink()->dragTo($destinationFileRow->findFileLink());
		$this->waitForAjaxCallsToStartAndFinish($session);
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