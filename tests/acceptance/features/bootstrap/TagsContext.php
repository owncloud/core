<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Sergio Bertolin <sbertlin@owncloud.com>
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
	 * @param bool $userVisible
	 * @param bool $userAssignable
	 * @param bool $userEditable
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 */
	private function createTag(
		$user, $userVisible, $userAssignable, $userEditable, $name, $groups = null
	) {
		$response = TagsHelper::createTag(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getPasswordForUser($user),
			$name, $userVisible, $userAssignable, $userEditable, $groups,
			$this->featureContext->getDavPathVersion('systemtags')
		);
		$this->featureContext->setResponse($response);
		$responseHeaders = $response->getHeaders();
		if (isset($responseHeaders['Content-Location'][0])) {
			$tagUrl = $responseHeaders['Content-Location'][0];
			$lastTagId = \substr($tagUrl, \strrpos($tagUrl, '/') + 1);
			$this->createdTags[$lastTagId]['name'] = $name;
			if ($userAssignable) {
				$this->createdTags[$lastTagId]['userAssignable'] = true;
			}
		}
	}

	/**
	 * Adds to the list of created tags using display name
	 *
	 * @param string $tagDisplayName
	 *
	 * @return void
	 */
	public function addToTheListOfCreatedTagsByDisplayName($tagDisplayName) {
		$tagId = $this->findTagIdByName($tagDisplayName);
		$this->createdTags[$tagId]['name'] = $tagDisplayName;
		$this->createdTags[$tagId]['userAssignable'] = true;
	}

	/**
	 * Return list of created tags
	 *
	 * @return array
	 */
	public function getListOfCreatedTags() {
		return $this->createdTags;
	}

	/**
	 * @param SimpleXMLElement $tagData
	 * @param string $type
	 *
	 * @return void
	 * @throws \Exception
	 */
	private function assertTypeOfTag($tagData, $type) {
		$userAttributes = TagsHelper::validateTypeOfTag($type);
		$userVisible = ($userAttributes[0]) ? 'true' : 'false';
		$userAssignable = ($userAttributes[1]) ? 'true' : 'false';

		$tagDisplayName = $tagData->xpath(".//oc:display-name");
		Assert::assertArrayHasKey(
			0, $tagDisplayName, "cannot find 'oc:display-name' property"
		);
		$tagDisplayName = $tagDisplayName[0]->__toString();

		$tagUserVisible = $tagData->xpath(".//oc:user-visible");
		Assert::assertArrayHasKey(
			0, $tagUserVisible, "cannot find 'oc:user-visible' property"
		);
		$tagUserVisible = $tagUserVisible[0]->__toString();

		$tagUserAssignable = $tagData->xpath(".//oc:user-assignable");
		Assert::assertArrayHasKey(
			0, $tagUserAssignable, "cannot find 'oc:user-assignable' property"
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
	 * @param string$type
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createTagWithNameAsAdmin($type, $name) {
		$this->createTagWithName(
			$this->featureContext->getAdminUsername(),
			$type,
			$name
		);
	}

	/**
	 * @When the administrator creates a :type tag with name :name using the WebDAV API
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorCreatesATagWithName($type, $name) {
		$this->createTagWithNameAsAdmin(
			$type,
			$name
		);
	}

	/**
	 * @Given the administrator has created a :type tag with name :name
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorHasCreatedATagWithName($type, $name) {
		$this->createTagWithNameAsAdmin(
			$type,
			$name
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function createTagWithNameAsCurrentUser($type, $name) {
		$this->createTagWithName(
			$this->featureContext->getCurrentUser(),
			$type,
			$name
		);
	}

	/**
	 * @When the user creates a :type tag with name :name using the WebDAV API
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserCreatesATagWithName($type, $name) {
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
	 * @throws \Exception
	 */
	public function theUserHasCreatedATagWithName($type, $name) {
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
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function createTagWithName($user, $type, $name) {
		$this->createTag(
			$user,
			TagsHelper::validateTypeOfTag($type)[0],
			TagsHelper::validateTypeOfTag($type)[1],
			TagsHelper::validateTypeOfTag($type)[2],
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
	 * @throws \Exception
	 */
	public function userCreatesATagWithName($user, $type, $name) {
		$this->createTagWithName(
			$user,
			$type,
			$name
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
	 * @throws \Exception
	 */
	public function userHasCreatedATagWithName($user, $type, $name) {
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
	 * @throws \Exception
	 */
	public function createTagWithNameAndGroupsAsCurrentUser($type, $name, $groups) {
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
	 * @throws \Exception
	 */
	public function theUserCreatesATagWithNameAndGroups($type, $name, $groups) {
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
	 * @throws \Exception
	 */
	public function theUserHasCreatedATagWithNameAndGroups($type, $name, $groups) {
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
	 * @throws \Exception
	 */
	public function createTagWithNameAndGroupsAsAdmin($type, $name, $groups) {
		$this->createTagWithNameAndGroups(
			$this->featureContext->getAdminUsername(), $type, $name, $groups
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
	 * @throws \Exception
	 */
	public function theAdministratorCreatesATagWithNameAndGroups($type, $name, $groups) {
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
	 * @throws \Exception
	 */
	public function theAdministratorHasCreatedATagWithNameAndGroups($type, $name, $groups) {
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
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function createTagWithNameAndGroups($user, $type, $name, $groups) {
		$this->createTag(
			$user,
			TagsHelper::validateTypeOfTag($type)[0],
			TagsHelper::validateTypeOfTag($type)[1],
			TagsHelper::validateTypeOfTag($type)[2],
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
	 * @throws \Exception
	 */
	public function userCreatesATagWithNameAndGroups($user, $type, $name, $groups) {
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
	 * @throws \Exception
	 */
	public function userHasCreatedATagWithNameAndGroups($user, $type, $name, $groups) {
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
	public function requestTagsForUser($user, $withGroups = false) {
		return TagsHelper:: requestTagsForUser(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getPasswordForUser($user),
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
		$user, $tagDisplayName, $withGroups = false
	) {
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
	 * @throws \Exception
	 */
	public function theFollowingTagsShouldExistForTheAdministrator(TableNode $table) {
		$this->theFollowingTagsShouldExistForUser(
			$this->featureContext->getAdminUsername(), $table
		);
	}

	/**
	 * @Then the following tags should exist for the user
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingTagsShouldExistForTheUser(TableNode $table) {
		$this->theFollowingTagsShouldExistForUser(
			$this->featureContext->getCurrentUser(), $table
		);
	}

	/**
	 * @Then the following tags should exist for user :user
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingTagsShouldExistForUser($user, TableNode $table) {
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
	public function tagShouldNotExistForUser($tagDisplayName, $user) {
		$tagData = $this->requestTagByDisplayName($user, $tagDisplayName);
		Assert::assertNull(
			$tagData, "tag $tagDisplayName is in propfind answer"
		);
	}

	/**
	 * @Then tag :tagDisplayName should not exist for the administrator
	 *
	 * @param string $tagDisplayName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingTagsShouldNotExistForTheAdministrator($tagDisplayName) {
		$this->tagShouldNotExistForUser(
			$tagDisplayName, $this->featureContext->getAdminUsername()
		);
	}

	/**
	 * @Then tag :tagDisplayName should not exist for the user
	 *
	 * @param string $tagDisplayName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingTagsShouldNotExistForTheUser($tagDisplayName) {
		$this->tagShouldNotExistForUser(
			$tagDisplayName, $this->featureContext->getCurrentUser()
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
	 * @throws \Exception
	 */
	public function theUserCanAssignTheTag(
		$shouldOrNot, $type, $tagDisplayName
	) {
		$this->userCanAssignTheTag(
			$this->featureContext->getCurrentUser(), $shouldOrNot, $type, $tagDisplayName
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
	 * @throws \Exception
	 */
	public function userCanAssignTheTag(
		$user, $shouldOrNot, $type, $tagDisplayName
	) {
		$tagData = $this->requestTagByDisplayName($user, $tagDisplayName);
		$this->assertTypeOfTag($tagData, $type);
		if ($shouldOrNot === 'should') {
			$expected = 'true';
			$errorMessage = 'Tag cannot be assigned by user but should';
		} elseif ($shouldOrNot === 'should not') {
			$expected = 'false';
			$errorMessage = 'Tag can be assigned by user but should not';
		} else {
			throw new \Exception(
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
	 * @throws \Exception
	 */
	public function theTagHasGroup($type, $tagName, $groups) {
		$tagData = $this->requestTagByDisplayName(
			$this->featureContext->getAdminUsername(), $tagName, true
		);
		Assert::assertNotNull(
			$tagData, "Tag $tagName wasn't found for admin user"
		);
		$this->assertTypeOfTag($tagData, $type);
		$groupsOfTag = $tagData->xpath(".//oc:groups");
		Assert::assertArrayHasKey(
			0, $groupsOfTag, "cannot find oc:groups element"
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
	 * @throws \Exception
	 */
	public function tagsShouldExistForUser($count, $user) {
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
	public function findTagIdByName($name) {
		$tagData = $this->requestTagByDisplayName(
			$this->featureContext->getAdminUsername(), $name
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
		$user, $tagDisplayName, $propertyName, $propertyValue
	) {
		$tagID = $this->findTagIdByName($tagDisplayName);
		$response = WebDavHelper::proppatch(
			$this->featureContext->getBaseUrl(), $user,
			$this->featureContext->getPasswordForUser($user),
			"/systemtags/$tagID", $propertyName, $propertyValue,
			"oc='http://owncloud.org/ns'",
			$this->featureContext->getDavPathVersion("systemtags"), "systemtags"
		);
		$this->featureContext->setResponse($response);
		return $response;
	}

	/**
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function editTagWithNameAndSetNameUsingWebDAVAPIAsAdmin($oldName, $newName) {
		$this->editTagName(
			$this->featureContext->getAdminUsername(), $oldName, $newName
		);
	}

	/**
	 * @When the administrator edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($oldName, $newName) {
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
	 * @throws \Exception
	 */
	public function theAdministratorHasEditedTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($oldName, $newName) {
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
	 * @throws \Exception
	 */
	public function editTagWithNameAndSetNameUsingWebDAVAPIAsCurrentUser($oldName, $newName) {
		$this->editTagName(
			$this->featureContext->getCurrentUser(), $oldName, $newName
		);
	}

	/**
	 * @When the user edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($oldName, $newName) {
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
	 * @throws \Exception
	 */
	public function theUserHasEditedTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($oldName, $newName) {
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
	 * @throws \Exception
	 */
	public function editTagName($user, $oldName, $newName) {
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
	 * @throws \Exception
	 */
	public function userEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($user, $oldName, $newName) {
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
	 * @throws \Exception
	 */
	public function userHasEditedTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($user, $oldName, $newName) {
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
	 * @throws \Exception
	 */
	public function editTagWithNameAndSetsGroupsUsingWebDAVAPIAsAdmin($oldName, $groups) {
		$this->editTagGroups(
			$this->featureContext->getAdminUsername(), $oldName, $groups
		);
	}

	/**
	 * @When the administrator edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI($oldName, $groups) {
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
	 * @throws \Exception
	 */
	public function theAdministratorHasEditedTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI($oldName, $groups) {
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
	 * @throws \Exception
	 */
	public function editTagWithNameAndSetGroupsUsingWebDAVAPIAsCurrentUser($oldName, $groups) {
		$this->editTagGroups(
			$this->featureContext->getCurrentUser(), $oldName, $groups
		);
	}

	/**
	 * @When the user edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI($oldName, $groups) {
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
	 * @throws \Exception
	 */
	public function theUserHasEditedTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI($oldName, $groups) {
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
	 * @throws \Exception
	 */
	public function editTagGroups($user, $oldName, $groups) {
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
	 * @throws \Exception
	 */
	public function userEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDavApi($user, $oldName, $groups) {
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
	 * @throws \Exception
	 */
	public function userHasEditedTheTagWithNameAndSetsItsGroupsToUsingTheWebDavApi($user, $oldName, $groups) {
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
	public function deleteTag($user, $name) {
		$tagID = $this->findTagIdByName($name);
		$response = TagsHelper::deleteTag(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getActualUsername($user),
			$this->featureContext->getPasswordForUser($user),
			$tagID,
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
	public function userDeletesTag($user, $name) {
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
	public function deleteTagAsCurrentUser($name) {
		$this->userDeletesTag(
			$this->featureContext->getCurrentUser(), $name
		);
	}

	/**
	 * @When the user deletes the tag with name :name using the WebDAV API
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserDeletesTagWithName($name) {
		$this->deleteTagAsCurrentUser($name);
	}

	/**
	 * @param string $name
	 *
	 * @return void
	 */
	public function deleteTagAsAdmin($name) {
		$this->userDeletesTag(
			$this->featureContext->getAdminUsername(), $name
		);
	}

	/**
	 * @When the administrator deletes the tag with name :name using the WebDAV API
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theAdministratorDeletesTagWithName($name) {
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
		$taggingUser, $tagName, $fileName, $fileOwner = null
	) {
		if ($fileOwner === null) {
			$fileOwner = $taggingUser;
		}

		$response = TagsHelper::tag(
			$this->featureContext->getBaseUrl(),
			$taggingUser,
			$this->featureContext->getPasswordForUser($taggingUser),
			$tagName,
			$fileName,
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
	 */
	private function requestTagsForFile($user, $fileName, $sharingUser = null) {
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
			$fullPath, $properties, 'systemtags',
			$this->featureContext->getDavPathVersion('systemtags')
		);
		$this->featureContext->setResponse($response);
		$responseXmlObject = HttpRequestHelper::getResponseXml($response);
		return $responseXmlObject;
	}

	/**
	 * @param string $adminOrUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function addTagToFileFolderAsAdminOrUser(
		$adminOrUser, $tagName, $fileName
	) {
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
	 */
	public function theUserOrAdministratorAddsTagToFileFolder(
		$adminOrUser, $tagName, $fileName
	) {
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
	 */
	public function theUserOrAdministratorHasAddedTagToFileFolder(
		$adminOrUser, $tagName, $fileName
	) {
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
		$taggingUser, $tagName, $fileName
	) {
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
		$taggingUser, $tagName, $fileName
	) {
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
		$taggingUser, $tagName, $fileName
	) {
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
		$taggingUser, $tagName, $fileName, $sharingUser
	) {
		$this->tag(
			$taggingUser,
			$tagName,
			$fileName,
			$sharingUser
		);
	}

	/**
	 * @When /^user "([^"]*)" adds tag "([^"]*)" to (?:file|folder) "([^"]*)" (?:shared|owned) by "([^"]*)" using the WebDAV API$/
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
		$taggingUser, $tagName, $fileName, $sharingUser
	) {
		$this->addTagToResourceSharedByUser(
			$taggingUser,
			$tagName,
			$fileName,
			$sharingUser
		);
	}

	/**
	 * @Given /^user "([^"]*)" has added tag "([^"]*)" to (?:file|folder) "([^"]*)" (?:shared|owned) by "([^"]*)"$/
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
		$taggingUser, $tagName, $fileName, $sharingUser
	) {
		$this->addTagToResourceSharedByUser(
			$taggingUser,
			$tagName,
			$fileName,
			$sharingUser
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the HTTP status when user "([^"]*)" requests tags for (?:file|folder|entry) "([^"]*)" (?:shared|owned) by "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $fileName
	 * @param string $sharingUser
	 * @param string $status
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theHttpStatusWhenuserRequestsTagsForEntryOwnedByShouldBe(
		$user, $fileName, $sharingUser, $status
	) {
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
	 * @Then /^(?:file|folder|entry) "([^"]*)" (?:shared|owned) by the (administrator|user) should have the following tags$/
	 *
	 * @param string $fileName
	 * @param string $adminOrUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function sharedByTheUserOrAdminHasTheFollowingTags(
		$fileName, $adminOrUser, TableNode $table
	) {
		if ($adminOrUser === 'user') {
			$sharingUser = $this->featureContext->getCurrentUser();
		} else {
			$sharingUser = $this->featureContext->getAdminUsername();
		}
		$this->sharedByHasTheFollowingTags($fileName, $sharingUser, $table);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" (?:shared|owned) by "([^"]*)" should have the following tags$/
	 *
	 * @param string $fileName
	 * @param string $sharingUser
	 * @param TableNode $table  - Table containg tags. Should have two columns ('name' and 'type')
	 *                          e.g.
	 *                          | name | type   |
	 *                          | tag1 | normal |
	 *                          | tag2 | static |
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public function sharedByHasTheFollowingTags(
		$fileName, $sharingUser, TableNode $table
	) {
		$xml = $this->requestTagsForFile($sharingUser, $fileName);
		$tagList = $xml->xpath("//d:prop");
		$found = false;
		$this->featureContext->verifyTableNodeColumns($table, ['name', 'type']);
		foreach ($table->getHash() as $row) {
			$found = false;
			foreach ($tagList as $tagData) {
				$displayName = $tagData->xpath(".//oc:display-name");
				Assert::assertArrayHasKey(
					0, $displayName, "cannot find 'oc:display-name' property"
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
	 * @throws \Exception
	 */
	public function fileHasTheFollowingTagsForUserOrAdministrator(
		$fileName, $adminOrUser, TableNode $table
	) {
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
	 * @throws \Exception
	 */
	public function fileHasTheFollowingTagsForUser(
		$fileName, $user, TableNode $table
	) {
		$this->sharedByHasTheFollowingTags($fileName, $user, $table);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" (?:shared|owned) by "([^"]*)" should have no tags$/
	 *
	 * @param string $fileName
	 * @param string $sharingUser
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function sharedByHasNoTags($fileName, $sharingUser) {
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
	 * @param string $adminOrUser
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function fileHasNoTagsForUser($fileName, $adminOrUser = null, $user = null) {
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
	private function untag($untaggingUser, $tagName, $fileName, $fileOwner) {
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
			$this->featureContext->getDavPathVersion('systemtags')
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
	public function removeTagFromFile($user, $tagName, $fileName) {
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
	public function userRemovesTagFromFile($user, $tagName, $fileName) {
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
		$user, $tagName, $fileName, $shareUser
	) {
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
		$user, $tagName, $fileName, $shareUser
	) {
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
		$tagName, $fileName, $shareUser
	) {
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
		$tagName, $fileName, $shareUser
	) {
		$this->removeTagFromFileSharedByUserAsAdminUsingWebDavApi(
			$tagName,
			$fileName,
			$shareUser
		);
	}

	/**
	 * @When user :user searches for tag :tagName using the webDAV API
	 *
	 * @param {string} $user
	 * @param {string} $tagName
	 *
	 * @return void
	 */
	public function userSearchesForTagUsingWebDavAPI($user, $tagName) {
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);
		$createdTagsArray = $this->getListOfCreatedTags();
		$body = "<?xml version='1.0' encoding='utf-8' ?>\n" .
			"	<oc:filter-files xmlns:d='DAV:' xmlns:oc='http://owncloud.org/ns' >\n" .
			"		<oc:filter-rules>\n";
		$tagIds = [];
		$tagNames = [];
		foreach ($createdTagsArray as $tagId => $tagArray) {
			\array_push($tagIds, $tagId);
			\array_push($tagNames, $tagArray['name']);
		}
		$found = \in_array($tagName, $tagNames);
		if ($found) {
			$index = \array_search($tagName, $tagNames);
			$body .=
				"			<oc:systemtag>$tagIds[$index]</oc:systemtag>\n";
		} else {
			throw new Error(
				"Expected: Tag with name $tagName to be in created list, but not found!" .
				"List of created Tags: " . \implode(",", $tagNames)
			);
		}
		$body .=
			"		</oc:filter-rules>\n" .
			"	</oc:filter-files>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl, $user, $password, "REPORT", null, null, $body, 2
		);
		$this->featureContext->setResponse($response);
		$responseXmlObject = HttpRequestHelper::getResponseXml($response);
		$responseXmlObject->registerXPathNamespace('d', 'DAV:');
		$responseXmlObject->registerXPathNamespace('oc', 'http://owncloud.org/ns');
		$this->featureContext->setResponseXmlObject($responseXmlObject);
	}

	/**
	 * @When user reports for tag :tagName using the webDAV API
	 *
	 * @param $tagName
	 *
	 * @return void
	 */
	public function userReportsForTagsOnFileUsingTheWebDavApi($tagName) {
		$this->userSearchesForTagUsingWebDavAPI(
			$this->featureContext->getCurrentUser(),
			$tagName
		);
	}

	/**
	 * @Then as user :user the response should contain file/folder :path
	 *
	 * @param $user
	 * @param $path
	 *
	 * @return void
	 */
	public function asUserFileShouldBeTaggedWithTagName($user, $path) {
		$responseResourcesArray = $this->featureContext->findEntryFromReportResponse($user);
		Assert::assertTrue(
			\in_array($path, $responseResourcesArray),
			"Expected: $path to be present in last response, but not found! \n" .
			"Resource from response: " . \implode(",", $responseResourcesArray)
		);
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function cleanupTags() {
		$this->featureContext->authContext->deleteTokenAuthEnforcedAfterScenario();
		foreach ($this->createdTags as $tagID => $tag) {
			TagsHelper::deleteTag(
				$this->featureContext->getBaseUrl(),
				$this->featureContext->getAdminUsername(),
				$this->featureContext->getAdminPassword(),
				$tagID,
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
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
