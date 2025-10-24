<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Saugat Pachhai <saugat@jankaritech.com>
 * @copyright Copyright (c) 2018 Saugat Pachhai <saugat@jankaritech.com>
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

namespace Tests\Acceptance\Page;

use Behat\Mink\Session;
use Exception;
use Page\FilesPageElement\FileRow;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Shared With Others page.
 */
class SharedWithOthersPage extends FilesPageBasic {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/?view=sharingout';
	protected $fileNamesXpath = "//span[contains(@class,'nametext') and not(contains(@class,'innernametext'))]";
	protected $fileNameMatchXpath = "//span[contains(@class,'nametext') and not(contains(@class,'innernametext')) and .=%s]";
	protected $fileListXpath = ".//div[@id='app-content-sharingout']//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='app-content-sharingout']//div[@id='emptycontent']";
	protected $filePathInRowXpath = ".//div[@id='app-content-sharingout']//tbody[@id='fileList']//tr";
	protected $deleteAllSelectedBtnXpath = ".//*[@id='app-content-files']//*[@class='delete-selected']";
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
			$fileRow = $this->getPage('FilesPageElement\\SharedWithOthersFileRow');
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
