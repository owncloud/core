<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

/**
 * Public interface of ownCloud for apps to use.
 * App Class
 *
 */

namespace OCP\Util;
use OCP\IConfig;

/**
 * This class provides utility functions for searching users and groups
 *
 * @since 10.0.8
 */

class UserSearch {
	protected $config;

	/**
	 * UserSearch constructor.
	 *
	 * @param IConfig $config
	 * @since 10.0.8
	 */
	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * @param string $pattern
	 * @return bool
	 * @since 10.0.8
	 */
	public function isSearchable($pattern) {
		$trimmed = \trim($pattern);
		return $trimmed === '' || \strlen($trimmed) >= $this->getSearchMinLength();
	}

	/**
	 * Get minimal allowed size to search users
	 *
	 * @return mixed
	 * @since 10.0.8
	 */
	public function getSearchMinLength() {
		return $this->config->getSystemValue('user.search_min_length', 2);
	}
}
