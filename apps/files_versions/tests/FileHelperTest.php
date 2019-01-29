<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
namespace OCA\Files_Versions\Tests;

use OC\Files\View;
use OCA\Files_Versions\FileHelper;
use OCP\Files\FileInfo;

class FileHelperTest extends \Test\TestCase {
	public function testCreateMissingDirectories() {
		$viewMock = $this->getMockBuilder(View::class)
			->disableOriginalConstructor()
			->setMethods(['file_exists', 'mkdir'])
			->getMock();
		$path = 'some/long/path/to/file.ext';
		$fileHelper = new FileHelper();
		$viewMock->method('file_exists')->willReturn(false);
		$viewMock->method('mkdir')
			->withConsecutive(
				[$this->equalTo(FileHelper::VERSIONS_RELATIVE_PATH . '/')],
				[$this->equalTo(FileHelper::VERSIONS_RELATIVE_PATH . '/some')],
				[$this->equalTo(FileHelper::VERSIONS_RELATIVE_PATH . '/some/long')],
				[$this->equalTo(FileHelper::VERSIONS_RELATIVE_PATH . '/some/long/path')],
				[$this->equalTo(FileHelper::VERSIONS_RELATIVE_PATH . '/some/long/path/to')]
			);
		$fileHelper->createMissingDirectories($viewMock, $path);
	}

	/**
	 * @dataProvider dataTestGetPathAndRevision
	 * @param string $path
	 * @param string[][] $expectedVersionInfo
	 */
	public function testGetPathAndRevision($path, $expectedVersionInfo) {
		$fileHelper = new FileHelper();
		$versionInfo = $fileHelper->getPathAndRevision($path);
		$this->assertEquals($expectedVersionInfo['path'], $versionInfo['path']);
		$this->assertEquals($expectedVersionInfo['revision'], $versionInfo['revision']);
	}

	public function dataTestGetPathAndRevision() {
		return [
			[
				'files_versions/name.txt.v1548687210',
				[
					'path' => 'files_versions/name.txt',
					'revision' => '1548687210'
				],
				'files_versions/somepath/name.txt.v1548687211',
				[
					'path' => 'files_versions/somepath/name.txt',
					'revision' => '1548687211'
				],
				'files_versions/somepath.v1548687210/name.txt.v1548687214',
				[
					'path' => 'files_versions/somepath.v1548687210/name.txt',
					'revision' => '1548687214'
				],
			]
		];
	}

	public function testGetAllVersions() {
		$directoryTree = [
			'files_versions' => [
				'type' => 'dir',
				'children' => [
					'file1.txt.v1548687214' => ['type' => 'file', 'size' => 5],
					'file1.txt.v2548687214' => ['type' => 'file', 'size' => 15],
					'file1.txt.v1508687214' => ['type' => 'file', 'size' => 25],
					'docs' => [
						'type' => 'dir',
						'children' => [
							'file1.txt.v1548687234' => ['type' => 'file', 'size' => 3],
							'file1.txt.v2548687224' => ['type' => 'file', 'size' => 52],
							'file1.txt.v1508687274' => ['type' => 'file', 'size' => 125],
						]
					]
				]
			]
		];

		$viewMock = $this->createMock(View::class);
		$viewMock->method('getDirectoryContent')
			->willReturnCallback(
				function ($dirName) use ($directoryTree) {
					$dir = $this->descendByPath($dirName, $directoryTree);
					if (!isset($dir['children'])) {
						return [];
					}
					$dirContent = [];
					foreach ($dir['children'] as $name => $data) {
						$fileInfo = $this->createMock(FileInfo::class);
						$fileInfo->method('getType')
							->willReturn($data['type']);
						$fileInfo->method('getName')
							->willReturn($name);
						$dirContent[] = $fileInfo;
					}
					return $dirContent;
				}
			);

		$fileHelperMock = $this->getMockBuilder(FileHelper::class)
			->setMethods(['getUserView'])->getMock();
		$fileHelperMock->method('getUserView')
			->willReturn($viewMock);

		$allVersions = $fileHelperMock->getAllVersions('foo');
		$versionsByTime = $allVersions['all'];
		$versionsByFile = $allVersions['by_file'];

		$this->assertEquals(
			[
				'2548687224#/docs/file1.txt',
				'2548687214#/file1.txt',
				'1548687234#/docs/file1.txt',
				'1548687214#/file1.txt',
				'1508687274#/docs/file1.txt',
				'1508687214#/file1.txt',
			],
			\array_keys($versionsByTime)
		);

		$this->assertEquals(
			[
				'/docs/file1.txt',
				'/file1.txt',
			],
			\array_keys($versionsByFile)
		);
	}

	protected function descendByPath($path, $tree) {
		$dirName = \trim($path, '/');
		$path = \explode('/', $dirName);
		$item = \current($path);
		$depth = 1;
		$fsItem = [];
		while (isset($tree[$item]) && \is_array($tree[$item])) {
			if ($depth === \count($path)) {
				$fsItem = $tree[$item];
			}
			$depth++;
			if ($tree[$item]['type'] === 'dir') {
				$tree = $tree[$item]['children'];
				$item = \ltrim(\next($path), '/');
			} else {
				break;
			}
		}
		return $fsItem;
	}
}
