<?php
/**
 * ownCloud
 *
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

use rdx\behatvars\BehatVariablesContext;
use TestHelpers\OcsApiHelper;

require_once 'bootstrap.php';

/**
 * Features context.
 */
class FeatureContext extends BehatVariablesContext {
	use BasicStructure;

	/**
	 * @return void
	 */
	protected function resetAppConfigs() {
		// Remember the current capabilities
		$this->theAdministratorGetsCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml[$this->getBaseUrl()] = $this->getCapabilitiesXml();
		// Set the required starting values for testing
		$this->setCapabilities($this->getCommonSharingConfigs());
	}

	/**
	 * @Given the administrator has set the last login date for user :user to :days days ago
	 * @When the administrator sets the last login date for user :user to :days days ago using the testing API
	 *
	 * @param string $user
	 * @param string $days
	 *
	 * @return void
	 */
	public function theAdministratorSetsTheLastLoginDateForUserToDaysAgoUsingTheTestingApi($user, $days) {
		$adminUser = $this->getAdminUsername();
		$baseUrl = "/apps/testing/api/v1/lastlogindate/{$user}";
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$adminUser,
			$this->getAdminPassword(),
			'POST',
			$baseUrl,
			['days' => $days],
			$this->getOcsApiVersion()
		);
		$this->setResponse($response);
	}
}
