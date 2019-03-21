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
namespace TestHelpers\Asserts;

use SimpleXMLElement;
use Behat\Gherkin\Node\TableNode;
use TestHelpers\DownloadHelper;
use TestHelpers\SetupHelper;

/**
 * WebDAV related asserts
 */
class WebDav extends \PHPUnit\Framework\Assert {
	/**
	 *
	 * @param string $element exception|message|reason
	 * @param string $expectedValue
	 * @param array $responseXml
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function assertDavResponseElementIs(
		$element, $expectedValue, $responseXml
	) {
		self::assertArrayHasKey(
			'value', $responseXml, '$responseXml seems not to be a valid array'
		);
		if ($element === "exception") {
			$result = $responseXml['value'][0]['value'];
		} elseif ($element === "message") {
			$result = $responseXml['value'][1]['value'];
		} elseif ($element === "reason") {
			$result = $responseXml['value'][3]['value'];
		}

		self::assertEquals(
			$expectedValue, $result,
			"Expected '$expectedValue' in element $element got '$result'"
		);
	}

	/**
	 *
	 * @param SimpleXMLElement $responseXmlObject
	 * @param TableNode $expectedShareTypes
	 *
	 * @return void
	 */
	public static function assertResponseContainsShareTypes(
		$responseXmlObject, $expectedShareTypes
	) {
		foreach ($expectedShareTypes->getRows() as $row) {
			$xmlPart = $responseXmlObject->xpath(
				"//d:prop/oc:share-types/oc:share-type[.=" . $row[0] . "]"
			);
			self::assertNotEmpty(
				$xmlPart, "cannot find share-type '" . $row[0] . "'"
			);
		}
	}

	/**
	 * Asserts that the content of a remote and a local file is the same
	 * or is different
	 *
	 * @param string $baseUrl
	 * @param string $username
	 * @param string $password
	 * @param string $remoteFile
	 * @param string $localFile
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function assertContentOfRemoteAndLocalFileIsSame(
		$baseUrl, $username, $password, $remoteFile, $localFile, $shouldBeSame = true
	) {
		$result = DownloadHelper::download(
			$baseUrl, $username, $password, $remoteFile
		);
		
		$localContent = \file_get_contents($localFile);
		$downloadedContent = $result->getBody()->getContents();
		
		if ($shouldBeSame) {
			self::assertSame(
				$localContent, $downloadedContent
			);
		} else {
			self::assertNotSame(
				$localContent, $downloadedContent
			);
		}
	}

	/**
	 * Asserts that the content of a remote file (downloaded by DAV)
	 * and a file in the skeleton folder of the system under test is the same
	 * or is different
	 *
	 * @param string $baseUrl
	 * @param string $username
	 * @param string $password
	 * @param string $adminUsername
	 * @param string $adminPassword
	 * @param string $remoteFile
	 * @param string $fileInSkeletonFolder
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function assertContentOfDAVFileAndSkeletonFileOnSUT(
		$baseUrl,
		$username,
		$password,
		$adminUsername,
		$adminPassword,
		$remoteFile,
		$fileInSkeletonFolder,
		$shouldBeSame = true
	) {
		$result = DownloadHelper::download(
			$baseUrl,
			$username,
			$password,
			$remoteFile
		);
		$downloadedContent = $result->getBody()->getContents();
		
		$localContent = SetupHelper::readSkeletonFile(
			$fileInSkeletonFolder, $baseUrl, $adminUsername, $adminPassword
		);
		
		if ($shouldBeSame) {
			self::assertSame(
				$localContent, $downloadedContent
			);
		} else {
			self::assertNotSame(
				$localContent, $downloadedContent
			);
		}
	}
}
