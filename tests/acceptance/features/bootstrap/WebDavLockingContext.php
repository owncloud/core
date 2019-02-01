<?php
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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Exception\ConnectException;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * context containing API steps needed for the locking mechanism of webdav
 */
class WebDavLockingContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var PublicWebDavContext
	 */
	private $publicWebDavContext;

	/**
	 *
	 * @var string[][]
	 */
	private $tokenOfLastLock = [];

	/**
	 * @When user :user locks file/folder :file using the WebDAV API setting following properties
	 * @Given user :user has locked file/folder :file setting following properties
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $properties table with no heading with | property | value |
	 * @param boolean $public if the file is in a public share or not
	 * @param boolean $expectToSucceed
	 *
	 * @return void
	 */
	public function lockFileUsingWebDavAPI(
		$user, $file, TableNode $properties, $public = false,
		$expectToSucceed = true
	) {
		$baseUrl = $this->featureContext->getBaseUrl();
		if ($public === true) {
			$type = "public-files";
			$password = null;
		} else {
			$type = "files";
			$password = $this->featureContext->getPasswordForUser($user);
		}
		$body
			= "<?xml version='1.0' encoding='UTF-8'?>" .
			"<d:lockinfo xmlns:d='DAV:'> ";
		$headers = [];
		$propertiesRows = $properties->getRows();
		foreach ($propertiesRows as $property) {
			if ($property[0] === "depth" || $property[0] === "timeout") {
				//properties that are set in the header not in the xml
				$headers[$property[0]] = $property[1];
			} else {
				$body .= "<d:$property[0]><d:$property[1]/></d:$property[0]>";
			}
		}
		
		$body .= "</d:lockinfo>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl, $user, $password, "LOCK", $file, $headers, $body, null,
			$this->featureContext->getDavPathVersion(), $type
		);
		
		$this->featureContext->setResponse($response);
		$responseXml = $this->featureContext->getResponseXml();
		$this->featureContext->setResponseXmlObject($responseXml);
		$responseXml->registerXPathNamespace('d', 'DAV:');
		$xmlPart = $responseXml->xpath("//d:locktoken/d:href");
		if (isset($xmlPart[0])) {
			$this->tokenOfLastLock[$user][$file] = (string)$xmlPart[0];
		} else {
			if ($expectToSucceed === true) {
				PHPUnit_Framework_Assert::fail("could not find lock tocken");
			}
		}
	}

	/**
	 * @Given the public has locked the last public shared file/folder setting following properties
	 *
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicHasLockedLastSharedFile(TableNode $properties) {
		$this->lockFileUsingWebDavAPI(
			(string)$this->featureContext->getLastShareData()->data->token,
			"/", $properties, true
		);
	}

	/**
	 * @When the public locks the last public shared file/folder using the WebDAV API setting following properties
	 *
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicLocksLastSharedFile(TableNode $properties) {
		$this->lockFileUsingWebDavAPI(
			(string)$this->featureContext->getLastShareData()->data->token,
			"/", $properties, true, false
		);
	}

	/**
	 * @Given the public has locked :file in the last public shared folder setting following properties
	 *
	 * @param string $file
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicHasLockedFileLastSharedFolder(
		$file, TableNode $properties
	) {
		$this->lockFileUsingWebDavAPI(
			(string)$this->featureContext->getLastShareData()->data->token,
			$file, $properties, true
		);
	}

	/**
	 * @When the public locks :file in the last public shared folder using the WebDAV API setting following properties
	 *
	 * @param string $file
	 * @param TableNode $properties
	 *
	 * @return void
	 */
	public function publicLocksFileLastSharedFolder($file, TableNode $properties) {
		$this->lockFileUsingWebDavAPI(
			(string)$this->featureContext->getLastShareData()->data->token,
			$file, $properties, true, false
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
	public function unlockLastLockUsingWebDavAPI($user, $file) {
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user, $file, $user, $file
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
		$user, $itemToUnlock, $itemToUseLockOf
	) {
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user, $itemToUnlock, $user, $itemToUseLockOf
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
		$user, $itemToUnlock, $itemToUseLockOf
	) {
		$lockOwner = (string)$this->featureContext->getLastShareData()->data->token;
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user, $itemToUnlock, $lockOwner, $itemToUseLockOf
		);
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
		$user, $itemToUnlock, $lockOwner, $itemToUseLockOf, $public = false
	) {
		if ($public === true) {
			$type = "public-files";
			$password = null;
		} else {
			$type = "files";
			$password = $this->featureContext->getPasswordForUser($user);
		}
		$baseUrl = $this->featureContext->getBaseUrl();
		$headers = [
			"Lock-Token" => $this->tokenOfLastLock[$lockOwner][$itemToUseLockOf]
		];
		$this->featureContext->setResponse(
			WebDavHelper::makeDavRequest(
				$baseUrl, $user, $password, "UNLOCK", $itemToUnlock, $headers,
				null, null, $this->featureContext->getDavPathVersion(), $type
			)
		);
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
		$itemToUnlock, $lockOwner, $itemToUseLockOf
	) {
		$user = (string)$this->featureContext->getLastShareData()->data->token;
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user, $itemToUnlock, $lockOwner, $itemToUseLockOf, true
		);
	}

	/**
	 * @When the public unlocks file/folder :itemToUnlock using the WebDAV API
	 *
	 * @param string $itemToUnlock
	 *
	 * @return void
	 */
	public function unlockItemAsPublicUsingWebDavAPI($itemToUnlock) {
		$user = (string)$this->featureContext->getLastShareData()->data->token;
		$this->unlockItemWithLastLockOfUserAndItemUsingWebDavAPI(
			$user, $itemToUnlock, $user, $itemToUnlock, true
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
		$user, $fileSource, $fileDestination, $itemToUseLockOf
	) {
		$this->moveItemSendingLockTokenOfUser(
			$user, $fileSource, $fileDestination, $itemToUseLockOf, $user
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
		$user, $fileSource, $fileDestination, $itemToUseLockOf, $lockOwner
	) {
		$destination = $this->featureContext->destinationHeaderValue(
			$user, $fileDestination
		);
		$token = $this->tokenOfLastLock[$lockOwner][$itemToUseLockOf];
		$headers = [
			"Destination" => $destination,
			"If" => "(<$token>)"
		];
		try {
			$response = $this->featureContext->makeDavRequest(
				$user, "MOVE", $fileSource, $headers
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
	 * @return string
	 */
	public function userUploadsAFileWithContentTo(
		$user, $content, $destination, $itemToUseLockOf
	) {
		$token = $this->tokenOfLastLock[$user][$itemToUseLockOf];
		$this->featureContext->pauseUploadDelete();
		$response = $this->featureContext->makeDavRequest(
			$user, "PUT", $destination, ["If" => "(<$token>)"], $content
		);
		$this->featureContext->setResponse($response);
		$this->featureContext->setLastUploadDeleteTime(\time());
	}

	/**
	 * @When the public uploads file :filename with content :content sending the locktoken of file :itemToUseLockOf of user :lockOwner using the public WebDAV API
	 *
	 * @param string $filename
	 * @param string $content
	 * @param string $itemToUseLockOf
	 * @param string $lockOwner
	 *
	 * @return void
	 *
	 */
	public function publicUploadFileSendingLockTokenOfUser(
		$filename, $content, $itemToUseLockOf, $lockOwner
	) {
		$headers = [
			"If" => "(<" . $this->tokenOfLastLock[$lockOwner][$itemToUseLockOf] . ">)"
		];
		$this->publicWebDavContext->publicUploadContent(
			$filename, '', $content, false, $headers
		);
	}

	/**
	 * @When the public uploads file :filename with content :content sending the locktoken of :itemToUseLockOf of the public using the public WebDAV API
	 *
	 * @param string $filename
	 * @param string $content
	 * @param string $itemToUseLockOf
	 *
	 * @return void
	 */
	public function publicUploadFileSendingLockTokenOfPublic(
		$filename, $content, $itemToUseLockOf
	) {
		$lockOwner = (string)$this->featureContext->getLastShareData()->data->token;
		$this->publicUploadFileSendingLockTokenOfUser(
			$filename, $content, $itemToUseLockOf, $lockOwner
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
	 */
	public function numberOfLockShouldBeReported($count, $file, $user) {
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);
		$body
			= "<?xml version='1.0' encoding='UTF-8'?>" .
			"<d:propfind xmlns:d='DAV:'> " .
			"<d:prop><d:lockdiscovery/></d:prop>" .
			"</d:propfind>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl, $user, $password, "PROPFIND", $file, null, $body, null,
			$this->featureContext->getDavPathVersion()
		);
		$responseXml = $this->featureContext->getResponseXml($response);
		$responseXml->registerXPathNamespace('d', 'DAV:');
		$xmlPart = $responseXml->xpath("//d:response//d:lockdiscovery/d:activelock");
		PHPUnit_Framework_Assert::assertCount(
			(int)$count, $xmlPart,
			"expected $count lock(s) for '$file' but found " . \count($xmlPart)
		);
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
