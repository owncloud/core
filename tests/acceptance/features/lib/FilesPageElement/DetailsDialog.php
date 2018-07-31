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

	private $detailsDialogCloseXpath = "//div[@id='app-sidebar']//*[@class='close icon-close']";
	private $thumbnailContainerXpath = ".//*[contains(@class,'thumbnailContainer')]";
	private $thumbnailFromContainerXpath = "/a";
	private $detailsTabId = [
		'comments' => "commentsTabView",
		'sharing' => "shareTabView",
		'versions' => "versionsTabView"
	];

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
		if ($tab === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" could not find details tab with id $tabName"
			);
		}
		return $tab;
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
		if ($thumbnailContainer === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->thumbnailContainerXpath " .
				"could not find thumbnailContainer"
			);
		}
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
		if ($thumbnail === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->thumbnailFromContainerXpath " .
				"could not find thumbnail"
			);
		}
		return $thumbnail;
	}

	/**
	 * closes the details dialog panel
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function closeDetailsDialog() {
		$detailsDialogCloseButton = $this->find("xpath", $this->detailsDialogCloseXpath);
		if ($detailsDialogCloseButton === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->detailsDialogCloseXpath " .
				"could not find details-dialog-close-button"
			);
		}

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
		$timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC
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
			\usleep(STANDARDSLEEPTIMEMICROSEC);
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
