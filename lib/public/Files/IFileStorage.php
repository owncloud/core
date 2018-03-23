<?php

namespace OCP\Files;

interface IFileStorage {

	/**
	 * Gets a stream resource for a path
	 * @return resource
	 */
	public function getStream($path);

}