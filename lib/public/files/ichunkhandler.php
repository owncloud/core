<?php
/**
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller deepdiver@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
namespace OCP\Files;

interface IChunkHandler {

	/**
	 * Write a chunk to a give file. The returned array will holds following properties:
	 *  - bytesWritten - the number of bytes written with the current call
	 *  - complete - indicator if the file si complete and has been uploaded/stored in the storage,
	 *  - actualSize - current size of the file - equivalent to the sum of all stored chunks
	 *
	 * @param string $fileName
	 * @param int $index
	 * @param int $numberOfChunk
	 * @param int $chunkSize the size of the current chunk
	 * @param resource $data
	 * @param string $transferId
	 * @return array
	 */
	public function storeChunk($fileName, $index, $numberOfChunk, $chunkSize, $data, $transferId);

}
