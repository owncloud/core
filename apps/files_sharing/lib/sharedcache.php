<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Sharing;

use OC\Files\Cache\Wrapper\CacheJail;

/**
 * Jail to a subdirectory of the wrapped cache
 */
class SharedCache extends CacheJail {
	/**
	 * @var string
	 */
	protected $owner;

	/**
	 * @var string
	 */
	protected $displayName;

	/**
	 * @param \OC\Files\Cache\Cache $cache
	 * @param string $root
	 * @param string $owner
	 * @param string $displayName
	 */
	public function __construct($cache, $root, $owner, $displayName) {
		parent::__construct($cache, $root);
		$this->owner = $owner;
		$this->displayName = $displayName;
	}

	protected function formatCacheEntry($entry) {
		$entry = parent::formatCacheEntry($entry);
		$entry['uid_owner'] = $this->owner;
		$entry['displayname_owner'] = $this->displayName;
		return $entry;
	}
}
