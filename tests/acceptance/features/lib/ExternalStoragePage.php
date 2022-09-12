<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Swikriti Tripathi <swikriti@jankaritech.com>
 * @copyright Copyright (c) 2021 Swikriti Tripathi <swikriti@jankaritech.com>
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

use Exception;

/**
 * External Storage page.
 */
class ExternalStoragePage extends FilesPageBasic {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/?view=extstoragemounts';
	protected $fileNamesXpath = "//span[@class='nametext']";
	protected $fileNameMatchXpath = "//span[@class='nametext' and .=%s]";
	protected $fileListXpath = ".//div[@id='app-content-extstoragemounts']//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='app-content-extstoragemounts']//div[@id='emptycontent']";

	/**
	 *
	 * @return string
	 *
	 */
	protected function getFileListXpath(): string {
		return $this->fileListXpath;
	}

	/**
	 *
	 * @return string
	 *
	 */
	protected function getFileNamesXpath(): string {
		return $this->fileNamesXpath;
	}

	/**
	 *
	 * @return string
	 *
	 */
	protected function getFileNameMatchXpath(): string {
		return $this->fileNameMatchXpath;
	}

	/**
	 *
	 * @return string
	 *
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
		throw new Exception(__METHOD__ . " not implemented in ExternalStoragePage");
	}
}
