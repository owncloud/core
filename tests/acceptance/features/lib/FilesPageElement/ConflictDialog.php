<?php

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

namespace Page\FilesPageElement;

use Page\OwncloudPageElement\OCDialog;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Object for the conflict dialog that appears when uploading a file that
 * already exists.
 */
class ConflictDialog extends OCDialog {
	private $keepNewFilesCheckXpath = "//label[@for='checkbox-allnewfiles']";
	private $keepExistingFilesCheckXpath = "//label[@for='checkbox-allexistingfiles']";
	
	/**
	 * takes the xpath and selects the option with that xpath
	 *
	 * @param string $xpath
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	private function keepFiles($xpath) {
		$checkBox = $this->dialogElement->find("xpath", $xpath);
		$this->assertElementNotNull(
			$checkBox,
			__METHOD__ .
			" xpath $xpath " .
			"could not find checkbox/label"
		);
		$checkBox->click();
	}

	/**
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function keepExistingFiles() {
		$this->keepFiles($this->keepExistingFilesCheckXpath);
	}

	/**
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function keepNewFiles() {
		$this->keepFiles($this->keepNewFilesCheckXpath);
	}
}
