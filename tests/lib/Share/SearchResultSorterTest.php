<?php
/**
* ownCloud
*
* @author Arthur Schiwon
* @copyright Copyright (c) 2014 Arthur Schiwon <blizzz@owncloud.com>
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

namespace Test\Share;

class SearchResultSorterTest extends \Test\TestCase {
	public function testSort() {
		$search = 'lin';
		$sorter = new \OC\Share\SearchResultSorter($search, 'foobar');

		$result = [
			['foobar' => 'woot'],
			['foobar' => 'linux'],
			['foobar' => 'Linus'],
			['foobar' => 'Bicyclerepairwoman'],
		];

		\usort($result, [$sorter, 'sort']);
		$this->assertSame('Linus', $result[0]['foobar']);
		$this->assertSame('linux', $result[1]['foobar']);
		$this->assertSame('Bicyclerepairwoman', $result[2]['foobar']);
		$this->assertSame('woot', $result[3]['foobar']);
	}
}
