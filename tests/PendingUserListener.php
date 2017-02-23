<?php
/**
 * Copyright (c) 2017 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class PendingUserListener implements PHPUnit_Framework_TestListener {

	/** @var string[] */
	private $knownUsers;

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
		$this->knownUsers = array_map(function (\OCP\IUser $user) {
			return $user->getUID();
		}, \OC::$server->getUserManager()->search(''));
	}

	public function endTestSuite(PHPUnit_Framework_TestSuite $suite) {
		$currentUsers = array_map(function (\OCP\IUser $user) {
			return $user->getUID();
		}, \OC::$server->getUserManager()->search(''));
		$diff = array_diff($currentUsers, $this->knownUsers);
		if (!empty($diff)) {
			$test = $suite->getName();
			PHPUnit_Framework_Assert::assertEquals($this->knownUsers, $currentUsers, "$test: Users have not been clean up properly: " . implode(' ', $diff));
		}
	}

	public function addWarning(\PHPUnit_Framework_Test $test, \PHPUnit_Framework_Warning $e, $time) {
	}

}
