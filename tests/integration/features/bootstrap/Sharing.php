<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use TestHelpers\SharingHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';



trait Sharing {
	use Provisioning;
	use AppConfiguration;

	/** @var int */
	private $sharingApiVersion = 1;

	/** @var SimpleXMLElement */
	private $lastShareData = null;

	/** @var int */
	private $savedShareId = null;

	/** @var int */
	private $lastShareTime = null;

	/**
	 * @Given /^as "([^"]*)" creating a share with$/
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode|null $body
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

		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			if (array_key_exists('expireDate', $fd)) {
				$dateModification = $fd['expireDate'];
				$fd['expireDate'] = date('Y-m-d', strtotime($dateModification));
			}
			$options['body'] = $fd;
		}

		try {
			$this->response = $client->send($client->createRequest("POST", $fullUrl, $options));
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}

		$this->lastShareData = $this->response->xml();
	}

	/**
	 * @When /^creating a share with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 */
	public function creatingShare($body) {
		$this->asCreatingAShareWith($this->currentUser, $body);
	}

	/**
	 * @When /^public shared file "([^"]*)" cannot be downloaded$/
	 * @param string $fileName
	 */
	public function publicSharedFileCannotDownload($path) {
		$token = $this->getLastShareToken();
		$fullUrl = substr($this->baseUrl, 0, -4) . "public.php/webdav/" . rawurlencode(ltrim($path, '/'));

		$client = new Client();
		$options = [];
		$options['auth'] = [$token, ""];

		$request = $client->createRequest('GET', $fullUrl, $options);

		try {
			$this->response = $client->send($request);
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
	 */
	public function checkPublicSharedFileWithPassword($filename, $password) {
		$token = $this->getLastShareToken();
		$fullUrl = substr($this->baseUrl, 0, -4) . "public.php/webdav";
		$this->checkDownload($fullUrl, [$token, $password], 'text/plain');
	}

	private function checkDownload($url, $auth = null, $mimeType = null) {
		if ($auth !== null) {
			$options['auth'] = $auth;
		}
		$options['stream'] = true;

		$client = new Client();
		$this->response = $client->get($url, $options);
		PHPUnit_Framework_Assert::assertEquals(200, $this->response->getStatusCode());

		$buf = '';
		$body = $this->response->getBody();
		while (!$body->eof()) {
			// read everything
			$buf .= $body->read(8192);
		}
		$body->close();

		if ($mimeType !== null) {
			$finfo = new finfo;
			PHPUnit_Framework_Assert::assertEquals($mimeType, $finfo->buffer($buf, FILEINFO_MIME_TYPE));
		}
	}

	/**
	 * @When publicly uploading file ":filename" with content ":body"
	 * @param string $filename target file name
	 * @param string $body content to upload
	 */
	public function publiclyUploadingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body);
	}

	/**
	 * @When publicly uploading file ":filename" with password ":password" and content ":body"
	 * @param string $filename target file name
	 * @param string $body content to upload
	 */
	public function publiclyUploadingContentWithPassword($filename, $password = '', $body = 'test') {
		$this->publicUploadContent($filename, $password, $body);
	}

	/**
	 * @When publicly uploading file ":filename" with content ":body" with autorename mode
	 * @param string $filename target file name
	 * @param string $body content to upload
	 */
	public function publiclyUploadingContentAutorename($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, true);
	}

	/**
	 * @When publicly uploading a file does not work
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

	private function publicUploadContent($filename, $password = '', $body = 'test', $autorename = false) {
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
		$this->response = $client->send($client->createRequest('PUT', $url, $options));
		PHPUnit_Framework_Assert::assertEquals(201, $this->response->getStatusCode());
	}

	/**
	 * @When /^adding expiration date to last share$/
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
		$options['body'] = ['expireDate' => $date];
		$this->response = $client->send($client->createRequest("PUT", $fullUrl, $options));
		PHPUnit_Framework_Assert::assertEquals(200, $this->response->getStatusCode());
	}

	/**
	 * @When /^updating last share with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
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

		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			if (array_key_exists('expireDate', $fd)) {
				$dateModification = $fd['expireDate'];
				$fd['expireDate'] = date('Y-m-d', strtotime($dateModification));
			}
			$options['body'] = $fd;
		}

		try {
			$this->response = $client->send($client->createRequest("PUT", $fullUrl, $options));
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}

		PHPUnit_Framework_Assert::assertEquals(200, $this->response->getStatusCode());
	}

	public function createShare($user,
								$path = null,
								$shareType = null,
								$shareWith = null,
								$publicUpload = null,
								$password = null,
								$permissions = null,
								$linkName = null) {

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
				$this->sharingApiVersion);
			$this->lastShareData = $this->response->xml();
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}
	}

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
					return True;
				} else {
					print($element->$field);
				}
			}

			return False;
		} else {
			if ($contentExpected == "A_TOKEN") {
					return (strlen((string)$data->$field) == 15);
			} elseif ($contentExpected == "A_NUMBER") {
					return is_numeric((string)$data->$field);
			} elseif ($contentExpected == "AN_URL") {
					return $this->isExpectedUrl((string)$data->$field, "index.php/s/");
			} elseif ($data->$field == $contentExpected) {
					return True;
			}
			return False;
		}
	}

	/**
	 * @Then /^file "([^"]*)" should be included in the response$/
	 *
	 * @param string $filename
	 */
	public function checkSharedFileInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(True, $this->isFieldInResponse('file_target', "/$filename"));
	}

	/**
	 * @Then /^file "([^"]*)" should not be included in the response$/
	 *
	 * @param string $filename
	 */
	public function checkSharedFileNotInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(False, $this->isFieldInResponse('file_target', "/$filename"));
	}

	/**
	 * @Then /^file "([^"]*)" should be included as path in the response$/
	 *
	 * @param string $filename
	 */
	public function checkSharedFileAsPathInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(True, $this->isFieldInResponse('path', "/$filename"));
	}

	/**
	 * @Then /^file "([^"]*)" should not be included as path in the response$/
	 *
	 * @param string $filename
	 */
	public function checkSharedFileAsPathNotInResponse($filename) {
		$filename = ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(False, $this->isFieldInResponse('path', "/$filename"));
	}

	/**
	 * @Then /^user "([^"]*)" should be included in the response$/
	 *
	 * @param string $user
	 */
	public function checkSharedUserInResponse($user) {
		PHPUnit_Framework_Assert::assertEquals(True, $this->isFieldInResponse('share_with', "$user"));
	}

	/**
	 * @Then /^user "([^"]*)" should not be included in the response$/
	 *
	 * @param string $user
	 */
	public function checkSharedUserNotInResponse($user) {
		PHPUnit_Framework_Assert::assertEquals(False, $this->isFieldInResponse('share_with', "$user"));
	}

	public function isUserOrGroupInSharedData($userOrGroup, $permissions = null) {
		$data = $this->response->xml()->data[0];
		foreach ($data as $element) {
			if ($element->share_with == $userOrGroup && ($permissions === null || $permissions == $element->permissions)) {
				return True;
			}
		}
		return False;
	}

	/**
	 * @Given /^(file|folder|entry) "([^"]*)" of user "([^"]*)" is shared with user "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $filepath
	 * @param string $user1
	 * @param string $user2
	 */
	public function assureFileIsShared($entry, $filepath, $user1, $user2, $withPerms = null, $permissions = null) {
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
				// prevent creating two shares with the same "stime" which is based on
				// seconds, this affects share merging order and could affect expected test
				// result order
				sleep(1);
			}
			$this->lastShareTime = $time;
			$this->createShare($user1, $filepath, 0, $user2, null, null, $permissions);
		}
		$this->response = $client->get($fullUrl, $options);
		PHPUnit_Framework_Assert::assertEquals(True, $this->isUserOrGroupInSharedData($user2, $permissions));
	}

	/**
	 * @Given /^(file|folder|entry) "([^"]*)" of user "([^"]*)" is shared with group "([^"]*)"( with permissions ([\d]*))?$/
	 *
	 * @param string $filepath
	 * @param string $user
	 * @param string $group
	 */
	public function assureFileIsSharedWithGroup($entry, $filepath, $user, $group, $withPerms = null, $permissions = null) {
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
			$this->createShare($user, $filepath, 1, $group, null, null, $permissions);
		}
		$this->response = $client->get($fullUrl, $options);
		PHPUnit_Framework_Assert::assertEquals(True, $this->isUserOrGroupInSharedData($group, $permissions));
	}

	/**
	 * @When /^deleting last share$/
	 */
	public function deletingLastShare() {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->sendingToWith("DELETE", $url, null);
	}

	/**
	 * @When /^getting info of last share$/
	 */
	public function gettingInfoOfLastShare() {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->sendingToWith("GET", $url, null);
	}

	/**
	 * @Then /^last share_id is included in the answer$/
	 */
	public function checkingLastShareIDIsIncluded() {
		$share_id = $this->lastShareData->data[0]->id;
		if (!$this->isFieldInResponse('id', $share_id)) {
			PHPUnit_Framework_Assert::fail("Share id $share_id not found in response");
		}
	}

	/**
	 * @Then /^last share_id is not included in the answer$/
	 */
	public function checkingLastShareIDIsNotIncluded() {
		$share_id = $this->lastShareData->data[0]->id;
		if ($this->isFieldInResponse('id', $share_id)) {
			PHPUnit_Framework_Assert::fail("Share id $share_id has been found in response");
		}
	}

	/**
	 * @Then /^the response contains ([0-9]+) entries$/
	 */
	public function checkingTheResponseEntriesCount($count) {
		$actualCount = count($this->response->xml()->data[0]);
		PHPUnit_Framework_Assert::assertEquals($count, $actualCount);
	}

	/**
	 * @Then /^share fields of last share match with$/
	 * @param \Behat\Gherkin\Node\TableNode|null $body
	 */
	public function checkShareFields($body) {
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();

			foreach ($fd as $field => $value) {
				if (substr($field, 0, 10 ) === "share_with") {
					$value = str_replace("REMOTE", substr($this->remoteBaseUrl, 0, -5), $value);
					$value = str_replace("LOCAL", substr($this->localBaseUrl, 0, -5), $value);
				}
				if (substr($field, 0, 6 ) === "remote") {
					$value = str_replace("REMOTE", substr($this->remoteBaseUrl, 0, -4), $value);
					$value = str_replace("LOCAL", substr($this->localBaseUrl, 0, -4), $value);
				}
				if (!$this->isFieldInResponse($field, $value)) {
					PHPUnit_Framework_Assert::fail("$field" . " doesn't have value " . "$value");
				}
			}
		}
	}

	/**
	 * @Then as :user remove all shares from the file named :fileName
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
	 */
	public function saveLastShareId()
	{
		$this->savedShareId = $this->lastShareData['data']['id'];
	}

	/**
	 * @Then share ids should match
	 */
	public function shareIdsShouldMatch()
	{
		if ($this->savedShareId !== $this->lastShareData['data']['id']) {
			throw new \Exception('Expected the same link share to be returned');
		}
	}

	/* Returns shares of a file or folders as an array of elements */
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

		$this->response = $client->send($client->createRequest("GET", $fullUrl, $options));
		return $this->response->xml()->data->element;
	}

	/**
	 * @When /^user "([^"]*)" checks public shares of (file|folder) "([^"]*)"$/
	 * @param string $user
	 * @param string $type
	 * @param string $path
	 * @param \Behat\Gherkin\Node\TableNode|null $body
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
						PHPUnit_Framework_Assert::assertEquals($expectedElementsArray[0], (string)$elementResponded->path[0]);
						PHPUnit_Framework_Assert::assertEquals($expectedElementsArray[1], (string)$elementResponded->permissions[0]);
						$nameFound = true;
						break;
					}
				}
				PHPUnit_Framework_Assert::assertTrue($nameFound, "Shared link name " . $expectedElementsArray[2] . " not found");
			}
		}
	}

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
	 */
	public function deletingPublicShareNamed($user, $name, $type, $path) {
		$share_id = $this->getPublicShareIDByName($user, $path, $name);
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->sendingToWith("DELETE", $url, null);
	}

	private function getLastShareToken() {
		if (count($this->lastShareData->data->element) > 0) {
			return $this->lastShareData->data[0]->token;
		}

		return $this->lastShareData->data->token;
	}

	protected function resetAppConfigs() {
		$this->modifyServerConfig('core', 'shareapi_allow_public_upload', 'yes');
	}
}

