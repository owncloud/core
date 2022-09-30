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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use TestHelpers\OcisHelper;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * context containing search related API steps
 */
class SearchContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @When user :user searches for :pattern using the WebDAV API
	 * @When user :user searches for :pattern and limits the results to :limit items using the WebDAV API
	 * @When user :user searches for :pattern using the WebDAV API requesting these properties:
	 * @When user :user searches for :pattern and limits the results to :limit items using the WebDAV API requesting these properties:
	 *
	 * @param string $user
	 * @param string $pattern
	 * @param string|null $limit
	 * @param TableNode|null $properties
	 *
	 * @return void
	 */
	public function userSearchesUsingWebDavAPI(
		string    $user,
		string  $pattern,
		?string	  $limit = null,
		TableNode $properties = null
	):void {
		// Because indexing of newly uploaded files or directories with ocis is decoupled and occurs asynchronously, a short wait is necessary before searching files or folders.
		if (OcisHelper::isTestingOnOcis()) {
			sleep(4);
		}
		$user = $this->featureContext->getActualUsername($user);
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);
		$body
			= "<?xml version='1.0' encoding='utf-8' ?>\n" .
			"	<oc:search-files xmlns:a='DAV:' xmlns:oc='http://owncloud.org/ns' >\n" .
			"		<oc:search>\n" .
			"			<oc:pattern>$pattern</oc:pattern>\n";
		if ($limit !== null) {
			$body .= "			<oc:limit>$limit</oc:limit>\n";
		}

		$body .= "		</oc:search>\n";
		if ($properties !== null) {
			$propertiesRows = $properties->getRows();
			$body .= "	<a:prop>";
			foreach ($propertiesRows as $property) {
				$body .= "<$property[0]/>";
			}
			$body .= "	</a:prop>";
		}
		$body .= "	</oc:search-files>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"REPORT",
			"/",
			null,
			$this->featureContext->getStepLineRef(),
			$body,
			$this->featureContext->getDavPathVersion()
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @Then file/folder :path in the search result of user :user should contain these properties:
	 *
	 * @param string $path
	 * @param string $user
	 * @param TableNode $properties
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileOrFolderInTheSearchResultShouldContainProperties(
		string $path,
		string $user,
		TableNode $properties
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeColumns($properties, ['name', 'value']);
		$properties = $properties->getHash();
		$fileResult = $this->featureContext->findEntryFromPropfindResponse(
			$path,
			$user,
			"REPORT",
		);
		Assert::assertNotFalse(
			$fileResult,
			"could not find file/folder '$path'"
		);
		$fileProperties = $fileResult['value'][1]['value'][0]['value'];
		foreach ($properties as $property) {
			$foundProperty = false;
			$property['value'] = $this->featureContext->substituteInLineCodes(
				$property['value'],
				$user
			);
			foreach ($fileProperties as $fileProperty) {
				if ($fileProperty['name'] === $property['name']) {
					Assert::assertMatchesRegularExpression(
						"/" . $property['value'] . "/",
						$fileProperty['value']
					);
					$foundProperty = true;
					break;
				}
			}
			Assert::assertTrue(
				$foundProperty,
				"could not find property '" . $property['name'] . "'"
			);
		}
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
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}

	/**
	 * @Then the search result by tags for user :user should contain these entries:
	 *
	 * @param string|null $user
	 * @param TableNode $expectedEntries
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theSearchResultByTagsForUserShouldContainTheseEntries(
		?string $user,
		TableNode $expectedEntries
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeColumnsCount($expectedEntries, 1);
		$expectedEntries = $expectedEntries->getRows();
		$expectedEntriesArray = [];
		$responseResourcesArray = $this->featureContext->findEntryFromReportResponse($user);
		foreach ($expectedEntries as $item) {
			\array_push($expectedEntriesArray, $item[0]);
		}
		Assert::assertEqualsCanonicalizing($expectedEntriesArray, $responseResourcesArray);
	}
}
