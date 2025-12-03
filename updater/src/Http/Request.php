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

namespace Owncloud\Updater\Http;

/**
 * Class Request
 *
 * @package Owncloud\Updater\Http
 */
class Request {
	protected $vars;

	/**
	 * Request constructor.
	 *
	 * @param array $vars
	 */
	public function __construct($vars = []) {
		$this->vars = $vars;
	}

	/**
	 * Returns the request uri
	 * @return string
	 */
	public function getRequestUri() {
		return $this->server('REQUEST_URI');
	}

	/**
	 * @return string
	 */
	public function getServerProtocol() {
		$forwardedProto = $this->server('HTTP_X_FORWARDED_PROTO');
		if ($forwardedProto !== null) {
			$proto = \strtolower($this->getPartBeforeComma($forwardedProto));
			// Verify that the protocol is always HTTP or HTTPS
			// default to http if an invalid value is provided
			return $proto === 'https' ? 'https' : 'http';
		}

		$isHttps = $this->server('HTTPS');
		if ($isHttps !== null
			&& $isHttps !== 'off'
			&& $isHttps !== ''
		) {
			return 'https';
		}

		return 'http';
	}

	/**
	 * @return mixed|string
	 */
	public function getHost() {
		$host = 'localhost';
		$forwardedHost = $this->server('HTTP_X_FORWARDED_HOST');
		if ($forwardedHost !== null) {
			$host = $this->getPartBeforeComma($forwardedHost);
		} else {
			$httpHost = $this->server('HTTP_HOST');
			if ($httpHost === null) {
				$serverName = $this->server('SERVER_NAME');
				if ($serverName !== null) {
					$host = $serverName;
				}
			} else {
				$host = $httpHost;
			}
		}
		return $host;
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function postParameter($name) {
		return isset($this->vars['post'][$name]) ? $this->vars['post'][$name] : null;
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function header($name) {
		$name = \strtoupper($name);
		return $this->server('HTTP_'.$name);
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function server($name) {
		return isset($this->vars['headers'][$name]) ? $this->vars['headers'][$name] : null;
	}

	/**
	 * Return first part before comma or the string itself if there is no comma
	 * @param string $str
	 * @return string
	 */
	private function getPartBeforeComma($str) {
		if (\strpos($str, ',') !== false) {
			$parts = \explode(',', $str);
			$result = $parts[0];
		} else {
			$result = $str;
		}
		return \trim($result);
	}
}
