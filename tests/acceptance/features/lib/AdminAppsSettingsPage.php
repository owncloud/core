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
	protected $appEnableDisableButtonByNameXpath = "//div[@id='app-%s']//input[@class='enable']";
	protected $appEnableDisableButtonXpath = "//input[@class='enable']";

	/**
	 * Browse to disabled app page
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function browseToDisabledAppsPage(Session $session) {
		$showDisablesAppsButton = $this->findById($this->showDisabledAppsButtonId);
		$showDisablesAppsButton->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * Disable the app
	 *
	 * @param Session $session
	 * @param string $appName
	 *
	 * @return void
	 */
	public function disableApp(Session $session, $appName) {
		$appDisableButton = $this->find(
			"xpath", \sprintf($this->appEnableDisableButtonByNameXpath, $appName)
		);
		$appDisableButton->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * Enable the app
	 *
	 * @param Session $session
	 * @param string $appName
	 *
	 * @return void
	 */
	public function enableApp(Session $session, $appName) {
		$appEnableButton = $this->find(
			"xpath", \sprintf($this->appEnableDisableButtonByNameXpath, $appName)
		);
		$appEnableButton->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * waits for the page to appear completely
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$this->waitForAjaxCallsToStartAndFinish($session);
		$this->waitTillXpathIsVisible(
			$this->appEnableDisableButtonXpath, $timeout_msec
		);
	}
}
