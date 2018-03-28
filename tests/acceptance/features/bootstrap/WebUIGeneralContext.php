<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\LoginPage;
use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\AppConfigHelper;
use TestHelpers\OcsApiHelper;
use TestHelpers\SetupHelper;
use TestHelpers\UploadHelper;
use TestHelpers\UserHelper;

require_once 'bootstrap.php';

/**
 * WebUI General context.
 */
class WebUIGeneralContext extends RawMinkContext implements Context {

	private $owncloudPage;
	private $loginPage;
	private $oldCSRFSetting = null;
	private $oldPreviewSetting = null;
	private $createdFiles = [];

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext = null;

	/**
	 *
	 * @var WebUIFilesContext
	 */
	private $webUIFilesContext = null;

	/**
	 * 
	 * @var Page\OwncloudPage
	 */
	private $currentPageObject = null;
	
	/**
	 * @var string the original capabilities in XML format
	 */
	private $savedCapabilitiesXml;
	
	/**
	 * @var array the changes made to capabilities for the test scenario
	 */
	private $savedCapabilitiesChanges = [];
	
	/**
	 * table of capabilities to map the human readable terms from the settings page
	 * to terms in the capabilities XML and testing app
	 * 
	 * @var array
	 */
	private $capabilities = [ 
		'sharing' => [ 
			'Allow apps to use the Share API' => [ 
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'api_enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_enabled' 
			],
			'Allow resharing' => [
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'resharing',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_resharing',
			],
			'Allow sharing with groups' => [
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'group_sharing',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_group_sharing',
			],
			'Restrict users to only share with users in their groups' => [ 
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'share_with_group_members_only',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_only_share_with_group_members'
			],
			'Restrict users to only share with groups they are member of' => [ 
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'share_with_membership_groups_only',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_only_share_with_membership_groups'
			]
		] 
	];

	/**
	 * WebUIGeneralContext constructor.
	 *
	 * @param OwncloudPage $owncloudPage
	 * @param LoginPage $loginPage
	 */
	public function __construct(OwncloudPage $owncloudPage, LoginPage $loginPage) {
		$this->owncloudPage = $owncloudPage;
		$this->loginPage = $loginPage;
	}

	/**
	 * 
	 * @param OwncloudPage $pageObject
	 *
	 * @return void
	 */
	public function setCurrentPageObject(OwncloudPage $pageObject) {
		$this->currentPageObject = $pageObject;
	}

	/**
	 * 
	 * @return OwncloudPage
	 */
	public function getCurrentPageObject() {
		return $this->currentPageObject;
	}

	/**
	 * @When user admin logs in using the webUI
	 * @Given user admin has logged in using the webUI
	 *
	 * @return void
	 */
	public function adminLogsInUsingTheWebUI() {
		$this->loginPage->open();
		$this->loginAs(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
	}

	/**
	 * @param string $username
	 * @param string $password
	 * @param string $target
	 *
	 * @return \Page\OwncloudPage
	 */
	public function loginAs($username, $password, $target = 'FilesPage') {
		$session = $this->getSession();
		$this->loginPage->waitTillPageIsLoaded($session);
		$nextPage = $this->loginPage->loginAs(
			$username,
			$password,
			$target
		);
		$nextPage->waitTillPageIsLoaded($session);
		$this->featureContext->asUser($username);
		return $nextPage;
	}

	/**
	 * @When the user/administrator logs out of the webUI
	 * @Given the user/administrator has logged out of the webUI
	 *
	 * @return void
	 */
	public function theUserLogsOutOfTheWebUI() {
		$settingsMenu = $this->owncloudPage->openSettingsMenu();
		$settingsMenu->logout();
		$this->loginPage->waitTillPageIsLoaded($this->getSession());
		if ($this->webUIFilesContext !== null) {
			$this->webUIFilesContext->resetFilesContext();
		}
	}

	/**
	 * @Then no notification should be displayed on the webUI
	 *
	 * @return void
	 */
	public function noNotificationShouldBeDisplayedOnTheWebUI() {
		try {
			$notificationText = $this->owncloudPage->getNotificationText();
			PHPUnit_Framework_Assert::assertEquals(
				'',
				$notificationText,
				"Expecting no notifications but got $notificationText"
			);
		} catch (ElementNotFoundException $e) {
			// if there is no notification element, then good
		}
	}

	/**
	 * @Then a notification should be displayed on the webUI with the text :notificationText
	 *
	 * @param string $notificationText expected notification text
	 *
	 * @return void
	 */
	public function aNotificationShouldBeDisplayedOnTheWebUIWithTheText(
		$notificationText
	) {
		PHPUnit_Framework_Assert::assertEquals(
			$notificationText, $this->owncloudPage->getNotificationText()
		);
	}

	/**
	 * @Then /^notifications should be displayed on the webUI with the text\s?(matching|)$/
	 *
	 * @param string $matching contains "matching" when notification text
	 *                         has to be checked against regular expression
	 * @param TableNode $table of expected notification text
	 *
	 * @return void
	 * @throws Exception
	 */
	public function notificationsShouldBeDisplayedOnTheWebUIWithTheText($matching, TableNode $table) {
		$actualNotifications = $this->owncloudPage->getNotifications();
		$numActualNotifications = count($actualNotifications);
		$expectedNotifications = $table->getRows();
		$numExpectedNotifications = count($expectedNotifications);

		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
			$numExpectedNotifications,
			$numActualNotifications,
			"expected at least $numExpectedNotifications notifications but only found $numActualNotifications"
		);

		$notificationCounter = 0;
		foreach ($expectedNotifications as $expectedNotification) {
			$expectedNotificationText = $expectedNotification[0];
			$actualNotificationText = $actualNotifications[$notificationCounter];
			if ($matching === "matching") {
				if (!preg_match($expectedNotificationText, $actualNotificationText)) {
					throw new Exception(
						$actualNotificationText . " does not match " . $expectedNotificationText
					);
				}
			} else {
				PHPUnit_Framework_Assert::assertEquals(
					$expectedNotificationText,
					$actualNotificationText
				);
			}
			$notificationCounter++;
		}
	}

	/**
	 * @Then /^((?:\d)|no)?\s?dialog[s]? should be displayed on the webUI$/
	 *
	 * @param int|string|null $count
	 * @param TableNode|null $table of expected dialogs format must be:
	 *                              | title | content |
	 *
	 * @return void
	 */
	public function dialogsShouldBeDisplayedOnTheWebUI(
		$count = null, TableNode $table = null
	) {
		$dialogs = $this->owncloudPage->getOcDialogs();
		//check if the correct number of dialogs are open
		if ($count !== null) {
			if ($count === "no") {
				$count = 0;
			} else {
				$count = (int) $count;
			}
			$currentTime = microtime(true);
			$end = $currentTime + (STANDARDUIWAITTIMEOUTMILLISEC / 1000);
			while ($currentTime <= $end && ($count !== count($dialogs))) {
				usleep(STANDARDSLEEPTIMEMICROSEC);
				$currentTime = microtime(true);
				$dialogs = $this->owncloudPage->getOcDialogs();
			}
			PHPUnit_Framework_Assert::assertEquals($count, count($dialogs));
		}
		if ($table !== null) {
			$expectedDialogs = $table->getHash();
			//we iterate first through the real dialogs because that way we can
			//save time by calling getMessage() & getTitle() only once
			foreach ($dialogs as $dialog) {
				$content = $dialog->getMessage();
				$title = $dialog->getTitle();
				for ($dialogI = 0; $dialogI < count($expectedDialogs); $dialogI++) {
					$expectedDialogs[$dialogI]['content'] = $this->substituteInLineCodes(
						$expectedDialogs[$dialogI]['content']
					);
					if ($expectedDialogs[$dialogI]['content'] === $content
						&& $expectedDialogs[$dialogI]['title'] === $title
					) {
						$expectedDialogs[$dialogI]['found'] = true;
					}
				}
			}
			foreach ($expectedDialogs as $expectedDialog) {
				PHPUnit_Framework_Assert::assertArrayHasKey(
					"found",
					$expectedDialog,
					"could not find dialog with title '" . $expectedDialog['title'] .
					"' and content '" . $expectedDialog['content'] . "'"
				);
			}
		}
	}

	/**
	 * @Then the user should be redirected to a webUI page with the title :title
	 *
	 * @param string $title
	 *
	 * @return void
	 */
	public function theUserShouldBeRedirectedToAWebUIPageWithTheTitle($title) {
		$this->owncloudPage->waitForOutstandingAjaxCalls($this->getSession());
		$actualTitle = $this->getSession()->getPage()->find(
			'xpath', './/title'
		)->getHtml();
		PHPUnit_Framework_Assert::assertEquals($title, trim($actualTitle));
	}

	/**
	 * @Given /^the setting "([^"]*)" in the section "([^"]*)" has been (disabled|enabled)$/
	 *
	 * @param string $setting
	 * @param string $section
	 * @param string $value
	 *
	 * @return void
	 */
	public function settingInSectionHasBeen($setting, $section, $value) {
		if ($value === "enabled") {
			$value = true;
		} elseif ($value === "disabled") {
			$value = false;
		} else {
			throw new InvalidArgumentException("$value can only be 'disabled' or 'enabled'");
		}
		
		$capability = $this->capabilities[strtolower($section)][$setting];
		$change = AppConfigHelper::setCapability(
			$this->featureContext->baseUrlWithoutSlash(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$capability['capabilitiesApp'],
			$capability['capabilitiesParameter'],
			$capability['testingApp'],
			$capability['testingParameter'],
			$value,
			$this->getSavedCapabilitiesXml()
		);
		$this->addToSavedCapabilitiesChanges($change);

	}

	/**
	 * @Given a file with the size of :size bytes and the name :name has been created locally
	 *
	 * @param int $size if not int given it will be cast to int
	 * @param string $name
	 *
	 * @throws InvalidArgumentException
	 * @return void
	 */
	public function aFileWithSizeAndNameHasBeenCreatedLocally($size, $name) {
		$fullPath = getenv("FILES_FOR_UPLOAD") . $name;
		if (file_exists($fullPath)) {
			throw new InvalidArgumentException(
				__METHOD__ . " could not create '$fullPath' file exists"
			);
		}
		UploadHelper::createFileSpecificSize($fullPath, (int)$size);
		$this->createdFiles[] = $fullPath;
	}

	/**
	 * gets the base url but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getBaseUrlWithoutScheme() {
		return preg_replace(
			"(^https?://)", "", $this->featureContext->baseUrlWithoutSlash()
		);
	}

	/**
	 * substitutes codes like %base_url% with the value
	 * if the given value does not have anything to be substituted
	 * then it is returned unmodified
	 *
	 * @param string $value
	 *
	 * @return string
	 */
	public function substituteInLineCodes($value) {
		$substitutions = [
			[
				"code" => "%base_url%",
				"function" => [
					$this->featureContext,
					"baseUrlWithoutSlash"
				],
				"parameter" => []
			],
			[
				"code" => "%remote_server%",
				"function" => "getenv",
				"parameter" => [
					"REMOTE_FED_BASE_URL"
				]
			],
			[
				"code" => "%local_server%",
				"function" => [
					$this,
					"getBaseUrlWithoutScheme"
				],
				"parameter" => []
			]
		];
		foreach ($substitutions as $substitution) {
			$value = str_replace(
				$substitution["code"],
				call_user_func_array(
					$substitution["function"],
					$substitution["parameter"]
				),
				$value
			);
		}
		return $value;
	}

	/**
	 * returns the saved capabilities as XML
	 * 
	 * @return string
	 */
	public function getSavedCapabilitiesXml() {
		return $this->savedCapabilitiesXml;
	}

	/**
	 * adds a capability to the list of changed capabilities
	 * 
	 * @param array $change
	 *        [
	 *         'appid' => string,
	 *         'configkey' => string,
	 *         'value' => bool
	 *        ]
	 *
	 * @return void
	 */
	public function addToSavedCapabilitiesChanges($change) {
		if (sizeof($change) > 0) {
			$this->savedCapabilitiesChanges = array_merge(
				$this->savedCapabilitiesChanges, $change
			);
		}
	}

	/**
	 * @BeforeScenario @webUI
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

		try {
			$this->webUIFilesContext = $environment->getContext('WebUIFilesContext');
		} catch (Exception $e) {
			//we don't care if the context cannot be found
			//if the developer forgets to include it the test will fail anyway
			//but by ignoring this error we do not force every UI test suite
			//to include FilesContext
		}

		$suiteParameters = SetupHelper::getSuiteParameters($scope);
		SetupHelper::init(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->baseUrlWithoutSlash(),
			$suiteParameters['ocPath']
		);
		
		$response = AppConfigHelper::getCapabilities(
			$this->featureContext->baseUrlWithoutSlash(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
		$this->savedCapabilitiesXml = AppConfigHelper::getCapabilitiesXml(
			$response
		);
		if (is_null($this->oldCSRFSetting)) {
			$oldCSRFSetting = SetupHelper::runOcc(
				['config:system:get', 'csrf.disabled']
			)['stdOut'];
			$this->oldCSRFSetting = trim($oldCSRFSetting);
		}
		SetupHelper::runOcc(
			[
				'config:system:set',
				'csrf.disabled',
				'--type',
				'boolean',
				'--value',
				'true'
			]
		);

		//TODO make it smarter to be able also to work with other backends
		if (getenv("TEST_EXTERNAL_USER_BACKENDS") === "true") {
			$result = SetupHelper::runOcc(
				["user:sync", "OCA\User_LDAP\User_Proxy", "-m remove"]
			);
			if ((int)$result['code'] !== 0) {
				throw new Exception(
					"could not sync users with LDAP. stdOut:\n" .
					$result['stdOut'] . "\n" .
					"stdErr:\n" .
					$result['stdErr'] . "\n"
				);
			}
		}
	}

	/**
	 * disable the previews on all tests tagged with '@disablePreviews'
	 * 
	 * @BeforeScenario @webUI&&@disablePreviews
	 *
	 * @return void
	 */
	public function disablePreviewBeforeScenario() {
		if (is_null($this->oldPreviewSetting)) {
			$oldPreviewSetting = SetupHelper::runOcc(
				['config:system:get', 'enable_previews']
			)['stdOut'];
			$this->oldPreviewSetting = trim($oldPreviewSetting);
		}
		SetupHelper::runOcc(
			[
				'config:system:set',
				'enable_previews',
				'--type',
				'boolean',
				'--value',
				'false'
			]
		);
	}

	/**
	 * @return string
	 */
	public function getSessionId() {
		$url = $this->getSession()->getDriver()->getWebDriverSession()->getUrl();
		$parts = explode('/', $url);
		$sessionId = array_pop($parts);
		return $sessionId;
	}

	/**
	 * After Scenario. Sets back old settings
	 *
	 * @AfterScenario @webUI
	 *
	 * @return void
	 */
	public function tearDownSuite() {
		AppConfigHelper::modifyServerConfigs(
			$this->featureContext->baseUrlWithoutSlash(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->savedCapabilitiesChanges
		);

		if ($this->oldPreviewSetting === "") {
			SetupHelper::runOcc(['config:system:delete', 'enable_previews']);
		} elseif (!is_null($this->oldPreviewSetting)) {
			SetupHelper::runOcc(
				[
					'config:system:set',
					'enable_previews',
					'--type',
					'boolean',
					'--value',
					$this->oldPreviewSetting
				]
			);
		}
		
		if ($this->oldCSRFSetting === "") {
			SetupHelper::runOcc(['config:system:delete', 'csrf.disabled']);
		} elseif (!is_null($this->oldCSRFSetting)) {
			SetupHelper::runOcc(
				[
					'config:system:set',
					'csrf.disabled',
					'--type',
					'boolean',
					'--value',
					$this->oldCSRFSetting
				]
			);
		}
		
		foreach ($this->createdFiles as $file) {
			unlink($file);
		}
	}

	/**
	 * After Scenario. clear file locks
	 *
	 * @AfterScenario @webUI
	 *
	 * @return void
	 */
	public function clearFileLocks() {
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->baseUrlWithoutSlash(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			'delete',
			"/apps/testing/api/v1/lockprovisioning",
			["global" => "true"]
		);
		PHPUnit_Framework_Assert::assertEquals("200", $response->getStatusCode());
	}

	/**
	 * After Scenario. Report the pass/fail status to SauceLabs.
	 *
	 * @AfterScenario @webUI
	 *
	 * @param AfterScenarioScope $afterScenarioScope
	 *
	 * @return void
	 */
	public function reportResult(AfterScenarioScope $afterScenarioScope) {
		if ($afterScenarioScope->getTestResult()->isPassed()) {
			$passOrFail = "pass";
			$passed = "true";
		} else {
			$passOrFail = "fail";
			$passed = "false";
		}

		$jobId = $this->getSessionId();
		$sauceUsername = getenv('SAUCE_USERNAME');
		$sauceAccessKey = getenv('SAUCE_ACCESS_KEY');

		if ($sauceUsername && $sauceAccessKey) {
			error_log("SAUCELABS RESULT: ($passOrFail) https://saucelabs.com/jobs/$jobId");
			exec('curl -X PUT -s -d "{\"passed\": ' . $passed . '}" -u ' . $sauceUsername . ':' . $sauceAccessKey . ' https://saucelabs.com/rest/v1/$SAUCE_USERNAME/jobs/' . $jobId);
		}
	}
}
