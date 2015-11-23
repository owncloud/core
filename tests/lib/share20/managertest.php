<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace Test\Share20;

use OC\Share20\Manager;
use OC\Share20\Exception;


use OCP\IUser;
use OCP\IUserManager;
use OCP\IGroupManager;
use OCP\ILogger;
use OCP\IConfig;
use OCP\Files\Folder;
use OCP\Share20\IShareProvider;
use OCP\Security\IHasher;
use OCP\Security\ISecureRandom;

class ManagerTest extends \Test\TestCase {

	/** @var Manager */
	protected $manager;

	/** @var IUser */
	protected $user;

	/** @var IUserManager */
	protected $userManager;

	/** @var IGroupManager */
	protected $groupManager;

	/** @var ILogger */
	protected $logger;

	/** @var IAppConfig */
	protected $config;

	/** @var Folder */
	protected $userFolder;

	/** @var IHasher */
	protected $hasher;

	/** @var IShareProvider */
	protected $defaultProvider;

	/** @var ISecureRandom */
	protected $secureRandom;

	public function setUp() {
		
		$this->user = $this->getMock('\OCP\IUser');
		$this->userManager = $this->getMock('\OCP\IUserManager');
		$this->groupManager = $this->getMock('\OCP\IGroupManager');
		$this->logger = $this->getMock('\OCP\ILogger');
		$this->config = $this->getMock('\OCP\IConfig');
		$this->userFolder = $this->getMock('\OCP\Files\Folder');
		$this->hasher = $this->getMock('\OCP\Security\IHasher');
		$this->defaultProvider = $this->getMock('\OC\Share20\IShareProvider');

		$this->secureRandom = $this->getMock('\OCP\Security\ISecureRandom');
		$this->secureRandom->method('getMediumStrengthGenerator')->will($this->returnSelf());

		$this->manager = new Manager(
			$this->user,
			$this->userManager,
			$this->groupManager,
			$this->logger,
			$this->config,
			$this->userFolder,
			$this->defaultProvider,
			$this->hasher,
			$this->secureRandom
		);
	}

	/**
	 * @expectedException OC\Share20\Exception\ShareNotFound
	 */
	public function testDeleteNoShareId() {
		$share = $this->getMock('\OC\Share20\IShare');

		$share
			->expects($this->once())
			->method('getId')
			->with()
			->willReturn(null);

		$this->manager->deleteShare($share);
	}

	public function dataTestDelete() {
		$user = $this->getMock('\OCP\IUser');
		$user->method('getUID')->willReturn('sharedWithUser');

		$group = $this->getMock('\OCP\IGroup');
		$group->method('getGID')->willReturn('sharedWithGroup');
	
		return [
			[\OCP\Share::SHARE_TYPE_USER, $user, 'sharedWithUser'],
			[\OCP\Share::SHARE_TYPE_GROUP, $group, 'sharedWithGroup'],
			[\OCP\Share::SHARE_TYPE_LINK, '', ''],
			[\OCP\Share::SHARE_TYPE_REMOTE, 'foo@bar.com', 'foo@bar.com'],
		];
	}

	/**
	 * @dataProvider dataTestDelete
	 */
	public function testDelete($shareType, $sharedWith, $sharedWith_string) {
		$manager = $this->getMockBuilder('\OC\Share20\Manager')
			->setConstructorArgs([
				$this->user,
				$this->userManager,
				$this->groupManager,
				$this->logger,
				$this->config,
				$this->userFolder,
				$this->defaultProvider,
				$this->hasher,
				$this->secureRandom
			])
			->setMethods(['getShareById', 'deleteChildren'])
			->getMock();

		$sharedBy = $this->getMock('\OCP\IUser');
		$sharedBy->method('getUID')->willReturn('sharedBy');

		$path = $this->getMock('\OCP\Files\File');
		$path->method('getId')->willReturn(1);

		$share = $this->getMock('\OC\Share20\IShare');
		$share->method('getId')->willReturn(42);
		$share->method('getShareType')->willReturn($shareType);
		$share->method('getSharedWith')->willReturn($sharedWith);
		$share->method('getSharedBy')->willReturn($sharedBy);
		$share->method('getPath')->willReturn($path);
		$share->method('getTarget')->willReturn('myTarget');

		$manager->expects($this->once())->method('getShareById')->with(42)->willReturn($share);
		$manager->expects($this->once())->method('deleteChildren')->with($share);

		$this->defaultProvider
			->expects($this->once())
			->method('delete')
			->with($share);

		$hookListner = $this->getMockBuilder('Dummy')->setMethods(['pre', 'post'])->getMock();
		\OCP\Util::connectHook('OCP\Share', 'pre_unshare', $hookListner, 'pre');
		\OCP\Util::connectHook('OCP\Share', 'post_unshare', $hookListner, 'post');

		$hookListnerExpectsPre = [
			'id' => 42,
			'itemType' => 'file',
			'itemSource' => 1,
			'shareType' => $shareType,
			'shareWith' => $sharedWith_string,
			'itemparent' => null,
			'uidOwner' => 'sharedBy',
			'fileSource' => 1,
			'fileTarget' => 'myTarget',
		];

		$hookListnerExpectsPost = [
			'id' => 42,
			'itemType' => 'file',
			'itemSource' => 1,
			'shareType' => $shareType,
			'shareWith' => $sharedWith_string,
			'itemparent' => null,
			'uidOwner' => 'sharedBy',
			'fileSource' => 1,
			'fileTarget' => 'myTarget',
			'deletedShares' => [
				[
					'id' => 42,
					'itemType' => 'file',
					'itemSource' => 1,
					'shareType' => $shareType,
					'shareWith' => $sharedWith_string,
					'itemparent' => null,
					'uidOwner' => 'sharedBy',
					'fileSource' => 1,
					'fileTarget' => 'myTarget',
				],
			],
		];


		$hookListner
			->expects($this->exactly(1))
			->method('pre')
			->with($hookListnerExpectsPre);
		$hookListner
			->expects($this->exactly(1))
			->method('post')
			->with($hookListnerExpectsPost);

		$manager->deleteShare($share);
	}

	public function testDeleteNested() {
		$manager = $this->getMockBuilder('\OC\Share20\Manager')
			->setConstructorArgs([
				$this->user,
				$this->userManager,
				$this->groupManager,
				$this->logger,
				$this->config,
				$this->userFolder,
				$this->defaultProvider,
				$this->hasher,
				$this->secureRandom
			])
			->setMethods(['getShareById'])
			->getMock();

		$sharedBy1 = $this->getMock('\OCP\IUser');
		$sharedBy1->method('getUID')->willReturn('sharedBy1');
		$sharedBy2 = $this->getMock('\OCP\IUser');
		$sharedBy2->method('getUID')->willReturn('sharedBy2');
		$sharedBy3 = $this->getMock('\OCP\IUser');
		$sharedBy3->method('getUID')->willReturn('sharedBy3');

		$sharedWith1 = $this->getMock('\OCP\IUser');
		$sharedWith1->method('getUID')->willReturn('sharedWith1');
		$sharedWith2 = $this->getMock('\OCP\IGroup');
		$sharedWith2->method('getGID')->willReturn('sharedWith2');

		$path = $this->getMock('\OCP\Files\File');
		$path->method('getId')->willReturn(1);

		$share1 = $this->getMock('\OC\Share20\IShare');
		$share1->method('getId')->willReturn(42);
		$share1->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_USER);
		$share1->method('getSharedWith')->willReturn($sharedWith1);
		$share1->method('getSharedBy')->willReturn($sharedBy1);
		$share1->method('getPath')->willReturn($path);
		$share1->method('getTarget')->willReturn('myTarget1');

		$share2 = $this->getMock('\OC\Share20\IShare');
		$share2->method('getId')->willReturn(43);
		$share2->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_GROUP);
		$share2->method('getSharedWith')->willReturn($sharedWith2);
		$share2->method('getSharedBy')->willReturn($sharedBy2);
		$share2->method('getPath')->willReturn($path);
		$share2->method('getTarget')->willReturn('myTarget2');
		$share2->method('getParent')->willReturn(42);

		$share3 = $this->getMock('\OC\Share20\IShare');
		$share3->method('getId')->willReturn(44);
		$share3->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_LINK);
		$share3->method('getSharedBy')->willReturn($sharedBy3);
		$share3->method('getPath')->willReturn($path);
		$share3->method('getTarget')->willReturn('myTarget3');
		$share3->method('getParent')->willReturn(43);

		$manager->expects($this->once())->method('getShareById')->with(42)->willReturn($share1);

		$this->defaultProvider
			->method('getChildren')
			->will($this->returnValueMap([
				[$share1, [$share2]],
				[$share2, [$share3]],
				[$share3, []],
			]));

		$this->defaultProvider
			->method('delete')
			->withConsecutive($share3, $share2, $share1);

		$hookListner = $this->getMockBuilder('Dummy')->setMethods(['pre', 'post'])->getMock();
		\OCP\Util::connectHook('OCP\Share', 'pre_unshare', $hookListner, 'pre');
		\OCP\Util::connectHook('OCP\Share', 'post_unshare', $hookListner, 'post');

		$hookListnerExpectsPre = [
			'id' => 42,
			'itemType' => 'file',
			'itemSource' => 1,
			'shareType' => \OCP\Share::SHARE_TYPE_USER,
			'shareWith' => 'sharedWith1',
			'itemparent' => null,
			'uidOwner' => 'sharedBy1',
			'fileSource' => 1,
			'fileTarget' => 'myTarget1',
		];

		$hookListnerExpectsPost = [
			'id' => 42,
			'itemType' => 'file',
			'itemSource' => 1,
			'shareType' => \OCP\Share::SHARE_TYPE_USER,
			'shareWith' => 'sharedWith1',
			'itemparent' => null,
			'uidOwner' => 'sharedBy1',
			'fileSource' => 1,
			'fileTarget' => 'myTarget1',
			'deletedShares' => [
				[
					'id' => 44,
					'itemType' => 'file',
					'itemSource' => 1,
					'shareType' => \OCP\Share::SHARE_TYPE_LINK,
					'shareWith' => '',
					'itemparent' => 43,
					'uidOwner' => 'sharedBy3',
					'fileSource' => 1,
					'fileTarget' => 'myTarget3',
				],
				[
					'id' => 43,
					'itemType' => 'file',
					'itemSource' => 1,
					'shareType' => \OCP\Share::SHARE_TYPE_GROUP,
					'shareWith' => 'sharedWith2',
					'itemparent' => 42,
					'uidOwner' => 'sharedBy2',
					'fileSource' => 1,
					'fileTarget' => 'myTarget2',
				],
				[
					'id' => 42,
					'itemType' => 'file',
					'itemSource' => 1,
					'shareType' => \OCP\Share::SHARE_TYPE_USER,
					'shareWith' => 'sharedWith1',
					'itemparent' => null,
					'uidOwner' => 'sharedBy1',
					'fileSource' => 1,
					'fileTarget' => 'myTarget1',
				],
			],
		];


		$hookListner
			->expects($this->exactly(1))
			->method('pre')
			->with($hookListnerExpectsPre);
		$hookListner
			->expects($this->exactly(1))
			->method('post')
			->with($hookListnerExpectsPost);

		$manager->deleteShare($share1);
	}

	public function testDeleteChildren() {
		$manager = $this->getMockBuilder('\OC\Share20\Manager')
			->setConstructorArgs([
				$this->user,
				$this->userManager,
				$this->groupManager,
				$this->logger,
				$this->config,
				$this->userFolder,
				$this->defaultProvider,
				$this->hasher,
				$this->secureRandom
			])
			->setMethods(['deleteShare'])
			->getMock();

		$share = $this->getMock('\OC\Share20\IShare');

		$child1 = $this->getMock('\OC\Share20\IShare');
		$child2 = $this->getMock('\OC\Share20\IShare');
		$child3 = $this->getMock('\OC\Share20\IShare');

		$shares = [
			$child1,
			$child2,
			$child3,
		];

		$this->defaultProvider
			->expects($this->exactly(4))
			->method('getChildren')
			->will($this->returnCallback(function($_share) use ($share, $shares) {
				if ($_share === $share) {
					return $shares;
				}
				return [];
			}));

		$this->defaultProvider
			->expects($this->exactly(3))
			->method('delete')
			->withConsecutive($child1, $child2, $child3);

		$result = $this->invokePrivate($manager, 'deleteChildren', [$share]);
		$this->assertSame($shares, $result);
	}

	/**
	 * @expectedException OC\Share20\Exception\ShareNotFound
	 */
	public function testGetShareByIdNotFoundInBackend() {
		$this->defaultProvider
			->expects($this->once())
			->method('getShareById')
			->with(42)
			->will($this->throwException(new \OC\Share20\Exception\ShareNotFound()));

		$this->manager->getShareById(42);
	}

	/**
	 * @expectedException OC\Share20\Exception\ShareNotFound
	 */
	public function testGetShareByIdNotAuthorized() {
		$otherUser1 = $this->getMock('\OCP\IUser');
		$otherUser2 = $this->getMock('\OCP\IUser');
		$otherUser3 = $this->getMock('\OCP\IUser');

		$share = $this->getMock('\OC\Share20\IShare');
		$share
			->expects($this->once())
			->method('getSharedWith')
			->with()
			->willReturn($otherUser1);
		$share
			->expects($this->once())
			->method('getSharedBy')
			->with()
			->willReturn($otherUser2);
		$share
			->expects($this->once())
			->method('getShareOwner')
			->with()
			->willReturn($otherUser3);

		$this->defaultProvider
			->expects($this->once())
			->method('getShareById')
			->with(42)
			->willReturn($share);

		$this->manager->getShareById(42);
	}

	public function dataGetShareById() {
		return [
			['getSharedWith'],
			['getSharedBy'],
			['getShareOwner'],
		];
	}

	/**
	 * @dataProvider dataGetShareById
	 */
	public function testGetShareById($currentUserIs) {
		$otherUser1 = $this->getMock('\OCP\IUser');
		$otherUser2 = $this->getMock('\OCP\IUser');
		$otherUser3 = $this->getMock('\OCP\IUser');

		$share = $this->getMock('\OC\Share20\IShare');
		$share
			->method('getSharedWith')
			->with()
			->willReturn($currentUserIs === 'getSharedWith' ? $this->user : $otherUser1);
		$share
			->method('getSharedBy')
			->with()
			->willReturn($currentUserIs === 'getSharedBy' ? $this->user : $otherUser2);
		$share
			->method('getShareOwner')
			->with()
			->willReturn($currentUserIs === 'getShareOwner' ? $this->user : $otherUser3);

		$this->defaultProvider
			->expects($this->once())
			->method('getShareById')
			->with(42)
			->willReturn($share);

		$this->assertEquals($share, $this->manager->getShareById(42));
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Public link sharing disabled
	 */
	public function testCreateLinkShareNotEnabled() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'no'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Date in past
	 */
	public function testCreateLinkShareExpireDateInPast() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');

		$date = new \DateTime();
		$date->setTime(0,0,0);
		$date->sub(new \DateInterval('P1D'));

		$share->method('getExpirationDate')->willReturn($date);

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	public function testCreateLinkShareValidDate() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');

		$date = new \DateTime();
		$date->add(new \DateInterval('P1D'));

		$share->method('getExpirationDate')->willReturn($date);
		$share->expects($this->never())->method('setExpirationDate');

		$this->defaultProvider
			->expects($this->once())
			->method('getShareByToken')
			->will($this->throwException(new \OC\Share20\Exception\ShareNotFound()));

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	public function testCreateLinkShareDateToFarInFuture() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
				['core', 'shareapi_enforce_expire_date', 'no', 'yes'],
				['core', 'shareapi_expire_after_n_days', '7', '2'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');

		$date = new \DateTime();
		$date->add(new \DateInterval('P1W'));

		$share->method('getExpirationDate')->willReturn($date);
		$share->expects($this->once())
			->method('setExpirationDate')
			->with($this->callback(function($date) {
				$curDate = new\DateTime();
				$curDate->setTime(0,0,0);
				$curDate->add(new \DateInterval('P2D'));

				return $date == $curDate;
			}));

		$this->defaultProvider
			->expects($this->once())
			->method('getShareByToken')
			->will($this->throwException(new \OC\Share20\Exception\ShareNotFound()));

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	public function testCreateLinkShareNoDateButDefaultEnabled() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
				['core', 'shareapi_default_expire_date', 'no', 'yes'],
				['core', 'shareapi_expire_after_n_days', '7', '2'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');

		$share->expects($this->once())
			->method('setExpirationDate')
			->with($this->callback(function($date) {
				$curDate = new\DateTime();
				$curDate->setTime(0,0,0);
				$curDate->add(new \DateInterval('P2D'));

				return $date == $curDate;
			}));

		$this->defaultProvider
			->expects($this->once())
			->method('getShareByToken')
			->will($this->throwException(new \OC\Share20\Exception\ShareNotFound()));

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Password is enforced for public links
	 */
	public function testCreateLinkShareNoPasswordPasswordEnforced() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
				['core', 'shareapi_enforce_links_password', 'no', 'yes'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Share must be read only
	 */
	public function testCreateLinkShareNoPublicUpload() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
				['core', 'shareapi_allow_public_upload', 'yes', 'no'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');
		$share->method('getPermissions')->willReturn(\OCP\Constants::PERMISSION_CREATE);

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Invalid permissions for link share
	 */
	public function testCreateLinkSharePublicUploadToMuchPermissions() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
				['core', 'shareapi_allow_public_upload', 'yes', 'yes'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');
		$share->method('getPermissions')->willReturn(\OCP\Constants::PERMISSION_SHARE);

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}


	public function testCreateLinkShareWithPassword() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');
		$share->method('getPassword')->willReturn('password');
		$share->expects($this->once())->method('setPassword')->with('hashedPassword');
		$this->hasher->expects($this->once())->method('hash')->with('password')->willReturn('hashedPassword');

		$this->defaultProvider
			->expects($this->once())
			->method('getShareByToken')
			->will($this->throwException(new \OC\Share20\Exception\ShareNotFound()));

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}

	public function testCreateLinkShareTokenInUse() {
		$this->config
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_allow_links', 'yes', 'yes'],
			]));

		$share = $this->getMock('\OC\Share20\IShare');

		$this->secureRandom
			->method('generate')
			->will($this->onConsecutiveCalls('token1', 'token2'));

		$this->defaultProvider
			->method('getShareByToken')
			->will($this->returnCallback(
				function($token) {
					if ($token === 'token1') {
						return $this->getMock('\OC\Share20\IShare');
					} else if ($token === 'token2') {
						throw new \OC\Share20\Exception\ShareNotFound();
					}
				}
		));

		$share->expects($this->once())->method('setToken')->with('token2');

		$this->invokePrivate($this->manager, 'createLinkShare', [$share]);
	}


}
