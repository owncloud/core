<?php

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
namespace Page;

use Behat\Mink\Session;

/**
 * page to set personal sharing settings
 */
class PersonalSharingSettingsPage extends SharingSettingsPage {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/personal?sectionid=sharing';
	protected $autoAcceptLocalSharesCheckboxXpath
		= '//label[@for="userAutoAcceptShareInput"]';
	protected $autoAcceptLocalSharesCheckboxXpathCheckboxId
		= 'userAutoAcceptShareInput';
	
	/**
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 */
	public function toggleAutoAcceptingLocalShares(Session $session, $action) {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->autoAcceptLocalSharesCheckboxXpath,
			$this->autoAcceptLocalSharesCheckboxXpathCheckboxId
		);
	}

	/**
	 * there is no reliable loading indicator on the personal sharing settings page,
	 * so just wait for the auto accept checkbox to be there and all Ajax calls to finish
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
		$this->waitForOutstandingAjaxCalls($session);
		$this->waitTillXpathIsVisible(
			$this->autoAcceptLocalSharesCheckboxXpath, $timeout_msec
		);
	}
}
