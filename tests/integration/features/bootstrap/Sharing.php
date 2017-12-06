<?php
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright 2017 ownCloud GmbH
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
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
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
	 * @Given /^as "([^"]*)" creating a share with$/
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function asCreatingAShareWith($user, $body) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares";
		$client = new Client();
		$options = [];
		if ($user === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$user, $this->regularUser];
		}

		$fd = '';
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			if (array_key_exists('expireDate', $fd)) {
				$dateModification = $fd['expireDate'];
				$fd['expireDate'] = date('Y-m-d', strtotime($dateModification));
			}
			$options['form_params'] = $fd;
		}

		try {
			$this->response = $client->send(new Request("POST", $fullUrl), $options);
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}

		$this->lastShareData = $this->getResponseXml();
	}

	/**
	 * @When /^creating a share with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function creatingShare($body) {
		$this->asCreatingAShareWith($this->currentUser, $body);
	}

	/**
	 * @When /^public shared file "([^"]*)" cannot be downloaded$/
	 * @param string $path
	 * @return void
	 */
	public function publicSharedFileCannotDownload($path) {
		$token = $this->getLastShareToken();
		$fullUrl = substr($this->baseUrl, 0, -4) . "public.php/webdav/" . rawurlencode(ltrim($path, '/'));

		$client = new Client();
		$options = [];
		$options['auth'] = [$token, ""];

		$request = new Request('GET', $fullUrl);

		try {
			$this->response = $client->send($request, $options);
			PHPUnit_Framework_Assert::fail('download must fail');
		} catch (ClientException $e) {
			// expected
			PHPUnit_Framework_Assert::assertGreaterThanOrEqual(400, $e->getCode());
			PHPUnit_Framework_Assert::assertLessThanOrEqual(499, $e->getCode());
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @Then /^public shared file "([^"]*)" can be downloaded$/
	 * @param string $filename unused
	 * @return void
	 */
	public function checkPublicSharedFile($filename) {
		if (count($this->lastShareData->data->element) > 0) {
			$url = $this->lastShareData->data[0]->url;
		} else {
			$url = $this->lastShareData->data->url;
		}
		$fullUrl = $url . "/download";
		$this->checkDownload($fullUrl, null, 'text/plain');
	}

	/**
	 * @Then /^public shared file "([^"]*)" with password "([^"]*)" can be downloaded$/
	 * @param string $filename unused
	 * @param string $password
	 * @return void
	 */
	public function checkPublicSharedFileWithPassword($filename, $password) {
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
	 * @When publicly uploading file ":filename" with content ":body"
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @return void
	 */
	public function publiclyUploadingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body);
	}

	/**
	 * @When publicly uploading file ":filename" with password ":password" and content ":body"
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
	 * @When publicly uploading file ":filename" with content ":body" with autorename mode
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @return void
	 */
	public function publiclyUploadingContentAutorename($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, true);
	}

	/**
	 * @When publicly uploading a file does not work
	 * @return void
	 */
	public function publiclyUploadingDoesNotWork() {
		try {
			$this->publicUploadContent('whateverfilefortesting.txt', '', 'test');
			PHPUnit_Framework_Assert::fail('Publicly uploading must fail');
		} catch (ClientException $e) {
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
	 * @return void
	 */
	private function publicUploadContent(
		$filename, $password = '', $body = 'test', $autorename = false
	) {
		$url = substr($this->baseUrl, 0, -4) . "public.php/webdav/";
		$url .= rawurlencode(ltrim($filename, '/'));
		$token = $this->getLastShareToken();
		$options['auth'] = [$token, $password];
		$options['stream'] = true;

		$headers = [];
		if ($autorename) {
			$headers['OC-Autorename'] = 1;
		}

		$client = new Client();
		$this->response = $client->send(new Request('PUT', $url, $headers, $body), $options);
		PHPUnit_Framework_Assert::assertEquals(201, $this->response->getStatusCode());
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
		if ($this->currentUser === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$this->currentUser, $this->regularUser];
		}
		$date = date('Y-m-d', strtotime("+3 days"));
		$body = ['expireDate' => $date];
		$this->response = $client->send(new Request("PUT", $fullUrl, [], $body), $options);
		PHPUnit_Framework_Assert::assertEquals(200, $this->response->getStatusCode());
	}

	/**
	 * @When /^updating last share with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 * @return void
	 */
	public function updatingLastShare($body) {
		$share_id = (string) $this->lastShareData->data[0]->id;
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$client = new Client();
		$options = [];
		if ($this->currentUser === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$this->currentUser, $this->regularUser];
		}

		$fd = '';
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			if (array_key_exists('expireDate', $fd)) {
				$dateModification = $fd['expireDate'];
				$fd['expireDate'] = date('Y-m-d', strtotime($dateModification));
			}
			$options['form_params'] = $fd;
		}

		try {
			$this->response = $client->send(new Request("PUT", $fullUrl), $options);
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
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
			$this->lastShareData = $this->getResponseXml();
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @param string $field
	 * @param string $contentExpected
	 * @return bool
	 */
	public function isFieldInResponse($field, $contentExpected) {
		$data = $this->getResponseXml()->data[0];
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
		$data = $this->getResponseXml()->data[0];
		foreach ($data as $element) {
			if ($element->share_with == $userOrGroup && ($permissions === null || $permissions == $element->permissions)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @Given /^(file|folder|entry) "([^"]*)" of user "([^"]*)" is shared with user "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $entry unused
	 * @param string $filepath
	 * @param string $user1
	 * @param string $user2
	 * @param null $withPerms unused
	 * @param int $permissions
	 * @return void
	 */
	public function assureFileIsShared(
		$entry, $filepath, $user1, $user2, $withPerms = null, $permissions = null
	) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares" . "?path=$filepath";
		$client = new Client();
		$options = [];
		if ($user1 === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$user1, $this->regularUser];
		}
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
		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isUserOrGroupInSharedData($user2, $permissions)
		);
	}

	/**
	 * @Given /^(file|folder|entry) "([^"]*)" of user "([^"]*)" is shared with group "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $entry unused
	 * @param string $filepath
	 * @param string $user
	 * @param string $group
	 * @param null $withPerms unused
	 * @param int $permissions
	 * @return void
	 */
	public function assureFileIsSharedWithGroup(
		$entry, $filepath, $user, $group, $withPerms = null, $permissions = null
	) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares" . "?path=$filepath";
		$client = new Client();
		$options = [];
		if ($user === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$user, $this->regularUser];
		}
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
	 * @When /^deleting last share$/
	 * @return void
	 */
	public function deletingLastShare() {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->sendingToWith("DELETE", $url, null);
	}

	/**
	 * @When /^getting info of last share$/
	 * @return void
	 */
	public function gettingInfoOfLastShare() {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->sendingToWith("GET", $url, null);
	}

	/**
	 * @Then /^last share_id is included in the answer$/
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
	 * @Then /^last share_id is not included in the answer$/
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
		$actualCount = count($this->getResponseXml()->data[0]);
		PHPUnit_Framework_Assert::assertEquals($count, $actualCount);
	}

	/**
	 * @Then /^share fields of last share match with$/
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
	 * @Then as :user remove all shares from the file named :fileName
	 * @param string $user
	 * @param string $fileName
	 * @throws Exception
	 * @return void
	 */
	public function asRemoveAllSharesFromTheFileNamed($user, $fileName) {
		$url = $this->baseUrl . "v{$this->apiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?format=json";
		$client = new \GuzzleHttp\Client();
		$res = $client->get(
			$url,
			[
				'auth' => [
					$user,
					'123456',
				],
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
						'auth' => [
							$user,
							'123456',
						],
						'headers' => [
							'Content-Type' => 'application/json',
						],
					]
				);
				$deleted = true;
			}
		}

		if ($deleted === false) {
			throw new \Exception("Could not delete file $fileName");
		}
	}

	/**
	 * @When save last share id
	 * @return void
	 */
	public function saveLastShareId() {
		$this->savedShareId = $this->lastShareData['data']['id'];
	}

	/**
	 * @Then share ids should match
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

		if ($user === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$user, $this->regularUser];
		}

		$this->response = $client->send(new Request("GET", $fullUrl), $options);
		return $this->getResponseXml()->data->element;
	}

	/**
	 * @When /^user "([^"]*)" checks public shares of (file|folder) "([^"]*)"$/
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
	 * @When /^user "([^"]*)" deletes public share named "([^"]*)" in (file|folder) "([^"]*)"$/
	 * @param string $user
	 * @param string $name
	 * @param string $type
	 * @param string $path
	 * @return void
	 */
	public function deletingPublicShareNamed($user, $name, $type, $path) {
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
