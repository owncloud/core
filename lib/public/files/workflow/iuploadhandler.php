<?php
 /**
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller deepdiver@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCP\Files\WorkFlow;

interface IUploadHandler {
	/**
	 * @param array $fileMetaData
	 * @return mixed
	 */
	public function validateMetaData(array $fileMetaData);

	/**
	 * @param array $fileMetaData
	 * @return mixed
	 */
	public function writePartFile(array $fileMetaData);

	/**
	 * @param array $fileMetaData
	 * @return mixed
	 */
	public function unlinkPartFile(array $fileMetaData);

	/**
	 * @param array $fileMetaData
	 * @return mixed
	 */
	public function renamePartFileToTargetFile(array $fileMetaData);

	/**
	 * @param array $fileMetaData
	 * @return mixed
	 */
	public function updateModTime(array $fileMetaData);

	/**
	 * @param array $fileMetaData
	 * @param $data
	 * @return mixed
	 */
	public function writeChunk(array $fileMetaData, $data);

	/**
	 * @param array $fileMetaData
	 * @return mixed
	 */
	public function removeChunk(array $fileMetaData);

	/**
	 * @param array $fileMetaData
	 * @return mixed
	 */
	public function assembleFile(array $fileMetaData);
}
