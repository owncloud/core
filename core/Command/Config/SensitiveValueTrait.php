<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace OC\Core\Command\Config;

/**
 * Recognizes config keys which hold secrets, so that commands never echo their
 * value back to the terminal, the container log or the CI log.
 *
 * The authoritative list of known core config keys lives in
 * \OC\SystemConfig::$sensitiveValues and is exact match only. It cannot cover
 * the keys of apps - core does not know them - so these name patterns act as a
 * fallback for anything not on that list, e.g. "wopi.token.key" or the
 * "jwt_secret" of an app.
 */
trait SensitiveValueTrait {
	/**
	 * Substrings which mark a config key as holding a secret. Matched case
	 * insensitively against the key name.
	 *
	 * @var string[]
	 */
	private static $sensitiveNamePatterns = [
		'credential',
		'key',
		'passwd',
		'password',
		'pwd',
		'salt',
		'secret',
		'token',
	];

	/**
	 * Checks whether any of the given config key names indicates a secret.
	 *
	 * @param string ...$names
	 * @return bool
	 */
	protected function isSensitiveKeyName(...$names) {
		foreach ($names as $name) {
			$name = \strtolower((string) $name);
			foreach (self::$sensitiveNamePatterns as $pattern) {
				if (\strpos($name, $pattern) !== false) {
					return true;
				}
			}
		}

		return false;
	}
}
