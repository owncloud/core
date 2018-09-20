<?php

/**
 * ownCloud
 *
 * @author Paurakh Sharma Humagain <paurakh@jankaritech.com>
 * @copyright Copyright (c) 2018 Paurakh Sharma Humagain paurakh@jankaritech.com
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
namespace Page;

use Behat\Mink\Session;

/**
 * Admin Apps Settings page.
 */
class AdminAppsSettingsPage extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/admin?sectionid=apps';

	protected $showDisabledAppsButtonId = 'button-apps-disabled';
	protected $appEnableDisableButtonXpath = "//div[@id='app-%s']//input[@class='enable']";

	/**
	 * Browse to disabled app page
	 *
	 * @return void
	 */
	public function browseToDisabledAppsPage() {
		$showDisablesAppsButton = $this->findById($this->showDisabledAppsButtonId);
		$showDisablesAppsButton->click();
	}

	/**
	 * Disable the app
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function disableApp($appName) {
		$appDisableButton = $this->find(
			"xpath", \sprintf($this->appEnableDisableButtonXpath, $appName)
		);
		$appDisableButton->click();
	}

	/**
	 * Enable the app
	 *
	 * @param string $appName
	 *
	 * @return void
	 */
	public function enableApp($appName) {
		$appEnableButton = $this->find(
			"xpath", \sprintf($this->appEnableDisableButtonXpath, $appName)
		);
		$appEnableButton->click();
	}

	/**
	 * waits till at least one Ajax call is active and
	 * then waits till all outstanding ajax calls finish
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitForAjaxCallsToStartAndFinish(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$start = \microtime(true);
		$this->waitForAjaxCallsToStart($session);
		$end = \microtime(true);
		$timeout_msec = $timeout_msec - (($end - $start) * 1000);
		$timeout_msec = \max($timeout_msec, MINIMUM_UI_WAIT_TIMEOUT_MILLISEC);
		$this->waitForOutstandingAjaxCalls($session, $timeout_msec);
	}
}
