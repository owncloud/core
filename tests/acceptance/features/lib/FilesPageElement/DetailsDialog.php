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
	private $detailsDialogXpath = "//*[contains(@id, 'app-sidebar') and not(contains(@class, 'disappear'))]";
	private $detailsDialogCloseXpath = "//div[@id='app-sidebar']//*[@class='close icon-close']";
	private $thumbnailContainerXpath = ".//*[contains(@class,'thumbnailContainer')]";
	private $thumbnailFromContainerXpath = "/a";
	private $detailsTabId = [
		'comments' => "commentsTabView",
		'sharing' => "shareTabView",
		'versions' => "versionsTabView"
	];
	private $tagsContainer = "//div[@class='systemTagsInputFieldContainer']";

	private $tagsInputXpath = "//li[@class='select2-search-field']//input";

	private $tagsSuggestDropDownXpath = "//div[contains(@class, 'systemtags-select2-dropdown') and contains(@id, 'select2-drop')]";

	private $tagsResultFromDropdownXpath = "//li[contains(@class, 'select2-result')]";
	private $tagEditButtonInTagXpath = "//span[@class='systemtags-actions']//a[contains(@class, 'rename')]";
	private $tagDeleteButtonInTagXpath = "//form[@class='systemtags-rename-form']//a";

	private $commentInputXpath = "//form[@class='newCommentForm']//textarea[@class='message']";
	private $commentPostXpath = "//form[@class='newCommentForm']//input[@class='submit']";
	private $commentEditFormXpath = "//ul[@class='comments']//div[@class='newCommentRow comment']";
	private $commentEditButtonXpath = "//a[@data-original-title='Edit comment']";
	private $commentDeleteButtonXpath = "//a[@data-original-title='Delete comment']";
	private $commentListXpath = "//ul[@class='comments']//div[@class='message']";

	private $versionsListXpath = "//div[@id='versionsTabView']//ul[@class='versions']";
	private $lastVersionRevertButton = "//div[@id='versionsTabView']//ul[@class='versions']//li[1]/div/a";

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
		$tab = $this->findById(
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
		return "//ul[@class='comments']//div[@class='message' and contains(., '" . $content . "')]";
	}

	/**
	 * find the xpath of version list
	 *
	 * @param string $content
	 *
	 * @return string
	 */public function getVersionsList() {
		$versionsList = $this->find("xpath", $this->versionsListXpath);
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
	 * @param string $content
	 *
	 * @return
	 */public function getLastVersionRevertButton() {
		$btn = $this->find("xpath", $this->lastVersionRevertButton);
		$this->assertElementNotNull(
			$btn,
			__METHOD__ .
			" could not find the button to revert the version"
		);
		$this->waitTillElementIsNotNull($this->lastVersionRevertButton);
		return $btn;
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
		$tabSwitchXpath = "//li[@data-tabid='" . $tabId . "']";
		$tabSwitch = $this->find("xpath", $tabSwitchXpath);
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
		try {
			$dialog = $this->find("xpath", $this->detailsDialogXpath);
			$visible = $dialog !== null;
		} catch (ElementNotFoundException $e) {
			$visible = false;
		}
		return $visible;
	}

	/**
	 * get the list of comments listed in the webUI
	 *
	 * @return NodeElement[]
	 */
	public function getCommentList() {
		$this->waitTillElementIsNotNull($this->detailsDialogXpath);
		$dialog = $this->find("xpath", $this->detailsDialogXpath);
		$commentList = $dialog->findAll("xpath", $this->commentListXpath);
		return  $commentList;
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
	 * @param string $content
	 *
	 * @return void
	 */
	public function addComment($content) {
		$commentInput = $this->find("xpath", $this->commentInputXpath);
		$commentInput->setValue($content);
		$postButton = $this->find("xpath", $this->commentPostXpath);
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
		$commentList = $this->find("xpath", $this->getCommentXpath($content));
		$this->waitTillElementIsNotNull($this->commentListXpath);

		$this->waitTillElementIsNotNull($this->commentEditButtonXpath);
		$commentEditButton = $commentList->getParent()->find("xpath", $this->commentEditButtonXpath);
		$commentEditButton->focus();
		$commentEditButton->click();

		$this->waitTillElementIsNotNull($this->commentEditFormXpath);
		$commentEditForm = $this->find("xpath", $this->commentEditFormXpath);
		$commentEditForm->focus();

		$commentDeleteButton = $commentEditForm->find("xpath", $this->commentDeleteButtonXpath);
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
		$thumbnailContainer = $this->find("xpath", $this->thumbnailContainerXpath);
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
		$inputField = $this->find(
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
				$editBtn->focus();
				$editBtn->click();

				$deleteBtn = $this->find("xpath", $this->tagDeleteButtonInTagXpath);
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
		return "//div[contains(@class, 'systemtags-select2-dropdown')]" .
			"//ul[@class='select2-results']" .
			"//span[@class='label']";
	}

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
		$detailsDialogCloseButton = $this->find("xpath", $this->detailsDialogCloseXpath);
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
}
