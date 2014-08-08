<?php
/**
 * Copyright (c) 2013 Andreas Fischer <bantu@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC;

/**
 * Helper class for various HTTP stuff.
 */
class HTTPHelper {
	function getHeaderFromArray($array, $key) {
		foreach ($array as $line) {
			if (stripos($line, $key) === false) {
				if ($key === '') {
					return $line;
				}
			} else {
				$split = explode(':', $line, 2);
				return trim($split[1]);
			}
		}

		return null;
	}

	function getHeaderFromString($string, $key) {
		return $this->getHeaderFromArray(explode("\r\n", $string), $key);
	}
}
