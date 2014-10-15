<?php
/**
 * Copyright (c) 2014 Clark Tomlinson <clark@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

/**
 * Starts a new session before each test execution
 */
class ConnectionCloseListener implements PHPUnit_Framework_TestListener {

	public function addError(PHPUnit_Framework_Test $test, Exception $e, $time) {
	}

	public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time) {
	}

	public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time) {
	}

	public function addRiskyTest(PHPUnit_Framework_Test $test, Exception $e, $time) {
	}

	public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time) {
	}

	public function startTest(PHPUnit_Framework_Test $test) {
	}

	public function endTest(PHPUnit_Framework_Test $test, $time) {
	}

	public function startTestSuite(PHPUnit_Framework_TestSuite $suite) {
	}

	public function endTestSuite(PHPUnit_Framework_TestSuite $suite) {
		// Close the db connection.
		\OC_DB::getConnection()->close();
	}

}
