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

namespace Tests\Acceptance\Page;

use Behat\Mink\Session;
use Exception;

/**
 * page to set personal sharing settings
 */
class PersonalSharingSettingsPage extends SharingSettingsPage {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/personal?sectionid=sharing';
	protected $personalSharingPanelDivXpath
		= '//div[@id="OCA\Files_Sharing\Panels\Personal\PersonalPanel"]';
	protected $autoAcceptLocalSharesCheckboxXpath
		= '//label[@for="auto_accept_share_input"]';
	protected $autoAcceptLocalSharesCheckboxXpathCheckboxId
		= 'auto_accept_share_input';
	protected $autoAcceptFederatedSharesCheckboxXpath
		= '//label[@for="userAutoAcceptShareTrustedInput"]';
	protected $autoAcceptFederatedSharesCheckboxXpathCheckboxId
		= 'userAutoAcceptShareTrustedInput';
	protected $allowFindingYouViaAutocompleteCheckboxXpath
		= '//label[@for="allow_share_dialog_user_enumeration_input"]';
	protected $allowFindingYouViaAutocompleteCheckboxXpathCheckboxId
		= 'allow_share_dialog_user_enumeration_input';

	/**
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleAutoAcceptingLocalShares(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->autoAcceptLocalSharesCheckboxXpath,
			$this->autoAcceptLocalSharesCheckboxXpathCheckboxId
		);
	}

	/**
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleAutoAcceptingFederatedShares(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->autoAcceptFederatedSharesCheckboxXpath,
			$this->autoAcceptFederatedSharesCheckboxXpathCheckboxId
		);
	}

	/**
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function toggleFindingYouViaAutocomplete(Session $session, string $action): void {
		$this->toggleCheckbox(
			$session,
			$action,
			$this->allowFindingYouViaAutocompleteCheckboxXpath,
			$this->allowFindingYouViaAutocompleteCheckboxXpathCheckboxId
		);
	}

	/**
	 * there is no reliable loading indicator on the personal sharing settings page,
	 * so just wait for files_sharing personal panel div to be there and all Ajax calls to finish
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	):void {
		$this->waitForOutstandingAjaxCalls($session);
		$this->waitTillXpathIsVisible(
			$this->personalSharingPanelDivXpath,
			$timeout_msec
		);
	}

	/**
	 * Check if the auto accept local shares checkbox is shown on the webui
	 *
	 * @return boolean
	 */
	public function isAutoAcceptLocalSharesCheckboxDisplayed(): bool {
		$localAutoAcceptCheckbox = $this->find('xpath', $this->autoAcceptLocalSharesCheckboxXpath);
		if ($localAutoAcceptCheckbox === null) {
			return false;
		}
		return true;
	}

	/**
	 * Check if the auto accept local shares checkbox is shown on the webui
	 *
	 * @return boolean
	 */
	public function isAutoAcceptFederatedSharesCheckboxDisplayed(): bool {
		$localAutoAcceptCheckbox = $this->find('xpath', $this->autoAcceptFederatedSharesCheckboxXpath);
		if ($localAutoAcceptCheckbox === null) {
			return false;
		}
		return true;
	}

	/**
	 * Check if the allow finding you via autocomplete checkbox is shown on the webui
	 *
	 * @return boolean
	 */
	public function isAllowFindingYouViaAutocompleteCheckboxDisplayed(): bool {
		$localAutoAcceptCheckbox = $this->find(
			'xpath',
			$this->allowFindingYouViaAutocompleteCheckboxXpath
		);
		if ($localAutoAcceptCheckbox === null) {
			return false;
		}
		return true;
	}
}
