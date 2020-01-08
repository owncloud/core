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
use GuzzleHttp\Message\ResponseInterface;
use PHPUnit\Framework\Assert;
use TestHelpers\SetupHelper;
use TestHelpers\SharingHelper;
use TestHelpers\HttpRequestHelper;

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
	private $localLastShareTime = null;

	/**
	 * @var array
	 */
	private $shareFields = [
		'path', 'name', 'publicUpload', 'password', 'expireDate',
		'expireDateAsString', 'permissions', 'shareWith', 'shareType'
	];

	/**
	 * @var array
	 */
	private $shareResponseFields = [
		'id', 'share_type', 'uid_owner', 'displayname_owner', 'stime', 'parent',
		'expiration', 'token', 'uid_file_owner', 'displayname_file_owner', 'path',
		'item_type', 'mimetype', 'storage_id', 'storage', 'item_source',
		'file_source', 'file_parent', 'file_target', 'name', 'url', 'mail_send',
		'attributes', 'permissions', 'share_with', 'share_with_displayname', 'share_with_additional_info'
	];

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
	 * @return void
	 */
	public function resetLastShareData() {
		$this->lastShareData = null;
	}

	/**
	 * @return int
	 */
	public function getLocalLastShareTime() {
		return $this->localLastShareTime;
	}

	/**
	 * @return int
	 */
	public function getServerLastShareTime() {
		return (int) $this->lastShareData->data->stime;
	}

	/**
	 * Split given permissions string each separated with "," into array of strings
	 *
	 * @param string $str
	 *
	 * @return string[]
	 */
	private function splitPermissionsString($str) {
		$str = \trim($str);
		$permissions = \array_map('trim', \explode(',', $str));

		/* We use 'all', 'uploadwriteonly' and 'change' in feature files
		for readability. Parse into appropriate permissions and return them
		without any duplications.*/
		if (\in_array('all', $permissions, true)) {
			$permissions = \array_keys(SharingHelper::PERMISSION_TYPES);
		}
		if (\in_array('uploadwriteonly', $permissions, true)) {
			// remove 'uploadwriteonly' from $permissions
			$permissions = \array_diff($permissions, ['uploadwriteonly']);
			$permissions = \array_merge($permissions, ['create']);
		}
		if (\in_array('change', $permissions, true)) {
			// remove 'change' from $permissions
			$permissions = \array_diff($permissions, ['change']);
			$permissions = \array_merge(
				$permissions, ['create', 'delete', 'read', 'update']
			);
		}

		return \array_unique($permissions);
	}

	/**
	 *
	 * @return int
	 *
	 * @throws Exception
	 */
	public function getServerShareTimeFromLastResponse() {
		$stime = $this->getResponseXml()->xpath("//stime");
		if ((bool) $stime) {
			return (int) $stime[0];
		}
		throw new Exception("Last share time (i.e. 'stime') could not be found in the response.");
	}

	/**
	 * @return void
	 */
	private function waitToCreateShare() {
		if (($this->localLastShareTime !== null)
			&& ((\microtime(true) - $this->localLastShareTime) < 1)
		) {
			// prevent creating two shares with the same "stime" which is
			// based on seconds, this affects share merging order and could
			// affect expected test result order
			\sleep(1);
		}
	}

	/**
	 * @param string $user
	 * @param TableNode|null $body
	 *    TableNode $body should not have any heading and can have following rows    |
	 *       | path               | The folder or file path to be shared                |
	 *       | name               | A (human-readable) name for the share,              |
	 *       |                    | which can be up to 64 characters in length.         |
	 *       | publicUpload       | Whether to allow public upload to a public          |
	 *       |                    | shared folder. Write true for allowing.             |
	 *       | password           | The password to protect the public link share with. |
	 *       | expireDate         | An expire date for public link shares.              |
	 *       |                    | This argument takes a date string in any format     |
	 *       |                    | that can be passed to strtotime(), for example:     |
	 *       |                    | 'YYYY-MM-DD' or '+ x days'. It will be converted to |
	 *       |                    | 'YYYY-MM-DD' format before sending                  |
	 *       | expireDateAsString | An expire date string for public link shares.       |
	 *       |                    | Whatever string is provided will be sent as the     |
	 *       |                    | expire date. For example, use this to test sending  |
	 *       |                    | invalid date strings.                               |
	 *       | permissions        | The permissions to set on the share.                |
	 *       |                    |     1 = read; 2 = update; 4 = create;               |
	 *       |                    |     8 = delete; 16 = share; 31 = all                |
	 *       |                    |     15 = change                                     |
	 *       |                    |     4 = uploadwriteonly                             |
	 *       |                    |     (default: 31, for public shares: 1)             |
	 *       |                    |     Pass either the (total) number,                 |
	 *       |                    |     or the keyword,                                 |
	 *       |                    |     or an comma separated list of keywords          |
	 *       | shareWith          | The user or group id with which the file should     |
	 *       |                    | be shared.                                          |
	 *       | shareType          | The type of the share. This can be one of:          |
	 *       |                    |    0 = user, 1 = group, 3 = public_link,            |
	 *       |                    |    6 = federated (cloud share).                     |
	 *       |                    |    Pass either the number or the keyword.           |
	 *
	 * @return void
	 */
	public function createShareWithSettings($user, $body) {
		$this->verifyTableNodeRows(
			$body,
			['path'],
			$this->shareFields
		);
		$fd = $body->getRowsHash();
		$fd['name'] = \array_key_exists('name', $fd) ? $fd['name'] : null;
		$fd['shareWith'] = \array_key_exists('shareWith', $fd) ? $fd['shareWith'] : null;
		$fd['publicUpload'] = \array_key_exists('publicUpload', $fd) ? $fd['publicUpload'] === 'true' : null;
		$fd['password'] = \array_key_exists('password', $fd) ? $this->getActualPassword($fd['password']) : null;

		if (\array_key_exists('permissions', $fd)) {
			if (\is_numeric($fd['permissions'])) {
				$fd['permissions'] = (int) $fd['permissions'];
			} else {
				$fd['permissions'] = $this->splitPermissionsString($fd['permissions']);
			}
		} else {
			$fd['permissions'] = null;
		}
		if (\array_key_exists('shareType', $fd)) {
			if (\is_numeric($fd['shareType'])) {
				$fd['shareType'] = (int) $fd['shareType'];
			}
		} else {
			$fd['shareType'] = null;
		}

		Assert::assertFalse(
			isset($fd['expireDate'], $fd['expireDateAsString']),
			'expireDate and expireDateAsString cannot be set at the same time.'
		);
		$needToParse = \array_key_exists('expireDate', $fd);
		$expireDate = $fd['expireDate'] ?? $fd['expireDateAsString'] ?? null;
		$fd['expireDate'] = $needToParse ? \date('Y-m-d', \strtotime($expireDate)) : $expireDate;
		$this->createShare(
			$user,
			$fd['path'],
			$fd['shareType'],
			$fd['shareWith'],
			$fd['publicUpload'],
			$fd['password'],
			$fd['permissions'],
			$fd['name'],
			$fd['expireDate']
		);
	}

	/**
	 * @When /^user "([^"]*)" creates a share using the sharing API with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body {@link createShareWithSettings}
	 *
	 * @return void
	 */
	public function userCreatesAShareWithSettings($user, $body) {
		$this->createShareWithSettings(
			$user,
			$body
		);
	}

	/**
	 * @Given /^user "([^"]*)" has created a share with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body {@link createShareWithSettings}
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasCreatedAShareWithSettings($user, $body) {
		$this->createShareWithSettings(
			$user,
			$body
		);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"Failed HTTP status code for last share for user $user" . ", Response: " . $this->getResponse()
		);
	}

	/**
	 * @When /^the user creates a share using the sharing API with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserCreatesAShareWithSettings($body) {
		$this->createShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share using the sharing API with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userCreatesAPublicLinkShareWithSettings($user, $body) {
		$rows = $body->getRows();
		// A public link share is shareType 3
		$rows[] = ['shareType', 'public_link'];
		$newBody = new TableNode($rows);
		$this->createShareWithSettings($user, $newBody);
	}

	/**
	 * @Given /^user "([^"]*)" has created a public link share with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userHasCreatedAPublicLinkShareWithSettings($user, $body) {
		$this->userCreatesAPublicLinkShareWithSettings($user, $body);
		$this->ocsContext->theOCSStatusCodeShouldBe([100, 200]);
		$this->theHTTPStatusCodeShouldBe(200);
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
		$this->createShareWithSettings($this->currentUser, $body);
		$this->ocsContext->theOCSStatusCodeShouldBe([100, 200]);
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
		$this->ocsContext->theOCSStatusCodeShouldBe([100, 200]);
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
		$this->createShare(
			$user,
			$path,
			'public_link',
			null, // shareWith
			$publicUpload,
			$sharePassword,
			$permissions,
			$linkName,
			$expireDate
		);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share of (?:file|folder) "([^"]*)" using the sharing API$/
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
	 * @Given /^user "([^"]*)" has created a public link share of (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userHasCreatedAPublicLinkShareOf($user, $path) {
		$this->createAPublicShare($user, $path);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $path
	 *
	 * @return void
	 */
	public function createPublicLinkShareOfResourceAsCurrentUser($path) {
		$this->createAPublicShare($this->currentUser, $path);
	}

	/**
	 * @When /^the user creates a public link share of (?:file|folder) "([^"]*)" using the sharing API$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfIsCreated($path) {
		$this->createPublicLinkShareOfResourceAsCurrentUser($path);
	}

	/**
	 * @Given /^the user has created a public link share of (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfHasCreated($path) {
		$this->createPublicLinkShareOfResourceAsCurrentUser($path);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return void
	 */
	public function createPublicLinkShareOfResourceWithPermission(
		$user, $path, $permissions
	) {
		$this->createAPublicShare($user, $path, true, null, $permissions);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with (read|update|create|delete|change|uploadwriteonly|share|all) permission(?:s|)$/
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
		$this->createPublicLinkShareOfResourceWithPermission(
			$user,
			$path,
			$permissions
		);
	}

	/**
	 * @Given /^user "([^"]*)" has created a public link share of (?:file|folder) "([^"]*)" with (read|update|create|delete|change|uploadwriteonly|share|all) permission(?:s|)$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return void
	 */
	public function userHasCreatedAPublicLinkShareOfWithPermission(
		$user, $path, $permissions
	) {
		$this->createPublicLinkShareOfResourceWithPermission(
			$user,
			$path,
			$permissions
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return void
	 */
	public function createPublicLinkShareWithPermissionByCurrentUser($path, $permissions) {
		$this->createAPublicShare(
			$this->currentUser, $path, true, null, $permissions
		);
	}

	/**
	 * @When /^the user creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with (read|update|create|delete|change|uploadwriteonly|share|all) permission(?:s|)$/
	 *
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfIsCreatedWithPermission($path, $permissions) {
		$this->createPublicLinkShareWithPermissionByCurrentUser($path, $permissions);
	}

	/**
	 * @Given /^the user has created a public link share of (?:file|folder) "([^"]*)" with (read|update|create|delete|change|uploadwriteonly|share|all) permission(?:s|)$/
	 *
	 * @param string $path
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfHasCreatedWithPermission($path, $permissions) {
		$this->createPublicLinkShareWithPermissionByCurrentUser($path, $permissions);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param string $expiryDate in a valid date format, e.g. "+30 days"
	 *
	 * @return void
	 */
	public function createPublicLinkShareOfResourceWithExpiry(
		$user, $path, $expiryDate
	) {
		$this->createAPublicShare(
			$user, $path, true, null, null, null, $expiryDate
		);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with expiry "([^"]*)"$/
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
		$this->createPublicLinkShareOfResourceWithExpiry(
			$user,
			$path,
			$expiryDate
		);
	}

	/**
	 * @Given /^user "([^"]*)" has created a public link share of (?:file|folder) "([^"]*)" with expiry "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $expiryDate in a valid date format, e.g. "+30 days"
	 *
	 * @return void
	 */
	public function userHasCreatedAPublicLinkShareOfWithExpiry(
		$user, $path, $expiryDate
	) {
		$this->createPublicLinkShareOfResourceWithExpiry(
			$user,
			$path,
			$expiryDate
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $path
	 * @param string $expiryDate in a valid date format, e.g. "+30 days"
	 *
	 * @return void
	 */
	public function createPublicLinkShareOfResourceWithExpiryByCurrentUser(
		$path, $expiryDate
	) {
		$this->createAPublicShare(
			$this->currentUser, $path, true, null, null, null, $expiryDate
		);
	}

	/**
	 * @When /^the user creates a public link share of (?:file|folder) "([^"]*)" using the sharing API with expiry "([^"]*)$"/
	 *
	 * @param string $path
	 * @param string $expiryDate in a valid date format, e.g. "+30 days"
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfIsCreatedWithExpiry(
		$path, $expiryDate
	) {
		$this->createPublicLinkShareOfResourceWithExpiryByCurrentUser(
			$path,
			$expiryDate
		);
	}

	/**
	 * @Given /^the user has created a public link share of (?:file|folder) "([^"]*)" with expiry "([^"]*)$/
	 *
	 * @param string $path
	 * @param string $expiryDate in a valid date format, e.g. "+30 days"
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfHasCreatedWithExpiry(
		$path, $expiryDate
	) {
		$this->createPublicLinkShareOfResourceWithExpiryByCurrentUser(
			$path,
			$expiryDate
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * Give the mimetype of the last shared file
	 *
	 * @return string
	 */
	public function getMimeTypeOfLastSharedFile() {
		return \json_decode(\json_encode($this->lastShareData->data->mimetype), 1)[0];
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
		Assert::assertEquals(
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
			Assert::assertEquals(
				$mimeType,
				$finfo->buffer($buf, FILEINFO_MIME_TYPE)
			);
		}
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
		Assert::assertEquals(
			404,
			$this->ocsContext->getOCSResponseStatusCode($this->response)
		);
	}

	/**
	 * @When /^the user adds an expiration date to the last share using the sharing API$/
	 *
	 * @return void
	 */
	public function theUserAddsExpirationDateToLastShare() {
		$share_id = (string) $this->lastShareData->data[0]->id;
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$date = \date('Y-m-d', \strtotime("+3 days"));
		$body = ['expireDate' => $date];
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::put(
			$fullUrl, $this->currentUser,
			$this->getPasswordForUser($this->currentUser), $headers, $body
		);
	}

	/**
	 * @Given /^the user has added an expiration date to the last share$/
	 *
	 * @return void
	 */
	public function theUserHasAddedExpirationDateToLastShare() {
		$this->theUserAddsExpirationDateToLastShare();
		Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function updateLastShareByCurrentUser($body) {
		$this->updateLastShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @When /^the user updates the last share using the sharing API with$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserUpdatesTheLastShareWith($body) {
		$this->updateLastShareByCurrentUser($body);
	}

	/**
	 * @Given /^the user has updated the last share with$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserHasUpdatedTheLastShareWith($body) {
		$this->updateLastShareByCurrentUser($body);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function updateLastShareWithSettings($user, $body) {
		$share_id = (string) $this->lastShareData->data[0]->id;
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";

		$this->verifyTableNodeRows(
			$body,
			[],
			$this->shareFields
		);
		$fd = $body->getRowsHash();
		if (\array_key_exists('expireDate', $fd)) {
			$dateModification = $fd['expireDate'];
			$fd['expireDate'] = \date('Y-m-d', \strtotime($dateModification));
		}
		if (\array_key_exists('password', $fd)) {
			$fd['password'] = $this->getActualPassword($fd['password']);
		}
		if (\array_key_exists('permissions', $fd)) {
			if (\is_numeric($fd['permissions'])) {
				$fd['permissions'] = (int) $fd['permissions'];
			} else {
				$fd['permissions'] = $this->splitPermissionsString($fd['permissions']);
				$fd['permissions'] = SharingHelper::getPermissionSum($fd['permissions']);
			}
		}

		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::put(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers, $fd
		);
	}

	/**
	 * @When /^user "([^"]*)" updates the last share using the sharing API with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userUpdatesTheLastShareWith($user, $body) {
		$this->updateLastShareWithSettings($user, $body);
	}

	/**
	 * @Given /^user "([^"]*)" has updated the last share with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userHasUpdatedTheLastShareWith($user, $body) {
		$this->updateLastShareWithSettings($user, $body);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param string $shareType
	 * @param string $shareWith
	 * @param string $publicUpload
	 * @param string $sharePassword
	 * @param string|int|string[]|int[] $permissions
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
		$sharePassword = null,
		$permissions = null,
		$linkName = null,
		$expireDate = null
	) {
		if (\is_string($permissions) && !\is_numeric($permissions)) {
			$permissions = $this->splitPermissionsString($permissions);
		}
		$this->waitToCreateShare();
		$this->response = SharingHelper::createShare(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			$path,
			$shareType,
			$shareWith,
			$publicUpload,
			$sharePassword,
			$permissions,
			$linkName,
			$expireDate,
			$this->ocsApiVersion,
			$this->sharingApiVersion
		);
		$this->lastShareData = $this->getResponseXml();
		$this->localLastShareTime = \microtime(true);
	}

	/**
	 * @param string $field
	 * @param string $value
	 * @param string $contentExpected
	 * @param bool $expectSuccess if true then the caller expects that the field
	 *                            has the expected content
	 *                            emit debugging information if the field is not as expected
	 *
	 * @return bool
	 */
	public function doesFieldValueMatchExpectedContent(
		$field, $value, $contentExpected, $expectSuccess = true
	) {
		if (($contentExpected === "ANY_VALUE")
			|| (($contentExpected === "A_TOKEN") && (\strlen($value) === 15))
			|| (($contentExpected === "A_NUMBER") && \is_numeric($value))
			|| (($contentExpected === "AN_URL") && $this->isAPublicLinkUrl($value))
			|| (($field === 'remote') && (\rtrim($value, "/") === $contentExpected))
			|| ($contentExpected === $value)
		) {
			if (!$expectSuccess) {
				echo $field . " is unexpectedly set with value '" . $value . "'\n";
			}
			return true;
		}
		return false;
	}

	/**
	 * @param string $field
	 * @param mixed $contentExpected
	 * @param bool $expectSuccess if true then the caller expects that the field
	 *                            is in the response with the expected content
	 *                            so emit debugging information if the field is not correct
	 * @param SimpleXMLElement $data
	 *
	 * @return bool
	 */
	public function isFieldInResponse($field, $contentExpected, $expectSuccess = true, $data = null) {
		if ($data === null) {
			$data = $this->getResponseXml()->data[0];
		}
		//do not try to convert empty date
		if ((string) $field === 'expiration' && !empty($contentExpected)) {
			$timestamp = \strtotime($contentExpected, $this->getServerShareTimeFromLastResponse());
			// strtotime returns false if it failed to parse, just leave it as it is in that condition
			if ($timestamp !== false) {
				$contentExpected
					= \date(
						'Y-m-d',
						$timestamp
					) . " 00:00:00";
			}
		}

		$contentExpected = (string) $contentExpected;

		if (\count($data->element) > 0) {
			$fieldIsSet = false;
			$value = "";
			foreach ($data as $element) {
				if (isset($element->$field)) {
					$fieldIsSet = true;
					$value = (string) $element->$field;
					if ($this->doesFieldValueMatchExpectedContent(
						$field, $value, $contentExpected, $expectSuccess
					)
					) {
						return true;
					}
				}
			}
		} else {
			$fieldIsSet = isset($data->$field);
			if ($fieldIsSet) {
				$value = (string) $data->$field;
				if ($this->doesFieldValueMatchExpectedContent(
					$field, $value, $contentExpected, $expectSuccess
				)
				) {
					return true;
				}
			}
		}
		if ($expectSuccess) {
			if ($fieldIsSet) {
				echo $field . " has unexpected value '" . $value . "'\n";
			} else {
				echo $field . " is not set in response\n";
			}
		}
		return false;
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" should be included in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileInResponse($filename) {
		$filename = "/" . \ltrim($filename, '/');
		Assert::assertTrue(
			$this->isFieldInResponse('file_target', "$filename"),
			"'file_target' value '$filename' was not found in response"
		);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" should not be included in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileNotInResponse($filename) {
		$filename = "/" . \ltrim($filename, '/');
		Assert::assertFalse(
			$this->isFieldInResponse('file_target', "$filename", false),
			"'file_target' value '$filename' was unexpectedly found in response"
		);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" should be included as path in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileAsPathInResponse($filename) {
		$filename = "/" . \ltrim($filename, '/');
		Assert::assertTrue(
			$this->isFieldInResponse('path', "$filename"),
			"'path' value '$filename' was not found in response"
		);
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" should not be included as path in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function checkSharedFileAsPathNotInResponse($filename) {
		$filename = "/" . \ltrim($filename, '/');
		Assert::assertFalse(
			$this->isFieldInResponse('path', "$filename", false),
			"'path' value '$filename' was unexpectedly found in response"
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
		Assert::assertTrue(
			$this->isFieldInResponse('share_with', "$user"),
			"'share_with' value '$user' was not found in response"
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
		Assert::assertFalse(
			$this->isFieldInResponse('share_with', "$user", false),
			"'share_with' value '$user' was unexpectedly found in response"
		);
	}

	/**
	 * @param string $userOrGroup
	 * @param int|int[]|string|string[] $permissions
	 *
	 * @return bool
	 */
	public function isUserOrGroupInSharedData($userOrGroup, $permissions = null) {
		if ($permissions !== null) {
			if (\is_string($permissions) && !\is_numeric($permissions)) {
				$permissions = $this->splitPermissionsString($permissions);
			}
			$permissionSum = SharingHelper::getPermissionSum($permissions);
		}

		$data = $this->getResponseXml()->data[0];
		if (\is_iterable($data)) {
			foreach ($data as $element) {
				if ($element->share_with->__toString() === $userOrGroup
					&& ($permissions === null
					|| $permissionSum === (int) $element->permissions->__toString())
				) {
					return true;
				}
			}
			return false;
		}
		\error_log(
			"INFORMATION: isUserOrGroupInSharedData response XML data is " .
			\gettype($data) .
			" and therefore does not contain share_with information."
		);
		return false;
	}

	/**
	 *
	 * @param string $user1
	 * @param string $filepath
	 * @param string $user2
	 * @param string|int|string[]|int[] $permissions
	 * @param bool $getShareData If true then only create the share if it is not
	 *                           already existing, and at the end request the
	 *                           share information and leave that in $this->response
	 *                           Typically used in a "Given" step which verifies
	 *                           that the share did get created successfully.
	 *
	 * @return void
	 */
	public function shareFileWithUserUsingTheSharingApi(
		$user1, $filepath, $user2, $permissions = null, $getShareData = false
	) {
		$user1 = $this->getActualUsername($user1);
		$user2 = $this->getActualUsername($user2);

		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?path=$filepath";
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user1, $this->getPasswordForUser($user1), $headers
		);
		if ($getShareData && $this->isUserOrGroupInSharedData($user2, $permissions)) {
			return;
		} else {
			$this->createShare(
				$user1, $filepath, 0, $user2, null, null, $permissions
			);
		}
		if ($getShareData) {
			$this->response = HttpRequestHelper::get(
				$fullUrl, $user1, $this->getPasswordForUser($user1), $headers
			);
		}
	}

	/**
	 * @When /^user "([^"]*)" shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @When /^user "([^"]*)" shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $user1
	 * @param string $filepath
	 * @param string $user2
	 * @param int|string|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function userSharesFileWithUserUsingTheSharingApi(
		$user1, $filepath, $user2, $permissions = null
	) {
		$this->shareFileWithUserUsingTheSharingApi(
			$user1, $filepath, $user2, $permissions
		);
	}

	/**
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions (\d+))?$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)" with permissions "([^"]*)"$/
	 *
	 * @param string $user1
	 * @param string $filepath
	 * @param string $user2
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function userHasSharedFileWithUserUsingTheSharingApi(
		$user1, $filepath, $user2, $permissions = null
	) {
		$this->shareFileWithUserUsingTheSharingApi(
			$user1, $filepath, $user2, $permissions, true
		);
		// this is expected to fail if a file is shared with create and delete permissions, which is not possible
		Assert::assertTrue(
			$this->isUserOrGroupInSharedData($user2, $permissions),
			"User $user1 failed to share $filepath with user $user2"
		);
	}

	/**
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with the administrator(?: with permissions (\d+))?$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with the administrator with permissions "([^"]*)"$/
	 *
	 * @param string $sharer
	 * @param string $filepath
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function userHasSharedFileWithTheAdministrator(
		$sharer, $filepath, $permissions = null
	) {
		$admin = $this->getAdminUsername();
		$this->userHasSharedFileWithUserUsingTheSharingApi(
			$sharer, $filepath, $admin, $permissions
		);
	}

	/**
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $filepath
	 * @param string $user2
	 * @param int|string $permissions
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
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions (\d+))?$/
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)" with permissions "([^"]*)"$/
	 *
	 * @param string $filepath
	 * @param string $user2
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function theUserHasSharedFileWithUserUsingTheSharingApi(
		$filepath, $user2, $permissions = null
	) {
		$this->userHasSharedFileWithUserUsingTheSharingApi(
			$this->getCurrentUser(), $filepath, $user2, $permissions
		);
	}

	/**
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $filepath
	 * @param string $group
	 * @param int|string $permissions
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
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions (\d+))?$/
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)" with permissions "([^"]*)"$/
	 *
	 * @param string $filepath
	 * @param string $group
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function theUserHasSharedFileWithGroupUsingTheSharingApi(
		$filepath, $group, $permissions = null
	) {
		$this->userHasSharedFileWithGroupUsingTheSharingApi(
			$this->currentUser, $filepath, $group, $permissions
		);
	}

	/**
	 *
	 * @param string $user
	 * @param string $filepath
	 * @param string $group
	 * @param string|int|string[]|int[] $permissions
	 * @param bool $getShareData If true then only create the share if it is not
	 *                           already existing, and at the end request the
	 *                           share information and leave that in $this->response
	 *                           Typically used in a "Given" step which verifies
	 *                           that the share did get created successfully.
	 *
	 * @return void
	 */
	public function shareFileWithGroupUsingTheSharingApi(
		$user, $filepath, $group, $permissions = null, $getShareData = false
	) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?path=$filepath";
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers
		);
		if ($getShareData && $this->isUserOrGroupInSharedData($group, $permissions)) {
			return;
		} else {
			$this->createShare(
				$user, $filepath, 1, $group, null, null, $permissions
			);
		}
		if ($getShareData) {
			$this->response = HttpRequestHelper::get(
				$fullUrl, $user, $this->getPasswordForUser($user), $headers
			);
		}
	}

	/**
	 * @When /^user "([^"]*)" shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 * @When /^user "([^"]*)" shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 *
	 * @param string $user
	 * @param string $filepath
	 * @param string $group
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function userSharesFileWithGroupUsingTheSharingApi(
		$user, $filepath, $group, $permissions = null
	) {
		$this->shareFileWithGroupUsingTheSharingApi(
			$user, $filepath, $group, $permissions
		);
	}

	/**
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)" with permissions "([^"]*)"$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions (\d+))?$/
	 *
	 * @param string $user
	 * @param string $filepath
	 * @param string $group
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function userHasSharedFileWithGroupUsingTheSharingApi(
		$user, $filepath, $group, $permissions = null
	) {
		$this->shareFileWithGroupUsingTheSharingApi(
			$user, $filepath, $group, $permissions, true
		);

		Assert::assertEquals(
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
		$this->updateLastShareWithSettings($user, $body);
	}

	/**
	 * @Then /^user "([^"]*)" should not be able to share (?:file|folder|entry) "([^"]*)" with (user|group) "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @Then /^user "([^"]*)" should not be able to share (?:file|folder|entry) "([^"]*)" with (user|group) "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $filepath
	 * @param string $userOrGroupShareType
	 * @param string $sharee
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function userTriesToShareFileUsingTheSharingApi($sharer, $filepath, $userOrGroupShareType, $sharee, $permissions = null) {
		$this->createShare(
			$sharer, $filepath, $userOrGroupShareType, $sharee, null, null, $permissions
		);
		$statusCode = $this->ocsContext->getOCSResponseStatusCode($this->response);
		Assert::assertTrue(
			($statusCode == 404) || ($statusCode == 403),
			"Sharing should have failed but passed with status code $statusCode"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be able to share (?:file|folder|entry) "([^"]*)" with (user|group) "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @Then /^user "([^"]*)" should be able to share (?:file|folder|entry) "([^"]*)" with (user|group) "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $filepath
	 * @param string $userOrGroupShareType
	 * @param string $sharee
	 * @param int|string $permissions
	 *
	 * @return void
	 */
	public function userShouldBeAbleToShareUsingTheSharingApi(
		$sharer, $filepath, $userOrGroupShareType, $sharee, $permissions = null
	) {
		$this->createShare(
			$sharer, $filepath, $userOrGroupShareType, $sharee, null, null, $permissions
		);

		//v1.php returns 100 as success code
		//v2.php returns 200 in the same case
		$this->ocsContext->theOCSStatusCodeShouldBe([100, 200]);
	}

	/**
	 * @When /^the user deletes the last share using the sharing API$/
	 *
	 * @return void
	 */
	public function theUserDeletesLastShareUsingTheSharingAPI() {
		$this->deleteLastShareUsingSharingApiByCurrentUser();
	}

	/**
	 * @Given /^the user has deleted the last share$/
	 *
	 * @return void
	 */
	public function theUserHasDeletedLastShareUsingTheSharingAPI() {
		$this->deleteLastShareUsingSharingApiByCurrentUser();
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 */
	public function deleteLastShareUsingSharingApi($user) {
		$share_id = $this->lastShareData->data[0]->id;
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, "DELETE", $url, null
		);
	}

	/**
	 * @return void
	 */
	public function deleteLastShareUsingSharingApiByCurrentUser() {
		$this->deleteLastShareUsingSharingApi($this->currentUser);
	}

	/**
	 * @When /^user "([^"]*)" deletes the last share using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userDeletesLastShareUsingTheSharingApi($user) {
		$this->deleteLastShareUsingSharingApi($user);
	}

	/**
	 * @Given /^user "([^"]*)" has deleted the last share$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userHasDeletedLastShareUsingTheSharingApi($user) {
		$this->deleteLastShareUsingSharingApi($user);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^the user gets the info of the last share using the sharing API$/
	 *
	 * @return void
	 * @throws Exception
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
	 * @throws Exception
	 */
	public function userGetsInfoOfLastShareUsingTheSharingApi($user) {
		$share_id = $this->getLastShareIdOf($user);
		$this->getShareData($user, $share_id);
	}

	/**
	 * Get id of the last share of the user
	 *
	 * If lastShareData was not of $user, it fetches all shares for that user,
	 * and extracts the id for last share from the response
	 *
	 * @param string $user
	 *
	 * @return int|null
	 * @throws Exception
	 */
	public function getLastShareIdOf($user) {
		if (isset($this->lastShareData->data[0]->id)) {
			return (int) $this->lastShareData->data[0]->id;
		}

		$this->getListOfShares($user);
		$id = $this->extractLastSharedIdFromLastResponse();
		if ($id === null) {
			throw new Exception("Could not find id in the last response.");
		}
		return $id;
	}

	/**
	 * Retrieves all the shares of the respective user
	 *
	 * @param string $user
	 *
	 * @return ResponseInterface
	 */
	public function getListOfShares($user) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/"
			. "v{$this->sharingApiVersion}/shares";
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers
		);
		return $this->response;
	}

	/**
	 * Extracts `id` from responseXml
	 *
	 * @return int|null
	 */
	public function extractLastSharedIdFromLastResponse() {
		// extract max id
		$xpath = '/ocs/data/element/id[not (. < ../../element/id)][1]';
		$id = $this->getResponseXml()->xpath($xpath);
		if ((bool) $id) {
			return (int) $id[0];
		}
		return null;
	}

	/**
	 * Get share data of specific share_id
	 *
	 * @param string $user
	 * @param int $share_id
	 *
	 * @return void
	 */
	public function getShareData($user, $share_id) {
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, "GET", $url, null
		);
	}

	/**
	 * @When user :user gets all the shares shared with him using the sharing API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userGetsAllTheSharesSharedWithHimUsingTheSharingApi($user) {
		$url = "/apps/files_sharing/api/v1/shares?shared_with_me=true";
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			'GET',
			$url,
			null
		);
	}

	/**
	 * @When /^user "([^"]*)" gets all the shares shared with him that are received as (?:file|folder|entry) "([^"]*)" using the provisioning API$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsAllSharesSharedWithHimFromFileOrFolderUsingTheProvisioningApi($user, $path) {
		$url = "/apps/files_sharing/api/"
			. "v{$this->sharingApiVersion}/shares?shared_with_me=true&path=$path";
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			'GET',
			$url,
			null
		);
	}

	/**
	 * @When user :user gets all shares shared by him using the sharing API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userGetsAllSharesSharedByHimUsingTheSharingApi($user) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/"
			. "v{$this->sharingApiVersion}/shares";
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers
		);
	}

	/**
	 * @When the administrator gets all shares shared by him using the sharing API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllSharesSharedByHimUsingTheSharingApi() {
		$this->userGetsAllSharesSharedByHimUsingTheSharingApi($this->getAdminUsername());
	}

	/**
	 * @When user :user gets all the shares from the file :path using the sharing API
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsAllTheSharesFromTheFileUsingTheSharingApi($user, $path) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/"
			. "v{$this->sharingApiVersion}/shares?path=$path";
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers
		);
	}

	/**
	 * @When user :user gets all the shares with reshares from the file :path using the sharing API
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsAllTheSharesWithResharesFromTheFileUsingTheSharingApi(
		$user, $path
	) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/"
			. "v{$this->sharingApiVersion}/shares?reshares=true&path=$path";
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers
		);
	}

	/**
	 * @When user :user gets all the shares inside the folder :path using the sharing API
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsAllTheSharesInsideTheFolderUsingTheSharingApi($user, $path) {
		$fullUrl = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/"
			. "v{$this->sharingApiVersion}/shares?path=$path&subfiles=true";
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers
		);
	}

	/**
	 * @Then /^the response when user "([^"]*)" gets the info of the last share should include$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theResponseWhenUserGetsInfoOfLastShareShouldInclude(
		$user, $body
	) {
		$this->verifyTableNodeRows($body, [], $this->shareResponseFields);
		$this->userGetsInfoOfLastShareUsingTheSharingApi($user);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"Error getting info of last share for user $user"
		);
		$this->checkFields($body);
	}

	/**
	 * @Then the information of the last share of user :user should include
	 *
	 * @param string $user
	 * @param TableNode $body
	 *
	 * @return void
	 * @throws \Exception
	 *
	 */
	public function informationOfLastShareShouldInclude(
		$user, $body
	) {
		$this->getListOfShares($user);
		$share_id = $this->extractLastSharedIdFromLastResponse();
		if ($share_id === null) {
			throw new Exception("Could not find id in the last response.");
		}
		$this->getShareData($user, $share_id);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"Error getting info of last share for user $user"
		);
		$this->verifyTableNodeRows($body, [], $this->shareResponseFields);
		$this->checkFields($body);
	}

	/**
	 * @Then /^the last share_id should be included in the response/
	 *
	 * @return void
	 */
	public function checkingLastShareIDIsIncluded() {
		$share_id = $this->lastShareData->data[0]->id;
		if (!$this->isFieldInResponse('id', $share_id)) {
			Assert::fail(
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
		if ($this->isFieldInResponse('id', $share_id, false)) {
			Assert::fail(
				"Share id $share_id has been found in response"
			);
		}
	}

	/**
	 * @Then /^the response should not contain any share ids/
	 *
	 * @return void
	 */
	public function theResponseShouldNotContainAnyShareIds() {
		$data = $this->getResponseXml()->data[0];
		$fieldIsSet = false;
		$receivedShareCount = 0;

		if (\count($data->element) > 0) {
			foreach ($data as $element) {
				if (isset($element->id)) {
					$fieldIsSet = true;
					$receivedShareCount += 1;
				}
			}
		} else {
			if (isset($data->id)) {
				$fieldIsSet = true;
				$receivedShareCount += 1;
			}
		}
		Assert::assertFalse(
			$fieldIsSet,
			"response contains $receivedShareCount share ids but should not contain any share ids"
		);
	}

	/**
	 * @Then user :user should not see share_id of last share
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldNotSeeShareIdOfLastShare($user) {
		$this->userGetsAllTheSharesSharedWithHimUsingTheSharingApi($user);
		$this->checkingLastShareIDIsNotIncluded();
	}

	/**
	 * @Then user :user should not have any received shares
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldNotHaveAnyReceivedShares($user) {
		$this->userGetsAllTheSharesSharedWithHimUsingTheSharingApi($user);
		$this->theResponseShouldNotContainAnyShareIds();
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
		Assert::assertEquals($count, $actualCount);
	}

	/**
	 * @Then the fields of the last response should include
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function checkFields($body) {
		$this->verifyTableNodeColumnsCount($body, 2);
		$fd = $body->getRowsHash();
		foreach ($fd as $field => $value) {
			$value = $this->replaceValuesFromTable($field, $value);
			Assert::assertTrue(
				$this->isFieldInResponse($field, $value),
				"$field doesn't have value '$value'"
			);
		}
	}

	/**
	 * @Then the last response should be empty
	 *
	 * @return void
	 */
	public function theFieldsOfTheLastResponseShouldBeEmpty() {
		$data = $this->getResponseXml()->data[0];
		Assert::assertEquals(
			\count($data->element), 0, "last response contains data"
		);
	}

	/**
	 *
	 * @return string
	 *
	 * @throws Exception
	 */
	public function getSharingAttributesFromLastResponse() {
		$responseXml = $this->getResponseXml()->data[0];
		$actualAttributesElement = $responseXml->xpath('//attributes');

		if ((bool) $actualAttributesElement) {
			$actualAttributes = (array) $actualAttributesElement[0];
			if (empty($actualAttributes)) {
				throw new Exception(
					"No data inside 'attributes' element in the last response."
				);
			}
			return $actualAttributes[0];
		}

		throw new Exception("No 'attributes' found inside the response of the last share.");
	}

	/**
	 * @Then the additional sharing attributes for the response should include
	 *
	 * @param TableNode $attributes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkingAttributesInLastShareResponse(TableNode $attributes) {
		$attributes = $attributes->getHash();

		// change string "true"/"false" to boolean inside array
		\array_walk_recursive(
			$attributes,
			function (&$value, $key) {
				if ($key !== 'enabled') {
					return;
				}
				if ($value === 'true') {
					$value = true;
				}
				if ($value === 'false') {
					$value = false;
				}
			}
		);

		$actualAttributes = $this->getSharingAttributesFromLastResponse();

		// parse json to array
		$actualAttributesArray = \json_decode($actualAttributes, true);
		if (\json_last_error() !== JSON_ERROR_NONE) {
			$errMsg = \strtolower(\json_last_error_msg());
			throw new Exception(
				"JSON decoding failed because of $errMsg in json\n" .
				'Expected data to be json with array of objects. ' .
				"\nReceived:\n $actualAttributes"
			);
		}

		// check if attributes received from table is subset of actualAttributes
		Assert::assertArraySubset(
			$attributes,
			$actualAttributesArray
		);
	}

	/**
	 * @Then the downloading of file :fileName for user :user should fail with error message
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param PyStringNode $errorMessage
	 *
	 * @return void
	 */
	public function userDownloadsFailWithMessage($fileName, $user, $errorMessage) {
		$this->downloadFileAsUserUsingPassword($user, $fileName);
		$receivedErrorMessage = $this->getResponseXml()->xpath('//s:message');
		if ((bool) $errorMessage) {
			Assert::assertEquals(
				$errorMessage, (string) $receivedErrorMessage[0]
			);
			return;
		}
		throw new Exception("No 's:message' element found on the response.");
	}

	/**
	 * @Then the fields of the last response should not include
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function checkFieldsNotInResponse($body) {
		$this->verifyTableNodeColumnsCount($body, 2);
		$fd = $body->getRowsHash();

		foreach ($fd as $field => $value) {
			$value = $this->replaceValuesFromTable($field, $value);
			Assert::assertFalse(
				$this->isFieldInResponse($field, $value, false),
				"$field has value $value but should not"
			);
		}
	}

	/**
	 * @param string $user
	 * @param string $fileName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function removeAllSharesFromResource($user, $fileName) {
		$url = $this->getBaseUrl()
			. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares?format=json";

		$headers = ['Content-Type' => 'application/json', 'OCS-APIREQUEST' => 'true'];
		$res = HttpRequestHelper::get(
			$url, $user, $this->getPasswordForUser($user), $headers
		);

		$this->setResponse($res);
		$this->theHTTPStatusCodeShouldBeSuccess();

		$json = \json_decode($res->getBody()->getContents(), true);
		$deleted = false;
		foreach ($json['ocs']['data'] as $data) {
			if (\stripslashes($data['path']) === $fileName) {
				$id = $data['id'];
				$url = $this->getBaseUrl()
					. "/ocs/v{$this->ocsApiVersion}.php/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/{$id}";
				$response = HttpRequestHelper::delete(
					$url, $user, $this->getPasswordForUser($user), $headers
				);

				$this->setResponse($response);
				$this->theHTTPStatusCodeShouldBeSuccess();

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
	 * @When user :user removes all shares from the file named :fileName using the sharing API
	 *
	 * @param string $user
	 * @param string $fileName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userRemovesAllSharesFromTheFileNamedzz($user, $fileName) {
		$this->removeAllSharesFromResource($user, $fileName);
	}

	/**
	 * @Given user :user has removed all shares from the file named :fileName
	 *
	 * @param string $user
	 * @param string $fileName
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasRemovedAllSharesFromTheFileNamedzz($user, $fileName) {
		$this->removeAllSharesFromResource($user, $fileName);
		$dataResponded = $this->getShares($user, $fileName);
		Assert::assertEquals(\count($dataResponded), 0);
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
		$headers = ['OCS-APIREQUEST' => 'true'];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $user, $this->getPasswordForUser($user), $headers
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

		$this->verifyTableNodeColumns($TableNode, ['path', 'permissions', 'name']);
		if ($TableNode instanceof TableNode) {
			$elementRows = $TableNode->getHash();

			foreach ($elementRows as $expectedElementsArray) {
				$nameFound = false;
				foreach ($dataResponded as $elementResponded) {
					if ((string) $elementResponded->name[0] === $expectedElementsArray['name']) {
						Assert::assertEquals(
							$expectedElementsArray['path'],
							(string) $elementResponded->path[0]
						);
						Assert::assertEquals(
							$expectedElementsArray['permissions'],
							(string) $elementResponded->permissions[0]
						);
						$nameFound = true;
						break;
					}
				}
				Assert::assertTrue(
					$nameFound,
					"Shared link name {$expectedElementsArray['name']} not found"
				);
			}
		}
	}

	/**
	 * @Then /^as user "([^"]*)" the (?:file|folder) "([^"]*)" should not have any shares$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function checkPublicSharesAreEmpty($user, $path) {
		$dataResponded = $this->getShares($user, $path);
		//It shouldn't have public shares
		Assert::assertEquals(\count($dataResponded), 0);
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
			if ((string) $elementResponded->name[0] === $name) {
				return (int) $elementResponded->id[0];
			}
		}
		return null;
	}

	/**
	 * @param string $user
	 * @param string $name
	 * @param string $path
	 *
	 * @return void
	 */
	public function deletePublicLinkShareUsingTheSharingApi(
		$user, $name, $path
	) {
		$share_id = $this->getPublicShareIDByName($user, $path, $name);
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares/$share_id";
		$this->ocsContext->theUserSendsToOcsApiEndpointWithBody(
			"DELETE", $url, null
		);
	}

	/**
	 * @When /^user "([^"]*)" deletes public link share named "([^"]*)" in (?:file|folder) "([^"]*)" using the sharing API$/
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
		$this->deletePublicLinkShareUsingTheSharingApi(
			$user,
			$name,
			$path
		);
	}

	/**
	 * @Given /^user "([^"]*)" has deleted public link share named "([^"]*)" in (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $name
	 * @param string $path
	 *
	 * @return void
	 */
	public function userHasDeletedPublicLinkShareNamedUsingTheSharingApi(
		$user, $name, $path
	) {
		$this->deletePublicLinkShareUsingTheSharingApi(
			$user,
			$name,
			$path
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^user "([^"]*)" (declines|accepts) the share "([^"]*)" offered by user "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userReactsToShareOfferedBy($user, $action, $share, $offeredBy) {
		$dataResponded = $this->getAllSharesSharedWithUser($user);
		$shareId = null;
		foreach ($dataResponded as $shareElement) {
			if ((string) $shareElement['uid_owner'] === $offeredBy
				&& (string) $shareElement['path'] === $share
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

		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, $httpRequestMethod, $url, null
		);
	}

	/**
	 * @Given /^user "([^"]*)" has (declined|accepted) the share "([^"]*)" offered by user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userHasReactedToShareOfferedBy($user, $action, $share, $offeredBy) {
		$this->userReactsToShareOfferedBy($user, $action, $share, $offeredBy);
		$this->theHTTPStatusCodeShouldBe(
			200,
			__METHOD__ . " could not $action share to $user by $offeredBy"
		);
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
	 * @throws Exception
	 */
	public function assertSharesOfUserAreInState($user, $state, TableNode $table) {
		$this->verifyTableNodeColumns($table, ["path"], $this->shareResponseFields);
		$usersShares = $this->getAllSharesSharedWithUser($user, $state);
		foreach ($table as $row) {
			$found = false;
			//the API returns the path without trailing slash, but we want to
			//be able to accept leading and/or trailing slashes in the step definition
			$row['path'] = "/" . \trim($row['path'], "/");
			foreach ($usersShares as $share) {
				try {
					Assert::assertArraySubset($row, $share);
					$found = true;
					break;
				} catch (PHPUnit\Framework\ExpectationFailedException $e) {
				}
			}
			if (!$found) {
				Assert::fail(
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
	 * @throws Exception
	 */
	public function assertThatNoSharesAreSharedWithUser($user) {
		$usersShares = $this->getAllSharesSharedWithUser($user);
		Assert::assertEmpty(
			$usersShares, "user has " . \count($usersShares) . " share(s)"
		);
	}

	/**
	 * @When the administrator adds group :group to the exclude group from sharing list using the occ command
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function administratorAddsGroupToExcludeFromSharingList($group) {
		//get current groups
		$occExitCode = $this->runOcc(
			['config:app:get files_sharing blacklisted_receiver_groups']
		);
		$occStdOut = $this->getStdOutOfOccCommand();
		$occStdErr = $this->getStdErrOfOccCommand();

		if (($occExitCode !== 0) && ($occExitCode !== 1)) {
			throw new \Exception(
				"occ config:app:get files_sharing blacklisted_receiver_groups failed with exit code " .
				$occExitCode . ", output " .
				$occStdOut . ", error output " .
				$occStdErr
			);
		}

		//if the setting was never set before stdOut will be empty and return code will be 1
		if (\trim($occStdOut) === "") {
			$occStdOut = "[]";
		}

		$currentGroups = \json_decode($occStdOut, true);
		Assert::assertNotNull(
			$currentGroups,
			"could not json decode app setting 'blacklisted_receiver_groups' of 'files_sharing'\n" .
			"stdOut: '" . $occStdOut . "'\n" .
			"stdErr: '" . $occStdErr . "'"
		);

		$currentGroups[] = $group;
		$setSettingExitCode = $this->runOcc(
			[
				'config:app:set',
				'files_sharing blacklisted_receiver_groups',
				'--value=' . \json_encode($currentGroups)
			]
		);
		if ($setSettingExitCode !== 0) {
			throw new \Exception(
				"could not set files_sharing blacklisted_receiver_groups " .
				$setSettingExitCode . " " .
				$this->getStdOutOfOccCommand() . " " .
				$this->getStdErrOfOccCommand()
			);
		}
	}

	/**
	 *
	 * @param string $user
	 * @param string $state pending|accepted|declined|rejected|all
	 *
	 * @return array of shares that are shared with this user
	 * @throws Exception
	 *
	 * @throws InvalidArgumentException
	 */
	private function getAllSharesSharedWithUser($user, $state = "all") {
		switch ($state) {
			case 'pending':
			case 'accepted':
			case 'declined':
			case 'rejected':
				$stateCode = SharingHelper::SHARE_STATES[$state];
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
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
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
	 * Send request for preview of a file in a public link
	 *
	 * @param string $fileName
	 * @param string $token
	 *
	 * @return void
	 */
	public function getPublicPreviewOfFile($fileName, $token) {
		$url = $this->getBaseUrl() .
			"/index.php/apps/files_sharing/ajax/publicpreview.php" .
			"?file=$fileName&t=$token";
		$resp = HttpRequestHelper::get($url);
		$this->setResponse($resp);
	}

	/**
	 * @When the public accesses the preview of file :path from the last shared public link using the sharing API
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function thePublicAccessesThePreviewOfTheSharedFileUsingTheSharingApi($path) {
		$shareData = $this->getLastShareData();
		$token = (string) $shareData->data->token;
		$this->getPublicPreviewOfFile($path, $token);
	}

	/**
	 * replace values from table
	 *
	 * @param string $field
	 * @param string $value
	 *
	 * @return string
	 */
	public function replaceValuesFromTable($field, $value) {
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
				$this->getLocalBaseUrl(),
				$value
			);
		}
		if ($field === "permissions") {
			if (\is_string($value) && !\is_numeric($value)) {
				$value = $this->splitPermissionsString($value);
			}
			$value = SharingHelper::getPermissionSum($value);
		}
		if ($field === "share_type") {
			$value = SharingHelper::getShareType($value);
		}
		return $value;
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
				'capabilitiesParameter' => 'exclude_groups_from_sharing_list',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_exclude_groups_list',
				'testingState' => null
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
				'capabilitiesParameter' => 'user@@@expire_date@@@enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_default_expire_date_user_share',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'user@@@expire_date@@@enforced',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_enforce_expire_date_user_share',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'group@@@expire_date@@@enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_default_expire_date_group_share',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'group@@@expire_date@@@enforced',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_enforce_expire_date_group_share',
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
