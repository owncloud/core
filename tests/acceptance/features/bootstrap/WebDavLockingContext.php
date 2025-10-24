<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Assert;
use TestHelpers\HttpRequestHelper;
use TestHelpers\OcsApiHelper;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * context containing API steps needed for the locking mechanism of webdav
 */
class WebDavLockingContext implements Context {
	private FeatureContext $featureContext;
	private PublicWebDavContext $publicWebDavContext;

	/**
	 *
	 * @var string[][]
	 */
	private array $tokenOfLastLock = [];

	/**
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $properties table with no heading with | property | value |
	 * @param boolean $public if the file is in a public share or not
	 * @param boolean $expectToSucceed
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	private function lockFile(
		string $user,
		string $file,
		TableNode $properties,
		bool $public = false,
		bool $expectToSucceed = true,
		string $publicWebDAVAPIVersion = "old"
	) {
		$user = $this->featureContext->getActualUsername($user);
		$baseUrl = $this->featureContext->getBaseUrl();
		if ($public === true) {
			$type = "public-files-$publicWebDAVAPIVersion";
			$password = null;
		} else {
			$type = "files";
			$password = $this->featureContext->getPasswordForUser($user);
		}
		$body
			= "<?xml version='1.0' encoding='UTF-8'?>" .
			"<d:lockinfo xmlns:d='DAV:'> ";
		$headers = [];
		$this->featureContext->verifyTableNodeRows($properties, [], ['lockscope', 'depth', 'timeout']);
		$propertiesRows = $properties->getRowsHash();
		foreach ($propertiesRows as $property => $value) {
			if ($property === "depth" || $property === "timeout") {
				//properties that are set in the header not in the xml
				$headers[$property] = $value;
			} else {
				$body .= "<d:$property><d:$value/></d:$property>";
			}
		}

		$body .= "</d:lockinfo>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"LOCK",
			$file,
			$headers,
			$this->featureContext->getStepLineRef(),
			$body,
			$this->featureContext->getDavPathVersion(),
			$type
		);

		$this->featureContext->setResponse($response);
		$responseXml = $this->featureContext->getResponseXml(null, __METHOD__);
		$this->featureContext->setResponseXmlObject($responseXml);
		$xmlPart = $responseXml->xpath("//d:locktoken/d:href");
		if (isset($xmlPart[0])) {
			$this->tokenOfLastLock[$user][$file] = (string) $xmlPart[0];
		} else {
			if ($expectToSucceed === true) {
				Assert::fail("could not find lock token after trying to lock '$file'");
			}
		}
	}

	/**
	 * @When user :user locks file/folder :file using the WebDAV API setting the following properties
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $properties table with no heading with | property | value |
	 *
	 * @return void
	 */
	public function lockFileUsingWebDavAPI(string $user, string $file, TableNode $properties) {
		$this->lockFile($user, $file, $properties, false, false);
	}

	/**
	 * @Given user :user has locked file/folder :file setting the following properties
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $properties table with no heading with | property | value |
	 *
	 * @return void
	 */
	public function userHasLockedFile(string $user, string $file, TableNode $properties) {
		$this->lockFile($user, $file, $properties);
	}

	/**
	 * @Given the public has locked the last public link shared file/folder setting the following properties
	 *
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicHasLockedLastSharedFile(TableNode $properties) {
		$this->lockFile(
			$this->featureContext->getLastCreatedPublicShareToken(),
			"/",
			$properties,
			true
		);
	}

	/**
	 * @When the public locks the last public link shared file/folder using the WebDAV API setting the following properties
	 *
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicLocksLastSharedFile(TableNode $properties) {
		$this->lockFile(
			$this->featureContext->getLastCreatedPublicShareToken(),
			"/",
			$properties,
			true,
			false
		);
	}

	/**
	 * @Given the public has locked :file in the last public link shared folder setting the following properties
	 *
	 * @param string $file
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicHasLockedFileLastSharedFolder(
		string $file,
		TableNode $properties
	) {
		$this->lockFile(
			$this->featureContext->getLastCreatedPublicShareToken(),
			$file,
			$properties,
			true
		);
	}

	/**
	 * @When /^the public locks "([^"]*)" in the last public link shared folder using the (old|new) public WebDAV API setting the following properties$/
	 *
	 * @param string $file
	 * @param string $publicWebDAVAPIVersion
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicLocksFileLastSharedFolder(
		string $file,
		string $publicWebDAVAPIVersion,
		TableNode $properties
	) {
		$this->lockFile(
			$this->featureContext->getLastCreatedPublicShareToken(),
			$file,
			$properties,
			true,
			false,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When user :user unlocks the last created lock of file/folder :file using the WebDAV API
	 *
	 * @param string $user
	 * @param string $file
	 *
	 * @return void
	 */
	public function unlockLastLockUsingWebDavAPI(string $user, string $file) {
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user,
			$file,
			$user,
			$file
		);
	}

	/**
	 * @When user :user unlocks file/folder :itemToUnlock with the last created lock of file/folder :itemToUseLockOf using the WebDAV API
	 *
	 * @param string $user
	 * @param string $itemToUnlock
	 * @param string $itemToUseLockOf
	 *
	 * @return void
	 */
	public function unlockItemWithLastLockOfOtherItemUsingWebDavAPI(
		string $user,
		string $itemToUnlock,
		string $itemToUseLockOf
	) {
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user,
			$itemToUnlock,
			$user,
			$itemToUseLockOf
		);
	}

	/**
	 * @When user :user unlocks file/folder :itemToUnlock with the last created public lock of file/folder :itemToUseLockOf using the WebDAV API
	 *
	 * @param string $user
	 * @param string $itemToUnlock
	 * @param string $itemToUseLockOf
	 *
	 * @return void
	 */
	public function unlockItemWithLastPublicLockOfOtherItemUsingWebDavAPI(
		string $user,
		string $itemToUnlock,
		string $itemToUseLockOf
	) {
		$lockOwner = $this->featureContext->getLastCreatedPublicShareToken();
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user,
			$itemToUnlock,
			$lockOwner,
			$itemToUseLockOf
		);
	}

	/**
	 *
	 * @param string $user
	 * @param string $itemToUnlock
	 *
	 * @return int
	 *
	 * @throws Exception|GuzzleException
	 */
	private function countLockOfResources(
		string $user,
		string $itemToUnlock
	): int {
		$user = $this->featureContext->getActualUsername($user);
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);
		$body
			= "<?xml version='1.0' encoding='UTF-8'?>" .
			"<d:propfind xmlns:d='DAV:'> " .
			"<d:prop><d:lockdiscovery/></d:prop>" .
			"</d:propfind>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"PROPFIND",
			$itemToUnlock,
			null,
			$this->featureContext->getStepLineRef(),
			$body,
			$this->featureContext->getDavPathVersion()
		);
		$responseXml = $this->featureContext->getResponseXml($response, __METHOD__);
		$xmlPart = $responseXml->xpath("//d:response//d:lockdiscovery/d:activelock");
		if (\is_array($xmlPart)) {
			return \count($xmlPart);
		} else {
			throw new Exception("xmlPart for 'd:activelock' was expected to be array but found: $xmlPart");
		}
	}

	/**
	 * @Given user :user has unlocked file/folder :itemToUnlock with the last created lock of file/folder :itemToUseLockOf of user :lockOwner using the WebDAV API
	 *
	 * @param string $user
	 * @param string $itemToUnlock
	 * @param string $lockOwner
	 * @param string $itemToUseLockOf
	 * @param boolean $public
	 *
	 * @return void
	 * @throws Exception|GuzzleException
	 */
	public function hasUnlockItemWithTheLastCreatedLock(
		string $user,
		string $itemToUnlock,
		string $lockOwner,
		string $itemToUseLockOf,
		bool $public = false
	) {
		$lockCount = $this->countLockOfResources($user, $itemToUnlock);

		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user,
			$itemToUnlock,
			$lockOwner,
			$itemToUseLockOf,
			$public
		);
		$this->featureContext->theHTTPStatusCodeShouldBe(204);

		$this->numberOfLockShouldBeReported($lockCount - 1, $itemToUnlock, $user);
	}

	/**
	 * @When user :user unlocks file/folder :itemToUnlock with the last created lock of file/folder :itemToUseLockOf of user :lockOwner using the WebDAV API
	 *
	 * @param string $user
	 * @param string $itemToUnlock
	 * @param string $lockOwner
	 * @param string $itemToUseLockOf
	 * @param boolean $public
	 *
	 * @return void
	 */
	public function unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
		string $user,
		string $itemToUnlock,
		string $lockOwner,
		string $itemToUseLockOf,
		bool $public = false
	) {
		$user = $this->featureContext->getActualUsername($user);
		$lockOwner = $this->featureContext->getActualUsername($lockOwner);
		if ($public === true) {
			$type = "public-files";
			$password = null;
		} else {
			$type = "files";
			$password = $this->featureContext->getPasswordForUser($user);
		}
		$baseUrl = $this->featureContext->getBaseUrl();
		if (!isset($this->tokenOfLastLock[$lockOwner][$itemToUseLockOf])) {
			Assert::fail(
				"could not find saved token of '$itemToUseLockOf' " .
				"owned by user '$lockOwner'"
			);
		}
		$headers = [
			"Lock-Token" => $this->tokenOfLastLock[$lockOwner][$itemToUseLockOf]
		];
		$this->featureContext->setResponse(
			WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				"UNLOCK",
				$itemToUnlock,
				$headers,
				$this->featureContext->getStepLineRef(),
				null,
				$this->featureContext->getDavPathVersion(),
				$type
			)
		);
		$this->featureContext->pushToLastStatusCodesArrays();
	}

	/**
	 * @When the public unlocks file/folder :itemToUnlock with the last created lock of file/folder :itemToUseLockOf of user :lockOwner using the WebDAV API
	 *
	 * @param string $itemToUnlock
	 * @param string $lockOwner
	 * @param string $itemToUseLockOf
	 *
	 * @return void
	 */
	public function unlockItemAsPublicWithLastLockOfUserAndItemUsingWebDavAPI(
		string $itemToUnlock,
		string $lockOwner,
		string $itemToUseLockOf
	) {
		$user = $this->featureContext->getLastCreatedPublicShareToken();
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user,
			$itemToUnlock,
			$lockOwner,
			$itemToUseLockOf,
			true
		);
	}

	/**
	 * @When the public unlocks file/folder :itemToUnlock using the WebDAV API
	 *
	 * @param string $itemToUnlock
	 *
	 * @return void
	 */
	public function unlockItemAsPublicUsingWebDavAPI(string $itemToUnlock) {
		$user = $this->featureContext->getLastCreatedPublicShareToken();
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user,
			$itemToUnlock,
			$user,
			$itemToUnlock,
			true
		);
	}

	/**
	 * @When /^user "([^"]*)" moves (?:file|folder|entry) "([^"]*)" to "([^"]*)" sending the locktoken of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $fileDestination
	 * @param string $itemToUseLockOf
	 *
	 * @return void
	 */
	public function moveItemSendingLockToken(
		string $user,
		string $fileSource,
		string $fileDestination,
		string $itemToUseLockOf
	) {
		$this->moveItemSendingLockTokenOfUser(
			$user,
			$fileSource,
			$fileDestination,
			$itemToUseLockOf,
			$user
		);
	}

	/**
	 * @When /^user "([^"]*)" moves (?:file|folder|entry) "([^"]*)" to "([^"]*)" sending the locktoken of (?:file|folder|entry) "([^"]*)" of user "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $fileDestination
	 * @param string $itemToUseLockOf
	 * @param string $lockOwner
	 *
	 * @return void
	 */
	public function moveItemSendingLockTokenOfUser(
		string $user,
		string $fileSource,
		string $fileDestination,
		string $itemToUseLockOf,
		string $lockOwner
	) {
		$user = $this->featureContext->getActualUsername($user);
		$lockOwner = $this->featureContext->getActualUsername($lockOwner);
		$destination = $this->featureContext->destinationHeaderValue(
			$user,
			$fileDestination
		);
		$token = $this->tokenOfLastLock[$lockOwner][$itemToUseLockOf];
		$headers = [
			"Destination" => $destination,
			"If" => "(<$token>)"
		];
		try {
			$response = $this->featureContext->makeDavRequest(
				$user,
				"MOVE",
				$fileSource,
				$headers
			);
			$this->featureContext->setResponse($response);
		} catch (ConnectException $e) {
		}
	}

	/**
	 * @When /^user "([^"]*)" uploads file with content "([^"]*)" to "([^"]*)" sending the locktoken of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $content
	 * @param string $destination
	 * @param string $itemToUseLockOf
	 *
	 * @return void
	 */
	public function userUploadsAFileWithContentTo(
		string $user,
		string $content,
		string $destination,
		string $itemToUseLockOf
	) {
		$user = $this->featureContext->getActualUsername($user);
		$token = $this->tokenOfLastLock[$user][$itemToUseLockOf];
		$this->featureContext->pauseUploadDelete();
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PUT",
			$destination,
			["If" => "(<$token>)"],
			$content
		);
		$this->featureContext->setResponse($response);
		$this->featureContext->setLastUploadDeleteTime(\time());
	}

	/**
	 * @When /^the public uploads file "([^"]*)" with content "([^"]*)" sending the locktoken of file "([^"]*)" of user "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $filename
	 * @param string $content
	 * @param string $itemToUseLockOf
	 * @param string $lockOwner
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 *
	 */
	public function publicUploadFileSendingLockTokenOfUser(
		string $filename,
		string $content,
		string $itemToUseLockOf,
		string $lockOwner,
		string $publicWebDAVAPIVersion
	) {
		$lockOwner = $this->featureContext->getActualUsername($lockOwner);
		$headers = [
			"If" => "(<" . $this->tokenOfLastLock[$lockOwner][$itemToUseLockOf] . ">)"
		];
		$this->publicWebDavContext->publicUploadContent(
			$filename,
			'',
			$content,
			false,
			$headers,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public uploads file "([^"]*)" with content "([^"]*)" sending the locktoken of "([^"]*)" of the public using the (old|new) public WebDAV API$/
	 *
	 * @param string $filename
	 * @param string $content
	 * @param string $itemToUseLockOf
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publicUploadFileSendingLockTokenOfPublic(
		string $filename,
		string $content,
		string $itemToUseLockOf,
		string $publicWebDAVAPIVersion
	) {
		$lockOwner = $this->featureContext->getLastCreatedPublicShareToken();
		$this->publicUploadFileSendingLockTokenOfUser(
			$filename,
			$content,
			$itemToUseLockOf,
			$lockOwner,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @Then :count locks should be reported for file/folder :file of user :user by the WebDAV API
	 *
	 * @param int $count
	 * @param string $file
	 * @param string $user
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function numberOfLockShouldBeReported(int $count, string $file, string $user) {
		$lockCount = $this->countLockOfResources($user, $file);
		Assert::assertEquals(
			$count,
			$lockCount,
			"Expected $count lock(s) for '$file' but found '$lockCount'"
		);
	}

	/**
	 * @Then group :expectedGroup should exist as a lock breaker group
	 *
	 * @param string $expectedGroup
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function groupShouldExistAsLockBreakerGroups(string $expectedGroup) {
		$baseUrl = $this->featureContext->getBaseUrl();
		$admin = $this->featureContext->getAdminUsername();
		$password = $this->featureContext->getAdminPassword();
		$ocsApiVersion = $this->featureContext->getOcsApiVersion();

		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$admin,
			$password,
			'GET',
			"/apps/testing/api/v1/app/core/lock-breaker-groups",
			(string) $ocsApiVersion
		);

		$responseXml = HttpRequestHelper::getResponseXml($response, __METHOD__)->data->element;
		$lockbreakergroup = trim(\json_decode(\json_encode($responseXml), true)['value'], '\'[]"');
		$actualgroup = explode("\",\"", $lockbreakergroup);
		if (!\in_array($expectedGroup, $actualgroup)) {
			Assert::fail("could not find group '$expectedGroup' in lock breakers group");
		}
	}

	/**
	 * @Then following groups should exist as lock breaker groups
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function followingGroupShouldExistAsLockBreakerGroups(TableNode $table) {
		$this->featureContext->verifyTableNodeColumns($table, ["groups"]);
		$paths = $table->getHash();

		foreach ($paths as $group) {
			$this->groupShouldExistAsLockBreakerGroups($group["groups"]);
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
		$this->publicWebDavContext = $environment->getContext('PublicWebDavContext');
	}
}
