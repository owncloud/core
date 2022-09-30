<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Bijay Sharma/Moheet Shrestha <trainees@jankaritech.com>
 * @copyright Copyright (c) 2017 Bijay Sharma/Moheet Shrestha trainees@jankaritech.com
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
use Page\FilesPageElement\FileRow;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Favorites page.
 */
class FavoritesPage extends FilesPageBasic {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/?view=favorites';
	protected $fileNamesXpath = "//span[@class='nametext extra-data']";
	protected $fileNameMatchXpath = "//span[contains(@class,'nametext') and not(contains(@class,'innernametext')) and .=%s]";
	protected $fileListXpath = ".//div[@id='app-content-favorites']//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='app-content-favorites']//div[@id='emptycontent']";
	protected $filePathInRowXpath = "//span[@class='nametext extra-data']";

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
			$fileRow = $this->getPage('FilesPageElement\\FavoritesFileRow');
			$fileRow->setElement($fileRowElement);
			$fileRow->setName($name);
			$fileRows[] = $fileRow;
		}
		return $fileRows;
	}
}
