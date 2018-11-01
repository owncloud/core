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

use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Page\OwncloudPage;
use Page\FilesPageElement\LockDialogElement\LockEntry;

/**
 * The Lock Dialog, lists all the locks and gives a posibility to delete them
 *
 */
class LockDialog extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/';
	/**
	 * @var NodeElement of this dialog
	 */
	protected $dialogElement;
	protected $lockEntriesXpath = "//div[@class='lock-entry']";

	/**
	 * sets the NodeElement for the current dialog
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by
	 * $this->getPage("FilesPageElement\\LockDialog")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $dialogElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $dialogElement) {
		$this->dialogElement = $dialogElement;
	}

	/**
	 * 
	 * @return LockEntry[]
	 */
	public function getAllLocks() {
		$lockEntryElements = $this->dialogElement->findAll("xpath", $this->lockEntriesXpath);
		$lockEntries = [];
		foreach ($lockEntryElements as $lockEntryElement) {
			/**
			 *
			 * @var LockEntry $lockEntry
			 */
			$lockEntry = $this->getPage("FilesPageElement\\LockDialogElement\\LockEntry");
			$lockEntry->setElement($lockEntryElement);
			$lockEntries[] = $lockEntry;
		}
		return $lockEntries;
	}

	public function deleteLockByNumber($number, Session $session) {
		$lockEntryElements = $this->dialogElement->findAll("xpath", $this->lockEntriesXpath);
		/**
		 * 
		 * @var LockEntry $lockEntry
		 */
		$lockEntry = $this->getPage("FilesPageElement\\LockDialogElement\\LockEntry");
		$lockEntry->setElement($lockEntryElements[$number - 1]);
		$lockEntry->delete($session);
	}

	public function deleteLockByUserAndLockingResource($user, $resource) {
		;
	}
}
