<?php declare(strict_types=1);
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use TestHelpers\WebDavHelper;
use TestHelpers\HttpRequestHelper;

require_once 'bootstrap.php';

/**
 * Comments functions
 */
class CommentsContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @var int
	 */
	private $lastCommentId;
	/**
	 * @var int
	 */
	private $lastFileId;

	/**
	 * @When /^user "([^"]*)" comments with content "([^"]*)" on (?:file|folder) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $content
	 * @param string $path
	 *
	 * @return void
	 */
	public function userCommentsWithContentOnEntry(string $user, string $content, string $path):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$this->lastFileId = $fileId;
		$commentsPath = "/comments/files/$fileId/";
		$response = $this->featureContext->makeDavRequest(
			$user,
			"POST",
			$commentsPath,
			['Content-Type' => 'application/json'],
			'{"actorType":"users",
			"verb":"comment",
			"message":"' . $content . '"}',
			"comments"
		);
		$this->featureContext->setResponse($response);
		$responseHeaders = $response->getHeaders();
		if (isset($responseHeaders['Content-Location'][0])) {
			$commentUrl = $responseHeaders['Content-Location'][0];
			$this->lastCommentId = \substr(
				$commentUrl,
				\strrpos($commentUrl, '/') + 1
			);
		}
	}

	/**
	 * @Given /^user "([^"]*)" has commented with content "([^"]*)" on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $content
	 * @param string $path
	 *
	 * @return void
	 */
	public function userHasCommentedWithContentOnEntry(string $user, string $content, string $path):void {
		$this->userCommentsWithContentOnEntry($user, $content, $path);
		$this->featureContext->theHTTPStatusCodeShouldBe("201");
	}

	/**
	 * @When /^the user comments with content "([^"]*)" on (?:file|folder) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $content
	 * @param string $path
	 *
	 * @return void
	 */
	public function theUserCommentsWithContentOnEntry(string $content, string $path):void {
		$this->userCommentsWithContentOnEntry(
			$this->featureContext->getCurrentUser(),
			$content,
			$path
		);
	}

	/**
	 * @Given /^the user has commented with content "([^"]*)" on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $content
	 * @param string $path
	 *
	 * @return void
	 */
	public function theUserHasCommentedWithContentOnEntry(string $content, string $path):void {
		$this->theUserCommentsWithContentOnEntry($content, $path);
		$this->featureContext->theHTTPStatusCodeShouldBe("201");
	}

	/**
	 * @Then /^user "([^"]*)" should have the following comments on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode $expectedElements
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkComments(string $user, string $path, TableNode $expectedElements):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		// limiting number of results and start from first (offset)
		$properties = '<oc:limit>200</oc:limit><oc:offset>0</oc:offset>';
		$elementList = $this->reportElementComments(
			$user,
			$commentsPath,
			$properties,
			__METHOD__
		);

		$this->featureContext->verifyTableNodeColumns($expectedElements, ['user', 'comment']);
		$elementRows = $expectedElements->getColumnsHash();
		foreach ($elementRows as $expectedElement) {
			$expectedElement['user'] = $this->featureContext->getActualUsername($expectedElement['user']);
			$commentFound = false;
			$properties = $elementList->xpath(
				"//d:prop"
			);
			foreach ($properties as $property) {
				$actorIdXml = $property->xpath("//oc:actorId[text() = '{$expectedElement['user']}']");
				$messageXml = $property->xpath("//oc:message[text() = '{$expectedElement['comment']}']");

				if (isset($actorIdXml[0], $messageXml[0])) {
					$commentFound = true;
					break;
				}
			}
			Assert::assertTrue(
				$commentFound,
				"Comment with actorId = '{$expectedElement['user']}' " .
				"and message = '{$expectedElement['comment']}' not found"
			);
		}
	}

	/**
	 * @Then /^the user should have the following comments on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $path
	 * @param TableNode $expectedElements
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkCommentForCurrentUser(string $path, TableNode $expectedElements):void {
		$this->checkComments(
			$this->featureContext->getCurrentUser(),
			$path,
			$expectedElements
		);
	}

	/**
	 * @Then /^user "([^"]*)" should have (\d+) comments on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $numberOfComments
	 * @param string $path
	 *
	 * @return void
	 */
	public function checkNumberOfComments(string $user, string $numberOfComments, string $path):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		$properties = '<oc:limit>200</oc:limit><oc:offset>0</oc:offset>';
		$elementList = $this->reportElementComments(
			$user,
			$commentsPath,
			$properties,
			__METHOD__
		);
		$messages = $elementList->xpath("//d:prop/oc:message");
		Assert::assertCount(
			(int) $numberOfComments,
			$messages,
			"Expected: {$user} should have {$numberOfComments} on {$path} but got "
			. \count($messages)
		);
	}

	/**
	 * @Then /^the user should have (\d+) comments on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $numberOfComments
	 * @param string $path
	 *
	 * @return void
	 */
	public function checkNumberOfCommentsForCurrentUser(string $numberOfComments, string $path):void {
		$this->checkNumberOfComments(
			$this->featureContext->getCurrentUser(),
			$numberOfComments,
			$path
		);
	}

	/**
	 * @param string $user
	 * @param string $fileId
	 * @param string $commentId
	 *
	 * @return void
	 */
	public function deleteComment(string $user, string $fileId, string $commentId):void {
		$commentsPath = "/comments/files/$fileId/$commentId";
		$response = $this->featureContext->makeDavRequest(
			$user,
			"DELETE",
			$commentsPath,
			[],
			null,
			"uploads"
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When user :user deletes the last created comment using the WebDAV API
	 * @When the user deletes the last created comment using the WebDAV API
	 *
	 * @param string|null $user | null
	 *
	 * @return void
	 */
	public function userDeletesLastComment(?string $user = null):void {
		if ($user === null) {
			$user = $this->featureContext->getCurrentUser();
		}
		$user = $this->featureContext->getActualUsername($user);
		$this->deleteComment($user, (string)$this->lastFileId, (string)$this->lastCommentId);
	}

	/**
	 * @Given user :user has deleted the last created comment
	 * @Given the user has deleted the last created comment
	 *
	 * @param string|null $user | null
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasDeletedLastComment(string $user = null):void {
		$this->userDeletesLastComment($user);
		$this->featureContext->theHTTPStatusCodeShouldBe("204");
	}

	/**
	 * @Then the response should contain a property :key with value :value
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theResponseShouldContainAPropertyWithValue(string $key, string $value):void {
		$response = $this->featureContext->getResponse();
		$keys = $response[0]['value'][2]['value'][0]['value'];
		$found = false;
		foreach ($keys as $singleKey) {
			if ($singleKey['name'] === '{http://owncloud.org/ns}' . \substr($key, 3)) {
				if ($singleKey['value'] === $value) {
					$found = true;
				}
			}
		}
		Assert::assertTrue(
			$found,
			"The response does not contain a property {$key} with value {$value}"
		);
	}

	/**
	 * @Then the response should contain only :number comments
	 *
	 * @param int $number
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theResponseShouldContainOnlyComments(int $number):void {
		$response = $this->featureContext->getResponse();
		Assert::assertEquals(
			(int) $number,
			\count($response),
			"Expected: the response should contain {$number} comments but got "
			. \count($response)
		);
	}

	/**
	 * @param string $user
	 * @param string $content
	 * @param string $fileId
	 * @param string $commentId
	 *
	 * @return void
	 */
	public function editAComment(string $user, string $content, string $fileId, string $commentId):void {
		$user = $this->featureContext->getActualUsername($user);
		$commentsPath = "/comments/files/$fileId/$commentId";
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PROPPATCH",
			$commentsPath,
			[],
			'<?xml version="1.0"?>
				<d:propertyupdate  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
					<d:set>
						<d:prop>
							<oc:message>' . \htmlspecialchars($content, ENT_XML1, 'UTF-8') . '</oc:message>
						</d:prop>
					</d:set>
				</d:propertyupdate>',
			"uploads"
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When /^user "([^"]*)" edits the last created comment with content "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userEditsLastCreatedComment(string $user, string $content):void {
		$this->editAComment(
			$user,
			$content,
			(string)$this->lastFileId,
			(string)$this->lastCommentId
		);
	}

	/**
	 * @Given /^user "([^"]*)" has edited the last created comment with content "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasEditedLastCreatedComment(string $user, string $content):void {
		$this->userEditsLastCreatedComment($user, $content);
		$this->featureContext->theHTTPStatusCodeShouldBe("207");
	}

	/**
	 * @When /^the user edits the last created comment with content "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserEditsLastCreatedComment(string $content):void {
		$this->editAComment(
			$this->featureContext->getCurrentUser(),
			$content,
			(string)$this->lastFileId,
			(string)$this->lastCommentId
		);
	}

	/**
	 * @Given /^the user has edited the last created comment with content "([^"]*)"$/
	 *
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasEditedLastCreatedComment(string $content):void {
		$this->theUserEditsLastCreatedComment($content);
		$this->featureContext->theHTTPStatusCodeShouldBe("207");
	}

	/**
	 * Returns the elements of a report command special for comments
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $properties properties which needs to be included in the report
	 * @param string|null $exceptionText text to put at the front of exception messages
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public function reportElementComments(string $user, string $path, string $properties, ?string $exceptionText = ''):SimpleXMLElement {
		$body = '<?xml version="1.0" encoding="utf-8" ?>
							 <oc:filter-comments xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns" >
									' . $properties . '
							 </oc:filter-comments>';
		$user = $this->featureContext->getActualUsername($user);
		$response = WebDavHelper::makeDavRequest(
			$this->featureContext->getBaseUrl(),
			$user,
			$this->featureContext->getPasswordForUser($user),
			'REPORT',
			$path,
			[],
			$this->featureContext->getStepLineRef(),
			$body,
			$this->featureContext->getDavPathVersion(),
			"comments"
		);
		return HttpRequestHelper::getResponseXml($response, $exceptionText);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param string|null $exceptionText text to put at the front of exception messages
	 *
	 * @return void
	 * @throws Exception
	 */
	public function getAllInfoOfCommentsOfFolderUsingTheWebdavReportApi(string $user, string $path, ?string $exceptionText = '') {
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		$this->featureContext->setResponseXmlObject(
			$this->reportElementComments(
				$user,
				$commentsPath,
				'<oc:limit>200</oc:limit><oc:offset>0</oc:offset>',
				$exceptionText
			)
		);
	}

	/**
	 * @When user :user gets all information about the comments on file :path using the WebDAV REPORT API
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsAllInfoOfCommentsOfFolderUsingTheWebdavReportApi(string $user, string $path):void {
		$this->getAllInfoOfCommentsOfFolderUsingTheWebdavReportApi(
			$user,
			$path,
			__METHOD__
		);
	}

	/**
	 * @When the user gets all information about the comments on file :path using the WebDAV REPORT API
	 *
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserGetsAllInfoOfCommentsOfFolderUsingTheWebdavReportApi(string $path):void {
		$this->getAllInfoOfCommentsOfFolderUsingTheWebdavReportApi(
			$this->featureContext->getCurrentUser(),
			$path,
			__METHOD__
		);
	}

	/**
	 * @Then the following comment properties should be listed about user :user
	 *
	 * @param string $user
	 * @param TableNode $expectedProperties
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function followingPropertiesShouldBeListed(string $user, TableNode $expectedProperties):void {
		$this->featureContext->verifyTableNodeColumns(
			$expectedProperties,
			["propertyName", "propertyValue"]
		);
		$user = $this->featureContext->getActualUsername($user);
		$expectedProperties = $expectedProperties->getColumnsHash();
		Assert::assertGreaterThanOrEqual(1, \count($expectedProperties));
		$responseXmlObject = $this->featureContext->getResponseXmlObject();
		$responses = $responseXmlObject->xpath("//d:response");
		$found = false;
		$savedResponseXml = "UNKNOWN";
		foreach ($responses as $response) {
			foreach ($expectedProperties as $expectedProperty) {
				$expectedProperty['propertyValue'] = $this->featureContext->substituteInLineCodes(
					$expectedProperty['propertyValue'],
					$user
				);
				$xmlPart = $response->xpath(
					"//d:prop/oc:" . $expectedProperty["propertyName"]
				);
				if ((string)\end($xmlPart) !== $expectedProperty["propertyValue"]) {
					$found = false;
					break;
				} else {
					$found = true;
				}
			}
			if ($found) {
				break;
			}
			$savedResponseXml = $response->asXML();
		}
		Assert::assertTrue($found, "Could not find expected properties in response " . $savedResponseXml);
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
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
