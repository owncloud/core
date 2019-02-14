<?php

namespace Test\Comments;

use OCP\Comments\ICommentsManager;
use OCP\IDBConnection;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class ManagerTest
 *
 * @group DB
 */
class ManagerTest extends TestCase {
	use UserTrait;

	/** @var IDBConnection */
	private $dbConn;

	public function setUp(): void {
		parent::setUp();

		$this->dbConn = \OC::$server->getDatabaseConnection();
		$sql = $this->dbConn->getDatabasePlatform()->getTruncateTableSQL('`*PREFIX*comments`');
		$this->dbConn->prepare($sql)->execute();
		$sql = $this->dbConn->getDatabasePlatform()->getTruncateTableSQL('`*PREFIX*comments_read_markers`');
		$this->dbConn->prepare($sql)->execute();
	}

	public function tearDown(): void {
		$this->dbConn->getQueryBuilder()->delete('comments')->execute();
		$this->dbConn->getQueryBuilder()->delete('comments_read_markers')->execute();
		parent::tearDown();
	}

	protected function addDatabaseEntry($parentId, $topmostParentId, $creationDT = null, $latestChildDT = null, $actor_id = 'alice', $object_id = 'file64') {
		if ($creationDT === null) {
			$creationDT = new \DateTime();
		}
		if ($latestChildDT === null) {
			$latestChildDT = new \DateTime('yesterday');
		}

		$qb = $this->dbConn->getQueryBuilder();
		$qb
			->insert('comments')
			->values([
					'parent_id'					=> $qb->createNamedParameter($parentId),
					'topmost_parent_id' 		=> $qb->createNamedParameter($topmostParentId),
					'children_count' 			=> $qb->createNamedParameter(2),
					'actor_type' 				=> $qb->createNamedParameter('users'),
					'actor_id' 					=> $qb->createNamedParameter($actor_id),
					'message' 					=> $qb->createNamedParameter('nice one'),
					'verb' 						=> $qb->createNamedParameter('comment'),
					'creation_timestamp' 		=> $qb->createNamedParameter($creationDT, 'datetime'),
					'latest_child_timestamp'	=> $qb->createNamedParameter($latestChildDT, 'datetime'),
					'object_type' 				=> $qb->createNamedParameter('files'),
					'object_id' 				=> $qb->createNamedParameter($object_id),
			])
			->execute();

		return $qb->getLastInsertId();
	}

	protected function getManager() {
		$factory = new \OC\Comments\ManagerFactory(\OC::$server);
		return $factory->getManager();
	}

	/**
	 * @expectedException \OCP\Comments\NotFoundException
	 */
	public function testGetCommentNotFound() {
		$manager = $this->getManager();
		$manager->get('22');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testGetCommentNotFoundInvalidInput() {
		$manager = $this->getManager();
		$manager->get('unexisting22');
	}

	public function testGetComment() {
		$manager = $this->getManager();

		$creationDT = new \DateTime();
		$latestChildDT = new \DateTime('yesterday');

		$qb = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$qb
			->insert('comments')
			->values([
					'parent_id'					=> $qb->createNamedParameter('2'),
					'topmost_parent_id' 		=> $qb->createNamedParameter('1'),
					'children_count' 			=> $qb->createNamedParameter(2),
					'actor_type' 				=> $qb->createNamedParameter('users'),
					'actor_id' 					=> $qb->createNamedParameter('alice'),
					'message' 					=> $qb->createNamedParameter('nice one'),
					'verb' 						=> $qb->createNamedParameter('comment'),
					'creation_timestamp' 		=> $qb->createNamedParameter($creationDT, 'datetime'),
					'latest_child_timestamp'	=> $qb->createNamedParameter($latestChildDT, 'datetime'),
					'object_type' 				=> $qb->createNamedParameter('files'),
					'object_id' 				=> $qb->createNamedParameter('file64'),
			])
			->execute();

		$id = \strval($qb->getLastInsertId());

		$comment = $manager->get($id);
		$this->assertInstanceOf(\OCP\Comments\IComment::class, $comment);
		$this->assertSame($comment->getId(), $id);
		$this->assertSame($comment->getParentId(), '2');
		$this->assertSame($comment->getTopmostParentId(), '1');
		$this->assertSame($comment->getChildrenCount(), 2);
		$this->assertSame($comment->getActorType(), 'users');
		$this->assertSame($comment->getActorId(), 'alice');
		$this->assertSame($comment->getMessage(), 'nice one');
		$this->assertSame($comment->getVerb(), 'comment');
		$this->assertSame($comment->getObjectType(), 'files');
		$this->assertSame($comment->getObjectId(), 'file64');
		$this->assertEquals($comment->getCreationDateTime()->format(\DateTime::ISO8601), $creationDT->format(\DateTime::ISO8601));
		$this->assertEquals($comment->getLatestChildDateTime()->format(\DateTime::ISO8601), $latestChildDT->format(\DateTime::ISO8601));
	}

	/**
	 * @expectedException \OCP\Comments\NotFoundException
	 */
	public function testGetTreeNotFound() {
		$manager = $this->getManager();
		$manager->getTree('22');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testGetTreeNotFoundInvalidIpnut() {
		$manager = $this->getManager();
		$manager->getTree('unexisting22');
	}

	public function testGetTree() {
		$headId = $this->addDatabaseEntry(0, 0);

		$this->addDatabaseEntry($headId, $headId, new \DateTime('-3 hours'));
		$this->addDatabaseEntry($headId, $headId, new \DateTime('-2 hours'));
		$id = $this->addDatabaseEntry($headId, $headId, new \DateTime('-1 hour'));

		$manager = $this->getManager();
		$tree = $manager->getTree($headId);

		// Verifying the root comment
		$this->assertArrayHasKey('comment', $tree);
		$this->assertInstanceOf(\OCP\Comments\IComment::class, $tree['comment']);
		$this->assertSame($tree['comment']->getId(), \strval($headId));
		$this->assertArrayHasKey('replies', $tree);
		$this->assertSame(\count($tree['replies']), 3);

		// one level deep
		foreach ($tree['replies'] as $reply) {
			$this->assertInstanceOf(\OCP\Comments\IComment::class, $reply['comment']);
			$this->assertSame($reply['comment']->getId(), \strval($id));
			$this->assertSame(\count($reply['replies']), 0);
			$id--;
		}
	}

	public function testGetTreeNoReplies() {
		$id = $this->addDatabaseEntry(0, 0);

		$manager = $this->getManager();
		$tree = $manager->getTree($id);

		// Verifying the root comment
		$this->assertArrayHasKey('comment', $tree);
		$this->assertInstanceOf(\OCP\Comments\IComment::class, $tree['comment']);
		$this->assertSame($tree['comment']->getId(), \strval($id));
		$this->assertArrayHasKey('replies', $tree);
		$this->assertSame(\count($tree['replies']), 0);

		// one level deep
		foreach ($tree['replies'] as $reply) {
			throw new \Exception('This ain`t happen');
		}
	}

	public function testGetTreeWithLimitAndOffset() {
		$headId = $this->addDatabaseEntry(0, 0);

		$this->addDatabaseEntry($headId, $headId, new \DateTime('-3 hours'));
		$this->addDatabaseEntry($headId, $headId, new \DateTime('-2 hours'));
		$this->addDatabaseEntry($headId, $headId, new \DateTime('-1 hour'));
		$idToVerify = $this->addDatabaseEntry($headId, $headId, new \DateTime());

		$manager = $this->getManager();

		for ($offset = 0; $offset < 3; $offset += 2) {
			$tree = $manager->getTree(\strval($headId), 2, $offset);

			// Verifying the root comment
			$this->assertArrayHasKey('comment', $tree);
			$this->assertInstanceOf(\OCP\Comments\IComment::class, $tree['comment']);
			$this->assertSame($tree['comment']->getId(), \strval($headId));
			$this->assertArrayHasKey('replies', $tree);
			$this->assertSame(\count($tree['replies']), 2);

			// one level deep
			foreach ($tree['replies'] as $reply) {
				$this->assertInstanceOf(\OCP\Comments\IComment::class, $reply['comment']);
				$this->assertSame($reply['comment']->getId(), \strval($idToVerify));
				$this->assertSame(\count($reply['replies']), 0);
				$idToVerify--;
			}
		}
	}

	public function testGetForObject() {
		$this->addDatabaseEntry(0, 0);

		$manager = $this->getManager();
		$comments = $manager->getForObject('files', 'file64');

		$this->assertInternalType('array', $comments);
		$this->assertSame(\count($comments), 1);
		$this->assertInstanceOf(\OCP\Comments\IComment::class, $comments[0]);
		$this->assertSame($comments[0]->getMessage(), 'nice one');
	}

	public function testGetForObjectWithLimitAndOffset() {
		$this->addDatabaseEntry(0, 0, new \DateTime('-6 hours'));
		$this->addDatabaseEntry(0, 0, new \DateTime('-5 hours'));
		$this->addDatabaseEntry(1, 1, new \DateTime('-4 hours'));
		$this->addDatabaseEntry(0, 0, new \DateTime('-3 hours'));
		$this->addDatabaseEntry(2, 2, new \DateTime('-2 hours'));
		$this->addDatabaseEntry(2, 2, new \DateTime('-1 hours'));
		$idToVerify = $this->addDatabaseEntry(3, 1, new \DateTime());

		$manager = $this->getManager();
		$offset = 0;
		do {
			$comments = $manager->getForObject('files', 'file64', 3, $offset);

			$this->assertInternalType('array', $comments);
			foreach ($comments as $comment) {
				$this->assertInstanceOf(\OCP\Comments\IComment::class, $comment);
				$this->assertSame($comment->getMessage(), 'nice one');
				$this->assertSame($comment->getId(), \strval($idToVerify));
				$idToVerify--;
			}
			$offset += 3;
		} while (\count($comments) > 0);
	}

	public function testGetForObjectWithDateTimeConstraint() {
		$this->addDatabaseEntry(0, 0, new \DateTime('-6 hours'));
		$this->addDatabaseEntry(0, 0, new \DateTime('-5 hours'));
		$id1 = $this->addDatabaseEntry(0, 0, new \DateTime('-3 hours'));
		$id2 = $this->addDatabaseEntry(2, 2, new \DateTime('-2 hours'));

		$manager = $this->getManager();
		$comments = $manager->getForObject('files', 'file64', 0, 0, new \DateTime('-4 hours'));

		$this->assertSame(\count($comments), 2);
		$this->assertSame($comments[0]->getId(), \strval($id2));
		$this->assertSame($comments[1]->getId(), \strval($id1));
	}

	public function testGetForObjectWithLimitAndOffsetAndDateTimeConstraint() {
		$this->addDatabaseEntry(0, 0, new \DateTime('-7 hours'));
		$this->addDatabaseEntry(0, 0, new \DateTime('-6 hours'));
		$this->addDatabaseEntry(1, 1, new \DateTime('-5 hours'));
		$this->addDatabaseEntry(0, 0, new \DateTime('-3 hours'));
		$this->addDatabaseEntry(2, 2, new \DateTime('-2 hours'));
		$this->addDatabaseEntry(2, 2, new \DateTime('-1 hours'));
		$idToVerify = $this->addDatabaseEntry(3, 1, new \DateTime());

		$manager = $this->getManager();
		$offset = 0;
		do {
			$comments = $manager->getForObject('files', 'file64', 3, $offset, new \DateTime('-4 hours'));

			$this->assertInternalType('array', $comments);
			foreach ($comments as $comment) {
				$this->assertInstanceOf(\OCP\Comments\IComment::class, $comment);
				$this->assertSame($comment->getMessage(), 'nice one');
				$this->assertSame($comment->getId(), \strval($idToVerify));
				$this->assertGreaterThanOrEqual(4, \intval($comment->getId()));
				$idToVerify--;
			}
			$offset += 3;
		} while (\count($comments) > 0);
	}

	public function testGetNumberOfCommentsForObject() {
		for ($i = 1; $i < 5; $i++) {
			$this->addDatabaseEntry(0, 0);
		}

		$manager = $this->getManager();

		$amount = $manager->getNumberOfCommentsForObject('untype', '00');
		$this->assertSame($amount, 0);

		$amount = $manager->getNumberOfCommentsForObject('files', 'file64');
		$this->assertSame($amount, 4);
	}

	public function testGetNumberOfUnreadCommentsForNodes() {
		$manager = $this->getManager();
		$user1 = $this->createMock(\OCP\IUser::class);
		$user1->expects($this->any())
			->method('getUID')
			->willReturn('piotr');
		$user2 = $this->createMock(\OCP\IUser::class);
		$user2->expects($this->any())
			->method('getUID')
			->willReturn('karolina');
		$user3 = $this->createMock(\OCP\IUser::class);
		$user3->expects($this->any())
			->method('getUID')
			->willReturn('artur');

		// Add comments and karolina never read any comment from piotr
		$commentsTimeStamp = new \DateTime('2017-03-01 15:00:00 EDT');
		for ($i = 0; $i< 200; $i++) {
			$this->addDatabaseEntry(0, 0, $commentsTimeStamp, $commentsTimeStamp, 'piotr', '36');
		}
		$this->addDatabaseEntry(0, 0, $commentsTimeStamp, $commentsTimeStamp, 'piotr', '40');
		$this->addDatabaseEntry(0, 0, $commentsTimeStamp, $commentsTimeStamp, 'piotr', '40');
		$this->addDatabaseEntry(0, 0, $commentsTimeStamp, $commentsTimeStamp, 'piotr', '20');
		$this->addDatabaseEntry(0, 0, $commentsTimeStamp, $commentsTimeStamp, 'artur', '21');
		$this->addDatabaseEntry(0, 0, $commentsTimeStamp, $commentsTimeStamp, 'artur', '15');
		$manager->setReadMark('files', '36', $commentsTimeStamp, $user1);
		$manager->setReadMark('files', '40', $commentsTimeStamp, $user1);
		$manager->setReadMark('files', '20', $commentsTimeStamp, $user1);
		$manager->setReadMark('files', '21', $commentsTimeStamp, $user3);
		$manager->setReadMark('files', '15', $commentsTimeStamp, $user3);

		$expectedHashMap = [];
		$amount = $manager->getNumberOfUnreadCommentsForNodes('files', ['36','40','20','105'], $user1);
		$this->assertSame($amount, $expectedHashMap);

		$expectedHashMap = [];
		$expectedHashMap['36'] = 200;
		$expectedHashMap['40'] = 2;
		$amount = $manager->getNumberOfUnreadCommentsForNodes('files', ['36','40', '80','25'], $user2);
		$this->assertSame($amount, $expectedHashMap);

		// Karolina now read the comments from piotr day later
		$commentsTimeStamp1 = new \DateTime('2017-03-02 15:00:00 EDT');
		$manager->setReadMark('files', '36', $commentsTimeStamp1, $user2);
		$manager->setReadMark('files', '40', $commentsTimeStamp1, $user2);
		$expectedHashMap = [];
		$amount = $manager->getNumberOfUnreadCommentsForNodes('files', ['36','40','80','25'], $user2);
		$this->assertSame($amount, $expectedHashMap);

		// Karolina added another comment to piotr after that, so piotr will have one unread comment
		$commentsTimeStamp2 = new \DateTime('2017-03-02 15:00:01 EDT');
		$this->addDatabaseEntry(0, 0, $commentsTimeStamp2, $commentsTimeStamp2, 'karolina', '36');
		$manager->setReadMark('files', '36', $commentsTimeStamp2, $user2);
		$expectedHashMap = [];
		$expectedHashMap['36'] = 1;
		$amount = $manager->getNumberOfUnreadCommentsForNodes('files', ['36','40','20','105'], $user1);
		$this->assertSame($amount, $expectedHashMap);
	}

	public function invalidCreateArgsProvider() {
		return [
			['', 'aId-1', 'oType-1', 'oId-1'],
			['aType-1', '', 'oType-1', 'oId-1'],
			['aType-1', 'aId-1', '', 'oId-1'],
			['aType-1', 'aId-1', 'oType-1', ''],
			[1, 'aId-1', 'oType-1', 'oId-1'],
			['aType-1', 1, 'oType-1', 'oId-1'],
			['aType-1', 'aId-1', 1, 'oId-1'],
			['aType-1', 'aId-1', 'oType-1', 1],
		];
	}

	/**
	 * @dataProvider invalidCreateArgsProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testCreateCommentInvalidArguments($aType, $aId, $oType, $oId) {
		$manager = $this->getManager();
		$manager->create($aType, $aId, $oType, $oId);
	}

	public function testCreateComment() {
		$actorType = 'bot';
		$actorId = 'bob';
		$objectType = 'weather';
		$objectId = 'bielefeld';

		$comment = $this->getManager()->create($actorType, $actorId, $objectType, $objectId);
		$this->assertInstanceOf(\OCP\Comments\IComment::class, $comment);
		$this->assertSame($comment->getActorType(), $actorType);
		$this->assertSame($comment->getActorId(), $actorId);
		$this->assertSame($comment->getObjectType(), $objectType);
		$this->assertSame($comment->getObjectId(), $objectId);
	}

	/**
	 * @expectedException \OCP\Comments\NotFoundException
	 */
	public function testDelete() {
		$manager = $this->getManager();

		$done = $manager->delete('404');
		$this->assertFalse($done);

		$done = $manager->delete('%');
		$this->assertFalse($done);

		$done = $manager->delete('');
		$this->assertFalse($done);

		$id = \strval($this->addDatabaseEntry(0, 0));
		$comment = $manager->get($id);
		$this->assertInstanceOf(\OCP\Comments\IComment::class, $comment);
		$done = $manager->delete($id);
		$this->assertTrue($done);
		$manager->get($id);
	}

	public function testSaveNew() {
		$calledBeforeCreateEvent = [];
		$calledAfterCreateEvent = [];
		\OC::$server->getEventDispatcher()->addListener('comment.beforecreate', function (GenericEvent $event) use (&$calledBeforeCreateEvent) {
			$calledBeforeCreateEvent[] = 'comment.beforesave';
			$calledBeforeCreateEvent[] = $event;
		});
		\OC::$server->getEventDispatcher()->addListener('comment.aftercreate', function (GenericEvent $event) use (&$calledAfterCreateEvent) {
			$calledAfterCreateEvent[] = 'comment.aftersave';
			$calledAfterCreateEvent[] = $event;
		});
		$manager = $this->getManager();
		$comment = new \OC\Comments\Comment();
		$comment
			->setActor('users', 'alice')
			->setObject('files', 'file64')
			->setMessage('very beautiful, I am impressed!')
			->setVerb('comment');

		$saveSuccessful = $manager->save($comment);
		$this->assertTrue($saveSuccessful);
		$this->assertNotSame('', $comment->getId());
		$this->assertNotSame('0', $comment->getId());
		$this->assertNotNull($comment->getCreationDateTime());
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeCreateEvent[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterCreateEvent[1]);
		$this->assertEquals('comment.beforesave', $calledBeforeCreateEvent[0]);
		$this->assertEquals('comment.aftersave', $calledAfterCreateEvent[0]);
		$this->assertArrayHasKey('objectId', $calledBeforeCreateEvent[1]);
		$this->assertArrayHasKey('message', $calledBeforeCreateEvent[1]);
		$this->assertArrayHasKey('objectId', $calledAfterCreateEvent[1]);
		$this->assertArrayHasKey('message', $calledAfterCreateEvent[1]);

		$loadedComment = $manager->get($comment->getId());
		$this->assertSame($comment->getMessage(), $loadedComment->getMessage());
		$this->assertEquals($comment->getCreationDateTime()->format(\DateTime::ISO8601), $loadedComment->getCreationDateTime()->format(\DateTime::ISO8601));
	}

	public function testSaveUpdate() {
		$calledBeforeUpdateEevnt = [];
		$calledAfterUpdateEevnt = [];
		\OC::$server->getEventDispatcher()->addListener('comment.beforeupdate', function (GenericEvent $event) use (&$calledBeforeUpdateEevnt) {
			$calledBeforeUpdateEevnt[] = 'comment.beforeupdate';
			$calledBeforeUpdateEevnt[] = $event;
		});
		\OC::$server->getEventDispatcher()->addListener('comment.afterupdate', function (GenericEvent $event) use (&$calledAfterUpdateEevnt) {
			$calledAfterUpdateEevnt[] = 'comment.afterupdate';
			$calledAfterUpdateEevnt[] = $event;
		});
		$manager = $this->getManager();
		$comment = new \OC\Comments\Comment();
		$comment
				->setActor('users', 'alice')
				->setObject('files', 'file64')
				->setMessage('very beautiful, I am impressed!')
				->setVerb('comment');

		$manager->save($comment);

		$comment->setMessage('very beautiful, I am really so much impressed!');
		$manager->save($comment);

		$loadedComment = $manager->get($comment->getId());
		$this->assertSame($comment->getMessage(), $loadedComment->getMessage());

		$this->assertInstanceOf(GenericEvent::class, $calledAfterUpdateEevnt[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeUpdateEevnt[1]);
		$this->assertEquals('comment.beforeupdate', $calledBeforeUpdateEevnt[0]);
		$this->assertEquals('comment.afterupdate', $calledAfterUpdateEevnt[0]);
		$this->assertArrayHasKey('objectId', $calledAfterUpdateEevnt[1]);
		$this->assertArrayHasKey('commentId', $calledAfterUpdateEevnt[1]);
		$this->assertArrayHasKey('message', $calledAfterUpdateEevnt[1]);
		$this->assertArrayHasKey('objectId', $calledBeforeUpdateEevnt[1]);
		$this->assertArrayHasKey('commentId', $calledBeforeUpdateEevnt[1]);
		$this->assertArrayHasKey('message', $calledBeforeUpdateEevnt[1]);
	}

	/**
	 * @expectedException \OCP\Comments\NotFoundException
	 */
	public function testSaveUpdateException() {
		$calledBeforeDeleteEvent = [];
		$calledAfterDeleteEvent = [];
		\OC::$server->getEventDispatcher()->addListener('comment.beforedelete', function (GenericEvent $event) use (&$calledBeforeDeleteEvent) {
			$calledBeforeDeleteEvent[] = 'comment.beforedelete';
			$calledBeforeDeleteEvent[] = $event;
		});
		\OC::$server->getEventDispatcher()->addListener('comment.afterdelete', function (GenericEvent $event) use (&$calledAfterDeleteEvent) {
			$calledAfterDeleteEvent[] = 'comment.afterdelete';
			$calledAfterDeleteEvent[] = $event;
		});

		$manager = $this->getManager();
		$comment = new \OC\Comments\Comment();
		$comment
				->setActor('users', 'alice')
				->setObject('files', 'file64')
				->setMessage('very beautiful, I am impressed!')
				->setVerb('comment');

		$manager->save($comment);

		$manager->delete($comment->getId());
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeDeleteEvent[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterDeleteEvent[1]);
		$this->assertEquals('comment.beforedelete', $calledBeforeDeleteEvent[0]);
		$this->assertEquals('comment.afterdelete', $calledAfterDeleteEvent[0]);
		$this->assertArrayHasKey('commentId', $calledBeforeDeleteEvent[1]);
		$this->assertArrayHasKey('commentId', $calledAfterDeleteEvent[1]);
		$this->assertArrayHasKey('objectId', $calledAfterDeleteEvent[1]);

		$comment->setMessage('very beautiful, I am really so much impressed!');
		$manager->save($comment);
	}

	/**
	 * @expectedException \UnexpectedValueException
	 */
	public function testSaveIncomplete() {
		$manager = $this->getManager();
		$comment = new \OC\Comments\Comment();
		$comment->setMessage('from no one to nothing');
		$manager->save($comment);
	}

	public function testSaveAsChild() {
		$id = $this->addDatabaseEntry(0, 0);

		$manager = $this->getManager();

		for ($i = 0; $i < 3; $i++) {
			$comment = new \OC\Comments\Comment();
			$comment
					->setActor('users', 'alice')
					->setObject('files', 'file64')
					->setParentId(\strval($id))
					->setMessage('full ack')
					->setVerb('comment')
					// setting the creation time avoids using sleep() while making sure to test with different timestamps
					->setCreationDateTime(new \DateTime('+' . $i . ' minutes'));

			$manager->save($comment);

			$this->assertSame($comment->getTopmostParentId(), \strval($id));
			$parentComment = $manager->get(\strval($id));
			$this->assertSame($parentComment->getChildrenCount(), $i + 1);
			$this->assertEquals($parentComment->getLatestChildDateTime(), $comment->getCreationDateTime());
		}
	}

	public function invalidActorArgsProvider() {
		return
		[
			['', ''],
			[1, 'alice'],
			['users', 1],
		];
	}

	/**
	 * @dataProvider invalidActorArgsProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testDeleteReferencesOfActorInvalidInput($type, $id) {
		$manager = $this->getManager();
		$manager->deleteReferencesOfActor($type, $id);
	}

	public function testDeleteReferencesOfActor() {
		$ids = [];
		$ids[] = $this->addDatabaseEntry(0, 0);
		$ids[] = $this->addDatabaseEntry(0, 0);
		$ids[] = $this->addDatabaseEntry(0, 0);

		$manager = $this->getManager();

		// just to make sure they are really set, with correct actor data
		$comment = $manager->get(\strval($ids[1]));
		$this->assertSame($comment->getActorType(), 'users');
		$this->assertSame($comment->getActorId(), 'alice');

		$wasSuccessful = $manager->deleteReferencesOfActor('users', 'alice');
		$this->assertTrue($wasSuccessful);

		foreach ($ids as $id) {
			$comment = $manager->get(\strval($id));
			$this->assertSame($comment->getActorType(), ICommentsManager::DELETED_USER);
			$this->assertSame($comment->getActorId(), ICommentsManager::DELETED_USER);
		}

		// actor info is gone from DB, but when database interaction is alright,
		// we still expect to get true back
		$wasSuccessful = $manager->deleteReferencesOfActor('users', 'alice');
		$this->assertTrue($wasSuccessful);
	}

	public function testDeleteReferencesOfActorWithUserManagement() {
		$user = $this->createUser('xenia', '123456');
		$this->assertInstanceOf(\OCP\IUser::class, $user);

		$manager = \OC::$server->getCommentsManager();
		$comment = $manager->create('users', $user->getUID(), 'files', 'file64');
		$comment
			->setMessage('Most important comment I ever left on the Internet.')
			->setVerb('comment');
		$status = $manager->save($comment);
		$this->assertTrue($status);

		$commentID = $comment->getId();
		$user->delete();

		$comment = $manager->get($commentID);
		$this->assertSame($comment->getActorType(), \OCP\Comments\ICommentsManager::DELETED_USER);
		$this->assertSame($comment->getActorId(), \OCP\Comments\ICommentsManager::DELETED_USER);
	}

	public function invalidObjectArgsProvider() {
		return
				[
						['', ''],
						[1, 'file64'],
						['files', 1],
				];
	}

	/**
	 * @dataProvider invalidObjectArgsProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testDeleteCommentsAtObjectInvalidInput($type, $id) {
		$manager = $this->getManager();
		$manager->deleteCommentsAtObject($type, $id);
	}

	public function testDeleteCommentsAtObject() {
		$ids = [];
		$ids[] = $this->addDatabaseEntry(0, 0);
		$ids[] = $this->addDatabaseEntry(0, 0);
		$ids[] = $this->addDatabaseEntry(0, 0);

		$manager = $this->getManager();

		// just to make sure they are really set, with correct actor data
		$comment = $manager->get(\strval($ids[1]));
		$this->assertSame($comment->getObjectType(), 'files');
		$this->assertSame($comment->getObjectId(), 'file64');

		$wasSuccessful = $manager->deleteCommentsAtObject('files', 'file64');
		$this->assertTrue($wasSuccessful);

		$verified = 0;
		foreach ($ids as $id) {
			try {
				$manager->get(\strval($id));
			} catch (\OCP\Comments\NotFoundException $e) {
				$verified++;
			}
		}
		$this->assertSame($verified, 3);

		// actor info is gone from DB, but when database interaction is alright,
		// we still expect to get true back
		$wasSuccessful = $manager->deleteCommentsAtObject('files', 'file64');
		$this->assertTrue($wasSuccessful);
	}

	public function testSetMarkRead() {
		$user = $this->createMock('\OCP\IUser');
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('alice'));

		$dateTimeSet = new \DateTime();

		$manager = $this->getManager();
		$manager->setReadMark('robot', '36', $dateTimeSet, $user);

		$dateTimeGet = $manager->getReadMark('robot', '36', $user);

		$this->assertEquals($dateTimeGet->format(\DateTime::ISO8601), $dateTimeSet->format(\DateTime::ISO8601));
	}

	public function testSetMarkReadUpdate() {
		$user = $this->createMock('\OCP\IUser');
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('alice'));

		$dateTimeSet = new \DateTime('yesterday');

		$manager = $this->getManager();
		$manager->setReadMark('robot', '36', $dateTimeSet, $user);

		$dateTimeSet = new \DateTime('today');
		$manager->setReadMark('robot', '36', $dateTimeSet, $user);

		$dateTimeGet = $manager->getReadMark('robot', '36', $user);

		$this->assertEquals($dateTimeGet, $dateTimeSet);
	}

	public function testReadMarkDeleteUser() {
		$user = $this->createMock('\OCP\IUser');
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('alice'));

		$dateTimeSet = new \DateTime();

		$manager = $this->getManager();
		$manager->setReadMark('robot', '36', $dateTimeSet, $user);

		$manager->deleteReadMarksFromUser($user);
		$dateTimeGet = $manager->getReadMark('robot', '36', $user);

		$this->assertNull($dateTimeGet);
	}

	public function testReadMarkDeleteObject() {
		$user = $this->createMock('\OCP\IUser');
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('alice'));

		$dateTimeSet = new \DateTime();

		$manager = $this->getManager();
		$manager->setReadMark('robot', '36', $dateTimeSet, $user);

		$manager->deleteReadMarksOnObject('robot', '36');
		$dateTimeGet = $manager->getReadMark('robot', '36', $user);

		$this->assertNull($dateTimeGet);
	}
}
