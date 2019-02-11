<?php
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
	 * @Given /^user "([^"]*)" has commented with content "([^"]*)" on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $content
	 * @param string $path
	 *
	 * @return void
	 */
	public function userCommentsWithContentOnEntry($user, $content, $path) {
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$this->lastFileId = $fileId;
		$commentsPath = "/comments/files/$fileId/";
		$response = $this->featureContext->makeDavRequest(
			$user,
			"POST",
			$commentsPath,
			['Content-Type' => 'application/json'],
			null,
			"uploads",
			'{"actorId":"user0",
			"actorDisplayName":"user0",
			"actorType":"users",
			"verb":"comment",
			"message":"' . $content . '",
			"creationDateTime":"Thu, 18 Feb 2016 17:04:18 GMT",
			"objectType":"files"}'
		);
		$this->featureContext->setResponse($response);
		$responseHeaders =  $response->getHeaders();
		if (isset($responseHeaders['Content-Location'][0])) {
			$commentUrl = $responseHeaders['Content-Location'][0];
			$this->lastCommentId = \substr(
				$commentUrl, \strrpos($commentUrl, '/') + 1
			);
		}
	}

	/**
	 * @When /^the user comments with content "([^"]*)" on (?:file|folder) "([^"]*)" using the WebDAV API$/
	 * @Given /^the user has commented with content "([^"]*)" on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $content
	 * @param string $path
	 *
	 * @return void
	 */
	public function theUserCommentsWithContentOnEntry($content, $path) {
		$this->userCommentsWithContentOnEntry(
			$this->featureContext->getCurrentUser(), $content, $path
		);
	}

	/**
	 * @Then /^user "([^"]*)" should have the following comments on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode $expectedElements
	 *
	 * @return void
	 */
	public function checkComments($user, $path, $expectedElements) {
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		$properties = '<oc:limit>200</oc:limit><oc:offset>0</oc:offset>';
		$elementList = $this->reportElementComments(
			$user, $commentsPath, $properties
		);

		$elementRows = $expectedElements->getRows();
		foreach ($elementRows as $expectedElement) {
			$commentFound = false;
			$properties = $elementList->xpath(
				"//d:prop"
			);
			foreach ($properties as $property) {
				$actorIdXml = $property->xpath("//oc:actorId[text() = '$expectedElement[0]']");
				$messageXml = $property->xpath("//oc:message[text() = '$expectedElement[1]']");
				
				if (isset($actorIdXml[0], $messageXml[0])) {
					$commentFound = true;
					break;
				}
			}
			PHPUnit_Framework_Assert::assertTrue(
				$commentFound,
				"Comment with actorId = '$expectedElement[0]' " .
				"and message = '$expectedElement[1]' not found"
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
	 */
	public function checkCommentForCurrentUser($path, $expectedElements) {
		$this->checkComments(
			$this->featureContext->getCurrentUser(), $path, $expectedElements
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
	public function checkNumberOfComments($user, $numberOfComments, $path) {
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		$properties = '<oc:limit>200</oc:limit><oc:offset>0</oc:offset>';
		$elementList = $this->reportElementComments(
			$user, $commentsPath, $properties
		);
		$messages = $elementList->xpath("//d:prop/oc:message");
		PHPUnit_Framework_Assert::assertCount(
			(int) $numberOfComments, $messages
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
	public function checkNumberOfCommentsForCurrentUser($numberOfComments, $path) {
		$this->checkNumberOfComments(
			$this->featureContext->getCurrentUser(), $numberOfComments, $path
		);
	}

	/**
	 * @param string $user
	 * @param string $fileId
	 * @param string $commentId
	 *
	 * @return void
	 */
	public function deleteComment($user, $fileId, $commentId) {
		$commentsPath = "/comments/files/$fileId/$commentId";
		$response = $this->featureContext->makeDavRequest(
			$user,
			"DELETE",
			$commentsPath,
			[],
			null,
			"uploads",
			null
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When user :user deletes the last created comment using the WebDAV API
	 * @When the user deletes the last created comment using the WebDAV API
	 * @Given user :user has deleted the last created comment
	 * @Given the user has deleted the last created comment
	 *
	 * @param string $user | null
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userDeletesLastComment($user=null) {
		if ($user === null) {
			$user = $this->featureContext->getCurrentUser();
		}
		$this->deleteComment($user, $this->lastFileId, $this->lastCommentId);
	}

	/**
	 * @Then the response should contain a property :key with value :value
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainAPropertyWithValue($key, $value) {
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
		if ($found === false) {
			throw new \Exception("Cannot find property $key with $value");
		}
	}

	/**
	 * @Then the response should contain only :number comments
	 *
	 * @param int $number
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainOnlyComments($number) {
		$response = $this->featureContext->getResponse();
		if (\count($response) !== (int)$number) {
			throw new \Exception(
				"Found more comments than $number (" . \count($response) . ")"
			);
		}
	}

	/**
	 * @param string $user
	 * @param string $content
	 * @param string $fileId
	 * @param string $commentId
	 *
	 * @return void
	 */
	public function editAComment($user, $content, $fileId, $commentId) {
		$commentsPath = "/comments/files/$fileId/$commentId";
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PROPPATCH",
			$commentsPath,
			[],
			null,
			"uploads",
			'<?xml version="1.0"?>
				<d:propertyupdate  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
					<d:set>
						<d:prop>
							<oc:message>' . \htmlspecialchars($content, ENT_XML1, 'UTF-8') . '</oc:message>
						</d:prop>
					</d:set>
				</d:propertyupdate>'
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When /^user "([^"]*)" edits the last created comment with content "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has edited the last created comment with content "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $content
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function userEditsLastCreatedComment($user, $content) {
		$this->editAComment(
			$user, $content, $this->lastFileId, $this->lastCommentId
		);
	}

	/**
	 * @When /^the user edits the last created comment with content "([^"]*)" using the WebDAV API$/
	 * @Given /^the user has edited the last created comment with content "([^"]*)"$/
	 *
	 * @param string $content
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserEditsLastCreatedComment($content) {
		$this->editAComment(
			$this->featureContext->getCurrentUser(),
			$content,
			$this->lastFileId,
			$this->lastCommentId
		);
	}

	/**
	 * Returns the elements of a report command special for comments
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $properties properties which needs to be included in the report
	 *
	 * @return SimpleXMLElement
	 *
	 */
	public function reportElementComments($user, $path, $properties) {
		$body = '<?xml version="1.0" encoding="utf-8" ?>
							 <oc:filter-comments xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns" >
									' . $properties . '
							 </oc:filter-comments>';
		$user = $this->featureContext->getActualUsername($user);
		$response = WebDavHelper::makeDavRequest(
			$this->featureContext->getBaseUrl(), $user,
			$this->featureContext->getPasswordForUser($user), 'REPORT', $path, [],
			$body, null, $this->featureContext->getDavPathVersion(), "comments"
		);
		return HttpRequestHelper::getResponseXml($response);
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
