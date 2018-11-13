<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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
use Page\FilesPage;
use Page\SearchResultInOtherFoldersPage;

require_once 'bootstrap.php';

/**
 * WebUI Search context.
 */
class WebUISearchContext extends RawMinkContext implements Context {
	/**
	 *
	 * @var SearchResultInOtherFoldersPage
	 */
	private $searchResultInOtherFoldersPage;
	/**
	 *
	 * @var FilesPage
	 */
	private $filesPage;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 *
	 * @var WebUIFilesContext
	 */
	private $webUIFilesContext;

	/**
	 * WebUILoginContext constructor.
	 *
	 * @param FilesPage $filesPage
	 * @param SearchResultInOtherFoldersPage $searchResultInOtherFoldersPage
	 */
	public function __construct(
		FilesPage $filesPage,
		SearchResultInOtherFoldersPage $searchResultInOtherFoldersPage
	) {
		$this->filesPage = $filesPage;
		$this->searchResultInOtherFoldersPage = $searchResultInOtherFoldersPage;
	}

	/**
	 * @When the user searches for :searchTerm using the webUI
	 *
	 * @param string $searchTerm
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserSearchesUsingTheWebUI($searchTerm) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->search($this->getSession(), $searchTerm);
	}

	/**
	 * @Then /^the (?:file|folder) ((?:'[^']*')|(?:"[^"]*")) with the path ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed in the search results in other folders section on the webUI$/
	 *
	 * @param string $fileName
	 * @param string $path
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function fileShouldBeListedSearchResultOtherFolders($fileName, $path, $shouldOrNot) {
		$fileName = \trim($fileName, $fileName[0]);
		$path = \trim($path, $path[0]);
		$this->webUIGeneralContext->setCurrentPageObject($this->searchResultInOtherFoldersPage);
		$this->webUIFilesContext->checkIfFileFolderIsListedOnTheWebUI(
			$fileName, $shouldOrNot, "search results page", "", $path
		);
	}

	/**
	 * @Then /^the (?:file|folder) ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed in the search results in other folders section on the webUI$/
	 *
	 * @param string $fileName
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileShouldNotBeListedSearchResultOtherFolders($fileName, $shouldOrNot) {
		$fileName = \trim($fileName, $fileName[0]);
		$this->webUIGeneralContext->setCurrentPageObject($this->searchResultInOtherFoldersPage);
		$this->webUIFilesContext->checkIfFileFolderIsListedOnTheWebUI(
			$fileName, $shouldOrNot, "search results page"
		);
	}

	/**
	 * @When the user enters search text :searchTerm in the search box using the webUI
	 *
	 * @param string $searchTerm
	 *
	 * @return void
	 */
	public function theUserEntersSearchTextInTheSearchBoxUsingTheWebui($searchTerm) {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$searchbox = $this->filesPage->findById($this->filesPage->getSearchBoxId());
		$this->filesPage->assertElementNotNull(
			$searchbox,
			__METHOD__ .
			"could not find searchbox / button"
		);
		$searchbox->click();
		$searchbox->setValue($searchTerm);
	}

	/**
	 * @Then the ajax call should not start immediately
	 *
	 * @return void
	 */
	public function theAjaxCallShouldNotStartImmediately() {
		// delay for search box in UI
		$wait_time_msec = 500;

		$start = \microtime(true);
		// give 1000ms extra for timeout to make sure that the function terminates only after it finds a ajax call
		$this->filesPage->waitForAjaxCallsToStart($this->getSession(), $wait_time_msec + 1000);

		$end = \microtime(true);
		$timeout_msec = (($end - $start) * 1000);
		PHPUnit_Framework_Assert::assertGreaterThan($wait_time_msec, $timeout_msec);
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
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
		$this->webUIFilesContext = $environment->getContext('WebUIFilesContext');
	}
}
