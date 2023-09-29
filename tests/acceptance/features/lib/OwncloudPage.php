<?php declare(strict_types=1);

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
use Behat\Mink\Exception\DriverException;
use Behat\Mink\Exception\UnsupportedDriverActionException;
use Behat\Mink\Session;
use Exception;
use InvalidArgumentException;
use Page\OwncloudPageElement\OCDialog;
use Page\OwncloudPageElement\SettingsMenu;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
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
	protected $sidebarNavXpath = "//li[@data-id='%s']";
	private $sidebarItemId = [
		'All files' => "files",
		'Favorites' => "favorites",
		'Shared with you' => "sharingin",
		'Shared with others' => "sharingout",
		'Shared with others' => "sharingout",
		'Shared by link' => "sharinglinks",
		'Tags' => "systemtagsfilter",
		'Deleted files' => "trashbin",
	];

	/**
	 * @var string
	 */
	protected $path = null;

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
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$loadingIndicator = $this->find("css", '.loading');
			if ($loadingIndicator !== null) {
				$visibility = $this->elementHasCSSValue(
					$loadingIndicator,
					'visibility',
					'visible'
				);
				if ($visibility === false) {
					break;
				}
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

	/**
	 *
	 * @param string $xpath
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillElementIsNull(
		string $xpath,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
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
		string $xpath,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): ?NodeElement {
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
	 * @throws Exception
	 */
	public function waitTillXpathIsVisible(
		string $xpath,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): NodeElement {
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
			throw new Exception(
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
	 * @return string
	 * @throws ElementNotFoundException|Exception
	 */
	public function getNotificationText(): string {
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
	 * @param int $expectedCount
	 *
	 * @return array
	 * @throws ElementNotFoundException|Exception
	 */
	public function getNotifications(int $expectedCount = 0): array {
		$notificationsText = [];
		$notifications = $this->findById($this->notificationId);

		$this->assertElementNotNull(
			$notifications,
			__METHOD__ . " could not find element with id $this->notificationId"
		);

		// Notifications might take some time to be displayed.
		// Check until there are at least the expected number of notifications
		// or the standard wait time has expired.
		$currentTime = \microtime(true);
		$end = $currentTime + (STANDARD_UI_WAIT_TIMEOUT_MILLISEC / 1000);
		$firstLoop = true;
		$actualCount = 0;
		do {
			if (!$firstLoop) {
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
				echo "Notice: " . __METHOD__ . " expecting $expectedCount notifications but found only $actualCount - checking again\n";
			}
			$allNotifications = $notifications->findAll("xpath", "div");
			$actualCount = \count($allNotifications);
			$currentTime = \microtime(true);
			$firstLoop = false;
		} while ($currentTime <= $end && ($actualCount < $expectedCount));
		foreach ($notifications->findAll("xpath", "div") as $notification) {
			\array_push($notificationsText, $this->getTrimmedText($notification));
		}
		return $notificationsText;
	}

	/**
	 *
	 * @return string
	 * @throws ElementNotFoundException
	 */
	public function getPageTitle(): string {
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
	public function getOcDialogs(): array {
		//in CI due to timing issue the $ocDialogs returns empty sometimes
		//due with this test for upload overwriting a file fails on CI
		sleep(1);
		$ocDialogs = [];
		$ocDialogElements = $this->findAll("xpath", $this->ocDialogXpath);
		foreach ($ocDialogElements as $element) {
			/**
			 *
			 * @var OCDialog $ocDialog
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
	 * @return Page
	 * @throws ElementNotFoundException
	 */
	public function openSettingsMenu(Session $session): Page {
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
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	protected function findUserDisplayNameElement(): NodeElement {
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
	 * @return string
	 * @throws ElementNotFoundException|Exception
	 */
	public function getMyDisplayname(): string {
		return $this->getTrimmedText($this->findUserDisplayNameElement());
	}

	/**
	 *
	 * @return boolean
	 */
	public function isDisplaynameVisible(): bool {
		return $this->findUserDisplayNameElement()->isVisible();
	}

	/**
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	protected function findAvatarElement(): NodeElement {
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
	public function isAvatarVisible(): bool {
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
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function search(Session $session, string $searchTerm): void {
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
	public function getPagePath(): string {
		return $this->getPath();
	}

	/**
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function setPagePath(string $path): void {
		if ($this->originalPath === null) {
			$this->originalPath = $this->path;
		}
		$this->path = $path;
	}

	/**
	 * returns the unchanged path
	 *
	 * @return string|null
	 */
	public function getOriginalPath(): ?string {
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
	public function getCoordinatesOfElement(Session $session, NodeElement $element): array {
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
	public function getWindowHeight(Session $session): int {
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
	public function scrollToPosition(string $jQuerySelector, $position, Session $session): void {
		$session->executeScript(
			'jQuery("' . $jQuerySelector . '").scrollTop(' . $position . ');'
		);
	}

	/**
	 * scrolls to a position in a specified element
	 *
	 * @param string $jQuerySelector e.g. "#app-content"
	 *
	 * @return void
	 * @throws DriverException
	 * @throws UnsupportedDriverActionException
	 */
	public function scrollInToView(string $jQuerySelector): void {
		$this->getDriver()->executeScript(
			'jQuery("' . $jQuerySelector . '").get(0).scrollIntoView();'
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
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
		$this->initAjaxCounters($session);
		$timeout_msec = (int) $timeout_msec;
		if ($timeout_msec <= 0) {
			throw new InvalidArgumentException("negative or zero timeout");
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
			} catch (Exception $e) {
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
		Session $session,
		int $timeout_msec = 1000
	): void {
		$timeout_msec = (int) $timeout_msec;
		if ($timeout_msec <= 0) {
			throw new InvalidArgumentException("negative or zero timeout");
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
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
		$start = \microtime(true);
		$this->waitForAjaxCallsToStart($session);
		$end = \microtime(true);
		$timeout_msec = $timeout_msec - (($end - $start) * 1000);
		$timeout_msec = \max($timeout_msec, MINIMUM_UI_WAIT_TIMEOUT_MILLISEC);
		$this->waitForOutstandingAjaxCalls($session, (int)$timeout_msec);
	}

	/**
	 * creates wrappers around XHR requests
	 * counts active requests in "window.activeAjaxCount"
	 * counts the sum of ajax requests in window.sumStartedAjaxRequests
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @see getSumStartedAjaxRequests()
	 * @see resetSumStartedAjaxRequests()
	 */
	public function initAjaxCounters(
		Session $session
	): void {
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
	 * @return void
	 * @throws Exception
	 * @see initAjaxCounters()
	 */
	public function resetSumStartedAjaxRequests(Session $session): void {
		$this->assertSumStartedAjaxRequestsIsDefined($session);
		$session->executeScript('window.sumStartedAjaxRequests = 0;');
	}

	/**
	 * gets the sum of all started Ajax requests
	 *
	 * @param Session $session
	 *
	 * @return int
	 * @throws Exception
	 * @see initAjaxCounters()
	 */
	public function getSumStartedAjaxRequests(Session $session): int {
		$this->assertSumStartedAjaxRequestsIsDefined($session);
		return (int) $session->evaluateScript("window.sumStartedAjaxRequests");
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 * @see initAjaxCounters()
	 */
	private function assertSumStartedAjaxRequestsIsDefined(Session $session): void {
		$sumStartedAjaxRequestsIsUndefined = $session->evaluateScript(
			"(typeof window.sumStartedAjaxRequests === 'undefined')"
		);
		if ($sumStartedAjaxRequestsIsUndefined === true) {
			throw new Exception(
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
	protected function elementHasCSSValue(NodeElement $element, string $property, string $value) {
		$exists = false;
		$style = $element->getAttribute('style');
		if ($style) {
			if (\preg_match(
				"/(^{$property}:|; {$property}:) ([a-z0-9]+);/i",
				(string) $style,
				$matches
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
		Session $session,
		string  $scrolledElement,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
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
			$result = (int) $session->evaluateScript("jQuery.scrolling");
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
	 * @param string|null $value
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fillFieldAndKeepFocus(NodeElement $element, ?string $value, Session $session): void {
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
		Session $session,
		string  $xpath,
		string  $string
	): void {
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
	 * @return string text of the element with any whitespace trimmed
	 * @throws Exception
	 */
	public function getTrimmedText(NodeElement $element): string {
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
	 * @throws InvalidArgumentException
	 */
	public function quotedText(string $text): string {
		if (\strstr($text, "'") === false) {
			return "'$text'";
		} elseif (\strstr($text, '"') === false) {
			return '"' . $text . '"';
		} else {
			// The text contains both single and double quotes.
			return "concat('" . \str_replace("'", "',\"'\",'", $text) . "')";
		}
	}

	/**
	 * @param array $urlParameters
	 *
	 * @return Page
	 */
	public function open(array $urlParameters = []): Page {
		try {
			parent::open($urlParameters);
		} catch (UnexpectedPageException $e) {
			$expected = \parse_url($this->getUrl($urlParameters));
			$actual = \parse_url($this->getDriver()->getCurrentUrl());
			foreach (['scheme', 'host', 'path'] as $part) {
				if (\array_key_exists($part, $expected)) {
					if (!\array_key_exists($part, $actual)
						|| ($expected[$part] !== $actual[$part])
					) {
						throw $e;
					}
				}
			}

			if (\array_key_exists('query', $expected)) {
				if (!\array_key_exists('query', $actual)) {
					throw $e;
				}
				$expectedQuery = \explode("&", $expected['query']);
				$actualQuery = \explode("&", $actual['query']);
				if (\count(\array_diff($expectedQuery, $actualQuery)) > 0) {
					throw $e;
				}
			}
		}
		return $this;
	}

	/**
	 *
	 * @param NodeElement|string|array|null $element
	 * @param string $message
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function assertElementNotNull($element, string $message): void {
		if ($element === null) {
			throw new ElementNotFoundException($message);
		}
	}

	/**
	 * Lookup the id for the requested sidebar item.
	 * If the id is not known, then return the passed-in parameter as the id.
	 *
	 * @param string $sidebar e.g. All files, Tags, Deleted files
	 *
	 * @return string
	 */
	public function getSidebarItemId(string $sidebar): string {
		if (isset($this->sidebarItemId[$sidebar])) {
			$id = $this->sidebarItemId[$sidebar];
		} else {
			$id = $sidebar;
		}
		return $id;
	}

	/**
	 *
	 * @param string $sidebar
	 *
	 * @return bool
	 */
	public function isSidebarNavVisible(string $sidebar): bool {
		try {
			$sidebarNav = $this->find(
				"xpath",
				\sprintf($this->sidebarNavXpath, $this->getSidebarItemId($sidebar))
			);
			$this->assertElementNotNull(
				$sidebarNav,
				__METHOD__ .
				" could not find '$sidebar' sidebar navigation"
			);
			$visible = $sidebarNav->isVisible();
		} catch (ElementNotFoundException $e) {
			$visible = false;
		}
		return $visible;
	}
}
