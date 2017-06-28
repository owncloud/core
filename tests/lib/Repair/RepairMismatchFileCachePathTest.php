<?php
/**
 * Copyright (c) 2017 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Repair;


use OC\Repair\RepairMismatchFileCachePath;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Test\TestCase;
use OCP\Files\IMimeTypeLoader;

/**
 * Tests for repairing mismatch file cache paths
 *
 * @group DB
 *
 * @see \OC\Repair\RepairMismatchFileCachePath
 */
class RepairMismatchFileCachePathTest extends TestCase {

	/** @var IRepairStep */
	private $repair;

	/** @var \OCP\IDBConnection */
	private $connection;

	protected function setUp() {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();

		$mimeLoader = $this->createMock(IMimeTypeLoader::class);
		$mimeLoader->method('getId')
			->will($this->returnValueMap([
				['httpd', 1],
				['httpd/unix-directory', 2],
			]));
		$this->repair = new RepairMismatchFileCachePath($this->connection, $mimeLoader);
	}

	protected function tearDown() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('filecache')->execute();
		parent::tearDown();
	}

	private function createFileCacheEntry($storage, $path, $parent = -1) {
		$qb = $this->connection->getQueryBuilder();
		$qb->insert('filecache')
			->values([
				'storage' => $qb->createNamedParameter($storage),
				'path' => $qb->createNamedParameter($path),
				'path_hash' => $qb->createNamedParameter(md5($path)),
				'name' => $qb->createNamedParameter(basename($path)),
				'parent' => $qb->createNamedParameter($parent),
			]);
		$qb->execute();
		return $this->connection->lastInsertId('*PREFIX*filecache');
	}

	/**
	 * Returns autoincrement compliant fileid for an entry that might
	 * have existed
	 *
	 * @return int fileid
	 */
	private function createNonExistingId() {
		// why are we doing this ? well, if we just pick an arbitrary
		// value ahead of the autoincrement, this will not reflect real scenarios
		// and also will likely cause potential collisions as some newly inserted entries
		// might receive said arbitrary id through autoincrement
		//
		// So instead, we insert a dummy entry and delete it afterwards so we have
		// "reserved" the fileid and also somehow simulated whatever might have happened
		// on a real system when a file cache entry suddenly disappeared for whatever
		// mysterious reasons
		$entryId = $this->createFileCacheEntry(1, 'goodbye-entry');
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('filecache')
			->where($qb->expr()->eq('fileid', $qb->createNamedParameter($entryId)));
		$qb->execute();
		return $entryId;
	}

	private function getFileCacheEntry($fileId) {
		$qb = $this->connection->getQueryBuilder();
		$qb->select('*')
			->from('filecache')
			->where($qb->expr()->eq('fileid', $qb->createNamedParameter($fileId)));
		$results = $qb->execute();
		$result = $results->fetch();
		$results->closeCursor();
		return $result;
	}

	/**
	 * Sets the parent of the given file id to the given parent id
	 *
	 * @param int $fileId file id of the entry to adjust
	 * @param int $parentId parent id to set to
	 */
	private function setFileCacheEntryParent($fileId, $parentId) {
		$qb = $this->connection->getQueryBuilder();
		$qb->update('filecache')
			->set('parent', $qb->createNamedParameter($parentId))
			->where($qb->expr()->eq('fileid', $qb->createNamedParameter($fileId)));
		$qb->execute();
	}

	public function repairCasesProvider() {
		return [
			// same storage, different target dir
			[1, 1, 'target'],
			// different storage, same target dir name
			[1, 2, 'source'],
			// different storage, different target dir
			[1, 2, 'target'],

			// same storage, different target dir, target exists
			[1, 1, 'target', true],
			// different storage, same target dir name, target exists
			[1, 2, 'source', true],
			// different storage, different target dir, target exists
			[1, 2, 'target', true],
		];
	}

	/**
	 * Test repair
	 *
	 * @dataProvider repairCasesProvider
	 */
	public function testRepairEntry($sourceStorageId, $targetStorageId, $targetDir, $targetExists = false) {
		/*
		 * Tree:
		 *
		 * source storage:
		 *     - files/
		 *     - files/source/
		 *     - files/source/to_move (not created as we simulate that it was already moved)
		 *     - files/source/to_move/content_to_update (bogus entry to fix)
		 *     - files/source/to_move/content_to_update/sub (bogus subentry to fix)
		 *     - files/source/do_not_touch (regular entry outside of the repair scope)
		 *
		 * target storage:
		 *     - files/
		 *     - files/target/
		 *     - files/target/moved_renamed (already moved target)
		 *     - files/target/moved_renamed/content_to_update (missing until repair)
		 *
		 * if $targetExists: pre-create these additional entries:
		 *     - files/target/moved_renamed/content_to_update (will be overwritten)
		 *     - files/target/moved_renamed/content_to_update/sub (will be overwritten)
		 *     - files/target/moved_renamed/content_to_update/unrelated (will be reparented)
		 *
		 */

		// source storage entries
		$rootId1 = $this->createFileCacheEntry($sourceStorageId, '');
		$baseId1 = $this->createFileCacheEntry($sourceStorageId, 'files', $rootId1);
		if ($sourceStorageId !== $targetStorageId) {
			$rootId2 = $this->createFileCacheEntry($targetStorageId, '');
			$baseId2 = $this->createFileCacheEntry($targetStorageId, 'files', $rootId2);
		} else {
			$rootId2 = $rootId1;
			$baseId2 = $baseId1;
		}
		$sourceId = $this->createFileCacheEntry($sourceStorageId, 'files/source', $baseId1);

		// target storage entries
		$targetParentId = $this->createFileCacheEntry($targetStorageId, 'files/' . $targetDir, $baseId2);

		// the move does create the parent in the target
		$targetId = $this->createFileCacheEntry($targetStorageId, 'files/' . $targetDir . '/moved_renamed', $targetParentId);

		// bogus entry: any children of the source are not properly updated
		$movedId = $this->createFileCacheEntry($sourceStorageId, 'files/source/to_move/content_to_update', $targetId);
		$movedSubId = $this->createFileCacheEntry($sourceStorageId, 'files/source/to_move/content_to_update/sub', $movedId);

		if ($targetExists) {
			// after the bogus move happened, some code path recreated the parent under a
			// different file id
			$existingTargetId = $this->createFileCacheEntry($targetStorageId, 'files/' . $targetDir . '/moved_renamed/content_to_update', $targetId);
			$existingTargetSubId = $this->createFileCacheEntry($targetStorageId, 'files/' . $targetDir . '/moved_renamed/content_to_update/sub', $existingTargetId);
			$existingTargetUnrelatedId = $this->createFileCacheEntry($targetStorageId, 'files/' . $targetDir . '/moved_renamed/content_to_update/unrelated', $existingTargetId);
		}

		$doNotTouchId = $this->createFileCacheEntry($sourceStorageId, 'files/source/do_not_touch', $sourceId);

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$entry = $this->getFileCacheEntry($movedId);
		$this->assertEquals($targetId, $entry['parent']);
		$this->assertEquals((string)$targetStorageId, $entry['storage']);
		$this->assertEquals('files/' . $targetDir . '/moved_renamed/content_to_update', $entry['path']);
		$this->assertEquals(md5('files/' . $targetDir . '/moved_renamed/content_to_update'), $entry['path_hash']);

		$entry = $this->getFileCacheEntry($movedSubId);
		$this->assertEquals($movedId, $entry['parent']);
		$this->assertEquals((string)$targetStorageId, $entry['storage']);
		$this->assertEquals('files/' . $targetDir . '/moved_renamed/content_to_update/sub', $entry['path']);
		$this->assertEquals(md5('files/' . $targetDir . '/moved_renamed/content_to_update/sub'), $entry['path_hash']);

		if ($targetExists) {
			$this->assertFalse($this->getFileCacheEntry($existingTargetId));
			$this->assertFalse($this->getFileCacheEntry($existingTargetSubId));

			// unrelated folder has been reparented
			$entry = $this->getFileCacheEntry($existingTargetUnrelatedId);
			$this->assertEquals($movedId, $entry['parent']);
			$this->assertEquals((string)$targetStorageId, $entry['storage']);
			$this->assertEquals('files/' . $targetDir . '/moved_renamed/content_to_update/unrelated', $entry['path']);
			$this->assertEquals(md5('files/' . $targetDir . '/moved_renamed/content_to_update/unrelated'), $entry['path_hash']);
		}

		// root entries left alone
		$entry = $this->getFileCacheEntry($rootId1);
		$this->assertEquals(-1, $entry['parent']);
		$this->assertEquals((string)$sourceStorageId, $entry['storage']);
		$this->assertEquals('', $entry['path']);
		$this->assertEquals(md5(''), $entry['path_hash']);

		$entry = $this->getFileCacheEntry($rootId2);
		$this->assertEquals(-1, $entry['parent']);
		$this->assertEquals((string)$targetStorageId, $entry['storage']);
		$this->assertEquals('', $entry['path']);
		$this->assertEquals(md5(''), $entry['path_hash']);

		// "do not touch" entry left untouched
		$entry = $this->getFileCacheEntry($doNotTouchId);
		$this->assertEquals($sourceId, $entry['parent']);
		$this->assertEquals((string)$sourceStorageId, $entry['storage']);
		$this->assertEquals('files/source/do_not_touch', $entry['path']);
		$this->assertEquals(md5('files/source/do_not_touch'), $entry['path_hash']);

		// root entry left alone
		$entry = $this->getFileCacheEntry($rootId1);
		$this->assertEquals(-1, $entry['parent']);
		$this->assertEquals((string)$sourceStorageId, $entry['storage']);
		$this->assertEquals('', $entry['path']);
		$this->assertEquals(md5(''), $entry['path_hash']);
	}

	/**
	 * Test repair self referencing entries
	 */
	public function testRepairSelfReferencing() {
		/**
		 * Self-referencing:
		 *     - files/all_your_zombies (parent=fileid must be reparented)
		 *
		 * Referencing child one level:
		 *     - files/ref_child1 (parent=fileid of the child)
		 *     - files/ref_child1/child (parent=fileid of the child)
		 *
		 * Referencing child two levels:
		 *     - files/ref_child2/ (parent=fileid of the child's child)
		 *     - files/ref_child2/child
		 *     - files/ref_child2/child/child
		 *
		 * Referencing child two levels detached:
		 *     - detached/ref_child3/ (parent=fileid of the child, "detached" has no entry)
		 *     - detached/ref_child3/child
		 */
		$storageId = 1;
		$rootId1 = $this->createFileCacheEntry($storageId, '');
		$baseId1 = $this->createFileCacheEntry($storageId, 'files', $rootId1);

		$selfRefId = $this->createFileCacheEntry($storageId, 'files/all_your_zombies', $baseId1);
		$this->setFileCacheEntryParent($selfRefId, $selfRefId);

		$refChild1Id = $this->createFileCacheEntry($storageId, 'files/ref_child1', $baseId1);
		$refChild1ChildId = $this->createFileCacheEntry($storageId, 'files/ref_child1/child', $refChild1Id);
		// make it reference its own child
		$this->setFileCacheEntryParent($refChild1Id, $refChild1ChildId);

		$refChild2Id = $this->createFileCacheEntry($storageId, 'files/ref_child2', $baseId1);
		$refChild2ChildId = $this->createFileCacheEntry($storageId, 'files/ref_child2/child', $refChild2Id);
		$refChild2ChildChildId = $this->createFileCacheEntry($storageId, 'files/ref_child2/child/child', $refChild2ChildId);
		// make it reference its own sub child
		$this->setFileCacheEntryParent($refChild2Id, $refChild2ChildChildId);

		$refChild3Id = $this->createFileCacheEntry($storageId, 'detached/ref_child3', $baseId1);
		$refChild3ChildId = $this->createFileCacheEntry($storageId, 'detached/ref_child3/child', $refChild3Id);
		// make it reference its own child
		$this->setFileCacheEntryParent($refChild3Id, $refChild3ChildId);

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		// self-referencing updated
		$entry = $this->getFileCacheEntry($selfRefId);
		$this->assertEquals($baseId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/all_your_zombies', $entry['path']);
		$this->assertEquals(md5('files/all_your_zombies'), $entry['path_hash']);

		// ref child 1 case was reparented to "files"
		$entry = $this->getFileCacheEntry($refChild1Id);
		$this->assertEquals($baseId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/ref_child1', $entry['path']);
		$this->assertEquals(md5('files/ref_child1'), $entry['path_hash']);

		// ref child 1 child left alone
		$entry = $this->getFileCacheEntry($refChild1ChildId);
		$this->assertEquals($refChild1Id, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/ref_child1/child', $entry['path']);
		$this->assertEquals(md5('files/ref_child1/child'), $entry['path_hash']);

		// ref child 2 case was reparented to "files"
		$entry = $this->getFileCacheEntry($refChild2Id);
		$this->assertEquals($baseId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/ref_child2', $entry['path']);
		$this->assertEquals(md5('files/ref_child2'), $entry['path_hash']);

		// ref child 2 child left alone
		$entry = $this->getFileCacheEntry($refChild2ChildId);
		$this->assertEquals($refChild2Id, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/ref_child2/child', $entry['path']);
		$this->assertEquals(md5('files/ref_child2/child'), $entry['path_hash']);

		// ref child 2 child child left alone
		$entry = $this->getFileCacheEntry($refChild2ChildChildId);
		$this->assertEquals($refChild2ChildId, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/ref_child2/child/child', $entry['path']);
		$this->assertEquals(md5('files/ref_child2/child/child'), $entry['path_hash']);

		// root entry left alone
		$entry = $this->getFileCacheEntry($rootId1);
		$this->assertEquals(-1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('', $entry['path']);
		$this->assertEquals(md5(''), $entry['path_hash']);

		// ref child 3 child left alone
		$entry = $this->getFileCacheEntry($refChild3ChildId);
		$this->assertEquals($refChild3Id, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('detached/ref_child3/child', $entry['path']);
		$this->assertEquals(md5('detached/ref_child3/child'), $entry['path_hash']);

		// ref child 3 case was reparented to a new "detached" entry
		$entry = $this->getFileCacheEntry($refChild3Id);
		$this->assertTrue(isset($entry['parent']));
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('detached/ref_child3', $entry['path']);
		$this->assertEquals(md5('detached/ref_child3'), $entry['path_hash']);

		// entry "detached" was restored
		$entry = $this->getFileCacheEntry($entry['parent']);
		$this->assertEquals($rootId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('detached', $entry['path']);
		$this->assertEquals(md5('detached'), $entry['path_hash']);
	}

	/**
	 * Test repair wrong parent id
	 */
	public function testRepairParentIdPointingNowhere() {
		/**
		 * Wrong parent id
		 *     - wrongparentroot
		 *     - files/wrongparent
		 */
		$storageId = 1;
		$rootId1 = $this->createFileCacheEntry($storageId, '');
		$baseId1 = $this->createFileCacheEntry($storageId, 'files', $rootId1);

		$nonExistingParentId = $this->createNonExistingId();
		$wrongParentRootId = $this->createFileCacheEntry($storageId, 'wrongparentroot', $nonExistingParentId);
		$wrongParentId = $this->createFileCacheEntry($storageId, 'files/wrongparent', $nonExistingParentId);

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		// wrong parent root reparented to actual root
		$entry = $this->getFileCacheEntry($wrongParentRootId);
		$this->assertEquals($rootId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('wrongparentroot', $entry['path']);
		$this->assertEquals(md5('wrongparentroot'), $entry['path_hash']);

		// wrong parent subdir reparented to "files"
		$entry = $this->getFileCacheEntry($wrongParentId);
		$this->assertEquals($baseId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/wrongparent', $entry['path']);
		$this->assertEquals(md5('files/wrongparent'), $entry['path_hash']);

		// root entry left alone
		$entry = $this->getFileCacheEntry($rootId1);
		$this->assertEquals(-1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('', $entry['path']);
		$this->assertEquals(md5(''), $entry['path_hash']);
	}

	/**
	 * Test repair detached subtree
	 */
	public function testRepairDetachedSubtree() {
		/**
		 * other:
		 *     - files/missingdir/orphaned1 (orphaned entry as "missingdir" is missing)
		 *     - missingdir/missingdir1/orphaned2 (orphaned entry two levels up to root)
		 *     - noroot (orphaned entry on a storage that has no root entry)
		 */
		$storageId = 1;
		$storageId2 = 2;
		$rootId1 = $this->createFileCacheEntry($storageId, '');
		$baseId1 = $this->createFileCacheEntry($storageId, 'files', $rootId1);

		$nonExistingParentId = $this->createNonExistingId();
		$orphanedId1 = $this->createFileCacheEntry($storageId, 'files/missingdir/orphaned1', $nonExistingParentId);

		$nonExistingParentId2 = $this->createNonExistingId();
		$orphanedId2 = $this->createFileCacheEntry($storageId, 'missingdir/missingdir1/orphaned2', $nonExistingParentId2);

		$nonExistingParentId3 = $this->createNonExistingId();
		$orphanedId3 = $this->createFileCacheEntry($storageId2, 'noroot', $nonExistingParentId3);

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		// orphaned entry reattached
		$entry = $this->getFileCacheEntry($orphanedId1);
		$this->assertEquals($nonExistingParentId, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/missingdir/orphaned1', $entry['path']);
		$this->assertEquals(md5('files/missingdir/orphaned1'), $entry['path_hash']);

		// non existing id exists now
		$entry = $this->getFileCacheEntry($entry['parent']);
		$this->assertEquals($baseId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('files/missingdir', $entry['path']);
		$this->assertEquals(md5('files/missingdir'), $entry['path_hash']);

		// orphaned entry reattached
		$entry = $this->getFileCacheEntry($orphanedId2);
		$this->assertEquals($nonExistingParentId2, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('missingdir/missingdir1/orphaned2', $entry['path']);
		$this->assertEquals(md5('missingdir/missingdir1/orphaned2'), $entry['path_hash']);

		// non existing id exists now
		$entry = $this->getFileCacheEntry($entry['parent']);
		$this->assertTrue(isset($entry['parent']));
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('missingdir/missingdir1', $entry['path']);
		$this->assertEquals(md5('missingdir/missingdir1'), $entry['path_hash']);

		// non existing id parent exists now
		$entry = $this->getFileCacheEntry($entry['parent']);
		$this->assertEquals($rootId1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('missingdir', $entry['path']);
		$this->assertEquals(md5('missingdir'), $entry['path_hash']);

		// root entry left alone
		$entry = $this->getFileCacheEntry($rootId1);
		$this->assertEquals(-1, $entry['parent']);
		$this->assertEquals((string)$storageId, $entry['storage']);
		$this->assertEquals('', $entry['path']);
		$this->assertEquals(md5(''), $entry['path_hash']);

		// orphaned entry with no root reattached
		$entry = $this->getFileCacheEntry($orphanedId3);
		$this->assertTrue(isset($entry['parent']));
		$this->assertEquals((string)$storageId2, $entry['storage']);
		$this->assertEquals('noroot', $entry['path']);
		$this->assertEquals(md5('noroot'), $entry['path_hash']);

		// recreated root entry
		$entry = $this->getFileCacheEntry($entry['parent']);
		$this->assertEquals(-1, $entry['parent']);
		$this->assertEquals((string)$storageId2, $entry['storage']);
		$this->assertEquals('', $entry['path']);
		$this->assertEquals(md5(''), $entry['path_hash']);
	}
}

