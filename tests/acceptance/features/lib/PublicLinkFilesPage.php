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
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Files page of a public link
 */
class PublicLinkFilesPage extends FilesPageBasic {
	protected $path = '';
	protected $fileNamesXpath = "//span[@class='nametext']";
	protected $fileNameMatchXpath = "//span[@class='nametext' and .=%s]";
	protected $fileListXpath = ".//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='emptycontent']";
	protected $addToYourOcBtnId = "save-button";
	protected $remoteAddressInputId = "remote_address";
	protected $confirmBtnId = "save-button-confirm";

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
	 * adding public share to particular server
	 *
	 * @param string $server
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function addToServer($server) {
		$addToYourOcBtn = $this->findById($this->addToYourOcBtnId);
		if ($addToYourOcBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id " . $this->addToYourOcBtnId .
				" could not find 'add to your owncloud' button"
			);
		}
		$addToYourOcBtn->click();
		$remoteAddressInput = $this->findById($this->remoteAddressInputId);
		if ($remoteAddressInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id " . $this->remoteAddressInput .
				" could not find remote address input field"
			);
		}
		$remoteAddressInput->setValue($server);
		$confirmBtn = $this->findById($this->confirmBtnId);
		if ($confirmBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id " . $this->confirmBtn .
				" could not find confirm button"
			);
		}
		$confirmBtn->click();
	}
	
	/**
	 * create a folder with the given name.
	 * If name is not given a random one is chosen
	 *
	 * @param string $name
	 *
	 * @throws ElementNotFoundException
	 * @return string name of the created file
	 */
	public function createFolder($name = null) {
		throw new \Exception("not implemented");
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
		$maxRetries = STANDARDRETRYCOUNT
	) {
		throw new \Exception("not implemented");
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
		$name, $destination, Session $session, $maxRetries = STANDARDRETRYCOUNT
	) {
		throw new \Exception("not implemented");
	}

	/**
	 * returns the tooltip that is displayed next to the filename
	 * if something is wrong
	 *
	 * @param string $fileName
	 * @param Session $session
	 *
	 * @return string
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function getTooltipOfFile($fileName, Session $session) {
		throw new \Exception("not implemented");
	}
}
