<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
use TestHelpers\Asserts\WebDav as WebDavTest;
use TestHelpers\HttpRequestHelper;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * Steps that relate to files_versions app
 */
class WebDavPropertiesContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;
	/**
	 * @When /^user "([^"]*)" gets the properties of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsThePropertiesOfFolder(
		$user, $path
	) {
		$this->featureContext->setResponseXmlObject(
			$this->featureContext->listFolder($user, $path, 0)
		);
	}
	
	/**
	 * @When /^user "([^"]*)" gets the following properties of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode|null $propertiesTable
	 *
	 * @return void
	 */
	public function userGetsPropertiesOfFolder(
		$user, $path, $propertiesTable
	) {
		$properties = null;
		if ($propertiesTable instanceof TableNode) {
			foreach ($propertiesTable->getRows() as $row) {
				$properties[] = $row[0];
			}
		}
		$this->featureContext->setResponseXmlObject(
			$this->featureContext->listFolder($user, $path, 0, $properties)
		);
	}
	
	/**
	 * @When /^the user gets the following properties of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $path
	 * @param TableNode|null $propertiesTable
	 *
	 * @return void
	 */
	public function theUserGetsPropertiesOfFolder($path, $propertiesTable) {
		$this->userGetsPropertiesOfFolder(
			$this->featureContext->getCurrentUser(), $path, $propertiesTable
		);
	}
	
	/**
	 * @When user :user gets a custom property :propertyName with namespace :namespace of file :path
	 *
	 * @param string $user
	 * @param string $propertyName
	 * @param string $namespace namespace in form of "x1='http://whatever.org/ns'"
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsPropertiesOfFile(
		$user, $propertyName, $namespace, $path
	) {
		$properties = [
			$namespace => $propertyName
		];
		$this->featureContext->setResponse(
			WebDavHelper::propfind(
				$this->featureContext->getBaseUrl(),
				$this->featureContext->getActualUsername($user),
				$this->featureContext->getUserPassword($user), $path,
				$properties
			)
		);
	}
	
	/**
	 * @When /^user "([^"]*)" sets property "([^"]*)"  with namespace "([^"]*)" of (?:file|folder|entry) "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has set property "([^"]*)" with namespace "([^"]*)" of (?:file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user user id who sets the property
	 * @param string $propertyName name of property in Clark notation
	 * @param string $namespace namespace in form of "x1='http://whatever.org/ns'"
	 * @param string $path path on which to set properties to
	 * @param string $propertyValue property value
	 *
	 * @return void
	 */
	public function userHasSetPropertyWithNamespaceOfEntryTo(
		$user, $propertyName, $namespace, $path, $propertyValue
	) {
		WebDavHelper::proppatch(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getUserPassword($user), $path,
			$propertyName, $propertyValue, $namespace,
			$this->featureContext->getDavPathVersion()
		);
	}
	
	/**
	 * @Then /^the response should contain a custom "([^"]*)" property with namespace "([^"]*)" and value "([^"]*)"$/
	 *
	 * @param string $propertyName
	 * @param string $namespaceString
	 * @param string $propertyValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainACustomPropertyWithValue(
		$propertyName, $namespaceString, $propertyValue
	) {
		$this->featureContext->setResponseXmlObject(
			HttpRequestHelper::getResponseXml($this->featureContext->getResponse())
		);
		$responseXmlObject = $this->featureContext->getResponseXmlObject();
		//calculate the namespace prefix and namespace
		$matches = [];
		\preg_match("/^(.*)='(.*)'$/", $namespaceString, $matches);
		$nameSpace = $matches[2];
		$nameSpacePrefix = $matches[1];
		$responseXmlObject->registerXPathNamespace(
			$nameSpacePrefix, $nameSpace
		);
		$xmlPart = $responseXmlObject->xpath(
			"//d:prop/" . "$nameSpacePrefix:$propertyName"
		);
		PHPUnit_Framework_Assert::assertArrayHasKey(
			0, $xmlPart, "Cannot find property \"$propertyName\""
		);
		PHPUnit_Framework_Assert::assertEquals(
			$propertyValue, $xmlPart[0]->__toString(),
			"\"$propertyName\" has a value \"" .
			$xmlPart[0]->__toString() . "\" but \"$propertyValue\" expected"
		);
	}

	/**
	 * @Then the single response should contain a property :property with a child property :childProperty
	 *
	 * @param string $property
	 * @param string $childProperty
	 *
	 * @return void
	 *
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithChildProperty(
		$property, $childProperty
	) {
		$xmlPart = $this->featureContext->getResponseXmlObject()->xpath(
			"//d:prop/$property/$childProperty"
		);
		PHPUnit_Framework_Assert::assertTrue(
			isset($xmlPart[0]), "Cannot find property \"$property/$childProperty\""
		);
	}

	/**
	 * @Then the single response should contain a property :key with value :value
	 *
	 * @param string $key
	 * @param string $expectedValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValue(
		$key, $expectedValue
	) {
		$this->theSingleResponseShouldContainAPropertyWithValueAndAlternative(
			$key, $expectedValue, $expectedValue
		);
	}

	/**
	 * @Then the single response should contain a property :key with value :value or with value :altValue
	 *
	 * @param string $key
	 * @param string $expectedValue
	 * @param string $altExpectedValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValueAndAlternative(
		$key, $expectedValue, $altExpectedValue
	) {
		$xmlPart = $this->featureContext->getResponseXmlObject()->xpath(
			"//d:prop/$key"
		);
		PHPUnit_Framework_Assert::assertTrue(
			isset($xmlPart[0]), "Cannot find property \"$key\""
		);
		$value = $xmlPart[0]->__toString();
		
		if ($expectedValue === "a_comment_url") {
			$basePath = \ltrim($this->featureContext->getBasePath() . "/", "/");
			$expected = "#^/{$basePath}remote.php/dav/comments/files/([0-9]+)$#";
			PHPUnit_Framework_Assert::assertRegExp(
				$expected, $value,
				"Property \"$key\" found with value \"$value\", " .
				"expected \"$expectedValue\""
			);
		} elseif ($value != $expectedValue && $value != $altExpectedValue) {
			throw new \Exception(
				"Property \"$key\" found with value \"$value\", " .
				"expected \"$expectedValue\""
			);
		}
	}

	/**
	 * @Then /^as user "([^"]*)" (?:file|folder|entry) "([^"]*)" should contain a property "([^"]*)" with value "([^"]*)" or with value "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $property
	 * @param string $expectedValue
	 * @param string $altExpectedValue
	 *
	 * @return void
	 */
	public function asUserFolderShouldContainAPropertyWithValueOrWithValue(
		$user, $path, $property, $expectedValue, $altExpectedValue
	) {
		$this->featureContext->setResponseXmlObject(
			$this->featureContext->listFolder($user, $path, 0, [$property])
		);
		$this->theSingleResponseShouldContainAPropertyWithValueAndAlternative(
			$property, $expectedValue, $altExpectedValue
		);
	}

	/**
	 * @Then /^as user "([^"]*)" (?:file|folder|entry) "([^"]*)" should contain a property "([^"]*)" with value "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $property
	 * @param string $value
	 *
	 * @return void
	 */
	public function asUserFolderShouldContainAPropertyWithValue(
		$user, $path, $property, $value
	) {
		$this->asUserFolderShouldContainAPropertyWithValueOrWithValue(
			$user, $path, $property, $value, $value
		);
	}
	
	/**
	 * @Then the single response should contain a property :key with value like :regex
	 *
	 * @param string $key
	 * @param string $regex
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValueLike(
		$key, $regex
	) {
		$xmlPart = $this->featureContext->getResponseXmlObject()->xpath(
			"//d:prop/$key"
		);
		PHPUnit_Framework_Assert::assertTrue(
			isset($xmlPart[0]), "Cannot find property \"$key\""
		);
		$value = $xmlPart[0]->__toString();
		PHPUnit_Framework_Assert::assertRegExp(
			$regex, $value,
			"Property \"$key\" found with value \"$value\", expected \"$regex\""
		);
	}
	
	/**
	 * @Then the response should contain a share-types property with
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainAShareTypesPropertyWith($table) {
		WebdavTest::assertResponseContainsShareTypes(
			$this->featureContext->getResponseXmlObject(), $table
		);
	}
	
	/**
	 * @Then the response should contain an empty property :property
	 *
	 * @param string $property
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainAnEmptyProperty($property) {
		$xmlPart = $this->featureContext->getResponseXmlObject()->xpath(
			"//d:prop/$property"
		);
		PHPUnit_Framework_Assert::assertCount(
			1, $xmlPart, "Cannot find property \"$property\""
		);
		PHPUnit_Framework_Assert::assertEmpty(
			$xmlPart[0], "Property \"$property\" is not empty"
		);
	}

	/**
	 * @Then /^the properties response should contain an etag$/
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function thePropertiesResponseShouldContainAnEtag() {
		$xmlPart = $this->featureContext->getResponseXmlObject()->xpath(
			"//d:prop/d:getetag"
		);
		if (!\is_array($xmlPart)
			|| !\preg_match("/^\"[a-f0-9]{1,32}\"$/", $xmlPart[0]->__toString())
		) {
			throw new \Exception(
				"getetag not found in response"
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
