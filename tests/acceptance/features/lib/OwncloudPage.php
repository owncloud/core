<?php

/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Page\OwncloudPageElement\OCDialog;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use WebDriver\Exception as WebDriverException;
use WebDriver\Key;

/**
 * Owncloud page.
 */
class OwncloudPage extends Page {
	protected $userNameDisplayId = "expandDisplayName";
	protected $notificationId = "notification";
	protected $ocDialogXpath = ".//*[@class='oc-dialog']";
	protected $avatarImgXpath = ".//div[@id='settings']//div[contains(@class, 'avatardiv')]/img";
	protected $titleXpath = ".//title";
	protected $searchBoxId = "searchbox";

	/**
	 * used to store the unchanged path string when $path gets changed
	 *
	 * @var string
	 */
	protected $originalPath = null;

	/**
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$loadingIndicator = $this->find("css", '.loading');
			if ($loadingIndicator !== null) {
				$visibility = $this->elementHasCSSValue(
					$loadingIndicator, 'visibility', 'visible'
				);
				if ($visibility === false) {
					break;
				}
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for page to load"
			);
		}

		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 *
	 * @param string $xpath
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillElementIsNull(
		$xpath,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			try {
				$element = $this->find("xpath", $xpath);
			} catch (WebDriverException $e) {
				break;
			}
			if ($element === null) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}
	}

	/**
	 *
	 * @param string $xpath
	 * @param int $timeout_msec
	 *
	 * @return NodeElement|null
	 */
	public function waitTillElementIsNotNull(
		$xpath, $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			try {
				/**
				 * @var NodeElement $element
				 */
				$element = $this->find("xpath", $xpath);
				if ($element === null || !$element->isValid()) {
					\usleep(STANDARD_SLEEP_TIME_MICROSEC);
				} else {
					return $element;
				}
			} catch (WebDriverException $e) {
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			}
			$currentTime = \microtime(true);
		}

		return null;
	}

	/**
	 * waits for the element located by the xpath to be visible
	 *
	 * @param string $xpath the xpath of the element to wait for
	 * @param int $timeout_msec
	 *
	 * @return NodeElement
	 */
	public function waitTillXpathIsVisible(
		$xpath,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$element = $this->waitTillElementIsNotNull($xpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" xpath: $xpath" .
			" cannot find element"
		);
		$visibility = $this->waitFor(
			$timeout_msec / 1000,
			[$element, 'isVisible']
		);
		if ($visibility !== true) {
			throw new \Exception(
				__METHOD__ .
				" xpath: $xpath" .
				" timeout waiting for element to be visible"
			);
		}
		return $element;
	}

	/**
	 * Get the text of the first notification
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getNotificationText() {
		$notificationElement = $this->findById($this->notificationId);

		$this->assertElementNotNull(
			$notificationElement,
			__METHOD__ . " could not find element with id $this->notificationId"
		);

		return $this->getTrimmedText($notificationElement);
	}

	/**
	 * Get the text of any notifications
	 *
	 * @throws ElementNotFoundException
	 * @return array
	 */
	public function getNotifications() {
		$notificationsText = [];
		$notifications = $this->findById($this->notificationId);

		$this->assertElementNotNull(
			$notifications,
			__METHOD__ . " could not find element with id $this->notificationId"
		);

		foreach ($notifications->findAll("xpath", "div") as $notification) {
			\array_push($notificationsText, $this->getTrimmedText($notification));
		}
		return $notificationsText;
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getPageTitle() {
		$title = $this->find('xpath', $this->titleXpath);
		$this->assertElementNotNull(
			$title,
			__METHOD__ . " could not find title element"
		);
		return \trim($title->getHtml());
	}

	/**
	 * Get all open oc dialogs
	 *
	 * @return OCDialog[]
	 */
	public function getOcDialogs() {
		$ocDialogs = [];
		$ocDialogElements = $this->findAll("xpath", $this->ocDialogXpath);
		foreach ($ocDialogElements as $element) {
			/**
			 *
			 * @var \Page\OwncloudPageElement\OCDialog $ocDialog
			 */
			$ocDialog = $this->getPage("OwncloudPageElement\\OCDialog");
			$ocDialog->setElement($element);
			$ocDialogs[] = $ocDialog;
		}
		return $ocDialogs;
	}

	/**
	 * Open the settings menu
	 *
	 * @param Session $session
	 *
	 * @throws ElementNotFoundException
	 * @return Page
	 */
	public function openSettingsMenu(Session $session) {
		$userNameDisplayElement = $this->findById($this->userNameDisplayId);

		$this->assertElementNotNull(
			$userNameDisplayElement,
			__METHOD__ . " could not find element with id $this->userNameDisplayId"
		);

		$userNameDisplayElement->click();

		/**
		 *
		 * @var SettingsMenu $settingsMenu
		 */
		$settingsMenu = $this->getPage("OwncloudPageElement\\SettingsMenu");
		$settingsMenu->waitTillPageIsLoaded($session);
		return $settingsMenu;
	}

	/**
	 * finds the element that contains the displayname of the current user
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	protected function findUserDisplayNameElement() {
		$displayNameElement = $this->findById($this->userNameDisplayId);

		$this->assertElementNotNull(
			$displayNameElement,
			__METHOD__ .
			" could not find element with id $this->userNameDisplayId"
		);
		return $displayNameElement;
	}

	/**
	 * returns the displayname (Full Name or username) of the current user
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getMyDisplayname() {
		return $this->getTrimmedText($this->findUserDisplayNameElement());
	}

	/**
	 *
	 * @return boolean
	 */
	public function isDisplaynameVisible() {
		return $this->findUserDisplayNameElement()->isVisible();
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	protected function findAvatarElement() {
		$avatarElement = $this->find("xpath", $this->avatarImgXpath);

		$this->assertElementNotNull(
			$avatarElement,
			__METHOD__ .
			" could not find avatar image with xpath $this->avatarImgXpath"
		);
		return $avatarElement;
	}

	/**
	 *
	 * @return boolean
	 */
	public function isAvatarVisible() {
		try {
			$avatarElement = $this->findAvatarElement();
		} catch (ElementNotFoundException $e) {
			return false;
		}
		return $avatarElement->isVisible();
	}

	/**
	 *
	 * @param Session $session
	 * @param string $searchTerm
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function search($session, $searchTerm) {
		$searchbox = $this->findById($this->searchBoxId);
		$this->assertElementNotNull(
			$searchbox,
			__METHOD__ .
			" id: '$this->searchBoxId' " .
			"could not find searchbox / button"
		);
		$searchbox->click();
		$searchbox->setValue($searchTerm);
		$this->waitForAjaxCallsToStartAndFinish($session);
		/**
		 *
		 * @var SearchResultInOtherFoldersPage $searchResultInOtherFoldersPage
		 */
		$searchResultInOtherFoldersPage = $this->getPage("SearchResultInOtherFoldersPage");
		$searchResultInOtherFoldersPage->waitTillPageIsLoaded($session);
	}

	/**
	 * return the path to the relevant page
	 *
	 * @return string
	 */
	public function getPagePath() {
		return $this->getPath();
	}

	/**
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function setPagePath($path) {
		if ($this->originalPath === null) {
			$this->originalPath = $this->path;
		}
		$this->path = $path;
	}

	/**
	 * returns the unchanged path
	 *
	 * @return string
	 */
	public function getOriginalPath() {
		if ($this->originalPath !== null) {
			return $this->originalPath;
		} else {
			return $this->getPath();
		}
	}

	/**
	 * Gets the Coordinates of a Mink Element
	 *
	 * @param Session $session
	 * @param NodeElement $element
	 *
	 * @return array
	 */
	public function getCoordinatesOfElement($session, $element) {
		$elementXpath = \str_replace('"', '\"', $element->getXpath());

		return $session->evaluateScript(
			'return document.evaluate( "' .
			$elementXpath .
			'",document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null)' .
			'.singleNodeValue.getBoundingClientRect();'
		);
	}

	/**
	 * Gets the Window Height
	 *
	 * @param Session $session
	 *
	 * @return int
	 */
	public function getWindowHeight($session) {
		return $session->evaluateScript(
			'return $(window).height();'
		);
	}

	/**
	 * scrolls to a position in a specified element
	 *
	 * @param string $jQuerySelector e.g. "#app-content"
	 * @param int|string $position number or JS function that returns a number
	 * @param Session $session
	 *
	 * @return void
	 */
	public function scrollToPosition($jQuerySelector, $position, Session $session) {
		$session->executeScript(
			'jQuery("' . $jQuerySelector . '").scrollTop(' . $position . ');'
		);
	}

	/**
	 * waits till all ajax calls are finished
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitForOutstandingAjaxCalls(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$this->initAjaxCounters($session);
		$timeout_msec = (int) $timeout_msec;
		if ($timeout_msec <= 0) {
			throw new \InvalidArgumentException("negative or zero timeout");
		}
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			try {
				//wait for jQuery.active and
				//window.activeAjaxCount that is set by the testing code
				//to catch non-jQuery XHR requests
				//but if window.activeAjaxCount was not set, ignore it
				$waitingResult = $session->wait(
					STANDARD_SLEEP_TIME_MILLISEC,
					"(
						typeof jQuery != 'undefined' 
						&& (0 === jQuery.active) 
						&& (
							typeof window.activeAjaxCount === 'undefined' 
							|| 0 === window.activeAjaxCount
							)
					)"
				);
				if ($waitingResult === true) {
					break;
				}
			} catch (\Exception $e) {
				//show Exception message, but do not throw it
				echo $e->getMessage() . "\n";
			} finally {
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
				$currentTime = \microtime(true);
			}
		}
		if ($currentTime > $end) {
			$message = "INFORMATION: timed out waiting for outstanding ajax calls";
			echo $message;
			\error_log($message);
		}
	}

	/**
	 * waits till at least one Ajax call is active
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitForAjaxCallsToStart(
		Session $session, $timeout_msec = 1000
	) {
		$timeout_msec = (int) $timeout_msec;
		if ($timeout_msec <= 0) {
			throw new \InvalidArgumentException("negative or zero timeout");
		}
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$activeAjax = $session->evaluateScript(
				'(
				function () {
					var result = 0;
					if (typeof window.activeAjaxCount === "number") {
						result = result + window.activeAjaxCount;
					}
					if (typeof jQuery !== "undefined" && typeof jQuery.active === "number") {
						result = result + jQuery.active;
					}
					return result;
				})()
				'
			);
			if ((int) $activeAjax > 0) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}
		if ($currentTime > $end) {
			$message = "INFORMATION: timed out waiting for ajax calls to start";
			echo $message;
			\error_log($message);
		}
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

	/**
	 * creates wrappers around XHR requests
	 * counts active requests in "window.activeAjaxCount"
	 * counts the sum of ajax requests in window.sumStartedAjaxRequests
	 *
	 * @param Session $session
	 *
	 * @see resetSumStartedAjaxRequests()
	 * @see getSumStartedAjaxRequests()
	 * @return void
	 */
	public function initAjaxCounters(
		Session $session
	) {
		$activeAjaxCountIsUndefined = $session->evaluateScript(
			"(typeof window.activeAjaxCount === 'undefined')"
		);

		//only overwrite the send and open functions once
		if ($activeAjaxCountIsUndefined === true) {
			$session->executeScript(
				'
				window.sumStartedAjaxRequests = 0;
				window.activeAjaxCount = 0;
				function isAllXhrComplete(){
					window.activeAjaxCount--;
				}
				
				(function(open) {
					XMLHttpRequest.prototype.open = function() {
						this.addEventListener("load", isAllXhrComplete);
						return open.apply(this, arguments);
					};
				})(XMLHttpRequest.prototype.open);
				
				(function(send) {
					XMLHttpRequest.prototype.send = function () {
						window.activeAjaxCount++;
						window.sumStartedAjaxRequests++;
						return send.apply(this, arguments);
					};
				})(XMLHttpRequest.prototype.send);
				'
			);
		}
	}

	/**
	 * reset the sum ajax counter so that every function can start counting from 0
	 *
	 * @param Session $session
	 *
	 * @see initAjaxCounters()
	 * @return void
	 */
	public function resetSumStartedAjaxRequests(Session $session) {
		$this->assertSumStartedAjaxRequestsIsDefined($session);
		$session->executeScript('window.sumStartedAjaxRequests = 0;');
	}

	/**
	 * gets the sum of all started Ajax requests
	 *
	 * @param Session $session
	 *
	 * @see initAjaxCounters()
	 * @return int
	 */
	public function getSumStartedAjaxRequests(Session $session) {
		$this->assertSumStartedAjaxRequestsIsDefined($session);
		return (int) $session->evaluateScript("window.sumStartedAjaxRequests");
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @see initAjaxCounters()
	 * @throws \Exception
	 * @return void
	 */
	private function assertSumStartedAjaxRequestsIsDefined(Session $session) {
		$sumStartedAjaxRequestsIsUndefined = $session->evaluateScript(
			"(typeof window.sumStartedAjaxRequests === 'undefined')"
		);
		if ($sumStartedAjaxRequestsIsUndefined === true) {
			throw new \Exception(
				"`window.sumStartedAjaxRequests` is undefined, " .
				"call `initAjaxCounters()` first"
			);
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
	protected function elementHasCSSValue(NodeElement $element, $property, $value) {
		$exists = false;
		$style = $element->getAttribute('style');
		if ($style) {
			if (\preg_match(
				"/(^{$property}:|; {$property}:) ([a-z0-9]+);/i",
				$style, $matches
			)
			) {
				$found = \array_pop($matches);
				if ($found == $value) {
					$exists = $element;
				}
			}
		}

		return $exists;
	}

	/**
	 *
	 * @param Session $session
	 * @param string $scrolledElement jQuery identifier for the element that get scrolled
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitForScrollingToFinish(
		Session $session, $scrolledElement,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		// Wait so that, if scrolling is going to happen, it will have started.
		// Otherwise, we might start checking early, before scrolling begins.
		// The downside here is that if scrolling is not needed at all then we
		// wasted time waiting.
		// TODO: find a way to avoid this sleep
		\usleep(MINIMUM_UI_WAIT_TIMEOUT_MICROSEC);
		$session->executeScript(
			'
			jQuery.scrolling = 0;
			$( "' . $scrolledElement . '" ).scroll(function() {
							jQuery.scrolling=1;
							clearTimeout( $.data( this, "scrollCheck" ) );
							$.data( this, "scrollCheck", setTimeout(function() {
								jQuery.scrolling=0;
							}, 100) );
						});
			'
		);
		$result = 1;
		$timeout_msec = (int) $timeout_msec;
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end && $result !== 0) {
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$result = (int)$session->evaluateScript("jQuery.scrolling");
			$currentTime = \microtime(true);
		}
		if ($currentTime > $end) {
			$message = "INFORMATION: timed out waiting for scrolling to finish";
			echo $message;
			\error_log($message);
		}
	}

	/**
	 * Fill an element with a text value and keep focus on the element.
	 *
	 * The existing fillField and setValue methods have a problem. They blur out
	 * of the field after entering the data. This is a problem when the focus
	 * should remain in the field, e.g. for auto-complete fields. It is also a
	 * problem for fields where we send an enter at the end of the field.
	 * Regression caused by:
	 * https://github.com/minkphp/MinkSelenium2Driver/pull/286
	 *
	 * @param NodeElement $element
	 * @param string $value
	 * @param Session $session
	 *
	 * @throws \Exception
	 * @return void
	 */
	public function fillFieldAndKeepFocus(NodeElement $element, $value, $session) {
		$driver = $session->getDriver();
		$element = $driver->getWebDriverSession()->element('xpath', $element->getXpath());
		$value = \str_repeat(Key::BACKSPACE . Key::DELETE, \strlen($element->attribute('value'))) . $value;
		$element->postValue(['value' => [$value]]);
	}

	/**
	 * Fill the field at the specified xpath with the given string
	 *
	 * If you want to put non-BMP characters, like emoji, into a text field in
	 * the browser using "ordinary" methods like setValue or fillField,
	 * then chromedriver complains:
	 * "ChromeDriver only supports characters in the BMP"
	 * This method provides a way to set the text field value via JavaScript.
	 *
	 * @param Session $session
	 * @param string $xpath
	 * @param string $string
	 *
	 * @return void
	 */
	public function fillFieldWithCharacters(
		Session $session, $xpath, $string
	) {
		$session->executeScript(
			"document.evaluate(`" . $xpath . "`, document).iterateNext().value = \"" . $string . "\";"
		);
	}

	/**
	 * Edge often returns whitespace before or after element text.
	 * This is a convenient wrapper to ensure that text is trimmed
	 * before using it in tests.
	 *
	 * @param NodeElement $element
	 *
	 * @throws \Exception
	 * @return string text of the element with any whitespace trimmed
	 */
	public function getTrimmedText(NodeElement $element) {
		return \trim($element->getText());
	}

	/**
	 * Surround the text with single or double quotes, whichever does not
	 * already appear in the text. If the text contains both single and
	 * double quotes, then throw an InvalidArgumentException.
	 *
	 * The returned string is intended for use as part of an xpath (v1).
	 * xpath (v1) has no way to escape the quote character within a string
	 * literal. So there is no way to directly use a string containing
	 * both single and double quotes.
	 *
	 * @param string $text
	 *
	 * @return string the text surrounded by single or double quotes
	 * @throws \InvalidArgumentException
	 */
	public function quotedText($text) {
		if (\strstr($text, "'") === false) {
			return "'$text'";
		} elseif (\strstr($text, '"') === false) {
			return '"' . $text . '"';
		} else {
			// The text contains both single and double quotes.
			// With current xpath v1 there is no way to encode that.
			throw new \InvalidArgumentException(
				"mixing both single and double quotes is unsupported - '$text'"
			);
		}
	}

	/**
	 *
	 * @param NodeElement $element
	 * @param string $message
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function assertElementNotNull($element, $message) {
		if ($element === null) {
			throw new ElementNotFoundException($message);
		}
	}
}
