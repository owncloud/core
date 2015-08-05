<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OC\AppFramework\Http;

use OCP\AppFramework\Http\CrossOriginResourceSharing;
use Test\TestCase;

/**
 * Class CrossOriginResourceSharingTest
 *
 * @package OC\AppFramework\Http
 */
class CrossOriginResourceSharingTest extends TestCase {

	/** @var CrossOriginResourceSharing */
	private $cors;

	public function setUp() {
		parent::setUp();
		$this->cors = new CrossOriginResourceSharing();
	}

	public function testDefault() {
		$this->assertSame([
			'GET',
			'POST',
			'PUT',
			'DELETE',
			'PATCH',
			'HEAD'
		], $this->cors->getAccessControlAllowMethods());
		$this->assertSame([
			'Authorization',
			'Content-Type',
			'Accept'
		], $this->cors->getAccessControlAllowHeaders());
		$this->assertSame(3600, $this->cors->getAccessControlMaxAge());
	}

	public function testSet() {
		$meths = ['a', 'b'];
		$heads = ['a', 'c'];
		$age = 3;
		$this->cors->setAccessControlAllowMethods([])
			->setAccessControlAllowHeaders($heads)
			->setAccessControlMaxAge($age)
			->setAccessControlAllowMethods($meths);  // another call to test chaining
		$this->assertSame(['A', 'B'], $this->cors->getAccessControlAllowMethods());
		$this->assertSame($heads, $this->cors->getAccessControlAllowHeaders());
		$this->assertSame($age, $this->cors->getAccessControlMaxAge());
	}

}
