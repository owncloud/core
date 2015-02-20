<?php

/**
 * Copyright (c) 2014 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
class Test_OC_Connector_Sabre_Locks extends PHPUnit_Framework_TestCase {

	/**
	 * @var OC_Connector_Sabre_Locks
	 */
	private $backend;

	/**
	 * @var string
	 */
	private $lockUser;

	protected function setUp() {

		$this->lockUser = uniqid('lock-user-');
		$this->backend = new OC_Connector_Sabre_Locks();
		$this->loginHelper($this->lockUser);

	}

	public function testSimpleLock() {
		$info = new \Sabre\DAV\Locks\LockInfo();
		$info->token = uniqid('lt');
		$info->owner = $this->lockUser;
		$result = $this->backend->lock('test.txt', $info);
		$this->assertTrue($result);

		$locks = $this->backend->getLocks('test.txt', false);
		$this->assertEquals(1, count($locks));

		$result = $this->backend->unlock('test.txt', $info);
		$this->assertTrue($result);

		$locks = $this->backend->getLocks('test.txt', false);
		$this->assertEquals(0, count($locks));
	}

	public static function loginHelper($user) {
		try {
			\OC_User::createUser($user, $user);
		} catch(\Exception $e) {
		}

		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		\OC\Files\Filesystem::tearDown();
		\OC_User::setUserId($user);
		\OC_Util::setupFS($user);
	}

}
