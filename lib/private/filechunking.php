<?php
/**
 * Copyright (c) 2012 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */


class OC_FileChunking {
	protected $info;
	protected $cache;

	static public function decodeName($name) {
		preg_match('/(?P<name>.*)-chunking-(?P<transferid>\d+)-(?P<chunkcount>\d+)-(?P<index>\d+)/', $name, $matches);
		return $matches;
	}

	/**
	 * @param string[] $info
	 */
	public function __construct($info, $cache = null) {
		$this->info = $info;
		$this->cache = $cache;
	}

	public function getPrefix() {
		$name = $this->info['name'];
		$transferId = $this->info['transferid'];

		return $name.'-chunking-'.$transferId.'-';
	}

	protected function getCache() {
		if (!isset($this->cache)) {
			$this->cache = new \OC\Cache\File();
		}
		return $this->cache;
	}

	/**
	 * Stores the given $data under the given $key - the number of stored bytes is returned
	 *
	 * @param string $index
	 * @param resource $data
	 * @return int
	 */
	public function store($index, $data) {
		$cache = $this->getCache();
		$name = $this->getPrefix().$index;
		$cache->set($name, $data);

		return $cache->size($name);
	}

	public function isComplete() {
		$prefix = $this->getPrefix();
		$parts = 0;
		$cache = $this->getCache();
		for($i=0; $i < $this->info['chunkcount']; $i++) {
			if ($cache->hasKey($prefix.$i)) {
				$parts ++;
			}
		}
		return $parts == $this->info['chunkcount'];
	}

	/**
	 * Assembles the chunks into the file specified by the path.
	 * Chunks are deleted afterwards.
	 *
	 * @param string $f target path
	 *
	 * @return integer assembled file size
	 *
	 * @throws \OCP\Files\NotEnoughSpaceException when file could not be fully
	 * assembled due to lack of free space
	 */
	public function assemble($f) {
		$cache = $this->getCache();
		$prefix = $this->getPrefix();
		$count = 0;
		for ($i = 0; $i < $this->info['chunkcount']; $i++) {
			$chunk = $cache->get($prefix.$i);
			// remove after reading to directly save space
			$cache->remove($prefix.$i);
			$count += fwrite($f, $chunk);
		}

		return $count;
	}

	/**
	 * Returns the size of the chunks already present
	 * @return integer size in bytes
	 */
	public function getCurrentSize() {
		$cache = $this->getCache();
		$prefix = $this->getPrefix();
		$total = 0;
		for ($i = 0; $i < $this->info['chunkcount']; $i++) {
			$total += $cache->size($prefix.$i);
		}
		return $total;
	}

	/**
	 * Removes all chunks which belong to this transmission
	 */
	public function cleanup() {
		$cache = $this->getCache();
		$prefix = $this->getPrefix();
		for($i=0; $i < $this->info['chunkcount']; $i++) {
			$cache->remove($prefix.$i);
		}
	}

	/**
	 * Removes one specific chunk
	 * @param string $index
	 */
	public function remove($index) {
		$cache = $this->getCache();
		$prefix = $this->getPrefix();
		$cache->remove($prefix.$index);
	}
}
