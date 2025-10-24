<?php declare(strict_types=1);
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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\ResponseInterface;
use TestHelpers\HttpRequestHelper;

/**
 * CardDav functions
 */
class CardDavContext implements Context {
	private ResponseInterface $response;
	private FeatureContext $featureContext;

	/**
	 * @BeforeScenario @carddav
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}

	/**
	 * @AfterScenario @carddav
	 *
	 * @return void
	 */
	public function afterScenario():void {
		$davUrl = $this->featureContext->getBaseUrl()
			. '/remote.php/dav/addressbooks/users/admin/MyAddressbook';
		HttpRequestHelper::delete(
			$davUrl,
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
	}

	/**
	 * @When user :user requests address book :addressBook of user :ofUser using the new WebDAV API
	 *
	 * @param string $user
	 * @param string $addressBook
	 * @param string $ofUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsAddressBookUsingTheAPI(string $user, string $addressBook, string $ofUser):void {
		$user = $this->featureContext->getActualUsername($user);
		$normalizedUser = \strtolower($this->featureContext->getActualUsername($ofUser));
		$addressBook = $this->featureContext->substituteInLineCodes(
			$addressBook,
			$normalizedUser
		);
		$davUrl = $this->featureContext->getBaseUrl()
			. "/remote.php/dav/addressbooks/users/$addressBook";

		$this->response = HttpRequestHelper::get(
			$davUrl,
			$this->featureContext->getStepLineRef(),
			$user,
			$this->featureContext->getPasswordForUser($user)
		);
		$this->featureContext->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
	}

	/**
	 * @When the administrator requests address book :addressBook of user :ofUser using the new WebDAV API
	 *
	 * @param string $addressBook
	 * @param string $ofUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorRequestsAddressBookUsingTheNewWebdavApi(string $addressBook, string $ofUser):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userRequestsAddressBookUsingTheAPI($admin, $addressBook, $ofUser);
	}

	/**
	 * @Then as user :user a new address book with name :addressBook should be present in the WebDAV API Response
	 *
	 * @param string $user
	 * @param string $addressBook
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userAddressBookShouldBePresentInTheWebdavApiResponse(string $user, string $addressBook):void {
		$user = $this->featureContext->getActualUsername($user);
		$normalizedUser = $this->featureContext->normalizeUsername($user);
		$addressBook = $this->featureContext->substituteInLineCodes(
			$addressBook,
			$normalizedUser
		);
		$davUrl = $this->featureContext->getBaseUrl()
			. "/remote.php/dav/addressbooks/users/$addressBook";

		$this->response = HttpRequestHelper::get(
			$davUrl,
			$this->featureContext->getStepLineRef(),
			$user,
			$this->featureContext->getPasswordForUser($user)
		);
		$this->featureContext->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
		$this->theCardDavHttpStatusCodeShouldBe(200);
	}

	/**
	 * @Given user :user has successfully created an address book named :addressBook
	 *
	 * @param string $user
	 * @param string $addressBook
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasCreatedAnAddressBookNamed(string $user, string $addressBook):void {
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
			$davUrl,
			$this->featureContext->getStepLineRef(),
			'MKCOL',
			$user,
			$this->featureContext->getPasswordForUser($user),
			$headers,
			$body
		);
		$this->theCardDavHttpStatusCodeShouldBe(201);
		$this->featureContext->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
	}

	/**
	 * @Given the administrator has successfully created an address book named :addressBook
	 *
	 * @param string $addressBook
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSuccessfullyCreatedAnAddressBookNamed(string $addressBook):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userHasCreatedAnAddressBookNamed($admin, $addressBook);
	}

	/**
	 * @Then the CardDAV HTTP status code should be :code
	 *
	 * @param int $code
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCardDavHttpStatusCodeShouldBe(int $code):void {
		$actualStatusCode = $this->response->getStatusCode();
		Assert::assertEquals(
			$code,
			$actualStatusCode,
			"Expected: HTTP status code to be $code but got $actualStatusCode"
		);
	}
}
