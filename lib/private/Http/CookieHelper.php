<?php declare(strict_types=1);
/**
 * @author Florian Schade <f.schade@icloud.com>
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

namespace OC\Http;

use OCP\IRequest;


/**
 * Class CookieHelper
 *
 * This Class polyfills cookie to work around samesite restrictions on unsupported browsers.
 * It supports POLYFILL_DETECT mode which tries to detect if the samesite attribute ist supported.
 * It supports POLYFILL_FALLBACK mode which creates a second cookie without samesite attribute.
 *
 * @package OC\Http
 */
class CookieHelper {
	public const SAMESITE_NONE = 'None';
	public const SAMESITE_LAX = 'Lax';
	public const SAMESITE_STRICT = 'Strict';
	public const PATH = 'path';
	public const DOMAIN = 'domain';
	public const EXPIRES = 'expires';
	public const SECURE = 'secure';
	public const HTTPONLY = 'httponly';
	public const SAMESITE = 'samesite';
	public const POLYFILL_DETECT = 'detect';
	public const POLYFILL_FALLBACK = 'fallback';

	public static function setCookie(string $name, string $value = '', array $options = [], string $polyfill = self::POLYFILL_FALLBACK): void {
		// check if given cookie options are allowed
		foreach (array_keys($options) as $option) {
			if (!in_array($option, array(self::PATH, self::DOMAIN, self::EXPIRES, self::SECURE, self::HTTPONLY, self::SAMESITE))) {
				trigger_error(
					'unknown cookie option : ' . $option,
					E_WARNING
				);
			}
		}

		// check if given polyfill mode is supported
		if (!in_array($polyfill, array(self::POLYFILL_DETECT, self::POLYFILL_FALLBACK))) {
			trigger_error(
				'unknown cookie polyfill : ' . $polyfill,
				E_WARNING
			);
		}

		// defaults
		$path = array_key_exists(self::PATH, $options) ? $options[self::PATH] : '';
		$domain = array_key_exists(self::DOMAIN, $options) ? $options[self::DOMAIN] : '';
		$expires = array_key_exists(self::EXPIRES, $options) ? $options[self::EXPIRES] : 0;
		$secure = array_key_exists(self::SECURE, $options) ? $options[self::SECURE] : false;
		$httponly = array_key_exists(self::HTTPONLY, $options) ? $options[self::HTTPONLY] : false;
		$sameSite = array_key_exists(self::SAMESITE, $options) ? $options[self::SAMESITE] : '';
		$header = array(sprintf('Set-Cookie: %s=%s', $name, rawurlencode($value)));

		// disable samesite
		// if samesite is set to none secure is required
		// if polyfill is set to POLYFILL_DETECT and $user_agent does not support samesite
		if (
			$sameSite === self::SAMESITE_NONE && $secure !== true ||
			$polyfill === self::POLYFILL_DETECT && !self::canSameSite()
		) {
			$sameSite = '';
		}

		// create a second cookie to polyfill unsupported browsers
		// if set to POLYFILL_FALLBACK use CookieHelper::getRequestCookie(...)
		// https://web.dev/samesite-cookie-recipes/#handling-incompatible-clients
		if ($polyfill === self::POLYFILL_FALLBACK && $sameSite !== '') {
			unset($options[self::SAMESITE]);
			self::setCookie(self::legacyName($name), $value, $options, self::POLYFILL_DETECT);
		}

		if ($path !== '') {
			array_push($header, sprintf('Path=%s', $path));
		}

		if ($domain !== '') {
			array_push($header, sprintf('Domain=%s', $domain));
		}

		if ($expires > 0) {
			array_push($header, sprintf('Max-Age=%d', $expires));
		}

		if ($secure === true) {
			array_push($header, 'Secure');
		} else {
			$sameSite = '';
		}

		if ($httponly) {
			array_push($header, 'HttpOnly');
		}

		foreach (array(self::SAMESITE_NONE, self::SAMESITE_LAX, self::SAMESITE_STRICT) as $v) {
			if (strtolower($sameSite) === strtolower($v)) {
				array_push($header, sprintf('SameSite=%s', $v));
				break;
			}
		}

		header(implode('; ', $header), false);
	}

	// if polyfill is set to true it returns the cookie legacy name
	private static function legacyName(string $name): string {
		return sprintf('%s-legacy', $name);
	}

	public static function getRequestCookie(IRequest $request, string $name) {
		if (array_key_exists($name, $request->cookies)) {
			return $request->cookies[$name];
		}

		if (array_key_exists(self::legacyName($name), $request->cookies)) {
			return $request->cookies[self::legacyName($name)];
		}

		return null;
	}

	public static function canSameSite($user_agent = ''): bool {
		if ($user_agent === '') {
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
		}

		// check if given user_agent supports samesite
		// https://developer.mozilla.org/de/docs/Web/HTTP/Headers/Set-Cookie/SameSite
		// https://devblogs.microsoft.com/aspnet/upcoming-samesite-cookie-changes-in-asp-net-and-asp-net-core/
		foreach (
			array(
				// chrome
				'#(CriOS|Chrome)/([0-9]*)#' => function ($matches, $user_agent): bool {
					$version = $matches[2];
					return $version < 67;
				},
				// ios
				'#iP.+; CPU .*OS (\d+)_\d#' => function ($matches, $user_agent): bool {
					$version = $matches[1];
					return $version < 13;
				},
				// macos 10.14
				'#Macintosh;.*Mac OS X (\d+)_(\d+)_.*AppleWebKit#' => function ($matches, $user_agent): bool {
					$version_major = $matches[1];
					$version_minor = $matches[2];

					return (
						$version_major == 10 &&
						$version_minor == 14 &&
						(
							preg_match('#Version\/.* Safari\/#', $user_agent) == true ||
							preg_match('#AppleWebKit\/[\.\d]+ \(KHTML, like Gecko\)#', $user_agent) == true
						)
					);
				},
				// uc
				'#UCBrowser/(\d+)\.(\d+)\.(\d+)#' => function ($matches, $user_agent): bool {
					$version_major = $matches[1];
					$version_minor = $matches[2];
					$version_build = $matches[3];
					return !($version_major == 12 && $version_minor == 13 && $version_build == 2);
				},
			) as $regex => $check) {
			if (preg_match($regex, $user_agent, $matches) == true) {
				if ($check($matches, $user_agent)) {
					return false;
				};
			}
		}

		return true;
	}
}