<?php declare(strict_types=1);
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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Tests\Acceptance\Page\FilesPage;
use Tests\Acceptance\Page\SearchResultInOtherFoldersPage;

require_once 'bootstrap.php';

/**
 * WebUI Search context.
 */
class WebUISearchContext extends RawMinkContext implements Context {
	private SearchResultInOtherFoldersPage $searchResultInOtherFoldersPage;
	private FilesPage $filesPage;
	private WebUIGeneralContext $webUIGeneralContext;
	private WebUIFilesContext $webUIFilesContext;

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
	 * @throws Exception
	 */
	public function theUserSearchesUsingTheWebUI(string $searchTerm):void {
		$this->filesPage->waitTillPageIsLoaded($this->getSession());
		$this->filesPage->search($this->getSession(), $searchTerm);
	}

	/**
	 * @Then /^(?:file|folder) ((?:'[^']*')|(?:"[^"]*")) with path ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed in the search results in the other folders section on the webUI$/
	 *
	 * @param string $fileName
	 * @param string $path
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileWithPathShouldBeListedInSearchResultOtherFolders(string $fileName, string $path, string $shouldOrNot):void {
		$fileName = \trim($fileName, $fileName[0]);
		$path = \trim($path, $path[0]);
		$this->webUIGeneralContext->setCurrentPageObject($this->searchResultInOtherFoldersPage);
		$this->webUIFilesContext->checkIfFileFolderIsListedOnTheWebUI(
			$fileName,
			$shouldOrNot,
			"search results page",
			"",
			$path
		);
	}

	/**
	 * @Then /^(?:file|folder) ((?:'[^']*')|(?:"[^"]*")) should (not|)\s?be listed in the search results in the other folders section on the webUI$/
	 *
	 * @param string $fileName
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileShouldNotBeListedInSearchResultOtherFolders(string $fileName, string $shouldOrNot):void {
		$fileName = \trim($fileName, $fileName[0]);
		$this->webUIGeneralContext->setCurrentPageObject($this->searchResultInOtherFoldersPage);
		$this->webUIFilesContext->checkIfFileFolderIsListedOnTheWebUI(
			$fileName,
			$shouldOrNot,
			"search results page"
		);
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
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
		$this->webUIFilesContext = $environment->getContext('WebUIFilesContext');
	}
}
