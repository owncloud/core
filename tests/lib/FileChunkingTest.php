<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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
namespace Test;

class FileChunkingTest extends \Test\TestCase {

	public function dataIsComplete() {
		return [
			[1, [], false],
			[1, [0], true],
			[2, [], false],
			[2, [0], false],
			[2, [1], false],
			[2, [0,1], true],
			[10, [], false],
			[10, [0,1,2,3,4,5,6,7,8], false],
			[10, [1,2,3,4,5,6,7,8,9], false],
			[10, [0,1,2,3,5,6,7,8,9], false],
			[10, [0,1,2,3,4,5,6,7,8,9], true],
		];
	}

	/**
	 * @dataProvider dataIsComplete
	 * @param $total
	 * @param array $present
	 * @param $expected
	 */
	public function testIsComplete($total, array $present, $expected) {
		$fileChunking = $this->getMockBuilder('\OC_FileChunking')
			->setMethods(['getCache'])
			->setConstructorArgs([[
				'name' => 'file',
				'transferid' => '42',
				'chunkcount' => $total,
			]])
			->getMock();

		$cache = $this->createMock('\OCP\ICache');

		$cache->expects($this->atLeastOnce())
			->method('hasKey')
			->will($this->returnCallback(function ($key) use ($present) {
				$data = explode('-', $key);
				return in_array($data[3], $present);
			}));

		$fileChunking->method('getCache')->willReturn($cache);

		$this->assertEquals($expected, $fileChunking->isComplete());
	}

	/**
	 * data provider for testGetCurrentSize
	 * [[array of chunksizes], [chunk ids to ignore], expected size]
	 * 
	 * @return array[][]|number[][]|number[][][]
	 */
	public function dataGetCurrentSize() {
		return [
			[[1, 2, 3], [ ], 6],
			[[100, 200, 300], [ ], 600],
			[[1, 2, 0, 4], [ ], 7],
			[[10, 20, 30, 40], [2], 70],
			[[10, 20, 30, 40], [0, 2], 60],
			[[10, 20, 30, 40], [0, 2, 3], 20],
		];
	}

	/**
	 * @dataProvider dataGetCurrentSize
	 * 
	 * @param array $chunkSizes
	 * @param array $ignoreChunks
	 * @param int $expected
	 * @return void
	 */
	public function testGetCurrentSize(
		array $chunkSizes, array $ignoreChunks, $expected
	) {
		$fileName = "file";
		$transferId = "42";
		$fileChunking = $this->getMockBuilder('\OC_FileChunking')
			->setMethods(['getCache'])
			->setConstructorArgs(
				[[
					'name' => $fileName,
					'transferid' => $transferId,
					'chunkcount' => count($chunkSizes),
				]]
			)
			->getMock();

		$cache = $this->createMock('\OC\Cache\File');
		$chunkNo = 0;
		foreach ($chunkSizes as $size) {
			$chunkSizeMap [] = [ 
				$fileName . "-chunking-" . $transferId . "-" . $chunkNo,
				$size 
			];
			$chunkNo++;
		}

		$cache->expects($this->atLeastOnce())
			->method('size')
			->will($this->returnValueMap($chunkSizeMap));

		$fileChunking->method('getCache')->willReturn($cache);

		$this->assertEquals($expected, $fileChunking->getCurrentSize($ignoreChunks));
	}
}
