<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Paurakh Sharma Humagain <paurakh@jankaritech.com>
 * @copyright Copyright (c) 2018 Paurakh Sharma Humagain <paurakh@jankaritech.com>
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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\PersonalEncryptionSettingsPage;

require_once 'bootstrap.php';

/**
 * Context for personal encryption settings specific webUI steps
 */
class WebUIPersonalEncryptionSettingsContext extends RawMinkContext implements Context {
	private PersonalEncryptionSettingsPage $personalEncryptionSettingsPage;

	/**
	 * WebUIPersonalEncryptionSettingsContext constructor.
	 *
	 * @param PersonalEncryptionSettingsPage $personalEncryptionSettingsPage
	 */
	public function __construct(
		PersonalEncryptionSettingsPage $personalEncryptionSettingsPage
	) {
		$this->personalEncryptionSettingsPage = $personalEncryptionSettingsPage;
	}

	/**
	 * @Given the user/administrator has browsed to the personal encryption settings page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasBrowsedToThePersonalEncryptionSettingsPage():void {
		$this->personalEncryptionSettingsPage->open();
		$this->personalEncryptionSettingsPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given the user/administrator has enabled password recovery
	 *
	 * @return void
	 */
	public function theUserHasEnabledPasswordRecovery():void {
		$this->personalEncryptionSettingsPage->enablePasswordRecovery();
		$this->personalEncryptionSettingsPage->waitForAjaxCallsToStartAndFinish($this->getSession());
	}
}
