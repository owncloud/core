<?php
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright 2017 ownCloud GmbH
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

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Capabilities context.
 */
class CapabilitiesContext implements Context, SnippetAcceptingContext {

	use BasicStructure;

	/**
	 * @Then /^fields of capabilities match with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $formData
	 * @return void
	 */
	public function checkCapabilitiesResponse(
		\Behat\Gherkin\Node\TableNode $formData
	) {
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
	protected function setupAppConfigs() {
		// Remember the current capabilities
		$this->getCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml = $this->getCapabilitiesXml();
		// Set the required starting values for testing
		$this->setupCommonSharingConfigs();
		$this->setupCommonFederationConfigs();
		$this->modifyServerConfig(
			'core', 'shareapi_allow_resharing', 'yes'
		);
		$this->modifyServerConfig(
			'core', 'shareapi_enforce_links_password', 'no'
		);
		$this->modifyServerConfig(
			'core', 'shareapi_allow_public_notification', 'no'
		);
		$this->modifyServerConfig(
			'core', 'shareapi_allow_social_share', 'yes'
		);
		$this->modifyServerConfig(
			'core', 'shareapi_default_expire_date', 'no'
		);
		$this->modifyServerConfig(
			'core', 'shareapi_enforce_expire_date', 'no'
		);
	}

	/**
	 * @return void
	 */
	protected function restoreAppConfigs() {
		// Restore the previous capabilities settings
		$this->restoreCommonSharingConfigs();
		$this->restoreCommonFederationConfigs();
		$this->resetCapability(
			'files_sharing',
			'resharing',
			'core',
			'shareapi_allow_resharing'
		);
		$this->resetCapability(
			'files_sharing',
			'public@@@password@@@enforced',
			'core',
			'shareapi_enforce_links_password'
		);
		$this->resetCapability(
			'files_sharing',
			'public@@@send_mail',
			'core',
			'shareapi_allow_public_notification'
		);
		$this->resetCapability(
			'files_sharing',
			'public@@@social_share',
			'core',
			'shareapi_allow_social_share'
		);
		$this->resetCapability(
			'files_sharing',
			'public@@@expire_date@@@enabled',
			'core',
			'shareapi_default_expire_date'
		);
		$this->resetCapability(
			'files_sharing',
			'public@@@expire_date@@@enforced',
			'core',
			'shareapi_enforce_expire_date'
		);
	}
}
