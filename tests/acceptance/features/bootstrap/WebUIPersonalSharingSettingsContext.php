<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2019 Artur Neumann artur@jankaritech.com
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

require_once 'bootstrap.php';

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use PHPUnit\Framework\Assert;
use Tests\Acceptance\Page\PersonalSharingSettingsPage;

/**
 * steps for personal sharing settings
 */
class WebUIPersonalSharingSettingsContext extends RawMinkContext implements Context {
	private PersonalSharingSettingsPage $personalSharingSettingsPage;

	/**
	 *
	 * @param PersonalSharingSettingsPage $personalSharingSettingsPage
	 */
	public function __construct(
		PersonalSharingSettingsPage $personalSharingSettingsPage
	) {
		$this->personalSharingSettingsPage = $personalSharingSettingsPage;
	}

	/**
	 * @When the user browses to the personal sharing settings page
	 * @Given the user has browsed to the personal sharing settings page
	 *
	 * @return void
	 */
	public function theUserBrowsesToThePersonalSharingSettingsPage():void {
		$this->personalSharingSettingsPage->open();
		$this->personalSharingSettingsPage->waitTillPageIsLoaded(
			$this->getSession()
		);
	}

	/**
	 * @When /^the user (disables|enables) automatically accepting new incoming local shares$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function switchAutoAcceptingLocalShares(string $action):void {
		$this->personalSharingSettingsPage->toggleAutoAcceptingLocalShares(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the user (disables|enables) automatically accepting federated shares from trusted servers$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function switchAutoAcceptingFederatedShares(string $action):void {
		$this->personalSharingSettingsPage->toggleAutoAcceptingFederatedShares(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @When /^the user (disables|enables) allow finding you via autocomplete in share dialog$/
	 *
	 * @param string $action
	 *
	 * @return void
	 */
	public function switchAllowFindingYouViaAutocompleteInShareDialog(string $action):void {
		$this->personalSharingSettingsPage->toggleFindingYouViaAutocomplete(
			$this->getSession(),
			$action
		);
	}

	/**
	 * @Then User-based auto accepting checkbox should not be displayed on the personal sharing settings page on the webUI
	 *
	 * @return void
	 */
	public function autoAcceptingCheckboxShouldNotBeDisplayedOnThePersonalSharingSettingsPageOnTheWebui():void {
		Assert::assertFalse(
			$this->personalSharingSettingsPage->isAutoAcceptLocalSharesCheckboxDisplayed(),
			__METHOD__
			. " User-based auto accepting checkbox is displayed on the personal sharing settings page."
		);
	}

	/**
	 * @Then User-based auto accepting from trusted servers checkbox should not be displayed on the personal sharing settings page on the webUI
	 *
	 * @return void
	 */
	public function autoAcceptingFederatedCheckboxShouldNotBeDisplayedOnThePersonalSharingSettingsPageOnTheWebui():void {
		Assert::assertFalse(
			$this->personalSharingSettingsPage->isAutoAcceptFederatedSharesCheckboxDisplayed(),
			__METHOD__
			. " User-based auto accepting from trusted servers checkbox is displayed on the personal sharing settings page."
		);
	}

	/**
	 * @Then allow finding you via autocomplete checkbox should not be displayed on the personal sharing settings page
	 *
	 * @return void
	 */
	public function allowFindingYouViaAutocompleteCheckboxShouldNotBeDisplayedOnThePersonalSharingSettingsPage():void {
		Assert::assertFalse(
			$this->personalSharingSettingsPage->isAllowFindingYouViaAutocompleteCheckboxDisplayed(),
			__METHOD__
			. " Allow finding you via autocomplete checkbox is displayed on the personal sharing settings page."
		);
	}
}
