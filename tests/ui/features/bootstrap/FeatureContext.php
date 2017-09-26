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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Gherkin\Node\TableNode;
use Page\OwncloudPage;
use Page\LoginPage;

require_once 'bootstrap.php';

/**
 * Feature context.
 */
class FeatureContext extends RawMinkContext implements Context {

	use BasicStructure;

	private $owncloudPage;
	private $loginPage;

	/**
	 * FeatureContext constructor.
	 *
	 * @param OwncloudPage $owncloudPage
	 * @param LoginPage $loginPage
	 * @return void
	 */
	public function __construct(OwncloudPage $owncloudPage, LoginPage $loginPage) {
		$this->owncloudPage = $owncloudPage;
		$this->loginPage = $loginPage;
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
	 * @Then dialogs should be displayed
	 * @param TableNode $table of expected dialogs format must be:
	 *                  | title | content |
	 * @return void
	 */
	public function dialogsShouldBeDisplayed(TableNode $table) {
		$dialogs = $this->owncloudPage->getOcDialogs();
		$dialogCounter = 0;
		foreach ($table as $expectedDialog) {
			PHPUnit_Framework_Assert::assertEquals(
				$expectedDialog['title'],
				$dialogs[$dialogCounter]->getTitle()
			);
			$expectedDialog['content'] = $this->substituteInLineCodes(
				$expectedDialog['content']
			);
			PHPUnit_Framework_Assert::assertEquals(
				$expectedDialog['content'],
				$dialogs[$dialogCounter]->getMessage()
			);
			$dialogCounter++;
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
	 * @BeforeScenario
	 * @param BeforeScenarioScope $scope
	 * @return void
	 */
	public function setUpSuite(BeforeScenarioScope $scope) {
		$jobId = $this->getSessionId($scope);
		file_put_contents("/tmp/saucelabs_sessionid", $jobId);
	}

	/**
	 * @param BeforeScenarioScope $scope
	 * @return string
	 */
	public function getSessionId(BeforeScenarioScope $scope) {
		$url = $this->getSession()->getDriver()->getWebDriverSession()->getUrl();
		$parts = explode('/', $url);
		$sessionId = array_pop($parts);
		return $sessionId;
	}
}
