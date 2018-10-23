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

namespace Page\OwncloudPageElement;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * The oc-dialog
 *
 */
class OCDialog extends OwncloudPage {

	/**
	 * @var NodeElement of this element
	 */
	protected $dialogElement;
	protected $titleClassXpath = ".//*[@class='oc-dialog-title']";
	protected $contentClassXpath = ".//*[@class='oc-dialog-content']";
	protected $buttonByLabelXpath = "//button[.='%s']";
	/**
	 * the accept button, regardless of the label
	 *
	 * @var string
	 */
	protected $primaryButtonXpath = "//button[@class='primary']";

	/**
	 * sets the NodeElement for the current file row
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by $this->getPage("OwncloudPageElement\\OCDialog")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $dialogElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $dialogElement) {
		$this->dialogElement = $dialogElement;
	}

	/**
	 * returns the Element that was set by setElement()
	 *
	 * @return NodeElement
	 */
	public function getOwnElement() {
		return $this->dialogElement;
	}
	/**
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getTitle() {
		$title = $this->dialogElement->find("xpath", $this->titleClassXpath);
		$this->assertElementNotNull(
			$title,
			__METHOD__ .
			" xpath $this->titleClassXpath " .
			"could not find title"
		);
		return $this->getTrimmedText($title);
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getMessage() {
		$contentElement = $this->dialogElement->find(
			"xpath", $this->contentClassXpath
		);
		$this->assertElementNotNull(
			$contentElement,
			__METHOD__ .
			" xpath $this->contentClassXpath " .
			"could not find content element"
		);
		return $this->getTrimmedText($contentElement);
	}

	/**
	 * clicks the accept (primary) button
	 *
	 * @param Session $session
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function accept(Session $session) {
		$primaryButton = $this->dialogElement->find(
			"xpath", $this->primaryButtonXpath
		);
		$this->assertElementNotNull(
			$primaryButton,
			__METHOD__ .
			" xpath $this->primaryButtonXpath " .
			"could not find primary button"
		);
		$primaryButton->click();
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 * clicks the button with the given label
	 *
	 * @param Session $session
	 * @param string $label
	 *
	 * @return void
	 */
	public function clickButton(Session $session, $label) {
		$xpathToFind = \sprintf($this->buttonByLabelXpath, $label);
		$button = $this->dialogElement->find("xpath", $xpathToFind);
		$this->assertElementNotNull(
			$button,
			__METHOD__ .
			" xpath $xpathToFind" .
			" could not find button with the given label"
		);
		$button->click();
		$this->waitForOutstandingAjaxCalls($session);
	}
}
