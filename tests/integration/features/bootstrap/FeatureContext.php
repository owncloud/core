<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

require __DIR__ . '/../../../../lib/composer/autoload.php';
require_once 'bootstrap.php';


/**
 * Features context.
 */
class FeatureContext implements Context, SnippetAcceptingContext {
	use BasicStructure;

	protected function setupAppConfigs() {
		// Remember the current capabilities
		$this->getCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml = $this->getCapabilitiesXml();
		// Set the required starting values for testing
		$this->setupCommonSharingConfigs();
	}

	protected function restoreAppConfigs() {
		// Restore the previous capabilities settings
		$this->restoreCommonSharingConfigs();
	}
}
