<?php
/**
 * Copyright (c) 2015 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_External;

use League\Flysystem\Adapter\Ftp;
use League\Flysystem\AdapterInterface;

// until https://github.com/thephpleague/flysystem/pull/429 is included
class FtpAdapter extends Ftp {
	/**
	 * Normalize a file entry.
	 *
	 * @param string $item
	 * @param string $base
	 *
	 * @return array normalized file array
	 */
	protected function normalizeObject($item, $base) {
		$regex = '/(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s(.+)/';
		preg_match($regex, $item, $matches);
		array_shift($matches);
		list($permissions, /* $number */, /* $owner */, /* $group */, $size, $month, $day, $time, $name) = $matches;
		$type = $this->detectType($permissions);
		$timestamp = strtotime($month . ' ' . $day . ' ' . $time);
		$path = empty($base) ? $name : $base . $this->separator . $name;

		if ($type === 'dir') {
			return compact('type', 'path', 'timestamp');
		}

		$permissions = $this->normalizePermissions($permissions);
		$visibility = $permissions & 0044 ? AdapterInterface::VISIBILITY_PUBLIC : AdapterInterface::VISIBILITY_PRIVATE;
		$size = (int)$size;

		return compact('type', 'path', 'visibility', 'size', 'timestamp');
	}
}
