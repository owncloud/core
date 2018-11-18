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
use Behat\Gherkin\Node\TableNode;
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
	 * @param string $limit
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function userSearchesUsingWebDavAPI(
		$user, $pattern, $limit = null, TableNode $properties = null
	) {
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
			$baseUrl, $user, $password, "REPORT", "/", null, $body, null,
			$this->featureContext->getDavPathVersion()
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @Then file/folder :path in the search result of :user should contain these properties:
	 *
	 * @param string $path
	 * @param string $user
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function fileOrFolderInTheSearchResultShouldContainProperties(
		$path, $user, TableNode $properties
	) {
		$properties = $properties->getHash();
		$fileResult = $this->featureContext->findEntryFromPropfindResponse(
			$user, $path
		);
		PHPUnit_Framework_Assert::assertNotFalse(
			$fileResult, "could not find file/folder '$path'"
		);
		$fileProperties = $fileResult['value'][1]['value'][0]['value'];
		foreach ($properties as $property) {
			$foundProperty = false;
			foreach ($fileProperties as $fileProperty) {
				if ($fileProperty['name'] === $property['name']) {
					PHPUnit_Framework_Assert::assertRegExp(
						"/" . $property['value'] . "/", $fileProperty['value']
					);
					$foundProperty = true;
					break;
				}
			}
			PHPUnit_Framework_Assert::assertTrue(
				$foundProperty, "could not find property '" . $property['name'] . "'"
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
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
