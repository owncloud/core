<?php

namespace Test\Share;

use OC;
use OCP\Files\Node;
use OC\Share\Constants;
use OC\Share\Share;
use OC\User\NoUserException;
use OCP\Constants as OCConstants;
use OCP\Files\File;
use OCP\Files\NotPermittedException;
use OCP\IGroup;
use OCP\IUser;
use OCP\Share\Exceptions\GenericShareException;
use OCP\Share\IShare;
use Test\TestCase;
use Test\Traits\AssertQueryCountTrait;
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;
use function PHPUnit\Framework\assertEquals;

/**
 * @group DB
 */
class GetUsersSharingFileTest extends TestCase {
	use UserTrait, GroupTrait, AssertQueryCountTrait;

	/**
	 * @throws GenericShareException
	 */
	private static function shareWithGroup(File $file, IGroup $group, IUser $owner): IShare {
		$sm = OC::$server->getShareManager();
		$share = $sm->newShare();
		$share->setSharedBy($owner->getUID());
		$share->setSharedWith($group->getGID());
		$share->setNode($file);
		$share->setShareType(Constants::SHARE_TYPE_GROUP);
		$share->setPermissions(OCConstants::PERMISSION_ALL);

		return $sm->createShare($share);
	}

	/**
	 * @throws GenericShareException
	 */
	private static function shareWithUser(Node $file, IUser $user, IUser $owner): IShare {
		$sm = OC::$server->getShareManager();
		$share = $sm->newShare();
		$share->setSharedBy($owner->getUID());
		$share->setSharedWith($user->getUID());
		$share->setNode($file);
		$share->setShareType(Constants::SHARE_TYPE_USER);
		$share->setPermissions(OCConstants::PERMISSION_ALL);

		return $sm->createShare($share);
	}

	/**
	 * @throws GenericShareException
	 */
	private static function shareByLink(File $file, IUser $owner): IShare {
		$sm = OC::$server->getShareManager();
		$share = $sm->newShare();
		$share->setSharedBy($owner->getUID());
		$share->setNode($file);
		$share->setShareType(Constants::SHARE_TYPE_LINK);
		$share->setPermissions(OCConstants::PERMISSION_READ);

		return $sm->createShare($share);
	}

	/**
	 * @see https://github.com/owncloud/activity/issues/1143
	 * @throws NotPermittedException
	 * @throws NoUserException
	 * @throws GenericShareException
	 */
	public function testGroupShare() : void {
		# setup
		$alice = $this->createUser('alice');
		$bob = $this->createUser('bob');
		$group = $this->createGroup('group1', [$alice, $bob]);

		self::loginAsUser($alice->getUID());
		$aliceFolder = OC::$server->getUserFolder($alice->getUID());
		$file = self::createFileWithContent($aliceFolder, 'welcome.txt', 'loram ipsum');
		self::shareWithGroup($file, $group, $alice);

		# test
		self::trackQueries();
		$result = Share::getUsersSharingFile('welcome.txt', $alice->getUID());
		assertEquals([
			'users' => ['alice', 'bob'],
			'public' => false,
			'remote' => false
		], $result);
		#$this->assertQueryCountLessThan(9);
	}

	/**
	 * @throws NotPermittedException
	 * @throws NoUserException
	 * @throws GenericShareException
	 */
	public function testRejected() : void {
		# setup
		$alice = $this->createUser('alice');
		$bob = $this->createUser('bob');

		self::loginAsUser($alice->getUID());
		$aliceFolder = OC::$server->getUserFolder($alice->getUID());
		$file = self::createFileWithContent($aliceFolder, 'welcome.txt', 'loram ipsum');
		$share = self::shareWithUser($file, $bob, $alice);

		# test accepted
		self::trackQueries();
		$result = Share::getUsersSharingFile('welcome.txt', $alice->getUID());
		assertEquals([
			'users' => ['bob'],
			'public' => false,
			'remote' => false
		], $result);
		#$this->assertQueryCountMatches(7);

		# test rejected
		$share->setState(Constants::STATE_REJECTED);
		OC::$server->getShareManager()->updateShare($share);

		$result = Share::getUsersSharingFile('welcome.txt', $alice->getUID());
		assertEquals([
			'users' => [],
			'public' => false,
			'remote' => false
		], $result);
	}

	/**
	 * @throws NotPermittedException
	 * @throws NoUserException
	 * @throws GenericShareException
	 */
	public function testPublicLink(): void {
		# setup
		$alice = $this->createUser('alice');

		self::loginAsUser($alice->getUID());
		$aliceFolder = OC::$server->getUserFolder($alice->getUID());
		$file = self::createFileWithContent($aliceFolder, 'welcome.txt', 'loram ipsum');
		self::shareByLink($file, $alice);

		# test
		self::trackQueries();
		$result = Share::getUsersSharingFile('welcome.txt', $alice->getUID());
		assertEquals([
			'users' => [],
			'public' => true,
			'remote' => false
		], $result);
		#$this->assertQueryCountMatches(7);
	}

	/**
	 * @throws NotPermittedException
	 * @throws NoUserException
	 * @throws GenericShareException
	 */
	public function testRecursive() : void {
		# setup
		$alice = $this->createUser('alice');
		$bob = $this->createUser('bob');

		self::loginAsUser($alice->getUID());
		$aliceFolder = OC::$server->getUserFolder($alice->getUID());
		$fooFolder = $aliceFolder->newFolder('foo');
		self::createFileWithContent($fooFolder, 'welcome.txt', 'loram ipsum');
		self::shareWithUser($fooFolder, $bob, $alice);

		# test recursive
		$result = Share::getUsersSharingFile('foo/welcome.txt', $alice->getUID());
		assertEquals([
			'users' => ['bob'],
			'public' => false,
			'remote' => false
		], $result);

		# test recursive
		self::trackQueries();
		$result = Share::getUsersSharingFile('foo/welcome.txt', $alice->getUID(), false, false, false);
		assertEquals([
			'users' => [],
			'public' => false,
			'remote' => false
		], $result);
		#$this->assertQueryCountMatches(4);
	}

	/**
	 * @throws NotPermittedException
	 * @throws NoUserException
	 * @throws GenericShareException
	 */
	public function testIncludeOwner() : void {
		self::assertTrue(Share::isEnabled());
		# setup
		$alice = $this->createUser('alice');
		$bob = $this->createUser('bob');

		self::loginAsUser($alice->getUID());
		$aliceFolder = OC::$server->getUserFolder($alice->getUID());
		$fooFolder = $aliceFolder->newFolder('foo');
		self::createFileWithContent($fooFolder, 'welcome.txt', 'loram ipsum');
		self::shareWithUser($fooFolder, $bob, $alice);

		self::trackQueries();
		$result = Share::getUsersSharingFile('foo/welcome.txt', $alice->getUID(), true, true);
		assertEquals([
			'bob' => '/foo/welcome.txt',
			'alice' => '/foo/welcome.txt',
		], $result);
		# in some cases there is an additional query required because Cache::$path_cache is not holding the path in question
		#$this->assertQueryCountLessThan(11);

		# let's see how bob is doing ....
		self::loginAsUser($bob->getUID());
		self::trackQueries();
		$result = Share::getUsersSharingFile('foo/welcome.txt', $bob->getUID(), true, true);
		assertEquals([
			'bob' => '/foo/welcome.txt',
		], $result);
		# in some cases there is an additional query required because Cache::$path_cache is not holding the path in question
		#$this->assertQueryCountLessThan(11);
	}
}
