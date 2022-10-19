<?php declare(strict_types=1);
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
use GuzzleHttp\Exception\GuzzleException;
use Page\LoginPage;
use Page\OwncloudPage;
use PHPUnit\Framework\Assert;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use TestHelpers\AppConfigHelper;
use TestHelpers\EmailHelper;
use TestHelpers\SetupHelper;
use Page\GeneralErrorPage;
use Page\GeneralExceptionPage;

require_once 'bootstrap.php';

/**
 * WebUI General context.
 */
class WebUIGeneralContext extends RawMinkContext implements Context {
	private $owncloudPage;

	/**
	 *
	 * @var GeneralErrorPage
	 */
	private $generalErrorPage;

	/**
	 *
	 * @var GeneralExceptionPage
	 */
	private $generalExceptionPage;

	/**
	 *
	 * @var LoginPage
	 */
	private $loginPage;

	private $oldCSRFSetting = null;
	private $oldPreviewSetting = [];

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
	 * @var OwncloudPage
	 */
	private $currentPageObject = null;

	private $currentServer = null;

	/**
	 * @var array the original capabilities in XML format
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
			],
			'Automatically accept new incoming local user shares' => [
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'auto_accept_share',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_auto_accept_share'
			],
		]
	];

	/**
	 * WebUIGeneralContext constructor.
	 *
	 * @param OwncloudPage $owncloudPage
	 * @param LoginPage $loginPage
	 * @param GeneralErrorPage $generalErrorPage
	 * @param GeneralExceptionPage $generalExceptionPage
	 */
	public function __construct(
		OwncloudPage $owncloudPage,
		LoginPage $loginPage,
		GeneralErrorPage $generalErrorPage,
		GeneralExceptionPage $generalExceptionPage
	) {
		$this->owncloudPage = $owncloudPage;
		$this->loginPage = $loginPage;
		$this->generalErrorPage = $generalErrorPage;
		$this->generalExceptionPage = $generalExceptionPage;
	}

	/**
	 *
	 * @param OwncloudPage $pageObject
	 *
	 * @return void
	 */
	public function setCurrentPageObject(OwncloudPage $pageObject):void {
		$this->currentPageObject = $pageObject;
	}

	/**
	 *
	 * @return OwncloudPage
	 */
	public function getCurrentPageObject():?OwncloudPage {
		return $this->currentPageObject;
	}

	/**
	 * @return string
	 */
	public function getCurrentServer():?string {
		return $this->currentServer;
	}

	/**
	 * @param string $currentServer
	 *
	 * @return void
	 */
	public function setCurrentServer(string $currentServer):void {
		$this->currentServer = $currentServer;
	}

	/**
	 * @When the administrator logs in using the webUI
	 * @Given the administrator has logged in using the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminLogsInUsingTheWebUI():void {
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
	 * @return Page
	 * @throws Exception
	 */
	public function loginAs(string $username, string $password, string $target = 'FilesPage'): Page {
		$username = $this->featureContext->getActualUsername($username);
		$password = $this->featureContext->getActualPassword($password);
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
	 * @throws Exception
	 */
	public function theUserLogsOutOfTheWebUI():void {
		$session = $this->getSession();
		$settingsMenu = $this->owncloudPage->openSettingsMenu($session);
		$settingsMenu->logout();
		$this->loginPage->waitTillPageIsLoaded($session);
		if ($this->webUIFilesContext !== null) {
			$this->webUIFilesContext->resetFilesContext();
		}
	}

	/**
	 * using inbucket mail service
	 *
	 * @param string $emailAddress
	 * @param string $regexSearch
	 * @param string $errorMessage
	 * @param ?int $emailNumber For email number, 1 means the latest one
	 *
	 * @return string
	 * @throws GuzzleException
	 */
	public function getLinkFromEmail(string $emailAddress, string $regexSearch, string $errorMessage, int $emailNumber = 1):string {
		$content = EmailHelper::getBodyOfLastEmail(
			$emailAddress,
			$this->featureContext->getStepLineRef(),
			$emailNumber
		);
		$matches = [];
		\preg_match($regexSearch, $content, $matches);
		Assert::assertArrayHasKey(1, $matches, $errorMessage);
		return $matches[1];
	}

	/**
	 *
	 * @param string $emailAddress
	 * @param string $regexSearch
	 * @param string $errorMessage
	 * @param ?int $emailNumber For email number, 1 means the latest one
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function followLinkFromEmail(string $emailAddress, string $regexSearch, string $errorMessage, int $emailNumber = 1):void {
		$link = $this->getLinkFromEmail(
			$emailAddress,
			$regexSearch,
			$errorMessage,
			$emailNumber
		);
		$this->visitPath($link);
	}

	/**
	 * @Then no notification should be displayed on the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function noNotificationShouldBeDisplayedOnTheWebUI():void {
		try {
			$notificationText = $this->owncloudPage->getNotificationText();
			Assert::assertEquals(
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
	 * @throws Exception
	 */
	public function aNotificationShouldBeDisplayedOnTheWebUIWithTheText(
		string $notificationText
	):void {
		Assert::assertEquals(
			$notificationText,
			$this->owncloudPage->getNotificationText(),
			__METHOD__
			. " A notification was expected to be displayed on the webUI with the text '$notificationText', but got '"
			. $this->owncloudPage->getNotificationText()
			. "' instead"
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
	public function notificationsShouldBeDisplayedOnTheWebUIWithTheText(
		string $matching,
		TableNode $table
	):void {
		$this->featureContext->verifyTableNodeColumnsCount($table, 1);
		$expectedNotifications = $table->getRows();
		$numExpectedNotifications = \count($expectedNotifications);
		$actualNotifications = $this->owncloudPage->getNotifications($numExpectedNotifications);
		$numActualNotifications = \count($actualNotifications);

		Assert::assertGreaterThanOrEqual(
			$numExpectedNotifications,
			$numActualNotifications,
			"expected at least $numExpectedNotifications notifications but only found $numActualNotifications"
		);

		foreach ($expectedNotifications as $expectedNotification) {
			$expectedNotificationText = $expectedNotification[0];
			$matchingSucceeded = false;
			foreach ($actualNotifications as $key => $actualNotificationText) {
				$latestActualNotificationText = $actualNotificationText;
				if ((($matching !== "matching") && ($expectedNotificationText === $actualNotificationText))
					|| (($matching === "matching") && (\preg_match($expectedNotificationText, $actualNotificationText)))
				) {
					// it matches, remove this actual entry and go on to look for the next expected notification
					unset($actualNotifications[$key]);
					$matchingSucceeded = true;
					break;
				}
			}
			if (!$matchingSucceeded) {
				Assert::fail(
					"$latestActualNotificationText does not match $expectedNotificationText"
				);
			}
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
	 * @throws Exception
	 */
	public function dialogsShouldBeDisplayedOnTheWebUI(
		$count = null,
		TableNode $table = null
	):void {
		$dialogs = $this->owncloudPage->getOcDialogs();
		//check if the correct number of dialogs are open
		if ($count !== null) {
			if ($count === "no") {
				$count = 0;
			} else {
				$count = (int) $count;
			}
			$currentTime = \microtime(true);
			$end = $currentTime + (STANDARD_UI_WAIT_TIMEOUT_MILLISEC / 1000);
			while ($currentTime <= $end && ($count !== \count($dialogs))) {
				\usleep(STANDARD_SLEEP_TIME_MICROSEC);
				$currentTime = \microtime(true);
				$dialogs = $this->owncloudPage->getOcDialogs();
			}
			Assert::assertEquals(
				$count,
				\count($dialogs),
				__METHOD__
				. " The expected number of dialogs were '$count' but got '"
				. \count($dialogs)
				. "' instead"
			);
		}
		if ($table !== null) {
			$this->featureContext->verifyTableNodeColumns($table, ['title', 'content'], ['user']);
			$expectedDialogs = $table->getHash();
			//we iterate first through the real dialogs because that way we can
			//save time by calling getMessage() & getTitle() only once
			foreach ($dialogs as $dialog) {
				$content = $dialog->getMessage();
				$title = $dialog->getTitle();
				for ($dialogI = 0; $dialogI < \count($expectedDialogs); $dialogI++) {
					if (isset($expectedDialogs[$dialogI]['user'])) {
						$expectedDialogs[$dialogI]['content']
							= $this->featureContext->substituteInLineCodes(
								$expectedDialogs[$dialogI]['content'],
								$expectedDialogs[$dialogI]['user']
							);
					}
					if ($content === $expectedDialogs[$dialogI]['content']
						&& $title === $expectedDialogs[$dialogI]['title']
					) {
						$expectedDialogs[$dialogI]['found'] = true;
					}
				}
			}
			foreach ($expectedDialogs as $expectedDialog) {
				Assert::assertArrayHasKey(
					"found",
					$expectedDialog,
					"could not find dialog with title '{$expectedDialog['title']}' "
					. "and content '{$expectedDialog['content']}'"
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
	public function theUserShouldBeRedirectedToAWebUIPageWithTheTitle(string $title):void {
		$title = $this->featureContext->substituteInLineCodes($title);
		$this->owncloudPage->waitForOutstandingAjaxCalls($this->getSession());
		// Just check that the actual title starts with the expected title.
		// Theming can have other text following.
		Assert::assertStringStartsWith(
			$title,
			$this->owncloudPage->getPageTitle(),
			__METHOD__
			. " Expected title to be '$title' but got '"
			. $this->owncloudPage->getPageTitle()
			. "' instead."
		);
	}

	/**
	 * @Then the user should be redirected to the general error webUI page with the title :title
	 *
	 * @param string $title
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldBeRedirectedToGeneralErrorPage(string $title):void {
		$title = $this->featureContext->substituteInLineCodes($title);
		$this->generalErrorPage->waitTillPageIsLoaded($this->getSession());
		// Just check that the actual title starts with the expected title.
		// Theming can have other text following.
		Assert::assertStringStartsWith(
			$title,
			$this->generalErrorPage->getPageTitle(),
			__METHOD__
			. " Expected to be redirected to the general error webUI page with the title '$title' but got '"
			. $this->owncloudPage->getPageTitle()
			. "' instead."
		);
	}

	/**
	 * @Then an error should be displayed on the general error webUI page saying :error
	 *
	 * @param string $error
	 *
	 * @return void
	 */
	public function anErrorShouldBeDisplayedOnTheGeneralErrorPage(string $error):void {
		Assert::assertEquals(
			$error,
			$this->generalErrorPage->getErrorMessage(),
			__METHOD__
			. " The error expected to be displayed was '$error' but got '"
			. $this->generalErrorPage->getErrorMessage()
			. "' instead."
		);
	}

	/**
	 * @Then the user should be redirected to the general exception webUI page with the title :title
	 *
	 * @param string $title
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldBeRedirectedToGeneralExceptionPage(string $title):void {
		$title = $this->featureContext->substituteInLineCodes($title);
		$this->generalExceptionPage->waitTillPageIsLoaded($this->getSession());
		// Just check that the actual title starts with the expected title.
		// Theming can have other text following.
		Assert::assertStringStartsWith(
			$title,
			$this->generalExceptionPage->getPageTitle(),
			__METHOD__
			. " Expected user to be redirected to the general exception webUI page with the title '$title', but got '"
			. $this->generalExceptionPage->getPageTitle()
			. "' as the title"
		);
	}

	/**
	 * @Then the title of the exception on general exception webUI page should be :title
	 *
	 * @param string $title
	 *
	 * @return void
	 */
	public function anErrorShouldBeDisplayedOnTheGeneralExceptionPageWithTitle(string $title):void {
		Assert::assertEquals(
			$title,
			$this->generalExceptionPage->getExceptionTitle(),
			__METHOD__
			. " The title of the exception on general exception webUI page was expected to be '$title' but found '"
			. $this->generalExceptionPage->getExceptionTitle()
			. "' instead."
		);
	}

	/**
	 * @Then a message should be displayed on the general exception webUI page containing :message
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function anErrorShouldBeDisplayedOnTheGeneralErrorPageContaining(string $message):void {
		Assert::assertStringContainsString(
			$message,
			$this->generalExceptionPage->getExceptionMessage(),
			__METHOD__
			. " A message containing '$message' was expected to be displayed on the general exception page, but got '"
			. $this->generalExceptionPage->getExceptionMessage()
			. "' instead."
		);
	}

	/**
	 * @When /^the administrator (disables|enables) the setting "([^"]*)" in the section "([^"]*)"$/
	 *
	 * @param string $value
	 * @param string $setting
	 * @param string $section
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminSwitchesSettingInSection(string $value, string $setting, string $section):void {
		if ($value === "enables") {
			$value = "enabled";
		} elseif ($value === "disables") {
			$value = "disabled";
		}
		$this->settingInSectionHasBeen($setting, $section, $value);
	}

	/**
	 * @Given /^the setting "([^"]*)" in the section "([^"]*)" has been (disabled|enabled)$/
	 *
	 * @param string $setting
	 * @param string $section
	 * @param string $value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function settingInSectionHasBeen(string $setting, string $section, string $value):void {
		if ($value === "enabled") {
			$value = true;
		} elseif ($value === "disabled") {
			$value = false;
		} else {
			throw new InvalidArgumentException(
				"$value can only be 'disabled' or 'enabled'"
			);
		}

		$capability = $this->capabilities[\strtolower($section)][$setting];
		$change = AppConfigHelper::setCapability(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$capability['capabilitiesApp'],
			$capability['capabilitiesParameter'],
			$capability['testingApp'],
			$capability['testingParameter'],
			$value,
			$this->getSavedCapabilitiesXml()[$this->featureContext->getBaseUrl()],
			$this->featureContext->getStepLineRef()
		);
		$this->addToSavedCapabilitiesChanges($change);
	}

	/**
	 *
	 * @When the user/administrator reloads the current page of the webUI
	 * @Given the user/administrator has reloaded the current page of the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserReloadsTheCurrentPageOfTheWebUI():void {
		$this->getSession()->reload();
		$pageObject = $this->getCurrentPageObject();
		if ($pageObject === null) {
			$pageObject = $this->owncloudPage;
		}
		$pageObject->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * returns the saved capabilities as XML
	 *
	 * @return array|null
	 */
	public function getSavedCapabilitiesXml():?array {
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
	public function addToSavedCapabilitiesChanges(array $change):void {
		if (\sizeof($change) > 0) {
			$this->savedCapabilitiesChanges = \array_merge(
				$this->savedCapabilitiesChanges,
				$change
			);
		}
	}

	/**
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setUpScenario(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');

		try {
			$this->webUIFilesContext = $environment->getContext('WebUIFilesContext');
			// getting env variable "MOBILE_RESOLUTION" which is set in drone.star
			// It denotes the size of browser's window as WidthxHeight and runs
			// selected tests in that resolution.
			$mobileResolution = getenv("MOBILE_RESOLUTION");
			// checking if MOBILE_RESOLUTION is set
			if (!empty($mobileResolution)) {
				echo "Running webUI test under resolution: $mobileResolution";
				// splits "x" separated string into indexed array
				// eg: 375x812 into array("375", "812")
				$mobileResolution = explode("x", $mobileResolution);
				$width = (int)$mobileResolution[0];
				$height = (int)$mobileResolution[1];
				$this->getSession()->resizeWindow($width, $height, 'current');
			}
		} catch (Exception $e) {
			//we don't care if the context cannot be found
			//if the developer forgets to include it the test will fail anyway
			//but by ignoring this error we do not force every UI test suite
			//to include FilesContext
		}

		SetupHelper::init(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);

		$response = AppConfigHelper::getCapabilities(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getStepLineRef()
		);

		$capabilitiesXml = AppConfigHelper::getCapabilitiesXml(
			$response
		);

		$this->savedCapabilitiesXml[$this->featureContext->getBaseUrl()]
			= $capabilitiesXml;

		if ($this->oldCSRFSetting === null) {
			$oldCSRFSetting = SetupHelper::getSystemConfigValue(
				'csrf.disabled',
				$this->featureContext->getStepLineRef()
			);
			$this->oldCSRFSetting = \trim($oldCSRFSetting);
		}
		SetupHelper::setSystemConfig(
			'csrf.disabled',
			'true',
			$this->featureContext->getStepLineRef(),
			'boolean'
		);

		//TODO make it smarter to be able also to work with other backends
		if ($this->featureContext->isTestingWithLdap()) {
			$result = SetupHelper::runOcc(
				["user:sync", "OCA\User_LDAP\User_Proxy", "-m remove"],
				$this->featureContext->getStepLineRef()
			);
			if ((int) $result['code'] !== 0) {
				throw new Exception(
					"could not sync users with LDAP. stdOut:\n" .
					"{$result['stdOut']}\n" .
					"stdErr:\n" .
					"{$result['stdErr']}\n"
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
	 * @throws Exception
	 */
	public function disablePreviewBeforeScenario():void {
		$this->featureContext->runFunctionOnEveryServer(
			function ($server) {
				if (!isset($this->oldPreviewSetting[$server])) {
					$oldPreviewSetting = SetupHelper::getSystemConfigValue(
						'enable_previews',
						$this->featureContext->getStepLineRef()
					);
					$this->oldPreviewSetting[$server] = \trim($oldPreviewSetting);
				}
				SetupHelper::setSystemConfig(
					'enable_previews',
					'false',
					$this->featureContext->getStepLineRef(),
					'boolean'
				);
			}
		);
	}

	/**
	 * enable the previews on all tests tagged with '@enablePreviews'
	 *
	 * Sometimes when testing locally, or if the `enable_previews` is turned off,
	 * the tests such as the one testing thumbnails may fail. This enables the preview
	 * on such tests.
	 *
	 * @BeforeScenario @webUI&&@enablePreviews
	 *
	 * @return void
	 * @throws Exception
	 */
	public function enablePreviewBeforeScenario():void {
		$this->featureContext->runFunctionOnEveryServer(
			function ($server) {
				if (!isset($this->oldPreviewSetting[$server])) {
					$oldPreviewSetting = SetupHelper::getSystemConfigValue(
						'enable_previews',
						$this->featureContext->getStepLineRef()
					);
					$this->oldPreviewSetting[$server] = \trim($oldPreviewSetting);
				}
				SetupHelper::setSystemConfig(
					'enable_previews',
					'true',
					$this->featureContext->getStepLineRef(),
					'boolean'
				);
			}
		);
	}

	/**
	 * @return string
	 */
	public function getSessionId():string {
		$url = $this->getSession()->getDriver()->getWebDriverSession()->getUrl();
		$parts = \explode('/', $url);
		$sessionId = \array_pop($parts);
		return $sessionId;
	}

	/**
	 * After Scenario. Sets back old settings
	 *
	 * @AfterScenario @webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function tearDownSuite():void {
		AppConfigHelper::modifyAppConfigs(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->savedCapabilitiesChanges,
			$this->featureContext->getStepLineRef()
		);

		$this->featureContext->runFunctionOnEveryServer(
			function ($server) {
				if (isset($this->oldPreviewSetting[$server])
					&& $this->oldPreviewSetting[$server] === ""
				) {
					SetupHelper::deleteSystemConfig('enable_previews');
				} elseif (isset($this->oldPreviewSetting[$server])) {
					SetupHelper::setSystemConfig(
						'enable_previews',
						$this->oldPreviewSetting[$server],
						$this->featureContext->getStepLineRef(),
						'boolean'
					);
				}
			}
		);

		if ($this->oldCSRFSetting === "") {
			SetupHelper::deleteSystemConfig(
				'csrf.disabled',
				$this->featureContext->getStepLineRef()
			);
		} elseif ($this->oldCSRFSetting !== null) {
			SetupHelper::setSystemConfig(
				'csrf.disabled',
				$this->oldCSRFSetting,
				$this->featureContext->getStepLineRef(),
				'boolean'
			);
		}
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
	public function reportResult(AfterScenarioScope $afterScenarioScope):void {
		if ($afterScenarioScope->getTestResult()->isPassed()) {
			$passOrFail = "pass";
			$passed = "true";
		} else {
			$passOrFail = "fail";
			$passed = "false";
		}

		$sauceUsername = \getenv('SAUCE_USERNAME');
		$sauceAccessKey = \getenv('SAUCE_ACCESS_KEY');

		if ($sauceUsername && $sauceAccessKey) {
			$jobId = $this->getSessionId();
			\error_log("SAUCELABS RESULT: ($passOrFail) https://saucelabs.com/jobs/$jobId");
			\exec('curl -X PUT -s -d "{\"passed\": ' . $passed . '}" -u ' . $sauceUsername . ':' . $sauceAccessKey . ' https://saucelabs.com/rest/v1/$SAUCE_USERNAME/jobs/' . $jobId);
		} else {
			\error_log("SCENARIO RESULT: ($passOrFail)");
		}
	}
}
