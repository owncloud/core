<?php
/**
* ownCloud
*
* @author Artur Neumann
* @copyright 2017 Artur Neumann info@individual-it.net
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

namespace Test;

use Test\TestCase;

abstract class SeleniumTestCase extends TestCase {
	protected $webDriver;
	protected $rootURL;
	
	protected function setUp() {
		parent::setUp();
	
		$sauceUserName =  getenv("SAUCE_USERNAME");
		$sauceAccessKey =  getenv("SAUCE_ACCESS_KEY");
		$capabilities = array (
				\WebDriverCapabilityType::BROWSER_NAME => 'chrome',
				'tunnel-identifier' => getenv('TRAVIS_JOB_NUMBER')
		);
		$this->rootURL="http://". getenv('SRV_HOST_NAME') .":" . getenv('SRV_HOST_PORT'). "/" . getenv('SRV_HOST_URL');

		if ($sauceAccessKey != "") {
			$this->webDriver = \RemoteWebDriver::create ( 'http://'.$sauceUserName.':'.$sauceAccessKey.'@localhost:4445/wd/hub', $capabilities );
		} else {
			$this->webDriver = \RemoteWebDriver::create ( 'http://localhost:4444/wd/hub', $capabilities );
		}
	
	}
	protected function tearDown() {
		parent::tearDown();
		$this->webDriver->quit ();
	}
	
	/**
	 * waits till an element is displayed on page
	 * @param WebDriverElement $element to wait for
	 * @param INT $timeout max. time to wait
	 */
	protected function waitTillElementIsDisplayed($element, $timeout = 30) {
		for($counter = 0; $counter <= $timeout; $counter ++) {
			try {
				if ($element->isDisplayed () === false) {
					break;
				}
			} catch ( Exception $e ) {
				break;
			}
	
			sleep (1);
		}
	}
	
	/**
	 * waits till an element is stale
	 * @param WebDriverElement $element to wait for
	 * @param INT $timeout max. time to wait
	 */
	protected  function waitTillElementIsStale($element, $timeout = 30) {
		for ($i=0; $i<=$timeout; $i++) {
			try {
				$element->findElements(\WebDriverBy::id("does-not-matter"));
			} catch (StaleElementReferenceException $e) {
				return true;
			}
			sleep(1);
		}
	}
}
