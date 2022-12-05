<?php declare(strict_types=1);
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
use Exception;
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
	protected $uploadFormXpath = "//div[@class='uploadForm']";
	protected $emptyContentXpath = ".//div[@id='emptycontent']";
	protected $saveToOcButtonContainerId = "save";
	protected $saveToOcButtonExpandId = "save-to-oc-button-expand";
	protected $changeServerLinkId = "change-server";
	protected $changeServerPromptXpath = ".//div[@class='oc-dialog' and not(contains(@style,'display: none'))]";
	protected $changeServerPromptInputId = "oc-dialog-0-content-input";
	protected $DownloadBtnXpath = "//a[@id='download']";
	protected $directLinkXpath = "//input[@id='directLink']";
	protected $downloadFileXpath = "//a[@id='downloadFile']";
	protected $textPreviewContainerXpath = "//div[@class='text-preview']";
	protected $remoteAddressInputId = "remote_address";
	protected $confirmBtnId = "save-to-oc-button-confirm";
	protected $passwordFieldId = 'password';
	protected $passwordSubmitButtonId = 'password-submit';
	protected $warningMessageCss = '.warning';
	protected $deleteAllSelectedBtnXpath = "//a[@class='delete-selected']";
	protected $uploadedElementsCss = '.public-upload-view--completed';
	protected $uploadedElementsXpath = "//div[@class='public-upload-view--completed']//li";
	protected $saveToOcButtonId = "save-to-oc-button";

	/**
	 *
	 * @var FilesPageCRUD $filesPageCRUDFunctions
	 */
	protected $filesPageCRUDFunctions;

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
	 * {@inheritDoc}
	 *
	 * @return string
	 * @throws Exception
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 *
	 */
	protected function getFilePathInRowXpath(): string {
		throw new Exception(__METHOD__ . " not implemented in PublicLinkFilesPage");
	}

	/**
	 * @param Session $session
	 * @param Factory $factory
	 * @param array $parameters
	 */
	public function __construct(
		Session $session,
		Factory $factory,
		array $parameters = []
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
	 * check whether add to server button is present
	 *
	 * @return bool
	 * @throws ElementNotFoundException
	 */
	public function isAddtoServerButtonPresent(): bool {
		$addToYourOcBtn = $this->findById($this->saveToOcButtonContainerId);
		if ($addToYourOcBtn) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * adding public link share to particular server
	 *
	 * @param string $server
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function addToServer(string $server): void {
		$changeServerLink = $this->findById($this->changeServerLinkId);
		$saveToOcButtonExpand = $this->findById($this->saveToOcButtonExpandId);

		$this->assertElementNotNull(
			$saveToOcButtonExpand,
			__METHOD__ .
			" id $this->saveToOcButtonExpandId could not find 'expand save to owncloud' button"
		);

		$saveToOcButtonExpand->click();

		$this->assertElementNotNull(
			$changeServerLink,
			__METHOD__ .
			" id $this->saveToOcButtonExpandId could not find 'change server' link"
		);

		$changeServerLink->click();

		$changeServerPrompt  = $this->find('xpath', $this->changeServerPromptXpath);

		$this->assertElementNotNull(
			$changeServerPrompt,
			__METHOD__ .
			" could not find 'change server' prompt"
		);

		$changeServerPromptInput = $this->findById($this->changeServerPromptInputId);

		$this->assertElementNotNull(
			$changeServerPromptInput,
			__METHOD__ .
			" id $this->changeServerPromptInputId could not find 'change server' input field"
		);

		$changeServerPromptInput->setValue($server);

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
	 * @param string|null $name
	 * @param int $timeoutMsec
	 *
	 * @return string name of the created file
	 * @throws ElementNotFoundException|Exception
	 */
	public function createFolder(
		Session $session,
		?string  $name = null,
		int $timeoutMsec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): string {
		return $this->filesPageCRUDFunctions->createFolder(
			$session,
			$name,
			$timeoutMsec
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
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		$this->filesPageCRUDFunctions->renameFile(
			$fromFileName,
			$toFileName,
			$session,
			$maxRetries
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
		$name,
		$destination,
		Session $session,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		$this->filesPageCRUDFunctions->moveFileTo(
			$name,
			$destination,
			$session,
			$maxRetries
		);
	}

	/**
	 * returns the preview text displayed on single file download page
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getPreviewText(): string {
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
	public function getDownloadUrl(): ?string {
		$downloadBtn = $this->find("xpath", $this->DownloadBtnXpath);
		$this->assertElementNotNull(
			$downloadBtn,
			__METHOD__ . " xpath $this->DownloadBtnXpath " .
			" could not find download button"
		);
		if ($downloadBtn->hasAttribute("href")) {
			return $downloadBtn->getAttribute("href");
		}
		return null;
	}

	/**
	 * returns all the download url from single file download page
	 *
	 * @return array
	 * @throws ElementNotFoundException
	 */
	public function getAllDownloadUrls(): array {
		$downloadBtn = $this->find("xpath", $this->DownloadBtnXpath);
		$downloadFileBtn = $this->find("xpath", $this->downloadFileXpath);
		$directLink = $this->find("xpath", $this->directLinkXpath);
		$this->assertElementNotNull(
			$downloadBtn,
			__METHOD__ . " xpath $this->DownloadBtnXpath " .
			" could not find download button"
		);
		$this->assertElementNotNull(
			$downloadFileBtn,
			__METHOD__ . " xpath $this->DownloadBtnXpath " .
			" could not find download file button"
		);
		$this->assertElementNotNull(
			$directLink,
			__METHOD__ . " xpath $this->DownloadBtnXpath " .
			" could not find direct link"
		);
		$url1 = $downloadBtn->getAttribute("href");
		$url2 = $downloadFileBtn->getAttribute("href");
		$url3 = $directLink->getAttribute("value");
		return [$url1, $url2, $url3];
	}

	/**
	 * enter public link password
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function enterPublicLinkPassword(string $password): void {
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
	public function openPublicShareAuthenticateUrl(array $createdPublicLinks, string $baseUrl): void {
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
	public function getWarningMessage(): string {
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
	 * @throws ElementNotFoundException|Exception
	 */
	public function getTooltipOfFile(string $fileName, Session $session): string {
		throw new Exception(__METHOD__ . " not implemented in PublicLinkFilesPage");
	}

	/**
	 * there is no reliable loading indicator on the files page, so wait for
	 * the table or the Empty Folder message to be shown
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = LONG_UI_WAIT_TIMEOUT_MILLISEC
	):void {
		$this->initAjaxCounters($session);
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$fileList = $this->find('xpath', $this->getFileListXpath());
			$downloadButton = $this->find(
				"xpath",
				$this->DownloadBtnXpath
			);
			$uploadForm = $this->find(
				"xpath",
				$this->uploadFormXpath
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
			} elseif ($uploadForm !== null) {
				break;
			}

			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new Exception(
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
	 * @throws Exception
	 */
	public function deleteFile(
		$name,
		Session $session,
		bool $expectToDeleteFile = true,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		$this->filesPageCRUDFunctions->deleteFile(
			$name,
			$session,
			$expectToDeleteFile,
			$maxRetries
		);
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteAllSelectedFiles(Session $session): void {
		$this->filesPageCRUDFunctions->deleteAllSelectedFiles($session);
	}

	/**
	 *
	 * @param Session $session
	 * @param string $name
	 *
	 * @return void
	 */
	public function uploadFile(Session $session, string $name): void {
		$this->filesPageCRUDFunctions->uploadFile($session, $name);
	}

	/**
	 * waits till the upload progressbar is not visible anymore
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function waitForUploadProgressbarToFinish(): void {
		$this->filesPageCRUDFunctions->waitForUploadProgressbarToFinish();
	}

	/**
	 * returns list of completely uploaded elements
	 *
	 * @return array
	 */
	public function getCompletelyUploadedElements(): array {
		$uploadedElementsContainer = $this->find("css", $this->uploadedElementsCss);
		$this->assertElementNotNull(
			$uploadedElementsContainer,
			__METHOD__ .
			" CSS $this->uploadedElementsCss " .
			"is found NULL"
		);
		$elements = $this->findAll("xpath", $this->uploadedElementsXpath);
		$uploadedElements = [];
		foreach ($elements as $element) {
			\array_push($uploadedElements, $element->getText());
		}
		return $uploadedElements;
	}
}
