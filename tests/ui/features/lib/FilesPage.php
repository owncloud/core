<?php

/**
* ownCloud
*
* @author Artur Neumann
* @copyright 2017 Artur Neumann info@individual-it.net
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;


class FilesPage extends OwnCloudPage
{
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/';
	protected $emptyContentXpath = ".//*[@id='emptycontent']";

	protected $newFileFolderButtonXpath = './/*[@id="controls"]//a[@class="button new"]';
	protected $newFolderButtonXpath = './/div[contains(@class, "newFileMenu")]//a[@data-templatename="New folder"]';
	protected $newFolderNameInputLabel = 'New folder';
	protected $fileActionMenuXpathByNo = ".//*[@id='fileList']/tr[%d]//a[@data-action='menu']";
	protected $fileListXpath = ".//div[@id='app-content-files']//tbody[@id='fileList']";
	protected $fileDeleteXpathByNo = ".//*[@id='fileList']/tr[%d]//a[@data-action='Delete']";

	private $strForNormalFileName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	
	/**
	 * created a folder with the given name.
	 * If name is not given a random one is choosen
	 *
	 * @param string $name
	 */
	public function createFolder($name = null)
	{
		if ($name === null) {
			$name = substr(str_shuffle($this->strForNormalFileName), 0, 8);
		}
		$this->find("xpath", $this->newFileFolderButtonXpath)->click();
		$this->find("xpath", $this->newFolderButtonXpath)->click();
		$this->fillField($this->newFolderNameInputLabel, $name . "\n");

		return $name;
	}
	public function getSizeOfFileFolderList()
	{
		return count(
			$this->find("xpath", $this->fileListXpath)->findAll("xpath", "tr")
		);
	}
	public function findActionMenuByNo($number) {
		$xpath = sprintf($this->fileActionMenuXpathByNo,$number);
		return $this->find("xpath", $xpath);
	}

	public function findDeleteByNo($number) {
		$xpath = sprintf($this->fileDeleteXpathByNo,$number);
		return $this->find("xpath", $xpath);
	}

	//there is no reliable loading indicator on the files page, so waiting for
	//the table or the Emplty Folder message to be shown
	public function waitTillPageIsloaded($timeout)
	{
		for ($counter = 0; $counter <= $timeout; $counter ++) {

			$fileList = $this->findById("fileList");
			if ($fileList !== null && ($fileList->has("xpath", "//a") || ! $this->find("xpath",
				$this->emptyContentXpath)->hasClass("hidden"))) {
				break;
			}
			sleep(1);
		}
	}

	/**
	 * same as the original open() function but with a more slack
	 * URL verification as oC adds some extra parameters to the URL e.g.
	 * "files/?dir=/&fileid=2"
	 * {@inheritDoc}
	 * @see \SensioLabs\Behat\PageObjectExtension\PageObject\Page::open()
	 */
	public function open(array $urlParameters = array())
	{
		$url = $this->getUrl($urlParameters);

		$this->getDriver()->visit($url);

		$this->verifyResponse();
		if (strpos($this->getDriver()->getCurrentUrl(),
			$this->getUrl($urlParameters)) === false) {
			throw new UnexpectedPageException(
				sprintf('Expected to be on "%s" but found "%s" instead',
					$this->getUrl($urlParameters),
					$this->getDriver()->getCurrentUrl()));
		}
		$this->verifyPage();

		return $this;
	}
}