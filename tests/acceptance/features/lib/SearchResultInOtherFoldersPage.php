<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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

/**
 * Page that shows the search results.
 */
class SearchResultInOtherFoldersPage extends FilesPageBasic {
	protected $emptyContentXpath = ".//div[@id='searchresults']//div[@class='emptycontent']";
	protected $fileListXpath = ".//div[@id='searchresults']//tbody";
	protected $fileNameMatchXpath = "//div[@class='name' and .=%s]";
	protected $fileNamesXpath = "//div[@class='name']";
	protected $filePathInRowXpath = "//div[@class='path']";

	/**
	 * @return string
	 */
	protected function getEmptyContentXpath() {
		return $this->emptyContentXpath;
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
	protected function getFileNamesXpath() {
		return $this->fileNamesXpath;
	}

	/**
	 * @return string
	 */
	protected function getFileListXpath() {
		return $this->fileListXpath;
	}

	/**
	 * @return string
	 */
	protected function getFilePathInRowXpath() {
		return $this->filePathInRowXpath;
	}
}
