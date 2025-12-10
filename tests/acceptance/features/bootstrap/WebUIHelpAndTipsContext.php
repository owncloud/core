<?php declare(strict_types=1);

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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\HelpAndTipsPage;
use PHPUnit\Framework\Assert;
use TestHelpers\SetupHelper;

require_once 'bootstrap.php';

/**
 * WebUI HelpAndTips context.
 */
class WebUIHelpAndTipsContext extends RawMinkContext implements Context {
	private HelpAndTipsPage $helpAndTipsPage;
	private WebUIGeneralContext $webUIGeneralContext;
	private FeatureContext $featureContext;

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
	 * return the actual link from the help and tips page
	 *
	 * @param string $to
	 *
	 * @return string
	 * @throws Exception
	 */
	protected function generateHelpLinks(string $to):string {
		$version = SetupHelper::getSystemConfigValue(
			'version',
			$this->featureContext->getStepLineRef()
		);
		$version = \explode(".", $version);
		$version = $version[0] . "." . $version[1];
		return "https://doc.owncloud.com/server/$version/go.php?to=$to";
	}

	/**
	 * return link id for for help and tips links
	 *
	 * @param string $linkTitle
	 *
	 * @return string
	 * @throws Exception
	 */
	protected function getLinkID(string $linkTitle):string {
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
				throw new Exception("The Link with title '$linkTitle' was not found");
		}
	}

	/**
	 * @Given the administrator has browsed to the help and tips page
	 * @When the administrator browses to the help and tips page
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasBrowsedToTheHelpAndTipsPage():void {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->helpAndTipsPage->open();
	}

	/**
	 * @Then the link for :linkTitle should be shown on the webUI
	 *
	 * @param string $linkTitle
	 *
	 * @return void
	 */
	public function theLinkForShouldBeShownOnTheWebui(string $linkTitle):void {
		$link = $this->helpAndTipsPage->getLinkByTitle($linkTitle);
		$this->helpAndTipsPage->assertElementNotNull(
			$link,
			"the link with title '$linkTitle' does not exist"
		);
	}

	/**
	 * @Then the link for :linkTitle should be valid
	 *
	 * @param string $linkTitle
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLinkForShouldBeValid(string $linkTitle):void {
		$linkUrl = $this->generateHelpLinks($this->getLinkID($linkTitle));
		$linkOnUI = $this->helpAndTipsPage->getLinkUrlByTitle($linkTitle);
		Assert::assertSame(
			$linkUrl,
			$linkOnUI,
			__METHOD__
			. " The link url '$linkUrl' and the link on the UI '$linkOnUI' do not match for '$linkTitle'"
		);
	}

	/**
	 * @When the administrator opens the link for :linkTitle
	 *
	 * @param string $linkTitle
	 *
	 * @return void
	 */
	public function theAdministratorOpensTheLinkFor(string $linkTitle):void {
		$link = $this->helpAndTipsPage->getLinkByTitle($linkTitle);
		$link->click();

		// switch to the next tab as the link opens in the new tab
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
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');

		// Initialize SetupHelper class
		SetupHelper::init(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
	}
}
