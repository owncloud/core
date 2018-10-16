<?php
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
	
	/**
	 * @return string
	 */
	protected function getFileListXpath() {
		return $this->fileListXpath;
	}
	
	/**
	 * @return string
	 */
	protected function getFileNamesXpath() {
		return $this->fileNamesXpath;
	}
	
	/**
	 * @return string
	 */
	protected function getFileNameMatchXpath() {
		return $this->fileNameMatchXpath;
	}
	
	/**
	 * @return string
	 */
	protected function getEmptyContentXpath() {
		return $this->emptyContentXpath;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see \Page\FilesPageBasic::getFilePathInRowXpath()
	 *
	 * @return void
	 */
	protected function getFilePathInRowXpath() {
		throw new \Exception("not implemented in SharedWithYouPage");
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
		$expectToDeleteFile = true,
		$maxRetries = STANDARD_RETRY_COUNT
	) {
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
			} catch (\Exception $e) {
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
				$name = \implode($name);
			}
			$message = "INFORMATION: retried to decline file '$name' $counter times";
			echo $message;
			\error_log($message);
		}
	}
}
