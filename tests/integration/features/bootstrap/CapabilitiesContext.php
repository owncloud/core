<?php

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
	 */
	public function checkCapabilitiesResponse(\Behat\Gherkin\Node\TableNode $formData) {
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

	protected function setupAppConfigs() {
		// Remember the current capabilities
		$this->getCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml = $this->getCapabilitiesXml();
		// Set the required starting values for testing
		$this->setupCommonSharingConfigs();
		$this->setupCommonFederationConfigs();
		$this->modifyServerConfig('core', 'shareapi_allow_resharing', 'yes');
		$this->modifyServerConfig('core', 'shareapi_enforce_links_password', 'no');
		$this->modifyServerConfig('core', 'shareapi_allow_public_notification', 'no');
		$this->modifyServerConfig('core', 'shareapi_allow_social_share', 'yes');
		$this->modifyServerConfig('core', 'shareapi_default_expire_date', 'no');
		$this->modifyServerConfig('core', 'shareapi_enforce_expire_date', 'no');
	}

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
