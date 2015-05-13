<?php
/**
 * Copyright (c) 2015 Thomas Müller <deepdiver@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\App\CodeChecker;

use OC;
use Test\TestCase;
use OC\App\CodeChecker\Exception\Error;
use OC\App\CodeChecker\Exception\HardFail;
use OC\App\CodeChecker\Exception\SoftFail;

class CodeChecker extends TestCase {

	/**
	 * @dataProvider providesFilesToCheck
	 * @param Error $expectedError
	 * @param $fileToVerify
	 */
	public function testFindInvalidUsage(Error $expectedError, $fileToVerify) {
		$checker = new OC\App\CodeChecker\CodeChecker();
		/** @var Error[] $errors */
		$errors = $checker->analyseFile(OC::$SERVERROOT . "/tests/data/app/code-checker/$fileToVerify");

		$this->assertEquals(1, count($errors));
		$this->assertEquals($expectedError, $errors[0]);
	}

	/**
	 * @return array
	 */
	public function providesFilesToCheck() {
		$extendsFail = new HardFail();
		$extendsFail->addLine(6);
		$extendsFail->addMessage('Extending a private class is not supported.');
		$extendsFail->addCode(1000);
		$extendsFail->addDisallowedToken('OC_Hook');

		$implementsFail = new HardFail();
		$implementsFail->addLine(7);
		$implementsFail->addMessage('Implementing a private class is not supported.');
		$implementsFail->addCode(1001);
		$implementsFail->addDisallowedToken('oC_Avatar');

		$staticFail = new HardFail();
		$staticFail->addLine(8);
		$staticFail->addMessage('Using a private method in a static call is not supported.');
		$staticFail->addCode(1002);
		$staticFail->addDisallowedToken('OC_App');

		$constFail = new HardFail();
		$constFail->addLine(8);
		$constFail->addMessage('Using a private constant is not supported.');
		$constFail->addCode(1003);
		$constFail->addDisallowedToken('OC_API');

		$newFail = new HardFail();
		$newFail->addLine(8);
		$newFail->addMessage('Instantiating a private class is not supported.');
		$newFail->addCode(1004);
		$newFail->addDisallowedToken('OC_AppConfig');

		$equalFail = new SoftFail();
		$equalFail->addLine(8);
		$equalFail->addMessage('== usage not allowed');
		$equalFail->addCode(1005);
		$equalFail->addDisallowedToken('==');

		$notEqualFail = new SoftFail();
		$notEqualFail->addLine(8);
		$notEqualFail->addMessage('!= usage not allowed');
		$notEqualFail->addCode(1005);
		$notEqualFail->addDisallowedToken('!=');

		return [
			[
				$extendsFail,
				'test-extends.php',
			],
			[
				$implementsFail,
				'test-implements.php',
			],
			[
				$staticFail,
				'test-static-call.php',
			],
			[
				$constFail,
				'test-const.php',
			],
			[
				$newFail,
				'test-new.php',
			],
			[
				$equalFail,
				'test-equal.php',
			],
			[
				$notEqualFail,
				'test-not-equal.php',
			],
		];
	}

	/**
	 * @dataProvider validFilesData
	 * @param $fileToVerify
	 */
	public function testPassValidUsage($fileToVerify) {
		$checker = new OC\App\CodeChecker\CodeChecker();
		$errors = $checker->analyseFile(OC::$SERVERROOT . "/tests/data/app/code-checker/$fileToVerify");

		$this->assertEquals(0, count($errors));
	}

	public function validFilesData() {
		return [
			['test-identical-operator.php'],
		];
	}
}
