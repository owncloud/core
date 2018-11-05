<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
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

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use GuzzleHttp\Message\ResponseInterface;
use TestHelpers\HttpRequestHelper;

/**
 * CardDav functions
 */
class CardDavContext implements \Behat\Behat\Context\Context {
	/**
	 * @var ResponseInterface
	 */
	private $response;
	/**
	 * @var array
	 */
	private $responseXml = '';

	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @BeforeScenario @carddav
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->responseXml = '';
	}

	/**
	 * @AfterScenario @carddav
	 *
	 * @return void
	 */
	public function afterScenario() {
		$davUrl = $this->featureContext->getBaseUrl()
			. '/remote.php/dav/addressbooks/users/admin/MyAddressbook';
		HttpRequestHelper::delete(
			$davUrl, $this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
	}

	/**
	 * @When user :user requests address book :addressBook using the new WebDAV API
	 *
	 * @param string $user
	 * @param string $addressBook
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userRequestsAddressBookUsingTheAPI($user, $addressBook) {
		$user = $this->featureContext->getActualUsername($user);
		$davUrl = $this->featureContext->getBaseUrl()
			. "/remote.php/dav/addressbooks/users/$addressBook";

		$this->response = HttpRequestHelper::get(
			$davUrl, $user, $this->featureContext->getPasswordForUser($user)
		);
	}

	/**
	 * @When the administrator requests address book :addressBook using the new WebDAV API
	 *
	 * @param string $addressBook
	 *
	 * @return void
	 */
	public function theAdministratorRequestsAddressBookUsingTheNewWebdavApi($addressBook) {
		$admin = $this->featureContext->getAdminUsername();
		$this->userRequestsAddressBookUsingTheAPI($admin, $addressBook);
	}

	/**
	 * @Given user :user has successfully created an address book named :addressBook
	 *
	 * @param string $user
	 * @param string $addressBook
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasCreatedAnAddressBookNamed($user, $addressBook) {
		$user = $this->featureContext->getActualUsername($user);
		$davUrl = $this->featureContext->getBaseUrl()
			. "/remote.php/dav/addressbooks/users/$user/$addressBook";

		$headers = ['Content-Type' => 'application/xml;charset=UTF-8'];
		$body = '<d:mkcol xmlns:card="urn:ietf:params:xml:ns:carddav"
              xmlns:d="DAV:">
    <d:set>
      <d:prop>
        <d:resourcetype>
            <d:collection />,<card:addressbook />
          </d:resourcetype>,<d:displayname>' . $addressBook . '</d:displayname>
      </d:prop>
    </d:set>
  </d:mkcol>';
		$this->response = HttpRequestHelper::sendRequest(
			$davUrl, 'MKCOL', $user, $this->featureContext->getPasswordForUser($user),
			$headers, $body
		);
		$this->theCardDavHttpStatusCodeShouldBe(201);
	}

	/**
	 * @Given the administrator has successfully created an address book named :addressBook
	 *
	 * @param string $addressBook
	 *
	 * @return void
	 */
	public function theAdministratorHasSuccessfullyCreatedAnAddressBookNamed($addressBook) {
		$admin = $this->featureContext->getAdminUsername();
		$this->userHasCreatedAnAddressBookNamed($admin, $addressBook);
	}

	/**
	 * @Then the CardDAV HTTP status code should be :code
	 *
	 * @param int $code
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCardDavHttpStatusCodeShouldBe($code) {
		if ((int)$code !== $this->response->getStatusCode()) {
			throw new \Exception(
				\sprintf(
					'Expected %s got %s',
					(int)$code,
					$this->response->getStatusCode()
				)
			);
		}

		$body = $this->response->getBody()->getContents();
		if ($body && \substr($body, 0, 1) === '<') {
			$reader = new Sabre\Xml\Reader();
			$reader->xml($body);
			$this->responseXml = $reader->parse();
		}
	}

	/**
	 * @Then the CardDAV exception should be :message
	 *
	 * @param string $message
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCardDavExceptionShouldBe($message) {
		$this->featureContext->theDavExceptionShouldBe($message, $this->responseXml);
	}

	/**
	 * @Then the CardDAV error message should be :arg1
	 *
	 * @param string $message
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCardDavErrorMessageShouldBe($message) {
		$this->featureContext->theDavErrorMessageShouldBe($message, $this->responseXml);
	}
}
