<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Sergio Bertolin <sbertlin@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

require __DIR__ . '/../../../../lib/composer/autoload.php';

use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Exception\ClientException;
use TestHelpers\TagsHelper;

trait Tags {

	/** @var array */
	private $createdTags = array();

	/**
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 */
	private function createTag($user, $userVisible, $userAssignable, $name, $groups = null) {
		try {
			$createdTag = TagsHelper::createTag(
				$this->baseUrlWithoutOCSAppendix(),
				$user,
				$this->getPasswordForUser($user),
				$name, $userVisible, $userAssignable, $groups,
				$this->getDavPathVersion()
			);
			$lastTagId = $createdTag['lastTagId'];
			$this->response = $createdTag['HTTPResponse'];
			array_push($this->createdTags, $lastTagId);
		} catch (ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	private function assertTypeOfTag($tagData, $type) {
		$userAttributes = TagsHelper::validateTypeOfTag($type);
		$tagDisplayName = $tagData['{http://owncloud.org/ns}display-name'];
		$userVisible = ($userAttributes[0]) ? 'true' : 'false';
		$userAssignable = ($userAttributes[1]) ? 'true' : 'false';
		if (($tagData['{http://owncloud.org/ns}user-visible'] !== $userVisible) ||
			($tagData['{http://owncloud.org/ns}user-assignable'] !== $userAssignable)){
				PHPUnit_Framework_Assert::fail("tag $tagDisplayName is not of type $type");
		}
	}

	/**
	 * @When :user creates a :type tag with name :name
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @throws \Exception
	 */
	public function createsATagWithName($user, $type, $name) {
		$this->createTag($user, TagsHelper::validateTypeOfTag($type)[0], TagsHelper::validateTypeOfTag($type)[1], $name);
	}

	/**
	 * @When :user creates a :type tag with name :name and groups :groups
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @param string $groups
	 * @throws \Exception
	 */
	public function createsATagWithNameAndGroups($user, $type, $name, $groups) {
		$this->createTag($user, TagsHelper::validateTypeOfTag($type)[0], TagsHelper::validateTypeOfTag($type)[1], $name, $groups);
	}

	public function requestTagsForUser($user, $withGroups = false) {
		$this->response = TagsHelper:: requestTagsForUser(
			$this->baseUrlWithoutOCSAppendix(),
			$user,
			$this->getPasswordForUser($user),
			$withGroups
		);
		return $this->response;
	}

	public function requestTagByDisplayName($user, $tagDisplayName, $withGroups = false) {
		$tagList = $this->requestTagsForUser($user, $withGroups);
		foreach ($tagList as $path => $tagData) {
			if (!empty($tagData) && $tagData['{http://owncloud.org/ns}display-name'] === $tagDisplayName) {
				return $tagData;
			}
		}
	}

	/**
	 * @Then The following tags should exist for :user
	 * @param string $user
	 * @param TableNode $table
	 * @throws \Exception
	 */
	public function theFollowingTagsShouldExistFor($user, TableNode $table){
		foreach($table->getRowsHash() as $rowDisplayName => $rowType) {
			$tagData = $this->requestTagByDisplayName($user, $rowDisplayName);
			if (is_null($tagData)) {
				PHPUnit_Framework_Assert::fail("tag $rowDisplayName is not in propfind answer");
			} else {
				$this->assertTypeOfTag($tagData, $rowType);
			}
		}
	}

	/**
	 * @Then tag :tagDisplayName should not exist for :user
	 * @param string $user
	 * @param TableNode $table
	 * @throws \Exception
	 */
	public function tagShouldNotExistForUser($tagDisplayName, $user){
		$tagData = $this->requestTagByDisplayName($user, $tagDisplayName);
		PHPUnit_Framework_Assert::assertNull($tagData, "tag $tagDisplayName is in propfind answer");
	}

	/**
	 * @Then the user :user :can assign The :type tag with name :tagDisplayName
	 */
	public function theUserCanAssignTheTag($user, $can, $type, $tagDisplayName) {
		$tagData = $this->requestTagByDisplayName($user, $tagDisplayName);
		$this->assertTypeOfTag($tagData, $type);
		if ($can === 'can') {
			$expected = 'true';
		} else if ($can === 'cannot') {
			$expected = 'false';
		} else {
			throw new \Exception('Invalid condition, must be "can" or "cannot"');
		}
		if ($tagData['{http://owncloud.org/ns}can-assign'] !== $expected) {
			throw new \Exception('Tag cannot be assigned by user');
		}
	}

	/**
	 * @Then The :type tag with name :tagName has the groups :groups
	 */
	public function theTagHasGroup($type, $tagName, $groups) {
		$tagData = $this->requestTagByDisplayName('admin', $tagName, true);
		PHPUnit_Framework_Assert::assertNotNull($tagData, "Tag $tagName wasn't found for admin user");
		$this->assertTypeOfTag($tagData, $type);
		PHPUnit_Framework_Assert::assertEquals($tagData['{http://owncloud.org/ns}groups'], $groups,
			'Tag has groups "' . $tagData['{http://owncloud.org/ns}groups'] . '" instead of the expected "' . $groups . '"' );
	}

	/**
	 * @Then :count tags should exist for :user
	 * @param int $count
	 * @param string $user
	 * @throws \Exception
	 */
	public function tagsShouldExistFor($count, $user)  {
		if((int)$count !== count($this->requestTagsForUser($user))) {
			throw new \Exception("Expected $count tags, got ".count($this->requestTagsForUser($user)));
		}
	}

	/**
	 * @param string $name
	 * @return int
	 */
	private function findTagIdByName($name) {
		$tagData = $this->requestTagByDisplayName('admin', $name);
		return (int)$tagData['{http://owncloud.org/ns}id'];
	}

	/**
	 * @param string $user
	 * @param string $tagDisplayName
	 * @param string $properties optional
	 */
	private function sendProppatchToSystemtags($user, $tagDisplayName, $properties = null){
		$client = $this->getSabreClient($user);
		$client->setThrowExceptions(true);
		$appPath = '/systemtags/';
		$tagID = $this->findTagIdByName($tagDisplayName);
		PHPUnit_Framework_Assert::assertNotNull($tagID, "Tag wasn't found");
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . $this->davPath . $appPath . $tagID;
		try {
			$response = $client->proppatch($fullUrl, $properties, 1);
			$this->response = $response;
			return $response;
		} catch (\Sabre\HTTP\ClientHttpException $e) {
			$this->response = null;
			return null;
		}
	}

	/**
	 * @When :user edits the tag with name :oldName and sets its name to :newName
	 * @param string $user
	 * @param string $oldName
	 * @param string $newName
	 * @throws \Exception
	 */
	public function editTagName($user, $oldName, $newName) {
		$properties = [
						'{http://owncloud.org/ns}display-name' => $newName
					  ];
		$this->sendProppatchToSystemtags($user, $oldName, $properties);
	}

	/**
	 * @When :user edits the tag with name :oldName and sets its groups to :groups
	 * @param string $user
	 * @param string $oldName
	 * @param string $groups
	 * @throws \Exception
	 */
	public function editTagGroups($user, $oldName, $groups) {
		$properties = [
						'{http://owncloud.org/ns}groups' => $groups
					  ];
		$this->sendProppatchToSystemtags($user, $oldName, $properties);
	}

	/**
	 * @Given :user deletes the tag with name :name
	 * @param string $user
	 * @param string $groupName
	 */
	public function userDeletesTag($user, $name){
		$tagID = $this->findTagIdByName($name);
		try {
			$this->response = TagsHelper::deleteTag(
				$this->baseUrlWithoutOCSAppendix(),
				$user,
				$this->getPasswordForUser($user), $tagID,
				$this->getDavPathVersion()
			);
		} catch (ClientException $e) {
			$this->response = $e->getResponse();
		}
		
		unset($this->createdTags[$tagID]);
	}

	private function tag($taggingUser, $tagName, $fileName, $fileOwner) {
		try {
			$this->response = TagsHelper::tag(
				$this->baseUrlWithoutOCSAppendix(),
				$taggingUser, 
				$this->getPasswordForUser($taggingUser),
				$tagName, $fileName, $fileOwner, $this->getDavPathVersion()
				);
		} catch ( ClientException $e ) {
			$this->response = $e->getResponse();
		}
	}

	private function requestTagsForFile($user, $fileName, $sharingUser = null) {
		if (!is_null($sharingUser)){
			$fileID = $this->getFileIdForPath($sharingUser, $fileName);
		} else {
			$fileID = $this->getFileIdForPath($user, $fileName);
		}
		$client = $this->getSabreClient($user);
		$properties = [
						'{http://owncloud.org/ns}id',
						'{http://owncloud.org/ns}display-name',
						'{http://owncloud.org/ns}user-visible',
						'{http://owncloud.org/ns}user-assignable',
						'{http://owncloud.org/ns}can-assign'
					  ];
		$appPath = '/systemtags-relations/files/';
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . $this->davPath . $appPath . $fileID;
		try{
			$response = $client->propfind($fullUrl, $properties, 1);
		}catch (Sabre\HTTP\ClientHttpException $e) {
			$response = $e->getResponse();
		}
		$this->response = $response;
		return $response;
	}

	/**
	 * @When /^"([^"]*)" adds the tag "([^"]*)" to "([^"]*)" (shared|owned) by "([^"]*)"$/
	 * @param string $taggingUser
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $sharingUser
	 */
	public function addsTheTagToSharedBy($taggingUser, $tagName, $fileName, $sharedOrOwnedBy, $sharingUser) {
		$this->tag($taggingUser, $tagName, $fileName, $sharingUser);
	}

	/**
	 * @Then /^"([^"]*)" (shared|owned) by "([^"]*)" has the following tags$/
	 * @param string $fileName
	 * @param string $sharingUser
	 * @param TableNode $table
	 * @throws \Exception
	 */
	public function sharedByHasTheFollowingTags($fileName, $sharedOrOwnedBy, $sharingUser, TableNode $table) {
		$tagList = $this->requestTagsForFile($sharingUser, $fileName);
		//Check if we are looking for no tags
		if ((!is_array($tagList)) && ($table->getRowAsString(0) === '|  |')){
			return true;
		}
		array_shift($tagList);
		foreach($table->getRowsHash() as $rowDisplayName => $rowType) {
			$found = false;
			foreach ($tagList as $path => $tagData) {
				if (!empty($tagData) && $tagData['{http://owncloud.org/ns}display-name'] === $rowDisplayName) {
					$found = true;
					$this->assertTypeOfTag($tagData, $rowType);
					break;
				}
			}
			if ($found === false) {
					PHPUnit_Framework_Assert::fail("tag $rowDisplayName is not in propfind answer");
			}
		}
	}

	/**
	 * @Then :fileName shared by :sharingUser has the following tags for :user
	 * @param string $fileName
	 * @param string $sharingUser
	 * @param string $user
	 * @param TableNode $table
	 * @throws \Exception
	 */
	public function sharedByHasTheFollowingTagsFor($fileName, $sharingUser, $user, TableNode $table) {
		$this->sharedByHasTheFollowingTags($fileName, 'shared', $user, $table);
	}

	private function untag($untaggingUser, $tagName, $fileName, $fileOwner) {
		$fileID = $this->getFileIdForPath($fileOwner, $fileName);
		$tagID = $this->findTagIdByName($tagName);
		$path = '/systemtags-relations/files/' . $fileID . '/' . $tagID;
		try {
			$this->response = $this->makeDavRequest($untaggingUser,"DELETE", $path, null, null, "uploads");
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When :user removes the tag :tagName from :fileName shared by :shareUser
	 * @param string $user
	 * @param string $tagName
	 * @param string $fileName
	 * @param string $shareUser
	 */
	public function removesTheTagFromSharedBy($user, $tagName, $fileName, $shareUser) {
		$this->untag($user, $tagName, $fileName, $shareUser);
	}

	/**
	 * @BeforeScenario
	 * @AfterScenario
	 */
	public function cleanupTags()
	{
		foreach($this->createdTags as $tagID) {
			try {
				$this->response = TagsHelper::deleteTag(
					$this->baseUrlWithoutOCSAppendix(),
					"admin", $this->getPasswordForUser("admin"), $tagID, 2);
			} catch (ClientException  $e) {
				$this->response = $e->getResponse();
			}
		}
	}
}
