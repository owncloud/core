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

namespace OCA\DAV\CardDAV;

use Sabre\DAV\Client;
use Sabre\HTTP\RequestInterface;

/**
 * A DAV client which only ever talks to the one trusted server it was built
 * for.
 *
 * Neither the hrefs a server reports nor the responses it sends decide on their
 * own which url is requested: an href carrying its own scheme or authority
 * replaces the base uri of the request entirely, and Sabre\HTTP\Client resolves
 * a Location header and re-issues the request itself, up to five times.
 *
 * Every url the client is about to hand to curl passes through
 * createCurlSettingsArray(), whether it came from send() - redirect hops
 * included - or from sendAsync(), so this is the one place where the scope can
 * be enforced for all of them at once.
 */
class TrustedServerClient extends Client {
	/** @var string */
	private $trustedUrl;

	/**
	 * @param array $settings as accepted by \Sabre\DAV\Client
	 * @param string $trustedUrl base url of the trusted server
	 */
	public function __construct(array $settings, $trustedUrl) {
		parent::__construct($settings);
		$this->trustedUrl = $trustedUrl;
	}

	/**
	 * @param RequestInterface $request
	 * @return array
	 * @throws \RuntimeException if the request would leave the trusted server
	 */
	protected function createCurlSettingsArray(RequestInterface $request): array {
		$url = $request->getUrl();
		if (!self::isSameOrigin($this->trustedUrl, $url)) {
			// Not a ClientException - Sabre\HTTP\Client catches those and hands
			// them to its exception handlers, which are allowed to retry. The
			// url is the trusted server's own text and this message is logged,
			// so it goes through forLog().
			throw new \RuntimeException(
				'Refusing to request ' . self::forLog($url) . ": not on trusted server {$this->trustedUrl}"
			);
		}

		return parent::createCurlSettingsArray($request);
	}

	/**
	 * A url a trusted server supplied, made safe to put in a log message: a
	 * href or a Location can carry newlines, and a log line is one line.
	 *
	 * @param string $url
	 * @return string
	 */
	public static function forLog($url) {
		return \str_replace(["\r", "\n"], ' ', (string)$url);
	}

	/**
	 * Whether a url reported by a trusted server points at that same trusted
	 * server. The url is resolved the same way the client resolves it, so that
	 * this check and the request which follows it cannot disagree about the
	 * target.
	 *
	 * @param string $trustedUrl base url of the trusted server
	 * @param string $url absolute url, or href relative to $trustedUrl
	 * @return bool
	 */
	public static function isSameOrigin($trustedUrl, $url) {
		try {
			$base = \Sabre\Uri\parse($trustedUrl);
			$target = \Sabre\Uri\parse(\Sabre\Uri\resolve($trustedUrl, $url));
		} catch (\Sabre\Uri\InvalidUriException $e) {
			return false;
		}

		// An origin we cannot read is not an origin we can compare against, so
		// refuse rather than let every comparison below trivially succeed. Note
		// that a triple slash url such as "http:///remote.php" parses to an
		// empty host rather than a null one, and would otherwise match every
		// other hostless target.
		if (($base['scheme'] ?? '') === '' || ($base['host'] ?? '') === '') {
			return false;
		}

		// host is case insensitive, see RFC 3986
		if (\strcasecmp($base['host'], (string)$target['host']) !== 0) {
			return false;
		}

		// so is scheme
		$baseScheme = \strtolower($base['scheme']);
		$targetScheme = \strtolower((string)$target['scheme']);
		if ($baseScheme === $targetScheme) {
			return self::getPort($base) === self::getPort($target);
		}

		// A plain http trusted server redirecting to its own https site is the
		// one scheme change worth following: same host, and strictly better
		// transport. A downgrade, or a move to some other port, is not.
		return $baseScheme === 'http' && $targetScheme === 'https'
			&& self::getPort($base) === 80 && self::getPort($target) === 443;
	}

	/**
	 * The port of a uri, falling back to the default port of its scheme, so
	 * that an explicit ":443" is not mistaken for a different origin.
	 *
	 * @param array $uri as returned by \Sabre\Uri\parse
	 * @return int|null
	 */
	private static function getPort($uri) {
		if ($uri['port'] !== null) {
			return (int)$uri['port'];
		}
		switch (\strtolower((string)$uri['scheme'])) {
			case 'https':
				return 443;
			case 'http':
				return 80;
		}
		return null;
	}
}
