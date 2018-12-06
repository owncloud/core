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

use Behat\Gherkin\Node\TableNode;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Comments functions
 */
trait Comments {

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
		$fileId = $this->getFileIdForPath($user, $path);
		$this->lastFileId = $fileId;
		$commentsPath = "/comments/files/$fileId/";
		$this->response = $this->makeDavRequest(
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
		$responseHeaders =  $this->response->getHeaders();
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
		$this->userCommentsWithContentOnEntry($this->getCurrentUser(), $content, $path);
	}

	/**
	 * @Then /^user "([^"]*)" should have the following comments on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode|null $expectedElements
	 *
	 * @return void
	 */
	public function checkComments($user, $path, $expectedElements) {
		$fileId = $this->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		$properties = '<oc:limit>200</oc:limit><oc:offset>0</oc:offset>';
		$elementList = $this->reportElementComments(
			$user, $commentsPath, $properties
		);

		if ($expectedElements instanceof TableNode) {
			$elementRows = $expectedElements->getRows();
			foreach ($elementRows as $expectedElement) {
				$commentFound = false;
				foreach ($elementList as $id => $answer) {
					if (($expectedElement[0] === $answer[200]['{http://owncloud.org/ns}actorId'])
						and ($expectedElement[1] === $answer[200]['{http://owncloud.org/ns}message'])
					) {
						$commentFound = true;
						break;
					}
				}
				PHPUnit_Framework_Assert::assertTrue(
					$commentFound, "Comment not found"
				);
			}
		}
	}

	/**
	 * @Then /^the user should have the following comments on (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $path
	 * @param TableNode|null $expectedElements
	 *
	 * @return void
	 */
	public function checkCommentForCurrentUser($path, $expectedElements) {
		$this->checkComments($this->getCurrentUser(), $path, $expectedElements);
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
		$fileId = $this->getFileIdForPath($user, $path);
		$commentsPath = "/comments/files/$fileId/";
		$properties = '<oc:limit>200</oc:limit><oc:offset>0</oc:offset>';
		$elementList = $this->reportElementComments(
			$user, $commentsPath, $properties
		);
		PHPUnit_Framework_Assert::assertCount(
			(int) $numberOfComments, $elementList
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
		$this->checkNumberOfComments($this->getCurrentUser(), $numberOfComments, $path);
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
		$this->response = $this->makeDavRequest(
			$user,
			"DELETE",
			$commentsPath,
			[],
			null,
			"uploads",
			null
		);
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
			$user = $this->getCurrentUser();
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
		$keys = $this->response[0]['value'][2]['value'][0]['value'];
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
		if (\count($this->response) !== (int)$number) {
			throw new \Exception(
				"Found more comments than $number (" . \count($this->response) . ")"
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
		$this->response = $this->makeDavRequest(
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
			$this->getCurrentUser(), $content, $this->lastFileId, $this->lastCommentId
		);
	}

	/**
	 * Returns the elements of a report command special for comments
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $properties properties which needs to be included in the report
	 *
	 * @return array
	 *
	 * @throws Sabre\HTTP\ClientException, - in case a curl error occurred.
	 */
	public function reportElementComments($user, $path, $properties) {
		$client = $this->getSabreClient($user);
		
		$body = '<?xml version="1.0" encoding="utf-8" ?>
							 <oc:filter-comments xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns" >
									' . $properties . '
							 </oc:filter-comments>';
		
		$response = $client->request(
			'REPORT', $this->makeSabrePathNotForFiles($path), $body
		);
		$parsedResponse = $client->parseMultistatus($response['body']);
		return $parsedResponse;
	}
}
