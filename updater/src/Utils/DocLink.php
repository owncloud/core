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
 * Class DocLink
 *
 * @package Owncloud\Updater\Utils
 */
class DocLink {
	public const BASE_DOC_URL = 'https://doc.owncloud.com/server';

	private $version;

	/**
	 * DocLink constructor.
	 *
	 * @param string $version
	 */
	public function __construct($version) {
		$this->version = $this->trimVersion($version);
	}

	/**
	 * Cut everything except Major.Minor
	 * @param string $version
	 * @return string
	 */
	protected function trimVersion($version) {
		if (\preg_match('|^\d+\.\d+|', $version, $matches)>0) {
			return $matches[0];
		}
		return '';
	}

	/**
	 * @param string $relativePart
	 * @return string
	 */
	public function getAdminManualUrl($relativePart) {
		return \sprintf(
			'%s/%s/admin_manual/%s',
			self::BASE_DOC_URL,
			$this->version,
			$relativePart
		);
	}
}
