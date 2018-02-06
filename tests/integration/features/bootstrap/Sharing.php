<?php
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use TestHelpers\SharingHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Sharing trait
 */
trait Sharing {

	/**
	 * @var int
	 */
	private $sharingApiVersion = 1;

	/**
	 * @var SimpleXMLElement
	 */
	private $lastShareData = null;

	/**
	 * @var int
	 */
	private $savedShareId = null;

	/**
	 * @var int
	 */
	private $lastShareTime = null;

	/**
	 * @When /^user "([^"]*)" creates a share using the API with settings$/
	 * @Given /^user "([^"]*)" has created a share with settings$/
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function userCreatesAShareWithSettings($user, $body) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($user);

		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			if (array_key_exists('expireDate', $fd)) {
				$dateModification = $fd['expireDate'];
				$fd['expireDate'] = date('Y-m-d', strtotime($dateModification));
			}
			$options['body'] = $fd;
		}

		try {
			$this->response = $client->send(
				$client->createRequest("POST", $fullUrl, $options)
			);
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}

		$this->lastShareData = $this->response->xml();
	}

	/**
	 * @When /^the user creates a share using the API with settings$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function theUserCreatesAShareWithSettings($body) {
		$this->userCreatesAShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @Given /^the user has created a share with settings$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function theUserHasCreatedAShareWithSettings($body) {
		$this->userCreatesAShareWithSettings($this->currentUser, $body);
		$this->theOCSStatusCodeShouldBe(100);
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param boolean $publicUpload
	 * @param string|null $sharePassword
	 * @param string|int|string[]|int[]|null $permissions
	 * @return void
	 */
	public function createAPublicShare(
		$user, $path, $publicUpload = false, $sharePassword = null, $permissions = null
	) {
		$this->response = SharingHelper::createShare(
			$this->baseUrlWithoutOCSAppendix(),
			$user,
			$this->getPasswordForUser($user),
			$path,
			'public',
			null, // shareWith
			$publicUpload,
			$sharePassword,
			$permissions,
			null, // linkName
			null, // expireDate
			$this->apiVersion,
			$this->sharingApiVersion
		);

		$this->lastShareData = $this->response->xml();
	}

	/**
	 * @Given /^user "([^"]*)" creates a public share of (?:file|folder) "([^"]*)"$/
	 * @param string $user
	 * @param string $path
	 * @return void
	 */
	public function userCreatesAPublicShareOf($user, $path) {
		$this->createAPublicShare($user, $path);
	}

	/**
	 * @When /^a public share of (?:file|folder) "([^"]*)" is created/
	 * @param string $path
	 * @return void
	 */
	public function aPublicShareOfIsCreated($path) {
		$this->createAPublicShare($this->currentUser, $path);
	}

	/**
	 * @Given /^user "([^"]*)" creates a public share of (?:file|folder) "([^"]*)" with (read|update|create|delete|change|share|all) permission(?:s|)$/
	 * @param string $user
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 * @return void
	 */
	public function userCreatesAPublicShareOfWithPermission($user, $path, $permissions) {
		$this->createAPublicShare($user, $path, true, null, $permissions);
	}

	/**
	 * @Given /^a public share of (?:file|folder) "([^"]*)" is created with (read|update|create|delete|change|share|all) permission(?:s|)$/
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 * @return void
	 */
	public function aPublicShareOfIsCreatedWithPermission($path, $permissions) {
		$this->createAPublicShare($this->currentUser, $path, true, null, $permissions);
	}

	/**
	 * @Then /^the public shared file "([^"]*)" should not be able to be downloaded$/
	 * @param string $path
	 * @return void
	 */
	public function publicSharedFileCannotBeDownloaded($path) {
		$token = $this->getLastShareToken();
		$fullUrl = substr($this->baseUrl, 0, -4) . "public.php/webdav/" . rawurlencode(ltrim($path, '/'));

		$client = new Client();
		$options = [];
		$options['auth'] = [$token, ""];

		$request = $client->createRequest('GET', $fullUrl, $options);

		try {
			$this->response = $client->send($request);
			PHPUnit_Framework_Assert::fail('download must fail');
		} catch (BadResponseException $e) {
			// expected
			PHPUnit_Framework_Assert::assertGreaterThanOrEqual(400, $e->getCode());
			PHPUnit_Framework_Assert::assertLessThanOrEqual(499, $e->getCode());
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @Then /^the last public shared file should be able to be downloaded without a password$/
	 * @return void
	 */
	public function checkLastPublicSharedFileDownload() {
		if (count($this->lastShareData->data->element) > 0) {
			$url = $this->lastShareData->data[0]->url;
		} else {
			$url = $this->lastShareData->data->url;
		}
		$fullUrl = $url . "/download";
		$this->checkDownload($fullUrl, null, 'text/plain');
	}

	/**
	 * @Then /^the last public shared file should be able to be downloaded with password "([^"]*)"$/
	 * @param string $filename unused
	 * @param string $password
	 * @return void
	 */
	public function checkLastPublicSharedFileWithPasswordDownload($password) {
		$token = $this->getLastShareToken();
		$fullUrl = substr($this->baseUrl, 0, -4) . "public.php/webdav";
		$this->checkDownload($fullUrl, [$token, $password], 'text/plain');
	}

	/**
	 * @param string $url
	 * @param string $auth
	 * @param string $mimeType
	 * @return void
	 */
	private function checkDownload($url, $auth = null, $mimeType = null) {
		if ($auth !== null) {
			$options['auth'] = $auth;
		}
		$options['stream'] = true;

		$client = new Client();
		$this->response = $client->get($url, $options);
		PHPUnit_Framework_Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);

		$buf = '';
		$body = $this->response->getBody();
		while (!$body->eof()) {
			// read everything
			$buf .= $body->read(8192);
		}
		$body->close();

		if ($mimeType !== null) {
			$finfo = new finfo;
			PHPUnit_Framework_Assert::assertEquals(
				$mimeType,
				$finfo->buffer($buf, FILEINFO_MIME_TYPE)
			);
		}
	}

	/**
	 * @Given the public has uploaded file ":filename" with content ":body"
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @return void
	 */
	public function publiclyUploadingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body);
	}

	/**
	 * @When publicly overwriting file ":filename" with content ":body"
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @return void
	 */
	public function publiclyOverwritingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, false, true);
	}

	/**
	 * @Given the public has uploaded file ":filename" with password ":password" and content ":body"
	 * @param string $filename target file name
	 * @param string $password
	 * @param string $body content to upload
	 * @return void
	 */
	public function publiclyUploadingContentWithPassword(
		$filename, $password = '', $body = 'test'
	) {
		$this->publicUploadContent($filename, $password, $body);
	}

	/**
	 * @Given the public has uploaded file ":filename" with content ":body" with autorename mode
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @return void
	 */
	public function publiclyUploadingContentAutorename($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, true);
	}

	/**
	 * @Then publicly uploading a file should not work
	 * @return void
	 */
	public function publiclyUploadingShouldNotWork() {
		try {
			$this->publicUploadContent('whateverfilefortesting.txt', '', 'test');
			PHPUnit_Framework_Assert::fail('Publicly uploading must fail');
		} catch (BadResponseException $e) {
			// expected
			PHPUnit_Framework_Assert::assertGreaterThanOrEqual(400, $e->getCode());
			PHPUnit_Framework_Assert::assertLessThanOrEqual(499, $e->getCode());
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @param string $filename
	 * @param string $password
	 * @param string $body
	 * @param bool $autorename
	 * @param bool $overwriting the upload is expected to overwrite an existing file
	 * @return void
	 */
	private function publicUploadContent(
		$filename, $password = '', $body = 'test', $autorename = false, $overwriting = false
	) {
		$url = substr($this->baseUrl, 0, -4) . "public.php/webdav/";
		$url .= rawurlencode(ltrim($filename, '/'));
		$token = $this->getLastShareToken();
		$options['auth'] = [$token, $password];
		$options['stream'] = true;
		$options['body'] = $body;

		if ($autorename) {
			$options['headers']['OC-Autorename'] = 1;
		}

		$client = new Client();
		$this->response = $client->send(
			$client->createRequest('PUT', $url, $options)
		);
		if ($overwriting) {
			$expectedStatus = 204;
		} else {
			$expectedStatus = 201;
		}
		PHPUnit_Framework_Assert::assertEquals(
			$expectedStatus,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @When /^adding expiration date to last share$/
	 * @return void
	 */
	public function addingExpirationDate() {
		$share_id = (string) $this->lastShareData->data[0]->id;
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($this->currentUser);
		$date = date('Y-m-d', strtotime("+3 days"));
		$options['body'] = ['expireDate' => $date];
		$this->response = $client->send(
			$client->createRequest("PUT", $fullUrl, $options)
		);
		PHPUnit_Framework_Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @When /^the user updates the last share using the API with$/
	 * @Given /^the user has updated the last share with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function theUserUpdatesTheLastShareWith($body) {
		$this->userUpdatesTheLastShareWith($this->currentUser, $body);
	}

	/**
	 * @When /^user "([^"]*)" updates the last share using the API with$/
	 * @Given /^user "([^"]*)" has updated the last share with$/
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function userUpdatesTheLastShareWith($user, $body) {
		$share_id = (string) $this->lastShareData->data[0]->id;
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($user);

		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			if (array_key_exists('expireDate', $fd)) {
				$dateModification = $fd['expireDate'];
				$fd['expireDate'] = date('Y-m-d', strtotime($dateModification));
			}
			$options['body'] = $fd;
		}

		try {
			$this->response = $client->send(
				$client->createRequest("PUT", $fullUrl, $options)
			);
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}

		PHPUnit_Framework_Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param string $shareType
	 * @param string $shareWith
	 * @param string $publicUpload
	 * @param string $password
	 * @param int $permissions
	 * @param string $linkName
	 * @return void
	 */
	public function createShare(
		$user,
		$path = null,
		$shareType = null,
		$shareWith = null,
		$publicUpload = null,
		$password = null,
		$permissions = null,
		$linkName = null
	) {

		try {
			$this->response = SharingHelper::createShare(
				$this->baseUrlWithoutOCSAppendix(),
				$user,
				$this->getPasswordForUser($user),
				$path,
				$shareType,
				$shareWith,
				$publicUpload,
				$password,
				$permissions,
				$linkName,
				$this->apiVersion,
				$this->sharingApiVersion
			);
			$this->lastShareData = $this->response->xml();
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @param string $field
	 * @param string $contentExpected
	 * @return bool
	 */
	public function isFieldInResponse($field, $contentExpected) {
		$data = $this->response->xml()->data[0];
		if ((string)$field == 'expiration') {
			$contentExpected = date('Y-m-d', strtotime($contentExpected)) . " 00:00:00";
		}
		if (count($data->element) > 0) {
			foreach ($data as $element) {
				if ($contentExpected == "A_TOKEN") {
					return (strlen((string)$element->$field) == 15);
				} elseif ($contentExpected == "A_NUMBER") {
					return is_numeric((string)$element->$field);
				} elseif ($contentExpected == "AN_URL") {
					return $this->isExpectedUrl((string)$element->$field, "index.php/s/");
				} elseif ((string)$element->$field == $contentExpected) {
					return true;
				} else {
					print($element->$field);
				}
			}

			return false;
		} else {
			if ($contentExpected == "A_TOKEN") {
					return (strlen((string)$data->$field) == 15);
			} elseif ($contentExpected == "A_NUMBER") {
					return is_numeric((string)$data->$field);
			} elseif ($contentExpected == "AN_URL") {
					return $this->isExpectedUrl(
						(string)$data->$field,
						"index.php/s/"
					);
			} elseif ($data->$field == $contentExpected) {
					return true;
			}
			return false;
		}
	}

	/**
	 * @Then /^file "([^"]*)" should be included in the response$/
	 *
	 * @param string $filename
	 * @return void
	 */
	public function checkSharedFileInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isFieldInResponse('file_target', "/$filename")
		);
	}

	/**
	 * @Then /^file "([^"]*)" should not be included in the response$/
	 *
	 * @param string $filename
	 * @return void
	 */
	public function checkSharedFileNotInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			false,
			$this->isFieldInResponse('file_target', "/$filename")
		);
	}

	/**
	 * @Then /^file "([^"]*)" should be included as path in the response$/
	 *
	 * @param string $filename
	 * @return void
	 */
	public function checkSharedFileAsPathInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isFieldInResponse('path', "/$filename")
		);
	}

	/**
	 * @Then /^file "([^"]*)" should not be included as path in the response$/
	 *
	 * @param string $filename
	 * @return void
	 */
	public function checkSharedFileAsPathNotInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			false,
			$this->isFieldInResponse('path', "/$filename")
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be included in the response$/
	 *
	 * @param string $user
	 * @return void
	 */
	public function checkSharedUserInResponse($user) {
		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isFieldInResponse('share_with', "$user")
		);
	}

	/**
	 * @Then /^user "([^"]*)" should not be included in the response$/
	 *
	 * @param string $user
	 * @return void
	 */
	public function checkSharedUserNotInResponse($user) {
		PHPUnit_Framework_Assert::assertEquals(
			false,
			$this->isFieldInResponse('share_with', "$user")
		);
	}

	/**
	 * @param string $userOrGroup
	 * @param int $permissions
	 * @return bool
	 */
	public function isUserOrGroupInSharedData($userOrGroup, $permissions = null) {
		$data = $this->response->xml()->data[0];
		foreach ($data as $element) {
			if ($element->share_with == $userOrGroup && ($permissions === null || $permissions == $element->permissions)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @When /^user "([^"]*)" shares (file|folder|entry) "([^"]*)" with user "([^"]*)"( with permissions ([\d]*))? using the API$/
	 * @Given /^user "([^"]*)" has shared (file|folder|entry) "([^"]*)" with user "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $user1
	 * @param string $entry unused
	 * @param string $filepath
	 * @param string $user2
	 * @param null $withPerms unused
	 * @param int $permissions
	 * @return void
	 */
	public function userSharesFileWithUserUsingTheAPI(
		$user1, $entry, $filepath, $user2, $withPerms = null, $permissions = null
	) {
		$this->fileOfUserHasBeenSharedWithUser(
			$entry, $filepath, $user1, $user2, $withPerms, $permissions
		);
	}

	/**
	 * @Given /^(file|folder|entry) "([^"]*)" of user "([^"]*)" has been shared with user "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $entry unused
	 * @param string $filepath
	 * @param string $user1
	 * @param string $user2
	 * @param null $withPerms unused
	 * @param int $permissions
	 * @deprecated prefer using the gherkin forms for userSharesFileWithUserUsingTheAPI()
	 * @return void
	 */
	public function fileOfUserHasBeenSharedWithUser(
		$entry, $filepath, $user1, $user2, $withPerms = null, $permissions = null
	) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares" . "?path=$filepath";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($user1);
		$this->response = $client->get($fullUrl, $options);
		if ($this->isUserOrGroupInSharedData($user2, $permissions)) {
			return;
		} else {
			$time = time();
			if ($this->lastShareTime !== null && $time - $this->lastShareTime < 1) {
				// prevent creating two shares with the same "stime" which is
				// based on seconds, this affects share merging order and could
				// affect expected test result order
				sleep(1);
			}
			$this->lastShareTime = $time;
			$this->createShare(
				$user1, $filepath, 0, $user2, null, null, $permissions
			);
		}
		$this->response = $client->get($fullUrl, $options);
		PHPUnit_Framework_Assert::assertTrue(
			$this->isUserOrGroupInSharedData($user2, $permissions),
			"User $user1 failed to share $filepath with user $user2"
		);
	}

	/**
	 * @When /^user "([^"]*)" shares (file|folder|entry) "([^"]*)" with group "([^"]*)"( with permissions ([\d]*))? using the API$/
	 * @Given /^user "([^"]*)" has shared (file|folder|entry) "([^"]*)" with group "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $user1
	 * @param string $entry unused
	 * @param string $filepath
	 * @param string $group
	 * @param null $withPerms unused
	 * @param int $permissions
	 * @return void
	 */
	public function userSharesFileWithGroupUsingTheAPI(
		$user1, $entry, $filepath, $group, $withPerms = null, $permissions = null
	) {
		$this->fileOfUserHasBeenSharedWithGroup(
			$entry, $filepath, $user1, $group, $withPerms, $permissions
		);
	}

	/**
	 * @Given /^(file|folder|entry) "([^"]*)" of user "([^"]*)" has been shared with group "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $entry unused
	 * @param string $filepath
	 * @param string $user
	 * @param string $group
	 * @param null $withPerms unused
	 * @param int $permissions
	 * @deprecated prefer using the gherkin forms for userSharesFileWithGroupUsingTheAPI()
	 * @return void
	 */
	public function fileOfUserHasBeenSharedWithGroup(
		$entry, $filepath, $user, $group, $withPerms = null, $permissions = null
	) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares" . "?path=$filepath";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($user);
		$this->response = $client->get($fullUrl, $options);
		if ($this->isUserOrGroupInSharedData($group, $permissions)) {
			return;
		} else {
			$this->createShare(
				$user, $filepath, 1, $group, null, null, $permissions
			);
		}
		$this->response = $client->get($fullUrl, $options);
		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isUserOrGroupInSharedData($group, $permissions)
		);
	}

	/**
	 * @When /^the user deletes the last share using the API$/
	 * @return void
	 */
	public function theUserDeletesLastShareUsingTheAPI() {
		$this->userDeletesLastShareUsingTheAPI($this->currentUser);
	}

	/**
	 * @When /^user "([^"]*)" deletes the last share using the API$/
	 * @Given /^user "([^"]*)" has deleted the last share$/
	 * @param string $user
	 * @return void
	 */
	public function userDeletesLastShareUsingTheAPI($user) {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->userSendsHTTPMethodToAPIEndpointWithBody($user, "DELETE", $url, null);
	}

	/**
	 * @When /^the user gets the info of the last share using the API$/
	 * @return void
	 */
	public function theUserGetsInfoOfLastShareUsingTheAPI() {
		$this->userGetsInfoOfLastShareUsingTheAPI($this->currentUser);
	}

	/**
	 * @When /^user "([^"]*)" gets the info of the last share using the API$/
	 * @param string $user
	 * @return void
	 */
	public function userGetsInfoOfLastShareUsingTheAPI($user) {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->userSendsHTTPMethodToAPIEndpointWithBody($user, "GET", $url, null);
	}

	/**
	 * @Then /^the last share_id should be included in the response/
	 * @return void
	 */
	public function checkingLastShareIDIsIncluded() {
		$share_id = $this->lastShareData->data[0]->id;
		if (!$this->isFieldInResponse('id', $share_id)) {
			PHPUnit_Framework_Assert::fail(
				"Share id $share_id not found in response"
			);
		}
	}

	/**
	 * @Then /^the last share_id should not be included in the response/
	 * @return void
	 */
	public function checkingLastShareIDIsNotIncluded() {
		$share_id = $this->lastShareData->data[0]->id;
		if ($this->isFieldInResponse('id', $share_id)) {
			PHPUnit_Framework_Assert::fail(
				"Share id $share_id has been found in response"
			);
		}
	}

	/**
	 * @Then /^the response contains ([0-9]+) entries$/
	 * @param int $count
	 * @return void
	 */
	public function checkingTheResponseEntriesCount($count) {
		$actualCount = count($this->response->xml()->data[0]);
		PHPUnit_Framework_Assert::assertEquals($count, $actualCount);
	}

	/**
	 * @Then /^the share fields of the last share should include$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function checkShareFields($body) {
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();

			foreach ($fd as $field => $value) {
				if (substr($field, 0, 10) === "share_with") {
					$value = str_replace(
						"REMOTE",
						substr($this->remoteBaseUrl, 0, -5),
						$value
					);
					$value = str_replace(
						"LOCAL", substr($this->localBaseUrl, 0, -5),
						$value
					);
				}
				if (substr($field, 0, 6) === "remote") {
					$value = str_replace(
						"REMOTE",
						substr($this->remoteBaseUrl, 0, -4),
						$value
					);
					$value = str_replace(
						"LOCAL",
						substr($this->localBaseUrl, 0, -4),
						$value
					);
				}
				if (!$this->isFieldInResponse($field, $value)) {
					PHPUnit_Framework_Assert::fail(
						"$field" . " doesn't have value " . "$value"
					);
				}
			}
		}
	}

	/**
	 * @When user :user removes all shares from the file named :fileName using the API
	 * @Given user :user has removed all shares from the file named :fileName
	 * @param string $user
	 * @param string $fileName
	 * @throws Exception
	 * @return void
	 */
	public function userRemovesAllSharesFromTheFileNamed($user, $fileName) {
		$url = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?format=json";
		$client = new \GuzzleHttp\Client();
		$res = $client->get(
			$url,
			[
				'auth' => $this->getAuthOptionForUser($user),
				'headers' => [
					'Content-Type' => 'application/json',
				],
			]
		);
		$json = json_decode($res->getBody()->getContents(), true);
		$deleted = false;
		foreach ($json['ocs']['data'] as $data) {
			if (stripslashes($data['path']) === $fileName) {
				$id = $data['id'];
				$client->delete(
					$this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/{$id}",
					[
						'auth' => $this->getAuthOptionForUser($user),
						'headers' => [
							'Content-Type' => 'application/json',
						],
					]
				);
				$deleted = true;
			}
		}

		if ($deleted === false) {
			throw new \Exception("Could not delete shares for user $user file $fileName");
		}
	}

	/**
	 * @Given the last share id has been remembered
	 * @return void
	 */
	public function rememberLastShareId() {
		$this->savedShareId = $this->lastShareData['data']['id'];
	}

	/**
	 * @Then the share ids should match
	 * @return void
	 */
	public function shareIdsShouldMatch() {
		if ($this->savedShareId !== $this->lastShareData['data']['id']) {
			throw new \Exception('Expected the same link share to be returned');
		}
	}

	/**
	 * Returns shares of a file or folders as an array of elements
	 *
	 * @param string $user
	 * @param string $path
	 * @return array
	 */
	public function getShares($user, $path) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares";
		$fullUrl = $fullUrl . '?path=' . $path;

		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($user);

		$this->response = $client->send(
			$client->createRequest("GET", $fullUrl, $options)
		);
		return $this->response->xml()->data->element;
	}

	/**
	 * @Then /^as user "([^"]*)" the public shares of (file|folder) "([^"]*)" should be$/
	 * @param string $user
	 * @param string $type
	 * @param string $path
	 * @param \Behat\Gherkin\Node\TableNode|null $TableNode
	 * @return int|void
	 */
	public function checkPublicShares($user, $type, $path, $TableNode) {
		$dataResponded = $this->getShares($user, $path);

		if ($TableNode instanceof \Behat\Gherkin\Node\TableNode) {
			$elementRows = $TableNode->getRows();

			if ($elementRows[0][0] === '') {
				//It shouldn't have public shares
				PHPUnit_Framework_Assert::assertEquals(count($dataResponded), 0);
				return 0;
			}

			foreach ($elementRows as $expectedElementsArray) {
				//0 path, 1 permissions, 2 name
				$nameFound = false;
				foreach ($dataResponded as $elementResponded) {
					if ((string)$elementResponded->name[0] === $expectedElementsArray[2]) {
						PHPUnit_Framework_Assert::assertEquals(
							$expectedElementsArray[0],
							(string)$elementResponded->path[0]
						);
						PHPUnit_Framework_Assert::assertEquals(
							$expectedElementsArray[1],
							(string)$elementResponded->permissions[0]
						);
						$nameFound = true;
						break;
					}
				}
				PHPUnit_Framework_Assert::assertTrue(
					$nameFound,
					"Shared link name " . $expectedElementsArray[2] . " not found"
				);
			}
		}
	}

	/**
	 * @param string $user
	 * @param string $path to share
	 * @param string $name of share
	 * @return int|null
	 */
	public function getPublicShareIDByName($user, $path, $name) {
		$dataResponded = $this->getShares($user, $path);
		foreach ($dataResponded as $elementResponded) {
			if ((string)$elementResponded->name[0] === $name) {
				return (int)$elementResponded->id[0];
			}
		}
		return null;
	}

	/**
	 * @When /^user "([^"]*)" deletes public share named "([^"]*)" in (file|folder) "([^"]*)" using the API$/
	 * @param string $user
	 * @param string $name
	 * @param string $type unused
	 * @param string $path
	 * @return void
	 */
	public function userDeletesPublicShareNamedUsingTheAPI($user, $name, $type, $path) {
		$share_id = $this->getPublicShareIDByName($user, $path, $name);
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->sendingToWith("DELETE", $url, null);
	}

	/**
	 * @return string authorization token
	 */
	private function getLastShareToken() {
		if (count($this->lastShareData->data->element) > 0) {
			return $this->lastShareData->data[0]->token;
		}

		return $this->lastShareData->data->token;
	}

	/**
	 * @return void
	 */
	protected function setupCommonSharingConfigs() {
		$this->setCapability(
			'files_sharing',
			'api_enabled',
			'core',
			'shareapi_enabled',
			true
		);
		$this->setCapability(
			'files_sharing',
			'public@@@enabled',
			'core',
			'shareapi_allow_links',
			true
		);
		$this->setCapability(
			'files_sharing',
			'public@@@upload',
			'core',
			'shareapi_allow_public_upload',
			true
		);
		$this->setCapability(
			'files_sharing',
			'group_sharing',
			'core',
			'shareapi_allow_group_sharing',
			true
		);
		$this->setCapability(
			'files_sharing',
			'share_with_group_members_only',
			'core',
			'shareapi_only_share_with_group_members',
			false
		);
		$this->setCapability(
			'files_sharing',
			'share_with_membership_groups_only',
			'core',
			'shareapi_only_share_with_membership_groups',
			false
		);
		$this->setCapability(
			'files_sharing',
			'user_enumeration@@@enabled',
			'core',
			'shareapi_allow_share_dialog_user_enumeration',
			true
		);
		$this->setCapability(
			'files_sharing',
			'user_enumeration@@@group_members_only',
			'core',
			'shareapi_share_dialog_user_enumeration_group_members',
			false
		);
	}

	/**
	 * @return void
	 */
	protected function setupCommonFederationConfigs() {
		$this->setCapability(
			'federation',
			'outgoing',
			'files_sharing',
			'outgoing_server2server_share_enabled',
			true
		);
		$this->setCapability(
			'federation',
			'incoming',
			'files_sharing',
			'incoming_server2server_share_enabled',
			true
		);
	}
}
