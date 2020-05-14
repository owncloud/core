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
use PHPUnit\Framework\Assert;
use TestHelpers\Asserts\WebDav as WebDavTest;
use TestHelpers\HttpRequestHelper;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * Steps that relate to managing file/folder properties via WebDav
 */
class WebDavPropertiesContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @var array map with user as key and another map as value,
	 *            which has path as key and etag as value
	 */
	private $storedETAG = null;

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
	 * @When /^user "([^"]*)" gets the properties of (?:file|folder|entry) "([^"]*)" with depth (\d+) using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param int $depth
	 *
	 * @return void
	 */
	public function userGetsThePropertiesOfFolderWithDepth(
		$user, $path, $depth
	) {
		$this->featureContext->setResponseXmlObject(
			$this->featureContext->listFolder($user, $path, $depth)
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
	 * @throws Exception
	 */
	public function userGetsPropertiesOfFolder(
		$user, $path, $propertiesTable
	) {
		$user = $this->featureContext->getActualUsername($user);
		$properties = null;
		$this->featureContext->verifyTableNodeColumns($propertiesTable, ["propertyName"]);
		$this->featureContext->verifyTableNodeColumnsCount($propertiesTable, 1);
		if ($propertiesTable instanceof TableNode) {
			foreach ($propertiesTable->getColumnsHash() as $row) {
				$properties[] = $row["propertyName"];
			}
		}
		$depth = 0;
		if (\count($properties) > 1) {
			$depth = 'infinity';
			$this->featureContext->usingNewDavPath();
		}
		$this->featureContext->setResponseXmlObject(
			$this->featureContext->listFolder($user, $path, $depth, $properties)
		);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param TableNode $propertiesTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function getFollowingCommentPropertiesOfFileUsingWebDAVPropfindApi($user, $path, $propertiesTable) {
		$properties = null;
		$this->featureContext->verifyTableNodeColumns($propertiesTable, ["propertyName"]);
		$this->featureContext->verifyTableNodeColumnsCount($propertiesTable, 1);
		if ($propertiesTable instanceof TableNode) {
			foreach ($propertiesTable->getColumnsHash() as $row) {
				$properties[] = $row["propertyName"];
			}
		}
		$depth = 0;

		$user = $this->featureContext->getActualUsername($this->featureContext->getCurrentUser());
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		if (\count($properties) > 1) {
			$depth = 'infinity';
			$this->featureContext->usingNewDavPath();
		}
		$this->featureContext->setResponseXmlObject(
			$this->featureContext->listFolder(
				$user, $commentsPath, $depth, $properties, "comments"
			)
		);
	}

	/**
	 * @When user :user gets the following comment properties of file :path using the WebDAV PROPFIND API
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode $propertiesTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsFollowingCommentPropertiesOfFileUsingWebDAVPropfindApi($user, $path, $propertiesTable) {
		$this->getFollowingCommentPropertiesOfFileUsingWebDAVPropfindApi(
			$user,
			$path,
			$propertiesTable
		);
	}

	/**
	 * @When the user gets the following comment properties of file :arg1 using the WebDAV PROPFIND API
	 *
	 * @param string $path
	 * @param TableNode $propertiesTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserGetsFollowingCommentPropertiesOfFileUsingWebDAVPropfindApi($path, $propertiesTable) {
		$this->getFollowingCommentPropertiesOfFileUsingWebDAVPropfindApi(
			$this->featureContext->getCurrentUser(),
			$path,
			$propertiesTable
		);
	}

	/**
	 * @When /^the user gets the following properties of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $path
	 * @param TableNode|null $propertiesTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserGetsPropertiesOfFolder($path, $propertiesTable) {
		$this->userGetsPropertiesOfFolder(
			$this->featureContext->getCurrentUser(), $path, $propertiesTable
		);
	}

	/**
	 * @Given /^user "([^"]*)" has set the following properties of (?:file|folder|entry) "([^"]*)" using the WebDav API$/
	 *
	 * if no namespace prefix is provided before property, default `oc:` prefix is set for added props
	 * only and everything rest on xml is set to prefix `d:`
	 *
	 * @param string $username
	 * @param string $path
	 * @param TableNode|null $propertiesTable with following columns with column header as:
	 *                                        property: name of prop to be set
	 *                                        value: value of prop to be set
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasSetFollowingPropertiesUsingProppatch($username, $path, $propertiesTable) {
		$username = $this->featureContext->getActualUsername($username);
		$this->featureContext->verifyTableNodeColumns($propertiesTable, ['propertyName', 'propertyValue']);
		$properties = $propertiesTable->getColumnsHash();
		$this->featureContext->setResponse(
			WebDavHelper::proppatchWithMultipleProps(
				$this->featureContext->getBaseUrl(),
				$username,
				$this->featureContext->getPasswordForUser($username),
				$path,
				$properties
			)
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
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
	 * @throws Exception
	 */
	public function userGetsPropertiesOfFile(
		$user, $propertyName, $namespace, $path
	) {
		$user = $this->featureContext->getActualUsername($user);
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
	 * @When /^the public gets the following properties of (?:file|folder|entry) "([^"]*)" in the last created public link using the WebDAV API$/
	 *
	 * @param string $path
	 * @param TableNode $propertiesTable
	 *
	 * @return void
	 */
	public function publicGetsThePropertiesOfFolder($path, TableNode $propertiesTable) {
		$user = (string) $this->featureContext->getLastShareData()->data->token;
		$properties = null;
		if ($propertiesTable instanceof TableNode) {
			foreach ($propertiesTable->getRows() as $row) {
				$properties[] = $row[0];
			}
		}
		$this->featureContext->setResponseXmlObject(
			$this->featureContext->listFolder($user, $path, 0, $properties, "public-files")
		);
	}

	/**
	 * @param string $user user id who sets the property
	 * @param string $propertyName name of property in Clark notation
	 * @param string $namespace namespace in form of "x1='http://whatever.org/ns'"
	 * @param string $path path on which to set properties to
	 * @param string $propertyValue property value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setPropertyWithNamespaceOfResource(
		$user, $propertyName, $namespace, $path, $propertyValue
	) {
		$user = $this->featureContext->getActualUsername($user);
		$response =  WebDavHelper::proppatch(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getUserPassword($user), $path,
			$propertyName, $propertyValue, $namespace,
			$this->featureContext->getDavPathVersion()
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When /^user "([^"]*)" sets property "([^"]*)"  with namespace "([^"]*)" of (?:file|folder|entry) "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user user id who sets the property
	 * @param string $propertyName name of property in Clark notation
	 * @param string $namespace namespace in form of "x1='http://whatever.org/ns'"
	 * @param string $path path on which to set properties to
	 * @param string $propertyValue property value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSetsPropertyWithNamespaceOfEntryTo(
		$user, $propertyName, $namespace, $path, $propertyValue
	) {
		$this->setPropertyWithNamespaceOfResource(
			$user,
			$propertyName,
			$namespace,
			$path,
			$propertyValue
		);
	}

	/**
	 * @Given /^user "([^"]*)" has set property "([^"]*)" with namespace "([^"]*)" of (?:file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user user id who sets the property
	 * @param string $propertyName name of property in Clark notation
	 * @param string $namespace namespace in form of "x1='http://whatever.org/ns'"
	 * @param string $path path on which to set properties to
	 * @param string $propertyValue property value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasSetPropertyWithNamespaceOfEntryTo(
		$user, $propertyName, $namespace, $path, $propertyValue
	) {
		$this->setPropertyWithNamespaceOfResource(
			$user,
			$propertyName,
			$namespace,
			$path,
			$propertyValue
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
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
		Assert::assertArrayHasKey(
			0, $xmlPart, "Cannot find property \"$propertyName\""
		);
		Assert::assertEquals(
			$propertyValue, $xmlPart[0]->__toString(),
			"\"$propertyName\" has a value \"" .
			$xmlPart[0]->__toString() . "\" but \"$propertyValue\" expected"
		);
	}

	/**
	 * @Then /^the response should contain a custom "([^"]*)" property with namespace "([^"]*)" and complex value "(([^"\\]|\\.)*)"$/
	 *
	 * @param string $propertyName
	 * @param string $namespaceString
	 * @param string $propertyValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainACustomPropertyWithComplexValue(
		$propertyName, $namespaceString, $propertyValue
	) {
		// let's unescape quotes first
		$propertyValue = \str_replace('\"', '"', $propertyValue);
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
			"//d:prop/" . "$nameSpacePrefix:$propertyName" . "/*"
		);
		Assert::assertArrayHasKey(
			0, $xmlPart, "Cannot find property \"$propertyName\""
		);
		Assert::assertEquals(
			$propertyValue, $xmlPart[0]->asXML(),
			"\"$propertyName\" has a value \"" .
			$xmlPart[0]->asXML() . "\" but \"$propertyValue\" expected"
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
		Assert::assertTrue(
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
		Assert::assertTrue(
			isset($xmlPart[0]), "Cannot find property \"$key\""
		);
		$value = $xmlPart[0]->__toString();
		$expectedValue = $this->featureContext->substituteInLineCodes(
			$expectedValue
		);
		$expectedValue = "#^$expectedValue$#";
		$altExpectedValue = "#^$altExpectedValue$#";
		if (\preg_match($expectedValue, $value) !== 1
			&& \preg_match($altExpectedValue, $value) !== 1
		) {
			Assert::fail(
				"Property \"$key\" found with value \"$value\", " .
				"expected \"$expectedValue\" or \"$altExpectedValue\""
			);
		}
	}

	/**
	 * @Then the value of the item :xpath in the response about user :user should be :value
	 *
	 * @param string $xpath
	 * @param string $user
	 * @param string $expectedValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function assertValueOfItemInResponseIs($xpath, $user, $expectedValue) {
		$resXml = $this->featureContext->getResponseXmlObject();
		if ($resXml === null) {
			$resXml = HttpRequestHelper::getResponseXml($this->featureContext->getResponse());
		}
		$xmlPart = $resXml->xpath($xpath);
		Assert::assertTrue(
			isset($xmlPart[0]), "Cannot find item with xpath \"$xpath\""
		);
		$value = $xmlPart[0]->__toString();
		$user = \strtolower($this->featureContext->getActualUsername($user));
		$expectedValue = $this->featureContext->substituteInLineCodes(
			$expectedValue, $user
		);
		Assert::assertEquals(
			$expectedValue, $value,
			"item \"$xpath\" found with value \"$value\", " .
			"expected \"$expectedValue\""
		);
	}

	/**
	 * @Then the value of the item :xpath in the response to user :user should match :value
	 *
	 * @param string $xpath
	 * @param string $user
	 * @param string $pattern
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function assertValueOfItemInResponseRegExp($xpath, $user, $pattern) {
		$resXml = $this->featureContext->getResponseXmlObject();
		if ($resXml === null) {
			$resXml = HttpRequestHelper::getResponseXml($this->featureContext->getResponse());
		}
		$xmlPart = $resXml->xpath($xpath);
		Assert::assertTrue(
			isset($xmlPart[0]), "Cannot find item with xpath \"$xpath\""
		);
		$user = \strtolower($this->featureContext->getActualUsername($user));
		$value = $xmlPart[0]->__toString();
		$pattern = $this->featureContext->substituteInLineCodes(
			$pattern, $user, ['preg_quote' => ['/']]
		);
		Assert::assertRegExp(
			$pattern, $value,
			"item \"$xpath\" found with value \"$value\", " .
			"expected to match regex pattern: \"$pattern\""
		);
	}

	/**
	 * @Then the item :xpath in the response should not exist
	 *
	 * @param string $xpath
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function assertItemInResponseDoesNotExist($xpath) {
		$xmlPart = $this->featureContext->getResponseXmlObject()->xpath($xpath);
		Assert::assertFalse(
			isset($xmlPart[0]),
			"Found item with xpath \"$xpath\" but it should not exist"
		);
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
		Assert::assertTrue(
			isset($xmlPart[0]), "Cannot find property \"$key\""
		);
		$value = $xmlPart[0]->__toString();
		Assert::assertRegExp(
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
		$this->featureContext->verifyTableNodeColumnsCount($table, 1);
		WebdavTest::assertResponseContainsShareTypes(
			$this->featureContext->getResponseXmlObject(), $table->getRows()
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
		Assert::assertCount(
			1, $xmlPart, "Cannot find property \"$property\""
		);
		Assert::assertEmpty(
			$xmlPart[0], "Property \"$property\" is not empty"
		);
	}

	/**
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function storeEtagOfElement($user, $path) {
		$user = $this->featureContext->getActualUsername($user);
		$propertiesTable = new TableNode([['propertyName'],['getetag']]);
		$this->userGetsPropertiesOfFolder(
			$user, $path, $propertiesTable
		);
		$this->storedETAG[$user][$path]
			= $this->featureContext->getEtagFromResponseXmlObject();
	}

	/**
	 * @When user :user stores etag of element :path using the WebDAV API
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userStoresEtagOfElement($user, $path) {
		$this->storeEtagOfElement(
			$user,
			$path
		);
	}

	/**
	 * @Given user :user has stored etag of element :path
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasStoredEtagOfElement($user, $path) {
		$user = $this->featureContext->getActualUsername($user);
		$this->storeEtagOfElement(
			$user,
			$path
		);
		if ($this->storedETAG[$user][$path] === null) {
			throw new Exception("Expected stored etag to be some string but found null!");
		}
	}

	/**
	 * @Then /^the properties response should contain an etag$/
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function thePropertiesResponseShouldContainAnEtag() {
		Assert::assertTrue(
			$this->featureContext->isEtagValid(),
			__METHOD__
			. " getetag not found in response"
		);
	}

	/**
	 * @Then as user :username the last response should have the following properties
	 *
	 * only supports new dav version
	 *
	 * @param string $username
	 * @param TableNode $expectedPropTable with following columns:
	 *                                     resource: full path of resource(file/folder/entry) from root of your oc storage
	 *                                     property: expected name of property to be asserted, eg: status, href, customPropName
	 *                                     value: expected value of expected property
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theResponseShouldHavePropertyWithValue($username, $expectedPropTable) {
		$username = $this->featureContext->getActualUsername($username);
		$this->featureContext->verifyTableNodeColumns($expectedPropTable, ['resource', 'propertyName', 'propertyValue']);
		$responseXmlObject = $this->featureContext->getResponseXmlObject();

		$hrefSplittedUptoUsername = \explode("/", $responseXmlObject->xpath("//d:href")[0]);
		$xmlHrefSplittedArray = \array_slice(
			$hrefSplittedUptoUsername,
			0,
			\array_search($username, $hrefSplittedUptoUsername) + 1
		);
		$xmlHref = \implode("/", $xmlHrefSplittedArray);
		foreach ($expectedPropTable->getColumnsHash() as $col) {
			if ($col["propertyName"] === "status") {
				$xmlPart = $responseXmlObject->xpath(
					"//d:href[.='" .
					$xmlHref . $col["resource"] .
					"']/following-sibling::d:propstat//d:" .
					$col["propertyName"]
				);
			} else {
				$xmlPart = $responseXmlObject->xpath(
					"//d:href[.= '" .
					$xmlHref . $col["resource"] .
					"']/..//oc:" . $col["propertyName"]
				);
			}
			Assert::assertEquals(
				$col["propertyValue"],
				$xmlPart[0],
				__METHOD__
				. " Expected '" . $col["propertyValue"] . "' but got '" . $xmlPart[0] . "'"
			);
		}
	}

	/**
	 * @Then the etag of element :path of user :user should not have changed
	 *
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 */
	public function etagOfElementOfUserShouldNotHaveChanged($path, $user) {
		$user = $this->featureContext->getActualUsername($user);
		$propertiesTable = new TableNode([['propertyName'],['getetag']]);
		$this->userGetsPropertiesOfFolder(
			$user, $path, $propertiesTable
		);
		Assert::assertEquals(
			$this->storedETAG[$user][$path],
			$this->featureContext->getEtagFromResponseXmlObject(),
			__METHOD__
			. " The etag of element '$path' of user '$user' was not expected to change. The stored etag was '"
			. $this->storedETAG[$user][$path]
			. "' but got '"
			. $this->featureContext->getEtagFromResponseXmlObject()
			. "' from the response"
		);
	}

	/**
	 * @Then the etag of element :path of user :user should have changed
	 *
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 */
	public function etagOfElementOfUserShouldHaveChanged($path, $user) {
		$user = $this->featureContext->getActualUsername($user);
		$propertiesTable = new TableNode([['propertyName'],['getetag']]);
		$this->userGetsPropertiesOfFolder(
			$user, $path, $propertiesTable
		);
		Assert::assertNotEquals(
			$this->storedETAG[$user][$path],
			$this->featureContext->getEtagFromResponseXmlObject(),
			__METHOD__
			. " The etag of element '$path' of user '$user' was expected to change. The stored etag was '"
			. $this->storedETAG[$user][$path]
			. "' and got '"
			. $this->featureContext->getEtagFromResponseXmlObject()
			. "' from the response"
		);
	}

	/**
	 * @Then the etag of element :path of user :user on server :server should have changed
	 *
	 * @param string $path
	 * @param string $user
	 * @param string $server
	 *
	 * @return void
	 */
	public function theEtagOfElementOfUserOnServerShouldHaveChanged(
		$path, $user, $server
	) {
		$previousServer = $this->featureContext->usingServer($server);
		$this->etagOfElementOfUserShouldHaveChanged($path, $user);
		$this->featureContext->usingServer($previousServer);
	}

	/**
	 * @Then the etag of element :path of user :user on server :server should not have changed
	 *
	 * @param string $path
	 * @param string $user
	 * @param string $server
	 *
	 * @return void
	 */
	public function theEtagOfElementOfUserOnServerShouldNotHaveChanged(
		$path, $user, $server
	) {
		$previousServer = $this->featureContext->usingServer($server);
		$this->etagOfElementOfUserShouldNotHaveChanged($path, $user);
		$this->featureContext->usingServer($previousServer);
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
