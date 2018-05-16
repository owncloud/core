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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use GuzzleHttp\Message\ResponseInterface;

require_once 'bootstrap.php';

/**
 * Federation context.
 */
class FederationContext implements Context, SnippetAcceptingContext {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

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
			$shareWith = "$shareeUser@" . $this->featureContext->getRemoteBaseUrl() . '/';
		} else {
			$shareWith = "$shareeUser@" . $this->featureContext->getLocalBaseUrl() . '/';
		}
		$previous = $this->featureContext->usingServer($sharerServer);
		$this->featureContext->createShare(
				$sharerUser, $sharerPath, 6, $shareWith, null, null, null
			);
		$this->featureContext->theHTTPStatusCodeShouldBe('200');
		$this->featureContext->theOCSStatusCodeShouldBe(
				'100', 'Could not share file/folder! message: "' .
				$this->featureContext->getOCSResponseStatusMessage(
					$this->featureContext->getResponse()
				) . '"'
			);
		$this->featureContext->usingServer($previous);
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
		$previous = $this->featureContext->usingServer($server);
		$this->featureContext->asUser($user);
		$this->featureContext->sendingToWith(
			'GET',
			"/apps/files_sharing/api/v1/remote_shares/pending",
			null
		);
		$this->featureContext->theHTTPStatusCodeShouldBe('200');
		$this->featureContext->theOCSStatusCodeShouldBe('100');
		/**
		 *
		 * @var ResponseInterface $response
		 */
		$response = $this->featureContext->getResponse();
		$share_id = $response->xml()->data[0]->element[0]->id;
		$this->featureContext->sendingToWith(
			'POST',
			"/apps/files_sharing/api/v1/remote_shares/pending/{$share_id}",
			null
		);
		$this->featureContext->theHTTPStatusCodeShouldBe('200');
		$this->featureContext->theOCSStatusCodeShouldBe('100');
		$this->featureContext->usingServer($previous);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
