<?php
/**
 * @author Phil Davis <phil@jankaritech.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Federated cloud functions
 */
trait Federation {

	/**
	 * @When /^user "([^"]*)" from server "(LOCAL|REMOTE)" shares "([^"]*)" with user "([^"]*)" from server "(LOCAL|REMOTE)" using the API$/
	 * @Given /^user "([^"]*)" from server "(LOCAL|REMOTE)" has shared "([^"]*)" with user "([^"]*)" from server "(LOCAL|REMOTE)"$/
	 *
	 * @param string $sharerUser
	 * @param string $sharerServer "LOCAL" or "REMOTE"
	 * @param string $sharerPath
	 * @param string $shareeUser
	 * @param string $shareeServer "LOCAL" or "REMOTE"
	 *
	 * @return void
	 */
	public function federateSharing(
		$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer
	) {
		if ($shareeServer == "REMOTE") {
			$shareWith = "$shareeUser@" . $this->remoteBaseUrlWithSlash();
		} else {
			$shareWith = "$shareeUser@" . $this->localBaseUrlWithSlash();
		}
		$previous = $this->usingServer($sharerServer);
		$this->createShare(
			$sharerUser, $sharerPath, 6, $shareWith, null, null, null
		);
		$this->usingServer($previous);
	}

	/**
	 * @When /^user "([^"]*)" from server "(LOCAL|REMOTE)" accepts the last pending share using the API$/
	 * @Given /^user "([^"]*)" from server "(LOCAL|REMOTE)" has accepted the last pending share$/
	 *
	 * @param string $user
	 * @param string $server
	 *
	 * @return void
	 */
	public function acceptLastPendingShare($user, $server) {
		$previous = $this->usingServer($server);
		$this->asUser($user);
		$this->sendingToWith(
			'GET',
			"/apps/files_sharing/api/v1/remote_shares/pending",
			null
		);
		$this->theHTTPStatusCodeShouldBe('200');
		$this->theOCSStatusCodeShouldBe('100');
		$share_id = $this->response->xml()->data[0]->element[0]->id;
		$this->sendingToWith(
			'POST',
			"/apps/files_sharing/api/v1/remote_shares/pending/{$share_id}",
			null
		);
		$this->theHTTPStatusCodeShouldBe('200');
		$this->theOCSStatusCodeShouldBe('100');
		$this->usingServer($previous);
	}
}
