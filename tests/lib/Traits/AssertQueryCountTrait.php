<?php

namespace Test\Traits;

use Closure;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertGreaterThan;
use function PHPUnit\Framework\assertLessThan;
use function PHPUnit\Framework\assertTrue;

trait AssertQueryCountTrait {
	private static bool $trackingStarted = false;
	public function assertNoQueriesExecuted(?Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		self::ensureTacking();
		$this->assertQueryCountMatches(0);

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public function assertQueryCountMatches(int $count, ?Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		self::ensureTacking();
		assertEquals($count, self::getQueryCount());

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public function assertQueryCountLessThan(int $count, ?Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		self::ensureTacking();
		assertLessThan($count, self::getQueryCount());

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public function assertQueryCountGreaterThan(int $count, ?Closure $closure = null): void {
		if ($closure) {
			self::trackQueries();

			$closure();
		}

		self::ensureTacking();
		assertGreaterThan($count, self::getQueryCount());

		if ($closure) {
			self::flushQueryLog();
		}
	}

	public static function trackQueries(): void {
		self::flushQueryLog();
		\OC::$server->getQueryLogger()->activate();
		self::$trackingStarted = true;
	}

	public static function getQueriesExecuted(): array {
		return \OC::$server->getQueryLogger()->getQueries();
	}

	public static function getQueryCount(): int {
		return \count(self::getQueriesExecuted());
	}

	private static function flushQueryLog(): void {
		\OC::$server->getQueryLogger()->flush();
	}

	private static function ensureTacking(): void {
		assertTrue(self::$trackingStarted, "SQl query tracking not enabled.");
	}
}
