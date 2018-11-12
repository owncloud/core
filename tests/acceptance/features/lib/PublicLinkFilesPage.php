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
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use WebDriver\Exception\NoSuchElement;
use WebDriver\Exception\StaleElementReference;

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
	protected $singleFileDownloadBtnXpath = "//a[@id='downloadFile']";
	protected $textPreviewContainerXpath = "//div[@class='text-preview']";
	protected $remoteAddressInputId = "remote_address";
	protected $confirmBtnId = "save-button-confirm";
	protected $passwordFieldId = 'password';
	protected $passwordSubmitButtonId = 'password-submit';
	protected $warningMessageCss = '.warning';
	protected $deleteAllSelectedBtnXpath = "//a[@class='delete-selected']";
	/**
	 *
	 * @var FilesPageCRUD $filesPageCRUDFunctions
	 */
	protected $filesPageCRUDFunctions;

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
	 * @throws \Exception
	 * @return void
	 */
	protected function getFilePathInRowXpath() {
		throw new \Exception("not implemented in PublicLinkFilesPage");
	}

	/**
	 * @param Session $session
	 * @param Factory $factory
	 * @param array   $parameters
	 */
	public function __construct(
		Session $session, Factory $factory, array $parameters = []
	) {
		parent::__construct($session, $factory, $parameters);
		$this->filesPageCRUDFunctions = $this->getPage("FilesPageCRUD");
		$this->filesPageCRUDFunctions->setXpath(
			$this->emptyContentXpath,
			$this->fileListXpath,
			$this->fileNameMatchXpath,
			$this->fileNamesXpath,
			$this->deleteAllSelectedBtnXpath
		);
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
		$this->assertElementNotNull(
			$addToYourOcBtn,
			__METHOD__ .
			" id $this->addToYourOcBtnId could not find 'add to your owncloud' button"
		);
		$addToYourOcBtn->click();
		$remoteAddressInput = $this->findById($this->remoteAddressInputId);
		$this->assertElementNotNull(
			$remoteAddressInput,
			__METHOD__ .
			" id $this->remoteAddressInputId could not find remote address input field"
		);
		$remoteAddressInput->setValue($server);
		$confirmBtn = $this->findById($this->confirmBtnId);
		$this->assertElementNotNull(
			$confirmBtn,
			__METHOD__ .
			" id $this->confirmBtnId could not find confirm button"
		);
		$confirmBtn->click();
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
		return $this->filesPageCRUDFunctions->createFolder(
			$session, $name, $timeoutMsec
		);
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
		$this->filesPageCRUDFunctions->renameFile(
			$fromFileName, $toFileName, $session, $maxRetries
		);
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
		$this->filesPageCRUDFunctions->moveFileTo(
			$name, $destination, $session, $maxRetries
		);
	}

	/**
	 * returns the preview text displayed on single file download page
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getPreviewText() {
		$previewContainer = $this->find("xpath", $this->textPreviewContainerXpath);
		$this->assertElementNotNull(
			$previewContainer,
			__METHOD__ .
			" xpath $this->textPreviewContainerXpath " .
			" could not find preview text container"
		);
		return $previewContainer->getText();
	}

	/**
	 * returns the download url from single file download page
	 *
	 * @return string|null
	 * @throws ElementNotFoundException
	 */
	public function getDownloadUrl() {
		$downloadBtn = $this->find("xpath", $this->singleFileDownloadBtnXpath);
		$this->assertElementNotNull(
			$downloadBtn,
			__METHOD__ . " xpath $this->singleFileDownloadBtnXpath " .
			" could not find download button"
		);
		if ($downloadBtn->hasAttribute("href")) {
			return $downloadBtn->getAttribute("href");
		}
		return null;
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
		$this->assertElementNotNull(
			$passwordInputField,
			__METHOD__ .
			" id $this->passwordFieldId " .
			"could not find password field"
		);
		$passwordInputField->setValue($password);
		$passwordSubmitButton = $this->findById($this->passwordSubmitButtonId);
		$this->assertElementNotNull(
			$passwordSubmitButton,
			__METHOD__ .
			" id $this->passwordSubmitButtonId " .
			"could not find password submit button"
		);
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
		$this->assertElementNotNull(
			$warningMessageBox,
			__METHOD__ .
			" class $this->warningMessageCss " .
			"could not find warning message field"
		);
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
			$downloadButton = $this->find(
				"xpath", $this->singleFileDownloadBtnXpath
			);
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
			} elseif ($downloadButton !== null) {
				break;
			}

			\usleep(STANDARDSLEEPTIMEMICROSEC);
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
		$this->filesPageCRUDFunctions->deleteFile(
			$name, $session, $expectToDeleteFile, $maxRetries
		);
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteAllSelectedFiles(Session $session) {
		$this->filesPageCRUDFunctions->deleteAllSelectedFiles($session);
	}

	/**
	 *
	 * @param Session $session
	 * @param string $name
	 *
	 * @return void
	 */
	public function uploadFile(Session $session, $name) {
		$this->filesPageCRUDFunctions->uploadFile($session, $name);
	}

	/**
	 * waits till the upload progressbar is not visible anymore
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function waitForUploadProgressbarToFinish() {
		$this->filesPageCRUDFunctions->waitForUploadProgressbarToFinish();
	}
}
