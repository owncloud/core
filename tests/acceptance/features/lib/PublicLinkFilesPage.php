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
	protected $passwordFieldId = 'password';
	protected $passwordSubmitButtonId = 'password-submit';
	protected $warningMessageCss = '.warning';

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
	 *
	 * {@inheritDoc}
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 */
	protected function getFilePathInRowXpath() {
		throw new \Exception("not implemented in PublicLinkFilesPage");
	}

	/**
	 * adding public link share to particular server
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
				" id $this->addToYourOcBtnId could not find 'add to your owncloud' button"
			);
		}
		$addToYourOcBtn->click();
		$remoteAddressInput = $this->findById($this->remoteAddressInputId);
		if ($remoteAddressInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->remoteAddressInputId could not find remote address input field"
			);
		}
		$remoteAddressInput->setValue($server);
		$confirmBtn = $this->findById($this->confirmBtnId);
		if ($confirmBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->confirmBtnId could not find confirm button"
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
	 * enter public link password
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function enterPublicLinkPassword($password) {
		$passwordInputField = $this->findById($this->passwordFieldId);
		if ($passwordInputField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->passwordFieldId " .
				"could not find password field"
			);
		}
		$passwordInputField->setValue($password);
		$passwordSubmitButton = $this->findById($this->passwordSubmitButtonId);
		if ($passwordSubmitButton === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->passwordSubmitButtonId " .
				"could not find password submit button"
			);
		}
		$passwordSubmitButton->click();
	}

	/**
	 * open public share authenticate url
	 *
	 * @param array $createdPublicLinks
	 * @param string $baseUrl
	 *
	 * @return void
	 */
	public function openPublicShareAuthenticateUrl($createdPublicLinks, $baseUrl) {
		$lastCreatedLink = \end($createdPublicLinks);
		$path = \str_replace(
			$baseUrl,
			"",
			$lastCreatedLink['url']
		);
		$this->setPagePath($path . '/authenticate');
		$this->open();
	}

	/**
	 * get warning message
	 *
	 * @return string
	 */
	public function getWarningMessage() {
		$warningMessageBox = $this->find('css', $this->warningMessageCss);
		if ($warningMessageBox === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" class $this->warningMessageClass " .
				"could not find warning message field"
			);
		}
		$warningMessage = $warningMessageBox->getText();
		return $warningMessage;
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
		throw new \Exception("not implemented");
	}
}
