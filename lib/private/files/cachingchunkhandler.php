<?php
/**
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller deepdiver@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files;

use OCP\Files\Storage;

class CachingChunkHandler implements \OCP\Files\IChunkHandler {

	/**
	 * @var Storage
	 */
	private $storage;

	public function __construct(Storage $storage) {
		$this->storage = $storage;
	}

	/**
	 * Write a chunk to a give file.
	 *
	 * @param string $fileName
	 * @param int $index
	 * @param int $numberOfChunk
	 * @param int $chunkSize
	 * @param string $data
	 * @return array
	 */
	function storeChunk($fileName, $index, $numberOfChunk, $chunkSize, $data, $transferId) {
		$info = array(
			'name' => $transferId,
			'transferid' => $transferId,
			'chunkcount' => $numberOfChunk,
			''
		);
		$chunkHandler = new \OC_FileChunking($info);
		$bytesWritten = $chunkHandler->store($index, $data);
		if ($bytesWritten != $chunkSize) {
			$chunkHandler->remove($index);
		}
		$complete = false;
		if ($chunkHandler->isComplete()) {
			$complete = true;
			$f = $this->storage->fopen("/files" . $fileName, 'w');
			$chunkHandler->assemble($f);
			fclose($f);
		}

		return array(
			'complete' => $complete,
			'bytesWritten' => $bytesWritten,
			'actualSize' => $chunkHandler->getCurrentSize()
		);
	}
}
