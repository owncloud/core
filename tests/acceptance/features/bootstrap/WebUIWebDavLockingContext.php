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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\FilesPage;
use Page\SharedWithYouPage;

require_once 'bootstrap.php';

/**
 * context containing webUI steps needed for the locking mechanism of webdav
 */
class WebUIWebDavLockingContext extends RawMinkContext implements Context {

	/**
	 *
	 * @var FilesPage
	 */
	private $filesPage;

	/**
	 *
	 * @var SharedWithYouPage
	 */
	private $sharedWithYouPage;
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	private $uploadConflictDialogTitle = "file conflict";

	/**
	 * WebUIFilesContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param SharedWithYouPage $sharedWithYouPage
	 *
	 * @return void
	 */
	public function __construct(
		FilesPage $filesPage,
		SharedWithYouPage $sharedWithYouPage
	) {
		$this->filesPage = $filesPage;
		$this->sharedWithYouPage = $sharedWithYouPage;
	}

	/**
	 * @When the user unlocks the lock no :lockNumber of the file/folder :file on the webUI
	 *
	 * @param int $lockNumber
	 * @param string $file
	 */
	public function unlockFileOnTheWebui($lockNumber, $file) {
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
			//ignoge if dialog cannot be closed
			//most likely there is no dialog open
		}
		
		$fileRow = $this->filesPage->findFileRowByName($file, $this->getSession());
		$fileRow->deleteLockByNumber($lockNumber, $this->getSession());
	}

	/**
	 * @Then the file/folder :file should be marked as locked on the webUI
	 */
	public function theFileShouldBeMarkedAsLockedOnTheWebui($file) {
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
			//ignoge if dialog cannot be closed
			//most likely there is no dialog open
		}
		$fileRow = $this->filesPage->findFileRowByName($file, $this->getSession());
		PHPUnit_Framework_Assert::assertTrue(
			$fileRow->getLockState(),
			"'$file' should be marked as locked, but its not"
		);
	}

	/**
	 * @Then the file/folder :file should not be marked as locked on the webUI
	 */
	public function theFileShouldNotBeMarkedAsLockedOnTheWebui($file) {
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
			//ignoge if dialog cannot be closed
			//most likely there is no dialog open
		}
		$fileRow = $this->filesPage->findFileRowByName($file, $this->getSession());
		PHPUnit_Framework_Assert::assertFalse(
			$fileRow->getLockState(),
			"'$file' should not be marked as locked, but it is"
		);
	}
	
	/**
	 * @Then the file/folder :file should be marked as locked by user :lockedBy in the locks tab of the details panel on the webUI
	 */
	public function theFileShouldBeMarkedAsLockedByUserInLocksTab(
		$file, $lockedBy
	) {
		try {
			$this->filesPage->closeDetailsDialog();
		} catch (Exception $e) {
			//ignoge if dialog cannot be closed
			//most likely there is no dialog open
		}
		$fileRow = $this->filesPage->findFileRowByName($file, $this->getSession());
		$lockDialog = $fileRow->openLockDialog();
		$locks = $lockDialog->getAllLocks();
		foreach ($locks as $lock) {
			$locker = $lock->getLockingUser();
			if ($lockedBy === $locker) {
				return true;
			}
		}
		PHPUnit_Framework_Assert::fail("cannot find a lock set by $lockedBy");
	}
}
