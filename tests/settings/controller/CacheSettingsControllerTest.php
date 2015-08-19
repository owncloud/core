<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace OC\Settings\Controller;

use OC\Memcache\NullCache;
use OCP\App\IAppManager;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\ICacheFactory;
use OCP\IRequest;
use OCP\IL10N;
use OCP\ICertificateManager;

/**
 * Class CacheSettingsControllerTest
 *
 * @package OC\Settings\Controller
 */
class CacheSettingsControllerTest extends \Test\TestCase {
	/** @var CacheSettingsController */
	private $cacheSettingsController;
	/** @var IRequest */
	private $request;
	/** @var ICacheFactory */
	private $cacheFactory;

	public function setUp() {
		parent::setUp();

		$this->request = $this->getMock('\OCP\IRequest');
		$this->cacheFactory = $this->getMock('\OCP\ICacheFactory');

		$this->cacheSettingsController = new CacheSettingsController('settings', $this->request, $this->cacheFactory);
	}

	public function testClearCacheNonAPCu() {
		$this->cacheFactory
			->expects($this->once())
			->method('create')
			->with('settings')
			->will($this->returnValue(new NullCache()));

		$expected = new DataResponse([ 'data' => [ 'message' => 'APCu is not in use.' ], 'status' => 'error' ]);
		$this->assertEquals($expected, $this->cacheSettingsController->clearCache());
	}

	public function testClearCacheAPCuSuccess() {
		$cache = $this->getMock('\OC\Memcache\APCu');
		$cache->expects($this->once())
			->method('clear')
			->with('listApps')
			->willReturn(true);

		$this->cacheFactory
			->expects($this->once())
			->method('create')
			->with('settings')
			->will($this->returnValue($cache));

		$expected = new DataResponse([ 'data' => [ 'message' => 'Cache successfully cleared.' ], 'status' => 'success' ]);
		$this->assertEquals($expected, $this->cacheSettingsController->clearCache());
	}

	public function testClearCacheAPCuFailure() {
		$cache = $this->getMock('\OC\Memcache\APCu');
		$cache->expects($this->once())
			->method('clear')
			->with('listApps')
			->willReturn(false);

		$this->cacheFactory
			->expects($this->once())
			->method('create')
			->with('settings')
			->will($this->returnValue($cache));

		$expected = new DataResponse([ 'data' => [ 'message' => 'Cache clear failed.' ], 'status' => 'error' ]);
		$this->assertEquals($expected, $this->cacheSettingsController->clearCache());
	}
}
