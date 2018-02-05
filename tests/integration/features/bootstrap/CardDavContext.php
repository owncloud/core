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

class CardDavContext implements \Behat\Behat\Context\Context {
	/** @var string  */
	private $baseUrl;
	/** @var Client */
	private $client;
	/** @var ResponseInterface */
	private $response;
	/** @var array */
	private $responseXml = '';

	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @param string $baseUrl
	 */
	public function __construct($baseUrl) {
		$this->baseUrl = $baseUrl;

		// in case of CI deployment we take the server url from the environment
		$testServerUrl = getenv('TEST_SERVER_URL');
		if ($testServerUrl !== false) {
			$this->baseUrl = substr($testServerUrl, 0, -5);
		}
	}

	/**
	 * @BeforeScenario @carddav
	 *
	 * @param BeforeScenarioScope $scope
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

	/** @AfterScenario @carddav*/
	public function afterScenario() {
		$davUrl = $this->baseUrl . '/remote.php/dav/addressbooks/users/admin/MyAddressbook';
		try {
			$this->client->delete(
				$davUrl,
				[
					'auth' => $this->featureContext->getAuthOptionForAdmin()
				]
			);
		} catch (BadResponseException $e) {}
	}

	/**
	 * @When :user requests addressbook :addressBook with statuscode :statusCode
	 * @param string $user
	 * @param string $addressBook
	 * @param int $statusCode
	 * @throws \Exception
	 */
	public function requestsAddressbookWithStatuscode($user, $addressBook, $statusCode) {
		$davUrl = $this->baseUrl . '/remote.php/dav/addressbooks/users/'.$addressBook;

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

		if((int)$statusCode !== $this->response->getStatusCode()) {
			throw new \Exception(
				sprintf(
					'Expected %s got %s',
					(int)$statusCode,
					$this->response->getStatusCode()
				)
			);
		}

		$body = $this->response->getBody()->getContents();
		if(substr($body, 0, 1) === '<') {
			$reader = new Sabre\Xml\Reader();
			$reader->xml($body);
			$this->responseXml = $reader->parse();
		}
	}

	/**
	 * @Given :user creates an addressbook named :addressBook with statuscode :statusCode
	 * @param string $user
	 * @param string $addressBook
	 * @param int $statusCode
	 * @throws \Exception
	 */
	public function createsAnAddressbookNamedWithStatuscode($user, $addressBook, $statusCode) {
		$davUrl = $this->baseUrl . '/remote.php/dav/addressbooks/users/'.$user.'/'.$addressBook;

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
          </d:resourcetype>,<d:displayname>'.$addressBook.'</d:displayname>
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

		if($this->response->getStatusCode() !== (int)$statusCode) {
			throw new \Exception(
				sprintf(
					'Expected %s got %s',
					(int)$statusCode,
					$this->response->getStatusCode()
				)
			);
		}
	}

	/**
	 * @When the CardDAV exception is :message
	 * @param string $message
	 * @throws \Exception
	 */
	public function theCarddavExceptionIs($message) {
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
	 * @When the CardDAV error message is :arg1
	 * @param string $message
	 * @throws \Exception
	 */
	public function theCarddavErrorMessageIs($message) {
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
