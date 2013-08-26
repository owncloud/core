<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Test\Files\Cache;

use OCA\Files\Share\FileShare;

class TestSharedCache extends \OC\Files\Cache\SharedCache {

	public function getMimetype($id) {
		$mimetypes = array(
			1 => 'httpd',
			2 => 'httpd/unix-directory',
			3 => 'text',
			4 => 'text/plain',
		);
		if (isset($mimetypes[$id])) {
			return $mimetypes[$id];
		}
		return null;
	}

}

class SharedCache extends \PHPUnit_Framework_TestCase {

	protected $storage;
	protected $fetcher;
	protected $cache;
	protected $sourceStorage;
	protected $sourceCache;

	protected function setUp() {
		$this->storage = $this->getMockBuilder('\OC\Files\Storage\Shared')
			->disableOriginalConstructor()
			->getMock();
		$this->fetcher = $this->getMockBuilder('\OCA\Files\Share\FileShareFetcher')
			->disableOriginalConstructor()
			->getMock();
		$this->cache = new TestSharedCache($this->storage, $this->fetcher);
		$this->sourceStorage = $this->getMockBuilder('\OC\Files\Storage\Local')
			->disableOriginalConstructor()
			->getMock();
		$this->sourceCache = $this->getMockBuilder('\OC\Files\Cache\Cache')
			->disableOriginalConstructor()
			->getMock();
		$this->sourceStorage->expects($this->any())
			->method('getCache')
			->will($this->returnValue($this->sourceCache));
	}

	protected function getTestShareFile() {
		$share = new FileShare();
		$share->setItemSource(23);
		$share->setStorage(1);
		$share->setItemTarget('foo.txt');
		$share->setPath('files/foo.txt');
		$share->setParent(2);
		$share->setMimetype(4);
		$share->setMimepart(3);
		$share->setSize(342);
		$share->setMtime(1377389543);
		$share->setStorageMtime(1377389543);
		$share->setEncrypted(false);
		$share->setUnencryptedSize(342);
		$share->setEtag('5203de5db60f6');
		return $share;
	}

	protected function getTestShareFolder() {
		$share = new FileShare();
		$share->setItemSource(13);
		$share->setStorage(1);
		$share->setItemTarget('bar');
		$share->setPath('files/foobar');
		$share->setParent(2);
		$share->setMimetype(2);
		$share->setMimepart(1);
		$share->setSize(123);
		$share->setMtime(1377389567);
		$share->setStorageMtime(1377389567);
		$share->setEncrypted(false);
		$share->setUnencryptedSize(123);
		$share->setEtag('521618e9b8a59');
		return $share;
	}

	public function testGetNumericStorageId() {
		$this->assertNull($this->cache->getNumericStorageId());
	}
	public function testGetWithPath() {
		$share = $this->getTestShareFile();
		$data = $share->getMetadata();
		$data['mimetype'] = 'text/plain';
		$data['mimepart'] = 'text';
		$data['storage_mtime'] = 1377389543;
		$this->fetcher->expects($this->once())
			->method('getByPath')
			->with($this->equalTo('foo.txt'))
			->will($this->returnValue(array($share)));
		$this->assertEquals($data, $this->cache->get('foo.txt'));
	}

	public function testGetWithPathAndNotExactShare() {
		$share = $this->getTestShareFolder();
		$data = array(
			'fileid' => 26,
			'storage' => 1,
			'path' => 'files/foobar/bar.txt',
			'parent' => 13,
			'name' => 'bar.txt',
			'mimetype' => 'text/plain',
			'mimepart' => 'text',
			'size' => 42, 
			'mtime' => 1377389567,
			'storage_mtime' => 1377389567,
			'encrypted' => false,
			'unencrypted_size' => 42,
			'etag' => '52150c666ec70',
		);
		$this->fetcher->expects($this->once())
			->method('getByPath')
			->with($this->equalTo('bar/bar.txt'))
			->will($this->returnValue(array($share)));
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar/bar.txt'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foobar/bar.txt')));
		$this->sourceCache->expects($this->once())
			->method('get')
			->with($this->equalTo('files/foobar/bar.txt'))
			->will($this->returnValue($data));
		$data['path'] = 'bar/bar.txt';
		$this->assertEquals($data, $this->cache->get('bar/bar.txt'));
	}

	public function testGetWithId() {
		$share = $this->getTestShareFile();
		$share->setStorageMtime(0);
		$data = $share->getMetadata();
		$data['mimetype'] = 'text/plain';
		$data['mimepart'] = 'text';
		$data['storage_mtime'] = $share->getMtime();
		$this->fetcher->expects($this->once())
			->method('getById')
			->with($this->equalTo(23))
			->will($this->returnValue(array($share)));
		$this->assertEquals($data, $this->cache->get(23));
	}

	public function testGetWithIdAndNotExactShare() {
		$share = $this->getTestShareFolder();
		$data = array(
			'fileid' => 26,
			'storage' => 1,
			'path' => 'files/foobar/bar.txt',
			'parent' => 13,
			'name' => 'bar.txt',
			'mimetype' => 'text/plain',
			'mimepart' => 'text',
			'size' => 42, 
			'mtime' => 1377389567,
			'storage_mtime' => 1377389567,
			'encrypted' => false,
			'unencrypted_size' => 42,
			'etag' => '52150c666ec70',
		);
		$this->fetcher->expects($this->once())
			->method('getById')
			->with($this->equalTo(26))
			->will($this->returnValue(array($share)));
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foobar')));
		$this->sourceCache->expects($this->once())
			->method('get')
			->with($this->equalTo(26))
			->will($this->returnValue($data));
		$data['path'] = 'bar/bar.txt';
		$this->assertEquals($data, $this->cache->get(26));
	}

	public function testGetWithRoot() {
		$share1 = $this->getTestShareFile();
		$share1->setEncrypted(true);
		$share2 = $this->getTestShareFolder();
		$data = array(
			'fileid' => -1,
			'storage' => null,
			'path' => '',
			'parent' => -1,
			'name' => 'Shared',
			'mimetype' => 'httpd/unix-directory',
			'mimepart' => 'httpd',
			'size' => 465, 
			'mtime' => 1377389567,
			'storage_mtime' => 1377389567,
			'encrypted' => true,
			'unencrypted_size' => 465,
			'etag' => '52150a6bea09e',
		);
		$this->fetcher->expects($this->exactly(2))
			->method('getAll')
			->will($this->returnValue(array($share1, $share2)));
		$this->fetcher->expects($this->exactly(2))
			->method('getETag')
			->will($this->returnValue('52150a6bea09e'));
		$this->assertEquals($data, $this->cache->get(''));
		$this->assertEquals($data, $this->cache->get(-1));
	}

	public function testGetWithRootAndNoETag() {
		$share1 = $this->getTestShareFile();
		$share2 = $this->getTestShareFolder();
		$data = array(
			'fileid' => -1,
			'storage' => null,
			'path' => '',
			'parent' => -1,
			'name' => 'Shared',
			'mimetype' => 'httpd/unix-directory',
			'mimepart' => 'httpd',
			'size' => 465, 
			'mtime' => 1377389567,
			'storage_mtime' => 1377389567,
			'encrypted' => false,
			'unencrypted_size' => 465,
			'etag' => '52150a6bea09e',
		);
		$this->fetcher->expects($this->once())
			->method('getAll')
			->will($this->returnValue(array($share1, $share2)));
		$this->fetcher->expects($this->once())
			->method('getETag')
			->will($this->returnValue(null));
		$this->storage->expects($this->once())
			->method('getETag')
			->with($this->equalTo(''))
			->will($this->returnValue('52150a6bea09e'));
		$this->fetcher->expects($this->once())
			->method('setETag')
			->with($this->equalTo('52150a6bea09e'));
		$this->assertEquals($data, $this->cache->get(''));
	}

	public function testGetWithNotFound() {
		$this->fetcher->expects($this->once())
			->method('getByPath')
			->with($this->equalTo('bar.txt'))
			->will($this->returnValue(array()));
		$this->assertFalse($this->cache->get('bar.txt'));
	}

	public function testGetFolderContents() {
		$files = array(
			array(
				'fileid' => 26,
				'storage' => 1,
				'path' => 'files/foobar/bar.txt',
				'parent' => 13,
				'name' => 'bar.txt',
				'mimetype' => 'text/plain',
				'mimepart' => 'text',
				'size' => 42, 
				'mtime' => 1377389567,
				'storage_mtime' => 1377389567,
				'encrypted' => false,
				'unencrypted_size' => 42,
				'etag' => '52150c666ec70',
			),
		);
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foobar')));
		$this->sourceCache->expects($this->once())
			->method('getFolderContents')
			->with($this->equalTo('files/foobar'))
			->will($this->returnValue($files));
		$this->assertEquals($files, $this->cache->getFolderContents('bar'));
	}

	public function testGetFolderContentsWithRoot() {
		$share1 = $this->getTestShareFile();
		$share1->setStorageMtime(0);
		$share2 = $this->getTestShareFolder();
		$data1 = $share1->getMetadata();
		$data1['mimetype'] = 'text/plain';
		$data1['mimepart'] = 'text';
		$data1['storage_mtime'] = $share1->getMtime();
		$data2 = $share2->getMetadata();
		$data2['mimetype'] = 'httpd/unix-directory';
		$data2['mimepart'] = 'httpd';
		$files = array($data1, $data2);
		$this->fetcher->expects($this->once())
			->method('getAll')
			->will($this->returnValue(array($share1, $share2)));
		$this->assertEquals($files, $this->cache->getFolderContents(''));
	}

	public function testPut() {
		$data = array(
			'mtime' => 1377389567,
			'size' => 2802,
		);
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('foo.txt'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foo.txt')));
		$this->sourceCache->expects($this->once())
			->method('put')
			->with($this->equalTo('files/foo.txt'), $data)
			->will($this->returnValue(23));
		$this->assertEquals(23, $this->cache->put('foo.txt', $data));
	}

	public function testPutWithNotFound() {
		$data = array(
			'mtime' => 1377389321,
			'size' => 22,
		);
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar.txt'))
			->will($this->returnValue(array(null, null)));
		$this->sourceCache->expects($this->never())
			->method('put');
		$this->assertEquals(-1, $this->cache->put('bar.txt', $data));
	}

	public function testPutWithRoot() {
		$this->fetcher->expects($this->once())
			->method('setETag')
			->with($this->equalTo('52150a6bea09e'));
		$this->assertEquals(-1, $this->cache->put('', array('etag' => '52150a6bea09e')));
	}

	public function testGetId() {
		$share = $this->getTestShareFile();
		$this->fetcher->expects($this->once())
			->method('getByPath')
			->with($this->equalTo('foo.txt'))
			->will($this->returnValue(array($share)));
		$this->assertEquals($share->getItemSource(), $this->cache->getId('foo.txt'));
	}

	public function testGetIdWithNotExactShare() {
		$share = $this->getTestShareFolder();
		$this->fetcher->expects($this->once())
			->method('getByPath')
			->with($this->equalTo('bar/bar.txt'))
			->will($this->returnValue(array($share)));
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar/bar.txt'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foobar/bar.txt')));
		$this->sourceCache->expects($this->once())
			->method('getId')
			->with($this->equalTo('files/foobar/bar.txt'))
			->will($this->returnValue(26));
		$this->assertEquals(26, $this->cache->getId('bar/bar.txt'));
	}

	public function testGetIdWithNotFound() {
		$this->fetcher->expects($this->once())
			->method('getByPath')
			->with($this->equalTo('bar.txt'))
			->will($this->returnValue(array()));
		$this->assertEquals(-1, $this->cache->getId('bar.txt'));
	}

	public function testGetIdWithRoot() {
		$this->assertEquals(-1, $this->cache->getId(''));
	}

	public function testInCache() {
		$share = $this->getTestShareFile();
		$this->fetcher->expects($this->once())
			->method('getByPath')
			->with($this->equalTo('foo.txt'))
			->will($this->returnValue(array($share)));
		$this->assertTrue($this->cache->inCache('foo.txt'));
	}

	public function testInCacheWithRoot() {
		$this->assertTrue($this->cache->inCache(''));
	}

	public function testRemove() {
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('foo.txt'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foo.txt')));
		$this->sourceCache->expects($this->once())
			->method('remove')
			->with($this->equalTo('files/foo.txt'));
		$this->cache->remove('foo.txt');
	}

	public function testRemoveNotFound() {
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar.txt'))
			->will($this->returnValue(array(null, null)));
		$this->sourceCache->expects($this->never())
			->method('remove');
		$this->cache->remove('bar.txt');
	}

	public function testMove() {
		$this->fetcher->expects($this->at(0))
			->method('resolvePath')
			->with($this->equalTo('bar/bar.txt'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foobar/bar.txt')));
		$this->fetcher->expects($this->at(1))
			->method('resolvePath')
			->with($this->equalTo('bar'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foobar')));
		$this->sourceCache->expects($this->once())
			->method('move')
			->with($this->equalTo('files/foobar/bar.txt'),
				$this->equalTo('files/foobar/newbar.txt')
			);
		$this->cache->move('bar/bar.txt', 'bar/newbar.txt');
	}

	public function testMoveWithNotFound() {
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar.txt'))
			->will($this->returnValue(array(null, null)));
		$this->sourceCache->expects($this->never())
			->method('move');
		$this->cache->move('bar.txt', 'newbar.txt');
	}

	public function testGetStatus() {
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('foo.txt'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foo.txt')));
		$this->sourceCache->expects($this->once())
			->method('getStatus')
			->with($this->equalTo('files/foo.txt'))
			->will($this->returnValue(\OC\Files\Cache\Cache::SHALLOW));
		$this->assertEquals(\OC\Files\Cache\Cache::SHALLOW, $this->cache->getStatus('foo.txt'));
	}

	public function testGetStatusWithNotFound() {
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar.txt'))
			->will($this->returnValue(array(null, null)));
		$this->sourceCache->expects($this->never())
			->method('getStatus');
		$this->assertEquals(\OC\Files\Cache\Cache::NOT_FOUND, $this->cache->getStatus('bar.txt'));
	}

	public function testGetStatusWithRoot() {
		$this->assertEquals(\OC\Files\Cache\Cache::COMPLETE, $this->cache->getStatus(''));
	}

	public function testCalculateFolderSize() {
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('bar'))
			->will($this->returnValue(array($this->sourceStorage, 'files/foobar')));
		$this->sourceCache->expects($this->once())
			->method('calculateFolderSize')
			->with($this->equalTo('files/foobar'))
			->will($this->returnValue(79));
		$this->assertEquals(79, $this->cache->calculateFolderSize('bar'));
	}

	public function testCalculateFolderSizeNotFound() {
		$this->fetcher->expects($this->once())
			->method('resolvePath')
			->with($this->equalTo('foo'))
			->will($this->returnValue(array(null, null)));
		$this->sourceCache->expects($this->never())
			->method('calculateFolderSize');
		$this->assertEquals(0, $this->cache->calculateFolderSize('foo'));
	}

	public function testCalculateFolderSizeWithRoot() {
		$share1 = $this->getTestShareFile();
		$share2 = $this->getTestShareFolder();
		$this->fetcher->expects($this->once())
			->method('getAll')
			->will($this->returnValue(array($share1, $share2)));
		$this->assertEquals(465, $this->cache->calculateFolderSize(''));
	}

	public function testGetIncomplete() {
		$this->assertFalse($this->cache->getIncomplete());
	}

}