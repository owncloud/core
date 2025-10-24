<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * GeneralErrorPage page.
 */
class GeneralErrorPage extends OwncloudPage {
	protected $errorMessageXpath = ".//li[@class='error']";

	/**
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getErrorMessage(): string {
		$errorMessageElement = $this->find("xpath", $this->errorMessageXpath);
		$this->assertElementNotNull(
			$errorMessageElement,
			__METHOD__ .
			" could not find error element xpath: '$this->errorMessageXpath'"
		);
		return $errorMessageElement->getText();
	}

	/**
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
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if ($this->findAll("xpath", $this->errorMessageXpath)) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new Exception(
				__METHOD__ . " timeout waiting for page to load"
			);
		}

		$this->waitForOutstandingAjaxCalls($session);
	}
}
