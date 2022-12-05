<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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
namespace TestHelpers;

use Psr\Http\Message\ResponseInterface;

/**
 * Helper for Uploads
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class UploadHelper extends \PHPUnit\Framework\Assert {
	/**
	 *
	 * @param string|null $baseUrl URL of owncloud
	 *                             e.g. http://localhost:8080
	 *                             should include the subfolder
	 *                             if owncloud runs in a subfolder
	 *                             e.g. http://localhost:8080/owncloud-core
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $source
	 * @param string|null $destination
	 * @param string|null $xRequestId
	 * @param array|null $headers
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param int|null $chunkingVersion (1|2|null)
	 *                                  if set to null chunking will not be used
	 * @param int|null $noOfChunks how many chunks do we want to upload
	 *
	 * @return ResponseInterface
	 */
	public static function upload(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $source,
		?string $destination,
		?string $xRequestId = '',
		?array $headers = [],
		?int $davPathVersionToUse = 1,
		?int $chunkingVersion = null,
		?int $noOfChunks = 1
	): ResponseInterface {
		//simple upload with no chunking
		if ($chunkingVersion === null) {
			$data = \file_get_contents($source);
			return WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				"PUT",
				$destination,
				$headers,
				$xRequestId,
				$data,
				$davPathVersionToUse
			);
		} else {
			//prepare chunking
			$chunks = self::chunkFile($source, $noOfChunks);
			$chunkingId = 'chunking-' . (string)\rand(1000, 9999);
			$v2ChunksDestination = '/uploads/' . $user . '/' . $chunkingId;
		}

		//prepare chunking version specific stuff
		if ($chunkingVersion === 1) {
			$headers['OC-Chunked'] = '1';
		} elseif ($chunkingVersion === 2) {
			$result = WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				'MKCOL',
				$v2ChunksDestination,
				$headers,
				$xRequestId,
				null,
				$davPathVersionToUse,
				"uploads"
			);
			if ($result->getStatusCode() >= 400) {
				return $result;
			}
		}

		//upload chunks
		foreach ($chunks as $index => $chunk) {
			if ($chunkingVersion === 1) {
				$filename = $destination . "-" . $chunkingId . "-" .
					\count($chunks) . '-' . ( string ) $index;
				$davRequestType = "files";
			} elseif ($chunkingVersion === 2) {
				$filename = $v2ChunksDestination . '/' . (string)($index);
				$davRequestType = "uploads";
			}
			$result = WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				"PUT",
				$filename,
				$headers,
				$xRequestId,
				$chunk,
				$davPathVersionToUse,
				$davRequestType
			);
			if ($result->getStatusCode() >= 400) {
				return $result;
			}
		}
		//finish upload for new chunking
		if ($chunkingVersion === 2) {
			$source = $v2ChunksDestination . '/.file';
			$headers['Destination'] = $baseUrl . "/" .
				WebDavHelper::getDavPath($user, $davPathVersionToUse) .
				$destination;
			$result = WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				'MOVE',
				$source,
				$headers,
				$xRequestId,
				null,
				$davPathVersionToUse,
				"uploads"
			);
			if ($result->getStatusCode() >= 400) {
				return $result;
			}
		}
		return $result;
	}

	/**
	 * Upload the same file multiple times with different mechanisms.
	 *
	 * @param string|null $baseUrl URL of owncloud
	 * @param string|null $user user who uploads
	 * @param string|null $password
	 * @param string|null $source source file path
	 * @param string|null $destination destination path on the server
	 * @param string|null $xRequestId
	 * @param bool $overwriteMode when false creates separate files to test uploading brand new files,
	 *                            when true it just overwrites the same file over and over again with the same name
	 * @param string|null $exceptChunkingType empty string or "old" or "new"
	 *
	 * @return array of ResponseInterface
	 */
	public static function uploadWithAllMechanisms(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $source,
		?string $destination,
		?string $xRequestId = '',
		?bool $overwriteMode = false,
		?string $exceptChunkingType = ''
	):array {
		$responses = [];
		foreach ([1, 2] as $davPathVersion) {
			if ($davPathVersion === 1) {
				$davHuman = 'old';
			} else {
				$davHuman = 'new';
			}

			switch ($exceptChunkingType) {
				case 'old':
					$exceptChunkingVersion = 1;
					break;
				case 'new':
					$exceptChunkingVersion = 2;
					break;
				default:
					$exceptChunkingVersion = -1;
					break;
			}

			foreach ([null, 1, 2] as $chunkingVersion) {
				if ($chunkingVersion === $exceptChunkingVersion) {
					continue;
				}
				$valid = WebDavHelper::isValidDavChunkingCombination(
					$davPathVersion,
					$chunkingVersion
				);
				if ($valid === false) {
					continue;
				}
				$finalDestination = $destination;
				if (!$overwriteMode && $chunkingVersion !== null) {
					$finalDestination .= "-{$davHuman}dav-{$davHuman}chunking";
				} elseif (!$overwriteMode && $chunkingVersion === null) {
					$finalDestination .= "-{$davHuman}dav-regular";
				}
				$responses[] = self::upload(
					$baseUrl,
					$user,
					$password,
					$source,
					$finalDestination,
					$xRequestId,
					[],
					$davPathVersion,
					$chunkingVersion,
					2
				);
			}
		}
		return $responses;
	}

	/**
	 * cut the file in multiple chunks
	 * returns an array of chunks with the content of the file
	 *
	 * @param string|null $file
	 * @param int|null $noOfChunks
	 *
	 * @return array $string
	 */
	public static function chunkFile(?string $file, ?int $noOfChunks = 1):array {
		$size = \filesize($file);
		$chunkSize = \ceil($size / $noOfChunks);
		$chunks = [];
		$fp = \fopen($file, 'r');
		while (!\feof($fp) && \ftell($fp) < $size) {
			$chunks[] = \fread($fp, (int)$chunkSize);
		}
		\fclose($fp);
		if (\count($chunks) === 0) {
			// chunk an empty file
			$chunks[] = '';
		}
		return $chunks;
	}

	/**
	 * creates a File with a specific size
	 *
	 * @param string|null $name full path of the file to create
	 * @param int|null $size
	 *
	 * @return void
	 */
	public static function createFileSpecificSize(?string $name, ?int $size):void {
		if (\file_exists($name)) {
			\unlink($name);
		}
		$file = \fopen($name, 'w');
		\fseek($file, \max($size - 1, 0), SEEK_CUR);
		if ($size) {
			\fwrite($file, 'a'); // write a dummy char at SIZE position
		}
		\fclose($file);
		self::assertEquals(
			1,
			\file_exists($name)
		);
		self::assertEquals(
			$size,
			\filesize($name)
		);
	}

	/**
	 * creates a File with a specific text content
	 *
	 * @param string|null $name full path of the file to create
	 * @param string|null $text
	 *
	 * @return void
	 */
	public static function createFileWithText(?string $name, ?string $text):void {
		$file = \fopen($name, 'w');
		\fwrite($file, $text);
		\fclose($file);
		self::assertEquals(
			1,
			\file_exists($name)
		);
	}

	/**
	 * get the path of a file from FilesForUpload directory
	 *
	 * @param string|null $name name of the file to upload
	 *
	 * @return string
	 */
	public static function getUploadFilesDir(?string $name):string {
		return \getenv("FILES_FOR_UPLOAD") . $name;
	}
}
