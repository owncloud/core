<?php

namespace Test\legacy;

use Test\TestCase;

class HelperTest extends TestCase {

	/**
	 * @dataProvider getCleanedPathProvider
	 * @param string $original
	 * @param string $expected
	 */
	public function testGetCleanedPath($original, $expected) {
		$this->assertSame($expected, \OC_Helper::getCleanedPath($original), 'Returned system path is not what was expected.');
	}

	public function getCleanedPathProvider() {
		return [
			[
				"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/bin:/usr/games:-exec:whoami:/usr/gaming;",
				"/usr/local/sbin /usr/local/bin /usr/sbin /usr/bin /bin /usr/games /usr/gaming",
			],
			[
				"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/bin:/usr/games:;rm -rvf;:/usr/gaming;",
				"/usr/local/sbin /usr/local/bin /usr/sbin /usr/bin /bin /usr/games /usr/gaming",
			],
			[
				"",
				"/usr/local/bin /usr/bin /opt/bin /bin",
			],
			[
				null,
				"/usr/local/bin /usr/bin /opt/bin /bin",
			],
			[
				false,
				"/usr/local/bin /usr/bin /opt/bin /bin",
			],
			[
				false,
				"/usr/local/bin /usr/bin /opt/bin /bin",
			],
			[
				"-exec:whoami",
				"/usr/local/bin /usr/bin /opt/bin /bin",
			],
			[
				"-exec:whoami:",
				"/usr/local/bin /usr/bin /opt/bin /bin",
			],
		];
	}
}
