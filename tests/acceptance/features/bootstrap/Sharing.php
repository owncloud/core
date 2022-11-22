<?php declare(strict_types=1);
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

use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\Assert;
use TestHelpers\OcsApiHelper;
use TestHelpers\OcisHelper;
use TestHelpers\SharingHelper;
use TestHelpers\HttpRequestHelper;
use TestHelpers\SetupHelper;
use TestHelpers\TranslationHelper;

/**
 * Sharing trait
 */
trait Sharing {
	/**
	 * @var int
	 */
	private $sharingApiVersion = 1;

	/**
	 * Contains the API response to the last share that was created by each user
	 * using the Sharing API. Shares created on the webUI do not have an entry.
	 *
	 * @var SimpleXMLElement[]
	 */
	private $lastShareDataByUser = [];

	/**
	 * Contains the share id of the last share that was created by each user,
	 * either using the Sharing API or on the web UI.
	 *
	 * @var string[]
	 */
	private $lastShareIdByUser = [];

	/**
	 * @var string
	 */
	private $userWhoCreatedLastShare = null;

	/**
	 * @var string
	 */
	private $userWhoCreatedLastPublicShare = null;

	/**
	 * Contains the API response to the last public link share that was created
	 * by the test-runner using the Sharing API.
	 * Shares created on the webUI do not have an entry.
	 *
	 * @var SimpleXMLElement
	 */
	private $lastPublicShareData = null;

	/**
	 * Contains the share id of the last public link share that was created by
	 * the test-runner, either using the Sharing API or on the web UI.
	 *
	 * @var string
	 */
	private $lastPublicShareId = null;

	/**
	 * @var int
	 */
	private $savedShareId = null;

	/**
	 * @var int
	 */
	private $localLastShareTime = null;

	/**
	 * Defines the fields that can be provided in a share request.
	 *
	 * @var array
	 */
	private $shareFields = [
		'path', 'name', 'publicUpload', 'password', 'expireDate',
		'expireDateAsString', 'permissions', 'shareWith', 'shareType'
	];

	/**
	 * Defines the fields that are known and can be tested in a share response.
	 * Note that ownCloud10 also provides file_parent in responses.
	 * file_parent is not provided by OCIS/reva.
	 * There are no known clients that use file_parent.
	 * The acceptance tests do not test for file_parent.
	 *
	 * @var array fields that are possible in a share response
	 */
	private $shareResponseFields = [
		'id', 'share_type', 'uid_owner', 'displayname_owner', 'stime', 'parent',
		'expiration', 'token', 'uid_file_owner', 'displayname_file_owner', 'path',
		'item_type', 'mimetype', 'storage_id', 'storage', 'item_source',
		'file_source', 'file_target', 'name', 'url', 'mail_send',
		'attributes', 'permissions', 'share_with', 'share_with_displayname', 'share_with_additional_info'
	];

	/*
	 * Contains information about the public links that have been created with the webUI.
	 * Each entry in the array has a "name", "url" and "path".
	 */
	private $createdPublicLinks = [];

	/**
	 * @return array
	 */
	public function getCreatedPublicLinks():array {
		return $this->createdPublicLinks;
	}

	/**
	 * The end (last) entry will itself be an array with keys "name", "url" and "path"
	 *
	 * @return array
	 */
	public function getLastCreatedPublicLink():array {
		return \end($this->createdPublicLinks);
	}

	/**
	 * @return string
	 */
	public function getLastCreatedPublicLinkUrl():string {
		$lastCreatedLink = $this->getLastCreatedPublicLink();
		return $lastCreatedLink["url"];
	}

	/**
	 * @return string
	 */
	public function getLastCreatedPublicLinkPath():string {
		$lastCreatedLink = $this->getLastCreatedPublicLink();
		return $lastCreatedLink["path"];
	}

	/**
	 * @return string
	 */
	public function getLastCreatedPublicLinkToken():string {
		$lastCreatedLinkUrl = $this->getLastCreatedPublicLinkUrl();
		// The token is the last part of the URL, delimited by "/"
		$urlParts = \explode("/", $lastCreatedLinkUrl);
		return \end($urlParts);
	}

	/**
	 * @return SimpleXMLElement|null
	 */
	public function getLastPublicShareData():?SimpleXMLElement {
		return $this->lastPublicShareData;
	}

	/**
	 * @param SimpleXMLElement $responseXml
	 *
	 * @return void
	 */
	public function setLastPublicShareData(SimpleXMLElement $responseXml): void {
		$this->lastPublicShareData = $responseXml;
	}

	/**
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public function getLastShareData():SimpleXMLElement {
		return $this->getLastShareDataForUser($this->userWhoCreatedLastShare);
	}

	/**
	 * @param string|null $user
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public function getLastShareDataForUser(?string $user):SimpleXMLElement {
		if ($user === null) {
			throw new Exception(
				__METHOD__ . " user not specified. Probably no user or group shares have been created yet in the test scenario."
			);
		}
		if (isset($this->lastShareDataByUser[$user])) {
			return $this->lastShareDataByUser[$user];
		} else {
			throw new Exception(__METHOD__ . " last share data for user '$user' was not found");
		}
	}

	/**
	 * @return int|null
	 */
	public function getSavedShareId():?int {
		return $this->savedShareId;
	}

	/**
	 * @return void
	 */
	public function resetLastPublicShareData():void {
		$this->lastPublicShareData = null;
		$this->lastPublicShareId = null;
		$this->userWhoCreatedLastPublicShare = null;
	}

	/**
	 * @param string $user
	 *
	 * @return void
	 */
	public function resetLastShareInfoForUser(string $user):void {
		if (isset($this->lastShareDataByUser[$user])) {
			unset($this->lastShareDataByUser[$user]);
		}
		if (isset($this->lastShareIdByUser[$user])) {
			unset($this->lastShareIdByUser[$user]);
		}
	}

	/**
	 * @return int
	 */
	public function getLocalLastShareTime():int {
		return $this->localLastShareTime;
	}

	/**
	 * @return int
	 */
	public function getServerLastShareTime():int {
		return (int) $this->getLastShareData()->data->stime;
	}

	/**
	 * @param string|null $postfix string to append to the end of the path
	 *
	 * @return string
	 */
	public function getSharesEndpointPath(?string $postfix = ''):string {
		return "/apps/files_sharing/api/v{$this->sharingApiVersion}/shares$postfix";
	}

	/**
	 * Split given permissions string each separated with "," into array of strings
	 *
	 * @param string $str
	 *
	 * @return string[]
	 */
	private function splitPermissionsString(string $str):array {
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
				$permissions,
				['create', 'delete', 'read', 'update']
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
	public function getServerShareTimeFromLastResponse():int {
		$stime = $this->getResponseXml(null, __METHOD__)->xpath("//stime");
		if ((bool) $stime) {
			return (int) $stime[0];
		}
		throw new Exception("Last share time (i.e. 'stime') could not be found in the response.");
	}

	/**
	 * @return void
	 */
	private function waitToCreateShare():void {
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
	 * @throws Exception
	 */
	public function createShareWithSettings(string $user, ?TableNode $body):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeRows(
			$body,
			['path'],
			$this->shareFields
		);
		$bodyRows = $body->getRowsHash();
		$bodyRows['name'] = \array_key_exists('name', $bodyRows) ? $bodyRows['name'] : null;
		$bodyRows['shareWith'] = \array_key_exists('shareWith', $bodyRows) ? $bodyRows['shareWith'] : null;
		$bodyRows['shareWith'] = $this->getActualUsername($bodyRows['shareWith']);
		$bodyRows['publicUpload'] = \array_key_exists('publicUpload', $bodyRows) ? $bodyRows['publicUpload'] === 'true' : null;
		$bodyRows['password'] = \array_key_exists('password', $bodyRows) ? $this->getActualPassword($bodyRows['password']) : null;

		if (\array_key_exists('permissions', $bodyRows)) {
			if (\is_numeric($bodyRows['permissions'])) {
				$bodyRows['permissions'] = (int) $bodyRows['permissions'];
			} else {
				$bodyRows['permissions'] = $this->splitPermissionsString($bodyRows['permissions']);
			}
		} else {
			$bodyRows['permissions'] = null;
		}
		if (\array_key_exists('shareType', $bodyRows)) {
			if (\is_numeric($bodyRows['shareType'])) {
				$bodyRows['shareType'] = (int) $bodyRows['shareType'];
			}
		} else {
			$bodyRows['shareType'] = null;
		}

		Assert::assertFalse(
			isset($bodyRows['expireDate'], $bodyRows['expireDateAsString']),
			'expireDate and expireDateAsString cannot be set at the same time.'
		);
		$needToParse = \array_key_exists('expireDate', $bodyRows);
		$expireDate = $bodyRows['expireDate'] ?? $bodyRows['expireDateAsString'] ?? null;
		$bodyRows['expireDate'] = $needToParse ? \date('Y-m-d', \strtotime($expireDate)) : $expireDate;
		$this->createShare(
			$user,
			$bodyRows['path'],
			$bodyRows['shareType'],
			$bodyRows['shareWith'],
			$bodyRows['publicUpload'],
			$bodyRows['password'],
			$bodyRows['permissions'],
			$bodyRows['name'],
			$bodyRows['expireDate']
		);
	}

	/**
	 * @Given auto-accept shares has been disabled
	 *
	 * @return void
	 */
	public function autoAcceptSharesHasBeenDisabled():void {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// auto-accept shares is disabled by default on OCIS.
			// so there is nothing to do, just return
			return;
		}

		$this->appConfigurationContext->serverParameterHasBeenSetTo(
			"shareapi_auto_accept_share",
			"core",
			"no"
		);
	}

	/**
	 * @When /^user "([^"]*)" creates a share using the sharing API with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body {@link createShareWithSettings}
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCreatesAShareWithSettings(string $user, ?TableNode $body):void {
		$user = $this->getActualUsername($user);
		$this->createShareWithSettings(
			$user,
			$body
		);
		$this->pushToLastStatusCodesArrays();
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
	public function userHasCreatedAShareWithSettings(string $user, ?TableNode $body) {
		$this->createShareWithSettings(
			$user,
			$body
		);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"Failed HTTP status code for last share for user $user" . ", Reason: " . $this->getResponse()->getReasonPhrase()
		);
	}

	/**
	 * @When /^the user creates a share using the sharing API with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesAShareWithSettings(?TableNode $body):void {
		$this->createShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @When /^user "([^"]*)" creates a public link share using the sharing API with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCreatesAPublicLinkShareWithSettings(string $user, ?TableNode $body):void {
		$rows = $body->getRows();
		// A public link share is shareType 3
		$rows[] = ['shareType', 'public_link'];
		$newBody = new TableNode($rows);
		$this->createShareWithSettings($user, $newBody);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @Given /^user "([^"]*)" has created a public link share with settings$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasCreatedAPublicLinkShareWithSettings(string $user, ?TableNode $body):void {
		$this->userCreatesAPublicLinkShareWithSettings($user, $body);
		$this->ocsContext->theOCSStatusCodeShouldBe("100,200");
		$this->theHTTPStatusCodeShouldBe(200);
		$this->clearStatusCodeArrays();
	}

	/**
	 * @When /^the user creates a public link share using the sharing API with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserCreatesAPublicLinkShareWithSettings(?TableNode $body):void {
		$this->userCreatesAPublicLinkShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @Given /^the user has created a share with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasCreatedAShareWithSettings(?TableNode $body):void {
		$this->createShareWithSettings($this->currentUser, $body);
		$this->ocsContext->theOCSStatusCodeShouldBe("100,200");
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @Given /^the user has created a public link share with settings$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasCreatedAPublicLinkShareWithSettings(?TableNode $body):void {
		$this->theUserCreatesAPublicLinkShareWithSettings($body);
		$this->ocsContext->theOCSStatusCodeShouldBe("100,200");
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param boolean $publicUpload
	 * @param string|null $sharePassword
	 * @param string|int|string[]|int[]|null $permissions
	 * @param string|null $linkName
	 * @param string|null $expireDate
	 *
	 * @return void
	 */
	public function createAPublicShare(
		string $user,
		string $path,
		bool $publicUpload = false,
		string $sharePassword = null,
		$permissions = null,
		?string $linkName = null,
		?string $expireDate = null
	):void {
		$user = $this->getActualUsername($user);
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
	public function userCreatesAPublicLinkShareOf(string $user, string $path):void {
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
	public function userHasCreatedAPublicLinkShareOf(string $user, string $path):void {
		$this->createAPublicShare($user, $path);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $path
	 *
	 * @return void
	 */
	public function createPublicLinkShareOfResourceAsCurrentUser(string $path):void {
		$this->createAPublicShare($this->currentUser, $path);
	}

	/**
	 * @When /^the user creates a public link share of (?:file|folder) "([^"]*)" using the sharing API$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfIsCreated(string $path):void {
		$this->createPublicLinkShareOfResourceAsCurrentUser($path);
	}

	/**
	 * @Given /^the user has created a public link share of (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function aPublicLinkShareOfHasCreated(string $path):void {
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
		string $user,
		string $path,
		$permissions
	):void {
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
		string $user,
		string $path,
		$permissions
	):void {
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
		string $user,
		string $path,
		$permissions
	):void {
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
	public function createPublicLinkShareWithPermissionByCurrentUser(string $path, $permissions):void {
		$this->createAPublicShare(
			$this->currentUser,
			$path,
			true,
			null,
			$permissions
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
	public function aPublicLinkShareOfIsCreatedWithPermission(string $path, $permissions):void {
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
	public function aPublicLinkShareOfHasCreatedWithPermission(string $path, $permissions):void {
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
		string $user,
		string $path,
		string $expiryDate
	):void {
		$this->createAPublicShare(
			$user,
			$path,
			true,
			null,
			null,
			null,
			$expiryDate
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
		string $user,
		string $path,
		string $expiryDate
	):void {
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
		string $user,
		string $path,
		string $expiryDate
	):void {
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
		string $path,
		string $expiryDate
	):void {
		$this->createAPublicShare(
			$this->currentUser,
			$path,
			true,
			null,
			null,
			null,
			$expiryDate
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
		string $path,
		string $expiryDate
	):void {
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
		string $path,
		string $expiryDate
	):void {
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
	public function getMimeTypeOfLastSharedFile():string {
		return \json_decode(\json_encode($this->getLastShareData()->data->mimetype), true)[0];
	}

	/**
	 * @param string $url
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $mimeType
	 *
	 * @return void
	 */
	private function checkDownload(
		string $url,
		?string $user = null,
		?string $password = null,
		?string $mimeType = null
	) {
		$password = $this->getActualPassword($password);
		$headers = ['X-Requested-With' => 'XMLHttpRequest'];
		$this->response = HttpRequestHelper::get(
			$url,
			$this->getStepLineRef(),
			$user,
			$password,
			$headers
		);
		Assert::assertEquals(
			200,
			$this->response->getStatusCode(),
			__METHOD__
			. " Expected status code is '200' but got '"
			. $this->response->getStatusCode()
			. "'"
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
				$finfo->buffer($buf, FILEINFO_MIME_TYPE),
				__METHOD__
				. " Expected mimeType '$mimeType' but got '"
				. $finfo->buffer($buf, FILEINFO_MIME_TYPE)
			);
		}
	}

	/**
	 * @Then /^user "([^"]*)" should not be able to create a public link share of (file|folder) "([^"]*)" using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $entry
	 * @param string $filepath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldNotBeAbleToCreatePublicLinkShare(string $sharer, string $entry, string $filepath):void {
		$this->asFileOrFolderShouldExist(
			$this->getActualUsername($sharer),
			$entry,
			$filepath
		);
		$this->createAPublicShare($sharer, $filepath);
		Assert::assertEquals(
			404,
			$this->ocsContext->getOCSResponseStatusCode($this->response),
			__METHOD__
			. " Expected response status code is '404' but got '"
			. $this->ocsContext->getOCSResponseStatusCode($this->response)
			. "'"
		);
	}

	/**
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function updateLastShareByCurrentUser(?TableNode $body):void {
		$this->updateLastShareWithSettings($this->currentUser, $body);
	}

	/**
	 * @When /^the user updates the last share using the sharing API with$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserUpdatesTheLastShareWith(?TableNode $body):void {
		$this->updateLastShareByCurrentUser($body);
	}

	/**
	 * @Given /^the user has updated the last share with$/
	 *
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasUpdatedTheLastShareWith(?TableNode $body):void {
		$this->updateLastShareByCurrentUser($body);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param TableNode|null $body
	 * @param string|null $shareOwner
	 * @param bool $updateLastPublicLink
	 *
	 * @return void
	 * @throws Exception
	 */
	public function updateLastShareWithSettings(
		string $user,
		?TableNode $body,
		?string $shareOwner = null,
		?bool $updateLastPublicLink = false
	):void {
		$user = $this->getActualUsername($user);

		if ($updateLastPublicLink) {
			$share_id = $this->getLastPublicLinkShareId();
		} else {
			if ($shareOwner === null) {
				$share_id = $this->getLastShareId();
			} else {
				$share_id = $this->getLastShareIdForUser($shareOwner);
			}
		}

		$this->verifyTableNodeRows(
			$body,
			[],
			$this->shareFields
		);
		$bodyRows = $body->getRowsHash();
		if (\array_key_exists('expireDate', $bodyRows)) {
			$dateModification = $bodyRows['expireDate'];
			if (!empty($bodyRows['expireDate'])) {
				$bodyRows['expireDate'] = \date('Y-m-d', \strtotime($dateModification));
			} else {
				$bodyRows['expireDate'] = '';
			}
		}
		if (\array_key_exists('password', $bodyRows)) {
			$bodyRows['password'] = $this->getActualPassword($bodyRows['password']);
		}
		if (\array_key_exists('permissions', $bodyRows)) {
			if (\is_numeric($bodyRows['permissions'])) {
				$bodyRows['permissions'] = (int) $bodyRows['permissions'];
			} else {
				$bodyRows['permissions'] = $this->splitPermissionsString($bodyRows['permissions']);
				$bodyRows['permissions'] = SharingHelper::getPermissionSum($bodyRows['permissions']);
			}
		}
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"PUT",
			$this->getSharesEndpointPath("/$share_id"),
			$this->getStepLineRef(),
			$bodyRows,
			$this->ocsApiVersion
		);
	}

	/**
	 * @When /^user "([^"]*)" updates the last share using the sharing API with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUpdatesTheLastShareWith(string $user, ?TableNode $body):void {
		$this->updateLastShareWithSettings($user, $body);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" updates the last public link share using the sharing API with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUpdatesTheLastPublicLinkShareWith(string $user, ?TableNode $body):void {
		$this->updateLastShareWithSettings($user, $body, null, true);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @Given /^user "([^"]*)" has updated the last share with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUpdatedTheLastShareWith(string $user, ?TableNode $body):void {
		$this->updateLastShareWithSettings($user, $body);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Given /^user "([^"]*)" has updated the last public link share with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUpdatedTheLastPublicLinkShareWith(string $user, ?TableNode $body):void {
		$this->updateLastShareWithSettings($user, $body, null, true);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Given /^user "([^"]*)" has updated the last share of "([^"]*)" with$/
	 *
	 * @param string $user
	 * @param string $shareOwner
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUpdatedTheLastShareOfWith(string $user, string $shareOwner, ?TableNode $body):void {
		$this->updateLastShareWithSettings($user, $body, $shareOwner);
		$this->theHTTPStatusCodeShouldBeSuccess();
		if ($this->ocsApiVersion == 1) {
			$this->ocsContext->theOCSStatusCodeShouldBe("100");
		} elseif ($this->ocsApiVersion === 2) {
			$this->ocsContext->theOCSStatusCodeShouldBe("200");
		} else {
			throw new Exception('Invalid ocs api version used');
		}
	}

	/**
	 * @param string $name
	 * @param string $url
	 * @param string $path
	 *
	 * @return void
	 */
	public function addToListOfCreatedPublicLinks(string $name, string $url, string $path = ""):void {
		$this->createdPublicLinks[] = ["name" => $name, "url" => $url, "path" => $path];
	}

	/**
	 * @param string $user
	 * @param string|null $path
	 * @param string|null $shareType
	 * @param string|null $shareWith
	 * @param bool|null $publicUpload
	 * @param string|null $sharePassword
	 * @param string|int|string[]|int[]|null $permissions
	 * @param string|null $linkName
	 * @param string|null $expireDate
	 * @param string $sharingApp
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function createShare(
		string $user,
		?string $path = null,
		?string $shareType = null,
		?string $shareWith = null,
		?bool $publicUpload = null,
		?string $sharePassword = null,
		$permissions = null,
		?string $linkName = null,
		?string $expireDate = null,
		string $sharingApp = 'files_sharing'
	):void {
		$userActual = $this->getActualUsername($user);
		if (\is_string($permissions) && !\is_numeric($permissions)) {
			$permissions = $this->splitPermissionsString($permissions);
		}
		$this->waitToCreateShare();
		$this->response = SharingHelper::createShare(
			$this->getBaseUrl(),
			$userActual,
			$this->getPasswordForUser($user),
			$path,
			$shareType,
			$this->getStepLineRef(),
			$shareWith,
			$publicUpload,
			$sharePassword,
			$permissions,
			$linkName,
			$expireDate,
			$this->ocsApiVersion,
			$this->sharingApiVersion,
			$sharingApp
		);
		$httpStatusCode = $this->response->getStatusCode();
		// In case of HTTP status code 204 "no content", or a failure code like 4xx
		// in the HTTP or OCS status there is no useful content in response payload body.
		// Clear the test-runner's memory of "last share data" to avoid later steps
		// accidentally using some previous share data.
		if (($httpStatusCode === 204)
			|| !$this->theHTTPStatusCodeWasSuccess()
			|| (($httpStatusCode === 200) && ($this->ocsContext->getOCSResponseStatusCode($this->response) > 299))
		) {
			if ($shareType === 'public_link') {
				$this->resetLastPublicShareData();
			} else {
				$this->resetLastShareInfoForUser($user);
			}
		} else {
			if ($shareType === 'public_link') {
				$this->setLastPublicShareData($this->getResponseXml(null, __METHOD__));
				$this->setLastPublicLinkShareId((string) $this->lastPublicShareData->data[0]->id);
				$this->setUserWhoCreatedLastPublicShare($user);
				if (isset($this->lastPublicShareData->data)) {
					$linkName = (string) $this->lastPublicShareData->data[0]->name;
					$linkUrl = (string) $this->lastPublicShareData->data[0]->url;
					$this->addToListOfCreatedPublicLinks($linkName, $linkUrl, $path);
				}
			} else {
				$shareData = $this->getResponseXml(null, __METHOD__);
				$this->lastShareDataByUser[$user] = $shareData;
				$shareId = (string) $shareData->data[0]->id;
				$this->setLastShareIdOf($user, $shareId);
			}
		}
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
		string $field,
		string $value,
		string $contentExpected,
		bool $expectSuccess = true
	):bool {
		if (($contentExpected === "ANY_VALUE")
			|| (($contentExpected === "A_TOKEN") && (\strlen($value) === 15))
			|| (($contentExpected === "A_NUMBER") && \is_numeric($value))
			|| (($contentExpected === "A_STRING") && \is_string($value) && $value !== "")
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
	 * @param string|null $contentExpected
	 * @param bool $expectSuccess if true then the caller expects that the field
	 *                            is in the response with the expected content
	 *                            so emit debugging information if the field is not correct
	 * @param SimpleXMLElement|null $data
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function isFieldInResponse(string $field, ?string $contentExpected, bool $expectSuccess = true, ?SimpleXMLElement $data = null):bool {
		if ($data === null) {
			$data = $this->getResponseXml(null, __METHOD__)->data[0];
		}
		Assert::assertIsObject($data, __METHOD__ . " data not found in response XML");

		$dateFieldsArrayToConvert = ['expiration', 'original_date', 'new_date'];
		//do not try to convert empty date
		if ((string) \in_array($field, \array_merge($dateFieldsArrayToConvert)) && !empty($contentExpected)) {
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
						$field,
						$value,
						$contentExpected,
						$expectSuccess
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
					$field,
					$value,
					$contentExpected,
					$expectSuccess
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
	 * @Then no files or folders should be included in the response
	 *
	 * @return void
	 */
	public function checkNoFilesFoldersInResponse():void {
		$data = $this->getResponseXml(null, __METHOD__)->data[0];
		Assert::assertIsObject($data, __METHOD__ . " data not found in response XML");
		Assert::assertCount(0, $data);
	}

	/**
	 * @Then exactly :count file/files or folder/folders should be included in the response
	 *
	 * @param string $count
	 *
	 * @return void
	 */
	public function checkCountFilesFoldersInResponse(string $count):void {
		$count = (int) $count;
		$data = $this->getResponseXml(null, __METHOD__)->data[0];
		Assert::assertIsObject($data, __METHOD__ . " data not found in response XML");
		Assert::assertCount($count, $data, __METHOD__ . " the response does not contain $count entries");
	}

	/**
	 * @Then /^(?:file|folder|entry) "([^"]*)" should be included in the response$/
	 *
	 * @param string $filename
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkSharedFileInResponse(string $filename):void {
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
	 * @throws Exception
	 */
	public function checkSharedFileNotInResponse(string $filename):void {
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
	 * @throws Exception
	 */
	public function checkSharedFileAsPathInResponse(string $filename):void {
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
	 * @throws Exception
	 */
	public function checkSharedFileAsPathNotInResponse(string $filename):void {
		$filename = "/" . \ltrim($filename, '/');
		Assert::assertFalse(
			$this->isFieldInResponse('path', "$filename", false),
			"'path' value '$filename' was unexpectedly found in response"
		);
	}

	/**
	 * @Then /^(user|group) "([^"]*)" should be included in the response$/
	 *
	 * @param string $type
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkSharedUserOrGroupInResponse(string $type, string $user):void {
		if ($type === 'user') {
			$user = $this->getActualUsername($user);
		}
		Assert::assertTrue(
			$this->isFieldInResponse('share_with', "$user"),
			"'share_with' value '$user' was not found in response"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should not be included in the response$/
	 * @Then /^group "([^"]*)" should not be included in the response$/
	 *
	 * @param string $userOrGroup
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkSharedUserOrGroupNotInResponse(string $userOrGroup):void {
		Assert::assertFalse(
			$this->isFieldInResponse('share_with', "$userOrGroup", false),
			"'share_with' value '$userOrGroup' was unexpectedly found in response"
		);
	}

	/**
	 * @param string $userOrGroupId
	 * @param string|int $shareType 0 or "user" for user, 1 or "group" for group
	 * @param string|int|string[]|int[]|null $permissions
	 *
	 * @return bool
	 */
	public function isUserOrGroupInSharedData(string $userOrGroupId, $shareType, $permissions = null):bool {
		$shareType = SharingHelper::getShareType($shareType);

		if ($permissions !== null) {
			if (\is_string($permissions) && !\is_numeric($permissions)) {
				$permissions = $this->splitPermissionsString($permissions);
			}
			$permissionSum = SharingHelper::getPermissionSum($permissions);
		}

		$data = $this->getResponseXml(null, __METHOD__)->data[0];
		if (\is_iterable($data)) {
			foreach ($data as $element) {
				if (($element->share_type->__toString() === (string) $shareType)
					&& ($element->share_with->__toString() === $userOrGroupId)
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
	 * @param bool|null $getShareData If true then only create the share if it is not
	 *                                already existing, and at the end request the
	 *                                share information and leave that in $this->response
	 *                                Typically used in a "Given" step which verifies
	 *                                that the share did get created successfully.
	 *
	 * @return void
	 */
	public function shareFileWithUserUsingTheSharingApi(
		string $user1,
		string $filepath,
		string $user2,
		$permissions = null,
		?bool $getShareData = false
	):void {
		$user1Actual = $this->getActualUsername($user1);
		$user2Actual = $this->getActualUsername($user2);

		$path = $this->getSharesEndpointPath("?path=" . \urlencode($filepath));
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user1Actual,
			$this->getPasswordForUser($user1),
			"GET",
			$path,
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
		);
		if ($getShareData && $this->isUserOrGroupInSharedData($user2Actual, "user", $permissions)) {
			return;
		} else {
			$this->createShare(
				$user1,
				$filepath,
				'0',
				$user2Actual,
				null,
				null,
				$permissions
			);
		}
		if ($getShareData) {
			$this->response = OcsApiHelper::sendRequest(
				$this->getBaseUrl(),
				$user1Actual,
				$this->getPasswordForUser($user1),
				"GET",
				$path,
				$this->getStepLineRef(),
				[],
				$this->ocsApiVersion
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
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function userSharesFileWithUserUsingTheSharingApi(
		string $user1,
		string $filepath,
		string $user2,
		$permissions = null
	):void {
		$this->shareFileWithUserUsingTheSharingApi(
			$user1,
			$filepath,
			$user2,
			$permissions
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" shares the following (?:files|folders|entries) with user "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @When /^user "([^"]*)" shares the following (?:files|folders|entries) with user "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $sharee
	 * @param TableNode $table
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSharesTheFollowingFilesWithUserUsingTheSharingApi(
		string $sharer,
		string $sharee,
		TableNode $table,
		$permissions = null
	):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $filepath) {
			$this->userSharesFileWithUserUsingTheSharingApi(
				$sharer,
				$filepath["path"],
				$sharee,
				$permissions
			);
		}
	}

	/**
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions (\d+))?$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)" with permissions "([^"]*)"$/
	 *
	 * @param string $user1
	 * @param string $filepath
	 * @param string $user2
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasSharedFileWithUserUsingTheSharingApi(
		string $user1,
		string $filepath,
		string $user2,
		$permissions = null
	):void {
		$user1 = $this->getActualUsername($user1);
		$user2 = $this->getActualUsername($user2);
		$this->shareFileWithUserUsingTheSharingApi(
			$user1,
			$filepath,
			$user2,
			$permissions,
			true
		);
		$this->ocsContext->assertOCSResponseIndicatesSuccess(
			'The ocs share response does not indicate success.',
		);
		// this is expected to fail if a file is shared with create and delete permissions, which is not possible
		Assert::assertTrue(
			$this->isUserOrGroupInSharedData($user2, "user", $permissions),
			__METHOD__ . " User $user1 failed to share $filepath with user $user2"
		);
	}

	/**
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with the administrator(?: with permissions (\d+))?$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with the administrator with permissions "([^"]*)"$/
	 *
	 * @param string $sharer
	 * @param string $filepath
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function userHasSharedFileWithTheAdministrator(
		string $sharer,
		string $filepath,
		$permissions = null
	):void {
		$admin = $this->getAdminUsername();
		$this->userHasSharedFileWithUserUsingTheSharingApi(
			$sharer,
			$filepath,
			$admin,
			$permissions
		);
	}

	/**
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with user "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $filepath
	 * @param string $user2
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function theUserSharesFileWithUserUsingTheSharingApi(
		string $filepath,
		string $user2,
		$permissions = null
	) {
		$this->userSharesFileWithUserUsingTheSharingApi(
			$this->getCurrentUser(),
			$filepath,
			$user2,
			$permissions
		);
	}

	/**
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)"(?: with permissions (\d+))?$/
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with user "([^"]*)" with permissions "([^"]*)"$/
	 *
	 * @param string $filepath
	 * @param string $user2
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function theUserHasSharedFileWithUserUsingTheSharingApi(
		string $filepath,
		string $user2,
		$permissions = null
	):void {
		$user2 = $this->getActualUsername($user2);
		$this->userHasSharedFileWithUserUsingTheSharingApi(
			$this->getCurrentUser(),
			$filepath,
			$user2,
			$permissions
		);
	}

	/**
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @When /^the user shares (?:file|folder|entry) "([^"]*)" with group "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $filepath
	 * @param string $group
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function theUserSharesFileWithGroupUsingTheSharingApi(
		string $filepath,
		string $group,
		$permissions = null
	):void {
		$this->userSharesFileWithGroupUsingTheSharingApi(
			$this->currentUser,
			$filepath,
			$group,
			$permissions
		);
	}

	/**
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions (\d+))?$/
	 * @Given /^the user has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)" with permissions "([^"]*)"$/
	 *
	 * @param string $filepath
	 * @param string $group
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function theUserHasSharedFileWithGroupUsingTheSharingApi(
		string $filepath,
		string $group,
		$permissions = null
	):void {
		$this->userHasSharedFileWithGroupUsingTheSharingApi(
			$this->currentUser,
			$filepath,
			$group,
			$permissions
		);
		$this->pushToLastStatusCodesArrays();
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
		string $user,
		string $filepath,
		string$group,
		$permissions = null,
		bool $getShareData = false
	):void {
		$userActual = $this->getActualUsername($user);
		$path = $this->getSharesEndpointPath("?path=$filepath");
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$userActual,
			$this->getPasswordForUser($user),
			"GET",
			$path,
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
		);
		if ($getShareData && $this->isUserOrGroupInSharedData($group, "group", $permissions)) {
			return;
		} else {
			$this->createShare(
				$user,
				$filepath,
				'1',
				$group,
				null,
				null,
				$permissions
			);
		}
		if ($getShareData) {
			$this->response = OcsApiHelper::sendRequest(
				$this->getBaseUrl(),
				$userActual,
				$this->getPasswordForUser($user),
				"GET",
				$path,
				$this->getStepLineRef(),
				[],
				$this->ocsApiVersion
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
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function userSharesFileWithGroupUsingTheSharingApi(
		string $user,
		string $filepath,
		string $group,
		$permissions = null
	) {
		$this->shareFileWithGroupUsingTheSharingApi(
			$user,
			$filepath,
			$group,
			$permissions
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" shares the following (?:files|folders|entries) with group "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @When /^user "([^"]*)" shares the following (?:files|folders|entries) with group "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $group
	 * @param TableNode $table
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSharesTheFollowingFilesWithGroupUsingTheSharingApi(
		string $user,
		string $group,
		TableNode $table,
		$permissions = null
	) {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $filepath) {
			$this->userSharesFileWithGroupUsingTheSharingApi(
				$user,
				$filepath["path"],
				$group,
				$permissions
			);
		}
	}

	/**
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)" with permissions "([^"]*)"$/
	 * @Given /^user "([^"]*)" has shared (?:file|folder|entry) "([^"]*)" with group "([^"]*)"(?: with permissions (\d+))?$/
	 *
	 * @param string $user
	 * @param string $filepath
	 * @param string $group
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 */
	public function userHasSharedFileWithGroupUsingTheSharingApi(
		string $user,
		string $filepath,
		string $group,
		$permissions = null
	) {
		$this->shareFileWithGroupUsingTheSharingApi(
			$user,
			$filepath,
			$group,
			$permissions,
			true
		);

		Assert::assertEquals(
			true,
			$this->isUserOrGroupInSharedData($group, "group", $permissions),
			__METHOD__
			. " Could not assert that user '$user' has shared '$filepath' with group '$group' with permissions '$permissions'"
		);
	}

	/**
	 * @When /^user "([^"]*)" tries to update the last share using the sharing API with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToUpdateTheLastShareUsingTheSharingApiWith(string $user, ?TableNode $body):void {
		$this->updateLastShareWithSettings($user, $body);
	}

	/**
	 * @When /^user "([^"]*)" tries to update the last public link share using the sharing API with$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToUpdateTheLastPublicLinkShareUsingTheSharingApiWith(string $user, ?TableNode $body):void {
		$this->updateLastShareWithSettings($user, $body, null, true);
	}

	/**
	 * @Then /^user "([^"]*)" should not be able to share (file|folder|entry) "([^"]*)" with (user|group) "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @Then /^user "([^"]*)" should not be able to share (file|folder|entry) "([^"]*)" with (user|group) "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $entry
	 * @param string $filepath
	 * @param string $userOrGroupShareType
	 * @param string $sharee
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToShareFileUsingTheSharingApi(
		string $sharer,
		string $entry,
		string $filepath,
		string $userOrGroupShareType,
		string $sharee,
		$permissions = null
	):void {
		$sharee = $this->getActualUsername($sharee);
		$this->asFileOrFolderShouldExist(
			$this->getActualUsername($sharer),
			$entry,
			$filepath
		);
		$this->createShare(
			$sharer,
			$filepath,
			$userOrGroupShareType,
			$sharee,
			null,
			null,
			$permissions
		);
		$statusCode = $this->ocsContext->getOCSResponseStatusCode($this->response);
		Assert::assertTrue(
			($statusCode == 404) || ($statusCode == 403),
			"Sharing should have failed with status code 403 or 404 but got status code $statusCode"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be able to share (file|folder|entry) "([^"]*)" with (user|group) "([^"]*)"(?: with permissions (\d+))? using the sharing API$/
	 * @Then /^user "([^"]*)" should be able to share (file|folder|entry) "([^"]*)" with (user|group) "([^"]*)" with permissions "([^"]*)" using the sharing API$/
	 *
	 * @param string $sharer
	 * @param string $entry
	 * @param string $filepath
	 * @param string $userOrGroupShareType
	 * @param string $sharee
	 * @param string|int|string[]|int[] $permissions
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeAbleToShareUsingTheSharingApi(
		string $sharer,
		string $entry,
		string $filepath,
		string $userOrGroupShareType,
		string $sharee,
		$permissions = null
	):void {
		$sharee = $this->getActualUsername($sharee);
		$this->asFileOrFolderShouldExist($sharer, $entry, $filepath);
		$this->createShare(
			$sharer,
			$filepath,
			$userOrGroupShareType,
			$sharee,
			null,
			null,
			$permissions
		);

		//v1.php returns 100 as success code
		//v2.php returns 200 in the same case
		$this->ocsContext->theOCSStatusCodeShouldBe("100, 200");
	}

	/**
	 * @When /^the user deletes the last share using the sharing API$/
	 *
	 * @return void
	 */
	public function theUserDeletesLastShareUsingTheSharingAPI():void {
		$this->deleteLastShareUsingSharingApiByCurrentUser();
	}

	/**
	 * @Given /^the user has deleted the last share$/
	 *
	 * @return void
	 */
	public function theUserHasDeletedLastShareUsingTheSharingAPI():void {
		$this->deleteLastShareUsingSharingApiByCurrentUser();
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user the user who will do the delete request
	 * @param string|null $sharer the specific user whose share will be deleted (if specified)
	 * @param bool $deleteLastPublicLink
	 *
	 * @return void
	 */
	public function deleteLastShareUsingSharingApi(string $user, string $sharer = null, bool $deleteLastPublicLink = false):void {
		$user = $this->getActualUsername($user);
		if ($deleteLastPublicLink) {
			$shareId = $this->getLastPublicLinkShareId();
		} else {
			if ($sharer === null) {
				$shareId = $this->getLastShareId();
			} else {
				$shareId = $this->getLastShareIdForUser($sharer);
			}
		}
		$url = $this->getSharesEndpointPath("/$shareId");
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"DELETE",
			$url,
			null
		);
	}

	/**
	 * @return void
	 */
	public function deleteLastShareUsingSharingApiByCurrentUser():void {
		$this->deleteLastShareUsingSharingApi($this->currentUser);
	}

	/**
	 * @When /^user "([^"]*)" deletes the last share using the sharing API$/
	 * @When /^user "([^"]*)" tries to delete the last share using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userDeletesLastShareUsingTheSharingApi(string $user):void {
		$this->deleteLastShareUsingSharingApi($user);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" deletes the last public link share using the sharing API$/
	 * @When /^user "([^"]*)" tries to delete the last public link share using the sharing API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userDeletesLastPublicLinkShareUsingTheSharingApi(string $user):void {
		$this->deleteLastShareUsingSharingApi($user, null, true);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" deletes the last share of user "([^"]*)" using the sharing API$/
	 * @When /^user "([^"]*)" tries to delete the last share of user "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $sharer
	 *
	 * @return void
	 */
	public function userDeletesLastShareOfUserUsingTheSharingApi(string $user, string $sharer):void {
		$this->deleteLastShareUsingSharingApi($user, $sharer);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @Given /^user "([^"]*)" has deleted the last share$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userHasDeletedLastShareUsingTheSharingApi(string $user):void {
		$this->deleteLastShareUsingSharingApi($user);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^the user gets the info of the last share using the sharing API$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserGetsInfoOfLastShareUsingTheSharingApi():void {
		$this->userGetsInfoOfLastShareUsingTheSharingApi($this->currentUser);
	}

	/**
	 * @When /^user "([^"]*)" gets the info of the last share in language "([^"]*)" using the sharing API$/
	 * @When /^user "([^"]*)" gets the info of the last share using the sharing API$/
	 *
	 * @param string $user username that requests the information (might not be the user that has initiated the share)
	 * @param string|null $language
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsInfoOfLastShareUsingTheSharingApi(string $user, ?string $language = null):void {
		$shareId = $this->getLastShareId();
		$language = TranslationHelper::getLanguage($language);
		$this->getShareData($user, $shareId, $language);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^the user gets the info of the last public link share using the sharing API$/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserGetsInfoOfLastPublicLinkShareUsingTheSharingApi():void {
		$this->userGetsInfoOfLastPublicLinkShareUsingTheSharingApi($this->getUserWhoCreatedLastPublicShare());
	}

	/**
	 * @When /^user "([^"]*)" gets the info of the last public link share in language "([^"]*)" using the sharing API$/
	 * @When /^user "([^"]*)" gets the info of the last public link share using the sharing API$/
	 *
	 * @param string $user username that requests the information (might not be the user that has initiated the share)
	 * @param string|null $language
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsInfoOfLastPublicLinkShareUsingTheSharingApi(string $user, ?string $language = null):void {
		if ($this->lastPublicShareId !== null) {
			$shareId = $this->lastPublicShareId;
		} else {
			throw new Exception(
				__METHOD__ . " last public link share data was not found"
			);
		}
		$language = TranslationHelper::getLanguage($language);
		$this->getShareData($user, $shareId, $language);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @Then /^as "([^"]*)" the info about the last share by user "([^"]*)" with user "([^"]*)" should include$/
	 *
	 * @param string $requestor
	 * @param string $sharer
	 * @param string $sharee
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function asLastShareInfoAboutUserSharingWithUserShouldInclude(
		string $requestor,
		string $sharer,
		string $sharee,
		TableNode $table
	) {
		$this->userGetsInfoOfLastShareUsingTheSharingApi($requestor);
		$this->ocsContext->assertOCSResponseIndicatesSuccess();
		$this->checkFieldsOfLastResponseToUser($sharer, $sharee, $table);
	}

	/**
	 * @Then /^the info about the last share by user "([^"]*)" with (?:user|group) "([^"]*)" should include$/
	 *
	 * @param string $sharer
	 * @param string $sharee
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theInfoAboutTheLastShareByUserWithUserShouldInclude(
		string $sharer,
		string $sharee,
		TableNode $table
	):void {
		$this->asLastShareInfoAboutUserSharingWithUserShouldInclude($sharer, $sharer, $sharee, $table);
	}

	/**
	 * Sets the id of the last shared file
	 *
	 * @param string $user
	 * @param string $shareId
	 *
	 * @return void
	 */
	public function setLastShareIdOf(string $user, string $shareId):void {
		$this->lastShareIdByUser[$user] = $shareId;
		$this->userWhoCreatedLastShare = $user;
	}

	/**
	 * Sets the id of the last public link shared file
	 *
	 * @param string $shareId
	 *
	 * @return void
	 */
	public function setLastPublicLinkShareId(string $shareId):void {
		$this->lastPublicShareId = $shareId;
	}

	/**
	 * Retrieves the id of the last public link shared file
	 *
	 * @return string|null
	 */
	public function getLastPublicLinkShareId():?string {
		return $this->lastPublicShareId;
	}

	/**
	 * Sets the user who created the last public link share
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function setUserWhoCreatedLastPublicShare(string $user):void {
		$this->userWhoCreatedLastPublicShare = $user;
	}

	/**
	 * Gets the user who created the last public link share
	 *
	 * @return string|null
	 */
	public function getUserWhoCreatedLastPublicShare():?string {
		return $this->userWhoCreatedLastPublicShare;
	}

	/**
	 * Retrieves the id of the last shared file
	 *
	 * @return string|null
	 */
	public function getLastShareId():?string {
		return $this->getLastShareIdForUser($this->userWhoCreatedLastShare);
	}

	/**
	 * @param string $user
	 *
	 * @return string|null
	 */
	public function getLastShareIdForUser(string $user):?string {
		if ($user === null) {
			throw new Exception(
				__METHOD__ . " user not specified. Probably no user or group shares have been created yet in the test scenario."
			);
		}
		if (isset($this->lastShareIdByUser[$user])) {
			return $this->lastShareIdByUser[$user];
		} else {
			throw new Exception(__METHOD__ . " last share id for user '$user' was not found");
		}
	}

	/**
	 * Retrieves all the shares of the respective user
	 *
	 * @param string $user
	 *
	 * @return ResponseInterface
	 */
	public function getListOfShares(string $user):ResponseInterface {
		$user = $this->getActualUsername($user);
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath(),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
		);
		return $this->response;
	}

	/**
	 * Get share data of specific share_id
	 *
	 * @param string $user
	 * @param string $share_id
	 * @param string|null $language
	 *
	 * @return void
	 */
	public function getShareData(string $user, string $share_id, ?string $language = null):void {
		$user = $this->getActualUsername($user);
		$url = $this->getSharesEndpointPath("/$share_id");
		$headers = [];
		if ($language !== null) {
			$headers['Accept-Language'] = $language;
		}
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"GET",
			$url,
			null,
			null,
			$headers
		);
	}

	/**
	 * @When user :user gets all the shares shared with him using the sharing API
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userGetsAllTheSharesSharedWithHimUsingTheSharingApi(string $user):void {
		$user = $this->getActualUsername($user);
		$url = "/apps/files_sharing/api/v1/shares?shared_with_me=true";
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			'GET',
			$url,
			null
		);
	}

	/**
	 * @When /^user "([^"]*)" gets the (|pending)\s?(user|group|user and group|public link) shares shared with him using the sharing API$/
	 *
	 * @param string $user
	 * @param string $pending
	 * @param string $shareType
	 *
	 * @return void
	 */
	public function userGetsFilteredSharesSharedWithHimUsingTheSharingApi(string $user, string $pending, string $shareType):void {
		$user = $this->getActualUsername($user);
		if ($pending === "pending") {
			$pendingClause = "&state=" . SharingHelper::SHARE_STATES['pending'];
		} else {
			$pendingClause = "";
		}
		if ($shareType === 'public link') {
			$shareType = 'public_link';
		}
		if ($shareType === 'user and group') {
			$rawShareTypes = SharingHelper::SHARE_TYPES['user'] . "," . SharingHelper::SHARE_TYPES['group'];
		} else {
			$rawShareTypes = SharingHelper::SHARE_TYPES[$shareType];
		}
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			'GET',
			$this->getSharesEndpointPath(
				"?shared_with_me=true" . $pendingClause . "&share_types=" . $rawShareTypes
			),
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
	public function userGetsAllSharesSharedWithHimFromFileOrFolderUsingTheProvisioningApi(string $user, string $path):void {
		$user = $this->getActualUsername($user);
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
	public function userGetsAllSharesSharedByHimUsingTheSharingApi(string $user):void {
		$user = $this->getActualUsername($user);
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath(),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
		);
	}

	/**
	 * @When the administrator gets all shares shared by him using the sharing API
	 *
	 * @return void
	 */
	public function theAdministratorGetsAllSharesSharedByHimUsingTheSharingApi():void {
		$this->userGetsAllSharesSharedByHimUsingTheSharingApi($this->getAdminUsername());
	}

	/**
	 * @When /^user "([^"]*)" gets the (user|group|user and group|public link) shares shared by him using the sharing API$/
	 *
	 * @param string $user
	 * @param string $shareType
	 *
	 * @return void
	 */
	public function userGetsFilteredSharesSharedByHimUsingTheSharingApi(string $user, string $shareType):void {
		$user = $this->getActualUsername($user);
		if ($shareType === 'public link') {
			$shareType = 'public_link';
		}
		if ($shareType === 'user and group') {
			$rawShareTypes = SharingHelper::SHARE_TYPES['user'] . "," . SharingHelper::SHARE_TYPES['group'];
		} else {
			$rawShareTypes = SharingHelper::SHARE_TYPES[$shareType];
		}
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath("?share_types=" . $rawShareTypes),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
		);
	}

	/**
	 * @When user :user gets all the shares from the file :path using the sharing API
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsAllTheSharesFromTheFileUsingTheSharingApi(string $user, string $path):void {
		$user = $this->getActualUsername($user);
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath("?path=$path"),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
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
		string $user,
		string $path
	):void {
		$userActual = $this->getActualUsername($user);
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$userActual,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath("?reshares=true&path=$path"),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
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
	public function userGetsAllTheSharesInsideTheFolderUsingTheSharingApi(string $user, string $path):void {
		$user = $this->getActualUsername($user);
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath("?path=$path&subfiles=true"),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
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
		string $user,
		?TableNode $body
	):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeRows($body, [], $this->shareResponseFields);
		$this->getShareData($user, (string)$this->getLastShareData()->data[0]->id);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"Error getting info of last share for user $user"
		);
		$this->ocsContext->assertOCSResponseIndicatesSuccess(
			__METHOD__ .
			' Error getting info of last share for user $user\n' .
			$this->ocsContext->getOCSResponseStatusMessage(
				$this->getResponse()
			) . '"'
		);
		$this->checkFields($user, $body);
	}

	/**
	 * @Then /^the response when user "([^"]*)" gets the info of the last public link share should include$/
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theResponseWhenUserGetsInfoOfLastPublicLinkShareShouldInclude(
		string $user,
		?TableNode $body
	):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeRows($body, [], $this->shareResponseFields);
		$this->getShareData($user, (string)$this->getLastPublicLinkShareId());
		$this->theHTTPStatusCodeShouldBe(
			200,
			"Error getting info of last public link share for user $user"
		);
		$this->ocsContext->assertOCSResponseIndicatesSuccess(
			__METHOD__ .
			' Error getting info of last public link share for user $user\n' .
			$this->ocsContext->getOCSResponseStatusMessage(
				$this->getResponse()
			) . '"'
		);
		$this->checkFields($user, $body);
	}

	/**
	 * @Then the information of the last share of user :user should include
	 *
	 * @param string $user
	 * @param TableNode $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function informationOfLastShareShouldInclude(
		string $user,
		TableNode $body
	):void {
		$user = $this->getActualUsername($user);
		$shareId = $this->getLastShareIdForUser($user);
		$this->getShareData($user, $shareId);
		$this->theHTTPStatusCodeShouldBe(
			200,
			"Error getting info of last share for user $user with share id $shareId"
		);
		$this->verifyTableNodeRows($body, [], $this->shareResponseFields);
		$this->checkFields($user, $body);
	}

	/**
	 * @Then /^the information for user "((?:[^']*)|(?:[^"]*))" about the received share of (file|folder) "((?:[^']*)|(?:[^"]*))" shared with a (user|group) should include$/
	 *
	 * @param string $user
	 * @param string $fileOrFolder
	 * @param string $fileName
	 * @param string $type
	 * @param TableNode $body should provide share_type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFieldsOfTheResponseForUserForResourceShouldInclude(
		string $user,
		string $fileOrFolder,
		string $fileName,
		string $type,
		TableNode $body
	):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeColumnsCount($body, 2);
		$fileName = $fileName[0] === "/" ? $fileName : '/' . $fileName;
		$data = $this->getAllSharesSharedWithUser($user);
		Assert::assertNotEmpty($data, 'No shares found for ' . $user);

		$bodyRows = $body->getRowsHash();
		Assert::assertArrayHasKey('share_type', $bodyRows, 'share_type is not provided');
		$share_id = null;
		foreach ($data as $share) {
			if ($share['file_target'] === $fileName && $share['item_type'] === $fileOrFolder) {
				if (($share['share_type'] === SharingHelper::getShareType($bodyRows['share_type']))
				) {
					$share_id = $share['id'];
				}
			}
		}

		Assert::assertNotNull($share_id, "Could not find share id for " . $user);

		if (\array_key_exists('expiration', $bodyRows) && $bodyRows['expiration'] !== '') {
			$bodyRows['expiration'] = \date('d-m-Y', \strtotime($bodyRows['expiration']));
		}

		$this->getShareData($user, $share_id);
		foreach ($bodyRows as $field => $value) {
			if ($type === "user" && \in_array($field, ["share_with"])) {
				$value = $this->getActualUsername($value);
			}
			if (\in_array($field, ["uid_owner"])) {
				$value = $this->getActualUsername($value);
			}
			$value = $this->replaceValuesFromTable($field, $value);
			Assert::assertTrue(
				$this->isFieldInResponse($field, $value),
				"$field doesn't have value '$value'"
			);
		}
	}

	/**
	 * @Then /^the last share_id should be included in the response/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkingLastShareIDIsIncluded():void {
		$shareId = $this->getLastShareId();
		if (!$this->isFieldInResponse('id', $shareId)) {
			Assert::fail(
				"Share id $shareId not found in response"
			);
		}
	}

	/**
	 * @Then /^the last share id should not be included in the response/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkLastShareIDIsNotIncluded():void {
		$shareId = $this->getLastShareId();
		if ($this->isFieldInResponse('id', $shareId, false)) {
			Assert::fail(
				"Share id $shareId has been found in response"
			);
		}
	}

	/**
	 * @Then /^the last public link share id should not be included in the response/
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkLastPublicLinkShareIDIsNotIncluded():void {
		$shareId = $this->getLastPublicLinkShareId();
		if ($this->isFieldInResponse('id', $shareId, false)) {
			Assert::fail(
				"Public link share id $shareId has been found in response"
			);
		}
	}

	/**
	 * @Then /^the response should not contain any share ids/
	 *
	 * @return void
	 */
	public function theResponseShouldNotContainAnyShareIds():void {
		$data = $this->getResponseXml(null, __METHOD__)->data[0];
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
	 * @Then user :user should not see the share id of the last share
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldNotSeeShareIdOfLastShare(string $user):void {
		$this->userGetsAllTheSharesSharedWithHimUsingTheSharingApi($user);
		$this->checkLastShareIDIsNotIncluded();
	}

	/**
	 * @Then user :user should not have any received shares
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldNotHaveAnyReceivedShares(string $user):void {
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
	public function checkingTheResponseEntriesCount(int $count):void {
		$actualCount = \count($this->getResponseXml(null, __METHOD__)->data[0]);
		Assert::assertEquals(
			$count,
			$actualCount,
			"Expected that the response should contain '$count' entries but got '$actualCount' entries"
		);
	}

	/**
	 * @Then the fields of the last response to user :user should include
	 *
	 * @param string $user
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkFields(string $user, ?TableNode $body):void {
		$this->verifyTableNodeColumnsCount($body, 2);
		$bodyRows = $body->getRowsHash();
		$userRelatedFieldNames = [
			"owner",
			"user",
			"uid_owner",
			"uid_file_owner",
			"share_with",
			"displayname_file_owner",
			"displayname_owner"
		];
		foreach ($bodyRows as $field => $value) {
			if (\in_array($field, $userRelatedFieldNames)) {
				$value = $this->substituteInLineCodes($value, $user);
			}
			$value = $this->getActualUsername($value);
			$value = $this->replaceValuesFromTable($field, $value);
			Assert::assertTrue(
				$this->isFieldInResponse($field, $value),
				"$field doesn't have value '$value'"
			);
		}
	}

	/**
	 * @Then /^the fields of the last response (?:to|about) user "([^"]*)" sharing with (?:user|group) "([^"]*)" should include$/
	 *
	 * @param string $sharer
	 * @param string $sharee
	 * @param TableNode|null $body
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkFieldsOfLastResponseToUser(string $sharer, string $sharee, ?TableNode $body):void {
		$this->verifyTableNodeColumnsCount($body, 2);
		$bodyRows = $body->getRowsHash();
		foreach ($bodyRows as $field => $value) {
			if (\in_array($field, ["displayname_owner", "displayname_file_owner", "owner", "uid_owner", "uid_file_owner"])) {
				$value = $this->substituteInLineCodes($value, $sharer);
			} elseif (\in_array($field, ["share_with", "share_with_displayname", "user"])) {
				$value = $this->substituteInLineCodes($value, $sharee);
			}
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
	public function theFieldsOfTheLastResponseShouldBeEmpty():void {
		$data = $this->getResponseXml(null, __METHOD__)->data[0];
		Assert::assertEquals(
			\count($data->element),
			0,
			"last response contains data but was expected to be empty"
		);
	}

	/**
	 *
	 * @return string
	 *
	 * @throws Exception
	 */
	public function getSharingAttributesFromLastResponse():string {
		$responseXml = $this->getResponseXml(null, __METHOD__)->data[0];
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
	public function checkingAttributesInLastShareResponse(TableNode $attributes):void {
		$this->verifyTableNodeColumns($attributes, ['scope', 'key', 'enabled']);
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

		// check if the expected attributes received from table match actualAttributes
		foreach ($attributes as $row) {
			$foundRow = false;
			foreach ($actualAttributesArray as $item) {
				if (($item['scope'] === $row['scope'])
					&& ($item['key'] === $row['key'])
					&& ($item['enabled'] === $row['enabled'])
				) {
					$foundRow = true;
				}
			}
			Assert::assertTrue(
				$foundRow,
				"Could not find expected attribute with scope '" . $row['scope'] . "' and key '" . $row['key'] . "'"
			);
		}
	}

	/**
	 * @Then the downloading of file :fileName for user :user should fail with error message
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param PyStringNode $errorMessage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userDownloadsFailWithMessage(string $fileName, string $user, PyStringNode $errorMessage):void {
		$user = $this->getActualUsername($user);
		$this->downloadFileAsUserUsingPassword($user, $fileName);
		$receivedErrorMessage = $this->getResponseXml(null, __METHOD__)->xpath('//s:message');
		if ((bool) $errorMessage) {
			Assert::assertEquals(
				$errorMessage,
				(string) $receivedErrorMessage[0],
				"Expected error message was '$errorMessage' but got '"
				. (string) $receivedErrorMessage[0]
				. "'"
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
	 * @throws Exception
	 */
	public function checkFieldsNotInResponse(?TableNode $body):void {
		$this->verifyTableNodeColumnsCount($body, 2);
		$bodyRows = $body->getRowsHash();

		foreach ($bodyRows as $field => $value) {
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
	 * @throws Exception
	 */
	public function removeAllSharesFromResource(string $user, string $fileName):void {
		$headers = ['Content-Type' => 'application/json'];
		$res = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath("?format=json"),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion,
			$headers
		);

		$this->setResponse($res);
		$this->theHTTPStatusCodeShouldBeSuccess();

		$json = \json_decode($res->getBody()->getContents(), true);
		$deleted = false;
		foreach ($json['ocs']['data'] as $data) {
			if (\stripslashes($data['path']) === $fileName) {
				$id = $data['id'];
				$response = OcsApiHelper::sendRequest(
					$this->getBaseUrl(),
					$user,
					$this->getPasswordForUser($user),
					"DELETE",
					$this->getSharesEndpointPath("/{$id}"),
					$this->getStepLineRef(),
					[],
					$this->ocsApiVersion
				);

				$this->setResponse($response);
				$this->theHTTPStatusCodeShouldBeSuccess();

				$deleted = true;
			}
		}

		if ($deleted === false) {
			throw new Exception(
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
	 * @throws Exception
	 */
	public function userRemovesAllSharesFromTheFileNamed(string $user, string $fileName):void {
		$user = $this->getActualUsername($user);
		$this->removeAllSharesFromResource($user, $fileName);
	}

	/**
	 * @Given user :user has removed all shares from the file named :fileName
	 *
	 * @param string $user
	 * @param string $fileName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasRemovedAllSharesFromTheFileNamed(string $user, string $fileName):void {
		$user = $this->getActualUsername($user);
		$this->removeAllSharesFromResource($user, $fileName);
		$dataResponded = $this->getShares($user, $fileName);
		Assert::assertEquals(
			0,
			\count($dataResponded),
			__METHOD__
			. " Expected all shares to be removed from '$fileName' but got '"
			. \count($dataResponded)
			. "' shares still present"
		);
	}

	/**
	 * Returns shares of a file or folder as a SimpleXMLElement
	 *
	 * Note: the "single" SimpleXMLElement may contain one or more actual
	 * shares (to users, groups or public links etc). If you access an item directly,
	 * for example, getShares()->id, then the value of "id" for the first element
	 * will be returned. To access all the elements, you can loop through the
	 * returned SimpleXMLElement with "foreach" - it will act like a PHP array
	 * of elements.
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return SimpleXMLElement
	 */
	public function getShares(string $user, string $path):SimpleXMLElement {
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$this->getSharesEndpointPath("?path=$path"),
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
		);
		return $this->getResponseXml(null, __METHOD__)->data->element;
	}

	/**
	 * @Then /^as user "([^"]*)" the public shares of (?:file|folder) "([^"]*)" should be$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode|null $TableNode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkPublicShares(string $user, string $path, ?TableNode $TableNode):void {
		$user = $this->getActualUsername($user);
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
							(string) $elementResponded->path[0],
							__METHOD__
							. " Expected '${expectedElementsArray['path']}' but got '"
							. (string) $elementResponded->path[0]
							. "'"
						);
						Assert::assertEquals(
							$expectedElementsArray['permissions'],
							(string) $elementResponded->permissions[0],
							__METHOD__
							. " Expected '${expectedElementsArray['permissions']}' but got '"
							. (string) $elementResponded->permissions[0]
							. "'"
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
	 * @Then /^as user "([^"]*)" the (file|folder) "([^"]*)" should not have any shares$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkPublicSharesAreEmpty(string $user, string $entry, string $path):void {
		$user = $this->getActualUsername($user);
		$this->asFileOrFolderShouldExist($user, $entry, $path);
		$dataResponded = $this->getShares($user, $path);
		//It shouldn't have public shares
		Assert::assertEquals(
			0,
			\count($dataResponded),
			__METHOD__
			. " As '$user', '$path' was expected to have no shares, but got '"
			. \count($dataResponded)
			. "' shares present"
		);
	}

	/**
	 * @param string $user
	 * @param string $path to share
	 * @param string $name of share
	 *
	 * @return string|null
	 */
	public function getPublicShareIDByName(string $user, string $path, string $name):?string {
		$dataResponded = $this->getShares($user, $path);
		foreach ($dataResponded as $elementResponded) {
			if ((string) $elementResponded->name[0] === $name) {
				return (string) $elementResponded->id[0];
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
		string $user,
		string $name,
		string $path
	):void {
		$user = $this->getActualUsername($user);
		$share_id = $this->getPublicShareIDByName($user, $path, $name);
		$url = $this->getSharesEndpointPath("/$share_id");
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"DELETE",
			$url,
			null
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
		string $user,
		string $name,
		string $path
	):void {
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
		string $user,
		string $name,
		string $path
	):void {
		$this->deletePublicLinkShareUsingTheSharingApi(
			$user,
			$name,
			$path
		);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^user "([^"]*)" (declines|accepts) share "([^"]*)" offered by user "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 * @param string|null $state specify 'accepted', 'pending', 'rejected' or 'declined' to only consider shares in that state
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userReactsToShareOfferedBy(string $user, string $action, string $share, string $offeredBy, ?string $state = ''):void {
		$user = $this->getActualUsername($user);
		$offeredBy = $this->getActualUsername($offeredBy);

		$dataResponded = $this->getAllSharesSharedWithUser($user);
		$shareId = null;
		foreach ($dataResponded as $shareElement) {
			$shareFolder = \trim(
				SetupHelper::getSystemConfigValue('share_folder', $this->getStepLineRef())
			);

			if ($shareFolder) {
				$shareFolder = \ltrim($shareFolder, '/');
			}

			// Add share folder to share path if given
			if ($shareFolder && !(strpos($share, "/$shareFolder") === 0)) {
				$share = '/' . $shareFolder . $share;
			}

			// SharingHelper::SHARE_STATES has the mapping between the words for share states
			// like "accepted", "pending",... and the integer constants 0, 1,... that are in
			// the "state" field of the share data.
			if ($state === '') {
				// Any share state is OK
				$matchesShareState = true;
			} else {
				$requiredStateCode = SharingHelper::SHARE_STATES[$state];
				if ($shareElement['state'] === $requiredStateCode) {
					$matchesShareState = true;
				} else {
					$matchesShareState = false;
				}
			}

			if ($matchesShareState
				&& (string) $shareElement['uid_owner'] === $offeredBy
				&& (string) $shareElement['path'] === $share
			) {
				$shareId = (string) $shareElement['id'];
				break;
			}
		}
		Assert::assertNotNull(
			$shareId,
			__METHOD__ . " could not find share $share, offered by $offeredBy to $user"
		);
		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}" .
			"/shares/pending/$shareId";
		if (\substr($action, 0, 7) === "decline") {
			$httpRequestMethod = "DELETE";
		} elseif (\substr($action, 0, 6) === "accept") {
			$httpRequestMethod = "POST";
		}

		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$httpRequestMethod,
			$url,
			null
		);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" (declines|accepts) the following shares offered by user "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $offeredBy
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userReactsToTheFollowingSharesOfferedBy(string $user, string $action, string $offeredBy, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $share) {
			$this->userReactsToShareOfferedBy(
				$user,
				$action,
				$share["path"],
				$offeredBy
			);
		}
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" (declines|accepts) share with ID "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $share_id
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userReactsToShareWithShareIDOfferedBy(string $user, string $action, string $share_id):void {
		$user = $this->getActualUsername($user);

		$shareId = $this->substituteInLineCodes($share_id, $user);

		$url = "/apps/files_sharing/api/v{$this->sharingApiVersion}" .
			"/shares/pending/$shareId";
		if (\substr($action, 0, 7) === "decline") {
			$httpRequestMethod = "DELETE";
		} elseif (\substr($action, 0, 6) === "accept") {
			$httpRequestMethod = "POST";
		}

		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$httpRequestMethod,
			$url,
			null
		);
	}

	/**
	 * @Given /^user "([^"]*)" has (declined|accepted) share "([^"]*)" offered by user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasReactedToShareOfferedBy(string $user, string $action, string $share, string $offeredBy):void {
		$this->userReactsToShareOfferedBy($user, $action, $share, $offeredBy);
		if ($action === 'declined') {
			$actionText = 'decline';
		}
		if ($action === 'accepted') {
			$actionText = 'accept';
		}
		$this->theHTTPStatusCodeShouldBe(
			200,
			__METHOD__ . " could not $actionText share $share to $user by $offeredBy"
		);
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
	}

	/**
	 * @When /^user "([^"]*)" accepts the (?:first|next|) pending share "([^"]*)" offered by user "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userAcceptsThePendingShareOfferedBy(string $user, string $share, string $offeredBy):void {
		$this->userReactsToShareOfferedBy($user, 'accepts', $share, $offeredBy, 'pending');
	}

	/**
	 * @Given /^user "([^"]*)" has accepted the (?:first|next|) pending share "([^"]*)" offered by user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasAcceptedThePendingShareOfferedBy(string $user, string $share, string $offeredBy) {
		$this->userAcceptsThePendingShareOfferedBy($user, $share, $offeredBy);
		$this->theHTTPStatusCodeShouldBe(
			200,
			__METHOD__ . " could not accept the pending share $share to $user by $offeredBy"
		);
		$this->ocsContext->assertOCSResponseIndicatesSuccess();
	}

	/**
	 * @Then /^user "([^"]*)" should be able to (decline|accept) pending share "([^"]*)" offered by user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $action
	 * @param string $share
	 * @param string $offeredBy
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeAbleToAcceptShareOfferedBy(
		string $user,
		string $action,
		string $share,
		string $offeredBy
	) {
		if ($action === 'accept') {
			$this->userHasAcceptedThePendingShareOfferedBy($user, $share, $offeredBy);
		} elseif ($action === 'decline') {
			$this->userHasReactedToShareOfferedBy($user, 'declined', $share, $offeredBy);
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
	 * @throws Exception
	 */
	public function assertSharesOfUserAreInState(string $user, string $state, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["path"], $this->shareResponseFields);
		$usersShares = $this->getAllSharesSharedWithUser($user, $state);
		foreach ($table as $row) {
			$found = false;
			//the API returns the path without trailing slash, but we want to
			//be able to accept leading and/or trailing slashes in the step definition
			$row['path'] = "/" . \trim($row['path'], "/");
			foreach ($usersShares as $share) {
				try {
					Assert::assertArrayHasKey('path', $share);
					Assert::assertEquals($row['path'], $share['path']);
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
	 *
	 * @Then /^the sharing API should report to user "([^"]*)" that no shares are in the (pending|accepted|declined) state$/
	 *
	 * @param string $user
	 * @param string $state
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertNoSharesOfUserAreInState(string $user, string $state):void {
		$usersShares = $this->getAllSharesSharedWithUser($user, $state);
		Assert::assertEmpty(
			$usersShares,
			"user has " . \count($usersShares) . " share(s) in the $state state"
		);
	}

	/**
	 * @Then the sharing API should report that no shares are shared with user :user
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertThatNoSharesAreSharedWithUser(string $user):void {
		$usersShares = $this->getAllSharesSharedWithUser($user);
		Assert::assertEmpty(
			$usersShares,
			"user has " . \count($usersShares) . " share(s)"
		);
	}

	/**
	 * @When the administrator adds group :group to the exclude groups from receiving shares list using the occ command
	 *
	 * @param string $group
	 *
	 * @return int
	 * @throws Exception
	 */
	public function administratorAddsGroupToExcludeFromReceivingSharesList(string $group): int {
		//get current groups
		$occExitCode = $this->runOcc(
			['config:app:get files_sharing blacklisted_receiver_groups']
		);

		$occStdOut = $this->getStdOutOfOccCommand();
		$occStdErr = $this->getStdErrOfOccCommand();

		if (($occExitCode !== 0) && ($occExitCode !== 1)) {
			throw new Exception(
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
		return $this->runOcc(
			[
				'config:app:set',
				'files_sharing blacklisted_receiver_groups',
				'--value=' . \json_encode($currentGroups)
			]
		);
	}

	/**
	 * @Given the administrator has added group :group to the exclude groups from receiving shares list
	 *
	 * @param string $group
	 *
	 * @return void
	 * @throws Exception
	 */
	public function administratorHasAddedGroupToExcludeFromReceivingSharesList(string $group):void {
		$setSettingExitCode = $this->administratorAddsGroupToExcludeFromReceivingSharesList($group);
		if ($setSettingExitCode !== 0) {
			throw new Exception(
				__METHOD__ . " could not set files_sharing blacklisted_receiver_groups " .
				$setSettingExitCode . " " .
				$this->getStdOutOfOccCommand() . " " .
				$this->getStdErrOfOccCommand()
			);
		}
	}

	/**
	 * @When user :user gets share with id :share using the sharing API
	 *
	 * @param string $user
	 * @param string $share_id
	 *
	 * @return ResponseInterface|null
	 */
	public function userGetsTheLastShareWithTheShareIdUsingTheSharingApi(string $user, string $share_id): ?ResponseInterface {
		$user = $this->getActualUsername($user);
		$share_id = $this->substituteInLineCodes($share_id, $user);
		$url = $this->getSharesEndpointPath("/$share_id");

		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"GET",
			$url,
			$this->getStepLineRef(),
			[],
			$this->ocsApiVersion
		);
		return $this->response;
	}

	/**
	 *
	 * @param string $user
	 * @param string|null $state pending|accepted|declined|rejected|all
	 *
	 * @return array of shares that are shared with this user
	 * @throws Exception
	 */
	private function getAllSharesSharedWithUser(string $user, ?string $state = "all"): array {
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

		$url = $this->getSharesEndpointPath("?format=json&shared_with_me=true&state=$stateCode");
		$this->ocsContext->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			"GET",
			$url,
			null
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
	 * The tests can create public link shares with the API or with the webUI.
	 * If lastPublicShareData is null, then there have not been any created with the API,
	 * so look for details of a public link share created with the webUI.
	 *
	 * @return string authorization token
	 */
	public function getLastPublicShareToken():string {
		if ($this->lastPublicShareData === null) {
			return $this->getLastCreatedPublicLinkToken();
		} else {
			if (\count($this->lastPublicShareData->data->element) > 0) {
				return (string)$this->lastPublicShareData->data[0]->token;
			}

			return (string)$this->lastPublicShareData->data->token;
		}
	}

	/**
	 * Returns the attribute values from the last public link share data
	 *
	 * @param $attr - attribute name to get
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getLastPublicShareAttribute(string $attr): string {
		if ($this->lastPublicShareData === null) {
			throw new Exception(__METHOD__ . "No public share data available.");
		}
		if (!\in_array($attr, $this->shareResponseFields)) {
			throw new Exception(
				__METHOD__ . " attribute $attr is not in the list of allowed attributes"
			);
		}
		if (\count($this->lastPublicShareData->data->element) > 0) {
			if (!isset($this->lastPublicShareData->data[0]->$attr)) {
				throw new Exception(__METHOD__ . " No attribute $attr available in the last share data.");
			}
			return (string)$this->lastPublicShareData->data[0]->{$attr};
		}

		if (!isset($this->lastPublicShareData->data->$attr)) {
			throw new Exception(__METHOD__ . " No attribute $attr available in the last share data.");
		}

		return (string)$this->lastPublicShareData->data->{$attr};
	}

	/**
	 * @return string path of file that was shared (relevant when a single file has been shared)
	 */
	public function getLastPublicSharePath():string {
		if ($this->lastPublicShareData === null) {
			// There have not been any public links created with the API
			// so get the path of the last public link created with the webUI
			return $this->getLastCreatedPublicLinkPath();
		} else {
			if (\count($this->lastPublicShareData->data->element) > 0) {
				return (string)$this->lastPublicShareData->data[0]->path;
			}

			return (string)$this->lastPublicShareData->data->path;
		}
	}

	/**
	 * Send request for preview of a file in a public link
	 *
	 * @param string $fileName
	 * @param string $token
	 *
	 * @return void
	 */
	public function getPublicPreviewOfFile(string $fileName, string $token):void {
		$url = $this->getBaseUrl() .
			"/index.php/apps/files_sharing/ajax/publicpreview.php" .
			"?file=$fileName&t=$token";
		$resp = HttpRequestHelper::get(
			$url,
			$this->getStepLineRef()
		);
		$this->setResponse($resp);
	}

	/**
	 * @When the public accesses the preview of file :path from the last shared public link using the sharing API
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function thePublicAccessesThePreviewOfTheSharedFileUsingTheSharingApi(string $path):void {
		$shareData = $this->getLastPublicShareData();
		$token = (string) $shareData->data->token;
		$this->getPublicPreviewOfFile($path, $token);
		$this->pushToLastStatusCodesArrays();
	}

	/**
	 * @When the public accesses the preview of the following files from the last shared public link using the sharing API
	 *
	 * @param TableNode $table
	 *
	 * @throws Exception
	 * @return void
	 */
	public function thePublicAccessesThePreviewOfTheFollowingSharedFileUsingTheSharingApi(
		TableNode $table
	):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();
		$this->emptyLastHTTPStatusCodesArray();
		$this->emptyLastOCSStatusCodesArray();
		foreach ($paths as $path) {
			$shareData = $this->getLastPublicShareData();
			$token = (string) $shareData->data->token;
			$this->getPublicPreviewOfFile($path["path"], $token);
			$this->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @param string $user
	 * @param string $shareServer
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function saveLastSharedPublicLinkShare(
		string $user,
		string $shareServer,
		?string $password = ""
	):void {
		$user = $this->getActualUsername($user);
		$userPassword = $this->getPasswordForUser($user);

		$shareData = $this->getLastPublicShareData();
		$owner = (string) $shareData->data->uid_owner;
		$name = $this->encodePath((string) $shareData->data->file_target);
		$name = \trim($name, "/");
		$ownerDisplayName = (string) $shareData->data->displayname_owner;
		$token = (string) $shareData->data->token;

		if (\strtolower($shareServer) == "remote") {
			$remote = $this->getRemoteBaseUrl();
		} else {
			$remote = $this->getLocalBaseUrl();
		}

		$body['remote'] = $remote;
		$body['token'] = $token;
		$body['owner'] = $owner;
		$body['ownerDisplayName'] = $ownerDisplayName;
		$body['name'] = $name;
		$body['password'] = $password;

		Assert::assertNotNull(
			$token,
			__METHOD__ . " could not find any public share"
		);

		$url = $this->getBaseUrl() . "/index.php/apps/files_sharing/external";

		$response = HttpRequestHelper::post(
			$url,
			$this->getStepLineRef(),
			$user,
			$userPassword,
			null,
			$body
		);
		$this->setResponse($response);
	}

	/**
	 * @Given /^user "([^"]*)" has added the public share created from server "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $shareServer
	 *
	 * @return void
	 */
	public function userHasAddedPublicShareCreatedByUser(string $user, string $shareServer):void {
		$this->saveLastSharedPublicLinkShare($user, $shareServer);

		$resBody = json_decode($this->response->getBody()->getContents());
		$status = '';
		$message = '';
		if ($resBody) {
			$status = $resBody->status;
			$message = $resBody->data->message;
		}

		Assert::assertEquals(
			200,
			$this->response->getStatusCode(),
			__METHOD__
			. " Expected status code is '200' but got '"
			. $this->response->getStatusCode()
			. "'"
		);
		Assert::assertNotEquals(
			'error',
			$status,
			__METHOD__
			. "\nFailed to save public share.\n'$message'"
		);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param string $type
	 * @param int $permissions
	 *
	 * @return array
	 */
	public function preparePublicQuickLinkPayload(string $user, string $path, string $type, int $permissions = 1): array {
		return [
			"permissions" => $permissions,
			"expireDate" => "",
			"shareType" => 3,
			"itemType" => $type,
			"itemSource" => $this->getFileIdForPath($user, $path),
			"name" => "Public quick link",
			"attributes" =>  [
				[
					"scope" => "files_sharing",
					"key" => "isQuickLink",
					"value" => true
				]
			],
			"path" => $path
		];
	}

	/**
	 * @Given /^user "([^"]*)" has created a read only public link for (file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $type
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasCreatedAReadOnlyPublicLinkForFileFolder(string $user, string $type, string $path):void {
		$user = $this->getActualUsername($user);
		$userPassword = $this->getPasswordForUser($user);

		$requestPayload = $this->preparePublicQuickLinkPayload($user, $path, $type);
		$url = $this->getBaseUrl() . "/ocs/v2.php/apps/files_sharing/api/v1/shares?format=json";

		$response = HttpRequestHelper::post(
			$url,
			$this->getStepLineRef(),
			$user,
			$userPassword,
			null,
			$requestPayload
		);
		$this->setResponse($response);
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @When /^user "([^"]*)" adds the public share created from server "([^"]*)" using the sharing API$/
	 *
	 * @param string $user
	 * @param string $shareServer
	 *
	 * @return void
	 */
	public function userAddsPublicShareCreatedByUser(string $user, string $shareServer):void {
		$this->saveLastSharedPublicLinkShare($user, $shareServer);
	}

	/**
	 * Expires last created public link share using the testing API
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function expireLastCreatedPublicLinkShare():void {
		$shareId = $this->getLastPublicLinkShareId();
		$this->expireShare($shareId);
	}

	/**
	 * Expires a share using the testing API
	 *
	 * @param string|null $shareId optional share id, if null then expire the last share that was created.
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function expireShare(string $shareId = null):void {
		$adminUser = $this->getAdminUsername();
		if ($shareId === null) {
			$shareId = $this->getLastShareId();
		}
		$response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$adminUser,
			$this->getAdminPassword(),
			'POST',
			"/apps/testing/api/v1/expire-share/{$shareId}",
			$this->getStepLineRef(),
			[],
			$this->getOcsApiVersion()
		);
		$this->setResponse($response);
	}

	/**
	 * @Given the administrator has expired the last created share using the testing API
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function theAdministratorHasExpiredTheLastCreatedShare():void {
		$this->expireShare();
		$httpStatus = $this->getResponse()->getStatusCode();
		Assert::assertSame(
			200,
			$httpStatus,
			"Request to expire last share failed. HTTP status was '$httpStatus'"
		);
		$ocsStatusMessage = $this->ocsContext->getOCSResponseStatusMessage($this->getResponse());
		if ($this->getOcsApiVersion() === 1) {
			$expectedOcsStatusCode = "100";
		} else {
			$expectedOcsStatusCode = "200";
		}
		$this->ocsContext->theOCSStatusCodeShouldBe(
			$expectedOcsStatusCode,
			"Request to expire last share failed: '$ocsStatusMessage'"
		);
	}

	/**
	 * @Given the administrator has expired the last created public link share using the testing API
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function theAdministratorHasExpiredTheLastCreatedPublicLinkShare():void {
		$this->expireLastCreatedPublicLinkShare();
		$httpStatus = $this->getResponse()->getStatusCode();
		Assert::assertSame(
			200,
			$this->getResponse()->getStatusCode(),
			"Request to expire last public link share failed. HTTP status was '$httpStatus'"
		);
		$ocsStatusMessage = $this->ocsContext->getOCSResponseStatusMessage($this->getResponse());
		if ($this->getOcsApiVersion() === 1) {
			$expectedOcsStatusCode = "100";
		} else {
			$expectedOcsStatusCode = "200";
		}
		$this->ocsContext->theOCSStatusCodeShouldBe(
			$expectedOcsStatusCode,
			"Request to expire last public link share failed: '$ocsStatusMessage'"
		);
	}

	/**
	 * @When the administrator expires the last created share using the testing API
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function theAdministratorExpiresTheLastCreatedShare():void {
		$this->expireShare();
	}

	/**
	 * @When the administrator expires the last created public link share using the testing API
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function theAdministratorExpiresTheLastCreatedPublicLinkShare():void {
		$this->expireLastCreatedPublicLinkShare();
	}

	/**
	 * replace values from table
	 *
	 * @param string $field
	 * @param string $value
	 *
	 * @return string
	 */
	public function replaceValuesFromTable(string $field, string $value):string {
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
			$value = (string)SharingHelper::getPermissionSum($value);
		}
		if ($field === "share_type") {
			$value = (string)SharingHelper::getShareType($value);
		}
		return $value;
	}

	/**
	 * @return array of common sharing capability settings for testing
	 */
	protected function getCommonSharingConfigs():array {
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
				'testingState' => ''
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
				'capabilitiesParameter' => 'user@@@send_mail',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_allow_mail_notification',
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
				'capabilitiesParameter' => 'remote@@@expire_date@@@enabled',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_default_expire_date_remote_share',
				'testingState' => false
			],
			[
				'capabilitiesApp' => 'files_sharing',
				'capabilitiesParameter' => 'remote@@@expire_date@@@enforced',
				'testingApp' => 'core',
				'testingParameter' => 'shareapi_enforce_expire_date_remote_share',
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
