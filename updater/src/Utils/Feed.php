<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Owncloud\Updater\Utils;

/**
 * Class Feed
 *
 * @package Owncloud\Updater\Utils
 */
class Feed {
	/** string $version */
	protected $version;

	/** string $versionString */
	protected $versionString;

	/** string $url */
	protected $url;

	/** string $web */
	protected $web;

	/** array $requiredFeedEntries */
	protected $requiredFeedEntries = [
		'version',
		'versionstring',
		'url'
	];

	/** bool $isValid */
	protected $isValid = true;

	/**
	 *
	 * @param array $data
	 */
	public function __construct($data) {
		$missingEntries = [];
		foreach ($this->requiredFeedEntries as $index) {
			if (!isset($data[$index]) || empty($data[$index])) {
				$missingEntries[] = $index;
				$data[$index] = '';
			}
		}

		if (\count($missingEntries)) {
			$this->isValid = false;
			//'Got missing or empty fileds for: ' . implode(',', $missingEntries) . '. No updates found.';
		}
		$this->version = $data['version'];
		$this->versionString = $data['versionstring'];
		$this->url = $data['url'];
	}

	/**
	 * Build filename to download as a.b.c.d.zip
	 * @return string
	 */
	public function getDownloadedFileName() {
		$extension = \preg_replace('|.*?((\.tar)?\.[^.]*)$|s', '\1', $this->getUrl());
		return $this->getVersion() . $extension;
	}

	/**
	 * Does feed contain all the data required?
	 * @return bool
	 */
	public function isValid() {
		return $this->isValid;
	}

	/**
	 *
	 * @return string
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 *
	 * @return string
	 */
	public function getVersionString() {
		return $this->versionString;
	}

	/**
	 * Get url to download a new version from
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Get url to download a checksum from
	 * @return string
	 */
	public function getChecksumUrl() {
		return $this->url . '.md5';
	}
}
