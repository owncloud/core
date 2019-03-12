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

namespace Page\FilesPageElement;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * Object of a row on the FilesPage
 */
class FileRow extends OwncloudPage {
	/**
	 * @var NodeElement of this row
	 */
	protected $rowElement;

	/**
	 * name of the file
	 *
	 * @var string
	 */
	protected $name;
	protected $fileActionMenuBtnXpath = "//a[@data-action='menu']";
	protected $shareBtnXpath = "//a[@data-action='Share']";
	protected $loadingIndicatorXpath = ".//*[@class='loading']";
	protected $fileRenameInputXpath = "//input[contains(@class,'filename')]";
	protected $fileBusyIndicatorXpath = ".//*[@class='thumbnail' and contains(@style,'loading')]";
	protected $fileTooltipXpath = ".//*[@class='tooltip-inner']";
	protected $thumbnailXpath = "//*[@class='thumbnail']";
	protected $fileLinkXpath = "//span[contains(@class,'nametext')]";
	protected $restoreLinkXpath = '//a[@data-action="Restore"]';
	protected $notMarkedFavoriteXpath = "//span[contains(@class,'icon-star')]";
	protected $markedFavoriteXpath = "//span[contains(@class,'icon-starred')]";
	protected $shareStateXpath = "//span[@class='state']";
	protected $lockStateXpath = "//span[contains(@class,'icon-lock')]";
	protected $sharerXpath = "//a[@data-action='Share']";
	protected $acceptShareBtnXpath = "//span[@class='fileactions']//a[contains(@class,'accept')]";
	protected $declinePendingShareBtnXpath = "//a[@data-action='Reject']";
	protected $sharingDialogXpath = ".//div[@class='dialogContainer']";
	protected $lockDialogId = "lockTabView";
	protected $highlightsXpath = "//div[@class='highlights']";

	/**
	 *
	 * @return boolean
	 */
	public function isVisible() {
		return $this->rowElement->isVisible();
	}

	/**
	 * sets the NodeElement for the current file row
	 * a little bit like __construct() but as we access this "sub-page-object"
	 * from an other Page Object by $this->getPage("FilesPageElement\\FileRow")
	 * there is no real __construct() that can take arguments
	 *
	 * @param NodeElement $rowElement
	 *
	 * @return void
	 */
	public function setElement(NodeElement $rowElement) {
		$this->rowElement = $rowElement;
	}

	/**
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * returns the current file name as string, even if it was an array
	 *
	 * @return string
	 */
	public function getNameAsString() {
		if (\is_array($this->name)) {
			return \implode($this->name);
		}
		return $this->name;
	}

	/**
	 * checks if the file row is busy,
	 * for example waiting for a rename to be finished
	 *
	 * @return boolean
	 */
	public function isBusy() {
		return $this->rowElement->hasClass('busy');
	}

	/**
	 * finds the Action Button
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	public function findFileActionButton() {
		$actionButton = $this->rowElement->find(
			"xpath", $this->fileActionMenuBtnXpath
		);
		$this->assertElementNotNull(
			$actionButton,
			__METHOD__ .
			" xpath $this->fileActionMenuBtnXpath could not find actionButton in fileRow"
		);
		$actionButton->focus();
		return $actionButton;
	}

	/**
	 * finds and clicks the file actions button
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function clickFileActionButton() {
		$this->findFileActionButton()->click();
	}

	/**
	 * opens the file action menu
	 *
	 * @param Session $session
	 *
	 * @throws ElementNotFoundException
	 * @return FileActionsMenu
	 */
	public function openFileActionsMenu(Session $session) {
		$this->clickFileActionButton();
		/**
		 *
		 * @var FilesPage $filesPage
		 */
		$filesPage = $this->getPage('FilesPage');
		/**
		 *
		 * @var FileActionsMenu $actionMenu
		 */
		$actionMenu = $this->getPage('FilesPageElement\\FileActionsMenu');
		$actionMenu->waitTillPageIsLoaded(
			$session, STANDARD_UI_WAIT_TIMEOUT_MILLISEC, $filesPage->getFileActionMenuXpath()
		);
		$this->waitForScrollingToFinish($session, '#app-content');
		return $actionMenu;
	}

	/**
	 * finds and returns the share button element
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findSharingButton() {
		$shareBtn = $this->rowElement->find("xpath", $this->shareBtnXpath);
		$this->assertElementNotNull(
			$shareBtn,
			__METHOD__ .
			" xpath $this->shareBtnXpath could not find sharing button in fileRow"
		);
		$shareBtn->focus();
		return $shareBtn;
	}

	/**
	 * opens the sharing dialog
	 *
	 * @param Session $session
	 *
	 * @throws ElementNotFoundException
	 * @return SharingDialog
	 */
	public function openSharingDialog(Session $session) {
		$this->findSharingButton()->click();
		$this->waitTillElementIsNull($this->loadingIndicatorXpath);
		/**
		 *
		 * @var SharingDialog $sharingDialogPage
		 */
		$sharingDialogPage = $this->getPage("FilesPageElement\\SharingDialog");
		$sharingDialogPage->waitTillPageIsLoaded(
			$session, STANDARD_UI_WAIT_TIMEOUT_MILLISEC, $this->sharingDialogXpath
		);
		return $sharingDialogPage;
	}

	/**
	 * opens the lock dialog that list all locks of the given file row
	 *
	 * @throws ElementNotFoundException
	 * @return LockDialog
	 */
	public function openLockDialog() {
		$element = $this->rowElement->find("xpath", $this->lockStateXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" xpath $this->lockStateXpath could not find lock button in row"
		);
		$element->click();
		$lockDialogElement = $this->findById($this->lockDialogId);
		$this->assertElementNotNull(
			$lockDialogElement,
			__METHOD__ .
			" id $this->lockDialogId could not find lock dialog"
		);
		$this->waitFor(
			STANDARD_UI_WAIT_TIMEOUT_MILLISEC / 1000, [$lockDialogElement, 'isVisible']
		);

		/**
		 *
		 * @var LockDialog $lockDialog
		 */
		$lockDialog = $this->getPage("FilesPageElement\\LockDialog");
		$lockDialog->setElement($lockDialogElement);
		return $lockDialog;
	}

	/**
	 * deletes a lock by its order in the list
	 *
	 * @param int $number
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteLockByNumber($number, Session $session) {
		$lockDialog = $this->openLockDialog();
		$lockDialog->deleteLockByNumber($number, $session);
	}

	/**
	 * finds the input field to rename the file/folder
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findRenameInputField() {
		$inputField = $this->rowElement->find(
			"xpath", $this->fileRenameInputXpath
		);
		$this->assertElementNotNull(
			$inputField,
			__METHOD__ .
			" xpath $this->fileRenameInputXpath could not find rename input field in fileRow"
		);
		return $inputField;
	}

	/**
	 * renames the file
	 *
	 * @param string $toName
	 * @param Session $session
	 *
	 * @return void
	 */
	public function rename($toName, Session $session) {
		$actionMenu = $this->openFileActionsMenu($session);
		$actionMenu->rename();
		$this->waitTillElementIsNotNull($this->fileRenameInputXpath);
		$inputField = $this->findRenameInputField();
		$inputField->setValue($toName);
		$this->waitTillElementIsNull($this->fileBusyIndicatorXpath);
	}

	/**
	 * deletes the file
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function delete(Session $session) {
		$actionMenu = $this->openFileActionsMenu($session);
		$actionMenu->delete();
		$this->waitTillElementIsNull($this->fileBusyIndicatorXpath);
	}

	/**
	 * finds and returns the tooltip element
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findTooltipElement() {
		$element = $this->rowElement->find("xpath", $this->fileTooltipXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" xpath $this->fileTooltipXpath" .
			" could not find tooltip element of file '" . $this->getNameAsString() . "'"
		);
		return $element;
	}

	/**
	 * returns the tooltip text
	 *
	 * @return string
	 */
	public function getTooltip() {
		return $this->getTrimmedText($this->findTooltipElement());
	}

	/**
	 * return the path of the current file
	 *
	 * @param string $xpath xpath related to the fileRow element
	 *
	 * @throws ElementNotFoundException
	 * @return string
	 */
	public function getFilePath($xpath) {
		$filePathElement = $this->rowElement->find("xpath", $xpath);
		$this->assertElementNotNull(
			$filePathElement,
			__METHOD__ .
			" xpath $xpath could not find file path element"
		);
		return \dirname($filePathElement->getText());
	}

	/**
	 * finds and returns the thumbnail of the file
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findThumbnail() {
		$thumbnail = $this->rowElement->find("xpath", $this->thumbnailXpath);
		$this->assertElementNotNull(
			$thumbnail,
			__METHOD__ .
			" xpath $this->thumbnailXpath" .
			" could not find thumbnail of file '" . $this->getNameAsString() . "'"
		);
		return $thumbnail;
	}

	/**
	 * selects this row for batch action e.g. download or delete
	 * if the row is already selected, then it will be unselected.
	 *
	 * @return void
	 */
	public function selectForBatchAction() {
		$this->findThumbnail()->click();
	}

	/**
	 * find and return the link to the file/folder
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function findFileLink() {
		$linkElement = $this->rowElement->find("xpath", $this->fileLinkXpath);
		$this->assertElementNotNull(
			$linkElement,
			__METHOD__ .
			" xpath $this->fileLinkXpath" .
			" could not find link to '" . $this->getNameAsString() . "'"
		);
		return $linkElement;
	}

	/**
	 * opens the current file or folder by clicking on the link
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function openFileFolder(Session $session) {
		$this->findFileLink()->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}
	
	/**
	 * restore the current deleted file and folder by clicking on the restore link
	 *
	 * @return void
	 */
	public function restore() {
		$rowElement = $this->rowElement->find('xpath', $this->restoreLinkXpath);
		$this->assertElementNotNull(
			$rowElement,
			__METHOD__ .
			" xpath $this->restoreLinkXpath" .
			" could not find restore link to '" . $this->getNameAsString() . "'"
		);
		$rowElement->click();
	}

	/**
	 * marks the current file or folder as favorite by clicking the star icon
	 *
	 * @return void
	 */
	public function markAsFavorite() {
		$element = $this->rowElement->find("xpath", $this->notMarkedFavoriteXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" xpath $this->notMarkedFavoriteXpath not found"
		);
		$element->click();
	}

	/**
	 * checks whether the current file or folder is marked as favorite or not
	 *
	 * @return bool
	 */
	public function isMarkedAsFavorite() {
		$checkFavorite = $this->rowElement->find(
			"xpath", $this->markedFavoriteXpath
		);
		
		if ($checkFavorite === null) {
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * unmarks the current file or folder off favorite by clicking the star icon
	 *
	 * @return void
	 */
	public function unmarkFavorite() {
		$element = $this->rowElement->find("xpath", $this->markedFavoriteXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" xpath $this->markedFavoriteXpath not found"
		);
		$element->click();
	}

	/**
	 * returns the lock state
	 *
	 * @throws ElementNotFoundException
	 *
	 * @return bool
	 */
	public function getLockState() {
		$element = $this->rowElement->find("xpath", $this->lockStateXpath);
		if ($element === null) {
			return false;
		}
		return $element->isVisible();
	}

	/**
	 * returns the share state (only works on the "Shared with you" page)
	 *
	 * @throws ElementNotFoundException
	 *
	 * @return string
	 */
	public function getShareState() {
		$element = $this->rowElement->find("xpath", $this->shareStateXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" sharing state element with xpath $this->shareStateXpath not found"
		);
		return $element->getText();
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 *
	 * @return string
	 */
	public function getSharer() {
		$element = $this->rowElement->find("xpath", $this->sharerXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" sharer element with xpath $this->sharerXpath not found"
		);
		return \trim($element->getText());
	}
	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function acceptShare($session) {
		$element = $this->rowElement->find("xpath", $this->acceptShareBtnXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" accept share button with xpath $this->acceptShareBtnXpath not found"
		);
		$element->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function declineShare($session) {
		//TODO decline already accepted share
		$element = $this->rowElement->find("xpath", $this->declinePendingShareBtnXpath);
		if ($element === null) {
			$this->openFileActionsMenu($session);
			$element = $this->rowElement->find("xpath", $this->declinePendingShareBtnXpath);
		}
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" decline share button with xpath $this->declinePendingShareBtnXpath not found"
		);
		$element->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * returns the element that contains the highlighted content of the file
	 * when using elastic search
	 *
	 * @throws ElementNotFoundException
	 * @return NodeElement
	 */
	public function getHighlightsElement() {
		$element = $this->rowElement->find("xpath", $this->highlightsXpath);
		$this->assertElementNotNull(
			$element,
			__METHOD__ .
			" xpath $this->highlightsXpath " .
			" highlights element not found"
		);
		return $element;
	}
}
