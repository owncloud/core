<?php

/**
 * ownCloud
 *
 * @author Dipak Acharya <dipak@jankaritech.com>
 * @copyright Copyright (c) 2018 Dipak Acharya dipak@jankaritech.com
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

namespace Page\FilesPageElement;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Object of a row on the FilesPage
 */
class TrashBinFileRow extends FileRow {
	/**
	 * @param string $xpath
	 *
	 * @return null|string
	 */
	public function getFilePath($xpath) {
		$fileRowLabel = $this->rowElement->find("xpath", $xpath);
		$filePath = $fileRowLabel->getAttribute("data-original-title");
		return ($filePath);
	}
}
