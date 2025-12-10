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
namespace TestHelpers\Asserts;

use Exception;
use PHPUnit\Framework\Assert;
use SimpleXMLElement;
use TestHelpers\DownloadHelper;
use TestHelpers\SetupHelper;

/**
 * WebDAV related asserts
 */
class WebDav extends Assert {
	/**
	 *
	 * @param string|null $element exception|message|reason
	 * @param string|null $expectedValue
	 * @param array|null $responseXml
	 * @param string|null $extraErrorText
	 *
	 * @return void
	 */
	public static function assertDavResponseElementIs(
		?string $element,
		?string $expectedValue,
		?array $responseXml,
		?string $extraErrorText = ''
	):void {
		if ($extraErrorText !== '') {
			$extraErrorText = $extraErrorText . " ";
		}
		self::assertArrayHasKey(
			'value',
			$responseXml,
			$extraErrorText . "responseXml does not have key 'value'"
		);
		if ($element === "exception") {
			$result = $responseXml['value'][0]['value'];
		} elseif ($element === "message") {
			$result = $responseXml['value'][1]['value'];
		} elseif ($element === "reason") {
			$result = $responseXml['value'][3]['value'];
		} else {
			self::fail(__METHOD__ . " element must be one of exception, response or reason. But '$element' was passed in.");
		}

		self::assertEquals(
			$expectedValue,
			$result,
			__METHOD__ . " " . $extraErrorText . "Expected '$expectedValue' in element $element got '$result'"
		);
	}

	/**
	 *
	 * @param SimpleXMLElement $responseXmlObject
	 * @param array|null $expectedShareTypes
	 *
	 * @return void
	 */
	public static function assertResponseContainsShareTypes(
		SimpleXMLElement $responseXmlObject,
		?array $expectedShareTypes
	):void {
		foreach ($expectedShareTypes as $row) {
			$xmlPart = $responseXmlObject->xpath(
				"//d:prop/oc:share-types/oc:share-type[.=" . $row[0] . "]"
			);
			self::assertNotEmpty(
				$xmlPart,
				"cannot find share-type '" . $row[0] . "'"
			);
		}
	}

	/**
	 * Asserts that the content of a remote and a local file is the same
	 * or is different
	 *
	 * @param string|null $baseUrl
	 * @param string|null $username
	 * @param string|null $password
	 * @param string|null $remoteFile
	 * @param string|null $localFile
	 * @param string|null $xRequestId
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 *
	 * @return void
	 */
	public static function assertContentOfRemoteAndLocalFileIsSame(
		?string $baseUrl,
		?string $username,
		?string $password,
		?string $remoteFile,
		?string $localFile,
		?string $xRequestId = '',
		?bool $shouldBeSame = true
	):void {
		$result = DownloadHelper::download(
			$baseUrl,
			$username,
			$password,
			$remoteFile,
			$xRequestId
		);

		$localContent = \file_get_contents($localFile);
		$downloadedContent = $result->getBody()->getContents();

		if ($shouldBeSame) {
			self::assertSame(
				$localContent,
				$downloadedContent
			);
		} else {
			self::assertNotSame(
				$localContent,
				$downloadedContent
			);
		}
	}

	/**
	 * Asserts that the content of a remote file (downloaded by DAV)
	 * and a file in the skeleton folder of the system under test is the same
	 * or is different
	 *
	 * @param string|null $baseUrl
	 * @param string|null $username
	 * @param string|null $password
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $remoteFile
	 * @param string|null $fileInSkeletonFolder
	 * @param string|null $xRequestId
	 * @param bool $shouldBeSame (default true) if true then check that the file contents are the same
	 *                           otherwise check that the file contents are different
	 *
	 * @return void
	 * @throws Exception|\GuzzleHttp\Exception\GuzzleException
	 */
	public static function assertContentOfDAVFileAndSkeletonFileOnSUT(
		?string $baseUrl,
		?string $username,
		?string $password,
		?string $adminUsername,
		?string $adminPassword,
		?string $remoteFile,
		?string $fileInSkeletonFolder,
		?string $xRequestId = '',
		?bool $shouldBeSame = true
	):void {
		$result = DownloadHelper::download(
			$baseUrl,
			$username,
			$password,
			$remoteFile,
			$xRequestId
		);
		$downloadedContent = $result->getBody()->getContents();

		$localContent = SetupHelper::readSkeletonFile(
			$fileInSkeletonFolder,
			$xRequestId,
			$baseUrl,
			$adminUsername,
			$adminPassword
		);

		if ($shouldBeSame) {
			self::assertSame(
				$localContent,
				$downloadedContent
			);
		} else {
			self::assertNotSame(
				$localContent,
				$downloadedContent
			);
		}
	}
}
