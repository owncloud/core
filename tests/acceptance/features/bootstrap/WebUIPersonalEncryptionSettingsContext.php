<?php
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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\PersonalEncryptionSettingsPage;
use Page\OwncloudPage;

require_once 'bootstrap.php';

/**
 * Context for personal encryption settings specific webUI steps
 */
class WebUIPersonalEncryptionSettingsContext extends RawMinkContext implements Context {

	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 *
	 * @var OwncloudPage
	 */
	private $owncloudPage;

	/**
	 *
	 * @var PersonalEncryptionSettingsPage
	 */
	private $personalEncryptionSettingsPage;

	/**
	 * WebUIPersonalEncryptionSettingsContext constructor.
	 *
	 * @param OwncloudPage $owncloudPage
	 * @param PersonalEncryptionSettingsPage $personalEncryptionSettingsPage
	 */
	public function __construct(
		OwncloudPage $owncloudPage,
		PersonalEncryptionSettingsPage $personalEncryptionSettingsPage
	) {
		$this->owncloudPage = $owncloudPage;
		$this->personalEncryptionSettingsPage = $personalEncryptionSettingsPage;
	}

	/**
	 * @Given the user/administrator has browsed to the personal encryption settings page
	 *
	 * @return void
	 */
	public function theUserHasBrowsedToThePersonalEncryptionSettingsPage() {
		$this->personalEncryptionSettingsPage->open();
		$this->personalEncryptionSettingsPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Given the user/administrator has enabled password recovery
	 *
	 * @return void
	 */
	public function theUserHasEnabledPasswordRecovery() {
		$this->personalEncryptionSettingsPage->enablePasswordRecovery();
		$this->personalEncryptionSettingsPage->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}
}
