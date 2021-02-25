<?php

namespace Test\Http;

use OC\Http\CookieHelper;
use Test\TestCase;

class CookieHelperTest extends TestCase {

	/** @var CookieHelper $sut */
	private $sut;

	public function userAgentProvider() {
		return [
			["Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.4324.152 Safari/537.36", false],
			["Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.152 Safari/537.36", true],
			["Mozilla/5.0 (iPhone; CPU iPhone OS 12_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148", false],
			["Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148", true],
			["Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1.2 Safari/605.1.15", true],
			["Mozilla/5.0 (Linux; U; Android 6.0.1; zh-CN; F5121 Build/34.0.A.1.247) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/40.0.2214.89 UCBrowser/12.13.2.944 Mobile Safari/537.36", false],
		];
	}

	/**
	 * @dataProvider userAgentProvider
	 */
	public function testCanSameSite($ua, $canSameSite) {
		$this->sut = new CookieHelper();
		$this->assertTrue($this->sut->canSameSite($ua) == $canSameSite);
	}
}
