<?php declare(strict_types=1);
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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
use Psr\Http\Message\ResponseInterface;
use TestHelpers\HttpRequestHelper;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * Trashbin context
 */
class TrashbinContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var OccContext
	 */
	private $occContext;

	/**
	 * @When user :user empties the trashbin using the trashbin API
	 *
	 * @param string|null $user user
	 *
	 * @return ResponseInterface
	 */
	public function emptyTrashbin(?string $user):ResponseInterface {
		$user = $this->featureContext->getActualUsername($user);
		$davPathVersion = $this->featureContext->getDavPathVersion();
		$response = WebDavHelper::makeDavRequest(
			$this->featureContext->getBaseUrl(),
			$user,
			$this->featureContext->getPasswordForUser($user),
			'DELETE',
			null,
			[],
			$this->featureContext->getStepLineRef(),
			null,
			$davPathVersion,
			'trash-bin'
		);

		$this->featureContext->setResponse($response);
		return $response;
	}

	/**
	 * @Given user :user has emptied the trashbin
	 *
	 * @param string $user user
	 *
	 * @return void
	 */
	public function userHasEmptiedTrashbin(string $user):void {
		$response = $this->emptyTrashbin($user);

		Assert::assertEquals(
			204,
			$response->getStatusCode(),
			__METHOD__ . " Expected status code was '204' but got '" . $response->getStatusCode() . "'"
		);
	}

	/**
	 * Get files list from the response from trashbin api
	 *
	 * @param SimpleXMLElement|null $responseXml
	 *
	 * @return array
	 */
	public function getTrashbinContentFromResponseXml(?SimpleXMLElement $responseXml): array {
		$xmlElements = $responseXml->xpath('//d:response');
		$files = \array_map(
			static function (SimpleXMLElement $element) {
				$href = $element->xpath('./d:href')[0];

				$propStats = $element->xpath('./d:propstat');
				$successPropStat = \array_filter(
					$propStats,
					static function (SimpleXMLElement $propStat) {
						$status = $propStat->xpath('./d:status');
						return (string) $status[0] === 'HTTP/1.1 200 OK';
					}
				);
				if (isset($successPropStat[0])) {
					$successPropStat = $successPropStat[0];

					$name = $successPropStat->xpath('./d:prop/oc:trashbin-original-filename');
					$mtime = $successPropStat->xpath('./d:prop/oc:trashbin-delete-timestamp');
					$resourcetype = $successPropStat->xpath('./d:prop/d:resourcetype');
					if (\array_key_exists(0, $resourcetype) && ($resourcetype[0]->asXML() === "<d:resourcetype><d:collection/></d:resourcetype>")) {
						$collection[0] = true;
					} else {
						$collection[0] = false;
					}
					$originalLocation = $successPropStat->xpath('./d:prop/oc:trashbin-original-location');
				} else {
					$name = [];
					$mtime = [];
					$collection = [];
					$originalLocation = [];
				}

				return [
					'href' => (string) $href,
					'name' => isset($name[0]) ? (string) $name[0] : null,
					'mtime' => isset($mtime[0]) ? (string) $mtime[0] : null,
					'collection' => isset($collection[0]) ? $collection[0] : false,
					'original-location' => isset($originalLocation[0]) ? (string) $originalLocation[0] : null
				];
			},
			$xmlElements
		);

		return $files;
	}

	/**
	 * List the top of the trashbin folder for a user
	 *
	 * @param string|null $user user
	 * @param string $depth
	 *
	 * @return array response
	 * @throws Exception
	 */
	public function listTopOfTrashbinFolder(?string $user, string $depth = "infinity"):array {
		$password = $this->featureContext->getPasswordForUser($user);
		$davPathVersion = $this->featureContext->getDavPathVersion();
		$response = WebDavHelper::listFolder(
			$this->featureContext->getBaseUrl(),
			$user,
			$password,
			"",
			$depth,
			$this->featureContext->getStepLineRef(),
			[
				'oc:trashbin-original-filename',
				'oc:trashbin-original-location',
				'oc:trashbin-delete-timestamp',
				'd:getlastmodified'
			],
			'trash-bin',
			$davPathVersion
		);
		$this->featureContext->setResponse($response);
		$responseXml = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);

		$this->featureContext->setResponseXmlObject($responseXml);
		$files = $this->getTrashbinContentFromResponseXml($responseXml);
		// filter root element
		$files = \array_filter(
			$files,
			static function ($element) use ($user) {
				return ($element['href'] !== "/remote.php/dav/trash-bin/$user/");
			}
		);
		return $files;
	}

	/**
	 * List trashbin folder
	 *
	 * @param string|null $user user
	 * @param string $depth
	 *
	 * @return array of all the items in the trashbin of the user
	 * @throws Exception
	 */
	public function listTrashbinFolder(?string $user, string $depth = "1"):array {
		return $this->listTrashbinFolderCollection(
			$user,
			"",
			$depth
		);
	}

	/**
	 * List a collection in the trashbin
	 *
	 * @param string|null $user user
	 * @param string|null $collectionPath the string of ids of the folder and sub-folders
	 * @param string $depth
	 * @param int $level
	 *
	 * @return array response
	 * @throws Exception
	 */
	public function listTrashbinFolderCollection(?string $user, ?string $collectionPath = "", string $depth = "1", int $level = 1):array {
		// $collectionPath should be some list of file-ids like 2147497661/2147497662
		// or the empty string, which will list the whole trashbin from the top.
		$collectionPath = \trim($collectionPath, "/");
		$password = $this->featureContext->getPasswordForUser($user);
		$davPathVersion = $this->featureContext->getDavPathVersion();
		$response = WebDavHelper::listFolder(
			$this->featureContext->getBaseUrl(),
			$user,
			$password,
			$collectionPath,
			$depth,
			$this->featureContext->getStepLineRef(),
			[
				'oc:trashbin-original-filename',
				'oc:trashbin-original-location',
				'oc:trashbin-delete-timestamp',
				'd:resourcetype',
				'd:getlastmodified'
			],
			'trash-bin',
			$davPathVersion
		);
		$responseXml = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__ . " $collectionPath"
		);

		$files = $this->getTrashbinContentFromResponseXml($responseXml);
		// filter out the collection itself, we only want to return the members
		$files = \array_filter(
			$files,
			static function ($element) use ($user, $collectionPath) {
				$path = $collectionPath;
				if ($path !== "") {
					$path = $path . "/";
				}
				return ($element['href'] !== "/remote.php/dav/trash-bin/$user/$path");
			}
		);

		foreach ($files as $file) {
			// check for unexpected/invalid href values and fail early in order to
			// avoid "common" situations that could cause infinite recursion.
			$trashbinRef = $file["href"];
			$trimmedTrashbinRef = \trim($trashbinRef, "/");
			$expectedStart = "remote.php/dav/trash-bin/$user";
			$expectedStartLength = \strlen($expectedStart);
			if ((\substr($trimmedTrashbinRef, 0, $expectedStartLength) !== $expectedStart)
				|| (\strlen($trimmedTrashbinRef) === $expectedStartLength)
			) {
				// A top href (maybe without even the username) has been returned
				// in the response. That should never happen, or have been filtered out
				// by code above.
				throw new Exception(
					__METHOD__ . " Error: unexpected href in trashbin propfind at level $level: '$trashbinRef'"
				);
			}
			if ($file["collection"]) {
				$trimmedHref = \trim($trashbinRef, "/");
				$explodedHref = \explode("/", $trimmedHref);
				$trashbinId = $collectionPath . "/" . end($explodedHref);
				$nextFiles = $this->listTrashbinFolderCollection(
					$user,
					$trashbinId,
					$depth,
					$level + 1
				);
				// filter the collection element. We only want the members.
				$nextFiles = \array_filter(
					$nextFiles,
					static function ($element) use ($user, $trashbinRef) {
						return ($element['href'] !== $trashbinRef);
					}
				);
				\array_push($files, ...$nextFiles);
			}
		}
		return $files;
	}

	/**
	 * @When user :user lists the resources in the trashbin with depth :depth using the WebDAV API
	 *
	 * @param string $user
	 * @param string $depth
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsFilesInTheTrashbinWithDepthUsingTheWebdavApi(string $user, string $depth):void {
		$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		$this->listTopOfTrashbinFolder($user, $depth);
		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
	}

	/**
	 * @Then the trashbin DAV response should not contain these nodes
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTrashbinDavResponseShouldNotContainTheseNodes(TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ['name']);
		$responseXml = $this->featureContext->getResponseXmlObject();
		$files = $this->getTrashbinContentFromResponseXml($responseXml);

		foreach ($table->getHash() as $row) {
			$path = trim((string)$row['name'], "/");
			foreach ($files as $file) {
				if (trim((string)$file['original-location'], "/") === $path) {
					throw new Exception("file $path was not expected in trashbin response but was found");
				}
			}
		}
	}

	/**
	 * @Then the trashbin DAV response should contain these nodes
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTrashbinDavResponseShouldContainTheseNodes(TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ['name']);
		$responseXml = $this->featureContext->getResponseXmlObject();

		$files = $this->getTrashbinContentFromResponseXml($responseXml);

		foreach ($table->getHash() as $row) {
			$path = trim($row['name'], "/");
			$found = false;
			foreach ($files as $file) {
				if (trim((string)$file['original-location'], "/") === $path) {
					$found = true;
					break;
				}
			}
			if (!$found) {
				throw new Exception("file $path was expected in trashbin response but was not found");
			}
		}
	}

	/**
	 * Send a webdav request to list the trashbin content
	 *
	 * @param string $user user
	 * @param string|null $asUser - To send request as another user
	 * @param string|null $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function sendTrashbinListRequest(string $user, ?string $asUser = null, ?string $password = null):void {
		$asUser = $asUser ?? $user;
		$password = $password ?? $this->featureContext->getPasswordForUser($asUser);
		$davPathVersion = $this->featureContext->getDavPathVersion();
		$response = WebDavHelper::propfind(
			$this->featureContext->getBaseUrl(),
			$asUser,
			$password,
			null,
			[
				'oc:trashbin-original-filename',
				'oc:trashbin-original-location',
				'oc:trashbin-delete-timestamp',
				'd:getlastmodified'
			],
			$this->featureContext->getStepLineRef(),
			'1',
			'trash-bin',
			$davPathVersion,
			$user
		);
		$this->featureContext->setResponse($response);
		try {
			$responseXmlObject = HttpRequestHelper::getResponseXml(
				$response,
				__METHOD__
			);
			$this->featureContext->setResponseXmlObject($responseXmlObject);
		} catch (Exception $e) {
			$this->featureContext->clearResponseXmlObject();
		}
	}

	/**
	 * @When user :asUser tries to list the trashbin content for user :user
	 *
	 * @param string $asUser
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToListTheTrashbinContentForUser(string $asUser, string $user) {
		$user = $this->featureContext->getActualUsername($user);
		$asUser = $this->featureContext->getActualUsername($asUser);
		$this->sendTrashbinListRequest($user, $asUser);
	}

	/**
	 * @When user :asUser tries to list the trashbin content for user :user using password :password
	 *
	 * @param string $asUser
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToListTheTrashbinContentForUserUsingPassword(string $asUser, string $user, string $password):void {
		$this->sendTrashbinListRequest($user, $asUser, $password);
	}

	/**
	 * @Then the last webdav response should contain the following elements
	 *
	 * @param TableNode $elements
	 *
	 * @return void
	 */
	public function theLastWebdavResponseShouldContainFollowingElements(TableNode $elements):void {
		$files = $this->getTrashbinContentFromResponseXml($this->featureContext->getResponseXmlObject());
		if (!($elements instanceof TableNode)) {
			throw new InvalidArgumentException(
				'$expectedElements has to be an instance of TableNode'
			);
		}
		$elementRows = $elements->getHash();
		foreach ($elementRows as $expectedElement) {
			$found = false;
			$expectedPath = $expectedElement['path'];
			foreach ($files as $file) {
				if (\ltrim($expectedPath, "/") === \ltrim($file['original-location'], "/")) {
					$found = true;
					break;
				}
			}
			Assert::assertTrue($found, "$expectedPath expected to be listed in response but not found");
		}
	}

	/**
	 * @Then the last webdav response should not contain the following elements
	 *
	 * @param TableNode $elements
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLastWebdavResponseShouldNotContainFollowingElements(TableNode $elements):void {
		$files = $this->getTrashbinContentFromResponseXml($this->featureContext->getResponseXmlObject());

		// 'user' is also allowed in the table even though it is not used anywhere
		// This for better readability in feature files
		$this->featureContext->verifyTableNodeColumns($elements, ['path'], ['path', 'user']);
		$elementRows = $elements->getHash();
		foreach ($elementRows as $expectedElement) {
			$notFound = true;
			$expectedPath = "/" . \ltrim($expectedElement['path'], "/");
			foreach ($files as $file) {
				// Allow the table of expected elements to have entries that do
				// not have to specify the "implied" leading slash, or have multiple
				// leading slashes, to make scenario outlines more flexible
				if ($expectedPath === $file['original-location']) {
					$notFound = false;
				}
			}
			Assert::assertTrue($notFound, "$expectedPath expected not to be listed in response but found");
		}
	}

	/**
	 * @When user :asUser tries to delete the file with original path :path from the trashbin of user :user using the trashbin API
	 *
	 * @param string $asUser
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToDeleteFromTrashbinOfUser(string $asUser, string $path, string $user):void {
		$numItemsDeleted = $this->tryToDeleteFileFromTrashbin($user, $path, $asUser);
	}

	/**
	 * @When user :asUser tries to delete the file with original path :path from the trashbin of user :user using the password :password and the trashbin API
	 *
	 * @param string|null $asUser
	 * @param string|null $path
	 * @param string|null $user
	 * @param string|null $password
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function userTriesToDeleteFromTrashbinOfUserUsingPassword(?string $asUser, ?string $path, ?string $user, ?string $password):void {
		$user = $this->featureContext->getActualUsername($user);
		$asUser = $this->featureContext->getActualUsername($asUser);
		$numItemsDeleted = $this->tryToDeleteFileFromTrashbin($user, $path, $asUser, $password);
	}

	/**
	 * @When user :asUser tries to restore the file with original path :path from the trashbin of user :user using the trashbin API
	 *
	 * @param string|null $asUser
	 * @param string|null $path
	 * @param string|null $user
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function userTriesToRestoreFromTrashbinOfUser(?string $asUser, ?string $path, ?string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$asUser = $this->featureContext->getActualUsername($asUser);
		$this->restoreElement($user, $path, null, true, $asUser);
	}

	/**
	 * @When user :asUser tries to restore the file with original path :path from the trashbin of user :user using the password :password and the trashbin API
	 *
	 * @param string|null $asUser
	 * @param string|null $path
	 * @param string|null $user
	 * @param string|null $password
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function userTriesToRestoreFromTrashbinOfUserUsingPassword(?string $asUser, ?string $path, ?string $user, ?string $password):void {
		$asUser = $this->featureContext->getActualUsername($asUser);
		$user = $this->featureContext->getActualUsername($user);
		$this->restoreElement($user, $path, null, true, $asUser, $password);
	}

	/**
	 * converts the trashItemHRef from /<base>/remote.php/dav/trash-bin/<user>/<item_id>/ to /trash-bin/<user>/<item_id>
	 *
	 * @param string $href
	 *
	 * @return string
	 */
	private function convertTrashbinHref(string $href):string {
		$trashItemHRef = \trim($href, '/');
		$trashItemHRef = \strstr($trashItemHRef, '/trash-bin');
		$trashItemHRef = \trim($trashItemHRef, '/');
		$parts = \explode('/', $trashItemHRef);
		$decodedParts = \array_slice($parts, 2);
		return '/' . \join('/', $decodedParts);
	}

	/**
	 * @When /^user "([^"]*)" tries to delete the (?:file|folder|entry) with original path "([^"]*)" from the trashbin using the trashbin API$/
	 *
	 * @param string|null $user
	 * @param string|null $originalPath
	 * @param string|null $asUser
	 * @param string|null $password
	 *
	 * @return int the number of items that were matched and requested for delete
	 * @throws JsonException
	 * @throws Exception
	 */
	public function tryToDeleteFileFromTrashbin(?string $user, ?string $originalPath, ?string $asUser = null, ?string $password = null):int {
		$user = $this->featureContext->getActualUsername($user);
		$asUser = $asUser ?? $user;
		$listing = $this->listTrashbinFolder($user);
		$originalPath = \trim($originalPath, '/');
		$numItemsDeleted = 0;

		foreach ($listing as $entry) {
			if ($entry['original-location'] === $originalPath) {
				$trashItemHRef = $this->convertTrashbinHref($entry['href']);
				$response = $this->featureContext->makeDavRequest(
					$asUser,
					'DELETE',
					$trashItemHRef,
					[],
					null,
					'trash-bin',
					null,
					false,
					$password,
					[],
					$user
				);
				$this->featureContext->setResponse($response);
				$numItemsDeleted++;
			}
		}

		return $numItemsDeleted;
	}

	/**
	 * @When /^user "([^"]*)" deletes the (?:file|folder|entry) with original path "([^"]*)" from the trashbin using the trashbin API$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteFileFromTrashbin(string $user, string $originalPath):void {
		$numItemsDeleted = $this->tryToDeleteFileFromTrashbin($user, $originalPath);

		Assert::assertEquals(
			1,
			$numItemsDeleted,
			"Expected to delete exactly one item from the trashbin but $numItemsDeleted were deleted"
		);
		$this->featureContext->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^user "([^"]*)" deletes the following (?:files|folders|entries) with original path from the trashbin$/
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteFollowingFilesFromTrashbin(string $user, TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $path) {
			$this->deleteFileFromTrashbin($user, $path["path"]);

			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @Then /^as "([^"]*)" (?:file|folder|entry) "([^"]*)" should exist in the trashbin$/
	 *
	 * @param string|null $user
	 * @param string|null $path
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function asFileOrFolderExistsInTrash(?string $user, ?string $path):void {
		$user = $this->featureContext->getActualUsername($user);
		$path = \trim($path, '/');
		$sections = \explode('/', $path, 2);

		$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();

		$firstEntry = $this->findFirstTrashedEntry($user, \trim($sections[0], '/'));

		Assert::assertNotNull(
			$firstEntry,
			"The first trash entry was not found while looking for trashbin entry '$path' of user '$user'"
		);

		if (\count($sections) !== 1) {
			// TODO: handle deeper structures
			$listing = $this->listTrashbinFolderCollection($user, \basename(\rtrim($firstEntry['href'], '/')));
		}

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}

		// query was on the main element ?
		if (\count($sections) === 1) {
			// already found, return
			return;
		}

		$checkedName = \basename($path);

		$found = false;
		foreach ($listing as $entry) {
			if ($entry['name'] === $checkedName) {
				$found = true;
				break;
			}
		}

		Assert::assertTrue(
			$found,
			__METHOD__
			. " Could not find expected resource '$path' in the trash"
		);
	}

	/**
	 * Function to check if an element is in the trashbin
	 *
	 * @param string|null $user
	 * @param string|null $originalPath
	 *
	 * @return bool
	 * @throws Exception
	 */
	private function isInTrash(?string $user, ?string $originalPath):bool {
		$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		$res = $this->featureContext->getResponse();
		$listing = $this->listTrashbinFolder($user);

		$this->featureContext->setResponse($res);
		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}

		// we don't care if the test step writes a leading "/" or not
		$originalPath = \ltrim($originalPath, '/');

		foreach ($listing as $entry) {
			if ($entry['original-location'] !== null && \ltrim($entry['original-location'], '/') === $originalPath) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $user
	 * @param string $trashItemHRef
	 * @param string $destinationPath
	 * @param string|null $asUser - To send request as another user
	 * @param string|null $password
	 *
	 * @return ResponseInterface
	 */
	private function sendUndeleteRequest(string $user, string $trashItemHRef, string $destinationPath, ?string $asUser = null, ?string $password = null):ResponseInterface {
		$asUser = $asUser ?? $user;
		$destinationPath = \trim($destinationPath, '/');
		$destinationValue = $this->featureContext->getBaseUrl() . "/remote.php/dav/files/$user/$destinationPath";

		$trashItemHRef = $this->convertTrashbinHref($trashItemHRef);
		$headers['Destination'] = $destinationValue;
		$response = $this->featureContext->makeDavRequest(
			$asUser,
			'MOVE',
			$trashItemHRef,
			$headers,
			null,
			'trash-bin',
			'2',
			false,
			$password,
			[],
			$user
		);
		$this->featureContext->setResponse($response);
		return $response;
	}

	/**
	 * @param string $user
	 * @param string $originalPath
	 * @param string|null $destinationPath
	 * @param bool $throwExceptionIfNotFound
	 * @param string|null $asUser - To send request as another user
	 * @param string|null $password
	 *
	 * @return ResponseInterface|null
	 * @throws Exception
	 */
	private function restoreElement(string $user, string $originalPath, ?string $destinationPath = null, bool $throwExceptionIfNotFound = true, ?string $asUser = null, ?string $password = null):?ResponseInterface {
		$asUser = $asUser ?? $user;
		$listing = $this->listTrashbinFolder($user);
		$originalPath = \trim($originalPath, '/');
		if ($destinationPath === null) {
			$destinationPath = $originalPath;
		}
		foreach ($listing as $entry) {
			if ($entry['original-location'] === $originalPath) {
				return $this->sendUndeleteRequest(
					$user,
					$entry['href'],
					$destinationPath,
					$asUser,
					$password
				);
			}
		}
		// The requested element to restore was not even in the trashbin.
		// Throw an exception, because there was not any API call, and so there
		// is also no up-to-date response to examine in later test steps.
		if ($throwExceptionIfNotFound) {
			throw new \Exception(
				__METHOD__
				. " cannot restore from trashbin because no element was found for user $user at original path $originalPath"
			);
		}
		return null;
	}

	/**
	 * @When user :user restores the folder with original path :originalPath without specifying the destination using the trashbin API
	 *
	 * @param $user string
	 * @param $originalPath string
	 *
	 * @return ResponseInterface
	 * @throws Exception
	 */
	public function restoreFileWithoutDestination(string $user, string $originalPath):ResponseInterface {
		$asUser = $asUser ?? $user;
		$listing = $this->listTrashbinFolder($user);
		$originalPath = \trim($originalPath, '/');

		foreach ($listing as $entry) {
			if ($entry['original-location'] === $originalPath) {
				$trashItemHRef = $this->convertTrashbinHref($entry['href']);
				$response = $this->featureContext->makeDavRequest(
					$asUser,
					'MOVE',
					$trashItemHRef,
					[],
					null,
					'trash-bin'
				);
				$this->featureContext->setResponse($response);
				// this gives empty response in ocis
				try {
					$responseXml = HttpRequestHelper::getResponseXml(
						$response,
						__METHOD__
					);
					$this->featureContext->setResponseXmlObject($responseXml);
				} catch (Exception $e) {
				}

				return $response;
			}
		}
		throw new \Exception(
			__METHOD__
			. " cannot restore from trashbin because no element was found for user $user at original path $originalPath"
		);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" if the file is also in the trashbin should be "([^"]*)" otherwise "([^"]*)"$/
	 *
	 * Note: this is a special step for an unusual bug combination.
	 *       Delete it when the bug is fixed and the step is no longer needed.
	 *
	 * @param string|null $fileName
	 * @param string|null $user
	 * @param string|null $content
	 * @param string|null $alternativeContent
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function contentOfFileForUserIfAlsoInTrashShouldBeOtherwise(
		?string $fileName,
		?string $user,
		?string $content,
		?string $alternativeContent
	):void {
		$isInTrash = $this->isInTrash($user, $fileName);
		$user = $this->featureContext->getActualUsername($user);
		$this->featureContext->downloadFileAsUserUsingPassword($user, $fileName);
		if ($isInTrash) {
			$this->featureContext->downloadedContentShouldBe($content);
		} else {
			$this->featureContext->downloadedContentShouldBe($alternativeContent);
		}
	}

	/**
	 * @When /^user "([^"]*)" tries to restore the (?:file|folder|entry) with original path "([^"]*)" using the trashbin API$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToRestoreElementInTrash(string $user, string $originalPath):void {
		$this->restoreElement($user, $originalPath, null, false);
	}

	/**
	 * @When /^user "([^"]*)" restores the (?:file|folder|entry) with original path "([^"]*)" using the trashbin API$/
	 *
	 * @param string|null $user
	 * @param string $originalPath
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function elementInTrashIsRestored(?string $user, string $originalPath):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->restoreElement($user, $originalPath);
	}

	/**
	 * @When /^user "([^"]*)" restores the following (?:files|folders|entries) with original path$/
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRestoresFollowingFiles(string $user, TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $originalPath) {
			$this->elementInTrashIsRestored($user, $originalPath["path"]);

			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @Given /^user "([^"]*)" has restored the (?:file|folder|entry) with original path "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function elementInTrashHasBeenRestored(string $user, string $originalPath):void {
		$this->restoreElement($user, $originalPath);
		if ($this->isInTrash($user, $originalPath)) {
			throw new Exception("File previously located at $originalPath is still in the trashbin");
		}
	}

	/**
	 * @When /^user "([^"]*)" restores the (?:file|folder|entry) with original path "([^"]*)" to "([^"]*)" using the trashbin API$/
	 *
	 * @param string|null $user
	 * @param string|null $originalPath
	 * @param string|null $destinationPath
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function userRestoresTheFileWithOriginalPathToUsingTheTrashbinApi(
		?string $user,
		?string $originalPath,
		?string $destinationPath
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->restoreElement($user, $originalPath, $destinationPath);
	}

	/**
	 * @Then /^as "([^"]*)" the (?:file|folder|entry) with original path "([^"]*)" should exist in the trashbin$/
	 *
	 * @param string|null $user
	 * @param string|null $originalPath
	 *
	 * @return void
	 * @throws JsonException
	 * @throws Exception
	 */
	public function elementIsInTrashCheckingOriginalPath(
		?string $user,
		?string $originalPath
	):void {
		$user = $this->featureContext->getActualUsername($user);
		Assert::assertTrue(
			$this->isInTrash($user, $originalPath),
			"File previously located at $originalPath wasn't found in the trashbin of user $user"
		);
	}

	/**
	 * @Then /^as "([^"]*)" the (?:file|folder|entry) with original path "([^"]*)" should not exist in the trashbin/
	 *
	 * @param string|null $user
	 * @param string $originalPath
	 *
	 * @return void
	 * @throws Exception
	 */
	public function elementIsNotInTrashCheckingOriginalPath(
		?string $user,
		string $originalPath
	):void {
		$user = $this->featureContext->getActualUsername($user);
		Assert::assertFalse(
			$this->isInTrash($user, $originalPath),
			"File previously located at $originalPath was found in the trashbin of user $user"
		);
	}

	/**
	 * @Then /^as "([^"]*)" the (?:files|folders|entries) with following original paths should not exist in the trashbin$/
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function followingElementsAreNotInTrashCheckingOriginalPath(
		string $user,
		TableNode $table
	):void {
		$this->featureContext->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash($table);

		foreach ($paths as $originalPath) {
			$this->elementIsNotInTrashCheckingOriginalPath($user, $originalPath["path"]);
		}
	}

	/**
	 * @Then /^as "([^"]*)" the (?:files|folders|entries) with following original paths should exist in the trashbin$/
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function followingElementsAreInTrashCheckingOriginalPath(
		string $user,
		TableNode $table
	):void {
		$this->featureContext->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash($table);

		foreach ($paths as $originalPath) {
			$this->elementIsInTrashCheckingOriginalPath($user, $originalPath["path"]);
		}
	}

	/**
	 * Finds the first trashed entry matching the given name
	 *
	 * @param string $user
	 * @param string $name
	 *
	 * @return array|null real entry name with timestamp suffix or null if not found
	 * @throws Exception
	 */
	private function findFirstTrashedEntry(string $user, string $name):?array {
		$listing = $this->listTrashbinFolder($user);

		foreach ($listing as $entry) {
			if ($entry['name'] === $name) {
				return $entry;
			}
		}

		return null;
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
		$this->occContext = $environment->getContext('OccContext');
	}

	/**
	 * @Then /^the deleted (?:file|folder) "([^"]*)" should have the correct deletion mtime in the response$/
	 *
	 * @param string $resource file or folder in trashbin
	 *
	 * @return void
	 */
	public function theDeletedFileFolderShouldHaveCorrectDeletionMtimeInTheResponse(string $resource):void {
		$files = $this->getTrashbinContentFromResponseXml(
			$this->featureContext->getResponseXmlObject()
		);

		$found = false;
		$expectedMtime = $this->featureContext->getLastUploadDeleteTime();
		$responseMtime = '';

		foreach ($files as $file) {
			if (\ltrim((string)$resource, "/") === \ltrim((string)$file['original-location'], "/")) {
				$responseMtime = $file['mtime'];
				$mtime_difference = \abs((int)\trim((string)$expectedMtime) - (int)\trim($responseMtime));

				if ($mtime_difference <= 2) {
					$found = true;
					break;
				}
			}
		}
		Assert::assertTrue(
			$found,
			"$resource expected to be listed in response with mtime '$expectedMtime' but found '$responseMtime'"
		);
	}

	/**
	 * @Given the administrator has set the following file extensions to be skipped from the trashbin
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetFollowingFileExtensionsToBeSkippedFromTrashbin(TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ['extension']);
		foreach ($table->getHash() as $idx => $row) {
			$this->featureContext->runOcc(['config:system:set', 'trashbin_skip_extensions', $idx, '--value=' . $row['extension']]);
		}
	}

	/**
	 * @Given the administrator has set the following directories to be skipped from the trashbin
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetFollowingDirectoriesToBeSkippedFromTrashbin(TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ['directory']);
		foreach ($table->getHash() as $idx => $row) {
			$this->featureContext->runOcc(['config:system:set', 'trashbin_skip_directories', $idx, '--value=' . $row['directory']]);
		}
	}

	/**
	 * @Given the administrator has set the trashbin skip size threshold to :threshold
	 *
	 * @param string $threshold
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSetTrashbinSkipSizethreshold(string $threshold) {
		$this->featureContext->runOcc(['config:system:set', 'trashbin_skip_size_threshold', '--value=' . $threshold]);
	}
}
