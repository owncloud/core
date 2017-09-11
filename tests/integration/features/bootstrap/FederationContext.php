<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

require __DIR__ . '/../../../../lib/composer/autoload.php';
require_once 'bootstrap.php';

/**
 * Federation context.
 */
class FederationContext implements Context, SnippetAcceptingContext {

	use BasicStructure;

	/**
	 * @Given /^user "([^"]*)" from server "(LOCAL|REMOTE)" shares "([^"]*)" with user "([^"]*)" from server "(LOCAL|REMOTE)"$/
	 *
	 * @param string $sharerUser
	 * @param string $sharerServer "LOCAL" or "REMOTE"
	 * @param string $sharerPath
	 * @param string $shareeUser
	 * @param string $shareeServer "LOCAL" or "REMOTE"
	 */
	public function federateSharing($sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer) {
		if ($shareeServer == "REMOTE") {
			$shareWith = "$shareeUser@" . substr($this->remoteBaseUrl, 0, -4);
		} else {
			$shareWith = "$shareeUser@" . substr($this->localBaseUrl, 0, -4);
		}
		$previous = $this->usingServer($sharerServer);
		$this->createShare($sharerUser, $sharerPath, 6, $shareWith, null, null, null);
		$this->usingServer($previous);
	}

	/**
	 * @When /^user "([^"]*)" from server "(LOCAL|REMOTE)" accepts last pending share$/
	 * @param string $user
	 * @param string $server
	 */
	public function acceptLastPendingShare($user, $server) {
		$previous = $this->usingServer($server);
		$this->asAn($user);
		$this->sendingToWith('GET', "/apps/files_sharing/api/v1/remote_shares/pending", null);
		$this->theHTTPStatusCodeShouldBe('200');
		$this->theOCSStatusCodeShouldBe('100');
		$share_id = $this->response->xml()->data[0]->element[0]->id;
		$this->sendingToWith('POST', "/apps/files_sharing/api/v1/remote_shares/pending/{$share_id}", null);
		$this->theHTTPStatusCodeShouldBe('200');
		$this->theOCSStatusCodeShouldBe('100');
		$this->usingServer($previous);
	}

	protected function setupAppConfigs() {
		// Remember the current capabilities
		$this->getCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml = $this->getCapabilitiesXml();
		// Set the required starting values for testing
		$this->setupCommonSharingConfigs();
		$this->setupCommonFederationConfigs();
		$this->modifyServerConfig('core', 'shareapi_allow_resharing', 'yes');
	}

	protected function restoreAppConfigs() {
		$this->restoreCommonSharingConfigs();
		$this->restoreCommonFederationConfigs();
		$this->resetCapability(
			'files_sharing',
			'resharing',
			'core',
			'shareapi_allow_resharing'
		);
	}
}
