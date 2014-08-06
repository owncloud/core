<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;


class User extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \OC_User_Backend | \PHPUnit_Framework_MockObject_MockObject $backend
	 */
	private $backend;

	protected function setUp() {
		$this->backend = $this->getMock('\OC_User_Dummy');
		$manager = \OC_User::getManager();
		$manager->registerBackend($this->backend);
	}

	public function testCheckPassword() {

		/**
		 * Verify that password_compat can accept legacy phpass hashes
		 * key = plaintext password
		 * val = hash from phpass
		 */
		$passes = array(
				'r1TLAYYPIhzqpRH' => '$2a$08$MK8CNRbaqlcjbQVchklG1eHmqsm2Qge00bUrq5SMo7Swn11AVO4o2',
				'jio0FuK1c2YIpc' => '$2a$08$jUIoz.AYeiJ5k4cOGKyPb.VIt4wnTeaNY460Jc7.FyyCz/nZjHuHi',
				'yRHhiflGpDWOa' => '$2a$08$huQVCsKeTPquzYNfyvDQR.jp9d6tNGcSYwTmV1InpkOTQXoT0qigO',
				'bqwyBEXVmyHz' => '$2a$08$sLrFBq86qlOU28bL.XuBgewwBVGR7wUO0QR7qEaCFAqnj/atIW6FO',
				'6SiKUhEeHiR' => '$2a$08$XHvJdJC7d4Q11QIYR7Gl4OC.FNkJOewhitRFDEVoYaerCv17EqA/e',
				'pjN4ijSYtl' => '$2a$08$9.C/6byxWNBFAEEKnDlzOu//wYhrP/hJ0uZH2DQDhtYEhX.nwfYoW',
				'wJGnOLJGC' => '$2a$08$nci16BoJcX71Q6Yiievk4uEN8mUcaLzQx8tCUiiW4eZ1R8x1DJQM6',
				'ALqkm3bv' => '$2a$08$vhaV5SXQT9pkN14xa2H5xu2rs1fYQQJTO1ZlUYR5a/Na8URnfbzVu',
				'LGZNEEN' => '$2a$08$YLxcohzMXo3oxp9WFCn3PevRrozP1kiH3u3ZPAImLtcTnxREA5HfS',
				'EMu3Tu' => '$2a$08$qMhZKB2xOQq3xY/chWiGj.6NcDUEpig9wOhA2zcQI.K7rAWzOJzum'
		);

		// Statically set salt as it would differ between each installation and make this untestable
		$salt = 'b710fa552160d82221b5871ce73979';


		foreach ($passes as $key => $val) {
			$this->assertTrue(password_verify($key . $salt, $val));
		}


		$this->backend->expects($this->once())
			->method('checkPassword')
			->with($this->equalTo('foo'), $this->equalTo('bar'))
			->will($this->returnValue('foo'));

		$this->backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === \OC_USER_BACKEND_CHECK_PASSWORD) {
					return true;
				} else {
					return false;
				}
			}));

		$uid = \OC_User::checkPassword('foo', 'bar');
		$this->assertEquals($uid, 'foo');
	}

	public function testDeleteUser() {
		$fail = \OC_User::deleteUser('victim');
		$this->assertFalse($fail);

		$success = \OC_User::createUser('victim', 'password');

		$success = \OC_User::deleteUser('victim');
		$this->assertTrue($success);
	}

	public function testCreateUser() {
		$this->backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === \OC_USER_BACKEND_CREATE_USER) {
					return true;
				} else {
					return false;
				}
			}));

		$user = \OC_User::createUser('newuser', 'newpassword');
		$this->assertEquals('newuser', $user->getUid());
	}

}