<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace TestHelpers;

use GuzzleHttp\Stream\Stream;

/**
 * Helper for Uploads
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class UploadHelper {
	/**
	 * 
	 * @param string $baseUrl             URL of owncloud
	 * e.g. http://localhost:8080
	 * should include the subfolder if owncloud runs in a subfolder
	 * e.g. http://localhost:8080/owncloud-core
	 * @param string $user
	 * @param string $password
	 * @param string $source 
	 * @param string $destination
	 * @param array  $headers
	 * @param int    $davPathVersionToUse (1|2)
	 * @param int    $chunkingVersion     (1|2|null)
	 * if set to null chunking will not be used
	 * @param int    $noOfChunks          how many chunks do we want to upload
	 * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|NULL
	 */
	static function upload(
		$baseUrl,
		$user,
		$password,
		$source,
		$destination,
		$headers = array(),
		$davPathVersionToUse = 1,
		$chunkingVersion = null,
		$noOfChunks = 1
	) {
	
		//simple upload with no chunking
		if ($chunkingVersion === null) {
			$data = Stream::factory(fopen($source, 'r'));
			return WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				"PUT",
				$destination,
				$headers,
				$data,
				null,
				$davPathVersionToUse
			);
		} else {
			//prepare chunking
			$chunks = self::chunkFile($source, $noOfChunks);
			$chunkingId = 'chunking-' . (string)rand(1000, 9999);
			$v2ChunksDestination = '/uploads/' . $user . '/' . $chunkingId;
		}
		
		//prepare chunking version specific stuff
		if ($chunkingVersion === 1) {
			$headers['OC-Chunked'] = '1';
		} elseif ($chunkingVersion === 2) {
			WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				'MKCOL',
				$v2ChunksDestination,
				[], null, null,
				$davPathVersionToUse,
				"uploads"
			);
		}
		
		//upload chunks
		foreach ($chunks as $index => $chunk) {
			$data = Stream::factory($chunk);
			if ($chunkingVersion === 1) {
				$filename = $destination . "-" . $chunkingId . "-" .
							count($chunks) . '-' . ( string ) $index;
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
				$data,
				null,
				$davPathVersionToUse,
				$davRequestType
			);
		}
		//finish upload for new chunking
		if ($chunkingVersion === 2) {
			$source = $v2ChunksDestination . '/.file';
			$finalDestination = $baseUrl . "/" . 
						WebDavHelper::getDavPath($user, $davPathVersionToUse) .
						$destination;
			$result = WebDavHelper::makeDavRequest(
				$baseUrl,
				$user,
				$password,
				'MOVE',
				$source,
				['Destination' => $finalDestination ],
				null, null,
				$davPathVersionToUse,
				"uploads"
			);
		}
		return $result;
	}

	/**
	 * cut the file in multiple chunks
	 * returns an array of chunks with the content of the file
	 *
	 * @param string $file
	 * @param number $noOfChunks
	 * @return array $string
	 */
	static function chunkFile($file, $noOfChunks = 1) { 
		$size = filesize($file);
		$chunkSize = ceil($size / $noOfChunks);
		$chunks = [];
		$fp = fopen($file, 'r');
		while (!feof($fp) && ftell($fp) < $size) {
			$chunks[] = fread($fp, $chunkSize);
		}
		fclose($fp);
		return $chunks;
	}
}
