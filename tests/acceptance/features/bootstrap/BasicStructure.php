<?php
/**
 * @author Sergio Bertolin <sbertolin@owncloud.com>
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

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Message\ResponseInterface;
use TestHelpers\OcsApiHelper;
use TestHelpers\SetupHelper;
use TestHelpers\HttpRequestHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Basic functions needed by mostly everything
 */
trait BasicStructure {
	use AppConfiguration;
	use Auth;
	use Provisioning;
	use Sharing;
	use WebDav;
	use CommandLine;

	/**
	 * @var string
	 */
	private $adminUsername = '';

	/**
	 * @var string
	 */
	private $adminPassword = '';

	/**
	 * @var string
	 */
	private $originalAdminPassword = '';

	/**
	 * @var string
	 */
	private $regularUserPassword = '';

	/**
	 * @var string
	 */
	private $alt1UserPassword = '';

	/**
	 * @var string
	 */
	private $alt2UserPassword = '';

	/**
	 * @var string
	 */
	private $alt3UserPassword = '';

	/**
	 * @var string
	 */
	private $alt4UserPassword = '';

	/**
	 * The password to use in tests that create a sub-admin user
	 *
	 * @var string
	 */
	private $subAdminPassword = '';

	/**
	 * The password to use in tests that create another admin user
	 *
	 * @var string
	 */
	private $alternateAdminPassword = '';

	/**
	 * The password to use in tests that create public link shares
	 *
	 * @var string
	 */
	private $publicLinkSharePassword = '';

	/**
	 * @var string
	 */
	private $ocPath = '';

	/**
	 * @var string location of the root folder of ownCloud on the local server under test
	 */
	private $localServerRoot = null;

	/**
	 * @var string
	 */
	private $currentUser = '';

	/**
	 * @var string
	 */
	private $currentServer = '';

	/**
	 * The base URL of the current server under test,
	 * without any terminating slash
	 * e.g. http://localhost:8080
	 *
	 * @var string
	 */
	private $baseUrl = '';

	/**
	 * The base URL of the local server under test,
	 * without any terminating slash
	 * e.g. http://localhost:8080
	 *
	 * @var string
	 */
	private $localBaseUrl = '';

	/**
	 * The base URL of the remote (federated) server under test,
	 * without any terminating slash
	 * e.g. http://localhost:8180
	 *
	 * @var string
	 */
	private $remoteBaseUrl = '';

	/**
	 *
	 *
	 * @var boolean true if TEST_SERVER_FED_URL is defined
	 */
	private $federatedServerExists = false;

	/**
	 * @var int
	 */
	private $ocsApiVersion = 1;

	/**
	 * @var ResponseInterface
	 */
	private $response = null;

	/**
	 * @var CookieJar
	 */
	private $cookieJar;

	/**
	 * @var string
	 */
	private $requestToken;

	/**
	 * @var array
	 */
	private $storageIds = [];

	/**
	 * The local source IP address from which to initiate API actions.
	 * Defaults to system-selected address matching IP address family and scope.
	 *
	 * @var string|null
	 */
	private $sourceIpAddress = null;
	
	private $guzzleClientHeaders = [];

	/**
	 *
	 * @var OCSContext
	 */
	private $ocsContext;

	/**
	 * BasicStructure constructor.
	 *
	 * @param string $baseUrl
	 * @param string $adminUsername
	 * @param string $adminPassword
	 * @param string $regularUserPassword
	 * @param string $ocPath
	 *
	 */
	public function __construct(
		$baseUrl,
		$adminUsername,
		$adminPassword,
		$regularUserPassword,
		$ocPath
	) {
		// Initialize your context here
		$this->baseUrl = \rtrim($baseUrl, '/');
		$this->adminUsername = $adminUsername;
		$this->adminPassword = $adminPassword;
		$this->regularUserPassword = $regularUserPassword;
		$this->localBaseUrl = $this->baseUrl;
		$this->currentServer = 'LOCAL';
		$this->cookieJar = new CookieJar();
		$this->ocPath = $ocPath;

		// These passwords are referenced in tests and can be overridden by
		// setting environment variables.
		$this->alt1UserPassword = "1234";
		$this->alt2UserPassword = "AaBb2Cc3Dd4";
		$this->alt3UserPassword = "aVeryLongPassword42TheMeaningOfLife";
		$this->alt4UserPassword = "ThisIsThe4thAlternatePwd";
		$this->subAdminPassword = "IamAJuniorAdmin42";
		$this->alternateAdminPassword = "IHave99LotsOfPriv";
		$this->publicLinkSharePassword = "publicPwd1";

		// in case of CI deployment we take the server url from the environment
		$testServerUrl = \getenv('TEST_SERVER_URL');
		if ($testServerUrl !== false) {
			$this->baseUrl = \rtrim($testServerUrl, '/');
			$this->localBaseUrl = $this->baseUrl;
		}

		// federated server url from the environment
		$testRemoteServerUrl = \getenv('TEST_SERVER_FED_URL');
		if ($testRemoteServerUrl !== false) {
			$this->remoteBaseUrl = \rtrim($testRemoteServerUrl, '/');
			$this->federatedServerExists = true;
		} else {
			$this->remoteBaseUrl = $this->localBaseUrl;
			$this->federatedServerExists = false;
		}

		// get the admin username from the environment (if defined)
		$adminUsernameFromEnvironment = $this->getAdminUsernameFromEnvironment();
		if ($adminUsernameFromEnvironment !== false) {
			$this->adminUsername = $adminUsernameFromEnvironment;
		}

		// get the admin password from the environment (if defined)
		$adminPasswordFromEnvironment = $this->getAdminPasswordFromEnvironment();
		if ($adminPasswordFromEnvironment !== false) {
			$this->adminPassword = $adminPasswordFromEnvironment;
		}

		// get the regular user password from the environment (if defined)
		$regularUserPasswordFromEnvironment = $this->getRegularUserPasswordFromEnvironment();
		if ($regularUserPasswordFromEnvironment !== false) {
			$this->regularUserPassword = $regularUserPasswordFromEnvironment;
		}

		// get the alternate(1) user password from the environment (if defined)
		$alt1UserPasswordFromEnvironment = $this->getAlt1UserPasswordFromEnvironment();
		if ($alt1UserPasswordFromEnvironment !== false) {
			$this->alt1UserPassword = $alt1UserPasswordFromEnvironment;
		}

		// get the alternate(2) user password from the environment (if defined)
		$alt2UserPasswordFromEnvironment = $this->getAlt2UserPasswordFromEnvironment();
		if ($alt2UserPasswordFromEnvironment !== false) {
			$this->alt2UserPassword = $alt2UserPasswordFromEnvironment;
		}

		// get the alternate(3) user password from the environment (if defined)
		$alt3UserPasswordFromEnvironment = $this->getAlt3UserPasswordFromEnvironment();
		if ($alt3UserPasswordFromEnvironment !== false) {
			$this->alt3UserPassword = $alt3UserPasswordFromEnvironment;
		}

		// get the alternate(4) user password from the environment (if defined)
		$alt4UserPasswordFromEnvironment = $this->getAlt4UserPasswordFromEnvironment();
		if ($alt4UserPasswordFromEnvironment !== false) {
			$this->alt4UserPassword = $alt4UserPasswordFromEnvironment;
		}

		// get the sub-admin password from the environment (if defined)
		$subAdminPasswordFromEnvironment = $this->getSubAdminPasswordFromEnvironment();
		if ($subAdminPasswordFromEnvironment !== false) {
			$this->subAdminPassword = $subAdminPasswordFromEnvironment;
		}

		// get the alternate admin password from the environment (if defined)
		$alternateAdminPasswordFromEnvironment = $this->getAlternateAdminPasswordFromEnvironment();
		if ($alternateAdminPasswordFromEnvironment !== false) {
			$this->alternateAdminPassword = $alternateAdminPasswordFromEnvironment;
		}

		// get the public link share password from the environment (if defined)
		$publicLinkSharePasswordFromEnvironment = $this->getPublicLinkSharePasswordFromEnvironment();
		if ($publicLinkSharePasswordFromEnvironment !== false) {
			$this->publicLinkSharePassword = $publicLinkSharePasswordFromEnvironment;
		}
		$this->originalAdminPassword = $this->adminPassword;
	}

	/**
	 * @param string $appTestCodeFullPath
	 *
	 * @return string the relative path from the core tests/acceptance dir
	 *                to the equivalent dir in the app
	 */
	public function getPathFromCoreToAppAcceptanceTests(
		$appTestCodeFullPath
	) {
		// $appTestCodeFullPath is something like:
		// '/somedir/anotherdir/core/apps/guests/tests/acceptance/features/bootstrap'
		// and we want to know the 'apps/guests/tests/acceptance' part

		// Sadly we have to support PHP 5.6 still.
		// From PHP 7.0 we can go up 2 levels more directly:
		// $path = dirname(__DIR__, 2);
		$path = \dirname(\dirname($appTestCodeFullPath));
		$acceptanceDir = \basename($path);
		$path = \dirname($path);
		$testsDir = \basename($path);
		$path = \dirname($path);
		$appNameDir = \basename($path);
		$path = \dirname($path);
		// We specially are not sure about the name of the directory 'apps'
		// Sometimes the app could be installed in some alternate apps directory
		// like, for example, `apps-external`. So this really does need to be
		// resolved here at run-time.
		$appsDir = \basename($path);
		// To get from core tests/acceptance we go up 2 levels then down through
		// the above app dirs.
		return "../../$appsDir/$appNameDir/$testsDir/$acceptanceDir";
	}

	/**
	 * Get the externally-defined admin username, if any
	 *
	 * @return string|false
	 */
	private static function getAdminUsernameFromEnvironment() {
		return \getenv('ADMIN_USERNAME');
	}

	/**
	 * Get the externally-defined admin password, if any
	 *
	 * @return string|false
	 */
	private static function getAdminPasswordFromEnvironment() {
		return \getenv('ADMIN_PASSWORD');
	}

	/**
	 * Get the externally-defined regular user password, if any
	 *
	 * @return string|false
	 */
	private static function getRegularUserPasswordFromEnvironment() {
		return \getenv('REGULAR_USER_PASSWORD');
	}

	/**
	 * Get the externally-defined alternate(1) user password, if any
	 *
	 * @return string|false
	 */
	private static function getAlt1UserPasswordFromEnvironment() {
		return \getenv('ALT1_USER_PASSWORD');
	}

	/**
	 * Get the externally-defined alternate(2) user password, if any
	 *
	 * @return string|false
	 */
	private static function getAlt2UserPasswordFromEnvironment() {
		return \getenv('ALT2_USER_PASSWORD');
	}

	/**
	 * Get the externally-defined alternate(3) user password, if any
	 *
	 * @return string|false
	 */
	private static function getAlt3UserPasswordFromEnvironment() {
		return \getenv('ALT3_USER_PASSWORD');
	}

	/**
	 * Get the externally-defined alternate(4) user password, if any
	 *
	 * @return string|false
	 */
	private static function getAlt4UserPasswordFromEnvironment() {
		return \getenv('ALT4_USER_PASSWORD');
	}

	/**
	 * Get the externally-defined sub-admin password, if any
	 *
	 * @return string|false
	 */
	private static function getSubAdminPasswordFromEnvironment() {
		return \getenv('SUB_ADMIN_PASSWORD');
	}

	/**
	 * Get the externally-defined alternate admin password, if any
	 *
	 * @return string|false
	 */
	private static function getAlternateAdminPasswordFromEnvironment() {
		return \getenv('ALTERNATE_ADMIN_PASSWORD');
	}

	/**
	 * Get the externally-defined public link share password, if any
	 *
	 * @return string|false
	 */
	private static function getPublicLinkSharePasswordFromEnvironment() {
		return \getenv('PUBLIC_LINK_SHARE_PASSWORD');
	}

	/**
	 * removes the scheme "http(s)://" (if any) from the front of a URL
	 * note: only needs to handle http or https
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	public function removeSchemeFromUrl($url) {
		return \preg_replace(
			"(^https?://)", "", $url
		);
	}

	/**
	 * @return string
	 */
	public function getOcPath() {
		return (string) $this->ocPath;
	}

	/**
	 * @return CookieJar
	 */
	public function getCookieJar() {
		return $this->cookieJar;
	}

	/**
	 * @return string
	 */
	public function getRequestToken() {
		return $this->requestToken;
	}

	/**
	 * returns the base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getBaseUrl() {
		return $this->baseUrl;
	}

	/**
	 * returns the path of the base URL
	 * e.g. owncloud-core/10 if the baseUrl is http://localhost/owncloud-core/10
	 * the path is without a slash at the end and without a slash at the beginning
	 *
	 * @return string
	 */
	public function getBasePath() {
		return \ltrim(\parse_url($this->getBaseUrl(), PHP_URL_PATH), "/");
	}

	/**
	 * returns the OCS path
	 * the path is without a slash at the end and without a slash at the beginning
	 *
	 * @param string $ocsApiVersion
	 *
	 * @return string
	 */
	public function getOCSPath($ocsApiVersion) {
		return \ltrim($this->getBasePath() . "/ocs/v{$ocsApiVersion}.php", "/");
	}

	/**
	 * returns the base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getBaseUrlWithoutScheme() {
		return $this->removeSchemeFromUrl($this->getBaseUrl());
	}

	/**
	 * returns the local base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getLocalBaseUrl() {
		return $this->localBaseUrl;
	}

	/**
	 * returns the local base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getLocalBaseUrlWithoutScheme() {
		return $this->removeSchemeFromUrl($this->getLocalBaseUrl());
	}

	/**
	 * returns the remote base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getRemoteBaseUrl() {
		return $this->remoteBaseUrl;
	}

	/**
	 * returns the remote base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getRemoteBaseUrlWithoutScheme() {
		return $this->removeSchemeFromUrl($this->getRemoteBaseUrl());
	}

	/**
	 * returns the base URL without any sub-path e.g. http://localhost:8080
	 * of the base URL http://localhost:8080/owncloud
	 *
	 * @return string
	 */
	public function getBaseUrlWithoutPath() {
		$parts = \parse_url($this->getBaseUrl());
		$url = $parts ["scheme"] . "://" . $parts["host"];
		if (isset($parts["port"])) {
			$url = "$url:" . $parts["port"];
		}
		return $url;
	}

	/**
	 * @return string
	 */
	public function getOcsApiVersion() {
		return $this->ocsApiVersion;
	}

	/**
	 * @return string|null
	 */
	public function getSourceIpAddress() {
		return $this->sourceIpAddress;
	}

	/**
	 * @return array|null
	 */
	public function getStorageIds() {
		return $this->storageIds;
	}

	/**
	 * @param string $storageName
	 *
	 * @throws Exception
	 * @return integer
	 */
	public function getStorageId($storageName) {
		if (\array_key_exists($storageName, $this->getStorageIds())) {
			return $this->getStorageIds()[$storageName];
		}
		throw new \Exception(
			"Could not find storageId with storage name $storageName"
		);
	}

	/**
	 * @param string $storageName
	 * @param integer $storageId
	 *
	 * @return void
	 */
	public function addStorageId($storageName, $storageId) {
		$this->storageIds[$storageName] = $storageId;
	}

	/**
	 * @param string $sourceIpAddress
	 *
	 * @return void
	 */
	public function setSourceIpAddress($sourceIpAddress) {
		$this->sourceIpAddress = $sourceIpAddress;
	}

	/**
	 * @return array
	 */
	public function getGuzzleClientHeaders() {
		return $this->guzzleClientHeaders;
	}
	
	/**
	 * @param array $guzzleClientHeaders ['X-Foo' => 'Bar']
	 *
	 * @return void
	 */
	public function setGuzzleClientHeaders($guzzleClientHeaders) {
		$this->guzzleClientHeaders = $guzzleClientHeaders;
	}

	/**
	 * @param array $guzzleClientHeaders ['X-Foo' => 'Bar']
	 *
	 * @return void
	 */
	public function addGuzzleClientHeaders($guzzleClientHeaders) {
		$this->guzzleClientHeaders = \array_merge(
			$this->guzzleClientHeaders, $guzzleClientHeaders
		);
	}

	/**
	 * @Given /^using OCS API version "([^"]*)"$/
	 *
	 * @param string $version
	 *
	 * @return void
	 */
	public function usingOcsApiVersion($version) {
		$this->ocsApiVersion = (int) $version;
	}

	/**
	 * @Given /^as user "([^"]*)"$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function asUser($user) {
		$this->currentUser = $this->getActualUsername($user);
	}

	/**
	 * @Given as the administrator
	 *
	 * @return void
	 */
	public function asTheAdministrator() {
		$this->currentUser = $this->getAdminUsername();
	}

	/**
	 * @return string
	 */
	public function getCurrentUser() {
		return $this->currentUser;
	}

	/**
	 * returns $this->response
	 * some steps use that private var to store the response for other steps
	 *
	 * @return ResponseInterface
	 */
	public function getResponse() {
		return $this->response;
	}

	/**
	 * let this class remember a response that was received elsewhere
	 * so that steps in this class can be used to examine the response
	 *
	 * @param ResponseInterface $response
	 *
	 * @return void
	 */
	public function setResponse($response) {
		$this->response = $response;
		//after a new response reset the response xml
		$this->responseXml = [];
	}

	/**
	 * @return string
	 */
	public function getCurrentServer() {
		return $this->currentServer;
	}

	/**
	 * @Given /^using server "(LOCAL|REMOTE)"$/
	 *
	 * @param string $server
	 *
	 * @return string Previous used server
	 */
	public function usingServer($server) {
		$previousServer = $this->currentServer;
		if ($server === 'LOCAL') {
			$this->baseUrl = $this->localBaseUrl;
			$this->currentServer = 'LOCAL';
		} else {
			$this->baseUrl = $this->remoteBaseUrl;
			$this->currentServer = 'REMOTE';
		}
		return $previousServer;
	}

	/**
	 *
	 * @return boolean
	 */
	public function federatedServerExists() {
		return $this->federatedServerExists;
	}

	/**
	 * disable CSRF
	 *
	 * @throws Exception
	 * @return string the previous setting of csrf.disabled
	 */
	public function disableCSRF() {
		return $this->setCSRFDotDisabled('true');
	}

	/**
	 * enable CSRF
	 *
	 * @throws Exception
	 * @return string the previous setting of csrf.disabled
	 */
	public function enableCSRF() {
		return $this->setCSRFDotDisabled('false');
	}

	/**
	 * set csrf.disabled
	 *
	 * @param string $setting "true", "false" or "" to delete the setting
	 *
	 * @throws Exception
	 * @return string the previous setting of csrf.disabled
	 */
	public function setCSRFDotDisabled($setting) {
		$oldCSRFSetting = $this->getSystemConfigValue('csrf.disabled');

		if ($setting === "") {
			$this->deleteSystemConfig('csrf.disabled');
		} elseif (($setting === 'true') || ($setting === 'false')) {
			$this->setSystemConfig('csrf.disabled', $setting, 'boolean');
		} else {
			throw new \http\Exception\InvalidArgumentException(
				'setting must be "true", "false" or ""'
			);
		}
		return \trim($oldCSRFSetting);
	}

	/**
	 * Parses the response as XML
	 *
	 * @param ResponseInterface $response
	 *
	 * @return SimpleXMLElement
	 */
	public function getResponseXml($response = null) {
		if ($response === null) {
			$response = $this->response;
		}

		return HttpRequestHelper::getResponseXml($response);
	}

	/**
	 * Parses the xml answer to get the requested key and sub-key
	 *
	 * @param ResponseInterface $response
	 * @param string $key1
	 * @param string $key2
	 *
	 * @return string
	 */
	public function getXMLKey1Key2Value($response, $key1, $key2) {
		return $this->getResponseXml($response)->$key1->$key2;
	}

	/**
	 * Parses the xml answer to get the requested key sequence
	 *
	 * @param ResponseInterface $response
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 *
	 * @return string
	 */
	public function getXMLKey1Key2Key3Value($response, $key1, $key2, $key3) {
		return $this->getResponseXml($response)->$key1->$key2->$key3;
	}

	/**
	 * Parses the xml answer to get the requested attribute value
	 *
	 * @param ResponseInterface $response
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $attribute
	 *
	 * @return string
	 */
	public function getXMLKey1Key2Key3AttributeValue(
		$response, $key1, $key2, $key3, $attribute
	) {
		return (string) $this->getResponseXml($response)->$key1->$key2->$key3->attributes()->$attribute;
	}

	/**
	 * This function is needed to use a vertical fashion in the gherkin tables.
	 *
	 * @param array $arrayOfArrays
	 *
	 * @return array
	 */
	public function simplifyArray($arrayOfArrays) {
		$a = \array_map(
			function ($subArray) {
				return $subArray[0];
			}, $arrayOfArrays
		);
		return $a;
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to URL "([^"]*)"$/
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to URL "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function userSendsHTTPMethodToUrl($user, $verb, $url) {
		$this->sendingToWithDirectUrl($user, $verb, $url, null);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to URL "([^"]*)" with password "([^"]*)"$/
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to URL "([^"]*)" with password "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 *
	 * @return void
	 */
	public function userSendsHTTPMethodToUrlWithPassword($user, $verb, $url, $password) {
		$this->sendingToWithDirectUrl($user, $verb, $url, null, $password);
	}

	/**
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $body
	 * @param string $password
	 *
	 * @return void
	 */
	public function sendingToWithDirectUrl($user, $verb, $url, $body, $password = null) {
		$fullUrl = $this->getBaseUrl() . $url;

		if ($password === null) {
			$password = $this->getPasswordForUser($user);
		}
		
		$headers = $this->guzzleClientHeaders;

		$config = null;
		if ($this->sourceIpAddress !== null) {
			$config = [
				'curl' => [
					CURLOPT_INTERFACE => $this->sourceIpAddress
				]
			];
		}
		
		$cookies = null;
		if (!empty($this->cookieJar->toArray())) {
			$cookies = $this->cookieJar;
		}

		$fd = null;
		if ($body instanceof TableNode) {
			$fd = $body->getRowsHash();
		}

		if (isset($this->requestToken)) {
			$headers['requesttoken'] = $this->requestToken;
		}

		$this->response = HttpRequestHelper::sendRequest(
			$fullUrl, $verb, $user, $password, $headers, $fd, $config, $cookies
		);
	}

	/**
	 * @param string $url
	 *
	 * @return bool
	 */
	public function isAPublicLinkUrl($url) {
		$urlEnding = \substr($url, \strlen($this->getBaseUrl() . '/'));
		return \preg_match("%^(index.php/)?s/([a-zA-Z0-9]{15})$%", $urlEnding);
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)"$/
	 *
	 * @param int|int[] $statusCode
	 * @param string $message
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBe($statusCode, $message = "") {
		if ($message === "") {
			$message = "HTTP status code is not the expected value";
		}

		if (\is_array($statusCode)) {
			PHPUnit\Framework\Assert::assertContains(
				$this->response->getStatusCode(), $statusCode,
				$message
			);
		} else {
			PHPUnit\Framework\Assert::assertEquals(
				$statusCode, $this->response->getStatusCode(), $message
			);
		}
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)" or "([^"]*)"$/
	 *
	 * @param int $statusCode1
	 * @param int $statusCode2
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBeOr($statusCode1, $statusCode2) {
		$this->theHTTPStatusCodeShouldBe(
			[$statusCode1, $statusCode2]
		);
	}

	/**
	 * Check the text in an HTTP reason phrase
	 *
	 * @Then /^the HTTP reason phrase should be "([^"]*)"$/
	 *
	 * @param string $reasonPhrase
	 *
	 * @return void
	 */
	public function theHTTPReasonPhraseShouldBe($reasonPhrase) {
		PHPUnit\Framework\Assert::assertEquals(
			$reasonPhrase,
			$this->getResponse()->getReasonPhrase(),
			'Unexpected HTTP reason phrase in response'
		);
	}

	/**
	 * Check the text in an HTTP reason phrase
	 * Use this step form if the expected text contains double quotes,
	 * single quotes and other content that theHTTPReasonPhraseShouldBe()
	 * cannot handle.
	 *
	 * After the step, write the expected text in PyString form like:
	 *
	 * """
	 * File "abc.txt" can't be shared due to reason "xyz"
	 * """
	 *
	 * @Then /^the HTTP reason phrase should be:$/
	 *
	 * @param PyStringNode $reasonPhrase
	 *
	 * @return void
	 */
	public function theHTTPReasonPhraseShouldBePyString(
		PyStringNode $reasonPhrase
	) {
		PHPUnit\Framework\Assert::assertEquals(
			$reasonPhrase->getRaw(),
			$this->getResponse()->getReasonPhrase(),
			'Unexpected HTTP reason phrase in response'
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" value should be "([^"]*)"$/
	 *
	 * @param string $key1
	 * @param string $key2
	 * @param string $idText
	 *
	 * @return void
	 */
	public function theXMLKey1Key2ValueShouldBe($key1, $key2, $idText) {
		PHPUnit\Framework\Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Value($this->response, $key1, $key2)
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" "([^"]*)" value should be "([^"]*)"$/
	 *
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $idText
	 *
	 * @return void
	 */
	public function theXMLKey1Key2Key3ValueShouldBe(
		$key1, $key2, $key3, $idText
	) {
		PHPUnit\Framework\Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Key3Value($this->response, $key1, $key2, $key3)
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" "([^"]*)" "([^"]*)" attribute value should be a valid version string$/
	 *
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $attribute
	 *
	 * @return void
	 */
	public function theXMLKey1Key2AttributeValueShouldBe(
		$key1, $key2, $key3, $attribute
	) {
		$value = $this->getXMLKey1Key2Key3AttributeValue(
			$this->response, $key1, $key2, $key3, $attribute
		);
		PHPUnit\Framework\Assert::assertTrue(
			\version_compare($value, '0.0.1') >= 0,
			"attribute $attribute value $value is not a valid version string"
		);
	}

	/**
	 * @param ResponseInterface $response
	 *
	 * @return void
	 */
	public function extractRequestTokenFromResponse(ResponseInterface $response) {
		$this->requestToken = \substr(
			\preg_replace(
				'/(.*)data-requesttoken="(.*)">(.*)/sm', '\2',
				$response->getBody()->getContents()
			),
			0,
			89
		);
	}

	/**
	 * @Given /^user "([^"]*)" has logged in to a web-style session$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userHasLoggedInToAWebStyleSessionUsingTheAPI($user) {
		$loginUrl = $this->getBaseUrl() . '/login';
		// Request a new session and extract CSRF token
		
		$config = null;
		if ($this->sourceIpAddress !== null) {
			$config = [
				'curl' => [
					CURLOPT_INTERFACE => $this->sourceIpAddress
				]
			];
		}

		$response = HttpRequestHelper::get(
			$loginUrl, null, null, $this->guzzleClientHeaders, null, $config, $this->cookieJar
		);
		$this->extractRequestTokenFromResponse($response);

		// Login and extract new token
		$password = $this->getPasswordForUser($user);
		$body = [
			'user' => $user,
			'password' => $password,
			'requesttoken' => $this->requestToken
		];
		$response = HttpRequestHelper::post(
			$loginUrl, null, null, $this->guzzleClientHeaders, $body, $config, $this->cookieJar
		);
		$this->extractRequestTokenFromResponse($response);
	}

	/**
	 * @When the client sends a :method to :url with requesttoken
	 * @Given the client has sent a :method to :url with requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 *
	 * @return void
	 */
	public function sendingAToWithRequesttoken($method, $url) {
		$headers = $this->guzzleClientHeaders;
		
		$config = null;
		if ($this->sourceIpAddress !== null) {
			$config = [
				'curl' => [
					CURLOPT_INTERFACE => $this->sourceIpAddress
				]
			];
		}

		$headers['requesttoken'] = $this->requestToken;

		$url = $this->getBaseUrl() . $url;
		$this->response = HttpRequestHelper::sendRequest(
			$url, $method, null, null, $headers, null, $config, $this->cookieJar
		);
	}

	/**
	 * @When the client sends a :method to :url without requesttoken
	 * @Given the client has sent a :method to :url without requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 *
	 * @return void
	 */
	public function sendingAToWithoutRequesttoken($method, $url) {
		$config = null;
		if ($this->sourceIpAddress !== null) {
			$config = [
				'curl' => [
					CURLOPT_INTERFACE => $this->sourceIpAddress
				]
			];
		}

		$url = $this->getBaseUrl() . $url;
		$this->response = HttpRequestHelper::sendRequest(
			$url, $method, null, null, $this->guzzleClientHeaders,
			null, $config, $this->cookieJar
		);
	}

	/**
	 * @param string $path
	 * @param string $filename
	 *
	 * @return void
	 */
	public static function removeFile($path, $filename) {
		if (\file_exists("$path$filename")) {
			\unlink("$path$filename");
		}
	}

	/**
	 * Creates a file locally in the file system of the test runner
	 * The file will be available to upload to the server
	 *
	 * @param string $name
	 * @param string $size
	 *
	 * @return void
	 */
	public function createLocalFileOfSpecificSize($name, $size) {
		$folder = $this->workStorageDirLocation();
		if (!\is_dir($folder)) {
			\mkDir($folder);
		}
		$file = \fopen($folder . $name, 'w');
		\fseek($file, $size - 1, SEEK_CUR);
		\fwrite($file, 'a'); // write a dummy char at SIZE position
		\fclose($file);
	}

	/**
	 * Make a directory under the server root on the ownCloud server
	 *
	 * @param string $dirPathFromServerRoot e.g. 'apps2/myapp/appinfo'
	 *
	 * @return void
	 * @throws Exception
	 */
	public function mkDirOnServer($dirPathFromServerRoot) {
		SetupHelper::mkDirOnServer(
			$dirPathFromServerRoot,
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @param string $filePathFromServerRoot
	 * @param string $content
	 *
	 * @return void
	 */
	public function createFileOnServerWithContent(
		$filePathFromServerRoot, $content
	) {
		SetupHelper::createFileOnServer(
			$filePathFromServerRoot,
			$content,
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @Given file :filename with text :text has been created in local storage on the server
	 *
	 * @param string $filename
	 * @param string $text
	 *
	 * @return void
	 */
	public function fileHasBeenCreatedInLocalStorageWithText($filename, $text) {
		$this->createFileOnServerWithContent(
			LOCAL_STORAGE_DIR_ON_REMOTE_SERVER . "/$filename", $text
		);
	}

	/**
	 * @Given file :filename has been deleted from local storage on the server
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function fileHasBeenDeletedInLocalStorage($filename) {
		SetupHelper::deleteFileOnServer(
			LOCAL_STORAGE_DIR_ON_REMOTE_SERVER . "/$filename",
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @return string
	 */
	public function getAdminUsername() {
		return (string) $this->adminUsername;
	}

	/**
	 * @return string
	 */
	public function getAdminPassword() {
		return (string) $this->adminPassword;
	}

	/**
	 * @param string $password
	 *
	 * @return void
	 */
	public function rememberNewAdminPassword($password) {
		$this->adminPassword = (string) $password;
	}

	/**
	 * @param string $userName
	 *
	 * @return string
	 */
	public function getPasswordForUser($userName) {
		$userName = $this->getActualUsername($userName);
		if ($userName === $this->getAdminUsername()) {
			return (string) $this->getAdminPassword();
		} elseif (\array_key_exists($userName, $this->createdUsers)) {
			return (string) $this->createdUsers[$userName]['password'];
		} elseif (\array_key_exists($userName, $this->createdRemoteUsers)) {
			return (string) $this->createdRemoteUsers[$userName]['password'];
		} elseif ($userName === 'regularuser') {
			return (string) $this->regularUserPassword;
		} elseif ($userName === 'user0') {
			return (string) $this->regularUserPassword;
		} elseif ($userName === 'user1') {
			return (string) $this->alt1UserPassword;
		} elseif ($userName === 'user2') {
			return (string) $this->alt2UserPassword;
		} elseif ($userName === 'user3') {
			return (string) $this->alt3UserPassword;
		} elseif ($userName === 'user4') {
			return (string) $this->alt4UserPassword;
		} elseif ($userName === 'usergrp') {
			return (string) $this->regularUserPassword;
		} elseif ($userName === 'sharee1') {
			return (string) $this->regularUserPassword;
		} else {
			// The user has not been created yet and is not one of the pre-known
			// users. So let the caller have the default password.
			return (string) $this->getActualPassword($this->regularUserPassword);
		}
	}

	/**
	 * Get the display name of the user.
	 *
	 * For users that have already been created, return their display name.
	 * For special known user names, return the display name that is also used by LDAP tests.
	 * For other users, return null. They will not be assigned any particular
	 * display name by this function.
	 *
	 * @param string $userName
	 *
	 * @return string|null
	 */
	public function getDisplayNameForUser($userName) {
		$userName = $this->getActualUsername($userName);
		// The hard-coded user names and display names are also in ldap-users.ldif
		// for testing in an LDAP environment. The mapping must be kept the
		// same in both places.
		if (\array_key_exists($userName, $this->createdUsers)) {
			return (string) $this->createdUsers[$userName]['displayname'];
		} elseif (\array_key_exists($userName, $this->createdRemoteUsers)) {
			return (string)$this->createdRemoteUsers[$userName]['displayname'];
		} elseif ($userName === 'regularuser') {
			return 'Regular User';
		} elseif ($userName === 'user0') {
			return 'User Zero';
		} elseif ($userName === 'user1') {
			return 'User One';
		} elseif ($userName === 'user2') {
			return 'User Two';
		} elseif ($userName === 'user3') {
			return 'User Three';
		} elseif ($userName === 'user4') {
			return 'User Four';
		} elseif ($userName === 'usergrp') {
			return 'User Grp';
		} elseif ($userName === 'sharee1') {
			return 'Sharee One';
		} else {
			return null;
		}
	}

	/**
	 * Get the email address of the user.
	 *
	 * For users that have already been created, return their email address.
	 * For special known user names, return the email address that is also used by LDAP tests.
	 * For other users, return null. They will not be assigned any particular
	 * email address by this function.
	 *
	 * @param string $userName
	 *
	 * @return string|null
	 */
	public function getEmailAddressForUser($userName) {
		$userName = $this->getActualUsername($userName);
		// The hard-coded user names and email addresses are also in ldap-users.ldif
		// for testing in an LDAP environment. The mapping must be kept the
		// same in both places.
		if (\array_key_exists($userName, $this->createdUsers)) {
			return (string) $this->createdUsers[$userName]['email'];
		} elseif (\array_key_exists($userName, $this->createdRemoteUsers)) {
			return (string)$this->createdRemoteUsers[$userName]['email'];
		} elseif ($userName === 'regularuser') {
			return 'regularuser@example.org';
		} elseif ($userName === 'user0') {
			return 'user0@example.org';
		} elseif ($userName === 'user1') {
			return 'user1@example.org';
		} elseif ($userName === 'user2') {
			return 'user2@example.org';
		} elseif ($userName === 'user3') {
			return 'user3@example.org';
		} elseif ($userName === 'user4') {
			return 'user4@example.org';
		} elseif ($userName === 'usergrp') {
			return 'usergrp@example.org';
		} elseif ($userName === 'sharee1') {
			return 'sharee1@example.org';
		} else {
			return null;
		}
	}

	// TODO do similar for other usernames for e.g. %regularuser% or %test-user-1%
	/**
	 * @param string $functionalUsername
	 *
	 * @return string
	 */
	public function getActualUsername($functionalUsername) {
		if ($functionalUsername === "%admin%") {
			return (string) $this->getAdminUsername();
		} else {
			return $functionalUsername;
		}
	}

	/**
	 * @param string $functionalPassword
	 *
	 * @return string
	 */
	public function getActualPassword($functionalPassword) {
		if ($functionalPassword === "%regular%") {
			return (string) $this->regularUserPassword;
		} elseif ($functionalPassword === "%alt1%") {
			return (string) $this->alt1UserPassword;
		} elseif ($functionalPassword === "%alt2%") {
			return (string) $this->alt2UserPassword;
		} elseif ($functionalPassword === "%alt3%") {
			return (string) $this->alt3UserPassword;
		} elseif ($functionalPassword === "%alt4%") {
			return (string) $this->alt4UserPassword;
		} elseif ($functionalPassword === "%subadmin%") {
			return (string) $this->subAdminPassword;
		} elseif ($functionalPassword === "%admin%") {
			return (string) $this->getAdminPassword();
		} elseif ($functionalPassword === "%altadmin%") {
			return (string) $this->alternateAdminPassword;
		} elseif ($functionalPassword === "%public%") {
			return (string) $this->publicLinkSharePassword;
		} else {
			return $functionalPassword;
		}
	}

	/**
	 * @param string $userName
	 *
	 * @return array
	 */
	public function getAuthOptionForUser($userName) {
		return [$userName, $this->getPasswordForUser($userName)];
	}

	/**
	 * @return array
	 */
	public function getAuthOptionForAdmin() {
		return $this->getAuthOptionForUser($this->getAdminUsername());
	}

	/**
	 * @When the administrator requests status.php
	 *
	 * @return void
	 */
	public function theAdministratorRequestsStatusPhp() {
		$this->response = $this->getStatusPhp();
	}

	/**
	 * @When the administrator creates file :path with content :content in local storage using the testing API
	 * @Given the administrator has created file :path with content :content in local storage using the testing API
	 *
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 */
	public function theAdministratorCreatesFileUsingTheTestingApi($path, $content) {
		$this->theAdministratorCreatesFileWithContentInLocalStorageUsingTheTestingApi(
			$path,
			$content,
			'local_storage'
		);
	}

	/**
	 * @When the administrator creates file :path with content :content in local storage :mountPoint using the testing API
	 * @Given the administrator has created file :path with content :content in local storage :mountPount
	 *
	 * @param string $path
	 * @param string $content
	 * @param string $mountPoint
	 *
	 * @return void
	 */
	public function theAdministratorCreatesFileWithContentInLocalStorageUsingTheTestingApi(
		$path, $content, $mountPoint
	) {
		$user = $this->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getAdminPassword(),
			'POST',
			"/apps/testing/api/v1/file",
			[
				'file' => TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$mountPoint/$path",
				'content' => $content
			],
			$this->getOcsApiVersion()
		);
		$this->setResponse($response);
	}

	/**
	 * @When the administrator deletes file :path in local storage using the testing API
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function theAdministratorDeletesFileInLocalStorageUsingTheTestingApi($path) {
		$user = $this->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getAdminPassword(),
			'DELETE',
			"/apps/testing/api/v1/file",
			['file' => LOCAL_STORAGE_DIR_ON_REMOTE_SERVER . "/$path"],
			$this->getOcsApiVersion()
		);
		$this->setResponse($response);
	}

	/**
	 *
	 * @return ResponseInterface
	 */
	public function getStatusPhp() {
		$fullUrl = $this->getBaseUrl() . "/status.php";

		$config = null;
		if ($this->sourceIpAddress !== null) {
			$config = [
				'curl' => [
					CURLOPT_INTERFACE => $this->sourceIpAddress
				]
			];
		}

		return HttpRequestHelper::get(
			$fullUrl, $this->getAdminUsername(),
			$this->getAdminPassword(), $this->guzzleClientHeaders, null, $config
		);
	}

	/**
	 * @Then the json responded should match with
	 *
	 * @param PyStringNode $jsonExpected
	 *
	 * @return void
	 */
	public function jsonRespondedShouldMatch(PyStringNode $jsonExpected) {
		$jsonExpectedEncoded = \json_encode($jsonExpected->getRaw());
		$jsonRespondedEncoded = \json_encode((string) $this->response->getBody());
		PHPUnit\Framework\Assert::assertEquals(
			$jsonExpectedEncoded, $jsonRespondedEncoded
		);
	}

	/**
	 * @Then the status.php response should match with
	 *
	 * @param PyStringNode $jsonExpected
	 *
	 * @return void
	 */
	public function statusPhpRespondedShouldMatch(PyStringNode $jsonExpected) {
		$jsonExpectedDecoded = \json_decode($jsonExpected->getRaw(), true);
		$jsonRespondedEncoded = \json_encode($this->getJsonDecodedResponse());

		$this->theAdministratorGetsCapabilitiesCheckResponse();
		$edition = $this->getParameterValueFromXml(
			$this->getCapabilitiesXml(),
			'core',
			'status@@@edition'
		);

		if (!\strlen($edition)) {
			PHPUnit\Framework\Assert::fail(
				"Cannot get edition from capabilities"
			);
		}

		$productName = $this->getParameterValueFromXml(
			$this->getCapabilitiesXml(),
			'core',
			'status@@@productname'
		);

		if (!\strlen($edition)) {
			PHPUnit\Framework\Assert::fail(
				"Cannot get productname from capabilities"
			);
		}

		$jsonExpectedDecoded['edition'] = $edition;
		$jsonExpectedDecoded['productname'] = $productName;

		$runOccStatus = $this->runOcc(['status']);
		if ($runOccStatus === 0) {
			$output = \explode("- ", $this->lastStdOut);
			$version = \explode(": ", $output[3]);
			PHPUnit\Framework\Assert::assertEquals(
				"version", $version[0]
			);
			$versionString = \explode(": ", $output[4]);
			PHPUnit\Framework\Assert::assertEquals(
				"versionstring", $versionString[0]
			);
			$jsonExpectedDecoded['version'] = \trim($version[1]);
			$jsonExpectedDecoded['versionstring'] = \trim($versionString[1]);
			$jsonExpectedEncoded = \json_encode($jsonExpectedDecoded);
			PHPUnit\Framework\Assert::assertEquals(
				$jsonExpectedEncoded, $jsonRespondedEncoded
			);
		} else {
			PHPUnit\Framework\Assert::fail(
				"Cannot get version variables from occ - status $runOccStatus"
			);
		}
	}

	/**
	 * send request to read a server file
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function readFileInServerRoot($path) {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/file?file={$path}"
		);
		$this->setResponse($response);
	}

	/**
	 * @Then the file :path with content :content should exist in the server root
	 *
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 */
	public function theFileWithContentShouldExistInTheServerRoot($path, $content) {
		$this->readFileInServerRoot($path);
		PHPUnit\Framework\Assert::assertSame(
			200,
			$this->getResponse()->getStatusCode(),
			"Failed to read the file {$path}"
		);

		$fileContent = HttpRequestHelper::getResponseXml($this->getResponse());
		$fileContent = (string)$fileContent->data->element->contentUrlEncoded;
		$fileContent = \urldecode($fileContent);

		PHPUnit\Framework\Assert::assertSame(
			$content,
			$fileContent,
			"The content of the file does not match with '{$content}'"
		);
	}

	/**
	 * @Then the file :path should not exist in the server root
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function theFileShouldNotExistInTheServerRoot($path) {
		$this->readFileInServerRoot($path);
		PHPUnit\Framework\Assert::assertSame(
			404,
			$this->getResponse()->getStatusCode(),
			"The file '{$path}' exists in the server root"
		);
	}

	/**
	 * @Then the body of the response should be empty
	 *
	 * @return void
	 */
	public function theResponseBodyShouldBeEmpty() {
		PHPUnit\Framework\Assert::assertEmpty(
			$this->getResponse()->getBody()->getContents()
		);
	}

	/**
	 * @param ResponseInterface|null $response
	 *
	 * @return array
	 */
	public function getJsonDecodedResponse($response = null) {
		if ($response === null) {
			$response = $this->getResponse();
		}
		return \json_decode(
			$response->getBody(), true
		);
	}

	/**
	 *
	 * @return array
	 */
	public function getJsonDecodedStatusPhp() {
		return $this->getJsonDecodedResponse(
			$this->getStatusPhp()
		);
	}

	/**
	 * @return string
	 */
	public function getEditionFromStatus() {
		$decodedResponse = $this->getJsonDecodedStatusPhp();
		if (isset($decodedResponse['edition'])) {
			return $decodedResponse['edition'];
		}
		return '';
	}

	/**
	 * @return string|null
	 */
	public function getProductNameFromStatus() {
		$decodedResponse = $this->getJsonDecodedStatusPhp();
		if (isset($decodedResponse['productname'])) {
			return $decodedResponse['productname'];
		}
		return '';
	}

	/**
	 * @return string|null
	 */
	public function getVersionFromStatus() {
		$decodedResponse = $this->getJsonDecodedStatusPhp();
		if (isset($decodedResponse['version'])) {
			return $decodedResponse['version'];
		}
		return '';
	}

	/**
	 * @return string|null
	 */
	public function getVersionStringFromStatus() {
		$decodedResponse = $this->getJsonDecodedStatusPhp();
		if (isset($decodedResponse['versionstring'])) {
			return $decodedResponse['versionstring'];
		}
		return '';
	}

	/**
	 * returns a string that can be used to check a url of comments with
	 * regular expression (without delimiter)
	 *
	 * @return string
	 */
	public function getCommentUrlRegExp() {
		$basePath = \ltrim($this->getBasePath() . "/", "/");
		return "/{$basePath}remote.php/dav/comments/files/([0-9]+)";
	}

	/**
	 * substitutes codes like %base_url% with the value
	 * if the given value does not have anything to be substituted
	 * then it is returned unmodified
	 *
	 * @param string $value
	 * @param array $functions associative array of functions and parameters to be
	 *                         called on every replacement string before the
	 *                         replacement
	 *                         function name has to be the key and the parameters an
	 *                         own array
	 *                         the replacement itself will be used as first parameter
	 *                         e.g. substituteInLineCodes($value, ['preg_quote' => ['/']])
	 * @param array $additionalSubstitutions
	 *                         array of additional substitution configurations
	 *                           [
	 *                             [
	 *                               "code" => "%my_code%",
	 *                               "function" => [
	 *                                                $myClass,
	 *                                                "myFunction"
	 *                               ],
	 *                               "parameter" => []
	 *                             ],
	 *                           ]
	 *
	 * @return string
	 */
	public function substituteInLineCodes(
		$value, $functions = [], $additionalSubstitutions = []
	) {
		$substitutions = [
			[
				"code" => "%base_url%",
				"function" => [
					$this,
					"getBaseUrl"
				],
				"parameter" => []
			],
			[
				"code" => "%base_url_without_scheme%",
				"function" => [
					$this,
					"getBaseUrlWithoutScheme"
				],
				"parameter" => []
			],
			[
				"code" => "%remote_server%",
				"function" => [
					$this,
					"getRemoteBaseUrl"
				],
				"parameter" => []
			],
			[
				"code" => "%remote_server_without_scheme%",
				"function" => [
					$this,
					"getRemoteBaseUrlWithoutScheme"
				],
				"parameter" => []
			],
			[
				"code" => "%local_server%",
				"function" => [
					$this,
					"getLocalBaseUrl"
				],
				"parameter" => []
			],
			[
				"code" => "%local_server_without_scheme%",
				"function" => [
					$this,
					"getLocalBaseUrlWithoutScheme"
				],
				"parameter" => []
			],
			[
				"code" => "%base_path%",
				"function" => [
					$this,
					"getBasePath"
				],
				"parameter" => []
			],
			[
				"code" => "%ocs_path_v1%",
				"function" => [
					$this,
					"getOCSPath"
				],
				"parameter" => [1]
			],
			[
				"code" => "%ocs_path_v2%",
				"function" => [
					$this,
					"getOCSPath"
				],
				"parameter" => [2]
			],
			[
				"code" => "%productname%",
				"function" => [
					$this,
					"getProductNameFromStatus"
				],
				"parameter" => []
			],
			[
				"code" => "%edition%",
				"function" => [
					$this,
					"getEditionFromStatus"
				],
				"parameter" => []
			],
			[
				"code" => "%version%",
				"function" => [
					$this,
					"getVersionFromStatus"
				],
				"parameter" => []
			],
			[
				"code" => "%versionstring%",
				"function" => [
					$this,
					"getVersionStringFromStatus"
				],
				"parameter" => []
			],
			[
				"code" => "%a_comment_url%",
				"function" => [
					$this,
					"getCommentUrlRegExp"
				],
				"parameter" => []
			]
		];

		if (!empty($additionalSubstitutions)) {
			$substitutions = \array_merge($substitutions, $additionalSubstitutions);
		}

		foreach ($substitutions as $substitution) {
			$replacement = \call_user_func_array(
				$substitution["function"],
				$substitution["parameter"]
			);
			foreach ($functions as $function => $parameters) {
				$replacement = \call_user_func_array(
					$function,
					\array_merge([$replacement], $parameters)
				);
			}
			$value = \str_replace(
				$substitution["code"],
				$replacement,
				$value
			);
		}
		return $value;
	}

	/**
	 * @return string
	 */
	public function temporaryStorageSubfolderName() {
		return "work_tmp";
	}

	/**
	 * @return string
	 */
	public function acceptanceTestsDirLocation() {
		return \dirname(__FILE__) . "/../../";
	}

	/**
	 * @return string
	 */
	public function workStorageDirLocation() {
		return $this->acceptanceTestsDirLocation() . $this->temporaryStorageSubfolderName() . "/";
	}

	/**
	 * Get the path of the ownCloud server root directory
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getServerRoot() {
		if ($this->localServerRoot === null) {
			$this->localServerRoot = SetupHelper::getServerRoot(
				$this->getBaseUrl(),
				$this->getAdminUsername(),
				$this->getAdminPassword()
			);
		}
		return $this->localServerRoot;
	}

	/**
	 * @Then the config key :key of app :appID should have value :value
	 *
	 * @param string $key
	 * @param string $appID
	 * @param string $value
	 *
	 * @return void
	 */
	public function theConfigKeyOfAppShouldHaveValue($key, $appID, $value) {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/app/{$appID}/{$key}",
			[],
			$this->getOcsApiVersion()
		);
		$configkeyValue = \json_decode(\json_encode($this->getResponseXml($response)->data[0]->element->value), 1)[0];
		PHPUnit\Framework\Assert::assertEquals($value, $configkeyValue);
	}

	/**
	 * Parse list of config keys from the given XML response
	 *
	 * @param SimpleXMLElement $responseXml
	 *
	 * @return array
	 */
	public function parseConfigListFromResponseXml($responseXml) {
		$configkeyData = \json_decode(\json_encode($responseXml->data), 1);
		if (isset($configkeyData['element'])) {
			$configkeyData = $configkeyData['element'];
		} else {
			// There are no keys for the app
			return [];
		}
		if (isset($configkeyData[0])) {
			$configkeyValues = $configkeyData;
		} else {
			// There is just 1 key for the app
			$configkeyValues[0] = $configkeyData;
		}
		return $configkeyValues;
	}

	/**
	 * Returns a list of config keys for the given app
	 *
	 * @param string $appID
	 *
	 * @return array
	 */
	public function getConfigKeyList($appID) {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/app/{$appID}",
			[],
			$this->getOcsApiVersion()
		);
		return $this->parseConfigListFromResponseXml($this->getResponseXml($response));
	}

	/**
	 * Check if given config key is present for given app
	 *
	 * @param string $key
	 * @param string $appID
	 *
	 * @return bool
	 */
	public function checkConfigKeyInApp($key, $appID) {
		$configkeyList = $this->getConfigKeyList($appID);
		foreach ($configkeyList as $config) {
			if ($config['configkey'] === $key) {
				return  true;
			}
		}
		return false;
	}

	/**
	 * @Then /^app ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?have config key ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $appID
	 * @param string $shouldOrNot
	 * @param string $key
	 *
	 * @return void
	 */
	public function appShouldHaveConfigKey($appID, $shouldOrNot, $key) {
		$appID = \trim($appID, $appID[0]);
		$key = \trim($key, $key[0]);

		$should = ($shouldOrNot !== "not");

		if ($should) {
			PHPUnit\Framework\Assert::assertTrue($this->checkConfigKeyInApp($key, $appID));
		} else {
			PHPUnit\Framework\Assert::assertFalse($this->checkConfigKeyInApp($key, $appID));
		}
	}

	/**
	 * @Then /^following config keys should (not|)\s?exist$/
	 *
	 * @param string $shouldOrNot
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function followingConfigKeysShouldExist($shouldOrNot, TableNode $table) {
		$should = ($shouldOrNot !== "not");
		if ($should) {
			foreach ($table as $item) {
				PHPUnit\Framework\Assert::assertTrue($this->checkConfigKeyInApp($item['configkey'], $item['appid']));
			}
		} else {
			foreach ($table as $item) {
				PHPUnit\Framework\Assert::assertFalse($this->checkConfigKeyInApp($item['configkey'], $item['appid']));
			}
		}
	}

	/**
	 * @BeforeScenario @local_storage
	 *
	 * @return void
	 */
	public function setupLocalStorageBefore() {
		SetupHelper::init(
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getBaseUrl(),
			$this->getOcPath()
		);
		$storageName = "local_storage";
		$storageId = SetupHelper::createLocalStorageMount($storageName);
		$this->addStorageId($storageName, $storageId);
		SetupHelper::runOcc(
			[
				'files_external:option',
				$storageId,
				'enable_sharing',
				'true'
			]
		);
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function restoreAdminPassword() {
		if ($this->adminPassword !== $this->originalAdminPassword) {
			$this->adminResetsPasswordOfUserUsingTheProvisioningApi(
				$this->getAdminUsername(),
				$this->originalAdminPassword
			);
			$this->adminPassword = $this->originalAdminPassword;
		}
	}

	/**
	 * @AfterScenario @local_storage
	 *
	 * @return void
	 */
	public function removeLocalStorageAfter() {
		if ($this->getStorageIds() !== null) {
			foreach ($this->getStorageIds() as $key => $value) {
				SetupHelper::runOcc(
					[
						'files_external:delete',
						'-y',
						$value
					]
				);
			}
		}
		SetupHelper::rmDirOnServer(
			TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER
		);
	}

	/**
	 *
	 * @param string $serverUrl
	 *
	 * @return void
	 */
	public function clearFileLocksForServer($serverUrl) {
		$response = OcsApiHelper::sendRequest(
			$serverUrl,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'delete',
			"/apps/testing/api/v1/lockprovisioning",
			["global" => "true"]
		);
		PHPUnit\Framework\Assert::assertEquals("200", $response->getStatusCode());
	}

	/**
	 * After Scenario. clear file locks
	 *
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function clearFileLocks() {
		$this->deleteTokenAuthEnforcedAfterScenario();
		$this->clearFileLocksForServer($this->getBaseUrl());
		if ($this->remoteBaseUrl !== $this->localBaseUrl) {
			$this->clearFileLocksForServer($this->getRemoteBaseUrl());
		}
	}

	/**
	 * @BeforeSuite
	 *
	 * @param BeforeSuiteScope $scope
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function useBigFileIDs(BeforeSuiteScope $scope) {
		$fullUrl = \getenv('TEST_SERVER_URL');
		if (\substr($fullUrl, -1) !== '/') {
			$fullUrl .= '/';
		}
		$fullUrl .= "ocs/v1.php/apps/testing/api/v1/increasefileid";
		$suiteSettingsContexts = $scope->getSuite()->getSettings()['contexts'];
		$adminUsername = null;
		$adminPassword = null;
		foreach ($suiteSettingsContexts as $context) {
			if (isset($context[__CLASS__])) {
				$adminUsername = $context[__CLASS__]['adminUsername'];
				$adminPassword = $context[__CLASS__]['adminPassword'];
				break;
			}
		}

		// get the admin username from the environment (if defined)
		$adminUsernameFromEnvironment = self::getAdminUsernameFromEnvironment();
		if ($adminUsernameFromEnvironment !== false) {
			$adminUsername = $adminUsernameFromEnvironment;
		}

		// get the admin password from the environment (if defined)
		$adminPasswordFromEnvironment = self::getAdminPasswordFromEnvironment();
		if ($adminPasswordFromEnvironment !== false) {
			$adminPassword = $adminPasswordFromEnvironment;
		}

		if (($adminUsername === null) || ($adminPassword === null)) {
			throw new \Exception(
				"Could not find adminUsername and/or adminPassword in useBigFileIDs"
			);
		}

		HttpRequestHelper::post($fullUrl, $adminUsername, $adminPassword);
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
		// registers context in every suite, as every suite has FeatureContext
		// that calls BasicStructure.php
		$this->ocsContext = new OCSContext();
		$this->ocsContext->before($scope);
		$environment->registerContext($this->ocsContext);
	}

	/**
	 * runs a function on every server (LOCAL & REMOTE).
	 * The callable function receives the server (LOCAL or REMOTE) as first argument
	 *
	 * @param callable $callback
	 *
	 * @return mixed[]
	 */
	public function runFunctionOnEveryServer($callback) {
		$previousServer = $this->getCurrentServer();
		$result = [];
		foreach (['LOCAL','REMOTE'] as $server) {
			$this->usingServer($server);
			if (($server === 'LOCAL')
				|| $this->federatedServerExists()
			) {
				$result[$server] = \call_user_func($callback, $server);
			}
		}
		$this->usingServer($previousServer);
		return $result;
	}
}
