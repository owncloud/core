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
 * common things for sharing settings pages (global and personal)
 *
 */
class SharingSettingsPage extends OwncloudPage {
	/**
	 * toggle checkbox
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 * @param string $checkboxXpath
	 * @param string $checkboxId
	 *
	 * @return void
	 */
	public function toggleCheckbox(
		Session $session, $action, $checkboxXpath, $checkboxId
	) {
		$checkbox = $this->find("xpath", $checkboxXpath);
		$checkCheckbox = $this->findById($checkboxId);
		$this->assertElementNotNull(
			$checkbox,
			__METHOD__ .
			" xpath $checkboxXpath " .
			"could not find label for checkbox"
		);
		$this->assertElementNotNull(
			$checkCheckbox,
			__METHOD__ .
			" id $checkboxId " .
			"could not find checkbox"
		);
		if ($action === "disables") {
			if ($checkCheckbox->isChecked()) {
				$checkbox->click();
			}
		} elseif ($action === "enables") {
			if ((!($checkCheckbox->isChecked()))) {
				$checkbox->click();
			}
		} else {
			throw new \Exception(
				__METHOD__ . " invalid action: $action"
			);
		}
		$this->waitForAjaxCallsToStartAndFinish($session);
	}
}
