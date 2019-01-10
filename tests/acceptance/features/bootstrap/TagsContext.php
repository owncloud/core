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
use GuzzleHttp\Message\ResponseInterface;
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
		PHPUnit_Framework_Assert::assertArrayHasKey(
			0, $tagDisplayName, "cannot find 'oc:display-name' property"
		);
		$tagDisplayName = $tagDisplayName[0]->__toString();
		
		$tagUserVisible = $tagData->xpath(".//oc:user-visible");
		PHPUnit_Framework_Assert::assertArrayHasKey(
			0, $tagUserVisible, "cannot find 'oc:user-visible' property"
		);
		$tagUserVisible = $tagUserVisible[0]->__toString();
		
		$tagUserAssignable = $tagData->xpath(".//oc:user-assignable");
		PHPUnit_Framework_Assert::assertArrayHasKey(
			0, $tagUserAssignable, "cannot find 'oc:user-assignable' property"
		);
		$tagUserAssignable = $tagUserAssignable[0]->__toString();
		if (($tagUserVisible !== $userVisible)
			|| ($tagUserAssignable !== $userAssignable)
		) {
			PHPUnit_Framework_Assert::fail(
				"tag $tagDisplayName is not of type $type"
			);
		}
	}

	/**
	 * @When the administrator creates a :type tag with name :name using the WebDAV API
	 * @Given the administrator has created a :type tag with name :name
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorCreatesATagWithName($type, $name) {
		$this->createsATagWithName(
			$this->featureContext->getAdminUsername(), $type, $name
		);
	}

	/**
	 * @When the user creates a :type tag with name :name using the WebDAV API
	 * @Given the user has created a :type tag with name :name
	 *
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserCreatesATagWithName($type, $name) {
		$this->createsATagWithName(
			$this->featureContext->getCurrentUser(), $type, $name
		);
	}

	/**
	 * @When user :user creates a :type tag with name :name using the WebDAV API
	 * @Given user :user has created a :type tag with name :name
	 *
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function createsATagWithName($user, $type, $name) {
		$this->createTag(
			$user,
			TagsHelper::validateTypeOfTag($type)[0],
			TagsHelper::validateTypeOfTag($type)[1],
			TagsHelper::validateTypeOfTag($type)[2],
			$name
		);
	}

	/**
	 * @When the user creates a :type tag with name :name and groups :groups using the WebDAV API
	 * @Given the user has created a :type tag with name :name and groups :groups
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserCreatesATagWithNameAndGroups($type, $name, $groups) {
		$this->createsATagWithNameAndGroups(
			$this->featureContext->getCurrentUser(), $type, $name, $groups
		);
	}

	/**
	 * @When the administrator creates a :type tag with name :name and groups :groups using the WebDAV API
	 * @Given the administrator has created a :type tag with name :name and groups :groups
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorCreatesATagWithNameAndGroups($type, $name, $groups) {
		$this->createsATagWithNameAndGroups(
			$this->featureContext->getAdminUsername(), $type, $name, $groups
		);
	}

	/**
	 * @When user :user creates a :type tag with name :name and groups :groups using the WebDAV API
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
	public function createsATagWithNameAndGroups($user, $type, $name, $groups) {
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
		foreach ($table->getRowsHash() as $rowDisplayName => $rowType) {
			$tagData = $this->requestTagByDisplayName($user, $rowDisplayName);
			if ($tagData === null) {
				PHPUnit_Framework_Assert::fail(
					"tag $rowDisplayName is not in propfind answer"
				);
			} else {
				$this->assertTypeOfTag($tagData, $rowType);
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
		PHPUnit_Framework_Assert::assertNull(
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
		PHPUnit_Framework_Assert::assertArrayHasKey(0, $canAssign, $errorMessage);
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
		PHPUnit_Framework_Assert::assertNotNull(
			$tagData, "Tag $tagName wasn't found for admin user"
		);
		$this->assertTypeOfTag($tagData, $type);
		$groupsOfTag = $tagData->xpath(".//oc:groups");
		PHPUnit_Framework_Assert::assertArrayHasKey(
			0, $groupsOfTag, "cannot find oc:groups element"
		);
		PHPUnit_Framework_Assert::assertEquals(
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
		if ((int)$count !== \count($this->requestTagsForUser($user))) {
			throw new \Exception(
				"Expected $count tags, got "
				. \count($this->requestTagsForUser($user))
			);
		}
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
	 * @When the administrator edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 * @Given the administrator has edited the tag with name :oldName and set its name to :newName
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($oldName, $newName) {
		$this->editTagName(
			$this->featureContext->getAdminUsername(), $oldName, $newName
		);
	}

	/**
	 * @When the user edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 * @Given the user has edited the tag with name :oldName and set its name to :newName
	 *
	 * @param string $oldName
	 * @param string $newName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserEditsTheTagWithNameAndSetItsNameToUsingTheWebDAVAPI($oldName, $newName) {
		$this->editTagName(
			$this->featureContext->getCurrentUser(), $oldName, $newName
		);
	}

	/**
	 * @When user :user edits the tag with name :oldName and sets its name to :newName using the WebDAV API
	 * @Given user :user has edited the tag with name :oldName and set its name to :newName
	 *
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
	 * @When the administrator edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 * @Given the administrator has edited the tag with name :oldName and set its groups to :groups
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theAdministratorEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI($oldName, $groups) {
		$this->editTagGroups(
			$this->featureContext->getAdminUsername(), $oldName, $groups
		);
	}

	/**
	 * @When the user edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 * @Given the user has edited the tag with name :oldName and set its groups to :groups
	 *
	 * @param string $oldName
	 * @param string $groups
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserEditsTheTagWithNameAndSetsItsGroupsToUsingTheWebDAVAPI($oldName, $groups) {
		$this->editTagGroups(
			$this->featureContext->getCurrentUser(), $oldName, $groups
		);
	}

	/**
	 * @When user :user edits the tag with name :oldName and sets its groups to :groups using the WebDAV API
	 * @Given user :user has edited the tag with name :oldName and set its groups to :groups
	 *
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
	 * @When user :user deletes the tag with name :name using the WebDAV API
	 * @Given user :user has deleted the tag with name :name
	 *
	 * @param string $user
	 * @param string $name
	 *
	 * @return void
	 */
	public function userDeletesTag($user, $name) {
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
	 * @When the user deletes the tag with name :name using the WebDAV API
	 * @Given the user has deleted the tag with name :name
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theUserDeletesTagWithName($name) {
		$this->userDeletesTag(
			$this->featureContext->getCurrentUser(), $name
		);
	}

	/**
	 * @When the administrator deletes the tag with name :name using the WebDAV API
	 * @Given the administrator has deleted the tag with name :name
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theAdministratorDeletesTagWithName($name) {
		$this->userDeletesTag(
			$this->featureContext->getAdminUsername(), $name
		);
	}

	/**
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string|null $fileOwner
	 *
	 * @return void
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
	 * @When /^the (administrator|user) adds tag "([^"]*)" to (?:file|folder) "([^"]*)" using the WebDAV API$/
	 * @Given /^the (administrator|user) has added tag "([^"]*)" to (?:file|folder) "([^"]*)"$/
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
		if ($adminOrUser === 'administrator') {
			$taggingUser = $this->featureContext->getAdminUsername();
		} else {
			$taggingUser = $this->featureContext->getCurrentUser();
		}
		$this->addsTagToFileFolder($taggingUser, $tagName, $fileName);
	}

	/**
	 * @When /^user "([^"]*)" adds tag "([^"]*)" to (?:file|folder) "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has added tag "([^"]*)" to (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function addsTagToFileFolder(
		$taggingUser, $tagName, $fileName
	) {
		$this->tag($taggingUser, $tagName, $fileName);
	}

	/**
	 * @When /^user "([^"]*)" adds tag "([^"]*)" to (?:file|folder) "([^"]*)" (?:shared|owned) by "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has added tag "([^"]*)" to (?:file|folder) "([^"]*)" (?:shared|owned) by "([^"]*)"$/
	 *
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $sharingUser
	 *
	 * @return void
	 */
	public function addsTagToSharedBy(
		$taggingUser, $tagName, $fileName, $sharingUser
	) {
		$this->tag($taggingUser, $tagName, $fileName, $sharingUser);
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
		PHPUnit_Framework_Assert::assertEquals(
			$status, $this->featureContext->getResponse()->getStatusCode()
		);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" (?:shared|owned) by the (administrator|user) should have the following tags$/
	 *
	 * @param string $fileName
	 * @param string $adminOrUser
	 * @param TableNode $table
	 *
	 * @return bool
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
	 * @param TableNode $table
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
		foreach ($table->getRowsHash() as $rowDisplayName => $rowType) {
			$found = false;
			foreach ($tagList as $tagData) {
				$displayName = $tagData->xpath(".//oc:display-name");
				PHPUnit_Framework_Assert::assertArrayHasKey(
					0, $displayName, "cannot find 'oc:display-name' property"
				);
				if ($displayName[0]->__toString() === $rowDisplayName) {
					$found = true;
					$this->assertTypeOfTag($tagData, $rowType);
					break;
				}
			}
			if ($found === false) {
				PHPUnit_Framework_Assert::fail(
					"tag $rowDisplayName is not in propfind answer"
				);
			}
		}
		return $found;
	}

	/**
	 * @Then /^file "([^"]*)" should have the following tags for the (administrator|user)$/
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
	 * @return bool
	 * @throws \Exception
	 */
	public function sharedByHasNoTags($fileName, $sharingUser) {
		$responseXml = $this->requestTagsForFile($sharingUser, $fileName);
		$tagList = $responseXml->xpath("//d:prop");
		// The array of tags has a single "empty" item at the start.
		// If there are no tags, then the array should have just this
		// one entry.
		PHPUnit_Framework_Assert::assertCount(1, $tagList);
	}

	/**
	 * @Then file :fileName should have no tags for user :user
	 * @Then /^file "([^"]*)" should have no tags for the (administrator|user)?$/
	 *
	 * @param string $fileName
	 * @param string $adminOrUser
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function fileHasNoTagsForUser($fileName, $adminOrUser=null, $user=null) {
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
			null,
			$this->featureContext->getDavPathVersion('systemtags')
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When user :user removes tag :tagName from file :fileName shared by :shareUser using the WebDAV API
	 * @Given user :user has removed tag :tagName from file :fileName shared by :shareUser
	 *
	 * @param string $user
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $shareUser
	 *
	 * @return void
	 */
	public function removesTagFromFileSharedBy(
		$user, $tagName, $fileName, $shareUser
	) {
		$this->untag($user, $tagName, $fileName, $shareUser);
	}

	/**
	 * @When the administrator removes tag :tagName from file :fileName shared by :shareUser using the WebDAV API
	 * Given the administrator has removed tag :tagName from file :fileName shared by :shareUser
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
		$admin = $this->featureContext->getAdminUsername();
		$this->removesTagFromFileSharedBy($admin, $tagName, $fileName, $shareUser);
	}
	
	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function cleanupTags() {
		$this->featureContext->deleteTokenAuthEnforcedAfterScenario();
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
