<?php

namespace OCP\Files;

interface IStorageManager {

	/**
	 * Returns the primary storage instance
	 * @return IFileStorage
	 */
	public function getPrimaryStorage();

}
