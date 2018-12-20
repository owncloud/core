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
	 * @var string[][]
	 */
	private $tokenOfLastLock = [];

	/**
	 * @When the user :user locks file/folder :file using the WebDAV API setting following properties
	 * @Given the user :user has locked file/folder :file setting following properties
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $properties table with no heading with | property | value |
	 *
	 * @return void
	 */
	public function lockFileUsingWebDavAPI($user, $file, TableNode $properties) {
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);
		$body
			= "<?xml version='1.0' encoding='UTF-8'?>" .
			"<d:lockinfo xmlns:d='DAV:'> ";
		$headers = [];
		$propertiesRows = $properties->getRows();
		foreach ($propertiesRows as $property) {
			if ($property[0] === "depth") { //depth is set in the header not in the xml
				$headers["Depth"] = $property[1];
			} else {
				$body .= "<d:$property[0]><d:$property[1]/></d:$property[0]>";
			}
		}
		
		$body .= "</d:lockinfo>";
		$response = WebDavHelper::makeDavRequest(
			$baseUrl, $user, $password, "LOCK", $file, $headers, $body, null,
			$this->featureContext->getDavPathVersion()
		);
		$responseXml = $this->featureContext->getResponseXml($response);
		$responseXml->registerXPathNamespace('d', 'DAV:');
		$xmlPart = $responseXml->xpath("//d:locktoken/d:href");
		$this->tokenOfLastLock[$user][$file] = (string)$xmlPart[0];
	}

	/**
	 * @When the user :user unlocks the last created lock of file/folder :file using the WebDAV API
	 *
	 * @param string $user
	 * @param string $file
	 *
	 * @return void
	 */
	public function unlockLastLockUsingWebDavAPI($user, $file) {
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);
		$headers = ["Lock-Token" => $this->tokenOfLastLock[$user][$file]];
		WebDavHelper::makeDavRequest(
			$baseUrl, $user, $password, "UNLOCK", $file, $headers, null, null,
			$this->featureContext->getDavPathVersion()
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
	}
}
