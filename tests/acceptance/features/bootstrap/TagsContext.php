<?php declare(strict_types=1);
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\Assert;
use TestHelpers\TagsHelper;
use TestHelpers\WebDavHelper;
use TestHelpers\HttpRequestHelper;

require_once 'bootstrap.php';

/**
 * Acceptance test steps related to testing tags features
 */
class TagsContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @var array
	 */
	private $createdTags = [];

	/**
	 * @param string $user
	 * @param string $userVisible "true", "1" or "false", "0"
	 * @param string $userAssignable "true", "1" or "false", "0"
	 * @param string $userEditable "true", "1" or "false", "0"
	 * @param string $name
	 * @param string|null $groups
	 *
	 * @return void
	 */
	private function createTag(
		string $user,
		string $userVisible,
		string $userAssignable,
		string $userEditable,
		string $name,
		?string $groups = null
	):void {
		$response = TagsHelper::createTag(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getPasswordForUser($user),
			$name,
			$this->featureContext->getStepLineRef(),
			$userVisible,
			$userAssignable,
			$userEditable,
			$groups,
			$this->featureContext->getDavPathVersion('systemtags')
		);
		$this->featureContext->setResponse($response);
		$responseHeaders = $response->getHeaders();
		if (isset($responseHeaders['Content-Location'][0])) {
			$tagUrl = $responseHeaders['Content-Location'][0];
			$lastTagId = \substr($tagUrl, \strrpos($tagUrl, '/') + 1);
			$this->createdTags[$lastTagId]['name'] = $name;
			$this->createdTags[$lastTagId]['userAssignable']
				= (($userAssignable === 'true') || ($userAssignable === '1'));
		}
	}

	/**
	 * Adds to the list of created tags using display name
	 *
	 * @param string $tagDisplayName
	 *
	 * @return void
	 */
	public function addToTheListOfCreatedTagsByDisplayName(string $tagDisplayName):void {
		$tagId = $this->findTagIdByName($tagDisplayName);
		$this->createdTags[$tagId]['name'] = $tagDisplayName;
		$this->createdTags[$tagId]['userAssignable'] = true;
	}

	/**
	 * Return list of created tags
	 *
	 * @return array
	 */
	public function getListOfCreatedTags():array {
		return $this->createdTags;
	}

	/**
	 * @param SimpleXMLElement $tagData
	 * @param string $type
	 *
	 * @return void
	 * @throws Exception
	 */
	private function assertTypeOfTag(SimpleXMLElement $tagData, string $type):void {
		$userAttributes = TagsHelper::validateTypeOfTag($type);
		$userVisible = $userAttributes[0];
		$userAssignable = $userAttributes[1];

		$tagDisplayName = $tagData->xpath(".//oc:display-name");
		Assert::assertArrayHasKey(
			0,
			$tagDisplayName,
			"cannot find 'oc:display-name' property"
		);
		$tagDisplayName = $tagDisplayName[0]->__toString();

		$tagUserVisible = $tagData->xpath(".//oc:user-visible");
		Assert::assertArrayHasKey(
			0,
			$tagUserVisible,
			"cannot find 'oc:user-visible' property"
		);
		$tagUserVisible = $tagUserVisible[0]->__toString();

		$tagUserAssignable = $tagData->xpath(".//oc:user-assignable");
		Assert::assertArrayHasKey(
			0,
			$tagUserAssignable,
			"cannot find 'oc:user-assignable' property"
		);
		$tagUserAssignable = $tagUserAssignable[0]->__toString();
		if (($tagUserVisible !== $userVisible)
			|| ($tagUserAssignable !== $userAssignable)
		) {
			Assert::fail(
				"tag $tagDisplayName is not of type $type"
			);
		}
	}

	/**
	 * @param string $type
	 * @param string $name
	 * @param boolean $useTrueFalseStrings use the strings "true"/"false" else "1"/"0"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTagWithNameAsAdmin(string $type, string $name, bool $useTrueFalseStrings = true):void {
		$this->createTagWithName(
			$this->featureContext->getAdminUsername(),
			$type,
			$name,
			$useTrueFalseStrings
		);
	}

	/**
	 * @When the administrator creates a :type tag with name :name using the WebDAV API
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCreatesATagWithName(string $type, string $name):void {
		$this->createTagWithNameAsAdmin(
			$type,
			$name
		);
	}

	/**
	 * @When the administrator creates the following tags using the WebDAV API
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCreatesFollowingTags(TableNode $table):void {
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->verifyTableNodeColumns($table, ['name', 'type']);
		foreach ($table->getHash() as $row) {
			$this->createTagWithNameAsAdmin(
				$row['type'],
				$row['name']
			);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When /^the administrator creates a "([^"]*)" tag with name "([^"]*)" sending (true-false-strings|numbers) in the request using the WebDAV API$/
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $stringsOrNumbers
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCreatesATagWithNameSending(string $type, string $name, string $stringsOrNumbers):void {
		if ($stringsOrNumbers === "true-false-strings") {
			$useTrueFalseStrings = true;
		} else {
			$useTrueFalseStrings = true;
		}

		$this->createTagWithNameAsAdmin(
			$type,
			$name,
			$useTrueFalseStrings
		);
	}

	/**
	 * @Given the administrator has created a :type tag with name :name
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasCreatedATagWithName(string $type, string $name):void {
		$this->createTagWithNameAsAdmin(
			$type,
			$name
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $type
	 * @param string $name
	 * @param boolean $useTrueFalseStrings use the strings "true"/"false" else "1"/"0"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTagWithNameAsCurrentUser(string $type, string $name, bool $useTrueFalseStrings = true):void {
		$this->createTagWithName(
			$this->featureContext->getCurrentUser(),
			$type,
			$name,
			$useTrueFalseStrings
		);
	}

	/**
	 * @When the user creates a :type tag with name :name using the WebDAV API
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesATagWithName(string $type, string $name):void {
		$this->createTagWithNameAsCurrentUser(
			$type,
			$name
		);
	}

	/**
	 * @Given the user has created a :type tag with name :name
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasCreatedATagWithName(string $type, string $name):void {
		$this->createTagWithNameAsCurrentUser(
			$type,
			$name
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @param boolean $useTrueFalseStrings use the strings "true"/"false" else "1"/"0"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTagWithName(string $user, string $type, string $name, bool $useTrueFalseStrings = true) {
		$user = $this->featureContext->getActualUsername($user);
		$this->createTag(
			$user,
			TagsHelper::validateTypeOfTag($type, $useTrueFalseStrings)[0],
			TagsHelper::validateTypeOfTag($type, $useTrueFalseStrings)[1],
			TagsHelper::validateTypeOfTag($type, $useTrueFalseStrings)[2],
			$name
		);
	}

	/**
	 * @When user :user creates a :type tag with name :name using the WebDAV API
	 *
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCreatesATagWithName(string $user, string $type, string $name):void {
		$this->createTagWithName(
			$user,
			$type,
			$name
		);
	}

	/**
	 * @When /^user "([^"]*)" creates a "([^"]*)" tag with name "([^"]*)" sending (true-false-strings|numbers) in the request using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @param string $stringsOrNumbers
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCreatesATagWithNameSendingInTheRequest(
		string $user,
		string $type,
		string $name,
		string $stringsOrNumbers
	):void {
		if ($stringsOrNumbers === "true-false-strings") {
			$useTrueFalseStrings = true;
		} else {
			$useTrueFalseStrings = false;
		}

		$this->createTagWithName(
			$user,
			$type,
			$name,
			$useTrueFalseStrings
		);
	}

	/**
	 * @Given user :user has created a :type tag with name :name
	 *
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasCreatedATagWithName(string $user, string $type, string $name):void {
		$this->createTagWithName(
			$user,
			$type,
			$name
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTagWithNameAndGroupsAsCurrentUser(string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroups(
			$this->featureContext->getCurrentUser(),
			$type,
			$name,
			$groups
		);
	}

	/**
	 * @When the user creates a :type tag with name :name and groups :groups using the WebDAV API
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesATagWithNameAndGroups(string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroupsAsCurrentUser(
			$type,
			$name,
			$groups
		);
	}

	/**
	 * @Given the user has created a :type tag with name :name and groups :groups
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasCreatedATagWithNameAndGroups(string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroupsAsCurrentUser(
			$type,
			$name,
			$groups
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTagWithNameAndGroupsAsAdmin(string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroups(
			$this->featureContext->getAdminUsername(),
			$type,
			$name,
			$groups
		);
	}

	/**
	 * @When the administrator creates a :type tag with name :name and groups :groups using the WebDAV API
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCreatesATagWithNameAndGroups(string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroupsAsAdmin(
			$type,
			$name,
			$groups
		);
	}

	/**
	 * @Given the administrator has created a :type tag with name :name and groups :groups
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasCreatedATagWithNameAndGroups(string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroupsAsAdmin(
			$type,
			$name,
			$groups
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 * @param boolean $useTrueFalseStrings use the strings "true"/"false" else "1"/"0"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTagWithNameAndGroups(string $user, string $type, string $name, string $groups, bool $useTrueFalseStrings = true):void {
		$this->createTag(
			$user,
			TagsHelper::validateTypeOfTag($type, $useTrueFalseStrings)[0],
			TagsHelper::validateTypeOfTag($type, $useTrueFalseStrings)[1],
			TagsHelper::validateTypeOfTag($type, $useTrueFalseStrings)[2],
			$name,
			$groups
		);
	}

	/**
	 * @When user :user creates a :type tag with name :name and groups :groups using the WebDAV API
	 *
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCreatesATagWithNameAndGroups(string $user, string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroups(
			$user,
			$type,
			$name,
			$groups
		);
	}

	/**
	 * @Given user :user has created a :type tag with name :name and groups :groups
	 *
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasCreatedATagWithNameAndGroups(string $user, string $type, string $name, string $groups):void {
		$this->createTagWithNameAndGroups(
			$user,
			$type,
			$name,
			$groups
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param bool $withGroups
	 *
	 * @return SimpleXMLElement
	 */
	public function requestTagsForUser(string $user, bool $withGroups = false):SimpleXMLElement {
		return TagsHelper:: requestTagsForUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getPasswordForUser($user),
			$this->featureContext->getStepLineRef(),
			$withGroups
		);
	}

	/**
	 * @param string $user
	 * @param string $tagDisplayName
	 * @param bool $withGroups
	 *
	 * @return SimpleXMLElement|null
	 */
	public function requestTagByDisplayName(
		string $user,
		string $tagDisplayName,
		bool $withGroups = false
	):?SimpleXMLElement {
		$tagList = $this->requestTagsForUser($user, $withGroups);

		$tagData = $tagList->xpath(
			"//d:prop//oc:display-name[text() = '$tagDisplayName']/.."
		);
		if (isset($tagData[0])) {
			return $tagData[0];
		}

		return null;
	}

	/**
	 * @Then the following tags should exist for the administrator
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingTagsShouldExistForTheAdministrator(TableNode $table):void {
		$this->theFollowingTagsShouldExistForUser(
			$this->featureContext->getAdminUsername(),
			$table
		);
	}

	/**
	 * @Then the following tags should exist for the user
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingTagsShouldExistForTheUser(TableNode $table):void {
		$this->theFollowingTagsShouldExistForUser(
			$this->featureContext->getCurrentUser(),
			$table
		);
	}

	/**
	 * @Then the following tags should exist for user :user
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingTagsShouldExistForUser(string $user, TableNode $table):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeColumns($table, ['name', 'type']);
		foreach ($table->getHash() as $row) {
			$tagData = $this->requestTagByDisplayName($user, $row['name']);
			if ($tagData === null) {
				Assert::fail(
					"tag ${row['name']} is not in propfind answer"
				);
			} else {
				$this->assertTypeOfTag($tagData, $row['type']);
			}
		}
	}

	/**
	 * @Then tag :tagDisplayName should not exist for user :user
	 *
	 * @param string $tagDisplayName
	 * @param string $user
	 *
	 * @return void
	 */
	public function tagShouldNotExistForUser(string $tagDisplayName, string $user):void {
		$tagData = $this->requestTagByDisplayName($user, $tagDisplayName);
		Assert::assertNull(
			$tagData,
			"tag $tagDisplayName is in propfind answer"
		);
	}

	/**
	 * @Then tag :tagDisplayName should not exist for the administrator
	 *
	 * @param string $tagDisplayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingTagsShouldNotExistForTheAdministrator(string $tagDisplayName):void {
		$this->tagShouldNotExistForUser(
			$tagDisplayName,
			$this->featureContext->getAdminUsername()
		);
	}

	/**
	 * @Then tag :tagDisplayName should not exist for the user
	 *
	 * @param string $tagDisplayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingTagsShouldNotExistForTheUser(string $tagDisplayName):void {
		$this->tagShouldNotExistForUser(
			$tagDisplayName,
			$this->featureContext->getCurrentUser()
		);
	}

	/**
	 * @Then /^the user (should|should not) be able to assign the "([^"]*)" tag with name "([^"]*)"$/
	 *
	 * @param string $shouldOrNot should or should not
	 * @param string $type
	 * @param string $tagDisplayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCanAssignTheTag(
		string $shouldOrNot,
		string $type,
		string $tagDisplayName
	):void {
		$this->userCanAssignTheTag(
			$this->featureContext->getCurrentUser(),
			$shouldOrNot,
			$type,
			$tagDisplayName
		);
	}

	/**
	 * @Then /^user "([^"]*)" (should|should not) be able to assign the "([^"]*)" tag with name "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $shouldOrNot should or should not
	 * @param string $type
	 * @param string $tagDisplayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCanAssignTheTag(
		string $user,
		string $shouldOrNot,
		string $type,
		string $tagDisplayName
	):void {
		$tagData = $this->requestTagByDisplayName($user, $tagDisplayName);
		$this->assertTypeOfTag($tagData, $type);
		if ($shouldOrNot === 'should') {
			$expected = 'true';
			$errorMessage = 'Tag cannot be assigned by user but should';
		} elseif ($shouldOrNot === 'should not') {
			$expected = 'false';
			$errorMessage = 'Tag can be assigned by user but should not';
		} else {
			throw new Exception(
				'Invalid condition, must be "should" or "should not"'
			);
		}
		$canAssign = $tagData->xpath(".//oc:can-assign[text() = '$expected']");
		Assert::assertArrayHasKey(0, $canAssign, $errorMessage);
	}

	/**
	 * @Then the :type tag with name :tagName should have the groups :groups
	 *
	 * @param string $type
	 * @param string $tagName
	 * @param string $groups list of groups separated by "|"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTagHasGroup(string $type, string $tagName, string $groups):void {
		$tagData = $this->requestTagByDisplayName(
			$this->featureContext->getAdminUsername(),
			$tagName,
			true
		);
		Assert::assertNotNull(
			$tagData,
			"Tag $tagName wasn't found for admin user"
		);
		$this->assertTypeOfTag($tagData, $type);
		$groupsOfTag = $tagData->xpath(".//oc:groups");
		Assert::assertArrayHasKey(
			0,
			$groupsOfTag,
			"cannot find oc:groups element"
		);
		Assert::assertEquals(
			$groupsOfTag[0],
			$groups,
			"Tag has groups '{$groupsOfTag[0]}' instead of the expected '$groups'"
		);
	}

	/**
	 * @Then :count tags should exist for user :user
	 *
	 * @param int $count
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function tagsShouldExistForUser(int $count, string $user):void {
		Assert::assertEquals(
			(int) $count,
			\count($this->requestTagsforUser($user)),
			__METHOD__
			. " Expected $count tags, got "
			. \count($this->requestTagsForUser($user))
		);
	}

	/**
	 * @param string $name
	 *
	 * @return int
	 */
	public function findTagIdByName(string $name):int {
		$tagData = $this->requestTagByDisplayName(
			$this->featureContext->getAdminUsername(),
			$name
		);
		return TagsHelper::getTagIdFromTagData($tagData);
	}

	/**
	 * @param string $user
	 * @param string $tagDisplayName
	 * @param string $propertyName
	 * @param string $propertyValue
	 *
	 * @return ResponseInterface
	 */
	private function sendProppatchToSystemtags(
		string $user,
		string $tagDisplayName,
		string $propertyName,
		string $propertyValue
	):ResponseInterface {
		$renamedUser = $this->featureContext->getActualUsername($user);
		$tagID = $this->findTagIdByName($tagDisplayName);
		$response = WebDavHelper::proppatch(
			$this->featureContext->getBaseUrl(),
			$renamedUser,
			$this->featureContext->getPasswordForUser($user),
			"/systemtags/$tagID",
			$propertyName,
			$propertyValue,
			$this->featureContext->getStepLineRef(),
			"oc='http://owncloud.org/ns'",
			$this->featureContext->getDavPathVersion("systemtags"),
			"systemtags"
		);
		$this->featureContext->setResponse($response);
		return $response;
	}

	/**
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function editTagWithNameAndSetNameUsingWebDAVAPIAsAdmin(string $oldName, string $newName):void {
		$this->editTagName(
			$this->featureContext->getAdminUsername(),
			$oldName,
			$newName
		);
	}

	/**
	 * @When the administrator edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI(string $oldName, string $newName):void {
		$this->editTagWithNameAndSetNameUsingWebDAVAPIAsAdmin(
			$oldName,
			$newName
		);
	}

	/**
	 * @Given the administrator has edited the tag with name :oldName and set its name to :newName
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasEditedTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI(string $oldName, string $newName):void {
		$this->editTagWithNameAndSetNameUsingWebDAVAPIAsAdmin(
			$oldName,
			$newName
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function editTagWithNameAndSetNameUsingWebDAVAPIAsCurrentUser(string $oldName, string $newName):void {
		$this->editTagName(
			$this->featureContext->getCurrentUser(),
			$oldName,
			$newName
		);
	}

	/**
	 * @When the user edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI(string $oldName, string $newName):void {
		$this->editTagWithNameAndSetNameUsingWebDAVAPIAsCurrentUser(
			$oldName,
			$newName
		);
	}

	/**
	 * @Given the user has edited the tag with name :oldName and set its name to :newName
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasEditedTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI(string $oldName, string $newName):void {
		$this->editTagWithNameAndSetNameUsingWebDAVAPIAsCurrentUser(
			$oldName,
			$newName
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function editTagName(string $user, string $oldName, string $newName):void {
		$this->sendProppatchToSystemtags($user, $oldName, 'display-name', $newName);
	}

	/**
	 * @When user :user edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 *
	 * @param string $user
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI(string $user, string $oldName, string $newName):void {
		$this->editTagName(
			$user,
			$oldName,
			$newName
		);
	}

	/**
	 * @Given user :user has edited the tag with name :oldName and set its name to :newName
	 *
	 * @param string $user
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasEditedTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI(string $user, string $oldName, string $newName):void {
		$this->editTagName(
			$user,
			$oldName,
			$newName
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function editTagWithNameAndSetsGroupsUsingWebDAVAPIAsAdmin(string $oldName, string $groups):void {
		$this->editTagGroups(
			$this->featureContext->getAdminUsername(),
			$oldName,
			$groups
		);
	}

	/**
	 * @When the administrator edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI(string $oldName, string $groups):void {
		$this->editTagWithNameAndSetsGroupsUsingWebDAVAPIAsAdmin(
			$oldName,
			$groups
		);
	}

	/**
	 * @Given the administrator has edited the tag with name :oldName and set its groups to :groups
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasEditedTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI(string $oldName, string $groups):void {
		$this->editTagWithNameAndSetsGroupsUsingWebDAVAPIAsAdmin(
			$oldName,
			$groups
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function editTagWithNameAndSetGroupsUsingWebDAVAPIAsCurrentUser(string $oldName, string $groups):void {
		$this->editTagGroups(
			$this->featureContext->getCurrentUser(),
			$oldName,
			$groups
		);
	}

	/**
	 * @When the user edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI(string $oldName, string $groups):void {
		$this->editTagWithNameAndSetGroupsUsingWebDAVAPIAsCurrentUser(
			$oldName,
			$groups
		);
	}

	/**
	 * @Given the user has edited the tag with name :oldName and set its groups to :groups
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasEditedTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI(string $oldName, string $groups):void {
		$this->editTagWithNameAndSetGroupsUsingWebDAVAPIAsCurrentUser(
			$oldName,
			$groups
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function editTagGroups(string $user, string $oldName, string $groups):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->sendProppatchToSystemtags($user, $oldName, 'groups', $groups);
	}

	/**
	 * @When user :user edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 *
	 * @param string $user
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDavApi(string $user, string $oldName, string $groups):void {
		$this->editTagGroups(
			$user,
			$oldName,
			$groups
		);
	}

	/**
	 * @Given user :user has edited the tag with name :oldName and set its groups to :groups
	 *
	 * @param string $user
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasEditedTheTagWithNameAndSetsItsGroupsToUsingTheWebDavApi(string $user, string $oldName, string $groups):void {
		$this->editTagGroups(
			$user,
			$oldName,
			$groups
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $name tag name
	 *
	 * @return void
	 */
	public function deleteTag(string $user, string $name):void {
		$tagID = $this->findTagIdByName($name);
		$response = TagsHelper::deleteTag(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getPasswordForUser($user),
			$tagID,
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getDavPathVersion('systemtags')
		);
		$this->featureContext->setResponse($response);
		if ($response->getStatusCode() === 204) {
			unset($this->createdTags[$tagID]);
		}
	}

	/**
	 * @When user :user deletes the tag with name :name using the WebDAV API
	 *
	 * @param string $user
	 * @param string $name
	 *
	 * @return void
	 */
	public function userDeletesTag(string $user, string $name):void {
		$this->deleteTag(
			$user,
			$name
		);
	}

	/**
	 * @param string $name
	 *
	 * @return void
	 */
	public function deleteTagAsCurrentUser(string $name):void {
		$this->userDeletesTag(
			$this->featureContext->getCurrentUser(),
			$name
		);
	}

	/**
	 * @When the user deletes the tag with name :name using the WebDAV API
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserDeletesTagWithName(string $name):void {
		$this->deleteTagAsCurrentUser($name);
	}

	/**
	 * @param string $name
	 *
	 * @return void
	 */
	public function deleteTagAsAdmin(string $name):void {
		$this->userDeletesTag(
			$this->featureContext->getAdminUsername(),
			$name
		);
	}

	/**
	 * @When the administrator deletes the tag with name :name using the WebDAV API
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theAdministratorDeletesTagWithName(string $name):void {
		$this->deleteTagAsAdmin($name);
	}

	/**
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string|null $fileOwner
	 *
	 * @return void
	 * @throws Exception
	 */
	private function tag(
		string $taggingUser,
		string $tagName,
		string $fileName,
		?string $fileOwner = null
	):void {
		if ($fileOwner === null) {
			$fileOwner = $taggingUser;
		}

		$response = TagsHelper::tag(
			$this->featureContext->getBaseUrl(),
			$taggingUser,
			$this->featureContext->getPasswordForUser($taggingUser),
			$tagName,
			$fileName,
			$this->featureContext->getStepLineRef(),
			$fileOwner,
			$this->featureContext->getPasswordForUser($fileOwner),
			$this->featureContext->getDavPathVersion('systemtags'),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @param string $user
	 * @param string $fileName
	 * @param string|null $sharingUser
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	private function requestTagsForFile(string $user, string $fileName, ?string $sharingUser = null):SimpleXMLElement {
		$user = $this->featureContext->getActualUsername($user);
		if ($sharingUser !== null) {
			$sharingUser = $this->featureContext->getActualUsername($sharingUser);
			$fileID = $this->featureContext->getFileIdForPath($sharingUser, $fileName);
		} else {
			$fileID = $this->featureContext->getFileIdForPath($user, $fileName);
		}
		$properties = [
			'oc:id',
			'oc:display-name',
			'oc:user-visible',
			'oc:user-assignable',
			'oc:user-editable',
			'oc:can-assign'
		];
		$appPath = '/systemtags-relations/files/';
		$fullPath = $appPath . $fileID;
		$response = WebDavHelper::propfind(
			$this->featureContext->getBaseUrl(),
			$user,
			$this->featureContext->getPasswordForUser($user),
			$fullPath,
			$properties,
			$this->featureContext->getStepLineRef(),
			'1',
			'systemtags',
			$this->featureContext->getDavPathVersion('systemtags')
		);
		$this->featureContext->setResponse($response);
		return HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
	}

	/**
	 * @param string $adminOrUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addTagToFileFolderAsAdminOrUser(
		string $adminOrUser,
		string $tagName,
		string $fileName
	):void {
		$adminOrUser = $this->featureContext->getActualUsername($adminOrUser);
		if ($adminOrUser === 'administrator') {
			$taggingUser = $this->featureContext->getAdminUsername();
		} else {
			$taggingUser = $this->featureContext->getCurrentUser();
		}
		$this->addTagToFileFolder($taggingUser, $tagName, $fileName);
	}

	/**
	 * @When /^the (administrator|user) adds tag "([^"]*)" to (?:file|folder) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $adminOrUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserOrAdministratorAddsTagToFileFolder(
		string $adminOrUser,
		string $tagName,
		string $fileName
	):void {
		$this->addTagToFileFolderAsAdminOrUser(
			$adminOrUser,
			$tagName,
			$fileName
		);
	}

	/**
	 * @Given /^the (administrator|user) has added tag "([^"]*)" to (?:file|folder) "([^"]*)"$/
	 * @Given /^the (administrator|user) has toggled tag "([^"]*)" to (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $adminOrUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserOrAdministratorHasAddedTagToFileFolder(
		string $adminOrUser,
		string $tagName,
		string $fileName
	):void {
		$this->addTagToFileFolderAsAdminOrUser(
			$adminOrUser,
			$tagName,
			$fileName
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addTagToFileFolder(
		string $taggingUser,
		string $tagName,
		string $fileName
	):void {
		$taggingUser = $this->featureContext->getActualUsername($taggingUser);
		$this->tag($taggingUser, $tagName, $fileName);
	}

	/**
	 * @When /^user "([^"]*)" adds tag "([^"]*)" to (?:file|folder) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userAddsTagToFileFolder(
		string $taggingUser,
		string $tagName,
		string $fileName
	):void {
		$this->addTagToFileFolder(
			$taggingUser,
			$tagName,
			$fileName
		);
	}

	/**
	 * @Given /^user "([^"]*)" has added tag "([^"]*)" to (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasAddedTagToFileFolder(
		string $taggingUser,
		string $tagName,
		string $fileName
	):void {
		$this->addTagToFileFolder(
			$taggingUser,
			$tagName,
			$fileName
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $sharingUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function addTagToResourceSharedByUser(
		string $taggingUser,
		string $tagName,
		string $fileName,
		string $sharingUser
	):void {
		$taggingUser = $this->featureContext->getActualUsername($taggingUser);
		$sharingUser = $this->featureContext->getActualUsername($sharingUser);
		$this->tag(
			$taggingUser,
			$tagName,
			$fileName,
			$sharingUser
		);
	}

	/**
	 * @When /^user "([^"]*)" adds tag "([^"]*)" to (?:file|folder) "([^"]*)" (?:shared|owned) by user "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $sharingUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userAddsTagToSharedBy(
		string $taggingUser,
		string $tagName,
		string $fileName,
		string $sharingUser
	):void {
		$this->addTagToResourceSharedByUser(
			$taggingUser,
			$tagName,
			$fileName,
			$sharingUser
		);
	}

	/**
	 * @Given /^user "([^"]*)" has added tag "([^"]*)" to (?:file|folder) "([^"]*)" (?:shared|owned) by user "([^"]*)"$/
	 *
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $sharingUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasAddedTagToSharedBy(
		string $taggingUser,
		string $tagName,
		string $fileName,
		string $sharingUser
	):void {
		$this->addTagToResourceSharedByUser(
			$taggingUser,
			$tagName,
			$fileName,
			$sharingUser
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the HTTP status when user "([^"]*)" requests tags for (?:file|folder|entry) "([^"]*)" (?:shared|owned) by user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $fileName
	 * @param string $sharingUser
	 * @param string $status
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theHttpStatusWhenUserRequestsTagsForEntryOwnedByShouldBe(
		string $user,
		string $fileName,
		string $sharingUser,
		string $status
	):void {
		$this->requestTagsForFile($user, $fileName, $sharingUser);
		$actualStatus = $this->featureContext->getResponse()->getStatusCode();
		Assert::assertEquals(
			$status,
			$actualStatus,
			__METHOD__
			. " Expected status is '$status' but got '$actualStatus'"
		);
	}

	/**
	 * @When /^user "([^"]*)" requests tags for (?:file|folder|entry) "([^"]*)" (?:shared|owned) by user "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $fileName
	 * @param string $sharingUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function whenUserRequestsTagsForEntryOwnedByAnotherUser(
		string $user,
		string $fileName,
		string $sharingUser
	):void {
		$this->requestTagsForFile($user, $fileName, $sharingUser);
		$this->featureContext->pushToLastStatusCodesArrays();
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" (?:shared|owned) by the (administrator|user) should have the following tags$/
	 *
	 * @param string $fileName
	 * @param string $adminOrUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function sharedByTheUserOrAdminHasTheFollowingTags(
		string $fileName,
		string $adminOrUser,
		TableNode $table
	):void {
		if ($adminOrUser === 'user') {
			$sharingUser = $this->featureContext->getCurrentUser();
		} else {
			$sharingUser = $this->featureContext->getAdminUsername();
		}
		$this->sharedByHasTheFollowingTags($fileName, $sharingUser, $table);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" (?:shared|owned) by user "([^"]*)" should have the following tags$/
	 *
	 * @param string $fileName
	 * @param string $sharingUser
	 * @param TableNode $table  - Table containing tags. Should have two columns ('name' and 'type')
	 *                          e.g.
	 *                          | name | type   |
	 *                          | tag1 | normal |
	 *                          | tag2 | static |
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function sharedByHasTheFollowingTags(
		string $fileName,
		string $sharingUser,
		TableNode $table
	):bool {
		$xml = $this->requestTagsForFile($sharingUser, $fileName);
		$tagList = $xml->xpath("//d:prop");
		$found = false;
		$this->featureContext->verifyTableNodeColumns($table, ['name', 'type']);
		foreach ($table->getHash() as $row) {
			$found = false;
			foreach ($tagList as $tagData) {
				$displayName = $tagData->xpath(".//oc:display-name");
				Assert::assertArrayHasKey(
					0,
					$displayName,
					"cannot find 'oc:display-name' property"
				);
				if ($displayName[0]->__toString() === $row['name']) {
					$found = true;
					$this->assertTypeOfTag($tagData, $row['type']);
					break;
				}
			}
			if ($found === false) {
				Assert::fail(
					"tag ${row['name']} is not in propfind answer"
				);
			}
		}
		return $found;
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" should have the following tags for the (administrator|user)$/
	 *
	 * @param string $fileName
	 * @param string $adminOrUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileHasTheFollowingTagsForUserOrAdministrator(
		string $fileName,
		string $adminOrUser,
		TableNode $table
	):void {
		if ($adminOrUser === 'administrator') {
			$user = $this->featureContext->getAdminUsername();
		} else {
			$user = $this->featureContext->getCurrentUser();
		}
		$this->fileHasTheFollowingTagsForUser($fileName, $user, $table);
	}

	/**
	 * @Then file :fileName should have the following tags for user :user
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileHasTheFollowingTagsForUser(
		string $fileName,
		string $user,
		TableNode $table
	):void {
		$this->sharedByHasTheFollowingTags($fileName, $user, $table);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" (?:shared|owned) by "([^"]*)" should have no tags$/
	 *
	 * @param string $fileName
	 * @param string $sharingUser
	 *
	 * @return void
	 * @throws Exception
	 */
	public function sharedByHasNoTags(string $fileName, string $sharingUser):void {
		$sharingUser = $this->featureContext->getActualUsername($sharingUser);
		$responseXml = $this->requestTagsForFile($sharingUser, $fileName);
		$tagList = $responseXml->xpath("//d:prop");
		// The array of tags has a single "empty" item at the start.
		// If there are no tags, then the array should have just this
		// one entry.
		$numTags = \count($tagList) - 1;
		Assert::assertEquals(
			0,
			$numTags,
			"Expected no tags for '$fileName', but got '" . $numTags . "' tags"
		);
	}

	/**
	 * @Then file/folder :fileName should have no tags for user :user
	 * @Then entry :fileName should have no tags for user :user
	 * @Then /^(?:file|folder|entry) "([^"]*)" should have no tags for the (administrator|user)?$/
	 *
	 * @param string $fileName
	 * @param string|null $adminOrUser
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function fileHasNoTagsForUser(string $fileName, ?string $adminOrUser = null, ?string $user = null):void {
		if ($user === null) {
			if ($adminOrUser === 'administrator') {
				$user = $this->featureContext->getAdminUsername();
			} else {
				$user = $this->featureContext->getCurrentUser();
			}
		}
		$this->sharedByHasNoTags($fileName, $user);
	}

	/**
	 * @param string $untaggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $fileOwner
	 *
	 * @return void
	 */
	private function untag(string $untaggingUser, string $tagName, string $fileName, string $fileOwner):void {
		$untaggingUser = $this->featureContext->getActualUsername($untaggingUser);
		$fileOwner = $this->featureContext->getActualUsername($fileOwner);
		$fileID = $this->featureContext->getFileIdForPath($fileOwner, $fileName);
		$tagID = $this->findTagIdByName($tagName);
		$path = "/systemtags-relations/files/$fileID/$tagID";
		$response = $this->featureContext->makeDavRequest(
			$untaggingUser,
			"DELETE",
			$path,
			null,
			null,
			"uploads",
			(string)$this->featureContext->getDavPathVersion('systemtags')
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @param string $user
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function removeTagFromFile(string $user, string $tagName, string $fileName):void {
		$this->untag($user, $tagName, $fileName, $user);
	}

	/**
	 * @When user :user removes tag :tagName from file :fileName using the WebDAV API
	 *
	 * @param string $user
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function userRemovesTagFromFile(string $user, string $tagName, string $fileName):void {
		$this->removeTagFromFile(
			$user,
			$tagName,
			$fileName
		);
	}

	/**
	 * @param string $user
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $shareUser
	 *
	 * @return void
	 */
	public function removeTagFromFileSharedByUser(
		string $user,
		string $tagName,
		string $fileName,
		string $shareUser
	):void {
		$this->untag(
			$user,
			$tagName,
			$fileName,
			$shareUser
		);
	}

	/**
	 * @When user :user removes tag :tagName from file :fileName shared by :shareUser using the WebDAV API
	 *
	 * @param string $user
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $shareUser
	 *
	 * @return void
	 */
	public function userRemovesTagFromFileSharedBy(
		string $user,
		string $tagName,
		string $fileName,
		string $shareUser
	):void {
		$this->removeTagFromFileSharedByUser(
			$user,
			$tagName,
			$fileName,
			$shareUser
		);
	}

	/**
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $shareUser
	 *
	 * @return void
	 */
	public function removeTagFromFileSharedByUserAsAdminUsingWebDavApi(
		string $tagName,
		string $fileName,
		string $shareUser
	):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->removeTagFromFileSharedByUser($admin, $tagName, $fileName, $shareUser);
	}

	/**
	 * @When the administrator removes tag :tagName from file :fileName shared by :shareUser using the WebDAV API
	 *
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $shareUser
	 *
	 * @return void
	 */
	public function theAdministratorRemovesTheTagFromFileSharedByUsingTheWebdavApi(
		string $tagName,
		string $fileName,
		string $shareUser
	):void {
		$this->removeTagFromFileSharedByUserAsAdminUsingWebDavApi(
			$tagName,
			$fileName,
			$shareUser
		);
	}

	/**
	 * search resources with tags using the REPORT webDAV method
	 *
	 * @param string $user
	 * @param TableNode $tagNames
	 *
	 * @return void
	 * @throws Exception
	 */
	public function searchForTagsOfFileWithReportUsingWebDAVApi(string $user, TableNode $tagNames):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeColumnsCount($tagNames, 1);
		$tagNames = $tagNames->getRows();
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);
		$createdTagsArray = $this->getListOfCreatedTags();
		$createdTagIds = [];
		$createdTagNames = [];
		foreach ($createdTagsArray as $tagId => $tagArray) {
			\array_push($createdTagIds, $tagId);
			\array_push($createdTagNames, $tagArray['name']);
		}
		$body = "<?xml version='1.0' encoding='utf-8' ?>\n" .
			"	<oc:filter-files xmlns:d='DAV:' xmlns:oc='http://owncloud.org/ns' >\n" .
			"		<oc:filter-rules>\n";
		foreach ($tagNames as $tagName) {
			$found = \in_array($tagName[0], $createdTagNames);
			if ($found) {
				$index = \array_search($tagName[0], $createdTagNames);
				$body .=
					"			<oc:systemtag>$createdTagIds[$index]</oc:systemtag>\n";
			} else {
				throw new Error(
					"Expected: Tag with name $tagName[0] to be in created list, but not found!" .
					"List of created Tags: " . \implode(",", $createdTagNames)
				);
			}
		}
		$body .=
			"		</oc:filter-rules>\n" .
			"	</oc:filter-files>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"REPORT",
			null,
			null,
			$this->featureContext->getStepLineRef(),
			$body,
			2
		);
		$this->featureContext->setResponse($response);
		$responseXmlObject = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
		$responseXmlObject->registerXPathNamespace('d', 'DAV:');
		$responseXmlObject->registerXPathNamespace('oc', 'http://owncloud.org/ns');
		$this->featureContext->setResponseXmlObject($responseXmlObject);
	}

	/**
	 * @When user :user searches for resources tagged with all of the following tags using the webDAV API
	 *
	 * @param string $user
	 * @param TableNode $tagNames
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSearchesForFollowingTagsUsingWebDAVApi(string $user, TableNode $tagNames):void {
		$this->searchForTagsOfFileWithReportUsingWebDAVApi(
			$user,
			$tagNames
		);
	}

	/**
	 * @When user :user searches for resources tagged with tag :tagName using the webDAV API
	 *
	 * @param string $user
	 * @param string $tagName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSearchesForTagUsingWebDavAPI(string $user, string $tagName):void {
		$tagName = new TableNode([[$tagName]]);
		$this->searchForTagsOfFileWithReportUsingWebDAVApi($user, $tagName);
	}

	/**
	 * @Then /^as user "([^"]*)" the response should (not |)contain (file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $shouldOrNot
	 * @param string $fileOrFolder
	 * @param string $path
	 *
	 * @return void
	 */
	public function asUserFileShouldBeTaggedWithTagName(string $user, string $shouldOrNot, string $fileOrFolder, string $path):void {
		$user = $this->featureContext->getActualUsername($user);
		$expected = ($shouldOrNot === "");
		$responseResourcesArray = $this->featureContext->findEntryFromReportResponse($user);
		if ($expected) {
			Assert::assertTrue(
				\in_array($path, $responseResourcesArray),
				"Expected: $fileOrFolder $path to be present in last response, but not found! \n" .
				"Resource from response: " . \implode(",", $responseResourcesArray)
			);
		} else {
			Assert::assertFalse(
				\in_array($path, $responseResourcesArray),
				"Expected: $fileOrFolder $path not to be present in last response, but found present! \n" .
				"Resource from response: " . \implode(",", $responseResourcesArray)
			);
		}
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function cleanupTags():void {
		$this->featureContext->authContext->deleteTokenAuthEnforcedAfterScenario();
		foreach ($this->createdTags as $tagID => $tag) {
			TagsHelper::deleteTag(
				$this->featureContext->getBaseUrl(),
				$this->featureContext->getAdminUsername(),
				$this->featureContext->getAdminPassword(),
				$tagID,
				$this->featureContext->getStepLineRef(),
				2
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
}
