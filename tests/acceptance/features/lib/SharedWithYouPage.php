<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Bijay Sharma/Moheet Shrestha <trainees@jankaritech.com>
 * @copyright Copyright (c) 2017 Bijay Sharma/Moheet Shrestha trainees@jankaritech.com
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

use Behat\Mink\Session;
use Exception;

/**
 * Shared with you page.
 */
class SharedWithYouPage extends FilesPageBasic {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/apps/files/?view=sharingin';
	protected $fileNamesXpath = "//span[contains(@class,'nametext') and not(contains(@class,'innernametext'))]";
	protected $fileNameMatchXpath = "//span[contains(@class,'nametext') and not(contains(@class,'innernametext')) and .=%s]";
	protected $fileListXpath = ".//div[@id='app-content-sharingin']//tbody[@id='fileList']";
	protected $emptyContentXpath = ".//div[@id='app-content-sharingin']//div[@id='emptycontent']";
	protected $acceptPendingFederatedXpath = "//table//a[@class='action action-accept permanent']";

	/**
	 * @return string
	 */
	protected function getFileListXpath(): string {
		return $this->fileListXpath;
	}

	/**
	 * @return string
	 */
	protected function getFileNamesXpath(): string {
		return $this->fileNamesXpath;
	}

	/**
	 * @return string
	 */
	protected function getFileNameMatchXpath(): string {
		return $this->fileNameMatchXpath;
	}

	/**
	 * @return string
	 */
	protected function getEmptyContentXpath(): string {
		return $this->emptyContentXpath;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @return void
	 * @throws Exception
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 *
	 */
	protected function getFilePathInRowXpath(): string {
		throw new Exception(__METHOD__ . " not implemented in SharedWithYouPage");
	}

	/**
	 *
	 * @param string|array $name
	 * @param Session $session
	 * @param bool $expectToDeleteFile
	 * @param int $maxRetries
	 *
	 * @return void
	 */
	public function declineFile(
		$name,
		Session $session,
		bool $expectToDeleteFile = true,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		$this->initAjaxCounters($session);
		$this->resetSumStartedAjaxRequests($session);

		for ($counter = 0; $counter < $maxRetries; $counter++) {
			$row = $this->findFileRowByName($name, $session);
			try {
				$row->declineShare($session);
				$this->waitForAjaxCallsToStartAndFinish($session);
				$countXHRRequests = $this->getSumStartedAjaxRequests($session);
				//if no XHR Request were fired we assume the delete action
				//did not work and we retry
				if ($countXHRRequests === 0) {
					if ($expectToDeleteFile) {
						\error_log("Error while decline file");
					}
				} else {
					break;
				}
			} catch (Exception $e) {
				$this->closeFileActionsMenu();
				if ($expectToDeleteFile) {
					\error_log(
						"Error while decline file"
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
				}
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			}
		}
		if ($expectToDeleteFile && ($counter > 0)) {
			if (\is_array($name)) {
				$name = \implode('', $name);
			}
			$message = "INFORMATION: retried to decline file '$name' $counter times";
			echo $message;
			\error_log($message);
		}
	}

	/**
	 *
	 * @param string|array $name
	 * @param Session $session
	 * @param bool $expectToDeleteFile
	 * @param int $maxRetries
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteFileFromSharedWithYou(
		$name,
		Session $session,
		bool $expectToDeleteFile = true,
		int $maxRetries = STANDARD_RETRY_COUNT
	): void {
		$this->initAjaxCounters($session);
		$this->resetSumStartedAjaxRequests($session);

		for ($counter = 0; $counter < $maxRetries; $counter++) {
			$row = $this->findFileRowByName($name, $session);
			try {
				$row->delete($session);
				$this->waitForAjaxCallsToStartAndFinish($session);
				$countXHRRequests = $this->getSumStartedAjaxRequests($session);
				//if no XHR Request was fired we assume the delete action
				//did not work and we retry
				if ($countXHRRequests === 0) {
					if ($expectToDeleteFile) {
						\error_log("Error while deleting/unsharing file from shared-with-you");
					}
				} else {
					break;
				}
			} catch (Exception $e) {
				$this->closeFileActionsMenu();
				if ($expectToDeleteFile) {
					\error_log(
						"Error while deleting/unsharing file from shared-with-you."
						. "\n-------------------------\n"
						. $e->getMessage()
						. "\n-------------------------\n"
					);
				}
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			}
		}
		if ($expectToDeleteFile && ($counter > 0)) {
			if (\is_array($name)) {
				$name = \implode('', $name);
			}
			$message = "INFORMATION: retried deleting/unsharing file '$name' from shared-with-you $counter times";
			echo $message;
			\error_log($message);
			if ($counter === $maxRetries) {
				throw new Exception($message);
			}
		}
	}

	/**
	 * @return void
	 */
	public function acceptPendingShare() {
		$acceptShareElement = $this->find("xpath", $this->acceptPendingFederatedXpath);
		$this->assertElementNotNull(
			$acceptShareElement,
			__METHOD__ .
			" xpath $this->acceptPendingFederatedXpath " .
			"could not find accept element."
		);
		$acceptShareElement->click();
	}
}
