<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
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

namespace OCP\AppFramework\Http;

/**
 * This class defines a collection of CORS options
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
 * @package OCP\AppFramework\Http
 * @since 8.2.0
 */
class CrossOriginResourceSharing {

	/**
	 * @var array
	 */
	private $accessControlAllowMethods = [
		'GET',
		'POST',
		'PUT',
		'DELETE',
		'PATCH',
		'HEAD'
	];

	/**
	 * @var array
	 */
	private $accessControlAllowHeaders = [
		'Authorization',
		'Content-Type',
		'Accept'
	];

	/**
	 * @var int
	 */
	private $accessControlMaxAge = 3600;  // seconds

	/**
	 * @param array $methods an array which contains all whitelisted verbs
	 * for the request
	 * @return CrossOriginResourceSharing
	 */
	public function setAccessControlAllowMethods(array $methods) {
		$this->accessControlAllowMethods = array_map('strtoupper', $methods);
		return $this;
	}

	/**
	 * @param array $methods an array which contains all whitelisted headers
	 * for the request
	 * @return CrossOriginResourceSharing
	 */
	public function setAccessControlAllowHeaders(array $headers) {
		$this->accessControlAllowHeaders = $headers;
		return $this;
	}

	/**
	 * @param int $maxAge maximum peflighted cors cache timespan for clients
	 * @return CrossOriginResourceSharing
	 */
	public function setAccessControlMaxAge($maxAge) {
		$this->accessControlMaxAge = (int) $maxAge;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getAccessControlAllowMethods() {
		return $this->accessControlAllowMethods;
	}

	/**
	 * @return array
	 */
	public function getAccessControlAllowHeaders() {
		return $this->accessControlAllowHeaders;
	}

	/**
	 * @return int
	 */
	public function getAccessControlMaxAge() {
		return $this->accessControlMaxAge;
	}

}
