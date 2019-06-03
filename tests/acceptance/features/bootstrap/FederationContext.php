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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use TestHelpers\SharingHelper;

require_once 'bootstrap.php';

/**
 * Federation context.
 */
class FederationContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var OCSContext
	 */
	private $ocsContext;

	/**
	 * @When /^user "([^"]*)" from server "(LOCAL|REMOTE)" shares "([^"]*)" with user "([^"]*)" from server "(LOCAL|REMOTE)" using the sharing API$/
	 *
	 * @param string $sharerUser
	 * @param string $sharerServer "LOCAL" or "REMOTE"
	 * @param string $sharerPath
	 * @param string $shareeUser
	 * @param string $shareeServer "LOCAL" or "REMOTE"
	 *
	 * @return void
	 */
	public function userFromServerSharesWithUserFromServerUsingTheSharingAPI(
		$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer
	) {
		$this->userFromServerSharesWithUserFromServerUsingTheSharingAPIWithPermissions(
			$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer
		);
	}
	
	/**
	 * @When /^user "([^"]*)" from server "(LOCAL|REMOTE)" shares "([^"]*)" with user "([^"]*)" from server "(LOCAL|REMOTE)" using the sharing API with permissions (.*)$/
	 *
	 * @param string $sharerUser
	 * @param string $sharerServer "LOCAL" or "REMOTE"
	 * @param string $sharerPath
	 * @param string $shareeUser
	 * @param string $shareeServer "LOCAL" or "REMOTE"
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function userFromServerSharesWithUserFromServerUsingTheSharingAPIWithPermissions(
		$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer, $permissions = null
	) {
		if ($shareeServer == "REMOTE") {
			$shareWith
				= "$shareeUser@" . $this->featureContext->getRemoteBaseUrl() . '/';
		} else {
			$shareWith
				= "$shareeUser@" . $this->featureContext->getLocalBaseUrl() . '/';
		}
		$previous = $this->featureContext->usingServer($sharerServer);
		$this->featureContext->createShare(
			$sharerUser, $sharerPath, 6, $shareWith, null, null, $permissions
		);
		$this->featureContext->usingServer($previous);
	}

	/**
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
	public function userFromServerHasSharedWithUserFromServer(
		$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer
	) {
		$this->userFromServerSharesWithUserFromServerUsingTheSharingAPI(
			$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer
		);
		$this->ocsContext->assertOCSResponseIndicatesSuccess(
			'Could not share file/folder! message: "' .
			$this->ocsContext->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			) . '"'
		);
	}

	/**
	 * @Given /^user "([^"]*)" from server "(LOCAL|REMOTE)" has shared "([^"]*)" with user "([^"]*)" from server "(LOCAL|REMOTE)" with permissions (.*)$/
	 *
	 * @param string $sharerUser
	 * @param string $sharerServer "LOCAL" or "REMOTE"
	 * @param string $sharerPath
	 * @param string $shareeUser
	 * @param string $shareeServer "LOCAL" or "REMOTE"
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function userFromServerHasSharedWithUserFromServerWithPermissions(
		$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer, $permissions = null
	) {
		$this->userFromServerSharesWithUserFromServerUsingTheSharingAPIWithPermissions(
			$sharerUser, $sharerServer, $sharerPath, $shareeUser, $shareeServer, $permissions
		);
		$this->ocsContext->assertOCSResponseIndicatesSuccess(
			'Could not share file/folder! message: "' .
			$this->ocsContext->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			) . '"'
		);
	}

	/**
	 * @When /^user "([^"]*)" from server "(LOCAL|REMOTE)" accepts the last pending share using the sharing API$/
	 *
	 * @param string $user
	 * @param string $server
	 *
	 * @return void
	 */
	public function userFromServerAcceptsLastPendingShareUsingTheSharingAPI($user, $server) {
		$previous = $this->featureContext->usingServer($server);
		$this->userGetsTheListOfPendingFederatedCloudShares($user);
		$share_id = SharingHelper::getLastShareIdFromResponse(
			$this->featureContext->getResponseXml()
		);
		$this->ocsContext->theUserSendsToOcsApiEndpointWithBody(
			'POST',
			"/apps/files_sharing/api/v1/remote_shares/pending/{$share_id}",
			null
		);
		$this->featureContext->usingServer($previous);
	}

	/**
	 * @Given /^user "([^"]*)" from server "(LOCAL|REMOTE)" has accepted the last pending share$/
	 *
	 * @param string $user
	 * @param string $server
	 *
	 * @return void
	 */
	public function userFromServerHasAcceptedLastPendingShare($user, $server) {
		$this->userFromServerAcceptsLastPendingShareUsingTheSharingAPI(
			$user, $server
		);
		$this->ocsContext->assertOCSResponseIndicatesSuccess();
	}

	/**
	 * @When /^user "([^"]*)" retrieves the information of the last federated cloud share using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userRetrievesInformationOfLastFederatedShare($user) {
		$this->userGetsTheListOfFederatedCloudShares($user);
		$share_id = SharingHelper::getLastShareIdFromResponse(
			$this->featureContext->getResponseXml()
		);
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			'GET',
			"/apps/files_sharing/api/v1/remote_shares/{$share_id}",
			null
		);
	}

	/**
	 * @When /^user "([^"]*)" retrieves the information of the last pending federated cloud share using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userRetrievesInformationOfLastPendingFederatedShare($user) {
		$this->userGetsTheListOfPendingFederatedCloudShares($user);
		$share_id = SharingHelper::getLastShareIdFromResponse(
			$this->featureContext->getResponseXml()
		);
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			'GET',
			"/apps/files_sharing/api/v1/remote_shares/{$share_id}",
			null
		);
	}

	/**
	 * @When /^user "([^"]*)" gets the list of pending federated cloud shares using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userGetsTheListOfPendingFederatedCloudShares($user) {
		$url = "/apps/files_sharing/api/v1/remote_shares/pending";
		$this->featureContext->asUser($user);
		$this->ocsContext->theUserSendsToOcsApiEndpointWithBody(
			'GET',
			$url,
			null
		);
	}

	/**
	 * @When /^user "([^"]*)" gets the list of federated cloud shares using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userGetsTheListOfFederatedCloudShares($user) {
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, 'GET', "/apps/files_sharing/api/v1/remote_shares"
		);
	}

	/**
	 *
	 * @When /^user "([^"]*)" deletes the last (pending|)\s?federated cloud share using the sharing API$/
	 * @When /^user "([^"]*)" deletes the last (pending|)\s?federated cloud share with password "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $shareType "pending" or empty string
	 * @param string $password
	 *
	 * @return void
	 */
	public function userDeletesLastFederatedCloudShare(
		$user, $shareType, $password = null
	) {
		if ($shareType === "pending") {
			$this->userGetsTheListOfPendingFederatedCloudShares($user);
		} else {
			$this->userGetsTheListOfFederatedCloudShares($user);
		}
		$share_id = SharingHelper::getLastShareIdFromResponse(
			$this->featureContext->getResponseXml()
		);
		if ($shareType === "pending") {
			$url = "/apps/files_sharing/api/v1/remote_shares/pending/$share_id";
		} else {
			$url = "/apps/files_sharing/api/v1/remote_shares/$share_id";
		}
		
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, 'DELETE', $url, null, $password
		);
	}

	/**
	 * @When /^user "([^"]*)" requests shared secret using the federation API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userRequestsSharedSecretUsingTheFederationApi($user) {
		$url  = '/apps/federation/api/v1/request-shared-secret';
		$this->featureContext->asUser($user);
		$this->ocsContext->theUserSendsToOcsApiEndpointWithBody(
			'POST',
			$url,
			null
		);
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
		$this->ocsContext = $environment->getContext('OCSContext');
	}
}
