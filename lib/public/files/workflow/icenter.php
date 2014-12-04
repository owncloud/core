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

use OCP\Files\Storage;

interface ICenter {

	/**
	 * @param IUploadHandler $storage
	 * @param Storage $storage
	 * @return mixed
	 */
	public function registerUploadHandler(IUploadHandler $storage, Storage $storage = null);

	/**
	 * @param Storage $storage
	 * @returns IUploadHandler[]
	 */
	public function getHandlers(Storage $storage = null);
}
