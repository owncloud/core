<?php
/**
 * Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

use OCA\Files;

/**
 * Class Test_Files_Helper
 */
class Test_Files_Helper extends \Test\TestCase {

	private function makeFileInfo($name, $size, $mtime, $isDir = false) {
		return new \OC\Files\FileInfo(
			'/' . $name,
			null,
			'/',
			array(
				'name' => $name,
				'size' => $size,
				'mtime' => $mtime,
				'type' => $isDir ? 'dir' : 'file',
				'mimetype' => $isDir ? 'httpd/unix-directory' : 'application/octet-stream'
			)
		);
	}

	/**
	 * Returns a file list for testing
	 */
	private function getTestFileList() {
		return array(
			self::makeFileInfo('a.txt', 4, 2.3 * pow(10, 9)),
			self::makeFileInfo('q.txt', 5, 150),
			self::makeFileInfo('subdir2', 87, 128, true),
			self::makeFileInfo('b.txt', 2.2 * pow(10, 9), 800),
			self::makeFileInfo('o.txt', 12, 100),
			self::makeFileInfo('subdir', 88, 125, true),
		);
	}

	function sortDataProvider() {
		return array(
			array(
				'name',
				false,
				array('subdir', 'subdir2', 'a.txt', 'b.txt', 'o.txt', 'q.txt'),
			),
			array(
				'name',
				true,
				array('q.txt', 'o.txt', 'b.txt', 'a.txt', 'subdir2', 'subdir'),
			),
			array(
				'size',
				false,
				array('a.txt', 'q.txt', 'o.txt', 'subdir2', 'subdir', 'b.txt'),
			),
			array(
				'size',
				true,
				array('b.txt', 'subdir', 'subdir2', 'o.txt', 'q.txt', 'a.txt'),
			),
			array(
				'mtime',
				false,
				array('o.txt', 'subdir', 'subdir2', 'q.txt', 'b.txt', 'a.txt'),
			),
			array(
				'mtime',
				true,
				array('a.txt', 'b.txt', 'q.txt', 'subdir2', 'subdir', 'o.txt'),
			),
		);
	}

	/**
	 * @dataProvider sortDataProvider
	 */
	public function testSortByName($sort, $sortDescending, $expectedOrder) {
		$files = self::getTestFileList();
		$files = \OCA\Files\Helper::sortFiles($files, $sort, $sortDescending);
		$fileNames = array();
		foreach ($files as $fileInfo) {
			$fileNames[] = $fileInfo->getName();
		}
		$this->assertEquals(
			$expectedOrder,
			$fileNames
		);
	}

	private function getMockStorage($storageId) {
		$storage = $this->getMock('\OCP\Files\Storage');
		$storage->expects($this->any())
			->method('getId')
			->will($this->returnValue($storageId));

		return $storage;
	}

	function fileInfoDataProvider() {
		return array(
			array(
				// regular file
				new \OC\Files\FileInfo(
					'/userid/files/storage/subdir/test.txt',
					$this->getMockStorage('home::user1'),
					'/subdir/test.txt',
					array(
						'fileid' => 123,
						'parent' => 888,
						'name' => 'test.txt',
						'size' => 998,
						'mtime' => 12345,
						'type' => 'file',
						'mimetype' => 'text/plain',
						'permissions' => 31,
						'etag' => 'deadbeef',
						'extraData' => array('custom' => 'data'),
					)
				),
				array(
					'id' => 123,
					'parentId' => 888,
					'mtime' => 12345000,
					'icon' => '/core/img/filetypes/text.svg',
					'isPreviewAvailable' => true,
					'name' => 'test.txt',
					'path' => '/storage/subdir',
					'permissions' => 31,
					'mimetype' => 'text/plain',
					'size' => 998,
					'etag' => 'deadbeef',
					'extraData' => array('custom' => 'data'),
				),
			),
			array(
				// folder
				new \OC\Files\FileInfo(
					'/userid/files/storage/subdir/test',
					$this->getMockStorage('home::user1'),
					'/subdir/test',
					array(
						'fileid' => 123,
						'parent' => 888,
						'name' => 'test',
						'size' => 998,
						'mtime' => 12345,
						'mimetype' => 'httpd/unix-directory',
						'permissions' => 31,
						'etag' => 'deadbeef',
						'extraData' => array('custom' => 'data'),
					)
				),
				array(
					'id' => 123,
					'parentId' => 888,
					'mtime' => 12345000,
					'icon' => '/core/img/filetypes/folder.svg',
					'name' => 'test',
					'path' => '/storage/subdir',
					'permissions' => 31,
					'mimetype' => 'httpd/unix-directory',
					'size' => 998,
					'etag' => 'deadbeef',
					'extraData' => array('custom' => 'data'),
				),
			),
			array(
				// shared folder
				new \OC\Files\FileInfo(
					'/userid/files/storage/subdir/test',
					$this->getMockStorage('shared::user1'),
					'/subdir/test',
					array(
						'fileid' => 123,
						'parent' => 888,
						'name' => 'test',
						'size' => 998,
						'mtime' => 12345,
						'mimetype' => 'httpd/unix-directory',
						'permissions' => 31,
						'etag' => 'deadbeef',
						'extraData' => array('custom' => 'data'),
						'displayname_owner' => 'User One',
						'is_share_mount_point' => true
					)
				),
				array(
					'id' => 123,
					'parentId' => 888,
					'mtime' => 12345000,
					'icon' => '/core/img/filetypes/folder-shared.svg',
					'name' => 'test',
					'path' => '/storage/subdir',
					'permissions' => 31,
					'mimetype' => 'httpd/unix-directory',
					'size' => 998,
					'etag' => 'deadbeef',
					'mountType' => 'shared',
					'extraData' => array('custom' => 'data'),
					'shareOwner' => 'User One',
					'isShareMountPoint' => true
				),
			),
			array(
				// external folder
				new \OC\Files\FileInfo(
					'/userid/files/storage/subdir/test',
					$this->getMockStorage('smb::'),
					'/subdir/test',
					array(
						'fileid' => 123,
						'parent' => 888,
						'name' => 'test',
						'size' => 998,
						'mtime' => 12345,
						'mimetype' => 'httpd/unix-directory',
						'permissions' => 31,
						'etag' => 'deadbeef',
						'extraData' => array('custom' => 'data'),
						'displayname_owner' => 'User One',
						'is_share_mount_point' => true
					)
				),
				array(
					'id' => 123,
					'parentId' => 888,
					'mtime' => 12345000,
					'icon' => '/core/img/filetypes/folder-external.svg',
					'name' => 'test',
					'path' => '/storage/subdir',
					'permissions' => 31,
					'mimetype' => 'httpd/unix-directory',
					'size' => 998,
					'etag' => 'deadbeef',
					'mountType' => 'external',
					'extraData' => array('custom' => 'data'),
					'shareOwner' => 'User One',
					'isShareMountPoint' => true
				),
			),
		);
	}

	/**
	 * @dataProvider fileInfoDataProvider
	 */
	public function testFormatFileInfo($fileInfo, $formattedData) {
		$this->assertEquals($formattedData, \OCA\Files\Helper::formatFileInfo($fileInfo));
	}
}
