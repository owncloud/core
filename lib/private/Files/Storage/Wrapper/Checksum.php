<?php
/**
 * @author Ilja Neumann <ineumann@owncloud.com>
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
namespace OC\Files\Storage\Wrapper;

use function GuzzleHttp\Psr7\stream_for;
use OC\Files\Utils\FileUtils;
use GuzzleHttp\Psr7\StreamWrapper;
use Psr\Http\Message\StreamInterface;

/**
 * Class Checksum
 *
 * Computes checksums (default: SHA1, MD5, ADLER32) on all files under the /files path.
 * The resulting checksum can be retrieved by call getMetadata($path)
 *
 * If a file is read and has no checksum oc_filecache gets updated accordingly.
 *
 *
 * @package OC\Files\Storage\Wrapper
 */
class Checksum extends Wrapper {

	/** Format of checksum field in filecache */
	const CHECKSUMS_DB_FORMAT = 'SHA1:%s MD5:%s ADLER32:%s';

	const NOT_REQUIRED = 0;
	/** Calculate checksum on write (to be stored in oc_filecache) */
	const PATH_NEW_OR_UPDATED = 1;
	/** File needs to be checksummed on first read because it is already in cache but has no checksum */
	const PATH_IN_CACHE_WITHOUT_CHECKSUM = 2;

	/** @var array */
	private $checksums;

	/**
	 * @param $path
	 * @return string Format like "SHA1:abc MD5:def ADLER32:ghi"
	 */
	private function getChecksumsInDbFormat($path) {
		if (empty($this->checksums[$path])) {
			return '';
		}
		if (!isset($this->checksums[$path]->md5)) {
			throw new \BadMethodCallException('Reading from stream not yet finished. Close the stream before calling this method.');
		}

		return \sprintf(
			self::CHECKSUMS_DB_FORMAT,
			$this->checksums[$path]->sha1,
			$this->checksums[$path]->md5,
			$this->checksums[$path]->adler32
		);
	}

	/**
	 * check if the file metadata should not be fetched
	 * NOTE: files with a '.part' extension are ignored as well!
	 *       prevents unfinished put requests to fetch metadata which does not exists
	 *
	 * @param string $file
	 * @return boolean
	 */
	public static function isPartialFile($file) {
		if (\pathinfo($file, PATHINFO_EXTENSION) === 'part') {
			return true;
		}

		return false;
	}

	public function file_get_contents($path) {
		$stream = $this->readFile($path);
		$data = $stream->getContents();
		$stream->close();
		return $data;
	}

	/**
	 * @param string $path
	 * @param string $data
	 * @return bool
	 */
	public function file_put_contents($path, $data) {
		return $this->writeFile($path, stream_for($data));
	}

	public function writeFile(string $path, StreamInterface $stream) : int {
		$this->checksums[$path] = new \stdClass();

		if (!\in_array('oc.checksum', \stream_get_filters(), true)) {
			\stream_filter_register('oc.checksum', ChecksumFilter::class);
		}
		$resource = StreamWrapper::getResource($stream);
		\stream_filter_append($resource, 'oc.checksum', STREAM_FILTER_READ, $this->checksums[$path]);

		$checksumStream = stream_for($resource);
		$return = $this->getWrapperStorage()->writeFile($path, $checksumStream);
		$checksumStream->close();
		return $return;
	}

	public function readFile(string $path, array $options = []): StreamInterface {
		$this->checksums[$path] = new \stdClass();

		if (!\in_array('oc.checksum', \stream_get_filters(), true)) {
			\stream_filter_register('oc.checksum', ChecksumFilter::class);
		}
		$stream = $this->getWrapperStorage()->readFile($path, $options);
		$resource = StreamWrapper::getResource($stream);
		\stream_filter_append($resource, 'oc.checksum', STREAM_FILTER_READ, $this->checksums[$path]);

		return stream_for($resource);
	}

	/**
	 * @param string $path
	 * @return array
	 */
	public function getMetaData($path) {
		// Check if it is partial file. Partial file metadata are only checksums
		$parentMetaData = [];
		if (!FileUtils::isPartialFile($path)) {
			$parentMetaData = $this->getWrapperStorage()->getMetaData($path);
			// can be null if entry does not exist
			if ($parentMetaData === null) {
				return null;
			}
		}
		$parentMetaData['checksum'] = $this->getChecksumsInDbFormat($path);

		if (!isset($parentMetaData['mimetype'])) {
			$parentMetaData['mimetype'] = 'application/octet-stream';
		}

		return $parentMetaData;
	}
}
