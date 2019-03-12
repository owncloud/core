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

namespace Page\FilesPageElement\LockDialogElement;

use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Page\OwncloudPage;

/**
 * A single Lock Entry
 *
 */
class LockEntry extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/';
	/**
	 * @var NodeElement of this dialog
	 */
	protected $lockElement;
	protected $lockDescriptionXpath = "/div";
	protected $lockingUserExtractPattern = "/^(.*)\shas locked/";
	protected $unlockButtonXpath = "/a[@class='unlock']";

	/**
	 * sets the NodeElement for the current entry
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by
	 * $this->getPage("FilesPageElement\\LockDialog")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $lockElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $lockElement) {
		$this->lockElement = $lockElement;
	}

	/**
	 * delete the lock
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function delete(Session $session) {
		$unlockButton = $this->lockElement->find("xpath", $this->unlockButtonXpath);
		$this->assertElementNotNull(
			$unlockButton,
			__METHOD__ . " xpath $this->unlockButtonXpath " .
			" cannot find unlock button"
		);
		$unlockButton->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * gets the user that has locked the resource
	 *
	 * @throws \Exception
	 *
	 * @return string
	 */
	public function getLockingUser() {
		$lockDescriptionElement = $this->lockElement->find(
			"xpath", $this->lockDescriptionXpath
		);
		$this->assertElementNotNull(
			$lockDescriptionElement,
			__METHOD__ . " xpath $this->lockDescriptionXpath " .
			" cannot find lock description element"
		);
		$matches = [];
		if (\preg_match(
			$this->lockingUserExtractPattern,
			$lockDescriptionElement->getText(),
			$matches
		)
		) {
			return $matches [1];
		}
		throw new \Exception(
			"could not extract locking user name from lock description '" .
			$lockDescriptionElement->getText() . "'"
		);
	}

	/**
	 * @return void
	 */
	public function getLockingResource() {
		throw new \Exception("not yet implemented");
	}
}
