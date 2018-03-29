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
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Message\ResponseInterface;

/**
 * CardDav functions
 */
class CardDavContext implements \Behat\Behat\Context\Context {
	/**
	 * @var Client 
	 */
	private $client;
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
		$this->client = new Client();
		$this->responseXml = '';
	}

	/**
	 * @AfterScenario @carddav
	 *
	 * @return void
	 */
	public function afterScenario() {
		$davUrl = $this->featureContext->baseUrlWithSlash() . 'remote.php/dav/addressbooks/users/admin/MyAddressbook';
		try {
			$this->client->delete(
				$davUrl,
				[
					'auth' => $this->featureContext->getAuthOptionForAdmin()
				]
			);
		} catch (BadResponseException $e) {
		}
	}

	/**
	 * @When user :user requests addressbook :addressBook using the API
	 *
	 * @param string $user
	 * @param string $addressBook
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userRequestsAddressbookUsingTheAPI($user, $addressBook) {
		$davUrl = $this->featureContext->baseUrlWithSlash() . 'remote.php/dav/addressbooks/users/' . $addressBook;

		try {
			$this->response = $this->client->get(
				$davUrl,
				[
					'auth' => $this->featureContext->getAuthOptionForUser($user)
				]
			);
		} catch (BadResponseException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @Given user :user has successfully created an addressbook named :addressBook
	 *
	 * @param string $user
	 * @param string $addressBook
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasCreatedAnAddressbookNamed($user, $addressBook) {
		$davUrl = $this->featureContext->baseUrlWithSlash() . 'remote.php/dav/addressbooks/users/' . $user . '/' . $addressBook;

		$request = $this->client->createRequest(
			'MKCOL',
			$davUrl,
			[
				'body' => '<d:mkcol xmlns:card="urn:ietf:params:xml:ns:carddav"
              xmlns:d="DAV:">
    <d:set>
      <d:prop>
        <d:resourcetype>
            <d:collection />,<card:addressbook />
          </d:resourcetype>,<d:displayname>' . $addressBook . '</d:displayname>
      </d:prop>
    </d:set>
  </d:mkcol>',
				'auth' => $this->featureContext->getAuthOptionForUser($user),
				'headers' => [
					'Content-Type' => 'application/xml;charset=UTF-8',
				],
			]
		);

		$this->response = $this->client->send($request);
		$this->theCardDavHttpStatusCodeShouldBe(201);
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
				sprintf(
					'Expected %s got %s',
					(int)$code,
					$this->response->getStatusCode()
				)
			);
		}

		$body = $this->response->getBody()->getContents();
		if ($body && substr($body, 0, 1) === '<') {
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
		$result = $this->responseXml['value'][0]['value'];

		if ($message !== $result) {
			throw new \Exception(
				sprintf(
					'Expected %s got %s',
					$message,
					$result
				)
			);
		}
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
		$result = $this->responseXml['value'][1]['value'];

		if ($message !== $result) {
			throw new \Exception(
				sprintf(
					'Expected %s got %s',
					$message,
					$result
				)
			);
		}
	}

}
