<?php declare(strict_types=1);
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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use PHPUnit\Framework\Assert;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

require_once 'bootstrap.php';

/**
 * context containing webUI steps needed for the locking mechanism of webdav
 */
class WebUIWebDavLockingContext extends RawMinkContext implements Context {
	private WebUIGeneralContext $webUIGeneralContext;

	/**
	 * WebUIFilesContext constructor.
	 *
	 * @return void
	 */
	public function __construct(
	) {
	}

	/**
	 * @When the user unlocks the lock no :lockNumber of file/folder :file on the webUI
	 *
	 * @param int $lockNumber
	 * @param string $file
	 *
	 * @return void
	 */
	public function unlockFileOnTheWebui(int $lockNumber, string $file):void {
		$this->closeDetailsDialog();
		$pageObject = $this->webUIGeneralContext->getCurrentPageObject();
		$fileRow = $pageObject->findFileRowByName($file, $this->getSession());
		$fileRow->deleteLockByNumber($lockNumber, $this->getSession());
	}

	/**
	 * @Then file/folder :file should be marked as locked on the webUI
	 *
	 * @param string $file
	 *
	 * @return void
	 */
	public function theFileShouldBeMarkedAsLockedOnTheWebui(string $file):void {
		$this->closeDetailsDialog();
		$pageObject = $this->webUIGeneralContext->getCurrentPageObject();
		$fileRow = $pageObject->findFileRowByName($file, $this->getSession());
		Assert::assertTrue(
			$fileRow->getLockState(),
			"'$file' should be marked as locked, but its not"
		);
	}

	/**
	 * @Then file/folder :file should not be marked as locked on the webUI
	 *
	 * @param string $file
	 *
	 * @return void
	 */
	public function theFileShouldNotBeMarkedAsLockedOnTheWebui(string $file):void {
		$this->closeDetailsDialog();
		$pageObject = $this->webUIGeneralContext->getCurrentPageObject();
		$fileRow = $pageObject->findFileRowByName($file, $this->getSession());
		Assert::assertFalse(
			$fileRow->getLockState(),
			"'$file' should not be marked as locked, but it is"
		);
	}

	/**
	 * @Then /^(?:file|folder) "([^"]*)" should (not|)\s?be marked as locked by user "([^"]*)" in the locks tab of the details panel on the webUI$/
	 *
	 * @param string $file
	 * @param string $shouldOrNot
	 * @param string $lockedBy
	 *
	 * @return boolean true if the requested check was successful
	 */
	public function theFileShouldBeMarkedAsLockedByUserInLocksTab(
		string $file,
		string $shouldOrNot,
		string $lockedBy
	):bool {
		$should = ($shouldOrNot !== "not");
		$this->closeDetailsDialog();
		$pageObject = $this->webUIGeneralContext->getCurrentPageObject();
		$fileRow = $pageObject->findFileRowByName($file, $this->getSession());
		try {
			$lockDialog = $fileRow->openLockDialog();
		} catch (ElementNotFoundException $e) {
			if ($should) {
				Assert::fail(
					"looking for a lock set by $lockedBy but no lock dialog exists"
				);
			} else {
				// There is no lock dialog element,
				// so the item is definitely not marked as locked
				return true;
			}
		}
		$locks = $lockDialog->getAllLocks();
		foreach ($locks as $lock) {
			$locker = $lock->getLockingUser();
			if ($lockedBy === $locker) {
				if ($should) {
					return true;
				} else {
					Assert::fail(
						"found a lock set by $lockedBy that should not be listed"
					);
				}
			}
		}
		if ($should) {
			Assert::fail("cannot find a lock set by $lockedBy");
		} else {
			return true;
		}
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}

	/**
	 * closes any open details dialog but ignores any error (e.g. no dialog open)
	 *
	 * @return void
	 */
	private function closeDetailsDialog():void {
		$pageObject = $this->webUIGeneralContext->getCurrentPageObject();
		try {
			$pageObject->closeDetailsDialog();
		} catch (Exception $e) {
			//ignore if dialog cannot be closed,
			//most likely there is no dialog open
		}
	}
}
