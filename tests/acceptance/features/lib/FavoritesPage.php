<?php
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
	protected $fileNamesXpath = "//span[@class='nametext']";
	protected $fileNameMatchXpath = "//span[@class='nametext' and .=%s]";
	protected $fileListXpath = ".//div[@id='app-content-favorites']//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='app-content-favorites']//div[@id='emptycontent']";
	protected $filePathInRowXpath = "//*[@data-tags='_\$!<Favorite>!\$_']";
	
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
	 * @return string
	 */
	protected function getFilePathInRowXpath() {
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
	public function findAllFileRowsByName($name, Session $session) {
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
