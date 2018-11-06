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

use Behat\Gherkin\Node\TableNode;
use TestHelpers\SharingHelper;
use TestHelpers\HttpRequestHelper;

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
	 * @return SimpleXMLElement
	 */
	public function getLastShareData() {
		return $this->lastShareData;
	}

	/**
	 * @return number
	 */
	public function getSavedShareId() {
		return $this->savedShareId;
	}

	/**
	 * @return number
	 */
	public function getLastShareTime() {
		return $this->lastShareTime;
	}

	/**
	 * @When /^user "([^"]*)" creates a share using the sharing API with settings$/
	 * @Given /^user "([^"]*)" has created a share with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *    TableNode $body should not have any heading and can have following rows    |
	 *       | name            | A (human-readable) name for the share,              |
	 *       |                 | which can be up to 64 characters in length.         |
	 *       | publicUpload    | Whether to allow public upload to a public          |
	 *       |                 | shared folder. Write true for allowing.             |
	 *       | password        | The password to protect the public link share with. |
	 *       | expireDate      | An expire date for public link shares.              |
	 *       |                 | This argument expects a date string.                |
	 *       |                 | in the format 'YYYY-MM-DD'.                         |
	 *       | permissions     | The permissions to set on the share.                |
	 *       |                 |     1 = read; 2 = update; 4 = create;               |
	 *       |                 |     8 = delete; 16 = share; 31 = all                |
	 *       |                 |     15 = change                                     |
	 *       |                 |     (default: 31, for public shares: 1)             |
	 *       |                 |     Pass either the (total) number,                 |
	 *       |                 |     or the keyword,                                 |
	 *       |                 |     or an comma seperated list of keywords          |
	 *       | shareWith       | The user or group id with which the file should     |
	 *       |                 | be shared.                                          |
	 *       | shareType       | The type of the share. This can be one of:          |
	 *       |                 |    0 = user, 1 = group, 3 = public (link),          |
	 *       |                 |    6 = federated (cloud share).                     |
	 *       |                 |    Pass either the number or the keyword.           |
	 *
	 * @return void
	 */
	public function userCreatesAShareWithSettings($user, $body) {
		if ($body instanceof TableNode) {
			$fd = $body->getRowsHash();
			$fd['expireDate'] = \array_key_exists('expireDate', $fd) ? $fd['expireDate'] : null;
			$fd['name'] = \array_key_exists('name', $fd) ? $fd['name'] : null;
			$fd['shareWith'] = \array_key_exists('shareWith', $fd) ? $fd['shareWith'] : null;
			$fd['publicUpload'] = \array_key_exists('publicUpload', $fd) ? $fd['publicUpload'] === 'true' : null;
			$fd['password'] = \array_key_exists('password', $fd) ? $this->getActualPassword($fd['password']) : null;

			if (\array_key_exists('permissions', $fd)) {
				if (\is_numeric($fd['permissions'])) {
					$fd['permissions'] = (int)$fd['permissions'];
				} else {
					$fd['permissions'] = \array_map('trim', \explode(',', $fd['permissions']));
				}
			} else {
				$fd['permissions'] = null;
			}
			if (\array_key_exists('shareType', $fd)) {
				if (\is_numeric($fd['shareType'])) {
					$fd['shareType'] = (int)$fd['shareType'];
				}
			} else {
				$fd['shareType'] = null;
			}
		}
		$this->response = SharingHelper::createShare(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			$fd['path'],
			$fd['shareType'],
			$fd['shareWith'],
			$fd['publicUpload'],
			$fd['password'],
			$fd['permissions'],
			$fd['name'],
			$fd['expireDate'],
			$this->ocsApiVersion,
			$this->sharingApiVersion
		);
		$this->lastShareData = $this->getResponseXml();
	}

	/**
	 * @When /^the user creates a share using the sharing API with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserCreatesAShareWithSettings($body) {
		$this->userCreatesAShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share using the sharing API with settings$/
	 * @Given /^user "([^"]*)" has created a public link share with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userCreatesAPublicLinkShareWithSettings($user, $body) {
		$rows = $body->getRows();
		// A public link share is shareType 3
		$rows[] = ['shareType', '3'];
		$newBody = new TableNode($rows);
		$this->userCreatesAShareWithSettings($user, $newBody);
	}

	/**
	 * @When /^the user creates a public link share using the sharing API with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserCreatesAPublicLinkShareWithSettings($body) {
		$this->userCreatesAPublicLinkShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @Given /^the user has created a share with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserHasCreatedAShareWithSettings($body) {
		$this->userCreatesAShareWithSettings($this->currentUser, $body);
		$this->theOCSStatusCodeShouldBe([100, 200]);
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @Given /^the user has created a public link share with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserHasCreatedAPublicLinkShareWithSettings($body) {
		$this->theUserCreatesAPublicLinkShareWithSettings($body);
		$this->theOCSStatusCodeShouldBe([100, 200]);
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param boolean $publicUpload
	 * @param string|null $sharePassword
	 * @param string|int|string[]|int[]|null $permissions
	 * @param string $linkName
	 * @param string $expireDate
	 *
	 * @return void
	 */
	public function createAPublicShare(
		$user,
		$path,
		$publicUpload = false,
		$sharePassword = null,
		$permissions = null,
		$linkName = null,
		$expireDate = null
	) {
		$this->response = SharingHelper::createShare(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			$path,
			'public',
			null, // shareWith
			$publicUpload,
			$sharePassword,
			$permissions,
			$linkName,
			$expireDate,
			$this->ocsApiVersion,
			$this->sharingApiVersion
		);
		$this->lastShareData = $this->getResponseXml();
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share of (?:file|folder) "([^"]*)" using the sharing API$/
	 * @Given /^user "([^"]*)" has created a public link share of (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userCreatesAPublicLinkShareOf($user, $path) {
		$this->createAPublicShare($user, $path);
	}

	/**
	 * @When /^the user creates a public link share of (?:file|folder) "([^"]*)" using the sharing API$/
	 * @Given /^the user has created a public link share of (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfIsCreated($path) {
		$this->createAPublicShare($this->currentUser, $path);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with (read|update|create|delete|change|share|all) permission(?:s|)$/
	 * @Given /^user "([^"]*)" has created a public link share of (?:file|folder) "([^"]*)" with (read|update|create|delete|change|share|all) permission(?:s|)$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return void
	 */
	public function userCreatesAPublicLinkShareOfWithPermission(
		$user, $path, $permissions
	) {
		$this->createAPublicShare($user, $path, true, null, $permissions);
	}

	/**
	 * @When /^the user creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with (read|update|create|delete|change|share|all) permission(?:s|)$/
	 * @Given /^the user has created a public link share of (?:file|folder) "([^"]*)" with (read|update|create|delete|change|share|all) permission(?:s|)$/
	 *
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfIsCreatedWithPermission($path, $permissions) {
		$this->createAPublicShare(
			$this->currentUser, $path, true, null, $permissions
		);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with expiry "([^"]*)"$/
	 * @Given /^user "([^"]*)" has created a public link share of (?:file|folder) "([^"]*)" with expiry "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $expiryDate in a valid date format, e.g. "+30 days"
	 *
	 * @return void
	 */
	public function userCreatesAPublicLinkShareOfWithExpiry(
		$user, $path, $expiryDate
	) {
		$this->createAPublicShare(
			$user, $path, true, null, null, null, $expiryDate
		);
	}

	/**
	 * @When /^the user creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with expiry "([^"]*)$"/
	 * @Given /^the user has created a public link share of (?:file|folder) "([^"]*)" with expiry "([^"]*)$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $expiryDate in a valid date format, e.g. "+30 days"
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfIsCreatedWithExpiry(
		$user, $path, $expiryDate
	) {
		$this->createAPublicShare(
			$this->currentUser, $path, true, null, null, null, $expiryDate
		);
	}

	/**
	 * @Then /^the public shared file "([^"]*)" should not be able to be downloaded$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function publicSharedFileCannotBeDownloaded($path) {
		$token = $this->getLastShareToken();
		$fullUrl = $this->getBaseUrl()
			. "/public.php/webdav/" . \rawurlencode(\ltrim($path, '/'));

		$headers = ['X-Requested-With' => 'XMLHttpRequest'];
		$this->response = HttpRequestHelper::get($fullUrl, $token, "", $headers);
		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
			400, $this->response->getStatusCode(), 'download must fail'
		);
		PHPUnit_Framework_Assert::assertLessThanOrEqual(
			499, $this->response->getStatusCode(), '4xx error expected'
		);
	}

	/**
	 * @Then /^the last public shared file should be able to be downloaded without a password$/
	 *
	 * @return void
	 */
	public function checkLastPublicSharedFileDownload() {
		if (\count($this->lastShareData->data->element) > 0) {
			$url = $this->lastShareData->data[0]->url;
		} else {
			$url = $this->lastShareData->data->url;
		}
		$fullUrl = "$url/download";
		$this->checkDownload($fullUrl, null, null, 'text/plain');
	}

	/**
	 * @Then /^the last public shared file should be able to be downloaded with password "([^"]*)"$/
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function checkLastPublicSharedFileWithPasswordDownload($password) {
		$token = $this->getLastShareToken();
		$fullUrl = $this->getBaseUrl() . "/public.php/webdav";
		$this->checkDownload($fullUrl, $token, $password, 'text/plain');
	}

	/**
	 * @Then the last public shared file should not be able to be downloaded with password :password
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function theLastPublicSharedFileShouldNotBeAbleToBeDownloadedWithPassword($password) {
		$token = $this->getLastShareToken();
		$fullUrl = $this->getBaseUrl() . "/public.php/webdav";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $token, $password
		);
		PHPUnit_Framework_Assert::assertEquals(
			401,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @Then /^the user "([^"]*)" should be able to download the file "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function theUserShouldBeAbleToDownloadTheFileUsingTheSharingApi($user, $path) {
		$path = \ltrim($path, "/");
		$fullUrl = $this->getBaseUrl() . "/remote.php/webdav/$path";
		$this->checkUserDownload($fullUrl, $user, "text/plain");
	}

	/**
	 * @param string $url
	 * @param string $user
	 * @param string $mimeType
	 *
	 * @return void
	 */
	private function checkUserDownload($url, $user, $mimeType) {
		$this->response = HttpRequestHelper::get(
			$url, $user, $this->getPasswordForUser($user)
		);
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
		if ($mimeType !== null) {
			$finfo = new finfo;
			PHPUnit_Framework_Assert::assertEquals(
				$mimeType,
				$finfo->buffer($buf, FILEINFO_MIME_TYPE)
			);
		}
	}

	/**
	 * @param string $url
	 * @param string $user
	 * @param string $password
	 * @param string $mimeType
	 *
	 * @return void
	 */
	private function checkDownload(
		$url, $user = null, $password = null, $mimeType = null
	) {
		$password = $this->getActualPassword($password);
		$headers = ['X-Requested-With' => 'XMLHttpRequest'];
		$this->response = HttpRequestHelper::get($url, $user, $password, $headers);
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
	 * @When the public uploads file ":filename" with content ":body" using the public WebDAV API
	 * @Given the public has uploaded file ":filename" with content ":body"
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyUploadingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body);
	}

	/**
	 * @When the public overwrites file ":filename" with content ":body" using the old WebDAV API
	 * @Given the public has overwritten file ":filename" with content ":body"
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyOverwritingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, false);
	}

	/**
	 * @When the public uploads file ":filename" with password ":password" and content ":body" using the public WebDAV API
	 * @Given the public has uploaded file ":filename" with password ":password" and content ":body"
	 *
	 * @param string $filename target file name
	 * @param string $password
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyUploadingContentWithPassword(
		$filename, $password = '', $body = 'test'
	) {
		$this->publicUploadContent($filename, $password, $body);
	}

	/**
	 * @When the public uploads file ":filename" with content ":body" with autorename mode using the public WebDAV API
	 * @Given the public has uploaded file ":filename" with content ":body" with autorename mode
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyUploadingContentAutorename($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, true);
	}

	/**
	 * @When the public uploads file ":filename" using the old WebDAV API
	 * @Given the public has uploaded file ":filename"
	 *
	 * @param string $source target file name
	 *
	 * @return void
	 */
	public function publiclyUploadingFile($source) {
		$file = \GuzzleHttp\Stream\Stream::factory(\fopen($source, 'r'));
		$this->publicUploadContent(\basename($source), '', $file->getContents());
	}

	/**
	 * @Then /^user "([^"]*)" should not be able to create a public link share of (?:file|folder) "([^"]*)" using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $filepath
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToCreatePublicLinkShare($sharer, $filepath) {
		$this->createAPublicShare($sharer, $filepath);
		PHPUnit_Framework_Assert::assertEquals(
			404,
			$this->getOCSResponseStatusCode($this->response)
		);
	}

	/**
	 * @Then publicly uploading a file should not work
	 *
	 * @return void
	 */
	public function publiclyUploadingShouldNotWork() {
		$this->publicUploadContent('whateverfilefortesting.txt', '', 'test');

		PHPUnit_Framework_Assert::assertTrue(
			($this->response->getStatusCode() == 507)
			|| (
				($this->response->getStatusCode() >= 400)
				&& ($this->response->getStatusCode() <= 499)
			),
			"upload should have failed but passed with code " . $this->response->getStatusCode()
		);
	}

	/**
	 * @Then publicly uploading a file should work
	 *
	 * @return void
	 */
	public function publiclyUploadingShouldWork() {
		$path = 'whateverfilefortesting.txt';
		$content = 'test';
		$this->publicUploadContent($path, '', $content);

		PHPUnit_Framework_Assert::assertTrue(
			($this->response->getStatusCode() == 201),
			"upload should have passed but failed with code " . $this->response->getStatusCode()
		);
		$this->shouldBeAbleToDownloadFileInsidePublicSharedFolder("bytes=0-3", $path, $content);
	}

	/**
	 * @param string $filename
	 * @param string $password
	 * @param string $body
	 * @param bool $autorename
	 *
	 * @return void
	 */
	private function publicUploadContent(
		$filename,
		$password = '',
		$body = 'test',
		$autorename = false
	) {
		$password = $this->getActualPassword($password);
		$url = $this->getBaseUrl() . "/public.php/webdav/";
		$url .= \rawurlencode(\ltrim($filename, '/'));
		$token = $this->getLastShareToken();
		$headers = ['X-Requested-With' => 'XMLHttpRequest'];

		if ($autorename) {
			$headers['OC-Autorename'] = 1;
		}
		$this->response = HttpRequestHelper::put(
			$url, $token, $password, $headers, $body
		);
	}

	/**
	 * @When /^the user adds an expiration date to the last share using the sharing API$/
	 * @Given /^the user has added an expiration date to the last share$/
	 *
	 * @return void
	 */
	public function theUserAddsExpirationDateToLastShare() {
		$share_id = (string) $this->lastShareData->data[0]->id;
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$date = \date('Y-m-d', \strtotime("+3 days"));
		$body = ['expireDate' => $date];
		$this->response = HttpRequestHelper::put(
			$fullUrl, $this->currentUser,
			$this->getPasswordForUser($this->currentUser), null, $body
		);
		PHPUnit_Framework_Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @When /^the user updates the last share using the sharing API with$/
	 * @Given /^the user has updated the last share with$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserUpdatesTheLastShareWith($body) {
		$this->userUpdatesTheLastShareWith($this->currentUser, $body);
	}

	/**
	 * @When /^user "([^"]*)" updates the last share using the sharing API with$/
	 * @Given /^user "([^"]*)" has updated the last share with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userUpdatesTheLastShareWith($user, $body) {
		$share_id = (string) $this->lastShareData->data[0]->id;
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";

		if ($body instanceof TableNode) {
			$fd = $body->getRowsHash();
			if (\array_key_exists('expireDate', $fd)) {
				$dateModification = $fd['expireDate'];
				$fd['expireDate'] = \date('Y-m-d', \strtotime($dateModification));
			}
			if (\array_key_exists('password', $fd)) {
				$fd['password'] = $this->getActualPassword($fd['password']);
			}
		}

		$this->response = HttpRequestHelper::put(
			$fullUrl, $user, $this->getPasswordForUser($user), null, $fd
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
	 * @param string $expireDate
	 *
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
		$linkName = null,
		$expireDate = null
	) {
		$this->response = SharingHelper::createShare(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			$path,
			$shareType,
			$shareWith,
			$publicUpload,
			$password,
			$permissions,
			$linkName,
			$expireDate,
			$this->ocsApiVersion,
			$this->sharingApiVersion
		);
		$this->lastShareData = $this->getResponseXml();
	}

	/**
	 * @param string $field
	 * @param string $contentExpected
	 *
	 * @return bool
	 */
	public function isFieldInResponse($field, $contentExpected) {
		$data = $this->getResponseXml()->data[0];
		if ((string)$field == 'expiration') {
			$contentExpected
				= \date('Y-m-d', \strtotime($contentExpected)) . " 00:00:00";
		}
		if (\count($data->element) > 0) {
			foreach ($data as $element) {
				if ($contentExpected == "A_TOKEN") {
					return (\strlen((string)$element->$field) == 15);
				} elseif ($contentExpected == "A_NUMBER") {
					return \is_numeric((string)$element->$field);
				} elseif ($contentExpected == "AN_URL") {
					return $this->isAPublicLinkUrl((string)$element->$field);
				} elseif ((string)$element->$field == $contentExpected) {
					return true;
				} else {
					print($element->$field);
				}
			}

			return false;
		} else {
			if ($contentExpected == "A_TOKEN") {
				return (\strlen((string)$data->$field) == 15);
			} elseif ($contentExpected == "A_NUMBER") {
				return \is_numeric((string)$data->$field);
			} elseif ($contentExpected == "AN_URL") {
				return $this->isAPublicLinkUrl((string)$data->$field);
			} elseif ($contentExpected == $data->$field) {
				return true;
			}
			return false;
		}
	}

	/**
	 * @Then /^file "([^"]*)" should be included in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileInResponse($filename) {
		$filename = \ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isFieldInResponse('file_target', "/$filename")
		);
	}

	/**
	 * @Then /^file "([^"]*)" should not be included in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileNotInResponse($filename) {
		$filename = \ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			false,
			$this->isFieldInResponse('file_target', "/$filename")
		);
	}

	/**
	 * @Then /^file "([^"]*)" should be included as path in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileAsPathInResponse($filename) {
		$filename = \ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isFieldInResponse('path', "/$filename")
		);
	}

	/**
	 * @Then /^file "([^"]*)" should not be included as path in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileAsPathNotInResponse($filename) {
		$filename = \ltrim($filename, '/');
		PHPUnit_Framework_Assert::assertEquals(
			false,
			$this->isFieldInResponse('path', "/$filename")
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be included in the response$/
	 *
	 * @param string $user
	 *
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
	 *
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
	 *
	 * @return bool
	 */
	public function isUserOrGroupInSharedData($userOrGroup, $permissions = null) {
		$data = $this->getResponseXml()->data[0];
		foreach ($data as $element) {
			if ($element->share_with == $userOrGroup
				&& ($permissions === null || $permissions == $element->permissions)
			) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @When /^user "([^"]*)" shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions ([\d]*))? using the sharing API$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions ([\d]*))?$/
	 *
	 * @param string $user1
	 * @param string $filepath
	 * @param string $user2
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function userSharesFileWithUserUsingTheSharingApi(
		$user1, $filepath, $user2, $permissions = null
	) {
		$user1 = $this->getActualUsername($user1);
		$user2 = $this->getActualUsername($user2);

		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?path=$filepath";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user1, $this->getPasswordForUser($user1)
		);
		if ($this->isUserOrGroupInSharedData($user2, $permissions)) {
			return;
		} else {
			$time = \time();
			if ($this->lastShareTime !== null && $time - $this->lastShareTime < 1) {
				// prevent creating two shares with the same "stime" which is
				// based on seconds, this affects share merging order and could
				// affect expected test result order
				\sleep(1);
			}
			$this->lastShareTime = $time;
			$this->createShare(
				$user1, $filepath, 0, $user2, null, null, $permissions
			);
		}
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user1, $this->getPasswordForUser($user1)
		);
		PHPUnit_Framework_Assert::assertTrue(
			$this->isUserOrGroupInSharedData($user2, $permissions),
			"User $user1 failed to share $filepath with user $user2"
		);
	}

	/**
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions ([\d]*))? using the sharing API$/
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions ([\d]*))?$/
	 *
	 * @param string $filepath
	 * @param string $user2
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function theUserSharesFileWithUserUsingTheSharingApi(
		$filepath, $user2, $permissions = null
	) {
		$this->userSharesFileWithUserUsingTheSharingApi(
			$this->getCurrentUser(), $filepath, $user2, $permissions
		);
	}

	/**
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions ([\d]*))? using the sharing API$/
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions ([\d]*))?$/
	 *
	 * @param string $filepath
	 * @param string $group
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function theUserSharesFileWithGroupUsingTheSharingApi(
		$filepath, $group, $permissions = null
	) {
		$this->userSharesFileWithGroupUsingTheSharingApi(
			$this->currentUser, $filepath, $group, $permissions
		);
	}

	/**
	 * @When /^user "([^"]*)" shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions ([\d]*))? using the sharing API$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions ([\d]*))?$/
	 *
	 * @param string $user
	 * @param string $filepath
	 * @param string $group
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function userSharesFileWithGroupUsingTheSharingApi(
		$user, $filepath, $group, $permissions = null
	) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?path=$filepath";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user)
		);
		if ($this->isUserOrGroupInSharedData($group, $permissions)) {
			return;
		} else {
			$this->createShare(
				$user, $filepath, 1, $group, null, null, $permissions
			);
		}
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user)
		);

		PHPUnit_Framework_Assert::assertEquals(
			true,
			$this->isUserOrGroupInSharedData($group, $permissions)
		);
	}

	/**
	 * @When /^user "([^"]*)" tries to update the last share using the sharing API with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userTriesToUpdateTheLastShareUsingTheSharingApiWith($user, TableNode $body) {
		$this->userUpdatesTheLastShareWith($user, $body);
	}

	/**
	 * @Then /^user "([^"]*)" should not be able to share (?:file|folder|entry) "([^"]*)" with (user|group) "([^"]*)"(?: with permissions ([\d]*))? using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $filepath
	 * @param string $userOrGroup
	 * @param string $sharee
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function userTriesToShareFileUsingTheSharingApi($sharer, $filepath, $userOrGroup, $sharee, $permissions = null) {
		$shareType = ($userOrGroup === "user" ? 0 : 1);
		$time = \time();
		if ($this->lastShareTime !== null && $time - $this->lastShareTime < 1) {
			// prevent creating two shares with the same "stime" which is
			// based on seconds, this affects share merging order and could
			// affect expected test result order
			\sleep(1);
		}
		$this->lastShareTime = $time;
		$this->createShare(
			$sharer, $filepath, $shareType, $sharee, null, null, $permissions
		);
		$statusCode = $this->getOCSResponseStatusCode($this->response);
		PHPUnit_Framework_Assert::assertTrue(
			($statusCode == 404) || ($statusCode == 403),
			"Sharing should have failed but passed with status code $statusCode"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be able to share (?:file|folder|entry) "([^"]*)" with (user|group) "([^"]*)"(?: with permissions ([\d]*))? using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $filepath
	 * @param string $userOrGroup
	 * @param string $sharee
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function userShouldBeAbleToShareUsingTheSharingApi(
		$sharer, $filepath, $userOrGroup, $sharee, $permissions = null
	) {
		$shareType = ($userOrGroup === "user" ? 0 : 1);
		$time = \time();
		if ($this->lastShareTime !== null && $time - $this->lastShareTime < 1) {
			// prevent creating two shares with the same "stime" which is
			// based on seconds, this affects share merging order and could
			// affect expected test result order
			\sleep(1);
		}
		$this->lastShareTime = $time;
		$this->createShare(
			$sharer, $filepath, $shareType, $sharee, null, null, $permissions
		);
		
		//v1.php returns 100 as success code
		//v2.php returns 200 in the same case
		$this->theOCSStatusCodeShouldBe([100, 200]);
	}

	/**
	 * @When /^the user deletes the last share using the sharing API$/
	 * @Given /^the user has deleted the last share$/
	 *
	 * @return void
	 */
	public function theUserDeletesLastShareUsingTheSharingAPI() {
		$this->userDeletesLastShareUsingTheSharingApi($this->currentUser);
	}

	/**
	 * @When /^user "([^"]*)" deletes the last share using the sharing API$/
	 * @Given /^user "([^"]*)" has deleted the last share$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userDeletesLastShareUsingTheSharingApi($user) {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, "DELETE", $url, null
		);
	}

	/**
	 * @When /^the user gets the info of the last share using the sharing API$/
	 *
	 * @return void
	 */
	public function theUserGetsInfoOfLastShareUsingTheSharingApi() {
		$this->userGetsInfoOfLastShareUsingTheSharingApi($this->currentUser);
	}

	/**
	 * @When /^user "([^"]*)" gets the info of the last share using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userGetsInfoOfLastShareUsingTheSharingApi($user) {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, "GET", $url, null
		);
	}

	/**
	 * @Then /^the last share_id should be included in the response/
	 *
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
	 *
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
	 * @Then /^the response should contain ([0-9]+) entries$/
	 *
	 * @param int $count
	 *
	 * @return void
	 */
	public function checkingTheResponseEntriesCount($count) {
		$actualCount = \count($this->getResponseXml()->data[0]);
		PHPUnit_Framework_Assert::assertEquals($count, $actualCount);
	}

	/**
	 * @Then /^the share fields of the last share should include$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function checkShareFields($body) {
		if ($body instanceof TableNode) {
			$fd = $body->getRowsHash();

			foreach ($fd as $field => $value) {
				if (\substr($field, 0, 10) === "share_with") {
					$value = \str_replace(
						"REMOTE",
						$this->getRemoteBaseUrl(),
						$value
					);
					$value = \str_replace(
						"LOCAL",
						$this->getLocalBaseUrl(),
						$value
					);
				}
				if (\substr($field, 0, 6) === "remote") {
					$value = \str_replace(
						"REMOTE",
						$this->getRemoteBaseUrl(),
						$value
					);
					$value = \str_replace(
						"LOCAL",
						$this->getLocalBaseUrl() . '/',
						$value
					);
				}
				if (!$this->isFieldInResponse($field, $value)) {
					PHPUnit_Framework_Assert::fail(
						"$field doesn't have value $value"
					);
				}
			}
		}
	}

	/**
	 * @When user :user removes all shares from the file named :fileName using the sharing API
	 * @Given user :user has removed all shares from the file named :fileName
	 *
	 * @param string $user
	 * @param string $fileName
	 *
	 * @throws \Exception
	 * @return void
	 */
	public function userRemovesAllSharesFromTheFileNamed($user, $fileName) {
		$url = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?format=json";

		$headers = ['Content-Type' => 'application/json'];
		$res = HttpRequestHelper::get(
			$url, $user, $this->getPasswordForUser($user), $headers
		);
		$json = \json_decode($res->getBody()->getContents(), true);
		$deleted = false;
		foreach ($json['ocs']['data'] as $data) {
			if (\stripslashes($data['path']) === $fileName) {
				$id = $data['id'];
				$url = $this->getBaseUrl()
					. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/{$id}";
				HttpRequestHelper::delete(
					$url, $user, $this->getPasswordForUser($user), $headers
				);
				$deleted = true;
			}
		}

		if ($deleted === false) {
			throw new \Exception(
				"Could not delete shares for user $user file $fileName"
			);
		}
	}

	/**
	 * @Given the last share id has been remembered
	 *
	 * @return void
	 */
	public function rememberLastShareId() {
		$this->savedShareId = $this->lastShareData['data']['id'];
	}

	/**
	 * @Then the share ids should match
	 *
	 * @return void
	 * @throws \Exception
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
	 *
	 * @return array
	 */
	public function getShares($user, $path) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares";
		$fullUrl = "$fullUrl?path=$path";
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user)
		);
		return $this->getResponseXml()->data->element;
	}

	/**
	 * @Then /^as user "([^"]*)" the public shares of (?:file|folder) "([^"]*)" should be$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode|null $TableNode
	 *
	 * @return void
	 */
	public function checkPublicShares($user, $path, $TableNode) {
		$dataResponded = $this->getShares($user, $path);

		if ($TableNode instanceof TableNode) {
			$elementRows = $TableNode->getRows();

			if ($elementRows[0][0] === '') {
				//It shouldn't have public shares
				PHPUnit_Framework_Assert::assertEquals(\count($dataResponded), 0);
				return;
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
					"Shared link name {$expectedElementsArray[2]} not found"
				);
			}
		}
	}

	/**
	 * @param string $user
	 * @param string $path to share
	 * @param string $name of share
	 *
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
	 * @When /^user "([^"]*)" deletes public link share named "([^"]*)" in (?:file|folder) "([^"]*)" using the sharing API$/
	 * @Given /^user "([^"]*)" has deleted public link share named "([^"]*)" in (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $name
	 * @param string $path
	 *
	 * @return void
	 */
	public function userDeletesPublicLinkShareNamedUsingTheSharingApi(
		$user, $name, $path
	) {
		$share_id = $this->getPublicShareIDByName($user, $path, $name);
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->theUserSendsToOcsApiEndpointWithBody("DELETE", $url, null);
	}

	/**
	 * @When /^user "([^"]*)" (declines|accepts) the share "([^"]*)" offered by user "([^"]*)" using the sharing API$/
	 * @Given /^user "([^"]*)" has (declined|accepted) the share "([^"]*)" offered by user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 */
	public function userReactsToShareOfferedBy($user, $action, $share, $offeredBy) {
		$dataResponded = $this->getAllSharesSharedWithUser($user);
		$shareId = null;
		foreach ($dataResponded as $shareElement) {
			if ((string)$shareElement['uid_owner'] === $offeredBy
				&& (string)$shareElement['path'] === $share
			) {
				$shareId = (string) $shareElement['id'];
				break;
			}
		}
		if ($shareId === null) {
			throw new Exception(
				__METHOD__ .
				" could not find share $share, offered by $offeredBy to $user"
			);
		}
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}" .
			   "/shares/pending/$shareId";
		if (\substr($action, 0, 7) === "decline") {
			$httpRequestMethod = "DELETE";
		} elseif (\substr($action, 0, 6) === "accept") {
			$httpRequestMethod = "POST";
		}
		
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, $httpRequestMethod, $url, null
		);
		if ($this->response->getStatusCode() !== 200) {
			throw new Exception(
				__METHOD__ . " could not $action share"
			);
		}
	}

	/**
	 *
	 * @Then /^the sharing API should report to user "([^"]*)" that these shares are in the (pending|accepted|declined) state$/
	 *
	 * @param string $user
	 * @param string $state
	 * @param TableNode $table table with headings that correspond to the attributes
	 *                         of the share e.g. "|path|uid_owner|"
	 *
	 * @return void
	 */
	public function assertSharesOfUserAreInState($user, $state, TableNode $table) {
		$usersShares = $this->getAllSharesSharedWithUser($user, $state);
		foreach ($table as $row) {
			$found = false;
			//the API returns the path without trailing slash, but we want to
			//be able to accept trailing slashes in the step definition
			$row['path'] = \rtrim($row['path'], "/");
			foreach ($usersShares as $share) {
				try {
					PHPUnit_Framework_Assert::assertArraySubset($row, $share);
					$found = true;
					break;
				} catch (PHPUnit_Framework_ExpectationFailedException $e) {
				}
			}
			if (!$found) {
				PHPUnit_Framework_Assert::fail(
					"could not find the share with this attributes " .
					\print_r($row, true)
				);
			}
		}
	}

	/**
	 * @Then the sharing API should report that no shares are shared with user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function assertThatNoSharesAreSharedWithUser($user) {
		$usersShares = $this->getAllSharesSharedWithUser($user);
		PHPUnit_Framework_Assert::assertEmpty(
			$usersShares, "user has " . \count($usersShares) . " share(s)"
		);
	}

	/**
	 *
	 * @param string $user
	 * @param string $state pending|accepted|declined|rejected|all
	 *
	 * @throws InvalidArgumentException
	 * @throws Exception
	 *
	 * @return array of shares that are shared with this user
	 */
	private function getAllSharesSharedWithUser($user, $state = "all") {
		switch ($state) {
			case 'pending':
				$stateCode = \OCP\Share::STATE_PENDING;
				break;
			case 'accepted':
				$stateCode = \OCP\Share::STATE_ACCEPTED;
				break;
			case 'declined':
			case 'rejected':
				$stateCode = \OCP\Share::STATE_REJECTED;
				break;
			case 'all':
				$stateCode = "all";
				break;
			default:
				throw new InvalidArgumentException(
					__METHOD__ . ' invalid "state" given'
				);
				break;
		}
		
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares" .
			   "?format=json&shared_with_me=true&state=$stateCode";
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, "GET", $url, null
		);
		if ($this->response->getStatusCode() !== 200) {
			throw new Exception(
				__METHOD__ . " could not retrieve information about shares"
			);
		}
		$result = $this->response->getBody()->getContents();
		$usersShares = \json_decode($result, true);
		if (!\is_array($usersShares)) {
			throw new Exception(
				__METHOD__ . " API result about shares is not valid JSON"
			);
		}
		return $usersShares['ocs']['data'];
	}

	/**
	 * @return string authorization token
	 */
	public function getLastShareToken() {
		if (\count($this->lastShareData->data->element) > 0) {
			return $this->lastShareData->data[0]->token;
		}
		
		return $this->lastShareData->data->token;
	}

	/**
	 * @return array of common sharing capability settings for testing
	 */
	protected function getCommonSharingConfigs() {
		return [
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'auto_accept_share',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_auto_accept_share',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'api_enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_enabled',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_links',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@upload',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_public_upload',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'group_sharing',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_group_sharing',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'share_with_group_members_only',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_only_share_with_group_members',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'share_with_membership_groups_only',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_only_share_with_membership_groups',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'exclude_groups_from_sharing',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_exclude_groups',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' =>
					'user_enumeration@@@enabled',
				'testingApp' => 'core',
				'testingParameter' =>
					'shareapi_allow_share_dialog_user_enumeration',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' =>
					'user_enumeration@@@group_members_only',
				'testingApp' => 'core',
				'testingParameter' =>
					'shareapi_share_dialog_user_enumeration_group_members',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'resharing',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_resharing',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' =>
				'public@@@password@@@enforced_for@@@read_only',
				'testingApp' => 'core',
				'testingParameter' =>
				'shareapi_enforce_links_password_read_only',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' =>
				'public@@@password@@@enforced_for@@@read_write',
				'testingApp' => 'core',
				'testingParameter' =>
				'shareapi_enforce_links_password_read_write',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' =>
				'public@@@password@@@enforced_for@@@upload_only',
				'testingApp' => 'core',
				'testingParameter' =>
				'shareapi_enforce_links_password_write_only',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@send_mail',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_public_notification',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@social_share',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_social_share',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@expire_date@@@enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_default_expire_date',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'public@@@expire_date@@@enforced',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_enforce_expire_date',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'federation@@@outgoing',
				'testingApp' => 'files_sharing',
				'testingParameter' => 'outgoing_server2server_share_enabled',
				'testingState' => true
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'federation@@@incoming',
				'testingApp' => 'files_sharing',
				'testingParameter' => 'incoming_server2server_share_enabled',
				'testingState' => true
			]
		];
	}
}
