<?php declare(strict_types=1);
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

use Behat\Behat\Hook\Scope\BeforeStepScope;
use GuzzleHttp\Exception\GuzzleException;
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
use Laminas\Ldap\Ldap;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * Features context.
 */
class FeatureContext extends BehatVariablesContext {
	use Provisioning;
	use Sharing;
	use WebDav;

	/**
	 * @var int Unix timestamp seconds
	 */
	private $scenarioStartTime;

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
	 * run-time values are maintained and referenced in the $createdUsers array.
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
	 * The suite name, feature name and scenario line number.
	 * Example: apiComments/createComments.feature:24
	 *
	 * @var string
	 */
	private $scenarioString = '';

	/**
	 * A full unique reference to the step that is currently executing.
	 * Example: apiComments/createComments.feature:24-28
	 * That is line 28, in the scenario at line 24, in the createComments feature
	 * in the apiComments suite.
	 *
	 * @var string
	 */
	private $stepLineRef = '';

	/**
	 * @var bool|null
	 */
	private $sendStepLineRef = null;

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
	 * @var string
	 */
	private $responseUser = "";

	/**
	 * @var string
	 */
	private $responseBodyContent = null;

	/**
	 * @var array
	 */
	private $userResponseBodyContents = [];

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
	 * @var GraphContext
	 */
	public $graphContext;

	/**
	 *
	 * @var AppConfigurationContext
	 */
	public $appConfigurationContext;

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
	 * The codes are stored as strings, even though they are numbers
	 *
	 * @var array last http status codes
	 */
	private $lastHttpStatusCodesArray = [];
	/**
	 * @var array last ocs status codes
	 */
	private $lastOCSStatusCodesArray = [];

	/**
	 * @var bool
	 *
	 * this is set true for db conversion tests
	 */
	private $dbConversion = false;

	/**
	 * @param bool $value
	 *
	 * @return void
	 */
	public function setDbConversionState(bool $value):void {
		$this->dbConversion = $value;
	}

	/**
	 * @return bool
	 */
	public function isRunningForDbConversion():bool {
		return $this->dbConversion;
	}

	/**
	 * @var string
	 */
	private $oCSelector;

	/**
	 * @param string $selector
	 *
	 * @return void
	 */
	public function setOCSelector(string $selector): void {
		$this->oCSelector = $selector;
	}

	/**
	 * @return string
	 */
	public function getOCSelector(): string {
		return $this->oCSelector;
	}

	/**
	 * @param string|null $httpStatusCode
	 *
	 * @return void
	 */
	public function pushToLastHttpStatusCodesArray(?string $httpStatusCode=null):void {
		if ($httpStatusCode !== null) {
			$this->lastHttpStatusCodesArray[] = $httpStatusCode;
		} elseif ($this->getResponse()->getStatusCode() !== null) {
			$this->lastHttpStatusCodesArray[] = (string)$this->getResponse()->getStatusCode();
		}
	}

	/**
	 * @return void
	 */
	public function emptyLastHTTPStatusCodesArray():void {
		$this->lastHttpStatusCodesArray = [];
	}

	/**
	 * @return void
	 */
	public function emptyLastOCSStatusCodesArray():void {
		$this->lastOCSStatusCodesArray = [];
	}

	/**
	 * @return void
	 */
	public function clearStatusCodeArrays():void {
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
	}

	/**
	 * @param string $ocsStatusCode
	 *
	 * @return void
	 */
	public function pushToLastOcsCodesArray(string $ocsStatusCode):void {
		\array_push($this->lastOCSStatusCodesArray, $ocsStatusCode);
	}

	/**
	 * Add HTTP and OCS status code of the last response to the respective status code array
	 *
	 * @return void
	 */
	public function pushToLastStatusCodesArrays():void {
		$this->pushToLastHttpStatusCodesArray(
			(string) $this->getResponse()->getStatusCode()
		);
		try {
			$this->pushToLastOcsCodesArray(
				$this->ocsContext->getOCSResponseStatusCode(
					$this->getResponse()
				)
			);
		} catch (Exception $exception) {
			// if response couldn't be converted into xml then push "notset" to last ocs status codes array
			$this->pushToLastOcsCodesArray("notset");
		}
	}

	/*
	 * @var Ldap
	 */
	private $ldap;
	/**
	 * @var string
	 */
	private $ldapBaseDN;
	/**
	 * @var string
	 */
	private $ldapHost;
	/**
	 * @var int
	 */
	private $ldapPort;
	/**
	 * @var string
	 */
	private $ldapAdminUser;
	/**
	 * @var string
	 */
	private $ldapAdminPassword = "";
	/**
	 * @var string
	 */
	private $ldapUsersOU;
	/**
	 * @var string
	 */
	private $ldapGroupsOU;
	/**
	 * @var string
	 */
	private $ldapGroupSchema;
	/**
	 * @var bool
	 */
	private $skipImportLdif;
	/**
	 * @var array
	 */
	private $toDeleteDNs = [];
	private $ldapCreatedUsers = [];
	private $ldapCreatedGroups = [];
	private $toDeleteLdapConfigs = [];
	private $oldLdapConfig = [];
	/**
	 * @var null|string
	 */
	private $previousStep = null;

	/**
	 * @return Ldap
	 */
	public function getLdap():Ldap {
		return $this->ldap;
	}

	/**
	 * @param string $configId
	 *
	 * @return void
	 */
	public function setToDeleteLdapConfigs(string $configId):void {
		$this->toDeleteLdapConfigs[] = $configId;
	}

	/**
	 * @return array
	 */
	public function getToDeleteLdapConfigs():array {
		return $this->toDeleteLdapConfigs;
	}

	/**
	 * @param string $setValue
	 *
	 * @return void
	 */
	public function setToDeleteDNs(string $setValue):void {
		$this->toDeleteDNs[] = $setValue;
	}

	/**
	 * @return string
	 */
	public function getLdapBaseDN():string {
		return $this->ldapBaseDN;
	}

	/**
	 * @return string
	 */
	public function getLdapUsersOU():string {
		return $this->ldapUsersOU;
	}

	/**
	 * @return string
	 */
	public function getLdapGroupsOU():string {
		return $this->ldapGroupsOU;
	}

	/**
	 * @return array
	 */
	public function getOldLdapConfig():array {
		return $this->oldLdapConfig;
	}

	/**
	 * @param string $configId
	 * @param string $configKey
	 * @param string $value
	 *
	 * @return void
	 */
	public function setOldLdapConfig(string $configId, string $configKey, string $value):void {
		$this->oldLdapConfig[$configId][$configKey] = $value;
	}

	/**
	 * @return string
	 */
	public function getLdapHost():string {
		return $this->ldapHost;
	}

	/**
	 * @return string
	 */
	public function getLdapHostWithoutScheme():string {
		return $this->removeSchemeFromUrl($this->ldapHost);
	}

	/**
	 * @return integer
	 */
	public function getLdapPort():int {
		return $this->ldapPort;
	}

	/**
	 * @return bool
	 */
	public function isTestingWithLdap():bool {
		return (\getenv("TEST_WITH_LDAP") === "true");
	}

	/**
	 * @return bool
	 */
	public function sendScenarioLineReferencesInXRequestId():?bool {
		if ($this->sendStepLineRef === null) {
			$this->sendStepLineRef = (\getenv("SEND_SCENARIO_LINE_REFERENCES") === "true");
		}
		return $this->sendStepLineRef;
	}

	/**
	 * @return bool
	 */
	public function isTestingReplacingUsernames():bool {
		return (\getenv('REPLACE_USERNAMES') === "true");
	}

	/**
	 * @return array|null
	 */
	public function usersToBeReplaced():?array {
		if (($this->userReplacements === null) && $this->isTestingReplacingUsernames()) {
			$this->userReplacements = \json_decode(
				\file_get_contents("./tests/acceptance/usernames.json"),
				true
			);
			// Loop through the user replacements, and make entries for the lower
			// and upper case forms. This allows for steps that specifically
			// want to test that usernames like "alice", "Alice" and "ALICE" all work.
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
		string $baseUrl,
		string $adminUsername,
		string $adminPassword,
		string $regularUserPassword,
		string $ocPath
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

		// PARALLEL DEPLOYMENT: ownCloud selector
		$this->oCSelector = "oc10";

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
		string $appTestCodeFullPath
	):string {
		// $appTestCodeFullPath is something like:
		// '/somedir/anotherdir/core/apps/guests/tests/acceptance/features/bootstrap'
		// and we want to know the 'apps/guests/tests/acceptance' part

		$path = \dirname($appTestCodeFullPath, 2);
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
	public function removeSchemeFromUrl(string $url):string {
		return \preg_replace(
			"(^https?://)",
			"",
			$url
		);
	}

	/**
	 * @return string
	 */
	public function getOcPath():string {
		return $this->ocPath;
	}

	/**
	 * @return CookieJar
	 */
	public function getCookieJar():CookieJar {
		return $this->cookieJar;
	}

	/**
	 * @return string
	 */
	public function getRequestToken():string {
		return $this->requestToken;
	}

	/**
	 * returns the base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getBaseUrl():string {
		return $this->baseUrl;
	}

	/**
	 * returns the path of the base URL
	 * e.g. owncloud-core/10 if the baseUrl is http://localhost/owncloud-core/10
	 * the path is without a slash at the end and without a slash at the beginning
	 *
	 * @return string
	 */
	public function getBasePath():string {
		$parsedUrl = \parse_url($this->getBaseUrl(), PHP_URL_PATH);
		// If the server-under-test is at the "top" of the domain then parse_url returns null.
		// For example, testing a server at http://localhost:8080 or http://example.com
		if ($parsedUrl === null) {
			$parsedUrl = '';
		}
		return \ltrim($parsedUrl, "/");
	}

	/**
	 * returns the OCS path
	 * the path is without a slash at the end and without a slash at the beginning
	 *
	 * @param string $ocsApiVersion
	 *
	 * @return string
	 */
	public function getOCSPath(string $ocsApiVersion):string {
		return \ltrim($this->getBasePath() . "/ocs/v$ocsApiVersion.php", "/");
	}

	/**
	 * returns the complete DAV path including the base path e.g. owncloud-core/remote.php/dav
	 *
	 * @return string
	 */
	public function getDAVPathIncludingBasePath():string {
		return \ltrim($this->getBasePath() . "/" . $this->getDavPath(), "/");
	}

	/**
	 * returns the base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getBaseUrlWithoutScheme():string {
		return $this->removeSchemeFromUrl($this->getBaseUrl());
	}

	/**
	 * returns the local base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getLocalBaseUrl():string {
		return $this->localBaseUrl;
	}

	/**
	 * returns the local base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getLocalBaseUrlWithoutScheme():string {
		return $this->removeSchemeFromUrl($this->getLocalBaseUrl());
	}

	/**
	 * returns the remote base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getRemoteBaseUrl():string {
		return $this->remoteBaseUrl;
	}

	/**
	 * returns the remote base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getRemoteBaseUrlWithoutScheme():string {
		return $this->removeSchemeFromUrl($this->getRemoteBaseUrl());
	}

	/**
	 * returns the reference to the current line being executed.
	 *
	 * @return string
	 */
	public function getStepLineRef():string {
		if (!$this->sendStepLineRef) {
			return '';
		}

		// If we are in BeforeScenario and possibly before any particular step
		// is being executed, then stepLineRef might be empty. In that case
		// return just the string for the scenario.
		if ($this->stepLineRef === '') {
			return $this->scenarioString;
		}
		return $this->stepLineRef;
	}

	/**
	 * get the exit status of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return int exit status code of the last occ command
	 */
	public function getExitStatusCodeOfOccCommand():int {
		return $this->lastCode;
	}

	/**
	 * get the normal output of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return string normal output of the last occ command
	 */
	public function getStdOutOfOccCommand():string {
		return $this->lastStdOut;
	}

	/**
	 * set the normal output of the last occ command
	 *
	 * @param string $stdOut
	 *
	 * @return void
	 */
	public function setStdOutOfOccCommand(string $stdOut): void {
		$this->lastStdOut = $stdOut;
	}

	/**
	 * get the error output of the last occ command
	 * app acceptance tests that have their own step code may need to process this
	 *
	 * @return string error output of the last occ command
	 */
	public function getStdErrOfOccCommand():string {
		return $this->lastStdErr;
	}

	/**
	 * returns the base URL without any sub-path e.g. http://localhost:8080
	 * of the base URL http://localhost:8080/owncloud
	 *
	 * @return string
	 */
	public function getBaseUrlWithoutPath():string {
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
	public function getOcsApiVersion():int {
		return $this->ocsApiVersion;
	}

	/**
	 * @return string|null
	 */
	public function getSourceIpAddress():?string {
		return $this->sourceIpAddress;
	}

	/**
	 * @return array|null
	 */
	public function getStorageIds():?array {
		return $this->storageIds;
	}

	/**
	 * @param string $storageName
	 *
	 * @return integer
	 * @throws Exception
	 */
	public function getStorageId(string $storageName):int {
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
	public function addStorageId(string $storageName, int $storageId):void {
		$this->storageIds[$storageId] = $storageName;
	}

	/**
	 * @param integer $storageId
	 *
	 * @return void
	 */
	public function popStorageId(int $storageId):void {
		unset($this->storageIds[$storageId]);
	}

	/**
	 * @param string $sourceIpAddress
	 *
	 * @return void
	 */
	public function setSourceIpAddress(string $sourceIpAddress):void {
		$this->sourceIpAddress = $sourceIpAddress;
	}

	/**
	 * @return array
	 */
	public function getGuzzleClientHeaders():array {
		return $this->guzzleClientHeaders;
	}

	/**
	 * @param array $guzzleClientHeaders ['X-Foo' => 'Bar']
	 *
	 * @return void
	 */
	public function setGuzzleClientHeaders(array $guzzleClientHeaders):void {
		$this->guzzleClientHeaders = $guzzleClientHeaders;
	}

	/**
	 * @param array $guzzleClientHeaders ['X-Foo' => 'Bar']
	 *
	 * @return void
	 */
	public function addGuzzleClientHeaders(array $guzzleClientHeaders):void {
		$this->guzzleClientHeaders = \array_merge(
			$this->guzzleClientHeaders,
			$guzzleClientHeaders
		);
	}

	/**
	 * @Given /^using OCS API version "([^"]*)"$/
	 *
	 * @param string $version
	 *
	 * @return void
	 */
	public function usingOcsApiVersion(string $version):void {
		$this->ocsApiVersion = (int) $version;
	}

	/**
	 * @Given /^as user "([^"]*)"$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function asUser(string $user):void {
		$this->currentUser = $this->getActualUsername($user);
	}

	/**
	 * @Given as the administrator
	 *
	 * @return void
	 */
	public function asTheAdministrator():void {
		$this->currentUser = $this->getAdminUsername();
	}

	/**
	 * @return string
	 */
	public function getCurrentUser():string {
		return $this->currentUser;
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 */
	public function setCurrentUser(string $user):void {
		$this->currentUser = $user;
	}

	/**
	 * returns $this->response
	 * some steps use that private var to store the response for other steps
	 *
	 * @return ResponseInterface
	 */
	public function getResponse():?ResponseInterface {
		return $this->response;
	}

	/**
	 * let this class remember a response that was received elsewhere
	 * so that steps in this class can be used to examine the response
	 *
	 * @param ResponseInterface|null $response
	 * @param string $username of the user that received the response
	 *
	 * @return void
	 */
	public function setResponse(
		?ResponseInterface $response,
		string $username = ""
	):void {
		$this->response = $response;
		//after a new response reset the response xml
		$this->responseXml = [];
		//after a new response reset the response xml object
		$this->responseXmlObject = null;
		// remember the user that received the response
		$this->responseUser = $username;
	}

	/**
	 * @return string
	 */
	public function getCurrentServer():string {
		return $this->currentServer;
	}

	/**
	 * @Given /^using server "(LOCAL|REMOTE)"$/
	 *
	 * @param string|null $server
	 *
	 * @return string Previous used server
	 */
	public function usingServer(?string $server):string {
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
	public function federatedServerExists():bool {
		return $this->federatedServerExists;
	}

	/**
	 * disable CSRF
	 *
	 * @return string the previous setting of csrf.disabled
	 * @throws Exception
	 */
	public function disableCSRF():string {
		return $this->setCSRFDotDisabled('true');
	}

	/**
	 * enable CSRF
	 *
	 * @return string the previous setting of csrf.disabled
	 * @throws Exception
	 */
	public function enableCSRF():string {
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
	public function setCSRFDotDisabled(string $setting):string {
		$oldCSRFSetting = SetupHelper::getSystemConfigValue(
			'csrf.disabled',
			$this->getStepLineRef()
		);

		if ($setting === "") {
			SetupHelper::deleteSystemConfig(
				'csrf.disabled',
				$this->getStepLineRef()
			);
		} elseif (($setting === 'true') || ($setting === 'false')) {
			SetupHelper::setSystemConfig(
				'csrf.disabled',
				$setting,
				$this->getStepLineRef(),
				'boolean'
			);
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
	 * @param ResponseInterface|null $response
	 * @param string|null $exceptionText text to put at the front of exception messages
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public function getResponseXml(?ResponseInterface $response = null, ?string $exceptionText = ''):SimpleXMLElement {
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
	 * @throws Exception
	 */
	public function getXMLKey1Key2Value(ResponseInterface $response, string $key1, string $key2):string {
		return (string) $this->getResponseXml($response, __METHOD__)->$key1->$key2;
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
	 * @throws Exception
	 */
	public function getXMLKey1Key2Key3Value(
		ResponseInterface $response,
		string $key1,
		string $key2,
		string $key3
	):string {
		return (string) $this->getResponseXml($response, __METHOD__)->$key1->$key2->$key3;
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
	 * @throws Exception
	 */
	public function getXMLKey1Key2Key3AttributeValue(
		ResponseInterface $response,
		string $key1,
		string $key2,
		string  $key3,
		string  $attribute
	):string {
		return (string) $this->getResponseXml($response, __METHOD__)->$key1->$key2->$key3->attributes()->$attribute;
	}

	/**
	 * This function is needed to use a vertical fashion in the gherkin tables.
	 *
	 * @param array $arrayOfArrays
	 *
	 * @return array
	 */
	public function simplifyArray(array $arrayOfArrays):array {
		$a = \array_map(
			function ($subArray) {
				return $subArray[0];
			},
			$arrayOfArrays
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
	public function userSendsHTTPMethodToUrl(string $user, string $verb, string $url):void {
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
	public function userHasSentHTTPMethodToUrl(string $user, string $verb, string $url):void {
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
	public function userSendsHTTPMethodToUrlWithPassword(string $user, string $verb, string $url, string $password):void {
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
	public function userHasSentHTTPMethodToUrlWithPassword(string $user, string $verb, string $url, string $password):void {
		$this->userSendsHTTPMethodToUrlWithPassword($user, $verb, $url, $password);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string|null $user
	 * @param string|null $verb
	 * @param string|null $url
	 * @param TableNode|null $body
	 * @param string|null $password
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function sendingToWithDirectUrl(?string $user, ?string $verb, ?string $url, ?TableNode $body, ?string $password = null):void {
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
			$fullUrl,
			$this->getStepLineRef(),
			$verb,
			$user,
			$password,
			$headers,
			$bodyRows,
			$config,
			$cookies
		);
	}

	/**
	 * @param string $url
	 *
	 * @return bool
	 */
	public function isAPublicLinkUrl(string $url):bool {
		if (OcisHelper::isTestingOnReva()) {
			$urlEnding = \ltrim($url, '/');
		} else {
			if (\substr($url, 0, 4) !== "http") {
				return false;
			}
			$urlEnding = \substr($url, \strlen($this->getBaseUrl() . '/'));
		}

		if (OcisHelper::isTestingOnOcisOrReva()) {
			$matchResult = \preg_match("%^(#/)?s/([a-zA-Z0-9]{15})$%", $urlEnding);
		} else {
			$matchResult = \preg_match("%^(index.php/)?s/([a-zA-Z0-9]{15})$%", $urlEnding);
		}

		// preg_match returns (int) 1 for a match, we want to return a boolean.
		if ($matchResult === 1) {
			$isPublicLinkUrl = true;
		} else {
			$isPublicLinkUrl = false;
		}
		return $isPublicLinkUrl;
	}

	/**
	 * Check that the status code in the saved response is the expected status
	 * code, or one of the expected status codes.
	 *
	 * @param int|int[]|string|string[] $expectedStatusCode
	 * @param string|null $message
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBe($expectedStatusCode, ?string $message = ""):void {
		$actualStatusCode = $this->response->getStatusCode();
		if (\is_array($expectedStatusCode)) {
			if ($message === "") {
				$message = "HTTP status code $actualStatusCode is not one of the expected values " . \implode(" or ", $expectedStatusCode);
			}

			Assert::assertContainsEquals(
				$actualStatusCode,
				$expectedStatusCode,
				$message
			);
		} else {
			if ($message === "") {
				$message = "HTTP status code $actualStatusCode is not the expected value $expectedStatusCode";
			}

			Assert::assertEquals(
				$expectedStatusCode,
				$actualStatusCode,
				$message
			);
		}
		$this->emptyLastHTTPStatusCodesArray();
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)"$/
	 *
	 * @param int|string $statusCode
	 *
	 * @return void
	 */
	public function thenTheHTTPStatusCodeShouldBe($statusCode):void {
		$this->theHTTPStatusCodeShouldBe($statusCode);
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)" or "([^"]*)"$/
	 *
	 * @param int|string $statusCode1
	 * @param int|string $statusCode2
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBeOr($statusCode1, $statusCode2):void {
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
		$minStatusCode,
		$maxStatusCode
	):void {
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
	public function theHTTPStatusCodeShouldBeSuccess():void {
		$this->theHTTPStatusCodeShouldBeBetween(200, 299);
	}

	/**
	 * @Then the HTTP status code should be failure
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBeFailure():void {
		$statusCode = $this->response->getStatusCode();
		$message = "The HTTP status code $statusCode is not greater than or equals to 400";
		Assert::assertGreaterThanOrEqual(
			400,
			$statusCode,
			$message
		);
	}

	/**
	 *
	 * @return bool
	 */
	public function theHTTPStatusCodeWasSuccess():bool {
		$statusCode = $this->response->getStatusCode();
		return (($statusCode >= 200) && ($statusCode <= 299));
	}

	/**
	 * Check the text in an HTTP responseXml message
	 *
	 * @Then /^the HTTP response message should be "([^"]*)"$/
	 *
	 * @param string $expectedMessage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theHttpResponseMessageShouldBe(string $expectedMessage):void {
		$actualMessage = $this->responseXml['value'][1]['value'];
		Assert::assertEquals(
			$expectedMessage,
			$actualMessage,
			"Expected $expectedMessage HTTP response message but got $actualMessage"
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
	public function theHTTPReasonPhraseShouldBe(string $reasonPhrase):void {
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
	):void {
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
	 * @throws Exception
	 */
	public function theXMLKey1Key2ValueShouldBe(string $key1, string $key2, string $idText):void {
		$actualValue = $this->getXMLKey1Key2Value($this->response, $key1, $key2);
		Assert::assertEquals(
			$idText,
			$actualValue,
			"Expected $idText but got "
			. $actualValue
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
	 * @throws Exception
	 */
	public function theXMLKey1Key2Key3ValueShouldBe(
		string $key1,
		string $key2,
		string $key3,
		string $idText
	) {
		$actualValue = $this->getXMLKey1Key2Key3Value($this->response, $key1, $key2, $key3);
		Assert::assertEquals(
			$idText,
			$actualValue,
			"Expected $idText but got "
			. $actualValue
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
	 * @throws Exception
	 */
	public function theXMLKey1Key2AttributeValueShouldBe(
		string $key1,
		string $key2,
		string $key3,
		string $attribute
	):void {
		$value = $this->getXMLKey1Key2Key3AttributeValue(
			$this->response,
			$key1,
			$key2,
			$key3,
			$attribute
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
	public function extractRequestTokenFromResponse(ResponseInterface $response):void {
		$this->requestToken = \substr(
			\preg_replace(
				'/(.*)data-requesttoken="(.*)">(.*)/sm',
				'\2',
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
	public function userHasLoggedInToAWebStyleSessionUsingTheAPI(string $user):void {
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
			$loginUrl,
			$this->getStepLineRef(),
			null,
			null,
			$this->guzzleClientHeaders,
			null,
			$config,
			$this->cookieJar
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
			$loginUrl,
			$this->getStepLineRef(),
			null,
			null,
			$this->guzzleClientHeaders,
			$body,
			$config,
			$this->cookieJar
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
	public function sendingAToWithRequesttoken(
		string $method,
		string $url,
		string $user
	):void {
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
			$url,
			$this->getStepLineRef(),
			$method,
			null,
			null,
			$headers,
			null,
			$config,
			$this->cookieJar
		);
	}

	/**
	 * @Given the client has sent a :method to :url of user :user with requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 * @param string $user
	 *
	 * @return void
	 */
	public function theClientHasSentAToWithRequesttoken(
		string $method,
		string $url,
		string $user
	):void {
		$this->sendingAToWithRequesttoken($method, $url, $user);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the client sends a :method to :url of user :user without requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 * @param string|null $user
	 *
	 * @return void
	 */
	public function sendingAToWithoutRequesttoken(string $method, string $url, ?string $user = null):void {
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
			$url,
			$this->getStepLineRef(),
			$method,
			null,
			null,
			$this->guzzleClientHeaders,
			null,
			$config,
			$this->cookieJar
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
	public function theClientHasSentAToWithoutRequesttoken(string $method, string $url):void {
		$this->sendingAToWithoutRequesttoken($method, $url);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $path
	 * @param string $filename
	 *
	 * @return void
	 */
	public static function removeFile(string $path, string $filename):void {
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
	public function createLocalFileOfSpecificSize(string $name, string $size, string $endData = 'a'):void {
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
	public function mkDirOnServer(string $dirPathFromServerRoot):void {
		SetupHelper::mkDirOnServer(
			$dirPathFromServerRoot,
			$this->getStepLineRef(),
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
		string $filePathFromServerRoot,
		string $content
	):void {
		SetupHelper::createFileOnServer(
			$filePathFromServerRoot,
			$content,
			$this->getStepLineRef(),
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
	public function fileHasBeenCreatedInLocalStorageWithText(string $filename, string $text):void {
		$this->createFileOnServerWithContent(
			LOCAL_STORAGE_DIR_ON_REMOTE_SERVER . "/$filename",
			$text
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
	public function fileHasBeenDeletedInLocalStorage(string $filename):void {
		SetupHelper::deleteFileOnServer(
			LOCAL_STORAGE_DIR_ON_REMOTE_SERVER . "/$filename",
			$this->getStepLineRef(),
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword()
		);
	}

	/**
	 * @param string $user
	 *
	 * @return boolean
	 */
	public function isAdminUsername(string $user):bool {
		return ($user === $this->getAdminUsername());
	}

	/**
	 * @return string
	 */
	public function getAdminUsername():string {
		return $this->adminUsername;
	}

	/**
	 * @return string
	 */
	public function getAdminPassword():string {
		return $this->adminPassword;
	}

	/**
	 * @param string $password
	 *
	 * @return void
	 */
	public function rememberNewAdminPassword(string $password):void {
		$this->adminPassword = $password;
	}

	/**
	 * @param string|null $userName
	 *
	 * @return string
	 */
	public function getPasswordForUser(?string $userName):string {
		$userNameNormalized = $this->normalizeUsername($userName);
		$username = $this->getActualUsername($userNameNormalized);
		if ($username === $this->getAdminUsername()) {
			return $this->getAdminPassword();
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
			return $this->regularUserPassword;
		} elseif ($username === 'alice') {
			return $this->regularUserPassword;
		} elseif ($username === 'brian') {
			return $this->alt1UserPassword;
		} elseif ($username === 'carol') {
			return $this->alt2UserPassword;
		} elseif ($username === 'david') {
			return $this->alt3UserPassword;
		} elseif ($username === 'emily') {
			return $this->alt4UserPassword;
		} elseif ($username === 'usergrp') {
			return $this->regularUserPassword;
		} elseif ($username === 'sharee1') {
			return $this->regularUserPassword;
		}

		// The user has not been created yet and is not one of the pre-known
		// users. So let the caller have the default password.
		return (string) $this->getActualPassword($this->regularUserPassword);
	}

	/**
	 * Get the display name of the user.
	 *
	 * For users that have already been created, return their display name.
	 * For special known usernames, return the display name that is also used by LDAP tests.
	 * For other users, return null. They will not be assigned any particular
	 * display name by this function.
	 *
	 * @param string $userName
	 *
	 * @return string|null
	 */
	public function getDisplayNameForUser(string $userName):?string {
		$userNameNormalized = $this->normalizeUsername($userName);
		$username = $this->getActualUsername($userNameNormalized);
		if (\array_key_exists($username, $this->createdUsers)) {
			if (isset($this->createdUsers[$username]['displayname'])) {
				return (string) $this->createdUsers[$username]['displayname'];
			}
			return $userName;
		}
		if (\array_key_exists($username, $this->createdRemoteUsers)) {
			if (isset($this->createdRemoteUsers[$username]['displayname'])) {
				return (string) $this->createdRemoteUsers[$username]['displayname'];
			}
			return $userName;
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
		} elseif ($username === 'sharee2') {
			return 'Sharee Two';
		} elseif (\in_array($username, ["grp1", "***redacted***"])) {
			return $username;
		}
		return null;
	}

	/**
	 * Get the email address of the user.
	 *
	 * For users that have already been created, return their email address.
	 * For special known usernames, return the email address that is also used by LDAP tests.
	 * For other users, return null. They will not be assigned any particular
	 * email address by this function.
	 *
	 * @param string $userName
	 *
	 * @return string|null
	 */
	public function getEmailAddressForUser(string $userName):?string {
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
	 * @throws JsonException
	 */
	public function getActualUsername(?string $functionalUsername):?string {
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
			return $this->getAdminUsername();
		}
		return $functionalUsername;
	}

	/**
	 * @param string|null $functionalPassword
	 *
	 * @return string|null
	 */
	public function getActualPassword(?string $functionalPassword):?string {
		if ($functionalPassword === "%regular%") {
			return $this->regularUserPassword;
		} elseif ($functionalPassword === "%alt1%") {
			return $this->alt1UserPassword;
		} elseif ($functionalPassword === "%alt2%") {
			return $this->alt2UserPassword;
		} elseif ($functionalPassword === "%alt3%") {
			return $this->alt3UserPassword;
		} elseif ($functionalPassword === "%alt4%") {
			return $this->alt4UserPassword;
		} elseif ($functionalPassword === "%subadmin%") {
			return $this->subAdminPassword;
		} elseif ($functionalPassword === "%admin%") {
			return $this->getAdminPassword();
		} elseif ($functionalPassword === "%altadmin%") {
			return $this->alternateAdminPassword;
		} elseif ($functionalPassword === "%public%") {
			return $this->publicLinkSharePassword;
		} else {
			return $functionalPassword;
		}
	}

	/**
	 * @param string $userName
	 *
	 * @return array
	 */
	public function getAuthOptionForUser(string $userName):array {
		return [$userName, $this->getPasswordForUser($userName)];
	}

	/**
	 * @return array
	 */
	public function getAuthOptionForAdmin():array {
		return $this->getAuthOptionForUser($this->getAdminUsername());
	}

	/**
	 * @When the administrator requests status.php
	 *
	 * @return void
	 */
	public function theAdministratorRequestsStatusPhp():void {
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
	public function theAdministratorCreatesFileUsingTheTestingApi(string $path, string $content):void {
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
	public function theAdministratorHasCreatedFileUsingTheTestingApi(string $path, string $content):void {
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
	 * @throws Exception
	 */
	public function theAdministratorCreatesFileWithContentInLocalStorageUsingTheTestingApi(
		string $path,
		string $content,
		string $mountPoint
	):void {
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
	 * @throws Exception
	 */
	public function theAdministratorHasCreatedAFileInTemporaryStorageWithLastExportedContent(
		string $path
	):void {
		$commandOutput = $this->getStdOutOfOccCommand();
		$this->copyContentToFileInTemporaryStorageOnSystemUnderTest($path, $commandOutput);
		$this->theFileWithContentShouldExistInTheServerRoot(
			TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$path",
			$commandOutput
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
	 * @throws Exception
	 */
	public function theAdministratorHasCreatedFileWithContentInLocalStorageUsingTheTestingApi(
		string $path,
		string $content,
		string $mountPoint
	):void {
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
	 * @throws Exception
	 */
	public function theAdministratorHasCopiedFileToTemporaryStorageOnTheSystemUnderTest(
		string $localPath,
		string $destination
	):void {
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
		string $destination,
		string $content
	):ResponseInterface {
		$this->mkDirOnServer(TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER);

		return OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'POST',
			"/apps/testing/api/v1/file",
			$this->getStepLineRef(),
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
	public function theAdministratorDeletesFileInLocalStorageUsingTheTestingApi(string $path):void {
		$user = $this->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getAdminPassword(),
			'DELETE',
			"/apps/testing/api/v1/file",
			$this->getStepLineRef(),
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
	public function aFileWithSizeAndNameHasBeenCreatedLocally(int $size, string $name):void {
		$fullPath = UploadHelper::getUploadFilesDir($name);
		if (\file_exists($fullPath)) {
			throw new InvalidArgumentException(
				__METHOD__ . " could not create '$fullPath' file exists"
			);
		}
		UploadHelper::createFileSpecificSize($fullPath, $size);
		$this->createdFiles[] = $fullPath;
	}

	/**
	 *
	 * @return ResponseInterface
	 */
	public function getStatusPhp():ResponseInterface {
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
			$fullUrl,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->guzzleClientHeaders,
			null,
			$config
		);
	}

	/**
	 * @Then the json responded should match with
	 *
	 * @param PyStringNode $jsonExpected
	 *
	 * @return void
	 */
	public function jsonRespondedShouldMatch(PyStringNode $jsonExpected):void {
		$jsonExpectedEncoded = \json_encode($jsonExpected->getRaw());
		$jsonRespondedEncoded = \json_encode((string) $this->response->getBody());
		Assert::assertEquals(
			$jsonExpectedEncoded,
			$jsonRespondedEncoded,
			"The json responded: $jsonRespondedEncoded does not match with json expected: $jsonExpectedEncoded"
		);
	}

	/**
	 * @Then the status.php response should include
	 *
	 * @param PyStringNode $jsonExpected
	 *
	 * @return void
	 * @throws Exception
	 */
	public function statusPhpRespondedShouldMatch(PyStringNode $jsonExpected):void {
		$jsonExpectedDecoded = \json_decode($jsonExpected->getRaw(), true);
		$jsonRespondedDecoded = $this->getJsonDecodedResponse();

		$this->appConfigurationContext->theAdministratorGetsCapabilitiesCheckResponse();
		$edition = $this->appConfigurationContext->getParameterValueFromXml(
			$this->appConfigurationContext->getCapabilitiesXml(__METHOD__),
			'core',
			'status@@@edition'
		);

		if (!\strlen($edition)) {
			Assert::fail(
				"Cannot get edition from core capabilities"
			);
		}

		$product = $this->appConfigurationContext->getParameterValueFromXml(
			$this->appConfigurationContext->getCapabilitiesXml(__METHOD__),
			'core',
			'status@@@product'
		);
		if (!\strlen($product)) {
			Assert::fail(
				"Cannot get product from core capabilities"
			);
		}

		$productName = $this->appConfigurationContext->getParameterValueFromXml(
			$this->appConfigurationContext->getCapabilitiesXml(__METHOD__),
			'core',
			'status@@@productname'
		);

		if (!\strlen($productName)) {
			Assert::fail(
				"Cannot get productname from core capabilities"
			);
		}

		$jsonExpectedDecoded['edition'] = $edition;
		$jsonExpectedDecoded['product'] = $product;
		$jsonExpectedDecoded['productname'] = $productName;

		if (OcisHelper::isTestingOnOc10()) {
			// On oC10 get the expected version values by parsing the output of "occ status"
			$runOccStatus = $this->runOcc(['status']);
			if ($runOccStatus === 0) {
				$output = \explode("- ", $this->lastStdOut);
				$version = \explode(": ", $output[3]);
				Assert::assertEquals(
					"version",
					$version[0],
					"Expected 'version' but got $version[0]"
				);
				$versionString = \explode(": ", $output[4]);
				Assert::assertEquals(
					"versionstring",
					$versionString[0],
					"Expected 'versionstring' but got $versionString[0]"
				);
				$jsonExpectedDecoded['version'] = \trim($version[1]);
				$jsonExpectedDecoded['versionstring'] = \trim($versionString[1]);
			} else {
				Assert::fail(
					"Cannot get version variables from occ - status $runOccStatus"
				);
			}
		} else {
			// We are on oCIS or reva or some other implementation. We cannot do "occ status".
			// So get the expected version values by looking in the capabilities response.
			$version = $this->appConfigurationContext->getParameterValueFromXml(
				$this->appConfigurationContext->getCapabilitiesXml(__METHOD__),
				'core',
				'status@@@version'
			);

			if (!\strlen($version)) {
				Assert::fail(
					"Cannot get version from core capabilities"
				);
			}

			$versionString = $this->appConfigurationContext->getParameterValueFromXml(
				$this->appConfigurationContext->getCapabilitiesXml(__METHOD__),
				'core',
				'status@@@versionstring'
			);

			if (!\strlen($versionString)) {
				Assert::fail(
					"Cannot get versionstring from core capabilities"
				);
			}

			$jsonExpectedDecoded['version'] = $version;
			$jsonExpectedDecoded['versionstring'] = $versionString;
		}
		$errorMessage = "";
		$errorFound = false;
		foreach ($jsonExpectedDecoded as $key => $expectedValue) {
			if (\array_key_exists($key, $jsonRespondedDecoded)) {
				$actualValue = $jsonRespondedDecoded[$key];
				if ($actualValue !== $expectedValue) {
					$errorMessage .= "$key expected value was $expectedValue but actual value was $actualValue\n";
					$errorFound = true;
				}
			} else {
				$errorMessage .= "$key was not found in the status response\n";
				$errorFound = true;
			}
		}
		Assert::assertFalse($errorFound, $errorMessage);
		// We have checked that the status.php response has data that matches up with
		// data found in the capabilities response and/or the "occ status" command output.
		// But the output might be reported wrongly in all of these in the same way.
		// So check that the values also seem "reasonable".
		$version = $jsonExpectedDecoded['version'];
		$versionString = $jsonExpectedDecoded['versionstring'];
		Assert::assertMatchesRegularExpression(
			"/^\d+\.\d+\.\d+\.\d+$/",
			$version,
			"version should be in a form like 10.9.8.1 but is $version"
		);
		if (\preg_match("/^(\d+\.\d+\.\d+)\.\d+(-[0-9A-Za-z-]+)?(\+[0-9A-Za-z-]+)?$/", $version, $matches)) {
			// We should have matched something like 10.9.8 - the first 3 numbers in the version.
			// Ignore pre-releases and meta information
			Assert::assertArrayHasKey(
				1,
				$matches,
				"version $version could not match the pattern Major.Minor.Patch"
			);
			$majorMinorPatchVersion = $matches[1];
		} else {
			Assert::fail("version '$version' does not start in a form like 10.9.8");
		}
		Assert::assertStringStartsWith(
			$majorMinorPatchVersion,
			$versionString,
			"versionstring should start with $majorMinorPatchVersion but is $versionString"
		);
	}

	/**
	 * send request to read a server file
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function readFileInServerRoot(string $path):void {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/file?file=$path",
			$this->getStepLineRef()
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
	public function listTrashbinFileInServerRoot(string $path):void {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/dir?dir=$path",
			$this->getStepLineRef()
		);
		$this->setResponse($response);
	}

	/**
	 * move file in server root
	 *
	 * @param string $path
	 * @param string $target
	 *
	 * @return void
	 */
	public function moveFileInServerRoot(string $path, string $target):void {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			"MOVE",
			"/apps/testing/api/v1/file",
			$this->getStepLineRef(),
			[
				'source' => $path,
				'target' => $target
			]
		);

		$this->setResponse($response);
	}

	/**
	 * @When the local storage mount for :mount is renamed to :target
	 *
	 * @param string $mount
	 * @param string $target
	 *
	 * @return void
	 */
	public function theLocalStorageMountForIsRenamedTo(string $mount, string $target):void {
		$mountPath = TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/" . ltrim($mount, '/');
		$targetPath = TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/" . ltrim($target, '/');

		$this->moveFileInServerRoot($mountPath, $targetPath);
	}

	/**
	 * @Then the file :path with content :content should exist in the server root
	 *
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFileWithContentShouldExistInTheServerRoot(string $path, string $content):void {
		$this->readFileInServerRoot($path);
		Assert::assertSame(
			200,
			$this->getResponse()->getStatusCode(),
			"Failed to read the file $path"
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
			"The content of the file does not match with '$content'"
		);
	}

	/**
	 * @Then /^the content in the response should match with the content of file "([^"]*)" in the server root$/
	 *
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theContentInTheRespShouldMatchWithFileInTheServerRoot(string $path):void {
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
	public function theFileShouldNotExistInTheServerRoot(string $path):void {
		$this->readFileInServerRoot($path);
		Assert::assertSame(
			404,
			$this->getResponse()->getStatusCode(),
			"The file '$path' exists in the server root but was not expected to exist"
		);
	}

	/**
	 * @Then the body of the response should be empty
	 *
	 * @return void
	 */
	public function theResponseBodyShouldBeEmpty():void {
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
	public function getJsonDecodedResponse(?ResponseInterface $response = null):array {
		if ($response === null) {
			$response = $this->getResponse();
		}
		return \json_decode(
			(string) $response->getBody(),
			true
		);
	}

	/**
	 *
	 * @return array
	 */
	public function getJsonDecodedStatusPhp():array {
		return $this->getJsonDecodedResponse(
			$this->getStatusPhp()
		);
	}

	/**
	 * @return string
	 */
	public function getEditionFromStatus():string {
		$decodedResponse = $this->getJsonDecodedStatusPhp();
		if (isset($decodedResponse['edition'])) {
			return $decodedResponse['edition'];
		}
		return '';
	}

	/**
	 * @return string|null
	 */
	public function getProductNameFromStatus():?string {
		$decodedResponse = $this->getJsonDecodedStatusPhp();
		if (isset($decodedResponse['productname'])) {
			return $decodedResponse['productname'];
		}
		return '';
	}

	/**
	 * @return string|null
	 */
	public function getVersionFromStatus():?string {
		$decodedResponse = $this->getJsonDecodedStatusPhp();
		if (isset($decodedResponse['version'])) {
			return $decodedResponse['version'];
		}
		return '';
	}

	/**
	 * @return string|null
	 */
	public function getVersionStringFromStatus():?string {
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
	public function getCommentUrlRegExp():string {
		$basePath = \ltrim($this->getBasePath() . "/", "/");
		return "/{$basePath}remote.php/dav/comments/files/([0-9]+)";
	}

	/**
	 * substitutes codes like %base_url% with the value
	 * if the given value does not have anything to be substituted
	 * then it is returned unmodified
	 *
	 * @param string|null $value
	 * @param string|null $user
	 * @param array|null $functions associative array of functions and parameters to be
	 *                         		called on every replacement string before the
	 *                        		replacement
	 *                        		function name has to be the key and the parameters an
	 *                         		own array
	 *                         		the replacement itself will be used as first parameter
	 *                         		e.g. substituteInLineCodes($value, ['preg_quote' => ['/']])
	 * @param array|null $additionalSubstitutions
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
		?string $value,
		?string $user = null,
		?array $functions = [],
		?array$additionalSubstitutions = []
	):?string {
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
				"parameter" => ["1"]
			],
			[
				"code" => "%ocs_path_v2%",
				"function" => [
					$this,
					"getOCSPath"
				],
				"parameter" => ["2"]
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
			],
			[
				"code" => "%last_share_id%",
				"function" => [
					$this,
					"getLastShareId"
				],
				"parameter" => []
			],
			[
				"code" => "%last_public_share_token%",
				"function" => [
					$this,
					"getLastPublicShareToken"
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
				],
				[
					"code" => "%spaceid%",
					"function" => [
						$this,
						"getPersonalSpaceIdForUser",
					],
					"parameter" => [$user, true]
				]
			);
		}

		if (!empty($additionalSubstitutions)) {
			$substitutions = \array_merge($substitutions, $additionalSubstitutions);
		}

		foreach ($substitutions as $substitution) {
			if (strpos($value, $substitution['code']) === false) {
				continue;
			}

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
	 * returns personal space id for user if the test is using the spaces dav path
	 * or if alwaysDoIt is set to true,
	 * otherwise it returns null.
	 *
	 * @param string $user
	 * @param bool $alwaysDoIt default false. Set to true
	 *
	 * @return string|null
	 * @throws GuzzleException
	 */
	public function getPersonalSpaceIdForUser(string $user, bool $alwaysDoIt = false): ?string {
		if ($alwaysDoIt || ($this->getDavPathVersion() === WebDavHelper::DAV_VERSION_SPACES)) {
			return WebDavHelper::getPersonalSpaceIdForUser(
				$this->getBaseUrl(),
				$user,
				$this->getPasswordForUser($user),
				$this->getStepLineRef()
			);
		}
		return null;
	}

	/**
	 * @return string
	 */
	public function temporaryStorageSubfolderName():string {
		return "work_tmp";
	}

	/**
	 * @return string
	 */
	public function acceptanceTestsDirLocation():string {
		return \dirname(__FILE__) . "/../../";
	}

	/**
	 * @return string
	 */
	public function workStorageDirLocation():string {
		return $this->acceptanceTestsDirLocation() . $this->temporaryStorageSubfolderName() . "/";
	}

	/**
	 * Get the path of the ownCloud server root directory
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getServerRoot():string {
		if ($this->localServerRoot === null) {
			$this->localServerRoot = SetupHelper::getServerRoot(
				$this->getBaseUrl(),
				$this->getAdminUsername(),
				$this->getAdminPassword(),
				$this->getStepLineRef()
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
	 * @throws Exception
	 */
	public function theConfigKeyOfAppShouldHaveValue(string $key, string $appID, string $value):void {
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/app/$appID/$key",
			$this->getStepLineRef(),
			[],
			$this->getOcsApiVersion()
		);
		$configkeyValue = (string) $this->getResponseXml($response, __METHOD__)->data[0]->element->value;
		Assert::assertEquals(
			$value,
			$configkeyValue,
			"The config key $key of app $appID was expected to have value $value but got $configkeyValue"
		);
	}

	/**
	 * Parse list of config keys from the given XML response
	 *
	 * @param SimpleXMLElement $responseXml
	 *
	 * @return array
	 */
	public function parseConfigListFromResponseXml(SimpleXMLElement $responseXml):array {
		$configkeyData = \json_decode(\json_encode($responseXml->data), true);
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
	 * @throws Exception
	 */
	public function getConfigKeyList(string $appID, string $exceptionText = ''):array {
		if ($exceptionText === '') {
			$exceptionText = __METHOD__;
		}
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/app/$appID",
			$this->getStepLineRef(),
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
	 * @throws Exception
	 */
	public function checkConfigKeyInApp(string $key, string $appID):bool {
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
	 * @throws Exception
	 */
	public function appShouldHaveConfigKey(string $appID, string $shouldOrNot, string $key):void {
		$appID = \trim($appID, $appID[0]);
		$key = \trim($key, $key[0]);

		$should = ($shouldOrNot !== "not");

		if ($should) {
			Assert::assertTrue(
				$this->checkConfigKeyInApp($key, $appID),
				"App $appID does not have config key $key"
			);
		} else {
			Assert::assertFalse(
				$this->checkConfigKeyInApp($key, $appID),
				"App $appID has config key $key but was not expected to"
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
	 * @throws Exception
	 */
	public function followingConfigKeysShouldExist(string $shouldOrNot, TableNode $table):void {
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
	 * @param string|null $asUser
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function sendUserSyncRequest(string $user, ?string $asUser = null, ?string $password = null):void {
		$user = $this->getActualUsername($user);
		$asUser = $asUser ?? $this->getAdminUsername();
		$password = $password ?? $this->getPasswordForUser($asUser);
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$asUser,
			$password,
			'POST',
			"/cloud/user-sync/$user",
			$this->getStepLineRef(),
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
	public function theAdministratorTriesToSyncUserUsingTheOcsApi(string $user):void {
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
	public function userTriesToSyncUserUsingTheOcsApi(string $asUser, string $user):void {
		$asUser = $this->getActualUsername($asUser);
		$user = $this->getActualUsername($user);
		$this->sendUserSyncRequest($user, $asUser);
	}

	/**
	 * @When the administrator tries to sync user :user using password :password and the OCS API
	 *
	 * @param string|null $user
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function theAdministratorTriesToSyncUserUsingPasswordAndTheOcsApi(?string $user, ?string $password):void {
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
	 * @throws Exception
	 */
	public function before(BeforeScenarioScope $scope):void {
		$this->scenarioStartTime = \time();
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
		$scenarioLine = $scope->getScenario()->getLine();
		$featureFile = $scope->getFeature()->getFile();
		$suiteName = $scope->getSuite()->getName();
		$featureFileName = \basename($featureFile);

		if ($this->sendScenarioLineReferencesInXRequestId()) {
			$this->scenarioString = $suiteName . '/' . $featureFileName . ':' . $scenarioLine;
		} else {
			$this->scenarioString = '';
		}

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

		if (OcisHelper::isTestingWithGraphApi()) {
			$this->graphContext = new GraphContext();
			$this->graphContext->before($scope);
			$environment->registerContext($this->graphContext);
		}
	}

	/**
	 * This will run before EVERY step.
	 *
	 * @BeforeStep
	 *
	 * @param BeforeStepScope $scope
	 *
	 * @return void
	 */
	public function beforeEachStep(BeforeStepScope $scope):void {
		if ($this->sendScenarioLineReferencesInXRequestId()) {
			$this->stepLineRef = $this->scenarioString . '-' . $scope->getStep()->getLine();
		} else {
			$this->stepLineRef = '';
		}
	}

	/**
	 * Adds the necessary oC selector cookie to HTTP requests
	 *
	 * @BeforeStep
	 *
	 * @param BeforeStepScope $scope
	 *
	 * @return void
	 */
	public function beforeEachStepChangeOCSelector(BeforeStepScope $scope): void {
		if (OcisHelper::isTestingParallelDeployment()) {
			$step = $scope->getStep()->getKeywordType();
			if ($step !== $this->previousStep) {
				$this->previousStep = $step;
				$selector = OcisHelper::getOCSelectorForStep($step);
				$this->setOCSelector($selector);
				HttpRequestHelper::setOCSelectorCookie("owncloud-selector=$selector;path=/;");
			}
		}
	}

	/**
	 * @BeforeScenario @local_storage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setupLocalStorageBefore():void {
		$storageName = "local_storage";
		$result = SetupHelper::createLocalStorageMount(
			$storageName,
			$this->getStepLineRef()
		);
		$storageId = $result['storageId'];
		if (!is_numeric($storageId)) {
			throw new Exception(
				__METHOD__ . " storageId '$storageId' is not numeric"
			);
		}
		$this->addStorageId($storageName, (int) $storageId);
		SetupHelper::runOcc(
			[
				'files_external:option',
				$storageId,
				'enable_sharing',
				'true'
			],
			$this->getStepLineRef()
		);
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function restoreAdminPassword():void {
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
	public function deleteAllStorages():void {
		$allStorageIds = \array_keys($this->getStorageIds());
		foreach ($allStorageIds as $storageId) {
			SetupHelper::runOcc(
				[
					'files_external:delete',
					'-y',
					$storageId
				],
				$this->getStepLineRef()
			);
		}
		$this->storageIds = [];
	}

	/**
	 * @AfterScenario @local_storage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removeLocalStorageAfter():void {
		$this->removeExternalStorage();
		$this->removeTemporaryStorageOnServerAfter();
	}

	/**
	 * This will remove test created external mount points
	 *
	 * @AfterScenario @external_storage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removeExternalStorage():void {
		if ($this->getStorageIds() !== null) {
			$this->deleteAllStorages();
		}
	}

	/**
	 * @BeforeScenario @temporary_storage_on_server
	 *
	 * @return void
	 * @throws Exception
	 */
	public function makeTemporaryStorageOnServerBefore():void {
		$this->mkDirOnServer(
			TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER
		);
	}

	/**
	 * @AfterScenario @temporary_storage_on_server
	 *
	 * @return void
	 * @throws Exception
	 */
	public function removeTemporaryStorageOnServerAfter():void {
		SetupHelper::rmDirOnServer(
			TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER,
			$this->getStepLineRef()
		);
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function removeCreatedFilesAfter():void {
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
	public function clearFileLocksForServer(string $serverUrl):void {
		$response = OcsApiHelper::sendRequest(
			$serverUrl,
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			'delete',
			"/apps/testing/api/v1/lockprovisioning",
			$this->getStepLineRef(),
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
	 * @throws Exception
	 */
	public function clearFileLocks():void {
		if (!OcisHelper::isTestingOnOcisOrReva()) {
			$this->authContext->deleteTokenAuthEnforcedAfterScenario();
			$this->clearFileLocksForServer($this->getBaseUrl());
			if ($this->remoteBaseUrl !== $this->localBaseUrl) {
				$this->clearFileLocksForServer($this->getRemoteBaseUrl());
			}
		}
	}

	/**
	 * @AfterScenario
	 *
	 * clear space id reference
	 *
	 * @return void
	 * @throws Exception
	 */
	public function clearSpaceId():void {
		if (\count(WebDavHelper::$spacesIdRef) > 0) {
			WebDavHelper::$spacesIdRef = [];
		}
	}

	/**
	 * @BeforeSuite
	 *
	 * @param BeforeSuiteScope $scope
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function useBigFileIDs(BeforeSuiteScope $scope):void {
		if (OcisHelper::isTestingOnOcisOrReva()) {
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
			throw new Exception(
				"Could not find adminUsername and/or adminPassword in useBigFileIDs"
			);
		}

		HttpRequestHelper::post(
			$fullUrl,
			'',
			$adminUsername,
			$adminPassword
		);
	}

	/**
	 * runs a function on every server (LOCAL & REMOTE).
	 * The callable function receives the server (LOCAL or REMOTE) as first argument
	 *
	 * @param callable $callback
	 *
	 * @return array
	 */
	public function runFunctionOnEveryServer(callable $callback):array {
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
	 * @param array|null $requiredHeader
	 * @param array|null $allowedHeader
	 *
	 * @return void
	 * @throws Exception
	 */
	public function verifyTableNodeColumns(TableNode $table, ?array $requiredHeader = [], ?array $allowedHeader = []):void {
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
	public function verifyTableNodeRows(TableNode $table, array $requiredRows = [], array $allowedRows = []):void {
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
	public function verifyTableNodeColumnsCount(TableNode $table, int $count):void {
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
	public function resetAppConfigs():void {
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
	public function theAdministratorSetsTheLastLoginDateForUserToDaysAgoUsingTheTestingApi(string $user, string $days):void {
		$user = $this->getActualUsername($user);
		$adminUser = $this->getAdminUsername();
		$baseUrl = "/apps/testing/api/v1/lastlogindate/$user";
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$adminUser,
			$this->getAdminPassword(),
			'POST',
			$baseUrl,
			$this->getStepLineRef(),
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
	public function setCapabilities(array $capabilitiesArray):void {
		AppConfigHelper::setCapabilities(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$capabilitiesArray,
			$this->getStepLineRef()
		);
	}

	/**
	 * After Scenario. restore trusted servers
	 *
	 * @AfterScenario @federation-app-required
	 *
	 * @return void
	 */
	public function restoreTrustedServersAfterScenario():void {
		$this->restoreTrustedServers('LOCAL');
		if ($this->federatedServerExists()) {
			$this->restoreTrustedServers('REMOTE');
		}
	}

	/**
	 * Invokes an OCC command
	 *
	 * @param array|null $args of the occ command
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $baseUrl
	 * @param string|null $ocPath
	 *
	 * @return int exit code
	 * @throws Exception if ocPath has not been set yet or the testing app is not enabled
	 */
	public function runOcc(
		?array $args = [],
		?string $adminUsername = null,
		?string $adminPassword = null,
		?string $baseUrl = null,
		?string $ocPath = null
	):int {
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
	 * @param array|null $args of the occ command
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
		?array $args = [],
		?array $envVariables = null,
		?string $adminUsername = null,
		?string $adminPassword = null,
		?string $baseUrl = null,
		?string $ocPath = null
	):int {
		$args[] = '--no-ansi';
		if ($baseUrl == null) {
			$baseUrl = $this->getBaseUrl();
		}
		$return = SetupHelper::runOcc(
			$args,
			$this->getStepLineRef(),
			$adminUsername,
			$adminPassword,
			$baseUrl,
			$ocPath,
			$envVariables
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
	public function findExceptions():array {
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
	 *
	 * @return void
	 */
	public function setResultOfOccCommand(array $result):void {
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
	public function findLastTransferFolderForUser(string $sourceUser, string $targetUser):?string {
		$foundPaths = [];
		$responseXmlObject = $this->listFolderAndReturnResponseXml(
			$targetUser,
			'',
			'1'
		);
		$transferredElements = $responseXmlObject->xpath(
			"//d:response/d:href[contains(., '/transferred%20from%20$sourceUser%20on%')]"
		);
		foreach ($transferredElements as $transferredElement) {
			// $transferredElement is an XML object. We want to work with the string in the XML element.
			$path = \rawurldecode((string) $transferredElement);
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
			$foundPaths,
			function ($a, $b) {
				return $a['date'] - $b['date'];
			}
		);

		$davPath = \rtrim($this->getFullDavFilesPath($targetUser), '/');

		$foundPath = \end($foundPaths)['path'];
		// strip DAV path
		return \substr($foundPath, \strlen($davPath) + 1);
	}

	/**
	 * After Scenario. restore trusted servers
	 *
	 * @param string $server 'LOCAL'/'REMOTE'
	 *
	 * @return void
	 * @throws Exception
	 */
	public function restoreTrustedServers(string $server):void {
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
	 * @throws Exception
	 */
	public function restoreParametersAfterScenario():void {
		if (!OcisHelper::isTestingOnOcisOrReva()) {
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
	public function getTrustedServers(string $server = 'LOCAL'):array {
		if ($server === 'LOCAL') {
			$url = $this->getLocalBaseUrl();
		} elseif ($server === 'REMOTE') {
			$url = $this->getRemoteBaseUrl();
		} else {
			throw new Exception(__METHOD__ . " Invalid value for server : $server");
		}
		$adminUser = $this->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$url,
			$adminUser,
			$this->getAdminPassword(),
			'GET',
			"/apps/testing/api/v1/trustedservers",
			$this->getStepLineRef()
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
	public function getBodyForOCSRequest(string $method, string $property):?string {
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
	 * @throws Exception
	 */
	public function prepareParametersBeforeScenario():void {
		if (!OcisHelper::isTestingOnOcisOrReva()) {
			$user = $this->getCurrentUser();
			$this->setCurrentUser($this->getAdminUsername());
			$previousServer = $this->getCurrentServer();
			foreach (['LOCAL', 'REMOTE'] as $server) {
				if (($server === 'LOCAL') || $this->federatedServerExists()) {
					$this->usingServer($server);
					$this->resetAppConfigs();
					$result = SetupHelper::runOcc(
						['config:list', '--private'],
						$this->getStepLineRef(),
						$this->getAdminUsername(),
						$this->getAdminPassword(),
						$this->getBaseUrl(),
						$this->getOcPath()
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
	 * @throws Exception
	 */
	public function setInitialTrustedServersBeforeScenario():void {
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
	 * @throws Exception
	 *
	 */
	private function restoreParameters(string $server):void {
		$commands = [];
		if ($this->isTestingWithLdap()) {
			$this->resetOldLdapConfig();
		}
		$result = SetupHelper::runOcc(
			['config:list'],
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getBaseUrl(),
			$this->getOcPath()
		);
		$currentConfigList = \json_decode($result['stdOut'], true);
		foreach ($currentConfigList['system'] as $configKey => $configValue) {
			if (!\array_key_exists(
				$configKey,
				$this->savedConfigList[$server]['system']
			)
			) {
				\array_push($commands, ["command" => ['config:system:delete', $configKey]]);
			}
		}
		foreach ($this->savedConfigList[$server]['system'] as $configKey => $configValue) {
			if (!\array_key_exists($configKey, $currentConfigList["system"])
				|| $currentConfigList["system"][$configKey] !== $this->savedConfigList[$server]['system'][$configKey]
			) {
				\array_push($commands, ["command" => ['config:system:set', "--type=json", "--value=" . \json_encode($configValue), $configKey]]);
			}
		}
		foreach ($currentConfigList['apps'] as $appName => $appSettings) {
			foreach ($appSettings as $configKey => $configValue) {
				//only check if the app was there in the original configuration
				if (\array_key_exists($appName, $this->savedConfigList[$server]['apps'])
					&& !\array_key_exists(
						$configKey,
						$this->savedConfigList[$server]['apps'][$appName]
					)
				) {
					\array_push($commands, ["command" => ['config:app:delete', $appName, $configKey]]);
				} elseif (\array_key_exists($appName, $this->savedConfigList[$server]['apps'])
					&& \array_key_exists($configKey, $this->savedConfigList[$server]['apps'][$appName])
					&& $this->savedConfigList[$server]['apps'][$appName][$configKey] !== $configValue
				) {
					// Do not accidentally disable apps here (perhaps too early)
					// That is done in Provisioning.php restoreAppEnabledDisabledState()
					if ($configKey !== "enabled") {
						\array_push(
							$commands,
							[
								"command" => [
									'config:app:set',
									$appName,
									$configKey,
									"--value=" . $this->savedConfigList[$server]['apps'][$appName][$configKey]
								]
							]
						);
					}
				}
			}
		}
		SetupHelper::runBulkOcc(
			$commands,
			$this->getStepLineRef(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$this->getBaseUrl()
		);
	}
}
