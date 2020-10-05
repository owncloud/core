<?php
/**
 * ownCloud
 *
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

use rdx\behatvars\BehatVariablesContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use GuzzleHttp\Cookie\CookieJar;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\Assert;
use TestHelpers\AppConfigHelper;
use TestHelpers\OcsApiHelper;
use TestHelpers\SetupHelper;
use TestHelpers\HttpRequestHelper;
use TestHelpers\UploadHelper;
use TestHelpers\OcisHelper;
use Zend\Ldap\Ldap;

require_once 'bootstrap.php';

/**
 * Features context.
 */
class FeatureContext extends BehatVariablesContext {
	use Provisioning;
	use Sharing;
	use WebDav;

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
	private $adminDisplayName = '';

	/**
	 * @var string
	 */
	private $adminEmailAddress = '';

	/**
	 * @var string
	 */
	private $originalAdminPassword = '';

	/**
	 * An array of values of replacement values of user attributes.
	 * These are only referenced when creating a user. After that, the
	 * run-time values are maintained and referenced in the $createUsers array.
	 *
	 * Key is the username, value is an array of user attributes
	 *
	 * @var array|null
	 */
	private $userReplacements = null;

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
	 * @var array
	 */
	private $createdFiles = [];

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
	public $ocsContext;

	/**
	 *
	 * @var AuthContext
	 */
	public $authContext;

	/**
	 *
	 * @var AppConfigurationContext
	 */
	public $appConfigurationContext;

	/**
	 * @var array the changes made to capabilities for the test scenario
	 */
	private $savedCapabilitiesChanges = [];

	/**
	 * @var array with keys for each baseURL (e.g. of local and remote server)
	 *            that contain the original capabilities in XML format
	 */
	private $savedCapabilitiesXml;

	/**
	 * @var array saved configuration of the system before test runs as reported
	 *            by occ config:list
	 */
	private $savedConfigList = [];

	/**
	 * @var array
	 */
	private $initialTrustedServer;

	/**
	 * @var int return code of last command
	 */
	private $lastCode;
	/**
	 * @var string stdout of last command
	 */
	private $lastStdOut;
	/**
	 * @var string stderr of last command
	 */
	private $lastStdErr;
	/**
	 * @var array last http status codes
	 */
	private $lastHttpStatusCodesArray = [];
	/**
	 * @var array last ocs status codes
	 */
	private $lastOCSStatusCodesArray = [];

	/**
	 * @param $httpStatusCode
	 *
	 * @return void
	 */
	public function pushToLastHttpStatusCodesArray($httpStatusCode) {
		\array_push($this->lastHttpStatusCodesArray, $httpStatusCode);
	}

	/**
	 * @return void
	 */
	public function emptyLastHTTPStatusCodesArray() {
		$this->lastHttpStatusCodesArray = [];
	}

	/**
	 * @return void
	 */
	public function emptyLastOCSStatusCodesArray() {
		$this->lastOCSStatusCodesArray = [];
	}
	/**
	 * @param $ocsStatusCode
	 *
	 * @return void
	 */
	public function pushToLastOcsCodesArray($ocsStatusCode) {
		\array_push($this->lastOCSStatusCodesArray, $ocsStatusCode);
	}

	/*
	 * @var Ldap
	 */
	private $ldap;
	private $ldapBaseDN;
	private $ldapHost;
	private $ldapPort;
	private $ldapAdminUser;
	private $ldapAdminPassword;
	private $ldapUsersOU;
	private $ldapGroupsOU;
	/**
	 * @var array
	 */
	private $toDeleteDNs = [];
	private $ldapCreatedUsers = [];
	private $ldapCreatedGroups = [];
	private $toDeleteLdapConfigs = [];
	private $oldLdapConfig = [];

	/**
	 * @return Ldap
	 */
	public function getLdap() {
		return $this->ldap;
	}

	/**
	 * @param string $configId
	 *
	 * @return void
	 */
	public function setToDeleteLdapConfigs($configId) {
		$this->toDeleteLdapConfigs[] = $configId;
	}

	/**
	 * @return array
	 */
	public function getToDeleteLdapConfigs() {
		return $this->toDeleteLdapConfigs;
	}

	/**
	 * @param string $setValue
	 *
	 * @return void
	 */
	public function setToDeleteDNs($setValue) {
		$this->toDeleteDNs[] = $setValue;
	}

	/**
	 * @return string
	 */
	public function getLdapBaseDN() {
		return $this->ldapBaseDN;
	}

	/**
	 * @return string
	 */
	public function getLdapUsersOU() {
		return $this->ldapUsersOU;
	}

	/**
	 * @return string
	 */
	public function getLdapGroupsOU() {
		return $this->ldapGroupsOU;
	}

	/**
	 * @return array
	 */
	public function getOldLdapConfig() {
		return $this->oldLdapConfig;
	}

	/**
	 * @param $configId
	 * @param $configKey
	 * @param $value
	 *
	 * @return void
	 */
	public function setOldLdapConfig($configId, $configKey, $value) {
		$this->oldLdapConfig[$configId][$configKey] = $value;
	}

	/**
	 * @return string
	 */
	public function getLdapHost() {
		return $this->ldapHost;
	}

	/**
	 * @return string
	 */
	public function getLdapHostWithoutScheme() {
		return $this->removeSchemeFromUrl($this->ldapHost);
	}

	/**
	 * @return integer
	 */
	public function getLdapPort() {
		return $this->ldapPort;
	}

	/**
	 * @return bool
	 */
	public function isTestingWithLdap() {
		return (\getenv("TEST_EXTERNAL_USER_BACKENDS") === "true");
	}

	/**
	 * @return bool
	 */
	public function isTestingReplacingUsernames() {
		return (\getenv('REPLACE_USERNAMES') === "true");
	}

	/**
	 * @return array|null
	 */
	public function usersToBeReplaced() {
		if (($this->userReplacements === null) && $this->isTestingReplacingUsernames()) {
			$this->userReplacements = \json_decode(
				\file_get_contents("./tests/acceptance/usernames.json"),
				true
			);
			// Loop through the user replacements, and make entries for the lower
			// and upper case forms. This allows for steps that specifically
			// want to test that user names like "alice", "Alice" and "ALICE" all work.
			// Such steps will make useful replacements for each form.
			foreach ($this->userReplacements as $key => $value) {
				$lowerKey = \strtolower($key);
				if ($lowerKey !== $key) {
					$this->userReplacements[$lowerKey] = $value;
					$this->userReplacements[$lowerKey]['username'] = \strtolower(
						$this->userReplacements[$lowerKey]['username']
					);
				}
				$upperKey = \strtoupper($key);
				if ($upperKey !== $key) {
					$this->userReplacements[$upperKey] = $value;
					$this->userReplacements[$upperKey]['username'] = \strtoupper(
						$this->userReplacements[$upperKey]['username']
					);
				}
			}
		}
		return $this->userReplacements;
	}

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
	 * returns the complete DAV path including the base path e.g. owncloud-core/remote.php/dav
	 *
	 * @return string
	 */
	public function getDAVPathIncludingBasePath() {
		return \ltrim($this->getBasePath() . "/" . $this->getDavPath(), "/");
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
	 * get the exit status of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return int exit status code of the last occ command
	 */
	public function getExitStatusCodeOfOccCommand() {
		return $this->lastCode;
	}

	/**
	 * get the normal output of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return string normal output of the last occ command
	 */
	public function getStdOutOfOccCommand() {
		return $this->lastStdOut;
	}

	/**
	 * get the error output of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return string error output of the last occ command
	 */
	public function getStdErrOfOccCommand() {
		return $this->lastStdErr;
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
	 * @return int
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
	 * @return integer
	 * @throws Exception
	 */
	public function getStorageId($storageName) {
		$storageIds = $this->getStorageIds();
		$storageId = \array_search($storageName, $storageIds);
		Assert::assertNotFalse(
			$storageId,
			"Could not find storageId with storage name $storageName"
		);
		return $storageId;
	}

	/**
	 * @param string $storageName
	 * @param integer $storageId
	 *
	 * @return void
	 */
	public function addStorageId($storageName, $storageId) {
		$this->storageIds[$storageId] = $storageName;
	}

	/**
	 * @param integer $storageId
	 *
	 * @return void
	 */
	public function popStorageId($storageId) {
		unset($this->storageIds[$storageId]);
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
	 * @param string $user
	 *
	 * @return string
	 */
	public function setCurrentUser($user) {
		$this->currentUser = $user;
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
	 * @return string the previous setting of csrf.disabled
	 * @throws Exception
	 */
	public function disableCSRF() {
		return $this->setCSRFDotDisabled('true');
	}

	/**
	 * enable CSRF
	 *
	 * @return string the previous setting of csrf.disabled
	 * @throws Exception
	 */
	public function enableCSRF() {
		return $this->setCSRFDotDisabled('false');
	}

	/**
	 * set csrf.disabled
	 *
	 * @param string $setting "true", "false" or "" to delete the setting
	 *
	 * @return string the previous setting of csrf.disabled
	 * @throws Exception
	 */
	public function setCSRFDotDisabled($setting) {
		$oldCSRFSetting = SetupHelper::getSystemConfigValue('csrf.disabled');

		if ($setting === "") {
			SetupHelper::deleteSystemConfig('csrf.disabled');
		} elseif (($setting === 'true') || ($setting === 'false')) {
			SetupHelper::setSystemConfig('csrf.disabled', $setting, 'boolean');
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
	 * @param string $exceptionText text to put at the front of exception messages
	 *
	 * @return SimpleXMLElement
	 */
	public function getResponseXml($response = null, $exceptionText = '') {
		if ($response === null) {
			$response = $this->response;
		}

		if ($exceptionText === '') {
			$exceptionText = __METHOD__;
		}
		return HttpRequestHelper::getResponseXml($response, $exceptionText);
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
		return $this->getResponseXml($response, __METHOD__)->$key1->$key2;
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
		return $this->getResponseXml($response, __METHOD__)->$key1->$key2->$key3;
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
		return (string) $this->getResponseXml($response, __METHOD__)->$key1->$key2->$key3->attributes()->$attribute;
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
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function userSendsHTTPMethodToUrl($user, $verb, $url) {
		$user = $this->getActualUsername($user);
		$this->sendingToWithDirectUrl($user, $verb, $url, null);
	}

	/**
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to URL "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function userHasSentHTTPMethodToUrl($user, $verb, $url) {
		$this->userSendsHTTPMethodToUrl($user, $verb, $url);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to URL "([^"]*)" with password "([^"]*)"$/
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
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to URL "([^"]*)" with password "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 *
	 * @return void
	 */
	public function userHasSentHTTPMethodToUrlWithPassword($user, $verb, $url, $password) {
		$this->userSendsHTTPMethodToUrlWithPassword($user, $verb, $url, $password);
		$this->theHTTPStatusCodeShouldBeSuccess();
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

		$bodyRows = null;
		if ($body instanceof TableNode) {
			$bodyRows = $body->getRowsHash();
		}

		if (isset($this->requestToken)) {
			$headers['requesttoken'] = $this->requestToken;
		}

		$this->response = HttpRequestHelper::sendRequest(
			$fullUrl, $verb, $user, $password, $headers, $bodyRows, $config, $cookies
		);
	}

	/**
	 * @param string $url
	 *
	 * @return bool
	 */
	public function isAPublicLinkUrl($url) {
		if (OcisHelper::isTestingOnReva()) {
			$urlEnding = \ltrim($url, '/');
		} else {
			if (\substr($url, 0, 4) !== "http") {
				return false;
			}
			$urlEnding = \substr($url, \strlen($this->getBaseUrl() . '/'));
		}

		if (OcisHelper::isTestingOnOcis()) {
			return \preg_match("%^(#/)?s/([a-zA-Z0-9]{15})$%", $urlEnding);
		} else {
			return \preg_match("%^(index.php/)?s/([a-zA-Z0-9]{15})$%", $urlEnding);
		}
	}

	/**
	 * Check that the status code in the saved response is the expected status
	 * code, or one of the expected status codes.
	 *
	 * @param int|int[]|string|string[] $expectedStatusCode
	 * @param string $message
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBe($expectedStatusCode, $message = "") {
		$actualStatusCode = $this->response->getStatusCode();
		if (\is_array($expectedStatusCode)) {
			if ($message === "") {
				$message = "HTTP status code $actualStatusCode is not one of the expected values";
			}

			Assert::assertContainsEquals(
				$actualStatusCode, $expectedStatusCode,
				$message
			);
		} else {
			if ($message === "") {
				$message = "HTTP status code $actualStatusCode is not the expected value $expectedStatusCode";
			}

			Assert::assertEquals(
				$expectedStatusCode, $actualStatusCode, $message
			);
		}
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)"$/
	 *
	 * @param int|string $statusCode
	 *
	 * @return void
	 */
	public function thenTheHTTPStatusCodeShouldBe($statusCode) {
		$this->theHTTPStatusCodeShouldBe($statusCode, "");
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)" or "([^"]*)"$/
	 *
	 * @param int|string $statusCode1
	 * @param int|string $statusCode2
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBeOr($statusCode1, $statusCode2) {
		$this->theHTTPStatusCodeShouldBe(
			[$statusCode1, $statusCode2]
		);
	}

	/**
	 * @Then /^the HTTP status code should be between "(\d+)" and "(\d+)"$/
	 *
	 * @param int|string $minStatusCode
	 * @param int|string $maxStatusCode
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBeBetween(
		$minStatusCode, $maxStatusCode
	) {
		$statusCode = $this->response->getStatusCode();
		$message = "The HTTP status code $statusCode is not between $minStatusCode and $maxStatusCode";
		Assert::assertGreaterThanOrEqual(
			$minStatusCode,
			$statusCode,
			$message
		);
		Assert::assertLessThanOrEqual(
			$maxStatusCode,
			$statusCode,
			$message
		);
	}

	/**
	 * @Then the HTTP status code should be success
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBeSuccess() {
		$this->theHTTPStatusCodeShouldBeBetween(200, 299);
	}

	/**
	 *
	 * @return bool
	 */
	public function theHTTPStatusCodeWasSuccess() {
		$statusCode = $this->response->getStatusCode();
		return (($statusCode >= 200) && ($statusCode <= 299));
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
		Assert::assertEquals(
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
		Assert::assertEquals(
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
		Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Value($this->response, $key1, $key2),
			"Expected {$idText} but got "
			. $this->getXMLKey1Key2Value($this->response, $key1, $key2)
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
		Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Key3Value($this->response, $key1, $key2, $key3),
			"Expected {$idText} but got "
			. $this->getXMLKey1Key2Key3Value($this->response, $key1, $key2, $key3)
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
		Assert::assertTrue(
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
		$user = $this->getActualUsername($user);
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

		$this->response = HttpRequestHelper::get(
			$loginUrl, null, null, $this->guzzleClientHeaders, null, $config, $this->cookieJar
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
		$this->extractRequestTokenFromResponse($this->response);

		// Login and extract new token
		$password = $this->getPasswordForUser($user);
		$body = [
			'user' => $user,
			'password' => $password,
			'requesttoken' => $this->requestToken
		];
		$this->response = HttpRequestHelper::post(
			$loginUrl, null, null, $this->guzzleClientHeaders, $body, $config, $this->cookieJar
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
		$this->extractRequestTokenFromResponse($this->response);
	}

	/**
	 * @When the client sends a :method to :url of user :user with requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 * @param string $user
	 *
	 * @return void
	 */
	public function sendingAToWithRequesttoken($method, $url, $user) {
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

		$user = \strtolower($this->getActualUsername($user));
		$url = $this->getBaseUrl() . $url;
		$url = $this->substituteInLineCodes($url, $user);
		$this->response = HttpRequestHelper::sendRequest(
			$url, $method, null, null, $headers, null, $config, $this->cookieJar
		);
	}

	/**
	 * @Given the client has sent a :method to :url with requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 *
	 * @return void
	 */
	public function theClientHasSentAToWithRequesttoken($method, $url) {
		$this->sendingAToWithRequesttoken($method, $url);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the client sends a :method to :url of user :user without requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 * @param string $user
	 *
	 * @return void
	 */
	public function sendingAToWithoutRequesttoken($method, $url, $user) {
		$config = null;
		if ($this->sourceIpAddress !== null) {
			$config = [
				'curl' => [
					CURLOPT_INTERFACE => $this->sourceIpAddress
				]
			];
		}

		$user = \strtolower($this->getActualUsername($user));
		$url = $this->getBaseUrl() . $url;
		$url = $this->substituteInLineCodes($url, $user);
		$this->response = HttpRequestHelper::sendRequest(
			$url, $method, null, null, $this->guzzleClientHeaders,
			null, $config, $this->cookieJar
		);
	}

	/**
	 * @Given the client has sent a :method to :url without requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 *
	 * @return void
	 */
	public function theClientHasSentAToWithoutRequesttoken($method, $url) {
		$this->sendingAToWithoutRequesttoken($method, $url);
		$this->theHTTPStatusCodeShouldBeSuccess();
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
	 * @param string $endData
	 *
	 * @return void
	 */
	public function createLocalFileOfSpecificSize($name, $size, $endData = 'a') {
		$folder = $this->workStorageDirLocation();
		if (!\is_dir($folder)) {
			\mkDir($folder);
		}
		$file = \fopen($folder . $name, 'w');
		\fseek($file, $size - \strlen($endData), SEEK_CUR);
		\fwrite($file, $endData); // write the end data to force the file size
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
	 * @throws Exception
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
	 * @throws Exception
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
	 * @throws Exception
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
	 * @param $user
	 *
	 * @return boolean
	 */
	public function isAdminUsername($user) {
		return ($user === $this->getAdminUsername());
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
		$userNameNormalized = $this->normalizeUsername($userName);
		$username = $this->getActualUsername($userNameNormalized);
		if ($username === $this->getAdminUsername()) {
			return (string) $this->getAdminPassword();
		} elseif (\array_key_exists($username, $this->createdUsers)) {
			return (string) $this->createdUsers[$username]['password'];
		} elseif (\array_key_exists($username, $this->createdRemoteUsers)) {
			return (string) $this->createdRemoteUsers[$username]['password'];
		}

		// The user has not been created yet, see if there is a replacement
		// defined for the user.
		$usernameReplacements = $this->usersToBeReplaced();
		if (isset($usernameReplacements)) {
			if (isset($usernameReplacements[$userNameNormalized])) {
				return $usernameReplacements[$userNameNormalized]['password'];
			}
		}

		// Fall back to the default password used for the well-known users.
		if ($username === 'regularuser') {
			return (string) $this->regularUserPassword;
		} elseif ($username === 'alice') {
			return (string) $this->regularUserPassword;
		} elseif ($username === 'brian') {
			return (string) $this->alt1UserPassword;
		} elseif ($username === 'carol') {
			return (string) $this->alt2UserPassword;
		} elseif ($username === 'david') {
			return (string) $this->alt3UserPassword;
		} elseif ($username === 'emily') {
			return (string) $this->alt4UserPassword;
		} elseif ($username === 'usergrp') {
			return (string) $this->regularUserPassword;
		} elseif ($username === 'sharee1') {
			return (string) $this->regularUserPassword;
		}

		// The user has not been created yet and is not one of the pre-known
		// users. So let the caller have the default password.
		return (string) $this->getActualPassword($this->regularUserPassword);
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
		$userNameNormalized = $this->normalizeUsername($userName);
		$username = $this->getActualUsername($userNameNormalized);
		if (\array_key_exists($username, $this->createdUsers)) {
			if (isset($this->createdUsers[$username]['displayname'])) {
				return (string) $this->createdUsers[$username]['displayname'];
			}
			return (string) $userName;
		}
		if (\array_key_exists($username, $this->createdRemoteUsers)) {
			if (isset($this->createdRemoteUsers[$username]['displayname'])) {
				return (string) $this->createdRemoteUsers[$username]['displayname'];
			}
			return (string) $userName;
		}

		// The user has not been created yet, see if there is a replacement
		// defined for the user.
		$usernameReplacements = $this->usersToBeReplaced();
		if (isset($usernameReplacements)) {
			if (isset($usernameReplacements[$userNameNormalized])) {
				return $usernameReplacements[$userNameNormalized]['displayname'];
			} elseif (isset($usernameReplacements[$userName])) {
				return $usernameReplacements[$userName]['displayname'];
			}
		}

		// Fall back to the default display name used for the well-known users.
		if ($username === 'regularuser') {
			return 'Regular User';
		} elseif ($username === 'alice') {
			return 'Alice Hansen';
		} elseif ($username === 'brian') {
			return 'Brian Murphy';
		} elseif ($username === 'carol') {
			return 'Carol King';
		} elseif ($username === 'david') {
			return 'David Lopez';
		} elseif ($username === 'emily') {
			return 'Emily Wagner';
		} elseif ($username === 'usergrp') {
			return 'User Grp';
		} elseif ($username === 'sharee1') {
			return 'Sharee One';
		} elseif (\in_array($username, ["grp1", "***redacted***"])) {
			return $username;
		}
		return null;
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
		$userNameNormalized = $this->normalizeUsername($userName);
		$username = $this->getActualUsername($userNameNormalized);
		if (\array_key_exists($username, $this->createdUsers)) {
			return (string) $this->createdUsers[$username]['email'];
		}
		if (\array_key_exists($username, $this->createdRemoteUsers)) {
			return (string) $this->createdRemoteUsers[$username]['email'];
		}

		// The user has not been created yet, see if there is a replacement
		// defined for the user.
		$usernameReplacements = $this->usersToBeReplaced();
		if (isset($usernameReplacements)) {
			if (isset($usernameReplacements[$userNameNormalized])) {
				return $usernameReplacements[$userNameNormalized]['email'];
			} elseif (isset($usernameReplacements[$userName])) {
				return $usernameReplacements[$userName]['email'];
			}
		}

		// Fall back to the default display name used for the well-known users.
		if ($username === 'regularuser') {
			return 'regularuser@example.org';
		} elseif ($username === 'alice') {
			return 'alice@example.org';
		} elseif ($username === 'brian') {
			return 'brian@example.org';
		} elseif ($username === 'carol') {
			return 'carol@example.org';
		} elseif ($username === 'david') {
			return 'david@example.org';
		} elseif ($username === 'emily') {
			return 'emily@example.org';
		} elseif ($username === 'usergrp') {
			return 'usergrp@example.org';
		} elseif ($username === 'sharee1') {
			return 'sharee1@example.org';
		} else {
			return null;
		}
	}

	// TODO do similar for other usernames for e.g. %regularuser% or %test-user-1%

	/**
	 * @param string|null $functionalUsername
	 *
	 * @return string|null
	 */
	public function getActualUsername($functionalUsername) {
		if ($functionalUsername === null) {
			return null;
		}
		$usernames = $this->usersToBeReplaced();
		if (isset($usernames)) {
			if (isset($usernames[$functionalUsername])) {
				return $usernames[$functionalUsername]['username'];
			}
			$normalizedUsername = $this->normalizeUsername($functionalUsername);
			if (isset($usernames[$normalizedUsername])) {
				return $usernames[$normalizedUsername]['username'];
			}
		}
		if ($functionalUsername === "%admin%") {
			return (string) $this->getAdminUsername();
		}
		return $functionalUsername;
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
	 * @Given the administrator has created file :path with content :content in local storage using the testing API
	 *
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 */
	public function theAdministratorHasCreatedFileUsingTheTestingApi($path, $content) {
		$this->theAdministratorHasCreatedFileWithContentInLocalStorageUsingTheTestingApi(
			$path,
			$content,
			'local_storage'
		);
	}

	/**
	 * @When the administrator creates file :path with content :content in local storage :mountPoint using the testing API
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
		$response = $this->copyContentToFileInTemporaryStorageOnSystemUnderTest(
			"$mountPoint/$path",
			$content
		);
		$this->setResponse($response);
	}

	/**
	 * @Given the administrator has created a file :path in temporary storage with the last exported content using the testing API
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function theAdministratorHasCreatedAFileInTemporaryStorageWithLastExportedContent(
		$path
	) {
		$commandOutput = $this->getStdOutOfOccCommand();
		$this->copyContentToFileInTemporaryStorageOnSystemUnderTest($path, $commandOutput);
		$this->theFileWithContentShouldExistInTheServerRoot(
			TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$path", $commandOutput
		);
	}

	/**
	 * @Given the administrator has created file :path with content :content in local storage :mountPoint
	 *
	 * @param string $path
	 * @param string $content
	 * @param string $mountPoint
	 *
	 * @return void
	 */
	public function theAdministratorHasCreatedFileWithContentInLocalStorageUsingTheTestingApi(
		$path, $content, $mountPoint
	) {
		$this->theAdministratorCreatesFileWithContentInLocalStorageUsingTheTestingApi(
			$path,
			$content,
			$mountPoint
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * Copy a file from the test-runner to the temporary storage directory on
	 * the system-under-test. This uses the testing app to push the file into
	 * the backend of the server, where it can be seen by occ commands done in
	 * the server-under-test.
	 *
	 * @Given the administrator has copied file :localPath to :destination in temporary storage on the system under test
	 *
	 * @param string $localPath relative to the core "root" folder
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theAdministratorHasCopiedFileToTemporaryStorageOnTheSystemUnderTest(
		$localPath, $destination
	) {
		// FeatureContext is in tests/acceptance/features/bootstrap so go up 4
		// levels to the test-runner root
		$testRunnerRoot = \dirname(__DIR__, 4);
		// The local path is specified down from the root - e.g. tests/data/file.txt
		$content = \file_get_contents("$testRunnerRoot/$localPath");
		Assert::assertNotFalse(
			$content,
			"Local file $localPath cannot be read"
		);
		$this->copyContentToFileInTemporaryStorageOnSystemUnderTest($destination, $content);
		$this->theFileWithContentShouldExistInTheServerRoot(TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$destination", $content);
	}

	/**
	 * @param string $destination
	 * @param string $content
	 *
	 * @return ResponseInterface
	 * @throws Exception
	 */
	public function copyContentToFileInTemporaryStorageOnSystemUnderTest(
		$destination, $content
	) {
		$this->mkDirOnServer(TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER);

		return OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'POST',
			"/apps/testing/api/v1/file",
			[
				'file' => TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$destination",
				'content' => $content
			],
			$this->getOcsApiVersion()
		);
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
	 * @Given a file with the size of :size bytes and the name :name has been created locally
	 *
	 * @param int $size if not int given it will be cast to int
	 * @param string $name
	 *
	 * @return void
	 * @throws InvalidArgumentException
	 */
	public function aFileWithSizeAndNameHasBeenCreatedLocally($size, $name) {
		$fullPath = UploadHelper::getUploadFilesDir($name);
		if (\file_exists($fullPath)) {
			throw new InvalidArgumentException(
				__METHOD__ . " could not create '$fullPath' file exists"
			);
		}
		UploadHelper::createFileSpecificSize($fullPath, (int) $size);
		$this->createdFiles[] = $fullPath;
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
		Assert::assertEquals(
			$jsonExpectedEncoded, $jsonRespondedEncoded,
			"The json responded: {$jsonRespondedEncoded} does not match with json expected: {$jsonExpectedEncoded}"
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

		$this->appConfigurationContext->theAdministratorGetsCapabilitiesCheckResponse();
		$edition = $this->appConfigurationContext->getParameterValueFromXml(
			$this->appConfigurationContext->getCapabilitiesXml(__METHOD__),
			'core',
			'status@@@edition'
		);

		if (!\strlen($edition)) {
			Assert::fail(
				"Cannot get edition from capabilities"
			);
		}

		$productName = $this->appConfigurationContext->getParameterValueFromXml(
			$this->appConfigurationContext->getCapabilitiesXml(__METHOD__),
			'core',
			'status@@@productname'
		);

		if (!\strlen($edition)) {
			Assert::fail(
				"Cannot get productname from capabilities"
			);
		}

		$jsonExpectedDecoded['edition'] = $edition;
		$jsonExpectedDecoded['productname'] = $productName;

		$runOccStatus = $this->runOcc(['status']);
		if ($runOccStatus === 0) {
			$output = \explode("- ", $this->lastStdOut);
			$version = \explode(": ", $output[3]);
			Assert::assertEquals(
				"version", $version[0],
				"Expected 'version' but got {$version[0]}"
			);
			$versionString = \explode(": ", $output[4]);
			Assert::assertEquals(
				"versionstring", $versionString[0],
				"Expected 'versionstring' but got {$versionString[0]}"
			);
			$jsonExpectedDecoded['version'] = \trim($version[1]);
			$jsonExpectedDecoded['versionstring'] = \trim($versionString[1]);
			$jsonExpectedEncoded = \json_encode($jsonExpectedDecoded);
			Assert::assertEquals(
				$jsonExpectedEncoded, $jsonRespondedEncoded,
				"The json responded: {$jsonRespondedEncoded} does not match with json expected: {$jsonExpectedEncoded}"
			);
		} else {
			Assert::fail(
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
	 * send request to list a server file
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function listTrashbinFileInServerRoot($path) {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/dir?dir={$path}"
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
		Assert::assertSame(
			200,
			$this->getResponse()->getStatusCode(),
			"Failed to read the file {$path}"
		);
		$fileContent = HttpRequestHelper::getResponseXml(
			$this->getResponse(),
			__METHOD__
		);
		$fileContent = (string) $fileContent->data->element->contentUrlEncoded;
		$fileContent = \urldecode($fileContent);

		Assert::assertSame(
			$content,
			$fileContent,
			"The content of the file does not match with '{$content}'"
		);
	}

	/**
	 * @Then /^the content in the response should match with the content of file "([^"]*)" in the server root$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function theContentInTheRespShouldMatchWithFileInTheServerRoot($path) {
		$content = $this->getResponse()->getBody()->getContents();
		$this->theFileWithContentShouldExistInTheServerRoot($path, $content);
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
		Assert::assertSame(
			404,
			$this->getResponse()->getStatusCode(),
			"The file '{$path}' exists in the server root but was not expected to exist"
		);
	}

	/**
	 * @Then the body of the response should be empty
	 *
	 * @return void
	 */
	public function theResponseBodyShouldBeEmpty() {
		Assert::assertEmpty(
			$this->getResponse()->getBody()->getContents(),
			"The response body was expected to be empty but got "
			. $this->getResponse()->getBody()->getContents()
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
	 * @param string|null $user
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
		$value, $user = null, $functions = [], $additionalSubstitutions = []
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
				"code" => "%dav_path%",
				"function" => [
					$this,
					"getDAVPathIncludingBasePath"
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
		if ($user !== null) {
			\array_push(
				$substitutions,
				[
					"code" => "%username%",
					"function" => [
						$this,
						"getActualUsername"
					],
					"parameter" => [$user]
				],
				[
					"code" => "%displayname%",
					"function" => [
						$this,
						"getDisplayNameForUser"
					],
					"parameter" => [$user]
				],
				[
					"code" => "%password%",
					"function" => [
						$this,
						"getPasswordForUser"
					],
					"parameter" => [$user]
				],
				[
					"code" => "%emailaddress%",
					"function" => [
						$this,
						"getEmailAddressForUser"
					],
					"parameter" => [$user]
				]
			);
		}

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
		$configkeyValue = (string) $this->getResponseXml($response, __METHOD__)->data[0]->element->value;
		Assert::assertEquals(
			$value, $configkeyValue,
			"The config key {$key} of app {$appID} was expected to have value {$value} but got {$configkeyValue}"
		);
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
	 * @param string $exceptionText text to put at the front of exception messages
	 *
	 * @return array
	 */
	public function getConfigKeyList($appID, $exceptionText = '') {
		if ($exceptionText === '') {
			$exceptionText = __METHOD__;
		}
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/app/{$appID}",
			[],
			$this->getOcsApiVersion()
		);
		return $this->parseConfigListFromResponseXml(
			$this->getResponseXml($response, $exceptionText)
		);
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
				return true;
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
			Assert::assertTrue(
				$this->checkConfigKeyInApp($key, $appID),
				"App {$appID} does not have config key {$key}"
			);
		} else {
			Assert::assertFalse(
				$this->checkConfigKeyInApp($key, $appID),
				"App {$appID} has config key {$key} but was not expected to"
			);
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
				Assert::assertTrue(
					$this->checkConfigKeyInApp($item['configkey'], $item['appid']),
					"{$item['appid']} was expected to have config key {$item['configkey']} but does not"
				);
			}
		} else {
			foreach ($table as $item) {
				Assert::assertFalse(
					$this->checkConfigKeyInApp($item['configkey'], $item['appid']),
					"Expected : {$item['appid']} should not have config key {$item['configkey']}"
				);
			}
		}
	}

	/**
	 * @param string $user
	 * @param string $asUser
	 * @param string $password
	 *
	 * @return void
	 */
	public function sendUserSyncRequest($user, $asUser = null, $password = null) {
		$user = $this->getActualUsername($user);
		$asUser = $asUser ?? $this->getAdminUsername();
		$password = $password ?? $this->getPasswordForUser($asUser);
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$asUser,
			$password,
			'POST',
			"/cloud/user-sync/{$user}",
			[],
			$this->getOcsApiVersion()
		);
		$this->setResponse($response);
	}

	/**
	 * @When the administrator tries to sync user :user using the OCS API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorTriesToSyncUserUsingTheOcsApi($user) {
		$this->sendUserSyncRequest($user);
	}

	/**
	 * @When user :asUser tries to sync user :user using the OCS API
	 *
	 * @param string $asUser
	 * @param string $user
	 *
	 * @return void
	 */
	public function userTriesToSyncUserUsingTheOcsApi($asUser, $user) {
		$asUser = $this->getActualUsername($asUser);
		$user = $this->getActualUsername($user);
		$this->sendUserSyncRequest($user, $asUser);
	}

	/**
	 * @When the administrator tries to sync user :user using password :password and the OCS API
	 *
	 * @param string $user
	 * @param password $password
	 *
	 * @return void
	 */
	public function theAdministratorTriesToSyncUserUsingPasswordAndTheOcsApi($user, $password) {
		$this->sendUserSyncRequest($user, null, $password);
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
		$this->authContext = new AuthContext();
		$this->appConfigurationContext = new AppConfigurationContext();
		$this->ocsContext->before($scope);
		$this->authContext->setUpScenario($scope);
		$this->appConfigurationContext->setUpScenario($scope);
		$environment->registerContext($this->ocsContext);
		$environment->registerContext($this->authContext);
		$environment->registerContext($this->appConfigurationContext);

		// Initialize SetupHelper
		SetupHelper::init(
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getBaseUrl(),
			$this->getOcPath()
		);

		if ($this->isTestingWithLdap()) {
			$suiteParameters = SetupHelper::getSuiteParameters($scope);
			$this->connectToLdap($suiteParameters);
		}
	}

	/**
	 * @BeforeScenario @local_storage
	 *
	 * @return void
	 */
	public function setupLocalStorageBefore() {
		$storageName = "local_storage";
		$result = SetupHelper::createLocalStorageMount($storageName);
		$storageId = $result['storageId'];
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
			$this->resetUserPasswordAsAdminUsingTheProvisioningApi(
				$this->getAdminUsername(),
				$this->originalAdminPassword
			);
			$this->adminPassword = $this->originalAdminPassword;
		}
	}

	/**
	 * deletes all created storages
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteAllStorages() {
		$allStorageIds = \array_keys($this->getStorageIds());
		foreach ($allStorageIds as $storageId) {
			SetupHelper::runOcc(
				[
					'files_external:delete',
					'-y',
					$storageId
				]
			);
		}
		$this->storageIds = [];
	}

	/**
	 * @AfterScenario @local_storage
	 *
	 * @return void
	 */
	public function removeLocalStorageAfter() {
		$this->removeExternalStorage();
		$this->removeTemporaryStorageOnServerAfter();
	}

	/**
	 * This will remove test created external mount points
	 *
	 * @AfterScenario @external_storage
	 *
	 * @return void
	 */
	public function removeExternalStorage() {
		if ($this->getStorageIds() !== null) {
			$this->deleteAllStorages();
		}
	}

	/**
	 * @BeforeScenario @temporary_storage_on_server
	 *
	 * @return void
	 */
	public function makeTemporaryStorageOnServerBefore() {
		$this->mkDirOnServer(
			TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER
		);
	}

	/**
	 * @AfterScenario @temporary_storage_on_server
	 *
	 * @return void
	 */
	public function removeTemporaryStorageOnServerAfter() {
		SetupHelper::rmDirOnServer(
			TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER
		);
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function removeCreatedFilesAfter() {
		foreach ($this->createdFiles as $file) {
			\unlink($file);
		}
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
		Assert::assertEquals("200", $response->getStatusCode());
	}

	/**
	 * After Scenario. clear file locks
	 *
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function clearFileLocks() {
		if (!OcisHelper::isTestingOnOcis()) {
			$this->authContext->deleteTokenAuthEnforcedAfterScenario();
			$this->clearFileLocksForServer($this->getBaseUrl());
			if ($this->remoteBaseUrl !== $this->localBaseUrl) {
				$this->clearFileLocksForServer($this->getRemoteBaseUrl());
			}
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
		if (OcisHelper::isTestingOnOcis()) {
			return;
		}
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
		foreach (['LOCAL', 'REMOTE'] as $server) {
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

	/**
	 * Verify that the tableNode contains expected headers
	 *
	 * @param TableNode $table
	 * @param array $requiredHeader
	 * @param array $allowedHeader
	 *
	 * @return void
	 * @throws Exception
	 */
	public function verifyTableNodeColumns($table, array $requiredHeader = [], array $allowedHeader = []) {
		if (!($table instanceof TableNode)) {
			throw new Exception("TableNode expected but got " . \gettype($table));
		}
		if (\count($table->getHash()) < 1) {
			throw new Exception("Table should have at least one row.");
		}
		$tableHeaders = $table->getRows()[0];
		$allowedHeader = \array_unique(\array_merge($requiredHeader, $allowedHeader));
		if ($requiredHeader != []) {
			foreach ($requiredHeader as $element) {
				if (!\in_array($element, $tableHeaders)) {
					throw new Exception("Row with header '$element' expected to be in table but not found");
				}
			}
		}

		if ($allowedHeader != []) {
			foreach ($tableHeaders as $element) {
				if (!\in_array($element, $allowedHeader)) {
					throw new Exception("Row with header '$element' is not allowed in table but found");
				}
			}
		}
	}

	/**
	 * Verify that the tableNode contains expected rows
	 *
	 * @param TableNode $table
	 * @param array $requiredRows
	 * @param array $allowedRows
	 *
	 * @return void
	 * @throws Exception
	 */
	public function verifyTableNodeRows($table, array $requiredRows = [], array $allowedRows = []) {
		if (!($table instanceof TableNode)) {
			throw new Exception("TableNode expected but got " . \gettype($table));
		}
		if (\count($table->getRows()) < 1) {
			throw new Exception("Table should have at least one row.");
		}
		$tableHeaders = $table->getColumn(0);
		$allowedRows = \array_unique(\array_merge($requiredRows, $allowedRows));
		if ($requiredRows != []) {
			foreach ($requiredRows as $element) {
				if (!\in_array($element, $tableHeaders)) {
					throw new Exception("Row with name '$element' expected to be in table but not found");
				}
			}
		}

		if ($allowedRows != []) {
			foreach ($tableHeaders as $element) {
				if (!\in_array($element, $allowedRows)) {
					throw new Exception("Row with name '$element' is not allowed in table but found");
				}
			}
		}
	}

	/**
	 * Verify that the tableNode contains expected number of columns
	 *
	 * @param TableNode $table
	 * @param int $count
	 *
	 * @return void
	 * @throws Exception
	 */
	public function verifyTableNodeColumnsCount($table, $count) {
		if (!($table instanceof TableNode)) {
			throw new Exception("TableNode expected but got " . \gettype($table));
		}
		if (\count($table->getRows()) < 1) {
			throw new Exception("Table should have at least one row.");
		}
		$rowCount = \count($table->getRows()[0]);
		if ($count !== $rowCount) {
			throw new Exception("Table expected to have $count rows but found $rowCount");
		}
	}

	/**
	 * @return void
	 */
	public function resetAppConfigs() {
		// Remember the current capabilities
		$this->appConfigurationContext->theAdministratorGetsCapabilitiesCheckResponse();
		$this->savedCapabilitiesXml[$this->getBaseUrl()] = $this->appConfigurationContext->getCapabilitiesXml(__METHOD__);
		// Set the required starting values for testing
		$this->setCapabilities($this->getCommonSharingConfigs());
	}

	/**
	 * @Given the administrator has set the last login date for user :user to :days days ago
	 * @When the administrator sets the last login date for user :user to :days days ago using the testing API
	 *
	 * @param string $user
	 * @param string $days
	 *
	 * @return void
	 */
	public function theAdministratorSetsTheLastLoginDateForUserToDaysAgoUsingTheTestingApi($user, $days) {
		$user = $this->getActualUsername($user);
		$adminUser = $this->getAdminUsername();
		$baseUrl = "/apps/testing/api/v1/lastlogindate/{$user}";
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$adminUser,
			$this->getAdminPassword(),
			'POST',
			$baseUrl,
			['days' => $days],
			$this->getOcsApiVersion()
		);
		$this->setResponse($response);
	}

	/**
	 * @param array $capabilitiesArray with each array entry containing keys for:
	 *                                 ['capabilitiesApp'] the "app" name in the capabilities response
	 *                                 ['capabilitiesParameter'] the parameter name in the capabilities response
	 *                                 ['testingApp'] the "app" name as understood by "testing"
	 *                                 ['testingParameter'] the parameter name as understood by "testing"
	 *                                 ['testingState'] boolean state the parameter must be set to for the test
	 *
	 * @return void
	 */
	public function setCapabilities($capabilitiesArray) {
		$savedCapabilitiesChanges = AppConfigHelper::setCapabilities(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$capabilitiesArray,
			$this->savedCapabilitiesXml[$this->getBaseUrl()]
		);

		if (!isset($this->savedCapabilitiesChanges[$this->getBaseUrl()])) {
			$this->savedCapabilitiesChanges[$this->getBaseUrl()] = [];
		}
		$this->savedCapabilitiesChanges[$this->getBaseUrl()] = \array_merge(
			$this->savedCapabilitiesChanges[$this->getBaseUrl()],
			$savedCapabilitiesChanges
		);
	}

	/**
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesParameter the parameter name in the
	 *                                      capabilities response
	 *
	 * @return boolean
	 */
	public function wasCapabilitySet($capabilitiesApp, $capabilitiesParameter) {
		return (bool) $this->getParameterValueFromXml(
			$this->savedCapabilitiesXml[$this->getBaseUrl()],
			$capabilitiesApp,
			$capabilitiesParameter
		);
	}

	/**
	 * After Scenario. restore trusted servers
	 *
	 * @AfterScenario @federation-app-required
	 *
	 * @return void
	 */
	public function restoreTrustedServersAfterScenario() {
		$this->restoreTrustedServers('LOCAL');
		if ($this->federatedServerExists()) {
			$this->restoreTrustedServers('REMOTE');
		}
	}

	/**
	 * Invokes an OCC command
	 *
	 * @param array $args of the occ command
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return int exit code
	 * @throws Exception if ocPath has not been set yet or the testing app is not enabled
	 */
	public function runOcc(
		$args = [],
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		return $this->runOccWithEnvVariables(
			$args,
			null,
			$adminUsername,
			$adminPassword,
			$baseUrl,
			$ocPath
		);
	}

	/**
	 * Invokes an OCC command with an optional array of environment variables
	 *
	 * @param array $args of the occ command
	 * @param array|null $envVariables to be defined before the command is run
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return int exit code
	 * @throws Exception if ocPath has not been set yet or the testing app is not enabled
	 */
	public function runOccWithEnvVariables(
		$args = [],
		$envVariables = null,
		$adminUsername = null,
		$adminPassword = null,
		$baseUrl = null,
		$ocPath = null
	) {
		$args[] = '--no-ansi';
		if ($baseUrl == null) {
			$baseUrl = $this->getBaseUrl();
		}
		$return = SetupHelper::runOcc(
			$args, $adminUsername, $adminPassword, $baseUrl, $ocPath, $envVariables
		);
		$this->lastStdOut = $return['stdOut'];
		$this->lastStdErr = $return['stdErr'];
		$this->lastCode = (int) $return['code'];
		return $this->lastCode;
	}

	/**
	 * Find exception texts in stderr
	 *
	 * @return array of exception texts
	 */
	public function findExceptions() {
		$exceptions = [];
		$captureNext = false;
		// the exception text usually appears after an "[Exception]" row
		foreach (\explode("\n", $this->lastStdErr) as $line) {
			if (\preg_match('/\[Exception\]/', $line)) {
				$captureNext = true;
				continue;
			}
			if ($captureNext) {
				$exceptions[] = \trim($line);
				$captureNext = false;
			}
		}

		return $exceptions;
	}

	/**
	 * remember the result of the last occ command
	 *
	 * @param string[] $result associated array with "code", "stdOut", "stdErr"

	 * @return void
	 */
	public function setResultOfOccCommand($result) {
		Assert::assertIsArray($result);
		Assert::assertArrayHasKey('code', $result);
		Assert::assertArrayHasKey('stdOut', $result);
		Assert::assertArrayHasKey('stdErr', $result);
		$this->lastCode = (int) $result['code'];
		$this->lastStdOut = $result['stdOut'];
		$this->lastStdErr = $result['stdErr'];
	}

	/**
	 * @param string $sourceUser
	 * @param string $targetUser
	 *
	 * @return string|null
	 * @throws Exception
	 */
	public function findLastTransferFolderForUser($sourceUser, $targetUser) {
		$foundPaths = [];
		$responseXmlObject = $this->listFolderAndReturnResponseXml(
			$targetUser, '', 1
		);
		$transferredElements = $responseXmlObject->xpath(
			"//d:response/d:href[contains(., '/transferred%20from%20$sourceUser%20on%')]"
		);
		foreach ($transferredElements as $transferredElement) {
			$path = \rawurldecode($transferredElement);
			$parts = \explode(' ', $path);
			// store timestamp as key
			$foundPaths[] = [
				'date' => \strtotime(\trim($parts[4], '/')),
				'path' => $path,
			];
		}
		if (empty($foundPaths)) {
			return null;
		}

		\usort(
			$foundPaths, function ($a, $b) {
				return $a['date'] - $b['date'];
			}
		);

		$davPath = \rtrim($this->getFullDavFilesPath($targetUser), '/');

		$foundPath = \end($foundPaths)['path'];
		// strip dav path
		return \substr($foundPath, \strlen($davPath) + 1);
	}

	/**
	 * After Scenario. restore trusted servers
	 *
	 * @param string $server 'LOCAL'/'REMOTE'
	 *
	 * @return void
	 */
	public function restoreTrustedServers($server) {
		$currentTrustedServers = $this->getTrustedServers($server);
		foreach (\array_diff($currentTrustedServers, $this->initialTrustedServer[$server]) as $url => $id) {
			$this->appConfigurationContext->theAdministratorDeletesUrlFromTrustedServersUsingTheTestingApi($url);
		}
		foreach (\array_diff($this->initialTrustedServer[$server], $currentTrustedServers) as $url => $id) {
			$this->appConfigurationContext->theAdministratorAddsUrlAsTrustedServerUsingTheTestingApi($url);
		}
	}

	/**
	 *
	 * @return void
	 */
	public function restoreParametersAfterScenario() {
		if (!OcisHelper::isTestingOnOcis()) {
			$this->authContext->deleteTokenAuthEnforcedAfterScenario();
			$user = $this->getCurrentUser();
			$this->setCurrentUser($this->getAdminUsername());
			$this->runFunctionOnEveryServer(
				function ($server) {
					$this->restoreParameters($server);
				}
			);
			$this->setCurrentUser($user);
		}
	}

	/**
	 * Get the array of trusted servers in format ["url" => "id"]
	 *
	 * @param string $server 'LOCAL'/'REMOTE'
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getTrustedServers($server = 'LOCAL') {
		if ($server === 'LOCAL') {
			$url = $this->getLocalBaseUrl();
		} elseif ($server === 'REMOTE') {
			$url = $this->getRemoteBaseUrl();
		} else {
			throw new \Exception(__METHOD__ . " Invalid value for server : $server");
		}
		$adminUser = $this->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$url,
			$adminUser,
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/trustedservers"
		);
		if ($response->getStatusCode() !== 200) {
			throw new Exception("Could not get the list of trusted servers" . $response->getBody()->getContents());
		}
		$responseXml = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
		$serverData = \json_decode(
			\json_encode(
				$responseXml->data
			),
			true
		);
		if (!\array_key_exists('element', $serverData)) {
			return [];
		} else {
			return isset($serverData['element'][0]) ?
				\array_column($serverData['element'], 'id', 'url') :
				\array_column($serverData, 'id', 'url');
		}
	}

	/**
	 * @param string $method http request method
	 * @param string $property property in form d:getetag
	 * 						   if property is `doesnotmatter` body is also set `doesnotmatter`
	 *
	 * @return string
	 */
	public function getBodyForOCSRequest($method, $property) {
		$body = null;
		if ($method === 'PROPFIND') {
			$body = '<?xml version="1.0"?><d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:prop><' . $property . '/></d:prop></d:propfind>';
		} elseif ($method === 'LOCK') {
			$body = "<?xml version='1.0' encoding='UTF-8'?><d:lockinfo xmlns:d='DAV:'> <d:lockscope><" . $property . " /></d:lockscope></d:lockinfo>";
		} elseif ($method === 'PROPPATCH') {
			if ($property === 'favorite') {
				$property = '<oc:favorite xmlns:oc="http://owncloud.org/ns">1</oc:favorite>';
			}
			$body = '<?xml version="1.0"?><d:propertyupdate xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns"><d:set><d:prop>' . $property . '</d:prop></d:set></d:propertyupdate>';
		}
		if ($property === '') {
			$body = '';
		}
		return $body;
	}

	/**
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function prepareParametersBeforeScenario() {
		if (!OcisHelper::isTestingOnOcis()) {
			$user = $this->getCurrentUser();
			$this->setCurrentUser($this->getAdminUsername());
			$previousServer = $this->getCurrentServer();
			foreach (['LOCAL', 'REMOTE'] as $server) {
				if (($server === 'LOCAL') || $this->federatedServerExists()) {
					$this->usingServer($server);
					$this->resetAppConfigs();
					$result = SetupHelper::runOcc(
						['config:list', '--private'], $this->getAdminUsername(),
						$this->getAdminPassword(), $this->getBaseUrl(), $this->getOcPath()
					);
					$this->savedConfigList[$server] = \json_decode($result['stdOut'], true);
				}
			}
			$this->usingServer($previousServer);
			$this->setCurrentUser($user);
		}
	}

	/**
	 * Before Scenario to Save trusted Servers
	 *
	 * @BeforeScenario @federation-app-required
	 *
	 * @return void
	 */
	public function setInitialTrustedServersBeforeScenario() {
		$this->initialTrustedServer = [
			'LOCAL' => $this->getTrustedServers(),
			'REMOTE' => $this->getTrustedServers('REMOTE')
		];
	}

	/**
	 * restore settings of the system and delete new settings that were created in the test runs
	 *
	 * @param string $server LOCAL|REMOTE
	 *
	 * @return void
	 *
	 * @throws \Exception
	 *
	 */
	private function restoreParameters($server) {
		if ($this->isTestingWithLdap()) {
			$this->resetOldLdapConfig();
		}
		if (\key_exists($this->getBaseUrl(), $this->savedCapabilitiesChanges)) {
			$this->appConfigurationContext->modifyAppConfigs($this->savedCapabilitiesChanges[$this->getBaseUrl()]);
		}
		$result = SetupHelper::runOcc(
			['config:list'], $this->getAdminUsername(),
			$this->getAdminPassword(), $this->getBaseUrl(),
			$this->getOcPath()
		);
		$currentConfigList = \json_decode($result['stdOut'], true);
		foreach ($currentConfigList['system'] as $configKey => $configValue) {
			if (!\array_key_exists(
				$configKey, $this->savedConfigList[$server]['system']
			)
			) {
				SetupHelper::runOcc(
					['config:system:delete', $configKey],
					$this->getAdminUsername(),
					$this->getAdminPassword(),
					$this->getBaseUrl(),
					$this->getOcPath()
				);
			}
		}
		foreach ($this->savedConfigList[$server]['system'] as $configKey => $configValue) {
			if (!\array_key_exists($configKey, $currentConfigList["system"])
				|| $currentConfigList["system"][$configKey] !== $this->savedConfigList[$server]['system'][$configKey]
			) {
				SetupHelper::runOcc(
					['config:system:set', "--type=json", "--value=" . \json_encode($configValue), $configKey],
					$this->getAdminUsername(),
					$this->getAdminPassword(),
					$this->getBaseUrl(),
					$this->getOcPath()
				);
			}
		}
		foreach ($currentConfigList['apps'] as $appName => $appSettings) {
			foreach ($appSettings as $configKey => $configValue) {
				//only check if the app was there in the original configuration
				if (\array_key_exists($appName, $this->savedConfigList[$server]['apps'])
					&& !\array_key_exists(
						$configKey, $this->savedConfigList[$server]['apps'][$appName]
					)
				) {
					SetupHelper::runOcc(
						['config:app:delete', $appName, $configKey],
						$this->getAdminUsername(),
						$this->getAdminPassword(),
						$this->getBaseUrl(),
						$this->getOcPath()
					);
				} elseif (\array_key_exists($appName, $this->savedConfigList[$server]['apps'])
					&& \array_key_exists($configKey, $this->savedConfigList[$server]['apps'][$appName])
					&& $this->savedConfigList[$server]['apps'][$appName][$configKey] !== $configValue
				) {
					// Do not accidentally disable apps here (perhaps too early)
					// That is done in Provisioning.php restoreAppEnabledDisabledState()
					if ($configKey !== "enabled") {
						SetupHelper::runOcc(
							[
								'config:app:set',
								$appName,
								$configKey,
								"--value=" . $this->savedConfigList[$server]['apps'][$appName][$configKey]
							],
							$this->getAdminUsername(),
							$this->getAdminPassword(),
							$this->getBaseUrl(),
							$this->getOcPath()
						);
					}
				}
			}
		}
	}
}
