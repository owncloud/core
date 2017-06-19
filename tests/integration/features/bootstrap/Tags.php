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
use GuzzleHttp\Client;
use GuzzleHttp\Message\ResponseInterface;

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
		$tagsPath = '/systemtags/';
		$body = [
			'name' => $name,
			'userVisible' => $userVisible,
			'userAssignable' => $userAssignable,
		];
		if ($groups !== null) {
			$body['groups'] = $groups;
		}
		try {
			$this->response = $this->makeDavRequest($user,
								  "POST",
								  $tagsPath,
								  ['Content-Type' => 'application/json',],
								  null,
								  "uploads",
								  json_encode($body));
			$responseHeaders =  $this->response->getHeaders();
			$tagUrl = $responseHeaders['Content-Location'][0];
			$lastTagId = substr($tagUrl, strrpos($tagUrl,'/')+1);
			array_push($this->createdTags, $lastTagId);
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	private function validateTypeOfTag($type) {
		$userVisible = true;
		$userAssignable = true;
		switch ($type) {
			case 'normal':
				break;
			case 'not user-assignable':
				$userAssignable = false;
				break;
			case 'not user-visible':
				$userVisible = false;
				break;
			default:
				throw new \Exception('Unsupported type');
		}
		return array($userVisible, $userAssignable);
	}

	private function assertTypeOfTag($tagData, $type) {
		$userAttributes = $this->validateTypeOfTag($type);
		$tagDisplayName = $tagData['{http://owncloud.org/ns}display-name'];
		PHPUnit_Framework_Assert::assertEquals($tagData['{http://owncloud.org/ns}user-visible'],
							($userAttributes[0]) ? 'true' : 'false',
							"tag $tagDisplayName user-visible is not $userAttributes[0]");
		PHPUnit_Framework_Assert::assertEquals($tagData['{http://owncloud.org/ns}user-assignable'],
							($userAttributes[1]) ? 'true' : 'false',
							"tag $tagDisplayName user-assignable is not $userAttributes[1]");
	}

	/**
	 * @When :user creates a :type tag with name :name
	 * @param string $user
	 * @param string $type
	 * @param string $name
	 * @throws \Exception
	 */
	public function createsATagWithName($user, $type, $name) {
		$this->createTag($user, $this->validateTypeOfTag($type)[0], $this->validateTypeOfTag($type)[1], $name);
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
		$this->createTag($user, $this->validateTypeOfTag($type)[0], $this->validateTypeOfTag($type)[1], $name, $groups);
	}

	public function requestTagsForUser($user, $withGroups = false) {
		$client = $this->getSabreClient($user);
		$properties = [
						'{http://owncloud.org/ns}id',
						'{http://owncloud.org/ns}display-name',
						'{http://owncloud.org/ns}user-visible',
						'{http://owncloud.org/ns}user-assignable',
						'{http://owncloud.org/ns}can-assign'
					  ];
		if ($withGroups) {
			array_push($properties, '{http://owncloud.org/ns}groups');
		}
		$appPath = '/systemtags/';
		$fullUrl = substr($this->baseUrl, 0, -4) . $this->davPath . $appPath;
		$response = $client->propfind($fullUrl, $properties, 1);
		$this->response = $response;
		return $response;
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
		foreach($table->getRowsHash() as $rowDisplayName => $row) {
			$tagData = $this->requestTagByDisplayName($user, $rowDisplayName);
			if (is_null($tagData)) {
				PHPUnit_Framework_Assert::fail("tag $rowDisplayName is not in propfind answer");
			} else {
				PHPUnit_Framework_Assert::assertTrue($tagData['{http://owncloud.org/ns}user-visible'] === $row[0],
											   "tag $rowDisplayName user-visible is not $row[0]");
				PHPUnit_Framework_Assert::assertTrue($tagData['{http://owncloud.org/ns}user-assignable'] === $row[1],
											   "tag $rowDisplayName user-assignable is not $row[1]");
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
	 * @Then the user :user :can assign The :type tag with name :tagName
	 */
	public function theUserCanAssignTheTag($user, $can, $type, $tagName) {
		$foundTag = $this->findTag($type, $tagName, $user);
		if ($foundTag === null) {
			throw new \Exception('No matching tag found');
		}

		if ($can === 'can') {
			$expected = 'true';
		} else if ($can === 'cannot') {
			$expected = 'false';
		} else {
			throw new \Exception('Invalid condition, must be "can" or "cannot"');
		}

		if ($foundTag['can-assign'] !== $expected) {
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
		$fullUrl = substr($this->baseUrl, 0, -4) . $this->davPath . $appPath . $tagID;
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
		$this->deleteTag($user, $tagID);
		unset($this->createdTags[$tagID]);
	}

	private function tag($taggingUser, $tagName, $fileName, $fileOwner) {
		$fileID = $this->getFileIdForPath($fileOwner, $fileName);
		$tagID = $this->findTagIdByName($tagName);
		$path = '/systemtags-relations/files/' . $fileID . '/' . $tagID;
		try {
			$this->response = $this->makeDavRequest($taggingUser,"PUT", $path, null, null, "uploads");
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	private function requestTagsForFile($user, $filename) {
		$fileID = $this->getFileIdForPath($user, $fileName);
		$tagID = $this->findTagIdByName($tagName);

		$client = $this->getSabreClient($user);
		$properties = [
						'{http://owncloud.org/ns}id',
						'{http://owncloud.org/ns}display-name',
						'{http://owncloud.org/ns}user-visible',
						'{http://owncloud.org/ns}user-assignable',
						'{http://owncloud.org/ns}can-assign'
					  ];
		// if ($withGroups) {
		// 	array_push($properties, '{http://owncloud.org/ns}groups');
		// }

		$appPath = '/systemtags-relations/files/';
		$fullUrl = substr($this->baseUrl, 0, -4) . $this->davPath . $appPath . $fileID;
		$response = $client->propfind($fullUrl, $properties, 1);
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
	public function sharedByHasTheFollowingTags($fileName, $sharedOrOwnedBy, $sharingUser, TableNode $table)  {
		$loadedExpectedTags = $table->getTable();
		$expectedTags = [];
		foreach($loadedExpectedTags as $expected) {
			$expectedTags[] = $expected[0];
		}

		// Get the real tags
		$request = $this->client->createRequest(
			'PROPFIND',
			$this->baseUrl.'/remote.php/dav/systemtags-relations/files/'.$this->getFileIdForPath($sharingUser, $fileName),
			[
				'auth' => [
					$sharingUser,
					$this->getPasswordForUser($sharingUser),
				],
				'body' => '<?xml version="1.0"?>
<d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
  <d:prop>
    <oc:id />
    <oc:display-name />
    <oc:user-visible />
    <oc:user-assignable />
  </d:prop>
</d:propfind>',
			]
		);

		$response = $this->client->send($request)->getBody()->getContents();

		preg_match_all('/\<oc:display-name\>(.*)\<\/oc:display-name\>/', $response, $realTags);

		foreach($expectedTags as $key => $row) {
			foreach($realTags as $tag) {
				if($tag[0] === $row) {
					unset($expectedTags[$key]);
				}
			}
		}

		if(count($expectedTags) !== 0) {
			throw new \Exception('Not all tags found.');
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
		$loadedExpectedTags = $table->getTable();
		$expectedTags = [];
		foreach($loadedExpectedTags as $expected) {
			$expectedTags[] = $expected[0];
		}

		// Get the real tags
		try {
			$request = $this->client->createRequest(
				'PROPFIND',
				$this->baseUrl . '/remote.php/dav/systemtags-relations/files/' . $this->getFileIdForPath($sharingUser, $fileName),
				[
					'auth' => [
						$user,
						$this->getPasswordForUser($user),
					],
					'body' => '<?xml version="1.0"?>
<d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
  <d:prop>
    <oc:id />
    <oc:display-name />
    <oc:user-visible />
    <oc:user-assignable />
  </d:prop>
</d:propfind>',
				]
			);
			$this->response = $this->client->send($request)->getBody()->getContents();
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			$this->response = $e->getResponse();
		}
		preg_match_all('/\<oc:display-name\>(.*?)\<\/oc:display-name\>/', $this->response, $realTags);

		$realTags = array_filter($realTags);
		$expectedTags = array_filter($expectedTags);

		foreach($expectedTags as $key => $row) {
			foreach($realTags as $tag) {
				foreach($tag as $index => $foo) {
					if($tag[$index] === $row) {
						unset($expectedTags[$key]);
					}
				}
			}
		}

		if(count($expectedTags) !== 0) {
			throw new \Exception('Not all tags found.');
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
		$tagId = $this->findTagIdByName($tagName);
		$fileId = $this->getFileIdForPath($shareUser, $fileName);

		try {
			$this->response = $this->client->delete(
				$this->baseUrl.'/remote.php/dav/systemtags-relations/files/'.$fileId.'/'.$tagId,
				[
					'auth' => [
						$user,
						$this->getPasswordForUser($user),
					],
				]
			);
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @Given As :user sending :verb to :url with
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param \Behat\Gherkin\Node\TableNode $body
	 * @throws \Exception
	 */
	public function asUserSendingToWith($user, $verb, $url, \Behat\Gherkin\Node\TableNode $body) {
		$client = new \GuzzleHttp\Client();
		$options = [];
		$options['auth'] = [$user, '123456'];
		$fd = $body->getRowsHash();
		$options['body'] = $fd;
		$client->send($client->createRequest($verb, $this->baseUrl.'/ocs/v1.php/'.$url, $options));
	}


	private function deleteTag($user, $tagID) {
		$tagsPath = '/systemtags/' . $tagID;
		try {
			$this->response = $this->makeDavRequest($user,"DELETE",$tagsPath,[],null,"uploads",null);
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @BeforeScenario
	 * @AfterScenario
	 */
	public function cleanupTags()
	{
		foreach($this->createdTags as $tagID) {
			$this->deleteTag('admin', $tagID);
		}
	}
}
