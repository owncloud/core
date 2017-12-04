<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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
use TestHelpers\AppConfigHelper;
use TestHelpers\SetupHelper;
use TestHelpers\UploadHelper;
use TestHelpers\UserHelper;

require_once 'bootstrap.php';

/**
 * Feature context.
 */
class FeatureContext extends RawMinkContext implements Context {

	use BasicStructure;

	private $adminPassword;
	private $owncloudPage;
	private $loginPage;
	private $oldCSRFSetting = null;
	private $currentUser = null;
	private $currentServer = null;
	private $createdFiles = [];

	/**
	 *
	 * @var FilesContext
	 */
	private $filesContext = null;

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
	 * @return string
	 */
	public function getCurrentUser() {
		return $this->currentUser;
	}

	/**
	 * @param string $currentUser
	 * @return void
	 */
	public function setCurrentUser($currentUser) {
		$this->currentUser = $currentUser;
	}

	/**
	 * @return string
	 */
	public function getCurrentServer() {
		if (is_null($this->currentServer)) {
			return $this->getMinkParameter("base_url");
		}

		return $this->currentServer;
	}

	/**
	 * @param string $currentServer
	 * @return void
	 */
	public function setCurrentServer($currentServer) {
		$this->currentServer = $currentServer;
	}

	/**
	 * FeatureContext constructor.
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
	 * @Then a notification should be displayed with the text :notificationText
	 * @param string $notificationText expected notification text
	 * @return void
	 */
	public function aNotificationShouldBeDisplayedWithTheText($notificationText) {
		PHPUnit_Framework_Assert::assertEquals(
			$notificationText, $this->owncloudPage->getNotificationText()
		);
	}

	/**
	 * @Then notifications should be displayed with the text
	 * @param TableNode $table of expected notification text
	 * @return void
	 */
	public function notificationsShouldBeDisplayedWithTheText(TableNode $table) {
		$notifications = $this->owncloudPage->getNotifications();
		$tableRows = $table->getRows();
		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
			count($tableRows),
			count($notifications)
		);

		$notificationCounter = 0;
		foreach ($tableRows as $row) {
			PHPUnit_Framework_Assert::assertEquals(
				$row[0],
				$notifications[$notificationCounter]
			);
			$notificationCounter++;
		}
	}

	/**
	 * @Then /^((?:\d)|no)?\s?dialog[s]? should be displayed$/
	 * @param int|string|null $count
	 * @param TableNode|null $table of expected dialogs format must be:
	 *                              | title | content |
	 * @return void
	 */
	public function dialogsShouldBeDisplayed(
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
	 * @Then I should be redirected to a page with the title :title
	 * @param string $title
	 * @return void
	 */
	public function iShouldBeRedirectedToAPageWithTheTitle($title) {
		$this->owncloudPage->waitForOutstandingAjaxCalls($this->getSession());
		$actualTitle = $this->getSession()->getPage()->find(
			'xpath', './/title'
		)->getHtml();
		PHPUnit_Framework_Assert::assertEquals($title, trim($actualTitle));
	}

	/**
	 * @Then the group named :name should not exist
	 * @param string $name
	 * @return void
	 * @throws Exception
	 */
	public function theGroupNamedShouldNotExist($name) {
		$groups = UserHelper::getGroupsAsArray(
			$this->getMinkParameter("base_url"), "admin",
			$this->getUserPassword("admin")
		);
		if (in_array($name, $groups, true)) {
			throw new Exception("group '" . $name . "' exists but should not");
		}
	}

	/**
	 * @Then /^these groups should (not|)\s?exist:$/
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $table
	 * @return void
	 * @throws Exception
	 */
	public function theseGroupsShouldNotExist($shouldOrNot, TableNode $table) {
		$should = ($shouldOrNot !== "not");
		$groups = SetupHelper::getGroups();
		foreach ($table as $row) {
			if (in_array($row['groupname'], $groups, true) !== $should) {
				throw new Exception(
					"group '" . $row['groupname'] .
					"' does" . ($should ? " not" : "") .
					" exist but should" . ($should ? "" : " not")
				);
			}
		}
	}

	/**
	 * @Given /^the setting "([^"]*)" in the section "([^"]*)" is (disabled|enabled)$/
	 * @param string $setting
	 * @param string $section
	 * @param string $value
	 * @return void
	 */
	public function settingInSectionIs($setting, $section, $value) {
		if ($value === "enabled") {
			$value = true;
		} elseif ($value === "disabled") {
			$value = false;
		} else {
			throw new InvalidArgumentException("$value can only be 'disabled' or 'enabled'");
		}
		
		$capability = $this->capabilities[strtolower($section)][$setting];
		$change = AppConfigHelper::setCapability(
			$this->getMinkParameter('base_url'),
			"admin",
			$this->getUserPassword("admin"),
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
	 * @Given a file with the size of :size bytes and the name :name exists
	 * @param int $size if not int given it will be cast to int
	 * @param string $name
	 * @throws InvalidArgumentException
	 * @return void
	 */
	public function aFileWithSizeAndNameExists($size, $name) {
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
	 *         'testingApp' => string,
	 *         'testingParameter' => string,
	 *         'savedState' => bool
	 *        ]
	 * @return void
	 */
	public function addToSavedCapabilitiesChanges($change) {
		if (sizeof($change) > 0) {
			$this->savedCapabilitiesChanges[] = $change;
		}
	}

	/**
	 * @BeforeScenario
	 * @param BeforeScenarioScope $scope
	 * @return void
	 */
	public function setUpSuite(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		try {
			$this->filesContext = $environment->getContext('FilesContext');
		} catch (Exception $e) {
			//we don't care if the context cannot be found
			//if the developer forgets to include it the test will fail anyway
			//but by ignoring this error we do not force every UI test suite
			//to include FilesContext
		}

		SetupHelper::setOcPath($scope);
		$suiteParameters = SetupHelper::getSuiteParameters($scope);
		$this->adminPassword = (string)$suiteParameters['adminPassword'];
		
		$response = AppConfigHelper::getCapabilities(
			$this->getMinkParameter('base_url'), "admin", $this->getUserPassword("admin")
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
	 * @return void
	 * @AfterScenario
	 */
	public function tearDownSuite() {
		foreach ($this->savedCapabilitiesChanges as $capabilitiesChange) {
			AppConfigHelper::modifyServerConfig(
				$this->getMinkParameter('base_url'),
				"admin",
				$this->getUserPassword("admin"),
				$capabilitiesChange['testingApp'],
				$capabilitiesChange['testingParameter'],
				$capabilitiesChange['savedState'] ? 'yes' : 'no'
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
	 * After Scenario. Report the pass/fail status to SauceLabs.
	 *
	 * @param AfterScenarioScope $afterScenarioScope
	 * @return void
	 * @AfterScenario
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
