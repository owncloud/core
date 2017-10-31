<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OCA\DAV\Tests\unit\Upload;

use OC\Files\View;
use OCA\DAV\Connector\Sabre\File;

class AssemblyStreamZsyncTest extends \Test\TestCase {

	/**
	 * @dataProvider providesNodes()
	 */
	public function testGetContents($expected, $nodes, $backingFile, $length) {
		$stream = \OCA\DAV\Upload\AssemblyStreamZsync::wrap($nodes, $backingFile, $length);
		$content = stream_get_contents($stream);

		$this->assertEquals($expected, $content);
	}

	/**
	 * @dataProvider providesNodes()
	 */
	public function testGetContentsFread($expected, $nodes, $backingFile, $length) {
		$stream = \OCA\DAV\Upload\AssemblyStreamZsync::wrap($nodes, $backingFile, $length);

		$content = '';
		while (!feof($stream)) {
			$content .= fread($stream, 3);
		}

		$this->assertEquals($expected, $content);
	}

	function providesNodes() {
		$data512k = $this->makeData(512*1024);
		$data16k = $this->makeData(16*1024);
		$data8k = $this->makeData(8*1024);
		$data4k = $this->makeData(4*1024);
		$dataLess8k = $this->makeData((8*1024)-1);

		$tonofnodes = [];
		$tonofdata = "";
		$start = 0;
		for ($i = 0; $i < 101; $i++) {
			$thisdata =  rand(0,100); // variable length and content
			$tonofdata .= $thisdata;
			array_push($tonofnodes, $this->buildNode($start,$thisdata));
			$start += strlen($thisdata);
		}
		array_push($tonofnodes, $this->buildNode('.zsync','zsync metadata'));

		$file4k = $this->buildNode('file4k', $data4k);
		$file8k = $this->buildNode('file8k', $data8k);
		$file512k = $this->buildNode('file512k', $data512k);

		return[
			'one node zero bytes 4k backing 4k length' => [
				$data4k, [
				$this->buildNode('0', '')
			], $file4k, 4096],
			'one node zero bytes 4k backing 0 length' => [
				'', [
				$this->buildNode('0', '')
			], $file4k, 0],
			'one node with one byte offset' => [
				$data4k[0].'123456789', [
				$this->buildNode('1', '1234567890')
			], $file4k, 10],
			'two nodes multiple splices' => [
				substr($data8k, 0, 1024).
				$data4k.
				substr($data8k, 5120, 214).
				substr($data4k, -1521).
				substr($data8k, 6855),
			[
				$this->buildNode('1024', $data4k),
				$this->buildNode('5334', substr($data4k, -1521))
			], $file8k, 8*1024],
			'two nodes with smaller length' => [
				substr($data512k, 0, 4).
				$data8k.
				substr($data512k, 8196, 7164),
			[
				$this->buildNode('16352', $dataLess8k),
				$this->buildNode('4', $data8k)
			], $file512k, 15*1024],
			'two nodes with large gaps' => [
				substr($data512k, 0, 4).
				$data8k.
				substr($data512k, (8*1024)+4, (128*1024)-((8*1024)+4)).
				$data16k.
				substr($data512k, (8*1024)+4 + (128*1024)-((8*1024)+4) + (16*1024),
				       (512*1024)-((8*1024)+4 + (128*1024)-((8*1024)+4) + (16*1024))),
			[
				$this->buildNode(128*1024, $data16k),
				$this->buildNode('4', $data8k)
			], $file512k, 512*1024],
			'a ton of nodes' => [
				$tonofdata, $tonofnodes, $this->buildNode('empty', ''), strlen($tonofdata)
			],
			'a backing file that is smaller than expected, creating a hole (30k-31k)' => [
				substr($data512k, 0, 12*1024).
				$data16k.
				substr($data512k, (16+12)*1024, 2*1024),
			[
				$this->buildNode(12*1024, $data16k),
				$this->buildNode(31*1024, $data16k)
			], $this->buildNode('file30k', substr($data512k, 0, 30*1024)), 32*1024]
		];
	}

	function makeData($count) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$data = '';
		for ($i = 0; $i < $count; $i++) {
			$data .= $characters[rand(0, $charactersLength - 1)];
		}
		return $data;
	}

	private function buildNode($name, $data) {
		$node = $this->getMockBuilder('\Sabre\DAV\File')
			->setMethods(['getName', 'get', 'getSize'])
			->getMockForAbstractClass();

		$node->expects($this->any())
			->method('getName')
			->willReturn($name);

		$node->expects($this->any())
			->method('get')
			->willReturn($data);

		$node->expects($this->any())
			->method('getSize')
			->willReturn(strlen($data));

		return $node;
	}
}

