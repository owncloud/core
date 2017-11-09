<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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

use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use Behat\Mink\Session;

/**
 * Files page of a public link
 */
class PublicLinkFilesPage extends FilesPageBasic {
	protected $path = '';
	protected $fileNamesXpath = "//span[@class='nametext']";
	protected $fileNameMatchXpath = "//span[@class='nametext' and .=%s]";
	protected $fileListXpath = ".//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='emptycontent']";

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
	 * create a folder with the given name.
	 * If name is not given a random one is chosen
	 *
	 * @param string $name
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
	 * @return void
	 */
	public function renameFile(
		$fromFileName,
		$toFileName,
		Session $session,
		$maxRetries = 5
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
	 * @return void
	 */
	public function moveFileTo(
		$name, $destination, Session $session, $maxRetries = 5
	) {
		throw new \Exception("not implemented");
	}

	/**
	 * returns the tooltip that is displayed next to the filename
	 * if something is wrong
	 *
	 * @param string $fileName
	 * @param Session $session
	 * @return string
	 * @throws \SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException
	 */
	public function getTooltipOfFile($fileName, Session $session) {
		throw new \Exception("not implemented");
	}
}