<?php

namespace Test\Traits;

use Closure;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertGreaterThan;
use function PHPUnit\Framework\assertLessThan;

trait AssertQueryCountTrait {
	public function assertNoQueriesExecuted(Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		$this->assertQueryCountMatches(0);

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public function assertQueryCountMatches(int $count, Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		assertEquals($count, self::getQueryCount());

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public function assertQueryCountLessThan(int $count, Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		assertLessThan($count, self::getQueryCount());

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public function assertQueryCountGreaterThan(int $count, Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		assertGreaterThan($count, self::getQueryCount());

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public static function trackQueries(): void {
		self::flushQueryLog();
		\OC::$server->getQueryLogger()->activate();
	}

	public static function getQueriesExecuted(): array {
		return \OC::$server->getQueryLogger()->getQueries();
	}

	public static function getQueryCount(): int {
		return \count(self::getQueriesExecuted());
	}

	private static function flushQueryLog() {
		\OC::$server->getQueryLogger()->flush();
	}
}
