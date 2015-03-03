<?php
/**
 * Copyright (c) 2015 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\BackgroundJob;

use OCA\Files_sharing\Lib\DeleteOrphanedSharesJob;

class DeleteOrphanedSharesJobTest extends \Test\TestCase {

	/**
	 * @var DeleteOrphanedSharesJob
	 */
	private $job;

	/**
	 * @var \OCP\IDBConnection
	 */
	private $connection;

	/**
	 * @var string
	 */
	private $user1;

	/**
	 * @var string
	 */
	private $user2;

	protected function setup() {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();

		$this->user1 = $this->getUniqueID('user1_');
		$this->user2 = $this->getUniqueID('user2_');
		\OC_User::createUser($this->user1, 'pass');
		\OC_User::createUser($this->user2, 'pass');

		\OC::registerShareHooks();

		$this->job = new DeleteOrphanedSharesJob();
	}

	protected function tearDown() {
		$this->connection->executeUpdate('DELETE FROM `*PREFIX*share` WHERE `item_type` in (\'file\', \'folder\')');

		\OC_User::deleteUser($this->user1);
		\OC_User::deleteUser($this->user2);

		$this->logout();

		parent::tearDown();
	}

	private function getShares() {
		$shares = [];
		$result = $this->connection->executeQuery('SELECT * FROM `*PREFIX*share` WHERE `item_type` in (\'file\', \'folder\')');
		while ($row = $result->fetch()) {
			$shares[] = $row;
		}
		$result->closeCursor();
		return $shares;
	}

	/**
	 * Test clearing orphaned shares
	 */
	public function testClearShares() {
		$this->loginAsUser($this->user1);

		$view = new \OC\Files\View('/' . $this->user1 . '/');
		$view->mkdir('files/test');
		$view->mkdir('files/test/sub');

		$fileInfo = $view->getFileInfo('files/test/sub');
		$fileId = $fileInfo->getId();

		$this->assertTrue(
			\OCP\Share::shareItem('folder', $fileId, \OCP\Share::SHARE_TYPE_USER, $this->user2, \OCP\Constants::PERMISSION_READ),
			'Failed asserting that user 1 successfully shared "test/sub" with user 2.'
		);

		$this->assertCount(1, $this->getShares());

		$this->job->run([]);

		$this->assertCount(1, $this->getShares(), 'Linked shares not deleted');

		$view->unlink('files/test');

		$this->job->run([]);

		$this->assertCount(0, $this->getShares(), 'Orphaned shares deleted');
	}
}

