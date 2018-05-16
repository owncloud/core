<?php
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
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

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;

require_once 'bootstrap.php';

/**
 * Capabilities context.
 */
class CapabilitiesContext implements Context, SnippetAcceptingContext {
	use BasicStructure;

	/**
	 * @Then the capabilities should contain
	 *
	 * @param TableNode|null $formData
	 *
	 * @return void
	 */
	public function checkCapabilitiesResponse(TableNode $formData) {
		$capabilitiesXML = $this->getCapabilitiesXml();

		foreach ($formData->getHash() as $row) {
			PHPUnit_Framework_Assert::assertEquals(
				$row['value'] === "EMPTY" ? '' : $row['value'],
				$this->getParameterValueFromXml(
					$capabilitiesXML,
					$row['capability'],
					$row['path_to_element']
				),
				"Failed field " . $row['capability'] . " " . $row['path_to_element']
			);
		}
	}

	/**
	 * @return void
	 */
	protected function resetAppConfigs() {
		// Remember the current capabilities
		$this->getCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml = $this->getCapabilitiesXml();
		// Set the required starting values for testing
		$capabilitiesArray = $this->getCommonSharingConfigs();
		$capabilitiesArray = \array_merge(
			$capabilitiesArray, $this->getCommonFederationConfigs()
		);
		$capabilitiesArray = \array_merge(
			$capabilitiesArray,
			[
				[
					'capabilitiesApp' => 'files_sharing',
					'capabilitiesParameter' => 'resharing',
					'testingApp' => 'core',
					'testingParameter' => 'shareapi_allow_resharing',
					'testingState' => true
				],
				[
					'capabilitiesApp' => 'files_sharing',
					'capabilitiesParameter' => 'public@@@password@@@enforced',
					'testingApp' => 'core',
					'testingParameter' => 'shareapi_enforce_links_password',
					'testingState' => false
				],
				[
					'capabilitiesApp' => 'files_sharing',
					'capabilitiesParameter' => 'public@@@send_mail',
					'testingApp' => 'core',
					'testingParameter' => 'shareapi_allow_public_notification',
					'testingState' => false
				],
				[
					'capabilitiesApp' => 'files_sharing',
					'capabilitiesParameter' => 'public@@@social_share',
					'testingApp' => 'core',
					'testingParameter' => 'shareapi_allow_social_share',
					'testingState' => true
				],
				[
					'capabilitiesApp' => 'files_sharing',
					'capabilitiesParameter' => 'public@@@expire_date@@@enabled',
					'testingApp' => 'core',
					'testingParameter' => 'shareapi_default_expire_date',
					'testingState' => false
				],
				[
					'capabilitiesApp' => 'files_sharing',
					'capabilitiesParameter' => 'public@@@expire_date@@@enforced',
					'testingApp' => 'core',
					'testingParameter' => 'shareapi_enforce_expire_date',
					'testingState' => false
				]
			]
		);

		$this->setCapabilities($capabilitiesArray);
	}
}
