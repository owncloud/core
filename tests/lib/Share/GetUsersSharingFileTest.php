<?php

namespace lib\Share;

use OC;
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
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;
use function PHPUnit\Framework\assertEquals;

/**
 * @group DB
 */
class GetUsersSharingFileTest extends TestCase {
	use UserTrait, GroupTrait;

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
	private static function shareWithUser(File $file, IUser $user, IUser $owner): IShare {
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
		$share = self::shareWithGroup($file, $group, $alice);

		# test
		$result = Share::getUsersSharingFile('welcome.txt', $alice->getUID());
		assertEquals([
			'users' => ['alice', 'bob'],
			'public' => false,
			'remote' => false
		], $result);
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
		$result = Share::getUsersSharingFile('welcome.txt', $alice->getUID());
		assertEquals([
			'users' => ['bob'],
			'public' => false,
			'remote' => false
		], $result);

		# tst rejected
		$share->setState(Constants::STATE_REJECTED);
		\OC::$server->getShareManager()->updateShare($share);

		$result = Share::getUsersSharingFile('welcome.txt', $alice->getUID());
		assertEquals([
			'users' => [],
			'public' => false,
			'remote' => false
		], $result);
	}
}
