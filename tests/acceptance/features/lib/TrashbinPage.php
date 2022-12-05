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

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Exception;
use Page\FilesPageElement\FileRow;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Trashbin page.
 */
class TrashbinPage extends FilesPageBasic {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/?view=trashbin';
	protected $fileNamesXpath = "//span[contains(@class,'nametext') and not(contains(@class,'innernametext'))]";
	protected $fileNameMatchXpath = "//span[contains(@class,'nametext') and not(contains(@class,'innernametext')) and .=%s]";
	protected $fileListXpath = ".//div[@id='app-content-trashbin']//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='app-content-trashbin']//div[@id='emptycontent']";
	protected $deleteAllSelectedBtnXpath = ".//*[@id='app-content-trashbin']//*[@class='delete-selected']";
	protected $restoreAllSelectedBtnXpath = ".//*[@id='app-content-trashbin']//*[@class='undelete']";
	protected $restoreAllSelectedMobileBtnXpath = ".//*[@id='app-content-trashbin']//*[@class='undelete mobile button']";
	protected $selectAllFilesCheckboxXpath = "//label[@for='select_all_trash']";
	protected $filePathInRowXpath = "//span[@class='nametext extra-data']";
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
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 *
	 */
	protected function getFilePathInRowXpath(): string {
		return $this->filePathInRowXpath;
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
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function findRestoreAllSelectedFilesBtn(): NodeElement {
		$mobileResolution = getenv("MOBILE_RESOLUTION");
		// checking if MOBILE_RESOLUTION is set
		if (!empty($mobileResolution)) {
			// using different xpath for restore button in mobile resolution
			$restoreAllSelectedBtn = $this->find(
				"xpath",
				$this->restoreAllSelectedMobileBtnXpath
			);
			$this->assertElementNotNull(
				$restoreAllSelectedBtn,
				__METHOD__ .
				" xpath $this->restoreAllSelectedMobileBtnXpath " .
				"could not find button to restore all selected files"
			);
			return $restoreAllSelectedBtn;
		}
		$restoreAllSelectedBtn = $this->find(
			"xpath",
			$this->restoreAllSelectedBtnXpath
		);
		$this->assertElementNotNull(
			$restoreAllSelectedBtn,
			__METHOD__ .
			" xpath $this->restoreAllSelectedBtnXpath " .
			"could not find button to restore all selected files"
		);
		return $restoreAllSelectedBtn;
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function restoreAllSelectedFiles(Session $session): void {
		$this->findRestoreAllSelectedFilesBtn()->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$this->waitTillFileRowsAreReady($session);
	}

	/**
	 *
	 * @param string $fname
	 * @param Session $session
	 *
	 * @return void
	 */
	public function restore(string $fname, Session $session): void {
		$row = $this->findFileRowByName($fname, $session);
		$row->restore($session);
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
	public function findAllFileRowsByName($name, Session $session): array {
		$fileRowElements = $this->getFileRowElementsByName($name, $session);
		$fileRows = [];
		foreach ($fileRowElements as $fileRowElement) {
			$fileRow = $this->getPage('FilesPageElement\\TrashBinFileRow');
			$fileRow->setElement($fileRowElement);
			$fileRow->setName($name);
			$fileRows[] = $fileRow;
		}
		return $fileRows;
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
}
