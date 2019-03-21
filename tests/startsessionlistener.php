<?php
/**
 * Copyright (c) 2014 Thomas Müller <deepdiver@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

/**
 * Starts a new session before each test execution
 */
class StartSessionListener implements PHPUnit\Framework\TestListener {
	public function addError(PHPUnit\Framework\Test $test, Exception $e, $time) {
	}

	public function addFailure(PHPUnit\Framework\Test $test, PHPUnit\Framework\AssertionFailedError $e, $time) {
	}

	public function addIncompleteTest(PHPUnit\Framework\Test $test, Exception $e, $time) {
	}

	public function addRiskyTest(PHPUnit\Framework\Test $test, Exception $e, $time) {
	}

	public function addSkippedTest(PHPUnit\Framework\Test $test, Exception $e, $time) {
	}

	public function startTest(PHPUnit\Framework\Test $test) {
	}

	public function endTest(PHPUnit\Framework\Test $test, $time) {
		// reopen the session - only allowed for memory session
		if (\OC::$server->getSession() instanceof \OC\Session\Memory) {
			/** @var $session \OC\Session\Memory */
			$session = \OC::$server->getSession();
			$session->reopen();
		}
	}

	public function startTestSuite(PHPUnit\Framework\TestSuite $suite) {
	}

	public function endTestSuite(PHPUnit\Framework\TestSuite $suite) {
	}

	public function addWarning(\PHPUnit\Framework\Test $test, \PHPUnit\Framework\Warning $e, $time) {
	}
}
