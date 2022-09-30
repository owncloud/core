<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace Test\Security\SignedUrl;

use OC\Security\SignedUrl\Verifier;
use OCP\IConfig;
use Sabre\HTTP\Request;
use Test\TestCase;

class VerifierTest extends TestCase {
	/**
	 * @dataProvider provider
	 * @param bool $isSignedUrl
	 * @param bool $isUrlValid
	 * @param string $method
	 * @param string $url
	 * @param bool $expired
	 * @param array $trustedDomains
	 */
	public function testSignedUrl(bool $isSignedUrl, bool $isUrlValid, string $method, string $url, bool $expired = false, array $trustedDomains = ['cloud.example.net']): void {
		$r = new Request($method, $url);
		$r->setAbsoluteUrl($url);
		$config = $this->createMock(IConfig::class);
		$config->method('getUserValue')->willReturn('1234567890');
		$config->method('getSystemValue')->willReturn($trustedDomains);
		$now = $expired ? new \DateTime('2020-05-14T11:01:58.135Z', null) : new \DateTime('2019-05-14T11:01:58.135Z', null);
		$v = new Verifier($r, $config, $now);
		if ($isSignedUrl) {
			self::assertTrue($v->isSignedRequest());
			self::assertEquals('alice', $v->getUrlCredential());
			self::assertEquals($isUrlValid, $v->signedRequestIsValid());
		} else {
			self::assertFalse($v->isSignedRequest());
		}
	}

	public function provider(): \Generator {
		yield 'valid url' => [true, true, 'get',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET&OC-Signature=f9e53a1ee23caef10f72ec392c1b537317491b687bfdd224c782be197d9ca2b6'];

		yield 'no signature' => [false, false, 'get',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET'];

		yield 'wrong method' => [true, false, 'post',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET&OC-Signature=f9e53a1ee23caef10f72ec392c1b537317491b687bfdd224c782be197d9ca2b6'];

		yield 'invalid signature' => [true, false, 'get',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET&OC-Signature=f9e53a1ee23caef10f72ec392c1b537317491b687bfdd224c782be197d9ca2b'];

		yield 'different algo' => [true, false, 'post',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET&OC-Algo=PBKDF2/5-SHA512&OC-Signature=f9e53a1ee23caef10f72ec392c1b537317491b687bfdd224c782be197d9ca2b6'];

		yield 'unsupported algo' => [true, false, 'post',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET&OC-Algo=PBKDF2/x-SHA512&OC-Signature=f9e53a1ee23caef10f72ec392c1b537317491b687bfdd224c782be197d9ca2b6'];

		yield 'expired' => [true, false, 'get',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET&OC-Signature=f9e53a1ee23caef10f72ec392c1b537317491b687bfdd224c782be197d9ca2b6', true];

		yield 'not trusted domain' => [true, false, 'get',
			'http://cloud.example.net/?OC-Credential=alice&OC-Date=2019-05-14T11%3A01%3A58.135Z&OC-Expires=1200&OC-Verb=GET&OC-Signature=f9e53a1ee23caef10f72ec392c1b537317491b687bfdd224c782be197d9ca2b6', false, [
			'cloud.example.com'
		]];
	}
}
