<?php
/**
 * @author Lukas Biermann
 * @author Nina Herrmann
 * @author Wladislaw Iwanzow
 * @author Dennis Meis
 * @author Jonathan Neugebauer
 *
 * @copyright Copyright (c) 2016, Project Seminar "PSSL16" at the University of Muenster.
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
 */

namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OC\Core\Application;
use OCA\DAV\Connector\Sabre\OAuth2;
use OCA\OAuth2\Db\AccessToken;
use OCA\OAuth2\Db\AccessTokenMapper;
use OCA\OAuth2\Db\Client;
use OCA\OAuth2\Db\ClientMapper;
use Test\TestCase;

/**
 * Class OAuth2Test
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre
 * @group DB
 */
class OAuth2Test extends TestCase {

	/** @var String $principalPrefix */
	private $principalPrefix = 'principals/users/';

	/** @var String $userId */
	private $userId = 'john';

	/** @var ClientMapper $clientMapper */
	private $clientMapper;

	/** @var AccessTokenMapper */
	private $accessTokenMapper;

	/** @var Client */
	private $client;

	/** @var AccessToken */
	private $accessToken;

	public function setUp() {
		parent::setUp();

		$app = new Application();
		$container = $app->getContainer();

		$this->clientMapper = $container->query('OCA\OAuth2\Db\ClientMapper');
		$this->accessTokenMapper = $container->query('OCA\OAuth2\Db\AccessTokenMapper');

		$client = new Client();
		$client->setIdentifier('NXCy3M3a6FM9pecVyUZuGF62AJVJaCfmkYz7us4yr4QZqVzMIkVZUf1v2IzvsFZa');
		$client->setSecret('9yUZuGF6pecVaCfmIzvsFZakYNXCyr4QZqVzMIky3M3a6FMz7us4VZUf2AJVJ1v2');
		$client->setRedirectUri('https://owncloud.org');
		$client->setName('ownCloud');
		$this->client = $this->clientMapper->insert($client);

		/** @var AccessToken $accessToken */
		$accessToken = new AccessToken();
		$accessToken->setToken('sFz6FM9pecGF62kYz7us43M3amqVZaNQZyUZuMIkAJVJaCfVyr4Uf1v2IzvVZXCy');
		$accessToken->setClientId($client->getId());
		$accessToken->setUserId($this->userId);
		$accessToken->resetExpires();
		$this->accessToken = $this->accessTokenMapper->insert($accessToken);
	}

	protected function tearDown() {
		parent::tearDown();

		$this->clientMapper->deleteAll();
		$this->accessTokenMapper->deleteAll();
		return parent::tearDown();
	}

	public function testValidateBearerToken() {
		$oAuth2 = new OAuth2($this->principalPrefix);

		$this->assertFalse($this->invokePrivate($oAuth2, 'validateBearerToken', [1]));

		$this->assertFalse($this->invokePrivate($oAuth2, 'validateBearerToken', ['test']));

		$this->accessToken->setExpires(time() - 1);
		$this->accessTokenMapper->update($this->accessToken);
		$this->assertFalse(
			$this->invokePrivate(
				$oAuth2,
				'validateBearerToken',
				['sFz6FM9pecGF62kYz7us43M3amqVZaNQZyUZuMIkAJVJaCfVyr4Uf1v2IzvVZXCy'])
		);

		$this->accessToken->resetExpires();
		$this->accessTokenMapper->update($this->accessToken);
		$this->assertEquals(
			$this->principalPrefix . $this->userId,
			$this->invokePrivate(
				$oAuth2,
				'validateBearerToken',
				['sFz6FM9pecGF62kYz7us43M3amqVZaNQZyUZuMIkAJVJaCfVyr4Uf1v2IzvVZXCy'])
		);
	}

}
