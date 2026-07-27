<?php

namespace Test\legacy;

use OC\Memcache\ArrayCache;
use Test\Memcache\FixedCacheFactory;
use Test\TestCase;

class HelperTest extends TestCase {
	/** @var ArrayCache */
	private $cache;

	protected function setUp(): void {
		parent::setUp();
		$this->cache = new ArrayCache('findBinaryPath');
		$this->overwriteService('MemCacheFactory', new FixedCacheFactory($this->cache));
	}

	protected function tearDown(): void {
		$this->restoreService('MemCacheFactory');
		parent::tearDown();
	}

	/**
	 * A value read back from the cache must not be handed out just because it
	 * is there - a cache an attacker can write to would otherwise hand a
	 * chosen string to the shell commands built from it.
	 *
	 * @dataProvider poisonedBinaryPathProvider
	 * @param mixed $poisoned
	 */
	public function testFindBinaryPathRejectsPoisonedCacheEntry($poisoned): void {
		$this->cache->set('ffmpeg', $poisoned);

		$this->assertNotSame(
			$poisoned,
			\OC_Helper::findBinaryPath('ffmpeg'),
			'a rejected cache entry must never be returned'
		);
		// the bad entry has been replaced by whatever was resolved (or the
		// not-found sentinel), so it cannot be served again
		$this->assertNotSame($poisoned, $this->cache->get('ffmpeg'));
	}

	public function poisonedBinaryPathProvider() {
		return [
			'appended command' => ['/usr/bin/ffmpeg;touch /tmp/oc-pwned'],
			'bare command' => ['; id'],
			'command substitution' => ['$(id)'],
			'does not exist' => ['/nonexistent/ffmpeg'],
			'not executable' => ['/etc/passwd'],
			// is_executable() is true for directories, so is_file() is required
			'directory' => ['/usr/bin'],
			'a different binary' => ['/usr/bin/env'],
			'nul byte' => ["/usr/bin/ffmpeg\0/evil"],
			'empty' => [''],
			'not a string' => [['/usr/bin/ffmpeg']],
			'boolean true' => [true],
		];
	}

	public function testFindBinaryPathUsesValidCachedValue(): void {
		// PHP_BINARY is guaranteed to exist and be executable
		$program = \basename(PHP_BINARY);
		$this->cache->set($program, PHP_BINARY);

		$this->assertSame(PHP_BINARY, \OC_Helper::findBinaryPath($program));
	}

	public function testFindBinaryPathCachesMissWithoutRepeatedLookup(): void {
		$program = 'oc-definitely-no-such-binary';

		$this->assertNull(\OC_Helper::findBinaryPath($program));
		// a miss is remembered, so it is distinguishable from "not looked up yet"
		$this->assertTrue($this->cache->hasKey($program));
		$this->assertNull(\OC_Helper::findBinaryPath($program));
	}

	/**
	 * A legacy null entry - what the previous implementation stored for a miss -
	 * must not be mistaken for a usable path.
	 */
	public function testFindBinaryPathHandlesLegacyNullCacheEntry(): void {
		$this->cache->set('ffmpeg', null);

		$result = \OC_Helper::findBinaryPath('ffmpeg');
		$this->assertTrue($result === null || \is_file($result));
		// the entry has been rewritten, so the legacy value heals itself
		$this->assertNotNull($this->cache->get('ffmpeg'));
	}

	/**
	 * @dataProvider getCleanedPathProvider
	 */
	public function testGetCleanedPath(string $original, string $expected): void {
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
