<?php
/**
 * Copyright (c) 2015 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Security;

use OC\Security\TrustedDomainHelper;
use OCP\IConfig;
use Test\TestCase;

/**
 * Class TrustedDomainHelperTest
 */
class TrustedDomainHelperTest extends TestCase {
	/** @var IConfig */
	protected $config;

	protected function setUp(): void {
		parent::setUp();

		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
	}

	public function testIsUrlTrusted(): void {
		$trustedHostTestList = [
			'host.one.test',
			'host.two.test',
			'[1fff:0:a88:85a3::ac1f]',
			'host.three.test:443',
		];
		$this->config
			->method('getSystemValue')
			->with('trusted_domains')
			->willReturn($trustedHostTestList);

		$trustedDomainHelper = new TrustedDomainHelper($this->config);
		$this->assertTrue($trustedDomainHelper->isUrlTrusted("http://host.one.test/index.php/s/123456"));
		$this->assertTrue($trustedDomainHelper->isUrlTrusted("http://host.one.test:1234/index.php/s/123456"));
		$this->assertTrue($trustedDomainHelper->isUrlTrusted("http://host.three.test:443/index.php/s/123456"));
		$this->assertFalse($trustedDomainHelper->isUrlTrusted(""));
	}

	/**
	 * @dataProvider trustedDomainDataProvider
	 */
	public function testIsTrustedDomain($trustedDomains, string $testDomain, bool $result): void {
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('trusted_domains')
			->willReturn($trustedDomains);

		$trustedDomainHelper = new TrustedDomainHelper($this->config);
		$this->assertEquals($result, $trustedDomainHelper->isTrustedDomain($testDomain));
	}

	public function trustedDomainDataProvider(): array {
		$trustedHostTestList = [
			'host.one.test',
			'host.two.test',
			'[1fff:0:a88:85a3::ac1f]',
			'host.three.test:443',
		];
		return [
			// empty defaults to false with 8.1
			[null, 'host.one.test:8080', false],
			['', 'host.one.test:8080', false],
			[[], 'host.one.test:8080', false],
			// trust list when defined
			[$trustedHostTestList, 'host.two.test:8080', true],
			[$trustedHostTestList, 'host.two.test:9999', true],
			[$trustedHostTestList, 'host.three.test:8080', false],
			[$trustedHostTestList, 'host.two.test:8080:aa:222', false],
			[$trustedHostTestList, '[1fff:0:a88:85a3::ac1f]', true],
			[$trustedHostTestList, '[1fff:0:a88:85a3::ac1f]:801', true],
			[$trustedHostTestList, '[1fff:0:a88:85a3::ac1f]:801:34', false],
			[$trustedHostTestList, 'host.three.test:443', true],
			[$trustedHostTestList, 'host.three.test:80', false],
			[$trustedHostTestList, 'host.three.test', false],
			// trust localhost regardless of trust list
			[$trustedHostTestList, 'localhost', true],
			[$trustedHostTestList, 'localhost:8080', true],
			[$trustedHostTestList, '127.0.0.1', true],
			[$trustedHostTestList, '127.0.0.1:8080', true],
			// do not trust invalid localhosts
			[$trustedHostTestList, 'localhost:1:2', false],
			[$trustedHostTestList, 'localhost: evil.host', false],
			// do not trust casting
			[[1], '1', false],
		];
	}
}
