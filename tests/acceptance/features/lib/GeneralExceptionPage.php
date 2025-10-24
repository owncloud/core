<?php declare(strict_types=1);
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

namespace Tests\Acceptance\Page;

use Behat\Mink\Session;
use Exception;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * GeneralExceptionPage page.
 */
class GeneralExceptionPage extends OwncloudPage {
	protected $exceptionTitleXpath = ".//span[@class='error error-wide']//h2[1]";
	protected $exceptionMessageXpath = ".//span[@class='error error-wide']//p[@class='hint']";

	/**
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getExceptionMessage(): string {
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
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getExceptionTitle(): string {
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
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	):void {
		$this->waitTillXpathIsVisible($this->exceptionTitleXpath, $timeout_msec);
	}
}
