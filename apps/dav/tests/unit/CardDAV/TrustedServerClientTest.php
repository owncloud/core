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

namespace OCA\DAV\Tests\unit\CardDAV;

use OCA\DAV\CardDAV\TrustedServerClient;
use Sabre\HTTP\Request;
use Test\TestCase;

class TrustedServerClientTest extends TestCase {
	public function sameOriginProvider() {
		$trusted = 'https://peer.example.com';
		return [
			// what a real ownCloud peer reports
			'absolute path' => [$trusted, '/remote.php/dav/x.vcf', true],
			'relative path' => [$trusted, 'remote.php/dav/x.vcf', true],
			'absolute url' => [$trusted, 'https://peer.example.com/x.vcf', true],
			'explicit default port' => [$trusted, 'https://peer.example.com:443/x.vcf', true],
			'host in a different case' => [$trusted, 'https://PEER.example.com/x.vcf', true],
			'scheme in a different case' => [$trusted, 'HTTPS://peer.example.com/x.vcf', true],
			'another host' => [$trusted, 'http://other.example.com/x.vcf', false],
			'protocol relative' => [$trusted, '//other.example.com/x.vcf', false],
			'another scheme' => [$trusted, 'file:///x.vcf', false],
			'another port' => [$trusted, 'https://peer.example.com:8443/x.vcf', false],
			'trusted host as userinfo only' => [$trusted, 'https://peer.example.com@other.example.com/x', false],
			'scheme downgrade' => [$trusted, 'http://peer.example.com/x.vcf', false],
			// a subfolder install reports paths from the server root
			'subfolder install' => ['https://peer.example.com/owncloud', '/owncloud/remote.php/dav/x.vcf', true],
			// the one scheme change worth following: a plain http server
			// redirecting to its own https site
			'scheme upgrade' => ['http://peer.example.com', 'https://peer.example.com/x.vcf', true],
			'scheme upgrade off the default port' => ['http://peer.example.com:8080', 'https://peer.example.com/x.vcf', false],
			'scheme upgrade to a non default port' => ['http://peer.example.com', 'https://peer.example.com:8443/x.vcf', false],
			'scheme upgrade to another host' => ['http://peer.example.com', 'https://other.example.com/x.vcf', false],
		];
	}

	/**
	 * A base url whose origin cannot be read must fail closed - otherwise every
	 * comparison against it trivially succeeds and the check disappears.
	 *
	 * @return array
	 */
	public function unusableBaseUrlProvider() {
		return [
			'empty' => [''],
			'no scheme' => ['peer.example.com'],
			'path only' => ['/remote.php/dav'],
			// parses to an empty host rather than a null one
			'triple slash' => ['http:///remote.php'],
		];
	}

	/**
	 * @dataProvider unusableBaseUrlProvider
	 * @param string $trustedUrl
	 */
	public function testIsSameOriginRejectsUnusableBaseUrl($trustedUrl) {
		$this->assertFalse(TrustedServerClient::isSameOrigin($trustedUrl, '/remote.php/dav/x.vcf'));
		$this->assertFalse(TrustedServerClient::isSameOrigin($trustedUrl, 'http://other.example.com/'));
	}

	/**
	 * @dataProvider sameOriginProvider
	 * @param string $trustedUrl
	 * @param string $url
	 * @param bool $expected
	 */
	public function testIsSameOrigin($trustedUrl, $url, $expected) {
		$this->assertSame($expected, TrustedServerClient::isSameOrigin($trustedUrl, $url));
	}

	public function testIsSameOriginRejectsUnparseableUrl() {
		$this->assertFalse(TrustedServerClient::isSameOrigin('https://peer.example.com', 'http://'));
	}

	public function testForLogStripsNewlines() {
		$this->assertSame(
			'http://other.example.com/x trailing text',
			TrustedServerClient::forLog("http://other.example.com/x\ntrailing text")
		);
		// \r and \n each become a space, so crlf leaves two
		$this->assertSame('a  b', TrustedServerClient::forLog("a\r\nb"));
		$this->assertSame('unchanged/x.vcf', TrustedServerClient::forLog('unchanged/x.vcf'));
	}

	/**
	 * The client must refuse to send a request which has left the trusted
	 * server, however it got there - a reported href is only one of the ways,
	 * since Sabre\HTTP\Client resolves a Location header and re-issues the
	 * request itself.
	 *
	 * The guard has to reject before the request is handed to curl, so this
	 * needs no network: reaching the network at all would be the failure.
	 */
	public function testDoRequestRefusesToLeaveTheTrustedServer() {
		$client = new class(['baseUri' => 'https://peer.example.com'], 'https://peer.example.com') extends TrustedServerClient {
			public function doRequestForTest(Request $request) {
				return $this->doRequest($request);
			}
		};

		$this->expectException(\RuntimeException::class);
		$this->expectExceptionMessage('Refusing to request http://other.example.com/x.vcf');

		$client->doRequestForTest(new Request('GET', 'http://other.example.com/x.vcf'));
	}
}
