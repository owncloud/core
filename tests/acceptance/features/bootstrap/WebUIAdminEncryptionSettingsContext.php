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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\AdminEncryptionSettingsPage;

require_once 'bootstrap.php';

/**
 * Context for admin encryption settings specific webUI steps
 */
class WebUIAdminEncryptionSettingsContext extends RawMinkContext implements Context {
	private WebUIGeneralContext $webUIGeneralContext;
	private AdminEncryptionSettingsPage $adminEncryptionSettingsPage;

	/**
	 * WebUIAdminEncryptionSettingsContext constructor.
	 *
	 * @param AdminEncryptionSettingsPage $adminEncryptionSettingsPage
	 */
	public function __construct(
		AdminEncryptionSettingsPage $adminEncryptionSettingsPage
	) {
		$this->adminEncryptionSettingsPage = $adminEncryptionSettingsPage;
	}

	/**
	 * @Given the administrator has browsed to the admin encryption settings page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasBrowsedToTheAdminEncryptionSettingsPage():void {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->adminEncryptionSettingsPage->open();
		$this->adminEncryptionSettingsPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given the administrator has enabled recovery key and set the recovery key to :recoveryKey
	 *
	 * @param string $recoveryKey
	 *
	 * @return void
	 */
	public function theAdministratorHasEnabledRecoveryKeyAndSetRecoveryKeyTo(string $recoveryKey):void {
		$this->adminEncryptionSettingsPage->enableRecoveryKeyAndSetRecoveryKeyTo($recoveryKey);
		$this->adminEncryptionSettingsPage->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}
}
