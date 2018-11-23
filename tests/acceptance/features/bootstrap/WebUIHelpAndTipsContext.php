<?php

/**
 * ownCloud
 *
 * @author Dipak Acharya <dipak@jankaritech.com>
 * @copyright Copyright (c) 2018 Dipak Acharya dipak@jankaritech.com
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
use Behat\MinkExtension\Context\RawMinkContext;
use Page\HelpAndTipsPage;

require_once 'bootstrap.php';

/**
 * WebUI HelpAndTips context.
 */
class WebUIHelpAndTipsContext extends RawMinkContext implements Context {
	private $helpAndTipsPage;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	private $pageTitle = "Settings - ownCloud";

	/**
	 * WebUIHelpAndTips constructor.
	 *
	 * @param HelpAndTipsPage $helpAndTipsPage
	 */
	public function __construct(
		HelpAndTipsPage $helpAndTipsPage
	) {
		$this->helpAndTipsPage = $helpAndTipsPage;
	}

	/**
	 * return actual link from help and tips page
	 *
	 * @param string $to
	 *
	 * @return string
	 */
	protected function generateHelpLinks($to) {
		$version = $this->featureContext->getSystemConfigValue('version');
		$version = \explode(".", $version);
		$version = (string)$version[0] . "." . (string)$version[1];
		return "https://doc.owncloud.org/server/$version/go.php?to=$to";
	}

	/**
	 * return link id for for help and tips links
	 *
	 * @param string $linkTitle
	 *
	 * @return string
	 * @throws \Exception
	 */
	protected function getLinkID($linkTitle) {
		switch ($linkTitle) {
			case "How to do backups":
				return "admin-backup";
			case "Performance tuning":
				return "admin-performance";
			case "Improving the config.php":
				return "admin-config";
			case "Theming":
				return "developer-theming";
			case "Hardening and security guidance":
				return "admin-security";
			default:
				throw new \Exception("The Link with title '$linkTitle' was not found");
		}
	}

	/**
	 * @Given the administrator has browsed to the help and tips page
	 * @When the administrator browses to the help and tips page
	 *
	 * @return void
	 */
	public function theAdministratorHasBrowsedToTheHelpAndTipsPage() {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->helpAndTipsPage->open();
	}

	/**
	 * @Then the link for :linkTitle should be shown in the webUI
	 *
	 * @param string $linkTitle
	 *
	 * @return void
	 */
	public function theLinkForShouldBeShownInTheWebui($linkTitle) {
		$link = $this->helpAndTipsPage->getLinkByTitle($linkTitle);
		$this->helpAndTipsPage->assertElementNotNull(
			$link,
			"the link with title linkTitle does not exist"
		);
	}

	/**
	 * @Then the link for :linkTitle should be valid
	 *
	 * @param string $linkTitle
	 *
	 * @return void
	 */
	public function theLinkForShouldBeValid($linkTitle) {
		$linkUrl = $this->generateHelpLinks($this->getLinkID($linkTitle));
		$linkOnUI = $this->helpAndTipsPage->getLinkUrlByTitle($linkTitle);
		PHPUnit_Framework_Assert::assertSame($linkUrl, $linkOnUI);
	}

	/**
	 * @When the administrator opens the link for :linkTitle
	 *
	 * @param string $linkTitle
	 *
	 * @return void
	 */
	public function theAdministratorOpensTheLinkFor($linkTitle) {
		$link = $this->helpAndTipsPage->getLinkByTitle($linkTitle);
		$link->click();

		// switch to next tab as the link opens in new tab
		$windowNames = $this->getSession()->getWindowNames();
		if (\count($windowNames) > 1) {
			$this->getSession()->switchToWindow($windowNames[1]);
		}
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}
}
