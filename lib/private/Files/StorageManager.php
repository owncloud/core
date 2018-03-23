<?php

namespace OC\Files;

use OCP\Files\IFileStorage;
use OCP\Files\IStorageManager;

class StorageManager implements IStorageManager {

	/**
	 * @return IFileStorage
	 */
	public function getPrimaryStorage() {
		return new RPCStorageClient();
	}

}