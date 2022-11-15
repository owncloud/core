<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files_Sharing\Tests;

use OC\Share20\DefaultShareProvider;
use OCA\Files_Sharing\ExpireSharesJob;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\IManager;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class ExpireSharesJobTest
 *
 * @group DB
 *
 * @package OCA\Files_Sharing\Tests
 */
class ExpireSharesJobTest extends \Test\TestCase {
	/**
	 * @var ExpireSharesJob
	 */
	private $job;

	/**
	 * @var IManager
	 */
	private $shareManager;

	/**
	 * @var \OCP\IDBConnection
	 */
	private $connection;

	/**
	 * @var DefaultShareProvider| MockObject
	 */
	private $defaultShareProvider;

	/**
	 * @var \OCP\Activity\IManager | MockObject
	 */
	private $activityManager;

	/**
	 * @var string
	 */
	private $user1;

	/**
	 * @var string
	 */
	private $user2;

	protected function setUp(): void {
		parent::setUp();

		$this->shareManager =  \OC::$server->getShareManager();
		$this->connection = \OC::$server->getDatabaseConnection();
		// clear occasional leftover shares from other tests
		$this->connection->executeUpdate('DELETE FROM `*PREFIX*share`');
		$this->defaultShareProvider = $this->createMock(DefaultShareProvider::class);
		$this->activityManager = $this->createMock(\OCP\Activity\IManager::class);

		$this->job = new ExpireSharesJob(
			$this->shareManager,
			$this->connection,
			$this->defaultShareProvider,
			$this->activityManager
		);

		$this->user1 = $this->getUniqueID('user1_');
		$this->user2 = $this->getUniqueID('user2_');

		$userManager = \OC::$server->getUserManager();
		$userManager->createUser($this->user1, 'pass');
		$userManager->createUser($this->user2, 'pass');

		\OC::registerShareHooks();
	}

	protected function tearDown(): void {
		$this->connection->executeUpdate('DELETE FROM `*PREFIX*share`');

		$userManager = \OC::$server->getUserManager();
		$user1 = $userManager->get($this->user1);
		if ($user1) {
			$user1->delete();
		}
		$user2 = $userManager->get($this->user2);
		if ($user2) {
			$user2->delete();
		}

		$this->logout();

		parent::tearDown();
	}

	private function getShares() {
		$shares = [];
		$qb = $this->connection->getQueryBuilder();

		$result = $qb->select('*')
			->from('share')
			->execute();

		while ($row = $result->fetch()) {
			$shares[] = $row;
		}
		$result->closeCursor();
		return $shares;
	}

	public function dataExpireShare() {
		return [
			[false,   '', false, false],
			[false,   '',  true, false],
			[true, 'P0D',  true, false],
			[true, 'P1D', false,  true],
			[true, 'P1D',  true, false],
			[true, 'P1W', false,  true],
			[true, 'P1W',  true, false],
			[true, 'P1M', false,  true],
			[true, 'P1M',  true, false],
			[true, 'P1Y', false,  true],
			[true, 'P1Y',  true, false],
		];
	}

	/**
	 * @dataProvider dataExpireShare
	 *
	 * @param bool addExpiration Should we add an expire date
	 * @param string $interval The dateInterval
	 * @param bool $addInterval If true add to the current time if false subtract
	 * @param bool $shouldExpire Should expiration added shares be expired
	 */
	public function testExpireShare($addExpiration, $interval, $addInterval, $shouldExpire) {
		$this->loginAsUser($this->user1);

		$userFolder = \OC::$server->getUserFolder($this->user1);
		$sharedFolder = $userFolder->newFolder('test');

		$shareManager = \OC::$server->getShareManager();
		$linkShare = $shareManager->newShare();
		$linkShare->setSharedBy($this->user1);
		$linkShare->setShareType(\OCP\Share::SHARE_TYPE_LINK);
		$linkShare->setNode($sharedFolder);
		$linkShare->setPermissions(\OCP\Constants::PERMISSION_READ);
		$linkShare = $shareManager->createShare($linkShare);

		$userShare = $shareManager->newShare();
		$userShare->setSharedBy($this->user1);
		$userShare->setSharedWith($this->user2);
		$userShare->setShareType(\OCP\Share::SHARE_TYPE_USER);
		$userShare->setNode($sharedFolder);
		$userShare->setPermissions(\OCP\Constants::PERMISSION_READ);
		$userShare = $shareManager->createShare($userShare);

		$shareWithoutExpiration = $shareManager->newShare();
		$shareWithoutExpiration->setSharedBy($this->user1);
		$shareWithoutExpiration->setShareType(\OCP\Share::SHARE_TYPE_LINK);
		$shareWithoutExpiration->setNode($sharedFolder);
		$shareWithoutExpiration->setPermissions(\OCP\Constants::PERMISSION_READ);
		$shareManager->createShare($shareWithoutExpiration);

		$this->defaultShareProvider->expects($this->any())->method('getShareById')
			->will($this->returnValueMap([
				[$userShare->getId(), null, $userShare],
				[$linkShare->getId(), null, $linkShare]
			]));

		$shares = $this->getShares();
		$this->assertCount(3, $shares);

		if ($addExpiration) {
			$expire = new \DateTime();
			$expire->setTime(0, 0, 0);
			if ($addInterval) {
				$expire->add(new \DateInterval($interval));
			} else {
				$expire->sub(new \DateInterval($interval));
			}
			$expire = $expire->format('Y-m-d 00:00:00');

			// Set expiration to the calculated date
			$qb = $this->connection->getQueryBuilder();
			$qb->update('share')
				->set('expiration', $qb->createParameter('expiration'))
				->where($qb->expr()->eq('id', $qb->createParameter('link_share_id')))
				->orWhere($qb->expr()->eq('id', $qb->createParameter('user_share_id')))
				->setParameter('link_share_id', $linkShare->getId())
				->setParameter('user_share_id', $userShare->getId())
				->setParameter('expiration', $expire)
				->execute();
		}

		$this->logout();

		$this->job->run([]);

		$shares = $this->getShares();

		if ($shouldExpire) {
			$this->assertCount(1, $shares);
		} else {
			$this->assertCount(3, $shares);
		}
	}

	public function testShareNotFound() {
		$this->loginAsUser($this->user1);

		$userFolder = \OC::$server->getUserFolder($this->user1);
		$sharedFolder = $userFolder->newFolder('test');

		$shareManager = \OC::$server->getShareManager();
		$linkShare = $shareManager->newShare();
		$linkShare->setSharedBy($this->user1);
		$linkShare->setShareType(\OCP\Share::SHARE_TYPE_LINK);
		$linkShare->setNode($sharedFolder);
		$linkShare->setPermissions(\OCP\Constants::PERMISSION_READ);
		$linkShare = $shareManager->createShare($linkShare);

		// Set expiration date to yesterday
		$expire = new \DateTime();
		$expire->setTime(0, 0, 0);
		$expire->sub(new \DateInterval('P1D'));
		$expire = $expire->format('Y-m-d 00:00:00');
		$qb = $this->connection->getQueryBuilder();
		$qb->update('share')
			->set('expiration', $qb->createParameter('expiration'))
			->where($qb->expr()->eq('id', $qb->createParameter('link_share_id')))
			->setParameter('link_share_id', $linkShare->getId())
			->setParameter('expiration', $expire)
			->execute();
		$this->defaultShareProvider
			->expects($this->once())
			->method('getShareById')
			->with($linkShare->getId())
			->willThrowException(new ShareNotFound());
		$this->logout();

		$this->job->run([]);
	}
}
