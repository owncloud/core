<?php
/**
 * Copyright (c) 2017 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Repair;


use OC\Repair\RepairDirectoryMimeType;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Test\TestCase;
use OCP\Files\IMimeTypeLoader;

/**
 * Tests for repairing mismatch file cache paths
 *
 * @group DB
 *
 * @see \OC\Repair\RepairDirectoryMimeType
 */
class RepairDirectoryMimeTypeTest extends TestCase {

	const MIMEPART_DIR_ID = 1;
	const MIMETYPE_DIR_ID = 2;
	const MIMEPART_TEXT_ID = 3;
	const MIMETYPE_TEXT_ID = 4;

	/** @var IRepairStep */
	private $repair;

	/** @var \OCP\IDBConnection */
	private $connection;

	protected function setUp() {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();

		$mimeTypeLoader = $this->createMock(IMimeTypeLoader::class);
		$mimeTypeLoader->method('getId')
			->will($this->returnValueMap([
				['httpd', self::MIMEPART_DIR_ID],
				['httpd/unix-directory', self::MIMETYPE_DIR_ID],
				['text', self::MIMEPART_TEXT_ID],
				['text/plain', self::MIMEPART_DIR_ID],
			]));

		$this->repair = new RepairDirectoryMimeType($this->connection, $mimeTypeLoader);
	}

	protected function tearDown() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('filecache')->execute();
		parent::tearDown();
	}

	private function createFileCacheEntry($path, $parent, $mimeTypeId, $mimePartId) {
		$qb = $this->connection->getQueryBuilder();
		$qb->insert('filecache')
			->values([
				'storage' => $qb->createNamedParameter(1),
				'path' => $qb->createNamedParameter($path),
				'path_hash' => $qb->createNamedParameter(md5($path)),
				'name' => $qb->createNamedParameter(basename($path)),
				'parent' => $qb->createNamedParameter($parent),
				'mimetype' => $qb->createNamedParameter($mimeTypeId),
				'mimepart' => $qb->createNamedParameter($mimePartId),
			]);
		$qb->execute();
		return $this->connection->lastInsertId('*PREFIX*filecache');
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

	public function brokennessProvider() {
		return [
			[self::MIMETYPE_TEXT_ID, self::MIMEPART_TEXT_ID],
			[self::MIMETYPE_TEXT_ID, self::MIMEPART_DIR_ID],
			[self::MIMETYPE_DIR_ID, self::MIMEPART_TEXT_ID],
		];
	}

	/**
	 * Test repair
	 *
	 * @dataProvider brokennessProvider
	 */
	public function testRepairEntry($brokenEntryMimeType, $brokenEntryMimePart) {
		$rootId = $this->createFileCacheEntry('', -1, self::MIMETYPE_DIR_ID, self::MIMEPART_DIR_ID);
		$baseId = $this->createFileCacheEntry('files', $rootId, self::MIMETYPE_DIR_ID, self::MIMEPART_DIR_ID);

		$brokenDirId = $this->createFileCacheEntry('files/brokendir', $baseId, $brokenEntryMimeType, $brokenEntryMimePart);
		$brokenDirChildId = $this->createFileCacheEntry('files/brokendir/child.txt', $brokenDirId, self::MIMETYPE_TEXT_ID, self::MIMEPART_TEXT_ID);

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		// broken dir mime type repaired
		$entry = $this->getFileCacheEntry($brokenDirId);
		$this->assertEquals(self::MIMETYPE_DIR_ID, (int)$entry['mimetype']);
		$this->assertEquals(self::MIMEPART_DIR_ID, (int)$entry['mimepart']);

		// child left alone
		$entry = $this->getFileCacheEntry($brokenDirChildId);
		$this->assertEquals(self::MIMETYPE_TEXT_ID, (int)$entry['mimetype']);
		$this->assertEquals(self::MIMEPART_TEXT_ID, (int)$entry['mimepart']);
	}

	public function testNonRepair() {
		$rootId = $this->createFileCacheEntry('', -1, self::MIMETYPE_DIR_ID, self::MIMEPART_DIR_ID);
		$baseId = $this->createFileCacheEntry('files', $rootId, self::MIMETYPE_DIR_ID, self::MIMEPART_DIR_ID);

		$regularDirId = $this->createFileCacheEntry('files/regulardir', $baseId, self::MIMETYPE_DIR_ID, self::MIMEPART_DIR_ID);
		$regularDirChildId = $this->createFileCacheEntry('files/regulardir/child.txt', $regularDirId, self::MIMETYPE_TEXT_ID, self::MIMEPART_TEXT_ID);
		$nonDirId = $this->createFileCacheEntry('files/text.txt', $baseId, self::MIMETYPE_TEXT_ID, self::MIMEPART_TEXT_ID);

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		// all left alone
		$entry = $this->getFileCacheEntry($regularDirId);
		$this->assertEquals(self::MIMETYPE_DIR_ID, $entry['mimetype']);
		$this->assertEquals(self::MIMEPART_DIR_ID, $entry['mimepart']);

		$entry = $this->getFileCacheEntry($regularDirChildId);
		$this->assertEquals(self::MIMETYPE_TEXT_ID, $entry['mimetype']);
		$this->assertEquals(self::MIMEPART_TEXT_ID, $entry['mimepart']);

		$entry = $this->getFileCacheEntry($nonDirId);
		$this->assertEquals(self::MIMETYPE_TEXT_ID, $entry['mimetype']);
		$this->assertEquals(self::MIMEPART_TEXT_ID, $entry['mimepart']);
	}
}

