<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Cache;

use PHPUnit_Framework_MockObject_MockObject;

class LongId extends \OC\Files\Storage\Temporary {
	public function getId() {
		return 'long:' . str_repeat('foo', 50) . parent::getId();
	}
}

class Cache extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \OC\Files\Storage\Temporary $storage ;
	 */
	private $storage;
	/**
	 * @var \OC\Files\Storage\Temporary $storage2 ;
	 */
	private $storage2;

	/**
	 * @var \OC\Files\Cache\Cache $cache
	 */
	private $cache;
	/**
	 * @var \OC\Files\Cache\Cache $cache2
	 */
	private $cache2;

	public function testSimple() {
		$file1 = 'foo';
		$file2 = 'foo/bar';
		$data1 = array('size' => 100, 'mtime' => 50, 'mimetype' => 'foo/folder');
		$data2 = array('size' => 1000, 'mtime' => 20, 'mimetype' => 'foo/file', 'etag' => '1234');

		$this->assertFalse($this->cache->inCache($file1));
		// doctrine returns false when no result could be fetched
		$this->assertSame($this->cache->get($file1), false);

		$id1 = $this->cache->put($file1, $data1);
		$this->assertTrue($this->cache->inCache($file1));
		$cacheData1 = $this->cache->get($file1);
		foreach ($data1 as $key => $value) {
			$this->assertSame($value, $cacheData1[$key]);
		}
		$this->assertSame($cacheData1['mimepart'], 'foo');
		$this->assertSame($cacheData1['fileid'], $id1);
		$this->assertSame($id1, $this->cache->getId($file1));

		$this->assertFalse($this->cache->inCache($file2));
		$id2 = $this->cache->put($file2, $data2);
		$this->assertTrue($this->cache->inCache($file2));
		$cacheData2 = $this->cache->get($file2);
		foreach ($data2 as $key => $value) {
			$this->assertSame($value, $cacheData2[$key]);
		}
		$this->assertSame($cacheData1['fileid'], $cacheData2['parent']);
		$this->assertSame($cacheData2['fileid'], $id2);
		$this->assertSame($id2, $this->cache->getId($file2));
		$this->assertSame($id1, $this->cache->getParentId($file2));

		$newSize = 1050;
		$newId2 = $this->cache->put($file2, array('size' => $newSize));
		$cacheData2 = $this->cache->get($file2);
		$this->assertSame($newId2, $id2);
		$this->assertSame($cacheData2['size'], $newSize);
		$this->assertSame($cacheData1, $this->cache->get($file1));

		$this->cache->remove($file2);
		$this->assertFalse($this->cache->inCache($file2));
		// doctrine returns false when no result could be fetched
		$this->assertSame($this->cache->get($file2), false);
		$this->assertTrue($this->cache->inCache($file1));

		$this->assertSame($cacheData1, $this->cache->get($id1));
	}

	public function testPartial() {
		$file1 = 'foo';

		$this->cache->put($file1, array('size' => 10));
		$this->assertSame(array('size' => 10), $this->cache->get($file1));

		$this->cache->put($file1, array('mtime' => 15));
		$this->assertSame(array('size' => 10, 'mtime' => 15), $this->cache->get($file1));

		$this->cache->put($file1, array('size' => 12));
		$this->assertSame(array('size' => 12, 'mtime' => 15), $this->cache->get($file1));
	}

	public function testFolder() {
		$file1 = 'folder';
		$file2 = 'folder/bar';
		$file3 = 'folder/foo';
		$data1 = array('size' => 100, 'mtime' => 50, 'mimetype' => 'httpd/unix-directory');
		$fileData = array();
		$fileData['bar'] = array('size' => 1000, 'mtime' => 20, 'mimetype' => 'foo/file', 'etag' => 'abcdefg');
		$fileData['foo'] = array('size' => 20, 'mtime' => 25, 'mimetype' => 'foo/file', 'etag' => '123456789');

		$this->cache->put($file1, $data1);
		$this->cache->put($file2, $fileData['bar']);
		$this->cache->put($file3, $fileData['foo']);

		$content = $this->cache->getFolderContents($file1);
		$this->assertSame(count($content), 2);
		foreach ($content as $cachedData) {
			$data = $fileData[$cachedData['name']];
			foreach ($data as $name => $value) {
				$this->assertSame($value, $cachedData[$name]);
			}
		}

		$file4 = 'folder/unkownSize';
		$fileData['unkownSize'] = array('size' => -1, 'mtime' => 25, 'mimetype' => 'foo/file');
		$this->cache->put($file4, $fileData['unkownSize']);

		$this->assertSame(-1, $this->cache->calculateFolderSize($file1));

		$fileData['unkownSize'] = array('size' => 5, 'mtime' => 25, 'mimetype' => 'foo/file');
		$this->cache->put($file4, $fileData['unkownSize']);

		$this->assertSame(1025, $this->cache->calculateFolderSize($file1));

		$this->cache->remove($file2);
		$this->cache->remove($file3);
		$this->cache->remove($file4);
		$this->assertSame(0, $this->cache->calculateFolderSize($file1));

		$this->cache->remove('folder');
		$this->assertFalse($this->cache->inCache('folder/foo'));
		$this->assertFalse($this->cache->inCache('folder/bar'));
	}

	public function testEncryptedFolder() {
		$file1 = 'folder';
		$file2 = 'folder/bar';
		$file3 = 'folder/foo';
		$data1 = array('size' => 100, 'mtime' => 50, 'mimetype' => 'httpd/unix-directory');
		$fileData = array();
		$fileData['bar'] = array('size' => 1000, 'unencrypted_size' => 900, 'encrypted' => 1, 'mtime' => 20, 'mimetype' => 'foo/file');
		$fileData['foo'] = array('size' => 20, 'unencrypted_size' => 16, 'encrypted' => 1, 'mtime' => 25, 'mimetype' => 'foo/file');

		$this->cache->put($file1, $data1);
		$this->cache->put($file2, $fileData['bar']);
		$this->cache->put($file3, $fileData['foo']);

		$content = $this->cache->getFolderContents($file1);
		$this->assertSame(count($content), 2);
		foreach ($content as $cachedData) {
			$data = $fileData[$cachedData['name']];
			// indirect retrieval swaps  unencrypted_size and size
			$this->assertSame($data['unencrypted_size'], $cachedData['size']);
		}

		$file4 = 'folder/unkownSize';
		$fileData['unkownSize'] = array('size' => -1, 'mtime' => 25, 'mimetype' => 'foo/file');
		$this->cache->put($file4, $fileData['unkownSize']);

		$this->assertSame(-1, $this->cache->calculateFolderSize($file1));

		$fileData['unkownSize'] = array('size' => 5, 'mtime' => 25, 'mimetype' => 'foo/file');
		$this->cache->put($file4, $fileData['unkownSize']);

		$this->assertSame(916, $this->cache->calculateFolderSize($file1));
		// direct cache entry retrieval returns the original values
		$entry = $this->cache->get($file1);
		$this->assertSame(1025, $entry['size']);
		$this->assertSame(916, $entry['unencrypted_size']);

		$this->cache->remove($file2);
		$this->cache->remove($file3);
		$this->cache->remove($file4);
		$this->assertSame(0, $this->cache->calculateFolderSize($file1));

		$this->cache->remove('folder');
		$this->assertFalse($this->cache->inCache('folder/foo'));
		$this->assertFalse($this->cache->inCache('folder/bar'));
	}

	public function testRootFolderSizeForNonHomeStorage() {
		$dir1 = 'knownsize';
		$dir2 = 'unknownsize';
		$fileData = array();
		$fileData[''] = array('size' => -1, 'mtime' => 20, 'mimetype' => 'httpd/unix-directory');
		$fileData[$dir1] = array('size' => 1000, 'mtime' => 20, 'mimetype' => 'httpd/unix-directory');
		$fileData[$dir2] = array('size' => -1, 'mtime' => 25, 'mimetype' => 'httpd/unix-directory');

		$this->cache->put('', $fileData['']);
		$this->cache->put($dir1, $fileData[$dir1]);
		$this->cache->put($dir2, $fileData[$dir2]);

		$this->assertTrue($this->cache->inCache($dir1));
		$this->assertTrue($this->cache->inCache($dir2));

		// check that root size ignored the unknown sizes
		$this->assertSame(-1, $this->cache->calculateFolderSize(''));

		// clean up
		$this->cache->remove('');
		$this->cache->remove($dir1);
		$this->cache->remove($dir2);

		$this->assertFalse($this->cache->inCache($dir1));
		$this->assertFalse($this->cache->inCache($dir2));
	}

	function testStatus() {
		$this->assertSame(\OC\Files\Cache\Cache::NOT_FOUND, $this->cache->getStatus('foo'));
		$this->cache->put('foo', array('size' => -1));
		$this->assertSame(\OC\Files\Cache\Cache::PARTIAL, $this->cache->getStatus('foo'));
		$this->cache->put('foo', array('size' => -1, 'mtime' => 20, 'mimetype' => 'foo/file'));
		$this->assertSame(\OC\Files\Cache\Cache::SHALLOW, $this->cache->getStatus('foo'));
		$this->cache->put('foo', array('size' => 10));
		$this->assertSame(\OC\Files\Cache\Cache::COMPLETE, $this->cache->getStatus('foo'));
	}

	function testSearch() {
		$file1 = 'folder';
		$file2 = 'folder/foobar';
		$file3 = 'folder/foo';
		$data1 = array('size' => 100, 'mtime' => 50, 'mimetype' => 'foo/folder');
		$fileData = array();
		$fileData['foobar'] = array('size' => 1000, 'mtime' => 20, 'mimetype' => 'foo/file');
		$fileData['foo'] = array('size' => 20, 'mtime' => 25, 'mimetype' => 'foo/file');

		$this->cache->put($file1, $data1);
		$this->cache->put($file2, $fileData['foobar']);
		$this->cache->put($file3, $fileData['foo']);

		$this->assertSame(2, count($this->cache->search('%foo%')));
		$this->assertSame(1, count($this->cache->search('foo')));
		$this->assertSame(1, count($this->cache->search('%folder%')));
		$this->assertSame(1, count($this->cache->search('folder%')));
		$this->assertSame(3, count($this->cache->search('%')));

		$this->assertSame(3, count($this->cache->searchByMime('foo')));
		$this->assertSame(2, count($this->cache->searchByMime('foo/file')));
	}

	function testMove() {
		$file1 = 'folder';
		$file2 = 'folder/bar';
		$file3 = 'folder/foo';
		$file4 = 'folder/foo/1';
		$file5 = 'folder/foo/2';
		$data = array('size' => 100, 'mtime' => 50, 'mimetype' => 'foo/bar');
		$folderData = array('size' => 100, 'mtime' => 50, 'mimetype' => 'httpd/unix-directory');

		$this->cache->put($file1, $folderData);
		$this->cache->put($file2, $folderData);
		$this->cache->put($file3, $folderData);
		$this->cache->put($file4, $data);
		$this->cache->put($file5, $data);

		/* simulate a second user with a different storage id but the same folder structure */
		$this->cache2->put($file1, $folderData);
		$this->cache2->put($file2, $folderData);
		$this->cache2->put($file3, $folderData);
		$this->cache2->put($file4, $data);
		$this->cache2->put($file5, $data);

		$this->cache->move('folder/foo', 'folder/foobar');

		$this->assertFalse($this->cache->inCache('folder/foo'));
		$this->assertFalse($this->cache->inCache('folder/foo/1'));
		$this->assertFalse($this->cache->inCache('folder/foo/2'));

		$this->assertTrue($this->cache->inCache('folder/bar'));
		$this->assertTrue($this->cache->inCache('folder/foobar'));
		$this->assertTrue($this->cache->inCache('folder/foobar/1'));
		$this->assertTrue($this->cache->inCache('folder/foobar/2'));

		/* the folder structure of the second user must not change! */
		$this->assertTrue($this->cache2->inCache('folder/bar'));
		$this->assertTrue($this->cache2->inCache('folder/foo'));
		$this->assertTrue($this->cache2->inCache('folder/foo/1'));
		$this->assertTrue($this->cache2->inCache('folder/foo/2'));

		$this->assertFalse($this->cache2->inCache('folder/foobar'));
		$this->assertFalse($this->cache2->inCache('folder/foobar/1'));
		$this->assertFalse($this->cache2->inCache('folder/foobar/2'));
	}

	function testGetIncomplete() {
		$file1 = 'folder1';
		$file2 = 'folder2';
		$file3 = 'folder3';
		$file4 = 'folder4';
		$data = array('size' => 10, 'mtime' => 50, 'mimetype' => 'foo/bar');

		$this->cache->put($file1, $data);
		$data['size'] = -1;
		$this->cache->put($file2, $data);
		$this->cache->put($file3, $data);
		$data['size'] = 12;
		$this->cache->put($file4, $data);

		$this->assertSame($file3, $this->cache->getIncomplete());
	}

	function testNonExisting() {
		$this->assertFalse($this->cache->get('foo.txt'));
		$this->assertSame(array(), $this->cache->getFolderContents('foo'));
	}

	function testGetById() {
		$storageId = $this->storage->getId();
		$data = array('size' => 1000, 'mtime' => 20, 'mimetype' => 'foo/file');
		$id = $this->cache->put('foo', $data);
		$this->assertSame(array($storageId, 'foo'), \OC\Files\Cache\Cache::getById($id));
	}

	function testStorageMTime() {
		$data = array('size' => 1000, 'mtime' => 20, 'mimetype' => 'foo/file');
		$this->cache->put('foo', $data);
		$cachedData = $this->cache->get('foo');
		$this->assertSame($data['mtime'], $cachedData['storage_mtime']); //if no storage_mtime is saved, mtime should be used

		$this->cache->put('foo', array('storage_mtime' => 30)); //when setting storage_mtime, mtime is also set
		$cachedData = $this->cache->get('foo');
		$this->assertSame(30, $cachedData['storage_mtime']);
		$this->assertSame(30, $cachedData['mtime']);

		$this->cache->put('foo', array('mtime' => 25)); //setting mtime does not change storage_mtime
		$cachedData = $this->cache->get('foo');
		$this->assertSame(30, $cachedData['storage_mtime']);
		$this->assertSame(25, $cachedData['mtime']);
	}

	function testLongId() {
		$storage = new LongId(array());
		$cache = $storage->getCache();
		$storageId = $storage->getId();
		$data = array('size' => 1000, 'mtime' => 20, 'mimetype' => 'foo/file');
		$id = $cache->put('foo', $data);
		$this->assertSame(array(md5($storageId), 'foo'), \OC\Files\Cache\Cache::getById($id));
	}

	/**
	 * @brief this test show the bug resulting if we have no normalizer installed
	 */
	public function testWithoutNormalizer() {
		// folder name "Schön" with U+00F6 (normalized)
		$folderWith00F6 = "\x53\x63\x68\xc3\xb6\x6e";

		// folder name "Schön" with U+0308 (un-normalized)
		$folderWith0308 = "\x53\x63\x68\x6f\xcc\x88\x6e";

		/**
		 * @var \OC\Files\Cache\Cache | PHPUnit_Framework_MockObject_MockObject $cacheMock
		 */
		$cacheMock = $this->getMock('\OC\Files\Cache\Cache', array('normalize'), array($this->storage), '', true);

		$cacheMock->expects($this->any())
			->method('normalize')
			->will($this->returnArgument(0));

		$data = array('size' => 100, 'mtime' => 50, 'mimetype' => 'httpd/unix-directory');

		// put root folder
		$this->assertFalse($cacheMock->get('folder'));
		$this->assertGreaterThan(0, $cacheMock->put('folder', $data));

		// put un-normalized folder
		$this->assertFalse($cacheMock->get('folder/' . $folderWith0308));
		$this->assertGreaterThan(0, $cacheMock->put('folder/' . $folderWith0308, $data));

		// get un-normalized folder by name
		$unNormalizedFolderName = $cacheMock->get('folder/' . $folderWith0308);

		// check if database layer normalized the folder name (this should not happen)
		$this->assertEquals($folderWith0308, $unNormalizedFolderName['name']);

		// put normalized folder
		$this->assertFalse($cacheMock->get('folder/' . $folderWith00F6));
		$this->assertGreaterThan(0, $cacheMock->put('folder/' . $folderWith00F6, $data));

		// this is our bug, we have two different hashes with the same name (Schön)
		$this->assertSame(2, count($cacheMock->getFolderContents('folder')));
	}

	/**
	 * @brief this test shows that there is no bug if we use the normalizer
	 */
	public function testWithNormalizer() {

		if (!class_exists('Patchwork\PHP\Shim\Normalizer')) {
			$this->markTestSkipped('The 3rdparty Normalizer extension is not available.');
			return;
		}

		// folder name "Schön" with U+00F6 (normalized)
		$folderWith00F6 = "\x53\x63\x68\xc3\xb6\x6e";

		// folder name "Schön" with U+0308 (un-normalized)
		$folderWith0308 = "\x53\x63\x68\x6f\xcc\x88\x6e";

		$data = array('size' => 100, 'mtime' => 50, 'mimetype' => 'httpd/unix-directory');

		// put root folder
		$this->assertFalse($this->cache->get('folder'));
		$this->assertGreaterThan(0, $this->cache->put('folder', $data));

		// put un-normalized folder
		$this->assertFalse($this->cache->get('folder/' . $folderWith0308));
		$this->assertGreaterThan(0, $this->cache->put('folder/' . $folderWith0308, $data));

		// get un-normalized folder by name
		$unNormalizedFolderName = $this->cache->get('folder/' . $folderWith0308);

		// check if folder name was normalized
		$this->assertSame($folderWith00F6, $unNormalizedFolderName['name']);

		// put normalized folder
		$this->assertTrue(is_array($this->cache->get('folder/' . $folderWith00F6)));
		$this->assertGreaterThan(0, $this->cache->put('folder/' . $folderWith00F6, $data));

		// at this point we should have only one folder named "Schön"
		$this->assertSame(1, count($this->cache->getFolderContents('folder')));
	}

	public function tearDown() {
		if ($this->cache) {
			$this->cache->clear();
		}
	}

	public function setUp() {
		$this->storage = new \OC\Files\Storage\Temporary(array());
		$this->storage2 = new \OC\Files\Storage\Temporary(array());
		$this->cache = new \OC\Files\Cache\Cache($this->storage);
		$this->cache2 = new \OC\Files\Cache\Cache($this->storage2);
	}
}
