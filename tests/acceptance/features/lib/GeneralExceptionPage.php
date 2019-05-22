<?php
/**
 * ownCloud
 *
 * @author Dipak Acharya <dipak@jankaritech.com>
 * @copyright Copyright (c) 2019 Dipak Acharya dipak@jankaritech.com
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
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * GeneralExceptionPage page.
 */
class GeneralExceptionPage extends OwncloudPage {
	protected $exceptionTitleXpath = ".//span[@class='error error-wide']//h2[1]";
	protected $exceptionMessageXpath = ".//span[@class='error error-wide']//p[@class='hint']";

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getExceptionMessage() {
		$exceptionMessageElement = $this->find("xpath", $this->exceptionMessageXpath);
		$this->assertElementNotNull(
			$exceptionMessageElement,
			__METHOD__ .
			" could not find exception message xpath: '$this->exceptionMessageXpath'"
		);
		return $exceptionMessageElement->getText();
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getExceptionTitle() {
		$exceptionTitleElement = $this->find("xpath", $this->exceptionTitleXpath);
		$this->assertElementNotNull(
			$exceptionTitleElement,
			__METHOD__ .
			" could not find exception title xpath: '$this->exceptionTitleXpath'"
		);
		return $exceptionTitleElement->getText();
	}

	/**
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$this->waitTillXpathIsVisible($this->exceptionTitleXpath, $timeout_msec);
	}
}
