<?php

/**
 * ownCloud
 *
 * @author Phil Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2018 Phil Davis phil@jankaritech.com
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

namespace Page\FilesPageElement;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use WebDriver\Exception\StaleElementReference;

/**
 * The Details Dialog
 *
 */
class DetailsDialog extends OwncloudPage {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/';
	private $detailsDialogCloseXpath = "//*[@class='close icon-close']";
	private $thumbnailContainerXpath = ".//*[contains(@class,'thumbnailContainer')]";
	private $thumbnailFromContainerXpath = "/a";
	private $detailsTabId = [
		'comments' => "commentsTabView",
		'sharing' => "shareTabView",
		'versions' => "versionsTabView"
	];
	private $tabSwitchBtnXpath = "//li[@data-tabid='%s']";
	private $tagsContainer = "//div[@class='systemTagsInputFieldContainer']";

	private $tagsInputXpath = "//li[@class='select2-search-field']//input";

	private $tagsSuggestDropDownXpath = "//div[contains(@class, 'systemtags-select2-dropdown') and contains(@id, 'select2-drop')]";

	private $tagsResultFromDropdownXpath = "//li[contains(@class, 'select2-result')]";
	private $tagEditButtonInTagXpath = "//span[@class='systemtags-actions']//a[contains(@class, 'rename')]";
	private $tagDeleteButtonInTagXpath = "//form[@class='systemtags-rename-form']//a";
	private $tagsDropDownResultXpath = "//div[contains(@class, 'systemtags-select2-dropdown')]" .
										"//ul[@class='select2-results']" .
										"//span[@class='label']";

	private $commentXpath = "//ul[@class='comments']//div[@class='message' and contains(., '%s')]";
	private $commentInputXpath = "//form[@class='newCommentForm']//textarea[@class='message']";
	private $commentPostXpath = "//form[@class='newCommentForm']//input[@class='submit']";
	private $commentEditFormXpath = "//ul[@class='comments']//div[@class='newCommentRow comment']";
	private $commentEditButtonXpath = "//a[@data-original-title='Edit comment']";
	private $commentDeleteButtonXpath = "//a[@data-original-title='Delete comment']";
	private $commentListXpath = "//ul[@class='comments']//div[@class='message']";

	private $versionsListXpath = "//div[@id='versionsTabView']//ul[@class='versions']";
	private $lastVersionRevertButton = "//div[@id='versionsTabView']//ul[@class='versions']//li[1]/div/a";

	/**
	 *
	 * @var NodeElement
	 */
	private $detailsDialogElement;

	/**
	 * sets the NodeElement for the current dialog
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object or a Context file by
	 * $this->getPage("FilesPageElement\\DetailsDialog")
	 * there is no real __construct() that can take arguments
	 * In the rest of the class we can use $this->detailsDialogElement to find
	 * other elements to make sure that we are searching in the right place
	 *
	 * @param NodeElement $detailsDialogElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $detailsDialogElement) {
		$this->detailsDialogElement = $detailsDialogElement;
	}

	/**
	 * Lookup the id for the requested details tab.
	 * If the id is not known, then return the passed-in parameter as the id.
	 *
	 * @param string $tabName e.g. comments, sharing, versions
	 *
	 * @return string
	 */
	public function getDetailsTabId($tabName) {
		if (isset($this->detailsTabId[$tabName])) {
			$tabId = $this->detailsTabId[$tabName];
		} else {
			$tabId = $tabName;
		}

		return $tabId;
	}

	/**
	 * find the element that is the requested details tab
	 *
	 * @param string $tabName e.g. comments, sharing, versions
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	private function findDetailsTab($tabName) {
		$tab = $this->detailsDialogElement->findById(
			$this->getDetailsTabId($tabName)
		);
		$this->assertElementNotNull(
			$tab,
			__METHOD__ .
			" could not find details tab with id $tabName"
		);
		return $tab;
	}

	/**
	 * find the xpath of comment with given content
	 *
	 * @param string $content
	 *
	 * @return string
	 */
	private function getCommentXpath($content) {
		return \sprintf($this->commentXpath, $content);
	}

	/**
	 * find the xpath of version list
	 *
	 * @return string
	 */
	public function getVersionsList() {
		$versionsList = $this->detailsDialogElement->find(
			"xpath", $this->versionsListXpath
		);
		$this->assertElementNotNull(
			$versionsList,
			__METHOD__ .
			" could not find versions list for current file"
		);
		$this->waitTillElementIsNotNull($this->versionsListXpath);
		return $versionsList;
	}

	/**
	 * find the xpath of button to revert to last version
	 *
	 * @return void
	 */
	public function getLastVersionRevertButton() {
		$btn = $this->detailsDialogElement->find(
			"xpath", $this->lastVersionRevertButton
		);
		$this->assertElementNotNull(
			$btn,
			__METHOD__ .
			" could not find the button to revert the version"
		);
		$this->waitTillElementIsNotNull($this->lastVersionRevertButton);
		return $btn;
	}

	/**
	 * get xpath for button to switch tab
	 *
	 * @param string $tabId
	 *
	 * @return string
	 */
	public function getTabSwitchBtnXpath($tabId) {
		return \sprintf($this->tabSwitchBtnXpath, $tabId);
	}

	/**
	 * change the active tab of details panel
	 *
	 * @param string $tabName e.g. comments, sharing, versions
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function changeDetailsTab($tabName) {
		$tabId = $this->getDetailsTabId($tabName);
		$tabSwitchXpath = $this->getTabSwitchBtnXpath($tabId);
		$tabSwitch = $this->detailsDialogElement->find("xpath", $tabSwitchXpath);
		$this->assertElementNotNull(
			$tabSwitch,
			__METHOD__ .
			" could not find tab switch with id $tabName"
		);
		$this->waitTillElementIsNotNull($tabSwitchXpath);
		$tabSwitch->focus();
		$tabSwitch->click();
	}

	/**
	 * checks if the details dialog is visible
	 *
	 * @return bool
	 */
	public function isDialogVisible() {
		return $this->detailsDialogElement->isVisible();
	}

	/**
	 * get the list of comments listed in the webUI
	 *
	 * @return NodeElement[]
	 */
	public function getCommentList() {
		return $this->detailsDialogElement->findAll(
			"xpath", $this->commentListXpath
		);
	}
	/**
	 * check if a comment with given text is listed in the webUI
	 *
	 * @param string $text
	 *
	 * @return bool
	 */
	public function isCommentOnUI($text) {
		$commentList = $this->getCommentList();
		if (\sizeof($commentList) === 0) {
			return false;
		}
		foreach ($commentList as $comment) {
			$this->waitTillElementIsNotNull($comment->getXpath());
			if ($comment->getText() === $text) {
				return true;
			}
		}
		return false;
	}

	/**
	 * add a comment in a file whose details dialog is shown in the webUI
	 *
	 * @param Session $session
	 * @param string $content
	 *
	 * @return void
	 */
	public function addComment(Session $session, $content) {
		$commentInput = $this->detailsDialogElement->find(
			"xpath", $this->commentInputXpath
		);
		$this->assertElementNotNull(
			$commentInput,
			__METHOD__ .
			" xpath: $this->commentInputXpath" .
			"could not find comment input field"
		);
		$this->fillFieldWithCharacters(
			$session, $this->commentInputXpath, $content
		);

		$postButton = $this->detailsDialogElement->find(
			"xpath", $this->commentPostXpath
		);
		$this->assertElementNotNull(
			$commentInput,
			__METHOD__ .
			" xpath: $this->commentPostXpath" .
			"could not find comment post button"
		);
		$postButton->focus();
		$postButton->click();
		$this->waitTillElementIsNotNull($this->getCommentXpath($content));
	}

	/**
	 * delete the comment in a file whose details dialog is shown in the webUI with given content
	 *
	 * @param string $content
	 *
	 * @return void
	 *
	 */
	public function deleteComment($content) {
		$commentList = $this->detailsDialogElement->find(
			"xpath", $this->getCommentXpath($content)
		);
		$this->assertElementNotNull(
			$commentList,
			__METHOD__ .
			" could not find comment with content $content"
		);
		$this->waitTillElementIsNotNull($this->commentListXpath);

		$this->waitTillElementIsNotNull($this->commentEditButtonXpath);
		$commentEditButton = $commentList->getParent()->find("xpath", $this->commentEditButtonXpath);
		$this->assertElementNotNull(
			$commentEditButton,
			__METHOD__ .
			" xpath: $this->commentEditButtonXpath" .
			"could not find comment edit button"
		);
		$commentEditButton->focus();
		$commentEditButton->click();

		$this->waitTillElementIsNotNull($this->commentEditFormXpath);
		$commentEditForm = $this->detailsDialogElement->find("xpath", $this->commentEditFormXpath);
		$this->assertElementNotNull(
			$commentEditForm,
			__METHOD__ .
			" xpath: $this->commentEditFormXpath" .
			"could not find comment edit form"
		);
		$commentEditForm->focus();

		$commentDeleteButton = $commentEditForm->find(
			"xpath", $this->commentDeleteButtonXpath
		);
		$this->assertElementNotNull(
			$commentDeleteButton,
			__METHOD__ .
			" xpath: $this->commentDeleteButtonXpath" .
			"could not find comment delete button"
		);
		$commentDeleteButton->focus();
		$commentDeleteButton->click();
	}

	/**
	 * checks if the requested tab in the details panel is visible
	 *
	 * @param string $tabName
	 *
	 * @return bool
	 */
	public function isDetailsPanelVisible($tabName) {
		try {
			$visible = $this->findDetailsTab($tabName)->isVisible();
		} catch (ElementNotFoundException $e) {
			$visible = false;
		}
		return $visible;
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement of the whole container holding the thumbnail
	 */
	public function findThumbnailContainer() {
		$thumbnailContainer = $this->detailsDialogElement->find(
			"xpath", $this->thumbnailContainerXpath
		);
		$this->assertElementNotNull(
			$thumbnailContainer,
			__METHOD__ .
			" xpath $this->thumbnailContainerXpath " .
			"could not find thumbnailContainer"
		);
		return $thumbnailContainer;
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findThumbnail() {
		$thumbnailContainer = $this->findThumbnailContainer();
		$thumbnail = $thumbnailContainer->find(
			"xpath", $this->thumbnailFromContainerXpath
		);
		$this->assertElementNotNull(
			$thumbnail,
			__METHOD__ .
			" xpath $this->thumbnailFromContainerXpath " .
			"could not find thumbnail"
		);
		return $thumbnail;
	}

	/**
	 * Insert tag name inside the tag field
	 *
	 * @param string $tagName
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function insertTagNameInTheTagsField($tagName) {
		$inputField = $this->detailsDialogElement->find(
			"xpath",
			$this->tagsContainer . $this->tagsInputXpath
		);

		$this->assertElementNotNull(
			$inputField,
			__METHOD__ .
			" xpath $this->tagsContainer . $this->tagsInputXpath " .
			"could not find input field"
		);
		$inputField->focus();
		$inputField->setValue($tagName);

		$this->waitTillElementIsNotNull($this->tagsSuggestDropDownXpath);
	}

	/**
	 * Get tag suggestions result from the dropdown
	 *
	 * @return NodeElement[]
	 */
	public function getDropDownTagsSuggestionResults() {
		$this->waitTillElementIsNotNull($this->tagsSuggestDropDownXpath);

		// select2 requires some time to display the results even though the dropdown has appeared.
		// Until that, select2 shows `Searching...` in the dropdown.
		// We are waiting here till a single result show up on the dropdown.
		$this->waitTillElementIsNotNull($this->tagsSuggestDropDownXpath . $this->tagsResultFromDropdownXpath);

		return $this->findAll("xpath", $this->getTagsDropDownResultsXpath());
	}

	/**
	 * Add a tag on the files in the details dialog
	 *
	 * @param string $tagName
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function addTag($tagName) {
		$this->insertTagNameInTheTagsField($tagName);

		$this->waitTillElementIsNotNull($this->tagsSuggestDropDownXpath);

		$tagSuggestions = $this->getDropDownTagsSuggestionResults();

		foreach ($tagSuggestions as $tag) {
			if ($tag->getText() === $tagName) {
				$tag->click();
			}
		}
	}

	/**
	 * Delete the tag with the given name
	 *
	 * @param string $tagName
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function deleteTag($tagName) {
		$this->insertTagNameInTheTagsField($tagName);
		$suggestions = $this->getDropDownTagsSuggestionResults();
		foreach ($suggestions as $tag) {
			if ($tag->getText() === $tagName) {
				$tagContainer = $tag->getParent();
				$editBtn = $tagContainer->find("xpath", $this->tagEditButtonInTagXpath);
				$this->assertElementNotNull(
					$editBtn,
					__METHOD__ .
					" xpath: $this->tagEditButtonInTagXpath" .
					"could not find tag edit button"
				);
				$editBtn->focus();
				$editBtn->click();

				$deleteBtn = $this->find(
					"xpath", $this->tagDeleteButtonInTagXpath
				);
				$this->assertElementNotNull(
					$deleteBtn,
					__METHOD__ .
					" xpath: $this->tagDeleteButtonInTagXpath" .
					" could not find tag delete button"
				);
				$deleteBtn->focus();
				$deleteBtn->click();
			}
		}
	}
	/**
	 * Returns xpath of the tag results dropdown
	 *
	 * @return string
	 */
	public function getTagsDropDownResultsXpath() {
		return $this->tagsDropDownResultXpath;
	}

	/**
	 * @return void
	 */
	public function restoreCurrentFileToLastVersion() {
		$revertBtn = $this->getLastVersionRevertButton();
		$revertBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * closes the details dialog panel
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function closeDetailsDialog() {
		$detailsDialogCloseButton = $this->detailsDialogElement->find(
			"xpath", $this->detailsDialogCloseXpath
		);
		$this->assertElementNotNull(
			$detailsDialogCloseButton,
			__METHOD__ .
			" xpath $this->detailsDialogCloseXpath " .
			"could not find details-dialog-close-button"
		);

		try {
			$detailsDialogCloseButton->click();
		} catch (UnknownError $e) {
			// Edge often throws UnknownError 'Invalid Argument' when trying to
			// click the close button, even though the button was found above.
			// Ignore it for now. Many tests could keep working without having
			// closed the details dialog.
			// TODO: Edge - if it keeps happening then find out why.
			\error_log(
				__METHOD__
				. " UnknownError while doing detailsDialogCloseButton->click()"
				. "\n-------------------------\n"
				. $e->getMessage()
				. "\n-------------------------\n"
			);
		}
	}

	/**
	 * there is no reliable loading indicator on the details dialog page,
	 * so wait for the thumbnail to be there with a style attribute.
	 * this should happen both when previews are enabled and disabled.
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
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			try {
				if ($this->findThumbnail()->getAttribute("style") !== null) {
					break;
				}
			} catch (ElementNotFoundException $e) {
				// Just loop and try again if the element was not found yet.
			} catch (StaleElementReference $e) {
				// Just loop and try again if the element is stale.
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for the files dialog to open"
			);
		}

		$this->waitForOutstandingAjaxCalls($session);
	}
}
