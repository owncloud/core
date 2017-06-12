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

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use WebDriver\Exception as WebDriverException;

class OwncloudPage extends Page
{
	protected $userNameDispayId = "expandDisplayName";
	public function waitTillPageIsLoaded(Session $session, $timeout_msec=10000)
	{
		for ($counter = 0; $counter <= $timeout_msec; $counter += STANDARDSLEEPTIMEMILLISEC) {
			$loadingIndicator=$this->find("css", '.loading');
			$visibility = $this->elementHasCSSValue(
				$loadingIndicator, 'visibility', 'visible'
			);
			if ($visibility===FALSE) {
				break;
			}
			usleep(STANDARDSLEEPTIMEMICROSEC);
		}
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 *
	 * @param string $xpath
	 * @param int $timeout_msec
	 */
	public function waitTillElementIsNull ($xpath, $timeout_msec=10000)
	{
		for ($counter = 0; $counter <= $timeout_msec; $counter += STANDARDSLEEPTIMEMILLISEC) {
			try {
				$element = $this->find("xpath",$xpath);
			} catch (WebDriverException $e) {
				break;
			}
			if ($element === null) {
				break;
			}
			usleep(STANDARDSLEEPTIMEMICROSEC);
		}
	}

	/**
	 *
	 * @param string $xpath
	 * @param int $timeout_msec
	 */
	public function waitTillElementIsNotNull ($xpath, $timeout_msec=10000)
	{
		for ($counter = 0; $counter <= $timeout_msec; $counter += STANDARDSLEEPTIMEMILLISEC) {
			try {
				$element = $this->find("xpath",$xpath);
				if ($element === null || !$element->isValid()) {
					usleep(STANDARDSLEEPTIMEMICROSEC);
				} else {
					break;
				}
			} catch (WebDriverException $e) {
				usleep(STANDARDSLEEPTIMEMICROSEC);
			}
		}
	}
	
	public function getNotificationText() {
		return $this->findById("notification")->getText();
	}

	public function getNotifications() {
		$notificationsText=array();
		$notifications=$this->findById("notification");
		foreach ($notifications->findAll("xpath", "div") as $notification) {
			array_push($notificationsText, $notification->getText());
		}
		return $notificationsText;
	}

	/**
	 * finds the own username displayed in the top right corner
	 * @return string
	 */
	public function getMyUsername() {
		return $this->findById($this->userNameDispayId)->getText();
	}

	/**
	 * Gets the Coordinates of a Mink Element
	 *
	 * @param Session $session
	 * @param NodeElement $element
	 * @return Array
	 */
	public function getCoordinatesOfElement($session, $element)
	{
		return $session->evaluateScript(
			'return document.evaluate( "' .
			$element->getXpath() .
			'",document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null)' .
			'.singleNodeValue.getBoundingClientRect();'
		);
	}

	/**
	 * Gets the Window Height
	 *
	 * @param Session $session
	 * @return Array
	 */
	public function getWindowHeight($session)
	{
		return $session->evaluateScript(
			'return $(window).height();'
		);
	}

	/**
	 * waits till all ajax calls are finished (jQuery.active === 0)
	 * @param Session $session
	 * @param number $timeout_msec
	 * @throws \Exception
	 */
	public function waitForOutstandingAjaxCalls (Session $session, $timeout_msec=5000)
	{
		for ($counter = 0;$counter <= $timeout_msec;$counter += STANDARDSLEEPTIMEMILLISEC) {
			try {
				$waitingResult = $session->wait(
					STANDARDSLEEPTIMEMILLISEC,
					"(typeof jQuery != 'undefined' && (0 === jQuery.active))"
					);
				if ($waitingResult === true) {
					break;
				}
			} catch (\Exception $e) {
				//show Exception message, but do not throw it
				echo $e->getMessage(). "\n";
			} finally {
				usleep(STANDARDSLEEPTIMEMICROSEC);
			}
		}
	}

	/**
	 * Determine if a Mink NodeElement contains a specific
	 * css rule attribute value.
	 *
	 * @param NodeElement $element
	 *   NodeElement previously selected with
	 *   $this->getSession()->getPage()->find().
	 * @param string $property
	 *   Name of the CSS property, such as "visibility".
	 * @param string $value
	 *   Value of the specified rule, such as "hidden".
	 *
	 * @return NodeElement|bool
	 *   The NodeElement selected if true, FALSE otherwise.
	 */
	protected function elementHasCSSValue($element, $property, $value)
	{
		$exists = FALSE;
		$style = $element->getAttribute('style');
		if ($style) {
			if (preg_match(
				"/(^{$property}:|; {$property}:) ([a-z0-9]+);/i",
				$style, $matches
			)) {
				$found = array_pop($matches);
				if ($found == $value) {
					$exists = $element;
				}
			}
		}

		return $exists;
	}
}